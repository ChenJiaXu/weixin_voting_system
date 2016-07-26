<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Image_Space extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('admin/menu/Menu_model');
	}

	public function index(){

		$data['is_add_link'] = 'image_space/add';
		$data['is_edit_link'] = 'image_space/edit';
		$data['is_delete_link'] = 'image_space/delete';

		$data['base_url'] = $this->config->item('base_url');

		$this->load_view('user/image_space',$data);
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