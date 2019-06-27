<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


	
	public function index()
	{   
		// echo $_SERVER["PHP_SELF"];
			

		
		// die();
			// require_once APPPATH.'vendor/autoload.php';
			// $this->load->library(base_url('bogio_analytics/vendor/autoload')) ;
			$this->load->library('general_routines.php');
			$data['title'] = "Best soccer prediction website.";
			$this->load->view('head', $data);
			$this->load->view('index');
			$this->load->view('footer');
	}

	


}

