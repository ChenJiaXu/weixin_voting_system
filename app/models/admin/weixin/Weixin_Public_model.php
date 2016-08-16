<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Weixin_Public_model extends CI_Model{

	public function __construct()
    {
        $this->load->database();
    }
    
	public function getWXP(){
		$query = $this->db->get('weixin_public');
		return $query->result_array();
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
		    'date_edit' => date('Y-m-d H:i:s')
		);
		return $this->db->insert('weixin_public', $this->security->xss_clean($data));
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
		    'date_edit' => date('Y-m-d H:i:s')
		);
		$this->db->where('wxp_id', $this->security->xss_clean((int)$wxp_id));
		return $this->db->update('weixin_public', $data);
	}


	//根据ID返回数据
	public function get_weixin_public_by_wxp_id($wxp_id){
		$query = $this->db->get_where('weixin_public', array('wxp_id' => $this->security->xss_clean((int)$wxp_id)));
		return $query->row_array();
	}

	//删除分类
	public function delete_weixin_public_by_wxp_id($wxp_id){
		$query = $this->db->delete('weixin_public', array('wxp_id' => $this->security->xss_clean($wxp_id)));
		return $query;
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

}