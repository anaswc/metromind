<?php
class Notification extends CI_controller{
	 public function __construct(){
		 parent:: __construct();
		 
		 $this->load->model('notification_model');
		 $this->load->model('appointments_model');
		 $this->load->helper('url_helper');
		 $this->load->library('pagination');
		  $this->load->helper('date');
		$this->load->library("pagination");
				$this->pageSize = 50;
				
				if($this->input->post_get('pageSize')) $this->pageSize = $this->input->post_get('pageSize');

		if($this->input->post_get('returnUrl')) $this->returnUrl = $this->input->post_get('returnUrl');

		if ($this->input->post_get('returnUrl') <> ''){

			$this->returnUrl = $this->input->post_get('returnUrl');

		}else{

			$this->returnUrl= base_url('admin/patients/');	

		}
	 }

	public function notifytodayappointment(){
			$counts=$this->appointments_model->getapproved_appointment_requests();
			foreach ($counts as $value) {
				$patient=$this->notification_model->getPatient_id($value['patientId']);

				$smsstatus=$this->notification_model->send_notification_user($patient['uniqueId']);
				
				
				$appnotifystatus=$this->notification_model->notify_user_appointment($patient['uniqueId'],$value['doctorId']);
				

			}
		}
}
	
		
		
	


?>