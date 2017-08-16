<?php
class Main_mod extends CI_Model{
	/**
	 *
	 * 广告图
	 */
	public function list_banner(){
		$this->db->where("banner_close", 0);
		$this->db->order_by("banner_abc", "ASC");
		$this->db->order_by("banner_id", "DESC");
		$query = $this->db->get("wudi_newsmap_info");
		return $query->result_array();
	}
	
	/**
	 *
	 * 读取banner图
	 */
	public function get_advertisement($id){
		$this->db->where("ad_id", $id);
		$this->db->where("ad_close", 0);
		$query = $this->db->get("wudi_ad_info");
		return $query->row_array();
	}
}