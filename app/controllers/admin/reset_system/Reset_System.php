<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Reset_System extends MY_Controller {

	/**
	 * 重置系统
	 * 
	 */
	function __construct(){

		parent::__construct();

		$this->lang->load('admin/reset_system/reset_system');

		$this->load->model('admin/menu/Menu_model');

		$this->load->model('admin/reset_system/Reset_System_model');
	}
	
	public function index(){
		
		$data['base_url'] = $this->config->item('base_url');

		$data['action'] = 'admin/reset_system/reset_system';

		//加载相关类库
		$this->load->helper('form');
	    $this->load->library('form_validation');

	    /**
	    * 设置校验规则
	    */
	    $this->form_validation->set_rules('confirm_password', lang('cl_help_confirm_password'), array('trim','required','min_length[1]'));

		if($this->form_validation->run() === FALSE){
		    	
	        $this->load_view('reset_system/reset_system',$data);

	    }else{

	    	//验证当前用户密码是否正确
	    	$check_user_password = $this->ion_auth->login($this->session->userdata('email'),$this->input->post('confirm_password'),FALSE);
	    	
	    	if($check_user_password == TRUE){

	    		//检查当前用户是否拥有系统最高权限
		    	$check_user_has_global_groups = $this->Reset_System_model->check_user_has_global_groups($this->session->userdata('user_id'));

		    	if($check_user_has_global_groups == TRUE){

		    		$this->Reset_System_model->reset_system();

			       	$this->session->set_flashdata('success', '【'. lang('rsl_success_save') .'】');
			       	
			       	redirect('admin/reset_system/reset_system','refresh');

		    	}else if($check_user_has_global_groups == FALSE){

		    		$this->session->set_flashdata('error', lang('rsl_error_save'));

					redirect('admin/reset_system/reset_system','refresh');
		    	}else{

		    		$this->session->set_flashdata('error', lang('rsl_error_global'));

					redirect('admin/reset_system/reset_system','refresh');
		    	}

	    	}else if($check_user_password == FALSE){

	    		$this->session->set_flashdata('error', lang('rsl_error_confirm_password'));

				redirect('admin/reset_system/reset_system','refresh');
	    	}else{

	    		$this->session->set_flashdata('error', lang('rsl_error_global'));

				redirect('admin/reset_system/reset_system','refresh');
	    	}

	    }

	}

	/**
	 * 加载视图
	 *	路径 =>	$path
	 *	数据 => $data
	 */
	private function load_view($path,$data){
		$data['lefts'] = $this->Menu_model->access_the_menu();
		$this->load->view('admin/common/header',$data);
		$this->load->view('admin/common/left',$data);
		$this->load->view('admin/'.$path,$data);
		$this->load->view('admin/common/footer',$data);
	}

}