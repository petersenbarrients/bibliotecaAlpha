<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PrestamoModel extends CI_Model{

  public function __construct(){
      parent::__construct();/*constructor de la clase padre Model*/
      $this->load->database();/*Permite accesos a la base de datos*/
  }

  
  
}