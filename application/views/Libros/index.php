<?php

?>
  <script type="text/javascript">
        $(document).ready(function() {
        $("#alerta_exito_mod").hide();
        $("#alerta_exito_mod_padre").hide();
        var a = new Array();
        $( "#biblioteca").val(<?php echo $biblioteca ?>);
        $( "#coleccion").val(<?php echo $coleccion ?>);
        $( "#escuela").val(<?php echo $escuela ?>);
        $( "#tipo_de_material").val(<?php echo $tipo_de_material ?>);
        $("#go_etiqueta").hide();
        $("#alerta").hide();
        $("#alerta4").show();
        var isbnCliente = document.getElementById('isbn_test').value;
        var aux_erroneo_isbn = document.getElementById('isbn_test').value;
        var aux_id_por_erroreo_isbn = document.getElementById('hidden_idEtiquetaMarc').value;
        $("#alerta_modificar_isbn_no_existe").hide();
          $("div#modificar_isbn").hide();

               $("input[name='cb']").click(function(){
                   	if($(this).val()=="SI")
                    {

                      $('#sp').show();
                      $("div#modificar_isbn").show();
                        $("input#isbn_test").focus();
                      $("#go_etiqueta").show();
                      $("#go").hide();
                      $("#alerta").show(100);


                    }
                    else {
                          $("div#modificar_isbn").hide();
                          $("#titulo_uniforme").prop('readonly', true);
                          $("#autor_personal").prop('readonly', true);
                          $("#go_etiqueta").hide();
                          $("#go").show();
                          $("#alerta").hide(100);

                    }
                })
                $("#modificarLibro").submit(function(){

                     $.ajax({
                         url: $(this).attr("action") ,
                         type: $(this).attr("method"),
                         data: $(this).serialize(),// Adjuntar los campos del formulario enviado.
                         success: function(data)
                         {
                             $("#alerta_exito_mod").show();

                              var alerta_exito = $("#alerta_exito_mod").html();
                              $("#modificar_libro_modal").empty();



                         }
                       });

                  return false; // Evitar ejecutar el submit del formulario.

                  });


        $("#go_etiqueta").click(function(){
            var isbnServer = "";
            isbnCliente = document.getElementById('isbn_test').value;
            console.log("["+isbnCliente+"]");
            $.ajax(
              {
                url : '<?php echo site_url('Ficha/obtenerISBN'); ?>',
                data : { isbn :isbnCliente },
                type : 'POST',
                success : function(response) {
                    if(response != "FALSE")
                    {
                        isbnServer =  jQuery.parseJSON(response);

                    }
                    else if(response =="FALSE")
                    {
                      $("div#modificar_isbn").hide();
                      $("#alerta_modificar_isbn_no_existe").show();
                      $("#alerta_modificar_isbn_no_existe").hide(4000);
                      $("#isbn_test").val(aux_erroneo_isbn);
                      $("#hidden_idEtiquetaMarc").val(aux_id_por_erroreo_isbn);
                      $("#go_etiqueta").hide();
                      $("#go").show();
                      $("#SI").prop("checked", false);

                      return false;
                    }

                },
                complete:function()
                {
                  if(isbnServer != null)
                  {
                    console.log(isbnServer);
                    $("#isbn_test").val(isbnServer[1]);
                    $("input#titulo_uniforme").val(isbnServer[2]);
                    $("input#autor_personal").val(isbnServer[3]);
                    $("#idEtiquetaMarc").val(isbnServer[0]);
                    $("#go_etiqueta").hide();
                    $("#go").show();
                    $("#SI").prop("checked", false);
                  }


                }

              }
            );

        });
        });
  </script>


<?php


$attLabel = array(
    'class' => 'control-label col-sm-2',
    'style' =>'font-size:11px;'
);

  $attributes = array('id'=>'modificarLibro', 'class'=>'form-horizontal col-xs-6 col-sm-6 col-md-6 col-xl-6','role' => 'form');
echo div_open('container','');
  echo form_open('libro/modificarLibroAction',$attributes);

      $data = array(
     'type'  => 'hidden',
     'id'=>'hidden_id',
     'name'  => 'id',
     'value' => $id);
      echo form_input($data);




      $data = array(
        'type'  => 'text',
        'name'  => 'numero_de_adquisicion',
        'id'    => 'numero_de_adquisicion',
        'value' => $numero_adqui,
        'style' => 'max-width:60%;',
        'class' => 'form-control');
echo div_open('form-group','');
    echo form_label('Numero de adquisición', 'numero_de_adquisicion',$attLabel);
              echo div_open('col-sm-10','');
                  echo form_input($data);
              echo div_close();
echo div_close();


    $data = array(
        'type'  => 'text',
        'name'  => 'biblioteca',
        'id'    => 'dbiblioteca',
        'value' => $biblioteca,
        'class' => 'form-control');
echo div_open('form-group','');
        echo form_label('Biblioteca', 'biblioteca',$attLabel);
            echo div_open('col-sm-10','');
              echo form_dropdown('biblioteca',$bibliotecas,'', 'class="form-control" required id="biblioteca" style="max-width:60%;" required');
            echo div_close();
echo div_close();

    $data = array(
        'type'  => 'text',
        'name'  => 'escuela',
        'id'    => 'descuela',
        'value' => $escuela,
        'class' => 'form-control');
echo div_open('form-group','');
        echo form_label('Escuela', 'escuela',$attLabel);
            echo div_open('col-sm-10','');
              echo form_dropdown('escuela',$escuelas,'', 'class="form-control" id="escuela" required style="max-width:60%;"');
            echo div_close();
echo div_close();


    $data = array(
        'type'  => 'text',
        'name'  => 'coleccion',
        'id'    => 'dcoleccion',
        'value' => $coleccion,
        'class' => 'form-control');
echo div_open('form-group','');
        echo form_label('Coleccion', 'coleccion',$attLabel);
            echo div_open('col-sm-10','');
              echo form_dropdown('coleccion',$colecciones,'', 'class="form-control" id="coleccion" style="max-width:60%; required"');
            echo div_close();
echo div_close();

$data = array(
    'type'  => 'number',
    'min' =>'1',
    'max' =>'5',
    'name'  => 'ejemplar',
    'id'    => 'ejemplar',
    'value' => $ejemplar,
    'style' => 'max-width:60%;',
    'class' => 'form-control');
echo div_open('form-group','');
    echo form_label('Ejemplar', 'Ejemplar',$attLabel);
        echo div_open('col-sm-10','');
          echo form_input($data);
        echo div_close();
echo div_close();

$att_R1 = array('id' => '_seleNO', 'name'=>'myradio','checked'=>true,'value'=>'1');
$att_R2 = array('id' =>'_seleSI', 'name'=>'myradio','checked'=>false,'value'=>'0');
$data = array(
    'type'  => 'text',
    'name'  => 'se_presta',
    'id'    => 'se_presta',
    'value' => $se_presta,
    'class' => 'form-control');
echo div_open('form-group','');
    echo form_label('Se presta', 'se_presta',$attLabel);
        echo div_open('col-sm-10','');
        if($se_presta == 0)
        {
        echo "SI   ". form_radio($att_R1);
        echo "NO   ".  form_radio($att_R2);

        }
        else
        {

          echo "SI   ".  form_radio($att_R2);
          echo "NO   ". form_radio($att_R1);
        }

        echo div_close();
echo div_close();


$data = array(
    'type'  => 'text',
    'name'  => 'tipo_de_material',
    'id'    => 'dtipo_de_material',
    'value' => $tipo_de_material,
    'data-live-search'=>'true',
    'class' => 'form-control');
echo div_open('form-group','');
    echo form_label('Tipo de material', 'tipo_de_material',$attLabel);
        echo div_open('col-sm-10','');
          echo form_dropdown('coleccion',$tipos_material,'', 'class="form-control" id="tipo_de_material" style="max-width:60%; required"');
        echo div_close();
echo div_close();


$data = array(
    'type'  => 'text',
    'name'  => 'es_complementario',
    'id'    => 'es_complementario',
    'value' => $es_complementario,
    'style' => 'max-width:60%;',
    'class' => 'form-control');
echo div_open('form-group','');
    echo form_label('Es complementario', 'es_complementario',$attLabel);
        echo div_open('col-sm-10','');
        if($es_complementario == 0)
        {
        echo "SI   ". form_radio('myradio1', '1', FALSE);
        echo "NO   ".  form_radio('myradio1', '0', TRUE);

        }
        else
        {

          echo "SI   ".  form_radio('myradio1', '1', TRUE);
          echo "NO   ". form_radio('myradio1', '0', FALSE);
        }
        echo div_close();
echo div_close();


$data = array(
    'type'  => 'number',
    'min' =>'1',
    'name'  => 'tomo',
    'id'    => 'tomo',
    'value' => $tomo,
    'style' => 'max-width:60%;',
    'class' => 'form-control');
echo div_open('form-group','');
    echo form_label('Tomo', 'tomo',$attLabel);
        echo div_open('col-sm-10','');
          echo form_input($data);
        echo div_close();
echo div_close();


/**/

?>

<div class="panel panel-info" id="panel">
   <div class="panel-heading">Etiqueta relacionada</div>
   <div class="panel-body" id="panel" style="font-size:10px;">



     <div class="panel panel-danger" id="panel">
        <div class="panel-heading">Cambiar la etiqueta del ejemplar</div>
      <center>  <div class="panel-body" id="panel" style="font-size:11px;">
          <?php echo "SI   ". form_radio('cb', 'SI', FALSE);
          echo "NO   ".  form_radio('cb', 'NO', TRUE); ?>
        </div></center>
        <div class="alert alert-warning alert-dismissable" id="alerta">
          <strong>¡Cuidado!</strong> Es muy importante que leas este mensaje de alerta.
          Si cambias la etiqueta del libro, deberas tener a tu alcanze el <strong>ISBN</strong> del etiqueta marc, para que este libro
          sea agregado al mismo. Asegurese de escribirlo correctamente.
          Si el <strong>ISBN</strong> es incorrecto, se conservara el actual.
        </div>
        <div class="alert alert-danger" id="alerta_modificar_isbn_no_existe">
          <strong>No existe el ISBN dado</br>Se conservará el actual</strong>
        </div>
    </div>

    <?php
    /*
      'isbn,titulo_uniforme, autor_personal, volumen'
    */
        foreach ($etiquetas as $key)
        {
          $data = array(
         'type'  => 'hidden',
         'id' =>'hidden_idEtiquetaMarc',
         'name'  => 'idEtiquetaMarc',
         'value' => $key['id']);
          echo form_input($data);
          ?>
              <script type="text/javascript">
                aux_id_por_erroreo_isbn = '<?php echo $key['id']; ?>'
              </script>
          <?php

          $data = array(
              'type'  => 'text',
              'id'    => 'isbn_test',
              'name'    => 'isbn',
              'value' => $key['isbn'],
              'style' => 'max-width:60%;max-heigth:10%;',
              'class' => 'des form-control');
              ?>
                  <script type="text/javascript">
                    aux_erroneo_isbn = '<?php echo $key['isbn']; ?>'
                  </script>
              <?php
            echo "<div id='modificar_isbn'><h3><span class='label label-info'>ISBN</span></h3>".form_input($data)."</div></br>";
              $data = array(
                  'type'  => 'text',
                  'id'    => 'titulo_uniforme',
                  'value' => $key['titulo_uniforme'],
                  'style' => 'max-width:60%;max-heigth:10%;',
                  'readonly'=>'readonly',
                  'class' => 'des form-control');
              echo  "<h3><span class='label label-info'>TITULO DEL LIBRO</span></h3>".form_input($data)."</br>";


              $data = array(
                      'type'  => 'text',
                      'id'    => 'autor_personal',
                      'value' => $key['autor_personal'],
                      'style' => 'max-width:60%;max-heigth:10%;',
                      'readonly'=>'readonly',
                      'class' => 'des form-control');
            echo  "<h3><span class='label label-info'>AUTOR</span></h3>".form_input($data)."</br>";

            $data = array(
                'type'  => 'button',
                'name'  => 'go',
                'id'    => 'go_etiqueta',
                'value' => "Guardar cambios",
                'style' => 'max-width:60%;',
                'class' => 'btn btn-danger btn-sm');
            echo form_button($data,"Cambiar etiqueta");

        }
        /*enviar con boton cambiar etiqueta isbn para verificar existencia. Si existe, cargar los campos con datos del libro. y escribir el idEtiquetaMarc con el id
        del del isbn escrito.
        QA
        enviar update general.
        Eliminacion de libro.
        */
     ?>

   </div>
 </div>

<?php

/**/

$data = array(
    'type'  => 'submit',
    'name'  => 'go',
    'id'    => 'go',
    'value' => "Guardar cambios",
    'style' => 'max-width:60%;',
    'class' => 'btn btn-primary');
echo form_button($data,"Guardar Cambios");
      echo form_close();//cierre de formulario
  echo div_close(); //close container

?>

<?php

?>
