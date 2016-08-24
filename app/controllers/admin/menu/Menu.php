<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends MY_Controller {

	/**
	 * 菜单配置
	 * 
	 */
	function __construct()
	{
		parent::__construct();
		$this->lang->load('admin/menu/menu');
		$this->load->model('admin/menu/Menu_model');
	}
	
	//菜单配置-默认方法
	public function index()
	{
		
		$data['menu_add_link'] = 'menu/add';
		$data['menu_edit_link'] = 'menu/edit';
		$data['menu_delete_link'] = 'menu/delete';

		$data['base_url'] = $this->config->item('base_url');

		/**
		 * 该方法用来比较(级别,所属)节点,友好处理给客户显示的菜单
		 */
		$menu_belong_to = $this->Menu_model->getMenu();

		$menus = $this->Menu_model->getMenu();

		$data['menus'] = array();

		foreach ($menus as $m) {
			$data['menus'][] = array(
				'menu_id' => $m['menu_id'],
				'name'	=> $m['name'],
				'level'	=> $m['level'],
				'belong_to'	=>	$this->compare($menu_belong_to,$m['level'],$m['belong_to']),
				'routing' => $m['routing'],
				'icon' => $m['icon'],
				'status' => $m['status'],
				'menu_edit_link' => 'menu/edit/'.$m['menu_id'],
				'menu_delete_link' => 'menu/delete/'.$m['menu_id']
			);
		}

		$this->load_view('menu/menu',$data);
	
	}

	//比较级别,更改所属节点显示方式
	private function compare($menu_belong_to,$level,$belong_to){

		foreach ($menu_belong_to as $mbt) {
			if($level == 1){
				return "==========";
			}else if($level == 2){
				if($belong_to == $mbt['menu_id']){
					return $mbt['name'];
				}
			}else if($level == 3){
				if($belong_to == $mbt['menu_id']){
					return $mbt['name'];
				}
			}
		}
	}

	//新增--菜单
	public function add(){
		
		//*操作*
		$data['menu_action'] = 'add';

		$data['base_url'] = $this->config->item('base_url');

		//获取所属节点集合
		$data['menu_belong_to'] = $this->Menu_model->getMenu();
		
		//加载相关类库
		$this->load->helper('form');
	    $this->load->library('form_validation');

	    /**
	     * 设置校验规则
	     */
	    //名称
	    $this->form_validation->set_rules('name', lang('ml_help_name'), array('trim','required','min_length[1]'));
	    //路由
 		$this->form_validation->set_rules('routing', lang('ml_help_routing'), array('trim','required','min_length[1]'));
	    //图标
	    $this->form_validation->set_rules('icon', lang('ml_help_icon'),array('trim','required','min_length[1]'));

	    if($this->form_validation->run() === FALSE){
	    	
			$this->load_view('menu/menu_form',$data);
	    }
	    else
	    {
	       $menu_id = $this->Menu_model->add_menu();//添加菜单,返回新插入数据ID

	       $new_name = $this->Menu_model->get_menu_by_menu_id($menu_id);//根据ID获取新插入数据的名称

	       $this->session->set_flashdata('success', '【'.$new_name['name'].'】'.lang('ml_success_add'));

	       redirect('admin/menu','refresh');
	    }

	}

	/*
	*	菜单配置--编辑更新方法
	*	-------------------------------------------
	*	已完成
	*		1.根据ID更新分类
	*	未完成
	*		1.$menu_id类型验证
	*	-------------------------------------------
	*/
	public function edit($menu_id){

		$menu_id = (int)$menu_id;//类型转换处理不严格，后面修改

		if(is_int($menu_id) || is_integer($menu_id)){

			//*操作*
			$data['menu_action'] = 'edit';

			$data['base_url'] = $this->config->item('base_url');

			//获取所属节点集合
			$data['menu_belong_to'] = $this->Menu_model->getMenu();

			//根据menu_id获取对应数据
			$data['menus'] = $this->Menu_model->get_menu_by_menu_id($menu_id);

			//加载相关类库
			$this->load->helper('form');
		    $this->load->library('form_validation');

		    /**
		     * 设置校验规则
		     */
		    //名称
		    $this->form_validation->set_rules('name', lang('ml_help_name'), array('trim','required','min_length[1]'));
		    //路由
	 		$this->form_validation->set_rules('routing', lang('ml_help_routing'), array('trim','required','min_length[1]'));
		    //图标
		    $this->form_validation->set_rules('icon', lang('ml_help_icon'),array('trim','required','min_length[1]'));

		    if($this->form_validation->run() === FALSE){
		    	
		        $this->load_view('menu/menu_form',$data); 
		    }else{

		    	$this->Menu_model->edit_menu($menu_id);//编辑基础人员信息

		    	$new_name = $this->Menu_model->get_menu_by_menu_id($menu_id);//获取更新后的姓名

		       	$this->session->set_flashdata('success', '【'.$new_name['name'].'】'.lang('ml_success_edit'));
		       	
		       	redirect('admin/menu','refresh');

		    }
			
		}else{

			$this->session->set_flashdata('error', lang('bpl_error_global').gettype($menu_id));
			redirect('admin/menu','refresh');
		}

	}

	/*
	*	菜单配置--删除方法
	*	-------------------------------------------
	*	已完成
	*		1.根据ID删除菜单
	*	后续补充
	*		1.判断该分类下是否存在活动
	*		2.是否有权限删除
	*		3.批量删除
	*		4.$menu_id类型验证
	*	-------------------------------------------
	*/
	public function delete($menu_id){

		$menu_id = (int)$menu_id;//类型转换处理不严格，后面修改
		
		if(is_int($menu_id) || is_integer($menu_id)){

			$result = $this->Menu_model->delete_menu_by_menu_id($menu_id);

			if($result){
				
				$this->session->set_flashdata('success', lang('ml_success_delete'));
				redirect('admin/menu','refresh');

			}else{
				
				$this->session->set_flashdata('error', lang('ml_error_delete'));
				redirect('admin/menu','refresh');
			}
		}else{

			$this->session->set_flashdata('error', lang('bpl_error_global').gettype($menu_id));
			redirect('admin/menu','refresh');
		}
	}

	public function auto_compare(){
		$level = $_POST['level'];
		if($level == 1){
			echo 'lv.1 为顶级节点,无需选择所属！默认即可！';
		}else if($level == 2){
			$level_one = $this->Menu_model->get_level_one();
			$this->output->set_content_type('application/json','utf-8')->set_output(json_encode($level_one));
		}else if($level == 3){
			$level_two = $this->Menu_model->get_level_two();
			$this->output->set_content_type('application/json','utf-8')->set_output(json_encode($level_two));
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