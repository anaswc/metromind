<?php

class Patient_model extends CI_Model {

	public function __construct()

	{

		$this->sortColumn 						= 'firstName';

		$this->sortDirection 					= 'ASC';

		$this->patientId						= "";	

		$this->firstName						= "";	

		$this->lastName							= "";	

		$this->uniqueId							= "";	

		$this->patientMobile					= "";	

		$this->countryId						= "";	

		$this->gender							= "";

		$this->patientEmail						= "";

		$this->patientPassword					= "";

		$this->birthDate						= "";

		$this->customGender						= "";	

		$this->profileImgUrl					= "";

		

		$this->patientAddress					= "";

			

		$this->status							= "";

		$this->otp								= "";

		$this->isVerified						= "";

		$this->otpSendTime						= "";			

		$this->patientIds						= "";	

		

		$this->errorMessage 					= "";

		

		// Appointment Section

		

		$this->appointmentId 					= "";

		$this->requestDate 						= "";

		$this->requestSession 					= "";

		$this->appointmentDate 					= "";

		$this->appointmentSession 				= "";

		$this->isCompleted 						= "";

		

		

		

		// Communication Log

		$this->patientRecordId 					= "";

		$this->communicationMode 				= "";

		$this->communicationDate 				= "";

		$this->communicationStartTime 			= "";

		$this->communicationEndTime 			= "";

		$this->communicationDuration 			= "";

		$this->packageId 						= "";

		$this->insDate 							= "";

		

		// Prescription Section

		$this->prescriptionId 					= "";

		$this->prescriptionNotes 				= "";

		

		//Subscription

		$this->subscriptionId 					= "";

		$this->subscribedDate 					= "";

		$this->subscriptionEndDate 				= "";

		$this->noOfSession 						= "";

		

		//Payment

		$this->paymentId 						= "";

		$this->paymentAmount 					= "";

		$this->paymentDate 						= "";

		$this->paymentStatus 					= "";

		$this->paymentMethod 					= "";

		

		$this->doctorSessionDuration 			= "";

		$this->doctorFee 						= "";

		

		//Favourites

		$this->favouriteId 						= "";

		

		//Credites

		$this->patientCreditId 					= "";

		$this->sessionDuration 					= "";

		

		//Request Session

		$this->requestSessionId 				= "";

		

		$this->doctorId 						= "";
		
		$this->chatRoomNumber 					= "";
		
		$this->fcmToken 						= "";

		

		

	}

		

	public function setPostGetVars(){	

				

		$this->patientId						= trim($this->input->post_get('patientId'));			

		$this->firstName						= trim($this->input->post_get('firstName'));				

		$this->lastName							= trim($this->input->post_get('lastName'));			

		$this->uniqueId							= trim($this->input->post_get('uniqueId'));			

		$this->patientMobile					= trim($this->input->post_get('patientMobile'));			

		$this->countryId						= trim($this->input->post_get('countryId'));			

		$this->gender							= trim($this->input->post_get('gender'));		

		$this->patientEmail						= trim($this->input->post_get('patientEmail'));		

		$this->patientPassword					= trim($this->input->post_get('patientPassword'));		

		$this->birthDate						= trim($this->input->post_get('birthDate'));		

		$this->customGender						= trim($this->input->post_get('customGender'));		

		$this->profileImgUrl					= trim($this->input->post_get('profileImgUrl'));

		

		$this->patientAddress					= trim($this->input->post_get('patientAddress'));

			

		$this->status							= trim($this->input->post_get('status'));	

		

		$this->otp								= trim($this->input->post_get('otp'));	

		

		$this->doctorId							= trim($this->input->post_get('doctorId'));	

		

		

		// Appointment Section

		$this->appointmentId					= trim($this->input->post_get('appointmentId'));	

		$this->requestDate						= trim($this->input->post_get('requestDate'));	

		$this->requestSession					= trim($this->input->post_get('requestSession'));	

		$this->appointmentDate					= trim($this->input->post_get('appointmentDate'));	

		$this->appointmentSession				= trim($this->input->post_get('appointmentSession'));	

		$this->isCompleted						= trim($this->input->post_get('isCompleted'));	

			

		

		

		// Communication Log

		$this->patientRecordId					= trim($this->input->post_get('patientRecordId'));	

		$this->communicationMode				= trim($this->input->post_get('communicationMode'));	

		$this->communicationDate				= trim($this->input->post_get('communicationDate'));	

		$this->communicationStartTime			= trim($this->input->post_get('communicationStartTime'));	

		$this->communicationEndTime				= trim($this->input->post_get('communicationEndTime'));	

		$this->communicationDuration			= trim($this->input->post_get('communicationDuration'));

		$this->packageId						= trim($this->input->post_get('packageId'));

		

		// Prescriptions Section

		$this->prescriptionId					= trim($this->input->post_get('prescriptionId'));	

		$this->prescriptionNotes				= trim($this->input->post_get('prescriptionNotes'));

		

		// Subscription Section

		$this->subscriptionId					= trim($this->input->post_get('subscriptionId'));	

		$this->subscribedDate					= trim($this->input->post_get('subscribedDate'));

		$this->subscriptionEndDate				= trim($this->input->post_get('subscriptionEndDate'));

		$this->noOfSession						= trim($this->input->post_get('noOfSession'));

		

		// Payment Section

		$this->paymentId						= trim($this->input->post_get('paymentId'));	

		$this->paymentAmount					= trim($this->input->post_get('paymentAmount'));

		$this->paymentStatus					= trim($this->input->post_get('paymentStatus'));

		$this->paymentDate						= trim($this->input->post_get('paymentDate'));

		$this->paymentMethod					= trim($this->input->post_get('paymentMethod'));

		

		$this->doctorSessionDuration			= trim($this->input->post_get('doctorSessionDuration'));

		$this->doctorFee						= trim($this->input->post_get('doctorFee'));

		

		// Fovourites

		$this->favouriteId						= trim($this->input->post_get('favouriteId'));

		

		//Credites

		$this->patientCreditId					= trim($this->input->post_get('patientCreditId'));

		$this->sessionDuration					= trim($this->input->post_get('sessionDuration'));

		
		$this->chatRoomNumber					= trim($this->input->post_get('chatRoomNumber'));
		
		$this->fcmToken							= trim($this->input->post_get('fcmToken'));		

		$this->patientIds						= trim($this->input->post_get('patientIds'));						

				

	}			

					

					

	public function get_patient($limit = NULL, $start = NULL)			

	{				

		$this->db->limit($limit, $start);	

					

		$this->db->select('	

							axpatient.patientId,

							axpatient.lastName,

							axpatient.firstName,

							axpatient.countryId,

							axpatient.patientMobile,

							axpatient.gender,

							axpatient.uniqueId,

							axpatient.patientEmail,

							axpatient.patientPassword,

							axpatient.birthDate,

							axpatient.customGender,

							axpatient.profileImgUrl,

							axcountries.country

							

							');			

					

		$this->db->from('axpatient');			

		

		$this->db->join('axcountries', 'axcountries.countryId = axpatient.countryId', 'left');

		

		if(trim($this->patientId) != "")			

			$this->db->where('patientId', $this->patientId,'none');				

						

		if(trim($this->countryId) != "")			

			$this->db->like('countryId', $this->countryId,'none');				

					

		if(trim($this->gender) != "")			

			$this->db->like('gender', $this->gender,'none');				

						

		if(trim($this->lastName) != "")			

			$this->db->like('lastName', $this->lastName,'none');			

					

		if(trim($this->uniqueId) != "")			

			$this->db->like('uniqueId', $this->uniqueId,'none');				

						

		if(trim($this->patientMobile) != "")			

			$this->db->like('patientMobile', $this->patientMobile,'none');			

						

		if(trim($this->firstName) != "")			

			$this->db->like('firstName', $this->firstName,'none');			

					

		if($this->sortColumn == '')			

			$this->sortColumn = "firstName";			

					

		if($this->sortDirection == '')			

			$this->sortDirection = "ASC";				

						

		if(trim($this->patientIds) != ""){			

			$patientIds = explode(",",$patientIds);			

			$this->db->where_in('patientId', $patientIds);				

		}	

													

		$this->db->order_by("$this->sortColumn", "$this->sortDirection");	

				

		$query = $this->db->get();	

				

		return $query->result_array();			

	}

	

	

	

	

	public function get_patient_by_uniqueId($uniqueId)

	{	

		if($uniqueId == '')

			return 0;

		

		$this->db->select('

							axpatient.patientId,

							axpatient.uniqueId AS patientUniqueId,

							axpatient.firstName,

							axpatient.lastName,

							axpatient.patientEmail,

							axpatient.patientMobile,

							axpatient.gender,

							axpatient.customGender,

							axpatient.countryId,

							DATE_FORMAT(axpatient.birthDate, "%d-%b-%Y") AS birthDate,

							axpatient.patientAddress,

							axpatient.profileImgUrl,

							axcountries.country

							

							');

		

		$this->db->from('axpatient');

		

		$this->db->join('axcountries', 'axcountries.countryId = axpatient.countryId', 'left');

		

		if($uniqueId != ""){

			$this->db->where('axpatient.uniqueId',$uniqueId);

		}

		

		$this->db->group_by('axpatient.patientId');

		

		$query = $this->db->get();

		//echo  $this->db->last_query();die();

		return $query->row_array();

	}

					

	public function validate_patient(){			

					

		$valid = 1;			

					

		if($this->firstName == '')			

			return 0;	

		if($this->lastName == '')			

			return 0;	

		/*if($this->patientEmail == '')			

			return 0;	*/

		if($this->birthDate == '')			

			return 0;	

		if($this->gender == '')			

			return 0;								

		if($this->countryId == '')			

			return 0;	

		if($this->patientAddress == '')			

			return 0;	

			

		if($this->patientEmail <> ''){/*

			

			$this->db->select('status');



			$this->db->from('axdoctors');

	

			$this->db->where('doctorEmail',$this->patientEmail);

			

			if(trim($this->uniqueId) != "")			

				$this->db->where('uniqueId !=', $this->uniqueId);

	

			$query = $this->db->get();

	

			if($query->num_rows() > 0){	

			

				$this->errorMessage = 480;

	

				return 0;	

	

			}else{

				

				$this->db->select('status');

	

				$this->db->from('axpatient');

		

				$this->db->where('patientEmail',$this->patientEmail);

				

				if(trim($this->uniqueId) != "")			

					$this->db->where('uniqueId !=', $this->uniqueId);

		

				$query = $this->db->get();

		

				if($query->num_rows() > 0){		

				

					$this->errorMessage = 480;

		

					return 0;	

		

				}

				

			}	

			

		*/}	

				

		return 1;											

						

	}	

	

	public function validate_mobile_patient(){

		

		if($this->patientMobile <> ''){

			

			$this->db->select('status');



			$this->db->from('axdoctors');

	

			$this->db->where('doctorMobile',$this->patientMobile);

			

			if(trim($this->uniqueId) != "")			

				$this->db->where('uniqueId !=', $this->uniqueId);

	

			$query = $this->db->get();

	

			if($query->num_rows() > 0){	

			

				$this->errorMessage = 482;

	

				return 0;	

	

			}else{

				

				$this->db->select('status');

	

				$this->db->from('axpatient');

		

				$this->db->where('patientMobile',$this->patientMobile);

				

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

	

	public function validate_signup_mobile($patientMobile){



		if($patientMobile == '')



			return 0;



		$this->db->select('uniqueId,status');



		$this->db->from('axdoctors');



		$this->db->where('doctorMobile',$patientMobile);



		$query = $this->db->get();



		if($query->num_rows() > 0){	



			$result = $query->row_array();


			$this->errorMessage = 461;	



			return 0;	



		}else{

			

			$this->db->select('uniqueId,status,isVerified,patientEmail');



			$this->db->from('axpatient');

	

			$this->db->where('patientMobile',$patientMobile);

	

			$query = $this->db->get();

	

			if($query->num_rows() > 0){	

	

				$result = $query->row_array();

				

				$valid =  100;

				

				$this->uniqueId = $result['uniqueId']; 
				
				$this->patientEmail = $result['patientEmail']; 



				if($result['isVerified'] == 0)

					$valid =  101;	

	

				if($result['isVerified'] == 0)		

					$this->errorMessage = 470;

				else{
					
					$this->errorMessage = 461;	
					
					if($this->patientEmail == '')
						$this->errorMessage = 483;	
					
				}
					
				

	

				return $valid;	

	

			}

			

		}



		return 1;								



	}

	

	public function validate_signup_email($patientEmail){



		if($patientEmail == '')



			return 0;



		$this->db->select('status');



		$this->db->from('axdoctors');



		$this->db->where('doctorEmail',$patientEmail);

		

		if(trim($this->uniqueId) != "")			

			$this->db->where('uniqueId !=', $this->uniqueId);



		$query = $this->db->get();



		if($query->num_rows() > 0){	



			$result = $query->row_array();



				
				$this->errorMessage = 480;

			



			return 0;	



		}else{

			

			$this->db->select('status');



			$this->db->from('axpatient');

	

			$this->db->where('patientEmail',$patientEmail);

			

			if(trim($this->uniqueId) != "")			

				$this->db->where('uniqueId !=', $this->uniqueId);

	

			$query = $this->db->get();

	

			if($query->num_rows() > 0){	

	

				$result = $query->row_array();

	

					

				$this->errorMessage = 480;

				

	

				return 0;	

	

			}

			

		}



		return 1;								



	}

	

	public function signup_step1_patient()

	{



		$createdDate = date("Y-m-d H:i:s", now('Asia/Kolkata'));

		

		$otp = rand(1000,9999);

		

		$data = array(

			'patientMobile' 	=> $this->patientMobile,

			'countryId' 		=> $this->countryId,

			'createdDate' 		=> $createdDate,

			'status' 			=> 2
		);



		$this->db->insert('axpatient', $data);



		$this->patientId = $this->db->insert_id();



		$this->uniqueId 		= 	'METROMINDP'.$this->patientId;



		$data = array(

		

			'uniqueId' 			=> $this->uniqueId

			

		);

		

		$this->db->where("patientId", $this->patientId); 



		$this->db->update("axpatient", $data);	

		

		$this->send_otp_patient($this->uniqueId);

		

		return $this->uniqueId ;

	}
	
	public function update_otp_patient($uniqueId){	

		if($uniqueId == '')

			return 0;

		$data = array(
		
			'otp' 			=> $this->otp
			
		);

		$this->db->set($data); 
		
		$this->db->where("uniqueId", $uniqueId); 

		$this->db->update("axpatient", $data);	
	}
	

	public function send_otp_patient($uniqueId){	

	

		if($uniqueId == '')

			return 0;

			

		$data = array(



			/*'otp' 			=> rand (1000,9999)*/
			
			'otp' 			=> '11111'



		);



		$this->db->set($data); 



		$this->db->where("uniqueId", $uniqueId); 



		$this->db->update("axpatient", $data);	





		$this->db->select('uniqueId,firstName,lastName,patientEmail,patientMobile,otp');

		

		$this->db->from('axpatient');

		

		$this->db->where("uniqueId", $uniqueId); 

		

		$result_array = $this->db->get()->result_array();

		

		if(count($result_array) > 0){

			

			$this->uniqueId		= $result_array[0]["uniqueId"];

			$firstName			= $result_array[0]["firstName"];

			$lastName			= $result_array[0]["lastName"];

			$patientEmail		= $result_array[0]["patientEmail"];

			$otp				= $result_array[0]["otp"];

		

			

			/*$settingId = 1;

			$this->db->select('adminEmail');

			$this->db->from('setting');

			$this->db->where('settingId',$settingId);

			$result_array1 = $this->db->get()->result_array();		

			

			$from 		=	$result_array1[0]['adminEmail'];

			

			$to			= 	$patientEmail;

			

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

											<td align="left" colspan="2">Dear '.$firstName.' '.$lastName.',</td>

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

	

	

	public function verify_otp_patient($uniqueId,$otp){



		if($uniqueId == '' || $otp == '')



			return 0;



		$this->db->select('uniqueId');



		$this->db->from('axpatient');



		$this->db->where('uniqueId',$uniqueId,'none');



		$this->db->where('otp',$otp,'none');



		$result_array = $this->db->get()->result_array();

		

		if(count($result_array) > 0){

			

			$data = array(

			

				'isVerified' 		=> 1

	

			);

	

			$this->db->set($data); 

	

			$this->db->where("uniqueId", $uniqueId); 

	

			$this->db->update("axpatient", $data);	



			return 1;



		}else{



			return 0;	



		}							



	}



	public function signup_step2_patient($uniqueId)

	{

		

		if($uniqueId == '')

			return 0;

			

		if(!$this->validate_signup_email($this->patientEmail)) return 0;	

		

		$modifiedDate = date("Y-m-d H:i:s", now('Asia/Kolkata'));



		if($this->birthDate <> '')

			$this->birthDate = date('Y-m-d',strtotime($this->birthDate));

		else

			$this->birthDate = '0000-00-00';



		$data = array(

			

			'patientEmail' 		=> $this->patientEmail,

			

			'patientPassword' 	=> $this->encryption->encrypt($this->patientPassword),



			'firstName' 		=> $this->firstName,



			'lastName' 			=> $this->lastName,



			'gender' 			=> $this->gender,



			'customGender' 		=> $this->customGender,



			'birthDate' 		=> $this->birthDate,
			
			'countryId' 		=> $this->countryId,


			'status' 			=> 1,

			

			'modifiedDate' 		=> $modifiedDate



		);



		$this->db->set($data); 



		$this->db->where("uniqueId", $uniqueId); 



		$this->db->update("axpatient", $data); 

		

		if(!$this->db->affected_rows())

			return 0;



		if(isset($_FILES["profileImgUrl"])){



			$uniqueId = $this->upload_image($uniqueId);



		}



		return $uniqueId;



	}

	

	public function upload_image($uniqueId) { 

	

		if($uniqueId == '') return 0; 



		$config['upload_path']   	= '../uploads/patients/'; 



		$config['allowed_types'] 	= 'jpg|gif|png|jpeg|JPG|PNG'; 



		//$config['max_size']      	= 2048; 



		$config['overwrite'] 	  	= TRUE;



		//$config['max_width']     	= 1300; 



		//$config['max_height']    	= 800;  



		$filename 					= $_FILES["profileImgUrl"]['name'];



		$type    					= substr(strrchr(trim($filename), "."),1);



		$profileImgUrl				= $uniqueId.".".$type;



		$config['file_name']		= $profileImgUrl;



		$this->load->library('upload', $config);



		$this->upload->initialize($config);



		if ( ! $this->upload->do_upload('profileImgUrl')) {



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



			'profileImgUrl' => $profileImgUrl



		);



		$this->db->set($data); 



		$this->db->where("uniqueId", $uniqueId); 



		$this->db->update("axpatient", $data);



		return $uniqueId;



		} 

	}	

					

	public function set_patient()			

	{			

		$gender =  1;			

					

		$data = array(			

			'patientId' 				=> $this->patientId,			

			'firstName' 					=> $this->firstName,			

			'countryId' 				=> $this->countryId,			

			'lastName' 			=> $this->lastName,			

			'uniqueId' 			=> $this->uniqueId,			

			'patientMobile' 					=> $this->patientMobile,			

			'gender' 				=> $this->gender			

		);			

					

		$this->db->insert('axpatient', $data);			

					

		$this->patientId = $this->db->insert_id();			

					

		$patientId = $this->patientId ;			

					

		return $patientId;			

	}			

					

	public function update_patient($uniqueId) { 			

				

		if($uniqueId == '')			

			return 0;		

		

		if(!$this->validate_patient()) return 0;	

			

		$modifiedDate = date("Y-m-d H:i:s", now('Asia/Kolkata'));



		if($this->birthDate <> '')

			$this->birthDate = date('Y-m-d',strtotime($this->birthDate));

		else

			$this->birthDate = '0000-00-00';		

					

		$data = array(			

			'firstName' 					=> $this->firstName,

			'lastName' 						=> $this->lastName,		

			'birthDate' 					=> $this->birthDate,		

			'gender' 						=> $this->gender,		

			'customGender' 					=> $this->customGender,					

			'countryId' 					=> $this->countryId,				

			'patientAddress' 				=> $this->patientAddress,

			'modifiedDate' 					=> $modifiedDate			

		);			

					

		$this->db->set($data); 			

		$this->db->where('uniqueId', $uniqueId);				

		$this->db->update("axpatient", $data); 		



		if(!$this->db->affected_rows())

			return 0;



		if(isset($_FILES["profileImgUrl"])){



			$uniqueId = $this->upload_image($uniqueId);



		}	

	

		return $uniqueId;			

					

	} 		

	

	public function update_mobile_patient($uniqueId) { 			

				

		if($uniqueId == '')			

			return 0;		

			

		if(!$this->validate_mobile_patient()) return 0;	
		
		if(!$this->validate_signup_email($this->patientEmail)) return 0;	

			

		$modifiedDate = date("Y-m-d H:i:s", now('Asia/Kolkata'));		

					

		$data = array(			

			'patientMobile' 				=> $this->patientMobile,
			
			'patientEmail' 					=> $this->patientEmail,

			'isVerified' 					=> 0,	

			'modifiedDate' 					=> $modifiedDate			

		);			

					

		$this->db->set($data); 			

		$this->db->where('uniqueId', $uniqueId);				

		$this->db->update("axpatient", $data); 		

		

		if(!$this->db->affected_rows())

			return 0;



		$this->send_otp_patient($uniqueId);

	

		return $uniqueId;			

					

	} 	

		

				

	public function get_patient_id($patientId = FALSE)			

	{			

		if ($patientId === FALSE)			

		{			

				return 0;			

		}			

				

		$query = $this->db->get_where('axpatient', array('patientId' => $patientId));			

		return $query->row_array();			

	}			

				

	public function delete_patient($patientIds) { 			

		 if ($this->db->delete("axpatient", "patientId IN ( ".$patientIds.")")) { 			

			return true; 			

		 } 			

	} 			

					

	  			

	public function get_count() {			

					

		if(trim($this->patientId) != "")			

			$this->db->where('axpatient.patientId', $this->patientId);			

						

		if(trim($this->countryId) != "")			

			$this->db->where('countryId', $this->countryId);			

					

		if(trim($this->gender) != "")			

			$this->db->where('gender', $this->gender);				

						

		if(trim($this->firstName) != "")			

			$this->db->like('firstName', $this->firstName,'none');			

						

		if(trim($this->lastName) != "")			

			$this->db->like('lastName', $this->lastName,'none');			

					

		if(trim($this->uniqueId) != "")			

			$this->db->like('uniqueId', $this->uniqueId,'none');				

						

		if(trim($this->patientMobile) != "")			

			$this->db->like('patientMobile', $this->patientMobile,'none');				

						

		if(trim($this->patientIds) != ""){			

			$patientIds = explode(",",$patientIds);			

			$this->db->where_in('patientId', $patientIds);				

		}			

					

		$this->db->from("axpatient");			

					

		return $this->db->count_all_results();			

	}			

				

	public function setPageNumber($pageNumber) {			

		$this->_pageNumber = $pageNumber;			

	}			

				

	public function setOffset($offset) {			

		$this->_offset = $offset;			

	}

	

	public function get_patient_id_by_uniqueId($uniqueId = FALSE){

		

		if ($uniqueId === FALSE){

				return 0;

		}

		

		$this->db->select('patientId');

			

		$this->db->from("axpatient");

		

		$this->db->where('uniqueId', $uniqueId);

		

		$query = $this->db->get();

		

		$row_array = $query->row_array();

		

		return $row_array['patientId'];

	}	

	

	public function schedule_appointment_patient()

	{

		

		$insDate = date("Y-m-d H:i:s", now('Asia/Kolkata'));

		

		if($this->requestDate <> '')

			$this->requestDate = date('Y-m-d',strtotime($this->requestDate));

		else

			$this->requestDate = '0000-00-00';

		

		$data = array(

			'patientId' 		=> $this->patientId,

			'doctorId' 			=> $this->doctorId,

			'requestDate' 		=> $this->requestDate,

			'requestSession' 	=> $this->requestSession,

			'insDate' 			=> $insDate



		);

		

		$this->db->insert('axappointments', $data);

		

		$this->appointmentId = $this->db->insert_id();

		

		$appointmentId = $this->appointmentId ;

		

		$notificationTitle = $this->input->post_get('uniqueId').' requested for an appointment';

		

		$data = array(

			'patientId' 		=> $this->patientId,

			'doctorId' 			=> $this->doctorId,

			'appointmentId' 	=> $this->appointmentId,

			'notificationType' 	=> 0,

			'notificationTitle' => $notificationTitle



		);

		

		$this->db->insert('axnotifications', $data);

		

		return $appointmentId;

	}

	

	public function add_communication_log_patient()
	{

		

		$insDate = date("Y-m-d H:i:s", now('Asia/Kolkata'));

		if($this->check_doctor_availabilty($this->doctorId)){
			$this->errorMessage = 'Doctor is not available. Please try again later.!!!';
			return 0;	
		}

	//	$communicationStartTime = date("Y-m-d H:i:s", now('Asia/Kolkata'));
		if($this->input->post_get('loginType') == 2){
			
			$this->sendFCM($this->patientId, $this->doctorId);
			
		}
		
		$this->update_available_status($this->doctorId,1);

		if($this->communicationDate <> '')

			$this->communicationDate = date('Y-m-d',strtotime($this->communicationDate));

		else

			$this->communicationDate = date('Y-m-d');

		

		$data = array(

			'patientId' 				=> $this->patientId,

			'doctorId' 					=> $this->doctorId,

			'subscriptionId' 			=> $this->subscriptionId,

			'patientCreditId' 			=> $this->patientCreditId,

			'communicationMode' 		=> $this->communicationMode,

			'communicationDate' 		=> $this->communicationDate,

			'communicationStartTime' 	=> $this->communicationStartTime,

			'communicationEndTime' 		=> $this->communicationEndTime,

			'communicationDuration' 	=> $this->communicationDuration,

			'insDate' 					=> $insDate



		);

		

		$this->db->insert('axpatientrecords', $data);

		

		$this->patientRecordId = $this->db->insert_id();

		

		if($this->subscriptionId <> '' && $this->subscriptionId <> 0){

			

			$this->db->set('noOfSession', 'noOfSession - 1', FALSE);

			

			$this->db->where('subscriptionId', $this->subscriptionId);

			

			$this->db->update('axsubscription');

			

		}

		

		if($this->patientCreditId  && $this->patientCreditId <> 0){

			

			$data = array(

					'noOfSession' 				=> 'noOfSession - 1'

				);

			

			$this->db->set($data);

			

			$this->db->where('patientCreditId', $this->patientCreditId);

			

			$this->db->where('status', 1);

			

			$this->db->update('axpatientcredits');

			

		}

		

		return $this->patientRecordId ;

		

	}

	

	public function end_communication_log_patient($patientRecordId)

	{

		if($patientRecordId == '') return 0;

		

		/*$communicationEndTime = date("Y-m-d H:i:s", now('Asia/Kolkata'));

		

		$this->db->select('communicationStartTime');

			

		$this->db->from("axpatientrecords");

		

		$this->db->where('patientRecordId', $patientRecordId);

		

		$query = $this->db->get();

		

		$communicationDuration = 0;

		

		if($query->num_rows() > 0){	

		

			$row_array = $query->row_array();

		

			$communicationStartTime = $row_array['communicationStartTime'];

			

			$communicationDuration = (strtotime($communicationEndTime) - strtotime($row_array['communicationStartTime'])) / 60;

		}*/

		

		$data = array(

			'communicationEndTime' 		=> $this->communicationEndTime,

			'communicationDuration' 	=> $this->communicationDuration



		);

		

		

		$this->db->set($data); 	

				

		$this->db->where('patientRecordId', $patientRecordId);	

					

		$this->db->update("axpatientrecords", $data); 	



		return $patientRecordId ;

	}

	

	public function add_prescription_patient()

	{

		

		$insDate = date("Y-m-d H:i:s", now('Asia/Kolkata'));

		

		$data = array(

			'patientId' 				=> $this->patientId,

			'doctorId' 					=> $this->doctorId,

			'appointmentId' 			=> $this->appointmentId,

			'prescriptionNotes' 		=> $this->prescriptionNotes,

			'insDate' 					=> $insDate



		);

		

		$this->db->insert('axprescriptions', $data);

		

		$this->prescriptionId = $this->db->insert_id();

		

		return $this->prescriptionId ;

	}

	

	public function subscribe_package_patient()

	{

		

		$subscribedDate 		= date("Y-m-d");

		

		$this->db->select('packageDuration,noOfSession,packagePrize');

			

		$this->db->from("axpackages");

		

		$this->db->where('packageId', $this->packageId);

		

		$query = $this->db->get();

		

		$this->noOfSession 			= 0;

		

		$subscriptionEndDate 	= date("Y-m-d");

		

		if($query->num_rows() > 0){	

		

			$row_array = $query->row_array();

			

			$subscriptionEndDate = date('Y-m-d', strtotime($subscribedDate. ' + '.$row_array['packageDuration'].' days'));

		

			$this->noOfSession 			= $row_array['noOfSession'];

			

			$this->sessionDuration 		= $row_array['packageDuration'];

			

			$this->paymentAmount 		= $row_array['packagePrize'];

		}

		

		$this->add_payment_patient();

		

		$data = array(

		

			'patientId' 				=> $this->patientId,

			'doctorId' 					=> $this->doctorId,

			'packageId' 				=> $this->packageId,

			'paymentId' 				=> $this->paymentId,

			'noOfSession' 				=> $this->noOfSession,

			'subscribedDate' 			=> $subscribedDate,

			'subscriptionEndDate' 		=> $subscriptionEndDate



		);

		

		$this->db->insert('axsubscription', $data);

		

		$this->subscriptionId = $this->db->insert_id();

		

		return $this->subscriptionId ;

	}

	

	

	public function get_patient_records($patientId)

	{	

		if($patientId == '')

			return 0;

		

		$this->db->select(' patientId,

							doctorId,

							subscriptionId,

							communicationMode,

							DATE_FORMAT(communicationDate,, "%d-%b-%Y") AS communicationDate,

							communicationStartTime,

							communicationEndTime,

							communicationDuration

						  ');

		

		$this->db->from('axpatientrecords');



		if($patientId <> "")

			$this->db->where('axpatientrecords.patientId',$patientId);

			

		if($this->doctorId <> "")

			$this->db->where('axpatientrecords.doctorId',$this->doctorId);	

		

		$query = $this->db->get();

		//echo  $this->db->last_query();die();

		return $query->result_array();

	}

	

	public function get_patient_subscriptions($patientId)

	{	

		if($patientId == '')

			return 0;

		

		$this->db->select(' patientId,

							doctorId,

							subscriptionId,

							subscribedDate,

							subscriptionEndDate,

							noOfSession

						  ');

		

		$this->db->from('axsubscription');



		if($patientId <> "")

			$this->db->where('axsubscription.patientId',$patientId);

			

		if($this->doctorId <> "")

			$this->db->where('axsubscription.doctorId',$this->doctorId);

			

		if($this->status <> "")

			$this->db->where('axsubscription.status',$this->status);	

			

		$this->db->where('axsubscription.subscriptionEndDate >= ',date("Y-m-d"));		

		

		$query = $this->db->get();

		

		return $query->result_array();

	}

	

	

	public function get_requested_patient_appointments($patientId)

	{	

		if($patientId == '')

			return 0;

		

		$this->db->select(' axappointments.appointmentId,

							DATE_FORMAT(axappointments.requestDate, "%d-%b-%Y") AS requestDate,

							axappointments.requestSession,

							axdoctors.doctorName AS clientName,
							
							axdoctors.uniqueId AS clientUniqueId

						  ');

		

		$this->db->from('axappointments');

		

		$this->db->join('axdoctors', 'axdoctors.doctorId = axappointments.doctorId', 'left');



		$this->db->where('patientId',$patientId);

		

		$this->db->where('axappointments.status',0);	



		$this->db->where('axappointments.requestDate >= ',date("Y-m-d"));			

			

		$this->db->group_by('axappointments.appointmentId');	

		

		$query = $this->db->get();

		//echo  $this->db->last_query();die();

		return $query->result_array();

	}

	

	public function get_patient_fixed_appointments($patientId)

	{	

		if($patientId == '')

			return 0;

		

		$this->db->select(' axappointments.appointmentId,

							DATE_FORMAT(axappointments.appointmentDate, "%d-%b-%Y") AS appointmentDate,

							axappointments.appointmentSession,
							
							axappointments.appointmentStartTime,
							
							axappointments.appointmentEndTime,
							
							axappointments.appointmentNote,

							axdoctors.doctorName AS clientName,
							
							axdoctors.uniqueId AS clientUniqueId

						  ');

		

		$this->db->from('axappointments');

		

		$this->db->join('axdoctors', 'axdoctors.doctorId = axappointments.doctorId', 'left');



		$this->db->where('patientId',$patientId);

			

		$this->db->where('axappointments.status',1);	

		

		$this->db->where('axappointments.isCompleted',0);	
		
		
		$this->db->where('axappointments.appointmentDate >= ',date("Y-m-d"));		

			
		$this->db->group_by('axappointments.appointmentId');	

		

		$query = $this->db->get();

		//echo  $this->db->last_query();die();

		return $query->result_array();

	}

	

	public function get_patient_completed_appointments($patientId)

	{	

		if($patientId == '')

			return 0;

		

		$this->db->select(' axappointments.appointmentId,

							DATE_FORMAT(axappointments.appointmentDate, "%d-%b-%Y") AS appointmentDate,

							axappointments.appointmentSession,
							
							axappointments.appointmentStartTime,
							
							axappointments.appointmentEndTime,
							
							axappointments.appointmentNote,

							axdoctors.doctorName AS clientName,
							
							axdoctors.uniqueId AS clientUniqueId

						  ');

		

		$this->db->from('axappointments');

		

		$this->db->join('axdoctors', 'axdoctors.doctorId = axappointments.doctorId', 'left');



		$this->db->where('patientId',$patientId);	

			

		$this->db->where('axappointments.isCompleted',1);		

			

		$this->db->group_by('axappointments.appointmentId');	

		

		$query = $this->db->get();

		//echo  $this->db->last_query();die();

		return $query->result_array();

	}

	

	

	public function add_payment_patient()

	{

		

		$paymentDate = date("Y-m-d H:i:s", now('Asia/Kolkata'));

		

		$data = array(

			'patientId' 				=> $this->patientId,

			'doctorId' 					=> $this->doctorId,

			'packageId' 				=> $this->packageId,

			'paymentAmount' 			=> $this->paymentAmount,

			'paymentDate' 				=> $paymentDate



		);

		

		$this->db->insert('axpayments', $data);

		

		$this->paymentId = $this->db->insert_id();

		

		return $this->paymentId ;

		

	}

	

	public function add_credits_patient()

	{

		

		$insDate = date("Y-m-d H:i:s", now('Asia/Kolkata'));

		

		$data = array(

			'patientId' 				=> $this->patientId,

			'doctorId' 					=> $this->doctorId,

			'paymentId' 				=> $this->paymentId,

			'noOfSession' 				=> $this->noOfSession,

			'sessionDuration' 			=> $this->sessionDuration,

			'insDate' 					=> $insDate



		);

		

		$this->db->insert('axpatientcredits', $data);

		

		$this->patientCreditId = $this->db->insert_id();

		

		return $this->patientCreditId ;

		

	}

	

	

	public function update_payment_status_patient($paymentId)

	{

		if($paymentId == '') return 0;

		

		$data = array(

			'paymentStatus' 			=> 1



		);

		

		$this->db->set($data); 	

				

		$this->db->where('paymentId', $paymentId);	

					

		$this->db->update("axpayments", $data); 

		

			

		$this->db->set('status', '1', FALSE);

		

		$this->db->where('paymentId', $paymentId);	

		

		$this->db->update('axsubscription');

		

		

		$this->db->set('status', '1', FALSE);

		

		$this->db->where('paymentId', $paymentId);	

		

		$this->db->update('axpatientcredits');

		

		

		$this->db->set('status', '3', FALSE);

		

		$this->db->where('paymentId', $paymentId);	

		

		$this->db->update('axprescriptions');

			

		

		

		return $paymentId ;

		

	}

	

	

	public function add_favourites_patient()

	{

		

		$insDate = date("Y-m-d H:i:s", now('Asia/Kolkata'));

		

		$data = array(

			'patientId' 				=> $this->patientId,

			'doctorId' 					=> $this->doctorId,

			'insDate' 					=> $insDate



		);

		

		$this->db->insert('axfavourites', $data);

		

		$this->favouriteId = $this->db->insert_id();

		

		return $this->favouriteId ;

		

	}

	

	

	public function get_patient_favourite_doctors($patientId)

	{	

		if($patientId == '')

			return 0;

		

		$this->db->select(' 

							axdoctors.doctorId,

							axdoctors.uniqueId AS doctorUniqueId,

							axdoctors.doctorName,

							axdoctors.qualification,

							axdoctors.doctorImageUrl,

							axspeciality.specialityName

						  ');

		

		$this->db->from('axfavourites');

		

		$this->db->join('axdoctors', 'axdoctors.doctorId = axfavourites.doctorId', 'left');

		

		$this->db->join('axspeciality', 'axspeciality.specialityId = axdoctors.specialityId', 'left');



		if($patientId <> "")

			$this->db->where('axfavourites.patientId',$patientId);

			

		if($this->doctorId <> "")

			$this->db->where('axfavourites.doctorId',$this->doctorId);	

		

		$query = $this->db->get();

		//echo  $this->db->last_query();die();

		return $query->result_array();

	}

	

	

	public function get_payment_history_patient($patientId)

	{	

		if($patientId == '')

			return 0;

		

		$this->db->select(' 

							axdoctors.doctorName,

							axdoctors.qualification,

							axspeciality.specialityName,

							axpayments.paymentAmount,

							axpayments.paymentDate

						  ');

		

		$this->db->from('axpayments');

		

		$this->db->join('axdoctors', 'axdoctors.doctorId = axpayments.doctorId', 'left');

		

		$this->db->join('axspeciality', 'axspeciality.specialityId = axdoctors.specialityId', 'left');



		$this->db->where('axpayments.patientId',$patientId);

		if($this->paymentStatus <> '')

			$this->db->where('axpayments.paymentStatus',$this->paymentStatus );	

		

		$query = $this->db->get();

		//echo  $this->db->last_query();die();

		return $query->result_array();

	}

	

	

	public function get_patient_credites($patientId,$doctorId)

	{	

		if($patientId == '' && $doctorId == '')

			return 0;

		

		$this->db->select(' 

							patientCreditId,

							patientId,

							doctorId,

							sessionDuration,

							noOfSession

						  ');

		

		$this->db->from('axpatientcredits');



		if($patientId <> "")

			$this->db->where('axpatientcredits.patientId',$patientId);

			

		if($doctorId <> "")

			$this->db->where('axpatientcredits.doctorId',$doctorId);

			

		if($this->status <> "")

			$this->db->where('axpatientcredits.status',$this->status);	

			

		$this->db->where('axpatientcredits.noOfSession > ',0);		

		

		$query = $this->db->get();

		//echo  $this->db->last_query();die();

		return $query->result_array();

	}

	

	

	public function get_communication_history_patient($patientId)

	{	

		if($patientId == '')

			return 0;

		

		$this->db->select(' 

							axdoctors.uniqueId AS doctorUniqueId,
							
							axdoctors.doctorName,

							axdoctors.qualification,
							
							axdoctors.doctorMobile,
							
							axdoctors.fcmToken,
							
							axdoctors.chatRoomNumber,
							
							axdoctors.medicalRegistrationNumber,
							
							axdoctors.loginStatus,

							axspeciality.specialityName,

							axpatientrecords.communicationMode,

							DATE_FORMAT(axpatientrecords.communicationDate,, "%d-%b-%Y") AS communicationDate,

							axpatientrecords.communicationStartTime,

							axpatientrecords.communicationEndTime,

							axpatientrecords.communicationDuration

						  ');

		

		$this->db->from('axpatientrecords');

		

		$this->db->join('axdoctors', 'axdoctors.doctorId = axpatientrecords.doctorId', 'left');

		

		$this->db->join('axspeciality', 'axspeciality.specialityId = axdoctors.specialityId', 'left');



		$this->db->where('axpatientrecords.patientId',$patientId);
		
		$this->db->where('axpatientrecords.communicationEndTime !=','00:00:00');

		$this->db->order_by("patientRecordId", "DESC");	

		$query = $this->db->get();

		//echo  $this->db->last_query();die();

		return $query->result_array();

	}

	

	

	

	public function change_password_patient($uniqueId,$confirmPassword){



		if($uniqueId == '' || $confirmPassword == '')



			return 0;



		$this->db->select('patientPassword');



		$this->db->from('axpatient');



		$this->db->where("uniqueId", $uniqueId); 



		$query = $this->db->get();



		if($query->num_rows() > 0){	



			$row_array = $query->row_array();



			if (trim($this->encryption->decrypt($row_array["patientPassword"])) <> trim($this->input->post_get('currentPassword'))) {	



				$this->errorMessage  = 473;



				return 0;



			}else{



				$data = array(



					'patientPassword' 		=> $this->encryption->encrypt($confirmPassword)



				);



				$this->db->set($data); 



				$this->db->where("uniqueId", $uniqueId);



				$this->db->update("axpatient", $data); 



				$this->errorMessage  = 472;



				return 1;					



			}



		}else{



			return 0;	



		}	



	}

	

	

	public function get_requested_appointment_details_patient($appointmentId)

	{	

		if($appointmentId == '')

			return 0;

		

		$this->db->select('

							axappointments.appointmentId,

							DATE_FORMAT(axappointments.requestDate, "%d-%b-%Y") AS requestDate,

							axappointments.requestSession,

							axdoctors.doctorName AS clientName,
							
							axdoctors.uniqueId AS clientUniqueId

							

							');

		

		$this->db->from('axappointments');

		

		$this->db->join('axdoctors', 'axdoctors.doctorId = axappointments.doctorId', 'left');

		

		$this->db->join('axpatient', 'axpatient.patientId = axappointments.patientId', 'left');

		

		$this->db->where('axappointments.appointmentId',$appointmentId);

		

		$this->db->group_by('axappointments.appointmentId');

		

		$query = $this->db->get();

		//echo  $this->db->last_query();die();

		return $query->row_array();

	}

	

	public function get_appointment_details_patient($appointmentId)

	{	

		if($appointmentId == '')

			return 0;

		

		$this->db->select('

							axappointments.appointmentId,

							DATE_FORMAT(axappointments.appointmentDate, "%d-%b-%Y") AS appointmentDate,

							axappointments.appointmentSession,
							
							axappointments.appointmentStartTime,
							
							axappointments.appointmentEndTime,
							
							axappointments.appointmentNote,

							axdoctors.doctorName AS clientName,
							
							axdoctors.uniqueId AS clientUniqueId

							

							');

		

		$this->db->from('axappointments');

		

		$this->db->join('axdoctors', 'axdoctors.doctorId = axappointments.doctorId', 'left');

		

		$this->db->join('axpatient', 'axpatient.patientId = axappointments.patientId', 'left');

		

		$this->db->where('axappointments.appointmentId',$appointmentId);

		

		$this->db->group_by('axappointments.appointmentId');

		

		$query = $this->db->get();

		//echo  $this->db->last_query();die();

		return $query->row_array();

	}

	

	

	public function get_notifications_patient($patientId)

	{	

		if($patientId == '')

			return 0;

		

		$this->db->select(' 

							appointmentId,

							notificationTitle,

							DATE_FORMAT(notificationTime, "%d-%b-%Y %h:%i %p") AS notificationTime

						  ');

		

		$this->db->from('axnotifications');



		$this->db->where('axnotifications.patientId',$patientId);

		

		$this->db->where('axnotifications.notificationType IN (1,2)');

		

		$query = $this->db->get();

		//echo  $this->db->last_query();die();

		return $query->result_array();

	}

	

	

	public function remove_favourites_patient($favouriteId)

	{	

		if($favouriteId == '')

			return 0;

		

		$this->db->delete("axfavourites", "favouriteId IN ( ".$favouriteId.")");

		

		return 1;

	}

	

	

	

	public function get_prescriptions_patient($patientId)

	{	

		if($patientId == '')

			return 0;

		

		$this->db->select(' 

							prescriptionId,

							prescriptionNotes,

							DATE_FORMAT(insDate, "%d-%b-%Y %h:%i %p") AS insDate,
							
							axdoctors.doctorName AS clientName,
							
							axdoctors.uniqueId AS clientUniqueId

						  ');

		

		$this->db->from('axprescriptions');

		

		$this->db->join('axdoctors', 'axdoctors.doctorId = axprescriptions.doctorId', 'left');



		$this->db->where('axprescriptions.patientId',$patientId);

		

		if($this->doctorId <> '')

			$this->db->where('axprescriptions.doctorId',$this->doctorId);

		

		$query = $this->db->get();

		//echo  $this->db->last_query();die();

		return $query->result_array();

	}

	

	

	public function request_medicine_patient($prescriptionId)

	{

		if($prescriptionId == '') return 0;

		

		$data = array(

			'status' 			=> 1



		);

		

		$this->db->set($data); 	

				

		$this->db->where('prescriptionId', $prescriptionId);	

					

		$this->db->update("axprescriptions", $data); 

		

		return $prescriptionId ;

		

	}

	

	

	public function add_payment_medicine_patient($prescriptionId)

	{

		

		if($prescriptionId == '') return 0;

		

		$paymentDate = date("Y-m-d H:i:s", now('Asia/Kolkata'));

		

		$this->db->select('patientId,totalAmount');

			

		$this->db->from("axprescriptions");

		

		$this->db->where('prescriptionId', $prescriptionId);

		

		$this->db->where('totalAmount != 0');

		

		$this->db->where('status = 2');

		

		$query = $this->db->get();

	

		if($query->num_rows() > 0){	

	

			$row_array = $query->row_array();

			

			$this->paymentAmount = $row_array['totalAmount'];

			

			$data = array(

				'patientId' 				=> $row_array['patientId'],

				'paymentAmount' 			=> $row_array['totalAmount'],

				'paymentDate' 				=> $paymentDate

	

			);

			

			$this->db->insert('axpayments', $data);

			

			$this->paymentId = $this->db->insert_id();

			

			$data = array(

				'paymentId' => $this->paymentId

	

			);

			

			$this->db->set($data); 	

					

			$this->db->where('prescriptionId', $prescriptionId);	

						

			$this->db->update("axprescriptions", $data); 

			

			return $this->paymentId;			

		}

		

		return 0 ;

		

	}

	

	public function request_session_patient()

	{

		

		$insDate = date("Y-m-d H:i:s", now('Asia/Kolkata'));



		/*$this->db->select('patientId,totalAmount');

			

		$this->db->from("axpatientrecords");

		

		$this->db->where('patientId', $this->patientId);

		

		$this->db->where('doctorId', $this->doctorId);

		

		$this->db->order_by("patientRecordId", "DESC");

		

		$this->db->limit(1, 0);

		

		$query = $this->db->get();

	

		if($query->num_rows() > 0){	

	

			$row_array = $query->row_array();

			

			$this->sessionDuration = $row_array['totalAmount'];

		}*/

		

		$data = array(

			'patientId' 				=> $this->patientId,

			'doctorId' 					=> $this->doctorId,

			'sessionDuration' 			=> $this->sessionDuration,

			'insDate' 					=> $insDate



		);

		

		$this->db->insert('axrequestsession', $data);

		

		$this->requestSessionId = $this->db->insert_id();

		

		return $this->requestSessionId ;

		

	}
	
	
	
	public function update_fcm_token_patient($uniqueId) { 			

		if($uniqueId == '')			
			return 0;		
	
		$data = array(			

			'fcmToken' 				=> $this->input->post_get('fcmToken')

		);			
	

		$this->db->set($data); 			

		$this->db->where('uniqueId', $uniqueId);				

		$this->db->update("axpatient", $data); 		

		return $uniqueId;			

					

	}
	
	function sendFCM($patientId, $doctorId) {
		
		if($patientId == ''  || $doctorId == '')
			return 0;
			
		$patientFcmToken = $this->get_patient_fcm_token($patientId);
		
		$this->get_doctor_fcm_token($doctorId);
		
		if($this->fcmToken == '')
			return 0;

		$API_ACCESS_KEY = "AAAAy6LCT4s:APA91bGCsaS87ndfK2FppCbZRJjS-XQVxErQ8MsSUDm7dk-4U78HbbtFM-mMSgSR-rxzazhC3FJv5jNErAaoqY7OZ2gxoaCiNTyg67Ma_C99uh52IA1UbMCuHLtHHE_nULXF24JcLXAD";
	
		$url = 'https://fcm.googleapis.com/fcm/send';
	
		$fields = array (
		
				'to' 	=> $this->fcmToken,
				
				"collapse_key" =>  "type_a",
				
				'data' 	=> array (
						"message" 			=> $this->firstName.' '.$this->lastName. ' calling...',
						'title' 			=> $this->firstName.' '.$this->lastName. ' calling...',
						'roomnumber' 		=> $this->chatRoomNumber,
						'videocallingid' 	=> '1234',
						'patientId' 		=> $patientId,
						'patientUniqueId' 	=> $this->input->post_get('uniqueId'),
						'fcmtoken' 			=> $patientFcmToken,
						'type' 				=> $this->input->post_get('type')
				),                
		);
		
		$fields = json_encode ( $fields );
		
		$headers = array (
				'Authorization: key=' . $API_ACCESS_KEY,
				'Content-Type: application/json'
		);
		$ch = curl_init ();
		curl_setopt ( $ch, CURLOPT_URL, $url );
		curl_setopt ( $ch, CURLOPT_POST, true );
		curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
		curl_setopt ( $ch, CURLOPT_POSTFIELDS, $fields );
		$result = curl_exec ( $ch );
		curl_close ( $ch );
	}
	
	
	public function get_patient_fcm_token($patientId){
		
		if($patientId == 0)
			return 0;
			
		$this->db->select('fcmToken,firstName,lastName');				

		$this->db->from('axpatient');			

		$this->db->where('patientId', $patientId);	
		
		$query = $this->db->get();

		if($query->num_rows() > 0){	
		
				$row_array = $query->row_array();
				
				$this->firstName	= $row_array['firstName'];
				
				$this->lastName		= $row_array['lastName'];

				return $row_array['fcmToken'];

		}else{
			
			return 0;	
			
		}
		
	}
	
	public function get_doctor_fcm_token($doctorId){
		
		if($doctorId == 0)
			return 0;
			
		$this->db->select('fcmToken,chatRoomNumber');				

		$this->db->from('axdoctors');			

		$this->db->where('doctorId', $doctorId);	
		
		$query = $this->db->get();

		if($query->num_rows() > 0){	
		
				$row_array = $query->row_array();

				$this->fcmToken			= $row_array['fcmToken'];
				
				$this->chatRoomNumber	= $row_array['chatRoomNumber'];
				
				return 1;

		}else{
			
			return 0;
				
		}
		
	}
	
	function sendEndFCM($to) {
		
		if($to == '')
			return 0;

		$API_ACCESS_KEY = "AAAAy6LCT4s:APA91bGCsaS87ndfK2FppCbZRJjS-XQVxErQ8MsSUDm7dk-4U78HbbtFM-mMSgSR-rxzazhC3FJv5jNErAaoqY7OZ2gxoaCiNTyg67Ma_C99uh52IA1UbMCuHLtHHE_nULXF24JcLXAD";
	
		$url = 'https://fcm.googleapis.com/fcm/send';
	
		$fields = array (
		
				'to' 	=> $to,
				
				"collapse_key" =>  "type_a",
				
				'data' 	=> array (
						"message" 			=> '',
						'title' 			=> '',
						'roomnumber' 		=> '',
						'videocallingid' 	=> '',
						'patientId' 		=> '',
						'patientUniqueId' 	=> '',
						'fcmtoken' 			=> '',
						'type' 				=> $this->input->post_get('type')
				),                
		);
		
		$fields = json_encode ( $fields );
		
		$headers = array (
				'Authorization: key=' . $API_ACCESS_KEY,
				'Content-Type: application/json'
		);
		$ch = curl_init ();
		curl_setopt ( $ch, CURLOPT_URL, $url );
		curl_setopt ( $ch, CURLOPT_POST, true );
		curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
		curl_setopt ( $ch, CURLOPT_POSTFIELDS, $fields );
		$result = curl_exec ( $ch );
		curl_close ( $ch );
		
		return 1;	
		
	}
	
	public function check_doctor_availabilty($doctorId){
		
		if($doctorId == '')
			return 1;
			
		$this->db->select('isEngaged');				

		$this->db->from('axdoctors');			

		$this->db->where('doctorId', $doctorId);	
		
		$query = $this->db->get();

		if($query->num_rows() > 0){	
		
				$row_array = $query->row_array();
				
				return $row_array['isEngaged'];

		}else{
			
			return 1;
				
		}
		
	}
	
	public function update_available_status($doctorId,$status) { 			

		if($doctorId == '')			
			return 0;	
	
		$data = array(			

			'isEngaged' 				=> $status

		);			
	
		$this->db->set($data); 			

		$this->db->where('doctorId', $doctorId);				

		$this->db->update("axdoctors", $data); 	

		return $doctorId;			

	}	
	
	public function get_doctor_id_from_record($patientRecordId){
		
		if($patientRecordId == 0)
			return 0;
			
		$this->db->select('doctorId');				

		$this->db->from('axpatientrecords');			

		$this->db->where('patientRecordId', $patientRecordId);	
		
		$query = $this->db->get();

		if($query->num_rows() > 0){	
		
				$row_array = $query->row_array();
				
				return $row_array['doctorId'];

		}else{
			
			return 0;
				
		}
		
	}
		
			

}			

?>