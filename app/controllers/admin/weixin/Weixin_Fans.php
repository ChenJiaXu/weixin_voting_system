<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Weixin_Fans extends MY_Controller {

	/**
	 * 粉丝关注
	 * 
	 */
	function __construct(){
		parent::__construct();
		$this->load->model('admin/menu/Menu_model');
		
		$this->load->model('admin/weixin/Weixin_Fans_model');
		$this->lang->load('admin/weixin/weixin_fans');
	}
	
	//粉丝关注-默认方法
	public function index(){
		
		$data['base_url'] = $this->config->item('base_url');

		//获取列表数据
		$weixin_fanss = $this->Weixin_Fans_model->getWXF();

		$data['weixin_fanss'] = array();

		foreach ($weixin_fanss as $wxfs) {
			$data['weixin_fanss'][] = array(
				'wxf_id' => $wxfs['wxf_id'],
				'subscribe'	=> $wxfs['subscribe'],
				'openid'	=> $wxfs['openid'],
				'nickname'	=> $wxfs['nickname'],
				'sex' => $this->sex($wxfs['sex']),
				'location' => $wxfs['country'].'-'.$wxfs['province'].'-'.$wxfs['city'],
				'headimgurl' => $wxfs['headimgurl'],
				'subscribe_time' => date("Y-m-d H:i:s", $wxfs['subscribe_time']),
				'unionid' => $wxfs['unionid'],
				'remark' => $wxfs['remark'],
				'groupid' => $wxfs['groupid'],
				'date_add' => $wxfs['date_add'],
				'wxp_name' => $this->Weixin_Fans_model->get_weixin_attention($wxfs['wxf_id']),
				'read' => 'weixin_fans/read/'.$wxfs['wxf_id']
			);
		}
		
		$this->load_view('weixin/weixin_fans',$data); 
	
	}

	//粉丝关注-查阅方法
	public function read($wxf_id){
		var_dump($wxf_id);
		$wxf_id = (int)$wxf_id;//类型转换处理不严格，后面修改

		if(is_int($wxf_id) || is_integer($wxf_id)){

			$weixin_fanss = $this->Weixin_Fans_model->get_weixin_fans_by_wxf_id($wxf_id);

			$data['weixin_fanss'] = array();

			foreach ($weixin_fanss as $wxfs) {
				$data['weixin_fanss'][] = array(
					'subscribe'	=> $wxfs['subscribe'],
					'openid'	=> $wxfs['openid'],
					'nickname'	=> $wxfs['nickname'],
					'sex' => $this->sex($wxfs['sex']),
					'location' => $wxfs['country'].'-'.$wxfs['province'].'-'.$wxfs['city'],
					'headimgurl' => $wxfs['headimgurl'],
					'subscribe_time' => date("Y-m-d H:i:s", $wxfs['subscribe_time']),
					'unionid' => $wxfs['unionid'],
					'remark' => $wxfs['remark'],
					'groupid' => $wxfs['groupid'],
					'date_add' => $wxfs['date_add'],
					'wxp_name' => $this->Weixin_Fans_model->get_weixin_attention($wxfs['wxf_id'])
				);
			}

			$data['base_url'] = $this->config->item('base_url');

			$this->load_view('weixin/weixin_fans_form',$data); 

		}else{

			$this->session->set_flashdata('error', lang('wxpl_error_global').gettype($wxp_id));
			redirect('admin/weixin_fans','refresh');
		}

	}

	//性别匹配中文
	private function sex($data){
		switch ($data) {
			case 1:
				return '男';
				break;
			case 2:
				return '女';
				break;
			case 3:
				return '未知';
				break;
				
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