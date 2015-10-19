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

        <?php $this->load->view('Shared/Partial/nuevaficha'); ?>

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

      <?php $this->load->view('/Shared/Partial/datosUnicos');?>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
</html>
