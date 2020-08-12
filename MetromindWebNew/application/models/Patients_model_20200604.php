<?php

class  Patients_model extends CI_Model {
	
	public function __construct(){
		
		$this->patientId       ="";
		$this->firstName     ="";
		$this->lastName     ="";
		$this->patientEmail        ="";
		$this->patientMobile        ="";
		$this->patientPassword        ="";
		
		$this->patientAddress        ="";
		$this->status        ="";
		$this->isVerified        ="";
		$this->seoUri					= '';
		$this->birthDate      ="";
		$this->profileImgUrl      ="";
		$this->gender      ="";
		$this->customGender      ="";
		$this->createdDate      ="";
		$this->modifiedDate      ="";
		$this->lastLogin      ="";
		$this->sortColumn 	  = '';
		$this->sortDirection  = '';
		$this->load->database();
		$this->load->library('upload');
		$this->setPostGetVars();
		
	}
	public function setPostGetVars(){	

			$this->patientId						    = $this->input->post_get('patientId');
			$this->isVerified						    = $this->input->post_get('isVerified');
			$this->patientAddress						    = $this->input->post_get('patientAddress');
			$this->firstName						= trim($this->input->post_get('firstName'));
			$this->lastName						= trim($this->input->post_get('lastName'));
			$this->patientEmail                          = trim($this->input->post_get('patientEmail'));
			$this->patientMobile                            = trim($this->input->post_get('patientMobile'));
			$this->patientPassword                            = trim($this->input->post_get('patientPassword'));
			$this->birthDate                            = trim($this->input->post_get('birthDate'));
			$this->gender                            = trim($this->input->post_get('gender'));
			$this->customGender                            = trim($this->input->post_get('gender'));
			$this->status                           =  $this->input->post_get('customGender');
			$this->patientIds					= trim($this->input->post_get('patientIds'));	
			$this->seoUri					= trim($this->input->post_get('seoUri'));
	}
	
	
	
	
	public function setPatients()
		{
			$this->load->helper('url'); 
		
			$seoUri = url_title($this->input->post('patientEmail'), 'dash', TRUE);
			$seoUri1 = $seoUri.'_'.rand(10,100);
			$createdDate=date('Y-m-d H:i:s');
			$password=$this->encryption->encrypt($this->input->post('password'));
			$status =1;
			$data = array(
				'firstName' => $this->input->post('firstName'),
				'lastName'    => $this->input->post('lastName'),
				'patientMobile'      => $this->input->post('patientMobile'),
				'birthDate'      => $this->input->post('birthDate'),
				'gender'      => $this->input->post('gender'),
				'customGender'      => trim($this->input->post('customGender')),
				'patientEmail'      => $this->input->post('patientEmail'),
				'patientAddress'      => $this->input->post('patientAddress'),
				'isVerified'      => $this->input->post('isVerified'),
				'patientPassword'      => $password,
				'createdDate'      => $createdDate,
				'status' => $status,
				'seoUri' => $seoUri1
				
				
			);
		
				$this->db->insert('axpatient', $data);
				$q=$this->patientId = $this->db->insert_id();
		$patientId = $this->patientId ;
			$uniqueId=AXUNIQUEIDPATIENT.$patientId;
			$data = array(
					'uniqueId' => $uniqueId
				);
				$this->db->set($data); 
				$this->db->where("patientId",$patientId); 
				$this->db->update("axpatient",$data);
			
			$patientId = $this->patientId ;
			
			if($_FILES["profileImgUrl"]['name'] <> ''){
				$patientId = $this->patients_model->uploadImage($this->patientId);	
			}
				return $patientId;
		}
		
		
		
		
			
			
			
		public function uploadImage($patientId){ 

			 $config['upload_path']   = AXUPLOADPATIENTSPATH; 
			 $config['allowed_types'] = 'jpg|png|jpeg';
			 //$config['max_size']      = 100; 
			 $config['overwrite'] 	  = TRUE;
			 $config['max_width']     = 1300; 
			 $config['max_height']    = 800;  
			 
			 $filename 		= $_FILES["profileImgUrl"]['name'];
			 $type    		= substr(strrchr(trim($filename), "."),1);
			 $profileImgUrl	= $patientId.".".$type;
			 $config['file_name'] = $profileImgUrl;
			 $this->load->library('upload', $config);
			 $this->upload->initialize($config);
			
			 if ( ! $this->upload->do_upload('profileImgUrl')) {
				$error = array('error' => $this->upload->display_errors()); 
				$this->session->set_flashdata('error', $error['error']);
				return 0;
			 } else { 
				$data1 = array('upload_data' => $this->upload->data()); 
				
				$data = array(
					'profileImgUrl' => $profileImgUrl
				);
				$this->db->set($data); 
				$this->db->where("patientId",$patientId); 
				$this->db->update("axpatient",$data);
				
				
				return $patientId;
				
			 } 
      }
			
			
		public function validateImage()
		{
		if($_FILES["profileImgUrl"]['name'] <> ''){
			
			$config['upload_path']   = AXUPLOADPATIENTSPATH; 
			$config['allowed_types'] = 'jpg|png|jpeg'; 
			//$config['max_size']      = 100; 
			$config['overwrite'] 	  = TRUE;
			$config['max_width']     = 1300; 
			$config['max_height']    = 800;  
			$this->load->library('upload', $config);
			$this->upload->initialize($config);	
			if ( ! $this->upload->do_upload('profileImgUrl')) {
				$error = array('error' => $this->upload->display_errors()); 
				$this->session->set_flashdata('error', $error['error']);
				return 0;
			 }else{
				unlink(AXUPLOADPATIENTSPATH.$_FILES["profileImgUrl"]['name']);
				return 1;	 
			 }
		}else{
				return 1;	 
			 }			  
	}
		
		
		
		
		public function getPatient_id($patientId = FALSE)
		{
			
			if ($patientId === FALSE)
			{
					return 0;
			}
			$query = $this->db->get_where('axpatient', array('patientId' => $patientId));
			return $query->row_array();
			
			
		}
		
		
		
		
	public function get_patient_seoUri($seoUri = FALSE)
		{
			if ($seoUri === FALSE)
			{
					return 0;
			}
			$result_array = $this->db->get_where('axpatient', array('seoUri' => $seoUri));
			return $result_array->row_array();
		}
		
		
		public function updatePatient($patientId) { 
			$this->load->helper('url');
			$seoUri = url_title($this->input->post('patientEmail'), 'dash', TRUE);
			$modifiedDate=date('Y-m-d H:i:s');
			$password=$this->encryption->encrypt($this->input->post('password'));
			$status=1;
			$data = array(
				'firstName' => $this->input->post('firstName'),
				'lastName' => $this->input->post('lastName'),
				'patientEmail'    => $this->input->post('patientEmail'),
				'patientPassword'      => $password,
				'patientAddress'    => $this->input->post('patientAddress'),
				'patientMobile'      => $this->input->post('patientMobile'),
				'birthDate'      => $this->input->post('birthDate'),
				'gender'      => $this->input->post('gender'),
				'customGender'      => $this->input->post('customGender'),
				'isVerified'      => $this->input->post('isVerified'),
				'modifiedDate'      => $modifiedDate,
				'status' => $status,
				'seoUri' => $seoUri
			);
			$this->db->set($data); 
			$this->db->where("patientId", $patientId); 
			$this->db->update("axpatient", $data); 
			
			$this->patientId = $patientId;
			
			if($_FILES["profileImgUrl"]['name'] <> ''){
				$patientId = $this->uploadImage($patientId);	
			}
			
			 
			
			return $patientId;
			
			
			
		} 
		




     public function activate_patient($patientIds) { 
		
			$this->db->where_in("patientId", $patientIds); 
			$status = 1;
			$data = array(
				'status' => $status
			);
			$this->db->update("axpatient", $data);  
		} 
		
		public function deactivate_patient($patientIds) { 

			$this->db->where_in("patientId", $patientIds); 
			$status = 0;
			$data = array(
				'status' => $status
			);
			$this->db->update("axpatient", $data);  
		} 
		
			
		


	
	public function getPatient($limit = NULL, $start = NULL)
		{	
			$this->db->limit($limit, $start);
			
			$this->db->select('*');
			
			$this->db->from('axpatient');
			
			if($this->patientId != "")
				$this->db->where('patientId', $this->patientId);
			
			if(trim($this->firstName )!= "")
				$this->db->like('firstName', $this->firstName);
				if(trim($this->lastName )!= "")
				$this->db->like('lastName', $this->lastName);
				
				if(trim($this->patientEmail )!= "")
				$this->db->like('patientEmail', $this->patientEmail);
				
			if(trim($this->patientAddress )!= "")
				$this->db->like('patientAddress', $this->patientAddress);
				
			if($this->status != "")
				$this->db->where('status', $this->status);
				
			if(trim($this->patientMobile) != "")
				$this->db->like('patientMobile', $this->patientMobile);
				
				if(trim($this->gender) != "")
				$this->db->like('gender', $this->gender);
				
				if(trim($this->seoUri) != "")
				$this->db->like('seoUri', $this->seoUri);
				
			
				
			if(trim($this->patientIds) != ""){
				$patientIds = explode(",",$patientIds);
				$this->db->where_in('patientId', $patientIds);	
			}
			
			if($this->sortColumn == '')
				$this->sortColumn = "patientId";
			
			if($this->sortDirection == '')
				$this->sortDirection = "DESC";	
						
			$this->db->order_by("$this->sortColumn", "$this->sortDirection");
			
			$query = $this->db->get();
			// echo $this->db->last_query(); exit; 
			return $query->result_array();

		}
		
		
		
		public function delete_patient($patientIds) { 
		
		$imageId=explode(',',$patientIds);
		$this->db->select('profileImgUrl');
		$this->db->from('axpatient');
		$this->db->where_in('patientId',$imageId);
		$query=$this->db->get();
		$result=$query->result_array();
		
		if(count($result))
		{
			foreach($result as $res)
			{
				unlink(FCPATH.AXUPLOADPATIENTSPATH.$res['profileImgUrl']);
				}
			}
		
		
		
			 if ($this->db->delete("axpatient", "patientId IN ( ".$patientIds.")")) {
				 
				
				return true; 
			 } 
		} 
		public function setPageNumber($pageNumber){
            $this->_pageNumber = $pageNumber;
        }
 
        public function setOffset($offset){
            $this->_offset = $offset;
        }
	


public function get_count() {
			
			if($this->patientId != "")
				$this->db->where('patientId', $this->patientId);
			
				if(trim($this->firstName) != "")
				$this->db->like('firstName', $this->firstName);
				if(trim($this->lastName) != "")
				$this->db->like('lastName', $this->lastName);
				
				if(trim($this->patientEmail) != "")
				$this->db->like('patientEmail', $this->patientEmail);
				if(trim($this->patientAddress) != "")
				$this->db->like('patientAddress', $this->patientAddress);
				
				if($this->patientMobile != "")
				$this->db->where('patientMobile', $this->patientMobile);
				
				if($this->birthDate != "")
				$this->db->where('birthDate', $this->birthDate);
				
				if($this->gender != "")
				$this->db->where('gender', $this->gender);
				
				
			if(trim($this->status) != "")
				$this->db->where('status', $this->status);
				
				
			if(trim($this->patientIds) != ""){ //echo  $this->customerIds; exit;
				$patientIds = explode(",",$patientIds);
				$this->db->where_in('patientId', $patientIds);	
			}
			$this->db->from("axpatient");
			return $this->db->count_all_results();
		}
		
		
		
		
		public function retrievePatient($seoUri = FALSE)
		{
			if ($seoUri === FALSE)
			{
					return 0;
			}
			$this->db->select('*');
			$this->db->from('axpatient');
			$this->db->like('seoUri',$seoUri);
			$result_array = $this->db->get()->result_array();	
			$this->patientId				    = $result_array[0]["patientId"];
			$this->uniqueId				    = $result_array[0]["uniqueId"];
			$this->firstName				= $result_array[0]["firstName"];
			$this->lastName				= $result_array[0]["lastName"];
			$this->patientEmail				    = $result_array[0]["patientEmail"];
			$this->patientMobile		            = $result_array[0]["patientMobile"];
			$this->patientAddress		            = $result_array[0]["patientAddress"];
			$this->birthDate		            = $result_array[0]["birthDate"];
			$this->profileImgUrl					= $result_array[0]["profileImgUrl"];
			$this->gender					= $result_array[0]["gender"];
			$this->createdDate					= $result_array[0]["createdDate"];
			$this->patientPassword					= $result_array[0]["patientPassword"];
			$this->status					= $result_array[0]["status"];
			$this->seoUri					= $result_array[0]["seoUri"];
			return 1;
		}
}
?>