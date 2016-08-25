<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Groups_model extends CI_Model{

	public function __construct()
    {
        $this->load->database();
    }
    
	public function get_groups(){
		$query = $this->db->get('groups');
		return $query->result_array();
	}

	//更新菜单权限用户组
	public function edit_groups_menu($groups_id){

		//先执行删除旧关联数据
		$query = $this->db->get_where('groups_menu', array('groups_id' => $this->security->xss_clean((int)$groups_id)))->result_array();

		if($query != null || $query != ''){
			$this->db->delete('groups_menu', array('groups_id' => $this->security->xss_clean($groups_id)));
		}

		//后执行插入新关联数据
		$groups_menu = $this->input->post('groups_menu[]');
		if(count($groups_menu) > 0){
			foreach ($groups_menu as $gm) {
				$data = array(
					'groups_id' => $groups_id,
				    'menu_id' => (int)$gm
				);
				$this->db->insert('groups_menu', $this->security->xss_clean($data));
			}
		}
		
	}

	//更新权限组-参数设置
	public function edit_groups_setting($groups_id){
		$groups_setting = $this->get_groups_setting_by_groups_id($groups_id);
		if($groups_setting == null || $groups_setting == ''){
			$data = array(
				'groups_id' => $groups_id,
			    'vote_more' => $this->input->post('vote_more',TRUE)
			);
			$this->db->insert('groups_setting', $this->security->xss_clean($data));
		}else{
			
			$data = array(
			    'vote_more' => $this->input->post('vote_more',TRUE)
			);

			$this->db->where('groups_id', $this->security->xss_clean($groups_id));

			$this->db->update('groups_setting', $data);

		}
		
	}

	//根据ID返回数据
	public function get_groups_by_groups_id($groups_id){
		$query = $this->db->get_where('groups', array('id' => $this->security->xss_clean((int)$groups_id)));
		return $query->row_array();
	}

	//根据groups_id返回关联的权限菜单ID
	public function get_groups_menu_by_groups_id($groups_id){
		$query = $this->db->get_where('groups_menu', array('groups_id' => $this->security->xss_clean((int)$groups_id)));
		return $query->result_array();
	}

	//根据groups_id返回关联的参数设置
	public function get_groups_setting_by_groups_id($groups_id){
		$query = $this->db->get_where('groups_setting', array('groups_id' => $this->security->xss_clean((int)$groups_id)));
		return $query->row_array();
	}


}