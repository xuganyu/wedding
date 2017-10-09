<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model("admin/news_mod");
	}
	
	public function index(){
		$search = $this->input->get('keywords');
		
		$data['id_c'] = $this->input->get('per_page');
		
		if(empty($data['id_c'])){
			$data['id_c'] = 1;
		}
		$page = $this->input->get('per_page');
		if(empty($page)){
			$page = 1;
		}
        $limit = 10;
		$start = ($page-1) * $limit;
		$count_all = $this->news_mod->news_all($search);
		$this->load->library('pages');
		$config['base_url'] = base_url("admin/news/index?keywords=".$search);
		$config['first_url'] = base_url("admin/news/index?keywords=".$search."&per_page=1.html");
		$config['total_rows'] = $count_all;
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['use_page_numbers'] = TRUE;
		$config['page_query_string'] = TRUE;
		$this->pages->initialize($config);
		
		//获取栏目信息
		$data['page_links'] = $this->pages->create_links();
		$data['start'] =$count_all;
		$data['page'] = ceil($count_all / $limit);
		$data['list'] = $this->news_mod->list_news($search,$start,$limit);
		$data['keywords'] = $search;
		$this->load->view('admin/news_list',$data);
	}
	
	/**
	 *
	 * 添加广告图
	 */
	public function add(){
		$this->load->view('admin/news_add');
	}
	
	public function do_add(){
		//接收表单提交数据
		$title = $this->input->post("title", TRUE);
		$type_id = $this->input->post("type_id");
		$content = $this->input->post("content", TRUE);
		$user_name = $this->session->userdata('username', TRUE);
		    $data = array(
					'article_title' => $title,
		    		'types_id'=>$type_id,
		    		'article_content'=>$content,
					'article_close' => 0,
					'article_abc' => 0,
					'article_edme' => $user_name,
					'article_stime' => time(),
			);
			$this->db->insert('wudi_news_info', $data);
			alert("发布成功", "../news");
	}
	/**
	 *
	 * 编辑广告图
	 */
	public function edit(){
	$id = $this->uri->segment(4, 0);
	$data['edit'] = $this->news_mod->get_news($id);
	$this->load->view('admin/news_edit',$data);
	}
	
	public function do_edit(){
		//接收表单提交数据
		$title = $this->input->post("title", TRUE);
		$formid = $this->input->post("formid", TRUE);
		$type_id = $this->input->post("type_id");
		$user_name = $this->session->userdata('username', TRUE);
		$content = $this->input->post("content", TRUE);
		 $data = array(
					'article_title' => $title,
					'types_id' => $type_id,
					'article_edme' => $user_name,
					'article_stime' => time(),
			);
			$this->db->where('article_id', $formid);
			$this->db->update('wudi_news_info', $data);
			alert("修改成功", "../news");
	}
	
	/**
	 *
	 * 删除数据
	 */
	public function del(){
		$id = $this->uri->segment(4, 0);
		$this->db->where('article_id', $id);
		$this->db->delete('wudi_news_info');
		alert("删除成功", "../news");
	}
	
	/**
	 *
	 * 直接修改排序
	 */
	public function or_abc(){
	
		$or_abc = $this->input->post('or_abc');
		$abc_id = $this->input->post('abc_id');
	    $data = array(
				'article_abc' => $or_abc,
		);
	    $this->db->where('article_id', $abc_id);
		$this->db->update('wudi_news_info', $data);
	}
	
	/**
	 *
	 * 直接修改关闭
	 */
	public function close(){
	    $ids = $this->input->post("ids", TRUE);
		$val = $this->input->post("val", TRUE);
		$val = intval($val);
	
		$data=array(
				'article_close' => $val,
		);
	
		$this->db->where('article_id', $ids);
		$this->db->update('wudi_news_info', $data);
		echo true;
	}
}