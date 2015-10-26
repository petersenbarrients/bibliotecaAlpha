<?php
echo "<!DOCTYPE html>";
$this->load->view('/Shared/Partial/head');
echo "<body>";
$this->load->view('/Shared/Partial/body');
$attLabel = array(
    'class' => 'control-label col-sm-2',
);
  $attributes = array('id'=>'modificarFicha', 'role' => 'form');
echo div_open('container','');
  echo form_open('email/send',$attributes);
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
        'class' => 'form-control');
echo div_open('form-group','');
    echo form_label('What is your Name', 'username',$attLabel);
              echo div_open('col-sm-10','');
                  echo form_input($data);
              echo div_close();
echo div_close();


    $data = array(
        'type'  => 'text',
        'name'  => 'clasificacion_decimal_dewey',
        'id'    => 'hiddenemail',
        'value' => $key['clasificacion_decimal_dewey'],
        'class' => 'form-control');
echo div_open('form-group','');
        echo form_label('What is your Name', 'username',$attLabel);
            echo div_open('col-sm-10','');
              echo form_input($data);
            echo div_close();
echo div_close();


   $data = array(
     'type'  => 'text',
     'name'  => 'autor_personal',
     'id'    => 'hiddenemail',
     'value' => $key['autor_personal'],
     'class' => 'form-control');
echo div_open('form-group','');
          echo form_label('What is your Name', 'username',$attLabel);
          echo div_open('col-sm-10','');
              echo form_input($data);
          echo div_close();
echo div_close();


   $data = array(
     'type'  => 'text',
     'name'  => 'autor_cooporativo',
     'id'    => 'hiddenemail',
     'value' => $key['autor_cooporativo'],
     'class' => 'form-control');
echo div_open('form-group','');
    echo form_label('What is your Name', 'username',$attLabel);
    echo div_open('col-sm-10','');
            echo form_input($data);
    echo div_close();
echo div_close();


  $data = array(
    'type'  => 'text',
    'name'  => 'asiento_por_titulo_uniforme',
    'id'    => 'hiddenemail',
    'value' => $key['asiento_por_titulo_uniforme'],
    'class' => 'form-control');

 echo div_open('form-group','');
        echo form_label('What is your Name', 'username',$attLabel);
        echo div_open('col-sm-10','');
            echo form_input($data);
        echo div_close();
 echo div_close();
 $data = array(
   'type'  => 'text',
   'name'  => 'titulo_uniforme',
   'id'    => 'hiddenemail',
   'value' => $key['titulo_uniforme'],
   'class' => 'form-control');
echo div_open('form-group','');
        echo form_label('What is your Name', 'username',$attLabel);
        echo div_open('col-sm-10','');
            echo form_input($data);
        echo div_close();
echo div_close();


$data = array(
  'type'  => 'text',
  'name'  => 'variante_de_titulo',
  'id'    => 'hiddenemail',
  'value' => $key['variante_de_titulo'],
  'class' => 'form-control');
echo div_open('form-group','');
echo form_label('What is your Name', 'username',$attLabel);
echo div_open('col-sm-10','');
  echo form_input($data);
  echo div_close();
echo div_close();


$data = array(
  'type'  => 'text',
  'name'  => 'edicion_mencion_edicion',
  'id'    => 'hiddenemail',
  'value' => $key['edicion_mencion_edicion'],
  'class' => 'form-control');
echo div_open('form-group','');
echo form_label('What is your Name', 'username',$attLabel);
echo div_open('col-sm-10','');
  echo form_input($data);
  echo div_close();
echo div_close();


$data = array(
  'type'  => 'text',
  'name'  => 'lugar_editorial',
  'id'    => 'hiddenemail',
  'value' => $key['lugar_editorial'],
  'class' => 'form-control');
echo div_open('form-group','');
    echo form_label('What is your Name', 'username',$attLabel);
      echo div_open('col-sm-10','');
          echo form_input($data);
      echo div_close();
    echo div_close();


$data = array(
  'type'  => 'text',
  'name'  => 'volumen',
  'id'    => 'hiddenemail',
  'value' => $key['volumen'],
  'class' => 'form-control');
echo div_open('form-group','');
    echo form_label('What is your Name', 'username',$attLabel);
    echo div_open('col-sm-10','');
        echo form_input($data);
    echo div_close();
echo div_close();


$data = array(
  'type'  => 'text',
  'name'  => 'notas_generales',
  'id'    => 'hiddenemail',
  'value' => $key['notas_generales'],
  'class' => 'form-control');
echo div_open('form-group','');
    echo form_label('What is your Name', 'username',$attLabel);
    echo div_open('col-sm-10','');
        echo form_input($data);
    echo div_close();
echo div_close();



$data = array(
  'type'  => 'text',
  'name'  => 'notas_de_contenido',
  'id'    => 'hiddenemail',
  'value' => $key['notas_de_contenido'],
  'class' => 'form-control');
echo div_open('form-group','');
    echo form_label('What is your Name', 'username',$attLabel);
    echo div_open('col-sm-10','');
      echo form_input($data);
    echo div_close();
echo div_close();



$data = array(
  'type'  => 'text',
  'name'  => 'liga_a_recursos_electronicos',
  'id'    => 'hiddenemail',
  'value' => $key['liga_a_recursos_electronicos'],
  'class' => 'form-control');
echo div_open('form-group','');
    echo form_label('What is your Name', 'username',$attLabel);
    echo div_open('col-sm-10','');
        echo form_input($data);
    echo div_close();
echo div_close();



$data = array(
  'type'  => 'date',
  'name'  => 'fecha_publicacion',
  'id'    => 'hiddenemail',
  'value' => $key['fecha_publicacion'],
  'class' => 'form-control');
echo div_open('form-group','');
  echo form_label('What is your Name', 'username',$attLabel);
  echo div_open('col-sm-10','');
    echo form_input($data);
  echo div_close();
echo div_close();



$data = array(
  'type'  => 'text',
  'name'  => 'editorial',
  'id'    => 'hiddenemail',
  'value' => $key['editorial'],
  'class' => 'form-control');
echo div_open('form-group','');
    echo form_label('What is your Name', 'username',$attLabel);
    echo div_open('col-sm-10','');
      echo form_input($data);
  echo div_close();
echo div_close();



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
