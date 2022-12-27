<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BrandController extends CI_Controller {
	
	public function brand_view()
	{
	$data['data'] = $this->BrandModel->readData_all('brand');
	
		$this->load->view('brand',$data);
	}
	
	public function addBrand()
	{


		$base =  $_SERVER['DOCUMENT_ROOT'];  
		if($_FILES['brand_logo']['name']){
			$temp= explode('.',$_FILES['brand_logo']['name']);
			$extension = end($temp);
			$randFile = rand(100000000,999999999).rand(1000000,9999999).".".$extension;
			move_uploaded_file($_FILES['brand_logo']['tmp_name'],$base."/skote2/assets/brand_logo/".$randFile);
		}
		
		$data = [ 
			'brand_name'=>$this->input->post('brand_name'),
			'brand_description'=>$this->input->post('brand_description'),
			'brand_logo'=>$randFile??""
			
		];
		$lastid = $this->BrandModel->insertData('brand',$data);
		redirect('brand?msg=brand_add');
	}
	
	public function deleteBrand(){
	$id = $this->input->get('id'); 
	 $this->BrandModel->delete('brand',array('id' => $id));
redirect('brand?msg=brand_del');
	}
	
	public function editBrand()
	{
	
	 
	 $id=$this->input->post('id');
	 $display_image=$this->input->post('display_image');
	 if($display_image!=""){
	 $randFile=$display_image;
	 }
	 
	 	$base =  $_SERVER['DOCUMENT_ROOT']; 
		//echo $_FILES['display_image']['name'];
		if(!empty($_FILES['brand_logo1']['name'])){
		
		
			$temp= explode('.',$_FILES['brand_logo1']['name']);
			$extension = end($temp);
			$randFile = rand(100000000,999999999).rand(1000000,9999999).".".$extension;
			move_uploaded_file($_FILES['brand_logo1']['tmp_name'],$base."/skote2/assets/brand_logo/".$randFile);
		
		}
		$data = [
			'brand_name'=>$this->input->post('brand_name1'),
			'brand_description'=>$this->input->post('brand_description1'),
			
			'brand_logo'=>$randFile
			
		];
		$lastid = $this->BrandModel->update('brand',$id,$data);
		redirect('brand?msg=brand_edit');
		
	}
	
	
	
}