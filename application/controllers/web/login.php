<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
	}
	
	public function index(){
        $data['login_tip'] = '';
        $login = get_user_info();
        if(!empty($login)){
            redirect('web/index');
        }
	    $this->load->view('web/login', $data);
	}
	
	public function do_login(){
	    $phone = $this->input->post('phone');
	    $password = $this->input->post('password');
	    $query = $this->db->where('phone', $phone)->where('password', $password)->get('wudi_user_info')->row_array();
	    if(empty($query)){
	        $data['login_tip'] = '* 账号或密码有误 *';
	        $this->load->view('web/login', $data);
	    }else{
	        $this->session->set_userdata('user_login', 1);
	        $this->session->set_userdata('user_id', $query['Id']);
	        $this->session->set_userdata('user_phone', $query['phone']);
	        $this->session->set_userdata('user_name', $query['username']);
	        $this->session->set_userdata('user_nickname', $query['nickname']);
	        $this->session->set_userdata('user_photo', $query['photo']);
	        redirect('web/index');
	    }
	}
}