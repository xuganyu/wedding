<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model("web/search_mod");
	}
	
	public function index(){
	    $sex = $this->input->get('sex');
	    $age = $this->input->get('age');
	    $edu = $this->input->get('edu');
	    $salary = $this->input->get('salary');
	    $marriage = $this->input->get('marriage');
	    $province = $this->input->get('province');
	    $city = $this->input->get('city');
	    $country = $this->input->get('country');
	    
	    //分页使用的
	    $data['id_c'] = $this->input->get('per_page');
	    if(empty($data['id_c'])){
	        $data['id_c'] = 1;
	    }
	    $page = $this->input->get('per_page');
	    if(empty($page)){
	        $page = 1;
	    }
	    $limit = 12;
	    $start = ($page-1) * $limit;
	    $count_all = $this->search_mod->count_all($sex, $age, $edu, $salary, $marriage, $province, $city, $country);
	    
	    //生成分页链接,分页配置在libraries文件夹里
	    $this->load->library('pages');
	    $config['base_url'] = base_url("web/search1/index?sex=".$sex."&age=".$age."&edu=".$edu."&salary=".$salary."&marriage=".$marriage."&province=".$province."&city=".$city."&country=".$country);
	    $config['first_url'] = base_url("web/search1/index?sex=".$sex."&age=".$age."&edu=".$edu."&salary=".$salary."&marriage=".$marriage."&province=".$province."&city=".$city."&country=".$country."&per_page=1.html");
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
	    $data['list'] = $this->search_mod->get_list($sex, $age, $edu, $salary, $marriage, $province, $city, $country, $start, $limit);
	    $data['sex'] = $sex;
	    $data['age'] = $age;
	    $data['edu'] = $edu;
	    $data['salary'] = $salary;
	    $data['marriage'] = $marriage;
	    $data['province'] = $province;
	    $data['city'] = $city;
	    $data['country'] = $country;
	     
	    $this->load->view('web/search', $data);

    }

    /**
     * @return mixed
     */
    public function getData()
    {
        $sex = $this->input->post('sex');
        $age = $this->input->post('age');
        $edu = $this->input->post('edu');
        $salary = $this->input->post('salary');
        
        $data['cur_page'] = $this->uri->segment(8, 1);
        $data['title']=array();



        $this->load->library('pages');
        $config['base_url'] = base_url("web/search/getData");


        $limit=12;
        $config['page_query_string'] = TRUE;
        $config['per_page'] = $limit;
        $config['uri_segment'] = 8;
        $config['use_page_numbers'] = TRUE;



        switch ($sex){
            case "0":
                break;
            case "1":
                $this->db->where('sex',$sex);
                break;
            case  "2":
                $this->db->where('sex',$sex);
                break;
        }
        switch ($age){
            case "0":
                break;
            case "1":
                $this->db->where('age between 18 and 29');
                break;
            case  "2":
                $this->db->where('age between 30 and 39');

                break;
            case  "3":
                $this->db->where('age between 40 and 49');
                break;
            case  "4":
                $this->db->where('age between 50 and 59');
                break;
            case  "5":
                $this->db->where('age between 60 and 70');
                break;
        }
        switch ($edu){
            case "0":
                break;
            default:
                $this->db->where('education',$edu);
        }
        switch ($salary){
            case "0":
                break;
            default:
                $this->db->where('salary',$salary);

        }

        $query_all=$this->db->get("wudi_user_info");

        $count_all=$query_all->num_rows;
        $config['total_rows'] = $count_all;
        $this->pages->initialize($config);

        $start = ($data['cur_page'] - 1) * $limit;



        switch ($sex){
            case "0":
                break;
            case "1":
                $this->db->where('sex',$sex);
                break;
            case  "2":
                $this->db->where('sex',$sex);
                break;
        }
        switch ($age){
            case "0":
                break;
            case "1":
                $this->db->where('age between 18 and 29');

                break;
            case  "2":
                $this->db->where('age between 30 and 39');
                break;
            case  "3":
                $this->db->where('age between 40 and 49');
                break;
            case  "4":
                $this->db->where('age between 50 and 59');
                break;
            case  "5":
                $this->db->where('age between 60 and 70');
                break;
        }
        switch ($edu){
            case "0":
                break;
            default:
                $this->db->where('education',$edu);
        }
        switch ($salary){
            case "0":
                break;
            default:
                $this->db->where('salary',$salary);

        }
        $query=$this->db->limit($limit,$start)->get("wudi_user_info");

        $data['page_links'] = $this->pages->create_links();
        $data['name']=$query->result();

        $data['page'] = ceil($count_all / $limit);
        //var_dump($query->num_rows);
        $this->load->view('web/search',$data);

    }   /**
     * @return mixed
     */
    public function getMoreData($sex,$age,$edu,$salary,$marry,$provice,$city,$xiaqu)
    {

        $data['cur_page'] = $this->uri->segment(12, 1);
        $data['title']=array();


        var_dump($this->input->get(''));

        $this->load->library('pages');
        $config['base_url'] = base_url("web/search/getMoreData");


        $limit=12;
        $config['page_query_string'] = TRUE;
        $config['per_page'] = $limit;
        $config['uri_segment'] = 12;
        $config['use_page_numbers'] = TRUE;



        switch ($sex){
            case "0":
                break;
            case "1":
                $this->db->where('sex',$sex);
                break;
            case  "2":
                $this->db->where('sex',$sex);
                break;
        }
        switch ($age){
            case "0":
                break;
            case "1":
                $this->db->where('age between 18 and 29');
                break;
            case  "2":
                $this->db->where('age between 30 and 39');

                break;
            case  "3":
                $this->db->where('age between 40 and 49');
                break;
            case  "4":
                $this->db->where('age between 50 and 59');
                break;
            case  "5":
                $this->db->where('age between 60 and 70');
                break;
        }
        switch ($edu){
            case "0":
                break;
            default:
                $this->db->where('education',$edu);
        }
        switch ($salary){
            case "0":
                break;
            default:
                $this->db->where('salary',$salary);

        }
        switch ($marry){
            case "0":
                break;
            default:
                $this->db->where('marriage',$marry);

        }

        if ($provice!="0"){
            $area=$provice;
            if ($city!="0"){
                $area=$provice+'-'+$city;
                if ($xiaqu!="0"){
                    $area=$provice+'-'+$city+'-'+$xiaqu;
                }
            }
        }

        var_dump($provice);
        var_dump($area);
        switch ($provice){
            case "0":
                break;
            default:
                $this->db->like('area',$area);

        }
        $query_all=$this->db->get("wudi_user_info");

        $count_all=$query_all->num_rows;
        $config['total_rows'] = $count_all;
        $this->pages->initialize($config);

        $start = ($data['cur_page'] - 1) * $limit;



        switch ($sex){
            case "0":
                break;
            case "1":
                $this->db->where('sex',$sex);
                break;
            case  "2":
                $this->db->where('sex',$sex);
                break;
        }
        switch ($age){
            case "0":
                break;
            case "1":
                $this->db->where('age between 18 and 29');

                break;
            case  "2":
                $this->db->where('age between 30 and 39');
                break;
            case  "3":
                $this->db->where('age between 40 and 49');
                break;
            case  "4":
                $this->db->where('age between 50 and 59');
                break;
            case  "5":
                $this->db->where('age between 60 and 70');
                break;
        }
        switch ($edu){
            case "0":
                break;
            default:
                $this->db->where('education',$edu);
        }
        switch ($salary){
            case "0":
                break;
            default:
                $this->db->where('salary',$salary);

        }
        switch ($marry){
            case "0":
                break;
            default:
                $this->db->where('marriage',$marry);

        }

        if ($provice!="0"){
            $area=$provice;
            if ($city!="0"){
                $area=$provice+'-'+$city;
                if ($xiaqu!="0"){
                    $area=$provice+'-'+$city+'-'+$xiaqu;
                }
            }
        }

        switch ($provice){
            case "0":
                break;
            default:
                $this->db->like('area',$area);

        }
        $query=$this->db->limit($limit,$start)->get("wudi_user_info");

        $data['page_links'] = $this->pages->create_links();
        $data['name']=$query->result();

        $data['page'] = ceil($count_all / $limit);
        //var_dump($query->num_rows);
        $this->load->view('web/search',$data);

    }

    /*
     * 获取详情页面
     */
    public function info($id){
        $this->db->where("Id",$id);
        $query=$this->db->get("wudi_user_info");
        $res=$query->result();

        //var_dump($res);
       // var_dump($date);

        $education=$res[0]->education;



        $data['info']=$res;
        switch ($education){
            case "1":
                $data['edu']="高中中专及以下";
                break;
            case "2":
                $data['edu']="大专";
                break;
            case "3":
                $data['edu']="本科";
                break;
            case "4":
                $data['edu']="双学士";
                break;
            case "5":
                $data['edu']="硕士";
                break;
            case "6":
                $data['edu']="博士";
                break;
            case "7":
                $data['edu']="博士后";
                break;
        }

        $sar=$res[0]->salary;
        switch ($sar){
            case "1":
                $data['saraly']="2000元以下";
                break;
            case "2":
                $data['saraly']="2000-5000元";
                break;
            case "3":
                $data['saraly']="5000-10000元";
                break;
            case "4":
                $data['saraly']="10000-20000元";
                break;
            case "5":
                $data['saraly']="20000-50000元";
                break;
            case "6":
                $data['saraly']="50000元以上";
                break;
        }

      //  var_dump($data);
        $this->load->view('web/info',$data);
    }
}