<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
	
	 $data['data1']= $this->db->from("sales")->count_all_results();
	 $data['data2']= $this->db->from("products")->count_all_results();
	 $data['data3']= $this->db->from("customers")->count_all_results();
	 
	 $data['data6']=$this->User_model->six_month_sales('sales');
	
	 $data['data4']=$this->User_model->last_ten('sales');
	 $data['data5']=$this->User_model->monthly_sales('sales');
	 
	
		$this->load->view('welcome_message',$data);
	}

	
	
	public function distance()
	{
	
	
	// You would supply real latitude and longitude values here.
// I used a location in the southwestern United States.
$lat      = '26.920205';
$lng      = '80.968408';





$distance = 10; // Kilometers

$this->load->database();

$query = $this->db->query(
    '
    SELECT 
        *,
        6371 * 2 * ASIN(SQRT(POWER(SIN(RADIANS(? - ABS(users.latitude))), 2) + COS(RADIANS(?)) * COS(RADIANS(ABS(users.latitude))) * POWER(SIN(RADIANS(? - users.longitude)), 2))) AS distance
    FROM users
    HAVING distance < ?
    ', 
    [
        $lat,
        $lat,
        $lng,
        $distance
    ] 
);

$local_users = $query->num_rows() > 0
    ? $query->result()
    : NULL;
	
	
	print_r($local_users); die;
	
	
	}
	
}
