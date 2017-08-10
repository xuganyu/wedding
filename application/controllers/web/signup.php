<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signup extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
	}
	
	public function index(){
	    $this->load->view('web/signup');
	}
	
	public function register(){
	    $sex = $this->input->post('sex');
	    $birth_year = $this->input->post('birth_year');
	    $birth_monnth = $this->input->post('birth_month');
	    $birth_date = $this->input->post('birth_date');
	    $province = $this->input->post('province');
	    $city = $this->input->post('city');
	    $country = $this->input->post('country');
	    $marriage = $this->input->post('marriage');
	    $height = $this->input->post('height');
	    $education = $this->input->post('education');
	    $salary = $this->input->post('salary');
	    $nickname = $this->input->post('nickname');
	    $phone = $this->input->post('phone');
	    $password = $this->input->post('password');
	    $repassword = $this->input->post('repassword');
	    $intro = $this->input->post('intro');
// 	    if(empty($birth_year) || empty($birth_monnth) || empty($birth_date)
// 	         || empty($province) || empty($city) || empty($height)
// 	         || empty($education) || empty($salary) || empty($phone)
// 	         || empty($password) || empty($repassword) || strcmp($password, $repassword)){
// 	        alert('请确保信息填写正确！');
// 	    }
	    
	    $data = array(
	        'sex' => $sex,
	        'birthday' => $birth_year.'-'.$birth_monnth.'-'.$birth_date,
	        'area' => $province.$city.$country,
	        'marriage' => $marriage,
	        'height' => $height,
	        'education' => $education,
	        'salary' => $salary,
	        'username' => '用户_'.$phone,
	        'phone' => $phone,
	        'password' => $password,
	        'regtime' => date('Y-m-d H:i:s'),
	        'intro' => $intro
	    );
	    if(empty($nickname)){
	        $data['nickname'] = '用户_'.$phone;
	    }else{
	        $data['nickname'] = $nickname;
	    }
	    
	    //文件上传配置
	    $config['upload_path'] = './uploads/user/'.date("Ym").'/';
	    $config['allowed_types'] = 'gif|jpg|jpeg|png';
	    $config['max_size'] = '20480'; // 20M
	    $config['max_width']  = '0';
	    $config['max_height']  = '0';
	     
	    if($_FILES['photo']['error'] != 4){
	        //创建日期格式的子文件夹
	        $pasth = setPath("uploads/user");
	        $this->load->library('upload');
	        $config['file_name'] = date("YmdHis").rand(00, 99);
	        $this->upload->initialize($config);
	         
	        //上传
	        if($this->upload->do_upload("photo")){
	            $file_data = $this->upload->data();
	            $source_image = './uploads/user/'.date('Ym').'/'.$file_data['file_name'];
	            //裁剪图片
	            $thumb_config['image_library'] = 'gd2';
	            $thumb_config['new_image'] = './uploads/user/'.date("Ym").'/';
	            $thumb_config['source_image'] = $source_image;
	            $thumb_config['create_thumb'] = TRUE;
	            $thumb_config['maintain_ratio'] = FALSE;
	            $thumb_config['width'] = 200;
	            $thumb_config['height'] = 284;
	            $this->load->library('image_lib');
	            $this->image_lib->initialize($thumb_config);
	            $this->image_lib->resize();
	            unlink($source_image);
	            $data['photo'] = $file_data['raw_name'].'_thumb'.$file_data['file_ext'];
        	    $this->db->insert('wudi_user_info', $data);
        	    redirect('web/login');
	        }else{
                $this->load->view('web/signup');	            
	        }
	    }
	}
}