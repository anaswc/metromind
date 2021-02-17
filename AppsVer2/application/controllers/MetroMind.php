<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions

/** @noinspection PhpIncludeInspection */

//To Solve File REST_Controller not found

require APPPATH . 'libraries/REST_Controller.php';

require APPPATH . 'libraries/Format.php';

class MetroMind extends CI_Controller

{

	use REST_Controller {

		REST_Controller::__construct as private __resTraitConstruct;

	}

	public function __construct()

	{

		// Construct the parent class

		parent::__construct();

		$this->__resTraitConstruct();

		$this->load->model('Patient_model');

		$this->load->model('Login_model');

		$this->load->model('Country_model');

		$this->load->model('Doctor_model');

		$this->load->model('Speciality_model');

		$this->load->model('Symptom_model');

		$this->load->model('Rating_model');

		$this->load->model('Package_model');

		$this->load->model('Cms_model');

		$this->load->model('ReportIssue_model');

		$this->load->model('Signup_model');

		$this->load->helper(['jwt', 'authorization']);

		$this->output->cache(30);

		$this->tokenPass = 0;
		date_default_timezone_set("Asia/Kolkata");

	}

	// For getting the countries stored in the echo system . response is country name , country code and country flag	

	function country_get()

	{

		$this->Country_model->setPostGetVars();

		$result = $this->Country_model->get_country();

		if (!$result) { // If countries is empty return an empty result array 

			$result = array();

			$response = ['status' => 201,  'result' => $result, 'message' => HTTP_STATUS_CODES[204]];

			$this->response($response, 200);

		} else {

			$status = 200;

			$response = ['status' => $status,  'result' => $result, 'message' => HTTP_STATUS_CODES[200]];

			$this->response($response, 200);

		}

	}

	//API - create a new account.

	//Arguments : firstName,lastName,gender,birthDate,memberEmail,countryCode,isAcceptedTerms,isAcceptedPrivacy,encryptPassword

	//Response : if the mandatory values is not filled then status = 460, if the password enterd is not in the valid format  status = 479, if the email is already used status = 461 and if the email is already used and the account is deleted status = 480 

	function signup_post()

	{

		
		$this->Patient_model->setPostGetVars();

		if ($this->Patient_model->patientMobile == '') {
			

			$result = array();

			$errorMessage	= HTTP_STATUS_CODES[460];

			if ($this->Patient_model->patientMobile == '')

				$errorMessage	= $errorMessage . ' ' . ' Mobile,';

			/*if($this->Patient_model->otp == '')

				$errorMessage	= $errorMessage.' '.' OTP,';	*/

			$response = ['status' => 201, 'result' => $result, 'message' => $errorMessage];

			$this->response($response, 200);

		}
		

		$valid = $this->Patient_model->validate_signup_mobile($this->Patient_model->patientMobile);
		
		

		if (!$valid) {
			

			$result = array();

			if ($this->Patient_model->errorMessage <> '') {

				$errorMessage	=	$this->Patient_model->errorMessage;

			} else {

				$errorMessage	= 460;

			}

			$response = ['status' => 201,  'result' => $result, 'message' => HTTP_STATUS_CODES[$errorMessage]];

			$this->response($response, 200);

		} else if ($valid === 100) {
		

			$result = array();

			if ($this->Patient_model->errorMessage <> '') {

				$errorMessage	=	$this->Patient_model->errorMessage;

			} else {

				$errorMessage	= 461;

			}

			if ($this->Patient_model->errorMessage == 483)

				$isCompletedInfo = 0;

			else

				$isCompletedInfo = 1;

			$response = ['status' => 201,  'result' => $result, 'uniqueId' => $this->Patient_model->uniqueId, 'isCompletedInfo' => $isCompletedInfo, 'message' => HTTP_STATUS_CODES[$errorMessage]];

			$this->response($response, 200);

		} else if ($valid === 101) {

			

			$result = $this->Patient_model->send_otp_patient($this->Patient_model->uniqueId);

			if (!$result) {

				$result = array();

				if ($this->Patient_model->errorMessage <> '') {

					$errorMessage	=	HTTP_STATUS_CODES[$this->Patient_model->errorMessage];

				} else {

					$errorMessage	= HTTP_STATUS_CODES[470];

				}

				$uniqueId = 0;

				if ($this->Patient_model->uniqueId <> '')

					$uniqueId = $this->Patient_model->uniqueId;

				$response = ['status' => 201,  'result' => $result, 'uniqueId' => $uniqueId, 'message' => $errorMessage];

				$this->response($response, 200);

			} else {

				$result = array();

				if ($this->Patient_model->errorMessage <> '') {

					$errorMessage	=	HTTP_STATUS_CODES[$this->Patient_model->errorMessage];

				} else {

					$errorMessage	= HTTP_STATUS_CODES[470];

				}

				$uniqueId = 0;

				if ($this->Patient_model->uniqueId <> '')

					$uniqueId = $this->Patient_model->uniqueId;

				$response = ['status' => 200,  'result' => $result, 'uniqueId' => $uniqueId, 'message' => $errorMessage];

				$this->response($response, 200);

			}

		} else {
			

			$result = $this->Patient_model->signup_step1_patient();

			if (!$result) {

				$result = array();

				if ($this->Patient_model->errorMessage <> '') {

					$errorMessage	=	HTTP_STATUS_CODES[$this->Patient_model->errorMessage];

				} else {

					$errorMessage	= 'Good to go!';

				}

				$uniqueId = 0;

				if ($this->Patient_model->uniqueId <> '')

					$uniqueId = $this->Patient_model->uniqueId;

				$response = ['status' => 201,  'result' => $result, 'uniqueId' => $uniqueId, 'message' => $errorMessage];

				$this->response($response, 200);

			} else {

				$result = array();

				$uniqueId = $this->Patient_model->uniqueId;

				$response = ['status' => 200,  'result' => $result, 'uniqueId' => $uniqueId, 'message' => HTTP_STATUS_CODES[470]];

				$this->response($response, 200);

			}

		}

	}

	// Functionality: To verify the OTP

	// Arguments 	: member id , otp

	// Response		: if member id or otp is empty return status = 460 (INCOMPLETE INFORMATION), other wise check the otp is valid , if it is valid return  encrypted Member id and basic details , otherwise return status = 471

	function verify_otp_post()

	{

		$this->Patient_model->setPostGetVars();

		if ($this->Patient_model->uniqueId <> '' && $this->Patient_model->otp <> '' && $this->input->post_get('deviceRegistrationId') <> '') {

			$result = $this->Patient_model->verify_otp_patient($this->Patient_model->uniqueId, $this->Patient_model->otp);

			if (!$result) {

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				$status = 471;

				$result = array();

				$response = ['status' => 201, 'token' => $token, 'result' => $result, 'uniqueId' => $this->input->post_get('uniqueId'), 'message' => HTTP_STATUS_CODES[471]];

				$this->response($response, 200);

			} else {

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				$status = 200;

				$patent_item = $this->Patient_model->get_patient_by_uniqueId($this->input->post_get('uniqueId'));

				$country_array = array();

				$country_array = $this->Country_model->get_country_dropdown();

				$response = ['status' => $status, 'token' => $token, 'result' => $result, 'uniqueId' => $this->input->post_get('uniqueId'), 'countryId'  => $patent_item['countryId'], 'country_array'  => $country_array, 'message' => 'OTP Verification Successful!'];

				$this->response($response, 200);

			}

		} else {

			$tokenData = time() . $this->input->post_get('uniqueId');

			$token = AUTHORIZATION::generateToken($tokenData);

			$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

			$result = array();

			$response = ['status' => 201, 'token' => $token, 'result' => $result, 'message' => HTTP_STATUS_CODES[460]];

			$this->response($response, 200);

		}

	}

	// NOT USING

	// Functionality: To resend the OTP

	// Arguments 	: member id

	// Response		: if member id is empty return status = 460 (INCOMPLETE INFORMATION), other wise resend the otp to member email and return status = 200(SUCCESS)

	function resend_otp_post()

	{

		$this->Patient_model->setPostGetVars();

		//$this->verify_request();

		if ($this->Patient_model->uniqueId <> '') {

			$result = $this->Patient_model->send_otp_patient($this->Patient_model->uniqueId);

			if (!$result) {

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				$status = 463;

				$result = array();

				$response = ['status' => 201, 'token' => $token,  'result' => $result, 'message' => HTTP_STATUS_CODES[463]];

				$this->response($response, 200);

			} else {

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				$status = 200;

				$result = array();

				$response = ['status' => $status, 'token' => $token, 'result' => $result, 'message' => HTTP_STATUS_CODES[470]];

				$this->response($response, 200);

			}

		} else {

			$tokenData = time() . $this->input->post_get('uniqueId');

			$token = AUTHORIZATION::generateToken($tokenData);

			$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

			$result = array();

			$response = ['status' => 201, 'token' => $token, 'result' => $result, 'message' => HTTP_STATUS_CODES[460]];

			$this->response($response, 200);

		}

	}

	// Sigup Step 2 

	// Arguments  : isAcceptedTerms,isAcceptedPrivacy,uniqueId,isRecieveEmail,isEssentialEmail	

	// Response : if the mandatory values is not filled then status = 460, otherwise return success,update details and a notification email sent to provided email withpassword reset link

	function signup_step2_post()

	{

		$this->Patient_model->setPostGetVars();

		if ($this->Patient_model->uniqueId == '' || $this->Patient_model->patientEmail == '' || $this->Patient_model->patientPassword == '') {

			$result = array();

			$errorMessage	= HTTP_STATUS_CODES[460];

			if ($this->Patient_model->uniqueId == '')

				$errorMessage	= $errorMessage . ' ' . 'Unique Id,';

			if ($this->Patient_model->patientEmail == '')

				$errorMessage	= $errorMessage . ' ' . ' Email,';

			if ($this->Patient_model->patientPassword == '')

				$errorMessage	= $errorMessage . ' ' . 'Password';

			$response = ['status' => 201, 'result' => $result, 'message' => $errorMessage];

			$this->response($response, 200);

		} else {

			$result = $this->Patient_model->signup_step2_patient($this->Patient_model->uniqueId);

			if (!$result) {

				$result = array();

				if ($this->Patient_model->errorMessage <> '') {

					$errorMessage	=	HTTP_STATUS_CODES[$this->Patient_model->errorMessage];

				} else {

					$errorMessage	= 'Invalid Unique Id !';

				}

				$response = ['status' => 201, 'result' => $result, 'message' => $errorMessage];

				$this->response($response, 200);

			} else {

				$tokenData = time() .$this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				$result = $this->Signup_model->get_patient($this->input->post_get('uniqueId'));

				if ($result['profileImgUrl'] <> '' && file_exists(AXUPLOADPATIENTIMAGEPATH. $result['profileImgUrl'])!== null )
				// if ($result['profileImgUrl'] <> '' && file_exists('../uploads/patients/' . $result['profileImgUrl']))

					$result['imageUrl'] =  AXUPLOADPATIENTIMAGEPATH . $result['profileImgUrl'];

				else

					$result['imageUrl'] = AXUPLOADPATH . 'no_image.png';

				$uniqueId 			=  $result["uniqueId"];

				$clientName 		=  $result["patientName"];

				$clientEmail 		=  $result["patientEmail"];

				$clientMobile 		=  $result["patientMobile"];

				$clientAddress 		=  $result["patientAddress"];

				$youtubeLink 		= '';

				$loginType			=  2;

				$imageUrl 			=  $result["imageUrl"];

				$fcmToken			=  $result["fcmToken"];

				$status = 200;

				$response = ['status' => $status, 'token' => $token, 'uniqueId' => $uniqueId, 'clientName' => $clientName, 'clientEmail' => $clientEmail, 'clientMobile' => $clientMobile, 'clientAddress' => $clientAddress, 'loginType' => $loginType, 'imageUrl' => $imageUrl, 'youtubeLink' => $youtubeLink, 'fcmToken' => $fcmToken, 'razorPayApiKey' => $this->Patient_model->razorPayApiKey, 'razorPaySecretKey' => $this->Patient_model->razorPaySecretKey, 'razorPayCurrency' => $this->Patient_model->razorPayCurrency, 'calendarLimit' => $this->Patient_model->calendarLimit, 'message' => 'You are in! '];

				$this->response($response, 200);

			}

		}

	}

	// Functionality: For login to member account

	// Arguments 	: userName , password (Member created password)

	// Response 	: if the username or password is incorrect return status = 463 , or if the account is deleted  return status = 480 ,  or if the account is activated  return status = 464 , otherwise return encrypted Member id and basic details 

	function login_post()

	{

		if ($this->input->post_get('userName') <> '' && $this->input->post_get('password') <> '') {

			$result	=	$this->Login_model->validate_login($this->input->post_get('userName'), $this->input->post_get('password'));

			if (!$result) {

				$result = array();

				$response = ['status' => 201,  'result' => $result, 'message' => HTTP_STATUS_CODES[463]];

				$this->response($response, 200);

			} else if ($result == 100) {

				$result = array();

				$errorMessage	= 464;

				$response = ['status' => 201,  'result' => $result, 'message' => HTTP_STATUS_CODES[$errorMessage]];

				$this->response($response, 200);

			} else {

				$tokenData = time() . $result["uniqueId"];

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($result["uniqueId"], $token);

				$doctorSessionDuration			=  '';

				if ($this->Login_model->loginType == 1) {

					if ($result['doctorImageUrl'] <> '' && file_exists(AXUPLOADDOCTORIMAGEPATH . $result['doctorImageUrl'])!== null )
						// if ($result['doctorImageUrl'] <> '' && file_exists('../uploads/doctors/' . $result['doctorImageUrl']))

						$result['imageUrl'] =  AXUPLOADDOCTORIMAGEPATH . $result['doctorImageUrl'];

					else

						$result['imageUrl'] = AXUPLOADPATH . 'no_image.png';

					$user_id  			=  $result["doctorId"];
					$uniqueId 			=  $result["uniqueId"];

					$clientName 		=  $result["doctorName"];

					$clientEmail 		=  $result["doctorEmail"];

					$clientMobile 		=  $result["doctorMobile"];

					$youtubeLink		=  $result["youtubeLink"];

					$clientAddress		=  $result["doctorAddress"];

					$loginType			=  $this->Login_model->loginType;

					$imageUrl 			=  $result["imageUrl"];

					$fcmToken			=  $result["fcmToken"];

					

					$doctorSessionDuration	=  $result["doctorSessionDuration"];

				} else if ($this->Login_model->loginType == 2) {

					// if ($result['profileImgUrl'] <> '' && file_exists('../uploads/patients/' . $result['profileImgUrl']))
					if ($result['profileImgUrl'] <> '' && file_exists(AXUPLOADPATIENTIMAGEPATH . $result['profileImgUrl'])!== null )

						$result['imageUrl'] =  AXUPLOADPATIENTIMAGEPATH . $result['profileImgUrl'];

					else

						$result['imageUrl'] = AXUPLOADPATH . 'no_image.png';
					$user_id  			=  $result["patientId"];

					$uniqueId 			=  $result["uniqueId"];

					$clientName 		=  $result["patientName"];

					$clientEmail 		=  $result["patientEmail"];

					$clientMobile 		=  $result["patientMobile"];

					$clientAddress		=  $result["patientAddress"];

					$loginType			=  $this->Login_model->loginType;

					$imageUrl 			=  $result["imageUrl"];

					$youtubeLink 		= '';

					$fcmToken			=  $result["fcmToken"];

					$notificationCount			=  $result["notificationCount"];

				}

				$status = 200;

				$response = ['status' => $status, 'token' => $token,'userid'=>$user_id, 'uniqueId' => $uniqueId, 'clientName' => $clientName, 'clientEmail' => $clientEmail, 'clientMobile' => $clientMobile, 'clientAddress' => $clientAddress, 'loginType' => $loginType, 'imageUrl' => $imageUrl,'notificationCount'=>$notificationCount, 'youtubeLink' => $youtubeLink, 'fcmToken' => $fcmToken, 'doctorSessionDuration' => $doctorSessionDuration, 'razorPayApiKey' => $this->Patient_model->razorPayApiKey, 'razorPaySecretKey' => $this->Patient_model->razorPaySecretKey, 'razorPayCurrency' => $this->Patient_model->razorPayCurrency, 'calendarLimit' => $this->Patient_model->calendarLimit, 'message' => 'You are in! '];

				$this->response($response, 200);

			}

		} else {

			$result = array();

			$response = ['status' => 201, 'result' => $result, 'message' => 'Uh-oh! Try again with valid credentials '];

			$this->response($response, 200);

		}

	}

	function forgot_password_post()

	{

		if ($this->input->post_get('emailId') <> '') {

			$result	=	$this->Login_model->forgot_password($this->input->post_get('emailId'));

			if (!$result) {

				$result = array();

				$response = ['status' => 201,  'result' => $result, 'message' => HTTP_STATUS_CODES[465]];

				$this->response($response, 200);

			} else {

				$status = 200;

				$response = ['status' => $status, 'result' => $result, 'message' => 'Login details sent to the email provided ! '];

				$this->response($response, 200);

			}

		} else {

			$result = array();

			$response = ['status' => 201, 'result' => $result, 'message' => 'Uh-oh! Try again with valid credentials '];

			$this->response($response, 200);

		}

	}

	// Functionality: To update the password of members

	// Arguments 	: member id, current  password and new password

	// Response		: if member id or current password or new password is empty return status = 460 (INCOMPLETE INFORMATION), other wise update the member password provided and  return status = 200(SUCCESS)

	function change_password_post()

	{

		$this->verify_request();

		if ($this->input->post_get('uniqueId') <> '' && $this->input->post_get('currentPassword') <> '' && $this->input->post_get('newPassword') <> '' && $this->input->post_get('confirmPassword') <> '') {

			if ($this->input->post_get('newPassword') <> $this->input->post_get('confirmPassword')) {

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				$result = array();

				$response = ['status' => 201, 'token' => $token, 'result' => $result, 'message' => HTTP_STATUS_CODES[479]];

				$this->response($response, 200);

			} else {

				if ($this->input->post_get('loginType') == 2) {

					$result 	= $this->Patient_model->change_password_patient($this->input->post_get('uniqueId'), $this->input->post_get('confirmPassword'));

				} else if ($this->input->post_get('loginType') == 1) {

					$result 	= $this->Doctor_model->change_password_doctor($this->input->post_get('uniqueId'), $this->input->post_get('confirmPassword'));

				}

				if (!$result) {

					$tokenData = time() . $this->input->post_get('uniqueId');

					$token = AUTHORIZATION::generateToken($tokenData);

					$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

					$result = array();

					$response = ['status' => 201, 'token' => $token, 'result' => $result, 'message' => HTTP_STATUS_CODES[473]];

					$this->response($response, 200);

				} else {

					$tokenData = time() . $this->input->post_get('uniqueId');

					$token = AUTHORIZATION::generateToken($tokenData);

					$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

					$status = 200;

					$response = ['status' => $status, 'token' => $token, 'result' => $result, 'message' => HTTP_STATUS_CODES[472]];

					$this->response($response, 200);

				}

			}

		} else {

			$result = array();

			$response = ['status' => 201,  'result' => $result, 'message' => HTTP_STATUS_CODES[460]];

			$this->response($response, 200);

		}

	}

	function retrieve_doctor_profile_get()

	{

		$this->Doctor_model->setPostGetVars();

		$this->verify_request();

		if ($this->Doctor_model->doctorId <> '') {

			$result = $this->Doctor_model->get_doctor_id($this->Doctor_model->doctorId);

			if (!$result) {

				$result = array();

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				$response = ['status' => 201, 'token' => $token,  'result' => $result, 'message' => HTTP_STATUS_CODES[204]];

				$this->response($response, 200);

			} else {

				$status = 200;

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				if ($result['doctorImageUrl'] <> '' && file_exists(AXUPLOADDOCTORIMAGEPATH . $result['doctorImageUrl'])!== null ) {
				// if ($result['doctorImageUrl'] <> '' && file_exists('../uploads/doctors/' . $result['doctorImageUrl'])) {

					$result['doctorImageUrl'] =  AXUPLOADDOCTORIMAGEPATH . $result['doctorImageUrl'];

				} else {

					$result['doctorImageUrl'] = AXUPLOADPATH . 'no_image.png';

				}

				$speciality_array = array();

				$this->Speciality_model->status = 1;

				$speciality_array = $this->Speciality_model->get_speciality_dropdown();

				$response = ['status' => $status, 'token' => $token, 'result' => array(), 'doctorId' => $result['doctorId'], 'doctorUniqueId'  => $result['doctorUniqueId'], 'doctorName'  => $result['doctorName'], 'doctorEmail'  => $result['doctorEmail'], 'doctorMobile'  => $result['doctorMobile'], 'qualification'  => $result['qualification'], 'qualification1'  => $result['qualification1'], 'doctorImageUrl'  => $result['doctorImageUrl'], 'experience'  => $result['experience'], 'knownLanguages'  => $result['knownLanguages'], 'specialization'  => $result['specialization'], 'youtubeLink'  => $result['youtubeLink'], 'doctorAddress'  => $result['doctorAddress'], 'doctorFee'  => $result['doctorFee'], 'doctorSessionDuration'  => $result['doctorSessionDuration'], 'communicationMode'  => $result['communicationMode'], 'specialityId'  => $result['specialityId'], 'specialityName'  => $result['specialityName'], 'fcmToken'  => $result['fcmToken'], 'chatRoomNumber'  => $result['chatRoomNumber'], 'medicalRegistrationNumber'  => $result['medicalRegistrationNumber'], 'speciality_array' => $speciality_array, 'message' => HTTP_STATUS_CODES[200]];

				$this->response($response, 200);

			}

		} else {

			$tokenData = time() . $this->input->post_get('uniqueId');

			$token = AUTHORIZATION::generateToken($tokenData);

			$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

			$result = array();

			$response = ['status' => 201, 'token' => $token, 'result' => $result, 'message' => HTTP_STATUS_CODES[460]];

			$this->response($response, 200);

		}

	}

	function retrieve_patient_profile_get()

	{

		$this->Patient_model->setPostGetVars();

		$this->verify_request();

		if ($this->Patient_model->uniqueId <> '') {

			$result = $this->Patient_model->get_patient_by_uniqueId($this->Patient_model->uniqueId);

			if (!$result) {

				$result = array();

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				$response = ['status' => 201, 'token' => $token,  'result' => $result, 'message' => HTTP_STATUS_CODES[204]];

				$this->response($response, 200);

			} else {

				$status = 200;

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				if ($result['profileImgUrl'] <> '' && file_exists(AXUPLOADPATIENTIMAGEPATH . $result['profileImgUrl'])!== null )
					// if ($result['profileImgUrl'] <> '' && file_exists('../uploads/patients/' . $result['profileImgUrl']))

					$result['profileImgUrl'] =  AXUPLOADPATIENTIMAGEPATH . $result['profileImgUrl'];

				else

					$result['profileImgUrl'] = AXUPLOADPATH . 'no_image.png';

				$country_array = array();

				$country_array = $this->Country_model->get_country_dropdown();

				$response = ['status' => $status, 'token' => $token, 'result' => array(), 'patientId' => $result['patientId'], 'patientUniqueId'  => $result['patientUniqueId'], 'firstName'  => $result['firstName'], 'lastName'  => $result['lastName'], 'patientEmail'  => $result['patientEmail'], 'patientMobile'  => $result['patientMobile'], 'profileImgUrl'  => $result['profileImgUrl'], 'countryId'  => $result['countryId'], 'birthDate'  => $result['birthDate'], 'gender'  => $result['gender'], 'customGender'  => $result['customGender'], 'patientAddress'  => $result['patientAddress'], 'country'  => $result['country'], 'country_array'  => $country_array, 'message' => HTTP_STATUS_CODES[200]];

				$this->response($response, 200);

			}

		} else {

			$tokenData = time() . $this->input->post_get('uniqueId');

			$token = AUTHORIZATION::generateToken($tokenData);

			$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

			$result = array();

			$response = ['status' => 201, 'token' => $token, 'result' => $result, 'message' => HTTP_STATUS_CODES[460]];

			$this->response($response, 200);

		}

	}

	// Functionality: To update the doctor basic deatils

	// Arguments 	: doctor unique id

	// Response		: if doctor unique id is empty return status = 460 (INCOMPLETE INFORMATION), other wise update the doctor basic details provided and  return status = 200(SUCCESS)

	function update_doctor_profile_post()

	{

		$this->Doctor_model->setPostGetVars();

		$this->verify_request();

		if ($this->Doctor_model->uniqueId <> '') {

			$result = $this->Doctor_model->update_doctor($this->Doctor_model->uniqueId);

			if (!$result) {

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				$result = array();

				$errorMessage	= HTTP_STATUS_CODES[460];

				if ($this->Doctor_model->errorMessage <> '')

					$errorMessage	= HTTP_STATUS_CODES[$this->Doctor_model->errorMessage];

				$response = ['status' => 201, 'token' => $token, 'result' => $result, 'message' => $errorMessage];

				$this->response($response, 200);

			} else {

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				$status = 200;

				$response = ['status' => $status, 'token' => $token, 'result' => $this->input->post_get('uniqueId'), 'message' => 'Almost there! '];

				$this->response($response, 200);

			}

		} else {

			$result = array();

			$response = ['status' => 201,  'result' => $result, 'message' => HTTP_STATUS_CODES[460]];

			$this->response($response, 200);

		}

	}

	function update_doctor_mobile_post()

	{

		$this->Doctor_model->setPostGetVars();

		$this->verify_request();

		if ($this->Doctor_model->uniqueId <> '' && $this->Doctor_model->doctorMobile <> '' && $this->Doctor_model->doctorEmail <> '') {

			$result = $this->Doctor_model->update_mobile_doctor($this->Doctor_model->uniqueId);

			if (!$result) {

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				$result = array();

				$errorMessage	= HTTP_STATUS_CODES[460];

				if ($this->Doctor_model->errorMessage <> '')

					$errorMessage	= HTTP_STATUS_CODES[$this->Doctor_model->errorMessage];

				$response = ['status' => 201, 'token' => $token, 'result' => $result, 'message' => $errorMessage];

				$this->response($response, 200);

			} else {

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				$status = 200;

				$response = ['status' => $status, 'token' => $token, 'result' => $this->input->post_get('uniqueId'), 'message' => HTTP_STATUS_CODES[470]];

				$this->response($response, 200);

			}

		} else {

			$result = array();

			$response = ['status' => 201,  'result' => $result, 'message' => HTTP_STATUS_CODES[460]];

			$this->response($response, 200);

		}

	}

	function verify_doctor_otp_post()

	{

		$this->Doctor_model->setPostGetVars();

		$this->verify_request();

		if ($this->Doctor_model->uniqueId <> '' && $this->Doctor_model->otp <> '') {

			$result = $this->Doctor_model->verify_otp_doctor($this->Doctor_model->uniqueId, $this->Doctor_model->otp);

			if (!$result) {

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				$status = 471;

				$result = array();

				$response = ['status' => 201, 'token' => $token, 'result' => $result, 'uniqueId' => $this->input->post_get('uniqueId'), 'message' => HTTP_STATUS_CODES[471]];

				$this->response($response, 200);

			} else {

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				$status = 200;

				$response = ['status' => $status, 'token' => $token, 'result' => $result, 'uniqueId' => $this->input->post_get('uniqueId'), 'message' => 'OTP Verification Successful!'];

				$this->response($response, 200);

			}

		} else {

			$tokenData = time() . $this->input->post_get('uniqueId');

			$token = AUTHORIZATION::generateToken($tokenData);

			$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

			$result = array();

			$response = ['status' => 201, 'token' => $token, 'result' => $result, 'message' => HTTP_STATUS_CODES[460]];

			$this->response($response, 200);

		}

	}

	// Functionality: To update the doctor profile image 

	// Arguments 	: unique id,, doctorImageUrl

	// Response		: if unique id is empty return status = 460 (INCOMPLETE INFORMATION), if the given image is not in a valid format return  status = 476 or 476, other wise update the member profile image provided and  return status = 200(SUCCESS)			

	function update_doctor_profile_image_post()

	{

		$this->Doctor_model->setPostGetVars();

		$isValidToken = $this->verify_request();

		if ($this->Doctor_model->uniqueId <> '' && isset($_FILES["doctorImageUrl"])) {

			$result = $this->Doctor_model->upload_image($this->Doctor_model->uniqueId);

			if (!$result) {

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				$result = array();

				$errorMessage = 460;

				if ($this->Patient_model->errorMessage <> '')

					$errorMessage = $this->Patient_model->errorMessage;

				$response = ['status' => 201, 'token' => $token, 'result' => $result, 'message' => HTTP_STATUS_CODES[$errorMessage]];

				$this->response($response, 200);

			} else {

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				$status = 200;

				if ($this->Doctor_model->doctorImageUrl <> '' && file_exists(AXUPLOADDOCTORIMAGEPATH .$this->Doctor_model->doctorImageUrl)!== null )
				// if ($this->Doctor_model->doctorImageUrl <> '' && file_exists('../uploads/doctors/' .$this->Doctor_model->doctorImageUrl))

					$this->Doctor_model->doctorImageUrl=  AXUPLOADDOCTORIMAGEPATH .$this->Doctor_model->doctorImageUrl;

				else

					$this->Doctor_model->doctorImageUrl = AXUPLOADPATH . 'no_image.png';

				$response = ['status' => $status, 'token' => $token, 'result' => $result, 'doctorImageUrl' => $this->Doctor_model->doctorImageUrl, 'message' => 'Looks great!'];

				$this->response($response, 200);

			}

		} else {

			$tokenData = time() . $this->input->post_get('uniqueId');

			$token = AUTHORIZATION::generateToken($tokenData);

			$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

			$result = array();

			$response = ['status' => 201, 'token' => $token, 'result' => $result,  'message' => HTTP_STATUS_CODES[460]];

			$this->response($response, 200);

		}

	}

	// Functionality: To update the patient basic deatils

	// Arguments 	: patient unique id

	// Response		: if patient unique id is empty return status = 460 (INCOMPLETE INFORMATION), other wise update the patient basic details provided and  return status = 200(SUCCESS)

	function update_patient_profile_post()

	{

		$this->Patient_model->setPostGetVars();

		$this->verify_request();

		if ($this->Patient_model->uniqueId <> '') {

			$result = $this->Patient_model->update_patient($this->Patient_model->uniqueId);

			if (!$result) {

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				$result = array();

				$errorMessage	= HTTP_STATUS_CODES[460];

				if ($this->Patient_model->errorMessage <> '')

					$errorMessage	= HTTP_STATUS_CODES[$this->Patient_model->errorMessage];

				$response = ['status' => 201, 'token' => $token, 'result' => $result, 'message' => $errorMessage];

				$this->response($response, 200);

			} else {

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				$status = 200;

				$response = ['status' => $status, 'token' => $token, 'result' => $this->input->post_get('uniqueId'), 'message' => 'Almost there! '];

				$this->response($response, 200);

			}

		} else {

			$result = array();

			$response = ['status' => 201,  'result' => $result, 'message' => HTTP_STATUS_CODES[460]];

			$this->response($response, 200);

		}

	}

	function update_patient_mobile_post()

	{

		$this->Patient_model->setPostGetVars();

		$this->verify_request();

		if ($this->Patient_model->uniqueId <> '' && $this->Patient_model->patientMobile <> '' && $this->Patient_model->countryId <> '') {

			$result = $this->Patient_model->update_mobile_patient($this->Patient_model->uniqueId);

			if (!$result) {

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				$result = array();

				$errorMessage	= HTTP_STATUS_CODES[460];

				if ($this->Patient_model->errorMessage <> '')

					$errorMessage	= HTTP_STATUS_CODES[$this->Patient_model->errorMessage];

				$response = ['status' => 201, 'token' => $token, 'result' => $result, 'message' => $errorMessage];

				$this->response($response, 200);

			} else {

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				$status = 200;

				$response = ['status' => 470, 'token' => $token, 'result' => $this->input->post_get('uniqueId'), 'message' => HTTP_STATUS_CODES[470]];

				$this->response($response, 200);

			}

		} else {

			$result = array();

			$response = ['status' => 201,  'result' => $result, 'message' => HTTP_STATUS_CODES[460]];

			$this->response($response, 200);

		}

	}

	// Functionality: To update the patient profile image 

	// Arguments 	: unique id,, profileImgUrl

	// Response		: if unique id is empty return status = 460 (INCOMPLETE INFORMATION), if the given image is not in a valid format return  status = 476 or 476, other wise update the member profile image provided and  return status = 200(SUCCESS)			

	function update_patient_profile_image_post()

	{

		$this->Patient_model->setPostGetVars();

		$this->verify_request();

		if ($this->Patient_model->uniqueId <> '' && isset($_FILES["profileImgUrl"])) {

			$result = $this->Patient_model->upload_image($this->Patient_model->uniqueId);



			if (!$result) {

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				$result = array();

				$errorMessage = 460;

				if ($this->Patient_model->errorMessage <> '')

					$errorMessage = $this->Patient_model->errorMessage;

				$response = ['status' => 201, 'token' => $token, 'result' => $result, 'message' => $errorMessage];
				 // $response = ['status' => 201, 'token' => $token, 'result' => $result, 'message' => HTTP_STATUS_CODES[$errorMessage]];

				$this->response($response, 200);

			} else {

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				$status = 200;

				// if ($this->Patient_model->profileImgUrl <> '' && file_exists('../uploads/patients/' .$this->Patient_model->profileImgUrl))
				if ($this->Patient_model->profileImgUrl <> '' && file_exists(AXUPLOADPATIENTIMAGEPATH .$this->Patient_model->profileImgUrl)!== null)



					$this->Patient_model->profileImgUrl=  AXUPLOADPATIENTIMAGEPATH .$this->Patient_model->profileImgUrl;

				else

					$this->Patient_model->profileImgUrl = AXUPLOADPATH . 'no_image.png';

				$response = ['status' => $status, 'token' => $token, 'result' => $result, 'profileImgUrl' => $this->Patient_model->profileImgUrl, 'message' => 'Looks great!'];

				$this->response($response, 200);

			}

		} else {

			$tokenData = time() . $this->input->post_get('uniqueId');

			$token = AUTHORIZATION::generateToken($tokenData);

			$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

			$result = array();

			// $response = ['status' => 201, 'token' => $token, 'result' => $result,  'message' => 'its here'];
			$response = ['status' => 201, 'token' => $token, 'result' => $result,  'message' => HTTP_STATUS_CODES[460]];


			$this->response($response, 200);

		}

	}

	// For getting the Specilaitys stored in the echo system .

	function specilaity_list_get()

	{

		$this->Patient_model->setPostGetVars();

		$this->verify_request();

		$this->Speciality_model->setPostGetVars();

		$this->Speciality_model->status = 1;

		$result = $this->Speciality_model->get_speciality();

		if (!$result) {

			$result = array();

			$tokenData = time() . $this->input->post_get('uniqueId');

			$token = AUTHORIZATION::generateToken($tokenData);

			$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

			$response = ['status' => 201, 'token' => $token,  'result' => $result, 'message' => HTTP_STATUS_CODES[204]];

			$this->response($response, 200);

		} else {

			$status = 200;

			if (is_array($result) && count($result) > 0) {

				$i	= 0;

				foreach ($result as $row) {

					//file_exists('../uploads/speciality/' . $result[$i]['specialityImageUrl'])

					if ($result[$i]['specialityImageUrl'] <> '' &&  file_exists(AXUPLOADSPECIALITYIMAGEPATH . $result[$i]['specialityImageUrl'])!== null  ) {

						$result[$i]['specialityImageUrl'] =  AXUPLOADSPECIALITYIMAGEPATH . $result[$i]['specialityImageUrl'];

					} else {

						//$result[$i]['specialityImageUrl'] = AXUPLOADPATH . 'no_image.png';

						$result[$i]['specialityImageUrl'] = "";

					}

					$i++;

				}

			}

			$tokenData = time() . $this->input->post_get('uniqueId');

			$token = AUTHORIZATION::generateToken($tokenData);

			$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

			$response = ['status' => $status, 'token' => $token,  'result' => $result, 'message' => ''];

			$this->response($response, 200);

		}

	}

	// For getting the Symptoms stored in the echo system .

	function symptoms_list_get()

	{

		$this->Patient_model->setPostGetVars();

		$this->verify_request();

		$this->Symptom_model->setPostGetVars();

		$this->Symptom_model->status = 1;

		$result = $this->Symptom_model->get_symptom();

		if (!$result) {

			$result = array();

			$tokenData = time() . $this->input->post_get('uniqueId');

			$token = AUTHORIZATION::generateToken($tokenData);

			$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

			$response = ['status' => 201, 'token' => $token,  'result' => $result, 'message' => HTTP_STATUS_CODES[204]];

			$this->response($response, 200);

		} else {

			$status = 200;

			if (is_array($result) && count($result) > 0) {

				$i	= 0;

				foreach ($result as $row) {

					if ($result[$i]['symptomImage'] <> '' && file_exists(AXUPLOADSYMPTOMSIMAGEPATH . $result[$i]['symptomImage'])!== null ) {
					// if ($result[$i]['symptomImage'] <> '' && file_exists('../uploads/symptoms/' . $result[$i]['symptomImage'])) {

						$result[$i]['symptomImage'] =  AXUPLOADSYMPTOMSIMAGEPATH . $result[$i]['symptomImage'];

					} else {

						$result[$i]['symptomImage'] = AXUPLOADPATH . 'no_image.png';

					}

					$i++;

				}

			}

			$tokenData = time() . $this->input->post_get('uniqueId');

			$token = AUTHORIZATION::generateToken($tokenData);

			$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

			$response = ['status' => $status, 'token' => $token,  'result' => $result, 'message' => ''];

			$this->response($response, 200);

		}

	}

	// For getting the doctors stored in the echo system .
// =============================================================
		function doctors_list_by_speciality_get()

	{

		$this->Patient_model->setPostGetVars();

		$this->verify_request();

		$this->Doctor_model->setPostGetVars();

		$this->Doctor_model->status = 1;
		if ($this->Doctor_model->specialityId <> '') {


		$result = $this->Doctor_model->get_doctor_list_by_specialization($this->Doctor_model->specialityId);

		if (!$result) {

			$result = array();

			$tokenData = time() . $this->input->post_get('uniqueId');

			$token = AUTHORIZATION::generateToken($tokenData);

			$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

			$response = ['status' => 201, 'token' => $token,  'result' => $result, 'message' => HTTP_STATUS_CODES[204]];

			$this->response($response, 200);

		} else {

			$patientDeviceOS  = $this->Patient_model->get_patient_device_os($this->input->post_get('uniqueId'));

			$status = 200;

			if (is_array($result) && count($result) > 0) {

				$i	= 0;

				foreach ($result as $row) {

					if ($result[$i]['doctorImageUrl'] <> '' && file_exists(AXUPLOADDOCTORIMAGEPATH . $result[$i]['doctorImageUrl'])!== null) {

						$result[$i]['doctorImageUrl'] =  AXUPLOADDOCTORIMAGEPATH . $result[$i]['doctorImageUrl'];

					} else {

						$result[$i]['doctorImageUrl'] = AXUPLOADPATH . 'no_image.png';

					}
					$result[$i]['today_available_sessions']   	= $this->Doctor_model->get_today_doctor_sessions($result[$i]['doctorId']);

					$this->Patient_model->doctorId 	= $result[$i]['doctorId'];

					$result[$i]['isTrialCompleted']   	= 0;

					$result[$i]['hasValidCredits']  	= 0;

					$result[$i]['patientCreditId']  	= 0;

					$result[$i]['hasValidPackage']  	= 0;

					$result[$i]['subscriptionId']  	= 0;

					$result[$i]['noOfSession']  		= 0;

					$result[$i]['sessionDuration']  	= 0;

					$patient_records 					= array();

					$patient_records  					= $this->Patient_model->get_patient_records($this->Patient_model->patientId);

					if (count($patient_records) >= 0) {

						$result[$i]['isTrialCompleted'] = 1;

						$patient_subscriptions 			= array();

						$this->Patient_model->status 	= 1;

						$patient_credits 			= array();

						$patient_credits  			= $this->Patient_model->get_patient_credites($this->Patient_model->patientId, $result[$i]['doctorId']);

						if (count($patient_credits) > 0) {

							$result[$i]['hasValidCredits']   	= 1;

							if (count($patient_credits) > 0) {

								$k	= 0;

								foreach ($patient_credits as $row1) {

									$result[$i]['patientCreditId'] 	= $row1['patientCreditId'];

									$result[$i]['sessionDuration'] 	= $row1['sessionDuration'];

									$result[$i]['noOfSession'] 		= $row1['noOfSession'];

								}

							}

						} else {

							$patient_subscriptions  			= $this->Patient_model->get_patient_subscriptions($this->Patient_model->patientId);

							if (count($patient_subscriptions) > 0) {

								$result[$i]['hasValidPackage']   	= 1;

								if (count($patient_subscriptions) > 0) {

									$k	= 0;

									foreach ($patient_subscriptions as $row1) {

										$result[$i]['subscriptionId'] 	= $row1['subscriptionId'];

										$result[$i]['noOfSession'] 	= $row1['noOfSession'];

										$result[$i]['sessionDuration'] = $this->Package_model->get_default_session_duration();

									}

								}

							}

						}

					}

					$num_of_rating = 0;

					$overall_rating = 0;

					if ($result[$i]['doctorId'] <> '') {

						$num_of_rating = $this->Rating_model->get_rating_count($result[$i]['doctorId']);

						if ($num_of_rating <> 0) {

							$total_rating = $this->Rating_model->get_total_rating($result[$i]['doctorId']);

							$overall_rating =  ($total_rating / $num_of_rating);

						}

					}

					$result[$i]['num_of_rating'] 	= $num_of_rating;

					$result[$i]['overall_rating'] 	= number_format((float)$overall_rating, 2);

					//$this->Patient_model->patientId = $this->Patient_model->get_patient_id_by_uniqueId(trim($this->input->post_get('uniqueId')));

					$result[$i]['unReadCount']   = $this->Patient_model->get_unread_count_patient($this->Patient_model->patientId,$result[$i]['doctorId']);

					

					$result[$i]['patientDeviceOS']   = $patientDeviceOS;

					$i++;

				}

			}

			$tokenData = time() . $this->input->post_get('uniqueId');

			$token = AUTHORIZATION::generateToken($tokenData);

			$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

			$response = ['status' => $status, 'token' => $token,  'result' => $result, 'message' => HTTP_STATUS_CODES[200]];

			$this->response($response, 200);

		}
	}

	}

	// =============================================================
	function doctors_list_get()

	{

		$this->Patient_model->setPostGetVars();

		$this->verify_request();

		$this->Doctor_model->setPostGetVars();

		$this->Doctor_model->status = 1;

		$result = $this->Doctor_model->get_doctor_list();

		if (!$result) {

			$result = array();

			$tokenData = time() . $this->input->post_get('uniqueId');

			$token = AUTHORIZATION::generateToken($tokenData);

			$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

			$response = ['status' => 201, 'token' => $token,  'result' => $result, 'message' => HTTP_STATUS_CODES[204]];

			$this->response($response, 200);

		} else {

			$patientDeviceOS  = $this->Patient_model->get_patient_device_os($this->input->post_get('uniqueId'));

			$status = 200;

			if (is_array($result) && count($result) > 0) {

				$i	= 0;

				foreach ($result as $row) {

					if ($result[$i]['doctorImageUrl'] <> '' && file_exists(AXUPLOADDOCTORIMAGEPATH . $result[$i]['doctorImageUrl'])!== null) {

						$result[$i]['doctorImageUrl'] =  AXUPLOADDOCTORIMAGEPATH . $result[$i]['doctorImageUrl'];

					} else {

						$result[$i]['doctorImageUrl'] = AXUPLOADPATH . 'no_image.png';

					}

					$this->Patient_model->doctorId 	= $result[$i]['doctorId'];

					$result[$i]['isTrialCompleted']   	= 0;

					$result[$i]['hasValidCredits']  	= 0;

					$result[$i]['patientCreditId']  	= 0;

					$result[$i]['hasValidPackage']  	= 0;

					$result[$i]['subscriptionId']  	= 0;

					$result[$i]['noOfSession']  		= 0;

					$result[$i]['sessionDuration']  	= 0;

					$patient_records 					= array();

					$patient_records  					= $this->Patient_model->get_patient_records($this->Patient_model->patientId);

					if (count($patient_records) >= 0) {

						$result[$i]['isTrialCompleted'] = 1;

						$patient_subscriptions 			= array();

						$this->Patient_model->status 	= 1;

						$patient_credits 			= array();

						$patient_credits  			= $this->Patient_model->get_patient_credites($this->Patient_model->patientId, $result[$i]['doctorId']);

						if (count($patient_credits) > 0) {

							$result[$i]['hasValidCredits']   	= 1;

							if (count($patient_credits) > 0) {

								$k	= 0;

								foreach ($patient_credits as $row1) {

									$result[$i]['patientCreditId'] 	= $row1['patientCreditId'];

									$result[$i]['sessionDuration'] 	= $row1['sessionDuration'];

									$result[$i]['noOfSession'] 		= $row1['noOfSession'];

								}

							}

						} else {

							$patient_subscriptions  			= $this->Patient_model->get_patient_subscriptions($this->Patient_model->patientId);

							if (count($patient_subscriptions) > 0) {

								$result[$i]['hasValidPackage']   	= 1;

								if (count($patient_subscriptions) > 0) {

									$k	= 0;

									foreach ($patient_subscriptions as $row1) {

										$result[$i]['subscriptionId'] 	= $row1['subscriptionId'];

										$result[$i]['noOfSession'] 	= $row1['noOfSession'];

										$result[$i]['sessionDuration'] = $this->Package_model->get_default_session_duration();

									}

								}

							}

						}

					}

					$num_of_rating = 0;

					$overall_rating = 0;

					if ($result[$i]['doctorId'] <> '') {

						$num_of_rating = $this->Rating_model->get_rating_count($result[$i]['doctorId']);

						if ($num_of_rating <> 0) {

							$total_rating = $this->Rating_model->get_total_rating($result[$i]['doctorId']);

							$overall_rating =  ($total_rating / $num_of_rating);

						}

					}

					$result[$i]['num_of_rating'] 	= $num_of_rating;

					$result[$i]['overall_rating'] 	= number_format((float)$overall_rating, 2);

					//$this->Patient_model->patientId = $this->Patient_model->get_patient_id_by_uniqueId(trim($this->input->post_get('uniqueId')));

					$result[$i]['unReadCount']   = $this->Patient_model->get_unread_count_patient($this->Patient_model->patientId,$result[$i]['doctorId']);

					

					$result[$i]['patientDeviceOS']   = $patientDeviceOS;

					$i++;

				}

			}

			$tokenData = time() . $this->input->post_get('uniqueId');

			$token = AUTHORIZATION::generateToken($tokenData);

			$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

			$response = ['status' => $status, 'token' => $token,  'result' => $result, 'message' => HTTP_STATUS_CODES[200]];

			$this->response($response, 200);

		}

	}

	// For getting the doctor details stored in the echo system .

	function doctor_details_get()

	{

		$this->Patient_model->setPostGetVars();

		$this->verify_request();

		$this->Doctor_model->setPostGetVars();

		if ($this->Doctor_model->doctorId <> '') {

			$result = $this->Doctor_model->get_doctor_id($this->Doctor_model->doctorId);

			if (!$result) {

				$result = array();

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				$response = ['status' => 201, 'token' => $token,  'result' => $result, 'message' => HTTP_STATUS_CODES[204]];

				$this->response($response, 200);

			} else {

				$status = 200;

				if ($result['doctorImageUrl'] <> '' && file_exists(AXUPLOADDOCTORIMAGEPATH . $result['doctorImageUrl'])!== null) {

					$result['doctorImageUrl'] =  AXUPLOADDOCTORIMAGEPATH . $result['doctorImageUrl'];

				} else {

					$result['doctorImageUrl'] = AXUPLOADPATH . 'no_image.png';

				}

				if ($result['isVerifiedLicense'] == 0) {

					$result['medicalLicense'] = '';

				}

				if ($result['isVerifiedCertificate'] == 1 && $result['counsellingCertificate'] <> '' && file_exists('../uploads/doctors/' . $result['counsellingCertificate'])) {

					$result['counsellingCertificate'] =  AXUPLOADDOCTORIMAGEPATH . $result['counsellingCertificate'];

				} else {

					$result['counsellingCertificate'] = '';

				}

				$rating =  array();

				$num_of_rating = 0;

				$overall_rating = 0;

				if ($result['doctorId'] <> '') {

					$num_of_rating = $this->Rating_model->get_rating_count($result['doctorId']);

					if ($num_of_rating <> 0) {

						$total_rating = $this->Rating_model->get_total_rating($result['doctorId']);

						$overall_rating =  ($total_rating / $num_of_rating);

					}

				}

				$result['num_of_rating'] 	= $num_of_rating;

				$result['overall_rating'] 	= number_format((float)$overall_rating, 2);

				$this->Rating_model->patientId = '';

				$this->Rating_model->doctorId = $result['doctorId'];

				$rating =  $this->Rating_model->get_rating();

				

				$message = '';

				if (count($rating) > 0) {

					$i	= 0;

					foreach ($rating as $row) {

						if ($rating[$i]['profileImgUrl'] <> '' && file_exists(AXUPLOADPATIENTIMAGEPATH . $rating[$i]['profileImgUrl'])!== null ) {
							// if ($rating[$i]['profileImgUrl'] <> '' && file_exists('../uploads/patients/' . $rating[$i]['profileImgUrl'])) {

							$rating[$i]['profileImgUrl'] =  AXUPLOADPATIENTIMAGEPATH . $rating[$i]['profileImgUrl'];

						} else {

							$rating[$i]['profileImgUrl'] = AXUPLOADPATH . 'no_image.png';

						}

						$i++;

					}

				}else{

					

					$message = '';

					

				}



				$this->Doctor_model->status = 1;

				$available_sessions = array();

				$available_sessions = $this->Doctor_model->get_doctor_sessions($result['doctorId']);

				$this->Doctor_model->availableDay = date('l');

				$today_available_sessions = array();

				$today_available_sessions = $this->Doctor_model->get_today_doctor_sessions($result['doctorId']);
					$i=0;
			foreach ($today_available_sessions as $row) {
				//$result[$i]
				$today_available_sessions[$i]['availabilty']=1;

				$checkavaile=$this->Doctor_model->get_doctor_appointment_by_date($result['doctorId'],date("Y-m-d"),$today_available_sessions[$i]['availableStartTime'],$today_available_sessions[$i]['availableEndTime']);


				//$today_available_sessions[$i]['availabilty']=$checkavaile;
				if($checkavaile!=1)
				{
					$today_available_sessions[$i]['availabilty']=0;
				}

				if(date("H:i:s")>date("H:i:s",strtotime($today_available_sessions[$i]['availableStartTime'])))
				{

					$today_available_sessions[$i]['availabilty']=0;
					//$today_available_sessions[$i]['time']="success";
				}



				$i++;
			}
			$patient_details=$this->Patient_model->get_patient_by_uniqueId($this->Patient_model->uniqueId);



			$session_details_with_client=$this->Doctor_model->get_today_doctor_sessions_with_patient($this->Doctor_model->doctorId,$patient_details['patientId']);

			$is_session_with_client=0;
			$sessions_with_client=array();

			if (!$session_details_with_client) {
				$is_session_with_client=0;
			}
			else{
				$is_session_with_client=1;
				$i=0;
			// foreach ($session_details_with_client as $row){
				// 	$session_details_with_client[$i]['date']=date("Y-m-d");
				// 	$i++;
			// }
			}

			
			
			$sessions_with_client=$session_details_with_client;

			//$upcoming_sessions="hi";

			//$is_session_with_client=$session_details_with_client;
			
			//$sessions_with_client=date('H:i:s'); 
			//get_today_doctor_sessions_with_patient
			







				$isAvailable = 0;

				if (count($today_available_sessions) > 0)

					$isAvailable = 1;

				$packages = array();

				$this->Package_model->status = 1;

				if ($result['doctorId'] <> '') {

					$this->Package_model->doctorId = $result['doctorId'];

					$packages =   $this->Package_model->get_package();

				}

				$this->Patient_model->doctorId 	= $result['doctorId'];

				$result['isTrialCompleted']   	= 0;

				$result['hasValidCredits']  	= 0;

				$result['patientCreditId']  	= 0;

				$result['hasValidPackage']  	= 0;

				$result['subscriptionId']  	= 0;

				$result['noOfSession']  		= 0;

				$result['sessionDuration']  	= 0;

				$patient_records 					= array();

				$patient_records  					= $this->Patient_model->get_patient_records($this->Patient_model->patientId);

				if (count($patient_records) >= 0) {

					$result['isTrialCompleted'] = 1;

					$patient_subscriptions 			= array();

					$this->Patient_model->status 	= 1;

					$patient_credits 			= array();

					$patient_credits  			= $this->Patient_model->get_patient_credites($this->Patient_model->patientId, $result['doctorId']);

					if (count($patient_credits) > 0) {

						$result['hasValidCredits']   	= 1;

						if (count($patient_credits) > 0) {

							$k	= 0;

							foreach ($patient_credits as $row1) {

								$result['patientCreditId'] 	= $row1['patientCreditId'];

								$result['sessionDuration'] 	= $row1['sessionDuration'];

								$result['noOfSession'] 	= $row1['noOfSession'];

							}

						}

					} else {

						$patient_subscriptions  			= $this->Patient_model->get_patient_subscriptions($this->Patient_model->patientId);

						if (count($patient_subscriptions) > 0) {

							$result['hasValidPackage']   	= 1;

							if (count($patient_subscriptions) > 0) {

								$k	= 0;

								foreach ($patient_subscriptions as $row1) {

									$result['subscriptionId'] 	= $row1['subscriptionId'];

									$result['noOfSession'] 	= $row1['noOfSession'];

									$result['sessionDuration'] = $this->Package_model->get_default_session_duration();

								}

							}

						}

					}

				}

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				$result['num_of_consultation']  	= $this->Doctor_model->get_consultation_count($result['doctorId']);

				$arrFavourite = array();

				$this->Patient_model->doctorId = $result['doctorId'];

				$arrFavourite = $this->Patient_model->get_patient_favourite_doctors($this->Patient_model->patientId);

				$isFavourite = 0;

				if(count($arrFavourite) > 0){

					$isFavourite = 1;

				}

				$unReadCount   = $this->Patient_model->get_unread_count_patient($this->Patient_model->patientId,$result['doctorId']);

				if($result['specialization'] <> ''){

					$arrSpecialization	 = array();

					$arrSpecialization	 = explode(',',$result['specialization']);

					$specialization = '';

					for($i=0;$i<count($arrSpecialization);$i++){

						if($specialization == '')

							$specialization = $this->Doctor_model->get_specialization_name($arrSpecialization[$i]);

						else	

							$specialization .= ','.$this->Doctor_model->get_specialization_name($arrSpecialization[$i]);

					}

					if($specialization <> '')		

						$result['specialization'] = $specialization;

				}

				$patientDeviceOS  = $this->Patient_model->get_patient_device_os($this->input->post_get('uniqueId'));

				$response = ['status' => $status, 'token' => $token, 'result' => array(),'doctorId' => $result['doctorId'], 'doctorUniqueId'  => $result['doctorUniqueId'], 'doctorName'  => $result['doctorName'], 'doctorEmail'  => $result['doctorEmail'], 'doctorMobile'  => $result['doctorMobile'], 'qualification'  => $result['qualification'], 'qualification1'  => $result['qualification1'], 'doctorImageUrl'  => $result['doctorImageUrl'], 'experience'  => $result['experience'], 'knownLanguages'  => $result['knownLanguages'], 'specialization'  => $result['specialization'], 'specialityId'  => $result['specialityId'], 'youtubeLink'  => $result['youtubeLink'], 'doctorAddress'  => $result['doctorAddress'], 'communicationMode'  => $result['communicationMode'], 'doctorFee'  => $result['doctorFee'], 'doctorSessionDuration'  => $result['doctorSessionDuration'], 'fcmToken'  => $result['fcmToken'], 'chatRoomNumber'  => $result['chatRoomNumber'], 'medicalRegistrationNumber'  => $result['medicalRegistrationNumber'], 'loginStatus'  => $result['loginStatus'], 'specialityName'  => $result['specialityName'], 'isScheduleEnabled'  => $result['isScheduleEnabled'], 'isCallEnabled'  => $result['isCallEnabled'], 'isViewDetailInfo'  => $result['isViewDetailInfo'], 'isShowGreen'  => $result['isShowGreen'], 'doctorDeviceOS'  => $result['doctorDeviceOS'], 'num_of_rating'  => $result['num_of_rating'], 'overall_rating'  => $result['overall_rating'], 'isTrialCompleted'  => $result['isTrialCompleted'], 'hasValidCredits'  => $result['hasValidCredits'], 'patientCreditId'  => $result['patientCreditId'], 'hasValidPackage'  => $result['hasValidPackage'], 'subscriptionId'  => $result['subscriptionId'], 'noOfSession'  => $result['noOfSession'], 'sessionDuration'  => $result['sessionDuration'], 'num_of_consultation'  => $result['num_of_consultation'], 'medicalLicense'  => $result['medicalLicense'], 'isVerifiedLicense'  => $result['isVerifiedLicense'], 'counsellingCertificate'  => $result['counsellingCertificate'], 'isVerifiedCertificate'  => $result['isVerifiedCertificate'], 'voipToken'  => $result['voipToken'], 'isAvailable' => $isAvailable, 'patientDeviceOS' => $patientDeviceOS,'is_session_with_client'=>$is_session_with_client, 'sessions_with_client'=>$sessions_with_client, 'today_available_sessions' => $today_available_sessions,'available_sessions' => $available_sessions, 'packages' => $packages, 'rating' => $rating, 'isFavourite' => $isFavourite, 'unReadCount' => $unReadCount, 'message' => $message];

				$this->response($response, 200);

			}

		} else {

			$tokenData = time() . $this->input->post_get('uniqueId');

			$token = AUTHORIZATION::generateToken($tokenData);

			$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

			$result = array();

			$response = ['status' => 201, 'token' => $token, 'result' => $result, 'message' => HTTP_STATUS_CODES[460]];

			$this->response($response, 200);

		}

	}
	// ======================================================


	// =========================================================

	// For getting the Symptoms stored in the echo system .

	function packages_list_get()

	{

		$this->Patient_model->setPostGetVars();

		$this->Package_model->setPostGetVars();

		$this->verify_request();

		$this->Package_model->status = 1;

		$result = $this->Package_model->get_package();

		if (!$result) {

			$result = array();

			$tokenData = time() . $this->input->post_get('uniqueId');

			$token = AUTHORIZATION::generateToken($tokenData);

			$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

			$response = ['status' => 201, 'token' => $token,  'result' => $result, 'message' => HTTP_STATUS_CODES[204]];

			$this->response($response, 200);

		} else {

			$status = 200;

			$tokenData = time() . $this->input->post_get('uniqueId');

			$token = AUTHORIZATION::generateToken($tokenData);

			$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

			$response = ['status' => $status, 'token' => $token,  'result' => $result, 'message' => HTTP_STATUS_CODES[200]];

			$this->response($response, 200);

		}

	}

	// Functionality: To add a rating about the app

	// Arguments 	: member id,ratingTitle

	// Response		: if member id or ratingTitle is empty return status = 460 (INCOMPLETE INFORMATION), and add the rating to system return status = 200(SUCCESS) 			

	function add_rating_post()

	{

		$this->Rating_model->setPostGetVars();

		$this->verify_request();

		if (!$this->Rating_model->validate_rating()) {

			$tokenData = time() . $this->input->post_get('uniqueId');

			$token = AUTHORIZATION::generateToken($tokenData);

			$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

			$result = array();

			$response = ['status' => 201, 'token' => $token, 'result' => $result, 'message' => HTTP_STATUS_CODES[460]];

			$this->response($response, 200);

		} else {

			$result = $this->Rating_model->set_rating();

			if (!$result) {

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				$result = array();

				$response = ['status' => 201, 'token' => $token, 'result' => $result,  'message' => HTTP_STATUS_CODES[400]];

				$this->response($response, 200);

			} else {

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				$status = 200;

				$response = ['status' => $status, 'token' => $token, 'result' => $result,  'message' => HTTP_STATUS_CODES[481]];

				$this->response($response, 200);

			}

		}

	}

	function schedule_appointment_post()

	{

		$this->Patient_model->setPostGetVars();

		$this->verify_request();

		if ($this->Patient_model->patientId == '' || $this->Patient_model->doctorId == '' || $this->Patient_model->requestDate == '' || $this->Patient_model->requestSession == '' || $this->Patient_model->appointmentStartTime == '' || $this->Patient_model->appointmentEndTime == '') {

			$tokenData = time() . $this->input->post_get('uniqueId');

			$token = AUTHORIZATION::generateToken($tokenData);

			$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

			$result = array();

			$response = ['status' => 201, 'token' => $token, 'result' => $result, 'message' => HTTP_STATUS_CODES[460]];

			$this->response($response, 200);

		} else {

			$result = $this->Patient_model->schedule_appointment_patient();

			if (!$result) {

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				$result = array();

				$response = ['status' => 201, 'token' => $token, 'result' => $result,  'message' => HTTP_STATUS_CODES[400]];

				$this->response($response, 200);

			} else {

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				$status = 200;

				$response = ['status' => $status, 'token' => $token, 'result' => $result,  'message' => 'Successfully requested appointment!'];

				$this->response($response, 200);

			}

		}

	}

	function update_appointment_status_post()

	{

		$this->Doctor_model->setPostGetVars();

		$this->verify_request();

		if ($this->Doctor_model->appointmentId == '' || $this->Doctor_model->status == '') {

			$tokenData = time() . $this->input->post_get('uniqueId');

			$token = AUTHORIZATION::generateToken($tokenData);

			$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

			$result = array();

			$response = ['status' => 201, 'token' => $token, 'result' => $result, 'message' => HTTP_STATUS_CODES[460]];

			$this->response($response, 200);

		} else {

			$result = $this->Doctor_model->update_appointment_status_doctor($this->Doctor_model->appointmentId);

			//echo $this->Doctor_model->errorMessage;die();

			if (!$result) {

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				$result = array();

				$status = 201;

				if($this->Doctor_model->errorMessage <> ''){

					$status = $this->Doctor_model->errorMessage;

					

				}

				$errorMessage = '';

				if($status == 201){

					

					$errorMessage = 'You have already an appointment on this time!';	

					

				}else if($status == 202){

					

					$errorMessage = 'Patient have already an appointment on this time!';	

						

				}else if($status == 203){

					

					$errorMessage = 'Error! Choose a time in between session start and end time.';		

				}

				$response = ['status' => $status, 'token' => $token, 'result' => $result,  'message' => $errorMessage];

				$this->response($response, 200);

			} else {

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				$status = 200;

				$message = '';	

				if($this->Doctor_model->status == 1){

					$message = 'Appointment fixed successfully!';	

				}else if($this->Doctor_model->status == 2){

					$message = 'Appointment request rejected';	

				}else if($this->Doctor_model->status == 3){

					$message = 'Appointment cancelled';	

				}

				$response = ['status' => $status, 'token' => $token, 'result' => $result,  'message' => $message];

				$this->response($response, 200);

			}

		}

	}

	function complete_appointment_post()

	{

		$this->Doctor_model->setPostGetVars();

		$this->verify_request();

		if ($this->Doctor_model->appointmentId == '') {

			$tokenData = time() . $this->input->post_get('uniqueId');

			$token = AUTHORIZATION::generateToken($tokenData);

			$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

			$result = array();

			$response = ['status' => 201, 'token' => $token, 'result' => $result, 'message' => HTTP_STATUS_CODES[460]];

			$this->response($response, 200);

		} else {

			$result = $this->Doctor_model->complete_appointment_doctor($this->Doctor_model->appointmentId);

			if (!$result) {

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				$result = array();

				$response = ['status' => 201, 'token' => $token, 'result' => $result,  'message' => HTTP_STATUS_CODES[400]];

				$this->response($response, 200);

			} else {

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				$status = 200;

				$response = ['status' => $status, 'token' => $token, 'result' => $result,  'message' => HTTP_STATUS_CODES[481]];

				$this->response($response, 200);

			}

		}

	}

	function cancel_appointment_post()

	{

		$this->Patient_model->setPostGetVars();

		$this->verify_request();

		if ($this->Patient_model->appointmentId == '') {

			$tokenData = time() . $this->input->post_get('uniqueId');

			$token = AUTHORIZATION::generateToken($tokenData);

			$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

			$result = array();

			$response = ['status' => 201, 'token' => $token, 'result' => $result, 'message' => HTTP_STATUS_CODES[460]];

			$this->response($response, 200);

		} else {

			$result = $this->Patient_model->cancel_appointment_patient($this->Patient_model->appointmentId);

			if (!$result) {

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				$result = array();

				$response = ['status' => 201, 'token' => $token, 'result' => $result,  'message' => HTTP_STATUS_CODES[400]];

				$this->response($response, 200);

			} else {

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				$status = 200;

				$response = ['status' => $status, 'token' => $token, 'result' => $result,  'message' => HTTP_STATUS_CODES[481]];

				$this->response($response, 200);

			}

		}

	}

// ------------------------------------------------------

	function delete_appointment_post()

	{

		$this->Doctor_model->setPostGetVars();

		$this->verify_request();

		if ($this->Doctor_model->appointmentId == '') {

			$tokenData = time() . $this->input->post_get('uniqueId');

			$token = AUTHORIZATION::generateToken($tokenData);

			$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

			$result = array();

			$response = ['status' => 201, 'token' => $token, 'result' => $result, 'message' => HTTP_STATUS_CODES[460]];

			$this->response($response, 200);

		} else {

			$result = $this->Doctor_model->delete_appointment_doctor($this->Doctor_model->appointmentId);

			if (!$result) {

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				$result = array();

				$response = ['status' => 201, 'token' => $token, 'result' => $result,  'message' => HTTP_STATUS_CODES[400]];

				$this->response($response, 200);

			} else {

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				$status = 200;

				$response = ['status' => $status, 'token' => $token, 'result' => $result,  'message' => HTTP_STATUS_CODES[481]];

				$this->response($response, 200);

			}

		}

	}


	function requested_appointments_list_get()

	{

		$this->Patient_model->setPostGetVars();

		$this->verify_request();

		$result = array();

		if ($this->input->post_get('loginType') == 2) {

			$this->Patient_model->status = 0;

			$result 	= $this->Patient_model->get_requested_patient_appointments($this->Patient_model->patientId);

		} else if ($this->input->post_get('loginType') == 1) {

			$this->Doctor_model->status = 0;

			$result 	= $this->Doctor_model->get_requested_doctor_appointments($this->Doctor_model->doctorId);

		}

		if (!$result) {

			$result = array();

			$tokenData = time() . $this->input->post_get('uniqueId');

			$token = AUTHORIZATION::generateToken($tokenData);

			$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

			$response = ['status' => 201, 'token' => $token,  'result' => $result, 'message' => 'No requested appointments'];

			$this->response($response, 200);

		} else {

			$status = 200;

			$tokenData = time() . $this->input->post_get('uniqueId');

			$token = AUTHORIZATION::generateToken($tokenData);

			$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

			$response = ['status' => $status, 'token' => $token,  'result' => $result, 'message' => HTTP_STATUS_CODES[200]];

			$this->response($response, 200);

		}

	}

	function fixed_appointments_list_get()

	{

		$this->Patient_model->setPostGetVars();

		$this->verify_request();

		$result = array();

		$this->Patient_model->retrieveTimeOffset();

		$this->Doctor_model->currentTime = $this->Patient_model->currentTime;

		if ($this->input->post_get('loginType') == 2) {

			$this->Patient_model->status = 1;

			$result 	= $this->Patient_model->get_patient_fixed_appointments($this->Patient_model->patientId);

			if (is_array($result) && count($result) > 0) {

				$i	= 0;

				foreach ($result as $row) {

					$result[$i]['unReadCount']   = $this->Patient_model->get_unread_count_patient($result[$i]['patientId'],$result[$i]['doctorId']);		

					$i++;

				}

			}

		} else if ($this->input->post_get('loginType') == 1) {

			$this->Doctor_model->status = 1;

			$result 	= $this->Doctor_model->get_doctor_fixed_appointments($this->Doctor_model->doctorId);

			if (is_array($result) && count($result) > 0) {

				$i	= 0;

				foreach ($result as $row) {

					$result[$i]['unReadCount']   = $this->Doctor_model->get_unread_count_doctor($result[$i]['patientId'],$result[$i]['doctorId']);				

					$i++;	

				}

			}

		}

		if (!$result) {

			$result = array();

			$tokenData = time() . $this->input->post_get('uniqueId');

			$token = AUTHORIZATION::generateToken($tokenData);

			$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

			$response = ['status' => 201, 'token' => $token,  'result' => $result, 'message' => 'No upcoming appointments'];

			$this->response($response, 200);

		} else {

			$status = 200;

			$tokenData = time() . $this->input->post_get('uniqueId');

			$token = AUTHORIZATION::generateToken($tokenData);

			$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

			if ($this->input->post_get('loginType') == 2) {

				if (is_array($result) && count($result) > 0) {

					$i	= 0;

					foreach ($result as $row) {

						if ($result[$i]['doctorImageUrl'] <> '' && file_exists(AXUPLOADDOCTORIMAGEPATH . $result[$i]['doctorImageUrl'])!== null ) {

						// if ($result[$i]['doctorImageUrl'] <> '' && file_exists('../uploads/doctors/' . $result[$i]['doctorImageUrl'])) {

							$result[$i]['doctorImageUrl'] =  AXUPLOADDOCTORIMAGEPATH . $result[$i]['doctorImageUrl'];

						} else {

							$result[$i]['doctorImageUrl'] = AXUPLOADPATH . 'no_image.png';

						}

						$this->Patient_model->doctorId 	= $result[$i]['doctorId'];

						$result[$i]['isTrialCompleted']   	= 0;

						$result[$i]['hasValidCredits']  	= 0;

						$result[$i]['patientCreditId']  	= 0;

						$result[$i]['hasValidPackage']  	= 0;

						$result[$i]['subscriptionId']  		= 0;

						$result[$i]['noOfSession']  		= 0;

						$result[$i]['sessionDuration']  	= 0;

						$patient_records 					= array();

						$patient_records  					= $this->Patient_model->get_patient_records($this->Patient_model->patientId);

						if (count($patient_records) >= 0) {

							$result[$i]['isTrialCompleted'] = 1;

							$patient_subscriptions 			= array();

							$this->Patient_model->status 	= 1;

							$patient_credits 			= array();

							$patient_credits  			= $this->Patient_model->get_patient_credites($this->Patient_model->patientId, $result[$i]['doctorId']);

							if (count($patient_credits) > 0) {

								$result[$i]['hasValidCredits']   	= 1;

								if (count($patient_credits) > 0) {

									$k	= 0;

									foreach ($patient_credits as $row1) {

										$result[$i]['patientCreditId'] 	= $row1['patientCreditId'];

										$result[$i]['sessionDuration'] 	= $row1['sessionDuration'];

										$result[$i]['noOfSession'] 		= $row1['noOfSession'];

									}

								}

							} else {

								$patient_subscriptions  	= $this->Patient_model->get_patient_subscriptions($this->Patient_model->patientId);

								if (count($patient_subscriptions) > 0) {

									$result[$i]['hasValidPackage']   	= 1;

									if (count($patient_subscriptions) > 0) {

										$k	= 0;

										foreach ($patient_subscriptions as $row1) {

											$result[$i]['subscriptionId'] 	= $row1['subscriptionId'];

											$result[$i]['noOfSession'] 	= $row1['noOfSession'];

											$result[$i]['sessionDuration'] = $this->Package_model->get_default_session_duration();

										}

									}

								}

							}

						}

						$i++;

					}

				}

			}

			$response = ['status' => $status, 'token' => $token,  'result' => $result, 'message' => HTTP_STATUS_CODES[200]];

			$this->response($response, 200);

		}

	}

	// Dated 05 May 2020 Dileep to make appointment request and confirmed request into a single api - requested_fixed_appointments_list_get

	function requested_fixed_appointments_list_get()

	{

		$this->Patient_model->setPostGetVars();

		$this->verify_request();

		$result = array();

		$this->Patient_model->retrieveTimeOffset();

		if ($this->input->post_get('loginType') == 2) {
			
			$this->Patient_model->status = 1;
			
			$result1 	= array();

			$result1 	= $this->Patient_model->get_patient_fixed_appointments($this->Patient_model->patientId);
			
			$this->Patient_model->status = '';
			
			$result2 	= array();
			
			$result2 	= $this->Patient_model->get_patient_requested_fixed_appointments($this->Patient_model->patientId);
			
			$result 	= array();
			
			$result 	= array_merge_recursive($result1,$result2);

			if (is_array($result) && count($result) > 0) {

				$i	= 0;

				foreach ($result as $row) {

					$result[$i]['unReadCount']   = $this->Patient_model->get_unread_count_patient($result[$i]['patientId'],$result[$i]['doctorId']);			

					$i++;

				}

			}

		} else if ($this->input->post_get('loginType') == 1) {

			$result 	= $this->Doctor_model->get_doctor_requested_fixed_appointments($this->Doctor_model->doctorId);

			if (is_array($result) && count($result) > 0) {

					$i	= 0;

					foreach ($result as $row) {

						$result[$i]['unReadCount']   = $this->Doctor_model->get_unread_count_doctor($result[$i]['patientId'],$result[$i]['doctorId']);			

						$i++;	

					}

				}

		}

		if (!$result) {

			$result = array();

			$tokenData = time() . $this->input->post_get('uniqueId');

			$token = AUTHORIZATION::generateToken($tokenData);

			$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

			$response = ['status' => 201, 'token' => $token,  'result' => $result, 'message' =>'No upcoming appointments'];

			$this->response($response, 200);

		} else {

			$status = 200;

			$tokenData = time() . $this->input->post_get('uniqueId');

			$token = AUTHORIZATION::generateToken($tokenData);

			$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

			if ($this->input->post_get('loginType') == 2) {

				if (is_array($result) && count($result) > 0) {

					$i	= 0;

					foreach ($result as $row) {

						if ($result[$i]['doctorImageUrl'] <> '' && file_exists(AXUPLOADDOCTORIMAGEPATH . $result[$i]['doctorImageUrl'])!== null ) {
						// if ($result[$i]['doctorImageUrl'] <> '' && file_exists('../uploads/doctors/' . $result[$i]['doctorImageUrl'])) {

							$result[$i]['doctorImageUrl'] =  AXUPLOADDOCTORIMAGEPATH . $result[$i]['doctorImageUrl'];

						} else {

							$result[$i]['doctorImageUrl'] = AXUPLOADPATH . 'no_image.png';

						}

						$this->Patient_model->doctorId 	= $result[$i]['doctorId'];

						$result[$i]['isTrialCompleted']   	= 0;

						$result[$i]['hasValidCredits']  	= 0;

						$result[$i]['patientCreditId']  	= 0;

						$result[$i]['hasValidPackage']  	= 0;

						$result[$i]['subscriptionId']  		= 0;

						$result[$i]['noOfSession']  		= 0;

						$result[$i]['sessionDuration']  	= 0;

						$patient_records 					= array();

						$patient_records  					= $this->Patient_model->get_patient_records($this->Patient_model->patientId);

						if (count($patient_records) >= 0) {

							$result[$i]['isTrialCompleted'] = 1;

							$patient_subscriptions 			= array();

							$this->Patient_model->status 	= 1;

							$patient_credits 			= array();

							$patient_credits  			= $this->Patient_model->get_patient_credites($this->Patient_model->patientId, $result[$i]['doctorId']);

							if (count($patient_credits) > 0) {

								$result[$i]['hasValidCredits']   	= 1;

								if (count($patient_credits) > 0) {

									$k	= 0;

									foreach ($patient_credits as $row1) {

										$result[$i]['patientCreditId'] 	= $row1['patientCreditId'];

										$result[$i]['sessionDuration'] 	= $row1['sessionDuration'];

										$result[$i]['noOfSession'] 		= $row1['noOfSession'];

									}

								}

							} else {

								$patient_subscriptions  	= $this->Patient_model->get_patient_subscriptions($this->Patient_model->patientId);

								if (count($patient_subscriptions) > 0) {

									$result[$i]['hasValidPackage']   	= 1;

									if (count($patient_subscriptions) > 0) {

										$k	= 0;

										foreach ($patient_subscriptions as $row1) {

											$result[$i]['subscriptionId'] 	= $row1['subscriptionId'];

											$result[$i]['noOfSession'] 	= $row1['noOfSession'];

											$result[$i]['sessionDuration'] = $this->Package_model->get_default_session_duration();

										}

									}

								}

							}

						}

						$i++;

					}

				}

			}

			$response = ['status' => $status, 'token' => $token,  'result' => $result, 'message' => HTTP_STATUS_CODES[200]];

			$this->response($response, 200);

		}

	}

	// End of 	requested_fixed_appointments_list_get

	function completed_appointments_list_get()

	{

		$this->Patient_model->setPostGetVars();

		$this->verify_request();

		//$this->Patient_model->status 		= 1;

		$this->Patient_model->isCompleted 	= 1;

		$result = array();

		if ($this->input->post_get('loginType') == 2) {

			$this->Patient_model->isCompleted 	= 1;

			$result 	= $this->Patient_model->get_patient_completed_appointments($this->Patient_model->patientId);

			if (is_array($result) && count($result) > 0) {

				$i	= 0;

				foreach ($result as $row) {

					$result[$i]['unReadCount']   = $this->Patient_model->get_unread_count_patient($result[$i]['patientId'],$result[$i]['doctorId']);			

					$i++;

				}

			}

		} else if ($this->input->post_get('loginType') == 1) {

			$this->Doctor_model->isCompleted 	= 1;

			$result 	= $this->Doctor_model->get_doctor_completed_appointments($this->Doctor_model->doctorId);

			
			if (is_array($result) && count($result) > 0) {

				$i	= 0;

				foreach ($result as $row) {

					$result[$i]['unReadCount']   = $this->Doctor_model->get_unread_count_doctor($result[$i]['patientId'],$result[$i]['doctorId']);			

					$i++;	

				}

			}

		}

		if (!$result) {

			$result = array();

			$tokenData = time() . $this->input->post_get('uniqueId');

			$token = AUTHORIZATION::generateToken($tokenData);

			$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

			$response = ['status' => 201, 'token' => $token,  'result' => $result, 'message' => 'No completed appointments'];

			$this->response($response, 200);

		} else {

			$status = 200;

			$tokenData = time() . $this->input->post_get('uniqueId');

			$token = AUTHORIZATION::generateToken($tokenData);

			$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

			$response = ['status' => $status, 'token' => $token,  'result' => $result, 'message' => HTTP_STATUS_CODES[200]];

			$this->response($response, 200);

		}

	}

	function add_communication_log_post()

	{

		$this->Patient_model->setPostGetVars();

		$this->verify_request();

		if ($this->input->post_get('loginType') == 1) {

			$this->Patient_model->doctorId 	= $this->Doctor_model->get_doctor_id_by_uniqueId(trim($this->input->post_get('uniqueId')));

			if($this->Patient_model->communicationMode == 3){

				$this->Patient_model->patientId = $this->Patient_model->get_patient_id_by_uniqueId(trim($this->input->post_get('patientId')));

			}

		} else if ($this->input->post_get('loginType') == 2) {

			$this->Patient_model->patientId = $this->Patient_model->get_patient_id_by_uniqueId(trim($this->input->post_get('uniqueId')));

			if($this->Patient_model->communicationMode == 3){

				$this->Patient_model->doctorId =  $this->Doctor_model->get_doctor_id_by_uniqueId(trim($this->input->post_get('doctorId')));

			}

		}

		if ($this->Patient_model->patientId == '' || $this->Patient_model->doctorId == '' || $this->Patient_model->communicationMode == '' || $this->Patient_model->communicationStartTime == '') {

			$tokenData = time() . $this->input->post_get('uniqueId');

			$token = AUTHORIZATION::generateToken($tokenData);

			$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

			$result = array();

			$response = ['status' => 201, 'token' => $token, 'result' => $result, 'message' => HTTP_STATUS_CODES[460]];

			$this->response($response, 200);

		} else {

			if ($this->input->post_get('loginType') == 1 && $this->Patient_model->communicationMode <> 3) {

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				$status = 200;

				$patientId = $this->input->post_get('patientId');

				$doctorId = $this->input->post_get('uniqueId');

				if(!ctype_digit(trim($this->input->post_get('patientId')))){

					$patientId = $this->Patient_model->get_patient_id_by_uniqueId(trim($this->input->post_get('patientId')));

				}

				if(!ctype_digit(trim($this->input->post_get('uniqueId')))){

					$doctorId = $this->Doctor_model->get_doctor_id_by_uniqueId(trim($this->input->post_get('uniqueId')));

				}

				if($this->input->post_get('communicationDate') <> '')

					$this->Patient_model->communicationDate = date('Y-m-d',strtotime($this->input->post_get('communicationDate')));

				else

					$this->Patient_model->communicationDate = date('Y-m-d');

				$appointmentId = 0;

				$appointmentId = $this->Patient_model->get_fixed_appointment_id($patientId,$doctorId); 

				$patientRecordId = 0;

				$patientRecordId = $this->Patient_model->get_last_record_id($patientId,$doctorId,$appointmentId); 

				if($patientId <> '' && $doctorId <> ''){

					$patientFcmToken = $this->Patient_model->get_patient_fcm_token($patientId);

					$this->Patient_model->get_doctor_fcm_token($doctorId);

				}

				$response = ['status' => $status, 'token' => $token, 'result' => $patientRecordId, 'patientRecordId' => $patientRecordId, 'appointmentId' => $appointmentId , 'doctorDeviceOS' => $this->Patient_model->doctorDeviceOS, 'patientDeviceOS' => $this->Patient_model->patientDeviceOS,  'message' => HTTP_STATUS_CODES[200]];

				$this->response($response, 200);

			}else{

				$result = $this->Patient_model->add_communication_log_patient();
	
				if (!$result) {
	
					$tokenData = time() . $this->input->post_get('uniqueId');
	
					$token = AUTHORIZATION::generateToken($tokenData);
	
					$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);
	
					$result = array();
	
					if ($this->Patient_model->errorMessage <> '')
	
						$errorMessage = $this->Patient_model->errorMessage;
	
					else
	
						$errorMessage = HTTP_STATUS_CODES[460];
	
					$response = ['status' => 201, 'token' => $token, 'result' => $result,  'message' => $errorMessage];
	
					$this->response($response, 200);
	
				} else {
	
					$tokenData = time() . $this->input->post_get('uniqueId');
	
					$token = AUTHORIZATION::generateToken($tokenData);
	
					$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);
	
					$status = 200;
	
					$response = ['status' => $status, 'token' => $token, 'result' => $result, 'patientRecordId' => $this->Patient_model->patientRecordId, 'appointmentId' => $this->Patient_model->appointmentId, 'doctorDeviceOS' => $this->Patient_model->doctorDeviceOS, 'patientDeviceOS' => $this->Patient_model->patientDeviceOS,  'message' => HTTP_STATUS_CODES[200]];
	
					$this->response($response, 200);
	
				}

			}

		}

	}

	function end_communication_log_post()

	{

		$this->Patient_model->setPostGetVars();

		$this->verify_request();

		if ($this->Patient_model->patientRecordId == '' || $this->Patient_model->communicationEndTime == '' || $this->Patient_model->communicationDuration == '') {

			$tokenData = time() . $this->input->post_get('uniqueId');

			$token = AUTHORIZATION::generateToken($tokenData);

			$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

			$result = array();

			$response = ['status' => 201, 'token' => $token, 'result' => $result, 'message' => HTTP_STATUS_CODES[460]];

			$this->response($response, 200);

		} else {

			$result = $this->Patient_model->end_communication_log_patient($this->Patient_model->patientRecordId);
			// $result = $this->Patient_model->end_communication_log_patient($this->Patient_model->patientRecordId);

			$doctorId = $this->Patient_model->get_doctor_id_from_record($this->Patient_model->patientRecordId);

			$this->Patient_model->update_available_status($doctorId, 0);
			

			if (!$result) {

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				$result = array();

				$response = ['status' => 201, 'token' => $token, 'result' => $result,  'message' => HTTP_STATUS_CODES[400]];

				$this->response($response, 200);

			} else {

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				$status = 200;

				$response = ['status' => $status, 'token' => $token, 'result' => $result, 'appointmentId' => $this->Patient_model->appointmentId,  'message' => HTTP_STATUS_CODES[200]];

				$this->response($response, 200);

			}

		}

	}



	function add_prescription_post()

	{

		$this->Patient_model->setPostGetVars();

		$this->verify_request();

		if ($this->Patient_model->patientId == '' || $this->Patient_model->doctorId == '' || $this->Patient_model->prescriptionNotes == '') {

			$tokenData = time() . $this->input->post_get('uniqueId');

			$token = AUTHORIZATION::generateToken($tokenData);

			$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

			$result = array();

			$response = ['status' => 201, 'token' => $token, 'result' => $result, 'message' => HTTP_STATUS_CODES[460]];

			$this->response($response, 200);

		} else {

			$result = $this->Patient_model->add_prescription_patient();

			if (!$result) {

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				$result = array();

				$response = ['status' => 201, 'token' => $token, 'result' => $result,  'message' => HTTP_STATUS_CODES[400]];

				$this->response($response, 200);

			} else {

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				$status = 200;

				$response = ['status' => $status, 'token' => $token, 'result' => $result,  'message' => 'Prescription added successfully!'];

				$this->response($response, 200);

			}

		}

	}

	function subscribe_package_post()

	{

		$this->Patient_model->setPostGetVars();

		$this->verify_request();

		if ($this->Patient_model->patientId == '' || $this->Patient_model->doctorId == '' || $this->Patient_model->packageId == '') {

			$tokenData = time() . $this->input->post_get('uniqueId');

			$token = AUTHORIZATION::generateToken($tokenData);

			$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

			$result = array();

			$response = ['status' => 201, 'token' => $token, 'result' => $result, 'message' => HTTP_STATUS_CODES[460]];

			$this->response($response, 200);

		} else {

			$result = $this->Patient_model->subscribe_package_patient();

			if (!$result) {

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				$result = array();

				$response = ['status' => 201, 'token' => $token, 'result' => $result,  'message' => HTTP_STATUS_CODES[400]];

				$this->response($response, 200);

			} else {

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				$status = 200;

				$response = ['status' => $status, 'token' => $token, 'result' => $result, 'doctorId' => $this->Patient_model->doctorId, 'paymentId' => $this->Patient_model->paymentId, 'paymentAmount' => $this->Patient_model->paymentAmount, 'order_id' => $this->Patient_model->order_id,  'message' => 'Package subscription successful!'];

				$this->response($response, 200);

			}

		}

	}

	function add_payment_post()

	{

		$this->Patient_model->setPostGetVars();

		$this->verify_request();

		if ($this->Patient_model->patientId == '' || $this->Patient_model->doctorId == '') {

			$tokenData = time() . $this->input->post_get('uniqueId');

			$token = AUTHORIZATION::generateToken($tokenData);

			$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

			$result = array();

			$response = ['status' => 201, 'token' => $token, 'result' => $result, 'message' => HTTP_STATUS_CODES[460]];

			$this->response($response, 200);

		} else {
			

			$this->Doctor_model->get_doctor_consultation_fee($this->Patient_model->doctorId);

			$this->Patient_model->paymentAmount 	= $this->Doctor_model->doctorFee;

			$this->Patient_model->noOfSession 		= 1;

			$this->Patient_model->sessionDuration 	= $this->Doctor_model->doctorSessionDuration;

			$result = $this->Patient_model->add_payment_patient();	

			$this->Patient_model->add_credits_patient();
		

			if (!$result) {

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				$result = array();

				$response = ['status' => 201, 'token' => $token, 'result' => $result,  'message' => HTTP_STATUS_CODES[400]];

				$this->response($response, 200);

			} else {

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				$status = 200;

				$response = ['status' => $status, 'token' => $token, 'result' => $result, 'doctorId' => $this->Patient_model->doctorId, 'paymentId' => $this->Patient_model->paymentId, 'paymentAmount' => $this->Patient_model->paymentAmount, 'order_id' => $this->Patient_model->order_id, 'message' => 'Be patient!.. redirecting to the payment gateway page!'];

				$this->response($response, 200);

			}

		}

	}

	function update_payment_status_post()

	{
		
		$this->Patient_model->setPostGetVars();

		$this->verify_request();
		

		if ($this->Patient_model->paymentId == '') {

			$tokenData = time() . $this->input->post_get('uniqueId');

			$token = AUTHORIZATION::generateToken($tokenData);

			$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

			$result = array();

			$response = ['status' => 201, 'token' => $token, 'result' => $result, 'message' => HTTP_STATUS_CODES[460]];

			$this->response($response, 200);

		} else {
		
			$result = $this->Patient_model->update_payment_status_patient($this->Patient_model->paymentId);
			if (!$result) {
				
				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				$result = array();

				$response = ['status' => 201, 'token' => $token, 'result' => $result,  'message' => HTTP_STATUS_CODES[400]];

				$this->response($response, 200);

			} else {

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				$status = 200;

				$response = ['status' => $status, 'token' => $token, 'result' => $result,  'message' => 'Payment successful!'];

				$this->response($response, 200);

			}

		}

	}

	function add_favourites_post()

	{

		$this->Patient_model->setPostGetVars();

		$this->verify_request();

		if ($this->Patient_model->patientId == '' || $this->Patient_model->doctorId == '') {

			$tokenData = time() . $this->input->post_get('uniqueId');

			$token = AUTHORIZATION::generateToken($tokenData);

			$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

			$result = array();

			$response = ['status' => 201, 'token' => $token, 'result' => $result, 'message' => HTTP_STATUS_CODES[460]];

			$this->response($response, 200);

		} else {

			$result = $this->Patient_model->add_favourites_patient();

			if (!$result) {

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				$result = array();

				$status = 400;

				if ($this->Patient_model->errorMessage <> '') {

					$errorMessage	=	$this->Patient_model->errorMessage;

				} else {

					$errorMessage	= HTTP_STATUS_CODES[400];

				}

				$response = ['status' => 201, 'token' => $token, 'result' => $result, 'message' => $errorMessage];

				$this->response($response, 200);

			} else {

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				$status = 200;

				if ($this->Patient_model->errorMessage <> '') {

					$errorMessage	=	$this->Patient_model->errorMessage;

				} else {

					$errorMessage	= 'Added to favorites!';

				}

				$response = ['status' => $status, 'token' => $token, 'result' => $result, 'message' => $errorMessage];

				$this->response($response, 200);

			}

		}

	}

	function favourite_doctors_list_get()

	{

		$this->Patient_model->setPostGetVars();

		$this->verify_request();

		if ($this->Patient_model->patientId == '') {

			$tokenData = time() . $this->input->post_get('uniqueId');

			$token = AUTHORIZATION::generateToken($tokenData);

			$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

			$result = array();

			$response = ['status' => 201, 'token' => $token, 'result' => $result, 'message' => 'No favourite doctors yet. You may select your favourite doctor for future consultation by clicking the like button link.'];

			$this->response($response, 200);

		} else {

			$result = array();

			$result 	= $this->Patient_model->get_patient_favourite_doctors($this->Patient_model->patientId);

			if (!$result) {

				$result = array();

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				$response = ['status' => 201, 'token' => $token,  'result' => $result, 'message' =>'No favourite doctors yet. You may select your favourite doctor for future consultation by clicking the like button link.'];

				$this->response($response, 200);

			} else {

				if (is_array($result) && count($result) > 0) {

					$i	= 0;

					foreach ($result as $row) {

						if ($result[$i]['doctorImageUrl'] <> '' && file_exists(AXUPLOADDOCTORIMAGEPATH . $result[$i]['doctorImageUrl'])!== null ) {
							// if ($result[$i]['doctorImageUrl'] <> '' && file_exists('../uploads/doctors/' . $result[$i]['doctorImageUrl'])) {

							$result[$i]['doctorImageUrl'] =  AXUPLOADDOCTORIMAGEPATH . $result[$i]['doctorImageUrl'];

						} else {

							$result[$i]['doctorImageUrl'] = AXUPLOADPATH . 'no_image.png';

						}

						$rating =  array();

						$num_of_rating = 0;

						$overall_rating = 0;

						if ($result[$i]['doctorId'] <> '') {

							$num_of_rating = $this->Rating_model->get_rating_count($result[$i]['doctorId']);

							if ($num_of_rating <> 0) {

								$total_rating = $this->Rating_model->get_total_rating($result[$i]['doctorId']);

								$overall_rating =  ($total_rating / $num_of_rating);

							}

						}

						$result[$i]['num_of_rating'] 	= $num_of_rating;

						$result[$i]['overall_rating'] 	= number_format((float)$overall_rating, 2);

						$this->Patient_model->doctorId 	= $result[$i]['doctorId'];

						$result[$i]['isTrialCompleted']   	= 0;

						$result[$i]['hasValidCredits']  	= 0;

						$result[$i]['patientCreditId']  	= 0;

						$result[$i]['hasValidPackage']  	= 0;

						$result[$i]['subscriptionId']  		= 0;

						$result[$i]['noOfSession']  		= 0;

						$result[$i]['sessionDuration']  	= 0;

						$patient_records 					= array();

						$patient_records  					= $this->Patient_model->get_patient_records($this->Patient_model->patientId);

						if (count($patient_records) >= 0) {

							$result[$i]['isTrialCompleted'] = 1;

							$patient_subscriptions 			= array();

							$this->Patient_model->status 	= 1;

							$patient_credits 			= array();

							$patient_credits  			= $this->Patient_model->get_patient_credites($this->Patient_model->patientId, $result[$i]['doctorId']);

							if (count($patient_credits) > 0) {

								$result[$i]['hasValidCredits']   	= 1;

								if (count($patient_credits) > 0) {

									$k	= 0;

									foreach ($patient_credits as $row1) {

										$result[$i]['patientCreditId'] 	= $row1['patientCreditId'];

										$result[$i]['sessionDuration'] 	= $row1['sessionDuration'];

										$result[$i]['noOfSession'] 		= $row1['noOfSession'];

									}

								}

							} else {

								$patient_subscriptions  	= $this->Patient_model->get_patient_subscriptions($this->Patient_model->patientId);			

								if (count($patient_subscriptions) > 0) {

									$result[$i]['hasValidPackage']   	= 1;

									if (count($patient_subscriptions) > 0) {

										$k	= 0;

										foreach ($patient_subscriptions as $row1) {

											$result[$i]['subscriptionId'] 	= $row1['subscriptionId'];

											$result[$i]['noOfSession'] 	= $row1['noOfSession'];

											$result[$i]['sessionDuration'] = $this->Package_model->get_default_session_duration();

										}

									}

								}

							}

						}

						$result[$i]['unReadCount']   = $this->Patient_model->get_unread_count_patient($this->Patient_model->patientId,$result[$i]['doctorId']);

						$i++;

					}

				}

				$status = 200;

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				$response = ['status' => $status, 'token' => $token,  'result' => $result, 'message' => HTTP_STATUS_CODES[200]];

				$this->response($response, 200);

			}

		}

	}

	function rating_list_get()

	{

		$this->Patient_model->setPostGetVars();

		$this->Rating_model->setPostGetVars();

		$this->verify_request();

		if ($this->Rating_model->doctorId == '') {

			$tokenData = time() . $this->input->post_get('uniqueId');

			$token = AUTHORIZATION::generateToken($tokenData);

			$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

			$result = array();

			$response = ['status' => 201, 'token' => $token, 'result' => $result, 'message' => HTTP_STATUS_CODES[460]];

			$this->response($response, 200);

		} else {

			if(!ctype_digit(trim($this->Rating_model->doctorId))){

				$this->Rating_model->doctorId = $this->Doctor_model->get_doctor_id_by_uniqueId(trim($this->Rating_model->doctorId));

	

			}

			$result = array();

			$result 	= $this->Rating_model->get_rating();

			if (!$result) {

				$result = array();

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				$response = ['status' => 201, 'token' => $token,  'result' => $result, 'message' => 'No ratings yet !'];

				$this->response($response, 200);

			} else {



				if (is_array($result) && count($result) > 0) {

					$i	= 0;

					foreach ($result as $row) {

						if ($result[$i]['profileImgUrl'] <> '' && file_exists(AXUPLOADPATIENTIMAGEPATH . $result[$i]['profileImgUrl'])!== null ) {
						// if ($result[$i]['profileImgUrl'] <> '' && file_exists('../uploads/patients/' . $result[$i]['profileImgUrl'])) {

							$result[$i]['profileImgUrl'] =  AXUPLOADPATIENTIMAGEPATH . $result[$i]['profileImgUrl'];

						} else {

							$result[$i]['profileImgUrl'] = AXUPLOADPATH . 'no_image.png';

						}

						$i++;

					}

				}

				$status = 200;

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				$response = ['status' => $status, 'token' => $token,  'result' => $result, 'message' => HTTP_STATUS_CODES[200]];

				$this->response($response, 200);

			}

		}

	}

	function payment_history_patient_get()

	{

		$this->Patient_model->setPostGetVars();

		$this->verify_request();

		$result = array();

		$this->Patient_model->paymentStatus = 1;

		$result 	= $this->Patient_model->get_payment_history_patient($this->Patient_model->patientId);

		if (!$result) {

			$result = array();

			$tokenData = time() . $this->input->post_get('uniqueId');

			$token = AUTHORIZATION::generateToken($tokenData);

			$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

			$response = ['status' => 201, 'token' => $token,  'result' => $result, 'message' => 'No transactions yet'];

			$this->response($response, 200);

		} else {

			$status = 200;

			if (is_array($result) && count($result) > 0) {

				$i	= 0;

				foreach ($result as $row) {

					if ($result[$i]['paymentDate'] <> '') {

						$arrPaymentDate = explode(' ', $result[$i]['paymentDate']);

						$result[$i]['paymentDate'] =  date('d-M-Y', strtotime($arrPaymentDate[0]));

						$result[$i]['paymentTime'] =  date('g:i A', strtotime($arrPaymentDate[1]));;

					}

					$i++;

				}

			}

			$tokenData = time() . $this->input->post_get('uniqueId');

			$token = AUTHORIZATION::generateToken($tokenData);

			$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

			$response = ['status' => $status, 'token' => $token,  'result' => $result, 'message' => HTTP_STATUS_CODES[200]];

			$this->response($response, 200);

		}

	}

	function payment_history_doctor_get()

	{

		$this->Doctor_model->setPostGetVars();

		$this->verify_request();

		$result = array();

		$this->Doctor_model->paymentStatus = 1;

		$result 	= $this->Doctor_model->get_payment_history_doctor($this->Doctor_model->doctorId);

		if (!$result) {

			$result = array();

			$tokenData = time() . $this->input->post_get('uniqueId');

			$token = AUTHORIZATION::generateToken($tokenData);

			$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

			$response = ['status' => 201, 'token' => $token,  'result' => $result, 'message' => 'No transactions yet'];

			$this->response($response, 200);

		} else {

			$status = 200;

			if (is_array($result) && count($result) > 0) {

				$i	= 0;

				foreach ($result as $row) {

					if ($result[$i]['paymentDate'] <> '') {

						$arrPaymentDate = explode(' ', $result[$i]['paymentDate']);

						$result[$i]['paymentDate'] =  date('d-M-Y', strtotime($arrPaymentDate[0]));

						$result[$i]['paymentTime'] =  date('g:i A', strtotime($arrPaymentDate[1]));;

					}

					$i++;

				}

			}

			$tokenData = time() . $this->input->post_get('uniqueId');

			$token = AUTHORIZATION::generateToken($tokenData);

			$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

			$response = ['status' => $status, 'token' => $token,  'result' => $result, 'message' => HTTP_STATUS_CODES[200]];

			$this->response($response, 200);

		}

	}

	function communication_history_patient_get()

	{

		$this->Patient_model->setPostGetVars();

		$this->verify_request();

		$result = array();

		$result 	= $this->Patient_model->get_communication_history_patient($this->Patient_model->patientId);

		if (!$result) {

			$result = array();

			$tokenData = time() . $this->input->post_get('uniqueId');

			$token = AUTHORIZATION::generateToken($tokenData);

			$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

			$response = ['status' => 201, 'token' => $token,  'result' => $result, 'message' => 'No call records yet'];

			$this->response($response, 200);

		} else {

			$status = 200;

			if (is_array($result) && count($result) > 0) {

				$i	= 0;

				foreach ($result as $row) {

					if ($result[$i]['communicationStartTime'] <> '') {

						$result[$i]['communicationStartTime'] =  date('g:i A', strtotime($result[$i]['communicationStartTime']));

					}

					if ($result[$i]['communicationEndTime'] <> '') {

						$result[$i]['communicationEndTime'] =  date('g:i A', strtotime($result[$i]['communicationEndTime']));

					}

					if ($result[$i]['communicationDuration'] <> '') {

						// $result[$i]['communicationDuration'] =  number_format((float) $result[$i]['communicationDuration'], 2, '.', '') . " Minutes";

					}

					if($result[$i]['communicationDuration'] >= 3 && $result[$i]['communicationDuration'] <= 15){

						$result[$i]['requestStatus'] = 1;	

					}else{

						$result[$i]['requestStatus'] = 0;

					}

					/*if($result[$i]['communicationDuration'] <= 0)

						unset($result[$i]);*/

					$i++;

				}

			}

			$tokenData = time() . $this->input->post_get('uniqueId');

			$token = AUTHORIZATION::generateToken($tokenData);

			$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

			$response = ['status' => $status, 'token' => $token,  'result' => $result, 'message' => HTTP_STATUS_CODES[200]];

			$this->response($response, 200);

		}

	}

	function communication_history_doctor_get()

	{

		$this->Doctor_model->setPostGetVars();

		$this->verify_request();

		$result = array();

		$result 	= $this->Doctor_model->get_communication_history_doctor($this->Doctor_model->doctorId);

		if (!$result) {

			$result = array();

			$tokenData = time() . $this->input->post_get('uniqueId');

			$token = AUTHORIZATION::generateToken($tokenData);

			$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

			$response = ['status' => 201, 'token' => $token,  'result' => $result, 'message' => 'No records yet'];

			$this->response($response, 200);

		} else {

			$status = 200;

			if (is_array($result) && count($result) > 0) {

				$i	= 0;

				foreach ($result as $row) {

					if ($result[$i]['communicationStartTime'] <> '') {

						$result[$i]['communicationStartTime'] =  date('g:i A', strtotime($result[$i]['communicationStartTime']));

					}

					if ($result[$i]['communicationEndTime'] <> '') {

						$result[$i]['communicationEndTime'] =  date('g:i A', strtotime($result[$i]['communicationEndTime']));

					}

					if ($result[$i]['communicationDuration'] <> '') {

						// $result[$i]['communicationDuration'] =  number_format((float) $result[$i]['communicationDuration'], 2, '.', '') . " Minutes";

					}

					/*if($result[$i]['communicationDuration'] <= 0)

						unset($result[$i]);*/

					$i++;

				}

			}

			$tokenData = time() . $this->input->post_get('uniqueId');

			$token = AUTHORIZATION::generateToken($tokenData);

			$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

			$response = ['status' => $status, 'token' => $token,  'result' => $result, 'message' => HTTP_STATUS_CODES[200]];

			$this->response($response, 200);

		}

	}

	function appointment_details_get()

	{

		$this->verify_request();

		if ($this->input->post_get('uniqueId') <> '' && $this->input->post_get('appointmentId') <> '') {

			if ($this->input->post_get('loginType') == 2) {

				$result 	= $this->Patient_model->get_appointment_details_patient($this->input->post_get('appointmentId'));

			} else if ($this->input->post_get('loginType') == 1) {

				$result 	= $this->Doctor_model->get_appointment_details_doctor($this->input->post_get('appointmentId'));

			}

			if (!$result) {

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				$result = array();

				$response = ['status' => 201, 'token' => $token, 'result' => $result, 'message' => HTTP_STATUS_CODES[204]];

				$this->response($response, 200);

			} else {

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				$status = 200;

				$appoinments 	= array();

				$sessionDuration = 0;

				if ($this->input->post_get('loginType') == 1) {

					$this->Doctor_model->appointmentDate = $result['requestDate1'];

					unset($result['requestDate1']);

					

					$this->Patient_model->retrieveTimeOffset();

					$this->Doctor_model->currentTime = $this->Patient_model->currentTime;

					$appoinments 	= $this->Doctor_model->get_doctor_fixed_appointments($this->Doctor_model->doctorId);

					$this->Doctor_model->get_doctor_consultation_fee($this->Doctor_model->doctorId);

					$sessionDuration 	= $this->Doctor_model->doctorSessionDuration;

				}

				$response = ['status' => $status, 'token' => $token, 'result' => $result, 'appoinments' => $appoinments, 'sessionDuration' => $sessionDuration, 'message' => HTTP_STATUS_CODES[200]];

				$this->response($response, 200);

			}

		} else {

			$result = array();

			$tokenData = time() . $this->input->post_get('uniqueId');

			$token = AUTHORIZATION::generateToken($tokenData);

			$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

			$response = ['status' => 201, 'token' => $token,  'result' => $result, 'message' => HTTP_STATUS_CODES[460]];

			$this->response($response, 200);

		}

	}

	function requested_appointment_details_get()

	{

		$this->verify_request();

		if ($this->input->post_get('uniqueId') <> '' && $this->input->post_get('appointmentId') <> '') {

			if ($this->input->post_get('loginType') == 2) {

				$result 	= $this->Patient_model->get_requested_appointment_details_patient($this->input->post_get('appointmentId'));

			} else if ($this->input->post_get('loginType') == 1) {

				$result 	= $this->Doctor_model->get_requested_appointment_details_doctor($this->input->post_get('appointmentId'));

			}

			if (!$result) {

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				$result = array();

				$response = ['status' => 201, 'token' => $token, 'result' => $result, 'message' => HTTP_STATUS_CODES[204]];

				$this->response($response, 200);

			} else {

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				$status = 200;

				$appoinments 	= array();

				$sessionDuration  = 0;

				if ($this->input->post_get('loginType') == 1) {

					$this->Doctor_model->appointmentDate = $result['requestDate1'];

					unset($result['requestDate1']);

					

					$this->Patient_model->retrieveTimeOffset();

					$this->Doctor_model->currentTime = $this->Patient_model->currentTime;

					$appoinments 	= $this->Doctor_model->get_doctor_fixed_appointments($this->Doctor_model->doctorId);

					$this->Doctor_model->get_doctor_consultation_fee($this->Doctor_model->doctorId);

					$sessionDuration 	= $this->Doctor_model->doctorSessionDuration;

				}

				$response = ['status' => $status, 'token' => $token, 'result' => $result, 'appoinments' => $appoinments, 'sessionDuration' => $sessionDuration, 'message' => HTTP_STATUS_CODES[200]];

				$this->response($response, 200);

			}

		} else {

			$result = array();

			$tokenData = time() . $this->input->post_get('uniqueId');

			$token = AUTHORIZATION::generateToken($tokenData);

			$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

			$response = ['status' => 201, 'token' => $token,  'result' => $result, 'message' => HTTP_STATUS_CODES[460]];

			$this->response($response, 200);

		}

	}

	function notifications_list_get()

	{

		$this->Patient_model->setPostGetVars();

		$this->verify_request();

		if ($this->input->post_get('uniqueId') <> '') {

			if ($this->input->post_get('loginType') == 2) {

				$result 	= $this->Patient_model->get_notifications_patient($this->Patient_model->patientId);

				if (is_array($result) && count($result) > 0) {

					$i	= 0;

					foreach ($result as $row) {

						$result[$i]['unReadCount']   = $this->Patient_model->get_unread_count_patient($result[$i]['patientId'],$result[$i]['doctorId']);		$i++;	

					}

				}

			} else if ($this->input->post_get('loginType') == 1) {

				$result 	= $this->Doctor_model->get_notifications_doctor($this->Doctor_model->doctorId);

				if (is_array($result) && count($result) > 0) {

					$i	= 0;

					foreach ($result as $row) {

						$result[$i]['unReadCount']   = $this->Doctor_model->get_unread_count_doctor($result[$i]['patientId'],$result[$i]['doctorId']);

					$i++;	

					}

				}

			}

			if (!$result) {

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				$result = array();

				$response = ['status' => 201, 'token' => $token, 'result' => $result, 'message' => 'No notifications yet!'];

				$this->response($response, 200);

			} else {

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				$status = 200;

				$response = ['status' => $status, 'token' => $token, 'result' => $result, 'message' => HTTP_STATUS_CODES[200]];

				$this->response($response, 200);

			}

		} else {

			$result = array();

			$response = ['status' => 201,  'result' => $result, 'message' => HTTP_STATUS_CODES[460]];

			$this->response($response, 200);

		}

	}

	function remove_favourites_post()

	{

		$this->Patient_model->setPostGetVars();

		$this->verify_request();

		if ($this->input->post_get('favouriteId') <> '') {

			$result 	= $this->Patient_model->remove_favourites_patient($this->input->post_get('favouriteId'));

			if (!$result) {

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				$result = array();

				$response = ['status' => 201, 'token' => $token, 'result' => $result, 'message' => HTTP_STATUS_CODES[460]];

				$this->response($response, 200);

			} else {

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				$status = 200;

				$response = ['status' => $status, 'token' => $token, 'result' => $result, 'message' => 'Removed from favorites!'];

				$this->response($response, 200);

			}

		} else {

			$result = array();

			$response = ['status' => 201,  'result' => $result, 'message' => HTTP_STATUS_CODES[460]];

			$this->response($response, 200);

		}

	}

	function prescriptions_list_get()

	{

		$this->Patient_model->setPostGetVars();

		$this->verify_request();

		if ($this->Patient_model->patientId <> '') {

			if ($this->input->post_get('loginType') == 2) {

				$result 	= $this->Patient_model->get_prescriptions_patient($this->Patient_model->patientId);

			} else if ($this->input->post_get('loginType') == 1) {

				$result 	= $this->Doctor_model->get_prescriptions_doctor($this->Patient_model->patientId);

			}

			if (!$result) {

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				$result = array();

				$response = ['status' => 201, 'token' => $token, 'result' => $result, 'message' => 'No prescriptions yet'];

				$this->response($response, 200);

			} else {

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				$status = 200;

				if (is_array($result) && count($result) > 0) {

					$i	= 0;

					foreach ($result as $row) {

						$result[$i]['statusMessage'] = '';

						

						if($result[$i]['status'] == 0)

							$result[$i]['statusMessage'] = 'Prescription Added';

						if($result[$i]['status'] == 1)

							$result[$i]['statusMessage'] = 'On Process';

						else if($result[$i]['status'] == 2)

							$result[$i]['statusMessage'] = 'On Purchase';	

						else if($result[$i]['status'] == 3)

							$result[$i]['statusMessage'] = 'Purchased';	

						else if($result[$i]['status'] == 4 || $result[$i]['status'] == 5)

							$result[$i]['statusMessage'] = 'On Delivery';	

						else if($result[$i]['status'] == 6)

							$result[$i]['statusMessage'] = 'Delivered';	

						$i++;	

					}

				}

				$response = ['status' => $status, 'token' => $token, 'result' => $result, 'message' => HTTP_STATUS_CODES[200]];

				$this->response($response, 200);

			}

		} else {

			$result = array();

			$response = ['status' => 201,  'result' => $result, 'message' => 'No prescriptions yet'];

			$this->response($response, 200);

		}

	}

	function request_medicine_post()

	{

		$this->Patient_model->setPostGetVars();

		$this->verify_request();

		if ($this->Patient_model->prescriptionId <> '') {

			$result 	= $this->Patient_model->request_medicine_patient($this->Patient_model->prescriptionId);

			if (!$result) {

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				$result = array();

				$response = ['status' => 201, 'token' => $token, 'result' => $result, 'message' => HTTP_STATUS_CODES[460]];

				$this->response($response, 200);

			} else {

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				$status = 200;

				$response = ['status' => $status, 'token' => $token, 'result' => $result, 'message' => 'Medicine requested successfully'];

				$this->response($response, 200);

			}

		} else {

			$result = array();

			$response = ['status' => 201,  'result' => $result, 'message' => HTTP_STATUS_CODES[460]];

			$this->response($response, 200);

		}

	}



	function add_medicine_payment_post()

	{

		$this->Patient_model->setPostGetVars();

		$this->verify_request();

		if ($this->Patient_model->prescriptionId == '') {

			$tokenData = time() . $this->input->post_get('uniqueId');

			$token = AUTHORIZATION::generateToken($tokenData);

			$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

			$result = array();

			$response = ['status' => 201, 'token' => $token, 'result' => $result, 'message' => HTTP_STATUS_CODES[460]];

			$this->response($response, 200);

		} else {

			$result = $this->Patient_model->add_payment_medicine_patient($this->Patient_model->prescriptionId);

			if (!$result) {

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				$result = array();

				$response = ['status' => 201, 'token' => $token, 'result' => $result,  'message' => 'Payment amount is not added by administrator!'];

				$this->response($response, 200);

			} else {

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				$status = 200;

				$response = ['status' => $status, 'token' => $token, 'result' => $result, 'paymentId' => $this->Patient_model->paymentId, 'paymentAmount' => $this->Patient_model->paymentAmount, 'order_id' => $this->Patient_model->order_id, 'message' => 'Be patient!.. redirecting to the payment gateway page!'];

				$this->response($response, 200);

			}

		}

	}



	function request_session_post()

	{

		$this->Patient_model->setPostGetVars();

		$this->verify_request();

		if ($this->Patient_model->patientId == '' || $this->Patient_model->doctorId == '') {

			$tokenData = time() . $this->input->post_get('uniqueId');

			$token = AUTHORIZATION::generateToken($tokenData);

			$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

			$result = array();

			$response = ['status' => 201, 'token' => $token, 'result' => $result, 'message' => HTTP_STATUS_CODES[460]];

			$this->response($response, 200);

		} else {

			$result = $this->Patient_model->request_session_patient();

			if (!$result) {

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				$result = array();

				$response = ['status' => 201, 'token' => $token, 'result' => $result,  'message' => HTTP_STATUS_CODES[400]];

				$this->response($response, 200);

			} else {

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				$status = 200;

				$response = ['status' => $status, 'token' => $token, 'result' => $result,  'message' => 'Session requested successfully'];

				$this->response($response, 200);

			}

		}

	}

	function dashboard_doctor_get()

	{

		$this->Doctor_model->setPostGetVars();

		$this->verify_request();

		if ($this->Doctor_model->doctorId <> '') {

			$result = $this->Doctor_model->get_doctor_id($this->Doctor_model->doctorId);

			if (!$result) {

				$result = array();

				$response = ['status' => 201,  'result' => $result, 'message' => HTTP_STATUS_CODES[204]];

				$this->response($response, 200);

			} else {

				$status = 200;

				if ($result['doctorImageUrl'] <> '' && file_exists(AXUPLOADDOCTORIMAGEPATH . $result['doctorImageUrl'])!== null ) {
				// if ($result['doctorImageUrl'] <> '' && file_exists('../uploads/doctors/' . $result['doctorImageUrl'])) {

					$result['doctorImageUrl'] =  AXUPLOADDOCTORIMAGEPATH . $result['doctorImageUrl'];

				} else {

					$result['doctorImageUrl'] = AXUPLOADPATH . 'no_image.png';

				}

				$rating =  array();

				$num_of_rating = 0;

				$overall_rating = 0;

				if ($result['doctorId'] <> '') {

					$num_of_rating = $this->Rating_model->get_rating_count($result['doctorId']);

					if ($num_of_rating <> 0) {

						$total_rating = $this->Rating_model->get_total_rating($result['doctorId']);

						$overall_rating =  ($total_rating / $num_of_rating);

					}

				}

				$result['overall_rating'] 	= number_format((float)$overall_rating, 2);

				$this->Doctor_model->status = 1;

				$this->Patient_model->retrieveTimeOffset();

				$this->Doctor_model->currentTime = $this->Patient_model->currentTime;

				$fixed_appointments = array();

				$fixed_appointments = $this->Doctor_model->get_doctor_fixed_appointments($this->Doctor_model->doctorId);

				$result['num_appointments']  = $this->Doctor_model->get_doctor_completed_appointments_count($this->Doctor_model->doctorId, 0);

				$result['num_patients']  	= $this->Doctor_model->get_doctor_completed_appointments_count($this->Doctor_model->doctorId, 1);

				$result['total_payment']  	= $this->Doctor_model->get_total_payment_doctor($this->Doctor_model->doctorId);

				$result['total_payment'] 	= round($result['total_payment'],2);

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				if(count($fixed_appointments) == 0){

					$message = 'No upcoming appintments';	

				}else{

					$message = '';		

				}

				$response = ['status' => $status, 'token' => $token, 'result' => array(), 'doctorUniqueId'  => $result['doctorUniqueId'], 'doctorName'  => $result['doctorName'], 'doctorEmail'  => $result['doctorEmail'], 'doctorMobile'  => $result['doctorMobile'], 'qualification'  => $result['qualification'], 'qualification1'  => $result['qualification1'], 'doctorImageUrl'  => $result['doctorImageUrl'], 'experience'  => $result['experience'], 'knownLanguages'  => $result['knownLanguages'], 'specialization'  => $result['specialization'], 'specialityId'  => $result['specialityId'], 'doctorSessionDuration'  => $result['doctorSessionDuration'], 'youtubeLink'  => $result['youtubeLink'], 'doctorAddress'  => $result['doctorAddress'], 'communicationMode'  => $result['communicationMode'], 'medicalRegistrationNumber'  => $result['medicalRegistrationNumber'], 'overall_rating'  => $result['overall_rating'], 'num_appointments'  => $result['num_appointments'], 'num_patients'  => $result['num_patients'], 'total_payment'  => $result['total_payment'], 'fixed_appointments' => $fixed_appointments, 'message' => $message];

				$this->response($response, 200);

			}

		} else {

			$tokenData = time() . $this->input->post_get('uniqueId');

			$token = AUTHORIZATION::generateToken($tokenData);

			$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

			$result = array();

			$response = ['status' => 201, 'token' => $token, 'result' => $result, 'message' => HTTP_STATUS_CODES[460]];

			$this->response($response, 200);

		}

	}

	// For getting the privacy policy stored in the echo system for the app. 

	// Response  : privacy policy statement		

	function privacypolicy_get()

	{

		$this->Cms_model->setPostGetVars();

		$result = $this->Cms_model->get_cms_id(1);

		if (!$result) {

			$result = array();

			$response = ['status' => 201,  'result' => $result, 'message' => HTTP_STATUS_CODES[204]];

			$this->response($response, 200);

		} else {

			$status = 200;

			$response = ['status' => $status,  'result' => $result, 'message' => HTTP_STATUS_CODES[200]];

			$this->response($response, 200);

		}

	}

	function faq_get()

	{

		$this->Cms_model->setPostGetVars();

		$result = $this->Cms_model->get_cms_id(2);

		if (!$result) {

			$result = array();

			$response = ['status' => 201,  'result' => $result, 'message' => HTTP_STATUS_CODES[204]];

			$this->response($response, 200);

		} else {

			$status = 200;

			$ads	= array();

			$response = ['status' => $status,  'result' => $result, 'message' => HTTP_STATUS_CODES[200]];

			$this->response($response, 200);

		}

	}
	function helpfultips_get()

	{

		$this->Cms_model->setPostGetVars();

		$result = $this->Cms_model->get_cms_id(3);

		if (!$result) {

			$result = array();

			$response = ['status' => 201,  'result' => $result, 'message' => HTTP_STATUS_CODES[204]];

			$this->response($response, 200);

		} else {

			$status = 200;

			$response = ['status' => $status,  'result' => $result, 'message' => HTTP_STATUS_CODES[200]];

			$this->response($response, 200);

		}

	}

function termsandconditions_get()

	{

		$this->Cms_model->setPostGetVars();

		$result = $this->Cms_model->get_cms_id(4);

		if (!$result) {

			$result = array();

			$response = ['status' => 201,  'result' => $result, 'message' => HTTP_STATUS_CODES[204]];

			$this->response($response, 200);

		} else {

			$status = 200;

			$response = ['status' => $status,  'result' => $result, 'message' => HTTP_STATUS_CODES[200]];

			$this->response($response, 200);

		}

	}
	// Functionality: To report an issue

	// Arguments 	: member id,appModuleId,reportIssueTitle

	// Response		: if the mandatory fields is empty return status = 460 (INCOMPLETE INFORMATION), and add report an issue to system and return status = 200(SUCCESS)		

	function report_an_issue_post()

	{

		$this->ReportIssue_model->setPostGetVars();

		$this->verify_request();

		if (!$this->ReportIssue_model->validate_reportIssue()) {

			$tokenData = time() . $this->input->post_get('uniqueId');

			$token = AUTHORIZATION::generateToken($tokenData);

			$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

			$result = array();

			$response = ['status' => 201, 'token' => $token, 'result' => $result, 'message' => HTTP_STATUS_CODES[460]];

			$this->response($response, 200);

		} else {

			$result = $this->ReportIssue_model->set_reportIssue();

			if (!$result) {

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				$result = array();

				$response = ['status' => 201, 'token' => $token, 'result' => $result,  'message' => HTTP_STATUS_CODES[460]];

				$this->response($response, 200);

			} else {

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				$status = 200;

				$response = ['status' => $status, 'token' => $token, 'result' => $result,  'message' => 'Thanks for your frankness! The issue has been reported.'];

				$this->response($response, 200);

			}

		}

	}

	// Get doctor available sessions

	function doctor_sessions_get()

	{

		$this->Patient_model->setPostGetVars();

		$this->Doctor_model->setPostGetVars();

		$this->verify_request();

		if ($this->Doctor_model->doctorId <> '') {

			$this->Doctor_model->status = 1;

			$result = $this->Doctor_model->get_doctor_sessions($this->Doctor_model->doctorId);

			$doctor_item = $this->Doctor_model->get_doctor_id($this->Doctor_model->doctorId);

			if (!$result) {

				$result = array();

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				$response = ['status' => 201, 'token' => $token,  'result' => $result, 'message' => HTTP_STATUS_CODES[204]];

				$this->response($response, 200);

			} else {

				$status = 200;

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				if ($doctor_item)

					$doctorSessionDuration = $doctor_item['doctorSessionDuration'];

				else

					$doctorSessionDuration = 0;

				$response = ['status' => $status, 'token' => $token, 'result' => $result, 'doctorSessionDuration' => $doctorSessionDuration, 'message' => HTTP_STATUS_CODES[200]];

				$this->response($response, 200);

			}

		} else {

			$result = array();

			$response = ['status' => 201, 'result' => $result, 'message' => HTTP_STATUS_CODES[460]];

			$this->response($response, 200);

		}

	}

	function update_fcm_token_post()

	{

		$this->Patient_model->setPostGetVars();

		$this->verify_request();

		if ($this->input->post_get('uniqueId') == '' || $this->input->post_get('loginType') == '' || $this->input->post_get('fcmToken') == '') 		{

			$tokenData = time() . $this->input->post_get('uniqueId');

			$token = AUTHORIZATION::generateToken($tokenData);

			$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

			$result = array();

			$response = ['status' => 201, 'token' => $token, 'result' => $result, 'message' => HTTP_STATUS_CODES[460]];

			$this->response($response, 200);

		} else {

			if ($this->input->post_get('loginType') == 1)

				$result = $this->Doctor_model->update_fcm_token_doctor($this->input->post_get('uniqueId'));

			else  if ($this->input->post_get('loginType') == 2)

				$result = $this->Patient_model->update_fcm_token_patient($this->input->post_get('uniqueId'));

			if (!$result) {

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				$result = array();

				$response = ['status' => 201, 'token' => $token, 'result' => $result,  'message' => HTTP_STATUS_CODES[460]];

				$this->response($response, 200);

			} else {

				if ($this->input->post_get('loginType') == 1)

					$result = $this->Signup_model->get_doctor($this->input->post_get('uniqueId'));

				else  if ($this->input->post_get('loginType') == 2)

					$result = $this->Signup_model->get_patient($this->input->post_get('uniqueId'));

				if (!$result) {

					$tokenData = time() . $this->input->post_get('uniqueId');

					$token = AUTHORIZATION::generateToken($tokenData);

					$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

					$result = array();

					$response = ['status' => 201, 'token' => $token, 'result' => $result,  'message' => HTTP_STATUS_CODES[460]];

					$this->response($response, 200);

				} else {

					$tokenData = time() . $this->input->post_get('uniqueId');

					$token = AUTHORIZATION::generateToken($tokenData);

					$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

					if ($this->Signup_model->loginType == 1) {

						if ($result['doctorImageUrl'] <> '' && file_exists(AXUPLOADDOCTORIMAGEPATH. $result['doctorImageUrl'])!== null )
						// if ($result['doctorImageUrl'] <> '' && file_exists('../uploads/doctors/' . $result['doctorImageUrl']))

							$result['imageUrl'] =  AXUPLOADDOCTORIMAGEPATH . $result['doctorImageUrl'];

						else

							$result['imageUrl'] = AXUPLOADPATH . 'no_image.png';

						$uniqueId 			=  $result["uniqueId"];

						$clientName 		=  $result["doctorName"];

						$clientEmail 		=  $result["doctorEmail"];

						$clientMobile 		=  $result["doctorMobile"];

						$youtubeLink		=  $result["youtubeLink"];

						$loginType			=  $this->Signup_model->loginType;

						$imageUrl 			=  $result["imageUrl"];

						$fcmToken			=  $result["fcmToken"];

					} else if ($this->Signup_model->loginType == 2) {

						if ($result['profileImgUrl'] <> '' && file_exists(AXUPLOADPATIENTIMAGEPATH . $result['profileImgUrl'])!== null )
						// if ($result['profileImgUrl'] <> '' && file_exists('../uploads/patients/' . $result['profileImgUrl']))

							$result['imageUrl'] =  AXUPLOADPATIENTIMAGEPATH . $result['profileImgUrl'];

						else

							$result['imageUrl'] = AXUPLOADPATH . 'no_image.png';

						$uniqueId 			=  $result["uniqueId"];

						$clientName 		=  $result["patientName"];

						$clientEmail 		=  $result["patientEmail"];

						$clientMobile 		=  $result["patientMobile"];

						$youtubeLink 		= '';

						$loginType			=  $this->Signup_model->loginType;

						$imageUrl 			=  $result["imageUrl"];

						$fcmToken			=  $result["fcmToken"];

					}

					$status = 200;

					$response = ['status' => $status, 'token' => $token, 'uniqueId' => $uniqueId, 'clientName' => $clientName, 'clientEmail' => $clientEmail, 'clientMobile' => $clientMobile, 'loginType' => $loginType, 'imageUrl' => $imageUrl, 'youtubeLink' => $youtubeLink, 'fcmToken' => $fcmToken, 'message' => ''];

					$this->response($response, 200);

				}

			}

		}

	}

	function end_communication_post()

	{

		$this->Patient_model->setPostGetVars();

		$this->verify_request();

		if($this->input->post_get('type') == 5){

			if ($this->input->post_get('recieverUniqueId') == '' || $this->input->post_get('recieverLoginType') == '' || $this->input->post_get('type') == '') {
	
				$tokenData = time() . $this->input->post_get('uniqueId');
	
				$token = AUTHORIZATION::generateToken($tokenData);
	
				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);
	
				$result = array();
	
				$response = ['status' => 201, 'token' => $token, 'result' => $result, 'message' => HTTP_STATUS_CODES[460]];
	
				$this->response($response, 200);
	
			} else {
	
				$to = '';
	
				if ($this->input->post_get('recieverLoginType') == 1) {
	
					$doctorId 	= $this->Doctor_model->get_doctor_id_by_uniqueId(trim($this->input->post_get('recieverUniqueId')));
	
					$this->Patient_model->get_doctor_fcm_token($doctorId);
	
					$to 		= $this->Patient_model->fcmToken;
	
					$result 	= $this->Patient_model->sendEndFCM($to);
	
					$this->Patient_model->update_available_status($doctorId, 0);
	
				} else if ($this->input->post_get('recieverLoginType') == 2) {
	
					$patientId 	= $this->Patient_model->get_patient_id_by_uniqueId(trim($this->input->post_get('recieverUniqueId')));
	
					$to 		= $this->Patient_model->get_patient_fcm_token($patientId);   // Commented  by Dileep july 13 2020
	
					//$this->Patient_model->get_patient_fcm_token_new($patientId);   // Added  by Dileep july 13 2020

	

					

	

					//$to 		= $this->Patient_model->fcmToken;                  // Added  by Dileep july 13 2020
	
					$result 	= $this->Patient_model->sendEndFCM($to);
	
					$doctorId 	= $this->Doctor_model->get_doctor_id_by_uniqueId(trim($this->input->post_get('uniqueId')));
	
					$this->Patient_model->update_available_status($doctorId, 0);
	
				}
	
				if (!$result) {
	
					$tokenData = time() . $this->input->post_get('uniqueId');
	
					$token = AUTHORIZATION::generateToken($tokenData);
	
					$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);
	
					$result = array();
	
					$response = ['status' => 201, 'token' => $token, 'result' => $result,  'message' => HTTP_STATUS_CODES[400]];
	
					$this->response($response, 200);
	
				} else {
	
					// $this->Patient_model->end_communication_log_patient($this->Patient_model->patientRecordId);
	
					$tokenData = time() . $this->input->post_get('uniqueId');
	
					$token = AUTHORIZATION::generateToken($tokenData);
	
					$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);
	
					$status = 200;
	
					$response = ['status' => $status, 'token' => $token, 'result' => $result, 'appointmentId' => $this->Patient_model->appointmentId, 'to' => $to, 'doctorDeviceOS' => $this->Patient_model->doctorDeviceOS, 'patientDeviceOS' => $this->Patient_model->patientDeviceOS, 'type' => $this->input->post_get('type'),  'message' => ''];
	
					$this->response($response, 200);
	
				}
	
			}

		}else{
			// $doctorId 	= $this->Doctor_model->get_doctor_id_by_uniqueId(trim($this->input->post_get('recieverUniqueId')));
			// $this->Patient_model->update_available_status($doctorId, 0);


			$status = 200;

	

			$response = ['status' => $status, 'token' => '', 'result' => '', 'appointmentId' => '', 'to' => '', 'doctorDeviceOS' => '', 'patientDeviceOS' => '', 'type' => $this->input->post_get('type'),  'message' => ''];

			$this->response($response, 200);

		}

	}

	

	

	function end_chat_post()

	{

		$this->Patient_model->setPostGetVars();

		$this->verify_request();

		if ($this->input->post_get('recieverUniqueId') == '' || $this->input->post_get('recieverLoginType') == '' || $this->input->post_get('type') == '') {

			$tokenData = time() . $this->input->post_get('uniqueId');

			$token = AUTHORIZATION::generateToken($tokenData);

			$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

			$result = array();

			$response = ['status' => 201, 'token' => $token, 'result' => $result, 'message' => HTTP_STATUS_CODES[460]];

			$this->response($response, 200);

		} else {

			$to = '';

			if ($this->input->post_get('recieverLoginType') == 1) {

				$doctorId 	= $this->Doctor_model->get_doctor_id_by_uniqueId(trim($this->input->post_get('recieverUniqueId')));

				$this->Patient_model->get_doctor_fcm_token($doctorId);

				$to 		= $this->Patient_model->fcmToken;

				$result 	= $this->Patient_model->sendEndChatFCM($this->Patient_model->patientRecordId,$to);

				//$this->Patient_model->update_available_status($doctorId, 0);

			} else if ($this->input->post_get('recieverLoginType') == 2) {

				$patientId 	= $this->Patient_model->get_patient_id_by_uniqueId(trim($this->input->post_get('recieverUniqueId')));

				$to 		= $this->Patient_model->get_patient_fcm_token($patientId);

				$result 	= $this->Patient_model->sendEndChatFCM($this->Patient_model->patientRecordId,$to);

				$doctorId 	= $this->Doctor_model->get_doctor_id_by_uniqueId(trim($this->input->post_get('uniqueId')));

				//$this->Patient_model->update_available_status($doctorId, 0);

			}

			if (!$result) {

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				$result = array();

				$response = ['status' => 201, 'token' => $token, 'result' => $result,  'message' => HTTP_STATUS_CODES[400]];

				$this->response($response, 200);

			} else {

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				$status = 200;

				$doctorUniqueId 	= '';

				$patientUniqueId 	= '';

				if ($this->input->post_get('recieverLoginType') == 1) {

					

					$doctorUniqueId = $this->input->post_get('recieverUniqueId');

					

				}else if ($this->input->post_get('recieverLoginType') == 2) {

					

					$patientUniqueId = $this->input->post_get('recieverUniqueId');

					

				}

				if ($this->input->post_get('loginType') == 1) {

					

					$doctorUniqueId = $this->input->post_get('uniqueId');

					

				}else if ($this->input->post_get('loginType') == 2) {

					

					$patientUniqueId = $this->input->post_get('uniqueId');

					

				}

				$response = ['status' => $status, 'token' => $token, 'result' => $result, 'to' => $to, 'type' => $this->input->post_get('type'), 'senderUniqueId' => $this->input->post_get('uniqueId'), 'recieverUniqueId' => $this->input->post_get('recieverUniqueId'), 'doctorUniqueId' => $doctorUniqueId, 'patientUniqueId' => $patientUniqueId,  'message' => ''];

				$this->response($response, 200);

			}

		}

	}

	

	function logout_post()

	{

		$this->Doctor_model->setPostGetVars();

		$this->verify_request();

		if ($this->input->post_get('uniqueId') <> '') {

			if ($this->input->post_get('loginType') == 1) {

				$result = $this->Signup_model->logout_doctor($this->input->post_get('uniqueId'));

			}else if ($this->input->post_get('loginType') == 2) {

				$result = $this->Signup_model->logout_patient($this->input->post_get('uniqueId'));

			}

			if (!$result) {

				$result = array();

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				$response = ['status' => 201, 'token' => $token,  'result' => $result, 'message' => HTTP_STATUS_CODES[204]];

				$this->response($response, 200);

			} else {

				$status = 200;

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				$response = ['status' => $status, 'token' => $token, 'result' => array(), 'message' => 'Logout successfully !!!'];

				$this->response($response, 200);

			}

		} else {

			$tokenData = time() . $this->input->post_get('uniqueId');

			$token = AUTHORIZATION::generateToken($tokenData);

			$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

			$result = array();

			$response = ['status' => 201, 'token' => $token, 'result' => $result, 'message' => HTTP_STATUS_CODES[460]];

			$this->response($response, 200);

		}

	}

	// Functionality: To get the paient list / doctor list for chat

	// Arguments 	: loginType device registration id,unique id

	// Response		: if the member id is empty return status = 460 (INCOMPLETE INFORMATION), otherwise check the token is valid , if the token is valid  return 1 , otherwise return status = 401 (UNAUTHORIZED)	

	function chat_list_get()

	{

		$this->verify_request();

		$result = array();

		if ($this->input->post_get('loginType') == 1) {

				$this->Doctor_model->doctorId = $this->Doctor_model->get_doctor_id_by_uniqueId(trim($this->input->post_get('uniqueId')));

				 // get doctor id from unique id

				$result = $this->Doctor_model->get_chat_patient_list($this->Doctor_model->doctorId); // To get patient list from communication log for the doctor

				if (is_array($result) && count($result) > 0) {

					$i	= 0;

					foreach ($result as $row) {

						$result[$i]['unReadCount']   = $this->Doctor_model->get_unread_count_doctor($result[$i]['patientId'],$result[$i]['doctorId']);		

						$i++;	

					}

				}

		} else if ($this->input->post_get('loginType') == 2) {

				$this->Patient_model->patientId = $this->Patient_model->get_patient_id_by_uniqueId(trim($this->input->post_get('uniqueId')));	 				// get patient id from unique id

				$result = $this->Patient_model->get_chat_doctors_list($this->Patient_model->patientId); // To get patient list from communication log for the doctor

				if (is_array($result) && count($result) > 0) {

					$i	= 0;

					foreach ($result as $row) {

						$result[$i]['unReadCount']   = $this->Patient_model->get_unread_count_patient($result[$i]['patientId'],$result[$i]['doctorId']);			

						$i++;

					}

				}

		}

		if (!$result) {

			$result = array();

			$tokenData = time() . $this->input->post_get('uniqueId');

			$token = AUTHORIZATION::generateToken($tokenData);

			$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

			$response = ['status' => 201, 'token' => $token,  'result' => $result, 'message' => 'No chats yet!'];

			$this->response($response, 200);

		} else {

			$status = 200;

			$tokenData = time() . $this->input->post_get('uniqueId');

			$token = AUTHORIZATION::generateToken($tokenData);

			$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

			$response = ['status' => $status, 'token' => $token,  'result' => $result, 'message' => HTTP_STATUS_CODES[200]];

			$this->response($response, 200);

		}

	}

	// To get the details of the prscription

	function prescription_details_get()

	{

		$this->Patient_model->setPostGetVars();

		$this->verify_request();

		if ($this->Patient_model->prescriptionId <> '') {

			$result 	= $this->Patient_model->get_prescriptions_deatils($this->Patient_model->prescriptionId);

			if (!$result) {

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				$result = array();

				$response = ['status' => 201, 'token' => $token, 'result' => $result, 'message' => HTTP_STATUS_CODES[204]];

				$this->response($response, 200);

			} else {

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				$status = 200;

				$result['statusMessage'] = '';

				if($result['status'] == 0)

					$result['statusMessage'] = 'Prescription Added';

				if($result['status'] == 1)

					$result['statusMessage'] = 'On Process';

				else if($result['status'] == 2)

					$result['statusMessage'] = 'On Purchase';	

				else if($result['status'] == 3)

					$result['statusMessage'] = 'Purchased';	

				else if($result['status'] == 4 || $result['status'] == 5)

					$result['statusMessage'] = 'On Delivery';	

				else if($result['status'] == 6)

					$result['statusMessage'] = 'Delivered';		

					

				if($result['specialization'] <> ''){

					

					$arrSpecialization	 = array();

					$arrSpecialization	 = explode(',',$result['specialization']);

					$specialization = '';

					for($i=0;$i<count($arrSpecialization);$i++){

						if($specialization == '')

							$specialization = $this->Doctor_model->get_specialization_name($arrSpecialization[$i]);

						else	

							$specialization .= ','.$this->Doctor_model->get_specialization_name($arrSpecialization[$i]);

					}

					if($specialization <> '')		

						$result['specialization'] = $specialization;

				}			

				$response = ['status' => $status, 'token' => $token, 'result' => $result, 'message' => HTTP_STATUS_CODES[200]];

				$this->response($response, 200);

			}

		} else {

			$result = array();

			$response = ['status' => 201,  'result' => $result, 'message' => HTTP_STATUS_CODES[460]];

			$this->response($response, 200);

		}

	}

	// Functionality: To verify the tokan passed by the member device

	// Arguments 	: member id, device registration id

	// Response		: if the member id is empty return status = 460 (INCOMPLETE INFORMATION), otherwise check the token is valid , if the token is valid  return 1 , otherwise return status = 401 (UNAUTHORIZED)			

	private function verify_request()

	{

		$this->validate_request();

		if ($this->tokenPass == 0) // To exclude token checking

			return 1;

		// Get all the headers

		$headers = $this->input->request_headers();

		// Extract the token

		$token = $headers['Authorization'];

		// Use try-catch

		// JWT library throws exception if the token is not valid

		try {

			// Validate the token

			// Successfull validation will return the decoded user data else returns false

			$data = AUTHORIZATION::validateToken($token);

			if ($data === false) {

				$status = 401;

				$result = array();

				$response = ['status' => $status,  'result' => $result, 'message' => HTTP_STATUS_CODES[401]];

				$this->response($response, 401);

				exit();

			} else {

				$isValidTokenDB = $this->Login_model->validate_api_token_members($this->input->post_get('uniqueId'), $token); // To check the passed token is valid for the member and device 

				if (!$isValidTokenDB) {

					$status = 401;

					$result = array();

					$response = ['status' => $status,  'result' => $result, 'message' => HTTP_STATUS_CODES[401]];

					$this->response($response, 401);

					exit();

				} else {

					return 1;

				}

			}

		} catch (Exception $e) {

			// Token is invalid

			// Send the unathorized access message

			$status = 401;

			$result = array();

			$response = ['status' => $status,  'result' => $result, 'message' => HTTP_STATUS_CODES[401]];

			$this->response($response, 401);

		}

	}

	// Functionality: To verify the token passed by the member device

	// Arguments 	: member id, device registration id

	// Response		: if the member id  or device registration id is empty return status = 460 (INCOMPLETE INFORMATION), otherwise check the token is valid , if the token is valid  return 1 , otherwise return status = 401 (UNAUTHORIZED)			

	private function validate_request()

	{

		if ($this->input->post_get('uniqueId') == '' || $this->input->post_get('deviceRegistrationId') == '' || $this->input->post_get('loginType') == '') {

			$status = 460;

			$result = array();

			$response = ['status' => $status,  'result' => $result, 'message' => HTTP_STATUS_CODES[460]];

			$this->response($response, 401);

		} else if ($this->input->post_get('uniqueId') <> '') {

			if ($this->input->post_get('loginType') == 1) {

				$this->Doctor_model->doctorId 	= $this->Doctor_model->get_doctor_id_by_uniqueId(trim($this->input->post_get('uniqueId'))); // Decrypting the member id for further use 

				$this->Rating_model->doctorId   = $this->Doctor_model->doctorId;

				$this->Patient_model->doctorId   = $this->Doctor_model->doctorId;

				$this->Package_model->doctorId   = $this->Doctor_model->doctorId;

				/*if($this->input->post_get('patientId') <> ''){

					$this->Patient_model->patientId 	= $this->Doctor_model->get_patient_id_by_uniqueId(trim($this->input->post_get('patientId')));

					$this->Rating_model->patientId 		= $this->Doctor_model->get_patient_id_by_uniqueId(trim($this->input->post_get('patientId')));

				}*/

			} else if ($this->input->post_get('loginType') == 2) {

				$this->Patient_model->patientId = $this->Patient_model->get_patient_id_by_uniqueId(trim($this->input->post_get('uniqueId')));

				$this->Rating_model->patientId   = $this->Patient_model->patientId;

				$this->ReportIssue_model->patientId   = $this->Patient_model->patientId;

				/*if($this->input->post_get('doctorId') <> ''){

					$this->Patient_model->doctorId 	= $this->Doctor_model->get_doctor_id_by_uniqueId(trim($this->input->post_get('doctorId')));

					$this->Rating_model->doctorId 	= $this->Doctor_model->get_doctor_id_by_uniqueId(trim($this->input->post_get('doctorId')));

				}*/

			}

		}

	}

	function sent_admin_notification_about_otp_post()

	{

		$this->Patient_model->setPostGetVars();

		if ($this->Patient_model->patientMobile == '') {

			$result = array();

			$errorMessage	= HTTP_STATUS_CODES[460];

			if ($this->Patient_model->patientMobile == '')

				$errorMessage	= $errorMessage . ' ' . ' Mobile,';

			$response = ['status' => 201, 'result' => $result, 'message' => $errorMessage];

			$this->response($response, 200);

		}else {

			$result = $this->Patient_model->send_otp_notification_email_admin($this->Patient_model->patientMobile);

			if (!$result) {

				$result = array();

				if ($this->Patient_model->errorMessage <> '') {

					$errorMessage	=	HTTP_STATUS_CODES[$this->Patient_model->errorMessage];

				} else {

					$errorMessage	= 'Good to go!';

				}

				$response = ['status' => 201,  'result' => $result, 'message' => $errorMessage];

				$this->response($response, 200);

			} else {

				$result = array();

				$response = ['status' => 200,  'result' => $result, 'message' => HTTP_STATUS_CODES[200]];

				$this->response($response, 200);

			}

		}

	}

	

	

	// For i phone testing

	

	function add_communication_log_get()

	{

		$this->Patient_model->setPostGetVars();

		$this->verify_request();

		if ($this->input->post_get('loginType') == 1) {

			$this->Patient_model->doctorId 	= $this->Doctor_model->get_doctor_id_by_uniqueId(trim($this->input->post_get('uniqueId')));

			if($this->Patient_model->communicationMode == 3){

				$this->Patient_model->patientId = $this->Patient_model->get_patient_id_by_uniqueId(trim($this->input->post_get('patientId')));

			}

		} else if ($this->input->post_get('loginType') == 2) {

			$this->Patient_model->patientId = $this->Patient_model->get_patient_id_by_uniqueId(trim($this->input->post_get('uniqueId')));

			if($this->Patient_model->communicationMode == 3){

				$this->Patient_model->doctorId =  $this->Doctor_model->get_doctor_id_by_uniqueId(trim($this->input->post_get('doctorId')));

			}

		}

		if ($this->Patient_model->patientId == '' || $this->Patient_model->doctorId == '' || $this->Patient_model->communicationMode == '' || $this->Patient_model->communicationStartTime == '') {

			$tokenData = time() . $this->input->post_get('uniqueId');

			$token = AUTHORIZATION::generateToken($tokenData);

			$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

			$result = array();

			$response = ['status' => 201, 'token' => $token, 'result' => $result, 'message' => HTTP_STATUS_CODES[460]];

			$this->response($response, 200);

		} else {

			if(!ctype_digit(trim($this->Patient_model->patientId))){

				$this->Patient_model->patientId = $this->Patient_model->get_patient_id_by_uniqueId(trim($this->input->post_get('patientId')));

			}

			 

			 if(!ctype_digit(trim($this->Patient_model->doctorId))){

				$this->Patient_model->doctorId = $this->Patient_model->get_doctor_id_by_uniqueId(trim($this->input->post_get('doctorId')));

			}

			$result = $this->Patient_model->sendFCMTest($this->Patient_model->patientId, $this->Patient_model->doctorId);

			if (!$result) {

				$doctorId =  $this->Doctor_model->get_doctor_id_by_uniqueId(trim($this->input->post_get('doctorId')));
				$this->Patient_model->update_available_status($doctorId, 0);


				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				$result = array();

				$errorMessage = HTTP_STATUS_CODES[460];

				$response = ['status' => 201, 'token' => $token, 'result' => $result,  'message' => $errorMessage];

				$this->response($response, 200);

			} else {
				$doctorId =  $this->Doctor_model->get_doctor_id_by_uniqueId(trim($this->input->post_get('doctorId')));
				$this->Patient_model->update_available_status($doctorId, 0);

				$tokenData = time() . $this->input->post_get('uniqueId');

				$token = AUTHORIZATION::generateToken($tokenData);

				$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

				$status = 200;

				$response = ['status' => $status, 'token' => $token, 'result' => $result, 'patientRecordId' => $this->Patient_model->patientRecordId,  'message' => HTTP_STATUS_CODES[200]];

				$this->response($response, 200);

			}

		}

	}

	
	function check_appointment_validity_post()
	{

		$this->Patient_model->setPostGetVars();

		$this->verify_request();
        
        if(!ctype_digit(trim($this->input->post_get('uniqueId')))){

            $this->Patient_model->patientId = $this->Patient_model->get_patient_id_by_uniqueId(trim($this->input->post_get('uniqueId')));

        }

        if(!ctype_digit(trim($this->input->post_get('doctorId')))){

            $this->Patient_model->doctorId = $this->Doctor_model->get_doctor_id_by_uniqueId(trim($this->input->post_get('doctorId')));

        }

		if ($this->Patient_model->patientId == '' || $this->Patient_model->doctorId == '' || $this->Patient_model->communicationDate == '' || $this->Patient_model->communicationStartTime == '' || $this->Patient_model->appointmentId == '') {

			$tokenData = time() . $this->input->post_get('uniqueId');

			$token = AUTHORIZATION::generateToken($tokenData);

			$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

			$result = array();

			$response = ['status' => 201, 'token' => $token, 'result' => $result, 'message' => HTTP_STATUS_CODES[460]];

			$this->response($response, 200);

		} else {
        
        	if($this->input->post_get('communicationDate') <> '')

                $this->Patient_model->communicationDate = date('Y-m-d',strtotime($this->input->post_get('communicationDate')));
    
            else
    
                $this->Patient_model->communicationDate = date('Y-m-d');
    
            $result = $this->Patient_model->check_appointment_validity($this->Patient_model->patientId,$this->Patient_model->doctorId,$this->Patient_model->appointmentId); 

            if (!$result) {

                $tokenData = time() . $this->input->post_get('uniqueId');

                $token = AUTHORIZATION::generateToken($tokenData);

                $this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

                $result = array();

                $response = ['status' => 201, 'token' => $token, 'result' => $result,  'message' => 'Please make a call at your appointment time!'];

                $this->response($response, 200);


            } else {

                $tokenData = time() . $this->input->post_get('uniqueId');

                $token = AUTHORIZATION::generateToken($tokenData);

                $this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

                $status = 200;

                $response = ['status' => $status, 'token' => $token, 'result' => $result,  'message' => HTTP_STATUS_CODES[200]];

                $this->response($response, 200);

            }
		}

	}
	// =========================================================
	

	function check_availability_by_date_get()
	{
		$this->Patient_model->setPostGetVars();

		$this->verify_request();

		$result = array();
		
		//$result 	= $this->Doctor_model->get_doctor_sessions( $this->Patient_model->doctorId);
		$result=$this->Doctor_model->get_doctor_sessions_by_day($this->Patient_model->doctorId,date('l', strtotime($this->Patient_model->requestDate)));


		if (!$result) {

			$result = array();

			$tokenData = time() . $this->input->post_get('uniqueId');

			$token = AUTHORIZATION::generateToken($tokenData);

			$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

			$response = ['status' => 201, 'token' => $token,  'result' => $result, 'message' => 'No availabilty found'];

			$this->response($response, 200);

		} else {

			$status = 200;

			$tokenData = time() . $this->input->post_get('uniqueId');

			$token = AUTHORIZATION::generateToken($tokenData);

			$this->Login_model->add_api_token_members($this->input->post_get('uniqueId'), $token);

			$i=0;
			foreach ($result as $row) {
				//$result[$i]
				$result[$i]['availabilty']=1;

				$checkavaile=$this->Doctor_model->get_doctor_appointment_by_date($this->Patient_model->doctorId,$this->Patient_model->requestDate,$result[$i]['availableStartTime'],$result[$i]['availableEndTime']);


				if($checkavaile!=1)
				{
					$result[$i]['availabilty']=0;
				}

				
				if(date("Y-m-d")==date("Y-m-d",strtotime($this->Patient_model->requestDate)))
				{
					if(date("H:i:s")>date("H:i:s",strtotime($result[$i]['availableStartTime'])))
				{

					$result[$i]['availabilty']=0;
					//$today_available_sessions[$i]['time']="success";
				}
				}





				$i++;
			}

			



		//	$result['session']= $this->Doctor_model->get_doctor_appointment_by_date($this->Patient_model->doctorId,$this->Patient_model->requestDate);


			$response = ['status' => $status, 'token' => $token,  'result' => $result, 'message' => HTTP_STATUS_CODES[200]];

			$this->response($response, 200);

		}


	}

	

	

}

