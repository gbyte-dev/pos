<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class POSController extends CI_Controller {
	
	
	public function pos_view()
	{
	
if(isset($_SESSION['extra_discount'])){
$this->session->unset_userdata('extra_discount');
}
	$data['rand']=rand(1000000000,9999999999);
	$data['data'] = $this->POSModel->readData_all('category');
	//print_r($data['data']);die;
	//$data['data6'] = $this->POSModel->readData_where('subcategory', array('category' => $data['data']['category']));
	$data['data1'] = $this->POSModel->readData_where_1('customers',array('status'=>1));
	$data['data2'] = $this->POSModel->readData_where_1('products',array('status'=>1,'quantity >'=>0));
	$data['data3'] = $this->POSModel->readData_all('payment');
		$this->load->view('pos1',$data);
	}
	
	public function ajax_name(){
	$id=$this->input->post('id');
	$data = $this->POSModel->readData_where('customers',array('id' => $id));
	//print_r($data);
	echo $data['first_name'].' '.$data['last_name'];
	
	}
	
		public function ajax_subcategory(){
	$id=$this->input->post('id');
	$postid=$this->input->post('postid');
	$data1 = $this->POSModel->readData_where_1('subcategory',array('category' => $id));
	$data = $this->POSModel->readData_where('products',array('id' => $postid));
	//print_r($data['data1']);
	//echo $this->db->last_query();
	$row=$data1;
	//print_r($row);
	
	foreach($row as $res){
	if($res['id']==$data['subcategory']){
	$rr="Selected";
	}
	else{
	$rr="";
	}
	echo "<option value='".$res['id']."' ".$rr." >".$res['subcategory']."</option>";
	}
	}
	 
	 	
	
	
	public function ajax_suggest()
	{
	$like=$this->input->post('like');
	if($like!=""){
	$data = $this->POSModel->multi_like($like);
	//echo $this->db->last_query();
	}else{
	$data = $this->POSModel->readData_where_1('products',array('status'=>1,'quantity >'=>0));
	}
	$rand=rand(1000000000,9999999999);
	$base_url=base_url();
	
	foreach($data as $res){
	//$id=$res['id'];
	if($res['display_image']){
	$image=$res['display_image'];
	}else{
	$image="default.png";
	}
	$product_id=$res['id'];
	$product_name=$res['product_name'];
	$currency=$res['currency'];
	$selling_price=$res['discounted_price'];
	$cost_price=$res['selling_price'];
	$tax=$res['tax'];
	$quantity=$res['quantity'];
	echo "<div class='col-md-6 mt-3'>
                            <div class='row' onclick='add_cart(
	
	$product_id,
	$rand
	)'><div class='col-md-5'>
			   <div class='col-md-4 m-auto mt-2' id='disp_image'><img src='".$base_url."assets/singleProductImg/$image' height='70px' width='70px' /></div>
                               </div>
                               <div class='col-md-7 p-2'>
                              $product_name <br/>
                                $currency $selling_price &nbsp;&nbsp;<del style='font-size:10px;'>$currency $cost_price</del><br/>
								<span>Qty: $quantity</span>
                            </div>
                        </div>
                    </div>";	
	}}
	
	
	public function ajax_destroy(){
	$id=$this->input->post('id');
	 $this->POSModel->delete('temp_cart',array('id' => $id));
	}
	
	public function add_cart(){
	$base_url=base_url();
	$product_id=$this->input->post('product_id');
	$query = $this->POSModel->readData_where('products',array('id' =>$product_id));
	
	$product_name=$query['product_name'];
	if($query['display_image']){
	$image = $query['display_image'];
	}else{
	$image="default.png";
	}
	$selling_price=$query['discounted_price'];
	
	$marked_price=$query['selling_price'];
	$currency=$query['currency'];
	$tax=$query['tax'];
	$rand=$this->input->post('rand');
	$product_discount=$marked_price-$selling_price;
	$quantity=$query['quantity'];
	
	
	$quer = $this->POSModel->readData_where('temp_cart',array('product_id' =>$product_id,'cart_key'=>$rand));
	if($quer){
	
	$arr=array('cart_key'=>$rand,'product_id'=>$product_id);
	$qty=array('product_qty'=>$quer['product_qty']+1,'product_subtotal'=>($quer['product_qty']+1)*$selling_price,'product_finalprice'=>$quer['product_finalprice']+$selling_price,'product_subtax'=>($quer['product_qty']+1)*$tax,'product_subdiscount'=>$product_discount*($quer['product_qty']+1));
	 $this->POSModel->update_data('temp_cart',$arr,$qty);
	 
$arr=array('qty'=>$quer['product_qty']+1,'subto'=>$currency.' '.($quer['product_qty']+1)*$selling_price);
	 echo json_encode($arr);
	 //print_r($arr);
	}else{
	$data=array('product_id'=>$product_id,
	'product_qty'=>1,
	'product_unitprice'=>$selling_price,
	'currency'=>$currency,
	'product_subtotal'=>$selling_price,
	'product_unittax'=>$tax,
	'product_subtax'=>$tax,
	'product_finalprice'=>$selling_price,
	'create_date'=>date('Y-m-d H:i:s'),
	'cart_key'=>$rand,
	'product_discount'=>$product_discount,
	'product_subdiscount'=>$product_discount
	);
	
	$last_id= $this->POSModel->insertData('temp_cart', $data);

	 $html="<tr id='des_".$last_id."'><td class='text-center'><img src='".$base_url."assets/singleProductImg/$image' height='50px' width='40px' />$product_name</td><td class='text-center'><input type='number' name='qty' id='qty_$product_id' min ='1' max='$quantity' value='1' style='width:130%;padding:initial;' onchange='update_cart(this.value,$product_id,$rand,$selling_price,$quantity)'></td><td id='unit'>$currency $selling_price</td><td class='text-center' id='upcart_$product_id'>$currency $selling_price</td><td class='text-center'> <a  class='btn btn-danger btn-sm' onclick='destroy($last_id,$rand)'><i class='fa fa-trash'></i></a></td>
</tr>
";
$arr=array('html'=>$html,'last_id'=>$last_id);
echo json_encode($arr);
	}
	}
	
	
	public function ajax_update_cart(){
	$postid=$this->input->post('product_id');
	$data1 = $this->POSModel->readData_where('products',array('id' =>$postid));
	$data = $this->POSModel->readData_where('temp_cart',array('product_id' =>$postid));
	$product_discount=$data1['selling_price']-$data1['discounted_price'];
	$arr=array('cart_key'=>$this->input->post('rand'),'product_id'=>$this->input->post('product_id'));
	$qty=array('product_qty'=>$this->input->post('product_qty'),'product_subtotal'=>$this->input->post('product_qty')*$this->input->post('unit_price'),'product_subtax'=>$this->input->post('product_qty')*$data1['tax'],'product_subdiscount'=>$this->input->post('product_qty')*$product_discount);
	
	 $this->POSModel->update_data('temp_cart',$arr,$qty);
	//echo $this->db->last_query();
	if($data1['quantity']>=$this->input->post('product_qty')){
	
	echo $data['currency'].' '.$this->input->post('product_qty')*$this->input->post('unit_price');
	}else{
	
	echo "error";
	}
	}
	
	 
	
	public function ajax_read_cart(){
	//print_r($_SESSION);
	$rand=$this->input->post('rand');
	$data = $this->POSModel->readData_where_1('temp_cart',array('cart_key' =>$rand));
	  // echo $this->db->last_query();
	   
	   $discount=0;
	   $tax=0;
	   $subtotal=0;
	   $total=0;
	   $currency='';
	   foreach($data as $res){
	   if($res['currency']){
	  $currency=$res['currency'];
	   }
	   $discount=$discount+$res['product_subdiscount'];
	   $tax=$tax+$res['product_subtax'];
	   $subtotal=$subtotal+$res['product_subtotal'];
	   if(isset($_SESSION['extra_discount'])){
	   $type=$this->input->post('type');
	   $value=$this->input->post('value');
	   if($type==1){
	   
	    $total=$tax+($subtotal-$value);
		$this->session->set_userdata('extra_discount', array('extradiscount'=>$value));
	   }
	   else{
	   
	   $subtotal_new=($value*$subtotal)/100;
	   $value1=$subtotal_new;
	   $this->session->set_userdata('extra_discount', array('extradiscount'=>$value1));
	   $total=$tax+($subtotal-$subtotal_new);
	   
	   }
	   }else{
	   
	   $total=$tax+$subtotal;
	   }}
	   
	   if(isset($currency)){
	   $arr=array('discount'=>$currency.' '.$discount,'tax'=>$currency.' '.$tax,'subtotal'=>$currency.' '.$subtotal,'total'=>$currency.' '.$total);
	   }else{
	   $arr=array('discount'=>$currency.' '.$discount,'tax'=>$currency.' '.$tax,'subtotal'=>$currency.' '.$subtotal,'total'=>$currency.' '.$total);
	   }
	   
	   echo json_encode($arr);
	
	}
	
	
	
	public function ajax_add_extra_discount(){
	
	$arr=array('value'=>$this->input->post('value'),'type'=>$this->input->post('type'));
	
	    $this->session->set_userdata('extra_discount', $arr);
		$type=$_SESSION['extra_discount']['type'];
		if($type==2){
		$value=$_SESSION['extra_discount']['value'].'%';
		}
		else{
		$value=$_SESSION['extra_discount']['value'];
		}
		
		echo "<span> $value</span>";
	}
	
	
	
	
	public function ajax_submit_order(){
	
	//print_r($_SESSION);
	if(isset($_SESSION['coupon_discount']) && isset($_SESSION['coupon_code'])){
		$coupondiscount = $this->session->userdata('coupon_discount');
		$couponcode=$this->session->userdata('coupon_code');
	}else{
		$coupondiscount = "0";
		$couponcode='';
	}
	$type=$this->input->post('type');
	$value=$this->input->post('value');
	
	$data = $this->POSModel->readData_where('admin',array('role' =>2));
	$data1 = $this->POSModel->readData_where_1('temp_cart',array('cart_key' =>$this->input->post('rand')));
	
	
	$discount=0;
	   $tax=0;
	   $subtotal=0;
	   $total=0; 
	 foreach($data1 as $res){
	  $data2=$this->POSModel->readData_where('products',array('id' =>$res['product_id']));
	  $cost_price=$data2['cost_price']*$res['product_qty'];
	   $discount=$discount+$res['product_subdiscount'];
	   $tax=$tax+$res['product_subtax'];
	   $subtotal=$subtotal+$res['product_subtotal'];
	   if($type==1){
	$extra_discount=$value;
	}else{
	$extra_discount=($value*$subtotal)/100;
	}
	  }
	$arr=array('customer_id'=>$this->input->post('customer_id'),
	'random_num'=>$this->input->post('rand'),
	'sale_date'=>date('Y-m-d H:i:s'),
	'payment_method'=>$this->input->post('payment_method'),
	'sub_total'=>$subtotal,
	'product_discount'=>$discount,
	'extra_discount'=>$extra_discount, 
	'coupon_discount'=>$coupondiscount,
	'coupon_code'=>$couponcode,
	'tax'=>$tax,
	'biller_id'=>$data['id'],
	'cost_price'=>$cost_price
	);
	$last_id=$this->POSModel->insertData('sales',$arr);
	echo $last_id;
	$this->session->unset_userdata('coupon_discount');
	$this->session->unset_userdata('coupon_code');
	}
	
	public function ajax_final_cart(){ 
	
	$sale_id=$this->input->post('sale_id');
	$data1 = $this->POSModel->readData_where_1('temp_cart',array('cart_key' =>$this->input->post('rand')));
	
	 foreach($data1 as $res){
	  $data=array('sale_id'=>$sale_id,
	'product_id'=>$res['product_id'],
	'product_qty'=>$res['product_qty'],
	'product_unitprice'=>$res['product_unitprice'],
	'currency'=>$res['currency'],
	'product_subtotal'=>$res['product_subtotal'],
	'product_unittax'=>$res['product_unittax'],
	'product_subtax'=>$res['product_subtax'],
	'product_finalprice'=>$res['product_finalprice'],
	'create_date'=>date('Y-m-d H:i:s'),
	'cart_key'=>$res['cart_key'],
	'product_discount'=>$res['product_discount'],
	'product_subdiscount'=>$res['product_subdiscount'],
	'biller_id'=>$_SESSION['id']
	);
	$last_id=$this->POSModel->insertData('final_cart',$data);
	echo $sale_id;
	$data2 = $this->POSModel->readData_where_1('final_cart',array('sale_id' =>$sale_id));
	
	foreach($data2 as $res2){
	$product_id=$res2['product_id'];
	$product_qty=$res2['product_qty'];
	$data3 = $this->POSModel->readData_where('products',array('id' =>$product_id));
	$this->POSModel->update_data('products',array('id'=>$product_id),array('quantity'=>$data3['quantity']-$product_qty));
	//echo $this->db->last_query();
	}
	
	  }
	}
	
	
	public function ajax_add_customer() 
	{
	$first_name=$this->input->post('first_name');
	$last_name=$this->input->post('last_name');
	$email=$this->input->post('email');
	$phone=$this->input->post('phone');
	$address=$this->input->post('address');
	$status=$this->input->post('status');
	
	$arr=array('first_name'=>$first_name,'last_name'=>$last_name,'email'=>$email,'phone'=>$phone,'address'=>$address,'status'=>$status);
	$lastid = $this->CustomerModel->insertData('customers',$arr);
		echo "<option value='$lastid'>$first_name $last_name</option>";
	}
	
	
  public function ajax_coupon_discount(){


	if($this->session->userdata('extra_discount')['extradiscount'] != ""){
		$extradiscount = $this->session->userdata('extra_discount')['extradiscount'];
	}else{
		$extradiscount = "0";
	}
	$data=$this->POSModel->readData_where('coupons',array('coupon_code' =>$this->input->post('coupon_code')));
	

	
	$limit=$data['limit_coupon'];
	$discount=$data['discount'];
	$max_discount=$data['max_discount'];
	if($discount <= $max_discount){
	$discount=$data['discount'];
	}
	else{
	$discount=$max_discount;
	}
	$discount_type=$data['discount_type'];
	$min_purchase=$data['min_purchase'];
	$expire_date=$data['expire_date'];
	$start_date=$data['start_date'];
	$coupon_type=$data['coupon_type'];
	$status='';
	$total=0;
	$currency='';
	
	$coupon_type_error='';
	if($data){
	if($coupon_type==2){
	if(($expire_date > date('Y-m-d')) && ($start_date < date('Y-m-d'))){
	$data1=$this->POSModel->readData_where('sales',array('customer_id' =>$this->input->post('customer_id')));
	if($data1){
		$coupon_type_error='This Coupon Is Already Used';
	}
	else{
	$data3=$this->POSModel->readData_where_1('temp_cart',array('cart_key' => $this->input->post('cart_key')));
	$total=0;
	foreach($data3 as $res){
	$currency=$res['currency'];
	$total=$total+($res['product_subtotal']+$res['product_subtax']);
	}
	$total = $total-$extradiscount;
	if($discount_type==2){
	 $total=$total-$discount;
	 $this->session->set_userdata('coupon_discount',$discount);
	}
	else{
	$total1=($total*$discount)/100;
	if($total1 > $max_discount){
	$total1=$max_discount;
	}
	$this->session->set_userdata('coupon_discount',$total1);
	$total=$total-$total1;
	}

	
	if($total < $min_purchase){
	$status="Minimum Purchase is ".$min_purchase;
	}
	$coupon_type_error='Limit Exceeded';
	}
	$this->session->set_userdata('coupon_code',$this->input->post('coupon_code'));
	}
	else{
	$status="expire";
	}
	}
	else{
	
	if(($expire_date > date('Y-m-d')) && ($start_date < date('Y-m-d'))){
	
	$data1=$this->POSModel->readData_where('sales',array('customer_id' =>$this->input->post('customer_id')));
	if($data1){
		$coupon_type_error='This Coupon Is Already Used';
	}
	else{
	$data3=$this->POSModel->readData_where_1('temp_cart',array('cart_key' => $this->input->post('cart_key')));
	$total=0;
	foreach($data3 as $res){
	$currency=$res['currency'];
	$total=$total+($res['product_subtotal']+$res['product_subtax']);
	}
	
	$total = $total-$extradiscount;
	
	if($discount_type==2){
	$total=$total-$discount;
	
	$this->session->set_userdata('coupon_discount',$discount);
	}
	else{
	$total1=($total*$discount)/100;
	if($total1 > $max_discount){
	$total1=$max_discount;
	}
	$this->session->set_userdata('coupon_discount',$total1);
	$total=$total-$total1;
	}
	//echo $total;
	
	if($total < $min_purchase){
	$status="Minimum Purchase is ".$min_purchase;
	}
	$coupon_type_error='Limit Exceeded';
	}
		$this->session->set_userdata('coupon_code',$this->input->post('coupon_code'));
	}
	else{
	$status="expire";
	
	}
	
	}
	
	}else{
	$status="invalid";
	
	}
	
	if(isset($_SESSION['coupon_discount'])){
	$coupon_discount=$_SESSION['coupon_discount'];
	
	} 
	else{
	$coupon_discount=0;
	}
	//echo $extradiscount;  die("=========");
	$arr=array('coupon_error'=>$coupon_type_error,'status'=>$status,'total'=>$currency.' '.$total,'coupon_discount'=>$currency.' '.$coupon_discount);
	echo json_encode($arr);
	
}
	
}