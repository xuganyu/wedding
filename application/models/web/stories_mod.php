<?php
class Stories_mod extends CI_Model {

    /**
     *
     * 列表
     */
    public function get_list($order, $start=0, $limit=10){
        if(strcmp($order, "") != 0){
            $this->db->order_by($order, "DESC");
        }else{
            $this->db->order_by('time', "DESC");
        }
        $this->db->limit($limit, $start);
        $query = $this->db->get("wudi_stories_info");
        return $query->result_array();
    }

    /**
     *
     * 总数
     */
    public function count_all(){
        $query = $this->db->get("wudi_stories_info");
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