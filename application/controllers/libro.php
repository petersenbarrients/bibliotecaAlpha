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
						$this->load->model('libroModel');
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
						$this->libroModel->crearModelo($numero_adqui,$biblioteca,$escuela,$coleccion,$numero_ejemplar,$se_presta,$material,$es_complementario,null,$disponible,$numero_tomo);
						$this->libroModel->nuevoLibro();
					//$view = $this->load->view('Shared/Partial/nuevaficha','',true);
					//$msg = ;
					$data = $this->load->view('Shared/Partial/nuevaficha','', TRUE);

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
										'.$data.'
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
						//echo $numero_tomo.'</br>'.$numero_ejemplar.'</br>'.$numero_adqui.'</br>'.$biblioteca.'</br>'.$escuela.'</br>'.$coleccion.'</br>'.$material.'</br>'.$se_presta.'</br>'.$es_complementario;
			echo $modal;
	}
}
