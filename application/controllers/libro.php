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
							$isbn = $this->input->post('isbn');
						$marc = null;
						if($numero_ejemplar!=1)
						{
							/*marcar como no disponible por que es el primer ejemplar*/
							$disponible = 1;
						}
						$this->load->model('CatalogacionModel');
						$id = $this->CatalogacionModel->select_id($isbn);
						echo $id;
						$this->load->model('libroModel');
						$this->libroModel->crearModelo($numero_adqui,$biblioteca,$escuela,$coleccion,$numero_ejemplar,$se_presta,$material,$es_complementario,$id,$disponible,$numero_tomo);
						$this->libroModel->nuevoLibro();

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

		$this->load->view('Registro/index');
	}


}
