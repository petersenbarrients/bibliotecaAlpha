<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CatalogacionModel extends CI_Model{

  public function __construct(){
      parent::__construct();/*constructor de la clase padre Model*/
      $this->load->database();/*Permite accesos a la base de datos*/
  }


  public function insert_nueva(
    $isbn,
    $clasificacion_decimal_dewey,
    $autor_personal,
    $autor_cooporativo,
    $asiento_por_titulo_uniforme,
    $titulo_uniforme,
    $variante_de_titulo,
    $edicion_mencion_edicion,
    $lugar_editorial,
    $volumen,
    $notas_generales,
    $liga_a_recursos_electronicos,
    $fecha_publicacion,
    $editorial)
  {

    $data = array(

      'isbn' => $isbn,
      'clasificacion_decimal_dewey' =>  $clasificacion_decimal_dewey,
      'autor_personal'  =>  $autor_personal,
      'autor_cooporativo' => $autor_cooporativo,
      'asiento_por_titulo_uniforme' =>  $asiento_por_titulo_uniforme,
      'titulo_uniforme' =>  $titulo_uniforme,
      'variante_de_titulo'  =>  $variante_de_titulo,
      'edicion_mencion_edicion' =>  $edicion_mencion_edicion,
      'lugar_editorial' =>  $lugar_editorial,
      'volumen' =>  $volumen,
      'notas_generales' =>  $notas_generales,
      'liga_a_recursos_electronicos'  =>  $liga_a_recursos_electronicos,
      'fecha_publicacion' =>  $fecha_publicacion,
      'editorial' =>  $editorial
    );


    $this->db->insert('etiqueta_marc', $data);
  }

  public function consultarDatos($cadena){
    //$tableInfo = array ("isbn","autor_personal");
    $this->db->select("isbn, autor_personal, asiento_por_titulo_uniforme, titulo_uniforme, edicion_mencion_edicion, lugar_editorial, volumen, editorial");
    $this->db->like('autor_personal', $cadena);
    $this->db->or_like('titulo_uniforme', $cadena);
    $arregloPadre = array();
    $query = $this->db->get('etiqueta_marc');
    //$query->result();

    $toReturn  = array();
    foreach ($query->result() as $row) {
      /*Escribe la consulta en un arreglo asociativo*/
       // $toReturn[htmlspecialchars($row->id,ENT_QUOTES)] = htmlspecialchars($row->nombre,ENT_QUOTES);
      array_push($arregloPadre, $row);
    }
    $query->free_result();
    return $arregloPadre;

  }

  public function select_id($isbn){

    $query = $this->db->get_where('etiqueta_marc',array('isbn' => $isbn));
    if($query->num_rows() > 0 )
    {

        $row = $query->row();
        return (int)$row->id;
    }
    else {
      echo 'no hay registros'." isbn".$isbn;
    }

  }

}
