<?php

class Login_model extends CI_Model
{

    public function __construct()

    {

        $this->loginType = '';

        $this->deviceOS = '';

    }

    public function validate_login($userName, $password)
    {

        if ($userName == '' || $password == '')

        return 0;

        $this
            ->db
            ->select('doctorId,isVerified');

        $this
            ->db
            ->from('axdoctors');

        $this
            ->db
            ->group_start();

        $this
            ->db
            ->where('doctorEmail', $userName, 'none');

        $this
            ->db
            ->or_where('doctorMobile', $userName, 'none');

        $this
            ->db
            ->group_end();

        $query = $this
            ->db
            ->get();

        if ($query->num_rows() > 0)
        {

            $result = $query->row_array();

            if ($result['isVerified'] == 0)
            {

                $valid = 100;

                return $valid;

            }

            $result = $this->login_doctor($userName, $password);

            return $result;

        }
        else
        {

            $this
                ->db
                ->select('patientId,isVerified');

            $this
                ->db
                ->from('axpatient');

            $this
                ->db
                ->group_start();

            $this
                ->db
                ->where('patientEmail', $userName, 'none');

            $this
                ->db
                ->or_where('patientMobile', $userName, 'none');

            $this
                ->db
                ->group_end();

            $query = $this
                ->db
                ->get();

            if ($query->num_rows() > 0)
            {

                $result = $query->row_array();

                if ($result['isVerified'] == 0)
                {

                    $valid = 100;

                    return $valid;

                }

                $result = $this->login_patient($userName, $password);

                return $result;

            }
            else
            {

                return 0;

            }

        }

    }

    public function login_doctor($userName, $password)
    {

        $this
            ->db
            ->select('	axdoctors.doctorId,



							axdoctors.uniqueId,



							axdoctors.doctorName,



							axdoctors.doctorEmail,



							axdoctors.doctorPassword,



							axdoctors.doctorMobile,



							axdoctors.doctorImageUrl,



							axdoctors.youtubeLink,



							axdoctors.doctorAddress,

							

							axdoctors.fcmToken,

							

							axdoctors.doctorSessionDuration,



							axdoctors.status



						');

        $this
            ->db
            ->from('axdoctors');

        $this
            ->db
            ->group_start();

        $this
            ->db
            ->where('doctorEmail', $userName, 'none');

        $this
            ->db
            ->or_where('doctorMobile', $userName, 'none');

        $this
            ->db
            ->group_end();

        $query = $this
            ->db
            ->get();

        if ($query->num_rows() > 0)
        {

            $row_array = $query->row_array();

            if ($row_array["doctorId"] <> '')
            {

                if (trim($this
                    ->encryption
                    ->decrypt($row_array["doctorPassword"])) != trim($password))
                {

                    return 0;

                }
                else if ($row_array["status"] == 0)
                {

                    return 100;

                }
                else
                {

                    $this->loginType = 1;

                    $this->deviceOS = trim($this
                        ->input
                        ->post_get('deviceOS'));

                    if (trim($this->deviceOS) == "") $this->deviceOS = 'iOS';

                    $data = array(

                        'lastLogin' => date("Y-m-d H:i:s", now('Asia/Kolkata')) ,

                        'deviceRegistrationId' => trim($this
                            ->input
                            ->post_get('deviceRegistrationId')) ,

                        'deviceOS' => $this->deviceOS,

                        'loginStatus' => 1,

                        'isEngaged' => 0

                    );

                    $this
                        ->db
                        ->where("doctorId", $row_array["doctorId"]);

                    $this
                        ->db
                        ->update("axdoctors", $data);

                    return $row_array;

                }

            }
            else
            {

                return 0;

            }

        }
        else
        {

            return 0;

        }

    }

    public function login_patient($userName, $password)
    {

        $this
            ->db
            ->select('	patientId,



							uniqueId,



							CONCAT(firstName , " ", lastName) AS patientName,



							patientEmail,



							patientPassword,



							patientMobile,



							patientAddress,



							profileImgUrl,

							

							fcmToken,



							status



						');

        $this
            ->db
            ->from('axpatient');

        $this
            ->db
            ->group_start();

        $this
            ->db
            ->where('patientEmail', $userName, 'none');

        $this
            ->db
            ->or_where('patientMobile', $userName, 'none');

        $this
            ->db
            ->group_end();

        $query = $this
            ->db
            ->get();

        if ($query->num_rows() > 0)
        {

            $row_array = $query->row_array();

            if ($row_array["patientId"] <> '')
            {

                if (trim($this
                    ->encryption
                    ->decrypt($row_array["patientPassword"])) != trim($password))
                {

                    return 0;

                }
                else if ($row_array["status"] == 0)
                {

                    return 100;

                }
                else
                {

                    $this->loginType = 2;

                    $this->deviceOS = trim($this
                        ->input
                        ->post_get('deviceOS'));

                    if (trim($this->deviceOS) == "") $this->deviceOS = 'iOS';

                    $data = array(

                        'lastLogin' => date("Y-m-d H:i:s", now('Asia/Kolkata')) ,

                        'deviceRegistrationId' => trim($this
                            ->input
                            ->post_get('deviceRegistrationId')) ,

                        'deviceOS' => $this->deviceOS,

                        'loginStatus' => 1

                    );

                    $this
                        ->db
                        ->where("patientId", $row_array["patientId"]);

                    $this
                        ->db
                        ->update("axpatient", $data);

                    return $row_array;

                }

            }
            else
            {

                return 0;

            }

        }
        else
        {

            return 0;

        }

    }

    public function forgot_password($emailId)
    {

        if ($emailId == '') return 0;

        $this
            ->db
            ->select(' patientEmail, 



							patientPassword



						  ');

        $this
            ->db
            ->from('axpatient');

        $this
            ->db
            ->group_start();

        $this
            ->db
            ->where('patientEmail', $emailId, 'none');

        $this
            ->db
            ->or_where('patientMobile', $emailId, 'none');

        $this
            ->db
            ->group_end();

        $query = $this
            ->db
            ->get();

        if ($query->num_rows() > 0)
        {

            $row_array = $query->row_array();

            $this->send_login_info($row_array["patientEmail"], $row_array["patientEmail"], $this
                ->encryption
                ->decrypt($row_array['patientPassword']));

        }
        else
        {

            $this
                ->db
                ->select(' doctorEmail, 



								doctorPassword



							  ');

            $this
                ->db
                ->from('axdoctors');

            $this
                ->db
                ->group_start();

            $this
                ->db
                ->where('doctorEmail', $emailId, 'none');

            $this
                ->db
                ->or_where('doctorMobile', $emailId, 'none');

            $this
                ->db
                ->group_end();

            $query = $this
                ->db
                ->get();

            if ($query->num_rows() > 0)
            {

                $row_array = $query->row_array();

                $this->send_login_info($row_array["doctorEmail"], $row_array["doctorEmail"], $this
                    ->encryption
                    ->decrypt($row_array['doctorPassword']));

            }
            else
            {

                return 0;

            }

        }

        return 1;

    }

    public function send_login_info($emailId, $userName, $password)
    {

        if ($emailId == '' || $userName == '' || $password == '')

        return 0;

        $settingId = 1;

        $this
            ->db
            ->select('adminEmail');

        $this
            ->db
            ->from('axsetting');

        $this
            ->db
            ->where('settingId', $settingId);

        $row_array = $this
            ->db
            ->get()
            ->row_array();

        $from = $row_array['adminEmail'];

        $to = $emailId;

        // $this ->load ->library('email');
        $this->load->library('email');

		//  $this->load->config('email');
		// $this->email->initialize(array($config));

        $this->email->initialize(array(
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.googlemail.com',
            'smtp_user' => 'noreplaymetromindapp@gmail.com',
            'smtp_pass' => 'bljngjvjekqkeymy',
            'smtp_port' => 465,
            'smtp_crypto'=>'ssl',
            '_smtp_auth'=>TRUE,
            'crlf' => "\r\n",
            'newline' => "\r\n"
        ));

        $this
            ->email
            ->from($from, 'METRO MIND');
        $this
            ->email
            ->to($to);
        $this
            ->email
            ->subject('Forgot Password');
        $this
            ->email
            ->set_mailtype("html");

        // $this->email->set_newline("\r\n");
        

        // $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
        

        // $this->email->set_header('Content-type', 'text/html');
        

        $message = "";

        // $this->email->from($from, 'METRO MIND');
        

        // $this->email->to($to);
        

        // $this->email->subject('Forgot Password');
        

        $message = '	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">



							<html xmlns="http://www.w3.org/1999/xhtml">



							<body>



								<div style="width: 85%;border: 2px solid #00C1B6;padding: 15px;">



								<p>



									Greetings from METRO MIND Team,</p>



								<p>



									We have received a notification that you have forgotten your password for METRO MIND community. Here is the details.</p>



								<p> Username : ' . $userName . '</p>



								<p> Password : ' . $password . '</p>



								



								<p>



									Thanks,</p>



								<p>



									METRO MIND Customer Service Team</p>



									



								</div>



							</body>



						</html>	';

        $this
            ->email
            ->message($message);

        //Send mail
        // $this
        //     ->email
        //     ->send();

        // // Will only print the email headers, excluding the message subject and body
        // echo $this
        //     ->email
        //     ->print_debugger(array(
        //     'headers'
        // ));

        // // $this->email->send();
        // // print_r($this->email->print_debugger());
        // die();

        if($this->email->send())
        

        return 1;
        

        else
        

        return 0;
        

        
    }

    public function add_api_token_members($uniqueId, $token)

    {

        if ($uniqueId === '')

        return 0;

        $deviceRegistrationId = '';

        if ($this
            ->input
            ->post_get('deviceRegistrationId')) $deviceRegistrationId = $this
            ->input
            ->post_get('deviceRegistrationId');

        if ($deviceRegistrationId == '')

        return 0;

        $this->delete_api_token_members($uniqueId, $deviceRegistrationId);

        $data = array(

            'uniqueId' => $uniqueId,

            'deviceRegistrationId' => $deviceRegistrationId,

            'token' => $token

        );

        $this
            ->db
            ->insert('api_tokens', $data);

        return $uniqueId;

    }

    public function delete_api_token_members($uniqueId, $deviceRegistrationId)
    {

        if ($uniqueId == '' || $deviceRegistrationId == '')

        return 0;

        $data = array(

            'uniqueId' => $uniqueId,

            'deviceRegistrationId' => $deviceRegistrationId

        );

        if ($this
            ->db
            ->delete("api_tokens", $data))
        {

            return true;

        }

    }

    public function validate_api_token_members($uniqueId, $token)

    {

        if ($uniqueId === '')

        return 0;

        $valid = 1;

        $deviceRegistrationId = '';

        if ($this
            ->input
            ->post_get('deviceRegistrationId')) $deviceRegistrationId = $this
            ->input
            ->post_get('deviceRegistrationId');

        if ($deviceRegistrationId == '')

        return 0;

        $this
            ->db
            ->select('token');

        $this
            ->db
            ->from('api_tokens');

        $this
            ->db
            ->where('uniqueId', $uniqueId);

        if (trim($deviceRegistrationId) != "")

        $this
            ->db
            ->like('deviceRegistrationId', $deviceRegistrationId, 'none');

        $this
            ->db
            ->order_by("created", "DESC");

        $this
            ->db
            ->limit('1');

        $query = $this
            ->db
            ->get();

        if ($query->num_rows() > 0)

        {

            $result_row = $query->row_array();

            $data = array(

                'incomingToken' => $token

            );

            $this
                ->db
                ->set($data);

            $this
                ->db
                ->where('uniqueId', $uniqueId);

            if (trim($deviceRegistrationId) != "")

            $this
                ->db
                ->like('deviceRegistrationId', $deviceRegistrationId, 'none');

            $this
                ->db
                ->update("api_tokens", $data);

            if ($result_row['token'] <> $token)

            $valid = 0;

        }
        else
        {

            $valid = 0;

        }

        return $valid;

    }

}

?>
