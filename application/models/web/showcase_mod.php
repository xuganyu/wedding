<?php

class showcase_mod extends CI_Model {

	
	//=======================================================================================//
	
	
	//=======================================================================================//
	/**
	 * 
	 * 获取带栏目的新闻列表 
	 */
	public function list_types_news($id, $start=0, $limit=10){
		$this->db->limit($limit, $start);
		$this->db->where("wudi_news_info.types_id", $id);
		$this->db->where("article_close", 0);
		$this->db->order_by("article_abc", "ASC");
		$this->db->order_by("article_id", "DESC");
		$query = $this->db->get("wudi_news_info");
		return $query->result_array();
	}
	
	/**
	 * 
	 * 获取新闻栏目单个总数
	 */
	public function news_types_all($id){
		$this->db->where("types_id", $id);
		$this->db->where("article_close", 0);
		$this->db->from('wudi_news_info');
		return $this->db->count_all_results();
	}
	
	//=======================================================================================//
	
	
	/**
	 *
	 * 获取新闻内容
	 */
	public function get_news($id){
		$this->db->where("article_id", $id);
		//$this->db->join("kk_article_types", "kk_article.types_id = kk_article_types.types_id");
		$query = $this->db->get("wudi_news_info");
		return $query->row_array();
	}
	
	

}