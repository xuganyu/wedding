<?php

class newsmap_mod extends CI_Model {
	
	/**
	 * 
	 * 获取广告图列表
	 */
	public function list_newsmap($search,$start=0, $limit=10){
		if(strcmp($search, "") != 0){
			$this->db->like("banner_title", $search);
		}
		$this->db->limit($limit, $start);
		$this->db->order_by("banner_stime", "DESC");
		$query = $this->db->get("wudi_newsmap_info");
		return $query->result_array();
	}
	
	/**
	 * 
	 * 获取广告图内容
	 */
	public function get_newsmap($id){
		$this->db->where("banner_id", $id);
		$query = $this->db->get("wudi_newsmap_info");
		return $query->row_array();
	}
    
	/**
	 *
	 * 获取总数
	 */
	public function newsmap_all($search){
		if(strcmp($search, "") != 0){
			$this->db->like("banner_title", $search);
		}
		$query = $this->db->get("wudi_newsmap_info");
		return count($query->result_array());
	}
}