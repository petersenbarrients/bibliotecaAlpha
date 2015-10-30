<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ficha extends CI_Controller {

	public function __construct(){

		 parent::__construct();
		 $this->load->helper('divs');
		 $this->load->helper('form');

	}

	public function modificar(){
			$id = $this->input->post('id');
    /*Carga modelo en base al param Id del action
    para despues mostrarlo en la vista*/
    $arrayData = array();
   $this->load->model('FichaModel');
   /*retorna el contenido de bd en array assc*/
   $model = $this->FichaModel->obtenerFichaPorId($id);
   $arrayData = $model;
   $data["model"] = $arrayData;
	$vista = $this->load->view('Fichas/Index',$data,TRUE);
	$modal ="
		 <div id='ficha_modal_modificar' class='modal fade bs-example-modal-lg' role='dialog'>
		 <div class='modal-dialog modal-lg'>

 <div class='modal-content'>
	 <div class='modal-header'>
		 <button type='button' class='close' data-dismiss='modal'>&times;</button>
		 <h4 class='modal-title'><div class='alert alert-warning' id='alerta4'>
      <strong>¡Cuidado!</strong><br>Al modificar esta ficha afectarás a los ejemplares asociados.
      </div></h4>
			<div class='alert alert-success' id='alerta_modificar_exito_abc'>
			  <strong>Cambios aplicados!</strong>
			</div>
	 </div>
	 <div class='modal-body'>
		<div class='container'> ".$vista."</div>
	 </div>
	 <div class='modal-footer'>
		 <button type='button' class='btn btn-default'  onclick =  'regresarAcervo();' id='clic' data-dismiss='modal'>Close</button>
	 </div>
 </div>

</div>
</div>
";
echo $modal;


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
  public function eliminar()
  {
 		$id = $this->input->post('id');
		/*Carga modelo en base al param Id del action
		para despues mostrarlo en la vista*/
		$arrayData = array();
	 $this->load->model('FichaModel');
	 /*retorna el contenido de bd en array assc*/
	 $model = $this->FichaModel->obtenerFichaPorId($id);
	 $arrayData = $model;
	$data["model"] = $arrayData;
	 $vista = $this->load->view('Fichas/confEliminar',$data,TRUE);
	 $modal ="
		 <div id='ficha_modal_eliminar' class='modal fade bs-example-modal-lg' role='dialog'>
		 <div class='modal-dialog modal-lg'>

	<div class='modal-content'>
	 <div class='modal-header'>
		 <button type='button' class='close' data-dismiss='modal'>&times;</button>
		 <h4 class='modal-title'><div class='alert alert-danger' id='alerta4'>
      <strong>¡Cuidado!</strong><br>Al eliminar la ficha se eliminaran sus ejemplares asociados.
      </div></h4>
	 </div>
	 <div class='modal-body'>
			<div class='container'> ".$vista."</div>
	 </div>
	 <div class='modal-footer'>
		 <button type='button' class='btn btn-default'  onclick =  'regresarAcervo();' id='clic' data-dismiss='modal'>Close</button>
	 </div>
	</div>

 </div>
 </div>
 ";
 echo $modal;

  }

  /*Realiza action de eliminar el registro*/
   public function ActionEliminar()
   {

		 		$id = $this->input->post('id');
				$this->load->model('FichaModel');
				$this->FichaModel->eliminarficha($id);

   }

	public function obtenerISBN()
	 {
		 	$isbn = $this->input->post('isbn');
			$this->load->model('FichaModel');
			$retornoACliente = $this->FichaModel->obtenerISBN($isbn);
			if($retornoACliente == null)
			{
					echo "FALSE";
			}
			else
			{
				$json = array();
				foreach ($retornoACliente as $key) {

						array_push($json,$key['id']);
						array_push($json,$key['isbn']);
						array_push($json,$key['autor_personal']);
						array_push($json,$key['titulo_uniforme']);

				}

				echo json_encode($json);
			}

	 }

}
