<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Voting_Management_model extends CI_Model{

	public function __construct()
    {
        $this->load->database();
    }
    
	public function getVM($user_id){

		$result = $this->check_user_has_global_groups($user_id);
		if($result == TRUE){
			$query = $this->db->get('voting_management');
			return $query->result_array();
		}else{

			$this->db->select('*');
			$this->db->from('voting_management');
			$this->db->join('vm_user', 'voting_management.vm_id = vm_user.vm_id', 'left');
			$this->db->where('vm_user.user_id', $this->session->userdata('user_id'));//根据当前用户读取对应数据
			$query = $this->db->get()->result_array();
			return $query;
			
		}	
	}

	//获取已生成链接的活动
	public function get_vm_link_by_vm_id($vm_id){
		return $this->db->get_where('vm_link', array('vm_id' => $vm_id))->row_array();
	}

	//添加活动
	public function add_voting_management(){
		
		//voting_management表
        $data = array(
		    'title' => $this->input->post('title',TRUE),
		    'description' => $this->security->xss_clean(htmlspecialchars(html_escape($this->input->post('description')))),
		    'code' => md5(NOW()),
		    'date_start' => $this->input->post('date_start',TRUE),
		    'date_end' => $this->input->post('date_end',TRUE),
		    'status' => $this->input->post('status',TRUE),
		    'statusing' => $this->input->post('statusing',TRUE),
		    'rules_config' => $this->security->xss_clean(htmlspecialchars(html_escape($this->input->post('rules_config'))))
		);
		$this->db->insert('voting_management', $this->security->xss_clean($data));

		//获取最新插入的ID
		$vm_id = $this->get_voting_management_new_vm_id();

		//vm_user
		$data_vm_user = array(
			'vm_id' => $this->security->xss_clean($vm_id),
			'user_id' => $this->security->xss_clean($this->session->userdata('user_id'))
		);
		$this->db->insert('vm_user', $this->security->xss_clean($data_vm_user));

		//vm_vc表
		$data_vm_vc = array(
			'vm_id' => $this->security->xss_clean($vm_id),
			'vc_id' => $this->input->post('vc_id',TRUE)
		);
		$this->db->insert('vm_vc', $this->security->xss_clean($data_vm_vc));

		//vm_bp表
		$bps = $this->input->post('vm_bp',TRUE);
		$bp = explode(',',$bps);
		foreach ($bp as $bp_id) {
			$data_vm_bp = array(
				'vm_id' => $this->security->xss_clean($vm_id),
				'bp_id' => $this->security->xss_clean((int)$bp_id)
			);
			$this->db->insert('vm_bp', $this->security->xss_clean($data_vm_bp));
			
		}

		//vm_banner表
       	$banner = $this->input->post('banner',TRUE);
       	$layout = $this->input->post('layout',TRUE);
      	$banner_sort = $this->input->post('banner_sort',TRUE);
       
       	$total = null;
       	if(count($banner) == count($layout) && count($banner) == count($banner_sort)){
       		$total = count($banner);
       		for ($i=0; $i < $total; $i++) { 
       			$data_vm_banner = array(
       				'vm_id' => $this->security->xss_clean($vm_id),
       				'banner' => $this->security->xss_clean($banner[$i]),
       				'layout' => $this->security->xss_clean($layout[$i]),
       				'banner_sort' => $this->security->xss_clean($banner_sort[$i])
       			);
       			$this->db->insert('vm_banner', $this->security->xss_clean($data_vm_banner));
       		}
       	}

       	//vm_rules表
       	$data_vm_rules = array(
       		'vm_id' => $this->security->xss_clean($vm_id),
       		'focus' => $this->input->post('focus',TRUE),
       		'vote_limit' => $this->input->post('vote_limit',TRUE),
       		'select_vote_limit' => $this->input->post('select_vote_limit',TRUE),
       		'interval_time' => $this->input->post('interval_time',TRUE),
       		'online_reg' => $this->input->post('online_reg',TRUE)
       	);
       	$this->db->insert('vm_rules', $this->security->xss_clean($data_vm_rules,TRUE));

		//vm_traffic表
		$data_vm_traffic = array(
			'vm_id' => $this->security->xss_clean($vm_id)
		);
		$this->db->insert('vm_traffic', $this->security->xss_clean($data_vm_traffic));
		
		return $vm_id;
	}

	//返回最新一条数据的ID
	public function get_voting_management_new_vm_id(){
		return $this->db->insert_id();
	}

	//根据ID返回数据
	public function get_voting_management_by_vm_id($vm_id){
		
		$query = $this->db->get_where('voting_management', array('vm_id' => $this->security->xss_clean((int)$vm_id)));

		return $query->row_array();
	}

	//活动预览
	public function get_ap_by_vm_id($vm_id){
		$this->db->select('*');
		$this->db->from('basic_personnel');
		$this->db->join('vm_bp','vm_bp.bp_id = basic_personnel.bp_id');
		$this->db->where('vm_id', $this->security->xss_clean((int)$vm_id));
		$this->db->order_by('votes','desc');
		$query = $this->db->get();
		return $query->result_array();
	}

	//根据活动ID获取详细人员对应的投票列表数据
	public function get_vm_bp_vote_list_by_vm_id($vm_id){
		return $this->db->get_where('vm_bp_vote_list', array('vm_id' => $vm_id))->result_array();
	}

	//获取对应人员的照片
	public function get_bp_image_by_bp_id($bp_id,$main_image){
		$query = $this->db->get_where('bp_image', array('bp_id' => $this->security->xss_clean((int)$bp_id), 'main_image' => $this->security->xss_clean((int)$main_image)));

		return $query->row_array();
	}

	//获取对应广告图
	public function get_vm_banner_by_vm_id($vm_id){

		$query = $this->db->order_by('banner_sort', 'ASC')->get_where('vm_banner', array('vm_id' => $this->security->xss_clean((int)$vm_id)));

		return $query->result_array();
	}
	
	//活动访问流量+1
	public function get_vm_traffic_by_vm_id($vm_id){
		
		//取出当前活动对应的访问量
		$query = $this->db->get_where('vm_traffic', array('vm_id' => $this->security->xss_clean((int)$vm_id)))->result_array();
		
		//访问量+1
		foreach($query as $q){
			$vt_id = $q['vt_id'];
			$traffic = $q['traffic'];
		}
		
		//更新访问量
		$data = array(
			'traffic' => $this->security->xss_clean($traffic+1)
		);
		$this->db->where('vm_id', $this->security->xss_clean($vm_id));

		$this->db->update('vm_traffic', $data);
		//返回访问量
		$query = $this->db->get_where('vm_traffic', array('vm_id' => $this->security->xss_clean((int)$vm_id)));
		return $query->row_array();
	}

	//根据vm_id获取关联vm_vc数据
	public function get_vm_vc_by_vm_id($vm_id){
		$query = $this->db->get_where('vm_vc', array('vm_id' => $this->security->xss_clean((int)$vm_id)));
		return $query->row_array();
	}

	//根据vm_id获取关系人员vm_bp数据->再通过bp_id获取对应人名
	public function get_vm_bp_by_vm_id($vm_id){
		
		$this->db->select('basic_personnel.bp_id as id');
		$this->db->from('basic_personnel');
		$this->db->join('vm_bp','vm_bp.bp_id = basic_personnel.bp_id');
		$this->db->where('vm_id', $this->security->xss_clean((int)$vm_id));
		$query = $this->db->get();
		return $query->result_array();
	}

	//根据vm_id获取活动规则配置-选项数据
	public function get_vm_rules_by_vm_id($vm_id){
		$query = $this->db->get_where('vm_rules', array('vm_id' => $this->security->xss_clean((int)$vm_id)));
		return $query->row_array();
	}

	//更新活动
	public function edit_voting_management($vm_id){

		$data = array(
			'title' => $this->input->post('title',TRUE),
		    'description' => $this->security->xss_clean(htmlspecialchars(html_escape($this->input->post('description')))),
		    'date_start' => $this->input->post('date_start',TRUE),
		    'date_end' => $this->input->post('date_end',TRUE),
		    'status' => $this->input->post('status',TRUE),
		    'statusing' => $this->input->post('statusing',TRUE),
		    'rules_config' => $this->security->xss_clean(htmlspecialchars(html_escape($this->input->post('rules_config'))))
		);

		$this->db->where('vm_id', $this->security->xss_clean((int)$vm_id));

		$this->db->update('voting_management', $data);

		//vm_vc表
		$data_vm_vc = array(
			'vc_id' => $this->input->post('vc_id',TRUE)
		);
		$vm_vc = $this->get_vm_vc_by_vm_id($vm_id);
		if (isset($vm_vc)){
		    $vm_vc_id = $vm_vc['vm_vc_id'];
		}
		$this->db->where('vm_vc_id', $this->security->xss_clean((int)$vm_vc_id));

		$this->db->update('vm_vc', $data_vm_vc);

		//vm_bp表------先清空后插入
		$this->db->delete('vm_bp', array('vm_id' => $this->security->xss_clean((int)$vm_id)));

		$bps = $this->input->post('vm_bp',TRUE);
		$bp = explode(',',$bps);
		foreach ($bp as $bp_id) {
			$data_vm_bp = array(
				'vm_id' => $this->security->xss_clean($vm_id),
				'bp_id' => $this->security->xss_clean((int)$bp_id)
			);
			$this->db->insert('vm_bp', $this->security->xss_clean($data_vm_bp));
		}

		//vm_banner---先清空旧数据后插入
		$this->db->delete('vm_banner', array('vm_id' => $this->security->xss_clean((int)$vm_id)));

		//vm_banner表
       	$banner = $this->input->post('banner',TRUE);
       	$layout = $this->input->post('layout',TRUE);
      	$banner_sort = $this->input->post('banner_sort',TRUE);
       
       	$total = null;
       	if(count($banner) == count($layout) && count($banner) == count($banner_sort)){
       		$total = count($banner);
       		for ($i=0; $i < $total; $i++) { 
       			$data_vm_banner = array(
       				'vm_id' => $this->security->xss_clean($vm_id),
       				'banner' => $this->security->xss_clean($banner[$i]),
       				'layout' => $this->security->xss_clean($layout[$i]),
       				'banner_sort' => $this->security->xss_clean($banner_sort[$i])
       			);
       			$this->db->insert('vm_banner', $this->security->xss_clean($data_vm_banner));
       		}
       	}

       	//vm_banner---先清空旧数据后插入
		$this->db->delete('vm_rules', array('vm_id' => $this->security->xss_clean((int)$vm_id)));
       
       	//vm_rules表
       	$data_vm_rules = array(
       		'vm_id' => $this->security->xss_clean($vm_id),
       		'focus' => $this->input->post('focus',TRUE),
       		'vote_limit' => $this->input->post('vote_limit',TRUE),
       		'select_vote_limit' => $this->input->post('select_vote_limit',TRUE),
       		'interval_time' => $this->input->post('interval_time',TRUE),
       		'online_reg' => $this->input->post('online_reg',TRUE)
       	);
       	$this->db->insert('vm_rules', $this->security->xss_clean($data_vm_rules,TRUE));
	}


	//删除活动信息
	public function delete_voting_management_by_vm_id($vm_id){
		
		//删除活动信息主表
		$query = $this->db->delete('voting_management', array('vm_id' => $this->security->xss_clean($vm_id)));
		
		//删除活动信息与关联表
		$vm_vc = $this->get_vm_vc_by_vm_id($vm_id);
		if (isset($vm_vc)){
		    $vm_vc_id = $vm_vc['vm_vc_id'];
		    $this->db->delete('vm_vc', array('vm_vc_id' => $this->security->xss_clean($vm_vc_id)));
		}

		//删除活动信息与管理员
		$this->db->delete('vm_user', array('vm_id' => $this->security->xss_clean((int)$vm_id)));

		//删除活动信息与基础人员关联表
		$this->db->delete('vm_bp', array('vm_id' => $this->security->xss_clean((int)$vm_id)));

		//删除活动信息与广告图
		$this->db->delete('vm_banner', array('vm_id' => $this->security->xss_clean((int)$vm_id)));

		//删除活动信息与规则配置
		$this->db->delete('vm_rules', array('vm_id' => $this->security->xss_clean((int)$vm_id)));

		//删除活动信息与访问流量
		$this->db->delete('vm_traffic', array('vm_id' => $this->security->xss_clean((int)$vm_id)));

		return $query;
	}

	//自动更新活动状态，根据当前日期是否等于或者大于开始日期
	public function update_voting_management_by_now(){
		
		$vms = $this->db->get('voting_management')->result_array();

		date_default_timezone_set("Asia/Shanghai");
		
		foreach ($vms as $vm) {

			$now = date('Y-m-d H:i:s');

			if($vm['status'] == '1'){
				if(strtotime($vm['date_start']) == strtotime($now) || strtotime($vm['date_start']) < strtotime($now) && strtotime($vm['date_end']) > strtotime($now)){

					$data = array(
						'statusing' => $this->security->xss_clean('2')
					);
					$this->db->where('vm_id', $this->security->xss_clean($vm['vm_id']));

					$this->db->update('voting_management', $data);

				}else if(strtotime($vm['date_end']) < strtotime($now)){

					$data = array(
						'statusing' => $this->security->xss_clean('3')
					);
					$this->db->where('vm_id', $this->security->xss_clean($vm['vm_id']));

					$this->db->update('voting_management', $data);
				}
			}
		}
	}
	
	
	//用户投票
	public function add_vm_bp_vote_list($vm_id,$vm_bp_id,$wxf_id,$name,$ip,$voting_time){

		$data = array(
		 	'vm_id' => $vm_id,
		    'vm_bp_id' => $vm_bp_id,
		    'wxf_id' => $wxf_id,
		    'name' => $name,
		    'ip' => $ip,
		    'voting_time' => $voting_time
		);
		$this->db->insert('vm_bp_vote_list', $this->security->xss_clean($data));

		//根据vm_bp_id查询共有几条投票记录
		$count = $this->db->get_where('vm_bp_vote_list', array('vm_bp_id' => $vm_bp_id))->num_rows();
		$data_votes = array(
			'votes' => $count
		);
		$this->db->where('vm_bp_id', $this->security->xss_clean($vm_bp_id));

		$this->db->update('vm_bp', $data_votes);
	}
	
	//根据IP地址查询上一次投票时间
	public function get_vm_bp_vote_list_by_ip($vm_id,$ip){
		return $this->db->order_by('voting_time','desc')->order_by('vbvl_id','desc')->get_where('vm_bp_vote_list', array('vm_id' => $this->security->xss_clean($vm_id),'ip' => $this->security->xss_clean($ip)))->row_array();
	}

	//
	public function get_vm_bp_vote_list_totalvotes_by_ip($vm_id,$ip){
		return $this->db->get_where('vm_bp_vote_list', array('vm_id' => $this->security->xss_clean($vm_id),'ip' => $this->security->xss_clean($ip)))->num_rows();
	}

	//删除活动广告图
	public function delete_vm_banner_by_vm_banner_id($vm_banner_id){
		$query = $this->db->delete('vm_banner', array('vm_banner_id' => $this->security->xss_clean((int)$vm_banner_id)));
		return $query;
	}

	//根据key获取option_value的对应值
	public function getOptionValue($data){
		$query = $this->db->order_by('value', 'ASC')->get_where('option_value', array('key' => $this->security->xss_clean($data)));
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

	//检查链接是否已存在
	public function check_vm_link_by_vm_id($vm_id){
		return $this->db->get_where('vm_link', array('vm_id' => $vm_id))->num_rows();
	}

	//生成链接
	public function create_link_by_vm_id($vm_id,$vote_link){
		$data = array(
		    'vm_id' => $vm_id,
		    'link' => $vote_link
		);
		$this->db->insert('vm_link', $this->security->xss_clean($data));
	}
}