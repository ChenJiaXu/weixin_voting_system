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

		$this->update('root_upload',$this->input->post('root_upload'),'config');
		$this->update('allow_image_type',$this->input->post('allow_image_type'),'config');
		$this->update('vm_music_upload_path',$this->input->post('vm_music_upload_path'),'config');
		$this->update('bp_upload_path',$this->input->post('bp_upload_path'),'config');
		$this->update('vm_upload_path',$this->input->post('vm_upload_path'),'config');
	}

	private function update($key,$value,$table){

		$data = array(
			'value' => $value
		);

		$this->db->where('key', $this->security->xss_clean($key));

		$this->db->update($table, $data);
	}



}