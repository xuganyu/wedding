<?php

class news_mod extends CI_Model {
	
	/**
	 * 
	 * 获取广告图列表
	 */
	public function list_news($search,$start=0, $limit=10){
		if(strcmp($search, "") != 0){
			$this->db->like("article_title", $search);
		}
		$this->db->limit($limit, $start);
		$this->db->order_by("article_stime", "DESC");
		$query = $this->db->get("kk_article");
		return $query->result_array();
	}
	
	/**
	 * 
	 * 获取广告图内容
	 */
	public function get_news($id){
		$this->db->where("article_id", $id);
		$query = $this->db->get("kk_article");
		return $query->row_array();
	}
    
	/**
	 *
	 * 获取总数
	 */
	public function news_all($search){
		if(strcmp($search, "") != 0){
			$this->db->like("article_title", $search);
		}
		$query = $this->db->get("kk_article");
		return count($query->result_array());
	}
}