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

  /*Esta action modificara el registro
  public function modificar()
  {

  }

/*Muestra en pantalla la confirmacion para realizar la eliminacion de laficha
  public function eliminar($id)
  {



  }

  /*Realiza action de eliminar el registro
   public function eliminar()
   {



   }*/

}
