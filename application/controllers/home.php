<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {

	//cargar helpers
	public function __construct(){

		 parent::__construct();
		 $this->load->helper('divs');
		 $this->load->helper('form');

	}

	public function index(){

	 $this->load->view('Principal/Index');
	}

}
