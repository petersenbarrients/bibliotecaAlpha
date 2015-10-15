<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catalogacion extends CI_Controller{

  public function index(){

  }

  public function nuevaFicha(){

     $this->load->model('CatalogacionModel');
     $this->CatalogacionModel->insert_nueva_ficha();
     $this->load->view('Registro/index');
  }


}
