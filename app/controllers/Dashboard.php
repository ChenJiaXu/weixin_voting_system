<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	/**
	 * 控制面板
	 */
	function __construct()
	{
		parent::__construct();
		$this->load->model('admin/menu/Menu_model');

		$this->lang->load('admin/dashboard/dashboard');
		
		$this->load->model('admin/user/Basic_Personnel_model');
		$this->load->model('admin/vote/Voting_Management_model');
		$this->load->model('admin/weixin/Weixin_Public_model');	
	}

	public function index(){
		
		$data['base_url'] = $this->config->item('base_url');
		
		$data['bp'] = count($this->Basic_Personnel_model->getBP($this->session->userdata('user_id')));
		$data['vm'] = count($this->Voting_Management_model->getVM($this->session->userdata('user_id')));
		$data['wxp'] = count($this->Weixin_Public_model->getWXP($this->session->userdata('user_id')));

		$this->load_view($data);
	}

	private function load_view($data){
		$data['lefts'] = $this->Menu_model->access_the_menu();
		$this->load->view('admin/common/header',$data);
		$this->load->view('admin/common/left',$data);
		$this->load->view('admin/common/dashboard',$data);
		$this->load->view('admin/common/footer',$data);
	}
}
