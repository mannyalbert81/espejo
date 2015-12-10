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
    
       <?php include("view/modulos/head.php"); ?>
       
  
    
       
      <form id="form" action="<?php echo $helper->url("Usuarios","Reset"); ?>" method="post" class="col-lg-6">
            <h4>Login</h4>
            <hr/>
           <?php if (isset($resultSet)) {?>
			<?php if ($resultSet != "") {?>
		
				 <?php if ($error == TRUE) {?>
				 	<div class="alert alert-danger" role="alert"><?php echo $resultSet; ?></div>
				 <?php } else {?>			
				    <div class="alert alert-success" role="alert"><?php echo $resultSet; ?></div>
					<div class="alert alert-success" role="alert"><strong>Te reedirecionaremos a la pagina de Login</strong></div>	
	  			 <?php sleep(5); ?>
     
     			 <?php }?>
			
	        <?php } ?>
	        <?php } ?>
     
          	   <div class="row">
					  <div class="col-xs-4 col-md-4">
					  </div>
					  <div class="col-xs-4 col-md-4">
					  	<p  class="formulario-subtitulo" >Usuario </p>
					  	<input type="text" name="reestablecer_usuario" id="reestablecer_usuario" value="" class="form-control"/>
					  	<div id="mensaje_reestablecer_usuario" class="errores"></div>
					  </div>
					  <div class="col-xs-4 col-md-4">
					  </div>
				</div>
				
			
			 <hr>
			  <?php if ($resultSet == "") {?>
				
		  		 <div class="alert alert-success" role="alert">Introduzca un nombre de usuario o correo electrónico del usuario registrado en el sistema.</div>
				
	        <?php    } ?>
	        
	  			 
		
			 <hr>
		  
			

		   <div class="row">
		      <div class="col-xs-4 col-md-4">
			  </div>
			  
			  <div class="col-xs-4 col-md-4"  >
			  	 
			  	<input type="submit" id="btn_reestablecer" name="btn_reestablecer" value="Reestablecer" class="btn btn-success"/>
			  </div>
			  <div class="col-xs-4 col-md-4">
					  </div>
			</div>     
           
          <hr>	
          </form>
       
      <form id="form" action="<?php echo $helper->url("Afiliaciones","InsertaAfiliados"); ?>" method="post" class="col-lg-6">
            <h4>Publicidad Aqui</h4>
            <hr/>
        
          </form>
         
      </div>
      
      	<div class="col-lg-12">
  					
   		     <?php include("view/modulos/servicios.php"); ?>	
   			 <?php include("view/modulos/beforefooter.php"); ?>
    		
   		</div>     
  
       <footer class="col-lg-12">
     	 	<?php include("view/modulos/footer.php"); ?>
    	 </footer> 
   
     </body>  
    </html>   