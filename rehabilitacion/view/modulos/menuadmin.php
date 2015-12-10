<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Menu Administracion</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="http://186.71.172.100:4000/aDcument"><span class="glyphicon glyphicon-home" ><?php echo " Inicio" ;?></span> <span class="sr-only">(current)</span></a></li>
        
        <li class="dropdown" style="background-color: #ffffff;" >
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-modal-window" ><?php echo " Administración" ;?> </span> <span class="caret"></span></a>
          <ul class="dropdown-menu">
        	<li><a href="index.php?controller=Usuarios&action=index">Usuarios</a>
		    </li>
			
		   
          </ul>
        </li>
           <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-file" ><?php echo " Gestión de Fichas" ;?> </span> <span class="caret"></span></a>
          <ul class="dropdown-menu">
          <li><a href="<?php echo $helper->url("Especies","index"); ?>">Especies</a>
		    </li>
			<li><a href="<?php echo $helper->url("PrincipiosActivos","index"); ?>">Principios Activos</a>
			</li>
			<li><a href="<?php echo $helper->url("UnidadesMedida","index"); ?>">Unidades de Medida</a>
			</li>
			<li><a href="<?php echo $helper->url("Distribuidores","index"); ?>">Distribuidores</a>
			</li>
			<li><a href="<?php echo $helper->url("Laboratorios","index"); ?>">Laboratorios</a>
			</li>
			
			<li role="separator" class="divider"></li>
		
			<li><a href="<?php echo $helper->url("FichasProductos","index"); ?>">Fichas de Productos </a>
			</li>
	        
          </ul>
        </li>
     
      
    
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>