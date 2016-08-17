<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Option_Value extends MY_Controller {

	/**
	 * 选项
	 * 
	 */
	function __construct(){
		parent::__construct();
		$this->load->model('admin/menu/Menu_model');
		
		$this->load->model('admin/option/Option_Value_model');
		$this->lang->load('admin/option/option_value');
	}
	
	//选项-默认方法
	public function index(){
		
		$data['ov_add_link'] = 'option_value/add';
		$data['ov_edit_link'] = 'option_value/edit';
		$data['ov_delete_link'] = 'option_value/delete';

		$data['base_url'] = $this->config->item('base_url');

		//获取列表数据
		$option_values = $this->Option_Value_model->getOV();

		$data['option_values'] = array();

		foreach ($option_values as $ovs) {
			$data['option_values'][] = array(
				'ov_id' => $ovs['ov_id'],
				'key'	=> $ovs['key'],
				'value'	=> $ovs['value'],
				'ot_type' => $this->Option_Value_model->getOT_by_ot_id($ovs['ot_id']),//根据选项类型ID获取name 
				'edit' => 'option_value/edit/'.$ovs['ov_id'],
				'delete' => 'option_value/delete/'.$ovs['ov_id']
			);
		}
		
		$this->load_view('option/option_value',$data); 
	
	}

	//新增选项
	public function add(){
	
		//*操作*
		$data['ov_action'] = 'add';	
		$data['base_url'] = $this->config->item('base_url');
		
		//选项类型
		$data['ot_types'] = $this->Option_Value_model->getOT();

		//加载相关类库
		$this->load->helper('form');
	    $this->load->library('form_validation');

	    //设置校验规则	    
	    $this->form_validation->set_rules('key', lang('ovl_help_key'), 
	    	array(
	    		//配置常规校验
	    		'trim',
	    		'required',
	    		'min_length[1]'
	    	)
	    );
	    $this->form_validation->set_rules('value', lang('ovl_help_value'), 
	    	array(
	    		//配置常规校验
	    		'trim',
	    		'required',
	    		'min_length[1]'
	    	)
	    );
	    $this->form_validation->set_rules('ot_id', lang('ovl_help_ot_id'), 
	    	array(
	    		//配置常规校验
	    		'trim',
	    		'required',
	    		'min_length[1]'
	    	)
	    );
	    
	    if($this->form_validation->run() === FALSE){
	    	
			$this->load_view('option/option_value_form',$data); 

	    }else{
	       $this->Option_Value_model->add_option_value();//添加选项,返回新插入数据ID

	       $new_ov_id = $this->Option_Value_model->get_option_value_new_ov_id();

	       $new_key = $this->Option_Value_model->get_option_value_by_ov_id($new_ov_id);//根据ID获取新插入数据的名称

	       $this->session->set_flashdata('success', '【'.$new_key['key'].'】'.lang('ovl_success_add'));

	       redirect('admin/option_value','refresh');
	    }

	}

	/*
	*	选项--编辑更新方法
	*	-------------------------------------------
	*	已完成
	*		1.根据ID更新分类
	*	未完成
	*		1.$ov_id类型验证
	*	-------------------------------------------
	*/
	public function edit($ov_id){

		$ov_id = (int)$ov_id;//类型转换处理不严格，后面修改

		if(is_int($ov_id) || is_integer($ov_id)){

			//*操作*
			$data['ov_action'] = 'edit';

			$data['ovs'] = $this->Option_Value_model->get_option_value_by_ov_id($ov_id);

			$data['base_url'] = $this->config->item('base_url');

			//选项类型
			$data['ot_types'] = $this->Option_Value_model->getOT();

			//加载相关类库
			$this->load->helper('form');
		    $this->load->library('form_validation');

		    //设置校验规则
			$this->form_validation->set_rules('key', lang('ovl_help_key'), 
		    	array(
		    		//配置常规校验
		    		'trim',
		    		'required',
		    		'min_length[1]'
		    	)
		    );
		    $this->form_validation->set_rules('value', lang('ovl_help_value'), 
		    	array(
		    		//配置常规校验
		    		'trim',
		    		'required',
		    		'min_length[1]'
		    	)
		    );
		    $this->form_validation->set_rules('ot_id', lang('ovl_help_ot_id'), 
		    	array(
		    		//配置常规校验
		    		'trim',
		    		'required',
		    		'min_length[1]'
		    	)
		    );

		    if($this->form_validation->run() === FALSE){
		    	
		        $this->load_view('option/option_value_form',$data); 

		    }else{

		    	$this->Option_Value_model->edit_option_value($ov_id);//编辑选项
		    	$new_key = $this->Option_Value_model->get_option_value_by_ov_id($ov_id);//获取更新后的分类名
		       	$this->session->set_flashdata('success', '【'.$new_key['key'].'】'.lang('ovl_success_edit'));
		       	redirect('admin/option_value','refresh');

		    }
			
		}else{

			$this->session->set_flashdata('error', lang('ovl_error_global').gettype($ov_id));
			redirect('admin/option_value','refresh');
		}

	}

	/*
	*	选项删除方法
	*	-------------------------------------------
	*	已完成
	*		1.根据ID删除分类
	*	后续补充
	*		1.判断该分类下是否存在活动
	*		2.是否有权限删除
	*		3.批量删除
	*		4.$ov_id类型验证
	*	-------------------------------------------
	*/
	public function delete($ov_id){

		$ov_id = (int)$ov_id;//类型转换处理不严格，后面修改
		
		if(is_int($ov_id) || is_integer($ov_id)){

			$result = $this->Option_Value_model->delete_option_value_by_ov_id($ov_id);

			if($result){
				
				$this->session->set_flashdata('success', lang('ovl_success_delete'));
				redirect('admin/option_value','refresh');

			}else{
				
				$this->session->set_flashdata('error', lang('ovl_error_delete'));
				redirect('admin/option_value','refresh');
			}
		}else{

			$this->session->set_flashdata('error', lang('ovl_error_global').gettype($ov_id));
			redirect('admin/option_value','refresh');
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