<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class WarehouseModel extends CI_Model {

	public function insertData($table,$data){
		$this->db->insert($table,$data);
		return $insert_id = $this->db->insert_id();
	}
	
	public function readData_all($table){
		    $this->db->select('*');
			$this->db->from($table);     
			//$this->db->where($con);
			return $this->db->get()->result_array();
	}
	
	public function readData_where($table,$con){
		    $this->db->select('*');
			$this->db->from($table);     
			$this->db->where($con);
			return $this->db->get()->row_array();
	}
	
	public function readData_where_1($table,$con){
		    $this->db->select('*');
			$this->db->from($table);     
			$this->db->where($con);
			return $this->db->get()->result_array();
			}
			

public function delete($table,$id){
$this->db->where($id);
$this->db->delete($table);
}

public function update($table,$conn,$data){
             
     $this->db->where('id',$conn);
     return $this->db->update($table,$data);	
    
	 
	//  die("-----------");

}
}