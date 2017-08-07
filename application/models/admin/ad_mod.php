<?php

class ad_mod extends CI_Model {
	
	/**
	 * 
	 * 获取广告图列表
	 */
	public function list_ad(){
		$this->db->order_by("ad_stime", "DESC");
		$query = $this->db->get("kk_ad");
		return $query->result_array();
	}
	
	/**
	 * 
	 * 获取广告图内容
	 */
	public function get_ad($id){
		$this->db->where("ad_id", $id);
		$query = $this->db->get("kk_ad");
		return $query->row_array();
	}
    
	/**
	 *
	 * 获取总数
	 */
	public function ad_all(){
		$query = $this->db->get("kk_ad");
		return count($query->result_array());
	}
}