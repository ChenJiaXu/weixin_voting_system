<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Weixin_Public extends MY_Controller {

	/**
	 * 微信公众号
	 * 
	 */
	function __construct(){
		parent::__construct();
		$this->load->model('admin/menu/Menu_model');
		
		$this->load->model('admin/weixin/Weixin_Public_model');
		$this->lang->load('admin/weixin/weixin_public');
	}
	
	//公众号-默认方法
	public function index(){
		
		$data['wxp_add_link'] = 'weixin_public/add';
		$data['wxp_edit_link'] = 'weixin_public/edit';
		$data['wxp_delete_link'] = 'weixin_public/delete';

		$data['base_url'] = $this->config->item('base_url');

		//获取列表数据
		$weixin_publics = $this->Weixin_Public_model->getWXP();

		$data['weixin_publics'] = array();

		foreach ($weixin_publics as $wxps) {
			$data['weixin_publics'][] = array(
				'wxp_id' => $wxps['wxp_id'],
				'appid'	=> $wxps['appid'],
				'secret'	=> $wxps['secret'],
				'wxt_type' => $this->Weixin_Public_model->getWXT_by_wxt_id($wxps['wxt_id']),//根据公众号类型ID获取name 
				'sort'	=> $wxps['sort'],
				'status' => $wxps['status'],
				'date_add' => $wxps['date_add'],
				'name' => $wxps['name'],
				'edit' => 'weixin_public/edit/'.$wxps['wxp_id'],
				'delete' => 'weixin_public/delete/'.$wxps['wxp_id']
			);
		}
		
		$this->load_view('weixin/weixin_public',$data); 
	
	}

	//新增公众号
	public function add(){
	
		//*操作*
		$data['wxp_action'] = 'add';	
		$data['base_url'] = $this->config->item('base_url');
		
		//微信公众号类型
		$data['wxp_types'] = $this->Weixin_Public_model->getWXT();

		//加载相关类库
		$this->load->helper('form');
	    $this->load->library('form_validation');

	    //设置校验规则	    
	    $this->form_validation->set_rules('appid', lang('wxpl_help_appid'), 
	    	array(
	    		//配置常规校验
	    		'trim',
	    		'required',
	    		'min_length[1]'
	    	)
	    );
	    $this->form_validation->set_rules('secret', lang('wxpl_help_secret'), 
	    	array(
	    		//配置常规校验
	    		'trim',
	    		'required',
	    		'min_length[1]'
	    	)
	    );
	    $this->form_validation->set_rules('wxt_id', lang('wxpl_help_wxt_id'), 
	    	array(
	    		//配置常规校验
	    		'trim',
	    		'required',
	    		'min_length[1]'
	    	)
	    );
	    $this->form_validation->set_rules('sort', lang('wxpl_help_sort'), 
	    	array(
	    		//配置常规校验
	    		'trim',
	    		'required',
	    		'min_length[1]'
	    	)
	    );
	    $this->form_validation->set_rules('name', lang('wxpl_help_name'), 
	    	array(
	    		//配置常规校验
	    		'trim',
	    		'required',
	    		'min_length[1]'
	    	)
	    );

	    if($this->form_validation->run() === FALSE){
	    	
			$this->load_view('weixin/weixin_public_form',$data); 

	    }else{
	       $this->Weixin_Public_model->add_weixin_public();//添加公众号,返回新插入数据ID

	       $new_wxp_id = $this->Weixin_Public_model->get_weixin_public_new_wxp_id();

	       $new_name = $this->Weixin_Public_model->get_weixin_public_by_wxp_id($new_wxp_id);//根据ID获取新插入数据的名称

	       $this->session->set_flashdata('success', '【'.$new_name['name'].'】'.lang('wxpl_success_add'));

	       redirect('admin/weixin_public','refresh');
	    }

	}

	/*
	*	公众号--编辑更新方法
	*	-------------------------------------------
	*	已完成
	*		1.根据ID更新分类
	*	未完成
	*		1.$wxp_id类型验证
	*	-------------------------------------------
	*/
	public function edit($wxp_id){

		$wxp_id = (int)$wxp_id;//类型转换处理不严格，后面修改

		if(is_int($wxp_id) || is_integer($wxp_id)){

			//*操作*
			$data['wxp_action'] = 'edit';

			$data['wxps'] = $this->Weixin_Public_model->get_weixin_public_by_wxp_id($wxp_id);

			$data['base_url'] = $this->config->item('base_url');

			//微信公众号类型
			$data['wxp_types'] = $this->Weixin_Public_model->getWXT();

			//加载相关类库
			$this->load->helper('form');
		    $this->load->library('form_validation');

		    //设置校验规则
			$this->form_validation->set_rules('appid', lang('wxpl_help_appid'), 
		    	array(
		    		//配置常规校验
		    		'trim',
		    		'required',
		    		'min_length[1]'
		    	)
		    );
		    $this->form_validation->set_rules('secret', lang('wxpl_help_secret'), 
		    	array(
		    		//配置常规校验
		    		'trim',
		    		'required',
		    		'min_length[1]'
		    	)
		    );
		    $this->form_validation->set_rules('wxt_id', lang('wxpl_help_wxt_id'), 
		    	array(
		    		//配置常规校验
		    		'trim',
		    		'required',
		    		'min_length[1]'
		    	)
		    );
		    $this->form_validation->set_rules('sort', lang('wxpl_help_sort'), 
		    	array(
		    		//配置常规校验
		    		'trim',
		    		'required',
		    		'min_length[1]'
		    	)
		    );
		    $this->form_validation->set_rules('name', lang('wxpl_help_name'), 
		    	array(
		    		//配置常规校验
		    		'trim',
		    		'required',
		    		'min_length[1]'
		    	)
		    );

		    if($this->form_validation->run() === FALSE){
		    	
		        $this->load_view('weixin/weixin_public_form',$data); 

		    }else{

		    	$this->Weixin_Public_model->edit_weixin_public($wxp_id);//编辑公众号
		    	$new_name = $this->Weixin_Public_model->get_weixin_public_by_wxp_id($wxp_id);//获取更新后的分类名
		       	$this->session->set_flashdata('success', '【'.$new_name['name'].'】'.lang('wxpl_success_edit'));
		       	redirect('admin/weixin_public','refresh');

		    }
			
		}else{

			$this->session->set_flashdata('error', lang('wxpl_error_global').gettype($wxp_id));
			redirect('admin/weixin_public','refresh');
		}

	}

	/*
	*	公众号删除方法
	*	-------------------------------------------
	*	已完成
	*		1.根据ID删除分类
	*	后续补充
	*		1.判断该分类下是否存在活动
	*		2.是否有权限删除
	*		3.批量删除
	*		4.$wxp_id类型验证
	*	-------------------------------------------
	*/
	public function delete($wxp_id){

		$wxp_id = (int)$wxp_id;//类型转换处理不严格，后面修改
		
		if(is_int($wxp_id) || is_integer($wxp_id)){

			$result = $this->Weixin_Public_model->delete_weixin_public_by_wxp_id($wxp_id);

			if($result){
				
				$this->session->set_flashdata('success', lang('wxpl_success_delete'));
				redirect('admin/weixin_public','refresh');

			}else{
				
				$this->session->set_flashdata('error', lang('wxpl_error_delete'));
				redirect('admin/weixin_public','refresh');
			}
		}else{

			$this->session->set_flashdata('error', lang('wxpl_error_global').gettype($wxp_id));
			redirect('admin/weixin_public','refresh');
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