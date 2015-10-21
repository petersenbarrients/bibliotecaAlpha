<!DOCTYPE html>
<html>
  <body>
    <?php

      echo "<br>";
      echo div_open('row','');
        echo div_open('col-md-8','');
              //panel datos nueva ficha
              echo div_open('panel panel-info ','newpanel');

                echo div_open('panel-body','');
                  echo div_open('container','');
                        $attributes = array(
                          'class' => 'form-horizontal col-xs-4 col-sm-4 col-md-4 col-xl-4',
                           'role' => 'form',
                           'id' => 'form'
                         );

                        //echo form_open('catalogacion/nueva', $attributes);
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
                              'placeholder' => 'Autor Personal',
                              'required' => 'required'
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
                          'placeholder' => 'Asiento por Titulo',
                          'required' => 'required'
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
                          'placeholder' => 'Titulo Uniforme',
                          'required' => 'required'
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
                          'placeholder' => 'Variante de Titulo',
                          'required' => 'required'
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
                          'placeholder' => 'Editorial',
                          'required' => 'required'
                        );
                        echo form_input($data);
                      echo div_close(); //close form group 4
                      $data = array(
                        'id' => 'submi',
                        'class' => 'form-control btn-primary',
                        'type' => 'submit'
                      );

                      echo form_input($data,'Registrar');
                      //echo form_submit($data,'Registrar');
                      echo form_close(); // close form-close
                      echo div_close(); // close div-container
                      echo div_close(); //close panel-body
                      echo div_close(); // close panel
                      echo div_close(); //close col-md-6 registro

                      echo div_close(); //close col-md-4
                    echo div_close(); // close row
                echo div_close(); //close tab-pane fade
        echo div_close();
      echo div_close();

    ?>

  </body>
</html>
