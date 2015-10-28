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

      $this->db->select("id,isbn,autor_personal,titulo_uniforme,lugar_editorial");
      $this->db->like('titulo_uniforme', $cadena);
      $query = $this->db->get('etiqueta_marc');

        $results= array();
        foreach ($query->result_array() as $row){

          $results[] = array(
            'id'=>$row['id'],
           'isbn'=> $row['isbn'],
           'autor' => $row['autor_personal'],
           'titulo' => $row['titulo_uniforme'],
           'lugar' => $row['lugar_editorial']
          );


        }

        return $results;

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

  public function eliminarEjemplar($id){
    $data = array(
      'id' => $id
      );
    echo "Data tiene esto: ".$data;
    $this->db->where('id', $id);
    $this->db->delete('libro', $data);
  }

}
