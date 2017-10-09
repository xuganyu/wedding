<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		islogin();
		$this->load->model("admin/users_mod");
	}
	
	public function index(){
	    $search = $this->input->get('keywords');
	    
	    //分页使用的
	    $data['id_c'] = $this->input->get('per_page');
	    if(empty($data['id_c'])){
	        $data['id_c'] = 1;
	    }
	    $page = $this->input->get('per_page');
	    if(empty($page)){
	        $page = 1;
	    }
	    $limit = 8;
	    $start = ($page-1) * $limit;
	    $count_all = $this->users_mod->count_all($search);
	    
	    //生成分页链接,分页配置在libraries文件夹里
	    $this->load->library('pages');
	    $config['base_url'] = base_url("admin/users/index?keywords=".$search);
	    $config['first_url'] = base_url("admin/users/index?keywords=".$search."&per_page=1.html");
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
	    $data['list'] = $this->users_mod->get_list($search, $start, $limit);
	    $data['keywords'] = $search;
	    
	    $this->load->view('admin/users_list', $data);
	}
	
	public function detail(){
	    $id = $this->uri->segment(4, 0);
	    $data['user'] = $this->users_mod->get_user($id);
	    $this->load->view('admin/users_detail',$data);
	}
	
	public function del() {
	    $id = $this->uri->segment(4, 0);
	    $user = $this->db->where('id', $id)->get('wudi_user_info')->row_array();
	    $image = './uploads/user/'.$user['photo'];
	    if(file_exists($image)){
	        if(unlink($image)){
	            $this->db->where('id', $id)->delete('wudi_user_info');
	            alert("删除成功！", "../users");
	        }else{
	            alert("删除失败！", "../users");
	        }
	    }
	}
	
	
}