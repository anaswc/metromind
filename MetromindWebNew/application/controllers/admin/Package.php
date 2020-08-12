<?php
class Package extends CI_controller{
	 public function __construct(){
		 parent:: __construct();
		 if(!$this->session->userdata('adminId'))
		 redirect('admin/login');
		
		  $this->load->model('package_model');
		   $this->load->model('doctor_model');
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

			$this->returnUrl= base_url('admin/package/');	

		}
	 }
	 public function index(){
		 
			global $arrPageRange,$arrStatusList;
			
			

			$data["pageRange"]	= 	HTMLOptionKeyValArray($this->config->item('arrPageRange'),$this->pageSize);
			$config["base_url"] = base_url() . "admin/package/?packageName=".$this->input->post_get('packageName');
			$config["total_rows"] = $this->package_model->get_count();
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
			
		
			$data['package'] = $this->package_model->getPackage($limit, $limit*($start-1)); //echo "<pre>";print_r($data['package']);echo "</pre>";exit;
			$data['title'] = 'package LIST';
			if ($this->input->post_get('packageName') <> ''){
				$data['packageName'] = $this->input->post_get('packageName');
			}else{
				$data['packageName'] = '';	
			}

			if ($this->input->post_get('doctorName') <> ''){
				$data['doctorName'] = $this->input->post_get('doctorName');
			}else{
				$data['doctorName'] = '';	
			}


$data['extraParameters']	= "";

$data['extraParameters']	.="packageName=".$this->input->post_get('packageName')."&";

		$data['extraParameters']	.= "pageSize=$this->pageSize&submitted=1";




		
			$this->load->view('admin/package/index', $data);
		}
		
		
		
		
		
		public function create()
		{ 
		    


			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->form_validation->set_rules('packageName', 'packageName', 'required');
			
			 $arrDoctor = $this->doctor_model->getDoctor(); 
				$data['doctorList']	= HTMLOption2DArray($arrDoctor,"doctorId","doctorName",'');
		
			if ($this->form_validation->run() === FALSE)
			{	
				
				$this->load->view('admin/package/create',$data); 
		
			}
			else
			{
		$this->package_model->packageId=$packageId;
				$validate=$this->package_model->validatePackage();
				{
					if($validate)
					{
						$packageId = $this->package_model->setPackage();
				$this->session->set_flashdata('success', 'Package added Successfully');
				redirect(base_url('admin/package'));
					}


				else{
					

				redirect(base_url('admin/package/create')); 
//$this->load->view('admin/package/create', $data);  
				
				
				}

				}
				
			}
			
		}
		
		
		
		public function update($packageId = NULL)
		{ 
		     
		
			$this->load->helper('form');
			$this->load->library('form_validation');
				
			if($packageId == NULL){
				$packageId = $this->input->post('packageId');
				$packageId = $packageId[0];
			}

			$data['package_item'] = $this->package_model->get_package_id($packageId);
			$data['title'] = 'update a Speciality item';
			

	$arrDoctor = $this->doctor_model->getDoctor(); 
	$data['doctorList']	= HTMLOption2DArray($arrDoctor,"doctorId","doctorName",$data['package_item']['doctorId']);
			$this->form_validation->set_rules('packageName', 'packageName', 'required');
			
			
		
			if ($this->form_validation->run() === FALSE)
			{	

				

			 $this->load->view('admin/package/update', $data);
			}
			else
			{	
				$this->package_model->$packageId=$packageId;
				$validate=$this->package_model->validatePackage($packageId);
				{
					if($validate)
					{
						$this->package_model->updatePackage($packageId);
				$this->session->set_flashdata('success', 'Package updated Successfully');
				if($this->returnUrl <> '')
					redirect(base_url().'admin/'.$this->returnUrl); 
					
				}
			    
				else{
				redirect(base_url().'admin/package/update/'.$packageId);
				}
			 }
		   }
		}
			
		public function delete($packageIds = NULL)
		{ 
			if($packageIds == NULL){
				$packageIds = $this->input->post('packageIds');
			}
		
			if ($packageIds === FALSE)
			{	
				redirect(base_url('admin/package')); 
			}
			else
			{	
				$this->package_model->delete_package($packageIds);
				$this->session->set_flashdata('success', 'package deleted Successfully');
				redirect(base_url('admin/package'));
				
			}
		}

	//status live
	public function activate($packageIds = NULL)
		{ 
			if($packageIds == NULL){
				$packageIds = $this->input->post('packageIds');
				$packageIds = explode(",",$packageIds);
			}
		
			if ($packageIds === FALSE)
			{	
				redirect(base_url('admin/package')); 
		
			}
			else
			{	
				$this->package_model->activate_package($packageIds);
				$this->session->set_flashdata('success', 'package activated Successfully'); 
				
					redirect(base_url('admin/package'));
				
			}
		}
	
	
	//status Expired
	public function deactivate($packageIds = NULL)
		{ 
			if($packageIds == NULL){
				$packageIds = $this->input->post('packageIds');
				$packageIds = explode(",",$packageIds);
			}
			
			if ($packageIds === FALSE)
			{	
				redirect(base_url('admin/package')); 
		
			}
			else
			{	
				$this->package_model->deactivate_package($packageIds);
				$this->session->set_flashdata('success', 'package deactivated Successfully');
			redirect(base_url('admin/package'));
				
			}
		}
		
		//status Cancelled
	
		
		
	
		
		
	
}

?>