<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Voting_Classification extends MY_Controller {

	/**
	 * 投票分类
	 * 
	 */
	function __construct(){
		parent::__construct();
		$this->load->model('admin/menu/Menu_model');
		$this->load->model('admin/vote/Voting_Classification_model');
		$this->lang->load('admin/vote/voting_classification');
	}
	
	//投票分类-默认方法
	public function index(){
		
		$data['vc_add_link'] = 'voting_classification/add';
		$data['vc_edit_link'] = 'voting_classification/edit';
		$data['vc_delete_link'] = 'voting_classification/delete';

		$data['base_url'] = $this->config->item('base_url');

		//获取列表数据
		$data['voting_classifications'] = $this->Voting_Classification_model->getVC($this->session->userdata('user_id'));
		
		$this->load_view('vote/voting_classification',$data); 
	
	}

	//新增投票分类
	public function add(){
	
		//*操作*
		$data['vc_action'] = 'add';	
		$data['base_url'] = $this->config->item('base_url');
		
		//加载相关类库
		$this->load->helper('form');
	    $this->load->library('form_validation');

	    //设置校验规则

	    //分类名
	    $this->form_validation->set_rules('name', lang('vcl_help_name'), 
	    	array(
	    		//配置常规校验
	    		'trim',
	    		'required',
	    		'min_length[1]'
	    	)
	    );

	    if($this->form_validation->run() === FALSE){
	    	
			$this->load_view('vote/voting_classification_form',$data); 

	    }else{
	    	
	       $new_vc_id = $this->Voting_Classification_model->add_voting_classification();//添加活动分类,返回新插入数据ID

	       $new_name = $this->Voting_Classification_model->get_voting_classification_by_vc_id($new_vc_id);//根据ID获取新插入数据的名称

	       $this->session->set_flashdata('success', '【'.$new_name['name'].'】'.lang('vcl_success_add'));

	       redirect('admin/voting_classification','refresh');
	    }

	}

	/*
	*	活动分类--编辑更新方法
	*	-------------------------------------------
	*	已完成
	*		1.根据ID更新分类
	*	未完成
	*		1.$vc_id类型验证
	*	-------------------------------------------
	*/
	public function edit($vc_id){

		$vc_id = (int)$vc_id;//类型转换处理不严格，后面修改

		if(is_int($vc_id) || is_integer($vc_id)){

			//*操作*
			$data['vc_action'] = 'edit';

			$data['vcs'] = $this->Voting_Classification_model->get_voting_classification_by_vc_id($vc_id);

			$data['base_url'] = $this->config->item('base_url');

			//加载相关类库
			$this->load->helper('form');
		    $this->load->library('form_validation');

		    //设置校验规则

		    //分类名
		    $this->form_validation->set_rules('name', lang('vcl_help_name'), 
		    	array(
		    		//配置常规校验
		    		'trim',
		    		'required',
		    		'min_length[1]'
		    	)
		    );

		    if($this->form_validation->run() === FALSE){
		    	
		        $this->load_view('vote/voting_classification_form',$data); 

		    }else{

		    	$this->Voting_Classification_model->edit_voting_classification($vc_id);//编辑活动分类
		    	$new_name = $this->Voting_Classification_model->get_voting_classification_by_vc_id($vc_id);//获取更新后的分类名
		       	$this->session->set_flashdata('success', '【'.$new_name['name'].'】'.lang('vcl_success_edit'));
		       	redirect('admin/voting_classification','refresh');

		    }
			
		}else{

			$this->session->set_flashdata('error', lang('vcl_error_global').gettype($vc_id));
			redirect('admin/voting_classification','refresh');
		}

	}

	/*
	*	活动分类删除方法
	*	-------------------------------------------
	*	已完成
	*		1.根据ID删除分类
	*	后续补充
	*		1.判断该分类下是否存在活动
	*		2.是否有权限删除
	*		3.批量删除
	*		4.$vc_id类型验证
	*	-------------------------------------------
	*/
	public function delete($vc_id){

		$vc_id = (int)$vc_id;//类型转换处理不严格，后面修改
		
		if(is_int($vc_id) || is_integer($vc_id)){

			$result = $this->Voting_Classification_model->delete_voting_classification_by_vc_id($vc_id);

			if($result){
				
				$this->session->set_flashdata('success', lang('vcl_success_delete'));
				redirect('admin/voting_classification','refresh');

			}else{
				
				$this->session->set_flashdata('error', lang('vcl_error_delete'));
				redirect('admin/voting_classification','refresh');
			}
		}else{

			$this->session->set_flashdata('error', lang('vcl_error_global').gettype($vc_id));
			redirect('admin/voting_classification','refresh');
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