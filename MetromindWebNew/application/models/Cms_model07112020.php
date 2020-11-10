<?php

class  Cms_model extends CI_Model {
	
	public function __construct(){
		
		$this->pageId      ="";
		$this->pageIds      ="";
		$this->pageName    ="";
		$this->description    ="";
		$this->shortDescription         ="";
		$this->status          	 ="";
		
		
		$this->sortColumn 	  		= '';
		$this->sortDirection  	= '';
		$this->load->database();
		$this->load->library('upload');
		$this->setPostGetVars();
		
	}
	public function setPostGetVars(){	

			$this->pageId						    = $this->input->post_get('pageId');
			$this->pageIds						    = $this->input->post_get('pageIds');
			$this->pageName						= trim($this->input->post_get('pageName'));
			$this->description                          = trim($this->input->post_get('description'));
			$this->status                           = trim($this->input->post_get('status'));
			$this->shortDescription						= $this->input->post_get('shortDescription');
					
		
	}
	
	
	
	
	public function setCms()
		{
		
			
			$this->load->helper('url'); 
		
			
			$status =1;
			
						
			$data = array(
				'pageName' => $this->input->post('pageName'),
				'description' => $this->input->post('description'),
				'shortDescription' => $this->input->post('shortDescription'),
				'status' => $status
			);
			
			$this->db->insert('axcms', $data);
			$this->pageId  = $this->db->insert_id();
			
			$pageId = $this->pageId ;
			
			
				return $pageId;
		}
		
		public function getcms_id($pageId = FALSE)
		{
			if ($pageId === FALSE)
			{
					return 0;
			}
			$query = $this->db->get_where('axcms', array('pageId' => $pageId));
			return $query->row_array();
		}
	
		public function updateSymptom($pageId) { 
			$this->load->helper('url');
			$status=1;		
			$data = array(
				'pageName' => $this->input->post('pageName'),
				'description'    => $this->input->post('description'),
				'shortDescription'    => $this->input->post('shortDescription'),
				'status' => $status
				
			);
			$this->db->set($data); 
			$this->db->where("pageId", $pageId); 
			$this->db->update("axcms", $data); 
			$this->pageId = $pageId;
			
			
			return $pageId;
		} 

     public function activate_cms($pageIds) { 
		
			$this->db->where_in("pageId", $pageIds); 
			$status = 1;
			$data = array(
				'status' => $status
			);
			$this->db->update("axcms", $data);  
		} 
		
		public function deactivate_cms($pageIds) { 

			$this->db->where_in("pageId", $pageIds); 
			$status = 0;
			$data = array(
				'status' => $status
			);
			$this->db->update("axcms", $data);  
		} 
		
			
	public function delete_cms($pageIds) { 



		 if ($this->db->delete("axcms", "pageId IN ( ".$pageIds.")")) { 



			return true; 



		 } 



	} 
		
		


	
	public function getCms($limit = NULL, $start = NULL)
		{	
			$this->db->limit($limit, $start);
			
			$this->db->select('*');
			
			$this->db->from('axcms');
			
			if($this->pageId != "")
				$this->db->where('pageId', $this->pageId);
			
			if(trim($this->pageName  )!= "")
				$this->db->like('pageName ', $this->pageName );
				
			if($this->status != "")
				$this->db->where('status', $this->status);
				
			if(trim($this->description) != "")
				$this->db->like('description', $this->description);
			if(trim($this->shortDescription) != "")
				$this->db->like('shortDescription', $this->shortDescription);
				
				
			if($this->pageIds != ""){
				//$pageIds = explode(",",$this->pageIds);
				$this->db->where_in('pageId', $this->pageIds);	
			}
			
			if($this->sortColumn == '')
				$this->sortColumn = "pageId";
			
			if($this->sortDirection == '')
				$this->sortDirection = "DESC";	
						
			$this->db->order_by("$this->sortColumn", "$this->sortDirection");
			
			$query = $this->db->get();
			// echo $this->db->last_query(); exit; 
			return $query->result_array();

		}
		
		
		
		
		public function setPageNumber($pageNumber){
            $this->_pageNumber = $pageNumber;
        }
 
        public function setOffset($offset){
            $this->_offset = $offset;
        }
	


public function get_count() {
			
			if($this->pageId != "")
				$this->db->where('pageId', $this->pageId);
			
				if(trim($this->pageName) != "")
				$this->db->like('pageName', $this->pageName);
				
				if(trim($this->shortDescription) != "")
				$this->db->like('shortDescription', $this->shortDescription);
				if(trim($this->description) != "")
				$this->db->like('description', $this->description);
				
				
				
			
				
			if(trim($this->status) != "")
				$this->db->where('status', $this->status);
				
				
				
			if(trim($this->pageIds) != ""){ //echo  $this->domainIds; exit;
				$pageIds = explode(",",$pageIds);
				$this->db->where_in('pageId', $pageIds);	
			}
			$this->db->from("axcms");
			return $this->db->count_all_results();
		}
		
		
		
		public function retrieveCms($pageId = FALSE)
		{
			if ($pageId === FALSE)
			{
					return 0;
			}
			$this->db->select('*');
			$this->db->from('axcms');
			$this->db->like('pageId',$pageId);
			$result_array = $this->db->get()->result_array();	
			$this->pageId				    = $result_array[0]["pageId"];
			$this->pageName				= $result_array[0]["pageName"];
			$this->description		            = $result_array[0]["description"];
			$this->shortDescription		            = $result_array[0]["shortDescription"];
			$this->status					= $result_array[0]["status"];
			
			return 1;
		}
}
?>