<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
	}
	
	public function index(){
	    $data['cur_page'] = $this->uri->segment(4, 1);
        $data['title']=array();



        $this->load->library('pages');
        $config['base_url'] = base_url("web/search/index");


        $limit=12;
        $config['per_page'] = $limit;
        $config['uri_segment'] = 4;
        $config['use_page_numbers'] = TRUE;
        $count_all=$this->db->get("wudi_user_info")->num_rows;
        $config['total_rows'] = $count_all;
        $this->pages->initialize($config);

        $start = ($data['cur_page'] - 1) * $limit;
        $query=$this->db->limit($limit,$start)->get("wudi_user_info");

        $data['page_links'] = $this->pages->create_links();
        $data['name']=$query->result();

        $data['page'] = ceil($count_all / $limit);
        //var_dump($query);
        $this->load->view('web/search',$data);

}

    /**
     * @return mixed
     */
    public function getData($sex,$age,$edu,$salary)
    {

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
                $this->db->where('saraly',$salary);

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
                $this->db->where('saraly',$salary);

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
                $this->db->where('saraly',$salary);

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
                $this->db->where('saraly',$salary);

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