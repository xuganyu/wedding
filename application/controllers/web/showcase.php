<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Showcase extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model("web/showcase_mod");
	}
	public function index(){
		$id_a = $this->uri->segment(2, 1);
		$id_c = $this->uri->segment(4, 1);
		$data['id_a'] = $this->uri->segment(2, 1);
		$data['id_c'] = $this->uri->segment(4, 1);
		//分页使用的
		$page = $this->uri->segment(4, 1);
		$limit = 10;
		$start = ($page-1) * $limit;
		$count_all = $this->showcase_mod->news_types_all(1);
		//$counts_all = $this->showcase_mod->news_types_all(2);
		
		//生成分页链接,分页配置在libraries文件夹里
		$this->load->library('pages');
		$config['base_url'] = base_url("web/showcase/index/");
		$config['total_rows'] = $count_all;
		$config['per_page'] = $limit;
		$config['uri_segment'] =4;
		$config['use_page_numbers'] = TRUE;
		$this->pages->initialize($config);
		$data['page_links'] = $this->pages->create_links();
		//获取栏目信息
		$data['list'] = $this->showcase_mod->list_types_news(1, $start, $limit);
		//$data['edit'] = $this->showcase_mod->list_types_news(2, $start, $limit);
	    $data['page'] = ceil($count_all / $limit);
	   // $data['pages'] = ceil($counts_all / $limit);
	   
		$this->load->view('web/showcase_list',$data);
	}
	
	//读取文章详细内容
	public function items(){
	    $id_a = $this->uri->segment(1, 1);
		$id_b = $this->uri->segment(2, 1);
		$id_c = $this->uri->segment(4, 1);
		
	
		$data['id_a'] = $this->uri->segment(1, 1);
		$data['id_b'] = $this->uri->segment(2, 1);
		$data['id_c'] = $this->uri->segment(4, 1);
		
	
		//获取当前新闻
		$data['edit'] = $this->showcase_mod->get_news($id_c);
		
	
		/* //右侧广告
		$data['big_img'] = $this->seo_mod->list_advertisement(1,1);  //大图
		$data['sim_img'] = $this->seo_mod->list_advertisement(2,4);  //小图
	 */
		
		if(empty($data['edit'])){
			alert("对不起您查看的新闻已经关闭","../../main");
			exit;
		}
	
	    $this->load->view('web/showcase_item', $data);
		
	}
}