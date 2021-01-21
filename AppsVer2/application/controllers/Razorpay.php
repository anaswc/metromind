<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions

/** @noinspection PhpIncludeInspection */

//To Solve File REST_Controller not found

require APPPATH . 'libraries/REST_Controller.php';

require APPPATH . 'libraries/Format.php';

class Razorpay extends CI_Controller

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

    }
    function verification_post()
    {
		
		$result = $this->Patient_model->add_payment_webhook();
		if($result)
		{
			print_r($result);
		
		}
		else {
			echo "succcess";
		}
		
    }

}
