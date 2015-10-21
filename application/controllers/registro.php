<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class registro extends CI_Controller {

	//cargar helpers
	public function __construct(){

		 parent::__construct();
		 $this->load->helper('divs');
		 $this->load->helper('form');

	}

	public function index()
	{
		$this->load->model('libroModel');
	 	$datos['colecciones'] =$this->libroModel->listarColecciones();
	 	$datos['escuelas'] =$this->libroModel->listarEscuelas();
	 	$datos['bibliotecas'] =$this->libroModel->listarBiblioteca();
	  $datos['tipos_material'] =$this->libroModel->listarMaterial();
	 	$this->load->view('Registro/Index',$datos);
	}

}
