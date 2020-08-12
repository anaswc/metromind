<?php

class  Subscription_model extends CI_Model {
	
	public function __construct(){
		
		$this->subscriptionId       ="";
		$this->packageName      ="";
		$this->firstName      ="";
		$this->doctorName      ="";
		$this->subscribedDate    ="";
		$this->subscriptionEndDate    ="";
		$this->noOfSession         ="";
		$this->paymentId     ="";
		$this->status     ="";
		
		$this->sortDirection  	= '';
		$this->load->database();
		$this->load->library('upload');
		$this->setPostGetVars();
		
	}
	public function setPostGetVars(){	

			$this->subscriptionId						    = $this->input->post_get('subscriptionId');
			$this->packageName						    = $this->input->post_get('packageName');
			$this->firstName						= $this->input->post_get('firstName');
			$this->doctorName						    = $this->input->post_get('doctorName');
			$this->subscribedDate						= $this->input->post_get('subscriptionEndDate');
			$this->subscriptionEndDate                          = $this->input->post_get('doctorId');
			$this->noOfSession                           = trim($this->input->post_get('noOfSession'));
			$this->paymentId						= $this->input->post_get('paymentId');
			$this->paymentId						= $this->input->post_get('paymentId');
			
			$this->status						= $this->input->post_get('status');
					
		
	}
	
	
	
	public function getSubscription($limit = NULL, $start = NULL)
		{	
			$this->db->limit($limit, $start);
			
			$this->db->select('
								axsubscription.*,
								axdoctors.doctorName,
								axpatient.firstName,axpatient.lastName,
								axpackages.packageName
								');
			
			$this->db->from('axsubscription');
			$this->db->join('axdoctors', 'axdoctors.doctorId = axsubscription.doctorId', 'left');
			$this->db->join('axpatient', 'axpatient.patientId  = axsubscription.patientId ', 'left');
			$this->db->join('axpackages', 'axpackages.packageId  = axsubscription.packageId ', 'left');

			if($this->subscriptionId  != "")
				$this->db->where('axsubscription.subscriptionId ', $this->subscriptionId );
			
			if(trim($this->firstName) != "")
				$this->db->like('axpatient.firstName', $this->firstName);
			
			if(trim($this->packageName)!= "")
				$this->db->like('axpackages.packageName', $this->packageName);
			if(trim($this->doctorName)!= "")
				$this->db->like('axdoctors.doctorName', $this->doctorName);
			
			
				
			if($this->sortColumn == '')
				$this->sortColumn = "subscriptionId";
			
			if($this->sortDirection == '')
				$this->sortDirection = "DESC";	
						
			$this->db->order_by("$this->sortColumn", "$this->sortDirection");
			
			$query = $this->db->get();
			//echo $this->db->last_query(); exit; 
			return $query->result_array();

		}
	public function getSubscription_id($subscriptionId = NULL)
		{	
			
			if ($subscriptionId === FALSE)
			{
					return 0;
			}
	
			$this->db->select('
								axsubscription.*,
								axdoctors.doctorName,
								axpatient.firstName,axpatient.lastName,
								axpackages.packageName
								');
			
			$this->db->from('axsubscription');
			$this->db->join('axdoctors', 'axdoctors.doctorId = axsubscription.doctorId', 'left');
			$this->db->join('axpatient', 'axpatient.patientId  = axsubscription.patientId ', 'left');
			$this->db->join('axpackages', 'axpackages.packageId  = axsubscription.packageId ', 'left');

			$query = $this->db->get();
			//echo $this->db->last_query(); exit; 
			return $query->row_array();

			
		}
	
		public function get_count() {
			
			if($this->subscriptionId != "")
				$this->db->where('subscriptionId', $this->subscriptionId);
			if($this->packageId != "")
				$this->db->where('packageId', $this->packageId);
			
				if(trim($this->patientId  )!= "")
				$this->db->like('patientId ', $this->patientId );
				
			
				if(trim($this->status) != "")
				$this->db->like('status', $this->status);
				
			if($this->sortColumn == '')
				$this->sortColumn = "subscriptionId";
			$this->db->from("axsubscription");
			return $this->db->count_all_results();
		}
		
		
}
?>