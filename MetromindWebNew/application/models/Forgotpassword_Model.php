<?php

 class Forgotpassword_Model extends CI_Model {

	 

	 public function ForgotPassword($email)

	{

    

    $this->db->where('adminEmail', $email);

    $account=$this->db->get('axadmin')->row();

	if($account!=NULL){

		return 1;

	}

		

}

	 

	public function sendpassword($email,$userType)
	{
	

		if($email == '')	

			return 0;
			
		$settingId = 1;

		$this->db->select('adminEmail');

		$this->db->from('axsetting');

		$this->db->where('settingId',$settingId);

		$row_array = $this->db->get()->row_array();		

		$from 			=	$row_array['adminEmail'];

		$to				=  $email;
		
		$this->db->select('*');			
		$this->db->from('axadmin');
		$this->db->where("adminEmail", $email); 
		$row_array = $this->db->get()->row_array();	
		$userName = $row_array['userName'];
		$password = $this->encryption->decrypt($row_array['password']);

		// $this->email->set_newline("\r\n");

		// $this->email->set_header('MIME-Version', '1.0; charset=utf-8');

		// $this->email->set_header('Content-type', 'text/html');		

	//	$message 			= "";			

		// $this->email->from($from, 'METRO MIND'); 

		// $this->email->to($to);			

		// $this->email->subject('Forgot Password');

		$this->load->library('email');

		 $this->load->config('email');
		$this->email->initialize(array($config));

// $this->email->initialize(array( ));
		

$message 			= "";		
        $this->email->from($from, 'METRO MIND');
        $this->email->to($to);
        $this->email->subject('Forgot Password');
        $this->email->set_mailtype("html");






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
		//  $this->email->send();
		//  echo $this->email->print_debugger();
		//  exit(0);

		 if($this->email->send()) 

			return 1;

		 else 

			return 0;	
	
	}

    

 }

?>