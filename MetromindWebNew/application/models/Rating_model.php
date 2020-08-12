<?php

class  Rating_model extends CI_Model {
	
	public function __construct(){
		
		$this->doctorName      ="";
		$this->firstName      ="";
		$this->ratingId      ="";
		$this->patientId    ="";
		$this->doctorId    ="";
		$this->insDate         ="";
		$this->review     ="";
		$this->rating     ="";
		$this->status     ="";
		$this->sortColumn 	  		= '';
		$this->sortDirection  	= '';
		$this->load->database();
		$this->load->library('upload');
		$this->setPostGetVars();
		
	}
	public function setPostGetVars(){	

			$this->ratingId						    = $this->input->post_get('ratingId');
			$this->patientId						= $this->input->post_get('patientId');
			$this->doctorName						    = $this->input->post_get('doctorName');
			$this->firstName						= $this->input->post_get('firstName');
			$this->doctorId                          = $this->input->post_get('doctorId');
			$this->insDate                           = trim($this->input->post_get('insDate'));
			$this->review						= $this->input->post_get('review');
			$this->rating						= $this->input->post_get('rating');
			$this->status						= $this->input->post_get('status');
					
		
	}
	
	
	
	public function getRating($limit = NULL, $start = NULL)
		{	
			$this->db->limit($limit, $start);
			
			$this->db->select('
								axrating.*,
								axdoctors.doctorName,
								axpatient.firstName
								');
			
			$this->db->from('axrating');
			$this->db->join('axdoctors', 'axdoctors.doctorId = axrating.doctorId', 'left');
			$this->db->join('axpatient', 'axpatient.patientId = axrating.patientId', 'left');
			if($this->ratingId != "")
				$this->db->where('axrating.ratingId', $this->ratingId);
			
			if(trim($this->patientId)!= "")
				$this->db->where('axrating.patientId ', $this->patientId );
			if(trim($this->review)!= "")
				$this->db->like('axrating.review ', $this->review );
				
			if($this->doctorId != "")
				$this->db->where('axrating.doctorId', $this->doctorId);
				
			if(trim($this->rating) != "")
				$this->db->where('axrating.rating', $this->rating);
			if(trim($this->insDate) != "")
				$this->db->where('axrating.insDate', $this->insDate);
			if(trim($this->doctorName) != "")
				$this->db->like('axdoctors.doctorName', $this->doctorName);
			if(trim($this->firstName) != "")
				$this->db->like('axpatient.firstName', $this->firstName);
				
			if($this->sortColumn == '')
				$this->sortColumn = "ratingId";
			
			if($this->sortDirection == '')
				$this->sortDirection = "DESC";	
						
			$this->db->order_by("$this->sortColumn", "$this->sortDirection");
			
			$query = $this->db->get();
			// echo $this->db->last_query(); exit; 
			return $query->result_array();

		}
	public function getRating_id($ratingId = NULL)
		{	
			
			
			$this->db->select('
								axrating.*,
								axdoctors.doctorName,
								axpatient.firstName
								');
			
				$this->db->from('axrating');
			$this->db->join('axdoctors', 'axdoctors.doctorId = axrating.doctorId', 'left');
			$this->db->join('axpatient', 'axpatient.patientId = axrating.patientId', 'left');
			$this->db->where('axrating.ratingId',$ratingId);
			
			$query = $this->db->get();
			// echo $this->db->last_query(); exit; 
			return $query->result_array();

		}
	
		public function get_count() {
			
			if($this->ratingId != "")
				$this->db->where('ratingId', $this->ratingId);
			
				if(trim($this->patientId  )!= "")
				$this->db->where('patientId ', $this->patientId );
				
			if($this->doctorId != "")
				$this->db->where('doctorId', $this->doctorId);
				
			if(trim($this->insDate) != "")
				$this->db->where('insDate', $this->insDate);
				
				
			
			if(trim($this->review) != "")
				$this->db->where('review', $this->review);
			if(trim($this->rating) != "")
				$this->db->where('rating', $this->rating);
			
				if(trim($this->status) != "")
				$this->db->like('status', $this->status);
				
			if($this->sortColumn == '')
				$this->sortColumn = "ratingId";
			$this->db->from("axrating");
			return $this->db->count_all_results();
		}
		
		
}
?>