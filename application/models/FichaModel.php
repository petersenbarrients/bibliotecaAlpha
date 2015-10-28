<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FichaModel extends CI_Model{

  public function __construct(){
      parent::__construct();/*constructor de la clase padre Model*/
      $this->load->database();/*Permite accesos a la base de datos*/
  }

  public function obtenerFichaPorId($id)
  {
    /*obtener isbn, autor,titulo uniforme, numero de ejemplares relacionados a esta ficha*/
    $this->db->select('id,
	                    isbn,
	                    clasificacion_decimal_dewey,
	                    autor_personal,
	                    autor_cooporativo,
	                    asiento_por_titulo_uniforme,
	                    titulo_uniforme,
	                    variante_de_titulo,
	                    edicion_mencion_edicion,
	                    lugar_editorial,
	                    volumen,
	                    notas_generales,
	                    notas_de_contenido,
	                    liga_a_recursos_electronicos,
	                    fecha_publicacion,
	                    editorial');
    $this->db->from('etiqueta_marc');
    $this->db->where('id', $id);
    $query = $this->db->get();
    return $query->result_array();


  }

  public function modificar($id,$data)
  {
    $this->db->where('id', $id);
    $this->db->update('etiqueta_marc', $data);
  }


/*eliminar la etiqueta_marc en base al id de param*/
  public function eliminarficha($id)
  {

    $this->db->delete('etiqueta_marc', array('id' => $id));

  }

  public function obtenerISBN($isbn)
  {
    $this->db->select("id,isbn,autor_personal,titulo_uniforme");
    $this->db->from('etiqueta_marc');
    $this->db->where('isbn', $isbn);
    $query = $this->db->get();
    return $query->result_array();
  }


}
