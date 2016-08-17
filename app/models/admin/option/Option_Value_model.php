<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Option_Value_model extends CI_Model{

	public function __construct()
    {
        $this->load->database();
    }
    
	public function getOV(){
		$query = $this->db->get('option_value');
		return $query->result_array();
	}

	//添加选项值
	public function add_option_value(){

        $data = array(
		    'key' => $this->input->post('key',TRUE),
		    'value' => $this->input->post('value',TRUE),
		    'ot_id' => $this->input->post('ot_id',TRUE)
		);
		return $this->db->insert('option_value', $this->security->xss_clean($data));
	}

	//更新选项值
	public function edit_option_value($ov_id){
		$data = array(
			'key' => $this->input->post('key',TRUE),
		    'value' => $this->input->post('value',TRUE),
		    'ot_id' => $this->input->post('ot_id',TRUE)
		);
		$this->db->where('ov_id', $this->security->xss_clean((int)$ov_id));
		return $this->db->update('option_value', $data);
	}


	//根据ID返回数据
	public function get_option_value_by_ov_id($ov_id){
		$query = $this->db->get_where('option_value', array('ov_id' => $this->security->xss_clean((int)$ov_id)));
		return $query->row_array();
	}

	//删除分类
	public function delete_option_value_by_ov_id($ov_id){
		$query = $this->db->delete('option_value', array('ov_id' => $this->security->xss_clean($ov_id)));
		return $query;
	}

	//返回最新一条数据的ID
	public function get_option_value_new_ov_id(){
		return $this->db->insert_id();
	}

	//根据ot_id获取name
	public function getOT_by_ot_id($ot_id){
		$query = $this->db->get_where('option_type', array('ot_id' => $ot_id));
		$row =  $query->row_array();
		if (isset($row)){
		    return $row['name'];
		}else{
			return null;
		}
	}

	public function getOT(){
		$query = $this->db->get('option_type');
		return $query->result_array();
	}

}