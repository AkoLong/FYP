<?php
class Admin_mod extends CI_Model
{
	var
		$admin_id				= 0,
		$admin_name				= '',
		$admin_email			= '',
		$admin_pass				= '',
		$admin_created_by		= 0,
		$admin_created_date		= '0000-00-00 00:00:00',
		$admin_updated_by		= 0,
		$admin_updated_date		= '0000-00-00 00:00:00';
	
	function __construct()
	{
		parent::__construct();
	}
	
	function getList()
	{
		return $this->db->get('admin')->result_array();
	}
	
	function getDetail()
	{
		$this->db->where('admin_id',$this->admin_id);
		return $this->db->get('admin')->row_array();
	}
	
	function checkExist()
	{
		$this->db->where('admin_email',$this->admin_email);
		$this->db->where('admin_id !=',$this->admin_id);
		return $this->db->get('admin')->row_array();
	}
	
	function checkLogin()
	{
		$this->db->where('admin_email',$this->admin_email);
		$this->db->where('admin_pass',$this->admin_pass);
		return $this->db->get('admin')->row_array();
	}
	
	function insert()
	{
		$data 				= 
		[
			'admin_name'			=> htmlentities($this->admin_name),
			'admin_email'			=> htmlentities($this->admin_email),
			'admin_pass'			=> htmlentities($this->admin_pass),
			'admin_created_by'		=> $this->admin_created_by,
			'admin_created_date'	=> $this->admin_created_date,
			'admin_updated_by'		=> $this->admin_updated_by,
			'admin_updated_date'	=> $this->admin_updated_date,
		];
		$this->db->insert('admin',$data);
		return $this->db->insert_id();
	}
}