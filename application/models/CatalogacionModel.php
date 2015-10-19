<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CatalogacionModel extends CI_Model{

  public function __construct(){

      parent::__construct();
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

}
