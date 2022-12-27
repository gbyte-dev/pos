<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ProductModel extends CI_Model {

	public function insertData($table,$data){
		$this->db->insert($table,$data);
		return $insert_id = $this->db->insert_id();
	}
	
	public function tbl_insertData($table,$data){
		$this->db->insert($table,$data);
		return $insert_id = $this->db->insert_id();
	}
	public function product_insertData($table,$data){
		$this->db->insert($table,$data);
		return $insert_id = $this->db->insert_id();
	}
	
	
	public function stock_insertData($table,$data){
		$this->db->insert($table,$data);
		return $insert_id = $this->db->insert_id();
	}
	
	public function readData_all($table){
		    $this->db->select('*');
			$this->db->from($table);     
			//$this->db->where($con);
			return $this->db->get()->result_array();
	}
	public function readData_pro_all($table,$id){
		    $this->db->select('*');
			$this->db->from($table);     
			$this->db->where('warehouse',$id);
			
			return $this->db->get()->result_array();
			
	}
	
	public function readData_stock_all($table,$id){
		    $this->db->select('*');
			$this->db->from($table);     
			$this->db->where('id',$id);
			
			return $this->db->get()->row_array();
			
	}
	
	public function readData_show_all($table,$id){
		    $this->db->select('*');
			$this->db->from($table);     
			$this->db->where('id',$id);
			return $this->db->get()->row_array();
			
	}
	public function read_data_1($table,$id){
		    $this->db->select('*');
			$this->db->from($table);     
			$this->db->where('id',$id);
			return $this->db->get()->row_array();
			
	}
	public function from_read_data($table,$ware_from){
		    $this->db->select('*');
			$this->db->from($table);     
			$this->db->where('id',$ware_from);
			return $this->db->get()->row_array();
			
	}
	public function to_read_data($table,$ware_to){
		    $this->db->select('*');
			$this->db->from($table);     
			$this->db->where('id',$ware_to);
			return $this->db->get()->row_array();
			
	}
	
	
	
	public function readData_where($table,$con){
		    $this->db->select('*');
			$this->db->from($table);     
			$this->db->where($con);
			return $this->db->get()->row_array();
	}
	
	
	public function readData_tranfer_product($table){
		    $this->db->select('*');
			$this->db->from($table);     
			return $this->db->get()->result_array();
	}
	
	public function readData_where_2($table,$con){
		    $this->db->select('*');
			$this->db->from($table);     
			$this->db->where('id',$con); 
			return $this->db->get()->result_array();
	}
	public function readData_where_3($table,$con){
		    $this->db->select('*');
			$this->db->from($table);     
			$this->db->where('warehouse',$con);
			return $this->db->get()->result_array();
	}
	
	public function readData_qty($table,$con){
		    $this->db->select('*');
			$this->db->from($table);     
			$this->db->where('id',$con);
			return $this->db->get()->result_array();
	}
	public function readData_qty_1($table,$con){
		    $this->db->select('*');
			$this->db->from($table);     
			$this->db->where('id',$con);
			return $this->db->get()->result_array();
	}
	
	
	public function readData_where_1($table,$con){
		    $this->db->select('*');
			$this->db->from($table);     
			$this->db->where($con);
			return $this->db->get()->result_array();
	}
	
	public function name_warehouse($table,$con){
		    $this->db->select('*');
			$this->db->from($table);       
			$this->db->where('id',$con);
			return $this->db->get()->row_array();
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

public function stock_update($table,$conn,$data){
             
     $this->db->where('id',$conn);
     return $this->db->update($table,$data);	

}
}