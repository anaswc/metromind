<?php
class Settings_model extends CI_Model {

        public function __construct()
        {
			$this->sortColumn 					= '';
			$this->sortDirection 				= '';
			$this->settingId  				= "";	
			$this->adminEmail				= "";			
			$this->hospitalName				= "";
			$this->hospitalAddress						= "";
                        $this->hospitalWebsite						= "";
                        $this->hospitalPhone						= "";
                        $this->hospitalEmail						= "";
                        $this->defaultSessionDuration						= "";
			$this->traillDuration			="";
			$this->settingIds				= "";	
			
			$this->load->database();
			$this->load->library('upload');
			$this->setPostGetVars();
        }
		
		public function setPostGetVars(){	

			$this->settingId				= $this->input->post_get('settingId');
			
			$this->adminEmail				= trim($this->input->post_get('adminEmail'));
			
			$this->hospitalName				= trim($this->input->post_get('hospitalName'));
			
			$this->hospitalAddress				= $this->input->post_get('hospitalAddress');
                        
            $this->hospitalWebsite			= $this->input->post_get('hospitalWebsite');
                        
            $this->hospitalPhone			= $this->input->post_get('hospitalPhone');
                        
             $this->hospitalEmail		= $this->input->post_get('hospitalEmail');
                        
          $this->defaultSessionDuration		= $this->input->post_get('defaultSessionDuration');
         $this->traillDuration		=$this->input->post_get('traillDuration');
			
			$this->settingIds				= trim($this->input->post_get('settingIds'));			
	
		}
		
		
		public function get_settings($limit = NULL, $start = NULL)
		{	
			$this->db->limit($limit, $start);
			
			$this->db->select('*');
			
			$this->db->from('axsetting');
			
			if($this->settingId  != "")
				$this->db->where('settingId', $this->settingId);			
		
			if($this->status != "")
				$this->db->where('status', $this->status);
				
			
			
			$query = $this->db->get();
			
			return $query->result_array();

		}
		
		
		
		public function get_setting_id($settingId = FALSE)
		{
			if ($settingId === FALSE)
			{
					return 0;
			}
	
			$query = $this->db->get_where('axsetting', array('settingId' => $settingId));
			return $query->row_array();
		}
		
		

		public function update_setting($settingId) { 
			//echo $settingId;exit;
			
			$now = new DateTime();

			$now->setTimezone(new DateTimezone('Europe/Rome'));

			$modifiedDate =  $now->format('Y-m-d');
			$status=1;
			
			$this->load->helper('url');
		
			$data = array(
				'adminEmail' 	=> $this->input->post('adminEmail'),
				'hospitalName' 	=> $this->input->post('hospitalName'),
				'hospitalAddress' 			=> $this->input->post('hospitalAddress'),
                 'hospitalWebsite' 			=> $this->input->post('hospitalWebsite'),
                 'hospitalPhone' 			=> $this->input->post('hospitalPhone'),
           'hospitalEmail' 			=> $this->input->post('hospitalEmail'),
          'defaultSessionDuration' 			=> $this->input->post('defaultSessionDuration'),
		'traillDuration' 			=>  $this->input->post('traillDuration'),
		'status' 			=> $status
				
				
			); //print_r($data);exit;
			$this->db->set($data); 
			$this->db->where("settingId", $settingId); 
			$this->db->update("axsetting", $data); 
			
			
			if($_FILES["hospitalLogo"]['name'] <> ''){
				 $this->settings_model->upload_image($settingId);	
			}
			return $settingId;
			
		} 

		public function upload_image($settingId) { 

			 $config['upload_path']   = AXUPLOADSETTINGPATH; 
			 $config['allowed_types'] = 'gif|jpg|png|jpeg|JPG';
			 //$config['max_size']      = 100; 
			 $config['max_width']     = 1300; 
			 $config['max_height']    = 800;  
			 $config['overwrite'] = TRUE;
			 
			 $filename 		= $_FILES["hospitalLogo"]['name'];
			 $type    		= substr(strrchr(trim($filename), "."),1);
			 $hospitalLogo	= $settingId.".".$type;
			 $config['file_name'] = $hospitalLogo;
			 $this->load->library('upload', $config);
			 $this->upload->initialize($config);
			
			 if ( ! $this->upload->do_upload('hospitalLogo')) {
				$error = array('error' => $this->upload->display_errors()); 
				$this->session->set_flashdata('success', $error['error']);
				return 0;
			 }
				
			 else { 
				$data1 = array('upload_data' => $this->upload->data()); 
				
				$data = array(
					'hospitalLogo' => $hospitalLogo
				);
				$this->db->set($data); 
				$this->db->where("settingId", $settingId); 
				$this->db->update("axsetting", $data);
				
				return $settingId;
				
			 } 
      } 
	  
		
	  
		public function get_count() {
			
			
			if(trim($this->settingId) != "")
				$this->db->where('settingId', $this->settingId);
		
			if(trim($this->status) != "")
				$this->db->where('status', $this->status);
				
			
			
			$this->db->from("axsetting");
			
			return $this->db->count_all_results();
			//return $this->db->count_all('axservice');
		}
		
		
		
		
		public function setPageNumber($pageNumber) {
            $this->_pageNumber = $pageNumber;
        }
 
        public function setOffset($offset) {
            $this->_offset = $offset;
        }
		
		
}
?>