<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Weixin_Type extends MY_Controller {

	/**
	 * 微信公众号类型
	 * 
	 */
	function __construct(){
		parent::__construct();
		$this->load->model('admin/menu/Menu_model');
		
		$this->load->model('admin/weixin/Weixin_Type_model');
		$this->lang->load('admin/weixin/weixin_type');
	}
	
	//公众号类型-默认方法
	public function index(){
		
		$data['wxt_add_link'] = 'weixin_type/add';
		$data['wxt_edit_link'] = 'weixin_type/edit';
		$data['wxt_delete_link'] = 'weixin_type/delete';

		$data['base_url'] = $this->config->item('base_url');

		//获取列表数据
		$weixin_types = $this->Weixin_Type_model->getWXT();

		$data['weixin_types'] = array();

		foreach ($weixin_types as $wxts) {
			$data['weixin_types'][] = array(
				'wxt_id' => $wxts['wxt_id'],
				'name'	=> $wxts['name'],
				'sort'	=> $wxts['sort'],
				'status' => $wxts['status'],
				'date_add' => $wxts['date_add'],
				'edit' => 'weixin_type/edit/'.$wxts['wxt_id'],
				'delete' => 'weixin_type/delete/'.$wxts['wxt_id']
			);
		}
		
		$this->load_view('weixin/weixin_type',$data); 
	
	}

	//新增公众号类型
	public function add(){
	
		//*操作*
		$data['wxt_action'] = 'add';	
		$data['base_url'] = $this->config->item('base_url');
		
		//加载相关类库
		$this->load->helper('form');
	    $this->load->library('form_validation');

	    //设置校验规则

	    //分类名
	    $this->form_validation->set_rules('name', lang('wxtl_help_name'), 
	    	array(
	    		//配置常规校验
	    		'trim',
	    		'required',
	    		'min_length[1]'
	    	)
	    );
	    $this->form_validation->set_rules('sort', lang('wxtl_help_sort'), 
	    	array(
	    		//配置常规校验
	    		'trim',
	    		'required',
	    		'min_length[1]'
	    	)
	    );

	    if($this->form_validation->run() === FALSE){
	    	
			$this->load_view('weixin/weixin_type_form',$data); 

	    }else{
	       $this->Weixin_Type_model->add_weixin_type();//添加公众号类型,返回新插入数据ID

	       $new_wxt_id = $this->Weixin_Type_model->get_weixin_type_new_wxt_id();

	       $new_name = $this->Weixin_Type_model->get_weixin_type_by_wxt_id($new_wxt_id);//根据ID获取新插入数据的名称

	       $this->session->set_flashdata('success', '【'.$new_name['name'].'】'.lang('wxtl_success_add'));

	       redirect('admin/weixin_type','refresh');
	    }

	}

	/*
	*	公众号类型--编辑更新方法
	*	-------------------------------------------
	*	已完成
	*		1.根据ID更新分类
	*	未完成
	*		1.$wxt_id类型验证
	*	-------------------------------------------
	*/
	public function edit($wxt_id){

		$wxt_id = (int)$wxt_id;//类型转换处理不严格，后面修改

		if(is_int($wxt_id) || is_integer($wxt_id)){

			//*操作*
			$data['wxt_action'] = 'edit';

			$data['wxts'] = $this->Weixin_Type_model->get_weixin_type_by_wxt_id($wxt_id);

			$data['base_url'] = $this->config->item('base_url');

			//加载相关类库
			$this->load->helper('form');
		    $this->load->library('form_validation');

		    //设置校验规则

		    //分类名
		    $this->form_validation->set_rules('name', lang('wxtl_help_name'), 
		    	array(
		    		//配置常规校验
		    		'trim',
		    		'required',
		    		'min_length[1]'
		    	)
		    );
		    $this->form_validation->set_rules('sort', lang('wxtl_help_sort'), 
		    	array(
		    		//配置常规校验
		    		'trim',
		    		'required',
		    		'min_length[1]'
		    	)
		    );

		    if($this->form_validation->run() === FALSE){
		    	
		        $this->load_view('weixin/weixin_type_form',$data); 

		    }else{

		    	$this->Weixin_Type_model->edit_weixin_type($wxt_id);//编辑公众号类型
		    	$new_name = $this->Weixin_Type_model->get_weixin_type_by_wxt_id($wxt_id);//获取更新后的分类名
		       	$this->session->set_flashdata('success', '【'.$new_name['name'].'】'.lang('wxtl_success_edit'));
		       	redirect('admin/weixin_type','refresh');

		    }
			
		}else{

			$this->session->set_flashdata('error', lang('wxtl_error_global').gettype($wxt_id));
			redirect('admin/weixin_type','refresh');
		}

	}

	/*
	*	公众号类型删除方法
	*	-------------------------------------------
	*	已完成
	*		1.根据ID删除分类
	*	后续补充
	*		1.判断该分类下是否存在活动
	*		2.是否有权限删除
	*		3.批量删除
	*		4.$wxt_id类型验证
	*	-------------------------------------------
	*/
	public function delete($wxt_id){

		$wxt_id = (int)$wxt_id;//类型转换处理不严格，后面修改
		
		if(is_int($wxt_id) || is_integer($wxt_id)){

			$result = $this->Weixin_Type_model->delete_weixin_type_by_wxt_id($wxt_id);

			if($result){
				
				$this->session->set_flashdata('success', lang('wxtl_success_delete'));
				redirect('admin/weixin_type','refresh');

			}else{
				
				$this->session->set_flashdata('error', lang('wxtl_error_delete'));
				redirect('admin/weixin_type','refresh');
			}
		}else{

			$this->session->set_flashdata('error', lang('wxtl_error_global').gettype($wxt_id));
			redirect('admin/weixin_type','refresh');
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