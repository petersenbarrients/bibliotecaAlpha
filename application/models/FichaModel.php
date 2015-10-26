<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CatalogacionModel extends CI_Model{

  public function __construct(){
      parent::__construct();/*constructor de la clase padre Model*/
      $this->load->database();/*Permite accesos a la base de datos*/
  }

  public function obtenerFichaPorId($id)
  {
    $this->db->select('title, content, date');
    $this->db->from('mytable');
    $this->db->where('id', $id);


  }

  public function eliminarficha($id)
  {

    

  }


}
