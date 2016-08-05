<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Voting_Management extends MY_Controller {

	/**
	 * 投票活动管理
	 * 
	 */
	function __construct(){
		parent::__construct();
		$this->load->model('admin/menu/Menu_model');
		//投票分类
		$this->load->model('admin/vote/Voting_Classification_model');
		$this->lang->load('admin/vote/voting_classification');
		//投票活动
		$this->load->model('admin/vote/Voting_Management_model');
		$this->lang->load('admin/vote/voting_management');
		//基础人员信息
		$this->load->model('admin/user/Basic_Personnel_model');
		//活动预览
		$this->lang->load('admin/vote/activity_preview');
	}
	
	//投票活动-默认方法
	public function index(){
		
		$data['vm_add_link'] = 'voting_management/add';
		$data['vm_edit_link'] = 'voting_management/edit';
		$data['vm_delete_link'] = 'voting_management/delete';
		$data['vm_ap_link'] = 'voting_management/ap';
		$data['base_url'] = $this->config->item('base_url');
		//自动更新
		$this->Voting_Management_model->update_voting_management_by_now();
		
		//获取列表数据
		$data['voting_managements'] = $this->Voting_Management_model->getVM();
		
		$this->load_view('vote/voting_management',$data);
	
	}

	//新增投票活动信息
	public function add(){
		
		//------------------------vc----------------------------------------
		//$data['vcl_name'] = lang('vcl_name');
		$data['vcs'] = $this->Voting_Classification_model->getVC();

		//-----------------------basic_personnel----------------------------
		//$data['vml_basic_personnel'] = lang('vml_basic_personnel');
		$data['bps'] = array();
		$result = $this->Basic_Personnel_model->getBP();
		foreach ($result as $r) {
			$data['bps'][] = array(
				'id' => $r['bp_id'],
				'text' => $r['name']
			);
		}

		//------------------------vm-----------------------------------------
		//*操作*
		$data['vm_action'] = 'add';


		$data['base_url'] = $this->config->item('base_url');
		
		//加载相关类库
		$this->load->helper('form');
	    $this->load->library('form_validation');

	    //设置校验规则

	    //活动标题
	    $this->form_validation->set_rules('title', lang('vml_help_title'), 
	    	array(
	    		//配置常规校验
	    		'trim',
	    		'required',
	    		'min_length[1]'
	    	)
	    );
	    //活动描述
	    $this->form_validation->set_rules('description', lang('vml_help_description'), 
	    	array(
	    		//配置常规校验
	    		'trim',
	    		'required',
	    		'min_length[1]'
	    	)
	    );
	    //开始日期
	    $this->form_validation->set_rules('date_start', lang('vml_help_date_start'), 
	    	array(
	    		//配置常规校验
	    		'trim',
	    		'required'
	    	)
	    );
	    //结束日期
	    $this->form_validation->set_rules('date_end', lang('vml_help_date_end'), 
	    	array(
	    		//配置常规校验
	    		'trim',
	    		'required'
	    	)
	    );
	    //配置参与活动人员
	    $this->form_validation->set_rules('vm_bp', lang('vml_help_vm_bp'), 
	    	array(
	    		//配置常规校验
	    		'trim',
	    		'required'
	    	)
	    );

	    if($this->form_validation->run() === FALSE){
	    	
			$this->load_view('vote/voting_management_form',$data);

	    }else{

	       $vm_id = $this->Voting_Management_model->add_voting_management();//添加活动分类,返回新插入数据ID

	       $new_title = $this->Voting_Management_model->get_voting_management_by_vm_id($vm_id);//根据ID获取新插入数据的名称
			
	       $this->session->set_flashdata('success', '【'.$new_title['title'].'】'.lang('vml_success_add'));

	       redirect('admin/voting_management','refresh');
	    }

	}

	/*
	*	活动信息--编辑更新方法
	*	-------------------------------------------
	*	已完成
	*		1.根据ID更新分类
	*	未完成
	*		1.$vm_id类型验证
	*	-------------------------------------------
	*/
	public function edit($vm_id){

		$vm_id = (int)$vm_id;//类型转换处理不严格，后面修改

		if(is_int($vm_id) || is_integer($vm_id)){

			//------------------------vc----------------------------------------
			//$data['vcl_name'] = lang('vcl_name');
			$data['vcs'] = $this->Voting_Classification_model->getVC();

			//-----------------------basic_personnel----------------------------
			//$data['vml_basic_personnel'] = lang('vml_basic_personnel');
			$data['bps'] = array();
			$result = $this->Basic_Personnel_model->getBP();
			foreach ($result as $r) {
				$data['bps'][] = array(
					'id' => $r['bp_id'],
					'text' => $r['name']
				);
			}

			//------------------------vm----------------------------------------
			
			//*操作*
			$data['vm_action'] = 'edit';

			//根据活动信息ID获取对应数据
			$data['vms'] = $this->Voting_Management_model->get_voting_management_by_vm_id($vm_id);

			//根据活动信息获取关联分类数据
			$data['vm_vc'] = $this->Voting_Management_model->get_vm_vc_by_vm_id($vm_id);

			//根据活动信息获取关联人员ID
			//$data['vm_bps'] = $this->Voting_Management_model->get_vm_bp_by_vm_id((int)$vm_id);
			$vm_bp_result = $this->Voting_Management_model->get_vm_bp_by_vm_id((int)$vm_id);
			$count = 1;
			$string = NULL;
			foreach ($vm_bp_result as $vbr) {
				if(count($vbr) < $count){
					$string .= ",";
				}
				$string .= json_encode($vbr['id']);
				$count++;
			}
			$data['vm_bps'] = $string;
			
		
			$data['base_url'] = $this->config->item('base_url');

			//加载相关类库
			$this->load->helper('form');
		    $this->load->library('form_validation');

		    //设置校验规则
			//活动标题
		    $this->form_validation->set_rules('title', lang('vml_help_title'), 
		    	array(
		    		//配置常规校验
		    		'trim',
		    		'required',
		    		'min_length[1]'
		    	)
		    );
		    //活动描述
		    $this->form_validation->set_rules('description', lang('vml_help_description'), 
		    	array(
		    		//配置常规校验
		    		'trim',
		    		'required',
		    		'min_length[1]'
		    	)
		    );
		    //开始日期
		    $this->form_validation->set_rules('date_start', lang('vml_help_date_start'), 
		    	array(
		    		//配置常规校验
		    		'trim',
		    		'required'
		    	)
		    );
		    //结束日期
		    $this->form_validation->set_rules('date_end', lang('vml_help_date_end'), 
		    	array(
		    		//配置常规校验
		    		'trim',
		    		'required'
		    	)
		    );
		    //配置参与活动人员
		    $this->form_validation->set_rules('vm_bp', lang('vml_help_vm_bp'), 
		    	array(
		    		//配置常规校验
		    		'trim',
		    		'required'
		    	)
		    );

		    if($this->form_validation->run() === FALSE){
		    	
				$this->load_view('vote/voting_management_form',$data);

		    }else{

		    	$this->Voting_Management_model->edit_voting_management($vm_id);//编辑活动信息

		    	$new_title = $this->Voting_Management_model->get_voting_management_by_vm_id($vm_id);//获取更新后的活动信息标题

		       	$this->session->set_flashdata('success', '【'.$new_title['title'].'】'.lang('vml_success_edit'));

		       	redirect('admin/voting_management','refresh');

		    }
			
		}else{

			$this->session->set_flashdata('error', lang('vml_error_global').gettype($vm_id));
			redirect('admin/voting_management','refresh');
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
	*		4.$vm_id类型验证
	*	-------------------------------------------
	*/
	public function delete($vm_id){

		$vm_id = (int)$vm_id;//类型转换处理不严格，后面修改
		
		if(is_int($vm_id) || is_integer($vm_id)){

			$result = $this->Voting_Management_model->delete_voting_management_by_vm_id($vm_id);

			if($result){
				
				$this->session->set_flashdata('success', lang('vml_success_delete'));
				redirect('admin/voting_management','refresh');

			}else{
				
				$this->session->set_flashdata('error', lang('vml_error_delete'));
				redirect('admin/voting_management','refresh');
			}
		}else{

			$this->session->set_flashdata('error', lang('vml_error_global').gettype($vm_id));
			redirect('admin/voting_management','refresh');
		}
	}


	/*
	*	投票活动--预览功能
	*	-------------------------------------------
	*	已完成
	*		1.根据ID删除分类
	*	-------------------------------------------
	*/
	//活动预览
	public function ap($vm_id){

		if (!$this->ion_auth->logged_in()){
			redirect('auth/login', 'refresh');
		}
		
		//加载相关类库
		$this->load->helper('form');
	    $this->load->library('form_validation');
		
		$data['base_url'] = $this->config->item('base_url');
	
		//访问流量+1
		$data['vm_traffic'] = $this->Voting_Management_model->get_vm_traffic_by_vm_id($vm_id);
		
		//加载数据
		$data['ap'] = $this->Voting_Management_model->get_voting_management_by_vm_id($vm_id);//根据投票活动ID获取对应数据
		$data['vm_bp'] = $this->Voting_Management_model->get_ap_by_vm_id($vm_id);//根据投票活动ID获取本次活动参与者
		$data['bp_image'] = array();
		foreach ($data['vm_bp'] as $vm_bp) {
			$bp_image = $this->Voting_Management_model->get_bp_image_by_bp_id($vm_bp['bp_id'],$main_image = 1);

			$data['bp_image'][] = array(
				'bp_id' => $vm_bp['bp_id'],
				'image' => $bp_image['image']
			);	
		}
		
		
		$data['base_url'] = $this->config->item('base_url');

		$this->load_view('vote/activity_preview',$data);
		
	}
	
	//投票
	public function votes(){
		$vm_id = $_POST['vm_id'];
		$bp_id = $_POST['bp_id'];
		$this->Voting_Management_model->add_votes_by_vm_bp($vm_id,$bp_id);
		echo '投票成功';
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