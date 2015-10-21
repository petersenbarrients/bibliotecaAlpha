<!DOCTYPE html>
<html>
  <?php $this->load->view('/Shared/Partial/head');?>
  <head>
    <script type="text/javascript">
    var numeros_array = new Array();
    var tam = 0;
    var caracteres = 0;
      var obj = null;
    show();

      $(document).ready(function() {
        numeros_array = new Array();

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

       $("#form").submit(function(){
            var url = "libro/nuevoLibro"; // El controller/action a dónde se realizará la petición.
            $.ajax({
                url: $(this).attr("action"),
                type: $(this).attr("method"),
                data: $(this).serialize(),// Adjuntar los campos del formulario enviado.
                success: function(data)
                {
                    $("#simular_click").click();
                    $("#myModal").remove();
                    console.log(data);
                    $("#add-here").html(data);
                    $("#nuevaficha").modal('show');
                    verNumeroDeAdquisicion();
                }
              });

         return false; // Evitar ejecutar el submit del formulario.
      });

      $("#form").submit(function(){
          var isbn = $('#isbn').val();
           $.ajax({
               url: $(this).attr("action"),
               type: $(this).attr("method"),
               data: $(this).serialize(),// Adjuntar los campos del formulario enviado.
               success: function(data)
               {

                   $("#add-here").html(data);

                   $("#unicos_modal").modal('show');
                   console.log(isbn);
                   $("#isbnoculto").val(isbn);
                   var prueba = $("#isbnoculto").val();
                   alert(prueba);
               }
             });

        return false; // Evitar ejecutar el submit del formulario.

     });
}); // close prevent default

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
        var html = "<div class=class"+numero+"><span class='glyphicon glyphicon-arrow-right'></span><button class='btn btn-warning btn-sm' onclick="+clic+"><span class='glyphicon glyphicon-trash' aria-hidden='true'>"+numero+"</span></button></div></hr>"
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
      if(numeros_array.length != 0)
      {

          $(".alert").alert();

      }
      location.href = "home/";

    }

    function continuar()
    {
            verNumeroDeAdquisicion();
           $('#myModal').modal('show');

    }

    function verNumeroDeAdquisicion()
    {
      console.log("testing 1,2,3..");
      $("#verAdqui").empty();
      for(var i=0;i<numeros_array.length;i++)
      {
        console.log(">>>>testing-> "+numeros_array[i]);
        var clic = "pintarNoAdqui('"+numeros_array[i]+"')";
        if(numeros_array[i]!=undefined)
          $("#verAdqui").append("<button id=a"+numeros_array[i]+" class='btn btn-info btn-sm' onclick="+clic+"><span id=s"+numeros_array[i]+" class='glyphicon glyphicon-plus'>"+numeros_array[i]+"</span></button></br></br>");
      }

    }

    function pintarNoAdqui(numero)
    {
        console.log(numero);
        $("input[name='numero_adqui']" ).val('');
        $("input[name='numero_adqui']" ).val(numero);
    /*cuando se guarde el numero de adqui desbloquearlo*/
    }

    function removeBuffer()
    {

      $("input[name='numero_adqui']" ).val('');
      $("#verAdqui").empty();

    }
    function sel_nueva_ficha(){
      $('.nav a[href="#nueva_ficha"]').tab('show');
    }

    function obtenerTotalEjemplares()
    {

      return numeros_array.length;

    }

    //activar datos unicos desde nueva ficha


    /*function nuevaFichaUnicos(){
      var isbn = $('#isbn').val();
      var autor_personal = $('#autor_personal').val();
      var asiento_por_titulo = $('#asiento_por_titulo').val();
      var titulo_uniforme = $('#titulo_uniforme').val();
      var variante_titulo = $('#variante_titulo').val();
      var editorial = $('#editorial').val();

      if(
        isbn !='' &&
        autor_personal !='' &&
        asiento_por_titulo !='' &&
        titulo_uniforme !='' &&
        variante_titulo !='' &&
        editorial !=''
      ){
        $('#unicos_modal').modal('show');
      }

    }
    */

    </script> <!-- fin definiciones de javascript-->

  </head>

<body>
<?php $this->load->view('/Shared/Partial/body');?>
<div class="container" style="width:70% !important;">
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
                      <div class="panel panel-info">
                        <div class="panel-body">
                          <div class="container">
                              <div class="row">
                                  <center><div class="col-xs-12 col-sm-3 col-md-3"> <input style="max-width:90%;"type="text" id="numero_adqui" class="form-control" placeholder="Número(s) de adquisicion(s)"> </div></center>
                                  <center><div class="col-xs-12 col-sm-3 col-md-3"><button style="max-width:90%; " class="btn btn-success btn-block margin-bottom-lg" id="btnRegistro"><span class="glyphicon glyphicon-plus" aria-hidden="true">Agregar</span></button></div></center>
                                  <center>
                                    <div class="col-xs-12 col-sm-2 col-md-2">

                                    <div  class="panel panel-warning" style="float:center;">
                                      <div id="registros" class="panel-heading" style="font-size:10px;"><span class="glyphicon glyphicon-th-list"></span>Ejemplar(es) agregados</br>[toque para eliminarlos]</div>
                                    </div>

                                  </div>
                                </center>
      </div>
    </div>
  </div>
</div>

                    </br>

                    </div>
            <div class="container">
            <div class="row" id="buttons">
              <fieldset>
              <center><div class="col-xs-12 col-sm-3 col-md-4"><button onclick="verNumeroDeAdquisicion()"data-toggle="modal" data-target="#myModal" style="max-width:100%; float:center!important; " class="btn btn-primary " id="btnRegistro"><span class="glyphicon glyphicon-ok" aria-hidden="true">Continuar recepción</span></button></div></center>
              <center><div class="col-xs-12 col-sm-3 col-md-6"><button  onclick="inicio()" style="max-width:100%;float:center!important; " class="btn btn-danger fa fa-times" id="btnRegistro">Cancelar recepción</button></div></center>
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
                <center><div class="col-xs-12 col-sm-3 col-md-4"><button style="max-width:90%; " onclick="viewHide('example')" class="btn btn-primary btn-block margin-bottom-lg" id="btnBuscar"><span aria-hidden="true">Buscar</span></button></div></center>
                <!-- <button class="btn btn-primary" id="btnBuscarTitulo" >Buscar</button> -->
                <br><br>
                <div class="table-responsive">
                <table id="example" style="display:none" class="table">
        <thead>
            <tr>
            <th>ISBN</th>
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
</div>
<?php

    echo div_open('tab-pane fade','nueva_ficha');
        $this->load->view('Shared/Partial/nuevaficha');
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
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Etiquetas únicas del ejemplar</h4>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row" id="insertar">
            <div class="col-xs-6 col-md-4" id="borrar">
              <?php $this->load->view('/Shared/Partial/datosUnicos');?></br>
            </div>
          </br></br><div class="col-xs-6 col-md-3">
              <div class="panel panel-primary" style="max-width:60%;float:left;">
                  <div class="panel-heading" class="col-xs-6 col-md-3">
                      <h2 class="panel-title"><span class="glyphicon glyphicon-list-alt"></span><p style="font-size:9px;">Seleccione números de adquisición</br>[Pulse para seleccionar]</p></h2>
                  </div>
                  <div class="panel-body">
                      <div id="verAdqui"></div>
                  </div>
              </div>
            </div>
          </div>
        </div>
      <div class="modal-footer">
        <button type="button" id="simular_click" class="btn btn-default" onclick="removeBuffer()" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
</div>
<!-- Modal -->
<div id="add-here">

</div>

<!--alertas -->


</html>
