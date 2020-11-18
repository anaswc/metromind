<?php

class  Patients_model extends CI_Model {
	
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
	
	
	
	
	public function setPatients()
		{
			$this->load->helper('url'); 
		
			$seoUri = url_title($this->input->post('patientEmail'), 'dash', TRUE);
			$seoUri1 = $seoUri.'_'.rand(10,100);
			$createdDate=date('Y-m-d H:i:s');
			$password=$this->encryption->encrypt($this->input->post('password'));
			$status =1;
			$data = array(
				'firstName' => $this->input->post('firstName'),
				'countryId'	=>$this->input->post('countryId'),
				'lastName'    => $this->input->post('lastName'),
				'patientMobile'      => $this->input->post('patientMobile'),
				'birthDate'      => $this->input->post('birthDate'),
				'gender'      => $this->input->post('gender'),
				'customGender'      => trim($this->input->post('customGender')),
				'patientEmail'      => $this->input->post('patientEmail'),
				'patientAddress'      => $this->input->post('patientAddress'),
				'isVerified'      => $this->input->post('isVerified'),
				'patientPassword'      => $password,
				'createdDate'      => $createdDate,
				'status' => $status,
				'seoUri' => $seoUri1,
				'deviceRegistrationId'=>'12345'
				
				
			);
		
				$this->db->insert('axpatient', $data);
				$this->patientId = $this->db->insert_id();
		$patientId = $this->patientId ;
			$uniqueId=AXUNIQUEIDPATIENT.$patientId;
			$data = array(
					'uniqueId' => $uniqueId
				);
				$this->db->set($data); 
				$this->db->where("patientId",$patientId); 
				$this->db->update("axpatient",$data);
			
			$patientId = $this->patientId ;
			
			if($_FILES["profileImgUrl"]['name'] <> ''){
			 $this->patients_model->uploadImage($patientId);	
			}
				return $patientId;
		}
		
		
		
		
		public function get_countries(){
			
			$this->db->limit($limit, $start);
			
			$this->db->select('*');
			
			$this->db->from('axcountries');
			
			
			if($this->countryId != "")
				$this->db->where('countryId', $this->countryId);
			
			if(trim($this->country  )!= "")
				$this->db->like('country', $this->country);
				
			if($this->sortColumn == '')
				$this->sortColumn = "countryId";
			
			if($this->sortDirection == '')
				$this->sortDirection = "DESC";	
						
			$this->db->order_by("$this->sortColumn", "$this->sortDirection");
			
			$query = $this->db->get();
			// echo $this->db->last_query(); exit; 
			return $query->result_array();

			}	
			
			
		public function uploadImage($patientId){ 
		

			 $config['upload_path']   = AXUPLOADPATIENTSPATH; 
			 $config['allowed_types'] = 'jpg|png|jpeg';
			 //$config['max_size']      = 100; 
			 $config['overwrite'] 	  = TRUE;
			 $config['max_width']     = 1300; 
			 $config['max_height']    = 800;  
			 
			 $filename 		= $_FILES["profileImgUrl"]['name'];
			 $type    		= substr(strrchr(trim($filename), "."),1);
			 $profileImgUrl	= $patientId.".".$type;
			 $config['file_name'] = $profileImgUrl;
			 $this->load->library('upload', $config);
			 $this->upload->initialize($config);
			 //echo $profileImgUrl;exit;
			
			 if ( ! $this->upload->do_upload('profileImgUrl')) {
				
				$error = array('error' => $this->upload->display_errors()); 
				$this->session->set_flashdata('error', $error['error']);
				return 0;
			 } else { 
				$data1 = array('upload_data' => $this->upload->data()); 
				
				$data = array(
					'profileImgUrl' => $profileImgUrl
				);
				$this->db->set($data); 
				$this->db->where("patientId",$patientId); 
				$this->db->update("axpatient",$data);
				
				return $patientId;
				
			 } 
      }
			
			
		public function validateImage()
		{
		if($_FILES["profileImgUrl"]['name'] <> ''){
			
			$config['upload_path']   = AXUPLOADPATIENTSPATH; 
			$config['allowed_types'] = 'jpg|png|jpeg'; 
			//$config['max_size']      = 100; 
			$config['overwrite'] 	  = TRUE;
			$config['max_width']     = 1300; 
			$config['max_height']    = 800;  
			$this->load->library('upload', $config);
			$this->upload->initialize($config);	
			if ( ! $this->upload->do_upload('profileImgUrl')) {
				$error = array('error' => $this->upload->display_errors()); 
				$this->session->set_flashdata('error', $error['error']);
				return 0;
			 }else{
				unlink(AXUPLOADPATIENTSPATH.$_FILES["profileImgUrl"]['name']);
				return 1;	 
			 }
		}else{
				return 1;	 
			 }			  
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
		
		
		
		
	public function get_patient_seoUri($seoUri = FALSE)
		{
			if ($seoUri === FALSE)
			{
					return 0;
			}
			$result_array = $this->db->get_where('axpatient', array('seoUri' => $seoUri));
			return $result_array->row_array();
		}
		
		
		public function updatePatient($patientId) { 
			$this->load->helper('url');
			$seoUri = url_title($this->input->post('patientEmail'), 'dash', TRUE);
			$modifiedDate=date('Y-m-d H:i:s');
			$password=$this->encryption->encrypt($this->input->post('patientPassword'));
			//echo $password;
			//echo $this->input->post('patientPassword');
			$status=1;
			$data = array(
				'firstName' => $this->input->post('firstName'),
				'lastName' => $this->input->post('lastName'),
				'countryId'	=>$this->input->post('countryId'),
				'patientEmail'    => $this->input->post('patientEmail'),
				'patientPassword'      => $password,
				'patientAddress'    => $this->input->post('patientAddress'),
				'patientMobile'      => $this->input->post('patientMobile'),
				'birthDate'      => $this->input->post('birthDate'),
				'gender'      => $this->input->post('gender'),
				'customGender'      => $this->input->post('customGender'),
				'isVerified'      => $this->input->post('isVerified'),
				'modifiedDate'      => $modifiedDate,
				'status' => $status,
				'seoUri' => $seoUri
			);
			$this->db->set($data); 
			$this->db->where("patientId", $patientId); 
			$this->db->update("axpatient", $data); 
			
			$this->patientId = $patientId;
			
			if($_FILES["profileImgUrl"]['name'] <> ''){
				$patientId = $this->uploadImage($patientId);	
			}
			
			 
			//print_r( $patientId);
			return $patientId;
			
			
			
		} 
		
public function update_requestsession($requestSessionId){
	$this->load->helper('url');
	$data = array(
					'note' =>  $this->input->post('note'),
				);
				$this->db->set($data); 
				$this->db->where("requestSessionId",$requestSessionId); 
				$this->db->update("axrequestsession",$data);
	}

public function validatePatientEmail($patientEmail,$patientId){

			$this->db->select('*');

			$this->db->from('axpatient');
			
			if($patientId  <> '')
				$this->db->where('patientId  != ',$patientId);

			if($patientEmail != "")
				$this->db->where('patientEmail',$patientEmail);	

			$query1 	= $this->db->get();
//echo $this->db->last_query();exit;
			if($query1->num_rows() > 0)
			{
				
				return 0;
			}
	return 1;
	
	}		
	
	
	
	public function validatePatientMobile($patientMobile,$patientId){

			$this->db->select('*');

			$this->db->from('axpatient');
			
			if($patientId  <> '')
				$this->db->where('patientId  != ',$patientId);

			if($patientMobile != "")
				$this->db->where('patientMobile',$patientMobile);	

			$query1 	= $this->db->get();
//echo $this->db->last_query();exit;
			if($query1->num_rows() > 0)
			{
				
				return 0;
			}
	return 1;
	
	}		

     public function activate_patient($patientIds) { 
		
			$this->db->where_in("patientId", $patientIds); 
			$status = 1;
			$data = array(
				'status' => $status
			);
			$this->db->update("axpatient", $data);  
		} 
		
		public function deactivate_patient($patientIds) { 

			$this->db->where_in("patientId", $patientIds); 
			$status = 0;
			$data = array(
				'status' => $status
			);
			$this->db->update("axpatient", $data);  
		} 
		
			
		


	
	public function getPatient($limit = NULL, $start = NULL)
		{	
			$this->db->limit($limit, $start);
			
			$this->db->select('*,axcountries.country');
			
			$this->db->from('axpatient');
			
			$this->db->join('axcountries','axpatient.countryId=axcountries.countryId','left');
			
			if($this->patientId != "")
				$this->db->where('patientId', $this->patientId);
			
			if(trim($this->firstName )!= "")
				$this->db->like('firstName', $this->firstName);
				if(trim($this->lastName )!= "")
				$this->db->like('lastName', $this->lastName);
				
				if(trim($this->patientEmail )!= "")
				$this->db->like('patientEmail', $this->patientEmail);
				
			if(trim($this->patientAddress )!= "")
				$this->db->like('patientAddress', $this->patientAddress);
				
			if($this->status != "")
				$this->db->where('status', $this->status);
				
			if($this->otpFlag != "")
				$this->db->where('otpFlag', $this->otpFlag);	
				
			if(trim($this->patientMobile) != "")
				$this->db->like('patientMobile', $this->patientMobile);
				
			if(trim($this->gender) != "")
				$this->db->like('gender', $this->gender);
			
			if(trim($this->seoUri) != "")
				$this->db->like('seoUri', $this->seoUri);

			if(trim($this->patientIds) != ""){
				$patientIds = explode(",",$patientIds);
				$this->db->where_in('patientId', $patientIds);	
			}
			
			if($this->sortColumn == '')
				$this->sortColumn = "patientId";
			
			if($this->sortDirection == '')
				$this->sortDirection = "DESC";	
						
			$this->db->order_by("$this->sortColumn", "$this->sortDirection");
			
			$query = $this->db->get();
			// echo $this->db->last_query(); exit; 
			return $query->result_array();

		}
		
		
		
		public function delete_patient($patientIds) { 
		
		$imageId=explode(',',$patientIds);
		$this->db->select('profileImgUrl');
		$this->db->from('axpatient');
		$this->db->where_in('patientId',$imageId);
		$query=$this->db->get();
		$result=$query->result_array();
		
		if(count($result))
		{
			foreach($result as $res)
			{
				unlink(FCPATH.AXUPLOADPATIENTSPATH.$res['profileImgUrl']);
				}
			}
		
		
		
			 if ($this->db->delete("axpatient", "patientId IN ( ".$patientIds.")")) {
				 
				
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
			
			if($this->patientId != "")
				$this->db->where('patientId', $this->patientId);
			
				if(trim($this->firstName) != "")
				$this->db->like('firstName', $this->firstName);
				if(trim($this->lastName) != "")
				$this->db->like('lastName', $this->lastName);
				
				if(trim($this->patientEmail) != "")
				$this->db->like('patientEmail', $this->patientEmail);
				if(trim($this->patientAddress) != "")
				$this->db->like('patientAddress', $this->patientAddress);
				
				if($this->patientMobile != "")
				$this->db->where('patientMobile', $this->patientMobile);
				
				if($this->birthDate != "")
				$this->db->where('birthDate', $this->birthDate);
				
				if($this->gender != "")
				$this->db->where('gender', $this->gender);
				
				
			if(trim($this->status) != "")
				$this->db->where('status', $this->status);
				
				
			if(trim($this->patientIds) != ""){ //echo  $this->customerIds; exit;
				$patientIds = explode(",",$patientIds);
				$this->db->where_in('patientId', $patientIds);	
			}
			$this->db->from("axpatient");
			return $this->db->count_all_results();
		}
		
		
		
		
		public function retrievePatient($seoUri = FALSE)
		{
			if ($seoUri === FALSE)
			{
					return 0;
			}
			$this->db->select('*');
			$this->db->from('axpatient');
			$this->db->like('seoUri',$seoUri);
			$result_array = $this->db->get()->result_array();	
			$this->patientId				    = $result_array[0]["patientId"];
			$this->uniqueId				    = $result_array[0]["uniqueId"];
			$this->firstName				= $result_array[0]["firstName"];
			$this->lastName				= $result_array[0]["lastName"];
			$this->patientEmail				    = $result_array[0]["patientEmail"];
			$this->patientMobile		            = $result_array[0]["patientMobile"];
			$this->patientAddress		            = $result_array[0]["patientAddress"];
			$this->birthDate		            = $result_array[0]["birthDate"];
			$this->profileImgUrl					= $result_array[0]["profileImgUrl"];
			$this->gender					= $result_array[0]["gender"];
			$this->createdDate					= $result_array[0]["createdDate"];
			$this->patientPassword					= $result_array[0]["patientPassword"];
			$this->status					= $result_array[0]["status"];
			$this->seoUri					= $result_array[0]["seoUri"];
			return 1;
		}
		
		
		
		public function get_requestSession($limit = NULL, $start = NULL)
		{	
			$this->db->limit($limit, $start);
			
			$this->db->select('*,axdoctors.doctorName,axpatient.firstName,axpatient.lastName');
			
			$this->db->from('axrequestsession');
			
			$this->db->join('axdoctors','axrequestsession.doctorId=axdoctors.doctorId','left');
			$this->db->join('axpatient','axpatient.patientId =axrequestsession.patientId','left');
			
			if($this->patientId != "")
				$this->db->where('axrequestsession.patientId', $this->patientId);
			
			if(trim($this->firstName )!= "")
				$this->db->like('firstName', $this->firstName);
				if(trim($this->lastName )!= "")
				$this->db->like('lastName', $this->lastName);
				
				
				
			if($this->doctorName != "")
				$this->db->like('doctorName', $this->doctorName);	
				
			
			
			if($this->sortColumn == '')
				$this->sortColumn = "requestSessionId";
			
			if($this->sortDirection == '')
				$this->sortDirection = "DESC";	
						
			$this->db->order_by("$this->sortColumn", "$this->sortDirection");
			
			$query = $this->db->get();
			// echo $this->db->last_query(); exit; 
			return $query->result_array();

		}
		
		
		public function get_patientCredits($limit = NULL, $start = NULL){
			
				
			$this->db->limit($limit, $start);
			
			$this->db->select('axpatientcredits.*,axpatient.firstName,axpatient.lastName,axdoctors.doctorName');
			
			$this->db->from('axpatientcredits');
			
			$this->db->join('axpatient','axpatient.patientId=axpatientcredits.patientId','left');
			$this->db->join('axdoctors','axdoctors.doctorId =axpatientcredits.doctorId','left');
			
			
			if(trim($this->firstName )!= "")
				$this->db->like('axpatient.firstName', $this->firstName);
				if(trim($this->lastName )!= "")
				$this->db->like('axpatient.lastName', $this->lastName);
				
			if(trim($this->doctorName )!= "")
				$this->db->like('axdoctors.doctorName', $this->doctorName);
			
			if(trim($this->insDate )!= "")
				$this->db->like('axpatientcredits.insDate', $this->insDate);		
			
			
			if($this->sortColumn == '')
				$this->sortColumn = "insDate";
			
			if($this->sortDirection == '')
				$this->sortDirection = "DESC";	
						
			$this->db->order_by("$this->sortColumn", "$this->sortDirection");
			
			$query = $this->db->get();
			//echo $this->db->last_query(); exit; 
			return $query->result_array();

		
			
			}
			
			
			public function get_payments($limit = NULL, $start = NULL){
			
				
			$this->db->limit($limit, $start);
			
			$this->db->select('axpayments.*,axpatient.firstName,axpatient.lastName,axdoctors.doctorName,axpackages.packageName');
			
			$this->db->from('axpayments');
			
			$this->db->join('axpatient','axpatient.patientId=axpayments.patientId','left');
			$this->db->join('axdoctors','axdoctors.doctorId =axpayments.doctorId','left');
			$this->db->join('axpackages','axpackages.packageId =axpayments.packageId','left');
			
			if(trim($this->firstName )!= "")
				$this->db->like('axpatient.firstName', $this->firstName);
				if(trim($this->lastName )!= "")
				$this->db->like('axpatient.lastName', $this->lastName);
				
			if(trim($this->doctorName )!= "")
				$this->db->like('axdoctors.doctorName', $this->doctorName);
			
			if(trim($this->paymentDate )!= "")
				$this->db->like('axpayments.paymentDate', $this->paymentDate);		
			
			
			if($this->sortColumn == '')
				$this->sortColumn = "paymentId";
			
			if($this->sortDirection == '')
				$this->sortDirection = "DESC";	
						
			$this->db->order_by("$this->sortColumn", "$this->sortDirection");
			
			$query = $this->db->get();
			//echo $this->db->last_query(); exit; 
			return $query->result_array();

		}
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

			//echo  $y;
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
// =================================================



// ======================================================
		
}
?>