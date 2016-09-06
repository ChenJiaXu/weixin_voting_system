<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Config_model extends CI_Model{

	public function __construct(){
		
        $this->load->database();
    }
    
	public function getConfig($data){
		$query = $this->db->get_where('config', array('key' => $data));
		$row =  $query->row_array();
		if (isset($row)){
		    return $row['value'];
		}else{
			return null;
		}
	}

	//更新活动分类
	public function save_config(){	

		//基础配置
		$this->update('root_upload',$this->input->post('root_upload',TRUE),'config');
		$this->update('allow_image_type',$this->input->post('allow_image_type',TRUE),'config');
		$this->update('vm_music_upload_path',$this->input->post('vm_music_upload_path',TRUE),'config');
		$this->update('bp_upload_path',$this->input->post('bp_upload_path',TRUE),'config');
		$this->update('vm_upload_path',$this->input->post('vm_upload_path',TRUE),'config');
		$this->update('bp_image_limit',$this->input->post('bp_image_limit',TRUE),'config');
		$this->update('default_bp_image_name',$this->input->pos('default_bp_image_name',TRUE),'config');

		//全局配置
		$this->update('global_groups',$this->input->post('global_groups',TRUE),'config');
	}

	private function update($key,$value,$table){

		$data = array(
			'value' => $value
		);

		$this->db->where('key', $this->security->xss_clean($key));

		$this->db->update($table, $data);
	}

	//获取用户组
	public function get_groups(){
		return $this->db->get('groups')->result_array();
	}

}