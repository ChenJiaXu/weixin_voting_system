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

		$this->load->model('admin/config/Config_model');
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

		    		$this->delete_bp_image('bp_image');//删除基础人员关联图片
		    		$this->delete_vm_banner('vm_banner');//删除活动广告图

		    		$this->Reset_System_model->reset_system();//重置系统

		    		$this->data();//填充数据

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

	//删除基础人员关联图片
	private function delete_bp_image($table){
		$result = $this->Reset_System_model->get_table_data($table);
		$data['bp_upload_path'] = $this->Config_model->getConfig('bp_upload_path');
		foreach ($result as $rs) {
			if((string)$rs['image'] != (string)'default.png'){
				$this->delete_image($data['bp_upload_path'], $rs['image']);
			}
		}
	}

	//删除活动广告图
	private function delete_vm_banner($table){
		$result = $this->Reset_System_model->get_table_data($table);
		$data['vm_upload_path'] = $this->Config_model->getConfig('vm_upload_path');
		foreach ($result as $rs) {
			if((string)$rs['banner'] != (string)'top.png' && (string)$rs['banner'] != (string)'content.png' && (string)$rs['banner'] != (string)'footer.png'){
				$this->delete_image($data['vm_upload_path'], $rs['banner']);
			}
		}
	}

	//删除图片方法
	private function delete_image($filename,$name){
		unlink($filename.$name);
	}

	//填充数据
	private function data(){

		//basic_personnel
		$basic_personnel = array(
			'name' => '示例人员',
		    'description' => '这是系统默认展示的示例人员信息',
		    'status' => 1,
		    'date_update' => date('Y-m-d H:i:s')
		);
		$bp_latest_id = $this->Reset_System_model->insert_data('basic_personnel',$basic_personnel);
		//bp_image
		$bp_image = array(
			'bp_id' => $bp_latest_id,
			'image' => 'default.png',
			'main_image' => 1
		);
		$this->Reset_System_model->insert_data('bp_image',$bp_image);
		//bp_user
		$bp_user = array(
			'bp_id' => $bp_latest_id,
			'user_id' => $this->session->userdata('user_id')
		);
		$this->Reset_System_model->insert_data('bp_user',$bp_user);
		//voting_classification
		$voting_classification = array(
		    'name' => '示例分类',
		    'code' => md5(NOW()),
		    'status' => 1
		);
		$vc_latest_id = $this->Reset_System_model->insert_data('voting_classification',$voting_classification);
		//vc_user
		$vc_user = array(
			'vc_id' => $vc_latest_id,
			'user_id' => $this->session->userdata('user_id')
		);
		$this->Reset_System_model->insert_data('vc_user',$vc_user);
		//voting_management
        $voting_management = array(
		    'title' => '投票活动例子',
		    'description' => '这是一个默认的投票展示示例例子,简单进行数据展示!',
		    'code' => md5(NOW()),
		    'date_start' => date('2016-1-1 00:00:01'),
		    'date_end' => date('2016-12-31 23:59:59'),
		    'status' => 1,
		    'statusing' => 2,
		    'rules_config' => '这是活动规则的配置信息'
		);
		$vm_latest_id = $this->Reset_System_model->insert_data('voting_management',$voting_management);
		//vm_user
		$vm_user = array(
			'vm_id' => $vm_latest_id,
			'user_id' => $this->session->userdata('user_id')
		);
		$this->Reset_System_model->insert_data('vm_user',$vm_user);
		//vm_vc表
		$vm_vc = array(
			'vm_id' => $vm_latest_id,
			'vc_id' => $vc_latest_id
		);
		$this->Reset_System_model->insert_data('vm_vc',$vm_vc);
		//vm_bp表
		$vm_bp = array(
			'vm_id' => $vm_latest_id,
			'bp_id' => $bp_latest_id
		);
		$this->Reset_System_model->insert_data('vm_bp',$vm_bp);
		//vm_banner表
			//top
			$vm_banner_top = array(
   				'vm_id' => $vm_latest_id,
   				'banner' => 'top.png',
   				'layout' => 1,
   				'banner_sort' => 1
   			);
   			$this->Reset_System_model->insert_data('vm_banner',$vm_banner_top);
			//content
   			$vm_banner_content = array(
   				'vm_id' => $vm_latest_id,
   				'banner' => 'content.png',
   				'layout' => 2,
   				'banner_sort' => 1
   			);
   			$this->Reset_System_model->insert_data('vm_banner',$vm_banner_content);
			//footer
			$vm_banner_footer = array(
   				'vm_id' => $vm_latest_id,
   				'banner' => 'footer.png',
   				'layout' => 3,
   				'banner_sort' => 1
   			);
   			$this->Reset_System_model->insert_data('vm_banner',$vm_banner_footer);
   		//vm_rules表
       	$vm_rules = array(
       		'vm_id' => $vm_latest_id,
       		'focus' => 0,
       		'vote_limit' => 1,
       		'select_vote_limit' => 0,
       		'interval_time' => 60,
       		'online_reg' => 0
       	);
       	$this->Reset_System_model->insert_data('vm_rules',$vm_rules);
       	//vm_traffic表
		$vm_traffic = array(
			'vm_id' => $vm_latest_id
		);
		$this->Reset_System_model->insert_data('vm_traffic',$vm_traffic);
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