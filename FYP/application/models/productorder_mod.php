<?php
class Productorder_mod extends CI_Model
{
	var 
		$productorder_id 				= 0,
		$productorder_order_id 			= 0,
		$productorder_product_id 		= 0,
		$productorder_quantity 			= 0,
		$productorder_product_price 	= 0.00,
		$productorder_totprice 			= 0.00;//bridge table no need 
		
	function __construct()
	{
		parent::__construct();
	}
	
	function remove()
	{
		$this->db->where('productorder_order_id',$this->productorder_order_id);
		$this->db->delete('productorder');
		return $this->db->affected_rows();
	}
	
	function insert()
	{
		$data 		= 
		[
			'productorder_order_id'			=> $this->productorder_order_id,
			'productorder_product_id'		=> $this->productorder_product_id,
			'productorder_quantity'			=> $this->productorder_quantity,
			'productorder_product_price'	=> $this->productorder_product_price,
			'productorder_totprice'			=> $this->productorder_totprice,
		];
		$this->db->insert('productorder',$data);
		return $this->db->insert_id();
	}
	
	function getDetail()
	{
		$this->db->where('productorder_order_id',$this->productorder_order_id);
		$this->db->where('productorder_product_id',$this->productorder_product_id);
		return $this->db->get('productorder')->row_array();
	}
	
	function getList()
	{
		return $this->db->get('productorder')->result_array();
	}
	
	function getListByOID()
	{
		$this->db->where('productorder_order_id',$this->productorder_order_id);
		return $this->db->get('productorder')->result_array();
	}
	
	function getListByPID()
	{
		$this->db->where('productorder_product_id',$this->productorder_product_id);
		return $this->db->get('productorder')->result_array();
	}
}