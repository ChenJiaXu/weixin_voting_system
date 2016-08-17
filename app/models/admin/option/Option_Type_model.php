<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Option_Type_model extends CI_Model{

	public function __construct()
    {
        $this->load->database();
    }
    
	public function getOT(){
		$query = $this->db->get('option_type');
		return $query->result_array();
	}

	//添加选项类型
	public function add_option_type(){

        $data = array(
		    'name' => $this->input->post('name',TRUE),
		    'type' => $this->input->post('type',TRUE),
		    'date_edit' => date('Y-m-d H:i:s')
		);
		return $this->db->insert('option_type', $this->security->xss_clean($data));
	}

	//更新选项类型
	public function edit_option_type($ot_id){
		$data = array(
			'name' => $this->input->post('name',TRUE),
			'type' => $this->input->post('type',TRUE),
			'date_edit' => date('Y-m-d H:i:s')
		);
		$this->db->where('ot_id', $this->security->xss_clean((int)$ot_id));
		return $this->db->update('option_type', $data);
	}

	//根据ID返回数据
	public function get_option_type_by_ot_id($ot_id){
		$query = $this->db->get_where('option_type', array('ot_id' => $this->security->xss_clean((int)$ot_id)));
		return $query->row_array();
	}

	//删除分类
	public function delete_option_type_by_ot_id($ot_id){
		$query = $this->db->delete('option_type', array('ot_id' => $this->security->xss_clean($ot_id)));
		return $query;
	}

	//返回最新一条数据的ID
	public function get_option_type_new_ot_id(){
		return $this->db->insert_id();
	}

}