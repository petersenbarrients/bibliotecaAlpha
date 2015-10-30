<?php

?>
<div id="alerta">
<div class="alert alert-success" id="alerta_modificar_exitoA">
  <strong>Registro eliminado!</strong>
</div>
</div>
  <script type="text/javascript">
        $(document).ready(function() {
          $("#alerta").hide();

        $( ".delete" ).prop( "disabled", true );

        $("#eliminarFicha").submit(function(){

             $.ajax({
                 url: $(this).attr("action") ,
                 type: $(this).attr("method"),
                 data: $(this).serialize(),// Adjuntar los campos del formulario enviado.
                 success: function(data)
                 {
                   $("#alerta").show();
                   $("div#alerta").prop("visible","true");
                   var alerta = $("div#alerta").html();

                   $(".modal-body").empty();
                    $(".modal-body").html(alerta);


                 }
               });

          return false; // Evitar ejecutar el submit del formulario.

          });


        });
  </script>


<?php
$attLabel = array(
    'class' => 'control-label col-sm-2',
);
  $attributes = array('id'=>'eliminarFicha','class'=>'form-horizontal col-xs-6 col-sm-6 col-md-6 col-xl-6','role' => 'form');
echo div_open('container','');
  echo form_open('Ficha/ActionEliminar',$attributes);
 foreach ($model as $key)
 {
      $data = array(
     'type'  => 'hidden',
     'name'  => 'id',
     'value' => $key['id']);
      echo form_input($data);



      $data = array(
        'type'  => 'text',
        'name'  => 'isbn',
        'id'    => 'hiddenemail',
        'value' => $key['isbn'],
        'class' => 'delete form-control');
echo div_open('form-group','');
              echo form_label('ISBN', 'isbn',$attLabel);
              echo div_open('col-sm-10','');
                  echo form_input($data);
              echo div_close();
echo div_close();


    $data = array(
        'type'  => 'text',
        'name'  => 'clasificacion_decimal_dewey',
        'id'    => 'hiddenemail',
        'value' => $key['clasificacion_decimal_dewey'],
        'class' => 'delete form-control');
echo div_open('form-group','');
            echo form_label('Clasificacion Decimal de Dewey', 'username',$attLabel);
            echo div_open('col-sm-10','');
              echo form_input($data);
            echo div_close();
echo div_close();


   $data = array(
     'type'  => 'text',
     'name'  => 'autor_personal',
     'id'    => 'hiddenemail',
     'value' => $key['autor_personal'],
     'class' => 'delete form-control');
echo div_open('form-group','');
          echo form_label('Autor Personal', 'username',$attLabel);
          echo div_open('col-sm-10','');
              echo form_input($data);
          echo div_close();
echo div_close();


   $data = array(
     'type'  => 'text',
     'name'  => 'autor_cooporativo',
     'id'    => 'hiddenemail',
     'value' => $key['autor_cooporativo'],
     'class' => 'delete form-control');
echo div_open('form-group','');
    echo form_label('Autor Cooporativo', 'username',$attLabel);
    echo div_open('col-sm-10','');
            echo form_input($data);
    echo div_close();
echo div_close();


  $data = array(
    'type'  => 'text',
    'name'  => 'asiento_por_titulo_uniforme',
    'id'    => 'hiddenemail',
    'value' => $key['asiento_por_titulo_uniforme'],
    'class' => 'delete form-control');

 echo div_open('form-group','');
        echo form_label('Asiento', 'username',$attLabel);
        echo div_open('col-sm-10','');
            echo form_input($data);
        echo div_close();
 echo div_close();
 $data = array(
   'type'  => 'text',
   'name'  => 'titulo_uniforme',
   'id'    => 'hiddenemail',
   'value' => $key['titulo_uniforme'],
   'class' => 'delete form-control');
echo div_open('form-group','');
        echo form_label('Título uniforme', 'username',$attLabel);
        echo div_open('col-sm-10','');
            echo form_input($data);
        echo div_close();
echo div_close();


$data = array(
  'type'  => 'text',
  'name'  => 'variante_de_titulo',
  'id'    => 'hiddenemail',
  'value' => $key['variante_de_titulo'],
  'class' => 'delete form-control');
echo div_open('form-group','');
      echo form_label('Variante de título', 'username',$attLabel);
      echo div_open('col-sm-10','');
        echo form_input($data);
      echo div_close();
echo div_close();


$data = array(
  'type'  => 'text',
  'name'  => 'edicion_mencion_edicion',
  'id'    => 'hiddenemail',
  'value' => $key['edicion_mencion_edicion'],
  'class' => 'delete form-control');
echo div_open('form-group','');
        echo form_label('Edición/mención de edición', 'username',$attLabel);
        echo div_open('col-sm-10','');
            echo form_input($data);
        echo div_close();
echo div_close();


$data = array(
  'type'  => 'text',
  'name'  => 'lugar_editorial',
  'id'    => 'hiddenemail',
  'value' => $key['lugar_editorial'],
  'class' => 'delete form-control');
echo div_open('form-group','');
    echo form_label('Lugar de editorial', 'username',$attLabel);
      echo div_open('col-sm-10','');
          echo form_input($data);
      echo div_close();
echo div_close();


$data = array(
  'type'  => 'text',
  'name'  => 'volumen',
  'id'    => 'hiddenemail',
  'value' => $key['volumen'],
  'class' => 'delete form-control');
echo div_open('form-group','');
    echo form_label('Volumen', 'username',$attLabel);
    echo div_open('col-sm-10','');
        echo form_input($data);
    echo div_close();
echo div_close();


$data = array(
  'type'  => 'text',
  'name'  => 'notas_generales',
  'id'    => 'hiddenemail',
  'value' => $key['notas_generales'],
  'class' => 'delete form-control');
echo div_open('form-group','');
    echo form_label('Notas Generales', 'username',$attLabel);
    echo div_open('col-sm-10','');
        echo form_input($data);
    echo div_close();
echo div_close();



$data = array(
  'type'  => 'text',
  'name'  => 'notas_de_contenido',
  'id'    => 'hiddenemail',
  'value' => $key['notas_de_contenido'],
  'class' => 'delete form-control');
echo div_open('form-group','');
    echo form_label('Notas de contenido', 'username',$attLabel);
    echo div_open('col-sm-10','');
      echo form_input($data);
    echo div_close();
echo div_close();



$data = array(
  'type'  => 'text',
  'name'  => 'liga_a_recursos_electronicos',
  'id'    => 'hiddenemail',
  'value' => $key['liga_a_recursos_electronicos'],
  'class' => 'delete form-control');
echo div_open('form-group','');
    echo form_label('Liga a recursos Electronicos', 'username',$attLabel);
    echo div_open('col-sm-10','');
        echo form_input($data);
    echo div_close();
echo div_close();



$data = array(
  'type'  => 'date',
  'name'  => 'fecha_publicacion',
  'id'    => 'hiddenemail',
  'value' => $key['fecha_publicacion'],
  'class' => 'delete form-control');
echo div_open('form-group','');
  echo form_label('Fecha de Publicacion', 'username',$attLabel);
  echo div_open('col-sm-10','');
    echo form_input($data);
  echo div_close();
echo div_close();



$data = array(
  'type'  => 'text',
  'name'  => 'editorial',
  'id'    => 'hiddenemail',
  'value' => $key['editorial'],
  'class' => 'delete form-control');
echo div_open('form-group','');
    echo form_label('Editorial', 'username',$attLabel);
    echo div_open('col-sm-10','');
      echo form_input($data);
    echo div_close();
echo div_close();

$data = array(
  'type'       => 'submit',
  'class' => 'btn btn-warning',
  'value' => 'Registrar',

);
echo form_button($data,"Eliminar ficha");
 }
      echo form_close();
  echo div_close(); //close container

?>

<?php

?>
