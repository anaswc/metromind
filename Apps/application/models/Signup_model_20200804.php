<?php

class Signup_model extends CI_Model {

	public function __construct()

	{

		$this->loginType = '';

	}

	
	public function validate_signup_mobile($mobileNumber){

		if($mobileNumber == '')
			return 0;
		
		$phonePrefix = $this->get_phonePrefix($this->input->post_get('countryId'));
		
		if($phonePrefix <> 0)
			$mobileNumber = '+'.$phonePrefix.$mobileNumber;
		
		$this->db->select('uniqueId');

		$this->db->from('axdoctors');

		$this->db->where('doctorMobile',$mobileNumber);

		$query = $this->db->get();

		if($query->num_rows() > 0){	

			$row_array = $query->row_array();
			
			$result = $this->login_doctor($row_array['uniqueId']);

			return $result;	

		}else{

			$this->db->select('uniqueId');

			$this->db->from('axpatient');

			$this->db->where('patientMobile',$mobileNumber);

			$query = $this->db->get();

			if($query->num_rows() > 0){	

				$row_array = $query->row_array();
				
				$result = $this->login_patient($row_array['uniqueId']);
				
				return $result;	

			}

		}

		return 1;								
	}
		

	public function login_doctor($uniqueId){

		if($uniqueId == '') return 0;
		
		$this->db->select('	axdoctors.doctorId,

							axdoctors.uniqueId,

							axdoctors.doctorName,

							axdoctors.doctorEmail,

							axdoctors.doctorPassword,

							axdoctors.doctorMobile,

							axdoctors.doctorImageUrl,

							axdoctors.youtubeLink,

							axdoctors.fcmToken,

							axdoctors.status

						');

		$this->db->from('axdoctors');
		
		$this->db->where('uniqueId',$uniqueId,'none');
	
		$query = $this->db->get();

		if($query->num_rows() > 0){	

			$row_array = $query->row_array();
			
			if (trim($this->encryption->decrypt($row_array["doctorPassword"])) != trim($this->input->post_get('clientPassword'))) {

					return 0;

				}else{

					$this->loginType = 1;
					
					$otp	= 11111;
		
					$data = array(
					
						'lastLogin' 			=> date("Y-m-d H:i:s", now('Asia/Kolkata')),
						
						'deviceRegistrationId' 	=> trim($this->input->post_get('deviceRegistrationId')),
						
						'loginStatus' 			=>	1,
						
						'otp' 					=> $otp
		
					);
	
					$this->db->where("uniqueId", $uniqueId); 
		
					$this->db->update("axdoctors", $data);	
		
					return $row_array;
				}

		}else{

			return 0;	

		}	
	}

	

	public function login_patient($uniqueId){

		if($uniqueId == '') return 0;

		$this->db->select('	patientId,

							uniqueId,

							CONCAT(firstName , " ", lastName) AS patientName,

							patientEmail,

							patientPassword,

							patientMobile,

							fcmToken,

							profileImgUrl,

							status

						');

		$this->db->from('axpatient');

		$this->db->where('uniqueId',$uniqueId,'none');

		$query = $this->db->get();

		if($query->num_rows() > 0){	

			$row_array = $query->row_array();
			
			if (trim($this->encryption->decrypt($row_array["patientPassword"])) != trim($this->input->post_get('clientPassword'))) {

					return 0;

			}else{
				
				$this->loginType = 2;
				
				$otp	= 11111;
	
				$data = array(
	
					'lastLogin' 			=> date("Y-m-d H:i:s", now('Asia/Kolkata')),
					
					'deviceRegistrationId' 	=> trim($this->input->post_get('deviceRegistrationId')),
					
					'otp' 					=> $otp
	
				);
	
	
				$this->db->where("uniqueId", $uniqueId); 
	
				$this->db->update("axpatient", $data);
	
				return $row_array;		
			}


		}else{

			return 0;	

		}	

	}
	
	public function signup_step1_patient()
	{

		$createdDate = date("Y-m-d H:i:s", now('Asia/Kolkata'));
		
		$mobileNumber = trim($this->input->post_get('mobileNumber'));
		
		$phonePrefix = $this->get_phonePrefix($this->input->post_get('countryId'));
		
		if($phonePrefix <> 0)
			$mobileNumber = '+'.$phonePrefix.$mobileNumber;
			
		$otp	= 11111;
		
		$data = array(

			'firstName' 			=> trim($this->input->post_get('clientName')),
			
			'patientMobile' 		=> $mobileNumber,

			'countryId' 			=> trim($this->input->post_get('countryId')),
				
			'patientEmail' 			=> trim($this->input->post_get('patientEmail')),
			
			'patientPassword' 		=> $this->encryption->encrypt($this->input->post_get('clientPassword')),
			
			'deviceRegistrationId' 	=> trim($this->input->post_get('deviceRegistrationId')),
	
			'createdDate' 			=> $createdDate,
			
			'otp' 					=> $otp,

			'status' 				=> 1
		);



		$this->db->insert('axpatient', $data);

		$this->patientId = $this->db->insert_id();

		$this->uniqueId 		= 	'METROMINDP'.$this->patientId;

		$data = array(

			'uniqueId' 			=> $this->uniqueId
			
		);

		$this->db->where("patientId", $this->patientId); 

		$this->db->update("axpatient", $data);	

		$result = $this->login_patient($this->uniqueId);

		return $result;	

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

	

	public function forgot_password($emailId){	

		if($emailId == '') return 0;

		$this->db->select(' patientEmail, 

							patientPassword

						  ');

		$this->db->from('axpatient');

		$this->db->group_start();

		$this->db->where('patientEmail',$emailId,'none');

		$this->db->or_where('patientMobile',$emailId,'none');

		$this->db->group_end();	

		

		$query = $this->db->get();

		if($query->num_rows() > 0){	

			$row_array = $query->row_array();

			$this->send_login_info($row_array["patientEmail"],$row_array["patientEmail"],$this->encryption->decrypt($row_array['patientPassword']));

		}else{

			$this->db->select(' doctorEmail, 

								doctorPassword

							  ');

	

			$this->db->from('axdoctors');
			
			$this->db->group_start();

			$this->db->where('doctorEmail',$emailId,'none');
			
			$this->db->or_where('doctorMobile',$emailId,'none');

			$this->db->group_end();	

			

			$query = $this->db->get();

	

			if($query->num_rows() > 0){	

	

				$row_array = $query->row_array();

	

				$this->send_login_info($row_array["doctorEmail"],$row_array["doctorEmail"],$this->encryption->decrypt($row_array['doctorPassword']));

	

			}else{

	

				return 0;	

	

			}

		}

		return 1;

	}

	

	

	public function send_login_info($emailId,$userName,$password){

		

		if($emailId == '' ||  $userName == '' || $password == '')	

			return 0;

			

		$settingId = 1;

		$this->db->select('adminEmail');

		$this->db->from('axsetting');

		$this->db->where('settingId',$settingId);

		$row_array = $this->db->get()->row_array();		

		$from 			=	$row_array['adminEmail'];

		$to				= $emailId;

		

		$this->email->set_newline("\r\n");

		$this->email->set_header('MIME-Version', '1.0; charset=utf-8');

		$this->email->set_header('Content-type', 'text/html');		

		$message 			= "";			

		$this->email->from($from, 'METRO MIND'); 

		$this->email->to($to);			

		$this->email->subject('Forgot Password');

		$message 	= '	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

							<html xmlns="http://www.w3.org/1999/xhtml">

							<body>

								<div style="width: 85%;border: 2px solid #00C1B6;padding: 15px;">

								<p>

									Greetings from METRO MIND Team,</p>

								<p>

									We have received a notification that you have forgotten your password for METRO MIND community. Here is the details.</p>

								<p> Username : '.$userName.'</p>

								<p> Password : '.$password.'</p>

								

								<p>

									Thanks,</p>

								<p>

									METRO MIND Customer Service Team</p>

									

								</div>

							</body>

						</html>	'; 

		

		 $this->email->message($message); 

		 //Send mail 

		 if($this->email->send()) 

			return 1;

		 else 

			return 0;	

	}

					

	

	public function add_api_token_members($uniqueId,$token)

	{

		if ($uniqueId === '')

			return 0;

				

		$deviceRegistrationId 	= '';

				

		if($this->input->post_get('deviceRegistrationId'))	$deviceRegistrationId	=	$this->input->post_get('deviceRegistrationId');

				

		if($deviceRegistrationId == '')

			return 0;

				

		$this->delete_api_token_members($uniqueId,$deviceRegistrationId);	

				

		$data = array(

			'uniqueId' 				=> $uniqueId,

			'deviceRegistrationId' 	=> $deviceRegistrationId,

			'token' 				=> $token

		);

				

		$this->db->insert('api_tokens', $data);

				

		return $uniqueId;

	}

				

	public function delete_api_token_members($uniqueId,$deviceRegistrationId) { 

				

		if($uniqueId == '' || $deviceRegistrationId == '')

			return 0;

				

		 $data = array(

			'uniqueId' 				=> $uniqueId,

			'deviceRegistrationId' 	=> $deviceRegistrationId

			);

				

		 if ($this->db->delete("api_tokens", $data)) { 

			return true; 

		 } 

		 

	} 

				

	public function validate_api_token_members($uniqueId,$token)

	{	

		if ($uniqueId === '')

			return 0;

				

		$valid =  1; 

				

		$deviceRegistrationId 	= '';

				

		if($this->input->post_get('deviceRegistrationId'))	$deviceRegistrationId	=	$this->input->post_get('deviceRegistrationId');

				

		if($deviceRegistrationId == '')

			return 0;

				

		$this->db->select('token');

				

		$this->db->from('api_tokens');

				

		$this->db->where('uniqueId',$uniqueId);

				

		if(trim($deviceRegistrationId) != "")

			$this->db->like('deviceRegistrationId', $deviceRegistrationId,'none');

				

		$this->db->order_by("created", "DESC");

				

		$this->db->limit('1');

				

		$query = $this->db->get();

				

		if($query->num_rows() > 0)

		{	

			$result_row = $query->row_array();

				

			$data = array(

				'incomingToken' 	=> $token

			);

				

			$this->db->set($data); 

				

			$this->db->where('uniqueId',$uniqueId);

				

			if(trim($deviceRegistrationId) != "")

				$this->db->like('deviceRegistrationId', $deviceRegistrationId,'none'); 

				

			$this->db->update("api_tokens", $data); 

				

			if($result_row['token'] <> $token)

				$valid =  0;

		}else{

			$valid =  0;	

		}

				

		return $valid;

	}
	
	
	public function get_doctor($uniqueId){

		if($uniqueId == '') return 0;
		
		$this->db->select('	axdoctors.doctorId,

							axdoctors.uniqueId,

							axdoctors.doctorName,

							axdoctors.doctorEmail,

							axdoctors.doctorPassword,

							axdoctors.doctorMobile,

							axdoctors.doctorImageUrl,

							axdoctors.youtubeLink,

							axdoctors.fcmToken,

							axdoctors.status

						');

		$this->db->from('axdoctors');
		
		$this->db->where('uniqueId',$uniqueId,'none');
	
		$query = $this->db->get();

		if($query->num_rows() > 0){	

			$row_array = $query->row_array();
			
            $this->loginType = 1;

            $data = array(
            
                'lastLogin' 			=> date("Y-m-d H:i:s", now('Asia/Kolkata')),
                
                'deviceRegistrationId' 	=> trim($this->input->post_get('deviceRegistrationId')),
				
				'loginStatus' 			=>	1

            );

            $this->db->where("uniqueId", $uniqueId); 

            $this->db->update("axdoctors", $data);	

            return $row_array;
				

		}else{

			return 0;	

		}	
	}

	

	public function get_patient($uniqueId){

		if($uniqueId == '') return 0;

		$this->db->select('	patientId,

							uniqueId,

							CONCAT(firstName , " ", lastName) AS patientName,

							patientEmail,

							patientPassword,

							patientMobile,

							fcmToken,

							profileImgUrl,
							
							patientAddress,

							status

						');

		$this->db->from('axpatient');

		$this->db->where('uniqueId',$uniqueId,'none');

		$query = $this->db->get();

		if($query->num_rows() > 0){	

			$row_array = $query->row_array();
			
            $this->loginType = 2;

            $data = array(

                'lastLogin' 			=> date("Y-m-d H:i:s", now('Asia/Kolkata')),
                
                'deviceRegistrationId' 	=> trim($this->input->post_get('deviceRegistrationId')),
				
				'loginStatus' 			=>	1

            );


            $this->db->where("uniqueId", $uniqueId); 

            $this->db->update("axpatient", $data);

            return $row_array;		
			


		}else{

			return 0;	

		}	

	}
	
	
	public function logout_doctor($uniqueId){

		if($uniqueId == '') return 0;
		
        $data = array(
		
			'loginStatus' 			=> 0
			

		);

		$this->db->where("uniqueId", $uniqueId); 

		$this->db->update("axdoctors", $data);	
		
		return 1;

	}
	
	public function logout_patient($uniqueId){

		if($uniqueId == '') return 0;
		
        $data = array(
		
			'loginStatus' 			=> 0
			

		);

		$this->db->where("uniqueId", $uniqueId); 

		$this->db->update("axpatient", $data);	
		
		return 1;

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

			return 1;

		}else{

			return 0;	

		}							

	}

				

}			

?>