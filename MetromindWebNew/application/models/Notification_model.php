<?php

class  Notification_model extends CI_Model {
	
	public function __construct(){
		
		$this->patientId       	="";
		$this->firstName     	="";
		$this->doctorName     	="";
		$this->lastName     	="";
		$this->patientEmail     ="";
		$this->countryId     ="";
		$this->patientMobile    ="";
		$this->patientPassword  ="";
		$this->patientAddress   ="";
		$this->status        	="";
		$this->isVerified       ="";
		$this->seoUri			= '';
		$this->birthDate      	="";
		$this->profileImgUrl    ="";
		$this->gender      		="";
		$this->customGender     ="";
		$this->createdDate      ="";
		$this->modifiedDate     ="";
		$this->lastLogin     	="";
		$this->sortColumn 	  	= '';
		$this->sortDirection  	= '';
		$this->otpFlag  		= '';
		$this->insDate			='';
		$this->paymentDate		='';
		$this->load->database();
		$this->load->library('upload');
		$this->setPostGetVars();
		
	}
	public function setPostGetVars(){	

			$this->patientId						    = $this->input->post_get('patientId');
			$this->countryId    						 =$this->input->post_get('countryId');
			$this->isVerified						    = $this->input->post_get('isVerified');
			$this->patientAddress						= $this->input->post_get('patientAddress');
			$this->firstName							= trim($this->input->post_get('firstName'));
			$this->lastName								= trim($this->input->post_get('lastName'));
			$this->doctorName     						=trim($this->input->post_get('doctorName'));
			$this->patientEmail                         = trim($this->input->post_get('patientEmail'));
			$this->patientMobile                        = trim($this->input->post_get('patientMobile'));
			$this->patientPassword                      = trim($this->input->post_get('patientPassword'));
			$this->birthDate                            = trim($this->input->post_get('birthDate'));
			$this->gender                            	= trim($this->input->post_get('gender'));
			$this->customGender                         = trim($this->input->post_get('customGender'));
			$this->status                           	= $this->input->post_get('status');
			$this->patientIds							= trim($this->input->post_get('patientIds'));	
			$this->seoUri								= trim($this->input->post_get('seoUri'));
			$this->otpFlag                         		= trim($this->input->post_get('otpFlag'));
			$this->insDate								= trim($this->input->post_get('insDate'));
			$this->paymentDate							=trim($this->input->post_get('paymentDate'));
	}
	
	
	
	

		

		
		
		public function getPatient_id($patientId = FALSE)
		{
			
			if ($patientId === FALSE)
			{
					return 0;
			}
			$query = $this->db->get_where('axpatient', array('patientId' => $patientId));
			return $query->row_array();
			
			
		}
		
		
		
		
	// ------------------------------------

		

	
		
// ----------------------------
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
public function send_notification_user($uniqueId){	

		if($uniqueId == '')
			return 0;
		$this->db->select('uniqueId,firstName,lastName,patientEmail,patientMobile,countryId');

		$this->db->from('axpatient');

		$this->db->where("uniqueId", $uniqueId); 

		$result_array = $this->db->get()->result_array();

		if(count($result_array) > 0){

			$this->uniqueId		= $result_array[0]["uniqueId"];

			$firstName			= $result_array[0]["firstName"];

			$lastName			= $result_array[0]["lastName"];

			$patientEmail		= $result_array[0]["patientEmail"];

			$patientMobile		= $result_array[0]["patientMobile"];

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

				$body 	= 'Hi '.$firstName.' '.$lastName.' your appointment has been scheduled today. Contact Doctor on time';

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

			echo  $y;
			return 1;

		}else{

			return 0;	

		}

	}




	


public function notify_user_appointment($uniqueId)
{

	if($uniqueId == '')
			return 0;
		$this->db->select('uniqueId,firstName,lastName,fcmToken');

		$this->db->from('axpatient');

		$this->db->where("uniqueId", $uniqueId); 

		$result_array = $this->db->get()->result_array();

		if(count($result_array) > 0){
			$this->uniqueId		= $result_array[0]["uniqueId"];

			$firstName			= $result_array[0]["firstName"];

			$lastName			= $result_array[0]["lastName"];

			$fcmtoken		= $result_array[0]["fcmToken"];
			if($fcmtoken <> ''){

				$url = "https://fcm.googleapis.com/fcm/send";
    $token = $fcmtoken;
    $serverKey = 'AAAAy6LCT4s:APA91bGCsaS87ndfK2FppCbZRJjS-XQVxErQ8MsSUDm7dk-4U78HbbtFM-mMSgSR-rxzazhC3FJv5jNErAaoqY7OZ2gxoaCiNTyg67Ma_C99uh52IA1UbMCuHLtHHE_nULXF24JcLXAD';
    $title = "Metro Mind";
    $body = 'Hi '.$firstName.' '.$lastName.' your appointment has been scheduled today. Contact Doctor on time';
    $notification = array('title' =>$title , 'body' => $body, 'sound' => 'default');
    $data = array('title' =>$title , 'body' => $body, 'type' => 'general');
    $arrayToSend = array('to' => $token, 'notification' => $notification,'data'=>$data,'priority'=>'high');
    $json = json_encode($arrayToSend);
    $headers = array();
    $headers[] = 'Content-Type: application/json';
    $headers[] = 'Authorization: key='. $serverKey;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
    curl_exec($ch);
    if ($response === FALSE) {
    die('FCM Send Error: ' . curl_error($ch));
    }
    curl_close($ch);
}
return 1;

		}else{

			return 0;	

		}

    
}

		
}
?>