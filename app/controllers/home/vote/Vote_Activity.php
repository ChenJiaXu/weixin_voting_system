<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Vote_Activity extends CI_Controller {

	/**
	 * 投票活动
	 * 
	 */
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		//投票活动
		$this->load->model('admin/vote/Voting_Management_model');
	}
	

	/*
	*	投票活动
	*	-------------------------------------------
	*/
	public function index($vm_id){
		
		$data['base_url'] = $this->config->item('base_url');
	
		//访问流量+1
		$data['vm_traffic'] = $this->Voting_Management_model->get_vm_traffic_by_vm_id($vm_id);
		
		//加载数据
		$data['ap'] = $this->Voting_Management_model->get_voting_management_by_vm_id($vm_id);//根据投票活动ID获取对应数据
		$data['vm_bp'] = $this->Voting_Management_model->get_ap_by_vm_id($vm_id);//根据投票活动ID获取本次活动参与者
		
		$data['base_url'] = $this->config->item('base_url');
		
		$this->load->view('home/vote/vote_activity',$data);
		
	}
	
	//投票
	public function votes(){
		$vm_id = $_POST['vm_id'];
		$bp_id = $_POST['bp_id'];
		$this->Voting_Management_model->add_votes_by_vm_bp($vm_id,$bp_id);
		echo '投票成功';
	}


}