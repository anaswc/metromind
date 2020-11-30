<?php defined('BASEPATH') OR exit('No direct script access allowed');

$config = array(
    'protocol' => 'smtp',
  
    'smtp_host' => 'sh101.hostingsrv.net',
     
    'smtp_user' => 'webcastle@drupal.webcastle.in',
   
    'smtp_pass' => 's4(u{+5L*Tji',
     // 'smtp_host' => 'smtp.googlemail.com',
    // 'smtp_user' => 'usert0562@gmail.com',
    // 'smtp_pass' => 'user#test@009',    
    // 'smtp_port' => 465,
    // 'smtp_crypto'=>'ssl',
    'smtp_port' => 587,
    'smtp_crypto'=>'tls',
    '_smtp_auth'=>TRUE,
    'crlf' => "\r\n",
    'newline' => "\r\n"
);
?>
