<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
| ------------------------------------------------------------------- 
| EMAIL CONFING 
| ------------------------------------------------------------------- 
| Configuration of outgoing mail server. 
| */

// $config['protocol'] = 'smtp';
// //$config['smtp_host'] = 'gator4124.hostgator.com';
// $config['smtp_host'] = 'sh101.subhosting.net';  
// $config['smtp_port'] = '587';
// //$config['smtp_port'] = '25';  
// $config['smtp_timeout'] = '30';  
// $config['smtp_user'] = 'info@drupal.webcastle.in';  
// $config['smtp_pass'] = 'kL?[Y_.f2aE]';
// $config['charset'] = 'utf-8';
// $config['mailtype'] = 'html';
// $config['wordwrap'] = TRUE;
// $config['newline'] = "\r\n";



$config = Array(
    'protocol' => 'sendmail',
	'smtp_host' => 'sh101.subhosting.net',
	'smtp_port' => '587',
	'smtp_crypto' => 'tls',
	'smtp_user' => 'info@drupal.webcastle.in',
	'smtp_pass' => 'kL?[Y_.f2aE]',
	'mailtype'  => 'html',
	'charset'   => 'utf-8'
);


/* End of file email.php */  
/* Location: ./system/application/config/email.php */