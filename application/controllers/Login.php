<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

public function __construct(){
	parent::__construct();
		$this->load->model('User_model','admin');
		//$this->load->helper('custom_helper');
      
		}
	
	public function index()
	{
		//$this->load->view('welcome_message');
		$email  =   $this->session->userdata('email');
if($email){
	
	redirect('/');
  
} 
$data['data'] = $this->ProductModel->readData_where('website', array('id' => 1));

		$this->load->view('login',$data);
	}




public function authenticate()
	{    

		$email = $this->input->post('email');
		$pass = $this->input->post('password');


		$result = $this->admin->getid($email,$pass);
		$arr=array('email'=>$email ,'password'=>$pass);
					$this->db->select('*');
					
					$this->db->where($arr);
					$user=$this->db->get('admin')->row_array();
					//echo $this->db->last_query();die;
					if($user){
				
						$this->session->set_userdata('email',$email);
						$this->session->set_userdata('id',$user['id']);
						$this->session->set_userdata('role',$user['role']);
        
}
redirect(base_url());

	}

	public function change_password(){
		$this->load->view('change_password');

	}

	public function change_password_1(){


$id=$_SESSION['id'];
		$confirm_new_password = $this->input->post('confirm_new_password');

$arr=array("password"=>$confirm_new_password);
$this->db->where('id',$id);
        $result= $this->db->update('admin',$arr);
       
redirect(base_url().'?msg=updated');

        }

public function logout(){
	
$this->session->sess_destroy();
redirect('Login');
}

}
 