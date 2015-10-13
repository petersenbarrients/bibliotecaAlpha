<!DOCTYPE html>
<html>
<?php $this->load->view('/Shared/Partial/head');?>
<body>
<?php $this->load->view('/Shared/Partial/body');?>
<div class="container" style="width:60% !important;">
  <div class="panel panel-primary" >

    <div class="panel-heading"><center>Seleccione opción para registro de material<center></div>
    <ul class="nav nav-tabs nav-justified">
        <li role="presentation" class="active"><a  data-toggle="tab" href="#nuevo_registro">Recepción de nuevo material</a></li>
        <li role="presentation"><a data-toggle="tab" href="#en_base">Registro en base a acervo existente</a></li>
        <li role="presentation"><a data-toggle="tab" href="#nueva_ficha">Registro de nueva ficha</a></li>
    </ul>
    <div class="tab-content">

        <div id="nuevo_registro" class="tab-pane fade in active">
            <form>
                <button class="btn btn-primary">primer vista</button>
            </form>
        </div>

        <div id="en_base" class="tab-pane fade">
                <button class="btn btn-primary">segunda vista</button>
        </div>

        <div id="nueva_ficha" class="tab-pane fade">
                <button class="btn btn-primary">tercera vista</button>
        </div>
    </div>
  </div>
</div>


</body
<footer>
<?php $this->load->view('/Shared/Partial/footer');?>
</footer>
</html>
