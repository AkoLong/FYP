<?php
class Review_mod extends CI_Model
{
	var 
		$review_id 					= 0,
		$review_content				= '',
		$review_rating 				= 0,
		$review_customer_name		= '',
		$review_restaurant_id		= 0,
		$review_restaurant_name		= '',
		$review_created_by			= 0,
		$review_created_date		= '0000-00-00 00:00:00';//can only be deleted
		
	function __construct()
	{
		parent::__construct();
	}
	
	function insert()
	{
		$data		= 
		[
			'review_content'		=> htmlentities($this->review_content),
			'review_rating'			=> $this->review_rating,
			'review_customer_name'	=> htmlentities($this->review_customer_name),
			'review_restaurant_id'	=> $this->review_restaurant_id,
			'review_restaurant_name'=> htmlentities($this->review_restaurant_name),
			'review_created_by'		=> $this->review_created_by,
			'review_created_date'	=> $this->review_created_date,
		];
		$this->db->insert('review',$data);
		return $this->db->insert_id();
	}
	
	function getListByRID()
	{
		$this->db->where('review_restaurant_id',$this->review_restaurant_id);
		return $this->db->get('review')->result_array();
	}
	
	function getListByCID()
	{
		$this->db->where('review_created_by',$this->review_created_by);
		return $this->db->get('review')->result_array();
	}
	
	function getList()
	{
		return $this->db->get('review')->result_array();
	}
	
	function remove()
	{
		$this->db->where('review_id',$this->review_id);
		$this->db->delete('review');
		return $this->db->affected_rows();
	}
}