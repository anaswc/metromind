<?php

class  Package_model extends CI_Model {
	
	public function __construct(){
		
		$this->doctorId      ="";
		$this->packageId     ="";
		$this->packageName    ="";
		$this->doctorName    ="";

		$this->packageDuration         ="";
		$this->packageDescription       ="";
		$this->noOfSession       ="";
		$this->packagePrize          	 ="";
		
		$this->seoUri         	 ="";
		$this->packageIds     ="";
		$this->sortColumn 	  		= '';
		$this->sortDirection  	= '';
		$this->load->database();
		$this->load->library('upload');
		$this->setPostGetVars();
		
	}
	public function setPostGetVars(){	

$this->packageId						    = $this->input->post_get('packageId');//echo $this->packageId;exit;
$this->packageName						= trim($this->input->post_get('packageName'));
$this->doctorName						= trim($this->input->post_get('doctorName'));
$this->packageDuration						= trim($this->input->post_get('packageDuration'));
$this->packageDescription                          = trim($this->input->post_get('packageDescription'));
$this->status                           = trim($this->input->post_get('status'));
$this->noOfSession						= $this->input->post_get('noOfSession');
$this->packagePrize						= trim($this->input->post_get('packagePrize'));
$this->doctorId						= trim($this->input->post_get('doctorId'));
$this->packageIds						    = $this->input->post_get('packageIds');
$this->packagePrize						= trim($this->input->post_get('packagePrize'));

$this->sortColumn				= $this->input->post_get('sortColumn');

$this->sortDirection			= $this->input->post_get('sortDirection');					
		
	}
	
	
	
	
	public function setPackage()
		{
			$this->load->helper('url'); 
		
			//$seoUri = url_title($this->input->post('specialityName'), 'dash', TRUE);
			
			$status =1;
			$data = array(
				'doctorId' => $this->input->post('doctorId'),
				'packageName'    => $this->input->post('packageName'),
				'packageDuration'      =>$this->input->post('packageDuration'),
				'packageDescription'      =>$this->input->post('packageDescription'),
				'noOfSession' => $this->input->post('noOfSession'),
				'packagePrize' => $this->input->post('packagePrize'),
				'status' => $status
			);
			
			$this->db->insert('axpackages', $data);
			$this->packageId   = $this->db->insert_id();
			
			$packageId  = $this->packageId;
			return $packageId ;
		}
		
		public function get_package_id($packageId = FALSE)
		{
			if ($packageId === FALSE)
			{
					return 0;
			}
			$query = $this->db->get_where('axpackages', array('packageId' => $packageId));
			return $query->row_array();
			
			
		}
	public function get_package_seoUri($seoUri = FALSE)
		{
			if ($seoUri === FALSE)
			{
					return 0;
			}
			$result_array = $this->db->get_where('axspeciality', array('seoUri' => $seoUri));
			return $result_array->row_array();
		}


		public function updatePackage($packageId) { 
			$this->load->helper('url');
			
			$status=1;
			
	
			$data = array(
				'doctorId' => $this->input->post('doctorId'),
				'packageName'    => $this->input->post('packageName'),
				'packageDuration'      =>$this->input->post('packageDuration'),
				'packageDescription'      =>$this->input->post('packageDescription'),
				'noOfSession' => $this->input->post('noOfSession'),
				'packagePrize' => $this->input->post('packagePrize'),
				'status' => $status
				
			);
			$this->db->set($data); 
			$this->db->where("packageId", $packageId); 
			$this->db->update("axpackages", $data); 
			$this->packageId = $packageId;
			
			return $packageId;
		} 

public function checkIfSeoUriExistsNew($seoUri1,$packageId){



		if(trim($seoUri1) == "") return 0;



		if(trim($packageId) == "") return 0;



		$this->db->select('packageId');



		$this->db->from('axpackages');



		$this->db->like('seoUri',$seoUri1);



		if(trim($packageId) != ""){



			$this->db->where('packageId != ',$packageId);



		}



		$result_array = $this->db->get();



		if($result_array->num_rows()>0){



			return 1;



		}



	}
     public function activate_package($packageIds) { 
		
			$this->db->where_in("packageId", $packageIds); 
			$status = 1;
			$data = array(
				'status' => $status
			);
			$this->db->update("axpackages", $data);  
		} 
		
		public function deactivate_package($packageIds) { 

			$this->db->where_in("packageId", $packageIds); 
			$status = 0;
			$data = array(
				'status' => $status
			);
			$this->db->update("axpackages", $data);  
		} 
		
			
		
		


	
	public function getPackage($limit = NULL, $start = NULL)
		{	
			$this->db->limit($limit, $start);
			
			$this->db->select('axpackages.*,axdoctors.doctorName');
			
			$this->db->from('axpackages');

			$this->db->join('axdoctors','axpackages.doctorId=axdoctors.doctorId');
			
			if($this->packageId != "")
				$this->db->where('packageId', $this->packageId);
			
			if(trim($this->packageName)!= "")
				$this->db->like('packageName ', $this->packageName);
			if(trim($this->doctorName)!= "")
				$this->db->like('doctorName ', $this->doctorName);
			
			if($this->status != "")
				$this->db->where('status', $this->status);
				
			
			
			if($this->sortColumn == '')
				$this->sortColumn = "packageId";
			
			if($this->sortDirection == '')
				$this->sortDirection = "DESC";	
						
			$this->db->order_by("$this->sortColumn", "$this->sortDirection");
			
			$query = $this->db->get();
			// echo $this->db->last_query(); exit; 
			return $query->result_array();

		}
		
		
		
		public function delete_package($packageIds) { 
		
		if ($this->db->delete("axpackages", "packageId IN ( ".$packageIds.")")) { 
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
			
			if($this->packageId != "")
				$this->db->where('packageId', $this->packageId);
			
				if(trim($this->packageName) != "")
				$this->db->like('packageName', $this->packageName);
				
				if(trim($this->packageDuration) != "")
				$this->db->like('packageDuration', $this->packageDuration);
				
				
			if(trim($this->status) != "")
				$this->db->where('status', $this->status);
				
			if(trim($this->packageIds) != ""){ //echo  $this->domainIds; exit;
				$packageIds = explode(",",$packageIds);
				$this->db->where_in('packageId', $packageIds);	
			}
			$this->db->from("axpackages");
			return $this->db->count_all_results();
		}
		
		
		
			public function uploadImage($packageId){ 

			 $config['upload_path']   = AXUPLOADPATH; 
			 $config['allowed_types'] = 'jpg|png|jpeg|PNG|JPG';
			 //$config['max_size']      = 100; 
			 $config['overwrite'] 	  = TRUE;
			 $config['max_width']     = 1300; 
			 $config['max_height']    = 800;  
			 
			$specialityName=trim($this->input->post_get('specialityName'));
			 
			 $filename 		= $_FILES["specialityImageUrl"]['name'];
			 $type    		= substr(strrchr(trim($filename), "."),1);
			 $specialityImageUrl	=$specialityName.$packageId.".".$type;
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
				$this->db->where("packageId",$packageId); 
				$this->db->update("axpackages",$data);
				
				return $packageId;
				
			 } 
      }
		
		 public function validatePackage($packageId=FALSE)
		{
			$this->db->select('*');

			$this->db->from('axpackages');

			//echo $this->packageId ;exit;

			
			$this->db->where('packageId  != ',$packageId);

			if($this->doctorId != "")
			$this->db->where('doctorId',$this->doctorId);	

			if(trim($this->packageName) != "")
				$this->db->where('packageName', $this->packageName);

				
			$query 	= $this->db->get();

			
			if($query->num_rows() > 0)
			{
				$this->session->set_flashdata('error', 'Package already exist for this doctor');
				return 0;
			}

			
			return 1;
		}
		
		public function retrievePackage($seoUri = FALSE)
		{
			if ($seoUri === FALSE)
			{
					return 0;
			}
			$this->db->select('*');
			$this->db->from('axpackages');
			
			$result_array = $this->db->get()->result_array();	
			$this->packageId				    = $result_array[0]["packageId"];
			$this->packageName				= $result_array[0]["packageName"];
			
			$this->packageDuration		            = $result_array[0]["packageDuration"];
			$this->packageDescription		            = $result_array[0]["packageDescription"];
			$this->noOfSession					= $result_array[0]["noOfSession"];
			$this->noOfSession	            = $result_array[0]["noOfSession"];
			$this->status				    = $result_array[0]["status"];
			
			return 1;
		}
}
?>