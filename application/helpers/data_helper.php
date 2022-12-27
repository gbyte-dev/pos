<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function product(){
	 $ci=& get_instance();
	 $data['data2']= $ci->db->get("products")->result_array();
	  echo count($data['data2']);
  }
  
    function category(){
	   $ci=& get_instance();
	   $data['data1']= $ci->db->get("category")->result_array();
      echo count($data['data1']);
  
  }
  
  function subCategory(){
	   $ci=& get_instance();
	   $data['data1']= $ci->db->get("subcategory")->result_array();
      echo count($data['data1']);
  
  }
  function customers(){
	   $ci=& get_instance();
   $data['data3']= $ci->db->get("customers")->result_array();
   echo count($data['data3']);
  }
  function brand(){
	   $ci=& get_instance();
	   $data['data1']= $ci->db->get("brand")->result_array();
      echo count($data['data1']);
  
  }
   function supplier(){
	    $ci=& get_instance();
	   $data['data1']= $ci->db->get("supplier")->result_array();
      echo count($data['data1']);
  
  }
   function warehouses(){
	    $ci=& get_instance();
	   $data['data1']= $ci->db->get("warehouse")->result_array();
      echo count($data['data1']);
  
  }
   function payment(){
	    $ci=& get_instance();
	   $data['data1']= $ci->db->get("payment")->result_array();
      echo count($data['data1']);
  
  }
   function biller(){
	    $ci=& get_instance();
		 
		$ci->db->where(['role'=>2]);
	   $data['data1']= $ci->db->get("admin")->result_array();
      echo count($data['data1']);
  
  }
   function sales(){
	   $ci=& get_instance();
	   $data['data1']= $ci->db->get("sales")->result_array();
      echo count($data['data1']);
  }
  
    function limited_stock(){
	   $ci=& get_instance();
	
	   $ci->db->where(['id' => 1]);
	   $data= $ci->db->get("website")->row_array();
	   $ci->db->where('quantity <=',$data['quantity']);
	   $data['data1']= $ci->db->get("products")->result_array();
      echo count($data['data1']);
  }
  
   function coupan(){
	    $ci=& get_instance();
	   $data['data1']= $ci->db->get("coupons")->result_array();
      echo count($data['data1']);
  
  }
   function expense(){
	    $ci=& get_instance();
	   $data['data1']= $ci->db->get("expense_category")->result_array();
      echo count($data['data1']);
  
  }
   function expensel(){
	    $ci=& get_instance();
	   $data['data1']= $ci->db->get("expense")->result_array();
      echo count($data['data1']);
  
  }
    function accountl(){
		 $ci=& get_instance();
	   $data['data1']= $ci->db->get("account")->result_array();
      echo count($data['data1']);
  
  }
    function moneyt(){
		 $ci=& get_instance();
	   $data['data1']= $ci->db->get("money_transfer")->result_array();
      echo count($data['data1']);
  }
    function stockt(){
		 $ci=& get_instance();
	   $data['data1']= $ci->db->get("transfer_product")->result_array();
      echo count($data['data1']);
  }

?>