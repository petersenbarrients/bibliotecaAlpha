<!DOCTYPE html>
<html>
  <?php $this->load->view('/Shared/Partial/head');?>
  <head>
    <script type="text/javascript">
    var cache = "";
    var GETmodal = "";
    var numeros_array = new Array();
    var numeros_array_aux = new Array();
    var aux_para_eliminar_de_arreglo = 0;
    var tam = 0;
    var isbnGlobal = 0;
    var contador_caractes_adqui = 0;
    var caracteres = 0;
    var obj = null;
    var json = null;
    show();

      $(document).ready(function() {
        contador_caractes_adqui = 0;
           $("#alert-adqui").hide();
             $("#alert_exitoA").hide();
             $("#alert_exitoB").hide();
             $("#alert_exito_fichaA").hide();
             $("#alert_exito_fichaB").hide();

            $("#ejem").hide();
            $("#molibro").prop("disabled",true);
            $("#elibro").prop("disabled",true);


          $("#componentes").hide();
          $( "#uno" ).prop( "disabled", true );
          $( "#dos" ).prop( "disabled", true );
          $( "#tres" ).prop( "disabled", true );

        numeros_array = new Array();

        show();
        $( "#btnRegistro" ).click(function() {
            if($("#numero_adqui").val() == '')
            {

                $("#alert-adqui").show();
                $("#alert-adqui").hide(6000);
                return false;
            }
            var numero_de_adquisicion = $("#numero_adqui").val();
            numerosDeAdquisicion(numero_de_adquisicion);
            $("#numero_adqui").val("");
            show();
      });

      /*Registra etiquetas unicas via ajax y retorna el modal para continuar con el registro de las etiquetas marc.*/
       $("#form").submit(function(){
            var numero = aux_para_eliminar_de_arreglo;
            eliminarValorDelArregloAdqui(numero)
            $.ajax({
                url: $(this).attr("action"),
                type: $(this).attr("method"),
                data: $(this).serialize(),// Adjuntar los campos del formulario enviado.
                success: function(data)
                {
                  /*El arreglo de adquiciones debe estar vacio para poder mostrar el modal de marcs*/
                  var auxid = $("#form input[name='numero_adqui']").val();

                  alert("Ejemplar" + auxid+ " registrado!");
                  $("#a"+auxid).prop("disabled","true");
                  $("#form input[name='numero_adqui']").val('');
                  $("#alert_exitoA").show();
                  $("#alert_exitoB").show();
                  $("#alert_exitoA").hide(4000);
                  $("#alert_exitoB").hide(4000);
                  if(tam < 1)
                  {

                    $("#simular_click").click();
                    $("#myModal").remove();
                    console.log(data);
                    $("#add-here").empty();
                    $("#add-here").html(data);
                  //  $("#nuevaficha").modal('show');
                    $("#nuevaficha").modal();
                    $("#nuevaficha").modal({ show: true });
                    console.log("<<<<<<<<<<<<<<<modal>>>>>>>>>>>>>>>><");
                    console.log(GETmodal);
                    verNumeroDeAdquisicion();
                  }
                }
              });

         return false;
      });

      $('#numero_adqui').keyup(function() {

          var $th = $(this);
          contador_caractes_adqui = contador_caractes_adqui +1;
          console.log(contador_caractes_adqui);
          if(contador_caractes_adqui > 6)
          {
            contador_caractes_adqui = 0;
            $("#numero_adqui").val('');
            contador_caractes_adqui = 0;
            $("#alert-adqui").show();
            $("#alert-adqui").hide(6000);
              contador_caractes_adqui = 0;

            return '';

          }
          $th.val( $th.val().replace(/[^0-9]/g, function(str)
          {

            contador_caractes_adqui = 0;
            $("#numero_adqui").val('');
            $("#alert-adqui").show();
            $("#alert-adqui").hide(6000); return '';
          } ) );
        });

      $("#btn_enviar_modal").click(function(){
         //  var url = "libro/nuevoLibro"; El controller/action a dónde se realizará la petición.
           numeros_array_aux = numeros_array;
        return false; // Evitar ejecutar el submit del formulario.
     });

     //guardar datos unicos en base a ficha
     $("#formunicosmodal").submit(function(){
        //  var url = "libro/nuevoLibro"; El controller/action a dónde se realizará la petición.
          $.ajax({
              url: $(this).attr("action"),
              type: $(this).attr("method"),
              data: $(this).serialize(),// Adjuntar los campos del formulario enviado.
              success: function(data)
              {
                /*El arreglo de adquiciones debe estar vacio para poder mostrar el modal de marcs*/

              }
            });

       return false;
    });



    $("#btnBuscar").click(function(){

                var url = "Catalogacion/recibirDatoTextField"; // El controller/action a dónde se realizará la petición.
                var valorId=document.getElementById("busquedaAutor").value;
                $("#componentes").show();

          var tab =    $('#tablaDatosConsulta').DataTable( {

                  "destroy": true,
                  'idSrc':"id",
                  "ajax": {
                      "url": url,
                      "type": "POST",
                      "data": {"datoRecibido": valorId}
                  },
                     "columns": [

                                 { "data": "isbn" },
                                 { "data": "autor" },
                                 { "data": "titulo" },
                                 { "data": "lugar" }
                     ],

                     "language":{
                        "sProcessing":     "Procesando...",
                        "sLengthMenu":     "Mostrar _MENU_ registros",
                        "sZeroRecords":    "No se encontraron resultados",
                        "sEmptyTable":     "Ningún dato disponible en esta tabla",
                        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                        "sInfoPostFix":    "",
                        "sSearch":         "Buscar:",
                        "sUrl":            "",
                        "sInfoThousands":  ",",
                        "sLoadingRecords": "Cargando...",
                        "oPaginate": {
                            "sFirst":    "Primero",
                            "sLast":     "Último",
                            "sNext":     "Siguiente",
                            "sPrevious": "Anterior"
                        },
                        "oAria": {
                            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                        }
                    },
                    "initComplete": function () {
                        var api = this.api();
                        api.$('tr').prop("class","");
                        api.$('tr').click( function () {
                            $('tr').prop("class","");
                             $(this).prop( "class", "danger" );
                             $( "#uno" ).prop( "disabled", false );
                             $( "#dos" ).prop( "disabled", false );
                             $( "#tres" ).prop( "disabled", false );
                             cache = tab.row( this ).data().id ;
                             console.log(cache);

                        });


                    }

        }

      );

            //muestraTabla('tablaDatosConsulta');
            return false;
          });


      // enviar datos de nueva_ficha
      $("#fichaform").submit(function(){
          var isbn = $('#isbn').val();
          var urli = 'Catalogacion/nueva';
           $.ajax({
               url: urli ,
               type: $(this).attr("method"),
               data: $(this).serialize(),// Adjuntar los campos del formulario enviado.
               success: function(data)
               {
                   $("#add-here").html(data);

                   $("#unicos_modal").modal('show');
                   console.log(isbn);
                   $("#isbnoculto").val(isbn);
                   var prueba = $("#isbnoculto").val();

               }
             });

        return false; // Evitar ejecutar el submit del formulario.

        });

});



    function removeBufferAction()
    {
      console.log("testing: remove action and add new");
      $("form#for_hide").attr('action','catalogacion/nueva');

    }



function eliminarValorDelArregloAdqui(numero)
{
  console.log("numero a registrado y  eliminado "+numero);
  var index = numeros_array.indexOf(numero);
  delete numeros_array[index];
  tam = tam -1;
  console.log("tamaño de arreglo" + tam);
}

    function sendSubmitModal()
    {
      $.ajax({
          url: 'Catalogacion/nuevaRecepcion',
          type: 'POST',
          data: $("#formModal").serialize(),// Adjuntar los campos del formulario enviado.
          success:function(response){
            //  alert(response);
              isbnGlobal = response;
              numeros_array_aux = numeros_array;

              json = JSON.stringify(numeros_array_aux);

            //  sendSecondAjaxRequest(response,jsonString);
          },
          complete:function()
          {

              sendSecondAjaxRequest();

          }
      });
  }

  function sendSecondAjaxRequest()
  {
    alert("Registro en proceso...");
    $.ajax({
        url: 'libro/modificarMarcLibro',
        type: 'POST',
        data: {listas:json,isbn:isbnGlobal},// Adjuntar los campos del formulario enviado.
        success: function(response)
        {

            alert("3 "+response);
        },
        error : function(xhr, status) {
          console.log("warning!");
        },
        complete:function(xhr,status)
        {

            $("#alert_exito_fichaA").show();
            $("#alert_exito_fichaB").show();

            $("#alert_exito_fichaA").hide(4000);
            $("#alert_exito_fichaB").hide(4000);
            alert("Registro completado!");
            return false;

        },
        statusCode: {
            404: function() {
              alert( "page not found" );
            },
            500: function() {
              alert( "Error del servidor" );
            }
        }
  });

  }


    function muestraTabla(id){
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
        contador_caractes_adqui = 0;
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
      if(tam>0){$( "div#buttons" ).show( "fast" );}
      else if(tam<1){$( "div#buttons" ).hide();}
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
          $("#verAdqui").append("<button id=a"+numeros_array[i]+" class='btn btn-info btn-sm' onclick="+clic+"><span id=s"+numeros_array[i]+" class='glyphicon glyphicon-plus'>"+numeros_array[i]+"</span></button><input type='hidden' id=hidden"+numeros_array[i]+" value="+numeros_array[i]+"></br></br>");
      }

    }

    function pintarNoAdqui(numero)
    {
        aux_para_eliminar_de_arreglo = 0;
        console.log(numero);
        aux_para_eliminar_de_arreglo = $("#hidden"+numero);
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

    /*funciones para modificar ficha, eliminar ficha*/

    function obtenerModalFichas(id)
    {
      $.ajax({
          url: "Ficha/modificar",
          type: 'POST',
          data:{id:id},
          success:function(response){
            $("#add-here").empty();
              $("#add-here").html(response);
              $("#ficha_modal_modificar").modal('show');


          }
      });

    }

    function eliminarLibromodal(id)
    {
      $.ajax({
          url: "libro/eliminar",
          type: 'POST',
          data:{id:id},
          success:function(response){
            $("#add-here").empty();
              $("#add-here").html(response);
              $("#libro_modal_eliminar").modal('show');
          }
      });

    }

    function modificarLibromodal(id)
    {
      $.ajax({
          url: "libro/modificar",
          type: 'POST',
          data:{id:id},
          success:function(response){
            $("#add-here").empty();
              $("#add-here").html(response);
              $("#libro_modal_modificar").modal('show');
          }
      });

      }


    function eliminarModalFicha(id)
    {
      $.ajax({
          url: "Ficha/eliminar",
          type: 'POST',
          data:{id:id},
          success:function(response){
            $("#add-here").empty();
              $("#add-here").html(response);
              $("#ficha_modal_eliminar").modal('show');
          }
      });

    }


    /*funciones de pedro*/

    function muestraTabla(id){

         //$("#ejem").show();
         var url = "libro/listarLibros"; // El controller/action a dónde se realizará la petición.
         //var valorId=document.getElementById("busquedaAutor").value;
         ocultaTabla();
         $("#ejem").show();

   var tab =    $('#ejemplares').DataTable( {

           "destroy": true,
           'idSrc':"id",
           "ajax": {
               "url": url,
               "type": "POST",
               "data": {"id": id}
           },
              "columns": [

                          { "data": "adquisicion" },
                          { "data": "ejemplar" }
              ],

              "language":{
                 "sProcessing":     "Procesando...",
                 "sLengthMenu":     "Mostrar _MENU_ registros",
                 "sZeroRecords":    "No se encontraron resultados",
                 "sEmptyTable":     "Ningún dato disponible en esta tabla",
                 "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                 "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                 "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                 "sInfoPostFix":    "",
                 "sSearch":         "Buscar:",
                 "sUrl":            "",
                 "sInfoThousands":  ",",
                 "sLoadingRecords": "Cargando...",
                 "oPaginate": {
                     "sFirst":    "Primero",
                     "sLast":     "Último",
                     "sNext":     "Siguiente",
                     "sPrevious": "Anterior"
                 },
                 "oAria": {
                     "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                     "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                 }
             },
             "initComplete": function () {
                 var api = this.api();
                 api.$('tr').prop("class","");
                 api.$('tr').click( function () {
                   api.$('tr').prop("class","");
                   api.$(this).prop("class","active");
                   $( "#nuovilibro" ).prop( "disabled", false );
                   $( "#molibro" ).prop( "disabled", false );
                   $( "#elibro" ).prop( "disabled", false );
                      cache = tab.row( this ).data().id ;
                      console.log(cache);

                 });
             }

         });
     }

     function ocultaTabla(){
       $("#panelAcervo").hide();
       $("#componentes").hide();

     }

     /* funciones para mostrar ejemplares*/
        function cambioEjemplares(id){

          muestraTabla(id);
        }

        /*regresar a la tabla que muestra las fichas*/
        function regresarAcervo(){

          $("#ejem").hide();
          $("#panelAcervo").show();
          $("#componentes").show();
          $("#btnBuscar").click();
        }

        /*agregar nuevo ejemplar a la ficha*/
        function agregarNuevoEjemplarFicha(){

          var urli = 'Catalogacion/nuevoEjemplar';
           $.ajax({
               url: urli ,
               type: $(this).attr("method"),
               data: $(this).serialize(),// Adjuntar los campos del formulario enviado.
               success: function(data)
               {
                   $("#add-here").html(data);

                   $("#unicos_modal_ejemplar").modal('show');
                   console.log(cache);
                   $("#etiqueta_marc").val(cache);


               }
             });

             return false; // Evitar ejecutar el submit del formulario.
        }


    </script> <!-- fin definiciones de javascript-->

  </head>

<body>
<?php $this->load->view('/Shared/Partial/body');



?>

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

                                  <center><div class="col-xs-12 col-sm-3 col-md-3"> <input style="max-width:90%;"type="text" id="numero_adqui" autofocus='autofocus' class="form-control" placeholder="Número(s) de adquisicion(s)"> </div></center>
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
                          <!--alertas para numero de adquicion-->
                          <div class="alert alert-danger" id="alert-adqui">
                              <strong>Danger!</strong> El numero de esta escrito de manera incorrecta.</br>Los valores aceptador son:</br>
                              <strong>Solo Numeros!</strong> de 6 cifras como maximo.
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

<!--********************************************************* PARTE DE CESAR *****************************************************************-->
                <div id="en_base" class="tab-pane fade">
                <div class="tab-content">
                    <div id="nuevaBusquedaAutor" class="tab-pane fade in active">
                    <div class="form-group">
                    </br>
                      <div class="panel panel-info" id="panelAcervo">
                        <div class="panel-body">
                          <div class="container">
                              <div class="row">
                                  <center><div class="col-xs-12 col-sm-3 col-md-3"> <input style="max-width:90%;"type="text" id="busquedaAutor" class="form-control" placeholder="Escriba parte del titulo o autor"> </div></center>
                                  <center>
                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <button style="max-width:90%;" class="btn btn-primary btn-block margin-bottom-lg" id="btnBuscar">
                                        <span aria-hidden="true">Buscar</span>
                                        </button>
                                    </div>
                                    </center>
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
      </div>
<!-- -->
                <br><br>
                <div class="table-responsive" id="componentes">
                      <center><div class="btn-group">
                           <button type="button" id="uno" onclick =  'cambioEjemplares(cache);'  class="btn btn-info btn-sm"><span class="glyphicon glyphicon-plus">Ver ejemplares</span></button>
                          <button type="button" id="dos" onclick ='obtenerModalFichas(cache);' class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-pencil">Modificar ficha</span></button>
                          <button type="button" id="tres" onclick='eliminarModalFicha(cache);'  class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove">Eliminar ficha</span></button>
                      </div></center>
                  <center><table id="tablaDatosConsulta"  class="display table table-hover">
                    <thead>
                        <tr>
                          <th>ISBN</th>
                          <th>Autor Personal</th>
                          <th>Titulo Uniforme</th>
                          <th>Lugar Editorial</th>
                        </tr>
                    </thead>
                  </table></center>
                </div>

                <div class="table-responsive" id="ejem">

                <center>
                  <div class="btn-group">
                    <button type="button" id="nuovilibro" onclick =  'agregarNuevoEjemplarFicha();' class="btn btn-success btn-sm"><span class="glyphicon glyphicon-plus">Nuevo libro</span></button>
                    <button type="button" id="molibro" onclick =  'modificarLibromodal(cache);' class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-pencil">Modificar libro</span></button>
                    <button type="button" id="elibro" onclick =  'eliminarLibromodal(cache);'  class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove">Eliminar libro</span></button>
                    <button type="button" id="regresalibro" onclick =  'regresarAcervo();' class="btn btn-info btn-sm"><span class="fa fa-undo">Regresar</span></button>
                  </div>
                </center>

                <table id="ejemplares" class="display table table-hover">

                  <thead>
                    <tr>
                      <th>Numero Adquisición</th>
                      <th>ejemplar</th>
                    </tr>
                  </thead>
              </table>

              </div>

              </div>
                <br><br>
<?php

    echo div_open('tab-pane fade','nueva_ficha');
        $this->load->view('Shared/templates/nuevaficha');
    echo div_close(); //close tab-pane fade

 ?>
          </div></div></div></div>


</body>
<footer>
	<?php $this->load->view('/Shared/Partial/footer');?>
</footer>
<!-- Modal -->
<div id="clear">
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Etiquetas únicas del ejemplar</h4>
        <div class='alert alert-success' id='alert_exitoA'>
            <strong>Action realizada!</strong> El ejemplar fue dado de alta de manera correcta.</br>
        </div>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row" id="insertar">
            <div class="col-xs-6 col-md-4" id="borrar">
              <?php $this->load->view('/Shared/templates/datosUnicos');?></br>
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
        <div class='alert alert-success' id='alert_exitoB'>
            <strong>Action realizada!</strong> El ejemplar fue dado de alta de manera correcta.</br>
        </div>
        <button type="button" id="simular_click" class="btn btn-default" onclick="removeBuffer()" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
</div>
</div>
<!-- Modal -->
<div id="add-here">
  <div class='alert alert-success' id='alert_exito_fichaA'>
      <strong>Alta exisotosa!</strong></br>
  </div>
</div>

<!--alertas -->


</html>
