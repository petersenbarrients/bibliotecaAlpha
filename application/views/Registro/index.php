<!DOCTYPE html>
<html>
  <?php $this->load->view('/Shared/Partial/head');?>
  <head>
    <script type="text/javascript">
    var numeros_array = new Array();
    var tam = 0;
      var obj = null;
    show();
      $(document).ready(function() {
        show();
        $( "#btnRegistro" ).click(function() {
            var numero_de_adquisicion = $("#numero_adqui").val();
            numerosDeAdquisicion(numero_de_adquisicion);
            $("#numero_adqui").val("");
            show();

        $("#example").dataTable();
        $('#lanzar_alerta').click(function() {
          alert('hola mundo!');
        });

      });
});

    function viewHide(id){
        var targetId, srcElement, targeElement;
        var targeElement = document.getElementById(id);
        if(obj!=null)
            obj.style.display = 'none';
        obj = targeElement;
        targeElement.style.display = "";
    }

      function numerosDeAdquisicion(numero)
      {
        var clic = "eliminar('class"+numero+"','"+numero+"')";
        numeros_array.push(numero);
        tam= tam + 1;
        var html = "<div class=class"+numero+"><button class='btn-link ' onclick="+clic+"><span class='glyphicon glyphicon-remove' aria-hidden='true'></span>"+numero+"</button></br></div>"
        $("#registros").append(html);
        console.log(numeros_array);
      }

      function eliminar(id,numero)
      {

        console.log(id);
        $("."+id).remove();
        var index = numeros_array.indexOf(numero);
        delete numeros_array[index];
        console.log(numeros_array);
        tam=tam - 1;
        show();
      }

    function show()
    {
      console.log(tam);
      if(tam>0)
      {

        $( "div#buttons" ).show( "fast" );

      }
      else if(tam<1)
      {

        $( "div#buttons" ).hide();

      }

    }

    function inicio()
    {

      location.href = "home/";

    }

    function continuar()
    {

           $('#myModal').modal('show');

    }
    </script>
  </head>

<body>
<?php $this->load->view('/Shared/Partial/body');?>
<div class="container" style="width:60% !important;">
    <div class="panel panel-primary" >

        <div class="panel-heading"><center>Seleccione opción para registro de material<center></div>
        <div class="panel-body">
            <ul class="nav nav-tabs nav-justified">
                <li role="presentation" class="active"><a  data-toggle="tab" href="#nuevo_registro"><span class="glyphicon glyphicon-tasks">Recepción de nuevo material</span></a></li>
                <li role="presentation"><a data-toggle="tab" href="#en_base"><span class="glyphicon glyphicon-tasks">En base a acervo existente</span></a></li>
                <li role="presentation"><a data-toggle="tab" href="#nueva_ficha"><span class="glyphicon glyphicon-tasks">Nueva ficha</span></a></li>
            </ul>
            <div class="tab-content">

                    <div id="nuevo_registro" class="tab-pane fade in active">

                    <div class="form-group">
                    </br>
                      <div class="container">
                        <div class="row">
                          <center><div class="col-xs-12 col-sm-3 col-md-3"> <input style="max-width:90%;"type="text" id="numero_adqui" class="form-control" placeholder="Número(s) de adquisicion(s)"> </div></center>
                          <center><div class="col-xs-12 col-sm-3 col-md-3"><button style="max-width:90%; " class="btn btn-success btn-block margin-bottom-lg" id="btnRegistro"><span class="glyphicon glyphicon-plus" aria-hidden="true">Agregar</span></button></div></center>
                          <center><div class="col-xs-12 col-sm-2 col-md-2" id="registros">
                          </div></center>
                        </div>
                      </div>
                    </div>
            <div class="container">
            <div class="row" id="buttons">
              <fieldset>
              <center><div class="col-xs-12 col-sm-3 col-md-4"><button data-toggle="modal" data-target="#myModal" style="max-width:100%; " class="btn btn-primary " id="btnRegistro"><span class="glyphicon glyphicon-ok" aria-hidden="true">Continuar recepción</span></button></div></center>
              <center><div class="col-xs-12 col-sm-3 col-md-3"><button  onclick="inicio()" style="max-width:100%; " class="btn btn-danger fa fa-times" id="btnRegistro">Cancelar recepción</button></div></center>
            </fieldset>
            </div>
            </div>
          </div>


                <div id="en_base" class="tab-pane fade">
                    texto 2

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
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">

        <?php
        $inputNo_Adqui = array(
              'name'          => 'numero_adqui',
              'value'       => '',
              'maxlength'   => '7',
              'size'        => '50',
              'style'       => 'width:50%',
              'class'       => 'form-control',
              'placeholder' =>'Número de adquisición',
              'required' =>'required',
              'autofocus' =>'autofocus'
            );

            $input_submit = array(
                  'type'       => 'submit',
                  'style'       => 'width:50%',
                  'value'       =>'Siguiente',
                  'class'       => 'btn-primary'

                );
                $input_cancel = array(
                      'type'       => 'button',
                      'style'       => 'width:50%',
                      'value'       =>'Cancelar recepción',
                      'class'       => 'btn-danger'
                    );
        $input_Ejemplar = array(
                  'name'          => 'numero_ejemplar',
                  'type'        =>'number',
                  'min'        =>'1',
                  'max'         =>'5',
                  'step'        =>'1',
                  'maxlength'   => '7',
                  'size'        => '50',
                  'style'       => 'width:50%',
                  'class'       => 'form-control',
                  'placeholder' =>'Número de ejemplar',
                  'required' =>'required'
                );

        $input_Tomo = array(
                          'name'          => 'numero_tomo',
                          'type'        =>'number',
                          'min'        =>'1',
                          'step'        =>'1',
                          'maxlength'   => '7',
                          'size'        => '50',
                          'style'       => 'width:50%',
                          'class'       => 'form-control',
                          'placeholder' =>'Tomo'
                        );
        $atributos_form = array('id' => 'form');
        echo form_open('libro/nuevoLibro', $atributos_form)."</br>";
          echo form_label('Número de adquisición');
          echo form_input($inputNo_Adqui)."</br>";
          echo form_label('Selecciona la colección');
          echo form_dropdown('coleccion',$colecciones,'', 'class="form-control" id="my_id" style="max-width:30%; required"')."</br>";
          echo form_label('Selecciona la escuela');
          echo form_dropdown('escuela',$escuelas,'', 'class="form-control" id="my_id" required style="max-width:30%;"')."</br>";
          echo form_label('Selecciona la biblioteca');
          echo form_dropdown('biblioteca',$bibliotecas,'', 'class="form-control" required id="my_id" style="max-width:30%;"')."</br>";
          echo form_label('Tipo de material');
          echo form_dropdown('material',$tipos_material,'', 'class="form-control" required id="my_id" style="max-width:30%;"')."</br>";
          echo form_label('Número de ejemplar').'</br>';
          echo form_input($input_Ejemplar)."</br>";

          echo form_label('Disponible para prestamo').'</br>';
          ?>
          SI<input type="radio" name="myradio" value="1" <?php echo  set_radio('Si', '1'); ?> />
          N0<input type="radio" name="myradio" value="0" <?php echo  set_radio('No', '0',TRUE); ?> /></br>
          <?php

          echo form_label('Es complementario').'</br>';
          ?>
          SI<input type="radio" name="myradio1" value="1" <?php echo  set_radio('Si', '1'); ?> />
          N0<input type="radio" name="myradio1" value="0" <?php echo  set_radio('No', '0',TRUE); ?> /></br>
          <?php

          echo form_label('Tomo').'</br>';
          echo form_input($input_Tomo)."</br>";

          echo form_submit($input_submit);
          echo form_button($input_cancel,"Cancelar Recepción");
        echo form_close();
          ?>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
</html>
