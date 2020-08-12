<?php

class Doctor_model extends CI_Model {

	public function __construct()

	{

		$this->sortColumn 						= 'doctorName';

		$this->sortDirection 					= 'ASC';

		$this->doctorId							= "";

		$this->uniqueId							= "";	

		$this->doctorName						= "";	

		$this->doctorEmail						= "";

		$this->doctorPassword					= "";

		$this->doctorMobile						= "";	

		$this->doctorImageUrl					= "";

		$this->youtubeLink						= "";	

		$this->specialityId						= "";

		$this->qualification					= "";

		$this->knownLanguages					= "";

		$this->experience						= "";	

		$this->doctorAddress					= "";

		$this->specialization					= "";	

		$this->doctorFee						= "";

		$this->age								= "";

		$this->gender							= "";

		$this->communicationMode				= "";

		$this->availableSession					= "";

		$this->status							= "";

		$this->seoUri							= "";

		$this->doctorSessionDuration			= "";

		

		$this->otp								= "";

		$this->isVerified						= "";

		$this->otpSendTime						= "";		

					

		$this->doctorIds						= "";	

		

		$this->errorMessage 					= "";

		$this->specialityIds					= "";	

		$this->availableDay						= "";	

		

		// Appointment Section

		

		$this->appointmentId 					= "";

		$this->requestDate 						= "";

		$this->requestSession 					= "";

		$this->appointmentDate 					= "";

		$this->appointmentSession 				= "";

		$this->isCompleted 						= "";

			

		

		

	}

		

	public function setPostGetVars(){	

				

		$this->doctorId							= trim($this->input->post_get('doctorId'));	

		$this->uniqueId							= trim($this->input->post_get('uniqueId'));		

		$this->doctorName						= trim($this->input->post_get('doctorName'));

		$this->doctorEmail						= trim($this->input->post_get('doctorEmail'));

		$this->doctorPassword					= trim($this->input->post_get('doctorPassword'));		

		$this->doctorMobile						= trim($this->input->post_get('doctorMobile'));	

		$this->doctorImageUrl					= trim($this->input->post_get('doctorImageUrl'));	

		$this->youtubeLink						= trim($this->input->post_get('youtubeLink'));		

		$this->specialityId						= trim($this->input->post_get('specialityId'));					

		$this->qualification					= trim($this->input->post_get('qualification'));			

		$this->knownLanguages					= trim($this->input->post_get('knownLanguages'));		

		$this->experience						= trim($this->input->post_get('experience'));		

		$this->doctorAddress					= trim($this->input->post_get('doctorAddress'));	

		$this->specialization					= trim($this->input->post_get('specialization'));	

		$this->doctorFee						= trim($this->input->post_get('doctorFee'));	

		$this->age								= trim($this->input->post_get('age'));	

		$this->gender							= trim($this->input->post_get('gender'));	

		$this->communicationMode				= trim($this->input->post_get('communicationMode'));	

		$this->availableSession					= trim($this->input->post_get('availableSession'));	

		$this->status							= trim($this->input->post_get('status'));	

		$this->seoUri							= trim($this->input->post_get('seoUri'));	

		$this->doctorSessionDuration			= trim($this->input->post_get('doctorSessionDuration'));

		

		$this->otp								= trim($this->input->post_get('otp'));		

				

		$this->specialityIds					= trim($this->input->post_get('specialityIds'));

		$this->availableDay						= trim($this->input->post_get('availableDay'));

		

		

		// Appointment Section

		$this->appointmentId					= trim($this->input->post_get('appointmentId'));	

		$this->requestDate						= trim($this->input->post_get('requestDate'));	

		$this->requestSession					= trim($this->input->post_get('requestSession'));	

		$this->appointmentDate					= trim($this->input->post_get('appointmentDate'));	

		$this->appointmentSession				= trim($this->input->post_get('appointmentSession'));	

		$this->isCompleted						= trim($this->input->post_get('isCompleted'));	

			

		

		$this->doctorIds						= trim($this->input->post_get('doctorIds'));						

				

	}			

					

					

	public function get_doctor($limit = NULL, $start = NULL)			

	{				

		$this->db->limit($limit, $start);	

					

		$this->db->select(' * ');			

					

		$this->db->from('axdoctors');			

		

		if(trim($this->doctorId) != "")			

			$this->db->where('doctorId', $this->doctorId);		

		

		if(trim($this->specialityId) != "")			

			$this->db->where('specialityId', $this->specialityId);	

			

		if(trim($this->status) != "")			

			$this->db->where('status', $this->status);				

	

		if(trim($this->uniqueId) != "")			

			$this->db->like('uniqueId', $this->uniqueId,'none');				

						

		if(trim($this->doctorMobile) != "")			

			$this->db->like('doctorMobile', $this->doctorMobile,'none');			

						

		if(trim($this->doctorName) != "")			

			$this->db->like('doctorName', $this->doctorName,'none');

			

		if(trim($this->doctorEmail) != "")			

			$this->db->like('doctorEmail', $this->doctorEmail,'none');	

			

		if(trim($this->youtubeLink) != "")			

			$this->db->like('youtubeLink', $this->youtubeLink,'none');				

					

		if(trim($this->qualification) != "")			

			$this->db->like('qualification', $this->qualification,'none');					

					

		if($this->sortColumn == '')			

			$this->sortColumn = "doctorName";			

					

		if($this->sortDirection == '')			

			$this->sortDirection = "ASC";				

						

		if(trim($this->doctorIds) != ""){			

			$doctorIds = explode(",",$this->doctorIds);				

			$this->db->where_in('doctorId', $doctorIds);				

		}	

		

		if(trim($this->specialityIds) != "")

			$this->db->where_in('specialityId', $this->specialityIds);

													

		$this->db->order_by("$this->sortColumn", "$this->sortDirection");	

				

		$query = $this->db->get();	

				

		return $query->result_array();			

	}

	

	

	public function get_doctor_list($limit = NULL, $start = NULL)			

	{				

		$this->db->limit($limit, $start);	

					

		$this->db->select(' doctorId,

							uniqueId AS doctorUniqueId,

							doctorName,

							doctorEmail,

							doctorMobile,

							qualification,

							doctorImageUrl,

							youtubeLink,

							doctorFee,

							communicationMode,

							doctorSessionDuration

					 	  ');			

					

		$this->db->from('axdoctors');	

									

		if($this->sortColumn == '')			

			$this->sortColumn = "doctorName";			

					

		if($this->sortDirection == '')			

			$this->sortDirection = "ASC";	

			

		if(trim($this->status) != "")			

			$this->db->where('status', $this->status);						

						

		if(trim($this->doctorIds) != ""){

						

			$doctorIds = explode(",",$this->doctorIds);	

					

			$this->db->where_in('doctorId', $doctorIds);				

		}	

		

		if(trim($this->specialityIds) != ""){		

			

			$specialityIds = explode(",",$this->specialityIds);	

					

			$this->db->where_in('specialityId', $specialityIds);				

		}

		

		if(trim($this->specialization) != "")			

			$this->db->like('specialization', $this->specialization);		

										

		$this->db->order_by("$this->sortColumn", "$this->sortDirection");	

				

		$query = $this->db->get();	

		//echo 	$this->db->last_query();die();	

		return $query->result_array();			

	}

	

	

	public function get_doctor_by_uniqueId($uniqueId)

	{	

		if($uniqueId == '')

			return 0;



		$this->db->select('

							axdoctors.doctorId,

							axdoctors.uniqueId AS doctorUniqueId,

							axdoctors.doctorName,

							axdoctors.doctorEmail,

							axdoctors.doctorMobile,

							axdoctors.qualification,

							axdoctors.doctorImageUrl,

							axdoctors.experience,

							axdoctors.knownLanguages,

							axdoctors.specialization,

							axdoctors.youtubeLink,

							axdoctors.doctorAddress,

							axdoctors.communicationMode,
							
							axdoctors.doctorFee,

							axdoctors.doctorSessionDuration,

							axspeciality.specialityName

							

							');

		

		$this->db->from('axdoctors');

		

		$this->db->join('axspeciality', 'axspeciality.specialityId = axdoctors.specialityId', 'left');

		

		if($uniqueId != ""){

			$this->db->where('axdoctors.uniqueId',$uniqueId);

		}

		

		$this->db->group_by('axdoctors.doctorId');

		

		$query = $this->db->get();

		//echo  $this->db->last_query();die();

		return $query->row_array();

	}

					

	public function validate_doctor(){			

					

		$valid = 1;			

					

		if($this->doctorName == '')			

			return 0;				

		if($this->doctorEmail == '')			

			return 0;	

		/* if($this->doctorMobile == '')			

			return 0;	*/

		if($this->specialityId == '')			

			return 0;	

		if($this->qualification == '')			

			return 0;	

		if($this->knownLanguages == '')			

			return 0;

		if($this->doctorAddress == '')			

			return 0;

		if($this->specialization == '')			

			return 0;

		if($this->doctorFee == '')			

			return 0;	

		if($this->communicationMode == '')			

			return 0;	

		if($this->doctorSessionDuration == '')			

			return 0;	

			

			

		if($this->doctorEmail <> ''){

			

			$this->db->select('status');



			$this->db->from('axdoctors');

	

			$this->db->where('doctorEmail',$this->doctorEmail);

			

			if(trim($this->uniqueId) != "")			

				$this->db->where('uniqueId !=', $this->uniqueId);

	

			$query = $this->db->get();

	

			if($query->num_rows() > 0){	

			

				$this->errorMessage = 480;

	

				return 0;	

	

			}else{

				

				$this->db->select('status');

	

				$this->db->from('axpatient');

		

				$this->db->where('patientEmail',$this->doctorEmail);

				

				if(trim($this->uniqueId) != "")			

					$this->db->where('uniqueId !=', $this->uniqueId);

		

				$query = $this->db->get();

		

				if($query->num_rows() > 0){	

				

					$this->errorMessage = 480;		

		

					return 0;	

		

				}

				

			}	

			

		}	

								

									

		return 1;											

						

	}	

	

	public function validate_mobile_doctor(){

		

		if($this->doctorMobile <> ''){

			

			$this->db->select('status');



			$this->db->from('axdoctors');

	

			$this->db->where('doctorMobile',$this->doctorMobile);

			

			if(trim($this->uniqueId) != "")			

				$this->db->where('uniqueId !=', $this->uniqueId);

	

			$query = $this->db->get();

	

			if($query->num_rows() > 0){	

			

				$this->errorMessage = 482;

	

				return 0;	

	

			}else{

				

				$this->db->select('status');

	

				$this->db->from('axpatient');

		

				$this->db->where('patientMobile',$this->doctorMobile);

				

				if(trim($this->uniqueId) != "")			

					$this->db->where('uniqueId !=', $this->uniqueId);

		

				$query = $this->db->get();

		

				if($query->num_rows() > 0){	

				

					$this->errorMessage = 482;	

		

					return 0;	

		

				}

				

			}

			

			return 1;	

			

		}else{

			

			return 0;	

			

		}	

		

		

	}

		

	

	public function set_doctor()			

	{		

		if(!$this->validate_doctor()) return 0;

		

		$createdDate = date("Y-m-d H:i:s", now('Asia/Kolkata'));			

					

		$data = array(					

			'doctorName' 				=> $this->doctorName,			

			'doctorEmail' 				=> $this->doctorEmail,	

			'doctorPassword' 			=> $this->encryption->encrypt($this->doctorPassword),

			'doctorMobile' 				=> $this->doctorMobile,	

			'youtubeLink' 				=> $this->youtubeLink,	

			'specialityId' 				=> $this->specialityId,	

			'qualification' 			=> $this->qualification,			

			'knownLanguages' 			=> $this->knownLanguages,		

			'experience' 				=> $this->experience,		

			'doctorAddress' 			=> $this->doctorAddress,

			'specialization' 			=> $this->specialization,

			'doctorFee' 				=> $this->doctorFee,

			'age' 						=> $this->age,

			'gender' 					=> $this->gender,

			'communicationMode' 		=> $this->communicationMode,

			'doctorSessionDuration' 	=> $this->doctorSessionDuration,

			'status' 					=> 1,

			'createdDate' 				=> $createdDate			

		);			

					

		$this->db->insert('axdoctors', $data);			

					

		$this->doctorId = $this->db->insert_id();	

		

		$this->uniqueId 		= 	'METROMINDD'.$this->doctorId;



		$data = array(

		

			'uniqueId' 			=> $this->uniqueId

			

		);

		

		$this->db->where("doctorId", $this->doctorId); 



		$this->db->update("axdoctors", $data);	

		

		$doctorId = $this->doctorId;

		

		if(isset($_FILES["doctorImageUrl"])){



			$doctorId = $this->upload_image($this->uniqueId);



		}			

					

		return $doctorId;			

	}		

	

	public function upload_image($uniqueId) {

		

		if($uniqueId == '') return 0; 



		$config['upload_path']   	= '../uploads/doctors/'; 



		$config['allowed_types'] 	= 'jpg|gif|png|jpeg|JPG|PNG'; 



		//$config['max_size']      	= 2048; 



		$config['overwrite'] 	  	= TRUE;



		//$config['max_width']     	= 1300; 



		//$config['max_height']    	= 800;  



		$filename 					= $_FILES["doctorImageUrl"]['name'];



		$type    					= substr(strrchr(trim($filename), "."),1);



		$doctorImageUrl				= $uniqueId.".".$type;



		$config['file_name']		= $doctorImageUrl;



		$this->load->library('upload', $config);



		$this->upload->initialize($config);



		if ( ! $this->upload->do_upload('doctorImageUrl')) {



		$error = array('error' => $this->upload->display_errors()); 

		

		if($error['error'] == "<p>The image you are attempting to upload doesn't fit into the allowed dimensions.</p>"){



			$this->errorMessage = 477;



		}else if($error['error'] == "<p>The filetype you are attempting to upload is not allowed.</p>"){

			

			$this->errorMessage = 476;

			

		}



		return 0;



		} else { 



		$data1 = array('upload_data' => $this->upload->data()); 



		$data = array(



			'doctorImageUrl' => $doctorImageUrl



		);



		$this->db->set($data); 



		$this->db->where("uniqueId", $uniqueId); 



		$this->db->update("axdoctors", $data);



		return $uniqueId;



		} 

	}	

					

	public function update_doctor($uniqueId) { 			

				

		if($uniqueId == '')			

			return 0;			

			

		if(!$this->validate_doctor()) return 0;		

					

		$data = array(			

			'doctorName' 				=> $this->doctorName,			

			'doctorEmail' 				=> $this->doctorEmail,	

			'youtubeLink' 				=> $this->youtubeLink,	

			'specialityId' 				=> $this->specialityId,	

			'qualification' 			=> $this->qualification,			

			'knownLanguages' 			=> $this->knownLanguages,		

			'experience' 				=> $this->experience,		

			'doctorAddress' 			=> $this->doctorAddress,

			'specialization' 			=> $this->specialization,

			'doctorFee' 				=> $this->doctorFee,

			'age' 						=> $this->age,

			'gender' 					=> $this->gender,

			'communicationMode' 		=> $this->communicationMode,

			'doctorSessionDuration' 	=> $this->doctorSessionDuration		

		);			

					

		$this->db->set($data); 		

			

		$this->db->where('uniqueId', $uniqueId);

						

		$this->db->update("axdoctors", $data); 			



		if(isset($_FILES["doctorImageUrl"])){



			$uniqueId = $this->upload_image($uniqueId);



		}	

					

		return $uniqueId;			

					

	} 	

	

	public function update_mobile_doctor($uniqueId) { 			

				

		if($uniqueId == '')			

			return 0;		

			

		if(!$this->validate_mobile_doctor()) return 0;	

			

		$modifiedDate = date("Y-m-d H:i:s", now('Asia/Kolkata'));		

					

		$data = array(			

			'doctorMobile' 					=> $this->doctorMobile,
			
			'otp' 							=> $this->otp,

			'isVerified' 					=> 0,	

			'modifiedDate' 					=> $modifiedDate			

		);			

					

		$this->db->set($data); 			

		$this->db->where('uniqueId', $uniqueId);				

		$this->db->update("axdoctors", $data); 		

		

		if(!$this->db->affected_rows())

			return 0;



		//$this->send_otp_doctor($uniqueId);

	

		return $uniqueId;			

					

	} 		

	

	

	public function send_otp_doctor($uniqueId){	

	

		if($uniqueId == '')

			return 0;

			

		$data = array(



			'otp' 			=> rand (1000,9999)



		);



		$this->db->set($data); 



		$this->db->where("uniqueId", $uniqueId); 



		$this->db->update("axdoctors", $data);	





		$this->db->select('uniqueId,doctorName,doctorEmail,doctorMobile,otp');

		

		$this->db->from('axdoctors');

		

		$this->db->where("uniqueId", $uniqueId); 

		

		$result_array = $this->db->get()->result_array();

		

		if(count($result_array) > 0){

			

			$this->uniqueId		= $result_array[0]["uniqueId"];

			$doctorName			= $result_array[0]["doctorName"];

			$doctorEmail		= $result_array[0]["doctorEmail"];

			$doctorMobile		= $result_array[0]["doctorMobile"];

			$otp				= $result_array[0]["otp"];

		

			

			/*$settingId = 1;

			$this->db->select('adminEmail');

			$this->db->from('setting');

			$this->db->where('settingId',$settingId);

			$result_array1 = $this->db->get()->result_array();		

			

			$from 		=	$result_array1[0]['adminEmail'];

			

			$to			= 	$doctorEmail;

			

			$this->email->set_newline("\r\n");

            $this->email->set_header('MIME-Version', '1.0; charset=utf-8');

            $this->email->set_header('Content-type', 'text/html');

			

			$message 			= "";			

			$this->email->from($from, 'Metro Mind'); 

			$this->email->to($to);			

			$this->email->subject('Metro Mind Notifications'); 

			

			$message 	= '	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

							<html xmlns="http://www.w3.org/1999/xhtml">

								<body>

									<div style="width: 85%;border: 2px solid #00C1B6;padding: 15px;">

									

								

									<table width="100%" border="0" >

										<tr>

											<td align="center" colspan="2">&nbsp;</td>

										</tr>	

										<tr>

											<td align="left" colspan="2">Dear '.$doctorName.',</td>

										</tr>	

										<tr>

											<td align="left" colspan="2">'.$this->otp.' is your One Time Password for Metro Mind&trade; Login</td>

										</tr>

										<tr>

											<td align="center" colspan="2">&nbsp;</td>

										</tr>	

										

										 <tr>

											<td align="left" width="40%" valign="top">Regards ,</td>

										</tr>

										

										<tr>

											<td align="left" colspan="14">Metro Mind&trade; Administration</td>

										</tr>					  

										<tr>

											<td>&nbsp;</td>

										</tr>

									</table>

									</div>

								</body>

							</html>	'; 

			 $this->email->message($message); 

	   

			 //Send mail 

			 if($this->email->send()) 

				return 1;

			 else 

				return 0;

				

		*/

		

		return 1;

		

		}else{

			return 0;	

		}

	}

	

	

	public function verify_otp_doctor($uniqueId,$otp){



		if($uniqueId == '' || $otp == '')



			return 0;



		$this->db->select('uniqueId');



		$this->db->from('axdoctors');



		$this->db->where('uniqueId',$uniqueId,'none');



		$this->db->where('otp',$otp,'none');



		$result_array = $this->db->get()->result_array();

		

		if(count($result_array) > 0){

			

			$data = array(

			

				'isVerified' 		=> 1

	

			);

	

			$this->db->set($data); 

	

			$this->db->where("uniqueId", $uniqueId); 

	

			$this->db->update("axdoctors", $data);	



			return 1;



		}else{



			return 0;	



		}							



	}

				

	public function get_doctor_id($doctorId = FALSE)			

	{			

		if ($doctorId === FALSE)			

		{			

				return 0;			

		}			

				

		$this->db->select('

							axdoctors.doctorId,

							axdoctors.uniqueId AS doctorUniqueId,

							axdoctors.doctorName,

							axdoctors.doctorEmail,

							axdoctors.doctorMobile,

							axdoctors.qualification,

							axdoctors.doctorImageUrl,

							axdoctors.experience,

							axdoctors.knownLanguages,

							axdoctors.specialization,

							axdoctors.youtubeLink,

							axdoctors.doctorAddress,

							axdoctors.communicationMode,
							
							axdoctors.doctorFee,

							axdoctors.doctorSessionDuration,

							axdoctors.specialityId,

							axdoctors.communicationMode,

							axspeciality.specialityName

							

							');

		

		$this->db->from('axdoctors');

		

		$this->db->join('axspeciality', 'axspeciality.specialityId = axdoctors.specialityId', 'left');

		

		$this->db->where('axdoctors.doctorId',$doctorId);



		$this->db->group_by('axdoctors.doctorId');

		

		$query = $this->db->get();

		//echo  $this->db->last_query();die();

		return $query->row_array();	

	}			

				

	public function delete_doctor($doctorIds) { 			

		 if ($this->db->delete("axdoctors", "doctorId IN ( ".$doctorIds.")")) { 			

			return true; 			

		 } 			

	} 		

	

	public function get_doctor_sessions($doctorId)

	{	

		if($doctorId == '')

			return 0;



		$this->db->select('

							availableDay,

							availableSession

						  ');

		

		$this->db->from('axavailablesessions');

		

		$this->db->where('doctorId',$doctorId);

		

		if(trim($this->availableDay) != "")			

			$this->db->where('availableDay', $this->availableDay);	

			

		if(trim($this->status) != "")			

			$this->db->where('status', $this->status);							

		

		$query = $this->db->get();

		//echo  $this->db->last_query();die();

		return $query->result_array();

	}	

					

	  			

	public function get_count() {			

					

		if(trim($this->doctorId) != "")			

			$this->db->where('doctorId', $this->doctorId);			

						

		if(trim($this->youtubeLink) != "")			

			$this->db->where('youtubeLink', $this->youtubeLink);			

					

		if(trim($this->specialityId) != "")			

			$this->db->where('specialityId', $this->specialityId);				

						

		if(trim($this->doctorName) != "")			

			$this->db->like('doctorName', $this->doctorName,'none');			

						

		if(trim($this->qualification) != "")			

			$this->db->like('qualification', $this->qualification,'none');			

					

		if(trim($this->uniqueId) != "")			

			$this->db->like('uniqueId', $this->uniqueId,'none');				

						

		if(trim($this->doctorMobile) != "")			

			$this->db->like('doctorMobile', $this->doctorMobile,'none');				

						

		if(trim($this->doctorIds) != ""){			

			$doctorIds = explode(",",$this->doctorIds);				

			$this->db->where_in('doctorId', $doctorIds);				

		}			

					

		$this->db->from("axdoctors");			

					

		return $this->db->count_all_results();			

	}			

				

	public function setPageNumber($pageNumber) {			

		$this->_pageNumber = $pageNumber;			

	}			

				

	public function setOffset($offset) {			

		$this->_offset = $offset;			

	}

	

	public function get_doctor_id_by_uniqueId($uniqueId = FALSE){

		

		if ($uniqueId === FALSE){

				return 0;

		}

		

		$this->db->select('doctorId');

			

		$this->db->from("axdoctors");

		

		$this->db->where('uniqueId', $uniqueId);

		

		$query = $this->db->get();

		

		$row_array = $query->row_array();

		

		return $row_array['doctorId'];

	}		

	

	

	public function update_appointment_status_doctor($appointmentId)

	{

		if($appointmentId == '') return 0;	

		

		if($this->appointmentDate <> '')

			$this->appointmentDate = date('Y-m-d',strtotime($this->appointmentDate));

		else

			$this->appointmentDate = '0000-00-00';

		

		$data = array(

			'appointmentDate' 		=> $this->appointmentDate,

			'appointmentSession' 	=> $this->appointmentSession,

			'status' 				=> $this->status



		);



		$this->db->set($data); 	

				

		$this->db->where('appointmentId', $appointmentId);	

					

		$this->db->update("axappointments", $data); 



		$this->db->select('patientId,doctorId');

			

		$this->db->from("axappointments");

		

		$this->db->where('appointmentId', $appointmentId);

		

		$query = $this->db->get();

	

		if($query->num_rows() > 0){	

	

			$row_array = $query->row_array();

			$notificationTitle = '';

			if($this->status == 1)

				$notificationTitle = 'Your online appointment with '.$this->input->post_get('uniqueId').' is booked !';

			else if($this->status == 2){

				

				$this->db->delete("axnotifications", "appointmentId IN ( ".$appointmentId.")");

				

				$notificationTitle = 'Your online appointment with '.$this->input->post_get('uniqueId').' is rejected !';

			

			}else if($this->status == 3){

				$this->db->delete("axnotifications", "appointmentId IN ( ".$appointmentId.")");

				$notificationTitle = $this->input->post_get('uniqueId').' canceled the appointment!';

			

			}

				

			

			$data = array(

				'patientId' 		=> $row_array['patientId'],

				'doctorId' 			=> $row_array['doctorId'],

				'appointmentId' 	=> $appointmentId,

				'notificationType' 	=> $this->status,

				'notificationTitle' => $notificationTitle

	

			);

			

			$this->db->insert('axnotifications', $data);

		}

			



		return $appointmentId ;

	}

	

	public function complete_appointment_doctor($appointmentId)

	{

		if($appointmentId == '') return 0;	

		

		$completedTime = date("Y-m-d H:i:s", now('Asia/Kolkata'));

		

		$data = array(

			'isCompleted' 			=> 1,

			'completedTime' 		=> $completedTime



		);



		$this->db->set($data); 	

				

		$this->db->where('appointmentId', $appointmentId);	

					

		$this->db->update("axappointments", $data); 	



		return $appointmentId ;

	}

	

	

	public function get_requested_doctor_appointments($doctorId)

	{	

		if($doctorId == '')

			return 0;

		

		$this->db->select(' 

							axappointments.appointmentId,

							DATE_FORMAT(axappointments.requestDate, "%d-%b-%Y") AS requestDate,

							axappointments.requestSession,

							CONCAT(axpatient.firstName , " ", axpatient.lastName) AS clientName,

							axpatient.uniqueId AS clientUniqueId

						  ');

		

		$this->db->from('axappointments');

		

		$this->db->join('axpatient', 'axpatient.patientId = axappointments.patientId', 'left');



		$this->db->where('doctorId',$doctorId);

			

		$this->db->where('axappointments.status',0);

			

		$this->db->where('axappointments.requestDate >= ',date("Y-m-d"));			

			

		$this->db->group_by('axappointments.appointmentId');	

		

		$query = $this->db->get();

		//echo  $this->db->last_query();die();

		return $query->result_array();

	}

	

	public function get_doctor_fixed_appointments($doctorId)

	{	

		if($doctorId == '')

			return 0;

		

		$this->db->select(' 

							axappointments.appointmentId,

							DATE_FORMAT(axappointments.appointmentDate, "%d-%b-%Y") AS appointmentDate,

							axappointments.appointmentSession,

							CONCAT(axpatient.firstName , " ", axpatient.lastName) AS clientName,

							axpatient.uniqueId AS clientUniqueId

						  ');

		

		$this->db->from('axappointments');

		

		$this->db->join('axpatient', 'axpatient.patientId = axappointments.patientId', 'left');

		

		$this->db->where('doctorId',$doctorId);



		$this->db->where('axappointments.status',1);	

		

		$this->db->where('axappointments.isCompleted',0);	
		
		
		$this->db->where('axappointments.appointmentDate >= ',date("Y-m-d"));	

			
		$this->db->group_by('axappointments.appointmentId');	

		

		$query = $this->db->get();

		//echo  $this->db->last_query();die();

		return $query->result_array();

	}

	

	public function get_doctor_completed_appointments($doctorId)

	{	

		if($doctorId == '')

			return 0;

		

		$this->db->select(' 

							axappointments.appointmentId,

							DATE_FORMAT(axappointments.appointmentDate, "%d-%b-%Y") AS appointmentDate,

							axappointments.appointmentSession,

							CONCAT(axpatient.firstName , " ", axpatient.lastName) AS clientName,

							axpatient.uniqueId AS clientUniqueId

						  ');

		

		$this->db->from('axappointments');

		

		$this->db->join('axpatient', 'axpatient.patientId = axappointments.patientId', 'left');



		$this->db->where('doctorId',$doctorId);

			

		$this->db->where('axappointments.isCompleted',1);			

			

		$this->db->group_by('axappointments.appointmentId');	

		

		$query = $this->db->get();

		//echo  $this->db->last_query();die();

		return $query->result_array();

	}
	
	
	public function get_doctor_completed_appointments_count($doctorId,$isDistinct)
	{	

		if($doctorId == '')

			return 0;
		$this->db->where('doctorId',$doctorId);

		$this->db->where('axappointments.isCompleted',1);	
				
		if($isDistinct == 0)
			$this->db->group_by('axappointments.appointmentId');
		else if($isDistinct == 1)
			$this->db->group_by('axappointments.patientId');	
		
		$this->db->from("axappointments");		

		return $this->db->count_all_results();			

	}	

	

	public function get_doctor_consultation_fee($doctorId){

		

		if($doctorId == '') return 0;

		

		$this->db->select('doctorFee,doctorSessionDuration');

			

		$this->db->from("axdoctors");

		

		$this->db->where('doctorId', $doctorId);

		

		$query = $this->db->get();

		

		$paymentAmount 			= 0;

		

		if($query->num_rows() > 0){	

		

			$row_array = $query->row_array();



			$this->doctorFee 				= $row_array['doctorFee'];

			

			$this->doctorSessionDuration 	= $row_array['doctorSessionDuration'];

		}	

	}

	

	

	public function get_consultation_count($doctorId) {

		

		if($doctorId == '') return 0;



		$this->db->where('doctorId',$doctorId);

			

		$this->db->where('isCompleted',1);		

		

		$this->db->from("axappointments");

		

		return $this->db->count_all_results();

	}

	

	

	public function get_payment_history_doctor($doctorId)

	{	

		if($doctorId == '')

			return 0;

		

		$this->db->select(' 

							CONCAT(axpatient.firstName , " ", axpatient.lastName) AS patientName,

							axpatient.uniqueId  AS patientUniqueId,

							axpayments.paymentAmount,

							axpayments.paymentDate

						  ');

		

		$this->db->from('axpayments');

		

		$this->db->join('axpatient', 'axpatient.patientId = axpayments.patientId', 'left');



		$this->db->where('axpayments.doctorId',$doctorId);

		

		if($this->paymentStatus <> '')

			$this->db->where('axpayments.paymentStatus',$this->paymentStatus );	

		

		$query = $this->db->get();

		//echo  $this->db->last_query();die();

		return $query->result_array();

	}
	
	public function get_total_payment_doctor($doctorId)
	{	
		if($doctorId == '')
			return 0;

		$totalPaymentAmount = 0;

		$this->db->select('SUM(paymentAmount) AS totalPaymentAmount');

		$this->db->from('axpayments');
		
		$this->db->where('axpayments.doctorId',$doctorId);

		$this->db->where('axpayments.paymentStatus',1);	

		$query = $this->db->get();

		if($query->num_rows() > 0){	
		
			$row_array = $query->row_array();
			
			$totalPaymentAmount = $row_array['totalPaymentAmount']; 
		}

		return $totalPaymentAmount;

	}

	

	public function get_communication_history_doctor($doctorId)

	{	

		if($doctorId == '')

			return 0;

		

		$this->db->select(' 

							CONCAT(axpatient.firstName , " ", axpatient.lastName) AS patientName,

							axpatient.uniqueId  AS patientUniqueId,

							axpatientrecords.communicationMode,

							axpatientrecords.communicationStartTime,

							axpatientrecords.communicationEndTime,

							axpatientrecords.communicationDuration

						  ');

		

		$this->db->from('axpatientrecords');

		

		$this->db->join('axpatient', 'axpatient.patientId = axpatientrecords.patientId', 'left');



		$this->db->where('axpatientrecords.doctorId',$doctorId);

		

		$query = $this->db->get();

		//echo  $this->db->last_query();die();

		return $query->result_array();

	}

	

	

	public function change_password_doctor($uniqueId,$confirmPassword){



		if($uniqueId == '' || $confirmPassword == '')



			return 0;



		$this->db->select('doctorPassword');



		$this->db->from('axdoctors');



		$this->db->where("uniqueId", $uniqueId); 



		$query = $this->db->get();



		if($query->num_rows() > 0){	



			$row_array = $query->row_array();



			if (trim($this->encryption->decrypt($row_array["doctorPassword"])) <> trim($this->input->post_get('currentPassword'))) {	



				$this->errorMessage  = 473;



				return 0;



			}else{



				$data = array(



					'doctorPassword' 		=> $this->encryption->encrypt($confirmPassword)



				);



				$this->db->set($data); 



				$this->db->where("uniqueId", $uniqueId);



				$this->db->update("axdoctors", $data); 



				$this->errorMessage  = 472;



				return 1;					



			}



		}else{



			return 0;	



		}	



	}

	

	

	public function get_requested_appointment_details_doctor($appointmentId)

	{	

		if($appointmentId == '')

			return 0;

		

		$this->db->select('

							axappointments.appointmentId,

							DATE_FORMAT(axappointments.requestDate, "%d-%b-%Y") AS requestDate,

							axappointments.requestSession,
							
							CONCAT(axpatient.firstName , " ", axpatient.lastName) AS clientName,

							axpatient.uniqueId AS clientUniqueId

							

							');

		

		$this->db->from('axappointments');

		

		$this->db->join('axpatient', 'axpatient.patientId = axappointments.patientId', 'left');

		

		$this->db->where('axappointments.appointmentId',$appointmentId);

		

		$this->db->group_by('axappointments.appointmentId');

		

		$query = $this->db->get();

		//echo  $this->db->last_query();die();

		return $query->row_array();

	}

	

	

	public function get_appointment_details_doctor($appointmentId)

	{	

		if($appointmentId == '')

			return 0;

		

		$this->db->select('


							axappointments.appointmentId,

							DATE_FORMAT(axappointments.appointmentDate, "%d-%b-%Y") AS appointmentDate,

							axappointments.appointmentSession,

							CONCAT(axpatient.firstName , " ", axpatient.lastName) AS clientName,

							axpatient.uniqueId AS clientUniqueId

							

							');

		

		$this->db->from('axappointments');

		

		$this->db->join('axpatient', 'axpatient.patientId = axappointments.patientId', 'left');

		

		$this->db->where('axappointments.appointmentId',$appointmentId);

		

		$this->db->group_by('axappointments.appointmentId');

		

		$query = $this->db->get();

		//echo  $this->db->last_query();die();

		return $query->row_array();

	}

	
	public function get_prescriptions_doctor($patientId)

	{	

		if($patientId == '')

			return 0;

		

		$this->db->select(' 

							prescriptionId,

							prescriptionNotes,

							DATE_FORMAT(insDate, "%d-%b-%Y %h:%i %p") AS insDate,
							
							CONCAT(axpatient.firstName , " ", axpatient.lastName) AS clientName,

							axpatient.uniqueId AS clientUniqueId

						  ');

		

		$this->db->from('axprescriptions');

		

		$this->db->join('axpatient', 'axpatient.patientId = axprescriptions.patientId', 'left');



		$this->db->where('axprescriptions.patientId',$patientId);

		

		if($this->doctorId <> '')

			$this->db->where('axprescriptions.doctorId',$this->doctorId);

		

		$query = $this->db->get();

		//echo  $this->db->last_query();die();

		return $query->result_array();

	}

	

	public function get_notifications_doctor($doctorId)

	{	

		if($doctorId == '')

			return 0;

		

		$this->db->select(' 

							appointmentId,

							notificationTitle,

							DATE_FORMAT(notificationTime, "%d-%b-%Y %h:%i %p") AS notificationTime

						  ');

		

		$this->db->from('axnotifications');



		$this->db->where('axnotifications.doctorId',$doctorId);

		

		$this->db->where('axnotifications.notificationType IN (0)');

		

		$query = $this->db->get();

		//echo  $this->db->last_query();die();

		return $query->result_array();

	}

	

			

}			

?>