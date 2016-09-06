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
		$this->load->model('admin/config/Config_model');
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
		$data['voting_managements'] = array();
		$voting_managements = $this->Voting_Management_model->getVM($this->session->userdata('user_id'));

		foreach ($voting_managements as $vms) {
			$data['voting_managements'][] = array(
				'vm_id'	=> $vms['vm_id'],
				'title' => $vms['title'],
				'status' => $vms['status'],
				'date_start' => $vms['date_start'],
				'date_end' => $vms['date_end'],
				'statusing' => $vms['statusing'],
				'link' => $this->getVML($vms['vm_id'])
			);
		}
		
		$this->load_view('vote/voting_management',$data);
	
	}

	//获取活动对应的访问链接是否存在
	public function getVML($vm_id){
		$vm_link = $this->Voting_Management_model->get_vm_link_by_vm_id($vm_id);
		if($vm_link == null || $vm_link == ''){
			return false;
		}else{
			return $vm_link['link'];
		}
	}

	//新增投票活动信息
	public function add(){
		
		//------------------------vc----------------------------------------
		$data['vcs'] = $this->Voting_Classification_model->getVC($this->session->userdata('user_id'));

		//-----------------------basic_personnel----------------------------
		$data['bps'] = array();
		$result = $this->Basic_Personnel_model->getBP($this->session->userdata('user_id'));
		foreach ($result as $r) {
			$data['bps'][] = array(
				'id' => $r['bp_id'],
				'text' => $r['name']
			);
		}

		//------------------------vm-----------------------------------------

		//------------------------vm_rules-----------------------------------------
		$data['option_values_select_vote_limit'] = $this->Voting_Management_model->getOptionValue('select_vote_limit');
		$data['option_values_interval_time'] = $this->Voting_Management_model->getOptionValue('interval_time');

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

	    //规则配置--选项
	    $this->form_validation->set_rules('focus', lang('vml_help_focus'),array('trim','required'));//是否开启关注后投票
	    $this->form_validation->set_rules('vote_limit', lang('vml_help_vote_limit'),array('trim','required'));//是否开启投票次数限制
	    $this->form_validation->set_rules('select_vote_limit', lang('vml_help_select_vote_limit'),array('trim','required'));//可投票次数
	    $this->form_validation->set_rules('interval_time', lang('vml_help_interval_time'),array('trim','required'));//每次投票间隔时间
	    $this->form_validation->set_rules('online_reg', lang('vml_help_online_reg'),array('trim','required'));//开启在线报名

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
			$data['vcs'] = $this->Voting_Classification_model->getVC($this->session->userdata('user_id'));

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

			//根据活动信息获取关联广告图数据
			$data['vm_banners'] = $this->Voting_Management_model->get_vm_banner_by_vm_id((int)$vm_id);
			
			//vm_rules
			$data['vmr'] = $this->Voting_Management_model->get_vm_rules_by_vm_id((int)$vm_id);

			//------------------------vm_rules-----------------------------------------
			$data['option_values_select_vote_limit'] = $this->Voting_Management_model->getOptionValue('select_vote_limit');
			$data['option_values_interval_time'] = $this->Voting_Management_model->getOptionValue('interval_time');


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

		    //规则配置--选项
		    $this->form_validation->set_rules('focus', lang('vml_help_focus'),array('trim','required'));//是否开启关注后投票
		    $this->form_validation->set_rules('vote_limit', lang('vml_help_vote_limit'),array('trim','required'));//是否开启投票次数限制
		    $this->form_validation->set_rules('select_vote_limit', lang('vml_help_select_vote_limit'),array('trim','required'));//可投票次数
		    $this->form_validation->set_rules('interval_time', lang('vml_help_interval_time'),array('trim','required'));//每次投票间隔时间
		    $this->form_validation->set_rules('online_reg', lang('vml_help_online_reg'),array('trim','required'));//开启在线报名

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
		
		$data['vm_bp_vote_list'] = $this->Voting_Management_model->get_vm_bp_vote_list_by_vm_id($vm_id);//投票详细列表数据

		$data['bp_image'] = array();
		foreach ($data['vm_bp'] as $vm_bp) {
			$bp_image = $this->Voting_Management_model->get_bp_image_by_bp_id($vm_bp['bp_id'],$main_image = 1);
			if($bp_image['image'] == null || $bp_image['image'] == ''){
				$image = 'default.png';
			}else{
				$image = $bp_image['image'];
			}
			$data['bp_image'][] = array(
				'bp_id' => $vm_bp['bp_id'],
				'image' => $image
			);	
		}
		$data['vm_banner'] = $this->Voting_Management_model->get_vm_banner_by_vm_id($vm_id);//根据投票活动ID获取对应广告图数据

		$data['base_url'] = $this->config->item('base_url');

		$this->load_view('vote/activity_preview',$data);
		
	}
	
	//投票
	public function votes(){
		
		$vm_id = $_POST['vm_id'];//活动ID
		
		$vm_bp_id = $_POST['vm_bp_id'];//vm_bp_id 当前活动下对应人员ID

		//验证判断当前活动对应的规则
		$vm_rules = $this->Voting_Management_model->get_vm_rules_by_vm_id($vm_id);

		$focus = $vm_rules['focus'];//关注后投票0否1是
		$vote_limit = $vm_rules['vote_limit'];//投票次数限制0关闭1开启
		$select_vote_limit = $vm_rules['select_vote_limit'];//可投票次数0无次数限制
		$interval_time = $vm_rules['interval_time'];//投票间隔时间0不限制

		$ip = $this->getIP();

		//执行投票方法,插入数据（活动与人员ID,微信粉丝ID(0),姓名/昵称,ip地址,投票时间）
		if($focus == 0){//无需关注
			
			if($vote_limit == 0){//关闭投票次数限制

				if($interval_time == 0){//不限制投票间隔时间

					$wxf_id = 0; $name = '游客'; $voting_time = date('Y-m-d H:i:s');
					$this->Voting_Management_model->add_vm_bp_vote_list($vm_id,$vm_bp_id,$wxf_id,$name,$ip,$voting_time);
					echo "投票成功！！！";

				}else{//限制投票间隔时间

					//根据IP地址查询上一次投票时间
					$voting_time = $this->Voting_Management_model->get_vm_bp_vote_list_by_ip($vm_id,$ip);

					if($voting_time == null || $voting_time == ''){

						$wxf_id = 0; $name = '游客'; $voting_time = date('Y-m-d H:i:s');
						$this->Voting_Management_model->add_vm_bp_vote_list($vm_id,$vm_bp_id,$wxf_id,$name,$ip,$voting_time);
						echo "投票成功！！！";

					}else{
						//当前时间与上一次投票时间差是否大于（投票间隔时间）
						$time = (int)strtotime(date('Y-m-d H:i:s')) - (int)strtotime($voting_time['voting_time']);

						if($time > (int)$interval_time){
							$wxf_id = 0; $name = '游客'; $voting_time = date('Y-m-d H:i:s');
							$this->Voting_Management_model->add_vm_bp_vote_list($vm_id,$vm_bp_id,$wxf_id,$name,$ip,$voting_time);
							echo "投票成功！！！";
						}else if($time == (int)$interval_time || $time < (int)$interval_time){
							echo '请在【'.-(int)($time-$interval_time).'】秒后，再进行投票！';
						}
					}
					
				}

			}else{//开启投票次数限制

				//获取当前IP对本次活动相关人员进行的投票次数总计
				$total = $this->Voting_Management_model->get_vm_bp_vote_list_totalvotes_by_ip($vm_id,$ip);

				if($total < $select_vote_limit){

					if($interval_time == 0){//不限制投票间隔时间

						$wxf_id = 0; $name = '游客'; $voting_time = date('Y-m-d H:i:s');
						$this->Voting_Management_model->add_vm_bp_vote_list($vm_id,$vm_bp_id,$wxf_id,$name,$ip,$voting_time);
						echo "投票成功！！！";


					}else{//限制投票间隔时间

						//根据IP地址查询上一次投票时间
						$voting_time = $this->Voting_Management_model->get_vm_bp_vote_list_by_ip($vm_id,$ip);

						if($voting_time == null || $voting_time == ''){

							$wxf_id = 0; $name = '游客'; $voting_time = date('Y-m-d H:i:s');
							$this->Voting_Management_model->add_vm_bp_vote_list($vm_id,$vm_bp_id,$wxf_id,$name,$ip,$voting_time);
							echo "投票成功！！！";

						}else{
							//当前时间与上一次投票时间差是否大于（投票间隔时间）
							$time = (int)strtotime(date('Y-m-d H:i:s')) - (int)strtotime($voting_time['voting_time']);

							if($time > (int)$interval_time){
								$wxf_id = 0; $name = '游客'; $voting_time = date('Y-m-d H:i:s');
								$this->Voting_Management_model->add_vm_bp_vote_list($vm_id,$vm_bp_id,$wxf_id,$name,$ip,$voting_time);
								echo "投票成功！！！";
							}else if($time == (int)$interval_time || $time < (int)$interval_time){
								echo '请在【'.-(int)($time-$interval_time).'】秒后，再进行投票！';
							}
						}
						
					}

				}else{
					echo '本次活动只允许每个用户进行【'.$select_vote_limit.'】次投票';
				}
			}

		}else{
			
			//判断当前微信用户是否关注了该公众号
			//引导用户授权登录后,重定向回投票页面
			echo '投票必须关注微信公众号功能,尚未实现！后期再整合微信接口！';
		}
	}

	//获取用户真实 IP
	public function getIP()
	{
	    static $realip;
	    if (isset($_SERVER)){
	        if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])){
	            $realip = $_SERVER["HTTP_X_FORWARDED_FOR"];
	        } else if (isset($_SERVER["HTTP_CLIENT_IP"])) {
	            $realip = $_SERVER["HTTP_CLIENT_IP"];
	        } else {
	            $realip = $_SERVER["REMOTE_ADDR"];
	        }
	    } else {
	        if (getenv("HTTP_X_FORWARDED_FOR")){
	            $realip = getenv("HTTP_X_FORWARDED_FOR");
	        } else if (getenv("HTTP_CLIENT_IP")) {
	            $realip = getenv("HTTP_CLIENT_IP");
	        } else {
	            $realip = getenv("REMOTE_ADDR");
	        }
	    }
	 
	    return $realip;
	}

	//广告图上传
	public function upload(){
		
		$config['upload_path']      = $this->Config_model->getConfig('vm_upload_path');
        $config['allowed_types']    = $this->Config_model->getConfig('allow_image_type');
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

	//广告图删除
	public function del_banner(){
		$vm_banner_id = $_POST['vm_banner_id'];
		$banner = $_POST['banner'];

		$ok = false;

		$this->load->helper('file');
		$filename = get_file_info($this->Config_model->getConfig('vm_upload_path').$banner);
		if($filename == true){
			//第一步删除数据库表
			$this->Voting_Management_model->delete_vm_banner_by_vm_banner_id($vm_banner_id);
			//第二步删除upload/basic_personnel/下对应的图片
			$status = unlink($this->Config_model->getConfig('vm_upload_path').$banner);
			$ok = true;
		}else{
			$ok = false;
		}

		$this->output->set_content_type('application/json','utf-8')->set_output(json_encode($ok));
	}

	//生成链接
	public function create_link(){
		$vm_id = $_POST['vm_id'];//活动ID
		//先检查是否已经生成链接
		$check_vm_link_by_vm_id = $this->Voting_Management_model->check_vm_link_by_vm_id($vm_id);
		if($check_vm_link_by_vm_id == null || $check_vm_link_by_vm_id == ''){
			$vote_link = $this->config->item('base_url').'/home/vote/vote_activity/index/'.$vm_id;
			$this->Voting_Management_model->create_link_by_vm_id($vm_id,$vote_link);
			$this->output->set_content_type('application/json','utf-8')->set_output(json_encode('链接生成-成功'));
		}else{
			$this->output->set_content_type('application/json','utf-8')->set_output(json_encode('链接已存在,请点击复制链接按钮即可！'));
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