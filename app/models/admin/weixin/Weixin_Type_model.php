<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Weixin_Type_model extends CI_Model{

	public function __construct()
    {
        $this->load->database();
    }
    
	public function getWXT(){
		$query = $this->db->get('weixin_type');
		return $query->result_array();
	}

	//添加活动分类
	public function add_weixin_type(){

        $data = array(
		    'name' => $this->input->post('name',TRUE),
		    'sort' => $this->input->post('sort',TRUE),
		    'status' => $this->input->post('status',TRUE)
		);
		return $this->db->insert('weixin_type', $this->security->xss_clean($data));
	}

	//更新活动分类
	public function edit_weixin_type($wxt_id){
		$data = array(
			'name' => $this->input->post('name',TRUE),
			'sort' => $this->input->post('sort',TRUE),
			'status' => $this->input->post('status',TRUE)
		);
		$this->db->where('wxt_id', $this->security->xss_clean((int)$wxt_id));
		return $this->db->update('weixin_type', $data);
	}


	//根据ID返回数据
	public function get_weixin_type_by_wxt_id($wxt_id){
		$query = $this->db->get_where('weixin_type', array('wxt_id' => $this->security->xss_clean((int)$wxt_id)));
		return $query->row_array();
	}

	//删除分类
	public function delete_weixin_type_by_wxt_id($wxt_id){
		$query = $this->db->delete('weixin_type', array('wxt_id' => $this->security->xss_clean($wxt_id)));
		return $query;
	}

	//返回最新一条数据的ID
	public function get_weixin_type_new_wxt_id(){
		return $this->db->insert_id();
	}

}