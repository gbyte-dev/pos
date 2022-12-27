<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CouponController extends CI_Controller {
	
	
	
	public function coupon_view()
	{
	$data['data'] = $this->CouponModel->readData_all('coupons');
	
		$this->load->view('coupons',$data);
	}
	
	
	
	public function addCoupon_view()
	{
	
	
		$this->load->view('add_coupon');
	}
	
	public function editCoupon_view(){
	
	$id=$this->input->get('id');
	$data['data'] = $this->CouponModel->readData_where('coupons',array('id' => $id));
	$this->load->view('edit_coupon',$data);
	}
	
	public function addCoupon()
	{

		
		$data = [ 
			'title'=>$this->input->post('title'),
			'coupon_code'=>$this->input->post('coupon_code'),
			'coupon_type'=>$this->input->post('coupon_type'),
			'limit_coupon'=>$this->input->post('limit_coupon'),
			'start_date'=>$this->input->post('start_date'),
			'expire_date'=>$this->input->post('expire_date'),
			'min_purchase'=>$this->input->post('min_purchase'),
			'max_discount'=>$this->input->post('max_discount'),
			'discount'=>$this->input->post('min_purchase'),
			'discount_type'=>$this->input->post('discount_type')
		];
		$lastid = $this->CouponModel->insertData('coupons',$data);
		redirect('coupons?msg=coup_add');
	}
	
		public function editCoupon()
	{
	
	 
	 $id=$this->input->post('id');
	
		$data = [
			'title'=>$this->input->post('title'),
			'coupon_code'=>$this->input->post('coupon_code'),
			'coupon_type'=>$this->input->post('coupon_type'),
			'limit_coupon'=>$this->input->post('limit_coupon'),
			'start_date'=>$this->input->post('start_date'),
			'expire_date'=>$this->input->post('expire_date'),
			'min_purchase'=>$this->input->post('min_purchase'),
			'max_discount'=>$this->input->post('max_discount'),
			'discount'=>$this->input->post('discount'),
			'discount_type'=>$this->input->post('discount_type')
			
			
		];
		$lastid = $this->CouponModel->update('coupons',$id,$data);
		redirect('coupons?msg=coup_edit');
		
	}
	
	public function deleteCoupon(){
	$id = $this->input->get('id'); 
	 $this->CouponModel->delete('coupons',array('id' => $id));
redirect('coupons?msg=coup_del');
	}
	
	public function addBulkCoupon(){
		
	
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
		
		$data=array('title' =>$data[0],
		'coupon_code' =>$data[1],
		'coupon_type' =>$data[2],
		'limit_coupon' =>$data[3],
		'start_date' =>$data[4],
		'expire_date' =>$data[5],
		'min_purchase' =>$data[6],
		'max_discount' =>$data[7],
		'discount' =>$data[8],
		'discount_type' =>$data[9]
		);
		$this->ProductModel->insertData('coupons', $data);
		
    }
    fclose($handle);
}
redirect('coupons?msg=bulk_add');
	}
	
	public function checkCoupon(){
	
	$data = $this->CouponModel->readData_where('coupons',array('coupon_code' => $this->input->post('coupon_code')));
	if($data){
	echo "exist";
	}
	
	
	}
	
}