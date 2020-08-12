<?php
class Rating extends CI_controller{
	 public function __construct(){
		 parent:: __construct();
		 if(!$this->session->userdata('adminId'))
		 redirect('admin/login');
		 $this->load->model('doctor_model');
		 $this->load->model('patients_model');
		 $this->load->model('rating_model');
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
			$config["total_rows"] = $this->rating_model->get_count();
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

			$data['doctor'] = $this->doctor_model->getDoctor($limit, $limit*($start-1)); 
			$data['patient'] = $this->patients_model->getPatient($limit, $limit*($start-1));
			$data['rating'] = $this->rating_model->getRating($limit, $limit*($start-1));
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
		
			$this->load->view('admin/rating/index', $data);
		}
		
	public function view($ratingId = NULL)
		{
			$data['rating_item'] = $this->rating_model->getRating_id($ratingId);
	
		
			
			
			$this->load->view('admin/rating/view', $data);
		}
	
		
	
}

?>