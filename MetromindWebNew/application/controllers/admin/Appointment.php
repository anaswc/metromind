<?php
class Appointment extends CI_controller{
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

			$this->returnUrl= base_url('admin/appointment/');	

		}
	 }
	 public function index(){
		 
			global $arrPageRange;
			
			$data["pageRange"]	= 	HTMLOptionKeyValArray($this->config->item('arrPageRange'),$this->pageSize);
			//$config["base_url"] = base_url() . "admin/appointments/?symptomName=".$this->input->post_get('symptomName')."&status=".$this->input->post_get('status');
			$config["total_rows"] = $this->appointments_model->get_count();
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

			
			$data['appointments'] = $this->appointments_model->getAppointment($limit, $limit*($start-1));
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
		
			$this->load->view('admin/appointments/index', $data);
		}
		
	
		
	public function create()
		{
			
			
			$this->load->helper('form');
			$this->load->library('form_validation');


			//$data['title'] = 'Create a service item';
			
			$this->form_validation->set_rules('doctorId', 'doctorId', 'required');
			
			$this->doctor_model->sortColumn="doctorName";

			$this->doctor_model->sortDirection="ASC";
			$data['doctorList']= $this->doctor_model->getDoctor();
			
			$this->patients_model->sortColumn="firstName";

			$this->patients_model->sortDirection="ASC";
			$data['patientList']= $this->patients_model->getPatient(); 
			
			if ($this->form_validation->run() === FALSE)
			{	
			
				
				$this->load->view('admin/appointments/create', $data);
		
			}
			else
			{	
				
				$bannerId = $this->appointments_model->set_appopintment();
			
				$this->session->set_flashdata('success', 'Appointment created  Successfully');
				redirect(base_url('admin/appointment')); 
			
			
			}
		}
	
		public function view($appointmentId = NULL)
		{
			$data['appointment_item'] = $this->appointments_model->getAppointment_id($appointmentId);
	
		
			
			
			$this->load->view('admin/appointments/view', $data);
		}
	
	public function update($appointmentId = NULL)
		{ 
			global $arrSessions;
			//$data["arrSessions"]	= 	HTMLOptionKeyValArray($arrSessions,'');
			//echo "<pre>";print_r($data['arrSessions']);exit;
			$this->load->helper('form');
			$this->load->library('form_validation');
				
			if($appointmentId == NULL){
				$appointmentId = $this->input->post('appointmentId');
				$appointmentId = $appointmentId[0];
			}

			$data['appoinment_item'] = $this->appointments_model->getAppointment_id($appointmentId);
			//echo "<pre>";print_r($data['appoinment_item']);exit;
			$this->doctor_model->sortColumn="doctorName";

			$this->doctor_model->sortDirection="ASC";
			 $data['doctorList']= $this->doctor_model->getDoctor(); 
			 $data['doctor_availability']=$this->doctor_model->get_doctorAppoinments($data['appoinment_item']['doctorId'],$data['appoinment_item']['appointmentDate']);
			 
			  $data['patient_availability']=$this->doctor_model->get_patientAppoinments($data['appoinment_item']['patientId'],$data['appoinment_item']['appointmentDate']);
			 //echo "<pre>";print_r($data['doctor_availability']);exit;
				
			$this->form_validation->set_rules('appointmentId', 'appointmentId', 'required');
			
			
			
		
			if ($this->form_validation->run() === FALSE)
			{	
			 $this->load->view('admin/appointments/update', $data);
			}
			else
			{	
			    $this->appointments_model->update_appointment($appointmentId);
				$this->session->set_flashdata('success', 'Appoinment updated Successfully');
				if($this->returnUrl <> '')
					redirect(base_url().'admin/'.$this->returnUrl);
			 }
		   }
		   
		   
		   public function get_doctorAppoinments()
		{ 	
			$doctorId = $this->input->post_get('doctorId');
			$appointmentDate= $this->input->post_get('appointmentDate');
			 
			$data = $this->doctor_model->get_doctorAppoinments($doctorId,$appointmentDate);
			echo json_encode($data);
		}
		
		
		 public function get_patientsAppoinments()
		{ 	
			$patientId = $this->input->post_get('patientId');
			$appointmentDate= $this->input->post_get('appointmentDate');
			 
			$data = $this->doctor_model->get_patientAppoinments($patientId,$appointmentDate);
			echo json_encode($data);
		}
		
		
		 public function get_doctorSessions()
		{ 	
			$doctorId = $this->input->post_get('doctorId');
			$apptDay= $this->input->post_get('apptDay');
			$appointmentSession=$this->input->post_get('appointmentSession');
			 
			$data = $this->doctor_model->get_Doctor_sessions($doctorId,$apptDay,$appointmentSession);
			echo json_encode($data);
		}
		
		public function get_doctorappoinmentsforTime()
		{ 	
			$appointmentId=$this->input->post_get('appointmentId');
			$doctorId = $this->input->post_get('doctorId');
			$appointmentDate= $this->input->post_get('appointmentDate');
			$appointmentStartTime=$this->input->post_get('appointmentStartTime');
			 
			$data = $this->doctor_model->get_Doctor_appoinmentsforTime($doctorId,$appointmentDate,$appointmentStartTime,$appointmentId);
			echo json_encode($data);
		}
		
		public function get_patientappoinmentsforTime()
		{ 	
			$appointmentId=$this->input->post_get('appointmentId');
			$patientId = $this->input->post_get('patientId');
			$appointmentDate= $this->input->post_get('appointmentDate');
			$appointmentStartTime=$this->input->post_get('appointmentStartTime');
			 
			$data = $this->doctor_model->get_Patient_appoinmentsforTime($patientId,$appointmentDate,$appointmentStartTime,$appointmentId);
			echo json_encode($data);
		}
		
		   
}

?>