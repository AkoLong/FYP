<?php
class Redeem_mod extends CI_Model
{
	var 
		$redeem_id 						= 0,
		$redeem_amount					= 0.00,
		$redeem_bank_name				='',
		$redeem_bank_account_number		= '',
		$redeem_bank_account_name		= '',
		$redeem_status					= '',
		$redeem_status_remark			= '',
		$redeem_created_by				= 0,
		$redeem_created_date			= '0000-00-00',
		$redeem_updated_by				= 0,
		$redeem_updated_date			= '0000-00-00',
		$redeem_closed_by				= 0,
		$redeem_closed_date				= '0000-00-00';
		
	function __construct()
	{
		parent::__construct();
	}
	
	function remove()
	{
		$this->db->where('redeem_id',$this->redeem_id);
		$this->db->delete('redeem');
		return $this->db->affected_rows();
	}
	
	function getList()
	{
		return $this->db->get('redeem')->result_array();
	}
	
	function getDetail()
	{
		$this->db->where('redeem_id',$this->redeem_id);
		return $this->db->get('redeem')->row_array();
	}
	
	function insert()
	{
		$data 			= 
		[
			'redeem_amount'					=> $this->redeem_amount,
			'redeem_bank_name'				=> $this->redeem_bank_name,
			'redeem_bank_account_number'	=> $this->redeem_bank_account_number,
			'redeem_bank_account_name'		=> $this->redeem_bank_account_name,
			'redeem_status'					=> "pending",
			'redeem_status_remark'			=> "waiting for admin acceptance",
			'redeem_created_by'				=> $this->redeem_created_by,
			'redeem_created_date'			=> $this->redeem_created_date,
			'redeem_updated_by'				=> $this->redeem_updated_by,
			'redeem_updated_date'			=> $this->redeem_updated_date,
			'redeem_closed_by'				=> $this->redeem_closed_by,
			'redeem_closed_date'			=> $this->redeem_closed_date,
		];
		$this->db->insert('redeem',$data);
		return $this->db->insert_id();
	}
	
	function accept()
	{
		$data 		= 
		[
			'redeem_status'					=> "processing",
			'redeem_status_remark'			=> "request accepted by admin",
			'redeem_updated_by'				=> $this->redeem_updated_by,
			'redeem_updated_date'			=> $this->redeem_updated_date,
		];
		$this->db->where('redeem_id',$this->redeem_id);
		$this->db->update('redeem',$data);
		return $this->db->affected_rows();
	}
	
	function decline()
	{
		$data 		= 
		[
			'redeem_status'					=> "decline",
			'redeem_status_remark'			=> htmlentities($this->redeem_status_remark),
			'redeem_closed_by'				=> $this->redeem_closed_by,
			'redeem_closed_date'			=> $this->redeem_closed_date,
		];
		$this->db->where('redeem_id',$this->redeem_id);
		$this->db->update('redeem',$data);
		return $this->db->affected_rows();
	}
	
	function complete()
	{
		$data 		= 
		[
			'redeem_status'					=> "completed",
			'redeem_status_remark'			=> "request completed",
			'redeem_closed_by'				=> $this->redeem_closed_by,
			'redeem_closed_date'			=> $this->redeem_closed_date,
		];
		$this->db->where('redeem_id',$this->redeem_id);
		$this->db->update('redeem',$data);
		return $this->db->affected_rows();
	}
}