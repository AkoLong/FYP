<?php
class Owner_mod extends CI_Model
{
	var 
		$owner_id				= 0,
		$owner_name				= "",
		$owner_gender			= "",
		$owner_birth			= "0000-00-00",
		$owner_contact			= "",
		$owner_address			= "",
		$owner_state			= "",
		$owner_zip				= "",
		$owner_sub				= "",
		$owner_email			= "",
		$owner_pass				= "",//
		$owner_secure			= "",//
		$owner_status			= "",
		/*
			pending 		== waiting admin verification
			disapproved	 
			verified		== waiting owner respond
			timeout		== owner didn't respond for the time given
			approved
		*/
		$owner_status_remark	= "",//reason for disapproved, timeout || others
		$owner_created_by		= 0,
		/*
			if 0, this record is created by owner themselves
			else, this record is created by admin in case owner cannot register the account themselves due to technical problem.
		*/
		$owner_created_date		= "0000-00-00 00:00:00",
		$owner_verified_by		= 0,
		$owner_verified_date	= "0000-00-00 00:00:00",
		$owner_approved_by		= 0,
		$owner_approved_date	= "0000-00-00 00:00:00",
		$owner_updated_by		= 0,
		$owner_updated_date		= "0000-00-00 00:00:00";
	
	function __construct()
	{
		parent::__construct();
	}
	
	function passwordchange()
	{
		$data['owner_pass']	= $this->owner_pass;
		$this->db->where('owner_id',$this->owner_id);
		$this->db->update('owner',$data);
		return $this->db->affected_rows();
	}
	
	function changePassword()
	{
		$this->db->where('owner_email',$this->owner_email);
		$this->db->where('owner_secure',$this->owner_secure);
		return $this->db->get('owner')->row_array();
	}
	
	function checkSecure()
	{
		$this->db->where('owner_id',$this->owner_id);
		$this->db->where('owner_secure',$this->owner_secure);
		return $this->db->get('owner')->row_array();
	}
	
	function remove()
	{
		$this->db->where('owner_id',$this->owner_id);
		$this->db->delete('owner');
		return $this->db->affected_rows();
	}
	
	function checkExist()
	{
		$this->db->where('owner_email',$this->owner_email);
		$this->db->where('owner_id !=',$this->owner_id);
		$this->db->where('owner_status !=','disapproved');
		$this->db->where('owner_status !=','timeout');
		return $this->db->get('owner')->row_array();
	}
	
	function getDetail()
	{
		$this->db->where('owner_id',$this->owner_id);
		return $this->db->get('owner')->row_array();
	}
	
	function getList()
	{
		return $this->db->get('owner')->result_array();
	}
	
	function checkLogin()
	{
		$this->db->where('owner_email',$this->owner_email);
		$this->db->where('owner_pass',$this->owner_pass);
		return $this->db->get('owner')->row_array();
	}
	
	function update1()
	{
		$data	= [
			'owner_name'			=> htmlentities($this->owner_name),
			'owner_gender'			=> htmlentities($this->owner_gender),
			'owner_birth'			=> $this->owner_birth,
			'owner_contact'			=> htmlentities($this->owner_contact),
			'owner_address'			=> htmlentities($this->owner_address),
			'owner_state'			=> $this->owner_state,
			'owner_zip'				=> htmlentities($this->owner_zip),
			'owner_sub'				=> htmlentities($this->owner_sub),
			'owner_email'			=> htmlentities($this->owner_email),
			'owner_status'			=> $this->owner_status,
			'owner_status_remark'	=> htmlentities($this->owner_status_remark),
			'owner_verified_by'		=> $this->owner_verified_by,
			'owner_verified_date'	=> $this->owner_verified_date,
		];
		$this->db->where('owner_id',$this->owner_id);
		$this->db->update('owner',$data);
		return $this->db->affected_rows();
	}
	
	function update2()
	{
		$data	= [
			'owner_name'			=> htmlentities($this->owner_name),
			'owner_gender'			=> htmlentities($this->owner_gender),
			'owner_birth'			=> $this->owner_birth,
			'owner_contact'			=> htmlentities($this->owner_contact),
			'owner_address'			=> htmlentities($this->owner_address),
			'owner_state'			=> $this->owner_state,
			'owner_zip'				=> htmlentities($this->owner_zip),
			'owner_sub'				=> htmlentities($this->owner_sub),
			'owner_email'			=> htmlentities($this->owner_email),
			'owner_status'			=> $this->owner_status,
			'owner_status_remark'	=> htmlentities($this->owner_status_remark),
			'owner_approved_by'		=> $this->owner_approved_by,
			'owner_approved_date'	=> $this->owner_approved_date,
		];
		$this->db->where('owner_id',$this->owner_id);
		$this->db->update('owner',$data);
		return $this->db->affected_rows();
	}
	
	function update3()
	{
		$data	= [
			'owner_name'			=> htmlentities($this->owner_name),
			'owner_gender'			=> htmlentities($this->owner_gender),
			'owner_birth'			=> $this->owner_birth,
			'owner_contact'			=> htmlentities($this->owner_contact),
			'owner_address'			=> htmlentities($this->owner_address),
			'owner_state'			=> $this->owner_state,
			'owner_zip'				=> htmlentities($this->owner_zip),
			'owner_sub'				=> htmlentities($this->owner_sub),
			'owner_email'			=> htmlentities($this->owner_email),
			'owner_status'			=> $this->owner_status,
			'owner_status_remark'	=> htmlentities($this->owner_status_remark),
			'owner_updated_by'		=> $this->owner_updated_by,
			'owner_updated_date'	=> $this->owner_updated_date,
		];
		$this->db->where('owner_id',$this->owner_id);
		$this->db->update('owner',$data);
		return $this->db->affected_rows();
	}
	
	function insert()
	{
		$this->sub 				= isset($this->sub)?1:0;
		$data					= 
		[
			'owner_name'				=> htmlentities($this->owner_name),
			'owner_gender'				=> $this->owner_gender,
			'owner_birth'				=> $this->owner_birth,
			'owner_contact'				=> htmlentities($this->owner_contact),
			'owner_address'				=> htmlentities($this->owner_address),
			'owner_state'				=> $this->owner_state,
			'owner_zip'					=> htmlentities($this->owner_zip),
			'owner_sub'					=> $this->owner_sub,
			'owner_email'				=> htmlentities($this->owner_email),
			'owner_pass'				=> htmlentities($this->owner_pass),
			'owner_secure'				=> htmlentities($this->owner_secure),
			'owner_status'				=> htmlentities($this->owner_status),
			'owner_status_remark'		=> htmlentities($this->owner_status_remark),
			'owner_created_by'			=> $this->owner_created_by,
			'owner_created_date'		=> $this->owner_created_date,
			'owner_verified_by'			=> $this->owner_verified_by,
			'owner_verified_date'		=> $this->owner_verified_date,
			'owner_approved_by'			=> $this->owner_approved_by,
			'owner_approved_date'		=> $this->owner_approved_date,
			'owner_updated_by'			=> $this->owner_updated_by,
			'owner_updated_date'		=> $this->owner_updated_date,
		];
		$this->db->insert('owner',$data);
		return $this->db->insert_id();
	}
}