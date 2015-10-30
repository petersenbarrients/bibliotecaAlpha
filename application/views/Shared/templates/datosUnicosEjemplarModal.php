<?php

?>


<div class="alert alert-success alert-dismissable" id="alerta2">
                            <strong>¡Registro Exitoso!</strong>
                        </div>
<script type="text/javascript" >
  //ajax, guiarse de libros-index


$( document ).ready(function() {
          $("#alerta").hide();
          $("#alerta2").hide();
            $("#alerta6").hide();
          $("#alerta3").show();


           $("#formunicosmodal").submit(function(){

                     $.ajax({
                         url: $(this).attr("action") ,
                         type: $(this).attr("method"),
                         data: $(this).serialize(),// Adjuntar los campos del formulario enviado.
                         success: function(data)
                         {

                             //limpiar campo num adquisicion, tipos numericos
                             $("#alerta").show();
                             $("#alerta").hide(7000);
                             $("#alerta2").show();
                                $("#alerta6").show();
                             $("#alerta2").hide(7000);
                             $("#alerta6").hide(7000);
                             $("#toclear").val('');

                         }
                       });

                  return false; // Evitar ejecutar el submit del formulario.

                  });

})
</script>

<?php
/*
Vistas auxiliares para cargar el modales en modulo de catalogacion y registro.
*/


$inputNo_Adqui = array(
      'name'          => 'numero_adqui',
      'value'       => '',
      'maxlength'   => '7',
      'size'        => '50',
      'style'       => 'max-width:60%',
      'id'       => 'toclear',
      'class'       => 'form-control',
      'placeholder' =>'Número de adquisición',
      'required' =>'required',
      'autofocus' =>'autofocus'
    );

    $input_submit = array(
          'type'       => 'submit',
          'id'          =>'btn_enviar',
          'style'       => 'max-width:60%',
          'value'       =>'Siguiente',
          'class'       => 'form-control btn-primary glyphicon glyphicon-ok'

        );
        $input_cancel = array(
              'type'       => 'button',
              'style'       => 'max-width:60%',
              'value'       =>'Cancelar recepción',
              'class'       => 'form-control btn-danger'
            );
$input_Ejemplar = array(
          'name'          => 'numero_ejemplar',
          'type'        =>'number',
          'min'        =>'1',
          'max'         =>'5',
          'step'        =>'1',
          'maxlength'   => '7',
          'size'        => '50',
            'style'       => 'max-width:60%',
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
                  'style'       => 'max-width:60%',
                  'class'       => 'form-control',
                  'placeholder' =>'Tomo',
                  'required' =>'required'
                );
$atributos_form = array('id' => 'formunicosmodal');
echo form_open('libro/NuevoEjemplarBaseFicha', $atributos_form)."</br>";
  echo form_label('Número de adquisición');
  echo form_input($inputNo_Adqui)."</br>";
  echo form_label('Selecciona la colección');
  echo form_dropdown('coleccion',$colecciones,'', 'class="form-control" id="my_id" style="max-width:60%; required"')."</br>";
  echo form_label('Selecciona la escuela');
  echo form_dropdown('escuela',$escuelas,'', 'class="form-control" id="my_id" required style="max-width:60%;"')."</br>";
  echo form_label('Selecciona la biblioteca');
  echo form_dropdown('biblioteca',$bibliotecas,'', 'class="form-control" required id="my_id" style="max-width:60%;"')."</br>";
  echo form_label('Tipo de material');
  echo form_dropdown('material',$tipos_material,'', 'class="form-control" required id="my_id" style="max-width:60%;"')."</br>";
  echo form_label('Número de ejemplar').'</br>';
  echo form_input($input_Ejemplar)."</br>";

  echo form_label('Disponible para prestamo').'</br>';
  ?>
  SI<input type="radio" name="myradio" value="1" <?php echo  set_radio('Si', '1'); ?> />
  NO<input type="radio" name="myradio" value="0" <?php echo  set_radio('No', '0',TRUE); ?> /></br>
  <?php

  echo form_label('Es complementario').'</br>';
  ?>
  SI<input type="radio" name="myradio1" value="1" <?php echo  set_radio('Si', '1'); ?> />
  NO<input type="radio" name="myradio1" value="0" <?php echo  set_radio('No', '0',TRUE); ?> /></br>

  <input type="hidden" id="etiqueta_marc" value="" name="etiqueta_marc"/>
  <?php

  echo form_label('Tomo').'</br>';

  echo form_input($input_Tomo)."</br>";
?>

<div class="alert alert-success alert-dismissable" id="alerta6">
                            <strong>¡Registro Exitoso!</strong>
                        </div>

<?php
  echo form_submit($input_submit);
  echo form_button($input_cancel,"Cancelar Recepción");
  echo form_close();
  ?>
