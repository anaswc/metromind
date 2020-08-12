<?php
class Specialities extends CI_controller{
	 public function __construct(){
		 parent:: __construct();
		 if(!$this->session->userdata('adminId'))
		 redirect('admin/login');
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

			$this->returnUrl= base_url('admin/specialities/');	

		}
	 }
	 public function index(){
		 
			global $arrPageRange,$arrStatusList;
			
			

			$data["pageRange"]	= 	HTMLOptionKeyValArray($this->config->item('arrPageRange'),$this->pageSize);
			$config["base_url"] = base_url() . "admin/specialities/?specialityName=".$this->input->post_get('specialityName');
			$config["total_rows"] = $this->specialities_model->get_count();
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
			
		
			$data['specialities'] = $this->specialities_model->getSpeciality($limit, $limit*($start-1)); //echo "<pre>";print_r($data['specialities']);echo "</pre>";exit;
			$data['title'] = 'Specialities LIST';
			if ($this->input->post_get('specialityName') <> ''){
				$data['specialityName'] = $this->input->post_get('specialityName');
			}else{
				$data['specialityName'] = '';	
			}


$data['extraParameters']	= "";

$data['extraParameters']	.="specialityName=".$this->input->post_get('specialityName')."&";

		$data['extraParameters']	.= "pageSize=$this->pageSize&submitted=1";




		
			$this->load->view('admin/specialities/index', $data);
		}
		
		
		
		
		
		public function create()
		{ 
		    $data["arrAllottedTime"]		= 	$this->config->item('arrAllottedTime');
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->form_validation->set_rules('specialityName', 'specialityName', 'required');
			$this->form_validation->set_rules('seoUri', 'seoUri', 'required');
			$this->form_validation->set_rules('description', 'description', 'required');
		
			if ($this->form_validation->run() === FALSE)
			{	
				$this->load->view('admin/specialities/create',$data); 
		
			}
			else
			{

				$validate=$this->specialities_model->validateSpeciality();
				{
					if($validate)
					{
						$specialityId = $this->specialities_model->setSpeciality();
				$this->session->set_flashdata('success', 'Specilaity added Successfully');
				redirect(base_url('admin/specialities'));
					}


				else{

				$this->load->view('admin/specialities/create', $data);   
				}

				}
				
			}
			
		}
		
		
		
		public function update($specialityId = NULL)
		{ 
		     $data["arrAllottedTime"]		= 	$this->config->item('arrAllottedTime');
		
			$this->load->helper('form');
			$this->load->library('form_validation');
				
			if($specialityId == NULL){
				$specialityId = $this->input->post('specialityId');
				$specialityId = $specialityId[0];
			}

			$data['speciality_item'] = $this->specialities_model->getSpeciality_id($specialityId);
			$data['title'] = 'update a Speciality item';
			
			$this->form_validation->set_rules('specialityName', 'specialityName', 'required');
			$this->form_validation->set_rules('description', 'description', 'required');
			
		
			if ($this->form_validation->run() === FALSE)
			{	
			 $this->load->view('admin/specialities/update', $data);
			}
			else
			{	
				$this->specialities_model->$specialityId=$specialityId;
				$validate=$this->specialities_model->validateSpeciality();
				{
					if($validate)
					{
						if($this->specialities_model->updateSpeciality($specialityId)){
							$this->session->set_flashdata('success', 'Specilaity updated Successfully');
							if($this->returnUrl <> '')
								redirect(base_url().'admin/'.$this->returnUrl); 
						}else{
							
							$data['speciality_item'] = $this->specialities_model->getSpeciality_id($specialityId);
							
							$this->load->view('admin/specialities/update', $data);
							
							//$this->session->set_flashdata('success', 'Specilaity updated Successfully');
								
						}
					
				}
			    
				else{
				redirect(base_url().'admin/specialities/update/'.$specialityId);
				}
			 }
		   }
		}
			
		public function delete($specialityIds = NULL)
		{ 
			if($specialityIds == NULL){
				$specialityIds = $this->input->post('specialityIds');
			}
		
			if ($specialityIds === FALSE)
			{	
				redirect(base_url('admin/specialities')); 
			}
			else
			{	
				$this->specialities_model->delete_speciality($specialityIds);
				$this->session->set_flashdata('success', 'Specilaity deleted Successfully');
				redirect(base_url('admin/specialities'));
				
			}
		}

	//status live
	public function activate($specialityIds = NULL)
		{ 
			if($specialityIds == NULL){
				$specialityIds = $this->input->post('specialityIds');
				$specialityIds = explode(",",$specialityIds);
			}
		
			if ($specialityIds === FALSE)
			{	
				redirect(base_url('admin/specialities')); 
		
			}
			else
			{	
				$this->specialities_model->activate_speciality($specialityIds);
				$this->session->set_flashdata('success', 'Speciality activated Successfully'); 
				
					redirect(base_url('admin/specialities'));
				
			}
		}
	
	
	//status Expired
	public function deactivate($specialityIds = NULL)
		{ 
			if($specialityIds == NULL){
				$specialityIds = $this->input->post('specialityIds');
				$specialityIds = explode(",",$specialityIds);
			}
			
			if ($specialityIds === FALSE)
			{	
				redirect(base_url('admin/specialities')); 
		
			}
			else
			{	
				$this->specialities_model->deactivate_speciality($specialityIds);
				$this->session->set_flashdata('success', 'Speciality deactivated Successfully');
			redirect(base_url('admin/specialities'));
				
			}
		}
		
		//status Cancelled
	public function cancelled($specialityIds = NULL)
		{ 
			if($specialityIds == NULL){
				$specialityIds = $this->input->post('specialityIds');
				$specialityIds = explode(",",$specialityIds);
			}
			
			if ($specialityIds === FALSE)
			{	
				redirect(base_url('admin/specialities')); 
		
			}
			else
			{	
				$this->specialities_model->cancelled_speciality($specialityIds);
				$this->session->set_flashdata('success', 'Speciality cancelled Successfully');
			if($this->input->get('returnUrl') <> '')
					redirect(base_url('admin/specialities'.$this->input->get('returnUrl')));
				else{
				redirect(base_url('admin/specialities')); 
				}
			}
		}
		
		
	
		
		
	
}

?>