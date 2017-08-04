<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		//islogin();
		
	}
	
	public function index(){
		
		/* //页面底部的文件开关
		$or_abc['indexmain'] = 1;   //不需要开启就设置为0
		$or_abc['formyz'] = 0;      //不需要开启就设置为0
		$or_abc['datatabel'] = 0;   //不需要开启就设置为0
		$or_abc['photoimg'] = 0;    //不需要开启就设置为0
		$or_abc['delall'] = 0;      //不需要开启就设置为0
		
		//$data['news'] = $this->main_mod->get_news();
		
		$years = date("Y", time());
		$today = time();
		$yesterday = date("Y-m-d",$today - (3600*24*1));
		
		$level = $this->session->userdata('level', TRUE);
		
		$data['product'] = $this->mpower_mod->product_all();
		$data['article'] = $this->mpower_mod->article_all();
		//$data['orders'] = $this->mpower_mod->orders_all();
		$data['seo'] = $this->mpower_mod->visitors_all();
		$data['message'] = $this->mpower_mod->message_all();
		//$data['list'] = $this->mpower_mod->get_message();
		
		//按年查询当月情况
		$data['a_vis'] = $this->mpower_mod->get_visitors($years,1);
		$data['b_vis'] = $this->mpower_mod->get_visitors($years,2);
		$data['c_vis'] = $this->mpower_mod->get_visitors($years,3);
		$data['d_vis'] = $this->mpower_mod->get_visitors($years,4);
		$data['e_vis'] = $this->mpower_mod->get_visitors($years,5);
		$data['f_vis'] = $this->mpower_mod->get_visitors($years,6);
		$data['g_vis'] = $this->mpower_mod->get_visitors($years,7);
		$data['h_vis'] = $this->mpower_mod->get_visitors($years,8);
		$data['i_vis'] = $this->mpower_mod->get_visitors($years,9);
		$data['j_vis'] = $this->mpower_mod->get_visitors($years,10);
		$data['k_vis'] = $this->mpower_mod->get_visitors($years,11);
		$data['l_vis'] = $this->mpower_mod->get_visitors($years,12);
		
		//按季度查询当月情况
		$data['a_ji_vis'] = $this->mpower_mod->get_visitors_target($years,1);
		$data['b_ji_vis'] = $this->mpower_mod->get_visitors_target($years,2);
		$data['c_ji_vis'] = $this->mpower_mod->get_visitors_target($years,3);
		$data['d_ji_vis'] = $this->mpower_mod->get_visitors_target($years,4);
		
		//查询当天总数
		$data['today'] = $this->mpower_mod->get_today();
		//查询昨天总数
		$data['yesterday'] = $this->mpower_mod->get_yesterday($yesterday);
		
		//查询当天总数
		$data['m_today'] = $this->mpower_mod->m_today();
		//查询昨天总数
		$data['m_yesterday'] = $this->mpower_mod->m_yesterday($yesterday);
		
		//查询当天总数
		$data['v_today'] = $this->mpower_mod->v_today();
		//查询昨天总数
		$data['v_yesterday'] = $this->mpower_mod->v_yesterday($yesterday);
		//echo $this->db->last_query();
		
		//$data['message_all'] = $this->mpower_mod->message_all(); */
		
		$this->load->view('admin/header');
	    $this->load->view('admin/menu');
		$this->load->view('admin/footer');
	}
	
}