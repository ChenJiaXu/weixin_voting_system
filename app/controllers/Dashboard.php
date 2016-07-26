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
	}

	public function index(){
		
		$data['base_url'] = $this->config->item('base_url');
		
		$this->load_view($data);
	}

	private function load_view($data){
		$data['lefts'] = $this->Menu_model->getMenu();
		$this->load->view('admin/common/header',$data);
		$this->load->view('admin/common/left',$data);
		$this->load->view('admin/common/dashboard',$data);
		$this->load->view('admin/common/footer',$data);
	}
}
