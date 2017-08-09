<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Umeditor extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
	}
	
	public function index(){
	}
	
	/**
	 * umeditor -> 上传图片
	 * 页面调用的demo：
	     <div id="myEditor"></div>
	     <script>
         var um = UM.getEditor('myEditor',
         {
               imageUrl:"<?php echo site_url('admin/umeditor/up_images').'?folder=[模块图片存放的文件夹]'; ?>", //处理图片上传的接口
               imagePath:"", //路径前缀
               imageFieldName:"upfile" //上传图片的表单的[name]
         });
         </script>
	 */
	public function up_images(){
	    //获取模块图片要存放的文件夹
	    $folder = $this->input->get('folder');
	    
        //文件上传配置
        $config['upload_path'] = './uploads/'.$folder.'/'.date("Ym").'/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = '20480'; // 20M
        $config['max_width']  = '0';
        $config['max_height']  = '0';
	    
	    if($_FILES['upfile']['error'] != 4){
	        //创建日期格式的子文件夹
	        $pasth = setPath("uploads/".$folder);
	        $this->load->library('upload');
	        $config['file_name'] = date("YmdHis").rand(00, 99);
	        $this->upload->initialize($config);
	        
	        //上传
	        if($this->upload->do_upload("upfile")){ 
	            $data = $this->upload->data();
	            //返回结果数组
        	    $r = array(
        	        "originalName" => $_FILES['upfile']['name'],
        	        "name" => $data['file_name'],
        	        "url" => base_url('uploads/'.$folder.'/'.date('Ym').'/'.$data['file_name']), //不能少
        	        "size" => $data['file_size'],
        	        "type" => $data['image_type'],
        	        "state" => 'SUCCESS' //不能少
        	    );
                echo json_encode($r);
	        }
	    }
	}
}