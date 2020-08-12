<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
| ------------------------------------------------------------------- 
| EMAIL CONFING 
| ------------------------------------------------------------------- 
| Configuration of outgoing mail server. 
| */

$config['protocol'] = 'smtp';
$config['smtp_host'] = 'gator4124.hostgator.com';  
$config['smtp_port'] = '25';  
$config['smtp_timeout'] = '30';  
$config['smtp_user'] = '';  
$config['smtp_pass'] = '';
$config['charset'] = 'utf-8';
$config['mailtype'] = 'html';
$config['wordwrap'] = TRUE;
$config['newline'] = "\r\n";

/* End of file email.php */  
/* Location: ./system/application/config/email.php */