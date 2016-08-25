<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu_model extends CI_Model{

	public function __construct()
    {
        $this->load->database();
    }
    
    //获取全部菜单集合
	public function getMenu(){
		
		$query = $this->db->get('menu');
		return $query->result_array();
	}

	/**
	 *  动态菜单
	 *	根据user_id=>groups_id=>menu_id=>all menus	
	 */
	public function access_the_menu(){

		$user_id = $this->session->userdata('user_id');
		
		$query = $this->db->query("select DISTINCT * FROM (select * FROM menu m WHERE m.menu_id in (select gm.menu_id FROM groups_menu gm WHERE gm.groups_id in (select ug.group_id FROM users_groups ug WHERE ug.user_id = ".$user_id."))) AS menu")->result_array();
		
		return $query;
	}

	//添加菜单
	public function add_menu(){

        $data = array(
		    'name' => $this->input->post('name',TRUE),
		    'level' => $this->input->post('level',TRUE),
		    'belong_to' => $this->input->post('belong_to',TRUE),
		    'routing' => $this->input->post('routing',TRUE),
		    'icon' => $this->input->post('icon',TRUE),
		    'status' => $this->input->post('status',TRUE),
		    'date_update' => date('Y-m-d H:i:s')
		);
		$this->db->insert('menu', $this->security->xss_clean($data));

		//获取最新插入的ID
		$menu_id = $this->get_menu_new_menu_id();

		return $menu_id;
	}

	//更新活动分类
	public function edit_menu($menu_id){
		$data = array(
		    'name' => $this->input->post('name',TRUE),
		    'level' => $this->input->post('level',TRUE),
		    'belong_to' => $this->input->post('belong_to',TRUE),
		    'routing' => $this->input->post('routing',TRUE),
		    'icon' => $this->input->post('icon',TRUE),
		    'status' => $this->input->post('status',TRUE),
		    'date_update' => date('Y-m-d H:i:s')
		);

		$this->db->where('menu_id', $this->security->xss_clean((int)$menu_id));

		return $this->db->update('menu', $data);
	}

	//根据ID返回数据
	public function get_menu_by_menu_id($menu_id){
		$query = $this->db->get_where('menu', array('menu_id' => $this->security->xss_clean((int)$menu_id)));
		return $query->row_array();
	}

	//删除分类
	public function delete_menu_by_menu_id($menu_id){
		$this->db->delete('groups_menu', array('menu_id' => $this->security->xss_clean($menu_id)));
		$query = $this->db->delete('menu', array('menu_id' => $this->security->xss_clean($menu_id)));
		return $query;
	}

	//返回最新一条数据的ID
	public function get_menu_new_menu_id(){
		return $this->db->insert_id();
	}

	//返回level=1节点数据
	public function get_level_one(){
		$query = $this->db->get_where('menu', array('level' => $this->security->xss_clean($this->db->escape((int)1))));
		return $query->result_array();
	}

	//返回level=2节点数据
	public function get_level_two(){
		$query = $this->db->get_where('menu', array('level' => $this->security->xss_clean($this->db->escape((int)2))));
		return $query->result_array();
	}

}