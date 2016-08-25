<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Weixin_Public_model extends CI_Model{

	public function __construct()
    {
        $this->load->database();
    }
    
	public function getWXP(){

		$this->db->select('*');
		$this->db->from('weixin_public');
		$this->db->join('weixin_public_users', 'weixin_public.wxp_id = weixin_public_users.wxp_id', 'left');
		$this->db->where('weixin_public_users.user_id', $this->session->userdata('user_id'));//根据当前用户读取对应数据
		$query = $this->db->get()->result_array();
		return $query;
	}

	//添加微信公众号
	public function add_weixin_public(){

        $data = array(
		    'appid' => $this->input->post('appid',TRUE),
		    'secret' => $this->input->post('secret',TRUE),		    
		    'wxt_id' => $this->input->post('wxt_id',TRUE),
		    'status' => $this->input->post('status',TRUE),
		    'sort' => $this->input->post('sort',TRUE),
		    'status' => $this->input->post('status',TRUE),
		    'date_edit' => date('Y-m-d H:i:s'),
		    'name' => $this->input->post('name',TRUE)
		);

		$query = $this->db->insert('weixin_public', $this->security->xss_clean($data));

		//获取最新插入的ID
		$new_wxp_id = $this->get_weixin_public_new_wxp_id();

		//weixin_public_user
		$data_wxp_user = array(
			'wxp_id' => $this->security->xss_clean($new_wxp_id),
			'user_id' => $this->security->xss_clean($this->session->userdata('user_id'))
		);
		$this->db->insert('weixin_public_users', $this->security->xss_clean($data_wxp_user));

		return $new_wxp_id;
	}

	//更新微信公众号
	public function edit_weixin_public($wxp_id){
		$data = array(
			'appid' => $this->input->post('appid',TRUE),
		    'secret' => $this->input->post('secret',TRUE),
		    'wxt_id' => $this->input->post('wxt_id',TRUE),
		    'status' => $this->input->post('status',TRUE),
		    'sort' => $this->input->post('sort',TRUE),
		    'status' => $this->input->post('status',TRUE),
		    'date_edit' => date('Y-m-d H:i:s'),
		    'name' => $this->input->post('name',TRUE)
		);
		$this->db->where('wxp_id', $this->security->xss_clean((int)$wxp_id));
		return $this->db->update('weixin_public', $data);
	}


	//根据ID返回数据
	public function get_weixin_public_by_wxp_id($wxp_id){
		$query = $this->db->get_where('weixin_public', array('wxp_id' => $this->security->xss_clean((int)$wxp_id)));
		return $query->row_array();
	}

	//删除公众号
	public function delete_weixin_public_by_wxp_id($wxp_id){
		$this->db->delete('weixin_public', array('wxp_id' => $this->security->xss_clean($wxp_id)));
		$this->db->delete('weixin_public_users', array('wxp_id' => $this->security->xss_clean($wxp_id)));
		return TRUE;
	}

	//返回最新一条数据的ID
	public function get_weixin_public_new_wxp_id(){
		return $this->db->insert_id();
	}

	//根据wxt_id获取name
	public function getWXT_by_wxt_id($wxt_id){
		$query = $this->db->get_where('weixin_type', array('wxt_id' => $wxt_id));
		$row =  $query->row_array();
		if (isset($row)){
		    return $row['name'];
		}else{
			return null;
		}
	}

	public function getWXT(){
		$query = $this->db->get('weixin_type');
		return $query->result_array();
	}

	//判断当前用户是否已经绑定了微信公众号
	public function check_weixin_public_users($user_id){
		return $this->db->get_where('weixin_public_users', array('user_id' => (int)$user_id))->num_rows();
	}

}