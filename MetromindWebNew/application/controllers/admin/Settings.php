<?php
class Settings extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
				if(! $this->session->userdata('adminId'))
					redirect('admin');
                $this->load->model('settings_model');
                $this->load->helper('url_helper');
				$this->load->library("pagination");
				$this->pageSize = 50;
				
				if($this->input->post_get('pageSize')) $this->pageSize = $this->input->post_get('pageSize');
        }

        public function index()
		{ 
			
			
			$settingId  = 1;	
			if($settingId == NULL){
				$settingId = $this->input->post('settingId');
				$settingId = $settingId[0];
			}
			
			$data['setting_item'] = $this->settings_model->get_setting_id($settingId);
			
			$data['title'] = 'update a setting item';
			
			$this->form_validation->set_rules('hospitalName', 'hospitalName', 'required');
			//$this->form_validation->set_rules('adminEmail', 'adminEmail', 'required');
		
			if ($this->form_validation->run() === FALSE)
			{	
				$this->load->view('admin/settings/index', $data);
			}
			else
			{	
			
				if($this->settings_model->update_setting($settingId)){
					$this->session->set_flashdata('success', 'Setting updated Successfully');
					redirect(base_url('admin/settings')); 	
				}else{
					$this->load->helper('form');
					$this->load->library('form_validation');
					$data['setting_item'] = $this->settings_model->get_setting_id($settingId);
					$this->load->view('admin/settings/index', $data);
				}
			}		}

       
		
		
		
		public function update($settingId = NULL)
		{ 
			$this->load->helper('form');
			$this->load->library('form_validation');
				
			if($settingId == NULL){
				$settingId = $this->input->post('settingId');
				$settingId = $settingId[0];
			}

			$data['setting_item'] = $this->settings_model->get_setting_id($settingId);
			$data['title'] = 'update a setting item';
			
			$this->form_validation->set_rules('livello1', 'livello1', 'required');
			
		
			if ($this->form_validation->run() === FALSE)
			{	
				$this->load->view('admin/setting/update', $data);
			}
			else
			{	
			
				if($this->settings_model->update_setting($settingId)){
					$this->session->set_flashdata('success', 'setting updated Successfully');
					redirect(base_url('admin/setting')); 	
				}else{
					$this->load->helper('form');
					$this->load->library('form_validation');
					$data['setting_item'] = $this->settings_model->get_setting_id($settingId);
					$this->load->view('admin/setting/update', $data);
				}
			}
		}
		
		
		
		
		
	
		
		
		
		
		
}
?>