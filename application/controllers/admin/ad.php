<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ad extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model("admin/ad_mod");
	}
	
	public function index(){
		$data['list'] = $this->ad_mod->list_ad();
		$this->load->view('admin/ad_list',$data);
	}
	
	
	/**
	 *
	 * 编辑广告图
	 */
	public function edit(){
	$id = $this->uri->segment(4, 0);
	$data['edit'] = $this->ad_mod->get_ad($id);
	$this->load->view('admin/ad_edit',$data);
	}
	
	public function do_edit(){
		//接收表单提交数据
		$title = $this->input->post("title", TRUE);
		$formid = $this->input->post("formid", TRUE);
		$url = $this->input->post("url");
		$user_name = $this->session->userdata('username', TRUE);
	    $data= $this->ad_mod->get_ad($formid);
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
		
			$query = $this->db ->query("select ad_thumb from wudi_ad_info where ad_id = {$formid}");
			$row = $query->row_array();
			$del_img = $row['ad_thumb'];
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
					'ad_title' => $data["ad_title"],
					'ad_thumb'=> $product_thumb,
					'ad_url' => $url,
					'ad_edme' => $user_name,
					'ad_stime' => time(),
			);
			if(!unlink($fileimg)){}
			$this->db->where('ad_id', $formid);
			$this->db->update('wudi_ad_info', $data);
			alert("修改图片成功", "../ad");
		
		}else{
				
			//如果没有上传图片修改，就直接修改内容即可
			$data = array(
					'ad_title' => $data["ad_title"],
					'ad_url' => $url,
					'ad_edme' => $user_name,
					'ad_etime' => time(),
			);
			$this->db->where('ad_id', $formid);
			$this->db->update('wudi_ad_info', $data);
			alert("修改成功", "../ad");
		}
	}
	
	/**
	 *
	 * 直接修改排序
	 */
	public function or_abc(){
	
		$or_abc = $this->input->post('or_abc');
		$abc_id = $this->input->post('abc_id');
	    $data = array(
				'ad_abc' => $or_abc,
		);
	
		$this->db->where('ad_id', $abc_id);
		$this->db->update('wudi_ad_info', $data);
	}
	
	
}