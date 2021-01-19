<?php defined('BASEPATH') OR exit('No direct script access allowed');

$config = array(
    'protocol' => 'smtp',
  
   
     'smtp_host' => 'smtp.googlemail.com',
    'smtp_user' => 'metromindhospital@gmail.com',
    'smtp_pass' => 'metromind%8',    
    'smtp_port' => 465,
    'smtp_crypto'=>'ssl',
    // 'smtp_port' => 587,
    // 'smtp_crypto'=>'tls',
    '_smtp_auth'=>TRUE,
    'crlf' => "\r\n",
    'newline' => "\r\n"
);
?>
