<?php

require_once("./razorpay-php/Razorpay.php");

use Razorpay\Api\Api;

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

		$this->appointmentNote 					= "";

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

		$this->order_id 						= "";

		$this->razorpay_order_id 				= "";

		$this->razorpay_payment_id 				= "";

		$this->razorpay_signature 				= "";

		$this->isPatientRead 					= "";

		$this->isDoctorRead 					= "";

		$this->doctorUniqueId 					= "";

		$this->patientUniqueId 					= "";

		$this->isNewAppointment 				= "";

		$this->doctorLoginStatus 				= "";

		$this->patientLoginStatus 				= "";

		$this->currentTime 						= "";

		$this->currentDay 						= "";

		$this->currentDayTime 					= "";

		$this->noOfMessage 						= "";

		$this->voipToken 						= "";
		
		$this->patientVoipToken 				= "";

		$this->deviceOS 						= "";

		$this->doctorDeviceOS 					= "";

		$this->patientDeviceOS 					= "";

		$this->latitude 						= "";

		$this->longitude 						= "";
		
		$this->razorPayApiKey 					= "";
		
		$this->razorPaySecretKey 				= "";
		
		$this->razorPayCurrency					= "";
		
		$this->calendarLimit					= "";
		
		$this->get_razor_pay_settings();

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

		$this->appointmentNote					= trim($this->input->post_get('appointmentNote'));	

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

		$this->order_id							= trim($this->input->post_get('order_id'));	

		$this->razorpay_order_id				= trim($this->input->post_get('razorpay_order_id'));	

		$this->razorpay_payment_id				= trim($this->input->post_get('razorpay_payment_id'));	

		$this->razorpay_signature				= trim($this->input->post_get('razorpay_signature'));	

		$this->noOfMessage						= trim($this->input->post_get('noOfMessage'));

		//iphone fcm token

		$this->voipToken						= trim($this->input->post_get('voipToken'));	

		$this->deviceOS							= trim($this->input->post_get('deviceOS'));	

		$this->latitude							= trim($this->input->post_get('latitude'));	

		$this->longitude						= trim($this->input->post_get('longitude'));		

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

			$patientIds = explode(",",$this->patientIds);			

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

			'latitude' 			=> $this->latitude,

			'longitude' 		=> $this->longitude,
			
			'deviceOS' 			=> $this->deviceOS,

			'status' 			=> 2

		);

		$this->db->insert('axpatient', $data);

		$this->patientId = $this->db->insert_id();

		$this->uniqueId 		= 	'METROMINDP'.$this->patientId;
		
		$this->patientAddress 	= 	$this->getaddress($this->latitude,$this->longitude);

		$data = array(

			'uniqueId' 			=> $this->uniqueId,
			
			'patientAddress' 	=> $this->patientAddress

		);

		$this->db->where("patientId", $this->patientId); 

		$this->db->update("axpatient", $data);	

		$this->send_otp_patient($this->uniqueId);

		return $this->uniqueId ;

	}
	
	function getaddress($lat,$lng)
	{
		if($lat == '' || $lng == '')
			return '';
			
		$url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($lat).','.trim($lng).'&sensor=false&key='.MAPAPIKEY;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		$response = curl_exec($ch);
		curl_close($ch);
		
		$data = json_decode($response);
	
		$status = $data->status;
		
		if($status=="OK") 
			return $data->results[0]->formatted_address;
		else
			return '';
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

			'otp' 			=> rand (10000,99999)

		);

		$this->db->set($data); 

		$this->db->where("uniqueId", $uniqueId); 

		$this->db->update("axpatient", $data);	

		$this->db->select('uniqueId,firstName,lastName,patientEmail,patientMobile,otp,countryId');

		$this->db->from('axpatient');

		$this->db->where("uniqueId", $uniqueId); 

		$result_array = $this->db->get()->result_array();

		if(count($result_array) > 0){

			$this->uniqueId		= $result_array[0]["uniqueId"];

			$firstName			= $result_array[0]["firstName"];

			$lastName			= $result_array[0]["lastName"];

			$patientEmail		= $result_array[0]["patientEmail"];

			$patientMobile		= $result_array[0]["patientMobile"];

			$otp				= $result_array[0]["otp"];

			$countryId			= $result_array[0]["countryId"];

			$phonePrefix = $this->get_phonePrefix($countryId);

			if($phonePrefix <> 0)

				$patientMobile = '+'.$phonePrefix.$patientMobile;

			if($patientMobile <> ''){

				$id 	= "ACb5f837b3b04850f99f8f1085bc64fda9";

				$token 	= "1ea5106e79feb4c0811116340e6eed17";

				$url 	= "https://api.twilio.com/2010-04-01/Accounts/$id/SMS/Messages";

				$from 	= "+17122208867";

				$to 	= $patientMobile; // twilio trial verified number

				$body 	= $otp.' is the OTP for account verification at METRO MIND . Do not share this with anyone.';

				$data 	= array (

							'From'	=> $from,

							'To' 	=> $to,

							'Body' 	=> $body,

						);

				$post = http_build_query($data);

				$x = curl_init($url );

				curl_setopt($x, CURLOPT_POST, true);

				curl_setopt($x, CURLOPT_RETURNTRANSFER, true);

				curl_setopt($x, CURLOPT_SSL_VERIFYPEER, false);

				curl_setopt($x, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

				curl_setopt($x, CURLOPT_USERPWD, "$id:$token");

				curl_setopt($x, CURLOPT_POSTFIELDS, $post);

				$y = curl_exec($x);

				curl_close($x);

			}

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

		$profileImgUrl				= time().$uniqueId.".".$type;

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
		
		$this->db->select('profileImgUrl');

		$this->db->from('axpatient');

		$this->db->where('uniqueId', $uniqueId);

		$query = $this->db->get();

		$result_row = $query->row_array();

		if($result_row['profileImgUrl'] <> '' && file_exists('../uploads/patients/' . $result_row['profileImgUrl']))

			unlink('../uploads/patients/'.$result_row['profileImgUrl']);
		

		$data1 = array('upload_data' => $this->upload->data()); 

		$data = array(

			'profileImgUrl' => $profileImgUrl

		);

		$this->db->set($data); 

		$this->db->where("uniqueId", $uniqueId); 

		$this->db->update("axpatient", $data);

		$this->profileImgUrl		= $profileImgUrl;

		return $uniqueId;

		} 

	}	

	public function set_patient()			

	{			

		$gender =  1;			

		$data = array(			

			'patientId' 				=> $this->patientId,			

			'firstName' 				=> $this->firstName,			

			'countryId' 				=> $this->countryId,			

			'lastName' 					=> $this->lastName,			

			'uniqueId' 					=> $this->uniqueId,			

			'patientMobile' 			=> $this->patientMobile,			

			'gender' 					=> $this->gender			

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

		if(!$this->validate_signup_email($this->patientEmail)) return 0;	

		$modifiedDate = date("Y-m-d H:i:s", now('Asia/Kolkata'));

		if($this->birthDate <> '')

			$this->birthDate = date('Y-m-d',strtotime($this->birthDate));

		else

			$this->birthDate = '0000-00-00';		

		$data = array(			

			'firstName' 					=> $this->firstName,

			'lastName' 						=> $this->lastName,	

			'patientEmail' 					=> $this->patientEmail,		

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

		//if(!$this->validate_signup_email($this->patientEmail)) return 0;	

		$modifiedDate = date("Y-m-d H:i:s", now('Asia/Kolkata'));		

		$data = array(			

			'patientMobile' 				=> $this->patientMobile,

			'countryId' 					=> $this->countryId,

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

			$patientIds = explode(",",$this->patientIds);			

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

			'appointmentNote' 	=> $this->appointmentNote,

			'insDate' 			=> $insDate

		);

		$this->db->insert('axappointments', $data);

		$this->appointmentId = $this->db->insert_id();

		$appointmentId = $this->appointmentId ;

		$clientName = $this->get_patient_name($this->patientId);

		$notificationTitle = $clientName.'('.$this->input->post_get('uniqueId').') requested for an appointment';

		$data = array(

			'patientId' 		=> $this->patientId,

			'doctorId' 			=> $this->doctorId,

			'appointmentId' 	=> $this->appointmentId,

			'notificationType' 	=> 0,

			'notificationTitle' => $notificationTitle

		);

		$this->db->insert('axnotifications', $data);

		$this->sendScheduleAppointmentFCM($this->patientId,$this->doctorId);

		return $appointmentId;

	}

	public function add_communication_log_patient()

	{

		if(!ctype_digit(trim($this->patientId))){

			$this->patientId = $this->get_patient_id_by_uniqueId(trim($this->input->post_get('patientId')));

		}

		 

		 if(!ctype_digit(trim($this->doctorId))){

			$this->doctorId = $this->get_doctor_id_by_uniqueId(trim($this->input->post_get('doctorId')));

		}

		$insDate = date("Y-m-d H:i:s", now('Asia/Kolkata'));

		if($this->communicationDate <> '')

			$this->communicationDate = date('Y-m-d',strtotime($this->communicationDate));

		else

			$this->communicationDate = date('Y-m-d');

		if($this->communicationMode <> 3){	

			$this->appointmentId = $this->get_fixed_appointment_id($this->patientId,$this->doctorId); 

			if($this->appointmentId == 0){

				$this->errorMessage = 'A-Doctor is not available at the moment. Please schedule your appointment!';

				return 0;	

			}else if($this->check_doctor_availabilty($this->doctorId)){

				$this->errorMessage = 'DA-Doctor is not available at the moment. Please schedule your appointment!';

				return 0;	

			}else if($this->doctorLoginStatus == 0){

				$this->errorMessage = 'L-Doctor is not available at the moment. Please schedule your appointment!';

				return 0;	

			}else if($this->check_appoitment_availability($this->patientId,$this->doctorId)){

				$this->errorMessage = 'AA-Doctor is not available at the moment. Please schedule your appointment!';

				return 0;	

			}

			$this->update_available_status($this->doctorId,1);

		}

//Move here by Dileep on July 12 sunday for sending patientRecordId 

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

			'appointmentId' 			=> $this->appointmentId,

			'isPatientRead' 			=> $this->isPatientRead,

			'isDoctorRead' 				=> $this->isDoctorRead,

			'isNewAppointment' 			=> $this->isNewAppointment,

			'insDate' 					=> $insDate

		);

		$this->db->insert('axpatientrecords', $data);

		$this->patientRecordId = $this->db->insert_id();

// Ends				

		if($this->communicationMode == 3){

			$this->sendChatFCM($this->patientId, $this->doctorId);

		}else{

			if($this->input->post_get('loginType') == 2){

				$this->sendFCM($this->patientId, $this->doctorId);

			}

		}

/*

// Commennted by Dileep and move to above section to send patientRecordId in PUSH

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

			'appointmentId' 			=> $this->appointmentId,

			'isPatientRead' 			=> $this->isPatientRead,

			'isDoctorRead' 				=> $this->isDoctorRead,

			'isNewAppointment' 			=> $this->isNewAppointment,

			'insDate' 					=> $insDate

		);

		$this->db->insert('axpatientrecords', $data);

		$this->patientRecordId = $this->db->insert_id();

*/		

		if($this->communicationMode <> 3){

			if($this->subscriptionId <> '' && $this->subscriptionId <> 0){

				$this->db->set('noOfSession', 'noOfSession - 1', FALSE);

				$this->db->where('subscriptionId', $this->subscriptionId);

				$this->db->update('axsubscription');

			}

			if($this->patientCreditId  && $this->patientCreditId <> 0){

				$this->db->set('noOfSession', 'noOfSession - 1', FALSE);

				$this->db->where('patientCreditId', $this->patientCreditId);

				$this->db->where('status', 1);

				$this->db->update('axpatientcredits');				

			}

		}else{

			$notificationType = '';

			if($this->input->post_get('loginType') == 1){ // set doctor read status to one if doctor send the message

				$this->isDoctorRead = 1;

				$this->isPatientRead = 0;

				$notificationType  = 5;

			}else if($this->input->post_get('loginType') == 2){ // set patient read status to one if patient send the message

				$this->isDoctorRead = 0;

				$this->isPatientRead = 1;

				$notificationType  = 6;

			}

			$this->update_previous_chat_log_status($this->patientId,$this->doctorId); // Function call to update the previous records read status		

			$clientName = '';

			if($this->input->post_get('loginType') == 1){

				$clientName = $this->get_doctor_name($this->doctorId);

			}else if($this->input->post_get('loginType') == 2){

				$clientName = $this->get_patient_name($this->patientId);

			}

			$data = array(

				'patientId' 		=> $this->patientId,

				'doctorId' 			=> $this->doctorId,

				'patientRecordId' 	=> $this->patientRecordId,

				'appointmentId' 	=> $this->appointmentId,

				'notificationType' 	=> $notificationType,

				'notificationTitle' => $clientName.'('.$this->input->post_get('uniqueId').')'.' initiated a chat '

			);

			$this->db->insert('axnotifications', $data);

		}

		return $this->patientRecordId ;

	}

	public function end_communication_log_patient($patientRecordId)

	{

		if($patientRecordId == '') return 0;

		if($this->communicationEndTime == ''){

			$communicationEndTime = date("Y-m-d H:i:s", now('Asia/Kolkata'));

			$this->db->select('communicationStartTime');

			$this->db->from("axpatientrecords");

			$this->db->where('patientRecordId', $patientRecordId);

			$query = $this->db->get();

			$communicationDuration = 0;

			if($query->num_rows() > 0){	

				$row_array = $query->row_array();

				$communicationStartTime = $row_array['communicationStartTime'];

				$communicationDuration = (strtotime($communicationEndTime) - strtotime($row_array['communicationStartTime'])) / 60;

				$this->communicationEndTime =  $communicationEndTime;

				$this->communicationDuration =  $communicationDuration;

			}

		}

		$data = array(

			'communicationEndTime' 		=> $this->communicationEndTime,

			'communicationDuration' 	=> $this->communicationDuration

		);

		$this->db->set($data); 	

		$this->db->where('patientRecordId', $patientRecordId);	

		$this->db->update("axpatientrecords", $data); 	

		// To Complete the appointment

		$isNewAppointment 	= 0;

		$appointmentId 		= 0;
		
		$isCreditAdjusted 	= 0;

		$this->db->select('appointmentId,isNewAppointment,subscriptionId,patientCreditId,isCreditAdjusted');

		$this->db->from('axpatientrecords');

		$this->db->where('patientRecordId',$patientRecordId);

		$query = $this->db->get();

		if($query->num_rows() > 0){	

			$row_array = $query->row_array();
			
			$isCreditAdjusted 		= $row_array['isCreditAdjusted'];

			if($row_array['appointmentId'] <> 0 && $row_array['appointmentId'] <> ''){

				$appointmentId 		= $row_array['appointmentId'];

				$completedTime = date("Y-m-d H:i:s", now('Asia/Kolkata'));

				if($row_array['isNewAppointment']  == 1){ // if new appointment created then ,  set appointment end time to communcation end time

					$data = array(

						'isCompleted' 			=> 1,

						'completedTime' 		=> $completedTime,

						'appointmentEndTime' 	=> $this->communicationEndTime

					);

				}else{

					$communicationDuration = explode(':',$this->communicationDuration);

					if($communicationDuration[0] < 2){

						$isCompleted = 0;

						$completedTime = '0000-00-00 00:00:00;';

					}else{

						$isCompleted = 1;

					}

					$data = array(

						'isCompleted' 			=> $isCompleted,

						'completedTime' 		=> $completedTime

					);

				}

				$this->db->set($data); 	

				$this->db->where('appointmentId', $row_array['appointmentId']);	

				$this->db->update("axappointments", $data); 	

				$this->appointmentId = $row_array['appointmentId'];

				$communicationDuration = explode(':',$this->communicationDuration);

				if($communicationDuration[0] < 2 && $isCreditAdjusted == 0){

					if($row_array['subscriptionId'] <> '' && $row_array['subscriptionId'] <> 0){

						$this->db->set('noOfSession', 'noOfSession + 1', FALSE);

						$this->db->where('subscriptionId', $row_array['subscriptionId']);

						$this->db->update('axsubscription');
						
						//Flag credit is already adjusted in case of multple time call ed communication
						
						$data = array(

							'isCreditAdjusted' 		=> '1'
				
						);
				
						$this->db->set($data); 	
				
						$this->db->where('patientRecordId', $patientRecordId);	
				
						$this->db->update("axpatientrecords", $data); 	

					}

					if($row_array['patientCreditId']  <> '' && $row_array['patientCreditId'] <> 0){

						$this->db->set('noOfSession', 'noOfSession + 1', FALSE);

						$this->db->where('patientCreditId', $row_array['patientCreditId']);

						$this->db->where('status', 1);

						$this->db->update('axpatientcredits');	
						
						//Flag credit is already adjusted in case of multple time call ed communication
						
						$data = array(

							'isCreditAdjusted' 		=> '1'
				
						);
				
						$this->db->set($data); 	
				
						$this->db->where('patientRecordId', $patientRecordId);	
				
						$this->db->update("axpatientrecords", $data); 	

					}

				}

			}

		}

		return $patientRecordId ;

	}

	public function add_prescription_patient()

	{

		$insDate = date("Y-m-d H:i:s", now('Asia/Kolkata'));

		 if(!ctype_digit(trim($this->patientId))){

			$this->patientId = $this->get_patient_id_by_uniqueId(trim($this->input->post_get('patientId')));

		 }

		 

		  if(!ctype_digit(trim($this->doctorId))){

			$this->doctorId = $this->get_doctor_id_by_uniqueId(trim($this->input->post_get('doctorId')));

		 }

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

		$this->db->where('axpatientrecords.communicationMode != 3'); // To exclude chat records	

		$this->db->where('axpatientrecords.communicationDuration > "03:00"'); // To exclude failed calls

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

							axappointments.appointmentNote,							

							axdoctors.doctorName AS clientName,

							axdoctors.uniqueId AS clientUniqueId,

							CONCAT(axpatient.firstName , " ", axpatient.lastName) AS patientName,

							axpatient.uniqueId  AS patientUniqueId

						  ');

		$this->db->from('axappointments');

		$this->db->join('axdoctors', 'axdoctors.doctorId = axappointments.doctorId', 'left');

		$this->db->join('axpatient', 'axpatient.patientId = axappointments.patientId', 'left');

		$this->db->where('axappointments.patientId',$patientId);

		$this->db->where('axappointments.status',0);	

		$this->db->where('axappointments.requestDate >= ',date("Y-m-d"));			

		$this->db->group_by('axappointments.appointmentId');	

		$this->db->order_by("YEAR(requestDate) DESC, MONTH(requestDate) DESC, DAY(requestDate) DESC ");

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

							TIME_FORMAT(axappointments.appointmentStartTime, "%h:%i %p") AS appointmentStartTime,

							TIME_FORMAT(axappointments.appointmentEndTime, "%h:%i %p") AS appointmentEndTime,

							axappointments.appointmentNote,

							axappointments.patientId,

							axappointments.doctorId,							

							axdoctors.doctorName AS doctorName,

							axdoctors.uniqueId AS doctorUniqueId,

							axdoctors.fcmToken AS doctorFcmToken,

							axdoctors.voipToken AS doctorVoipToken,

							axdoctors.doctorEmail,

							axdoctors.doctorMobile,

							axdoctors.qualification,

							axdoctors.qualification1,

							axdoctors.doctorImageUrl,

							axdoctors.youtubeLink,

							axdoctors.doctorFee,

							axdoctors.communicationMode,

							axdoctors.doctorSessionDuration,

							axdoctors.chatRoomNumber,

							axdoctors.medicalRegistrationNumber,

							axdoctors.loginStatus,

							axdoctors.specialityId,

							CONCAT(axpatient.firstName , " ", axpatient.lastName) AS patientName,

							axpatient.uniqueId AS patientUniqueId,

							axpatient.fcmToken AS patientFcmToken,

							axdoctors.isScheduleEnabled,

							axdoctors.isCallEnabled,

							axdoctors.isViewDetailInfo,

							axdoctors. isShowGreen,

							axdoctors.deviceOS AS doctorDeviceOS,

							axpatient.deviceOS AS patientDeviceOS 

						  ');

		$this->db->from('axappointments');

		$this->db->join('axdoctors', 'axdoctors.doctorId = axappointments.doctorId', 'left');

		$this->db->join('axpatient', 'axpatient.patientId = axappointments.patientId', 'left');

		$this->db->where('axappointments.patientId',$patientId);

		$this->db->where('axappointments.status',1);	

		$this->db->where('axappointments.isCompleted',0);	

		//$this->db->where('axappointments.appointmentDate >= ',date("Y-m-d"));

		$this->db->where('TIMESTAMP(axappointments.appointmentDate,axappointments.appointmentEndTime) >= ',$this->currentTime);

		$this->db->group_by('axappointments.appointmentId');	

		$this->db->order_by("YEAR(appointmentDate) DESC, MONTH(appointmentDate) DESC, DAY(appointmentDate) DESC, appointmentStartTime ASC ");

		$query = $this->db->get();

		return $query->result_array();

	}

// Dated 05 May 2020 Dileep to make appointment request and confirmed request into a single api - get_patient_requested_fixed_appointments

	public function get_patient_requested_fixed_appointments($patientId)

	{	

		if($patientId == '')

			return 0;

		$this->db->select(' axappointments.appointmentId,

							DATE_FORMAT(axappointments.requestDate, "%d-%b-%Y") AS requestDate,

							axappointments.requestSession,		

							DATE_FORMAT(axappointments.appointmentDate, "%d-%b-%Y") AS appointmentDate,

							axappointments.appointmentSession,

							TIME_FORMAT(axappointments.appointmentStartTime, "%h:%i %p") AS appointmentStartTime,

							TIME_FORMAT(axappointments.appointmentEndTime, "%h:%i %p") AS appointmentEndTime,

							axappointments.appointmentNote,

							axappointments.patientId,

							axappointments.doctorId,

							axappointments.status,																																		

							axdoctors.doctorName AS doctorName,

							axdoctors.uniqueId AS doctorUniqueId,

							axdoctors.fcmToken AS doctorFcmToken,

							axdoctors.voipToken AS doctorVoipToken,

							axdoctors.doctorEmail,

							axdoctors.doctorMobile,

							axdoctors.qualification,

							axdoctors.qualification1,

							axdoctors.doctorImageUrl,

							axdoctors.youtubeLink,

							axdoctors.doctorFee,

							axdoctors.communicationMode,

							axdoctors.doctorSessionDuration,

							axdoctors.fcmToken,

							axdoctors.voipToken,

							axdoctors.chatRoomNumber,

							axdoctors.medicalRegistrationNumber,

							axdoctors.loginStatus,

							axdoctors.specialityId,

							CONCAT(axpatient.firstName , " ", axpatient.lastName) AS patientName,

							axpatient.uniqueId AS patientUniqueId,

							axpatient.fcmToken AS patientFcmToken,

							axdoctors.isScheduleEnabled,

							axdoctors.isCallEnabled,

							axdoctors.isViewDetailInfo,

							axdoctors. isShowGreen,

							axdoctors.deviceOS AS doctorDeviceOS,

							axpatient.deviceOS AS patientDeviceOS 

						  ');

		$this->db->from('axappointments');

		$this->db->join('axdoctors', 'axdoctors.doctorId = axappointments.doctorId', 'left');

		$this->db->join('axpatient', 'axpatient.patientId = axappointments.patientId', 'left');

		$this->db->where('axappointments.patientId',$patientId);

		//$this->db->where('axappointments.status <= 1');	

		$this->db->where('axappointments.isCompleted',0);	

		$this->db->where('axappointments.requestDate >= ',date("Y-m-d"));		

		$this->db->group_by('axappointments.appointmentId');	

		$this->db->order_by("YEAR(appointmentDate) DESC, MONTH(appointmentDate) DESC, DAY(appointmentDate) DESC, appointmentStartTime ASC ");

		$query = $this->db->get();

		//echo  $this->db->last_query();die();

		return $query->result_array();

	}

//	End of get_patient_requested_fixed_appointments

	public function get_patient_completed_appointments($patientId)

	{	

		if($patientId == '')

			return 0;

		$this->db->select(' axappointments.appointmentId,

							DATE_FORMAT(axappointments.appointmentDate, "%d-%b-%Y") AS appointmentDate,

							axappointments.appointmentSession,

							TIME_FORMAT(axappointments.appointmentStartTime, "%h:%i %p") AS appointmentStartTime,

							TIME_FORMAT(axappointments.appointmentEndTime, "%h:%i %p") AS appointmentEndTime,

							axappointments.appointmentNote,

							axdoctors.doctorName AS clientName,

							axdoctors.uniqueId AS clientUniqueId,

							axprescriptions.prescriptionId,

							CONCAT(axpatient.firstName , " ", axpatient.lastName) AS patientName,

							axpatient.uniqueId  AS patientUniqueId,

							axappointments.patientId,

							axappointments.doctorId						

						  ');

		$this->db->from('axappointments');

		$this->db->join('axdoctors', 'axdoctors.doctorId = axappointments.doctorId', 'left');

		$this->db->join('axpatient', 'axpatient.patientId = axappointments.patientId', 'left');

		$this->db->join('axprescriptions', 'axprescriptions.appointmentId = axappointments.appointmentId', 'left');

		$this->db->where('axappointments.patientId',$patientId);	

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
		
		$api = new Api($this->razorPayApiKey, $this->razorPaySecretKey);

		$paymentId 				= $this->paymentId;

		$paymentAmount 			= $this->paymentAmount * 100;

		$this->paymentAmount 	= $paymentAmount;

		$razorPayCurrency 		= $this->razorPayCurrency;

		$razorpayOrderArray    = $api->order->create(

			['receipt'			=>	$paymentId,

			'amount'			=>	$paymentAmount,

			'currency'			=>	$razorPayCurrency,

			'payment_capture'	=>	'1'

			]

		);

		if($razorpayOrderArray){

			$this->order_id = $razorpayOrderArray['id'];

			$data = array(

				'order_id' 	=> $this->order_id

			);

			$this->db->set($data); 	

			$this->db->where('paymentId', $paymentId);	

			$this->db->update("axpayments", $data); 

		}

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

			'paymentStatus' 		=> 1,

			'razorpay_signature'  	=> $this->razorpay_signature, 

			'razorpay_payment_id' 	=> $this->razorpay_payment_id,  

			'razorpay_order_id' 	=> $this->razorpay_order_id

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

		$api = new Api($this->razorPayApiKey, $this->razorPaySecretKey);

		$attributes  = array(

							'razorpay_signature'  	=> $this->razorpay_signature, 

							'razorpay_payment_id' 	=> $this->razorpay_payment_id,  

							'razorpay_order_id' 	=> $this->razorpay_order_id

							);

		$order  = $api->utility->verifyPaymentSignature($attributes);

		if($order){

			$data = array(

				'isSignatureVerified'  	=> 1

			);

			$this->db->set($data); 	

			$this->db->where('paymentId', $paymentId);	

			$this->db->update("axpayments", $data); 

		}

		return $paymentId ;

	}

	public function add_favourites_patient()

	{

		$arrFavourite = array();

		$arrFavourite = $this->get_patient_favourite_doctors($this->patientId);

		if(count($arrFavourite) > 0){

			$this->errorMessage = 'Already added to favourites';

			return 0;

		}

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

						 	axfavourites.favouriteId,

							axdoctors.doctorId,

							axdoctors.uniqueId AS doctorUniqueId,

							axdoctors.doctorName,

							axdoctors.qualification,

							axdoctors.qualification1,

							axdoctors.doctorImageUrl,

							axdoctors.communicationMode,

							axdoctors.doctorSessionDuration,

							axspeciality.specialityName,

							axdoctors.fcmToken AS doctorFcmToken,

							axdoctors.voipToken AS doctorVoipToken,

							axdoctors.chatRoomNumber,

							axdoctors.medicalRegistrationNumber,

							axdoctors.loginStatus,

							axdoctors.specialityId,

							CONCAT(axpatient.firstName , " ", axpatient.lastName) AS patientName,

							axpatient.uniqueId  AS patientUniqueId,

							axdoctors.isScheduleEnabled,

							axdoctors.isCallEnabled,

							axdoctors.isViewDetailInfo,

							axdoctors. isShowGreen,

							axdoctors.deviceOS AS doctorDeviceOS,

							axpatient.deviceOS AS patientDeviceOS 

						  ');

		$this->db->from('axfavourites');

		$this->db->join('axdoctors', 'axdoctors.doctorId = axfavourites.doctorId', 'left');

		$this->db->join('axpatient', 'axpatient.patientId = axfavourites.patientId', 'left');

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

							axdoctors.qualification1,

							axspeciality.specialityName,

							axpayments.paymentAmount,

							axpayments.paymentDate,

							CONCAT(axpatient.firstName , " ", axpatient.lastName) AS patientName,

							axpatient.uniqueId  AS patientUniqueId

						  ');

		$this->db->from('axpayments');

		$this->db->join('axdoctors', 'axdoctors.doctorId = axpayments.doctorId', 'left');

		$this->db->join('axpatient', 'axpatient.patientId = axpayments.patientId', 'left');

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

							axdoctors.qualification1,

							axdoctors.doctorMobile,

							axdoctors.fcmToken,

							axdoctors.voipToken,

							axdoctors.chatRoomNumber,

							axdoctors.medicalRegistrationNumber,

							axdoctors.loginStatus,

							axdoctors.specialityId,

							axspeciality.specialityName,

							axpatientrecords.communicationMode,

							DATE_FORMAT(axpatientrecords.communicationDate,, "%d-%b-%Y") AS communicationDate,

							axpatientrecords.communicationStartTime,

							axpatientrecords.communicationEndTime,

							axpatientrecords.communicationDuration,

							CONCAT(axpatient.firstName , " ", axpatient.lastName) AS patientName,

							axpatient.uniqueId  AS patientUniqueId

						  ');

		$this->db->from('axpatientrecords');

		$this->db->join('axdoctors', 'axdoctors.doctorId = axpatientrecords.doctorId', 'left');

		$this->db->join('axpatient', 'axpatient.patientId = axpatientrecords.patientId', 'left');

		$this->db->join('axspeciality', 'axspeciality.specialityId = axdoctors.specialityId', 'left');

		$this->db->where('axpatientrecords.patientId',$patientId);

		$this->db->where('axpatientrecords.communicationMode != 3'); // To exclude chat records

		$this->db->where('axpatientrecords.communicationEndTime !=','00:00:00');

		$this->db->where('axpatientrecords.communicationDuration >','00.00');

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

							axdoctors.uniqueId AS clientUniqueId,

							CONCAT(axpatient.firstName , " ", axpatient.lastName) AS patientName,

							axpatient.uniqueId  AS patientUniqueId

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

							TIME_FORMAT(axappointments.appointmentStartTime, "%h:%i %p") AS appointmentStartTime,

							TIME_FORMAT(axappointments.appointmentEndTime, "%h:%i %p") AS appointmentEndTime,

							axappointments.appointmentNote,

							axdoctors.doctorName AS clientName,

							axdoctors.uniqueId AS clientUniqueId,

							CONCAT(axpatient.firstName , " ", axpatient.lastName) AS patientName,

							axpatient.uniqueId  AS patientUniqueId

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

							axnotifications.*,

							DATE_FORMAT(notificationTime, "%d-%b-%Y %h:%i %p") AS notificationTime,

							axdoctors.doctorName AS doctorName,

                            axdoctors.uniqueId  AS doctorUniqueId,

                            axdoctors.fcmToken  AS doctorFcmToken,

							axdoctors.voipToken AS doctorVoipToken,

							axdoctors.chatRoomNumber,

							CONCAT(axpatient.firstName , " ", axpatient.lastName) AS patientName,

							axpatient.uniqueId  AS patientUniqueId,

                            axpatient.fcmToken  AS patientFcmToken,

							axnotifications.patientId,

							axnotifications.doctorId,

							axdoctors.deviceOS AS doctorDeviceOS,

							axpatient.deviceOS AS patientDeviceOS 

						  ');

		$this->db->from('axnotifications');

		$this->db->join('axpatient', 'axpatient.patientId = axnotifications.patientId', 'left');

        $this->db->join('axdoctors ', 'axdoctors.doctorId = axnotifications.doctorId', 'left');

		$this->db->where('axnotifications.patientId',$patientId);

		$this->db->where('axnotifications.notificationType IN (1,2,5)');

		$this->db->where('axnotifications.status',0);

		$this->db->order_by("axnotifications.notificationId", "DESC");

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

							axprescriptions.prescriptionId,

							axprescriptions.prescriptionNotes,

							axprescriptions.totalAmount,

							axprescriptions.status,	

							DATE_FORMAT(axprescriptions.insDate, "%d-%b-%Y %h:%i %p") AS insDate,

							axdoctors.doctorName AS clientName,

							axdoctors.uniqueId AS clientUniqueId,
							
							axdoctors.qualification,

							axdoctors.qualification1,

							CONCAT(axpatient.firstName , " ", axpatient.lastName) AS patientName,

							axpatient.uniqueId  AS patientUniqueId

						  ');

		$this->db->from('axprescriptions');

		$this->db->join('axdoctors', 'axdoctors.doctorId = axprescriptions.doctorId', 'left');

		$this->db->join('axpatient', 'axpatient.patientId = axprescriptions.patientId', 'left');

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

		$this->send_medicine_request_notification_email($prescriptionId);

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

			$api = new Api($this->razorPayApiKey, $this->razorPaySecretKey);

			$paymentId 				= $this->paymentId;

			$paymentAmount 			= $this->paymentAmount * 100;

			$this->paymentAmount 	= $paymentAmount;
			
			$razorPayCurrency 		= $this->razorPayCurrency;

			$razorpayOrderArray    = $api->order->create(

				['receipt'			=>	$paymentId,

				'amount'			=>	$paymentAmount,

				'currency'			=>	$razorPayCurrency,

				'payment_capture'	=>	'1'

				]

			);

			if($razorpayOrderArray){

				$this->order_id = $razorpayOrderArray['id'];

				$data = array(

					'order_id' 	=> $this->order_id

				);

				$this->db->set($data); 	

				$this->db->where('paymentId', $paymentId);	

				$this->db->update("axpayments", $data); 

			}

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

			'fcmToken' 				=> $this->input->post_get('fcmToken'),

			'voipToken' 			=> $this->input->post_get('voipToken')	 // Changed by Dileep on July 13 2020		

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

		$loginStatus = '';

		if($this->input->post_get('loginType') == 1){

			if($this->patientLoginStatus == 1){ // set push notification flag to one only if patient logged in

				$loginStatus = 1;	

			}

		}else if($this->input->post_get('loginType') == 2){ // set push notification flag to one only if patient logged in

			if($this->doctorLoginStatus == 1){

				$loginStatus = 1;	

			}

		}	

		if($loginStatus == 1){	// send push notification only if , patient or doctor is online based on the login type

			if($this->doctorDeviceOS == 'Android'){

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

								'patientDeviceOS' 	=> $this->patientDeviceOS,

								'doctorDeviceOS' 	=> $this->doctorDeviceOS,

								'appointmentId' 	=> $this->appointmentId,

								'patientRecordId' 	=> $this->patientRecordId,    //Added by Dileep on july 12 sunday 						

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

			}else if($this->doctorDeviceOS == 'iOS'){	// send push notification only if , patient or doctor is online based on the login type

				if($this->voipToken <> '' && $this->voipToken <> 'NULL' && $this->voipToken <> NULL){

					$passphrase = '12345';

					$deviceToken = $this->voipToken;

					$pem_preference = "production";

					$apns_url = NULL;

					$apns_cert = NULL;

					//Apple server listening port

					$apns_port = 2195;

					if ($pem_preference == "production") {

						$apns_url = 'gateway.push.apple.com';

						$apns_cert = __DIR__.'/VOIP.pem';

					}

					//develop .pem

					else {

						$apns_url = 'gateway.sandbox.push.apple.com';

						$apns_cert = __DIR__.'/VOIP.pem';

					}

					$ctx = stream_context_create();

					// ck.pem is your certificate file

					stream_context_set_option($ctx, 'ssl', 'local_cert', 'VOIP.pem');

					stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);

					// Open a connection to the APNS server

					//$tHost = 'gateway.push.apple.com';

					$fp = stream_socket_client('ssl://'.$apns_url.':2195', $err,$errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);

					if (!$fp)

						exit("Failed to connect: $err $errstr" . PHP_EOL);

					// Create the payload body

					$body['aps'] = array( 

										'content-available'=> 1, 

										'alert' => $this->firstName.' '.$this->lastName. ' calling...',

										'sound' => 'default', 

										'badge' => 0, 

										'data' 	=> array (

											"message" 			=> $this->firstName.' '.$this->lastName. ' calling...',

											'title' 			=> $this->firstName.' '.$this->lastName. ' calling...',

											'roomnumber' 		=> $this->chatRoomNumber,

											'videocallingid' 	=> '1234',

											'patientId' 		=> $patientId,

											'patientUniqueId' 	=> $this->input->post_get('uniqueId'),

											'fcmtoken' 			=> $patientFcmToken,

											'appointmentId' 	=> $this->appointmentId,

											'patientRecordId' 	=> $this->patientRecordId,    //Added by Dileep on july 12 sunday 

											'type' 				=> $this->input->post_get('type')

									),

								);

					// Encode the payload as JSON

					$payload = json_encode($body);

					// Build the binary notification

					$msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;

					//echo $deviceToken; die();

					// Send it to the server

					$result = fwrite($fp, $msg, strlen($msg));

					//echo $result; die();

					// Close the connection to the server

					fclose($fp);

				}

			}

		}

	}

	public function get_patient_fcm_token($patientId){

		if($patientId == 0)

			return 0;

		$this->db->select('fcmToken,firstName,lastName,uniqueId,loginStatus, voipToken, deviceOS');				

		$this->db->from('axpatient');			

		$this->db->where('patientId', $patientId);	

		$query = $this->db->get();

		if($query->num_rows() > 0){	

				$row_array = $query->row_array();

				$this->firstName			= $row_array['firstName'];

				$this->lastName				= $row_array['lastName'];

				$this->patientUniqueId		= $row_array['uniqueId'];

				$this->patientLoginStatus	= $row_array['loginStatus'];

				$this->patientVoipToken		= $row_array['voipToken'];	// Added Dileep			

				$this->patientDeviceOS		= $row_array['deviceOS'];

				return $row_array['fcmToken'];

		}else{

			return 0;	

		}

	}

// Added Dilee July 13 2020

	public function get_patient_fcm_token_new($patientId){

		if($patientId == 0)

			return 0;

		$this->db->select('fcmToken,firstName,lastName,uniqueId,loginStatus, voipToken, deviceOS');				

		$this->db->from('axpatient');			

		$this->db->where('patientId', $patientId);	

		$query = $this->db->get();

		if($query->num_rows() > 0){	

				$row_array = $query->row_array();

				$this->firstName			= $row_array['firstName'];

				$this->lastName				= $row_array['lastName'];

				$this->patientUniqueId		= $row_array['uniqueId'];

				$this->patientLoginStatus	= $row_array['loginStatus'];

				$this->voipToken			= $row_array['voipToken'];	// Added Dileep	

				$this->fcmToken				= $row_array['fcmToken'];	// Added Dileep			

				$this->patientDeviceOS		= $row_array['deviceOS'];

				return 1;

		}else{

			return 0;

		}

	}

// End 

	public function get_doctor_fcm_token($doctorId){

		if($doctorId == 0)

			return 0;

		$this->db->select('fcmToken,chatRoomNumber,uniqueId,loginStatus,voipToken,deviceOS,doctorSessionDuration');				

		$this->db->from('axdoctors');			

		$this->db->where('doctorId', $doctorId);	

		$query = $this->db->get();

		if($query->num_rows() > 0){	

				$row_array = $query->row_array();

				$this->fcmToken				= $row_array['fcmToken'];

				$this->chatRoomNumber		= $row_array['chatRoomNumber'];

				$this->doctorUniqueId		= $row_array['uniqueId'];

				$this->doctorLoginStatus	= $row_array['loginStatus'];

				$this->doctorDeviceOS		= $row_array['deviceOS'];

				$this->voipToken			= $row_array['voipToken'];
				
				$this->doctorSessionDuration	= $row_array['doctorSessionDuration'];

				return 1;

		}else{

			return 0;

		}

	}

	function sendEndFCM($to) {

		if($to == '')

			return 0;

		$doctorId 	= '';

		$patientId 	= '';

		$fieldName 	= 'data';

		if ($this->input->post_get('recieverLoginType') == 1) {

			$doctorId 	= $this->Doctor_model->get_doctor_id_by_uniqueId(trim($this->input->post_get('recieverUniqueId')));

		}else if ($this->input->post_get('recieverLoginType') == 2) {

			$patientId 	= $this->Patient_model->get_patient_id_by_uniqueId(trim($this->input->post_get('recieverUniqueId')));

		}

		if ($this->input->post_get('loginType') == 1) {

			$doctorId 	= $this->Doctor_model->get_doctor_id_by_uniqueId(trim($this->input->post_get('uniqueId')));

		}else if ($this->input->post_get('loginType') == 2) {

			$patientId 	= $this->Patient_model->get_patient_id_by_uniqueId(trim($this->input->post_get('uniqueId')));

		}

		if($patientId <> '' && $doctorId <> ''){

			$patientFcmToken = $this->get_patient_fcm_token($patientId);

			$this->get_doctor_fcm_token($doctorId);

		}

		if ($this->input->post_get('recieverLoginType') == 1) {

			$doctorUniqueId = $this->input->post_get('recieverUniqueId');

			if($this->doctorDeviceOS == 'Android'){

				$fieldName 	= 'data';	

			}else if($this->doctorDeviceOS == 'iOS'){

				$fieldName 	= 'notification';	

			}

		}else if ($this->input->post_get('recieverLoginType') == 2) {

			$patientUniqueId = $this->input->post_get('recieverUniqueId');

			if($this->patientDeviceOS == 'Android'){

				$fieldName 	= 'data';	

			}else if($this->patientDeviceOS == 'iOS'){

				$fieldName 	= 'notification';	

			}

		}	

		if($this->input->post_get('recieverLoginType') == 1) {

			if($this->doctorDeviceOS == 'Android'){

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

										'patientDeviceOS' 	=> $this->patientDeviceOS,

										'doctorDeviceOS' 	=> $this->doctorDeviceOS,

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

			}else if($this->doctorDeviceOS == 'iOS'){	// send push notification only if , patient or doctor is online based on the login type

				if($this->voipToken <> '' && $this->voipToken <> 'NULL' && $this->voipToken <> NULL){

					$passphrase = '12345';

					$deviceToken = $this->voipToken;

					$pem_preference = "production";

					$apns_url = NULL;

					$apns_cert = NULL;

					//Apple server listening port

					$apns_port = 2195;

					if ($pem_preference == "production") {

						$apns_url = 'gateway.push.apple.com';

						$apns_cert = __DIR__.'/VOIP.pem';

					}

					//develop .pem

					else {

						$apns_url = 'gateway.sandbox.push.apple.com';

						$apns_cert = __DIR__.'/VOIP.pem';

					}

					$ctx = stream_context_create();

					// ck.pem is your certificate file

					stream_context_set_option($ctx, 'ssl', 'local_cert', 'VOIP.pem');

					stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);

					// Open a connection to the APNS server

					//$tHost = 'gateway.push.apple.com';

					$fp = stream_socket_client('ssl://'.$apns_url.':2195', $err,$errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);

					if (!$fp)

						exit("Failed to connect: $err $errstr" . PHP_EOL);

					// Create the payload body

					$body['aps'] = array( 

										'content-available'=> 1, 

										'alert' => '',

										'sound' => 'default', 

										'badge' => 0, 

										'data' 	=> array (

													"message" 			=> '',

													'title' 			=> '',

													'roomnumber' 		=> '',

													'videocallingid' 	=> '',

													'patientId' 		=> '',

													'patientUniqueId' 	=> '',

													'fcmtoken' 			=> '',

													'patientDeviceOS' 	=> $this->patientDeviceOS,

													'doctorDeviceOS' 	=> $this->doctorDeviceOS,

													'type' 				=> $this->input->post_get('type')

											),

								);

					// Encode the payload as JSON

					$payload = json_encode($body);

					// Build the binary notification

					$msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;

					//echo $deviceToken; die();

					// Send it to the server

					$result = fwrite($fp, $msg, strlen($msg));

					//echo $result; die();

					// Close the connection to the server

					fclose($fp);

				}

			}

		}else if ($this->input->post_get('recieverLoginType') == 2) {

			if($this->patientDeviceOS == 'Android'){

				$API_ACCESS_KEY = "AAAAy6LCT4s:APA91bGCsaS87ndfK2FppCbZRJjS-XQVxErQ8MsSUDm7dk-4U78HbbtFM-mMSgSR-rxzazhC3FJv5jNErAaoqY7OZ2gxoaCiNTyg67Ma_C99uh52IA1UbMCuHLtHHE_nULXF24JcLXAD";

				$url = 'https://fcm.googleapis.com/fcm/send';

				$fields = array (

								'to' 	=> $to,

								"collapse_key" =>  "type_a",

								'data'	=> array (

										"message" 			=> '',

										'title' 			=> '',

										'roomnumber' 		=> '',

										'videocallingid' 	=> '',

										'patientId' 		=> '',

										'patientUniqueId' 	=> '',

										'fcmtoken' 			=> '',

										'patientDeviceOS' 	=> $this->patientDeviceOS,

										'doctorDeviceOS' 	=> $this->doctorDeviceOS,

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

			}else if($this->patientDeviceOS == 'iOS'){	// send push notification only if , patient or doctor is online based on the login type

				if($this->patientVoipToken <> '' && $this->patientVoipToken <> 'NULL' && $this->patientVoipToken <> NULL){

					$passphrase = '12345';

					$deviceToken = $this->patientVoipToken;

					$pem_preference = "production";					

					$apns_url = NULL;

					$apns_cert = NULL;

					//Apple server listening port

					$apns_port = 2195;

					if ($pem_preference == "production") {

						$apns_url = 'gateway.push.apple.com';

						$apns_cert = __DIR__.'/VOIP.pem';

					}

					//develop .pem

					else {

						$apns_url = 'gateway.sandbox.push.apple.com';

						$apns_cert = __DIR__.'/VOIP.pem';

					}

					$ctx = stream_context_create();

					// ck.pem is your certificate file

					stream_context_set_option($ctx, 'ssl', 'local_cert', 'VOIP.pem');

					stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);

					// Open a connection to the APNS server

					//$tHost = 'gateway.push.apple.com';

					$fp = stream_socket_client('ssl://'.$apns_url.':2195', $err,$errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);

					if (!$fp)

						exit("Failed to connect: $err $errstr" . PHP_EOL);

					// Create the payload body

					$body['aps'] = array( 

										'content-available'=> 1, 

										'alert' => '',

										'sound' => 'default', 

										'badge' => 0, 

										'data' 	=> array (

													"message" 			=> '',

													'title' 			=> '',

													'roomnumber' 		=> '',

													'videocallingid' 	=> '',

													'patientId' 		=> '',

													'patientUniqueId' 	=> '',

													'fcmtoken' 			=> '',

													'patientDeviceOS' 	=> $this->patientDeviceOS,

													'doctorDeviceOS' 	=> $this->doctorDeviceOS,

													'type' 				=> '5'

											),

								);

					// Encode the payload as JSON

					$payload = json_encode($body);

					// Build the binary notification

					$msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;

					//echo $deviceToken; die();

					// Send it to the server

					$result = fwrite($fp, $msg, strlen($msg));

					//echo $result; die();

					// Close the connection to the server

					fclose($fp);

				}

			}

		}

		return 1;	

	}

	public function check_doctor_availabilty($doctorId){

		if($doctorId == '')

			return 1;

		$this->db->select('isEngaged,loginStatus');				

		$this->db->from('axdoctors');			

		$this->db->where('doctorId', $doctorId);	

		$query = $this->db->get();

		if($query->num_rows() > 0){	

				$row_array = $query->row_array();

				$this->doctorLoginStatus = $row_array['loginStatus'];

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

	function sendScheduleAppointmentFCM($patientId, $doctorId) {

		if($patientId == ''  || $doctorId == '')

			return 0;

		$patientFcmToken = $this->get_patient_fcm_token($patientId);

		$this->get_doctor_fcm_token($doctorId);

		if($this->fcmToken == '')

			return 0;

		$loginStatus = '';

		$fieldName 	= 'data';

		if($this->input->post_get('loginType') == 1){

			if($this->patientLoginStatus == 1){ // set push notification flag to one only if patient logged in

				$loginStatus = 1;	

			}

			if($this->patientDeviceOS == 'Android'){

				$fieldName 	= 'data';	

			}else if($this->patientDeviceOS == 'iOS'){

				$fieldName 	= 'notification';	

			}

		}else if($this->input->post_get('loginType') == 2){ // set push notification flag to one only if patient logged in

			if($this->doctorLoginStatus == 1){

				$loginStatus = 1;	

			}

			if($this->doctorDeviceOS == 'Android'){

				$fieldName 	= 'data';	

			}else if($this->doctorDeviceOS == 'iOS'){

				$fieldName 	= 'notification';	

			}

		}		

		if($loginStatus == 1){	// send push notification only if , doctor is online

			$API_ACCESS_KEY = "AAAAy6LCT4s:APA91bGCsaS87ndfK2FppCbZRJjS-XQVxErQ8MsSUDm7dk-4U78HbbtFM-mMSgSR-rxzazhC3FJv5jNErAaoqY7OZ2gxoaCiNTyg67Ma_C99uh52IA1UbMCuHLtHHE_nULXF24JcLXAD";

			$url = 'https://fcm.googleapis.com/fcm/send';

			$fields = array (

					'to' 			=> $this->fcmToken,

					"collapse_key" 	=>  "type_a",

					'priority' 		=> 'high',

					$fieldName  	=> 	array (

							"message" 			=> 'New appointment request',

							'title' 			=> $this->firstName.' '.$this->lastName. '('.$this->input->post_get('uniqueId').') requested for an appointment.',

							'patientId' 		=> $this->input->post_get('uniqueId'),

							'appointmentId' 	=> $this->appointmentId,

							'requestDate' 		=> $this->requestDate,

							'requestSession' 	=> $this->requestSession,

							'appointmentNote' 	=> $this->appointmentNote,

							'patientDeviceOS' 	=> $this->patientDeviceOS,

							'doctorDeviceOS' 	=> $this->doctorDeviceOS,
							
							'doctorSessionDuration' => $this->doctorSessionDuration,

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

	}

	public function get_chat_doctors_list($patientId) // To get doctors list from communication log using paientId

	{	

		if($patientId == '')

			return 0;

		$this->db->select(' 

							axdoctors.doctorName AS doctorName,

                            axdoctors.uniqueId  AS doctorUniqueId,

                            axdoctors.fcmToken  AS doctorFcmToken,

							axdoctors.voipToken AS doctorVoipToken,

							axdoctors.chatRoomNumber,

							CONCAT(axpatient.firstName , " ", axpatient.lastName) AS patientName,

							axpatient.uniqueId  AS patientUniqueId,

                            axpatient.fcmToken  AS patientFcmToken,

							DATE_FORMAT(axpatientrecords.communicationDate, "%d-%b-%Y") AS communicationDate,

							TIME_FORMAT(axpatientrecords.communicationStartTime, "%h:%i %p") AS communicationStartTime,

							axpatientrecords.patientId,

							axpatientrecords.doctorId,

							axdoctors.isScheduleEnabled,

							axdoctors.isCallEnabled,

							axdoctors.isViewDetailInfo,

							axdoctors. isShowGreen,

							axdoctors.deviceOS AS doctorDeviceOS,

							axpatient.deviceOS AS patientDeviceOS 

						  ');

		$this->db->from('axpatientrecords');

		$this->db->join('axpatient', 'axpatient.patientId = axpatientrecords.patientId', 'left');

        $this->db->join('axdoctors ', 'axdoctors.doctorId = axpatientrecords.doctorId', 'left');

		$this->db->where('axpatientrecords.patientId',$patientId);

		//$this->db->where('axpatientrecords.communicationEndTime !=','00:00:00');

		//$this->db->order_by("communicationDate,communicationStartTime", "DESC");

		$this->db->where("axpatientrecords.communicationMode", 3); 

		$this->db->order_by("patientRecordId", "DESC");

		$this->db->order_by("isPatientRead", "ASC");

        $this->db->group_by('axpatientrecords.doctorId');	

		$query = $this->db->get();

		//echo  $this->db->last_query();die();

		return $query->result_array();

	}

	// To get the appointment id of the patient for the doctor , on the specified date and time interval

	public function get_fixed_appointment_id($patientId,$doctorId)

	{	

		if($patientId == '' || $doctorId == '')

			return 0;

		$this->db->select('appointmentId');

		$this->db->from('axappointments');

		$this->db->where('patientId',$patientId);

        $this->db->where('doctorId',$doctorId);

		$this->db->where('status',1);	

        if($this->communicationDate <> '')

			$this->db->where('appointmentDate', $this->communicationDate);

        if($this->communicationStartTime <> '')

           $this->db->where('axappointments.appointmentStartTime <= "'.$this->communicationStartTime.'" AND axappointments.appointmentEndTime > "'.$this->communicationStartTime.'"');

		$query = $this->db->get();

		if($query->num_rows() > 0){	

			$row_array = $query->row_array();

			$this->isNewAppointment = 0;

			return $row_array['appointmentId'];

		}else{

			return 0;

			/*$insDate = date("Y-m-d H:i:s", now('Asia/Kolkata'));

			$this->Doctor_model->get_doctor_consultation_fee($this->doctorId);

			$sessionDuration 	= $this->Doctor_model->doctorSessionDuration; // Set docor default session duration

			if($this->subscriptionId <> ''){

				$sessionDuration = $this->get_subscription_package_duration($this->subscriptionId);

			}

			if($sessionDuration <> ''){

				$this->db->select('appointmentStartTime,appointmentEndTime');

				$this->db->from('axappointments');

				$this->db->where('doctorId',$doctorId);

				$this->db->where('status',1);	

				if($this->communicationDate <> '')

					$this->db->where('appointmentDate', $this->communicationDate);

				if($this->communicationStartTime <> '')

				   $this->db->where('axappointments.appointmentStartTime >= "'.$this->communicationStartTime.'"');

				$this->db->order_by("appointmentStartTime", "ASC");	   

				$query = $this->db->get();

				   if($query->num_rows() > 0){	 // if any other appointments greater tahn the communication strt time , thn calculat the diffrence and adjust the appointment end time

						$row_array = $query->row_array();

						$communicationDuration = (strtotime($row_array['appointmentStartTime']) - strtotime($this->communicationStartTime)) / 60;						

						if($communicationDuration < $sessionDuration){ // adjust the appointment time based the duration only if it is less than default doctor session duration			

							$this->errorMessage = 'Doctor is not available. Please try again after '.date('h:i a', strtotime($row_array['appointmentEndTime'])).' !!!';

							return 0;

						}else{

							$this->appointmentEndTime = date('H:i:s',strtotime($this->communicationStartTime.' + '.$sessionDuration.' minute'));

						}

					}else{

						$this->appointmentEndTime = date('H:i:s',strtotime($this->communicationStartTime.' + '.$sessionDuration.' minute'));

					}

			}

			$data = array(

				'patientId' 			=> $this->patientId,

				'doctorId' 				=> $this->doctorId,

				'requestDate' 			=> $this->communicationDate,

				'appointmentDate' 		=> $this->communicationDate,

				'appointmentStartTime' 	=> $this->communicationStartTime,

				'appointmentEndTime' 	=> $this->appointmentEndTime,

				'status' 				=> 1,

				'insDate' 				=> $insDate

			);

			$this->db->insert('axappointments', $data);

			$this->appointmentId = $this->db->insert_id();

			$this->isNewAppointment = 1;

			return $this->appointmentId ;*/

		}

		return 0;

	}

	// To check some other patient booked the appointment for the same time and not completed the appointment or that doctor

	public function check_appoitment_availability($patientId,$doctorId) 

	{	

		if($patientId == '' || $doctorId == '')

			return 0;

		$this->db->select('appointmentId');

		$this->db->from('axappointments');

		$this->db->where('patientId !=',$patientId);

        $this->db->where('doctorId',$doctorId);

		$this->db->where('status',1);	

		//$this->db->where('isCompleted',0);	

        if($this->communicationDate <> '')

			$this->db->where('appointmentDate', $this->communicationDate);

        if($this->communicationStartTime <> '')

			$this->db->where('axappointments.appointmentStartTime <= "'.$this->communicationStartTime.'" AND axappointments.appointmentEndTime > "'.$this->communicationStartTime.'"');

		/*$this->db->where('STR_TO_DATE(axappointments.appointmentStartTime, "%l:%i %p") <= "'.$this->communicationStartTime.'" AND STR_TO_DATE(axappointments.appointmentEndTime, "%l:%i %p") >= "'.$this->communicationStartTime.'"');*/	

		$query = $this->db->get();

		//echo $this->db->last_query();die();

		if($query->num_rows() > 0){	

			$row_array = $query->row_array();

			return $row_array['appointmentId'];

		}else{

			return 0;	

		}	

	}

	// To check the patinet called in the allowed time intrval

	public function check_appoitment_validity($patientId,$doctorId) 

	{	

		if($patientId == '' || $doctorId == '')

			return 0;

		$this->db->select('appointmentId');

		$this->db->from('axappointments');

		$this->db->where('patientId',$patientId);

        $this->db->where('doctorId',$doctorId);

		$this->db->where('status',1);	

        if($this->communicationDate <> '')

			$this->db->where('appointmentDate', $this->communicationDate);

        if($this->communicationStartTime <> '')

			$this->db->where('axappointments.appointmentStartTime <= "'.$this->communicationStartTime.'" AND axappointments.appointmentEndTime > "'.$this->communicationStartTime.'"');

		$query = $this->db->get();

		//echo $this->db->last_query();die();

		if($query->num_rows() > 0){	

			$row_array = $query->row_array();

			return $row_array['appointmentId'];

		}else{

			return 0;	

		}	

	}

	public function update_appointment_time() 

	{	

		$this->db->select('*');

		$this->db->from('axappointments');

		$query = $this->db->get();

		$result_array = $query->result_array();	

		foreach($result_array as $row){

			$data = array(			

				'appointmentStartTime' 				=> date("H:i:s", strtotime($row["appointmentStartTime"])),

				'appointmentEndTime' 				=> date("H:i:s", strtotime($row["appointmentEndTime"]))

			);			

			$this->db->set($data); 			

			$this->db->where('appointmentId', $row["appointmentId"]);				

			$this->db->update("axappointments", $data); 

		}

	}

	public function get_prescriptions_deatils($prescriptionId)

	{	

		if($prescriptionId == '')

			return 0;

		$this->db->select(' 

							axprescriptions.prescriptionId,

							axprescriptions.appointmentId,

							axprescriptions.paymentId,

							axprescriptions.prescriptionNotes,

							axprescriptions.totalAmount,

							axprescriptions.status,	

							DATE_FORMAT(axprescriptions.insDate, "%d-%b-%Y %h:%i %p") AS insDate,

							axdoctors.doctorName,

							axdoctors.uniqueId AS doctorUniqueId,

							axdoctors.fcmToken AS doctorFcmToken,

							axdoctors.voipToken AS doctorVoipToken,

							axdoctors.doctorEmail,

							axdoctors.doctorMobile,

							axdoctors.qualification,

							axdoctors.qualification1,

							axdoctors.doctorImageUrl,

							axdoctors.youtubeLink,

							axdoctors.doctorFee,

							axdoctors.communicationMode,

							axdoctors.doctorSessionDuration,

							axdoctors.chatRoomNumber,

							axdoctors.medicalRegistrationNumber,

							axdoctors.specialization,

							CONCAT(axpatient.firstName , " ", axpatient.lastName) AS patientName,

							axpatient.uniqueId  AS patientUniqueId

						  ');

		$this->db->from('axprescriptions');

		$this->db->join('axdoctors', 'axdoctors.doctorId = axprescriptions.doctorId', 'left');

		$this->db->join('axpatient', 'axpatient.patientId = axprescriptions.patientId', 'left');

		$this->db->where('axprescriptions.prescriptionId',$prescriptionId);

		$query = $this->db->get();

		//echo  $this->db->last_query();die();

		return $query->row_array();

	}

	public function get_subscription_package_duration($subscriptionId){

		if($subscriptionId == '') return 0;

		$this->db->select('axpackages.packageDuration');

		$this->db->from('axsubscription');

		$this->db->where('subscriptionId',$subscriptionId);

		$this->db->join('axpackages', 'axpackages.packageId = axsubscription.packageId', 'left');

		$query = $this->db->get();

	   if($query->num_rows() > 0){	 

			$row_array = $query->row_array();

			return $row_array['packageDuration']; 

	   }else{

			return 0;   

		}

	}

	public function update_previous_chat_log_status($patientId,$doctorId)  // Function definition to update read status

	{	

		if($patientId == '' || $doctorId == '')

			return 0;

		$notificationType = '';	

		if($this->input->post_get('loginType') == 1){ // if doctor send then , update all previous chat's doctor read status to 1

			$data = array(

				'isDoctorRead' 	=> 1	

			);

			$notificationType  = 6;

		}else if($this->input->post_get('loginType') == 2){// if patieny send then , update all previous chat's patient read status to 1

			$data = array(

				'isPatientRead' 		=> 1

			);

			$notificationType  = 5;

		}

		$this->db->where("patientId", $patientId); 

		$this->db->where("doctorId", $doctorId); 

		$this->db->where("communicationMode", 3); 

		$this->db->update("axpatientrecords", $data);

		$data1 = array(

				'status' 		=> 1

			);

		$this->db->where("patientId", $patientId); 

		$this->db->where("doctorId", $doctorId); 

		$this->db->where("notificationType", $notificationType); 

		$this->db->update("axnotifications", $data1);		

	}

	function sendChatFCM($patientId, $doctorId) {

		if($patientId == ''  || $doctorId == '')

			return 0;

		$patientFcmToken = $this->get_patient_fcm_token($patientId);

		$this->get_doctor_fcm_token($doctorId);

		if($this->fcmToken == '')

			return 0;

		$API_ACCESS_KEY = "AAAAy6LCT4s:APA91bGCsaS87ndfK2FppCbZRJjS-XQVxErQ8MsSUDm7dk-4U78HbbtFM-mMSgSR-rxzazhC3FJv5jNErAaoqY7OZ2gxoaCiNTyg67Ma_C99uh52IA1UbMCuHLtHHE_nULXF24JcLXAD";

		$url = 'https://fcm.googleapis.com/fcm/send';

		$to = '';

		$loginStatus = 0;

		$fieldName 	= 'data';

		if($this->input->post_get('loginType') == 1){ 

			$to = $patientFcmToken ;

			if($this->patientLoginStatus == 1){ // set push notification flag to one only if patient logged in

				$loginStatus = 1;	

			}

			if($this->patientDeviceOS == 'Android'){

				$fieldName 	= 'data';	

			}else if($this->patientDeviceOS == 'iOS'){

				$fieldName 	= 'notification';	

			}

		}else if($this->input->post_get('loginType') == 2){ 

			$to = $this->fcmToken ;

			if($this->doctorLoginStatus == 1){// set push notification flag to one only if doctor logged in

				$loginStatus = 1;	

			}

			if($this->doctorDeviceOS == 'Android'){

				$fieldName 	= 'data';	

			}else if($this->doctorDeviceOS == 'iOS'){

				$fieldName 	= 'notification';	

			}

		}

		$clientName = '';

		if($this->input->post_get('loginType') == 1){

			$clientName = $this->get_doctor_name($this->doctorId);

		}else if($this->input->post_get('loginType') == 2){

			$clientName = $this->get_patient_name($this->patientId);

		}

		if($loginStatus == 1){	// send push notification only if , doctor is online based on the login type

			$fields = array (

					'to' 			=> $to,

					"collapse_key" 	=>  "type_a",

					$fieldName		=> array (

							"message" 			=> 'New message from '.$clientName.'('.$this->input->post_get('uniqueId').')',

							'title' 			=> 'New message from '.$clientName.'('.$this->input->post_get('uniqueId').')',

							'roomnumber' 		=> $this->chatRoomNumber,

							'videocallingid' 	=> '1234',

							'doctorUniqueId' 	=> $this->doctorUniqueId,

							'patientUniqueId' 	=> $this->patientUniqueId,

							'patientFcmToken' 	=> $patientFcmToken,

							'doctorFcmToken' 	=> $this->fcmToken,

							'patientDeviceOS' 	=> $this->patientDeviceOS,

							'doctorDeviceOS' 	=> $this->doctorDeviceOS,

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

	}

	public function get_unread_count_patient($patientId,$doctorId)

	{	

		if($patientId == '' || $doctorId == '')

			return 0;

		$this->db->where('patientId',$patientId);

        $this->db->where('doctorId',$doctorId);

		$this->db->where('isPatientRead',0);	

		$this->db->where("communicationMode", 3); 

		$this->db->from('axpatientrecords');

		return $this->db->count_all_results();	

	}

	function retrieveTimeOffset(){

		$gmtDate = gmdate("Y-m-d H:i:s");

		$this->db->select(" DATE_ADD('".$gmtDate."',INTERVAL timeOffset MINUTE) AS today,

							timeOffset,  

							DATE_FORMAT(DATE_ADD('$gmtDate',INTERVAL timeOffset MINUTE),'%W %d %M, %Y') AS dateStr,

							DATE_FORMAT(DATE_ADD('$gmtDate',INTERVAL timeOffset MINUTE),'%h:%i %p') AS timeStr,

							DATE_FORMAT(DATE_ADD('$gmtDate',INTERVAL timeOffset MINUTE),".constant('DISPLAYDATEFORMAT').") AS date,

							DATE_ADD('$gmtDate',INTERVAL timeOffset-1440 MINUTE) AS yesterday"

						); 

		$this->db->from("axsetting");

		$this->db->where("settingId = 1");

		$query = $this->db->get();

		$row = $query->row_array();		

		$today		= $row["today"];

		$dateStr 	= $row["dateStr"];

		$timeStr 	= $row["timeStr"];

		$date 		= $row["date"];

		$yesterday 	= $row["yesterday"];

		$date		= explode(' ', $today);

		$today		= explode(':', $date[1]);

		$arrDay		= explode('-', $date[0]); 

		$hr			= $today[0] ;

		$min		= $today[1] ;

		$sec		= $today[2] ;

		$day		= $arrDay[2];

		$month		= $arrDay[1];

		$year		= $arrDay[0];

		$this->currentTime 		= $year."-".$month."-".$day." ".$hr.":".$min.":00";

		$this->currentDay 		= $year."-".$month."-".$day;

		$this->currentDayTime 	= $hr.":".$min.":00";

	}	

	public function send_medicine_request_notification_email($prescriptionId){

		if($prescriptionId == '') return 0;		

		$prescription_item = $this->get_prescriptions_deatils($prescriptionId);

		if($prescription_item){

			$settingId = 1;

			$this->db->select('adminEmail');

			$this->db->from('axsetting');

			$this->db->where('settingId',$settingId);

			$row_array = $this->db->get()->row_array();		

			$from 		=	$row_array['adminEmail'];

			$to			= 	$row_array['adminEmail'];

			$this->email->set_newline("\r\n");

			$this->email->set_header('MIME-Version', '1.0; charset=utf-8');

			$this->email->set_header('Content-type', 'text/html');

			$message 			= "";			

			$this->email->from($from, 'Metro Mind'); 

			$this->email->to($to);			

			$this->email->subject('Metro Mind Medicine Request'); 

			$message 	= '	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

							<html xmlns="http://www.w3.org/1999/xhtml">

								<body>

									<div style="border: 2px solid #00C1B6;padding: 15px;">

										<p> <strong>Dear Sir,</strong></p>

										<p> Mr/Mrs '.$prescription_item['patientName'].' requested for a medicine , prescribed by  '.$prescription_item['doctorName'].',</p>

										<p>  Medicine(s) are ,</p>

										<p style="padding-left:20px">'.$prescription_item['prescriptionNotes'].'</p>

										<p> Regards,</p>

										<p>  <strong>Team Metro Mind </strong></p>

									</div>

									<p>  &nbsp;</p>

								</body>

							</html>	'; 

			 $this->email->message($message); 

			 //Send mail 

			 if($this->email->send()) 

				return 1;

			 else 

				return 0;

		}

	}

	public function get_phonePrefix($countryId){

		if($countryId == '') return 0;

		$this->db->select('phonePrefix');

		$this->db->from('axcountries');

		$this->db->where('countryId', $countryId);	

		$row_array = $this->db->get()->row_array();

		if(count($row_array)>0){

			return $row_array['phonePrefix'];

		}else{

		return 0;

		}

	}

	public function get_patient_name($patientId){

		if($patientId == '') return '';

		$this->db->select('CONCAT(axpatient.firstName , " ", axpatient.lastName) AS patientName');

		$this->db->from('axpatient');

		$this->db->where('patientId', $patientId);	

		$row_array = $this->db->get()->row_array();

		if(count($row_array)>0){

			return $row_array['patientName'];

		}else{

		return '';

		}

	}

	public function get_doctor_name($doctorId){

		if($doctorId == '') return '';

		$this->db->select('doctorName');

		$this->db->from('axdoctors');

		$this->db->where('doctorId', $doctorId);	

		$row_array = $this->db->get()->row_array();

		if(count($row_array)>0){

			return $row_array['doctorName'];

		}else{

		return '';

		}

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

	public function send_otp_notification_email_admin($patientMobile){

		if($patientMobile == '') return 0;		

		$data = array(

			'otpFlag' 	=> 1

		);

		$this->db->set($data); 

		$this->db->where("patientMobile", $patientMobile); 

		$this->db->update("axpatient", $data);	

		$settingId = 1;

		$this->db->select('adminEmail');

		$this->db->from('axsetting');

		$this->db->where('settingId',$settingId);

		$row_array = $this->db->get()->row_array();		

		$from 		=	$row_array['adminEmail'];

		$to			= 	$row_array['adminEmail'];

		$this->email->set_newline("\r\n");

		$this->email->set_header('MIME-Version', '1.0; charset=utf-8');

		$this->email->set_header('Content-type', 'text/html');

		$message 			= "";			

		$this->email->from($from, 'Metro Mind'); 

		$this->email->to($to);			

		$this->email->subject('Metro Mind OTP Failure!'); 

		$message 	= '	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

						<html xmlns="http://www.w3.org/1999/xhtml">

							<body>

								<div style="border: 2px solid #00C1B6;padding: 15px;">

									<p> <strong>Dear Sir,</strong></p>

									<p> Mobile number '.$patientMobile.' did not get the OTP for account verification at METRO MIND .</p>

									<p> Regards,</p>

									<p>  <strong>Team Metro Mind </strong></p>

								</div>

								<p>  &nbsp;</p>

							</body>

						</html>	'; 

		 $this->email->message($message); 

		 //Send mail 

		 if($this->email->send()) 

			return 1;

		 else 

			return 0;

	}

	function sendEndChatFCM($patientRecordId,$to) {

		if($patientRecordId == '' || $to == '')

			return 0;

		if($this->noOfMessage  == 0){

			$this->db->delete("axpatientrecords", "patientRecordId IN ( ".$patientRecordId.")");

			$this->db->delete("axnotifications", "patientRecordId IN ( ".$patientRecordId.")");

		}

		$doctorUniqueId 	= '';

		$patientUniqueId 	= '';

		$doctorId 	= '';

		$patientId 	= '';

		$fieldName 	= 'data';

		if ($this->input->post_get('recieverLoginType') == 1) {

			$doctorId 	= $this->Doctor_model->get_doctor_id_by_uniqueId(trim($this->input->post_get('recieverUniqueId')));

		}else if ($this->input->post_get('recieverLoginType') == 2) {

			$patientId 	= $this->Patient_model->get_patient_id_by_uniqueId(trim($this->input->post_get('recieverUniqueId')));

		}

		if ($this->input->post_get('loginType') == 1) {

			$doctorId 	= $this->Doctor_model->get_doctor_id_by_uniqueId(trim($this->input->post_get('uniqueId')));

		}else if ($this->input->post_get('loginType') == 2) {

			$patientId 	= $this->Patient_model->get_patient_id_by_uniqueId(trim($this->input->post_get('uniqueId')));

		}

		if($patientId <> '' && $doctorId <> ''){

			$patientFcmToken = $this->get_patient_fcm_token($patientId);

			$this->get_doctor_fcm_token($doctorId);

		}

		if ($this->input->post_get('recieverLoginType') == 1) {

			$doctorUniqueId = $this->input->post_get('recieverUniqueId');

			if($this->doctorDeviceOS == 'Android'){

				$fieldName 	= 'data';	

			}else if($this->doctorDeviceOS == 'iOS'){

				$fieldName 	= 'notification';	

			}

		}else if ($this->input->post_get('recieverLoginType') == 2) {

			$patientUniqueId = $this->input->post_get('recieverUniqueId');

			if($this->patientDeviceOS == 'Android'){

				$fieldName 	= 'data';	

			}else if($this->patientDeviceOS == 'iOS'){

				$fieldName 	= 'notification';	

			}

		}

		if ($this->input->post_get('loginType') == 1) {

			$doctorUniqueId = $this->input->post_get('uniqueId');

		}else if ($this->input->post_get('loginType') == 2) {

			$patientUniqueId = $this->input->post_get('uniqueId');

		}

		$API_ACCESS_KEY = "AAAAy6LCT4s:APA91bGCsaS87ndfK2FppCbZRJjS-XQVxErQ8MsSUDm7dk-4U78HbbtFM-mMSgSR-rxzazhC3FJv5jNErAaoqY7OZ2gxoaCiNTyg67Ma_C99uh52IA1UbMCuHLtHHE_nULXF24JcLXAD";

		$url = 'https://fcm.googleapis.com/fcm/send';

		$fields = array (

				'to' 	=> $to,

				"collapse_key" =>  "type_a",

				$fieldName 	=> array (

						"message" 			=> '',

						'title' 			=> '',

						'roomnumber' 		=> '',

						'videocallingid' 	=> '',

						'doctorUniqueId' 	=> $doctorUniqueId,

						'patientUniqueId' 	=> $patientUniqueId,

						'fcmtoken' 			=> '',

						

						'patientDeviceOS' 	=> $this->patientDeviceOS,

						'doctorDeviceOS' 	=> $this->doctorDeviceOS,

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

	function sendFCMTest($patientId, $doctorId) {

		$passphrase = '12345';

		//$deviceToken = 'eb3f8b72c8b65ed8a4481e4e2eb4f76abe6714d0128f2551152bbf96ea301d59';

		$deviceToken = 'e01cc0f2682e493a08821ee810d4ce15782e75f93dd019307c36c5a18a344c0c';

		//$deviceToken = 'eca10f23382a607e3186e12d76a5a8b474e04f3cec6122dceb24998e37309dfa';

		//$deviceToken = $devicetoken;

		$ctx = stream_context_create();

		// ck.pem is your certificate file

		stream_context_set_option($ctx, 'ssl', 'local_cert', 'VOIP.pem');

		stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);

		// Open a connection to the APNS server

		//$tHost = 'gateway.push.apple.com';

		$fp = stream_socket_client(

			'ssl://gateway.sandbox.push.apple.com:2195', $err,

			$errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);

		if (!$fp)

			exit("Failed to connect: $err $errstr" . PHP_EOL);

		// Create the payload body

		$body['aps'] = array( 

                        'content-available'=> 1, 

                        'alert' => "Dileep Kumar P B calling...", 

                        'sound' => 'default', 

                        'badge' => 0, 

                        'data' => array

                        (

                            'message' => 'Dileep Kumar P B calling...',

                            'title' => 'Dileep Kumar P B calling...',

                            'roomnumber' => '14040',

                            'videocallingid' => '1234',

							'patientId' => '1',

                            'doctorUniqueId' => 'METROMINDD1',

                            'patientUniqueId' => 'METROMINDP201',

                            'fcmtoken' =>

                            'd_3rvD3JRWmJZ8I4ePIKsP:APA91bFc7ukbWJbm4PjVRILB1ETDKKwjNwyDdHg-u-uK7Oq3NCT_X2KtzPvbIygOvDN5-henT-9hqoDmCQFMnAJ9LThlpwVtIsoVpeGWKiVETcxk8ytrO3LLYOBX7_OkpG6bSfupx3p6',

                            'type' => '2'

                        )

                );

		// Encode the payload as JSON

		$payload = json_encode($body);

		// Build the binary notification

		$msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;

		//echo $deviceToken; die();

		// Send it to the server

		$result = fwrite($fp, $msg, strlen($msg));

		//echo $result; die();

		// Close the connection to the server

		/*fclose($fp);

		print_r($result);

		if (!$result)

			echo  'Message not delivered';

		else

			echo 'Message successfully delivered';*/

		return $body;

	}

	function sendFCMTestOld($patientId, $doctorId) {

		if($patientId == ''  || $doctorId == '')

			return 0;

		$patientFcmToken = $this->get_patient_fcm_token($patientId);

		$this->get_doctor_fcm_token($doctorId);

		if($this->fcmToken == '')

			return 0;

		$loginStatus = 1;	

		if($loginStatus == 1){	// send push notification only if , patient or doctor is online based on the login type

			$passphrase = '12345';

			$deviceToken = 'e01cc0f2682e493a08821ee810d4ce15782e75f93dd019307c36c5a18a344c0c';

			//$deviceToken = $devicetoken;

			$ctx = stream_context_create();

			// ck.pem is your certificate file

			stream_context_set_option($ctx, 'ssl', 'local_cert', 'VOIP.pem');

			stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);

			// Open a connection to the APNS server

			//$tHost = 'gateway.push.apple.com';

			$fp = stream_socket_client(

				'ssl://gateway.sandbox.push.apple.com:2195', $err,

				$errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);

			if (!$fp)

				exit("Failed to connect: $err $errstr" . PHP_EOL);

			// Create the payload body

			$body['aps'] = array( 

                        'content-available'=> 1, 

                        'alert' => $this->firstName.' '.$this->lastName. ' calling...',

                        'sound' => 'default', 

                        'badge' => 0, 

                        'data' 	=> array (

							"message" 			=> $this->firstName.' '.$this->lastName. ' calling...',

							'title' 			=> $this->firstName.' '.$this->lastName. ' calling...',

							'roomnumber' 		=> $this->chatRoomNumber,

							'videocallingid' 	=> '1234',

							'patientId' 		=> $patientId,

							'patientUniqueId' 	=> $this->input->post_get('uniqueId'),

							//'fcmtoken' 			=> $patientFcmToken,

							'type' 				=> $this->input->post_get('type')

					),

                );

			// Encode the payload as JSON

			$payload = json_encode($body);

			// Build the binary notification

			$msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;

			//echo $deviceToken; die();

			// Send it to the server

			$result = fwrite($fp, $msg, strlen($msg));

			//echo $result; die();

			// Close the connection to the server

			/*fclose($fp);

			print_r($result);

			if (!$result)

				echo  'Message not delivered';

			else

				echo 'Message successfully delivered';*/

			return $body;

		}else{

			return 0;	

		}

	}

	public function get_patient_device_os($uniqueId){

		if($uniqueId == '')

			return 0;

		$this->db->select('deviceOS');				

		$this->db->from('axpatient');			

		$this->db->where('uniqueId', $uniqueId);	

		$query = $this->db->get();

		if($query->num_rows() > 0){	

				$row_array = $query->row_array();

				return $row_array['deviceOS'];

		}else{

			return '';	

		}

	}
	
	function get_razor_pay_settings(){

		$this->db->select("
							razorPayApiKey,
							razorPaySecretKey,
							razorPayCurrency,
							calendarLimit
							
							"
						); 

		$this->db->from("axsetting");

		$this->db->where("settingId = 1");

		$query 	= $this->db->get();

		$row 	= $query->row_array();		

		$this->razorPayApiKey		= $row["razorPayApiKey"];

		$this->razorPaySecretKey 	= $row["razorPaySecretKey"];
		
		$this->razorPayCurrency 	= $row["razorPayCurrency"];
		
		$this->calendarLimit 		= $row["calendarLimit"];


	}
	
	public function get_last_record_id($patientId,$doctorId,$appointmentId)
	{	
		if($patientId == '' || $doctorId == '' || $appointmentId == '')

			return 0;
			
		$this->db->select('patientRecordId');

		$this->db->from("axpatientrecords");

		$this->db->where('patientId', $patientId);
		
		$this->db->where('doctorId', $doctorId);
		
		$this->db->where('appointmentId', $appointmentId);
		
		$this->db->where('communicationMode != 3'); // To exclude chat records	
		
		$this->db->order_by("patientRecordId", "DESC");

		$this->db->limit(1, 0);

		$query = $this->db->get();

		$patientRecordId = 0;

		if($query->num_rows() > 0){	
		
			$row_array 			= $query->row_array();
			
			$patientRecordId 	= $row_array['patientRecordId'];
		}
	
		return $patientRecordId;
	}

}			

?>