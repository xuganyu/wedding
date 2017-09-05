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
	
	/**
	 * 获取最新活动
	 */
	public function get_activity(){
	    $this->db->order_by('article_stime', 'desc');
	    $this->db->limit(2, 0);
	    $query = $this->db->get('wudi_news_info')->result_array();
	    return $query;
	}
	
	/**
	 * 获取男用户的信息
	 */
	public function get_males(){
	    $count_male = count($this->db->where('sex', 1)->get('wudi_user_info')->result_array());
	    if($count_male >= 8){
	        $start = rand(0, $count_male-8);
	        $this->db->where('sex', 1);
	        $this->db->limit(8, $start);
	        $data['query'] = $this->db->get('wudi_user_info')->result_array();
	    }else{
	        $this->db->where('sex', 1);
	        $data['query'] = $this->db->get('wudi_user_info')->result_array();
	    }
	    
	    return $data['query'];
	}
	
	/**
	 * 获取女用户的信息
	 */
	public function get_females(){
	    $count_female = count($this->db->where('sex', 2)->get('wudi_user_info')->result_array());
	    if($count_female >= 8){
	        $start = rand(0, $count_female-8);
	        $this->db->limit(8, $start);
	        $this->db->where('sex', 2);
	        $data['query'] = $this->db->get('wudi_user_info')->result_array();
	    }else{
	        $this->db->where('sex', 2);
	        $data['query'] = $this->db->get('wudi_user_info')->result_array();
	    }
	    
	    return $data['query'];
	}
	
	/**
	 * 获取成功故事
	 */
	public function get_stories(){
	    $count_story = $this->db->count_all('wudi_stories_info');
	    if($count_story >= 5){
	        $start = rand(0, $count_story-5);
	        $this->db->limit(5, $start);
	        $data['query'] = $this->db->get('wudi_stories_info')->result_array();
	    }else{
	        $data['query'] = $this->db->get('wudi_stories_info')->result_array();
	    }
	    return $data['query'];
	}
}