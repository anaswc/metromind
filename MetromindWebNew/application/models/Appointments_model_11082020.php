<?php

class  Appointments_model extends CI_Model {
	
	public function __construct(){
		
		$this->doctorName      ="";
		$this->firstName      ="";
		$this->appointmentId      ="";
		$this->patientId    ="";
		$this->doctorId    ="";
		$this->requestDate         ="";
		$this->requestedSession          	 ="";
		
		$this->appointmentDate         	 ="";
		$this->appointmentSession     ="";
		$this->isCompleted     ="";
		$this->status     ="";
				
		$this->completedTime     ="";
		$this->sortColumn 	  		= '';
		$this->sortDirection  	= '';
		$this->load->database();
		$this->load->library('upload');
		$this->setPostGetVars();
		
	}
	public function setPostGetVars(){	

			$this->appointmentId						    = $this->input->post_get('appointmentId');
			$this->patientId						= $this->input->post_get('patientId');
			$this->doctorName						    = $this->input->post_get('doctorName');
			$this->firstName						= $this->input->post_get('firstName');
			$this->doctorId                          = $this->input->post_get('doctorId');
			$this->requestDate                           = trim($this->input->post_get('requestDate'));
			$this->requestedSession						= $this->input->post_get('requestedSession');
			$this->appointmentDate						= $this->input->post_get('appointmentDate');
			$this->appointmentSession                           = trim($this->input->post_get('appointmentSession'));
			$this->isCompleted						= $this->input->post_get('isCompleted');
			$this->completedTime						= $this->input->post_get('completedTime');
			$this->status						= $this->input->post_get('status');
					
		
	}
	
	
	
	public function getAppointment($limit = NULL, $start = NULL)
		{	
			$this->db->limit($limit, $start);
			
			$this->db->select('
								axappointments.*,
								axdoctors.doctorName,
								axpatient.firstName,axpatient.lastName,
								');
			
			$this->db->from('axappointments');
			$this->db->join('axdoctors', 'axdoctors.doctorId = axappointments.doctorId', 'left');
			
			$this->db->join('axpatient', 'axpatient.patientId = axappointments.patientId', 'left');
			if($this->appointmentId != "")
				$this->db->where('axappointments.appointmentId', $this->appointmentId);
			
			if(trim($this->patientId  )!= "")
				$this->db->where('axappointments.patientId ', $this->patientId );
				
				if(trim($this->isCompleted  )!= "")
				$this->db->where('axappointments.isCompleted ', $this->isCompleted);
				
			if($this->doctorId != "")
				$this->db->where('axappointments.doctorId', $this->doctorId);
				
			if(trim($this->requestDate) != "")
				$this->db->like('axappointments.requestDate', $this->requestDate);
			if(trim($this->doctorName) != "")
				$this->db->like('axdoctors.doctorName', $this->doctorName);
			if(trim($this->firstName) != "")
				$this->db->like('axpatient.firstName', $this->firstName);
				
				
			if($this->requestedSession != ""){
				//$symptomIds = explode(",",$this->symptomIds);
				$this->db->where_in('axappointments.requestedSession', $this->requestedSession);	
			}
			if(trim($this->appointmentDate) != "")
				$this->db->where('axappointments.appointmentDate', $this->appointmentDate);
			if(trim($this->isCompleted) != "")
				$this->db->like('axappointments.isCompleted', $this->isCompleted);
			
			if(trim($this->appointmentSession) != "")
				$this->db->where('axappointments.appointmentSession', $this->appointmentSession);
				
			if($this->sortColumn == '')
				$this->sortColumn = "appointmentId";
			
			if($this->sortDirection == '')
				$this->sortDirection = "DESC";	
						
			$this->db->order_by("$this->sortColumn", "$this->sortDirection");
			
			$query = $this->db->get();
			// echo $this->db->last_query(); exit; 
			return $query->result_array();

		}
		
		
		
		/////////////  get new requests /////////////////////////////////////
		
		public function getnew_appointment_requests($limit = NULL, $start = NULL)
		{	
		
			$now = new DateTime();

			$now->setTimezone(new DateTimezone('Asia/Kolkata'));

			$createdDate =  $now->format('Y-m-d H:i:s');
			
			$this->db->limit($limit, $start);
			
			$this->db->select('
								axappointments.patientId,axappointments.doctorId,
								axappointments.requestDate,axappointments.requestSession,
								axappointments.appointmentDate,axappointments.appointmentSession,
								axappointments.appointmentStartTime,axappointments.appointmentEndTime,
								axappointments.appointmentNote,axappointments.insDate,
								axappointments.status,axappointments.isCompleted,
								axappointments.completedTime,axappointments.modifiedDate,
								axappointments.appointmentId,
								axdoctors.doctorName,
								axpatient.firstName,axpatient.lastName,
								TIMEDIFF("'.$createdDate.'",axappointments.insDate) as timeDifference

								');
			
			$this->db->from('axappointments');
			$this->db->join('axdoctors', 'axdoctors.doctorId = axappointments.doctorId', 'left');
			
			$this->db->join('axpatient', 'axpatient.patientId = axappointments.patientId', 'left');
			
			$this->db->where('axappointments.status', 0);
			if($this->appointmentId != "")
				$this->db->where('axappointments.appointmentId', $this->appointmentId);
			
			if(trim($this->patientId  )!= "")
				$this->db->where('axappointments.patientId ', $this->patientId );
				
			if($this->doctorId != "")
				$this->db->where('axappointments.doctorId', $this->doctorId);
				
			if(trim($this->requestDate) != "")
				$this->db->like('axappointments.requestDate', $this->requestDate);
			if(trim($this->doctorName) != "")
				$this->db->like('axdoctors.doctorName', $this->doctorName);
			if(trim($this->firstName) != "")
				$this->db->like('axpatient.firstName', $this->firstName);
				
				
			if($this->requestedSession != ""){
				//$symptomIds = explode(",",$this->symptomIds);
				$this->db->where_in('axappointments.requestedSession', $this->requestedSession);	
			}
			if(trim($this->appointmentDate) != "")
				$this->db->where('axappointments.appointmentDate', $this->appointmentDate);
			if(trim($this->isCompleted) != "")
				$this->db->where('axappointments.isCompleted', $this->isCompleted);
			if(trim($this->completedTime) != "")
				$this->db->like('axappointments.completedTime', $this->completedTime);
			if(trim($this->appointmentSession) != "")
				$this->db->where('axappointments.appointmentSession', $this->appointmentSession);
				
			if($this->sortColumn == '')
				$this->sortColumn = "appointmentId";
			
			if($this->sortDirection == '')
				$this->sortDirection = "DESC";	
						
			$this->db->order_by("$this->sortColumn", "$this->sortDirection");
			
			$query = $this->db->get();
			// echo $this->db->last_query(); exit; 
			return $query->result_array();

		}
		
		//////////// get approved requests ////////////////////////
		
		
		public function getapproved_appointment_requests($limit = NULL, $start = NULL)
		{	
		
			$now = new DateTime();

			$now->setTimezone(new DateTimezone('Asia/Kolkata'));

			$createdDate =  $now->format('Y-m-d H:i:s');
			
			$this->db->limit($limit, $start);
			
			$this->db->select('
								axappointments.patientId,axappointments.doctorId,
								axappointments.requestDate,axappointments.requestSession,
								axappointments.appointmentDate,axappointments.appointmentSession,
								axappointments.appointmentStartTime,axappointments.appointmentEndTime,
								axappointments.appointmentNote,axappointments.insDate,
								axappointments.status,axappointments.isCompleted,
								axappointments.completedTime,axappointments.modifiedDate,
								axappointments.appointmentId,
								axdoctors.doctorName,
								axpatient.firstName,axpatient.lastName,
								

								');
			
			$this->db->from('axappointments');
			$this->db->join('axdoctors', 'axdoctors.doctorId = axappointments.doctorId', 'left');
			
			$this->db->join('axpatient', 'axpatient.patientId = axappointments.patientId', 'left');
			
			$this->db->where('axappointments.status', 1);
			$this->db->where('axappointments.isCompleted', 0);
			if($this->appointmentId != "")
				$this->db->where('axappointments.appointmentId', $this->appointmentId);
			
			if(trim($this->patientId  )!= "")
				$this->db->where('axappointments.patientId ', $this->patientId );
				
			if($this->doctorId != "")
				$this->db->where('axappointments.doctorId', $this->doctorId);
				
			if(trim($this->requestDate) != "")
				$this->db->like('axappointments.requestDate', $this->requestDate);
			if(trim($this->doctorName) != "")
				$this->db->like('axdoctors.doctorName', $this->doctorName);
			if(trim($this->firstName) != "")
				$this->db->like('axpatient.firstName', $this->firstName);
				
				
			if($this->requestedSession != ""){
				
				$this->db->where_in('axappointments.requestedSession', $this->requestedSession);	
			}
			if(trim($this->appointmentDate) != "")
				$this->db->where('axappointments.appointmentDate', $this->appointmentDate);
			if(trim($this->isCompleted) != "")
				$this->db->where('axappointments.isCompleted', $this->isCompleted);
			if(trim($this->completedTime) != "")
				$this->db->like('axappointments.completedTime', $this->completedTime);
			if(trim($this->appointmentSession) != "")
				$this->db->where('axappointments.appointmentSession', $this->appointmentSession);
				
			if($this->sortColumn == '')
				$this->sortColumn = "appointmentId";
			
			if($this->sortDirection == '')
				$this->sortDirection = "DESC";	
						
			$this->db->order_by("$this->sortColumn", "$this->sortDirection");
			
			$query = $this->db->get();
			// echo $this->db->last_query(); exit; 
			return $query->result_array();

		}
		
		
		public function set_appopintment(){
			
			$this->load->helper('url');
			
			$this->db->select('*');
			$this->db->from('axdoctors');
			$this->db->where('doctorId',$this->doctorId);
			$query=$this->db->get();
			$row=$query->row_array();
			
			$selectedTime = $this->input->post('appointmentStartTime');
			$endTime = strtotime("+".$row['doctorSessionDuration']." minutes", strtotime($selectedTime));
			$appointmentEndTime=date('H:i:s', $endTime);
			$now = new DateTime();

			$now->setTimezone(new DateTimezone('Asia/Kolkata'));

			$createdDate =  $now->format('Y-m-d H:i:s');
			
			$data = array(
				
				'doctorId' => $this->doctorId,
				'patientId' =>$this->input->post('patientId'),
				'requestDate'=>$this->input->post('appointmentDate'),
				'requestSession' =>$this->input->post('appointmentSession'),
				'appointmentDate'    => $this->input->post('appointmentDate'),
				'appointmentSession'    => $this->input->post('appointmentSession'),
				'appointmentStartTime'      => $this->input->post('appointmentStartTime'),
				'appointmentEndTime'      => $appointmentEndTime,
				'insDate'      => $createdDate,
				'status'		=>0,
				'isCompleted'	=>0,
				
				
			);
			//print_r($data);exit;
			
			$this->db->insert('axappointments', $data);
				$this->appointmentId = $this->db->insert_id();
			
			if($this->input->post('isCredit')<>"")
			{
				$this->update_patientCredit();
				}
			}
		
		
		public function update_appointment($appointmentId){
			
			
			$this->load->helper('url');
			
			$this->db->select('*');
			$this->db->from('axdoctors');
			$this->db->where('doctorId',$this->doctorId);
			$query=$this->db->get();
			$row=$query->row_array();
			
			$selectedTime = $this->input->post('appointmentStartTime');
			$endTime = strtotime("+".$row['doctorSessionDuration']." minutes", strtotime($selectedTime));
			$appointmentEndTime=date('H:i:s', $endTime);
			
			$now = new DateTime();

			$now->setTimezone(new DateTimezone('Asia/Kolkata'));

			$modifiedDate =  $now->format('Y-m-d H:i:s');
			
			
			$data = array(
				
				'doctorId' => $this->input->post('doctorId'),
				'appointmentDate'    => $this->input->post('appointmentDate'),
				'appointmentSession'    => $this->input->post('appointmentSession'),
				'appointmentStartTime'      => $this->input->post('appointmentStartTime'),
				'appointmentEndTime'      => $appointmentEndTime,
				'modifiedDate'      => $modifiedDate,
				
			);
			//print_r($data);exit;
			$this->db->set($data); 
			$this->db->where("appointmentId", $appointmentId); 
			$this->db->update("axappointments", $data);
			
			if($this->input->post('isCredit')<>"")
			{
				$this->update_patientCredit();
				}
			
			}
			
			
		public function update_patientCredit(){
			$this->load->helper('url'); 
			
			$this->db->select('*');
			$this->db->from('axdoctors');
			$this->db->where('doctorId', $this->doctorId);
			$query=$this->db->get();
			$row=$query->row_array();
			
			
			$now = new DateTime();

			$now->setTimezone(new DateTimezone('Asia/Kolkata'));

			$createdDate =  $now->format('Y-m-d H:i:s');
			
			$status =1;
			$data = array(
				'patientId' => $this->patientId,
				'doctorId'    => $this->doctorId,
				'noOfSession'      => 1,
				'sessionDuration'      => $row['doctorSessionDuration'],
				'status'      => 1,
				'insDate'      =>$createdDate,
				
				
				
			);
		
				$this->db->insert('axpatientcredits', $data);
				$patientCreditId  = $this->db->insert_id();
			
			}	
			
	public function getAppointment_id($appointmentId = NULL)
		{	
			
			
			$this->db->select('
								axappointments.*,
	axdoctors.doctorName,axdoctors.doctorImageUrl,axdoctors.doctorMobile,axdoctors.doctorEmail,
								axpatient.firstName,axpatient.lastName
								');
			
				$this->db->from('axappointments');
			$this->db->join('axdoctors', 'axdoctors.doctorId = axappointments.doctorId', 'left');
			$this->db->join('axpatient', 'axpatient.patientId = axappointments.patientId', 'left');
			$this->db->where('axappointments.appointmentId',$appointmentId);
			
			$query = $this->db->get();
			// echo $this->db->last_query(); exit; 
			return $query->row_array();

		}
	
		public function get_count() {
			
			if($this->appointmentId != "")
				$this->db->where('appointmentId', $this->appointmentId);
			
				if(trim($this->patientId  )!= "")
				$this->db->like('patientId ', $this->patientId );
				
			if($this->doctorId != "")
				$this->db->where('doctorId', $this->doctorId);
				
			if(trim($this->requestDate) != "")
				$this->db->like('requestDate', $this->requestDate);
				
				
			if($this->requestedSession != ""){
				//$symptomIds = explode(",",$this->symptomIds);
				$this->db->where_in('requestedSession', $this->requestedSession);	
			}
			if(trim($this->appointmentDate) != "")
				$this->db->like('appointmentDate', $this->appointmentDate);
			if(trim($this->isCompleted) != "")
				$this->db->like('isCompleted', $this->isCompleted);
			if(trim($this->completedTime) != "")
				$this->db->like('completedTime', $this->completedTime);
			if(trim($this->appointmentSession) != "")
				$this->db->like('appointmentSession', $this->appointmentSession);
				if(trim($this->status) != "")
				$this->db->like('status', $this->status);
				
			if($this->sortColumn == '')
				$this->sortColumn = "appointmentId";
			$this->db->from("axappointments");
			return $this->db->count_all_results();
		}
		
		
}
?>