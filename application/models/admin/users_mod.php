<?php
class Users_mod extends CI_Model {

    /**
     *
     * 列表
     */
    public function get_list($search, $start=0, $limit=10){
        if(strcmp($search, "") != 0){
            $this->db->like("nickname", $search);
        }
        $this->db->limit($limit, $start);
        $this->db->order_by("regtime", "DESC");
        $query = $this->db->get("wudi_user_info");
        return $query->result_array();
    }

    /**
     *
     * 总数
     */
    public function count_all($search){
        if(strcmp($search, "") != 0){
            $this->db->like("nickname", $search);
        }
        $query = $this->db->get("wudi_user_info");
        return count($query->result_array());
    }
    
    /**
     * 通过id获取
     * @param $id
     */
    public function get_user($id) {
        $query = $this->db->where('id', $id)->get('wudi_user_info')->row_array();
        return $query;
    }
}