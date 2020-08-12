<?php

defined('BASEPATH') OR exit('No direct script access allowed');

Class Admin_Login_Model extends CI_Model {





	public function validatelogin($userName,$password){

		$this->db->select('*');

		$this->db->from('axadmin');

		$this->db->where('userName',$userName);

		$result_array = $this->db->get()->result_array();	
		
		if(count($result_array) > 0){
			
			$this->adminId		= $result_array[0]["adminId"];
	
			$this->adminName		= $result_array[0]["adminName"];
	
			$this->userName		= $result_array[0]["userName"];
	
			$this->password		= $result_array[0]["password"];
	
			$this->adminEmail	= $result_array[0]["adminEmail"];
	
			$this->adminType		= $result_array[0]["adminType"];
	
			if($this->adminId!=NULL){
	
				if ($this->encryption->decrypt($this->password) != trim($password)) {	
	
					$this->session->set_flashdata('error', 'Incorrect Password. Please try again');	
	
					return NULL;
	
				}else if ($result_array[0]["status"] == 0) {
	
					$this->session->set_flashdata('error', 'Sorry, You cannot login as your account has not been activated.');				
	
					return NULL;
	
				}else{
	
					
	
					$data = array(
	
					  'adminId'     => $this->adminId,

					  'adminName'     => $this->adminName,
	
	
					  'userName'    => $this->userName,
	
					  'adminEmail'    	=> $this->adminEmail,
	
					  'adminType'    => $this->adminType
	
					);
	
					
	
					$this->session->set_userdata($data);
	
					return $result_array;
	
				}
	
			}else{
	
				$this->session->set_flashdata('error', 'Incorrect Username. Please try again');	
	
				return NULL;
	
			}
		}else{

			$this->session->set_flashdata('error', 'Incorrect Username. Please try again');	

			return NULL;

		}

	}





}



