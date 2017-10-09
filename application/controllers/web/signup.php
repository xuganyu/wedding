<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signup extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
	}
	
	public function index(){
	    $login = get_user_info();
	    if(!empty($login)){
	        redirect('web/index');
	    }
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
	    $photo = $this->input->post('photo');
	    if(empty($birth_year) || empty($birth_monnth) || empty($birth_date)
	         || empty($province) || empty($city) || empty($height)
	         || empty($education) || empty($salary) || empty($phone)
	         || empty($password) || empty($repassword) || strcmp($password, $repassword)){
	        alert('请确保信息填写正确！');
	    }
	    if(empty($photo)){
	        alert('请选择照片');
	    }
	    
	    $cur_year = date('Y');
	    $cur_month = date('m');
	    $cur_day = date('d');
	    $age = $cur_year - $birth_year - 1;
	    if($cur_month > $birth_monnth || $cur_month == $birth_monnth && $cur_day >= $birth_date){
	        $age++;
	    }
	    
	    $data = array(
	        'sex' => $sex,
	        'birthday' => $birth_year.'-'.$birth_monnth.'-'.$birth_date,
	        'marriage' => $marriage,
	        'height' => $height,
	        'education' => $education,
	        'salary' => $salary,
	        'username' => '用户_'.$phone,
	        'phone' => $phone,
	        'password' => $password,
	        'regtime' => date('Y-m-d H:i:s'),
	        'intro' => $intro,
	        'age' => $age,
	        'province' => $province,
	        'city' => $city,
	        'country' => $country
	    );
	    if(empty($nickname)){
	        $data['nickname'] = '用户_'.$phone;
	    }else{
	        $data['nickname'] = $nickname;
	    }
	    
	    $base64_image = str_replace(' ', '+', $photo);
	    if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64_image, $result)){
	        //匹配成功
            $image_name = date("YmdHis").rand(00,9999).'.'.$result[2];
	        $image_file = $_SERVER['DOCUMENT_ROOT'].'/uploads/user/'.$image_name;
	        //服务器文件存储路径
	        if (file_put_contents($image_file, base64_decode(str_replace($result[1], '', $base64_image)))){
	            $data['photo'] = $image_name;
        	    $this->db->insert('wudi_user_info', $data);
        	    redirect('web/login');
	        }else{
    	        alert('请勿上传过大的照片');
	        }
	    }else{
	        alert('请选择照片');
	    }
	}
	
	/**
	 * 检测手机号是否已注册
	 */
	public function user_phone_exist(){
	    $phone = $this->input->post('phone');
	    
	    $user = $this->db->where('phone', $phone)->get('wudi_user_info')->row_array();
	    if(empty($user)){
	        $data = array(
	            'msg' => 0
	        );
	        echo json_encode($data);
	    }else{
	        $data = array(
	            'msg' => 1
	        );
	        echo json_encode($data);
	    }
	}
}