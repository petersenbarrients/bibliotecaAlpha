<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class libro extends CI_Controller {
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
						//echo $numero_tomo."</br>".$numero_ejemplar."</br>".$numero_adqui."</br>".$biblioteca."</br>".$escuela."</br>".$coleccion."</br>".$material."</br>".$se_presta."</br>".$es_complementario;
						redirect("registro/");
	}
}
