<?php

class  Videos_model extends CI_Model {
	
	public function __construct(){
		
		$this->videoId       ="";
		$this->title    ="";
		$this->id    ="";
		
		$this->status          	 ="";
		
		$this->sortColumn 	  		= '';
		$this->sortDirection  	= '';
		$this->load->database();
		$this->load->library('upload');
		$this->setPostGetVars();
		
	}
	public function setPostGetVars(){	
		$this->videoId						    = $this->input->post_get('videoId');
		$this->title						= trim($this->input->post_get('title'));
		$this->id						= trim($this->input->post_get('id'));
		$this->sortColumn				= $this->input->post_get('sortColumn');
		$this->sortDirection			= $this->input->post_get('sortDirection');					
	}
	
	
	
	
	public function setVideos()
		{
			$this->load->helper('url'); 
		
			//$seoUri = url_title($this->input->post('adminName'), 'dash', TRUE);
			$createdDate=date('Y-m-d H:i:s');
			$status =1;
			$data = array(
				'title' => $this->input->post('title'),
				'videoId'    => $this->input->post('videoId')
			);
			
			$this->db->insert('axvideos', $data);
			$this->id  = $this->db->insert_id();
			
			$id = $this->id ;
			return $id;
		}
		
		public function getvideo_table_id($id = FALSE)
		{
			if ($id === FALSE)
			{
					return 0;
			}
			$query = $this->db->get_where('axvideos', array('id' => $id));
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
		public function updateVideo($id) { 
			$this->load->helper('url');			
			$status=1;	
			$data = array(
				'videoId' => $this->input->post('videoId'),
				'title'    => $this->input->post('title')
			);
			$this->db->set($data); 
			$this->db->where("id", $id); 
			$this->db->update("axvideos", $data); 
			$this->id = $id;						
			return $id;
		} 


     public function activate_Video($ids) { 
		
			$this->db->where_in("id", $id); 
			$status = 1;
			$data = array(
				'status' => $status
			);
			$this->db->update("axvideos", $data);  
		} 
		
		public function deactivate_Video($ids) { 

			$this->db->where_in("id", $ids); 
			$status = 0;
			$data = array(
				'status' => $status
			);
			//print_r($data);exit;
			$this->db->update("axvideos", $data);  
			//echo $this->db->last_query();exit;
		} 
		
			
		
		


	
	public function getVideos($limit = NULL, $start = NULL)
		{	
			$this->db->limit($limit, $start);
			
			$this->db->select('*');
			
			$this->db->from('axvideos');
			
			if($this->videoId != "")
				$this->db->where('videoId', $this->videoId);
			if(trim($this->title)!= "")
				$this->db->like('title ', $this->title);
			
			
			if($this->sortColumn == '')
				$this->sortColumn = "videoId";
			
			if($this->sortDirection == '')
				$this->sortDirection = "DESC";	
						
			$this->db->order_by("$this->sortColumn", "$this->sortDirection");
			
			$query = $this->db->get();
			// echo $this->db->last_query(); exit; 
			return $query->result_array();

		}
		
		
		
		public function delete_video($ids) { 
		
		
		
		
			 if ($this->db->delete("axvideos", "id IN ( ".$ids.")")) { 
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
			
			if($this->videoId != "")
				$this->db->where('videoId', $this->videoId);
			
				if(trim($this->title) != "")
				$this->db->like('title', $this->title);
				
				
			$this->db->from("axvideos");
			return $this->db->count_all_results();
		}
		
		
		
		 public function validateVideos()
		{
			$this->db->select('*');

			$this->db->from('axvideos');

			if($this->id != "")
			$this->db->where('id  != ',$this->id);	

			if(trim($this->videoId) != "")
				$this->db->where('videoId', $this->videoId);
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