<!DOCTYPE html>
<html>
  <?php $this->load->view('/Shared/Partial/head');?>
  <head>
    <script type="text/javascript">
      $(document).ready(function() {

        $('#lanzar_alerta').click(function() {
          alert('hola mundo!');
        });

      });
    </script>
  </head>

<body>
<?php $this->load->view('/Shared/Partial/body');?>
<div class="container" style="width:60% !important;">
    <div class="panel panel-primary" >

        <div class="panel-heading"><center>Seleccione opción para registro de material<center></div>
        <div class="panel-body">
            <ul class="nav nav-tabs nav-justified">
                <li role="presentation" class="active"><a  data-toggle="tab" href="#nuevo_registro">Recepción de nuevo material</a></li>
                <li role="presentation"><a data-toggle="tab" href="#en_base">En base a acervo existente</a></li>
                <li role="presentation"><a data-toggle="tab" href="#nueva_ficha">Nueva ficha</a></li>
            </ul>
            <div class="tab-content">

                <div id="nuevo_registro" class="tab-pane fade in active">
                    <form>
                        <button class="btn btn-primary">primer vista</button>
                    </form>
                </div>

                <div id="en_base" class="tab-pane fade">
                        <button class="btn btn-primary">segunda vista</button>
                </div>

                <div id="nueva_ficha" class="tab-pane fade">

                    <div class="container">
                      <div class="row">

                        <div class="col-md-6">
                          <form class="form-horizontal col-xs-6 col-sm-6 col-md-6 col-xl-6" role="form" method="post" action="Catalogacion/nuevaFicha">

              							<div class="form-group">
                              <br>
              								<label for="isbn" class="sr-only control-label">ISBN:</label>
              								<input type="text" class="form-control" name="isbn" id="isbn" placeholder="ISBN">
              							</div>

              							<div class="form-group">
              								<label for="clasificacion_dewey" class="sr-only control-label">Clasificación Decimal Dewey:</label>
              								<input type="text" class="form-control" name="clasificacion_dewey" id="clasificacion_dewey" placeholder="Clasificación Decimal Dewey">
              							</div>

                            <div class="form-group">
                              <label for="autor_personal" class="sr-only control-label">Autor Personal:</label>
                              <input type="text" class="form-control" name="autor_personal" id="autor_personal" placeholder="Autor Personal">
                            </div>

                            <div class="form-group">
                              <label for="autor_corporativo" class="sr-only control-label">Autor Corporativo:</label>
                              <input type="text" class="form-control" name="autor_corporativo" id="autor_corporativo" placeholder="Autor Corporativo">
                            </div>

                            <div class="form-group">
                              <label for="asiento_por_titulo" class="sr-only control-label">Asiento por Titulo:</label>
                              <input type="text" class="form-control" name="asiento_por_titulo" id="asiento_por_titulo" placeholder="Asiento por Titulo">
                            </div>

                            <div class="form-group">
                              <label for="titulo_uniforme" class="sr-only control-label">Titulo Uniforme:</label>
                              <input type="text" class="form-control" name="titulo_uniforme" id="titulo_uniforme" placeholder="Titulo Uniforme">
                            </div>

                            <div class="form-group">
                              <label for="variante_titulo" class="sr-only control-label">Variante de Titulo:</label>
                              <input type="text" class="form-control" name="variante_titulo" id="variante_titulo" placeholder="Variante de Titulo">
                            </div>

                            <div class="form-group">
                              <label for="edicion_mencion" class="sr-only control-label">Edición Mención:</label>
                              <input type="text" class="form-control" name="edicion_mencion" id="edicion_mencion" placeholder="Edición Mensión">
                            </div>

                            <div class="form-group">
                              <label for="lugar_editorial" class="sr-only control-label">Lugar Editorial:</label>
                              <input type="text" class="form-control" name="lugar_editorial" id="lugar_editorial" placeholder="Lugar Editorial">
                            </div>

                            <div class="form-group">
                              <label for="volumen" class="sr-only control-label">Volumen:</label>
                              <input type="text" class="form-control" name="volumen" id="volumen" placeholder="Volumen">
                            </div>

                            <div class="form-group">
                              <label for="notas_generales" class="sr-only control-label">Notas Generales:</label>
                              <input type="text" class="form-control" name="notas_generales" id="notas_generales" placeholder="Notas Generales">
                            </div>

                            <div class="form-group">
                              <label for="notas_contenido" class="sr-only control-label">Notas de Contenido:</label>
                              <input type="text" class="form-control" name="notas_contenido" id="notas_contenido" placeholder="Notas de Contenido">
                            </div>

                            <div class="form-group">
                              <label for="liga_recursos" class="sr-only control-label">Liga a Recursos Electronicos:</label>
                              <input type="text" class="form-control" name="liga_recursos" id="liga_recursos" placeholder="Liga a Recursos Electronicos">
                            </div>

                            <div class="form-group">
                              <label for="fecha_publicacion" class="sr-only control-label">Fecha de Publicación:</label>
                              <input type="text" class="form-control" name="fecha_publicacion" id="fecha_publicacion" placeholder="Fecha de Publicación">
                            </div>

                            <div class="form-group">
                              <label for="editorial" class="sr-only control-label">Editorial:</label>
                              <input type="text" class="form-control" name="editorial" id="editorial" placeholder="Editorial">
                              <br>
                              <input type="submit" class="form-control btn-primary" id="submi">
                            </div>

              						</form>
                        </div>

                        <div class="col-md-6">

                        </div>

                      </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>


</body
<footer>
	<?php $this->load->view('/Shared/Partial/footer');?>
</footer>
</html>
