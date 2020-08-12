<?php

defined('BASEPATH') OR exit('No direct script access allowed');

Class Login extends CI_Controller {

 public function __construct() {  

        parent::__construct();
 $this->load->helper('url');

        $this->load->helper('captcha');

    }



	public function index(){

	

		$this->form_validation->set_rules('userName','Username','required');

		$this->form_validation->set_rules('password','Password','required');

		if($this->form_validation->run()){

			$userName=$this->input->post('userName');

			$password=$this->input->post('password');	

			$this->load->model('Admin_Login_Model');

			$validate=$this->Admin_Login_Model->validatelogin($userName,$password);

			if($validate)

			{

			    return redirect(base_url('admin/dashboard'));

				

			} else{

				

				return redirect(base_url('admin/login'));

			}

		

		} else {

			$this->load->view('admin/login');

		}	

	}

	public function loginuser(){

	

		$this->form_validation->set_rules('userName','Username','required');

		$this->form_validation->set_rules('password','Password','required');



		if($this->form_validation->run()){

			$userName=$this->input->post('userName');

			$password=$this->input->post('password');	

			$this->load->model('Admin_Login_Model');

			if($this->input->post('security_code') != $this->session->userdata['security_code']){

				$this->session->set_flashdata('error', 'CAPTCHA validation failed, please try again');

				return redirect(base_url('admin/login'));

			}else {

				$validate=$this->Admin_Login_Model->validatelogin($userName,$password);

				

				if($validate)

				{
if($validate[0]["adminType"] == 1){

								$data = array(

												  'adminId'     => $validate[0]["adminId"],
												  
												  'adminName'        => $validate[0]["adminName"],

												  'adminType'        => $validate[0]["adminType"],
												  
												  
								
												);
								
												$this->session->set_userdata($data);
								return redirect(base_url().'admin/dashboard');

							}
							elseif ($validate[0]["adminType"] == 2) {
								$data = array(

												  'adminId'     => $validate[0]["adminId"],
												  
												  'adminName'        => $validate[0]["adminName"],
								
												  'adminType'        => $validate[0]["adminType"],
												  
												);
								$this->session->set_userdata($data);
								return redirect(base_url().'admin/dashboard');
							}
elseif ($validate[0]["adminType"] == 3) {
								$data = array(

												  'adminId'     => $validate[0]["adminId"],
												  
												  'adminName'        => $validate[0]["adminName"],
								
												  'adminType'        => $validate[0]["adminType"],
												 
												);
								$this->session->set_userdata($data);
								return redirect(base_url().'admin/dashboard');
							}
					

				} else{

					

					return redirect(base_url('admin/login'));

				}

			}

		} else {

			$this->load->view('admin/login');

		}	

	}

	

	//function for logout

	public function logout(){

		$this->session->unset_userdata('adminId');

		$this->session->sess_destroy();

		return redirect(base_url().'admin/login');

	}



}