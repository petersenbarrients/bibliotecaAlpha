<?php
echo "<!DOCTYPE html>";
$this->load->view('/Shared/Partial/head');


?>

  <script type="text/javascript">
        $(document).ready(function() {
         var a = new Array();
        $( "#biblioteca").val(<?php echo $biblioteca ?>);
        $( "#coleccion").val(<?php echo $coleccion ?>);
        $( "#escuela").val(<?php echo $escuela ?>);
        $( "#tipo_de_material").val(<?php echo $tipo_de_material ?>);
         $(".form-control").prop("readonly","true");
         $( ".form-control" ).prop( "disabled", true );
        });
  </script>


<?php

echo "<body>";
$this->load->view('/Shared/Partial/body');
$attLabel = array(
    'class' => 'control-label col-sm-2',
    'style' =>'font-size:11px;'
);

  $attributes = array('id'=>'modificarLibro', 'class'=>'form-horizontal col-xs-6 col-sm-6 col-md-6 col-xl-6','role' => 'form');
echo div_open('container','');
  echo form_open('libro/eliminarLibroAction',$attributes);

      $data = array(
     'type'  => 'hidden',
     'name'  => 'id',
     'value' => $id);
      echo form_input($data);

      $data = array(
     'type'  => 'hidden',
     'id' =>'idEtiquetaMarc',
     'name'  => 'idEtiquetaMarc',
     'value' => '');
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


/**/

?>

<div class="panel panel-info" id="panel">
   <div class="panel-heading">Etiqueta relacionada</div>
   <div class="panel-body" id="panel" style="font-size:10px;">



     <div class="panel panel-danger" id="panel">
        <div class="panel-heading">Este ejemplar tiene relacion con esta etiqueta</div>
    </div>

    <?php
    /*
      'isbn,titulo_uniforme, autor_personal, volumen'
    */
        foreach ($etiquetas as $key)
        {
          $data = array(
              'type'  => 'text',
              'id'    => 'isbn',
              'value' => $key['isbn'],
              'style' => 'max-width:60%;max-heigth:10%;',
              'readonly'=>'readonly',
              'class' => ' des form-control');
            echo "<h3><span class='label label-info'>ISBN</span></h3>".form_input($data)."</br>";


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


        }
     ?>

   </div>
 </div>

<?php

/**/

$data = array(
    'type'  => 'submit',
    'name'  => 'go',
    'id'    => 'go',
    'value' => "Eliminar ejemplar",
    'style' => 'max-width:60%;',
    'class' => 'btn btn-primary');
echo form_button($data,"Eliminar ejemplar");
      echo form_close();//cierre de formulario
  echo div_close(); //close container
echo "</body>";
?>

<footer>
<?php $this->load->view('/Shared/Partial/footer');?>
</footer>

<?php
echo "</html>";
?>
