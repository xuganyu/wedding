<?php
class Search_mod extends CI_Model {

    /**
     *
     * 列表
     */
    public function get_list($sex, $age, $edu, $salary, $marriage, $province, $city, $country, $start=0, $limit=10){
        if(!empty($age) && strcmp($age, '0') != 0){
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
        }
        if(!empty($sex) && strcmp($sex, '0') != 0){
            $this->db->where('sex', $sex);
        }
        if(!empty($edu) && strcmp($edu, '0') != 0){
            $this->db->where('education', $edu);
        }
        if(!empty($salary) && strcmp($salary, '0') != 0){
            $this->db->where('salary', $salary);
        }
        if(!empty($marriage) && strcmp($marriage, '0') != 0){
            $this->db->where('marriage', $marriage);
        }
        if(!empty($province) && strcmp($province, '0') != 0){
            $this->db->like('province', $province);
        }
        if(!empty($country) && strcmp($city, '0') != 0){
            $this->db->like('city', $city);
        }
        if(!empty($country) && strcmp($country, '0') != 0){
            $this->db->like('country', $country);
        }
        $this->db->limit($limit, $start);
        $query = $this->db->get("wudi_user_info");
        return $query->result_array();
    }

    /**
     *
     * 总数
     */
    public function count_all($sex, $age, $edu, $salary, $marriage, $province, $city, $country){
        if(!empty($age) && strcmp($age, '0') != 0){
            $this->db->where('age', $age);
        }
        if(!empty($sex) && strcmp($sex, '0') != 0){
            $this->db->where('sex', $sex);
        }
        if(!empty($edu) && strcmp($edu, '0') != 0){
            $this->db->where('education', $edu);
        }
        if(!empty($salary) && strcmp($salary, '0') != 0){
            $this->db->where('salary', $salary);
        }
        if(!empty($marriage) && strcmp($marriage, '0') != 0){
            $this->db->where('marriage', $marriage);
        }
    if(!empty($province) && strcmp($province, '0') != 0){
            $this->db->like('province', $province);
        }
        if(!empty($country) && strcmp($city, '0') != 0){
            $this->db->like('city', $city);
        }
        if(!empty($country) && strcmp($country, '0') != 0){
            $this->db->like('country', $country);
        }
        $query = $this->db->get("wudi_user_info");
        return count($query->result_array());
    }
    
    /**
     * 通过id获取
     * @param $id
     */
    public function get_story($id) {
        $query = $this->db->where('id', $id)->get('wudi_stories_info')->row_array();
        return $query;
    }
    
    public function get_comments($id){
        $query = $this->db->where('story_id', $id)->get('wudi_stories_comment')->result_array();
        return $query;
    }
}