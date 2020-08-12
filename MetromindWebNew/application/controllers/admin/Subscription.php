<?php
class Subscription extends CI_controller{
	 public function __construct(){
		 parent:: __construct();
		 if(!$this->session->userdata('adminId'))
		 redirect('admin/login');
		$this->load->model('doctor_model');
		 $this->load->model('patients_model');
		 	 $this->load->model('package_model');
		 $this->load->model('subscription_model');
		 //$this->load->model('appointments_model');
		 $this->load->helper('url_helper');
		 $this->load->library('pagination');
		  $this->load->helper('date');
		$this->load->library("pagination");
				$this->pageSize = 50;
				
				if($this->input->post_get('pageSize')) $this->pageSize = $this->input->post_get('pageSize');
	 }
	 public function index(){
		 
			global $arrPageRange;
			
			$data["pageRange"]	= 	HTMLOptionKeyValArray($this->config->item('arrPageRange'),$this->pageSize);
			//$config["base_url"] = base_url() . "admin/appointments/?symptomName=".$this->input->post_get('symptomName')."&status=".$this->input->post_get('status');
			$config["total_rows"] = $this->subscription_model->get_count();
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

			
			$data['subscription'] = $this->subscription_model->getSubscription($limit, $limit*($start-1));
			
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

			if ($this->input->post_get('packageName') <> ''){
				$data['packageName'] = $this->input->post_get('packageName');
			}else{
				$data['packageName'] = '';	
			}
		
			$this->load->view('admin/subscription/index', $data);
		}
		
		
		public function create()
		{ 
		   global $arrAdminType;
			$this->load->helper('form');
			$this->load->library('form_validation');

				$arrPackage = $this->package_model->getPackage(); // echo print_r($arrHealthCenter); exit;
				$data['packageList']	= HTMLOption2DArray($arrPackage,"packageId","packageName",'');
				
				$arrDoctor = $this->doctor_model->getDoctor(); // echo print_r($arrHealthCenter); exit;
				$data['doctorList']	= HTMLOption2DArray($arrDoctor,"doctorId","doctorName",'');
				
				$arrPatient = $this->patients_model->getPatient(); // echo print_r($arrHealthCenter); exit;
				$data['patientList']	= HTMLOption2DArray($arrPatient,"patientId","firstName",'');
				
			$this->form_validation->set_rules('doctorId', 'doctorId', 'required');
			
		
			if ($this->form_validation->run() === FALSE)
			{	
				$this->load->view('admin/subscription/create',$data); 
		
			}
			else
			{
				 $this->subscription_model->set_Subscriptions();
				$this->session->set_flashdata('success', 'Subscription added Successfully');
				redirect(base_url('admin/subscription'));
					

				}
				
			}
			
		public function getDoctorPackages(){
		
		$doctorId=$this->input->post_get('doctorId');
		
		$data = $this->subscription_model->get_doctors_packages($doctorId);
		echo json_encode($data);
		}	
		
		public function activate($subscriptionIds = NULL)
		{ 
			if($subscriptionIds == NULL){
				$subscriptionIds = $this->input->post('subscriptionIds');
				$subscriptionIds = explode(",",$subscriptionIds);
			}
		
			if ($subscriptionIds === FALSE)
			{	
				redirect(base_url('admin/subscription')); 
		
			}
			else
			{	
				$this->subscription_model->activate_subscription($subscriptionIds);
				$this->session->set_flashdata('success', 'Subscription activated Successfully'); 
				
					redirect(base_url('admin/subscription'));
				
			}
		}
	
	
	//status Expired
	public function deactivate($subscriptionIds = NULL)
		{ 
			if($subscriptionIds == NULL){
				$subscriptionIds = $this->input->post('subscriptionIds');
				$subscriptionIds = explode(",",$subscriptionIds);
			}
			
			if ($adminIds === FALSE)
			{	
				redirect(base_url('admin/subscription')); 
		
			}
			else
			{	
				$this->subscription_model->deactivate_subscription($subscriptionIds);
				$this->session->set_flashdata('success', 'Subscription deactivated Successfully');
			redirect(base_url('admin/subscription'));
				
			}
		}
	public function view($subscriptionId  = NULL)
		{
			$data['subscription_item'] = $this->subscription_model->getSubscription_id($subscriptionId);
			//print_r($data['subscription_item']);exit;
	
		
			$this->load->view('admin/subscription/view', $data);
		}
	
		
	
}

?>