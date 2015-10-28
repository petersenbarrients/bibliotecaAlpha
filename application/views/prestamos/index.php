<!DOCTYPE html>
<html>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  	<?php $this->load->view('/Shared/Partial/head');?>
  <head>

  <title>Préstamos</title>

  </head>

  <body>
  	<?php $this->load->view('/Shared/Partial/body');?>

  	<!-- PESTAÑAS DE OPCIONES -->

  	<div class="container" style="width:70% !important;">
    <div class="panel panel-primary" >

        <div class="panel-heading"><center>Seleccione un tipo de préstamo<center></div>
        <div class="panel-body">
            <ul class="nav nav-tabs nav-justified">
                <li role="presentation" class="active"><a  data-toggle="tab" href="#nuevo_registro"><span class="glyphicon glyphicon-tasks">Préstamos Internos</span></a></li>
                <li role="presentation"><a data-toggle="tab" href="#en_base"><span class="glyphicon glyphicon-tasks">Préstamos Externos</span></a></li>
            </ul>
            <div class="tab-content">



                    <div id="nuevo_registro" class="tab-pane fade in active">

                    <div class="form-group">
                    </br>
                      <div class="panel panel-info">
                        <div class="panel-body">
                          <div class="container">
                              <div class="row">
                                  <center><div class="col-xs-12 col-sm-3 col-md-3"> <input style="max-width:90%;"type="text" id="numero_adqui" autofocus='autofocus' class="form-control" placeholder="Número de adquisición"> </div></center>
                                  <center><div class="col-xs-12 col-sm-3 col-md-3"><button style="max-width:90%; " class="btn btn-primary btn-block margin-bottom-lg" id="btnBuscarAdqui"><span class="glyphicon glyphicon-search" aria-hidden="true"> Buscar</span></button></div></center>
                                  <center></center>
                                  </div>
    							</div>
  							</div>
						</div>
						</br>
					</div>
            	</div>


          <div id="en_base" class="tab-pane fade">
          esta es una prueba
          </div> 

  </body>

	<footer>
		<?php $this->load->view('/Shared/Partial/footer');?>
	</footer>

</html>