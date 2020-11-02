<?php

class  Specialities_model extends CI_Model {
	
	public function __construct(){
		
		$this->specialityId      ="";
		$this->specialityName    ="";
		$this->specialityImageUrl    ="";
		$this->description         ="";
		$this->createdDate       ="";
		$this->allotedTime       ="";
		$this->status          	 ="";
		
		$this->seoUri         	 ="";
		$this->specialityIds     ="";
		$this->sortColumn 	  		= '';
		$this->sortDirection  	= '';
		$this->load->database();
		$this->load->library('upload');
		$this->setPostGetVars();
		
	}
	public function setPostGetVars(){	

$this->specialityId						    = $this->input->post_get('specialityId');
$this->specialityName						= trim($this->input->post_get('specialityName'));
$this->seoUri						= trim($this->input->post_get('seoUri'));
$this->description                          = trim($this->input->post_get('description'));
$this->status                           = trim($this->input->post_get('status'));
$this->specialityIds						= $this->input->post_get('specialityIds');
$this->allotedTime						= trim($this->input->post_get('allotedTime'));
$this->sortColumn				= $this->input->post_get('sortColumn');

		$this->sortDirection			= $this->input->post_get('sortDirection');					
		
	}
	
	
	
	
	public function setSpeciality()
		{
			$this->load->helper('url'); 
		
			//$seoUri = url_title($this->input->post('specialityName'), 'dash', TRUE);
			$createdDate=date('Y-m-d H:i:s');
			$status =1;
			$data = array(
				'specialityName' => $this->input->post('specialityName'),
				'description'    => $this->input->post('description'),
				'createdDate'      =>$createdDate,
				'allotedTime'      =>$this->input->post('allotedTime'),
				'seoUri' => $this->input->post('seoUri'),
				'status' => $status
			);
			
			$this->db->insert('axspeciality', $data);
			$this->specialityId  = $this->db->insert_id();
			
			$specialityId = $this->specialityId ;
			
			if($_FILES["specialityImageUrl"]['name'] <> ''){
				$specialityId = $this->specialities_model->uploadImage($this->specialityId);	
			}
				return $specialityId;
		}
		
		public function getSpeciality_id($specialityId = FALSE)
		{
			if ($specialityId === FALSE)
			{
					return 0;
			}
			$query = $this->db->get_where('axspeciality', array('specialityId' => $specialityId));
			return $query->row_array();
			
			
		}
	public function get_speciality_seoUri($seoUri = FALSE)
		{
			if ($seoUri === FALSE)
			{
					return 0;
			}
			$result_array = $this->db->get_where('axspeciality', array('seoUri' => $seoUri));
			return $result_array->row_array();
		}
		public function updateSpeciality($specialityId) { 
			$this->load->helper('url');
			$seoUri1 = $this->input->post('seoUri');
			$status=1;
			
	
			$data = array(
				'specialityName' => $this->input->post('specialityName'),
				'description'    => $this->input->post('description'),
				'status' => $status,
				'allotedTime' => $this->input->post('allotedTime'),
				'seoUri' => $seoUri1
				
			);
			$this->db->set($data); 
			$this->db->where("specialityId", $specialityId); 
			$this->db->update("axspeciality", $data); 
			$this->specialityId = $specialityId;
			


			
			if($_FILES["specialityImageUrl"]['name'] <> ''){
				$specialityId = $this->uploadImage($specialityId);	
			}
			return $specialityId;
		} 

public function checkIfSeoUriExistsNew($seoUri1,$specialityId){



		if(trim($seoUri1) == "") return 0;



		if(trim($specialityId) == "") return 0;



		$this->db->select('specialityId');



		$this->db->from('axspeciality');



		$this->db->like('seoUri',$seoUri1);



		if(trim($specialityId) != ""){



			$this->db->where('specialityId != ',$specialityId);



		}



		$result_array = $this->db->get();



		if($result_array->num_rows()>0){



			return 1;



		}



	}
     public function activate_speciality($specialityIds) { 
		
			$this->db->where_in("specialityId", $specialityIds); 
			$status = 1;
			$data = array(
				'status' => $status
			);
			$this->db->update("axspeciality", $data);  
		} 
		
		public function deactivate_speciality($specialityIds) { 

			$this->db->where_in("specialityId", $specialityIds); 
			$status = 0;
			$data = array(
				'status' => $status
			);
			$this->db->update("axspeciality", $data);  
		} 
		
			
		
		


	
	public function getSpeciality($limit = NULL, $start = NULL)
		{	
			$this->db->limit($limit, $start);
			
			$this->db->select('*');
			
			$this->db->from('axspeciality');
			
			if($this->specialityId != "")
				$this->db->where('specialityId', $this->specialityId);
			
			if(trim($this->specialityName)!= "")
				$this->db->like('specialityName ', $this->specialityName);
			if(trim($this->allotedTime)!= "")
				$this->db->like('allotedTime ', $this->allotedTime );
				
			if($this->status != "")
				$this->db->where('status', $this->status);
				
			if(trim($this->description) != "")
				$this->db->like('description', $this->description);
				
				
			/* if($this->specialityIds != ""){
				$specialityIds = explode(",",$specialityIds);
				$this->db->where_in('specialityId', $specialityIds);	
			} */
			
			if($this->sortColumn == '')
				$this->sortColumn = "specialityId";
			
			if($this->sortDirection == '')
				$this->sortDirection = "ASC";	
						
			$this->db->order_by("$this->sortColumn", "$this->sortDirection");
			
			$query = $this->db->get();
			// echo $this->db->last_query(); exit; 
			return $query->result_array();

		}
		
		
		
		public function delete_speciality($specialityIds) { 
		
		$imageId=explode(',',$specialityIds);
		$this->db->select('specialityImageUrl');
		$this->db->from('axspeciality');
		$this->db->where_in('specialityId',$imageId);
		$query=$this->db->get();
		$result=$query->result_array();
		
		if(count($result))
		{
			foreach($result as $res)
			{
				unlink(FCPATH.AXUPLOADPATH.$res['specialityImageUrl']);
				}
			}
		
		
			 if ($this->db->delete("axspeciality", "specialityId IN ( ".$specialityIds.")")) { 
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
			
			if($this->specialityId != "")
				$this->db->where('specialityId', $this->specialityId);
			
				if(trim($this->specialityName) != "")
				$this->db->like('specialityName', $this->specialityName);
				
				if(trim($this->description) != "")
				$this->db->like('description', $this->description);
				if(trim($this->allotedTime) != "")
				$this->db->like('allotedTime', $this->allotedTime);
				
				
				
			
				
			if(trim($this->status) != "")
				$this->db->where('status', $this->status);
				
				
				
			if(trim($this->specialityIds) != ""){ //echo  $this->domainIds; exit;
				$specialityIds = explode(",",$specialityIds);
				$this->db->where_in('specialityId', $specialityIds);	
			}
			$this->db->from("axspeciality");
			return $this->db->count_all_results();
		}
		
		
		
			public function uploadImage($specialityId){ 

			 $config['upload_path']   = AXUPLOADPATH; 
			 $config['allowed_types'] = 'jpg|png|jpeg|PNG|JPG';
			 //$config['max_size']      = 100; 
			 $config['overwrite'] 	  = TRUE;
			
			 
				 $config['min_width']      = '2133';         // restrict width to 1024px
				$config['min_height']      = '2133';          // restrict height to 768px
				$config['max_width']       = '2133';         // restrict width to 1024px
				$config['max_height']      = '2133';          // restrict height to 768px

			 
			$specialityName=trim($this->input->post_get('specialityName'));
			 
			 $filename 		= $_FILES["specialityImageUrl"]['name'];
			 $type    		= substr(strrchr(trim($filename), "."),1);
			 $specialityImageUrl	=$specialityName.$specialityId.".".$type;
			 $config['file_name'] = $specialityImageUrl;
			 $this->load->library('upload', $config);
			 $this->upload->initialize($config);
			
			 if ( ! $this->upload->do_upload('specialityImageUrl')) {
				$error = array('error' => $this->upload->display_errors()); 
				$this->session->set_flashdata('error', $error['error']);
				return 0;
			 } else { 
				$data1 = array('upload_data' => $this->upload->data()); 
				
				$data = array(
					'specialityImageUrl' => $specialityImageUrl
				);
				$this->db->set($data); 
				$this->db->where("specialityId",$specialityId); 
				$this->db->update("axspeciality",$data);
				
				return $specialityId;
				
			 } 
      }
		
		 public function validateSpeciality()
		{
			$this->db->select('*');

			$this->db->from('axspeciality');

			if($this->specialityId != "")
			$this->db->where('specialityId  != ',$this->specialityId);	

			if(trim($this->specialityName) != "")
				$this->db->where('specialityName', $this->specialityName);

				

			$query 	= $this->db->get();

			//echo $this->db->last_query();exit;

			if($query->num_rows() > 0)
			{
				$this->session->set_flashdata('error', 'Speciality already exist');
				return 0;
			}

			$this->db->select('*');

			$this->db->from('axspeciality');
			
			if($this->specialityId != "")
			$this->db->where('specialityId  != ',$this->specialityId);	


			if(trim($this->seoUri) != "")
				$this->db->where('seoUri', $this->seoUri);

			
			$query 	= $this->db->get();

			if($query->num_rows() > 0)
			{
				$this->session->set_flashdata('error', 'SeoUri already exist');
				return 0;
			}
			return 1;
		}
		
		public function retrieveSpeciality($seoUri = FALSE)
		{
			if ($seoUri === FALSE)
			{
					return 0;
			}
			$this->db->select('*');
			$this->db->from('axspeciality');
			$this->db->like('seoUri',$seoUri);
			$result_array = $this->db->get()->result_array();	
			$this->specialityId				    = $result_array[0]["specialityId"];
			$this->specialityName				= $result_array[0]["specialityName"];
			$this->specialityImageUrl				    = $result_array[0]["specialityImageUrl"];
			$this->description		            = $result_array[0]["description"];
			$this->allotedTime		            = $result_array[0]["allotedTime"];
			$this->status					= $result_array[0]["status"];
			$this->createdDate	            = $result_array[0]["createdDate"];
			$this->seoUri				    = $result_array[0]["seoUri"];
			
			return 1;
		}
}
?>