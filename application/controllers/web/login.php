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
	        $this->session->set_userdata('user_sex', $query['sex']);
	        redirect('web/index');
	    }
	}
	
	public function logout(){
	    $this->session->unset_userdata('user_login');
	    $this->session->unset_userdata('user_id');
	    $this->session->unset_userdata('user_phone');
	    $this->session->unset_userdata('user_name');
	    $this->session->unset_userdata('user_nickname');
	    $this->session->unset_userdata('user_photo');
	    $this->session->unset_userdata('user_sex');
	    redirect('web/login');
	}
	
	public function self_info(){
	    $user_id = $this->session->userdata('user_id');
	    $self_info = $this->db->where('Id', $user_id)->get('wudi_user_info')->row_array();
	    if(!empty($self_info)){
	        $data['info'] = $self_info;
	        $this->load->view('web/self_info', $data);
	    }else{
	        redirect('web/login');
	    }
	}
	
	public function pwd(){
	    $this->load->view('web/pwd');
	}
	
	public function do_pwd(){
	    $user_id = $this->session->userdata('user_id');
	    $input = $this->input->post();
	    $self_info = $this->db->where('Id', $user_id)->get('wudi_user_info')->row_array();
	    if($input['old_pwd'] != $self_info['password']){
	        alert('原密码有误');
	    }
	    $data['password'] = $input['password'];
	    $this->db->where('Id', $user_id)->update('wudi_user_info', $data);
	    redirect('web/login/logout');
	}
	
	public function self_info_up(){
	    $user_id = $this->session->userdata('user_id');
	    $self_info = $this->db->where('Id', $user_id)->get('wudi_user_info')->row_array();
	    if(!empty($self_info)){
	        $data['info'] = $self_info;
	        $this->load->view('web/self_info_up', $data);
	    }else{
	        redirect('web/login');
	    }
	}
	
	public function self_info_do_up() {
	    $user_id = $this->session->userdata('user_id');
	    $input = $this->input->post();
	    $data['birthday'] = $input['birth_year'].'-'.$input['birth_month'].'-'.$input['birth_date'];
	    $data['province'] = $input['province'];
	    $data['city'] = $input['city'];
	    $data['country'] = $input['country'];
	    $data['marriage'] = $input['marriage'];
	    $data['height'] = $input['height'];
	    $data['education'] = $input['education'];
	    $data['salary'] = $input['salary'];
	    $data['nickname'] = $input['nickname'];
	    $data['intro'] = $input['intro'];
        $this->db->where('Id', $user_id)->update('wudi_user_info', $data);	
        redirect('web/login/self_info');    
	}
}