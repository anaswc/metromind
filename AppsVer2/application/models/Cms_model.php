<?php
class Cms_model extends CI_Model {

        public function __construct()
        {
            $this->sortColumn 				= '';
			$this->sortDirection 			= '';
			$this->pageId					= "";	
			$this->pageName					= "";		
			$this->description				= "";
			$this->shortDescription			= "";
			$this->pageIds					= "";	
			
			$this->setPostGetVars();
        }
		
		public function setPostGetVars(){	

			$this->pageId						= $this->input->post_get('pageId');
			
			$this->pageName						= trim($this->input->post_get('pageName'));
			
			$this->description					= trim($this->input->post_get('description'));
			
			$this->shortDescription				= trim($this->input->post_get('shortDescription'));
			
			$this->pageIds						= trim($this->input->post_get('pageIds'));			
	
		}
		
		public function get_cms($limit = NULL, $start = NULL)
		{	
			$this->db->limit($limit, $start);
			
			$this->db->select('*');
			
			$this->db->from('axcms');
			
			if($this->pageId != "")
				$this->db->where('pageId', $this->pageId);	
				
			if(trim($this->pageName) != "")
				$this->db->like('pageName', $this->pageName);
				
			if(trim($this->description) != "")
				$this->db->like('description', $this->description);	
				
			if(trim($this->pageIds) != ""){
				$pageIds = explode(",",$pageIds);
				$this->db->where_in('pageId', $pageIds);	
			}
			
			if($this->sortColumn == '')
				$this->sortColumn = "pageId";
			
			if($this->sortDirection == '')
				$this->sortDirection = "DESC";	
				
									
			$this->db->order_by("$this->sortColumn", "$this->sortDirection");
			
			$query = $this->db->get();
			
			return $query->result_array();
		}
		
		public function set_cms()
		{
			
			$data = array(
				'pageName'		 	=> $this->pageName,
				'description' 		=> $this->description,
				'shortDescription' 	=> $this->shortDescription
			);
			
			$this->db->insert('axcms', $data);
			
			$this->pageId = $this->db->insert_id();
			
			$pageId = $this->pageId ;
			
			return $pageId;
		}
		
		public function get_cms_id($pageId = FALSE)
		{
			if ($pageId === FALSE)
			{
					return 0;
			}
			
			$this->db->select('description');
			
			$this->db->from('axcms');
			$this->db->where("pageId", $pageId);
			
			$result_array = $this->db->get()->result_array();
			
			$description		= $result_array[0]["description"];
			
			return $description;
		}
		
		public function delete_cms($pageId) { 
			 if ($this->db->delete("axcms", "pageId = ".$pageId)) { 
				return true; 
			 } 
		} 
	   
		public function update_cms($pageId) { 
			$this->load->helper('url');
			
			$data = array(
				'pageName' => $this->pageName,
				'description' => $this->description,
				'shortDescription' 	=> $this->shortDescription
			);
			
			$this->db->set($data); 
			$this->db->where("pageId", $pageId); 
			$this->db->update("axcms", $data); 
			
			return $pageId;
		} 
		
		public function retrieveCms($pageId){
			
			if (trim($pageId) == "") return 0;
			
			$this->db->select('*');
			
			$this->db->from('axcms');
			
			$this->db->where('pageId',$pageId);
			
			$result_array = $this->db->get()->result_array();	
			
			$this->pageId				= $result_array[0]["pageId"];
			$this->pageName				= $result_array[0]["pageName"];
			$this->description			= $result_array[0]["description"];
			$this->shortDescription		= $result_array[0]["shortDescription"];
			
		}
		
		public function get_count() {
			
			if(trim($this->pageId) != "")
				$this->db->where('pageId', $this->pageId);
			
			if(trim($this->pageName) != "")
				$this->db->where('pageName', $this->pageName);
				
			if(trim($this->pageIds) != ""){
				$pageIds = explode(",",$pageIds);
				$this->db->where_in('pageId', $pageIds);	
			}
			
			$this->db->from("axcms");
			
			return $this->db->count_all_results();
		}
		
		public function checkIfSeoUriExistsNew($seoUri,$pageId){
			
			if(trim($seoUri) == "") return 0;
			
			if(trim($pageId) == "") return 0;
			
			$this->db->select('pageId');
			
			$this->db->from('axcms');
			
			$this->db->like('seoUri',$seoUri);
			
			if(trim($pageId) != ""){
				
				$this->db->where('pageId != ',$pageId);
					
			}
			$result_array = $this->db->get();
			if($result_array->num_rows()>0){
				return 1;
			}
		}
}
?>