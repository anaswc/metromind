<?php
class Requestsession extends CI_controller{
	 public function __construct(){
		 parent:: __construct();
		 if(!$this->session->userdata('adminId'))
		 redirect('admin/login');
		 $this->load->model('doctor_model');
		 $this->load->model('patients_model');
		 $this->load->model('appointments_model');
		 $this->load->helper('url_helper');
		 $this->load->library('pagination');
		  $this->load->helper('date');
		$this->load->library("pagination");
				$this->pageSize = 50;
				
						if($this->input->post_get('pageSize')) $this->pageSize = $this->input->post_get('pageSize');

		if($this->input->post_get('returnUrl')) $this->returnUrl = $this->input->post_get('returnUrl');

		if ($this->input->post_get('returnUrl') <> ''){

			$this->returnUrl = $this->input->post_get('returnUrl');

		}else{

			$this->returnUrl= base_url('admin/requestsession/');	

		}
	 }
	 public function index(){
		 
			global $arrPageRange;
			
			$data["pageRange"]	= 	HTMLOptionKeyValArray($this->config->item('arrPageRange'),$this->pageSize);
			//$config["base_url"] = base_url() . "admin/appointments/?symptomName=".$this->input->post_get('symptomName')."&status=".$this->input->post_get('status');
			$total=$this->patients_model->get_requestSession();
			$config["total_rows"] = count($total);
			$config["per_page"]   = $this->pageSize;
			$config["uri_segment"] = 4;
			$config['enable_query_strings'] = TRUE;
			$config['use_page_numbers'] = TRUE;
			$config['query_string_segment'] = 'page';
			$config['page_query_string'] = TRUE;
			
	
			$this->pagination->initialize($config);
	
			$start = 1;
			
			$data["links"] = $this->pagination->create_links();
			
			$limit = $config["per_page"];
			
			if ($this->input->get('page')) {
				$start = (int) trim($this->input->get('page'));
				$limit = $config['per_page'];
			}
			
			if($start <> 1)
				$data["cnt"] = $limit*($start-1) + 1;
			else
				$data["cnt"] = $start;	
						$data["arrSessions"]	= 	$this->config->item('arrSessions');

			
			$data['requests'] = $this->patients_model->get_requestSession($limit, $limit*($start-1));
			if ($this->input->post_get('doctorName') <> ''){
				$data['doctorName'] = $this->input->post_get('doctorName');
			}else{
				$data['doctorName'] = '';	
			}
			if ($this->input->post_get('firstName') <> ''){
				$data['firstName'] = $this->input->post_get('firstName');
			}else{
				$data['firstName'] = '';	
			}
		
			$this->load->view('admin/requestsession/index', $data);
		}
		
	
	public function update($requestSessionId = NULL)
		{ 
			global $arrSessions;
			//$data["arrSessions"]	= 	HTMLOptionKeyValArray($arrSessions,'');
			//echo "<pre>";print_r($data['arrSessions']);exit;
			$this->load->helper('form');
			$this->load->library('form_validation');
				
			if($requestSessionId == NULL){
				$requestSessionId = $this->input->post('requestSessionId');
				$requestSessionId = $requestSessionId[0];
			}

			
			    $this->patients_model->update_requestsession($requestSessionId);
				$this->session->set_flashdata('success', 'Request approved Successfully');
				redirect(base_url('admin/requestsession'));
			 }
		   
}

?>