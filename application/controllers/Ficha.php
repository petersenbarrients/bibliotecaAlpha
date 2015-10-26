<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ficha extends CI_Controller {

	//cargar helpers
	public function __construct(){

		 parent::__construct();

	}

	public function modificar($id){
    /*Carga modelo en base al param Id del action*/

	 $this->load->view('Index',$model);

	}

  public function modificar($id){}
}
