<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

public function getid($email,$pass){

		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where(array('email'=>$email,'password'=>$pass));
		$query = $this->db->get()->row_array();
		if(!empty($query)){
			return $query;
		}
		else{
			return 0;
		}
}

public function num_rows($table){
	
	 $result = $this->db->get($table)->num_rows();
	
}

public function last_ten(){
	
	$this->db->select('*');
	 $this->db->from('sales');
    $this->db->order_by("id", "desc");
	$this->db->limit(10);
	$query  = $this->db->get()->result_array();
	return $query;
}


public function monthly_sales(){
	
	
	$max = date('Y-m-d');
	$this->db->select('*');
			$this->db->from('sales');     
			$this->db->where('sale_date >=',date('Y-m-01'));
$this->db->where('sale_date <=', $max);
			
	
	$query  = $this->db->get()->result_array();
	return $query;
}

public function readData_all($table){
		$this->db->select('*');
			$this->db->from($table);     
			//$this->db->where($con);
			return $this->db->get()->result_array();
	}
	
	
	
	public function six_month_sales(){
	
	
	$max = date('Y-m-d', strtotime("+180 days"));
	$this->db->select('*');
			$this->db->from('sales');     
			$this->db->where('sale_date >=',date('Y-m-01'));
$this->db->where('sale_date <=', $max);
			
	
	$query  = $this->db->get()->result_array();
	return $query;
}

	}
	
	