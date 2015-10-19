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
