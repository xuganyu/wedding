<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stories extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model("web/stories_mod");
	}
	
	public function index(){
	    $order = $this->input->get('order');
	     
	    //分页使用的
	    $data['id_c'] = $this->input->get('per_page');
	    if(empty($data['id_c'])){
	        $data['id_c'] = 1;
	    }
	    $page = $this->input->get('per_page');
	    if(empty($page)){
	        $page = 1;
	    }
	    $limit = 5;
	    $start = ($page-1) * $limit;
	    $count_all = $this->stories_mod->count_all();
	     
	    //生成分页链接,分页配置在libraries文件夹里
	    $this->load->library('pages');
	    $config['base_url'] = base_url("web/stories/index?order=".$order);
	    $config['first_url'] = base_url("web/stories/index?order=".$order."&per_page=1.html");
	    $config['total_rows'] = $count_all;
	    $config['per_page'] = $limit;
	    $config['uri_segment'] = 4;
	    $config['use_page_numbers'] = TRUE;
	    $config['page_query_string'] = TRUE;
	    $this->pages->initialize($config);
	    $data['page_links'] = $this->pages->create_links();
	     
	    //获取栏目信息
	    $data['start'] =$count_all;
	    $data['page'] = ceil($count_all / $limit);
	    $data['all'] = $count_all;
	    $data['list'] = $this->stories_mod->get_list($order, $start, $limit);
	    $data['order'] = $order;
	    
	    $this->load->view('web/stories', $data);
	}
	
	public function detail(){
	    $id = $this->uri->segment(4, 0);
	    $story = $this->db->where('id', $id)->get('wudi_stories_info')->row_array();
	    $update['click'] = $story['click'] + 1;
	    $this->db->where('id', $id)->update('wudi_stories_info', $update);
	    $data['story'] = $story;
	    $data['login_status'] = $this->session->userdata('user_login');
	    
	    //获取评论
	    $data['comment'] = $this->stories_mod->get_comments($id);
	    
	    $this->load->view('web/stories_detail', $data);
	}
	
	public function write_comment(){
	    $data['story_id'] = $this->input->post('story_id');
	    $data['to_id'] = $this->input->post('to_id');
	    $data['content'] = $this->input->post('content');
	    
	    if(empty($data['content'])){
	        alert('请填写评论内容！');
	    }
	    
	    if(!empty($data['to_id'])){
            $user_to = $this->db->where('Id', $data['to_id'])->get('wudi_user_info')->row_array();
            $data['to'] = $user_to['nickname'];
	    }
	    $userdata = $this->session->all_userdata();
	    $data['from'] = $userdata['user_nickname'];
	    $data['from_id'] = $userdata['user_id'];
	    $data['time'] = date('Y-m-d H:i:s');
	    
	    $this->db->insert('wudi_stories_comment', $data);
	    alert('发表成功！');
	}
}