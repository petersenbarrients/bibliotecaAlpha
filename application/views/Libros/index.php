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

      $data = array(
     'type'  => 'hidden',
     'name'  => 'id',
     'value' => 'id');

      echo form_input($data);



      $data = array(
        'type'  => 'text',
        'name'  => 'numero_de_adquisicion',
        'id'    => 'hiddenemail',
        'value' => $numero_adqui,
        'class' => 'form-control');
echo div_open('form-group','');
    echo form_label('Numero de adquisicion', 'username',$attLabel);
              echo div_open('col-sm-10','');
                  echo form_input($data);
              echo div_close();
echo div_close();


    $data = array(
        'type'  => 'text',
        'name'  => 'titulo',
        'id'    => 'hiddenemail',
        'value' => $titulo_de_libro,
        'class' => 'form-control');
echo div_open('form-group','');
        echo form_label('Titulo uniforme', 'username',$attLabel);
            echo div_open('col-sm-10','');
              echo form_input($data);
            echo div_close();
echo div_close();


    $data = array(
        'type'  => 'text',
        'name'  => 'autor_personal',
        'id'    => 'hiddenemail',
        'value' => $autor_personal,
        'class' => 'form-control');
echo div_open('form-group','');
        echo form_label('autor_personal', 'username',$attLabel);
            echo div_open('col-sm-10','');
              echo form_input($data);
            echo div_close();
echo div_close();


    $data = array(
        'type'  => 'text',
        'name'  => 'volumen',
        'id'    => 'hiddenemail',
        'value' => $volumen,
        'class' => 'form-control');
echo div_open('form-group','');
        echo form_label('volumen', 'username',$attLabel);
            echo div_open('col-sm-10','');
              echo form_input($data);
            echo div_close();
echo div_close();

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
