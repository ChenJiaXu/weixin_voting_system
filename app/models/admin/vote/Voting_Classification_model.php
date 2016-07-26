<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Voting_Classification_model extends CI_Model{

	public function __construct()
    {
        $this->load->database();
    }
    
	public function getVC(){
		$query = $this->db->get('voting_classification');
		return $query->result_array();
	}

	//添加活动分类
	public function add_voting_classification(){

        $data = array(
		    'name' => $this->input->post('name',TRUE),
		    'code' => md5(NOW()),
		    'status' => $this->input->post('status',TRUE)
		);
		return $this->db->insert('voting_classification', $this->security->xss_clean($data));
	}

	//更新活动分类
	public function edit_voting_classification($vc_id){
		$data = array(
			'name' => $this->input->post('name',TRUE),
			'status' => $this->input->post('status',TRUE)
		);
		$this->db->where('vc_id', $this->security->xss_clean((int)$vc_id));
		return $this->db->update('voting_classification', $data);
	}

	/*//检查分类名是否重复
	public function get_voting_classification_by_name($name){
		$query = $this->db->get_where('voting_classification', array('name' => $this->security->xss_clean($name)));
		return $query->row_array();
	}*/

	//根据ID返回数据
	public function get_voting_classification_by_vc_id($vc_id){
		$query = $this->db->get_where('voting_classification', array('vc_id' => $this->security->xss_clean((int)$vc_id)));
		return $query->row_array();
	}

	//删除分类
	public function delete_voting_classification_by_vc_id($vc_id){
		$query = $this->db->delete('voting_classification', array('vc_id' => $this->security->xss_clean($vc_id)));
		return $query;
	}

	//返回最新一条数据的ID
	public function get_voting_classification_new_vc_id(){
		return $this->db->insert_id();
	}

}