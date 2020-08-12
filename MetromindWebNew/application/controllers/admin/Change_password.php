<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Change_password extends CI_Controller {
function __construct(){
parent::__construct();
if(! $this->session->userdata('adminId'))
redirect('admin/login');
}

public function index(){
$this->form_validation->set_rules('currentpassword','Current Password','required|min_length[6]');	
$this->form_validation->set_rules('password','Password','required|min_length[6]');
$this->form_validation->set_rules('confirmpassword','Confirm Password','required|min_length[6]|matches[password]');
if($this->form_validation->run()){
$cpassword=$this->input->post('currentpassword');
$newpassword=$this->input->post('password');
$adminid = $this->session->userdata('adminId');
$this->load->model('Admin_Changepassword_Model');
$cpass=$this->Admin_Changepassword_Model->getcurrentpassword($adminid);
$dbpass=$cpass->password;
if($dbpass==$cpass->password){
	 $newpassword=$this->encryption->encrypt($newpassword);
if($this->Admin_Changepassword_Model->updatepassword($adminid,$newpassword))
{
$this->session->set_flashdata('success', 'Password chnaged successfully');
	redirect('admin/change_password');
}

} else {
$this->session->set_flashdata('error', 'Current password is wrong. Error!!');
redirect('admin/change_password');	
} 
} else {
$this->load->view('admin/change_password');
}
}




}