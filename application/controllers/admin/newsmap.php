<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Newsmap extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model("admin/newsmap_mod");
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
		$count_all = $this->newsmap_mod->newsmap_all($search);
		$this->load->library('pages');
		$config['base_url'] = base_url("admin/newsmap/index?keywords=".$search);
		$config['first_url'] = base_url("admin/newsmap/index?keywords=".$search."&per_page=1.html");
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
		$data['list'] = $this->newsmap_mod->list_newsmap($search,$start,$limit);
		$data['keywords'] = $search;
		$this->load->view('admin/newsmap_list',$data);
	}
	
	/**
	 *
	 * 添加广告图
	 */
	public function add(){
		$this->load->view('admin/newsmap_add');
	}
	
	public function do_add(){
		//接收表单提交数据
		$title = $this->input->post("title", TRUE);
		$url = $this->input->post("url");
		$user_name = $this->session->userdata('username', TRUE);
		//处理一下公司域名，如果有填写http,就自动处理去掉
		$needle= 'tp://';
		$pos = strpos($url, $needle);
		if($pos != false){
			$domain = explode($needle, $url);
			$url = $domain[1];
		}
		
		//判断是否有上传新的图片，如果没有就退出
		if($_FILES['images']['error'] != 4){
		
			//一切都没问题，就开始创建以日期形式的文件夹
			$pasth = setPath("uploads");
		
			//图片上传，图片配置在config文件夹
			$this->load->library('upload');
			$this->upload->do_upload("images");
			$data = $this->upload->data();
			$images = $data["file_name"];
				
			//图片上传以后，创建一个缩略图，配置在 system/libraries  里
			$this->load->library('image_lib',array('image'=>$images,'width'=>812,'height'=>406,'maintain_ratio'=>FALSE));
			$this->image_lib->resize();
		
			//把上传的图片删掉只保留缩略图
			$fileimg = 'uploads/'.$images;
			//var_dump($fileimg);
			if (!unlink($fileimg)){
			}
		
			//获取缩略图的文件名，然后保存到数据库，把前面的日期也带上，方便到时删除
			$product_thumb = date("Ym",time()).'/'.$data["raw_name"]."_thumb".$data["file_ext"];
			var_dump($product_thumb);
			$data = array(
					'banner_title' => $title,
					'banner_thumb'=> $product_thumb,
					'banner_url' => $url,
					'banner_close' => 0,
					'banner_abc' => 0,
					'banner_edme' => $user_name,
					'banner_stime' => time(),
			);
			$this->db->insert('kk_banner', $data);
			alert("发布成功", "../newsmap");
		
		}else{
			alert("图片不能为空 或 图片大小要小于2M", "");
		}
	}
	/**
	 *
	 * 编辑广告图
	 */
	public function edit(){
	$id = $this->uri->segment(4, 0);
	$data['edit'] = $this->newsmap_mod->get_newsmap($id);
	$this->load->view('admin/newsmap_edit',$data);
	}
	
	public function do_edit(){
		//接收表单提交数据
		$title = $this->input->post("title", TRUE);
		$formid = $this->input->post("formid", TRUE);
		$url = $this->input->post("url");
		$user_name = $this->session->userdata('username', TRUE);
		//处理一下公司域名，如果有填写http,就自动处理去掉
		$needle= 'tp://';
		$pos = strpos($url, $needle);
		if($pos != false){
			$domain = explode($needle, $url);
			$url = $domain[1];
		}
		
		
		//判断是否有上传新的图片，如果有就执行删掉旧图片
		if($_FILES['images']['error'] !== 4){
		
			//一切都没问题，就开始创建以日期形式的文件夹
			$pasth = setPath("uploads");
		
			//图片上传，图片配置在config文件夹
			$this->load->library('upload');
			$this->upload->do_upload("images");
			$data = $this->upload->data();
			$images = $data["file_name"];
		
			$query = $this->db ->query("select banner_thumb from kk_banner where banner_id = {$formid}");
			$row = $query->row_array();
			$del_img = $row['banner_thumb'];
			if(file_exists('./uploads/'.$del_img)){
				unlink('./uploads/'.$del_img);
			}
		
			//图片上传以后，创建一个缩略图，配置在 system/libraries  里
			$this->load->library('image_lib',array('image'=>$images,'width'=>812,'height'=>406,'maintain_ratio'=>FALSE));
			$this->image_lib->resize();
		
			//把上传的图片删掉只保留缩略图
			$fileimg = 'uploads/'.$images;
		
			//获取缩略图的文件名，然后保存到数据库，把前面的日期也带上，方便到时删除
			$product_thumb = date("Ym",time()).'/'.$data["raw_name"]."_thumb".$data["file_ext"];
		
			$data = array(
					'banner_title' => $title,
					'banner_thumb'=> $product_thumb,
					'banner_url' => $url,
					'banner_edme' => $user_name,
					'banner_stime' => time(),
			);
			if(!unlink($fileimg)){}
			$this->db->where('banner_id', $formid);
			$this->db->update('kk_banner', $data);
			alert("修改图片成功", "../newsmap");
		
		}else{
				
			//如果没有上传图片修改，就直接修改内容即可
			$data = array(
					'banner_title' => $title,
					'banner_url' => $url,
					'banner_edme' => $user_name,
					'banner_etime' => time(),
			);
			$this->db->where('banner_id', $formid);
			$this->db->update('kk_banner', $data);
			alert("修改成功", "../newsmap");
		}
	}
	/**
	 *
	 * 删除数据
	 */
	public function del(){
		$id = $this->uri->segment(4, 0);
		$query = $this->db ->query("select banner_thumb from kk_banner where banner_id = {$id}");
		$row = $query->row_array();
		$del_img = $row['banner_thumb'];
		
		if(file_exists('./uploads/'.$del_img)){
			unlink('./uploads/'.$del_img);
		}
		
		$this->db->where('banner_id', $id);
		$this->db->delete('kk_banner');
		alert("删除成功", "../newsmap");
	}
	
	/**
	 *
	 * 直接修改排序
	 */
	public function or_abc(){
	
		$or_abc = $this->input->post('or_abc');
		$abc_id = $this->input->post('abc_id');
	    $data = array(
				'banner_abc' => $or_abc,
		);
	
		$this->db->where('banner_id', $abc_id);
		$this->db->update('kk_banner', $data);
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
				'banner_close' => $val,
		);
	
		$this->db->where('banner_id', $ids);
		$this->db->update('kk_banner', $data);
		echo true;
	}
}