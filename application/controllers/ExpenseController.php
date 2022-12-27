<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ExpenseController extends CI_Controller {
	
	public function expense_view(){
	
	$data['data'] = $this->ExpenseModel->readData_all('expense');
	$data['data1'] = $this->ExpenseModel->readData_all('expense_category');
	$data['data2'] = $this->ExpenseModel->readData_all('warehouse');
	$this->load->view('expense',$data);
	}
	
	public function expense_category_view(){
	
	$data['data'] = $this->ExpenseModel->readData_all('expense_category');
	$this->load->view('expense_category',$data);
	}
	
	public function addExpCategory()
	{
	
	$arr=array('expense_category'=>$this->input->post('category'));
	$lastid = $this->ExpenseModel->insertData('expense_category',$arr);
		redirect('expense_category?msg=cat_add');
	}
	
	public function editExpCategory(){
	$id=$this->input->post('id');
	
	
	$arr=array('expense_category'=>$this->input->post('category1'));
	$this->ExpenseModel->update('expense_category',$id,$arr);
	redirect('expense_category?msg=cat_edit');
	}
	
	public function deleteExpCategory(){
	$id = $this->input->get('id'); 
	 $this->ExpenseModel->delete('expense_category',array('id' => $id));
redirect('expense_category?msg=cat_del');
	}
	
	public function addExpense(){
	$data=array('created_date'=>date('Y-m-d'),
	'expense_category'=>$this->input->post('expense_category'),
	'warehouse'=>$this->input->post('warehouse'),
	'amount'=>$this->input->post('amount'),
	'note'=>$this->input->post('note')
	);	
	$lastid = $this->ExpenseModel->insertData('expense',$data);
		redirect('expense?msg=exp_add');
	}
	
	
	public function editExpense(){
	$id=$this->input->post('id');
	$data=array('created_date'=>date('Y-m-d'),
	'expense_category'=>$this->input->post('expense_category1'),
	'warehouse'=>$this->input->post('warehouse1'),
	'amount'=>$this->input->post('amount1'),
	'note'=>$this->input->post('note1')
	);	
	$lastid = $this->ExpenseModel->update('expense',$id,$data);
		redirect('expense?msg=exp_edit');
	}
	
	public function deleteExpense(){
	$id = $this->input->get('id'); 
	$this->ExpenseModel->delete('expense',array('id' => $id));
redirect('expense?msg=exp_del');
	}
	
	
}


