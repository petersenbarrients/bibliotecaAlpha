<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class libroModel extends CI_Model{

  public $numero_de_adquisicion;
  public $biblioteca;
  public $escuela;
  public $idColeccion;
  public $ejemplar;
  public $se_presta;
  public $tipo_de_material;
  public $es_complementario;
  public $idEtiquetaMarc;
  public $disponible;
  public $tomo;

  public function __construct(){
      parent::__construct();/*constructor de la clase padre Model*/
      $this->load->database();/*Permite accesos a la base de datos*/
  }

  public function crearModelo($numero_adqui,$biblioteca,$escuela,$coleccion,$numero_ejemplar,$se_presta,$material,$es_complementario,$id,$disponible,$numero_tomo)
  {
    $this->numero_de_adquisicion=$numero_adqui;
    $this->biblioteca=$biblioteca;
    $this->escuela=$escuela;
    $this->idColeccion=$coleccion;
    $this->ejemplar=$numero_ejemplar;
    $this->se_presta=$se_presta;
    $this->tipo_de_material=$material;
    $this->es_complementario=$es_complementario;
    $this->idEtiquetaMarc=$id;
    $this->disponible = $disponible;
    $this->tomo = $numero_tomo;

  }

  public function nuevoLibro()
  {
    /*modifique tabla libro todos los campos de bit a int*/
    $this->db->set($this);
    $this->db->insert($this->db->dbprefix . 'libro');
  }

  public function listarColecciones()
  {
      /*Campos a obtener*/
    $this->db->select('id,nombre');
      /*nombre de la tabla*/
    $query = $this->db->get('coleccion');
    $toReturn  = array();
    foreach ($query->result() as $row) {
      /*Es escribe la consulta en un arreglo asociativo*/
        $toReturn[htmlspecialchars($row->id,ENT_QUOTES)] = htmlspecialchars($row->nombre,ENT_QUOTES);
    }
    $query->free_result();
    return $toReturn;
  }

  public function listarEscuelas()
  {
      /*campos a obtener*/
    $this->db->select('id,nombre');
      /*nombre de la tabla*/
    $query = $this->db->get('escuela');
    $toReturn  = array();
    foreach ($query->result() as $row) {
        $toReturn[htmlspecialchars($row->id,ENT_QUOTES)] = htmlspecialchars($row->nombre,ENT_QUOTES);
    }
    $query->free_result();
    return $toReturn;
  }

  public function listarBiblioteca()
  {
    /*Campos a obtener*/

    $this->db->select('id,nombre');
      /*nombre de la tabla*/
    $query = $this->db->get('biblioteca');
    $toReturn  = array();
    foreach ($query->result() as $row) {
        $toReturn[htmlspecialchars($row->id,ENT_QUOTES)] = htmlspecialchars($row->nombre,ENT_QUOTES);
    }
    $query->free_result();
    return $toReturn;
  }

  public function listarMaterial()
  {
    /*Campos a obtener*/
    $this->db->select('id,nombre');
    /*nombre de la tabla*/
    $query = $this->db->get('tipo_material');
    $toReturn  = array();
    foreach ($query->result() as $row) {
        $toReturn[htmlspecialchars($row->id,ENT_QUOTES)] = htmlspecialchars($row->nombre,ENT_QUOTES);
    }
    $query->free_result();
    return $toReturn;
  }

  public function modificarEtiquetaMarcLibro($idEtiquetaMarc,$numero_adqui)
  {
    echo $idEtiquetaMarc." <--> ".$numero_adqui;
    $data = array(
               'idEtiquetaMarc' => $idEtiquetaMarc
            );
            $this->db->where('numero_de_adquisicion', $numero_adqui);
            $this->db->update('libro', $data);
  }

public function obtenerLibroPorId($id){


    $this->db->select('id,numero_de_adquisicion,biblioteca,escuela,idColeccion,idEtiquetaMarc,ejemplar,se_presta,tipo_de_material,es_complementario,tomo');
    $this->db->from('libro');
    $this->db->where('id', $id);
    $query = $this->db->get();
    return $query->result_array();
}


public function modificarLibro($data,$id)
{
    $this->db->where('id', $id);
    $this->db->update('libro', $data);
}


/*Para modificar el el libro, tener en cuenta isbn, titulo,autor,*/
public function obtenerInformacionDeFicha($id){
  $this->db->select('id,isbn,titulo_uniforme, autor_personal, volumen');
  $this->db->from('etiqueta_marc');
  $this->db->where('id', $id);
  $query = $this->db->get();
  return $query->result_array();


}


public function eliminarLibro($id)
  {
      $this->db->delete('libro', array('id' => $id));
  }


  /*listado de libros*/
public function consultarLibros($cadena){

    $this->db->select("id,numero_de_adquisicion,ejemplar");
    $query = $this->db->get_where('libro',array('idEtiquetaMarc' => $cadena));

    $results= array();
    foreach ($query->result_array() as $row){

      $results[] = array(
        'id'=>$row['id'],
       'adquisicion'=> $row['numero_de_adquisicion'],
       'ejemplar' => $row['ejemplar']
      );

    }

    return $results;
  }



}
