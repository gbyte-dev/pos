<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SalesController extends CI_Controller {
	
	public function sales_view(){
	
	$customer=$this->input->post('customer');
	$biller=$this->input->post('biller');
	$start_date=$this->input->post('start_date');
	$expire_date=$this->input->post('expire_date');
	
	
	$filter = array(
                'customer' => $customer,
                'biller' => $biller,
                'start_date' => $start_date, 
                'expire_date' => $expire_date
                
                );
    $this->session->set_userdata('filter', $filter); 
	
	
	
	
	if($customer || $biller || $start_date || $expire_date){
	if($customer){
	$data['data'] = $this->SalesModel->readData_where_1('sales',array('customer_id' => $customer));
	}
	if($biller){
	$data['data'] = $this->SalesModel->readData_where_1('sales',array('biller_id' => $biller));
	}
	if($start_date || $expire_date){
	$data['data'] = $this->SalesModel->readData_where_date('sales',$start_date,$expire_date);
	}
	
	} 
	
	else{
	if($_SESSION['role']==2){
	
	$data['data'] = $this->SalesModel->readData_where_1('sales',array('biller_id'=>$this->session->userdata['id']));
	}else{
	
	$data['data'] = $this->SalesModel->readData_all('sales');
	}}
	$data['data1'] = $this->SalesModel->readData_all('customers');
	$data['data2'] = $this->SalesModel->readData_where_1('admin',array('role'=>2));
	$this->load->view('sales',$data);
	
	}
	
	public function orderSummary(){
	
	$id=$this->input->get('id');
	$data['data'] = $this->SalesModel->readData_where('sales',array('id' => $id));
	
	$data['data2'] = $this->SalesModel->readData_where('customers',array('id'=>$data['data']['customer_id']));
	
	$data['data1'] = $this->SalesModel->readData_where_1('final_cart',array('sale_id' => $id));
	//print_r($data['data1']);
	$this->load->view('order_summary',$data);
	}
	
	public function filter(){
	
	
	
	$this->load->view('sales',$data);
	}
	
	
}