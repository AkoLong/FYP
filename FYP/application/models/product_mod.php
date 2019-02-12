<?php
class Product_mod extends CI_Model
{
	var 
		$product_id 						= 0,
		$product_name						= '',
		$product_type						= '',
		$product_price						= 0.00,
		$product_discounted_price			= 0.00,
		$product_description 				= '',
		$product_image_path 				= '',
		$product_restaurant_id 				= 0,
		$product_created_by 				= 0,
		$product_created_date 				= '0000-00-00 00:00:00',
		$product_updated_by 				= 0,
		$product_updated_date 				= '0000-00-00 00:00:00';
		
	function __construct()
	{
		parent::__construct();
	}
	
	function remove()
	{
		$this->db->where('product_id',$this->product_id);
		$this->db->delete('product');
		return $this->db->affected_rows();
	}
	
	function insert()
	{
		$data 			=
		[
			'product_name'				=> htmlentities($this->product_name),
			'product_type'				=> htmlentities($this->product_type),
			'product_price'				=> $this->product_price,
			'product_discounted_price'	=> $this->product_discounted_price,
			'product_description'		=> htmlentities($this->product_description),
			'product_image_path'		=> htmlentities($this->product_image_path),
			'product_restaurant_id'		=> $this->product_restaurant_id,
			'product_created_by'		=> $this->product_created_by,
			'product_created_date'		=> $this->product_created_date,
		];
		$this->db->insert('product',$data);
		return $this->db->insert_id();
	}
	
	function update()
	{
		$data 			=
		[
			'product_name'				=> htmlentities($this->product_name),
			'product_type'				=> htmlentities($this->product_type),
			'product_price'				=> $this->product_price,
			'product_discounted_price'	=> $this->product_discounted_price,
			'product_description'		=> htmlentities($this->product_description),
			'product_image_path'		=> htmlentities($this->product_image_path),
			'product_restaurant_id'		=> $this->product_restaurant_id,
			'product_updated_by'		=> $this->product_updated_by,
			'product_updated_date'		=> $this->product_updated_date,
		];
		$this->db->where('product_id',$this->product_id);
		$this->db->update('product',$data);
		return $this->db->affected_rows();
	}
	
	function getList()
	{
		return $this->db->get('product')->result_array();
	}
	
	function checkExist()
	{
		$this->db->where('product_name',$this->product_name);
		$this->db->where('product_id !=',$this->product_id);
		$this->db->where('product_restaurant_id',$this->product_restaurant_id);
		return $this->db->get('product')->row_array();
	}
	
	function getDetail()
	{
		$this->db->where('product_id',$this->product_id);
		return $this->db->get('product')->row_array();
	}
	
	function getListByFK()
	{
		$this->db->where('product_restaurant_id',$this->product_restaurant_id);
		return $this->db->get('product')->result_array();
	}
}