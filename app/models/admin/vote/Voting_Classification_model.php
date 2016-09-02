<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Voting_Classification_model extends CI_Model{

	public function __construct()
    {
        $this->load->database();
    }
    
	public function getVC($user_id){

		$result = $this->check_user_has_global_groups($user_id);
		if($result == TRUE){
			$query = $this->db->get('voting_classification');
			return $query->result_array();
		}else{
			$this->db->select('*');
			$this->db->from('voting_classification');
			$this->db->join('vc_user', 'voting_classification.vc_id = vc_user.vc_id', 'left');
			$this->db->where('vc_user.user_id', $user_id);//根据当前用户读取对应数据
			$query = $this->db->get()->result_array();
			return $query;
		}

	}

	//添加活动分类
	public function add_voting_classification(){

        $data = array(
		    'name' => $this->input->post('name',TRUE),
		    'code' => md5(NOW()),
		    'status' => $this->input->post('status',TRUE)
		);
		$this->db->insert('voting_classification', $this->security->xss_clean($data));

		//获取最新插入的ID
		$vc_id = $this->get_voting_classification_new_vc_id();

		//vm_user
		$data_vc_user = array(
			'vc_id' => $this->security->xss_clean($vc_id),
			'user_id' => $this->security->xss_clean($this->session->userdata('user_id'))
		);
		$this->db->insert('vc_user', $this->security->xss_clean($data_vc_user));

		return $vc_id;
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


	//根据ID返回数据
	public function get_voting_classification_by_vc_id($vc_id){
		$query = $this->db->get_where('voting_classification', array('vc_id' => $this->security->xss_clean((int)$vc_id)));
		return $query->row_array();
	}

	//删除分类
	public function delete_voting_classification_by_vc_id($vc_id){
		//删除活动分类与管理员
		$this->db->delete('vc_user', array('vc_id' => $this->security->xss_clean((int)$vc_id)));

		$query = $this->db->delete('voting_classification', array('vc_id' => $this->security->xss_clean($vc_id)));
		return $query;
	}

	//返回最新一条数据的ID
	public function get_voting_classification_new_vc_id(){
		return $this->db->insert_id();
	}

	//判断当前用户是否拥有最高权限
	public function check_user_has_global_groups($user_id){

		//获取当前全局配置中,最高权限组别ID
		$global_groups = $this->db->get_where('config', array('key' => 'global_groups'))->row_array();
		
		//匹配当前用户是否拥有对应权限
		$users_groups = $this->db->get_where('users_groups', array('user_id' => $user_id, 'group_id' => (int)$global_groups['value']))->row_array();
		
		if($users_groups != null || $users_groups != ''){
			return TRUE;
		}else{
			return FALSE;
		}
	}

}