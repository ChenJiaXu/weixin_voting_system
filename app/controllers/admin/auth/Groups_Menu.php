<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Groups_Menu extends MY_Controller {

	/**
	 * 权限组
	 * 
	 */
	function __construct(){
		parent::__construct();
		$this->load->model('admin/menu/Menu_model');

		$this->load->model('admin/auth/Groups_Menu_model');
		$this->lang->load('admin/auth/groups_menu');
	}
	
	//用户组-默认方法
	public function index(){
		
		
		$data['gm_edit_link'] = 'groups_menu/edit';
		

		$data['base_url'] = $this->config->item('base_url');

		$groups = $this->Groups_Menu_model->get_groups();
		$data['groups'] = array();

		foreach ($groups as $g) {
			$data['groups'][] = array(
				'id' => $g['id'],
				'name' => $g['name'],
				'description' => $g['description'],
				'edit' => 'groups_menu/edit/'.$g['id']
			);
		}

		$this->load_view('auth/groups_menu',$data); 
	
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
	public function edit($groups_id){

		$groups_id = (int)$groups_id;//类型转换处理不严格，后面修改

		if(is_int($groups_id) || is_integer($groups_id)){

			//*操作*
			$data['gm_action'] = 'edit';

			//用户组
			$data['groups'] = $this->Groups_Menu_model->get_groups_by_groups_id($groups_id);
			//用户组关联菜单
			$data['groups_menus'] = $this->Groups_Menu_model->get_groups_menu_by_groups_id($groups_id);
			//菜单
			$data['menus'] = $this->Menu_model->getMenu();

			$data['base_url'] = $this->config->item('base_url');

			//加载相关类库
			$this->load->helper('form');
		    $this->load->library('form_validation');

		    $this->form_validation->set_rules('groups_menu[]', lang('gml_help_groups_menu'), 
		    	array(
		    		'trim',
		    		'required',
		    		'min_length[1]'
		    	)
		    );

		    
		    if($this->form_validation->run() === FALSE){
		    	
		        $this->load_view('auth/groups_menu_form',$data); 

		    }else{

		    	$this->Groups_Menu_model->edit_groups_menu($groups_id);//编辑权限组

		    	$groups_name = $this->Groups_Menu_model->get_groups_by_groups_id($groups_id);//获取更新后的分类名

		       	$this->session->set_flashdata('success', '【'.$groups_name['name'].'】'.lang('gml_success_edit'));

		       	redirect('admin/groups_menu','refresh');

		    }
			
		}else{

			$this->session->set_flashdata('error', lang('gml_error_global').gettype($gm_id));
			redirect('admin/groups_menu','refresh');
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