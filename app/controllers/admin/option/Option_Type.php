<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Option_Type extends MY_Controller {

	/**
	 * 选项类型
	 * 
	 */
	function __construct(){
		parent::__construct();
		$this->load->model('admin/menu/Menu_model');
		
		$this->load->model('admin/option/Option_Type_model');
		$this->lang->load('admin/option/option_type');
	}
	
	//选项类型-默认方法
	public function index(){
		
		$data['ot_add_link'] = 'option_type/add';
		$data['ot_edit_link'] = 'option_type/edit';
		$data['ot_delete_link'] = 'option_type/delete';

		$data['base_url'] = $this->config->item('base_url');

		//获取列表数据
		$option_types = $this->Option_Type_model->getOT();

		$data['option_types'] = array();

		foreach ($option_types as $ots) {
			$data['option_types'][] = array(
				'ot_id' => $ots['ot_id'],
				'name'	=> $ots['name'],
				'type'	=> $ots['type'],
				'edit' => 'option_type/edit/'.$ots['ot_id'],
				'delete' => 'option_type/delete/'.$ots['ot_id']
			);
		}
		
		$this->load_view('option/option_type',$data); 
	
	}

	//新增选项类型
	public function add(){
	
		//*操作*
		$data['ot_action'] = 'add';	
		$data['base_url'] = $this->config->item('base_url');
		
		//加载相关类库
		$this->load->helper('form');
	    $this->load->library('form_validation');

	    //设置校验规则
	    $this->form_validation->set_rules('name', lang('otl_help_name'), 
	    	array(
	    		//配置常规校验
	    		'trim',
	    		'required',
	    		'min_length[1]'
	    	)
	    );
	    $this->form_validation->set_rules('type', lang('otl_help_type'), 
	    	array(
	    		//配置常规校验
	    		'trim',
	    		'required',
	    		'min_length[1]'
	    	)
	    );

	    if($this->form_validation->run() === FALSE){
	    	
			$this->load_view('option/option_type_form',$data); 

	    }else{
	       $this->Option_Type_model->add_option_type();//添加选项类型,返回新插入数据ID

	       $new_ot_id = $this->Option_Type_model->get_option_type_new_ot_id();

	       $new_name = $this->Option_Type_model->get_option_type_by_ot_id($new_ot_id);//根据ID获取新插入数据的名称

	       $this->session->set_flashdata('success', '【'.$new_name['name'].'】'.lang('otl_success_add'));

	       redirect('admin/option_type','refresh');
	    }

	}

	/*
	*	选项类型--编辑更新方法
	*	-------------------------------------------
	*	已完成
	*		1.根据ID更新分类
	*	未完成
	*		1.$ot_id类型验证
	*	-------------------------------------------
	*/
	public function edit($ot_id){

		$ot_id = (int)$ot_id;//类型转换处理不严格，后面修改

		if(is_int($ot_id) || is_integer($ot_id)){

			//*操作*
			$data['ot_action'] = 'edit';

			$data['ots'] = $this->Option_Type_model->get_option_type_by_ot_id($ot_id);

			$data['base_url'] = $this->config->item('base_url');

			//加载相关类库
			$this->load->helper('form');
		    $this->load->library('form_validation');

		    //设置校验规则
			$this->form_validation->set_rules('name', lang('otl_help_name'), 
		    	array(
		    		//配置常规校验
		    		'trim',
		    		'required',
		    		'min_length[1]'
		    	)
		    );
		    $this->form_validation->set_rules('type', lang('otl_help_type'), 
		    	array(
		    		//配置常规校验
		    		'trim',
		    		'required',
		    		'min_length[1]'
		    	)
		    );

		    if($this->form_validation->run() === FALSE){
		    	
		        $this->load_view('option/option_type_form',$data); 

		    }else{

		    	$this->Option_Type_model->edit_option_type($ot_id);//编辑选项类型

		    	$new_name = $this->Option_Type_model->get_option_type_by_ot_id($ot_id);//获取更新后的分类名

		       	$this->session->set_flashdata('success', '【'.$new_name['name'].'】'.lang('otl_success_edit'));

		       	redirect('admin/option_type','refresh');
		    }
			
		}else{

			$this->session->set_flashdata('error', lang('otl_error_global').gettype($ot_id));
			redirect('admin/option_type','refresh');
		}

	}

	/*
	*	选项类型删除方法
	*	-------------------------------------------
	*	已完成
	*		1.根据ID删除分类
	*	后续补充
	*		1.判断该分类下是否存在活动
	*		2.是否有权限删除
	*		3.批量删除
	*		4.$ot_id类型验证
	*	-------------------------------------------
	*/
	public function delete($ot_id){

		$ot_id = (int)$ot_id;//类型转换处理不严格，后面修改
		
		if(is_int($ot_id) || is_integer($ot_id)){

			$result = $this->Option_Type_model->delete_option_type_by_ot_id($ot_id);

			if($result){
				
				$this->session->set_flashdata('success', lang('otl_success_delete'));
				redirect('admin/option_type','refresh');

			}else{
				
				$this->session->set_flashdata('error', lang('otl_error_delete'));
				redirect('admin/option_type','refresh');
			}
		}else{

			$this->session->set_flashdata('error', lang('otl_error_global').gettype($ot_id));
			redirect('admin/option_type','refresh');
		}
	}

	/**
	 * 加载视图
	 *	路径 =>	$path
	 *	数据 => $data
	 */
	private function load_view($path,$data){
		$data['lefts'] = $this->Menu_model->getMenu();
		$this->load->view('admin/common/header',$data);
		$this->load->view('admin/common/left',$data);
		$this->load->view('admin/'.$path,$data);
		$this->load->view('admin/common/footer',$data);
	}


}