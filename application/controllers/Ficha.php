<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ficha extends CI_Controller {

	public function __construct(){

		 parent::__construct();
		 $this->load->helper('divs');
		 $this->load->helper('form');

	}

	public function modificar($id){
    /*Carga modelo en base al param Id del action
    para despues mostrarlo en la vista*/
    $arrayData = array();
   $this->load->model('FichaModel');
   /*retorna el contenido de bd en array assc*/
   $model = $this->FichaModel->obtenerFichaPorId($id);
   $arrayData = $model;
   $data["model"] = $arrayData;
	 $this->load->view('Fichas/Index',$data);

	}

  /*Esta action modificara el registro*/
  public function actionModificar()
  {
		$id = $this->input->post('id');
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

		$data = array('isbn'=>$isbn,
									'clasificacion_decimal_dewey'=>$clasificacion_decimal_dewey,
									'autor_personal'=>$autor_personal,
									'autor_cooporativo'=>$autor_cooporativo,
									'asiento_por_titulo_uniforme'=>$asiento_por_titulo_uniforme,
									'titulo_uniforme'=>$titulo_uniforme,
									'variante_de_titulo'=>$variante_de_titulo,
									'edicion_mencion_edicion'=>$edicion_mencion_edicion,
									'lugar_editorial'=>$lugar_editorial,
									'volumen'=>$volumen,
									'notas_generales'=>$notas_generales,
									'notas_de_contenido'=>$notas_de_contenido,
									'liga_a_recursos_electronicos'=>$liga_a_recursos_electronicos,
									'fecha_publicacion'=>$fecha_publicacion,
									'editorial'=>$editorial
	 								);

		$this->load->model('FichaModel');
		$this->FichaModel->modificar($id,$data);
  }

/*Muestra en pantalla la confirmacion para realizar la eliminacion de laficha*/
  public function eliminar($id)
  {

		/*Carga modelo en base al param Id del action
		para despues mostrarlo en la vista*/
		$arrayData = array();
	 $this->load->model('FichaModel');
	 /*retorna el contenido de bd en array assc*/
	 $model = $this->FichaModel->obtenerFichaPorId($id);
	 $arrayData = $model;
	 $data["model"] = $arrayData;
	 $this->load->view('Fichas/confEliminar',$data);

  }

  /*Realiza action de eliminar el registro*/
   public function ActionEliminar()
   {

		 		$id = $this->input->post('id');
				$this->load->model('FichaModel');
				$this->FichaModel->eliminarficha($id);

   }

}
