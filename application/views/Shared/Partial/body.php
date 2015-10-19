
    <header style="background-color:#1e90c1; width:100%;height:100px !important; box-shadow:-103px -60px 92px #00265d inset;">
    <img src="http://localhost:70/bibliotecaAlpha/content/img/b.png" height="100%;" width="15%;" style="webkit-filter: grayscale(100%) brightness(-25%) contrast(250%) !important;" />
    </header>
    <nav class="navbar navbar-inverse navbar-static-top" role="navigation">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                      <a class="navbar-brand" <?php echo anchor('home/','<span class="glyphicon glyphicon-home"></span>')?>></a>
                    </div>

                    <div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1" style="height: 1px;">
                        <ul class="nav navbar-nav">
                            <li><a href="#">Catálogo de usuarios</a></li>
                            <li><a href="#">Préstamos</a></li>
                            <li><a href="#">Devoluciones</a></li>
    							          <li><a href="#">Consultas</a></li>
                        </ul>
                       <ul class="nav navbar-nav navbar-right">
                              <li><?php echo anchor('registro/', 'Catalogacion de material o recepcion de materiales')?></li>
                        </ul>
                    </div>
                </div>
            </nav>
