<?php
class Symptom extends CI_controller{
	 public function __construct(){
		 parent:: __construct();
		 if(!$this->session->userdata('adminId'))
		 redirect('admin/login');
		 $this->load->model('symptom_model');
		 $this->load->model('specialities_model');
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

			$this->returnUrl= base_url('admin/symptom/');	

		}
	 }
	 public function index(){
		 
			global $arrPageRange;
			
			$data["pageRange"]	= 	HTMLOptionKeyValArray($this->config->item('arrPageRange'),$this->pageSize);
			$config["base_url"] = base_url() . "admin/symptom/?symptomName=".$this->input->post_get('symptomName')."&specialityId=".$this->input->post_get('specialityId');
			$config["total_rows"] = $this->symptom_model->get_count();
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
			
		$data['symptom'] = $this->symptom_model->getSymptom($limit, $limit*($start-1)); 
			$data['title'] = 'symptom LIST';
			$data['specialities'] = $this->specialities_model->getSpeciality();
			
			if ($this->input->post_get('symptomName') <> ''){
				$data['symptomName'] = $this->input->post_get('symptomName');
				
			}else{
				$data['symptomName'] = '';	
			}
			$arrSpeciality = $this->specialities_model->getSpeciality(); // echo print_r($arrHealthCenter); exit;
				
			if ($this->input->post_get('specialityId') <> ''){	
			
				$data['specialityList']	= HTMLOption2DArray($arrSpeciality,"specialityId","specialityName",$this->input->post_get('specialityId'));		
							
			}else{				
				$data['specialityList']	= HTMLOption2DArray($arrSpeciality,"specialityId","specialityName",'');
			}

			$data['extraParameters']	= "";

$data['extraParameters']	.="symptomName=".$this->input->post_get('symptomName')."&";
$data['extraParameters']	.="specialityId=".$this->input->post_get('specialityId')."&";
		$data['extraParameters']	.= "pageSize=$this->pageSize&submitted=1";


		
			$this->load->view('admin/symptom/index', $data);
		}
		
		
		
		
		
		public function create()
		{ 
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->form_validation->set_rules('symptomName', 'symptomName', 'required');
			
			//$this->form_validation->set_rules('description', 'description', 'required');

			$arrSpecality = $this->specialities_model->getSpeciality(); // echo print_r($arrHealthCenter); exit;
					$data['specialities']	= HTMLOption2DArray($arrSpecality,"specialityId","specialityName",'');
		//$data['specialities'] = $this->specialities_model->getSpeciality();
			//print_r($data['specialities']);die();
			if ($this->form_validation->run() === FALSE)
			{	

				$this->load->view('admin/symptom/create',$data); 
		
			}
			else
			{
				$validate=$this->symptom_model->validateSymptom();
				
				if($validate){
				$symptomId = $this->symptom_model->setSymptom();
				$this->session->set_flashdata('success', 'Symptom added Successfully');
				
					redirect(base_url('admin/symptom'));
				
				}else{
					
				redirect(base_url('admin/symptom/create')); 
				}
			}
			
		}
		
		
		
		public function update($symptomId = NULL)
		{ 
			$this->load->helper('form');
			$this->load->library('form_validation');
				
			if($symptomId == NULL){
				$symptomId = $this->input->post('symptomId');
				$symptomId = $symptomId[0];
			}
			

			$data['symptom_item'] = $this->symptom_model->getsymptom_id($symptomId);
			$data['title'] = 'update a symptom item';
			$data['specialities'] = $this->specialities_model->getSpeciality();
			$speciestypes = array();
			
			$vendorcat = explode(',',$data['symptom_item']['specialityId']);

		$data["specialitiesList"]	= 	HTMLOption2DArray($data['specialities'],'specialityId','specialityName',$vendorcat);
		
			$this->form_validation->set_rules('symptomName', 'symptomName', 'required');
			//$this->form_validation->set_rules('description', 'description', 'required');
			
		
			if ($this->form_validation->run() === FALSE)
			{	
			 $this->load->view('admin/symptom/update', $data);
			}
			else
			{	
				$this->symptom_model->$symptomId=$symptomId;
				$validate=$this->symptom_model->validateSymptom();
				if($validate){
			    $this->symptom_model->updatesymptom($symptomId);
				$this->session->set_flashdata('success', 'Symptom updated Successfully');
				/*if($this->returnUrl <> '')
					redirect(base_url().'admin/'.$this->returnUrl); 
				else*/
					redirect(base_url().'admin/symptom/');
						
			}
				else{
				redirect(base_url().'admin/symptom/update/'.$symptomId);
				} 
			 }
		   }
			
		public function delete($symptomIds = NULL)
		{ 
			if($symptomIds == NULL){
				$symptomIds = $this->input->post('symptomIds');
			}
		
			if ($symptomIds === FALSE)
			{	
				redirect(base_url('admin/symptom')); 
			}
			else
			{	
				$this->symptom_model->delete_symptom($symptomIds);
				$this->session->set_flashdata('success', 'Symptom deleted Successfully');
				redirect(base_url('admin/symptom'));
				
			}
		}

	//status live
	public function activate($symptomIds = NULL)
		{ 
			if($symptomIds == NULL){
				$symptomIds = $this->input->post('symptomIds');
				$symptomIds = explode(",",$symptomIds);
			}
		
			if ($symptomIds === FALSE)
			{	
				redirect(base_url('admin/symptom')); 
		
			}
			else
			{	
				$this->symptom_model->activate_symptom($symptomIds);
				$this->session->set_flashdata('success', 'symptom activated Successfully'); 
				redirect(base_url('admin/symptom'));
				
			}
		}
	
	
	//status Expired
	public function deactivate($symptomIds = NULL)
		{ 
			if($symptomIds == NULL){
				$symptomIds = $this->input->post('symptomIds');
				$symptomIds = explode(",",$symptomIds);
			}
			
			if ($symptomIds === FALSE)
			{	
				redirect(base_url('admin/symptom')); 
		
			}
			else
			{	
				$this->symptom_model->deactivate_symptom($symptomIds);
				$this->session->set_flashdata('success', 'symptom Expired Successfully');
				redirect(base_url('admin/symptom'));
				
			}
		}
		
		//status Cancelled
	public function cancelled($symptomIds = NULL)
		{ 
			if($symptomIds == NULL){
				$symptomIds = $this->input->post('symptomIds');
				$symptomIds = explode(",",$symptomIds);
			}
			
			if ($symptomIds === FALSE)
			{	
				redirect(base_url('admin/symptom')); 
		
			}
			else
			{	
				$this->symptom_model->cancelled_symptom($symptomIds);
				$this->session->set_flashdata('success', 'symptom cancelled Successfully');
					if($this->input->get('returnUrl') <> '')
					redirect(base_url('admin/symptom'.$this->input->get('returnUrl')));
				else{
				redirect(base_url('admin/symptom')); 
				}
			}
		}
		
		
	
		
		
	
}

?>