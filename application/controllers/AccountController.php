<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AccountController extends CI_Controller {
	
	public function account_view(){
	
	$data['data'] = $this->AccountModel->readData_all('account');
	$this->load->view('account',$data);
	}
	
	public function addAccount(){
	$data=array('account_number'=>$this->input->post('account'),
	'name'=>$this->input->post('name'),
	'initial'=>$this->input->post('initial'),
	'balance_note'=>$this->input->post('note')
	
	);	
	$lastid = $this->AccountModel->insertData('account',$data);
		redirect('account?msg=acc_add');
	}
	
	public function editAccount(){
	$id=$this->input->post('id');
	$data=array('account_number'=>$this->input->post('account1'),
	'name'=>$this->input->post('name1'),
	'initial'=>$this->input->post('initial1'),
	'balance_note'=>$this->input->post('note1')
	
	);	
	$lastid = $this->ExpenseModel->update('account',$id,$data);
		redirect('account?msg=acc_edit');
	}
	
	public function deleteAccount(){
	$id = $this->input->get('id'); 
	$this->ExpenseModel->delete('account',array('id' => $id));
redirect('account?msg=acc_del');
	}
	
	
	public function money_transfer_view(){
	$data['data1'] = $this->AccountModel->readData_all('account');
	$data['data'] = $this->AccountModel->readData_all('money_transfer');
	$this->load->view('money_transfer',$data);
	}
	
	public function transfer_product_view(){
	//$data['data1'] = $this->AccountModel->readData_all('account');
	//$data['data'] = $this->AccountModel->readData_all('money_transfer');
	$data['getdata']=$this->ProductModel->readData_tranfer_product('transfer_product'); 
	//echo $data['getdata']['warehouse_from'];die('+++');
	//foreach($data['getdata'] as $ddd){
	//	echo $ddd['warehouse_from'];die('+++');
	//}
	//print_r($data['getdata']);die('====');
	

	$this->load->view('transfer_product',$data);
	}
	public function demo3(){  
	
	$warehouse_from=	$this->input->post('warehouse');

	$Warehouse2 = implode(",", $_POST['Warehouse2']);
	$warehouse_to=$this->input->post('warehouse3'); 
	 $date1 = date('Y-m-d');
	 
	 $arr = array("warehouse_from" => $warehouse_from,
	              "pro_qty" =>"$Warehouse2",
				  "warehouse_to"=>$warehouse_to,
				   "date"=>$date1
	);
	//print_r($arr);die('===');
	$data['lastdata'] = $this->ProductModel->tbl_insertData('transfer_product',$arr);
	//print_r($lastid );die('====');
	 $con=array(
	'id'=>$data['lastdata']
	); 
	$data['data11']=$this->ProductModel->readData_where('transfer_product',$con);
   //print_r($data['data11']); die('===');
	$pro_id=$data['data11']['pro_qty'];
	 $pro_id_exp=explode(",",$pro_id);
	 $pro_qty_id=$data['data11']['warehouse_from'];
	$qty_transfer=$data['data11']['warehouse_to'];
	foreach($pro_id_exp as $iddd){
		//print_r($iddd);
	$data['data9']=$this->ProductModel->readData_where_2('products',$iddd); 
	}
	$data['data20']=$this->ProductModel->readData_where_3('products',$pro_qty_id); 
	$data['data12']=$this->ProductModel->readData_qty('warehouse',$qty_transfer); 
	$data['data15']=$this->ProductModel->readData_qty_1('warehouse',$pro_qty_id); 
    $this->load->view('insert_data',$data); 
	}
	public function demo(){ 
	 $id=$this->input->post('id');
	 $data['data5'] = $this->ProductModel->readData_all('warehouse');
	 $data['data6'] = $this->ProductModel->readData_pro_all('products',$id); 
	 $this->load->view('add_product_demo',$data);
	}
	public function demo5(){
		
	$product_id =$_POST['product_id'];
	$count1=count($product_id);
	for($i=0;$i<$count1;$i++){
		
		echo $curr_qty = $_POST['curr_qty'][$i];
		$product_id = $_POST['product_id'][$i];
	   $tranfer_qty = $_POST['tranfer_qty'][$i];
	   $last_insert_id = $_POST['last_insert'];
	  $arr = array("product_id" =>$product_id,
	              "tranfer_qty" =>$tranfer_qty,
				  "last_insert_id"=>$last_insert_id,
				  "current_qty"=>$curr_qty
	);
	$last_id = $this->ProductModel->stock_insertData('stock_transfer',$arr);
    $data['qty'] = $this->ProductModel->readData_stock_all('products',$product_id); 
	$stock_qty= $data['qty']['quantity'];
	$remain_stock='';
	if($stock_qty>0){
	$remain_stock=$stock_qty - $tranfer_qty;
	}
	$arr = array("quantity" =>$remain_stock
	);
	
	$insert_last =$_POST['insert_last'];
	$stock_up = $this->ProductModel->stock_update('products',$product_id,$arr);
	$product_name= $data['qty']['product_name'];
	$currency= $data['qty']['currency'];
	$cost_price= $data['qty']['cost_price'];
	$selling_price= $data['qty']['selling_price'];
	$discounted_price= $data['qty']['discounted_price'];
	$tax= $data['qty']['tax'];
	$warehouse=$insert_last;
	$display_image= $data['qty']['display_image'];
	$sku= $data['qty']['sku'];
	$description= $data['qty']['description'];
	$category= $data['qty']['category'];
	$subcategory= $data['qty']['subcategory'];
	$status= $data['qty']['status'];
	$supplier= $data['qty']['supplier'];
	$quantity= $tranfer_qty;
	 $arr = array("product_name" => $product_name,
	              "currency" =>$currency,
				  "cost_price"=>$cost_price,
				  "selling_price" => $selling_price,
	              "discounted_price" =>$discounted_price,
				  "tax"=>$tax,
				  "warehouse" => $warehouse,
	              "display_image" =>$display_image,
				  "sku"=>$sku,
				  "description" => $description,
	              "category" =>$category,
				  "subcategory"=>$subcategory,
				  "status" =>$status,
				  "quantity"=>$quantity,
				   "supplier"=>$supplier
	);
	$insert_product = $this->ProductModel->product_insertData('products',$arr);

	}
	$data['getdata']=$this->ProductModel->readData_tranfer_product('transfer_product'); 
	//print_r($data['getdata']);die();
	 redirect('transfer_product');
	
	}
	public function demo1(){
	 $id=$this->input->post('id');
	
	 $data= $this->ProductModel->readData_pro_all('products',$id); 
	 foreach($data as $rr){
		 echo  "<option value='".$rr['id']."' >".$rr['product_name']."</option>";
	 }
	 
   }
	
	public function demo2(){
	 $id=$this->input->post('id');
	$data= $this->ProductModel->readData_show_all('products',$id); 
	$arr=array('name'=>$data['product_name'],'qyt'=>$data['quantity']);
	echo json_encode($arr);
      	
	}
	public function show_tranfer(){
	 $id=$_GET['id'];
	$data['formdata1']= $this->ProductModel->read_data_1('transfer_product',$id); 
	 $ware_from= $data['formdata1']['warehouse_from'];
	 $ware_to= $data['formdata1']['warehouse_to'];
	
	$data['fromdata']= $this->ProductModel->from_read_data('warehouse',$ware_from); 
	
	$data['todata']= $this->ProductModel->to_read_data('warehouse',$ware_to); 
	//print_r($data['todata']);die('===');
	 $this->load->view('show_tranfer_stock',$data);    	
	}
	public function addMoneyTransfer(){
	$data=array('from_account'=>$this->input->post('from_account'),
	'to_account'=>$this->input->post('to_account'),
	'amount'=>$this->input->post('amount')
	
	);	
	$lastid = $this->AccountModel->insertData('money_transfer',$data);
		redirect('money_transfer?msg=mon_add');
	}
	
	public function editMoneyTransfer(){
	$id=$this->input->post('id');
	$data=array('from_account'=>$this->input->post('from_account1'),
	'to_account'=>$this->input->post('to_account1'),
	'amount'=>$this->input->post('amount1')
	
	);	
	$lastid = $this->ExpenseModel->update('money_transfer',$id,$data);
		redirect('money_transfer?msg=mon_edit');
	}
	
	public function deleteMoneyTransfer(){
	$id = $this->input->get('id'); 
	$this->ExpenseModel->delete('money_transfer',array('id' => $id));
redirect('money_transfer?msg=mon_del');
	}
	
	
	
	
	
	
}