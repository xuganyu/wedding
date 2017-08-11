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
		$this->load->view('web/index' ,$data);
	}
}