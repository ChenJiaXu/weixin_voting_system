<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Basic_Personnel_model extends CI_Model{

	public function __construct()
    {
        $this->load->database();
    }
    
	public function getBP($user_id){
		
		$result = $this->check_user_has_global_groups($user_id);
		if($result == TRUE){
			$query = $this->db->get('basic_personnel');
			return $query->result_array();
		}else{

			$this->db->select('*');
			$this->db->from('basic_personnel');
			$this->db->join('bp_user', 'basic_personnel.bp_id = bp_user.bp_id', 'left');
			$this->db->where('bp_user.user_id', $this->session->userdata('user_id'));//根据当前用户读取对应数据
			$query = $this->db->get()->result_array();
			return $query;
			
		}	
	}

	//添加人员信息
	public function add_basic_personnel($user_id){

        $data = array(
		    'name' => $this->input->post('name',TRUE),
		    'description' => $this->input->post('description',TRUE),
		    'status' => $this->input->post('status',TRUE),
		    'date_update' => date('Y-m-d H:i:s')
		);
		$this->db->insert('basic_personnel', $this->security->xss_clean($data));

		//获取最新插入的ID
		$bp_id = $this->get_basic_personnel_new_bp_id();

		//bp_user
		$data_bp_user = array(
			'bp_id' => $this->security->xss_clean($bp_id),
			'user_id' => $this->security->xss_clean($this->session->userdata('user_id'))
		);
		$this->db->insert('bp_user', $this->security->xss_clean($data_bp_user));

		$images = $this->input->post('image',TRUE);
		if($images != null){
			$count = 1;
			foreach ($images as $image) {
				$bp_image = array(
					'bp_id' => $bp_id,
					'image' => $image,
					'main_image' => $count == 1?1:0
				);
				$this->db->insert('bp_image', $this->security->xss_clean($bp_image));
				$count++;
			}
		}
		return $bp_id;
	}

	//更新活动分类
	public function edit_basic_personnel($bp_id){
		

		//插入图片
		$images = $this->input->post('image',TRUE);
		if($images != null){
			foreach ($images as $image) {
				$bp_image = array(
					'bp_id' => $bp_id,
					'image' => $image
				);
				$this->db->insert('bp_image', $this->security->xss_clean($bp_image));
			}

		}
		

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

	//根据bp_id返回对应图片
	public function get_bp_image_by_bp_id($bp_id){
		$query = $this->db->get_where('bp_image', array('bp_id' => $this->security->xss_clean((int)$bp_id)));
		return $query->result_array();
	}

	//删除人员
	public function delete_basic_personnel_by_bp_id($bp_id){
		$query = $this->db->delete('basic_personnel', array('bp_id' => $this->security->xss_clean($bp_id)));
		$this->db->delete('bp_image', array('bp_id' => $this->security->xss_clean($bp_id)));

		//删除基础人员与管理员
		$this->db->delete('bp_user', array('bp_id' => $this->security->xss_clean((int)$bp_id)));

		return $query;
	}

	//判断当前人员是否关联投票活动
	public function check_vm_bp_by_bp_id($bp_id){
		return $this->db->get_where('vm_bp', array('bp_id' => $bp_id))->result_array();
	}

	//返回最新一条数据的ID
	public function get_basic_personnel_new_bp_id(){
		return $this->db->insert_id();
	}

	//删除人员图片
	public function delete_bp_image_by_bp_image_id($bp_image_id){
		$query = $this->db->delete('bp_image', array('bp_image_id' => $this->security->xss_clean((int)$bp_image_id)));
		return $query;
	}

	//强制删除人员
	public function force_del_basic_personnel_by_bp_id($bp_id){
		//基础人员表
		$this->db->delete('basic_personnel', array('bp_id' => $this->security->xss_clean($bp_id)));
		//人员—照片表
		$this->db->delete('bp_image', array('bp_id' => $this->security->xss_clean($bp_id)));
		//人员-管理员表
		$this->db->delete('bp_user', array('bp_id' => $this->security->xss_clean($bp_id)));
		//人员-投票统计表
		$vm_bps = $this->db->get_where('vm_bp', array('bp_id' => $bp_id))->result_array();	
		foreach ($vm_bps as $vbs) {
			$this->db->delete('vm_bp_vote_list', array('vm_bp_id' => $this->security->xss_clean($vbs['vm_bp_id'])));
		}
		//人员-活动表
		$this->db->delete('vm_bp', array('bp_id' => $this->security->xss_clean($bp_id)));
	}

	//根据当前ID值,查找对应主图数据
	public function get_main_image($bp_id){

		$query = $this->db->get_where('bp_image', array('bp_id' => $bp_id));
		
		return $query->result_array();
	}

	//设置为主图+取消主图
	public function change_main_image($bp_image_id, $main_image){

		$data = array(
			'main_image' => $this->security->xss_clean((int)$main_image)
		);
		$this->db->where('bp_image_id', $this->security->xss_clean((int)$bp_image_id));
		
		return $this->db->update('bp_image', $data);
		
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