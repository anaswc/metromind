<?php
class Notification_model extends CI_Model {

	public function __construct()
	{
		$this->sortColumn 						= 'notificationTitle';
		$this->sortDirection 					= 'ASC';
		$this->notificationId					= "";	
		$this->notificationTitle				= "";	
		$this->notificationDescription			= "";	
		$this->appointmentId					= "";	
		$this->status							= "";
		
		$this->notificationType					= "";
		$this->patientId							= "";
		$this->doctorId							= "";
			
		$this->notificationIds					= "";	
		
		
	}
		
	public function setPostGetVars(){	
	
		$this->notificationId					= trim($this->input->post_get('notificationId'));
		$this->notificationTitle				= trim($this->input->post_get('notificationTitle'));	
		$this->notificationDescription			= trim($this->input->post_get('notificationDescription'));
		$this->appointmentId				= trim($this->input->post_get('appointmentId'));
		$this->status							= trim($this->input->post_get('status'));
		$this->notificationType					= trim($this->input->post_get('notificationType'));
		$this->patientId							= trim($this->input->post_get('patientId'));
		$this->doctorId							= trim($this->input->post_get('doctorId'));
		$this->notificationIds					= trim($this->input->post_get('notificationIds'));			
	
	}
		
		
	public function get_notification($limit = NULL, $start = NULL)
	{	
		$this->db->limit($limit, $start);
		
		$this->db->select('notificationId,notificationTitle,notificationDescription,appointmentId');
		
		$this->db->from('notification');
		
		if(trim($this->notificationId) != "")
			$this->db->where('notificationId', $this->notificationId);
			
		if(trim($this->notificationType) != "")
			$this->db->where('notificationType', $this->notificationType);
		
		if(trim($this->patientId) != "")
			$this->db->where('patientId', $this->patientId);	
		
		if(trim($this->status) != "")
			$this->db->where('status', $this->status);
			
		if(trim($this->doctorId) != "")
			$this->db->where('doctorId', $this->doctorId);		
			
		if(trim($this->notificationDescription) != "")
			$this->db->like('notificationDescription', $this->notificationDescription,'none');
			
		if(trim($this->notificationTitle) != "")
			$this->db->like('notificationTitle', $this->notificationTitle,'none');
		
			
			
		if(trim($this->notificationIds) != ""){
			$notificationIds = explode(",",$notificationIds);
			$this->db->where_in('notificationId', $notificationIds);	
		}		
		
		if($this->sortColumn == '')
			$this->sortColumn = "notificationId";
		
		if($this->sortDirection == '')
			$this->sortDirection = "DESC";	
										
		$this->db->order_by("RAND()");
		
		$query = $this->db->get();
	
		return $query->result_array();
	
	}
		
	public function validate_notification(){
		
		$valid = 1;
		
		if($this->notificationTitle == '')
			$valid =  0;	
		if($this->appointmentId == '')
			$valid =  0;	
			
		if($this->notificationTitle <> ''){
			
			$this->db->select('notificationId');
			
			$this->db->from('notification');
			
			$this->db->where('notificationTitle',$this->notificationTitle);
			
			if(trim($this->notificationDescription) != "")
				$this->db->where('notificationDescription', $this->notificationDescription);
				
			if(trim($this->notificationId) != "")
				$this->db->where('notification.notificationId != '.$this->notificationId);	
			
			$query = $this->db->get();
			
			if($query->num_rows() > 0)
			{	
				$valid =  0;
			}
		}		
		
		return $valid;								
			
	}
		
	public function set_notification()
	{
		$status =  0;
		
		$data = array(
			'notificationType' 				=> $this->notificationType,
			'doctorId' 						=> $this->doctorId,
			'notificationTitle' 			=> $this->notificationTitle,
			'appointmentId' 				=> $this->appointmentId,
			'notificationDescription' 		=> $this->notificationDescription,
			'patientId' 					=> $this->patientId,
			'status' 						=> $status

		);
		
		$this->db->insert('notification', $data);
		
		$this->notificationId = $this->db->insert_id();
		
		$notificationId = $this->notificationId ;
		
		return $notificationId;
	}
		
	public function update_notification($notificationId) { 
	
		if($notificationId == '')
			return 0;
		
		$data = array(
			'notificationType' 			=> $this->notificationType,
			'notificationTitle' 		=> $this->notificationTitle,
			'notificationDescription' 	=> $this->notificationDescription,
			'patientId' 					=> $this->patientId
			
		);
		
		$this->db->set($data); 
		$this->db->where("notificationId", $notificationId); 
		$this->db->update("notification", $data); 
		
		$this->notificationId = $notificationId;
		
		return $notificationId;
		
	} 
	
	public function get_notification_id($notificationId = FALSE)
	{
		if ($notificationId === FALSE)
		{
				return 0;
		}
	
		$query = $this->db->get_where('notification', array('notificationId' => $notificationId));
		return $query->row_array();
	}
		
	
	public function delete_notification($notificationIds) { 
		 if ($this->db->delete("notification", "notificationId IN ( ".$notificationIds.")")) { 
			return true; 
		 } 
	} 
	
		
	  
	public function get_count() {
		
		if(trim($this->notificationId) != "")
			$this->db->where('notificationId', $this->notificationId);
			
		if(trim($this->notificationType) != "")
			$this->db->where('notificationType', $this->notificationType);
		
		if(trim($this->patientId) != "")
			$this->db->where('patientId', $this->patientId);	
		
		if(trim($this->status) != "")
			$this->db->where('status', $this->status);	
			
		if(trim($this->notificationDescription) != "")
			$this->db->like('notificationDescription', $this->notificationDescription,'none');
			
		if(trim($this->notificationTitle) != "")
			$this->db->like('notificationTitle', $this->notificationTitle,'none');
		
			
			
		if(trim($this->notificationIds) != ""){
			$notificationIds = explode(",",$notificationIds);
			$this->db->where_in('notificationId', $notificationIds);	
		}
		
		$this->db->from("notification");
		
		return $this->db->count_all_results();
	}
	
	public function setPageNumber($pageNumber) {
		$this->_pageNumber = $pageNumber;
	}
	
	public function setOffset($offset) {
		$this->_offset = $offset;
	}
}
?>