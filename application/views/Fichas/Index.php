<?php
echo "<!DOCTYPE html>";
$this->load->view('/Shared/Partial/head');
echo "<body>";
$this->load->view('/Shared/Partial/body');
$attLabel = array(
    'class' => 'control-label col-sm-2',
        'style' =>'font-size:11px;'
);
  $attributes = array('id'=>'modificarFicha','class'=>'form-horizontal col-xs-6 col-sm-6 col-md-6 col-xl-6','role' => 'form');
echo div_open('container','');
  echo form_open('Ficha/actionModificar',$attributes);
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
        'id'    => 'isbn',
        'value' => $key['isbn'],
        'class' => 'form-control');
echo div_open('form-group','');
              echo form_label('ISBN', 'isbn',$attLabel);
              echo div_open('col-sm-10','');
                  echo form_input($data);
              echo div_close();
echo div_close();


    $data = array(
        'type'  => 'text',
        'name'  => 'clasificacion_decimal_dewey',
        'id'    => 'clasificacion_decimal_dewey',
        'value' => $key['clasificacion_decimal_dewey'],
        'class' => 'form-control');
echo div_open('form-group','');
            echo form_label('Clasificacion Decimal de Dewey', 'clasificacion_decimal_dewey',$attLabel);
            echo div_open('col-sm-10','');
              echo form_input($data);
            echo div_close();
echo div_close();


   $data = array(
     'type'  => 'text',
     'name'  => 'autor_personal',
     'id'    => 'autor_personal',
     'value' => $key['autor_personal'],
     'class' => 'form-control');
echo div_open('form-group','');
          echo form_label('Autor Personal', 'autor_personal',$attLabel);
          echo div_open('col-sm-10','');
              echo form_input($data);
          echo div_close();
echo div_close();


   $data = array(
     'type'  => 'text',
     'name'  => 'autor_cooporativo',
     'id'    => 'autor_cooporativo',
     'value' => $key['autor_cooporativo'],
     'class' => 'form-control');
echo div_open('form-group','');
    echo form_label('Autor Cooporativo', 'autor_cooporativo',$attLabel);
    echo div_open('col-sm-10','');
            echo form_input($data);
    echo div_close();
echo div_close();


  $data = array(
    'type'  => 'text',
    'name'  => 'asiento_por_titulo_uniforme',
    'id'    => 'asiento_por_titulo_uniforme',
    'value' => $key['asiento_por_titulo_uniforme'],
    'class' => 'form-control');

 echo div_open('form-group','');
        echo form_label('Asiento', 'asiento_por_titulo_uniforme',$attLabel);
        echo div_open('col-sm-10','');
            echo form_input($data);
        echo div_close();
 echo div_close();
 $data = array(
   'type'  => 'text',
   'name'  => 'titulo_uniforme',
   'id'    => 'titulo_uniforme',
   'value' => $key['titulo_uniforme'],
   'class' => 'form-control');
echo div_open('form-group','');
        echo form_label('Título uniforme', 'titulo_uniforme',$attLabel);
        echo div_open('col-sm-10','');
            echo form_input($data);
        echo div_close();
echo div_close();


$data = array(
  'type'  => 'text',
  'name'  => 'variante_de_titulo',
  'id'    => 'variante_de_titulo',
  'value' => $key['variante_de_titulo'],
  'class' => 'form-control');
echo div_open('form-group','');
      echo form_label('Variante de título', 'variante_de_titulo',$attLabel);
      echo div_open('col-sm-10','');
        echo form_input($data);
      echo div_close();
echo div_close();


$data = array(
  'type'  => 'text',
  'name'  => 'edicion_mencion_edicion',
  'id'    => 'edicion_mencion_edicion',
  'value' => $key['edicion_mencion_edicion'],
  'class' => 'form-control');
echo div_open('form-group','');
        echo form_label('Edición/mención de edición', 'edicion_mencion_edicion',$attLabel);
        echo div_open('col-sm-10','');
            echo form_input($data);
        echo div_close();
echo div_close();


$data = array(
  'type'  => 'text',
  'name'  => 'lugar_editorial',
  'id'    => 'lugar_editorial',
  'value' => $key['lugar_editorial'],
  'class' => 'form-control');
echo div_open('form-group','');
    echo form_label('Lugar de editorial', 'lugar_editorial',$attLabel);
      echo div_open('col-sm-10','');
          echo form_input($data);
      echo div_close();
echo div_close();


$data = array(
  'type'  => 'text',
  'name'  => 'volumen',
  'id'    => 'volumen',
  'value' => $key['volumen'],
  'class' => 'form-control');
echo div_open('form-group','');
    echo form_label('Volumen', 'volumen',$attLabel);
    echo div_open('col-sm-10','');
        echo form_input($data);
    echo div_close();
echo div_close();


$data = array(
  'type'  => 'text',
  'name'  => 'notas_generales',
  'id'    => 'notas_generales',
  'value' => $key['notas_generales'],
  'class' => 'form-control');
echo div_open('form-group','');
    echo form_label('Notas Generales', 'notas_generales',$attLabel);
    echo div_open('col-sm-10','');
        echo form_input($data);
    echo div_close();
echo div_close();



$data = array(
  'type'  => 'text',
  'name'  => 'notas_de_contenido',
  'id'    => 'notas_de_contenido',
  'value' => $key['notas_de_contenido'],
  'class' => 'form-control');
echo div_open('form-group','');
    echo form_label('Notas de contenido', 'notas_de_contenido',$attLabel);
    echo div_open('col-sm-10','');
      echo form_input($data);
    echo div_close();
echo div_close();



$data = array(
  'type'  => 'text',
  'name'  => 'liga_a_recursos_electronicos',
  'id'    => 'liga_a_recursos_electronicos',
  'value' => $key['liga_a_recursos_electronicos'],
  'class' => 'form-control');
echo div_open('form-group','');
    echo form_label('Liga a recursos Electronicos', 'liga_a_recursos_electronicos',$attLabel);
    echo div_open('col-sm-10','');
        echo form_input($data);
    echo div_close();
echo div_close();



$data = array(
  'type'  => 'date',
  'name'  => 'fecha_publicacion',
  'id'    => 'fecha_publicacion',
  'value' => $key['fecha_publicacion'],
  'class' => 'form-control');
echo div_open('form-group','');
  echo form_label('Fecha de Publicacion', 'fecha_publicacion',$attLabel);
  echo div_open('col-sm-10','');
    echo form_input($data);
  echo div_close();
echo div_close();



$data = array(
  'type'  => 'text',
  'name'  => 'editorial',
  'id'    => 'editorial',
  'value' => $key['editorial'],
  'class' => 'form-control');
echo div_open('form-group','');
    echo form_label('Editorial', 'editorial',$attLabel);
    echo div_open('col-sm-10','');
      echo form_input($data);
    echo div_close();
echo div_close();

$data = array(
  'id' => 'submi',
  'type'       => 'submit',
  'class' => 'form-control btn-primary',
  'value' => 'Registrar',

);
echo form_submit($data,"Registrar");
 }
      echo form_close();
  echo div_close(); //close container
echo "</body>";
?>

<footer>
<?php $this->load->view('/Shared/Partial/footer');?>
</footer>

<?php
echo "</html>";
?>
