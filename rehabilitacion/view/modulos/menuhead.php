<nav class="navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
	 <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="nav navbar-brand" href="#"></a>
    </div>
	
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav" >
        <li  ><a href="index.php"><span class="glyphicon glyphicon-home" ><?php echo " Inicio" ;?></span> <span class="sr-only">(current)</span></a></li>
        
        <li  ><a href="index.php"><span class="glyphicon glyphicon-user" ><?php echo " Login" ;?></span> <span class="sr-only">(current)</span></a></li>
          
        <li  ><a href="index.php"><span class="glyphicon glyphicon-briefcase" ><?php echo " Nosotros" ;?></span> <span class="sr-only">(current)</span></a></li>
        
        <li  ><a href="index.php?controller=Afiliaciones&action=index"><span class="glyphicon glyphicon-folder-open" ><?php echo " Afiliaciones" ;?></span> <span class="sr-only">(current)</span></a></li>  
      
        <li  ><a href="index.php?controller=Mensajes&action=index"><span class="glyphicon glyphicon-comment" ><?php echo " Contacto" ;?></span> <span class="sr-only">(current)</span></a></li>
      </ul>
 
 	  <form class="navbar-form navbar-right" role="search" action="<?php echo $helper->url("Documentos","Buscador");?>"  method="post" >
        <div class="form-group">
          	<input type="text" class="form-control" name="contenido_busqueda" id="criterio_busqueda" placeholder="texto a buscar">
    		<button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-search	" ><?php echo " Buscar" ;?> </span></button>
      	</div>
      </form>
 	     
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
