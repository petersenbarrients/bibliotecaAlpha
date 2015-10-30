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
					$modal = "
					<div id='nuevaficha' class='modal fade' role='dialog'  data-keyboard='false' data-backdrop='static' >
					<div class='modal-dialog' style='max-width:80%;'>
						<!-- Modal content-->
						<div class='modal-content'>
							<div class='modal-header'>
								<button type='button' onclick='window.location.reload()' class='close' data-dismiss='modal'>&times;</button>
								<h4 class='modal-title'><div class='alert alert-warning' id='alerta4'>
      <strong>¡Cuidado!</strong><br>Está a punto de modificar una etiqueta MARC de un libro registrado,
      podría afectar su ficha base.
      </div></h4>

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
										<div class='panel panel-warning' style='max-width:60%;float:left;'>
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

	function modificar(){
		/*Carga modelo en base al param Id del action
    para despues mostrarlo en la vista*/
		$id = $this->input->post('id');
   $arrayData = array();

	 $arrayDatosDeFicha = array();
	 $isbns = array();
   $this->load->model('libroModel');
   /*retorna el contenido de bd en array assc*/
   $arrayData = $this->libroModel->obtenerLibroPorId($id);
	 /*
	 $this->db->select('id,numero_de_adquisicion,biblioteca,escuela,idColeccion,idEtiquetaMarc,ejemplar,se_presta,tipo_de_material,es_complementario,tomo');
	 $this->db->from('libro');
	 */

	 foreach ($arrayData as $key) {
		 $data['id'] = $key["id"];
     $data['numero_adqui'] = $key["numero_de_adquisicion"];
  	 $data['biblioteca'] = $key["biblioteca"];
  	 $data['escuela'] = $key["escuela"];
  	 $data['coleccion'] = $key["idColeccion"];
  	 $data['ejemplar'] = $key["ejemplar"];
  	 $data['se_presta'] = $key["se_presta"];
  	 $data['tipo_de_material'] = $key["tipo_de_material"];
  	 $data['es_complementario'] = $key["es_complementario"];
  	 $data['tomo'] = $key["tomo"];
		 $data['adqui'] = $key["idEtiquetaMarc"];
	 }
	 /*Carga catalogos*/

	 /*idEtiquetaMarc contiene en valor de idEtiquetaMarc de la tabla libro*/
	 $idEtiquetaMarc = $data["adqui"];

	 $this->load->model('libroModel');
	 $data['colecciones'] =$this->libroModel->listarColecciones();
	 $data['escuelas'] =$this->libroModel->listarEscuelas();
	 $data['bibliotecas'] =$this->libroModel->listarBiblioteca();
	 $data['tipos_material'] =$this->libroModel->listarMaterial();

	 /*carga datos de las etiquetas marc para ofrecer opcion al usuario de su modificacion*/

	 /*Se cargan los datos de la etiqueta marc
	 	isbn,titulo_uniforme, autor_personal, volumen
	 */
	 $arrayDatosDeFicha = $this->libroModel->obtenerInformacionDeFicha($idEtiquetaMarc);
	 $data['etiquetas'] = $arrayDatosDeFicha;

	 /*
	 	Cargar catalogos de fichas->isbns
	 */


	$data =  $this->load->view('Libros/index',$data,TRUE);
  /** $model2 = $this->libroModel->obtenerTituloDelLibro($arrayData['idEtiquetaMarc']);

   $data['titulo_de_libro'] = $model2['titulo_uniforme'];
   $data['autor_personal'] = $model2['autor_personal'];
   $data['volumen'] = $model2['volumen'];
	 $this->load->view('Libros/index',$data);*/
	 $modal ="
		<div id='libro_modal_modificar' class='modal fade bs-example-modal-lg' role='dialog'>
		<div class='modal-dialog modal-lg'>

 <div class='modal-content'>
	<div class='modal-header'>
		<button type='button' class='close' data-dismiss='modal'>&times;</button>
		<h4 class='modal-title'><div class='alert alert-warning' id='alerta4'>
		 <strong>¡Cuidado!</strong><br>Está a punto de modificar un libro registrado,
		 podría afectar su ficha base.
		 </div></h4>
	</div>
	<div class='modal-body'>

	<div class='alert alert-success' id='alerta_exito_mod'>
		<strong>¡Registro modificado!</strong>
	</div>

	 <div class='container' id='modificar_libro_modal'> '.$data.'</div>
	</div>
	<div class='modal-footer'>
		<button type='button' class='btn btn-default' onclick =  'regresarAcervo();' id='clic' data-dismiss='modal'>Close</button>
	</div>
 </div>

</div>
</div>
";
echo $modal;

	}

	public function modificarLibroAction()
	{

		$disponible = 0;
		$id = $this ->input->post('id');


		$numero_adqui = $this ->input -> post('numero_de_adquisicion');
		$numero_ejemplar = $this ->input ->post('ejemplar');
		$numero_tomo = $this ->input ->post('tomo');
		$biblioteca= $this ->input ->post('biblioteca');
		$escuela = $this ->input ->post('escuela');
		$coleccion= $this ->input ->post('coleccion');
		$material= $this ->input ->post('tipo_de_material');
		$se_presta = $this->input->post('myradio');
		$id_marc = $this->input->post('marc');
		$es_complementario = $this->input->post('myradio1');
		$id_marc = $this->input->post('idEtiquetaMarc');
		$marc = null;

		if($numero_ejemplar!=1)
		{
			/*marcar como no disponible por que es el primer ejemplar*/
			$disponible = 1;
		}



		$data = array('numero_de_adquisicion'=>$numero_adqui,
									'biblioteca'=>$biblioteca,
									'escuela'=>$escuela,
									'idColeccion'=>$coleccion,
									'ejemplar'=>$numero_ejemplar,
									'se_presta'=>$se_presta,
									'tipo_de_material'=>$material,
									'es_complementario'=>$es_complementario,
									'idEtiquetaMarc'=>$id_marc,
									'disponible'=>$disponible,
									'tomo'=>$numero_tomo
	 								);

		$this->load->model('libroModel');
		$this->libroModel->modificarLibro($data,$id);


	}

	public function eliminar()
	{
		$id = $this->input->post('id');
		$arrayData = array();

 	 $arrayDatosDeFicha = array();
 	 $isbns = array();
    $this->load->model('libroModel');
    /*retorna el contenido de bd en array assc*/
    $arrayData = $this->libroModel->obtenerLibroPorId($id);
 	 /*
 	 $this->db->select('id,numero_de_adquisicion,biblioteca,escuela,idColeccion,idEtiquetaMarc,ejemplar,se_presta,tipo_de_material,es_complementario,tomo');
 	 $this->db->from('libro');
 	 */

 	 foreach ($arrayData as $key) {
 		 $data['id'] = $key["id"];
      $data['numero_adqui'] = $key["numero_de_adquisicion"];
   	 $data['biblioteca'] = $key["biblioteca"];
   	 $data['escuela'] = $key["escuela"];
   	 $data['coleccion'] = $key["idColeccion"];
		  $data['tipo_de_material'] = $key["tipo_de_material"];
 		 $data['adqui'] = $key["idEtiquetaMarc"];
 	 }

	 $idEtiquetaMarc = $data["adqui"];

	$this->load->model('libroModel');
	$data['colecciones'] =$this->libroModel->listarColecciones();
	$data['escuelas'] =$this->libroModel->listarEscuelas();
	$data['bibliotecas'] =$this->libroModel->listarBiblioteca();
	$data['tipos_material'] =$this->libroModel->listarMaterial();

	/*carga datos de las etiquetas marc para ofrecer opcion al usuario de su modificacion*/

	/*Se cargan los datos de la etiqueta marc
	 isbn,titulo_uniforme, autor_personal, volumen
	*/
	$arrayDatosDeFicha = $this->libroModel->obtenerInformacionDeFicha($idEtiquetaMarc);
	$data['etiquetas'] = $arrayDatosDeFicha;
	$view= $this->load->view('Libros/confEliminar',$data,TRUE);


	$modal ="
		<div id='libro_modal_eliminar' class='modal fade bs-example-modal-lg' role='dialog'>
		<div class='modal-dialog modal-lg'>

<div class='modal-content'>
	<div class='modal-header'>
		<button type='button' class='close' data-dismiss='modal'>&times;</button>
		<h4 class='modal-title'><div class='alert alert-danger' id='alerta4'>
	<strong>¡Cuidado!</strong> Está a punto de eliminar un registro.
	</div></h4>
	</div>
	<div class='modal-body'>
	<div class='alert alert-success' id='alerta_exito_eliminar'>
		<strong>Registro eliminado!</strong>
	</div>
	 <div class='container' id='eliminar_libro_modal'> ".$view."</div>
	</div>
	<div class='modal-footer'>
		<button type='button' class='btn btn-default' onclick =  'regresarAcervo();' id='clic' data-dismiss='modal'>Close</button>
	</div>
</div>
</div>
</div>
";
echo $modal;




	}

	public function eliminarLibroAction()
	{

		$id = $this->input->post('id');
		$this->load->model('libroModel');
		$this->libroModel->eliminarLibro($id);

	}


	/* agregar nuevo ejemplar a ficha*/
	public function NuevoEjemplarBaseFicha(){
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
		$marc = $this->input->post('etiqueta_marc');
		if($numero_ejemplar!=1)
		{
			/*marcar como no disponible por que es el primer ejemplar*/
			$disponible = 1;
		}

		$this->load->model('libroModel');
		$this->libroModel->crearModelo($numero_adqui,$biblioteca,$escuela,$coleccion,$numero_ejemplar,$se_presta,$material,$es_complementario,$marc,$disponible,$numero_tomo);
		$this->libroModel->nuevoLibro();

		//redirect('Registro/');
	}

	/* listado de libros*/
public function listarLibros(){

	$dataText = $this->input->post('id');
	$this->load->model('libroModel');
	$Consulta =  $this->libroModel->consultarLibros($dataText);
	if(is_null($Consulta)){
		echo '{"data":[]}';
	}
	else {
		$enco = json_encode($Consulta);
		echo '{"data":'.$enco.'}';
	}
}



}
