<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Weixin_Fans_model extends CI_Model{

	public function __construct()
    {
        $this->load->database();
    }
    
	/**
	 * 	获取粉丝数据
	 *	流程：当前用户->公众号->粉丝关注
	 */

	public function getWXF(){
		
		$result = $this->check_user_has_global_groups($this->session->userdata('user_id'));

		if($result == TRUE){
			$query = $this->db->get('weixin_fans');
			return $query->result_array();
		}else{

			//查询:当前用户对应的公众号
			$wxp_id = $this->db->get_where('weixin_public_users', array('user_id' => $this->session->userdata('user_id')))->row_array();//公众号ID
		
			$this->db->select('*');
			$this->db->from('weixin_fans');
			$this->db->join('weixin_attention', 'weixin_fans.wxf_id = weixin_attention.wxf_id', 'left');
			$this->db->where('weixin_attention.wxp_id', $wxp_id['wxp_id']);//根据当前用户读取对应数据
			$query = $this->db->get()->result_array();
			return $query;
		}
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

	public function get_weixin_fans_by_wxf_id($wxf_id){
		$query = $this->db->get_where('weixin_fans', array('wxf_id' => $wxf_id));
		return $query->result_array();
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