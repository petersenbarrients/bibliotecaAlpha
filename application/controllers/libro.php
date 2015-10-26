<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class libro extends CI_Controller {

	public function __construct(){

	   parent::__construct();
	   $this->load->helper('divs');
	   $this->load->helper('form');

	}

	public function index()
	{
	}

  public function nuevoLibro()
  {
						$disponible = 0;

            $numero_adqui = $this -> input -> post('numero_adqui');
            $numero_ejemplar = $this -> input ->post('numero_ejemplar');
            $numero_tomo = $this -> input ->post('numero_tomo');
            $biblioteca= $this ->input ->post('biblioteca');
            $escuela = $this ->input ->post('escuela');
            $coleccion= $this ->input ->post('coleccion');
            $material= $this ->input ->post('material');
            $se_presta = $this->input->post('myradio');
            $es_complementario = $this->input->post('myradio1');
						$marc = null;
						if($numero_ejemplar!=1)
						{
							/*marcar como no disponible por que es el primer ejemplar*/
							$disponible = 1;
						}
						$this->load->model('libroModel');
						$this->libroModel->crearModelo($numero_adqui,$biblioteca,$escuela,$coleccion,$numero_ejemplar,$se_presta,$material,$es_complementario,$marc,$disponible,$numero_tomo);
						$this->libroModel->nuevoLibro();

						/*data es la variabla para guardar la vista parcial con los campos, estos campos deberan ser agregardos al form declaradado dentro de la variabel modal*/
						$data = $this->load->view('Shared/templates/nuevaFichaModal','', TRUE);

					//$data = $this->load->view('Shared/Partial/nuevaficha','', TRUE);

					/*Retorna modal para registrar datos de la etiqueta marc..*/
					$modal = "<div id='nuevaficha' class='modal fade' role='dialog' >
					<div class='modal-dialog' style='max-width:80%;'>
						<!-- Modal content-->
						<div class='modal-content'>
							<div class='modal-header'>
								<button type='button' onclick='window.location.reload()' class='close' data-dismiss='modal'>&times;</button>
								<h4 class='modal-title'>Etiquetas marc del ejemplar(es)</h4>
							</div>
							<div class='modal-body'>
							<div class='container'>
								<div class='row' id='insertar'>
									<div class='col-xs-6 col-md-4' id='borrar'>
									<div class='container'>
											<div class='row'>
												<div class='col-md-6'>
												<form id='formModal' onsubmit='sendSubmitModal();' method='POST' class = 'form-horizontal col-xs-6 col-sm-6 col-md-6 col-xl-6','role'='form'>
													".$data."
												</form>
												</div>
											</div>
									</div>

									</div>
								</br></br><div class='col-xs-6 col-md-3'>
										<div class='panel panel-primary' style='max-width:60%;float:left;'>
												<div class='panel-heading' class='col-xs-6 col-md-3'>
														<h2 class='panel-title'><span class='glyphicon glyphicon-list-alt'></span><p style='font-size:9px;'>Números de adquisición a ser asociados</p></h2>
												</div>
												<div class='panel-body'>
														<div id='verAdqui'></div>
												</div>
										</div>
									</div>
								</div>
							</div>
									<div class='modal-footer'>
								<button type='button' onclick='window.location.reload()' class='btn btn-default' data-dismiss='modal'>Close</button>
							</div>
						</div>
					</div>
				</div>
					</div>
					";
			echo $modal;
	}

/*metodo para actualizar los idEtiquetaMarc de la tabla libro
	Listas: listas de numeros de adquisicion o numero de adquisicion que seran actualizados.
	isbn, es el parametro para realizar la busqueda del id en la etiqueta marc para despues ser agregado a los ejemplares(numeros de adquisicion) recibidos
*/
	public function modificarMarcLibro()
	{
		  $isbn = $this->input->post('isbn');
			$listas = $this->input->post('listas');
			/*cargar id del isbn*/
			$this->load->model('CatalogacionModel');
			$idEtiquetaMarc =  $this->CatalogacionModel->select_id($isbn);

			$listas_decode = json_decode($listas);
			//se carga el model libro para reaizar la actualizacion
			$this->load->model('libroModel');
			echo "listas ".$listas_decode;
			//*update libro en campo idEtiquetaMarc==etiqueta_marc.id where numero_adqui is in listas*/
			for ($i=0; i<sizeof($listas_decode); $i++) {

					$this->libroModel-> modificarEtiquetaMarcLibro($idEtiquetaMarc,$listas_decode[$i]);

			}

		echo "isbn -> ".$isbn."--- listas -> ".$listas." marc-> ".$idEtiquetaMarc;

	}


	public function NuevoBaseFicha(){

		$disponible = 0;

		$numero_adqui = $this -> input -> post('numero_adqui');
		$numero_ejemplar = $this -> input ->post('numero_ejemplar');
		$numero_tomo = $this -> input ->post('numero_tomo');
		$biblioteca= $this ->input ->post('biblioteca');
		$escuela = $this ->input ->post('escuela');
		$coleccion= $this ->input ->post('coleccion');
		$material= $this ->input ->post('material');
		$se_presta = $this->input->post('myradio');

		$es_complementario = $this->input->post('myradio1');
		$isbn = $this->input->post('isbn');
		$marc = null;
		if($numero_ejemplar!=1)
		{
			/*marcar como no disponible por que es el primer ejemplar*/
			$disponible = 1;
		}
		$this->load->model('CatalogacionModel');
		$id =  $this->CatalogacionModel->select_id($isbn);

		$this->load->model('libroModel');
		$this->libroModel->crearModelo($numero_adqui,$biblioteca,$escuela,$coleccion,$numero_ejemplar,$se_presta,$material,$es_complementario,$id,$disponible,$numero_tomo);
		$this->libroModel->nuevoLibro();

		redirect('Registro/');
	}
}
