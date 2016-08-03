<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Basic_Personnel_model extends CI_Model{

	public function __construct()
    {
        $this->load->database();
    }
    
	public function getBP(){
		$query = $this->db->get('basic_personnel');
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

	//删除分类
	public function delete_basic_personnel_by_bp_id($bp_id){
		$query = $this->db->delete('basic_personnel', array('bp_id' => $this->security->xss_clean($bp_id)));
		$this->db->delete('bp_image', array('bp_id' => $this->security->xss_clean($bp_id)));
		return $query;
	}

	//返回最新一条数据的ID
	public function get_basic_personnel_new_bp_id(){
		return $this->db->insert_id();
	}

	public function delete_bp_image_by_bp_image_id($bp_image_id){
		$query = $this->db->delete('bp_image', array('bp_image_id' => $this->security->xss_clean((int)$bp_image_id)));
		return $query;
	}

}