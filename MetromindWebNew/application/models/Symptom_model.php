<?php

class  Symptom_model extends CI_Model {
	
	public function __construct(){
		
		$this->symptomId      ="";
		$this->symptomName    ="";
		$this->symptomImage    ="";
		$this->description         ="";
		$this->status          	 ="";
		
		$this->seoUri         	 ="";
		$this->specialityIds     ="";
		$this->specialityId     ="";
		$specialityId1     ="";
		$this->symptomIds     ="";
		$this->sortColumn 	  		= '';
		$this->sortDirection  	= '';
		$this->colorCode  	= '';
		$this->opacity  	= '';
		$this->load->database();
		$this->load->library('upload');
		$this->setPostGetVars();
		
	}
	public function setPostGetVars(){	

			$this->symptomId						    = $this->input->post_get('symptomId');
			$this->symptomName						= trim($this->input->post_get('symptomName'));
			$this->description                          = trim($this->input->post_get('description'));
			$this->status                           = trim($this->input->post_get('status'));
			$this->symptomIds						= $this->input->post_get('symptomIds');
			$this->specialityIds						= $this->input->post_get('specialityIds');
			$this->seoUri 				= $this->input->post_get('seoUri');		
			$this->colorCode 			= $this->input->post_get('colorCode');	
			
		$this->opacity 					= $this->input->post_get('opacity');					
					
		$this->sortColumn				= $this->input->post_get('sortColumn');

		$this->sortDirection			= $this->input->post_get('sortDirection');					
	}
	
	
	
	
	public function setSymptom()
		{$specialityId1     ="";
		$specialityIds						= $this->input->post('specialityIds');
			
			$this->load->helper('url'); 
		
			//$seoUri = url_title($this->input->post('symptomName'), 'dash', TRUE);
			if($this->input->post('status') == '')
				$status = 0;
			else
				$status = 1;	
			$specialityId1     =$specialityIds[0];
			for($i=1;$i<count($this->input->post('specialityIds'));$i++) {
							
				$specialityId1.=','.$specialityIds[$i];
			}
						
			$data = array(
				'symptomName' => $this->input->post('symptomName'),
				'specialityId'    => $specialityId1,
				'description'    => $this->input->post('description'),
				'colorCode' =>  $this->input->post('colorCode'),
				'opacity' =>  $this->input->post('opacity'),
				'status' => $status
			);
			
			$this->db->insert('axsymptoms', $data);
			$this->symptomId  = $this->db->insert_id();
			
			$symptomId = $this->symptomId ;
			
			if($_FILES["symptomImage"]['name'] <> ''){
				$symptomId = $this->symptom_model->uploadImage($this->symptomId);	
			}
				return $symptomId;
		}
		
		public function getsymptom_id($symptomId = FALSE)
		{
			if ($symptomId === FALSE)
			{
					return 0;
			}
			$query = $this->db->get_where('axsymptoms', array('symptomId' => $symptomId));
			return $query->row_array();
		}
	public function get_symptom_seoUri($seoUri = FALSE)
		{
			if ($seoUri === FALSE)
			{
					return 0;
			}
			$result_array = $this->db->get_where('axsymptoms', array('seoUri' => $seoUri));
			return $result_array->row_array();
		}
		public function updateSymptom($symptomId) { 
			$this->load->helper('url');
			$seoUri1 = url_title($this->input->post('seoUri'), 'dash', TRUE);
			if($this->input->post('status') == '')
				$status = 0;
			else
				$status = 1;	
			/*if($this->checkIfSeoUriExistsNew($seoUri1,$symptomId)){ //If another participants exists on the same seo uri

				$seoUri1 = $seoUri1."-".trim($symptomId);
	
			}*/
			$specialityIds =  implode(',',$this->input->post_get('specialityIds'));
	/*	$specialityId1     =$specialityIds[0];
						for($i=1;$i<count($this->input->post('specialityIds'));$i++) {
							
$specialityId1.=','.$specialityIds[$i];
						}*/
			$data = array(
				'symptomName' => $this->input->post('symptomName'),
				'specialityId' => $specialityIds,
				'description'    => $this->input->post('description'),
				'colorCode' =>  $this->input->post('colorCode'),
				'opacity' =>  $this->input->post('opacity'),
				'status' => $status
			);
			$this->db->set($data); 
			$this->db->where("symptomId", $symptomId); 
			$this->db->update("axsymptoms", $data); 
			$this->symptomId = $symptomId;
			
			if($_FILES["symptomImage"]['name'] <> ''){
				$symptomId = $this->uploadImage($symptomId);	
			}
			return $symptomId;
		} 
		
		public function checkIfSeoUriExistsNew($seoUri1,$symptomId){



		if(trim($seoUri1) == "") return 0;



		if(trim($symptomId) == "") return 0;



		$this->db->select('symptomId');



		$this->db->from('axsymptoms');



		$this->db->like('seoUri',$seoUri1);



		if(trim($symptomId) != ""){



			$this->db->where('symptomId != ',$symptomId);



		}



		$result_array = $this->db->get();



		if($result_array->num_rows()>0){



			return 1;



		}



	}
     public function activate_symptom($symptomIds) { 
		
			$this->db->where_in("symptomId", $symptomIds); 
			$status = 1;
			$data = array(
				'status' => $status
			);
			$this->db->update("axsymptoms", $data);  
		} 
		
		public function deactivate_symptom($symptomIds) { 

			$this->db->where_in("symptomId", $symptomIds); 
			$status = 0;
			$data = array(
				'status' => $status
			);
			$this->db->update("axsymptoms", $data);  
		} 
		
			
		
		


	
	public function getSymptom($limit = NULL, $start = NULL)
		{	
			$this->db->limit($limit, $start);
			
			$this->db->select('*');
			
			$this->db->from('axsymptoms');
			
			if($this->symptomId != "")
				$this->db->where_in('symptomId', $this->symptomId);

			if($this->specialityId != "")
				$this->db->where('specialityId', $this->specialityId);
			
			if(trim($this->symptomName  )!= "")
				$this->db->like('symptomName ', $this->symptomName );
				
			if($this->status != "")
				$this->db->where('status', $this->status);
				
			if(trim($this->description) != "")
				$this->db->like('description', $this->description);
				
				
			if($this->symptomIds != ""){
				//$symptomIds = explode(",",$this->symptomIds);
				$this->db->where_in('symptomId', $this->symptomIds);	
			}
			
			if($this->sortColumn == '')
				$this->sortColumn = "symptomId";
			
			if($this->sortDirection == '')
				$this->sortDirection = "DESC";	
						
			$this->db->order_by("$this->sortColumn", "$this->sortDirection");
			
			$query = $this->db->get();
			// echo $this->db->last_query(); exit; 
			return $query->result_array();

		}
		public function getSymptoms($symptomId)
	{	
		$this->db->select('*');

		$this->db->from('axsymptoms');
		
		$this->db->where('symptomId',$symptomId);

		$this->db->order_by('symptomName','ASC');

		$query = $this->db->get();

		return $query->result_array();
	}
		
		
		public function delete_symptom($symptomIds) { 
		
		$imageId=explode(',',$symptomIds);
		$this->db->select('symptomImage');
		$this->db->from('axsymptoms');
		$this->db->where_in('symptomId',$imageId);
		$query=$this->db->get();
		$result=$query->result_array();
		
		if(count($result))
		{
			foreach($result as $res)
			{
				unlink(FCPATH.AXSYMPTOMSUPLOADPATH.$res['symptomImage']);
				}
			}
		
		
			 if ($this->db->delete("axsymptoms", "symptomId IN ( ".$symptomIds.")")) { 
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
			
			if($this->symptomId != "")
				$this->db->where('symptomId', $this->symptomId);
			
				if(trim($this->symptomName) != "")
				$this->db->like('symptomName', $this->symptomName);
				
				if(trim($this->description) != "")
				$this->db->like('description', $this->description);
				
				
				
			
				
			if(trim($this->status) != "")
				$this->db->where('status', $this->status);
				
				
				
			if(trim($this->symptomIds) != ""){ //echo  $this->domainIds; exit;
				$symptomIds = explode(",",$symptomIds);
				$this->db->where_in('symptomId', $symptomIds);	
			}
			$this->db->from("axsymptoms");
			return $this->db->count_all_results();
		}
		
		

		
			public function uploadImage($symptomId){ 

			 $config['upload_path']   = AXSYMPTOMSUPLOADPATH; 
			 $config['allowed_types'] = 'jpg|png|jpeg';
			 //$config['max_size']      = 100; 
			 $config['overwrite'] 	  = TRUE;
			 $config['min_width']     = '573';         // restrict width to 1024px
			 $config['min_height']    = '335';          // restrict height to 768px
			 $config['max_width']     = '573';         // restrict width to 1024px
			 $config['max_height']    = '335';          // restrict height to 768px
			 
			$symptomName=$this->input->post_get('symptomName');
			 
			 $filename 		= $_FILES["symptomImage"]['name'];
			 $type    		= substr(strrchr(trim($filename), "."),1);
			 $symptomImage	= time().$symptomId.".".$type;
			 $config['file_name'] = $symptomImage;
			 $this->load->library('upload', $config);
			 $this->upload->initialize($config);
			
			 if ( ! $this->upload->do_upload('symptomImage')) {
				$error = array('error' => $this->upload->display_errors()); 
				$this->session->set_flashdata('error', $error['error']);
				return 0;
			 } else { 
				$data1 = array('upload_data' => $this->upload->data()); 
				
				$data = array(
					'symptomImage' => $symptomImage
				);
				$this->db->set($data); 
				$this->db->where("symptomId",$symptomId); 
				$this->db->update("axsymptoms",$data);
				
				return $symptomId;
				
			 } 
      }
		
		public function validateSymptom(){

			$this->db->select('*');

			$this->db->from('axsymptoms');

			if($this->symptomId!= "")
			$this->db->where('symptomId   != ',$this->symptomId);	

			if(trim($this->symptomName) != "")
				$this->db->where('symptomName', $this->symptomName);

			$query 	= $this->db->get();

			if($query->num_rows() > 0)
			{
				$this->session->set_flashdata('error', 'Symptom already exist');
				return 0;
			}

			/*$this->db->select('*');

			$this->db->from('axsymptoms');
			
			if($this->symptomId != "")
			$this->db->where('symptomId  != ',$this->symptomId);	


			if(trim($this->seoUri) != "")
				$this->db->where('seoUri', $this->seoUri);

			
			$query 	= $this->db->get();

			if($query->num_rows() > 0)
			{
				$this->session->set_flashdata('error', 'SeoUri already exist');
				return 0;
			}*/
			
			
			if($_FILES["symptomImage"]['name'] <> ''){
				if(!$this->symptom_model->validateImage()) return 0;	
			}
			
			return 1;

		}
		
		public function retrieveSymptom($seoUri = FALSE)
		{
			if ($seoUri === FALSE)
			{
					return 0;
			}
			$this->db->select('*');
			$this->db->from('axsymptoms');
			$this->db->like('seoUri',$seoUri);
			$result_array = $this->db->get()->result_array();	
			$this->symptomId				    = $result_array[0]["symptomId"];
			$this->symptomName				= $result_array[0]["symptomName"];
			$this->symptomImage				    = $result_array[0]["symptomImage"];
			$this->description		            = $result_array[0]["description"];
			$this->status					= $result_array[0]["status"];
			$this->seoUri				    = $result_array[0]["seoUri"];
			
			return 1;
		}
		
	public function validateImage(){ 

		 $config['upload_path']   = AXSYMPTOMSUPLOADPATH; 
		 $config['allowed_types'] = 'jpg|png|jpeg';
		 //$config['max_size']      = 100; 
		 $config['overwrite'] 	  = TRUE;
		 $config['min_width']     = '573';         // restrict width to 1024px
		 $config['min_height']    = '335';          // restrict height to 768px
		 $config['max_width']     = '573';         // restrict width to 1024px
		 $config['max_height']    = '335';          // restrict height to 768px
		 
		 $symptomName=$this->input->post_get('symptomName');
		 
		 $filename 		= $_FILES["symptomImage"]['name'];
		 $type    		= substr(strrchr(trim($filename), "."),1);
		 $symptomImage	=$symptomName.".".$type;
		 $config['file_name'] = $symptomImage;
		 $this->load->library('upload', $config);
		 $this->upload->initialize($config);
		
		 if ( ! $this->upload->do_upload('symptomImage')) {
			$error = array('error' => $this->upload->display_errors()); 
			$this->session->set_flashdata('error', $error['error']);
			return 0;
		 }else{
			return 1;	 
		}
      }
}
?>