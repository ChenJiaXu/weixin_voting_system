<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Vote_Activity extends CI_Controller {

	/**
	 * 投票活动
	 * 
	 */
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		//投票活动
		$this->load->model('admin/vote/Voting_Management_model');
	}
	

	/*
	*	投票活动
	*	-------------------------------------------
	*/
	//活动预览
	public function index($vm_id){

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

		$this->load->view('home/vote/vote_activity',$data);
		
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
	public function getIP(){
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

}