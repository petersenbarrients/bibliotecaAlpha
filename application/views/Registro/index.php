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
        var html = "<div class=class"+numero+"><button class='btn-link' onclick="+clic+"><span class='glyphicon glyphicon-remove' aria-hidden='true'></span>"+numero+"</button></br></div>"
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
    function sel_nueva_ficha(){
      $('.nav a[href="#nueva_ficha"]').tab('show');
    }
    </script> <!-- fin definiciones de javascript-->
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

                    <div class="form-group">
                    </br>
                      <div class="container">
                        <div class="row">
                          <center><div class="col-xs-12 col-sm-3 col-md-3"> <input style="max-width:90%;"type="text" id="numero_adqui" class="form-control" placeholder="Número(s) de adquisicion(s)"> </div></center>
                          <center><div class="col-xs-12 col-sm-3 col-md-3"><button style="max-width:90%; " class="btn btn-success btn-block margin-bottom-lg" id="btnRegistro">Agregar</button></div></center>
                          <center><div class="col-xs-12 col-sm-2 col-md-2" id="registros">
                          </div></center>
                        </div>
                      </div>
                    </div>
            <div class="container">
            <div class="row" id="buttons">
              <fieldset>
              <center><div class="col-xs-12 col-sm-3 col-md-4"><button style="max-width:90%; " class="btn btn-warning btn-lg" id="btnRegistro">Continuar recepción</button></div></center>
              <center><div class="col-xs-12 col-sm-3 col-md-3"><button  onclick="inicio()" style="max-width:90%; " class="btn btn-danger btn-lg" id="btnRegistro">Cancelar recepción</button></div></center>
            </fieldset>
            </div>
            </div>
          </div>


                <div id="en_base" class="tab-pane fade">
        <!--        <button class="btn btn-primary">segunda vista</button> -->
<!--******************* BUSQUEDA DE FILTRAR EN EL CAMPO DE TEXTO, HACER CONSULTA A LA BASE DE DATOS PARA VERIFICAR QUE EXISTA ***************************-->
<!--1) La tabla aparecerá oculta
    2) Si la tabla no encuentra resultados que devuelva un mensaje que no se han encontrado resultados
    3) Al encontrar datos devuelve la tabla llena-->
                <p id="textAut">Escriba parte de título o autor <input type="text" id="title"><br><br></p>
                <button class="btn btn-primary" id="btnBuscarTitulo" onclick="viewHide('example')">Buscar</button>
                <br><br>
                <table id="example" style="display:none">
        <thead>
            <tr>
            <th>ISBN</th>
            <th>Clasificacion decimal Dewey</th>
            <th>Autor Personal</th>
            <th>Asiento por titulo uniforme</th>
            <th>Titulo uniforme</th>
            <th>Edicion o mencion de edicion</th>
            <th>Lugar de editorial</th>
            <th>Volumen</th>
            <th>Editorial</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>


        </div>

        <?php

          echo div_open('tab-pane fade','nueva_ficha');

            echo div_open('container','');
              echo div_open('row','');
                echo div_open('col-md-6','');

                  $attributes = array('class' => 'form-horizontal col-xs-6 col-sm-6 col-md-6 col-xl-6', 'role' => 'form');
                  echo form_open('catalogacion/nueva', $attributes);
                    echo div_open('form-group','');
                      echo br(1);
                      $attributes = array(
                        'class' => 'sr-only control-label'
                      );
                      echo form_label('ISBN','isbn',$attributes);
                      $data = array(
                        'class' => 'form-control',
                        'id' => 'isbn',
                        'name' => 'isbn',
                        'placeholder' => 'ISBN',
                        'required' => 'required'
                      );
                      echo form_input($data);
                    echo div_close(); //close form-group

                    echo div_open('form-group','');
                      $attributes = array(
                        'class' => 'sr-only control-label'
                      );

                      echo form_label('Clasificación Decimal Dewey','clasificacion_dewey',$attributes);
                      $data = array(
                        'class' => 'form-control',
                        'id' => 'clasificacion_dewey',
                        'name' => 'clasificacion_dewey',
                        'placeholder' => 'Clasificación Decimal'
                      );
                      echo form_input($data);

                    echo div_close(); //close form-group2

                    echo div_open('form-group','');

                      $attributes = array(
                        'class' => 'sr-only control-label'
                      );

                      echo form_label('Autor Personal','autor_personal',$attributes);
                      $data = array(
                        'class' => 'form-control',
                        'id' => 'autor_personal',
                        'name' => 'autor_personal',
                        'placeholder' => 'Autor Personal'
                      );
                      echo form_input($data);
                  echo div_close(); // close form group 3

                  echo div_open('form-group','');

                  $attributes = array(
                    'class' => 'sr-only control-label'
                  );

                  echo form_label('Autor Corporativo:','autor_corporativo',$attributes);
                  $data = array(
                    'class' => 'form-control',
                    'id' => 'autor_corporativo',
                    'name' => 'autor_corporativo',
                    'placeholder' => 'Autor Corporativo'
                  );
                  echo form_input($data);
                  echo div_close(); //close form group 4

                  echo div_open('form-group','');

                  $attributes = array(
                    'class' => 'sr-only control-label'
                  );

                  echo form_label('Asiento por Titulo:','asiento_por_titulo',$attributes);
                  $data = array(
                    'class' => 'form-control',
                    'id' => 'asiento_por_titulo',
                    'name' => 'asiento_por_titulo',
                    'placeholder' => 'Asiento por Titulo'
                  );
                  echo form_input($data);
                  echo div_close(); //close form group 5

                  echo div_open('form-group','');

                  $attributes = array(
                    'class' => 'sr-only control-label'
                  );

                  echo form_label('Titulo Uniforme:','titulo_uniforme',$attributes);
                  $data = array(
                    'class' => 'form-control',
                    'id' => 'titulo_uniforme',
                    'name' => 'titulo_uniforme',
                    'placeholder' => 'Titulo Uniforme'
                  );
                  echo form_input($data);

                  echo div_close(); //close form group 6

                  echo div_open('form-group','');

                  $attributes = array(
                    'class' => 'sr-only control-label'
                  );

                  echo form_label('Variante de Titulo:','variante_titulo',$attributes);
                  $data = array(
                    'class' => 'form-control',
                    'id' => 'variante_titulo',
                    'name' => 'variante_titulo',
                    'placeholder' => 'Variante de Titulo'
                  );
                  echo form_input($data);

                  echo div_close(); //close form group 4

                  echo div_open('form-group','');

                  $attributes = array(
                    'class' => 'sr-only control-label'
                  );

                  echo form_label('Edición Mención:','edicion_mencion',$attributes);
                  $data = array(
                    'class' => 'form-control',
                    'id' => 'edicion_mencion',
                    'name' => 'edicion_mencion',
                    'placeholder' => 'Edición Mensión'
                  );
                  echo form_input($data);
                  echo div_close(); //close form group 4

                  echo div_open('form-group','');

                  $attributes = array(
                    'class' => 'sr-only control-label'
                  );

                  echo form_label('Lugar Editorial:','lugar_editorial',$attributes);
                  $data = array(
                    'class' => 'form-control',
                    'id' => 'lugar_editorial',
                    'name' => 'lugar_editorial',
                    'placeholder' => 'Lugar Editorial'
                  );
                  echo form_input($data);

                  echo div_close(); //close form group 4

                  echo div_open('form-group','');

                  $attributes = array(
                    'class' => 'sr-only control-label'
                  );

                  echo form_label('Volumen:','volumen',$attributes);
                  $data = array(
                    'class' => 'form-control',
                    'id' => 'volumen',
                    'name' => 'volumen',
                    'placeholder' => 'Volumen'
                  );
                  echo form_input($data);
                  echo div_close(); //close form group 4
                  echo div_open('form-group','');

                  $attributes = array(
                    'class' => 'sr-only control-label'
                  );

                  echo form_label('Notas Generales:','notas_generales',$attributes);
                  $data = array(
                    'class' => 'form-control',
                    'id' => 'notas_generales',
                    'name' => 'notas_generales',
                    'placeholder' => 'Notas Generales'
                  );
                  echo form_input($data);
                  echo div_close(); //close form group 4

                  echo div_open('form-group','');

                  $attributes = array(
                    'class' => 'sr-only control-label'
                  );

                  echo form_label('Notas de Contenido:','notas_contenido',$attributes);
                  $data = array(
                    'class' => 'form-control',
                    'id' => 'notas_contenido',
                    'name' => 'notas_contenido',
                    'placeholder' => 'Notas de Contenido'
                  );
                  echo form_input($data);
                  echo div_close(); //close form group 4

                  echo div_open('form-group','');

                  $attributes = array(
                    'class' => 'sr-only control-label'
                  );

                  echo form_label('Liga a Recursos Electronicos:','liga_recursos',$attributes);
                  $data = array(
                    'class' => 'form-control',
                    'id' => 'liga_recursos',
                    'name' => 'liga_recursos',
                    'placeholder' => 'Liga a Recursos Electronicos'
                  );
                  echo form_input($data);
                  echo div_close(); //close form group 4

                  echo div_open('form-group','');

                  $attributes = array(
                    'class' => 'sr-only control-label'
                  );

                  echo form_label('Fecha de Publicación:','fecha_publicacion',$attributes);
                  $data = array(
                    'class' => 'form-control',
                    'id' => 'fecha_publicacion',
                    'name' => 'fecha_publicacion',
                    'placeholder' => 'Fecha de Publicación'
                  );
                  echo form_input($data);
                  echo div_close(); //close form group 4

                  echo div_open('form-group','');

                  $attributes = array(
                    'class' => 'sr-only control-label'
                  );

                  echo form_label('Editorial:','editorial',$attributes);
                  $data = array(
                    'class' => 'form-control',
                    'id' => 'editorial',
                    'name' => 'editorial',
                    'placeholder' => 'Editorial'
                  );
                  echo form_input($data);
                echo div_close(); //close form group 4
                $data = array(
                  'id' => 'submi',
                  'class' => 'form-control btn-primary',
                  'value' => 'Registrar'

                );
                echo form_submit($data);
                echo form_close();
                echo div_close(); //close col-md-6
              echo div_close(); // close row
            echo div_close(); // close container
          echo div_close(); //close tab-pane fade

          ?>

            </div>
        </div>
    </div>
</div>


</body
<footer>
	<?php $this->load->view('/Shared/Partial/footer');?>
</footer>

</html>
