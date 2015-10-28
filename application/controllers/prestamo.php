<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prestamo extends CI_Controller{

	public function __construct(){

   parent::__construct();
   $this->load->helper('divs');
   $this->load->helper('form');

	}


	public function index(){

		$this->load->view('prestamos/index');

	}	


}
?>

