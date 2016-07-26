<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	/**
	 * 控制面板
	 */
	function __construct()
	{
		parent::__construct();
		$this->load->library('ion_auth');
		$this->logged_in();
	}

	//验证是否登录
	private function logged_in(){
		if (!$this->ion_auth->logged_in()) {
			//redirect them to the login page
			redirect('auth/login', 'refresh');
		}
	}

}
