<?php

	class Forgot_password extends CI_controller{

	 public function __construct(){

		 parent:: __construct();

		 $this->load->model('Forgotpassword_Model');

		 $this->load->helper('url_helper');

		 $this->load->library('email');

		

	 }

	 public function index(){ 

		 $this->load->view('admin/forgot_password');

	 }

	public function ForgotPassword()
	{

    	$email = $this->input->post('email');

 	 	$userType = $this->Forgotpassword_Model->ForgotPassword($email); 

      	if ($userType) {

       	 	$this->Forgotpassword_Model->sendpassword($email,$userType); 
		
			$this->session->set_flashdata('email_sent', 'Login details sent to the email provided');
			
			redirect(base_url().'admin/forgot_password');
    	}else {

			$this->session->set_flashdata('email_sent', 'Email not found, please enter correct email id');
	
			redirect(base_url().'admin/forgot_password');
        }

     }



  }



?>