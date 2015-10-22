<?php

/*
Vistas auxiliares para cargar el modal en modulo de catalogacion y registro.
*/

    echo div_open('container','');
      echo div_open('row','');
        echo div_open('col-md-6','');

          $attributes = array('class' => 'form-horizontal col-xs-6 col-sm-6 col-md-6 col-xl-6','id'=>'formModal');
          echo form_open('', $attributes);
            echo div_open('form-group','');
              echo br(1);

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
              $data = array(
                'class' => 'form-control',
                'id' => 'clasificacion_dewey',
                'name' => 'clasificacion_dewey',
                'placeholder' => 'Clasificación Decimal'
              );
              echo form_input($data);

            echo div_close(); //close form-group2

            echo div_open('form-group','');

              $data = array(
                'class' => 'form-control',
                'id' => 'autor_personal',
                'name' => 'autor_personal',
                'placeholder' => 'Autor Personal',
                'required' => 'required'
              );
              echo form_input($data);
          echo div_close(); // close form group 3

          echo div_open('form-group','');


          $data = array(
            'class' => 'form-control',
            'id' => 'autor_corporativo',
            'name' => 'autor_corporativo',
            'placeholder' => 'Autor Corporativo'
          );
          echo form_input($data);
          echo div_close(); //close form group 4

          echo div_open('form-group','');

          $data = array(
            'class' => 'form-control',
            'id' => 'asiento_por_titulo',
            'name' => 'asiento_por_titulo',
            'placeholder' => 'Asiento por Titulo'
          );
          echo form_input($data);
          echo div_close(); //close form group 5

          echo div_open('form-group','');

          $data = array(
            'class' => 'form-control',
            'id' => 'titulo_uniforme',
            'name' => 'titulo_uniforme',
            'placeholder' => 'Titulo Uniforme'
          );
          echo form_input($data);

          echo div_close(); //close form group 6

          echo div_open('form-group','');

          $data = array(
            'class' => 'form-control',
            'id' => 'variante_titulo',
            'name' => 'variante_titulo',
            'placeholder' => 'Variante de Titulo'
          );
          echo form_input($data);

          echo div_close(); //close form group 4

          echo div_open('form-group','');

          $data = array(
            'class' => 'form-control',
            'id' => 'edicion_mencion',
            'name' => 'edicion_mencion',
            'placeholder' => 'Edición Mensión'
          );
          echo form_input($data);
          echo div_close(); //close form group 4

          echo div_open('form-group','');

          $data = array(
            'class' => 'form-control',
            'id' => 'lugar_editorial',
            'name' => 'lugar_editorial',
            'placeholder' => 'Lugar Editorial'
          );
          echo form_input($data);

          echo div_close(); //close form group 4

          echo div_open('form-group','');


          $data = array(
            'class' => 'form-control',
            'id' => 'volumen',
            'name' => 'volumen',
            'placeholder' => 'Volumen'
          );
          echo form_input($data);
          echo div_close(); //close form group 4
          echo div_open('form-group','');

          $data = array(
            'class' => 'form-control',
            'id' => 'notas_generales',
            'name' => 'notas_generales',
            'placeholder' => 'Notas Generales'
          );
          echo form_input($data);
          echo div_close(); //close form group 4

          echo div_open('form-group','');

          $data = array(
            'class' => 'form-control',
            'id' => 'notas_contenido',
            'name' => 'notas_contenido',
            'placeholder' => 'Notas de Contenido'
          );
          echo form_input($data);
          echo div_close(); //close form group 4

          echo div_open('form-group','');

          $data = array(
            'class' => 'form-control',
            'id' => 'liga_recursos',
            'name' => 'liga_recursos',
            'placeholder' => 'Liga a Recursos Electronicos'
          );
          echo form_input($data);
          echo div_close(); //close form group 4

          echo div_open('form-group','');

          $data = array(
            'class' => 'form-control',
            'id' => 'fecha_publicacion',
            'name' => 'fecha_publicacion',
            'placeholder' => 'Fecha de Publicación'
          );
          echo form_input($data);
          echo div_close(); //close form group 4

          echo div_open('form-group','');


          $data = array(
            'class' => 'form-control',
            'id' => 'editorial',
            'name' => 'editorial',
            'placeholder' => 'Editorial',
            'required' => 'required'
          );
          echo form_input($data);
        echo div_close(); //close form group 4
        $input_submit = array(
              'type'       => 'submit',
              'id'          =>'btn_enviar_modal',
              'style'       => 'max-width:60%',
              'value'       =>'Siguiente',
              'class'       => 'form-control btn-primary glyphicon glyphicon-ok'

            );
        echo form_submit($input_submit);
        echo form_close();
        echo div_close(); //close col-md-6
      echo div_close(); // close row
    echo div_close(); // close container

  ?>
