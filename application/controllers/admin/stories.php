<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stories extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		islogin();
		$this->load->model("admin/stories_mod");
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
	    $count_all = $this->stories_mod->count_all($search);
	    
	    //生成分页链接,分页配置在libraries文件夹里
	    $this->load->library('pages');
	    $config['base_url'] = base_url("admin/stories/index?keywords=".$search);
	    $config['first_url'] = base_url("admin/stories/index?keywords=".$search."&per_page=1.html");
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
	    $data['list'] = $this->stories_mod->get_list($search, $start, $limit);
	    $data['keywords'] = $search;
	    
	    $this->load->view('admin/stories_list', $data);
	}
	
	public function add() {
	    $this->load->view('admin/stories_add');
	}
	
	public function do_add(){
	    $title = $this->input->post('title');
	    $content = $this->input->post('content');
	    $time = date('Y-m-d H:i:s', time());
	    $click = 0;
	    
	    if(empty($title) || empty($content)){
	        alert('请确保信息填写完整！');
	    }
	    
	    $data = array(
	       'title' => $title,
	       'content' => $content,   
	       'time' => $time,   
	       'click' => $click
	    );
	    
	    //文件上传配置
	    $config['upload_path'] = './uploads/stories/';
	    $config['allowed_types'] = 'gif|jpg|jpeg|png';
	    $config['max_size'] = '20480'; // 20M
	    $config['max_width']  = '0';
	    $config['max_height']  = '0';
	    
	    if($_FILES['image']['error'] != 4){
	        //创建日期格式的子文件夹
	        $pasth = setPath("uploads/stories");
	        $this->load->library('upload');
	        $config['file_name'] = date("YmdHis").rand(00, 9999);
	        $this->upload->initialize($config);
	    
	        //上传
	        if($this->upload->do_upload("image")){
	            $file_data = $this->upload->data();
                $data['image'] = $file_data['file_name'];
	            $this->db->insert('wudi_stories_info', $data);
	            alert('添加成功！', '../stories');
	        }else{
	            alert('添加失败！<br>'.$this->upload->display_error(), '../stories');
	        }
	    }
	}
	
	public function edit(){
	    $id = $this->uri->segment(4, 0);
	    $data['edit'] = $this->stories_mod->get_story($id);
	    $this->load->view('admin/stories_edit',$data);
	}
	
	public function do_edit(){
	    $id = $this->input->post('formid');
	    $title = $this->input->post('title');
	    $content = $this->input->post('content');
	     
	    if(empty($title) || empty($content)){
	        alert('请确保信息填写完整！');
	    }
	     
	    $data = array(
	        'title' => $title,
	        'content' => $content
	    );
	     
	    //文件上传配置
	    $config['upload_path'] = './uploads/stories/';
	    $config['allowed_types'] = 'gif|jpg|jpeg|png';
	    $config['max_size'] = '20480'; // 20M
	    $config['max_width']  = '0';
	    $config['max_height']  = '0';
	     
	    if($_FILES['image']['error'] != 4){
	        $story = $this->db->where('id', $id)->get('wudi_stories_info')->row_array();
	        $old_image = './uploads/stories/'.$story['image'];
	        if(file_exists($old_image)){
    	        unlink($old_image);
	        }
	        //创建日期格式的子文件夹
	        $pasth = setPath("uploads/stories");
	        $this->load->library('upload');
	        $config['file_name'] = date("YmdHis").rand(00, 9999);
	        $this->upload->initialize($config);
	         
	        //上传
	        if($this->upload->do_upload("image")){
	            $file_data = $this->upload->data();
	            $data['image'] = $file_data['file_name'];
    	        $this->db->where('id', $id)->update('wudi_stories_info', $data);
	            alert('修改成功！', '../stories');
	        }else{
	            alert('修改失败！<br>'.$this->upload->display_error(), '../stories');
	        }
	    }else{
	        $this->db->where('id', $id)->update('wudi_stories_info', $data);
	        alert('修改成功！', '../stories');
	    }
	}
	
	public function del() {
	    $id = $this->uri->segment(4, 0);
	    $story = $this->db->where('id', $id)->get('wudi_stories_info')->row_array();
	    $image = './uploads/stories/'.$story['image'];
	    if(file_exists($image)){
	        if(unlink($image)){
	            $this->db->where('id', $id)->delete('wudi_stories_info');
	            alert("删除成功！", "../stories");
	        }else{
	            alert("删除失败！", "../stories");
	        }
	    }
	}
	
	
}