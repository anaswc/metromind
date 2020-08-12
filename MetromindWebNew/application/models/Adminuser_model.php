<?php

class  Adminuser_model extends CI_Model {
	
	public function __construct(){
		
		$this->adminId       ="";
		$this->adminName    ="";
		$this->userName    ="";
		$this->password         ="";
		$this->adminEmail       ="";
		$this->adminPhone       ="";
		$this->status          	 ="";
		
		$this->adminType         	 ="";
		$this->adminIds     ="";
		$this->sortColumn 	  		= '';
		$this->sortDirection  	= '';
		$this->load->database();
		$this->load->library('upload');
		$this->setPostGetVars();
		
	}
	public function setPostGetVars(){	

$this->adminId						    = $this->input->post_get('adminId');
$this->adminName						= trim($this->input->post_get('adminName'));
$this->userName						= trim($this->input->post_get('userName'));
$this->password                          = trim($this->input->post_get('password'));
$this->adminEmail                           = trim($this->input->post_get('adminEmail'));
$this->adminPhone						= $this->input->post_get('adminPhone');
$this->adminType						= trim($this->input->post_get('adminType'));
$this->adminIds     =$this->input->post_get('adminIds');
$this->sortColumn				= $this->input->post_get('sortColumn');

		$this->sortDirection			= $this->input->post_get('sortDirection');					
		
	}
	
	
	
	
	public function setAdmin()
		{
			$this->load->helper('url'); 
		
			//$seoUri = url_title($this->input->post('adminName'), 'dash', TRUE);
			$createdDate=date('Y-m-d H:i:s');
			$status =1;
			$data = array(
				'adminName' => $this->input->post('adminName'),
				'userName'    => $this->input->post('userName'),
				'password'      =>$this->encryption->encrypt($this->input->post('password')),
				'adminEmail'      =>$this->input->post('adminEmail'),
				'adminPhone' => $this->input->post('adminPhone'),
				'adminType' => $this->input->post('adminType'),
				'status' => $status
			);
			
			$this->db->insert('axadmin', $data);
			$this->adminId  = $this->db->insert_id();
			
			$adminId = $this->adminId ;
			return $adminId;
		}
		
		public function getAdmin_id($adminId = FALSE)
		{
			if ($adminId === FALSE)
			{
					return 0;
			}
			$query = $this->db->get_where('axadmin', array('adminId' => $adminId));
			return $query->row_array();
			
			
		}
	public function get_Admin_seoUri($seoUri = FALSE)
		{
			if ($seoUri === FALSE)
			{
					return 0;
			}
			$result_array = $this->db->get_where('axadmin', array('seoUri' => $seoUri));
			return $result_array->row_array();
		}
		public function updateAdmin($adminId) { 
			$this->load->helper('url');
			
			$status=1;
			
	
			$data = array(
				'adminName' => $this->input->post('adminName'),
				'userName'    => $this->input->post('userName'),
				'password'      =>$this->encryption->encrypt($this->input->post('password')),
				'adminEmail'      =>$this->input->post('adminEmail'),
				'adminPhone' => $this->input->post('adminPhone'),
				'adminType' => $this->input->post('adminType'),
				'status' => $status
			);
			$this->db->set($data); 
			$this->db->where("adminId", $adminId); 
			$this->db->update("axadmin", $data); 
			
			$this->adminId = $adminId;
			
			
			return $adminId;
		} 


     public function activate_Admin($adminIds) { 
		
			$this->db->where_in("adminId", $adminIds); 
			$status = 1;
			$data = array(
				'status' => $status
			);
			$this->db->update("axadmin", $data);  
		} 
		
		public function deactivate_Admin($adminIds) { 

			$this->db->where_in("adminId", $adminIds); 
			$status = 0;
			$data = array(
				'status' => $status
			);
			//print_r($data);exit;
			$this->db->update("axadmin", $data);  
			//echo $this->db->last_query();exit;
		} 
		
			
		
		


	
	public function getAdmin($limit = NULL, $start = NULL)
		{	
			$this->db->limit($limit, $start);
			
			$this->db->select('*');
			
			$this->db->from('axadmin');
			
			if($this->adminId != "")
				$this->db->where('adminId', $this->adminId);
			
			if(trim($this->adminName)!= "")
				$this->db->like('adminName ', $this->adminName);
			if(trim($this->adminType)!= "")
				$this->db->where('adminType ', $this->adminType );
				
			if($this->status != "")
				$this->db->where('status', $this->status);
				
			
				
			/* if($this->adminIds != ""){
				$adminIds = explode(",",$adminIds);
				$this->db->where_in('adminId', $adminIds);	
			} */
			
			if($this->sortColumn == '')
				$this->sortColumn = "adminId";
			
			if($this->sortDirection == '')
				$this->sortDirection = "DESC";	
						
			$this->db->order_by("$this->sortColumn", "$this->sortDirection");
			
			$query = $this->db->get();
			// echo $this->db->last_query(); exit; 
			return $query->result_array();

		}
		
		
		
		public function delete_Admin($adminIds) { 
		
		
		
		
			 if ($this->db->delete("axadmin", "adminId IN ( ".$adminIds.")")) { 
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
			
			if($this->adminId != "")
				$this->db->where('adminId', $this->adminId);
			
				if(trim($this->adminName) != "")
				$this->db->like('adminName', $this->adminName);
				
				if(trim($this->description) != "")
				$this->db->like('description', $this->description);
				if(trim($this->allotedTime) != "")
				$this->db->like('allotedTime', $this->allotedTime);
				
				
				
			
				
			if(trim($this->status) != "")
				$this->db->where('status', $this->status);
				
				
				
			if(trim($this->adminIds) != ""){ //echo  $this->domainIds; exit;
				$adminIds = explode(",",$adminIds);
				$this->db->where_in('adminId', $adminIds);	
			}
			$this->db->from("axadmin");
			return $this->db->count_all_results();
		}
		
		
		
		 public function validateAdmin()
		{
			$this->db->select('*');

			$this->db->from('axadmin');

			if($this->adminId != "")
			$this->db->where('adminId  != ',$this->adminId);	

			if(trim($this->userName) != "")
				$this->db->where('userName', $this->userName);
			$query 	= $this->db->get();

			//echo $this->db->last_query();exit;

			if($query->num_rows() > 0)
			{
				
				return 0;
			}

			
			return 1;
		}
		
		public function retrieveAdmin($seoUri = FALSE)
		{
			if ($seoUri === FALSE)
			{
					return 0;
			}
			$this->db->select('*');
			$this->db->from('axadmin');
			$this->db->like('seoUri',$seoUri);
			$result_array = $this->db->get()->result_array();	
			$this->adminId				    = $result_array[0]["adminId"];
			$this->adminName				= $result_array[0]["adminName"];
			$this->AdminImageUrl				    = $result_array[0]["AdminImageUrl"];
			$this->description		            = $result_array[0]["description"];
			$this->allotedTime		            = $result_array[0]["allotedTime"];
			$this->status					= $result_array[0]["status"];
			$this->createdDate	            = $result_array[0]["createdDate"];
			$this->seoUri				    = $result_array[0]["seoUri"];
			
			return 1;
		}
}
?>