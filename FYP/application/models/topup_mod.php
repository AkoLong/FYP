<?php
class Topup_mod extends CI_Model
{
	var
		$topup_id				= 0,
		$topup_amount			= 0.00,
		$topup_payment_method	= '',
		$topup_reference_code	= '',
		$topup_created_by		= 0,
		$topup_created_date		= '0000-00-00 00:00:00';
		
		
	function __construct()
	{
		parent::__construct();
	}
	
	function getListByCID()
	{
		$this->db->where('topup_created_by',$this->topup_created_by);
		return $this->db->get('topup')->result_array();
	}
	
	function getList()
	{
		return $this->db->get('topup')->result_array();
	}
	
	function remove()
	{
		$this->db->where('topup_id',$this->topup_id);
		$this->db->delete('topup');
		return $this->db->affected_rows();
	}
	
	function getDetail()
	{
		$this->db->where('topup_id',$this->topup_id);
		return $this->db->get('topup')->row_array();
	}
	
	function insert()
	{
		$data 		= 
		[
			'topup_amount'			=> $this->topup_amount,
			'topup_payment_method'	=> $this->topup_payment_method,
			'topup_reference_code'	=> $this->topup_reference_code,
			'topup_created_by'		=> $this->topup_created_by,
			'topup_created_date'	=> $this->topup_created_date,
		];
		$this->db->insert('topup',$data);
		return $this->db->insert_id();
	}
}