<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CatalogacionModel extends CI_Model{

  public function __construct(){

      parent::__construct();
  }

  public function insert_nueva_ficha(){

    $this->isbn = $_POST['isbn'];
    $this->clasificacion_decimal_dewey = $_POST['clasificacion_dewey'];
    $this->autor_personal = $_POST['autor_personal'];
    $this->autor_cooporativo = $_POST['autor_corporativo'];
    $this->asiento_por_titulo_uniforme = $_POST['asiento_por_titulo'];
    $this->titulo_uniforme = $_POST['titulo_uniforme'];
    $this->variante_de_titulo = $_POST['variante_titulo'];
    $this->edicion_mencion_edicion = $_POST['edicion_mencion'];
    $this->lugar_editorial = $_POST['lugar_editorial'];
    $this->volumen = $_POST['volumen'];
    $this->notas_generales = $_POST['notas_generales'];
    $this->notas_de_contenido = $_POST['notas_contenido'];
    $this->liga_a_recursos_electronicos = $_POST['liga_recursos'];
    $this->fecha_publicacion = $_POST['fecha_publicacion'];
    $this->editorial = $_POST['editorial'];



    $this->db->insert('etiqueta_marc', $this);
  }

}
