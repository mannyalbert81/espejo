<!DOCTYPE HTML>
<html lang="es">
      <head>
        <meta charset="utf-8"/>
        <title>Login - Vademano 2015</title>
   
   		  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		  			   
          <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	      <script src="//code.jquery.com/jquery-1.10.2.js"></script>
		  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		
		<link rel="stylesheet" href="http://jqueryvalidation.org/files/demo/site-demos.css">
        <script src="http://jqueryvalidation.org/files/dist/jquery.validate.min.js"></script>
        <script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>
 		
 		<script src="//cdn.jsdelivr.net/webshim/1.14.5/polyfiller.js"></script>
		
 			
        <style>
            input{
                margin-top:5px;
                margin-bottom:5px;
            }
            .right{
                float:right;
            }
                
            
        </style>
    </head>
    <body>
    
       <div style="background-color: #4bae4f; " >
    	 	<?php include("view/modulos/head.php"); ?>
    	 </div>
  
    
       
      <form id="form" action="<?php echo $helper->url("Usuarios","Loguear"); ?>" method="post" class="col-lg-6">
            <h4>Login</h4>
            <hr/>
           <?php if (isset($resultado)) {?>
        	<?php if ($resultado == "true") {?>
        	
	        	
				  <div class="alert alert-success" role="alert">Ok<strong> correctamente </strong>, Enviamos a tu emil la informacion necesaria para el acceso al sistema</div>
				
			<?php }if ($resultado == "false") {?>
				
				  <div class="alert alert-danger" role="alert">Su cuenta o clave son incorrectos</div>
				
				<?php } ?>
	        <?php } ?>
	        
     
          	   <div class="row">
					  <div class="col-xs-4 col-md-4">
					  </div>
					  <div class="col-xs-4 col-md-4">
					  	<p  class="formulario-subtitulo" >Usuario </p>
					  	<input type="text" name="usuario_usuario" id="usuario_usuario" value="" class="form-control"/>
					  	<div id="mensaje_usuario_usuario" class="errores"></div>
					  </div>
					  <div class="col-xs-4 col-md-4">
					  </div>
				</div>
				 <div class="row">
				 	<div class="col-xs-4 col-md-4">
					  </div>
					  <div class="col-xs-4 col-md-4">
					  	<p  class="formulario-subtitulo" >Contraseña</p>
					  	<input type="password" name="clave_usuario" id="clave_usuario" value="" class="form-control"/>
					  	<div id="mensje_clave_usuario" class="errores"></div>
					  	
					  </div>
					<div class="col-xs-4 col-md-4">
					  </div>
				</div>
			
			 <hr>
			 
		   <div class="row">
		      <div class="col-xs-3 col-md-3">
			  </div>
			  
			  <div class="col-xs-3 col-md-3"  >
			  	 <p><a href="<?php echo $helper->url("Usuarios","Reset"); ?>" >Reestablecer Cuenta</a> </p>
			  	
			  </div>
			  <div class="col-xs-3 col-md-3"  >
			  	 
			  	<input type="submit" id="btn_login" name="btn_login" value="Login" class="btn btn-success"/>
			  </div>
			  <div class="col-xs-3 col-md-3">
					  </div>
			</div>     
           
          <hr>	
          </form>
       
      <form id="form" action="<?php echo $helper->url("Afiliaciones","InsertaAfiliados"); ?>" method="post" class="col-lg-6">
            
            <hr>
            <div class="img-responsive">
             <img alt="publicidad" src="view/images/publicidad.png">
             
            </div>
            
      </form>

   <div> 
   		 <?php include("view/modulos/servicios.php"); ?>	
   		  </div>
   		 <div style="margin-top: 20px; background-color: #4bae4f;">
   		 
   		 <?php include("view/modulos/small_slide.php"); ?>
   		 
   		 </div>
   		 
   	 	<div style="background-color: #7acb5a;">
   	 	 
    	 <footer class="col-lg-12" >
     	 	<?php include("view/modulos/footer.php"); ?>
    	 </footer>     
    	</div>
     </body>  
    </html>   