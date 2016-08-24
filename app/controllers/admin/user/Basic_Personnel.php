<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Basic_Personnel extends MY_Controller {

	/**
	 * 基础人员信息管理
	 * 
	 */
	function __construct()
	{
		parent::__construct();
		$this->load->model('admin/menu/Menu_model');
		$this->lang->load('admin/user/basic_personnel');
		$this->load->model('admin/user/Basic_Personnel_model');
		$this->load->model('admin/config/Config_model');
	}
	
	//基础人员信息-默认方法
	public function index(){
		
		$data['bp_add_link'] = 'basic_personnel/add';
		$data['bp_edit_link'] = 'basic_personnel/edit';
		$data['bp_delete_link'] = 'basic_personnel/delete';

		$data['base_url'] = $this->config->item('base_url');

		//获取列表数据
		$data['basic_personnels'] = $this->Basic_Personnel_model->getBP();
		
		$this->load_view('user/basic_personnel',$data);
	
	}

	//新增--基础人员
	public function add(){
		
		//*操作*
		$data['bp_action'] = 'add';

		$data['base_url'] = $this->config->item('base_url');
		
		//加载相关类库
		$this->load->helper('form');
	    $this->load->library('form_validation');

	    //设置校验规则

	    //姓名
	    $this->form_validation->set_rules('name', lang('bpl_help_name'), 
	    	array(
	    		//配置常规校验
	    		'trim',
	    		'required',
	    		'min_length[1]'
	    	)
	    );

	    //自我描述
	    $this->form_validation->set_rules('description', lang('bpl_help_description'), 
	    	array(
	    		//配置常规校验
	    		'trim',
	    		'required',
	    		'min_length[1]'
	    	)
	    );

	    if($this->form_validation->run() === FALSE){
	    	
			$this->load_view('user/basic_personnel_form',$data);

	    }else{
	       $new_bp_id = $this->Basic_Personnel_model->add_basic_personnel();//添加活动分类,返回新插入数据ID

	       $new_name = $this->Basic_Personnel_model->get_basic_personnel_by_bp_id($new_bp_id);//根据ID获取新插入数据的名称

	       $this->session->set_flashdata('success', '【'.$new_name['name'].'】'.lang('bpl_success_add'));

	       redirect('admin/basic_personnel','refresh');
	    }

	}

	/*
	*	基础人员信息--编辑更新方法
	*	-------------------------------------------
	*	已完成
	*		1.根据ID更新分类
	*	未完成
	*		1.$bp_id类型验证
	*	-------------------------------------------
	*/
	public function edit($bp_id){

		
		$bp_id = (int)$bp_id;//类型转换处理不严格，后面修改

		if(is_int($bp_id) || is_integer($bp_id)){

			//*操作*
			$data['bp_action'] = 'edit';

			$data['bps'] = $this->Basic_Personnel_model->get_basic_personnel_by_bp_id($bp_id);

			$data['bp_images'] = $this->Basic_Personnel_model->get_bp_image_by_bp_id($bp_id);
			
			$data['base_url'] = $this->config->item('base_url');

			//加载相关类库
			$this->load->helper('form');
		    $this->load->library('form_validation');

		    //设置校验规则

		    //姓名
		    $this->form_validation->set_rules('name', lang('bpl_help_name'), 
		    	array(
		    		//配置常规校验
		    		'trim',
		    		'required',
		    		'min_length[1]'
		    	)
		    );

		    //自我描述
		    $this->form_validation->set_rules('description', lang('bpl_help_description'), 
		    	array(
		    		//配置常规校验
		    		'trim',
		    		'required',
		    		'min_length[1]'
		    	)
		    );

		    if($this->form_validation->run() === FALSE){
		    	
		        $this->load_view('user/basic_personnel_form',$data);
		    }else{

		    	$this->Basic_Personnel_model->edit_basic_personnel($bp_id);//编辑基础人员信息

		    	$new_name = $this->Basic_Personnel_model->get_basic_personnel_by_bp_id($bp_id);//获取更新后的姓名

		       	$this->session->set_flashdata('success', '【'.$new_name['name'].'】'.lang('bpl_success_edit'));
		       	
		       	redirect('admin/basic_personnel','refresh');

		    }
			
		}else{

			$this->session->set_flashdata('error', lang('bpl_error_global').gettype($bp_id));
			redirect('admin/basic_personnel','refresh');
		}

	}

	/*
	*	基础人员信息--删除方法
	*	-------------------------------------------
	*	已完成
	*		1.根据ID删除分类
	*	后续补充
	*		1.判断该分类下是否存在活动
	*		2.是否有权限删除
	*		3.批量删除
	*		4.$bp_id类型验证
	*	-------------------------------------------
	*/
	public function delete($bp_id){

		$bp_id = (int)$bp_id;//类型转换处理不严格，后面修改
		
		if(is_int($bp_id) || is_integer($bp_id)){

			//删除本地文件
			$bp_images = $this->Basic_Personnel_model->get_bp_image_by_bp_id($bp_id);
			foreach ($bp_images as $bpi) {
				unlink($this->Config_model->getConfig('bp_upload_path').$bpi['image']);
			}

			$result = $this->Basic_Personnel_model->delete_basic_personnel_by_bp_id($bp_id);

			if($result){
				
				$this->session->set_flashdata('success', lang('bpl_success_delete'));
				redirect('admin/basic_personnel','refresh');

			}else{
				
				$this->session->set_flashdata('error', lang('bpl_error_delete'));
				redirect('admin/basic_personnel','refresh');
			}
		}else{

			$this->session->set_flashdata('error', lang('bpl_error_global').gettype($bp_id));
			redirect('admin/basic_personnel','refresh');
		}
	}

	//用户图片上传
	public function upload(){
		/**
		 * 上传路径目前默认固定,后面再系统设置可以配置上传目录
		 */
		$config['upload_path']      = $this->Config_model->getConfig('bp_upload_path');
        $config['allowed_types']    = 'gif|jpg|png';
        $config['max_size']         = 0;
        $config['max_width']        = 0;
        $config['max_height']       = 0;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('file'))
        {
            $error = $this->upload->display_errors();

            $this->output->set_content_type('application/json','utf-8')->set_output(json_encode($error));
        }
        else
        {
            $data = $this->upload->data();

            $this->output->set_content_type('application/json','utf-8')->set_output(json_encode($data));
        }
	}

	//用户图片删除
	public function del_image(){
		$bp_image_id = $_POST['bp_image_id'];
		$image = $_POST['image'];

		$ok = false;

		$this->load->helper('file');
		$filename = get_file_info($this->Config_model->getConfig('bp_upload_path').$image);
		if($filename == true){
			//第一步删除数据库表
			$this->Basic_Personnel_model->delete_bp_image_by_bp_image_id($bp_image_id);
			//第二步删除upload/basic_personnel/下对应的图片
			$status = unlink($this->Config_model->getConfig('bp_upload_path').$image);
			$ok = true;
		}else{
			$ok = false;
		}

		$this->output->set_content_type('application/json','utf-8')->set_output(json_encode($ok));
	}

	//设置为主图
	public function add_main_image(){
		$bp_id = $_POST['bp_id'];
		$bp_image_id = $_POST['bp_image_id'];

		$main_iamge_all = $this->Basic_Personnel_model->get_main_image($bp_id);

		foreach ($main_iamge_all as $key) {
			if($key['main_image'] == 1){
				$main_image = 0;
				$this->Basic_Personnel_model->change_main_image($key['bp_image_id'],$main_image);
			}
		}
		$main_image = 1;
		$status = $this->Basic_Personnel_model->change_main_image($bp_image_id,$main_image);

		$this->output->set_content_type('application/json','utf-8')->set_output(json_encode($status));
	}

	//取消主图
	public function cancel_main_image(){
		$bp_id = $_POST['bp_id'];
		$bp_image_id = $_POST['bp_image_id'];
		
		$main_image = 0;
		$status = $this->Basic_Personnel_model->change_main_image($bp_image_id,$main_image);

		$this->output->set_content_type('application/json','utf-8')->set_output(json_encode($status));
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