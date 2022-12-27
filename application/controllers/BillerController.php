<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BillerController extends CI_Controller {
	
	
	
	public function biller_view()
	{
	$data['data'] = $this->BillerModel->readData_where_1('admin',array('role'=>2));
	
		$this->load->view('biller',$data);
	}
	
	
	
	public function addBiller_view()
	{
	
		$this->load->view('addBiller');
	}
	
	public function editBiller_view(){
	
	$id=$this->input->get('id');
	$data['data'] = $this->BillerModel->readData_where('admin',array('id' => $id));
	$this->load->view('edit_biller',$data);
	}
	
	public function addBiller()
	{


		$base =  $_SERVER['DOCUMENT_ROOT'];  
		if($_FILES['image']['name']){
			$temp= explode('.',$_FILES['image']['name']);
			$extension = end($temp);
			$randFile = rand(100000000,999999999).rand(1000000,9999999).".".$extension;
			move_uploaded_file($_FILES['image']['tmp_name'],$base."/skote2/assets/biller_images/".$randFile);
		}
		
		$data = [ 
			'first_name'=>$this->input->post('first_name'),
			'last_name'=>$this->input->post('last_name'),
			'phone'=>$this->input->post('phone'),
			'email'=>$this->input->post('email'),
			'password'=>$this->input->post('password'),
			'address'=>$this->input->post('address'),
			'profile_picture'=>$randFile??"",
			'role'=>2
			
		];
		$lastid = $this->BillerModel->insertData('admin',$data);
		redirect('biller?msg=bill_add');
	}
	
		public function editBiller()
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
			move_uploaded_file($_FILES['image']['tmp_name'],$base."/skote2/assets/biller_images/".$randFile);
		
		}
		$data = [ 
			'first_name'=>$this->input->post('first_name'),
			'last_name'=>$this->input->post('last_name'),
			'phone'=>$this->input->post('phone'),
			'email'=>$this->input->post('email'),
			'password'=>$this->input->post('password'),
			'address'=>$this->input->post('address'),
			'profile_picture'=>$randFile
			
		];
		$lastid = $this->BillerModel->update('admin',$id,$data);
		redirect('biller?msg=bill_edit');
		
	}
	
	public function deleteBiller(){
	$id = $this->input->get('id'); 
	 $this->BillerModel->delete('admin',array('id' => $id));
redirect('biller?msg=bill_del');
	}
	
	public function changePassword(){
	
	
	 $id=$this->input->post('id');
	  $password=$this->input->post('password');
	 if($password!=""){
	  $lastid = $this->BillerModel->update('admin',$id,array('password'=>$password));
	  redirect('biller?msg=change_pass');
	 }else{
	 
	 redirect('editBiller?id='.$id);
	 }
	  
	}
	
	public function addBulkBiller(){
	
	
	
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
		'email' =>$data[2],
		'password' =>$data[3],
		'phone' =>$data[4],
		'address' =>$data[5],
		'role'=>$data[6]
		
		);
		$this->ProductModel->insertData('admin', $data);
		
    }
    fclose($handle);
}
redirect('biller?msg=bulk_add');
	}
}