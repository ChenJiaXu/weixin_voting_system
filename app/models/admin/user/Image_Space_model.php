<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Image_Space_model extends CI_Model{

	public function __construct()
    {
        $this->load->database();
    }
    
	public function getImageSpace(){
		$query = $this->db->get('image_space');
		return $query->result_array();
	}

	//添加人员信息
	public function add_basic_personnel(){

        $data = array(
		    'name' => $this->input->post('name',TRUE),
		    'description' => $this->input->post('description',TRUE),
		    'status' => $this->input->post('status',TRUE),
		    'date_update' => date('Y-m-d H:i:s')
		);
		$this->db->insert('basic_personnel', $this->security->xss_clean($data));

		//获取最新插入的ID
		$bp_id = $this->get_basic_personnel_new_bp_id();

		return $bp_id;
	}

	//更新活动分类
	public function edit_basic_personnel($bp_id){
		$data = array(
			'name' => $this->input->post('name',TRUE),
			'description' => $this->input->post('description',TRUE),
			'status' => $this->input->post('status',TRUE),
			'date_update' => date('Y-m-d H:i:s')
		);

		$this->db->where('bp_id', $this->security->xss_clean((int)$bp_id));

		return $this->db->update('basic_personnel', $data);
	}

	//根据ID返回数据
	public function get_basic_personnel_by_bp_id($bp_id){
		$query = $this->db->get_where('basic_personnel', array('bp_id' => $this->security->xss_clean((int)$bp_id)));
		return $query->row_array();
	}

	//删除分类
	public function delete_basic_personnel_by_bp_id($bp_id){
		$query = $this->db->delete('basic_personnel', array('bp_id' => $this->security->xss_clean($bp_id)));
		return $query;
	}

	//返回最新一条数据的ID
	public function get_basic_personnel_new_bp_id(){
		return $this->db->insert_id();
	}

}