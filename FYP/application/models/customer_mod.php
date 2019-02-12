<?php
class Customer_mod extends CI_Model
{
	var 
		$customer_id			= 0,
		$customer_name			= '',
		$customer_gender		= '',
		$customer_birth			= '0000-00-00',
		$customer_contact		= '',
		$customer_address		= '',
		$customer_state			= '',
		$customer_zip			= '',
		$customer_sub			= '',
		$customer_email			= '',
		$customer_pass			= '',
		$customer_secure		= '',
		$customer_balance		= 0.00,
		$customer_status		= '',//suspended for spamming... || active || deleted
		$customer_status_remark	= '',//reason for deleted, suspended. Eg: deleted due to user request, suspended due to spamming or leaving unappropriate reviews for restaurant...
		$customer_created_by	= 0,
		$customer_created_date	= '0000-00-00 00:00:00',
		$customer_updated_by	= 0,
		/*
			if 0, the profile updated by customer themselves. 
			else, thsi record is updated by admin.
			if the updated date is in default value, the record havent updated by any one of the users.
		*/
		$customer_updated_date	= '0000-00-00 00:00:00';
	
	function __construct()
	{
		parent::__construct();
	}
	
	function changePassword()
	{
		$this->db->where('customer_email',$this->customer_email);
		$this->db->where('customer_secure',$this->customer_secure);
		return $this->db->get('customer')->row_array();
	}
	
	function passwordchange()
	{
		$data['customer_pass']	= $this->customer_pass;
		$this->db->where('customer_id',$this->customer_id);
		$this->db->update('customer',$data);
		return $this->db->affected_rows();
	}
	
	function remove()
	{
		$this->db->where('customer_id',$this->customer_id);
		$this->db->delete('customer');
		return $this->db->affected_rows();
	}
	
	function checkSecure()
	{
		$this->db->where('customer_id',$this->customer_id);
		$this->db->where('customer_secure',$this->customer_secure);
		return $this->db->get('customer')->row_array();
	}
	
	function updatewallet()
	{
		$data 		= 
		[
			'customer_balance'			=> $this->customer_balance,
			'customer_updated_by'		=> $this->customer_updated_by,
			'customer_updated_date'		=> $this->customer_updated_date,
		];
		$this->db->where('customer_id',$this->customer_id);
		$this->db->update('customer',$data);
		return $this->db->affected_rows();
	}
	
	function checkExist()
	{
		$this->db->where('customer_email',$this->customer_email);
		$this->db->where('customer_id !=',$this->customer_id);
		return $this->db->get('customer')->row_array();
	}
	
	function getList()
	{
		return $this->db->get('customer')->result_array();
	}
	
	function getDetail()
	{
		$this->db->where('customer_id',$this->customer_id);
		return $this->db->get('customer')->row_array();
	}
	
	function checkLogin()
	{
		$this->db->where('customer_email',$this->customer_email);
		$this->db->where('customer_pass',$this->customer_pass);
		return $this->db->get('customer')->row_array();
	}
	
	function update()
	{
		$data 	=
		[
			'customer_name'			=> htmlentities($this->customer_name),
			'customer_gender'		=> $this->customer_gender,
			'customer_birth'		=> $this->customer_birth,
			'customer_contact'		=> htmlentities($this->customer_contact),
			'customer_address'		=> htmlentities($this->customer_address),
			'customer_state'		=> $this->customer_state,
			'customer_zip'			=> htmlentities($this->customer_zip),
			'customer_sub'			=> $this->customer_sub,
			'customer_email'		=> htmlentities($this->customer_email),
			'customer_status'		=> $this->customer_status,
			'customer_status_remark'=> htmlentities($this->customer_status_remark),
			'customer_updated_by'	=> $this->customer_updated_by,
			'customer_updated_date'	=> $this->customer_updated_date,
		];
		$this->db->where('customer_id',$this->customer_id);
		$this->db->update('customer',$data);
		return $this->db->affected_rows();
	}
	
	function insert()
	{
		$this->customer_sub		= isset($this->customer_sub)?1:0;
		$data		=
		[
			'customer_name'			=> htmlentities($this->customer_name),
			'customer_gender'		=> $this->customer_gender,
			'customer_birth'		=> $this->customer_birth,
			'customer_contact'		=> htmlentities($this->customer_contact),
			'customer_address'		=> htmlentities($this->customer_address),
			'customer_state'		=> $this->customer_state,
			'customer_zip'			=> htmlentities($this->customer_zip),
			'customer_sub'			=> $this->customer_sub,
			'customer_email'		=> htmlentities($this->customer_email),
			'customer_pass'			=> htmlentities($this->customer_pass),
			'customer_secure'		=> htmlentities($this->customer_secure),
			'customer_balance'		=> $this->customer_balance,
			'customer_status'		=> $this->customer_status,
			'customer_status_remark'=> htmlentities($this->customer_status_remark),
			'customer_created_by'	=> $this->customer_created_by,
			'customer_created_date'	=> $this->customer_created_date,
			'customer_updated_by'	=> $this->customer_updated_by,
			'customer_updated_date'	=> $this->customer_updated_date,
		];
		$this->db->insert('customer',$data);
		return $this->db->insert_id();
	}
}