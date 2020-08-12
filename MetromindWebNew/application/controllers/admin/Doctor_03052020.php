<?php
class Doctor extends CI_controller{
	 public function __construct(){
		 parent:: __construct();
		 if(!$this->session->userdata('adminId'))
		 redirect('admin/login');
		 $this->load->model('specialities_model');
		 $this->load->model('symptom_model');
		 $this->load->model('doctor_model');
		  $this->load->model('settings_model');
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

			$this->returnUrl= base_url('admin/doctor/');	

		}
	 }
	 public function index(){ 
		 
			global $arrPageRange;
			
			$data["pageRange"]	= 	HTMLOptionKeyValArray($this->config->item('arrPageRange'),$this->pageSize);
			$config["base_url"] = base_url() . "admin/doctor/?doctorName=".$this->input->post_get('doctorName')."&status=".$this->input->post_get('status');
			$config["total_rows"] = $this->doctor_model->get_count();
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
				$data['specialities'] = $this->specialities_model->getSpeciality();
		$data['symptom'] = $this->symptom_model->getSymptom();
			$data['doctor'] = $this->doctor_model->getDoctor($limit, $limit*($start-1)); 
			$data['title'] = 'Doctor LIST';
			if ($this->input->post_get('doctorName') <> ''){
				$data['doctorName'] = $this->input->post_get('doctorName');
			}else{
				$data['doctorName'] = '';	
			}
			if ($this->input->post_get('status') <> ''){
				$data['status'] = $this->input->post_get('status');
			}else{
				$data['status'] = '';	
			}
		
			$this->load->view('admin/doctor/index', $data);
		}
		
		
		
		
		
		public function create()
		{ global $arrWeekDay,$arrTime,$arrSessions; 
		
			//$data["arrWeekDay"]	= 	HTMLOptionKeyValArray($arrWeekDay,'');
			//$data["arrSessions"]	= 	$this->config->item('arrSessions');
			$data["arrTime"]	= 	HTMLOptionKeyValArray($arrTime,'');
			
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->form_validation->set_rules('specialityId', 'specialityId', 'required');
			$this->form_validation->set_rules('doctorName', 'doctorName', 'required');
			
			$settingId=1;
			$data['setting'] = $this->settings_model->get_setting_id($settingId);
			
			$this->specialities_model->status 		= 1;
		$data['specialities'] = $this->specialities_model->getSpeciality();//print_r($data['specialities']);exit;
		$data['symptom'] = $this->symptom_model->getSymptom(); 
			
			if ($this->form_validation->run() === FALSE)
			{	
				$this->load->view('admin/doctor/create',$data); 
		
			}
			else
			{

				$doctorId = $this->doctor_model->setDoctor();


				//$doctorId = $this->doctor_model->setAvailability($doctorId);
				$this->session->set_flashdata('success', 'Doctor added Successfully');



					redirect(base_url().'admin/doctor/update/'.$doctorId.'/'.'?returnUrl=doctor%3F'); 
			//redirect(base_url('admin/doctor/update/'.$doctorId.'/'));
				
			}
			
		}
		
		
		
		public function update($doctorId = NULL)
		{  
//echo $doctorId ;exit;
			global $arrWeekDay,$arrTime,$arrSessions; 
			
			$data["arrTime"]	= 	HTMLOptionKeyValArray($arrTime,'');
			$data["arrLanguage"]	= 	$this->config->item('arrLanguage');
			$this->load->helper('form');
			$this->load->library('form_validation');
				
			if($doctorId == NULL){
				$doctorId = $this->input->post('doctorId');
				$doctorId = $doctorId[0];
			}

			$data['doctor_item'] = $this->doctor_model->getDoctor_id($doctorId);
			$data['available_item'] = $this->doctor_model->getAvailable_id($doctorId);

			$data['availability'] = $this->doctor_model->getAvailable_id($doctorId);
			//echo "<pre>";print_r($data['available_item']);echo "</pre>";exit;
			$data['symptoms'] = $this->symptom_model->getSymptom();

			
			
			//echo "<pre>";print_r($data['morning_item']);echo "</pre>";exit;
			
		
			
			$vendorcat = explode(',',$data['doctor_item']['specialization']);

		$data["specialitiesList"]	= 	HTMLOption2DArray($data['symptoms'],'symptomId','symptomName',$vendorcat);
			$data['title'] = 'update a Doctor ';
		
			$this->form_validation->set_rules('specialityId', 'specialityId', 'required');
			$this->form_validation->set_rules('doctorId', 'doctorId', 'required');
				
			 //$this->form_validation->set_rules('qualification', 'qualification', 'required');
			/*$this->form_validation->set_rules('doctorPassword', 'doctorPassword', 'required');
			$this->form_validation->set_rules('experience', 'experience', 'required');
			$this->form_validation->set_rules('doctorFee', 'doctorFee', 'required');
			$this->form_validation->set_rules('age', 'age', 'required');
			$this->form_validation->set_rules('gender', 'gender', 'required');
			$this->form_validation->set_rules('doctorMobile', 'doctorMobile', 'required');
			$this->form_validation->set_rules('communicationMode', 'communicationMode', 'required');
			$this->form_validation->set_rules('doctorEmail', 'doctorEmail', 'required');
			$this->form_validation->set_rules('gender', 'gender', 'required');
			 */
			$this->specialities_model->status 		= 1;
		$data['specialities'] = $this->specialities_model->getSpeciality();
		
			if ($this->form_validation->run() === FALSE)
			{	
			 $this->load->view('admin/doctor/update', $data);
			}
			else

			{	
				//echo "gfsgesst";exit;

			    $this->doctor_model->updateDoctor($doctorId);
				//$this->doctor_model->updateAvailability($doctorId);
				$this->session->set_flashdata('success', 'Doctor updated Successfully');
				if($this->returnUrl <> '')
					redirect(base_url().'admin/'.$this->returnUrl); 
				
			}
		   }


public function updateAvailability($doctorId = NULL,$availableDay=NULL)
		{  
//echo $availableDay ;exit;
			global $arrWeekDay,$arrTime,$arrSessions; 
			
			$data["arrTime"]	= 	HTMLOptionKeyValArray($arrTime,'');
			$data["arrLanguage"]	= 	$this->config->item('arrLanguage');
			$this->load->helper('form');
			$this->load->library('form_validation');
				
			if($doctorId == NULL){
				$doctorId = $this->input->post('doctorId');
				$doctorId = $doctorId[0];
			}

			$data['doctor_item'] = $this->doctor_model->getDoctor_id($doctorId);
			$data['available_item'] = $this->doctor_model->getAvailable_Id($doctorId);


			$data['availability'] = $this->doctor_model->getAvailable_id($doctorId);
			
			$data['title'] = 'update a Doctor ';
		
			
			$this->form_validation->set_rules('doctorId', 'doctorId', 'required');
				
			if ($this->form_validation->run() === FALSE)
			{	
			 $this->load->view('admin/doctor/update', $data);
			}
			else

			{	
				

				$this->doctor_model->updateAvailability($doctorId,$availableDay);
				$this->session->set_flashdata('success', 'Doctor updated Successfully');
				if($this->returnUrl <> '')
					redirect(base_url().'admin/doctor/update/'.$doctorId.'/'.'?returnUrl=doctor%3F'); 
				
			}
		   }


		   
		   
		   public function view($seoUri = NULL)
		{	
		    $this->load->helper('form');
			//$doctorId = 1;
				$data['symptoms'] = $this->symptom_model->getSymptom();
					$data['specialities'] = $this->specialities_model->getSpeciality();
						$data['doctor'] = $this->doctor_model->getDoctor(); 
			$data['doctor_item'] = $this->doctor_model->retrieveDoctor($seoUri);
			$this->db->select('doctorId');
			$this->db->from('axdoctors');
			$this->db->where('seoUri',$seoUri);
			$result_array = $this->db->get()->result_array();	
			$doctorId				    = $result_array[0]["doctorId"];
			$data['available_item'] = $this->doctor_model->getAvailable_id($doctorId);
			if (empty($data['doctor_item']))
			{
				show_404();
			}
		
			$this->load->view('admin/doctor/view', $data);
		}
		   
			
		public function delete($doctorIds = NULL)
		{ 
			if($doctorIds == NULL ){
				$doctorIds = $this->input->post('doctorIds');
				
			}
		
			if ($doctorIds === FALSE)
			{	
				redirect(base_url('admin/doctor')); 
			}
			else
			{	
				$this->doctor_model->delete_doctor($doctorIds);
				$this->session->set_flashdata('success', 'Doctor deleted Successfully');
			
					redirect(base_url('admin/doctor'));
				
			}
		}

	
	public function activate($doctorIds = NULL)
		{ 
		    //echo $this->input->get('returnUrl');die();
			if($doctorIds == NULL){
				$doctorIds = $this->input->post('doctorIds');
				$doctorIds = explode(",",$doctorIds);
			}
		
			if ($doctorIds === FALSE)
			{	
				redirect(base_url('admin/doctor')); 
		
			}
			else
			{	
				$this->doctor_model->activate_doctor($doctorIds);
				$this->session->set_flashdata('success', 'Doctor activated Successfully'); 
				
					redirect(base_url('admin/doctor'));
				
			}
		}
	
	
	
	public function deactivate($doctorIds = NULL)
		{ 
			if($doctorIds == NULL){
				$doctorIds = $this->input->post('doctorIds');
				$doctorIds = explode(",",$doctorIds);
			}
			
			if ($doctorIds === FALSE)
			{	
				redirect(base_url('admin/doctor')); 
		
			}
			else
			{	
				$this->doctor_model->deactivate_doctor($doctorIds);
				$this->session->set_flashdata('success', 'Doctor Deactivated Successfully');
				
					redirect(base_url('admin/doctor'));
				
			}
		}
		
		
	
		
		
	
		
		
	
}

?>