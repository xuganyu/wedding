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
	    if(empty($birth_year) || empty($birth_monnth) || empty($birth_date)
	         || empty($province) || empty($city) || empty($height)
	         || empty($education) || empty($salary) || empty($phone)
	         || empty($password) || empty($repassword) || strcmp($password, $repassword)){
	        alert('请确保信息填写正确！');
	    }
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
	        'password' => $password
	    );
	    if(empty($nickname)){
	        $data['nickname'] = '用户_'.$phone;
	    }else{
	        $data['nickname'] = $nickname;
	    }
	    $this->db->insert('wudi_user_info', $data);
	    redirect('web/login');
	}
}