<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reset_System_model extends CI_Model{

	public function __construct(){
		
        $this->load->database();
    }
	
	//重置系统    
	public function reset_system(){
		//basic_personnel
		$this->db->truncate('basic_personnel');
		//bp_image
		$this->db->truncate('bp_image');
		//bp_user
		$this->db->truncate('bp_user');
		//image_space
		$this->db->truncate('image_space');
		//vc_user
		$this->db->truncate('vc_user');
		//vm_banner
		$this->db->truncate('vm_banner');
		//vm_bp
		$this->db->truncate('vm_bp');
		//vm_bp_vote_list
		$this->db->truncate('vm_bp_vote_list');
		//vm_link
		$this->db->truncate('vm_link');
		//vm_rules
		$this->db->truncate('vm_rules');
		//vm_traffic
		$this->db->truncate('vm_traffic');
		//vm_user
		$this->db->truncate('vm_user');
		//vm_vc
		$this->db->truncate('vm_vc');
		//voting_classification
		$this->db->truncate('voting_classification');
		//voting_management
		$this->db->truncate('voting_management');	
	}

	//填充数据
	public function insert_data($table,$data){
		$this->db->insert($table, $this->security->xss_clean($data));
		return $this->latest_id();
	}

	//返回最新一条数据的ID
	public function latest_id(){
		return $this->db->insert_id();
	}
	
	//返回对应表数据
	public function get_table_data($table){
		return $this->db->get($table)->result_array();
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