<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ProductController extends CI_Controller {
    public function index() {
        $this->load->view('welcome_message');
    }
    public function settings_view() {
        $data['data'] = $this->ProductModel->readData_where('website', array('id' => 1));
        $this->load->view('settings', $data);
    }
    public function form() {
       
        $data['data1'] = $this->ProductModel->readData_all('category');
        $data['data4'] = $this->ProductModel->readData_all('supplier');
        $data['data5'] = $this->ProductModel->readData_all('warehouse');
        $data['data3'] = $this->ProductModel->readData_where('website', array('id' => 1));
        $this->load->view('form', $data);
    }
    public function addProduct() {
        $base = $_SERVER['DOCUMENT_ROOT'];
        if ($_FILES['display_image']['name']) {
            $temp = explode('.', $_FILES['display_image']['name']);
            $extension = end($temp);
            $randFile = rand(100000000, 999999999) . rand(1000000, 9999999) . "." . $extension;
            move_uploaded_file($_FILES['display_image']['tmp_name'], $base . "/skote2/assets/singleProductImg/" . $randFile);
        }
        $data = ['product_name' => $this->input->post('product_name'),
		'cost_price' => $this->input->post('cost_price'),
		'selling_price' => $this->input->post('selling_price'),
		'display_image' => $randFile??"",
		'sku' => $this->input->post('sku'), 
		'description' => $this->input->post('description'),
		'category' => $this->input->post('category'),
		'subcategory' => $this->input->post('subcategory'),
		'status' => $this->input->post('status'),
		'quantity' => $this->input->post('quantity'),
		'currency' => $this->input->post('currency'),
		'supplier' => $this->input->post('supplier'),
		'warehouse' => $this->input->post('warehouse'),
		'discounted_price' => $this->input->post('discounted_price'),
		'tax' => $this->input->post('tax'),
		
		
		];
        $lastid = $this->ProductModel->insertData('products', $data);
        $total = count($_FILES['image']['name']);
        for ($i = 0;$i < $total;$i++) {
            $tmpFilePath = $_FILES['image']['tmp_name'][$i];
            if ($tmpFilePath != "") {
                $temp = explode('.', $_FILES['image']['name'][$i]);
                $extension = end($temp);
                $randFileMulti = rand(100000000, 999999999) . rand(1000000, 9999999) . "." . $extension;
                $newFilePath = $base . "/skote2/assets/multiProductImg/" . $randFileMulti;
                if (move_uploaded_file($tmpFilePath, $newFilePath)) {
                    $arr = ['name' => $randFileMulti, 'product_id' => $lastid, ];
                    $this->ProductModel->insertData('productImages', $arr);
                }
            }
        }
        redirect('products?msg=pro_add');
    }
    public function readProduct() {
        $data['data'] = $this->ProductModel->readData_all('products');
        $this->load->view('product', $data);
		}
    public function readProduct1() {
		
        $id = $this->input->get('id');
		//echo $id;die('---');
        $data['data'] = $this->ProductModel->readData_where_1('products', array('warehouse' => $id));
		  $data['waredata'] = $this->ProductModel->name_warehouse('warehouse',$id);
		 // print_r($data['waredata']);die('+++');
        $this->load->view('warehouse_products', $data);
    }
	
	public function readSupplierProduct() {
        $id = $this->input->get('id');
        $data['data'] = $this->ProductModel->readData_where_1('products', array('supplier' => $id));
        $this->load->view('supplier_products', $data);
    }
	
	
    public function editProduct() {
        $id = $this->input->get('id');
     
$data['data4'] = $this->ProductModel->readData_all('supplier');
$data['data5'] = $this->ProductModel->readData_all('warehouse');
$data['data'] = $this->ProductModel->readData_where('products', array('id' => $id));
$data['data6'] = $this->ProductModel->readData_where_1('subcategory', array('category' => $data['data']['category']));
$data['data3'] = $this->ProductModel->readData_where('website', array('id' => 1));
$data['data2'] = $this->ProductModel->readData_all('category');
$data['data1'] = $this->ProductModel->readData_where_1('productImages', array('product_id' => $id));
        
        $this->load->view('edit_product', $data);
    }
    public function deleteProduct() {
        $id = $this->input->get('id');
        $this->ProductModel->delete('products', array('id' => $id));
        redirect('products?msg=pro_del');
    }
    public function delete_display_image() {
        $id = $this->input->post('id');
        $arr = array('display_image' => NULL);
        $this->ProductModel->update('products', $id, $arr);
      
        echo "success";
          
    }
    public function delete_image_1() {
        $id = $this->input->post('id');
        $arr = array('image' => NULL);
        $this->ProductModel->update('supplier', $id, $arr);
      
        echo "success"; 
    }
    public function delete_website_image() {
        $id = $this->input->post('id');
        $arr = array('shop_logo' => NULL);
        $this->ProductModel->update('website', $id, $arr);
       
        echo "success";
         
    }
    public function delete_image() {
        $id = $this->input->post('id');
        $lastid = $this->ProductModel->delete('productImages', array('id' => $id));
       
        return $lastid;
        
    }
    public function editProduct_id() {
        $stat = $this->input->post('stat');
        // $status=$this->input->post('status');die;
        $id = $this->input->post('id');
        $display_image = $this->input->post('display_image');
        if ($display_image != "") {
            $randFile = $display_image;
        }
        $base = $_SERVER['DOCUMENT_ROOT'];
       
        if (!empty($_FILES['display_image']['name'])) {
            $temp = explode('.', $_FILES['display_image']['name']);
            $extension = end($temp);
            $randFile = rand(100000000, 999999999) . rand(1000000, 9999999) . "." . $extension;
            move_uploaded_file($_FILES['display_image']['tmp_name'], $base . "/skote2/assets/singleProductImg/" . $randFile);
        }
        $data = ['product_name' => $this->input->post('product_name'), 'cost_price' => $this->input->post('cost_price'), 'selling_price' => $this->input->post('selling_price'), 'display_image' => $randFile, 'sku' => $this->input->post('sku'), 'description' => $this->input->post('description'), 'category' => $this->input->post('category'), 'subcategory' => $this->input->post('subcategory'), 'status' => $stat, 'quantity' => $this->input->post('quantity'), 'supplier' => $this->input->post('supplier'), 'warehouse' => $this->input->post('warehouse'),'discounted_price' => $this->input->post('discounted_price'),
		'tax' => $this->input->post('tax') ];
        $lastid = $this->ProductModel->update('products', $id, $data);
       
        $total = count($_FILES['image']['name']);
        for ($i = 0;$i < $total;$i++) {
            $tmpFilePath = $_FILES['image']['tmp_name'][$i];
            if ($tmpFilePath != "") {
                $temp = explode('.', $_FILES['image']['name'][$i]);
                $extension = end($temp);
                $randFileMulti = rand(100000000, 999999999) . rand(1000000, 9999999) . "." . $extension;
                $newFilePath = $base . "/skote2/assets/multiProductImg/" . $randFileMulti;
                if (move_uploaded_file($tmpFilePath, $newFilePath)) {
                    $arr = ['name' => $randFileMulti, 'product_id' => $id, ];
                    $this->ProductModel->insertData('productImages', $arr);
                }
            }
        }
       
        redirect('products?msg=pro_edit');
    }
    public function manage_website() {
        $shop_logo = $this->input->post('logo');
        
        if ($shop_logo != NULL) {
            $randFile = $shop_logo;
        }
        $base = $_SERVER['DOCUMENT_ROOT'];
      
        if (!empty($_FILES['shop_logo']['name'])) {
            $temp = explode('.', $_FILES['shop_logo']['name']);
            $extension = end($temp);
            $randFile = rand(100000000, 999999999) . rand(1000000, 9999999) . "." . $extension;
            move_uploaded_file($_FILES['shop_logo']['tmp_name'], $base . "/skote2/assets/website_image/" . $randFile);
        }
		
        $data = ['shop_name' => $this->input->post('shop_name'), 'shop_description' => $this->input->post('shop_description'), 'shop_currency' => $this->input->post('shop_currency'), 'shop_logo' => $randFile,'quantity'=>$this->input->post('qty'),'login_1'=>$this->input->post('login_1'),'login_2'=>$this->input->post('login_2'),'login_3'=>$this->input->post('login_3')];
        $lastid = $this->ProductModel->update('website', 1, $data);
        redirect('ProductController/settings_view?msg=web_edit');
    }
	
	
	public function addBulk(){
	
	
	
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
		$data=array('product_name' =>$data[0],
		'currency' =>$data[1],
		'cost_price' =>$data[2],
		'selling_price' =>$data[3],
		'discounted_price' =>$data[4],
		'tax' =>$data[5],
		'supplier' =>$data[6],
		'warehouse' =>$data[7],
		'sku' =>$data[8],
		'description' =>$data[9],
		'category' =>$data[10],
		'subcategory' =>$data[11],
		'status' =>$data[12],
		'quantity' =>$data[13]
		);
		$this->ProductModel->insertData('products', $data);
		
    }
    fclose($handle);
}
redirect('products?msg=bulk_add');
	}
}
