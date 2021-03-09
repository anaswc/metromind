<?php
class Cms extends CI_controller{
	 public function __construct(){
		 parent:: __construct();
		 if(!$this->session->userdata('adminId'))
		 redirect('admin/login');
		 $this->load->model('cms_model');
		 $this->load->model('doctor_model');
		//  $this->load->model('Banner_model');
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
			//$config["base_url"] = base_url() . "admin/Symptom/?symptomName=".$this->input->post_get('symptomName')."&status=".$this->input->post_get('status');
			$config["total_rows"] = $this->cms_model->get_count();
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
			
		$data['cms_item'] = $this->cms_model->getCms($limit, $limit*($start-1)); 
			$data['title'] = 'cms LIST';
			
			if ($this->input->post_get('pageName') <> ''){
				$data['pageName'] = $this->input->post_get('pageName');
				
			}else{
				$data['pageName'] = '';	
			}
			if ($this->input->post_get('status') <> ''){
				$data['status'] = $this->input->post_get('status');
			}else{
				$data['status'] = '';	
			}
		
			$this->load->view('admin/cms/index', $data);
		}
		
		
		 public function view($pageId = NULL)
		{
			$data['cms_item'] = $this->cms_model->retrieveCms($pageId);
	
			if (empty($data['cms_item']))
			{
				show_404();
			}
	
			
			
		
			$this->load->view('admin/cms/view', $data);
		}
		   
		
		
		public function create()
		{ 
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->form_validation->set_rules('pageName', 'pageName', 'required|is_unique[axcms.pageName]');
			if ($this->form_validation->run() === FALSE)
			{	
				$this->load->view('admin/cms/create'); 
		
			}
			else
			{
				$pageId = $this->cms_model->setCms();
				$this->session->set_flashdata('success', 'Cms added Successfully');
				if($this->input->get('returnUrl') <> '')
					redirect(base_url('admin/cms'.$this->input->get('returnUrl')));
				else{
				redirect(base_url('admin/cms')); 
				}
				}
			
		}
		
		
		
		public function update($pageId = NULL)
		{ 
			$this->load->helper('form');
			$this->load->library('form_validation');
				
			if($pageId == NULL){
				$pageId = $this->input->post('pageId');
				$pageId = $pageId[0];
			}
			

			$data['cms_item'] = $this->cms_model->getcms_id($pageId);
			$data['title'] = 'update a cs item';
			
			$this->form_validation->set_rules('pageName', 'pageName', 'required');
			
		
			if ($this->form_validation->run() === FALSE)
			{	
			 $this->load->view('admin/cms/update', $data);
			}
			else
			{	
			    $this->cms_model->updatesymptom($pageId);
				$this->session->set_flashdata('success', 'Cms updated Successfully');
				if($this->input->get('returnUrl') <> '')
					redirect(base_url('admin/cms'.$this->input->get('returnUrl')));
				else{
				redirect(base_url('admin/cms')); 
				} 
			 }
		   }
			
		public function delete($pageIds = NULL)
		{ 
			if($pageIds == NULL){
				$pageIds = $this->input->post('pageIds');
			}
		
			if ($pageIds === FALSE)
			{	
				redirect(base_url('admin/cms')); 
			}
			else
			{	
				$this->cms_model->delete_cms($pageIds);
				$this->session->set_flashdata('success', 'Cms deleted Successfully');
				if($this->input->get('returnUrl') <> '')
					redirect(base_url('admin/cms'.$this->input->get('returnUrl')));
				else{
				redirect(base_url('admin/cms')); 
				}
			}
		}

	//status live
	public function activate($pageIds = NULL)
		{ 
			if($pageIds == NULL){
				$pageIds = $this->input->post('pageIds');
				$pageIds = explode(",",$pageIds);
			}
		
			if ($pageIds === FALSE)
			{	
				redirect(base_url('admin/cms')); 
		
			}
			else
			{	
				$this->cms_model->activate_cms($pageIds);
				$this->session->set_flashdata('success', 'Cms activated Successfully'); 
				if($this->input->get('returnUrl') <> '')
					redirect(base_url('admin/cms'.$this->input->get('returnUrl')));
				else{
				redirect(base_url('admin/cms')); 
				}
			}
		}
	
	
	//status Expired
	public function deactivate($pageIds = NULL)
		{ 
			if($pageIds == NULL){
				$pageIds = $this->input->post('pageIds');
				$pageIds = explode(",",$pageIds);
			}
			
			if ($pageIds === FALSE)
			{	
				redirect(base_url('admin/cms')); 
		
			}
			else
			{	
				$this->cms_model->deactivate_cms($pageIds);
				$this->session->set_flashdata('success', 'Cms Expired Successfully');
				if($this->input->get('returnUrl') <> '')
					redirect(base_url('admin/cms'.$this->input->get('returnUrl')));
				else{
				redirect(base_url('admin/cms')); 
				} 
			}
		}
		
		//status Cancelled
	public function cancelled($pageIds = NULL)
		{ 
			if($pageIds == NULL){
				$pageIds = $this->input->post('pageIds');
				$pageIds = explode(",",$pageIds);
			}
			
			if ($pageIds === FALSE)
			{	
				redirect(base_url('admin/cms')); 
		
			}
			else
			{	
				$this->cms_model->cancelled_symptom($pageIds);
				$this->session->set_flashdata('success', 'Cms cancelled Successfully');
				if($this->input->get('returnUrl') <> '')
					redirect(base_url('admin/cms'.$this->input->get('returnUrl')));
				else{
				redirect(base_url('admin/cms')); 
				}
			}
		}
		
		// public function banner()
		// { 
		// 	$this->load->helper('form');
		// 	$this->load->library('form_validation');
		// 	$data['banner_item'] = $this->cms_model->getbanner_id(1);
		// 	$data['title'] = 'update a cs item';
		// 	$this->form_validation->set_rules('videoId', 'videoId', 'required');
		// 	if ($this->form_validation->run() === FALSE)
		// 	{	
		// 		$this->load->view('admin/cms/banner'); 
		// 	}
		// 	else
		// 	{
		// 		 $this->cms_model->updateBanner($pageId);
		// 		$this->session->set_flashdata('success', 'Cms updated Successfully');
		// 		if($this->input->get('returnUrl') <> '')
		// 			redirect(base_url('admin/cms'.$this->input->get('returnUrl')));
		// 		else{
		// 		redirect(base_url('admin/cms')); 
		// 		} 
				
		// 		}
			
		// }
		public function banner()
		{ 
			$this->load->helper('form');
			$this->load->library('form_validation');
				$bannerId = 1;

			$data['banner_item'] = $this->doctor_model->getBanner_id();
			$data['title'] = 'update a banner item';
			
			$this->form_validation->set_rules('videoId', 'videoId', 'required');
			
		
			if ($this->form_validation->run() === FALSE)
			{	
			 $this->load->view('admin/cms/banner', $data);
			}
			else
			{	
				$this->doctor_model->updateBanner($bannerId);
				$this->session->set_flashdata('success', 'Banner updated Successfully');
				if($this->input->get('returnUrl') <> '')
					redirect(base_url('admin/cms'.$this->input->get('returnUrl')));
				else{
				redirect(base_url('admin/cms')); 
				} 
			 }
		   }	
	
}

?>