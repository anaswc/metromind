<?php
class Patients extends CI_controller{
	 public function __construct(){
		 parent:: __construct();
		 if(!$this->session->userdata('adminId'))
		 redirect('admin/login');
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

			$this->returnUrl= base_url('admin/patients/');	

		}
	 }
	 public function index(){ 
		 
			
			global $arrPageRange;
			
			$data["pageRange"]	= 	HTMLOptionKeyValArray($this->config->item('arrPageRange'),$this->pageSize);
			$config["base_url"] = base_url() . "admin/patients/?firstName=".$this->input->post_get('firstName')."&patientEmail=".$this->input->post_get('patientEmail');
			$config["total_rows"] = $this->patients_model->get_count();
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
			
		
			$data['patient'] = $this->patients_model->getPatient($limit, $limit*($start-1)); 
			$data['title'] = 'Patient LIST';
			if ($this->input->post_get('firstName') <> ''){
				$data['firstName'] = $this->input->post_get('firstName');
			}else{
				$data['firstName'] = '';	
			}
			if ($this->input->post_get('status') <> ''){
				$data['status'] = $this->input->post_get('status');
			}else{
				$data['status'] = '';	
			}
		
			$this->load->view('admin/patients/index', $data);
		}
		
		
		
		
		
		public function create()
		{ 
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->form_validation->set_rules('firstName', 'firstName', 'required');
			$this->form_validation->set_rules('patientEmail', 'patientEmail', 'required');
		//	$this->form_validation->set_rules('seoUri', 'seoUri', 'required|is_unique[axpatient.seoUri]');

			$this->form_validation->set_rules('patientMobile', 'patientMobile', 'required');
			$this->form_validation->set_rules('password', 'password', 'required');
			$this->form_validation->set_rules('birthDate', 'birthDate', 'required');
			$this->form_validation->set_rules('gender', 'gender', 'required');
			
			
			
			$data['country'] = $this->patients_model->get_countries();//print_r($data['country']);exit;
		
			if ($this->form_validation->run() === FALSE)
			{	
				$this->load->view('admin/patients/create',$data); 
		
			}
			else
			{
				$patientId = $this->patients_model->setPatients();
				$this->session->set_flashdata('success', 'Patient added Successfully');
				redirect(base_url('admin/patients'));
				
			}
			
		}
		
		
		
		public function update($patientId = NULL)
		{ 
			$this->load->helper('form');
			$this->load->library('form_validation');
				
			if($patientId == NULL){
				$patientId = $this->input->post('patientId');
				$patientId = $patientId[0];
			}
			$data['patient_item'] = $this->patients_model->getPatient_id($patientId);
			$data['title'] = 'update a Patient ';
			$this->form_validation->set_rules('firstName', 'firstName', 'required');
			//$this->form_validation->set_rules('seoUri', 'seoUri', 'required|is_unique[axpatient.seoUri]');
			$this->form_validation->set_rules('patientEmail', 'patientEmail', 'required');
			$this->form_validation->set_rules('patientMobile', 'patientMobile', 'required');
			//$this->form_validation->set_rules('password', 'password', 'required');
			$this->form_validation->set_rules('birthDate', 'birthDate', 'required');
			$this->form_validation->set_rules('gender', 'gender', 'required');
			$data['country'] = $this->patients_model->get_countries();
			if ($this->form_validation->run() === FALSE)
			{	
			 $this->load->view('admin/patients/update', $data);
			}
			else
			{	
			    $this->patients_model->updatePatient($patientId);
				$this->session->set_flashdata('success', 'Patient updated Successfully');
					if($this->returnUrl <> '')
					redirect(base_url().'admin/'.$this->returnUrl); 
			 }
		   }
		   
		   
		   public function view($seoUri = NULL)
		{
			$data['patient_item'] = $this->patients_model->retrievePatient($seoUri);
	
			if (empty($data['patient_item']))
			{
				show_404();
			}
	
			
			
		
			$this->load->view('admin/patients/view', $data);
		}
		   
			
		public function delete($patientIds = NULL)
		{ 
			if($patientIds == NULL ){
				$patientIds = $this->input->post('patientIds');
				
			}
		
			if ($patientIds === FALSE)
			{	
				redirect(base_url('admin/patients')); 
			}
			else
			{	
				$this->patients_model->delete_patient($patientIds);
				$this->session->set_flashdata('success', 'Patient deleted Successfully');
				redirect(base_url('admin/patients'));
				
			}
		}

	
	public function activate($patientIds = NULL)
		{ 
			if($patientIds == NULL){
				$patientIds = $this->input->post('patientIds');
				$patientIds = explode(",",$patientIds);
			}
		
			if ($patientIds === FALSE)
			{	
				redirect(base_url('admin/patients')); 
		
			}
			else
			{	
				$this->patients_model->activate_patient($patientIds);
				$this->session->set_flashdata('success', 'Patient activated Successfully'); 
				redirect(base_url('admin/patients'));
				
			}
		}
	
	
	
	public function deactivate($patientIds = NULL)
		{ 
			if($patientIds == NULL){
				$patientIds = $this->input->post('patientIds');
				$patientIds = explode(",",$patientIds);
			}
			
			if ($patientIds === FALSE)
			{	
				redirect(base_url('admin/patients')); 
		
			}
			else
			{	
				$this->patients_model->deactivate_patient($patientIds);
				$this->session->set_flashdata('success', 'Patient Expired Successfully');
				redirect(base_url('admin/patients'));
				
			}
		}
		
		
	
	public function checkEmail()
		{ 	
			$patientEmail = $this->input->post_get('patientEmail'); 
			$patientId = $this->input->post_get('patientId'); 
			 
			
			$data = $this->patients_model->validatePatientEmail($patientEmail,$patientId);
			echo json_encode($data);
		}
		
		
		public function checkMobile()
		{ 	
			$patientMobile = $this->input->post_get('patientMobile'); 
			$patientId = $this->input->post_get('patientId'); 
			 
			
			$data = $this->patients_model->validatePatientMobile($patientMobile,$patientId);
			echo json_encode($data);
		}
		// --------------------------------------
		public function notifytodayappointment(){
			$counts=$this->appointments_model->getapproved_appointment_requests();
			foreach ($counts as $value) {
				$patient=$this->patients_model->getPatient_id($value['patientId']);
				//$smsstatus=$this->patients_model->send_notification_user($patient['uniqueId']);
				//$appnotifystatus=$this->patients_model->notify_user_appointment($patient['uniqueId']);

				//$var=$this->patients_model->send_notification_user_va();
			}
		}
	
		
		
	
}

?>