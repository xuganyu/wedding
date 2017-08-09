<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
	}
	
	//登录
    public function index(){
        $this->load->library('session');
        if($this->session->userdata("islogin") != false){
            redirect("admin/main");
        }
        if(!empty($_POST)){
        	//获取表单	
            $username = $this->input->post("username", TRUE);
            $passwd = $this->input->post("password", TRUE);
            $passwd_md5 = md5($passwd);
            //验证表单数据
            $this->db->where("username", $username);
            $this->db->where("password", $passwd_md5);
            $query = $this->db->get("wudi_admin_info");
            $user = $query->row_array();
            if($user){
                $this->session->set_userdata('islogin', 1);
                $this->session->set_userdata('userid', $user['id']);
                $this->session->set_userdata('username', $user['username']);
                redirect("admin/main");
            }else{
                alert("账号或密码不正确");
            }
        }else{
            $this->load->view('admin/login');
        }
    }
    
    //注销
    public function logout(){
        $this->session->unset_userdata('islogin');
        $this->session->unset_userdata('userid');
        $this->session->unset_userdata('username');
        redirect("admin/login");
    }
}