<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CategoryController extends CI_Controller {
	
	
	public function category_view()
	{
	$data['data'] = $this->CategoryModel->readData_all('category');
		$this->load->view('category',$data);
	}
	
	
	public function subcategory_view()
	{
	$data['data'] = $this->CategoryModel->readData_all('subcategory');
	$data['data1'] = $this->CategoryModel->readData_all('category');
		$this->load->view('subcategory',$data);
	}
	
	public function category_form()
	{
	
		$this->load->view('add_category');
	}
	
	public function addCategory()
	{
	$category=$this->input->post('category');
	$arr=array('category'=>$category);
	$lastid = $this->CategoryModel->insertData('category',$arr);
		redirect('categories?msg=cat_add');
	}
	
	
		public function ajax_subcategory(){
	$id=$this->input->post('id');
	$postid=$this->input->post('postid');
	$data1 = $this->CategoryModel->readData_where_1('subcategory',array('category' => $id));
	$data = $this->CategoryModel->readData_where('products',array('id' => $postid));
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
	
	public function addSubCategory()
	{
	$subcategory=$this->input->post('subcategory');
	$category=$this->input->post('category');
	$arr=array('subcategory'=>$subcategory,'category'=>$category);
	$lastid = $this->CategoryModel->insertData('subcategory',$arr);
		redirect('subcategories?msg=subcat_add');
	}
	
	public function editCategory(){
	$id=$this->input->post('id');
	$category=$this->input->post('category1');
	
	$arr=array('category'=>$category);
	$this->CategoryModel->update('category',$id,$arr);
	redirect('categories?msg=cat_edit');
	}
	
	public function editSubCategory(){
	$id=$this->input->post('id');
	//echo $id;die;
	$subcategory=$this->input->post('subcategory1');
	$category=$this->input->post('category1');
	
	$arr=array('subcategory'=>$subcategory,'category'=>$category);
	
	$this->CategoryModel->update('subcategory',$id,$arr);
	redirect('subcategories?msg=subcat_edit');
	}
	
	public function deleteCategory(){
	$id = $this->input->get('id'); 
	 $this->CategoryModel->delete('category',array('id' => $id));
redirect('categories?msg=cat_del');
	}
	
	public function deleteSubCategory(){
	$id = $this->input->get('id'); 
	 $this->CategoryModel->delete('subcategory',array('id' => $id));
redirect('subcategories?msg=subcat_del');
	}
	
	
	
	
	public function ajax_suggest_category()
	{
	$id=$this->input->post('id');
	if($id>0){
	$data = $this->POSModel->readData_where_1('products',array('category' => $id,'status'=>1,'quantity >'=>0));
	}else{
	$data= $this->POSModel->readData_where_1('products',array('status'=>1,'quantity >'=>0));
	}
	$base_url=base_url();
	$rand=rand(1000000000,9999999999);
	foreach($data as $res){
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
	echo "<div class='col-md-6 mt-3' style='cursor:pointer;'>
		<div class='row' onclick='add_cart(
	$product_id,
	$rand
	)'><div class='col-md-5'>
			   <div class='col-md-4 m-auto mt-2' id='disp_image'><img src='".$base_url."assets/singleProductImg/$image' height='70px' width='70px' /></div>
                               </div>
                               <div class='col-md-7 p-2'>
                              $product_name <br/>
                                $currency $selling_price &nbsp;&nbsp;
								<del style='font-size:10px;'>$currency $cost_price</del><br/>
								<span>Qty: $quantity</span>
                            </div>
                        </div>
                    </div>";	
	}
	}
	
	public function ajax_suggest_subcategory()
	{
	$id=$this->input->post('id');
	$data = $this->POSModel->readData_where_1('products',array('subcategory' => $id,'status'=>1,'quantity >'=>0));
	$base_url=base_url();
	$rand=rand(1000000000,9999999999);
	foreach($data as $res){
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
	echo "<div class='col-md-6 mt-3' style='cursor:pointer;'>
		<div class='row' onclick='add_cart($product_id,
	$rand
	)'><div class='col-md-5'>
			   <div class='col-md-4 m-auto mt-2' id='disp_image'><img src='".$base_url."assets/singleProductImg/$image' height='70px' width='70px' /></div>
                               </div>
                               <div class='col-md-7 p-2'>
                              $product_name <br/>
                                $currency $selling_price &nbsp;&nbsp;<del style='font-size:10px;'>$currency $cost_price</del>
								<br/>
								<span>Qty: $quantity</span>
                            </div>
                        </div>
                    </div>";	
	}
	}
}