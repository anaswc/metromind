<?php
class Adminuser extends CI_controller{
	 public function __construct(){
		 parent:: __construct();
		 if(!$this->session->userdata('adminId'))
		 redirect('admin/login');
		 $this->load->model('adminuser_model');
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

			$this->returnUrl= base_url('admin/adminuser/');	

		}
	 }
	 public function index(){
		 
			global $arrPageRange,$arrStatusList,$arrAdminType;
			
			

			$data["pageRange"]	= 	HTMLOptionKeyValArray($this->config->item('arrPageRange'),$this->pageSize);
			$config["base_url"] = base_url() . "admin/adminuser/?adminName=".$this->input->post_get('adminName');
			$config["total_rows"] = $this->adminuser_model->get_count();
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
			
		
			$data['adminuser'] = $this->adminuser_model->getAdmin($limit, $limit*($start-1)); //echo "<pre>";print_r($data['adminuser']);echo "</pre>";exit;
			$data['title'] = 'adminuser LIST';
			if ($this->input->post_get('adminName') <> ''){
				$data['adminName'] = $this->input->post_get('adminName');
			}else{
				$data['adminName'] = '';	
			}

if ($this->input->post_get('adminType') <> ''){	
			
				$data["adminTypeList"]	= 	HTMLOptionKeyValArray($arrAdminType,$this->input->post_get('adminType'));		
							
			}else{				
				$data["adminTypeList"]	= 	HTMLOptionKeyValArray($arrAdminType,'');			
			}

$data['extraParameters']	= "";

$data['extraParameters']	.="adminName=".$this->input->post_get('adminName')."&";

		$data['extraParameters']	.= "pageSize=$this->pageSize&submitted=1";




		
			$this->load->view('admin/adminuser/index', $data);
		}
		
		
		
		
		
		public function create()
		{ 
		   global $arrAdminType;
			$this->load->helper('form');
			$this->load->library('form_validation');
			$data["adminTypeList"]				= 	HTMLOptionKeyValArray($arrAdminType,$this->adminuser_model->adminType);
			$this->form_validation->set_rules('adminName', 'adminName', 'required');
			
		
			if ($this->form_validation->run() === FALSE)
			{	
				$this->load->view('admin/adminuser/create',$data); 
		
			}
			else
			{
				$adminId  = $this->adminuser_model->setAdmin();
				$this->session->set_flashdata('success', 'Admin user added Successfully');
				redirect(base_url('admin/adminuser'));
					

				}
				
			}
			
		
		
		
		
		public function update($adminId = NULL)
		{ 
		    global $arrAdminType;
		
			$this->load->helper('form');
			$this->load->library('form_validation');
				
			if($adminId == NULL){
				$adminId = $this->input->post('adminId');
				$adminId = $adminId[0];
			}

			$data['admin_item'] = $this->adminuser_model->getAdmin_id($adminId);

			$data["adminTypeList"]		= 	HTMLOptionKeyValArray($arrAdminType,$data['admin_item']['adminType']);
			$data['title'] = 'update a Admin item';
			
			$this->form_validation->set_rules('adminName', 'adminName', 'required');
			
			
		
			if ($this->form_validation->run() === FALSE)
			{	
			 $this->load->view('admin/adminuser/update', $data);
			}
			else
			{	
				
						$this->adminuser_model->updateAdmin($adminId);
				$this->session->set_flashdata('success', 'Admin user updated Successfully');
				if($this->returnUrl <> '')
				{
					redirect(base_url().'admin/'.$this->returnUrl); 
				}
					else{
					redirect(base_url().'admin/adminuser'); 	
				}

				
			 }
		   }
		
			
		public function delete($adminIds = NULL)
		{ 
			if($adminIds == NULL){
				$adminIds = $this->input->post('adminIds');
			}
		
			if ($adminIds === FALSE)
			{	
				redirect(base_url('admin/adminuser')); 
			}
			else
			{	
				$this->adminuser_model->delete_Admin($adminIds);
				$this->session->set_flashdata('success', 'Admin user deleted Successfully');
				redirect(base_url('admin/adminuser'));
				
			}
		}

	//status live
	public function activate($adminIds = NULL)
		{ 
			if($adminIds == NULL){
				$adminIds = $this->input->post('adminIds');
				$adminIds = explode(",",$adminIds);
			}
		
			if ($adminIds === FALSE)
			{	
				redirect(base_url('admin/adminuser')); 
		
			}
			else
			{	
				$this->adminuser_model->activate_Admin($adminIds);
				$this->session->set_flashdata('success', 'Admin user activated Successfully'); 
				
					redirect(base_url('admin/adminuser'));
				
			}
		}
	
	
	//status Expired
	public function deactivate($adminIds = NULL)
		{ 
			if($adminIds == NULL){
				$adminIds = $this->input->post('adminIds');
				$adminIds = explode(",",$adminIds);
			}
			
			if ($adminIds === FALSE)
			{	
				redirect(base_url('admin/adminuser')); 
		
			}
			else
			{	
				$this->adminuser_model->deactivate_Admin($adminIds);
				$this->session->set_flashdata('success', 'Admin user deactivated Successfully');
			redirect(base_url('admin/adminuser'));
				
			}
		}
		
		//status Cancelled
	public function cancelled($adminIds = NULL)
		{ 
			if($adminIds == NULL){
				$adminIds = $this->input->post('adminIds');
				$adminIds = explode(",",$adminIds);
			}
			
			if ($adminIds === FALSE)
			{	
				redirect(base_url('admin/adminuser')); 
		
			}
			else
			{	
				$this->adminuser_model->cancelled_Admin($adminIds);
				$this->session->set_flashdata('success', 'Admin cancelled Successfully');
			if($this->input->get('returnUrl') <> '')
					redirect(base_url('admin/adminuser'.$this->input->get('returnUrl')));
				else{
				redirect(base_url('admin/adminuser')); 
				}
			}
		}
		
	public function checkUsername()
		{ 	
			$this->adminuser_model->userName = $this->input->post_get('userName'); 
			 
			
			$data = $this->adminuser_model->validateAdmin($this->adminuser_model->userName);
			echo json_encode($data);
		}	
	
		
		
	
}
