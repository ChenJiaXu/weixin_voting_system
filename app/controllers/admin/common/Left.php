<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Left extends CI_Controller {

	/**
	 * 后台-左侧菜单
	 * 
	 */
	function __construct(){
		parent::__construct();
		$this->load->library('ion_auth');
		$this->load->helper('url');
		
		$this->load->model('admin/menu/Menu_model');
	}
	
	public function index(){
		
		if (!$this->ion_auth->logged_in()){
			
			redirect('auth/login', 'refresh');
		}

		$menu_belong_to = $this->Menu_model->getMenu();

		$menus = $this->Menu_model->getMenu();

		$data['lefts'] = array();

		foreach ($lefts as $l) {
			$data['menus'][] = array(
				'menu_id' => $l['menu_id'],
				'name'	=> $l['name'],
				'level'	=> $l['level'],
				'belong_to'	=>	$l['belong_to'],
				'routing' => anchor($l['routing']),
				'icon' => $l['icon']
			);
		}
		
		$this->load->view('admin/common/left',$data);
	}
}
