<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PaymentController extends CI_Controller {
	
	
	public function payment_view()
	{
	$data['data'] = $this->PaymentModel->readData_all('payment');
		$this->load->view('payment',$data);
	}
	
	
	public function addPayment()
	{
	$payment=$this->input->post('method');
	$arr=array('payment'=>$payment);
	$lastid = $this->PaymentModel->insertData('payment',$arr);
		redirect('payments?msg=pay_add');
	}
	
	public function editPayment(){
	$id=$this->input->post('id');
	$payment=$this->input->post('method1');
	
	$arr=array('payment'=>$payment);
	$this->PaymentModel->update('payment',$id,$arr);
	redirect('payments?msg=pay_edit');
	}
	
	
	
	public function deletePayment(){
	$id = $this->input->get('id'); 
	 $this->CategoryModel->delete('payment',array('id' => $id));
redirect('payments?msg=pay_del');
	}
	
	public function addBulkPayment(){
	
	
	
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
      
		echo $data[0] . "<br />\n";
		$data=array('payment' =>$data[0]
		
		
		);
		$this->ProductModel->insertData('payment', $data);
		
    }
	//die; 
    fclose($handle);
}
redirect('payments?msg=bulk_add');
	}
	
}