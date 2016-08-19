<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Weixin_Fans_model extends CI_Model{

	public function __construct()
    {
        $this->load->database();
    }
    
	//获取粉丝数据
	public function getWXF(){
		$query = $this->db->get('weixin_fans');
		return $query->result_array();
	}

	//获取粉丝关注的对应公众号
	public function get_weixin_attention($wxf_id){
		$query = $this->db->get_where('weixin_attention', array('wxf_id' => $wxf_id));
		$row = $query->result_array();
		$data['wxp_row'] = array();
		foreach ($row as $r) {
			$wxp_query = $this->db->get_where('weixin_public', array('wxp_id' => $r['wxp_id']))->result_array();
			foreach ($wxp_query as $key) {
				$data['wxp_row'][] = array(
					'name' => $key['name']
				);
			}	
		}
		
		return $data['wxp_row'];
	}

	public function get_weixin_fans_by_wxf_id(){
		$query = $this->db->get_where('weixin_fans', array('wxf_id' => $wxf_id));
		return $query->result_array();
	}
}