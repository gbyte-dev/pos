<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CustomerController extends CI_Controller {
	
	
		public function customers_view()
	{
	$data['data'] = $this->CustomerModel->readData_all('customers');
		$this->load->view('customers',$data);
	}
	public function addCustomer() 
	{
	$first_name=$this->input->post('first_name');
	$last_name=$this->input->post('last_name');
	$email=$this->input->post('email');
	$phone=$this->input->post('phone');
	$address=$this->input->post('address');
	$status=$this->input->post('status');
	
	$arr=array('first_name'=>$first_name,'last_name'=>$last_name,'email'=>$email,'phone'=>$phone,'address'=>$address,'status'=>$status);
	$lastid = $this->CustomerModel->insertData('customers',$arr);
		redirect('customers?msg=cust_add');
	}
	
	
	
	public function editCustomer(){
	$id=$this->input->post('id');
	$first_name=$this->input->post('first_name1');
	$last_name=$this->input->post('last_name1');
	$email=$this->input->post('email1');
	$phone=$this->input->post('phone1');
	$address=$this->input->post('address1');
	$status=$this->input->post('status1');
	
	$arr=array('first_name'=>$first_name,'last_name'=>$last_name,'email'=>$email,'phone'=>$phone,'address'=>$address,'status'=>$status);
	$this->CustomerModel->update('customers',$id,$arr);
	redirect('customers?msg=cust_edit');
	}
	
	public function deleteCustomer(){
	$id = $this->input->get('id'); 
	 $this->CustomerModel->delete('customers',array('id' => $id));
redirect('customers?msg=cust_del');
	}
	
	
	
	public function addBulkCustomer(){
	
	
	
	$base = $_SERVER['DOCUMENT_ROOT'];
      
        if (!empty($_FILES['bulk']['name'])) {
            $temp = explode('.', $_FILES['bulk']['name']);
            $extension = end($temp);
            $randFile = rand(100000000, 999999999) . rand(1000000, 9999999) . "." . $extension;
            move_uploaded_file($_FILES['bulk']['tmp_name'], $base . "/skote2/assets/bulk_files/" . $randFile);
        }
	$row = 1;
	
	if (($handle = fopen($base . "/skote2/assets/bulk_files/" . $randFile,"r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
       
        $row++;
      
		//echo $data[0] . "<br />\n";
		$data=array('first_name' =>$data[0],
		'last_name' =>$data[1],
		'phone' =>$data[2],
		'email' =>$data[3],
		'address' =>$data[4],
		'status' =>1,
		
		);
		$this->ProductModel->insertData('customers', $data);
		
    }
    fclose($handle);
}
redirect('customers?msg=bulk_add');
	}
	
}