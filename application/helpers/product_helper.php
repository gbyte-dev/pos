<?php
defined('BASEPATH') OR exit('No direct script access allowed');


	
	function category_name( $id ) {  
    $ci=& get_instance();
	$ci->db->select('*');
			$ci->db->from('category');     
			$ci->db->where('id',$id);
			//echo "Hel;lo";
			$name= $ci->db->get()->row_array();
			return $name['category'];
    //$ci->load->database(); 
	
}


	function product_name( $id ) {  
    $ci=& get_instance();
	$ci->db->select('*');
			$ci->db->from('products');     
			$ci->db->where('id',$id);
			//echo "Hel;lo";
			$name= $ci->db->get()->row_array();
			return $name['product_name'];
    //$ci->load->database(); 
	
}


function biller_name( $id ) {  
    $ci=& get_instance();
	$ci->db->select('*');
			$ci->db->from('admin');     
			$ci->db->where('id',$id);
			//echo "Hel;lo";
			$name= $ci->db->get()->row_array();
			return $name['first_name'].' '.$name['last_name'];
    //$ci->load->database(); 
	
}

function customer_name( $id ) {  
    $ci=& get_instance();
	$ci->db->select('*');
			$ci->db->from('customers');     
			$ci->db->where('id',$id);
			//echo "Hel;lo";
			$name= $ci->db->get()->row_array();
			return $name['first_name'].' '.$name['last_name'];
    //$ci->load->database(); 
	
}

function currency( $id ) {  
    $ci=& get_instance();
	$ci->db->select('*');
			$ci->db->from('website');     
			$ci->db->where('id',1);
			//echo "Hel;lo";
			$name= $ci->db->get()->row_array();
			return $name['shop_currency'];
    //$ci->load->database(); 
	
}

function website_logo( $id ) {  
    $ci=& get_instance();
	$ci->db->select('*');
			$ci->db->from('website');     
			$ci->db->where('id',1);
			//echo "Hel;lo";
			$name= $ci->db->get()->row_array();
			return $name['shop_logo'];
    //$ci->load->database(); 
	
}


function warehouse( $id ) {  
    $ci=& get_instance();
	$ci->db->select('*');
			$ci->db->from('warehouse');     
			$ci->db->where('id',$id);
			//echo "Hel;lo";
			$name= $ci->db->get()->row_array();
			return $name['name'];
    //$ci->load->database(); 
	
}

function exp_category( $id ) {  
    $ci=& get_instance();
	$ci->db->select('*');
			$ci->db->from('expense_category');     
			$ci->db->where('id',$id);
			//echo "Hel;lo";
			$name= $ci->db->get()->row_array();
			return $name['expense_category'];
    //$ci->load->database(); 
	
}


function account_name( $id ) {  
    $ci=& get_instance();
	$ci->db->select('*');
			$ci->db->from('account');     
			$ci->db->where('id',$id);
			//echo "Hel;lo";
			$name= $ci->db->get()->row_array();
			return $name['name'];
    //$ci->load->database(); 
	
}