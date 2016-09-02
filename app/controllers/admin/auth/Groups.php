<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Groups extends MY_Controller {

	/**
	 * 权限组
	 * 
	 */
	function __construct(){
		parent::__construct();
		$this->load->model('admin/menu/Menu_model');

		$this->load->model('admin/auth/Groups_model');
		$this->lang->load('admin/auth/groups');
		$this->lang->load('admin/auth/groups_menu');
		$this->lang->load('admin/auth/groups_setting');
	}
	
	//用户组-默认方法
	public function index(){
		
		$data['base_url'] = $this->config->item('base_url');

		$groups = $this->Groups_model->get_groups();
		$data['groups'] = array();

		foreach ($groups as $g) {
			$data['groups'][] = array(
				'id' => $g['id'],
				'name' => $g['name'],
				'description' => $g['description'],
				'edit_menu' => 'groups/edit_menu/'.$g['id'],
				'edit_setting' => 'groups/edit_setting/'.$g['id']
			);
		}

		$this->load_view('auth/groups',$data); 
	
	}

	
	/*
	*	权限组--编辑更新方法
	*	-------------------------------------------
	*	已完成
	*		1.根据ID更新分类
	*	未完成
	*		1.$gm_id类型验证
	*	-------------------------------------------
	*/
	public function edit_menu($groups_id){

		$groups_id = (int)$groups_id;//类型转换处理不严格，后面修改

		if(is_int($groups_id) || is_integer($groups_id)){

			//*操作*
			$data['g_action'] = 'edit_menu';

			//用户组
			$data['groups'] = $this->Groups_model->get_groups_by_groups_id($groups_id);
			//用户组关联菜单
			$data['groups_menus'] = $this->Groups_model->get_groups_menu_by_groups_id($groups_id);
			//菜单
			$data['menus'] = $this->Menu_model->getMenu();

			$data['base_url'] = $this->config->item('base_url');

			//加载相关类库
			$this->load->helper('form');
		    $this->load->library('form_validation');

		    $this->form_validation->set_rules('groups_menu[]', lang('gml_help_groups'),array('trim','required','min_length[1]'));

		    if($this->form_validation->run() === FALSE){
		    	
		        $this->load_view('auth/groups_menu_form',$data); 
		        
		    }else{

		    	
		    	$this->Groups_model->edit_groups_menu($groups_id);//编辑权限组

		    	$groups_name = $this->Groups_model->get_groups_by_groups_id($groups_id);//获取更新后的分类名

		       	$this->session->set_flashdata('success', '【'.$groups_name['name'].'】'.lang('gl_success_edit_menu'));

		       	redirect('admin/groups','refresh');

		    }
			
		}else{

			$this->session->set_flashdata('error', lang('gl_error_global').gettype($gm_id));
			redirect('admin/groups','refresh');
		}

	}

	//参数设置
	public function edit_setting($groups_id){

		$groups_id = (int)$groups_id;//类型转换处理不严格，后面修改

		if(is_int($groups_id) || is_integer($groups_id)){

			//*操作*
			$data['g_action'] = 'edit_setting';

			$data['base_url'] = $this->config->item('base_url');

			//用户组
			$data['groups'] = $this->Groups_model->get_groups_by_groups_id($groups_id);

			//参数
			$data['groups_settings'] = $this->Groups_model->get_groups_setting_by_groups_id($groups_id);
			
			//加载相关类库
			$this->load->helper('form');
		    $this->load->library('form_validation');

		    $this->form_validation->set_rules('vote_more', lang('gsl_help_vote_more'),array('trim','required','min_length[1]'));

		    if($this->form_validation->run() === FALSE){
		    	
		        $this->load_view('auth/groups_setting_form',$data); 

		    }else{

		    	$this->Groups_model->edit_groups_setting($groups_id);//编辑参数设置

		    	$groups_name = $this->Groups_model->get_groups_by_groups_id($groups_id);//获取更新后的分类名

		       	$this->session->set_flashdata('success', '【'.$groups_name['name'].'】'.lang('gl_success_edit_setting'));

		       	redirect('admin/groups','refresh');

		    }
			
		}else{

			$this->session->set_flashdata('error', lang('gl_error_global').gettype($gm_id));
			redirect('admin/groups','refresh');
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