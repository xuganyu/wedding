<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {
	
	public function __construct(){
		
		parent::__construct();
		$this->load->model("web/main_mod");
	}
	public function index(){
		//广告图
		$data['adve_a'] = $this->main_mod->get_advertisement(1);
		$data['adve_b'] = $this->main_mod->get_advertisement(2);
		$data['adve_c'] = $this->main_mod->get_advertisement(3);  //首页小广告图
		$data['banner'] = $this->main_mod->list_banner();   //新闻图
		
		//活动展示
		$data['activity'] = $this->main_mod->get_activity();
		
		//用户展示
		if($this->session->userdata('user_login')){
		    $current_user = $this->db->where('Id', $this->session->userdata('user_id'))->get('wudi_user_info')->row_array();
		    if(strcmp($current_user['sex'], '男') == 0){
		        $data['sex'] = '男';
		        $data['females'] = $this->main_mod->get_females();
		    }else{
		        $data['sex'] = '女';
		        $data['males'] = $this->main_mod->get_males();
		    }
		}else{
		    $data['sex'] = '未知';
	        $data['females'] = $this->main_mod->get_females();
	        $data['males'] = $this->main_mod->get_males();
		}
		
		//案例展示
		$data['stories'] = $this->main_mod->get_stories();
		
		$this->load->view('web/index' ,$data);
	}
}