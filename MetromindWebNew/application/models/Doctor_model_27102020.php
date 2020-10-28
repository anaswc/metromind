<?php

class  Doctor_model extends CI_Model {
	
	public function __construct(){
		
		$this->doctorId       ="";
		$this->specialityId     ="";
		$this->doctorName        ="";
		$this->qualification        ="";
		$this->experience        ="";
		$this->symptomIds     ="";
		$this->status        ="";
		$this->seoUri					= '';
		$this->doctorFee      ="";
		$this->age      ="";
		$this->gender      ="";
		$this->doctorMobile      ="";
		$this->communicationMode      ="";
		$this->doctorEmail      ="";
		$this->doctorImageUrl      ="";
		$this->doctorPassword      ="";
		$this->youtubeLink      ="";
		$this->knownLanguages      ="";
		$this->doctorAddress      ="";
		$this->specialization      ="";
		$this->doctorSessionDuration      ="";
		$this->isVerified        ="";
		$this->medicalLicense					= '';

		$this->chatRoomNumber					= '';
		$this->medicalRegistrationNumber					= '';
		$this->sequenceOrder					= '';
        $this->doctorEmail                      ='';

		$this->isVerifiedLicense      ="";
		$this->counsellingCertificate      ="";
		$this->isVerifiedCertificate      ="";
		
		$this->createdDate      ="";
		$this->modifiedDate      ="";
		$this->lastLogin      ="";
		$this->sortColumn 	  = '';
		$this->sortDirection  = '';
		$this->load->database();
		$this->load->library('upload');
		$this->setPostGetVars();
		
	}
	public function setPostGetVars(){	

			$this->doctorId						    = $this->input->post_get('doctorId');
			$this->specialityId						= trim($this->input->post_get('specialityId'));
			$this->doctorName                          = trim($this->input->post_get('doctorName'));
			$this->doctorEmail							=trim($this->input->post_get('doctorEmail'));
			$this->qualification                            = trim($this->input->post_get('qualification'));
			$this->experience                            = trim($this->input->post_get('experience'));
			$this->doctorFee                            = trim($this->input->post_get('doctorFee'));
			$this->age                            = trim($this->input->post_get('age'));
			$this->doctorPassword                            = trim($this->input->post_get('doctorPassword'));
			$this->gender                            = trim($this->input->post_get('gender'));
			$this->status                           =  $this->input->post_get('status');
			$this->communicationMode                           =  $this->input->post_get('communicationMode');
			$this->doctorIds					= trim($this->input->post_get('doctorIds'));	
			$this->seoUri					= trim($this->input->post_get('seoUri'));
			$this->youtubeLink      =trim($this->input->post_get('youtubeLink'));
			$this->knownLanguages      =$this->input->post_get('knownLanguages');
			$this->doctorAddress      =trim($this->input->post_get('doctorAddress'));
			$this->specialization      =trim($this->input->post_get('specialization'));
			$this->doctorSessionDuration      =$this->input->post_get('doctorSessionDuration');
	$this->isVerified        =$this->input->post_get('isVerified');
	$this->chatRoomNumber					= $this->input->post_get('chatRoomNumber');
$this->medicalRegistrationNumber					= $this->input->post_get('medicalRegistrationNumber');
		$this->sequenceOrder					= $this->input->post_get('sequenceOrder');

			$this->isVerifiedLicense      =$this->input->post_get('isVerifiedLicense');
			//$this->counsellingCertificate      =trim($this->input->post_get('counsellingCertificate'));
			$this->isVerifiedCertificate      =$this->input->post_get('isVerifiedCertificate');
			$this->symptomIds						= $this->input->post_get('symptomIds');					
								}
	
	
	
	
	public function setDoctor()
		{
			
			
			$symptomId1     ="";
			$symptomIds						= $this->input->post('symptomIds');
			
			$this->load->helper('url'); 
		
			$seoUri = url_title($this->input->post('doctorName'), 'dash', TRUE);
			$createdDate=date('Y-m-d H:i:s');
			$this->doctorPassword=$this->encryption->encrypt($this->input->post('doctorPassword'));
			$status =1;
			/* for($i=1;$i<count($this->input->post('symptomIds'));$i++) {
							
$symptomId1.=','.$symptomIds[$i];
						} */
			
			$chatRoomNumber = $this->get_last_chat_room_number();	
			
			$chatRoomNumber = $chatRoomNumber + 1;		
						
			$symptomId1      = implode(',',$this->input->post('symptomIds'));
			$data = array(
				'specialityId' => $this->input->post('specialityId'),
				'doctorName'    => $this->input->post('doctorName'),
				'qualification'      => $this->input->post('qualification'),
				'doctorPassword'      => $this->doctorPassword,
				'gender'      => $this->input->post('gender'),
				'experience'      => $this->input->post('experience'),
				'doctorFee'      => $this->input->post('doctorFee'),
				'youtubeLink'      =>$this->input->post('youtubeLink'),
				'knownLanguages'      =>implode(',',$this->input->post('knownLanguages')),
				'doctorAddress'      =>$this->input->post('doctorAddress'),
				'specialization'      =>$symptomId1,
				'doctorSessionDuration'      =>$this->input->post('doctorSessionDuration'),
				'isVerified'        =>$this->input->post('isVerified'),
				//'medicalLicense'					=> $this->input->post('medicalLicense'),
				'isVerifiedLicense'      =>$this->input->post('isVerifiedLicense'),
				//'counsellingCertificate'      =>$this->input->post('counsellingCertificate'),
				'isVerifiedCertificate'      =>$this->input->post('isVerifiedCertificate'),
				'age'      => $this->input->post('age'),
				'doctorMobile'      => $this->input->post('doctorMobile'),
				'communicationMode'      => implode(',',$this->input->post('communicationMode')),
				'doctorEmail'      => $this->input->post('doctorEmail'),
				'chatRoomNumber'      => $chatRoomNumber,
				'medicalRegistrationNumber'      => $this->input->post('medicalRegistrationNumber'),
				'sequenceOrder'      => $this->input->post('sequenceOrder'),
				'createdDate'      => $createdDate,
				'status' => $status,
				'seoUri' => $seoUri
				
				
			);
		
				$this->db->insert('axdoctors', $data);
				$this->doctorId = $this->db->insert_id();

			$doctorId=$this->doctorId;

			$uniqueId=AXUNIQUEIDDOCTOR.$doctorId;
			$data = array(
					'uniqueId' => $uniqueId
				);
				$this->db->set($data); 
				$this->db->where("doctorId",$doctorId); 
				$this->db->update("axdoctors",$data);
				
				 $doctorId=$this->doctorId;
			 
			if($_FILES["doctorImageUrl"]['name'] <> ''){ 
				
			
				$doctorId = $this->doctor_model->uploadImage($this->doctorId);	
			}
			
			
				if($_FILES["medicalLicense"]['name'] <> ''){ 
			
				$doctorId = $this->doctor_model->uploadLicense($this->doctorId);	
			}
			
				
				if($_FILES["counsellingCertificate"]['name'] <> ''){ 
			
				$doctorId = $this->doctor_model->uploadCertificate($this->doctorId);	
			}
			
			
				return $doctorId;
		}
		
		
		
		
			
			
			
		public function uploadImage($doctorId){ 
				//echo "wqrr";exit;

			 $config['upload_path']   = AXUPLOADDOCTORSPATH; 
			 $config['allowed_types'] = 'jpg|png|jpeg';
			 //$config['max_size']      = 100; 
			 $config['overwrite'] 	  = TRUE;
			 $config['min_width']     = '278';         // restrict width to 1024px
			 $config['min_height']    = '181';          // restrict height to 768px
			 $config['max_width']     = '278';         // restrict width to 1024px
			 $config['max_height']    = '181';          // restrict height to 768px
			 
			 $filename 		= $_FILES["doctorImageUrl"]['name'];
			 $type    		= substr(strrchr(trim($filename), "."),1);
			 $doctorImageUrl	= "DOCTOR_".$doctorId.".".$type;
			 $config['file_name'] = $doctorImageUrl;
			 $this->load->library('upload', $config);
			 $this->upload->initialize($config);
			
			 if ( ! $this->upload->do_upload('doctorImageUrl')) {
				$error = array('error' => $this->upload->display_errors()); 
				$this->session->set_flashdata('error', $error['error']);
				return 0;
			 } else { 
				$data1 = array('upload_data' => $this->upload->data()); 
				
				$data = array(
					'doctorImageUrl' => $doctorImageUrl
				);
				$this->db->set($data); 
				$this->db->where("doctorId",$doctorId); 
				$this->db->update("axdoctors",$data);
				
				
				return $doctorId;
				
			 } 
      }
			public function uploadCertificate($doctorId){ 
				

			 $config['upload_path']   = AXUPLOADDOCTORSPATH; 
			 $config['allowed_types'] = 'jpg|png|jpeg';
			 //$config['max_size']      = 100; 
			 $config['overwrite'] 	  = TRUE;
			 $config['max_width']     = 1300; 
			 $config['max_height']    = 800;  
			 
			 $filename 		= $_FILES["counsellingCertificate"]['name'];
			 $type    		= substr(strrchr(trim($filename), "."),1);
			 $counsellingCertificate	= "CERTIFICATE_".$doctorId.".".$type;
			 $config['file_name'] = $counsellingCertificate;
			 $this->load->library('upload', $config);
			 $this->upload->initialize($config);
			
			 if ( ! $this->upload->do_upload('counsellingCertificate')) {
				$error = array('error' => $this->upload->display_errors()); 
				$this->session->set_flashdata('error', $error['error']);
				return 0;
			 } else { 
				$data1 = array('upload_data' => $this->upload->data()); 
				
				$data = array(
					'counsellingCertificate' => $counsellingCertificate
				);
				$this->db->set($data); 
				$this->db->where("doctorId",$doctorId); 
				$this->db->update("axdoctors",$data);
				
				
				return $doctorId;
				
			 } 
      }
	public function uploadLicense($doctorId){ 
				

			 $config['upload_path']   = AXUPLOADDOCTORSPATH; 
			 $config['allowed_types'] = 'jpg|png|jpeg';
			 //$config['max_size']      = 100; 
			 $config['overwrite'] 	  = TRUE;
			 $config['max_width']     = 1300; 
			 $config['max_height']    = 800;  
			 
			 $filename 		= $_FILES["medicalLicense"]['name'];
			 $type    		= substr(strrchr(trim($filename), "."),1);
			 $medicalLicense	= "LICENSE_".$doctorId.".".$type;
			 $config['file_name'] = $medicalLicense;
			 $this->load->library('upload', $config);
			 $this->upload->initialize($config);
			
			 if ( ! $this->upload->do_upload('medicalLicense')) {
				$error = array('error' => $this->upload->display_errors()); 
				$this->session->set_flashdata('error', $error['error']);
				return 0;
			 } else { 
				$data1 = array('upload_data' => $this->upload->data()); 
				
				$data = array(
					'medicalLicense' => $medicalLicense
				);
				$this->db->set($data); 
				$this->db->where("doctorId",$doctorId); 
				$this->db->update("axdoctors",$data);
				
				
				return $doctorId;
				
			 } 
      }
			
			
	public function validateImage()
	{
		if($_FILES["doctorImageUrl"]['name'] <> ''){
			
			$config['upload_path']   = AXUPLOADDOCTORSPATH; 
			$config['allowed_types'] = 'jpg|png|jpeg'; 
			//$config['max_size']      = 100; 
			$config['overwrite'] 	  = TRUE;
			 $config['min_width']     = '278';         // restrict width to 1024px
			 $config['min_height']    = '181';          // restrict height to 768px
			 $config['max_width']     = '278';         // restrict width to 1024px
			 $config['max_height']    = '181';          // restrict height to 768px
			$this->load->library('upload', $config);
			$this->upload->initialize($config);	
			if ( ! $this->upload->do_upload('doctorImageUrl')) {
				$error = array('error' => $this->upload->display_errors()); 
				$this->session->set_flashdata('error', $error['error']);
				return 0;
			 }else{
				//unlink(AXUPLOADDOCTORSPATH.$_FILES["doctorImageUrl"]['name']);
				return 1;	 
			 }
		}else{
				return 1;	 
			 }			  
	}
		
		
		
		
		public function getDoctor_id($doctorId = FALSE)
		{
			
			if ($doctorId === FALSE)
			{
					return 0;
			}
			$query = $this->db->get_where('axdoctors', array('doctorId' => $doctorId));
			return $query->row_array();
			
			
		}

		public function getDoctorDay_id($doctorId = FALSE,$availableDay=FALSE)
		{
			
			if ($doctorId === FALSE && $availableDay === FALSE)
			{
					return 0;
			}
			$this->db->select('*');
			
			$this->db->from('axavailablesessions');
			 $this->db->where('doctorId',$doctorId);
			 $this->db->where('availableDay',$availableDay);
			
			$query = $this->db->get();
			// echo $this->db->last_query(); exit; 
			return $query->row_array();
			
			
		}
		
		public function get_doctorAppoinments($doctorId = FALSE,$appointmentDate=FALSE)
		{
			
			if ($doctorId === FALSE && $appointmentDate === FALSE)
			{
					return 0;
			}
			$this->db->select('*');
			
			$this->db->from('axappointments');
			 $this->db->where('doctorId',$doctorId);
			 $this->db->where('appointmentDate',$appointmentDate);
			 
			$query = $this->db->get();
			// echo $this->db->last_query(); exit; 
			return $query->result_array();
			
			
		}
		
		
		
		public function get_patientAppoinments($patientId = FALSE,$appointmentDate=FALSE)
		{
			
			if ($patientId === FALSE && $appointmentDate === FALSE)
			{
					return 0;
			}
			$this->db->select('*');
			
			$this->db->from('axappointments');
			 $this->db->where('patientId',$patientId);
			 $this->db->where('appointmentDate',$appointmentDate);
			 
			$query = $this->db->get();
			// echo $this->db->last_query(); exit; 
			return $query->result_array();
			
			
		}
		
public function get_Doctor_appoinmentsforTime($doctorId = FALSE,$appointmentDate=FALSE,$appointmentStartTime =FALSE,$appointmentId=FALSE)
		{
			
			if ($doctorId === FALSE && $appointmentDate === FALSE)
			{
					return 0;
			}
			$this->db->select('*');
			
			$this->db->from('axappointments');
			 $this->db->where('doctorId',$doctorId);
			 $this->db->where('appointmentDate',$appointmentDate);
			 if($appointmentStartTime <>''){
				 
			$this->db->where('"'.$appointmentStartTime.'" BETWEEN appointmentStartTime and appointmentEndTime' );
			 
			 }
			 if($appointmentId<>'')
			 {
				 $this->db->where('appointmentId !=',$appointmentId);
				 }
			$query = $this->db->get();
			//echo $this->db->last_query(); exit; 
			return $query->result_array();
			
			
		}
		
		
public function get_Patient_appoinmentsforTime($patientId = FALSE,$appointmentDate=FALSE,$appointmentStartTime =FALSE,$appointmentId=FALSE)
		{
			
			if ($patientId === FALSE && $appointmentDate === FALSE)
			{
					return 0;
			}
			$this->db->select('*');
			
			$this->db->from('axappointments');
			 $this->db->where('patientId',$patientId);
			 $this->db->where('appointmentDate',$appointmentDate);
			 if($appointmentStartTime <>''){
				 
			$this->db->where('"'.$appointmentStartTime.'" BETWEEN appointmentStartTime and appointmentEndTime' );
			 
			 }
			  if($appointmentId<>'')
			 {
				 $this->db->where('appointmentId !=',$appointmentId);
				 }
			$query = $this->db->get();
			//echo $this->db->last_query(); exit; 
			return $query->result_array();
			
			
		}
		
		
		
		public function get_Doctor_sessions($doctorId = FALSE,$apptDay=FALSE,$appointmentSession=FALSE)
		{
			
			if ($doctorId === FALSE && $apptDay === FALSE && $appointmentSession === FALSE)
			{
					return 0;
			}
			$this->db->select('*');
			
			$this->db->from('axavailablesessions');
			 $this->db->where('doctorId',$doctorId);
			 $this->db->where('availableDay',$apptDay);
			 $this->db->where('availableSession',$appointmentSession);
			
			$query = $this->db->get();
			// echo $this->db->last_query(); exit; 
			return $query->result_array();
			
			
		}
		
		public function getAvailable_id($doctorId)
		{
			
			
			 $this->db->select('*');
			
			$this->db->from('axavailablesessions');
			 $this->db->where('doctorId',$doctorId);
			
			$query = $this->db->get();
			// echo $this->db->last_query(); exit; 
			return $query->result_array();
			 
		}

		public function getItem_Days($doctorId,$availableDay){
			 $this->db->select('*');
			
			$this->db->from('axavailablesessions');
			 $this->db->where('doctorId',$doctorId);
			$this->db->where('availableDay',$availableDay);
			
			$query = $this->db->get();
			// echo $this->db->last_query(); exit; 
			return $query->result_array();

		}


		public function getItem_morning($doctorId,$availableDay,$availableSession){
			 $this->db->select('*');
			
			$this->db->from('axavailablesessions');
			 $this->db->where('doctorId',$doctorId);
			 $this->db->where('availableDay',$availableDay);
			$this->db->where('availableSession',$availableSession);
			
			$query = $this->db->get();
			//echo $this->db->last_query(); exit; 
			return $query->row_array();

		}
		

		public function getAvailable_Item($doctorId)
		{
			
			
			 $query = $this->db->select('*');
			
			$this->db->from('axavailablesessions');
			 $this->db->where('doctorId',$doctorId);
			 
			$query = $this->db->get();
			// echo $this->db->last_query(); exit; 
			return $query->row_array();
			 
		}
		
		
		
		
	public function get_doctor_seoUri($seoUri = FALSE)
		{
			if ($seoUri === FALSE)
			{
					return 0;
			}
			$result_array = $this->db->get_where('axdoctors', array('seoUri' => $seoUri));
			return $result_array->row_array();
		}
		
		
		public function updateDoctor($doctorId) { 
			
			
		
			$this->load->helper('url');
			$seoUri = url_title($this->input->post('doctorName'), 'dash', TRUE);
			$modifiedDate=date('Y-m-d H:i:s');
			$status=1;
			$symptomId1      = implode(',',$this->input->post('symptomIds'));
		    //$language=	implode(',',$this->input->post('knownLanguages'));
			$data = array(
				
				'specialityId' => $this->input->post('specialityId'),
				'doctorName'    => $this->input->post('doctorName'),
				'qualification'      => $this->input->post('qualification'),
				'doctorPassword'      => $this->encryption->encrypt($this->input->post('doctorPassword')),
				'gender'      => $this->input->post('gender'),
				'experience'      => $this->input->post('experience'),
				'doctorFee'      => $this->input->post('doctorFee'),
				'youtubeLink'      =>$this->input->post('youtubeLink'),
				'knownLanguages'      => implode(',',$this->input->post('knownLanguages')),
				'doctorAddress'      =>$this->input->post('doctorAddress'),
				'specialization'      =>$symptomId1,
				'doctorSessionDuration'      =>$this->input->post('doctorSessionDuration'),
				'isVerified'        =>$this->input->post('isVerified'),
				'isVerifiedLicense'      =>$this->input->post('isVerifiedLicense'),
				'isVerifiedCertificate'      =>$this->input->post('isVerifiedCertificate'),
				'age'      => $this->input->post('age'),
				'doctorMobile'      => $this->input->post('doctorMobile'),
				'communicationMode'      => implode(',',$this->input->post('communicationMode')),
				'doctorEmail'      => $this->input->post('doctorEmail'),
				'chatRoomNumber'      => $this->input->post('chatRoomNumber'),
				'medicalRegistrationNumber'      => $this->input->post('medicalRegistrationNumber'),
				'sequenceOrder'      => $this->input->post('sequenceOrder'),
				'modifiedDate'      => $modifiedDate,
				'status' => $status,
				'seoUri' => $seoUri
				
			);
			$this->db->set($data); 
			$this->db->where("doctorId", $doctorId); 
			$this->db->update("axdoctors", $data); 
			
			$this->doctorId = $doctorId;
			
			
			if($_FILES["doctorImageUrl"]['name'] <> ''){ 
			
				$doctorId = $this->doctor_model->uploadImage($this->doctorId);	
			}
			
			
				if($_FILES["medicalLicense"]['name'] <> ''){ 
			
				$doctorId = $this->doctor_model->uploadLicense($this->doctorId);	
			}
			
				
				if($_FILES["counsellingCertificate"]['name'] <> ''){ 
			
				$doctorId = $this->doctor_model->uploadCertificate($this->doctorId);	
			}
			
				return $doctorId;
			 
			
			
			
			
		} 
		public function setAvailability($doctorId) { 
			$this->load->helper('url');
			$status=1;
			
			$arrWeekDay		= 	$this->config->item('arrWeekDay');
			$arrSessions	= 	$this->config->item('arrSessions');
			$availableDay = $this->input->post('availableDay');
			
			$cnt1=0;$cnt=0;
			if(count($availableDay)>0){
				$cnt=0;
				foreach($availableDay as $key=> $value){					
				
				$availableSession = $_POST['availableSession'.$value];
				
				$cnt1=0;
				foreach($availableSession as $key1=> $value1){
				
				$sessionStartTime = $_POST['startTime_'.$value.'_'.$value1];
				$sessionEndTime = $_POST['endTime_'.$value.'_'.$value1];
				
			$data = array(
				'doctorId'		=>$doctorId,
				'availableDay'    => $arrWeekDay[$availableDay[$cnt]],
				'availableSession'      => $arrSessions[$availableSession[$cnt1]],
				'availableStartTime'      => $sessionStartTime,
				'availableEndTime'      => $sessionEndTime,
				'status'				=>$status
				
			);
		
				$this->db->insert('axavailablesessions', $data);
				$this->doctorId = $this->db->insert_id();
			
				
				/* print_r($arrWeekDay[$availableDay[$cnt]]);
				print_r($arrSessions[$availableSession[$cnt1]]);
				print_r($sessionStartTime);
				print_r($sessionEndTime);
				echo"<br>"; */
				$cnt1=$cnt1+1;
				}	
				$cnt=$cnt+1;
				}
				
				
			}
			
			
					
					
			
					
		} 
		
public function updateAvailability($doctorId,$availableDay) { 

//echo $availableDay;exit;

				$this->db->where('doctorId',$doctorId);
				$this->db->where('availableDay',$availableDay);

				$this->db->delete('axavailablesessions');
				


			$this->load->helper('url');
			$status=1;
			
			//$arrWeekDay		= 	$this->config->item('arrWeekDay');
			//$arrSessions	= 	$this->config->item('arrSessions');
			//$availableDay = $this->input->post('availableDay');
			
			$availableDayId = 0;
			
			if($availableDay == 'Monday')
				$availableDayId = 1;
			else if($availableDay == 'Tuesday')
				$availableDayId = 2;
			else if($availableDay == 'Wednesday')
				$availableDayId = 3;	
			else if($availableDay == 'Thursday')
				$availableDayId = 4;	
			else if($availableDay == 'Friday')
				$availableDayId = 5;
			else if($availableDay == 'Saturday')
				$availableDayId = 6;	
			else if($availableDay == 'Sunday')
				$availableDayId = 7;		
							
			if($_POST['Morning_Start']<>"" && $_POST['Morning_End']<>"")
			{


			$data = array(
				'doctorId' => $doctorId,
				'availableDay'    => $availableDay,
				'availableSession'      => 'Morning (IST)',
				'availableStartTime'      => $this->input->post('Morning_Start'),
				'availableEndTime'      => $this->input->post('Morning_End'),
				'status'				=>$status,
				'availableDayId'		=>$availableDayId,
				'availableSessionsId'	=>1
				
				
				
			);//print_r($data);exit;
		
				$this->db->insert('axavailablesessions', $data);
				$this->db->insert_id();
			
			}	

			if($_POST['AfterNoon_Start']<>"" && $_POST['AfterNoon_End']<>"")
			{
			$data = array(
				'doctorId' => $doctorId,
				'availableDay'    => $availableDay,
				'availableSession'      => 'After Noon (IST)',
				'availableStartTime'      => $this->input->post('AfterNoon_Start'),
				'availableEndTime'      => $this->input->post('AfterNoon_End'),
				'status'				=>$status,
				'availableDayId'		=>$availableDayId,
				'availableSessionsId'	=>2
				
				
				
			);//print_r($data);exit;
		
				$this->db->insert('axavailablesessions', $data);
				$this->db->insert_id();
			
			}	

			if($_POST['Evening_Start']<>"" && $_POST['Evening_End']<>"")
			{
			$data = array(
				'doctorId' => $doctorId,
				'availableDay'    => $availableDay,
				'availableSession'      => 'Evening (IST)',
				'availableStartTime'      => $this->input->post('Evening_Start'),
				'availableEndTime'      => $this->input->post('Evening_End'),
				'status'				=>$status,
				'availableDayId'		=>$availableDayId,
				'availableSessionsId'	=>3
				
				
				
			);//print_r($data);exit;
		
				$this->db->insert('axavailablesessions', $data);
				$this->db->insert_id();
			
			}	
				
			if($_POST['Night_Start']<>"" && $_POST['Night_End']<>"")
			{
			$data = array(
				'doctorId' => $doctorId,
				'availableDay'    => $availableDay,
				'availableSession'      => 'Night',
				'availableStartTime'      => $this->input->post('Night_Start'),
				'availableEndTime'      => $this->input->post('Night_End'),
				'status'				=>$status
				
				
				
			);//print_r($data);exit;
		
				$this->db->insert('axavailablesessions', $data);
				$this->db->insert_id();
			
			}	
				


				
					
		} 
		




     public function activate_doctor($doctorIds) { 
		
			$this->db->where_in("doctorId", $doctorIds); 
			$status = 1;
			$data = array(
				'status' => $status
			);
			$this->db->update("axdoctors", $data);  
		} 
		
		public function deactivate_doctor($doctorIds) { 

			$this->db->where_in("doctorId", $doctorIds); 
			$status = 0;
			$data = array(
				'status' => $status
			);
			$this->db->update("axdoctors", $data);  
		} 
		
			
		


	
	public function getDoctor($limit = NULL, $start = NULL)
		{	
			$this->db->limit($limit, $start);
			
			$this->db->select('*');
			
			$this->db->from('axdoctors');
			
			if($this->doctorId != "")
				$this->db->where('doctorId', $this->doctorId);
				
				if($this->specialityId  != "")
				$this->db->where('specialityId ', $this->specialityId );
			
			
			if(trim($this->doctorName )!= "")
				$this->db->like('doctorName', $this->doctorName);
				
				if(trim($this->doctorEmail )!= "")
				$this->db->like('doctorEmail', $this->doctorEmail);
				
			if($this->status != "")
				$this->db->like('status', $this->status);
				
			if(trim($this->doctorMobile) != "")
				$this->db->like('doctorMobile', $this->doctorMobile);
				
				if(trim($this->qualification) != "")
				$this->db->like('qualification', $this->qualification);
				
				
				if(trim($this->experience) != "")
				$this->db->like('experience', $this->experience);
				
				if(trim($this->communicationMode) != "")
				$this->db->like('communicationMode', $this->communicationMode);
				
				if(trim($this->doctorFee) != "")
				$this->db->like('doctorFee', $this->doctorFee);
				
					if(trim($this->gender) != "")
				$this->db->like('gender', $this->gender);
				
				
				if(trim($this->seoUri) != "")
				$this->db->like('seoUri', $this->seoUri);
				
			
				
			if(trim($this->doctorIds) != ""){
				$doctorIds = explode(",",$doctorIds);
				$this->db->where_in('doctorId', $doctorIds);	
			}
			
			if($this->sortColumn == '')
				$this->sortColumn = "doctorId";
			
			if($this->sortDirection == '')
				$this->sortDirection = "DESC";	
						
			$this->db->order_by("$this->sortColumn", "$this->sortDirection");
			
			$query = $this->db->get();
			// echo $this->db->last_query(); exit; 
			return $query->result_array();

		}
		
		
		
		public function delete_doctor($doctorIds) { 
		
		$imageId=explode(',',$doctorIds);
		$this->db->select('doctorImageUrl');
		$this->db->from('axdoctors');
		$this->db->where_in('doctorId',$imageId);
		$query=$this->db->get();
		$result=$query->result_array();
		
		if(count($result))
		{
			foreach($result as $res)
			{
				unlink(FCPATH.AXUPLOADDOCTORSPATH.$res['doctorImageUrl']);
				}
			}
		
		
		
			 if ($this->db->delete("axdoctors", "doctorId IN ( ".$doctorIds.")")) {
				 
				
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
			
			if($this->doctorId != "")
				$this->db->where('doctorId', $this->doctorId);
				
				if($this->specialityId  != "")
				$this->db->where('specialityId', $this->specialityId);
			
				if(trim($this->doctorName) != "")
				$this->db->like('doctorName', $this->doctorName);
				
				if(trim($this->doctorEmail) != "")
				$this->db->like('doctorEmail', $this->doctorEmail);
				
				if($this->doctorMobile != "")
				$this->db->like('doctorMobile', $this->doctorMobile);
				
				if($this->age != "")
				$this->db->like('age', $this->age);
				
				if($this->gender != "")
				$this->db->like('gender', $this->gender);
				
				if($this->qualification != "")
				$this->db->like('qualification', $this->qualification);
				
				if($this->experience != "")
				$this->db->like('experience', $this->experience);
				
				if($this->communicationMode != "")
				$this->db->like('communicationMode', $this->communicationMode);
				
				
				
			if(trim($this->status) != "")
				$this->db->like('status', $this->status);
				
				
			if(trim($this->doctorIds) != ""){
				$doctorIds = explode(",",$doctorIds);
				$this->db->where_in('doctorId', $doctorIds);	
			}
			$this->db->from("axdoctors");
			return $this->db->count_all_results();
		}
		
		
		public function validateAvailability()
		{

			$arrWeekDay		= 	$this->config->item('arrWeekDay');
			$arrSessions	= 	$this->config->item('arrSessions');
			$availableDay = $this->input->post('availableDay');
			
			$cnt1=0;$cnt=0;
			if(count($availableDay)>0){
				$cnt=0;
				foreach($availableDay as $key=> $value){					
				
				$availableSession = $_POST['availableSession'.$value];
				
				$cnt1=0;
				foreach($availableSession as $key1=> $value1){
				
				$sessionStartTime = $_POST['startTime_'.$value.'_'.$value1];
				$sessionEndTime = $_POST['endTime_'.$value.'_'.$value1];
				$status=1;
				
			$data = array(
				'doctorId' => $doctorId,
				'availableDay'    => $arrWeekDay[$availableDay[$cnt]],
				'availableSession'      => $arrSessions[$availableSession[$cnt1]],
				'availableStartTime'      => $sessionStartTime,
				'availableEndTime'      => $sessionEndTime,
				'status'				=>$status
				
				
				
			);
		
				$this->db->insert('axavailablesessions', $data);
				$this->doctorId = $this->db->insert_id();
			
				
				$cnt1=$cnt1+1;
				}	
				$cnt=$cnt+1;
				}
				
				
			}
			
			
					
				
		}
		
		public function retrieveDoctor($seoUri = FALSE)
		{
			if ($seoUri === FALSE)
			{
					return 0;
			}
			$this->db->select('*');
			$this->db->from('axdoctors');
			$this->db->where('seoUri',$seoUri);
			$result_array = $this->db->get()->result_array();	
			$this->doctorId				    = $result_array[0]["doctorId"];
			$this->specialityId				= $result_array[0]["specialityId"];
			$this->doctorName				    = $result_array[0]["doctorName"];
			$this->youtubeLink		            = $result_array[0]["youtubeLink"];
			$this->knownLanguages		            = $result_array[0]["knownLanguages"];
			$this->specialization					= $result_array[0]["specialization"];
			$this->doctorAddress					= $result_array[0]["doctorAddress"];
			$this->qualification		            = $result_array[0]["qualification"];
			$this->doctorPassword		            = $result_array[0]["doctorPassword"];
			$this->experience					= $result_array[0]["experience"];
			$this->gender					= $result_array[0]["gender"];
			$this->doctorFee					= $result_array[0]["doctorFee"];
			$this->age					= $result_array[0]["age"];
			$this->doctorImageUrl					= $result_array[0]["doctorImageUrl"];
				$this->doctorMobile					= $result_array[0]["doctorMobile"];
			$this->communicationMode					= $result_array[0]["communicationMode"];
			
			$this->doctorEmail					= $result_array[0]["doctorEmail"];
			
			
			$this->createdDate					= $result_array[0]["createdDate"];
				$this->modifiedDate					= $result_array[0]["modifiedDate"];
			
			$this->status					= $result_array[0]["status"];
			$this->seoUri					= $result_array[0]["seoUri"];
			return 1;
		}
		public function retrieveAvailable($doctorId)
		{
			
			$this->db->select('*');
			$this->db->from('axavailablesessions');
			$this->db->where('doctorId',$doctorId);
			$result_array = $this->db->get()->result_array();	
			$this->doctorId				    = $result_array[0]["doctorId"];
			$this->availableDay				= $result_array[0]["availableDay"];
			$this->availableSession				= $result_array[0]["availableSession"];
			
			$this->availableStartTime				    = $result_array[0]["availableStartTime"];
			$this->availableEndTime	            = $result_array[0]["availableEndTime"];
			$this->status		            = $result_array[0]["status"];
			return $result_array;
		}
		
	public function get_last_chat_room_number(){

		$this->db->select('chatRoomNumber');

		$this->db->from('axdoctors');  

		$this->db->limit(1);			

		$this->db->order_by("doctorId", "DESC");

		$query = $this->db->get();
        
        if($query->num_rows() > 0){
        	
            $row_array = $query->row_array();
            
            return $row_array['chatRoomNumber'];
            
        }else{
        	return 0;
       	}

	}
	
	
	public function validateDoctorEmail($doctorEmail,$doctorId){

			$this->db->select('*');

			$this->db->from('axdoctors');
			
			if($doctorId  <> '')
				$this->db->where('doctorId  != ',$doctorId);

			if($doctorEmail != "")
				$this->db->where('doctorEmail',$doctorEmail);	

			$query1 	= $this->db->get();
//echo $this->db->last_query();exit;
			if($query1->num_rows() > 0)
			{
				
				return 0;
			}
			else{
				return 1;
			}
	
	
	}		
		
		
		
		public function validateDoctorMobile($doctorMobile,$doctorId){

			$this->db->select('*');

			$this->db->from('axdoctors');
			
			if($doctorId  <> '')
				$this->db->where('doctorId  != ',$doctorId);

			if($doctorMobile != "")
				$this->db->where('doctorMobile',$doctorMobile);	

			$query1 	= $this->db->get();
//echo $this->db->last_query();exit;
			if($query1->num_rows() > 0)
			{
				
				return 0;
			}
	return 1;
	
	}	


	public function validateDoctorMedicalregistraion($medicalRegistrationNumber,$doctorId){

			$this->db->select('*');

			$this->db->from('axdoctors');
			
			if($doctorId  <> '')
				$this->db->where('doctorId  != ',$doctorId);

			if($medicalRegistrationNumber != "")
				$this->db->where('medicalRegistrationNumber',$medicalRegistrationNumber);	

			$query1 	= $this->db->get();
//echo $this->db->last_query();exit;
			if($query1->num_rows() > 0)
			{
				
				return 0;
			}
	return 1;
	
	}	
		
}
?>