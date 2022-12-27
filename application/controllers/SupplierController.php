<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SupplierController extends CI_Controller {
	
	
	
	public function supplier_view()
	{
	$data['data'] = $this->SupplierModel->readData_all('supplier');
	
		$this->load->view('supplier',$data);
	}
	
	
	
	public function addSupplier_view()
	{
	
	
		$this->load->view('addSupplier');
	}
	
	public function editSupplier_view(){
	
	$id=$this->input->get('id');
	$data['data'] = $this->SupplierModel->readData_where('supplier',array('id' => $id));
	$this->load->view('edit_supplier',$data);
	}
	
	public function addSupplier()
	{


		$base =  $_SERVER['DOCUMENT_ROOT'];  
		if($_FILES['image']['name']){
			$temp= explode('.',$_FILES['image']['name']);
			$extension = end($temp);
			$randFile = rand(100000000,999999999).rand(1000000,9999999).".".$extension;
			move_uploaded_file($_FILES['image']['tmp_name'],$base."/skote2/assets/supplier_images/".$randFile);
		}
		
		$data = [ 
			'supplier_name'=>$this->input->post('supplier_name'),
			'phone'=>$this->input->post('phone'),
			'email'=>$this->input->post('email'),
			'state'=>$this->input->post('state'),
			'city'=>$this->input->post('city'),
			'zipcode'=>$this->input->post('zipcode'),
			'address'=>$this->input->post('address'),
			'image'=>$randFile??""
			
		];
		$lastid = $this->SupplierModel->insertData('supplier',$data);
		redirect('supplier?msg=supp_add');
	}
	
		public function editSupplier()
	{
	
	 
	 $id=$this->input->post('id');
	 $display_image=$this->input->post('display_image');
	 if($display_image!=""){
	 $randFile=$display_image;
	 }
	 
	 	$base =  $_SERVER['DOCUMENT_ROOT']; 
		//echo $_FILES['display_image']['name'];
		if(!empty($_FILES['image']['name'])){
		
		
			$temp= explode('.',$_FILES['image']['name']);
			$extension = end($temp);
			$randFile = rand(100000000,999999999).rand(1000000,9999999).".".$extension;
			move_uploaded_file($_FILES['image']['tmp_name'],$base."/skote2/assets/supplier_images/".$randFile);
		
		}
		$data = [
			'supplier_name'=>$this->input->post('supplier_name'),
			'phone'=>$this->input->post('phone'),
			'email'=>$this->input->post('email'),
			'state'=>$this->input->post('state'),
			'city'=>$this->input->post('city'),
			'zipcode'=>$this->input->post('zipcode'),
			'address'=>$this->input->post('address'),
			'image'=>$randFile
			
		];
		$lastid = $this->SupplierModel->update('supplier',$id,$data);
		redirect('supplier?msg=supp_edit');
		
	}
	
	public function deleteSupplier(){
	$id = $this->input->get('id'); 
	 $this->SupplierModel->delete('supplier',array('id' => $id));
redirect('supplier?msg=supp_del');
	}
	
	public function addBulkSupplier(){
	
	
	
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
		$data=array('supplier_name' =>$data[0],
		'phone' =>$data[1],
		'email' =>$data[2],
		'state' =>$data[3],
		'city' =>$data[4],
		'zipcode' =>$data[5],
		'address' =>$data[6]
		
		);
		$this->ProductModel->insertData('supplier', $data);
		
    }
    fclose($handle);
}
redirect('supplier?msg=bulk_add');
	}
	
} 