<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StocksController extends CI_Controller {
    
    public function stocks_view() {
        $data= $this->StocksModel->readData_where('website', array('id' => 1));
		$data['data']=$this->StocksModel->readData_where_less_than('products', $data['quantity']);
		//print_r($data['data']);
        $this->load->view('stocks', $data);
    }
	
	 public function editStockProduct() {
        $id = $this->input->get('id');
     
$data['data4'] = $this->ProductModel->readData_all('supplier');
$data['data5'] = $this->ProductModel->readData_all('warehouse');
$data['data'] = $this->ProductModel->readData_where('products', array('id' => $id));
$data['data6'] = $this->ProductModel->readData_where_1('subcategory', array('category' => $data['data']['category']));
$data['data3'] = $this->ProductModel->readData_where('website', array('id' => 1));
$data['data2'] = $this->ProductModel->readData_all('category');
$data['data1'] = $this->ProductModel->readData_where_1('productImages', array('product_id' => $id));
        
        $this->load->view('edit_stock_product', $data);
    }
	
	
	public function editStockProduct_id() {
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
                    $this->StocksModel->insertData('productImages', $arr);
                }
            }
        }
       
        redirect('stocks?msg=pro_edit');
    }
	
	 public function deleteStockProduct() {
        $id = $this->input->get('id');
        $this->StocksModel->delete('products', array('id' => $id));
        redirect('stocks?msg=pro_del');
    }
	
}