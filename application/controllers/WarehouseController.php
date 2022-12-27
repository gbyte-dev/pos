<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WarehouseController extends CI_Controller {
	
	
	
	public function addWarehouse_view()
	{
	
	
		$this->load->view('addWarehouse');
	}
	
	public function warehouse_view()
	{
	$data['data'] = $this->WarehouseModel->readData_all('warehouse');
	
		$this->load->view('warehouse',$data);
	}
	
	public function addWarehouse()
	{
	$name=$this->input->post('name');
	$email=$this->input->post('email');
	$phone=$this->input->post('phone');
	$country=$this->input->post('country');
	$city=$this->input->post('city');
	$zipcode=$this->input->post('zipcode');
	
	$arr=array('name'=>$name,'email'=>$email,'email'=>$email,'phone'=>$phone,'country'=>$country,'city'=>$city,'zipcode'=>$zipcode);
	$lastid = $this->WarehouseModel->insertData('warehouse',$arr);
		redirect('warehouse?msg=ware_add');
	}
	
	public function editWarehouse_view(){
	
	$id=$this->input->get('id');
	$data['data'] = $this->WarehouseModel->readData_where('warehouse',array('id' => $id));
	$this->load->view('edit_warehouse',$data);
	}
	
	public function editWarehouse(){
	$id=$this->input->post('id');
	$name=$this->input->post('name');
	$email=$this->input->post('email');
	$phone=$this->input->post('phone');
	$country=$this->input->post('country');
	$city=$this->input->post('city');
	$zipcode=$this->input->post('zipcode');
	
	$arr=array('name'=>$name,'email'=>$email,'email'=>$email,'phone'=>$phone,'country'=>$country,'city'=>$city,'zipcode'=>$zipcode);
	$this->WarehouseModel->update('warehouse',$id,$arr);
	redirect('warehouse?msg=ware_edit');
	}
	
	public function deleteWarehouse(){
	$id = $this->input->get('id'); 
	 $this->WarehouseModel->delete('warehouse',array('id' => $id));
redirect('warehouse?msg=ware_del');
	}
	
	public function addBulkWarehouse(){
	
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
		$data=array('name' =>$data[0],
		'email' =>$data[1],
		'phone' =>$data[2],
		'country' =>$data[3],
		'city' =>$data[4],
		'zipcode' =>$data[5]
		
		
		);
		$this->ProductModel->insertData('warehouse', $data);
		
    }
    fclose($handle);
}
redirect('warehouse?msg=bulk_add');
	}
	
}