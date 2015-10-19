<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catalogacion extends CI_Controller{

//cargar helpers
public function __construct(){

   parent::__construct();
   $this->load->helper('divs');
   $this->load->helper('form');

}
public function index(){

}



public function nueva(){

  $isbn = $this->input->post('isbn');
  $clasificacion_decimal_dewey = $this->input->post('clasificacion_dewey');
  $autor_personal = $this->input->post('autor_personal');
  $autor_cooporativo = $this->input->post('autor_corporativo');
  $asiento_por_titulo_uniforme = $this->input->post('asiento_por_titulo');
  $titulo_uniforme = $this->input->post('titulo_uniforme');
  $variante_de_titulo = $this->input->post('variante_titulo');
  $edicion_mencion_edicion = $this->input->post('edicion_mencion');
  $lugar_editorial = $this->input->post('lugar_editorial');
  $volumen = $this->input->post('volumen');
  $notas_generales = $this->input->post('notas_generales');
  $notas_de_contenido = $this->input->post('notas_contenido');
  $liga_a_recursos_electronicos = $this->input->post('liga_recursos');
  $fecha_publicacion = $this->input->post('fecha_publicacion');
  $editorial = $this->input->post('editorial');

  $this->load->model('CatalogacionModel');

  $this->CatalogacionModel->insert_nueva(
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
    $editorial
  );
    $this->load->view('Registro/index');
}


}
