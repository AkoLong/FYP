<?php
class Restaurant_mod extends CI_Model
{
	//for restaurant profile picture, creating a table for it should be more suitable since the profile picture can be changed everytimes.
	var 
		$restaurant_id						= 0,
		$restaurant_name					= '',
		$restaurant_contact					= '',
		$restaurant_address					= '',
		$restaurant_state					= '',
		$restaurant_zip						= '',
		$restaurant_title					= '',//put in heading, limited characters. e.g: 50 char
		$restaurant_description				= '',//put in paragraph, limited but with more characters than title. e.g: 500 char
		$restaurant_business_day			= '',
		$restaurant_business_hour			= '',
		$restaurant_deliver_fee				= '',
		$restaurant_deliver_coverage		= '',
		$restaurant_deliver_minimum_order	= 0.00,
		$restaurant_deliver_time			= '00:00:00',
		$restaurant_image_path 				= '',
		$restaurant_rating					= 0.00,
		$restaurant_rated_by				= 0,
		$restaurant_status					= '',
		/*
			pending 			== owner verified but havent approved
			registered		== owner are approved and verified, restaurant information has been completed
			unregistered		== unregistered || owner are not verified, approved, did not complete the necessary information for the restaurants. **detail can be checked in owner table
		*/
		$restaurant_life_status			= '',//on business, closed, busy, rest, empty string for unregistered
		$restaurant_balance 			= 0.00,
		$restaurant_cod 				= 0,
		$restaurant_owner_id			= 0,
		$restaurant_created_by			= 0,
		$restaurant_created_date		= '0000-00-00 00:00:00',
		$restaurant_updated_by			= 0,
		$restaurant_updated_date		= '0000-00-00 00:00:00';
		
	function __construct()
	{
		parent::__construct();
	}
	
	function changelivestatus()
	{
		$data['restaurant_life_status']	= $this->restaurant_life_status;
		$this->db->where('restaurant_owner_id',$this->restaurant_owner_id);
		$this->db->update('restaurant',$data);
		return $this->db->affected_rows();
	}
	
	function updaterating()
	{
		$data		= 
		[
			'restaurant_rating'			=> $this->restaurant_rating,
			'restaurant_rated_by'		=> $this->restaurant_rated_by,
		];
		$this->db->where('restaurant_id',$this->restaurant_id);
		$this->db->update('restaurant',$data);
		return $this->db->affected_rows();
	}
	
	function remove()
	{
		$this->db->where('restaurant_id',$this->restaurant_id);
		$this->db->delete('restaurant');
		return $this->db->affected_rows();
	}
	
	function updatewallet()
	{
		$data 		= 
		[
			'restaurant_balance'			=> $this->restaurant_balance,
			'restaurant_updated_by'			=> $this->restaurant_updated_by,
			'restaurant_updated_date'		=> $this->restaurant_updated_date,
		];
		$this->db->where('restaurant_id',$this->restaurant_id);
		$this->db->update('restaurant',$data);
		return $this->db->affected_rows();
	}
	
	function updatewallet2()
	{
		$data 		= 
		[
			'restaurant_balance'			=> $this->restaurant_balance,
			'restaurant_updated_by'			=> $this->restaurant_updated_by,
			'restaurant_updated_date'		=> $this->restaurant_updated_date,
		];
		$this->db->where('restaurant_owner_id',$this->restaurant_owner_id);
		$this->db->update('restaurant',$data);
		return $this->db->affected_rows();
	}
	
	function getList()
	{
		return $this->db->get('restaurant')->result_array();
	}
	
	function checkExist()
	{
		$this->db->where('restaurant_address',$this->restaurant_address);
		$this->db->where('restaurant_id !=',$this->restaurant_id);
		return $this->db->get('restaurant')->row_array();
	}
	
	function getDetail()
	{
		$this->db->where('restaurant_id',$this->restaurant_id);
		return $this->db->get('restaurant')->row_array();
	}
	
	function getDetailByFK()
	{
		$this->db->where('restaurant_owner_id',$this->restaurant_owner_id);
		return $this->db->get('restaurant')->row_array();
	}
	
	function update()
	{
		$data	=
		[
			'restaurant_name'					=> htmlentities($this->restaurant_name),
			'restaurant_contact'				=> htmlentities($this->restaurant_contact),
			'restaurant_address'				=> htmlentities($this->restaurant_address),
			'restaurant_state'					=> $this->restaurant_state,
			'restaurant_zip'					=> htmlentities($this->restaurant_zip),
			'restaurant_title'					=> htmlentities($this->restaurant_title),
			'restaurant_description'			=> htmlentities($this->restaurant_description),
			'restaurant_business_day'			=> htmlentities($this->restaurant_business_day),
			'restaurant_business_hour'			=> htmlentities($this->restaurant_business_hour),
			'restaurant_deliver_fee'			=> $this->restaurant_deliver_fee,
			'restaurant_deliver_coverage'		=> htmlentities($this->restaurant_deliver_coverage),
			'restaurant_deliver_minimum_order'	=> $this->restaurant_deliver_minimum_order,
			'restaurant_deliver_time'			=> $this->restaurant_deliver_time,
			'restaurant_cod'					=> $this->restaurant_cod,
			'restaurant_image_path'				=> $this->restaurant_image_path,
			'restaurant_updated_by'				=> $this->restaurant_updated_by,
			'restaurant_updated_date'			=> $this->restaurant_updated_date,
		];
		$this->db->where('restaurant_id',$this->restaurant_id);
		$this->db->update('restaurant',$data);
		return $this->db->affected_rows();
	}
	
	function verify()
	{
		$data['restaurant_status']	= 'pending';
		$this->db->where('restaurant_owner_id',$this->restaurant_owner_id);
		$this->db->update('restaurant',$data);
		return $this->db->affected_rows();
	}
	
	function approve()
	{
		$data['restaurant_status']	= 'registered';
		$this->db->where('restaurant_owner_id',$this->restaurant_owner_id);
		$this->db->update('restaurant',$data);
		return $this->db->affected_rows();
	}
	
	function insert()
	{
		$data			= 
		[
			'restaurant_name'					=> htmlentities($this->restaurant_name),
			'restaurant_contact'				=> htmlentities($this->restaurant_contact),
			'restaurant_address'				=> htmlentities($this->restaurant_address),
			'restaurant_state'					=> $this->restaurant_state,
			'restaurant_zip'					=> htmlentities($this->restaurant_zip),
			'restaurant_title'					=> htmlentities($this->restaurant_title),
			'restaurant_description'			=> htmlentities($this->restaurant_description),
			'restaurant_business_day'			=> htmlentities($this->restaurant_business_day),
			'restaurant_business_hour'			=> htmlentities($this->restaurant_business_hour),
			'restaurant_deliver_fee'			=> $this->restaurant_deliver_fee,
			'restaurant_deliver_coverage'		=> htmlentities($this->restaurant_deliver_coverage),
			'restaurant_deliver_minimum_order'	=> $this->restaurant_deliver_minimum_order,
			'restaurant_deliver_time'			=> $this->restaurant_deliver_time,
			'restaurant_image_path'				=> $this->restaurant_image_path,
			'restaurant_rating'					=> $this->restaurant_rating,
			'restaurant_rated_by'				=> $this->restaurant_rated_by,
			'restaurant_status'					=> $this->restaurant_status,
			'restaurant_life_status'			=> $this->restaurant_life_status,
			'restaurant_balance'				=> $this->restaurant_balance,
			'restaurant_cod'					=> $this->restaurant_cod,
			'restaurant_owner_id'				=> $this->restaurant_owner_id,
			'restaurant_created_by'				=> $this->restaurant_created_by,
			'restaurant_created_date'			=> $this->restaurant_created_date,
			'restaurant_updated_by'				=> $this->restaurant_updated_by,
			'restaurant_updated_date'			=> $this->restaurant_updated_date,
		];
		$this->db->insert('restaurant',$data);
		return $this->db->insert_id();
	}
}