<?php
class Order_mod extends CI_Model
{
	var 
		$order_id						= 0,
		$order_product_type_amount		= 0,
		$order_restaurant_id			= 0,
		$order_status 					= '',
		/*
		pending, processing, declined, completed, canceled...
		*/
		$order_status_remark 			= '',
		$order_grand_total 				= 0.00,
		$order_payment_method			= '',
		$order_delivery_address			= '',
		$order_delivery_fee				= 0.00,
		$order_created_by				= 0,//must be customer id
		$order_created_date				= '0000-00-00 00:00:00',
		$order_updated_by 				= 0,//if 0, it is updated by owner themselves, else, updated by admin 
		$order_updated_date 			= '0000-00-00 00:00:00',
		$order_closed_by 				= 0,
		$order_closed_date 				= '0000-00-00 00:00:00';
	
	function __construct()
	{
		parent::__construct();
	}
	
	function remove()
	{
		$this->db->where('order_id',$this->order_id);
		$this->db->delete('order');
		return $this->db->affected_rows();
	}
		
	function insert()
	{
		$data 			=
		[
			'order_product_type_amount' 		=> $this->order_product_type_amount,
			'order_restaurant_id' 				=> $this->order_restaurant_id,
			'order_status' 						=> "pending",
			'order_status_remark'				=> "waiting for restaurant acceptance",
			'order_delivery_address' 			=> htmlentities($this->order_delivery_address),
			'order_delivery_fee' 				=> $this->order_delivery_fee,
			'order_status_remark' 				=> "Waiting for restaurant acception",
			'order_grand_total' 				=> $this->order_grand_total,
			'order_payment_method' 				=> $this->order_payment_method,
			'order_created_by' 					=> $this->order_created_by,
			'order_created_date' 				=> $this->order_created_date,
		];
		$this->db->insert('order',$data);
		return $this->db->insert_id();
	}
	
	function update()
	{
		$data 		=
		[
			'order_product_type_amount'			=> $this->order_product_type_amount,
			'order_restaurant_id'				=> $this->order_restaurant_id,
			'order_status'						=> $this->order_status,
			'order_status_remark' 				=> htmlentities($this->order_status_remark),
			'order_grand_total'					=> $this->order_grand_total,
			'order_updated_by'					=> $this->order_updated_by,
			'order_updated_date'				=> $this->order_updated_date,
		];
		$this->db->where('order_id',$this->order_id);
		$this->db->update('order',$data);
		return $this->db->affected_rows();
	}
	
	function adminAccept()
	{
		$data 		= 
		[
			'order_status'				=> 'processing',
			'order_status_remark' 		=> 'order accepted by admin',
			'order_updated_by'			=> $this->order_updated_by,
			'order_updated_date'		=> $this->order_updated_date,
		];
		$this->db->where('order_id',$this->order_id);
		$this->db->update('order',$data);
		return $this->db->affected_rows();
	}
	
	function adminDecline()
	{
		$data 		= 
		[
			'order_status'				=> 'declined',
			'order_status_remark' 		=>  'order declined by admin',
			'order_closed_by'			=> $this->order_closed_by,
			'order_closed_date'		=> $this->order_closed_date,
		];
		$this->db->where('order_id',$this->order_id);
		$this->db->update('order',$data);
		return $this->db->affected_rows();
	}
	
	function adminComplete()
	{
		$data 		= 
		[
			'order_status'				=> 'completed',
			'order_status_remark' 		=>  'order completed by admin',
			'order_closed_by'			=> $this->order_closed_by,
			'order_closed_date'		=> $this->order_closed_date,
		];
		$this->db->where('order_id',$this->order_id);
		$this->db->update('order',$data);
		return $this->db->affected_rows();
	}
	
	function adminCancel()
	{
		$data 		= 
		[
			'order_status'				=> 'processing',
			'order_status_remark' 		=> 'order canceled by admin',
			'order_closed_by'			=> $this->order_closed_by,
			'order_closed_date'		=> $this->order_closed_date,
		];
		$this->db->where('order_id',$this->order_id);
		$this->db->update('order',$data);
		return $this->db->affected_rows();
	}
	
	function accept()
	{
		$data 		= 
		[
			'order_status'				=> 'processing',
			'order_status_remark' 		=> 'Order accepted by restaurant',
			'order_updated_by'			=> $this->order_updated_by,
			'order_updated_date'		=> $this->order_updated_date,
		];
		$this->db->where('order_id',$this->order_id);
		$this->db->update('order',$data);
		return $this->db->affected_rows();
	}
	
	function complete()
	{
		$data 		= 
		[
			'order_status'				=> 'completed',
			'order_status_remark' 		=> 'Order completed',
			'order_closed_by'			=> $this->order_closed_by,
			'order_closed_date'			=> $this->order_closed_date,
		];
		$this->db->where('order_id',$this->order_id);
		$this->db->update('order',$data);
		return $this->db->affected_rows();
	}
	
	function decline()
	{
		$data 		= 
		[
			'order_status'				=> 'declined',
			'order_status_remark' 		=> htmlentities($this->order_status_remark),
			'order_closed_by'			=> $this->order_closed_by,
			'order_closed_date'			=> $this->order_closed_date,
		];
		$this->db->where('order_id',$this->order_id);
		$this->db->update('order',$data);
		return $this->db->affected_rows();
	}
	
	function cancel()
	{
		$data 		= 
		[
			'order_status'				=> 'canceled',
			'order_status_remark' 		=> htmlentities($this->order_status_remark),
			'order_closed_by'			=> $this->order_closed_by,
			'order_closed_date'			=> $this->order_closed_date,
		];
		$this->db->where('order_id',$this->order_id);
		$this->db->update('order',$data);
		return $this->db->affected_rows();
	}
	
	function getDetail()
	{
		$this->db->where('order_id',$this->order_id);
		return $this->db->get('order')->row_array();
	}
	
	function getList()
	{
		$this->db->order_by('order_status desc, order_created_by desc, order_updated_date desc');
		return $this->db->get('order')->result_array();
	}
	
	function getListByRID()
	{
		$this->db->where('order_restaurant_id',$this->order_restaurant_id);
		return $this->db->get('order')->result_array();
	}
	
	function getListByCID()
	{
		$this->db->where('order_created_by',$this->order_created_by);
		return $this->db->get('order')->result_array();
	}
}