<!DOCTYPE HTML>
<html lang="es">
   	 <head>
        <meta charset="utf-8"/>
        <title>Vademano 2015</title>
         <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		  			   
          <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	      <script src="//code.jquery.com/jquery-1.10.2.js"></script>
		  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		
		<link rel="stylesheet" href="http://jqueryvalidation.org/files/demo/site-demos.css">
        <script src="http://jqueryvalidation.org/files/dist/jquery.validate.min.js"></script>
        <script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>
 		
 		<script src="//cdn.jsdelivr.net/webshim/1.14.5/polyfiller.js"></script>
		
		
  		
  		<script> 
  		$(document).ready(function(){
		      
		        $("#a_imagen_favorito").click(function(){

      				//$("#mensaje_favorito").text("Agregando a Favoritos");
			    	//$("#mensaje_favorito").fadeIn("slow"); //Muestra mensaje de error
			   		//$("#mensaje_nombre").fadeOut("slow");
					//return false;
				});	
			});
	</script>

  	
  	<script >
		$(document).ready(function(){

		    // cada vez que se cambia el valor del combo
		    $("#chk_busquedaavanzada").click(function() 
			{

		    	if( $("#chk_busquedaavanzada").prop('checked') ) {
		    		
		    		$("#div-container-avanzado").fadeIn("slow");
		    		
			    }
		    	else
		    	{
		    		$("#div-container-avanzado").fadeOut("slow");

				}


			}); 

		    
		}); 
	</script>
    
  	<script >
		$(document).ready(function(){

		    // cada vez que se cambia el valor del combo
		    $("#option-productos").click(function() 
			{
	
	    		$("#div-productos").fadeIn("slow");
	    		$("#div-principios").fadeOut("slow");
	    		$("#div-laboratorios").fadeOut("slow");
	    		$("#div-distribuidores").fadeOut("slow");
			}); 

		    $("#option-principios").click(function() 
					{
			
			    		$("#div-productos").fadeOut("slow");
			    		$("#div-principios").fadeIn("slow");
			    		$("#div-laboratorios").fadeOut("slow");
			    		$("#div-distribuidores").fadeOut("slow");
			}); 

		    $("#option-laboratorios").click(function() 
					{
			
			    		$("#div-productos").fadeOut("slow");
			    		$("#div-principios").fadeOut("slow");
			    		$("#div-laboratorios").fadeIn("slow");
			    		$("#div-distribuidores").fadeOut("slow");
			}); 


		    $("#option-distribuidores").click(function() 
					{
			
			    		$("#div-productos").fadeOut("slow");
			    		$("#div-principios").fadeOut("slow");
			    		$("#div-laboratorios").fadeOut("slow");
			    		$("#div-distribuidores").fadeIn("slow");
			}); 
				    
		    	    
		    
		}); 
	</script>
       
          
        <style>
            input{
                margin-top:5px;
                margin-bottom:5px;
            }
            .right{
                float:right;
            }
        </style>
        <style>
			body {
			
			    /* Ubicación de la imagen */
		  background-image: url(view/images/fondo_azul.png);
		  height: 100%;
		
		
			}
			</style>
   	 </head>
   
     
   
     <body  >
     
      <?php
   
		   $sel_contenido_busqueda = "";
		   
		   if($_SERVER['REQUEST_METHOD']=='POST' )
		   {
		      $sel_contenido_busqueda = $_POST['contenido_busqueda'];
		      
		   }
		   if($_SERVER['REQUEST_METHOD']=='GET' )
		   {
		   	//$sel_contenido_busqueda = $_GET['contenido_busqueda'];
		   }
		?>
        
     
     
    	 <?php include("view/modulos/menu_only.php"); ?>
      <form id="form" action="<?php echo $helper->url("Buscador","index"); ?>" method="post"   class="col-lg-12">
         
    	 <div class="row" style=" margin-top:50px; text-align: center;"  >
			  <div class="col-xs-4 col-md-4">
			  	
			  </div>
			  <div class="col-xs-4 col-md-4">
			    	<img src="view/images/logo_vademano.png" class="img-responsive" alt="Responsive image"> 
			  </div>
			  <div class="col-xs-4 col-md-4">
			  	
			  </div>
		 </div>
	     <div class="row" style="text-align: center;"  >
	     <div class="col-xs-4 col-md-4">
			  		
	       </div>
			  <div class="col-xs-4 col-md-4">
			  	<div class="input-group">
			      <input type="text" name="contenido_busqueda" id="contenido_busqueda" value="<?php if ($sel_contenido_busqueda != ""){echo $sel_contenido_busqueda;} ?>" class="form-control" placeholder="Texto a buscar...">
			      <div id="mensaje_contenido" class="errores"></div>	
			      <span class="input-group-btn">
			        <button type="submit" id="btn_buscar" name="btn_buscar" class="btn btn-primary"><span class="glyphicon glyphicon-search	" ><?php echo "" ;?> </span></button>
			      </span>
			    </div><!-- /input-group -->
			  </div>
			  <div class="col-xs-4 col-md-4">
			  	
			</div>
			 
		 </div>
	
    	  <div class="row" style="text-align: center; margin-top: 15px;"  >
			 	
			  <div class="col-xs-5 col-md-5">
			  	
			  </div>
			  
			  <div class="col-xs-2 col-md-2" >
			        <input type="checkbox"  name="chk_busquedaavanzada" id="chk_busquedaavanzada"  value="bavanzada" > Busqueda Avanzada
			  </div>
			  
			  <div class="col-xs-5 col-md-5">
			  	
			  </div>	

		  </div>
    	 <hr>
    	  <div  id="div-container-avanzado" style="display: none;" >
    	  <div class="row"   >
    	  	<div class="col-xs-6 col-md-2">
			</div>
    	  
    	  	<div class="col-xs-6 col-md-2">
			  	<p class="calibri-bold" >Especies</p>
			  	
			</div>
    	  	<div class="col-xs-6 col-md-2">
			  	<p class="calibri-bold">Principios Activos</p>
			</div>
    	  	<div class="col-xs-6 col-md-2">
			  	<p class="calibri-bold">Forma de Administracion</p>
			
			</div>
    	  	<div class="col-xs-6 col-md-2">
			  	<p class="calibri-bold">Laboratorio</p>
			
			</div>
    	  
    	  	<div class="col-xs-6 col-md-2">
    	  		
    	  		
			</div>
    	  	
    	  </div>

		  <div class="row">
    	  	<div class="col-xs-6 col-md-2">
			</div>
    	  
    	  	<div class="col-xs-6 col-md-2" >
			  	<select name="id_especies" id="id_especies"  class="form-control" size="4" style="font-family: calibri; " >
						<option value="0"  > --SELECCIONE--</option>
						<?php foreach($resultEsp as $resEsp) {?>
							<option value="<?php echo $resEsp->id_especies; ?>"  ><?php echo $resEsp->nombre_especies; ?> </option>
							
			        	<?php } ?>
				</select> 
			  	
			</div>
    	  	<div class="col-xs-6 col-md-2" >
			  	<select name="id_composiciones" id="id_composiciones"  class="form-control" size="4" style="font-family: calibri; ">
						<option value="0"  > --SELECCIONE--</option>
						<?php foreach($resultCom as $resCom) {?>
							<option value="<?php echo $resCom->id_composiciones; ?>"  ><?php echo $resCom->nombre_composiciones; ?> </option>
							
			        	<?php } ?>
				</select>
			</div>
    	  	<div class="col-xs-6 col-md-2" style="height: 60px;">
			  	<select name="forma_administracion" id="forma_administracion"  class="form-control" size="4" style="font-family: calibri;">
						<option value="0"  > --SELECCIONE--</option>
						<?php foreach($resultFor as $resFor) {?>
							<option value="<?php echo $resFor->forma_administracion_fichas; ?>"  ><?php echo $resCom->forma_administracion_fichas; ?> </option>
							
			        	<?php } ?>
				</select>
			</div>
    	  	<div class="col-xs-6 col-md-2" style="height: 60px;">
			  		<select name="id_laboratorios" id="id_laboratorios"  class="form-control" size="4" style="font-family: calibri;">
						<option value="0"  > --SELECCIONE--</option>	
						<?php foreach($resultLab as $resLab) {?>
				    	<option value="<?php echo $resLab->id_laboratorios; ?>"  ><?php echo $resLab->nombre_laboratorios; ?> </option>
						<?php } ?>
				 </select>
			</div>
    	  
    	  	<div class="col-xs-6 col-md-2">
    	  		
    	  		<button type="submit" id="btn_filtrar" name="btn_filtrar" class="btn btn-primary"><span class="glyphicon glyphicon-filter" ><?php echo " Filtrar" ;?> </span></button>
			</div>
    	  	
    	  </div>
    	  
    	  
    	 	<hr>
    	 	
    	  </div>
    	  <div class="row" >
    	 	<div class="col-xs-3 col-md-3">
    	 	</div>
    	 	<div class="col-xs-6 col-md-6" >
    	 	
    	 	<ul class="nav nav-pills" role="tablist" >
			  <li role="presentation" id="option-productos" class="active"><a href="#">Productos <span class="badge"><?php echo $CantProductos;?></span></a></li>
			  
			  <li role="presentation" id="option-principios" ><a href="#">Principios Activos <span class="badge"><?php echo $CantPrincipios;?></span></a></li>
			  <li role="presentation" id="option-laboratorios" ><a href="#">Laboratorios <span class="badge"><?php echo $CantLaboratorios;?></span></a></li>
			  <li role="presentation" id="option-distribuidores" ><a href="#">Distribuidores <span class="badge"><?php echo $CantDistribuidores;?></span></a></li>
			</ul>
    	 	
    	 	</div>
    	 	<div class="col-xs-3 col-md-3">
    	 	</div>
    	 	</div>
    	 	
    	  <div id= "div-productos" class="row" style="margin-top:50px; text-align: center; display: none;"  >
    	  	
    	   <?php $celdas = 0;?>
    		<?php if ($resultSet !="") { ?>
    	    <?php foreach($resultSet as $res) {?>
	      		  
	        	<?php if ($celdas < 6) { ?>
				   <div class="col-xs-6 col-md-2">
			  	      <p  class="formulario-subtitulo-busqueda" style="font-family: calibri;" ><?php echo $res->nombre_fichas; ?> </p> 
			  	      <div class="img-rounded">
			  	      
			  	      	<div   class="buscador_favorito" >
			  	      	<a   id="a_imagen_favorito" href="" class="thumbnail" >
			  	      		<img  id="imagen_favorito" name="imagen_favorito" src="view/images/icono_heart.png" alt="Agregar a Favoritos" >
			  	        </a>
			  	        </div>
			  	        
			  	      	<a href="<?php echo $helper->url("FichasProductos","ReporteFicha"); ?>&id_fichas=<?php echo $res->id_fichas; ?>&nombre_fichas=<?php echo $res->nombre_fichas; ?>"  class="thumbnail"  target="_blank" >
			  	      		<img name="image" src="view/DevuelveImagen.php?id_valor=<?php echo $res->id_fichas; ?>&id_nombre=id_fichas&tabla=fichas_fotos&campo=foto_fichas_fotos"  alt="<?php echo $res->nombre_fichas; ?>" width="120" height="100" >
			  	        </a>
			  	        
			  	      </div>
			  	         
			       
			       </div>
			       <?php if($celdas == 5) {?>
			
			      	 </div> 			
			       <?php }?>
			       <?php $celdas = $celdas + 1 ;?>
			
				<?php } else {?>
				    
			    	<div class="row" style="text-align: center;"  >	    
					<div class="col-xs-6 col-md-1">
    	  			</div>
    	  
					<?php $celdas = 0;?>	
				<?php } ?>        
	        
	        <?php  } ?>
    	  	<?php  } ?>
    	  </div>		
	         
		  <div id= "div-principios" class="row" style="margin-top:50px; text-align: center; display: none;"   >
    	  	
    	   <?php $celdas = 0;?>
    		<?php if ($resultPrinBus !="") { ?>
    	    <?php foreach($resultPrinBus as $res) {?>
	      		  
	        	<?php if ($celdas < 6) { ?>
				   <div class="col-xs-6 col-md-2">
			  	      <p  class="formulario-subtitulo-busqueda" style="font-family: calibri;" ><?php echo $res->nombre_composiciones; ?> </p> 
			  	      <div class="img-rounded">
			  	      
			  	      	
			  	      	<a href="<?php echo $helper->url("FichasProductos","ReporteFicha"); ?>&id_fichas=<?php echo $res->id_composiciones; ?>&nombre_fichas=<?php echo $res->nombre_composiciones; ?>"  class="thumbnail"  target="_blank" >
			  	      		<img name="image" src="view/images/principios-activos.jpg"  alt="<?php echo $res->nombre_composiciones; ?>" width="120" height="100" >
			  	        </a>
			  	        
			  	      </div>
			  	         
			       
			       </div>
			       <?php if($celdas == 5) {?>
			
			      	 </div> 			
			       <?php }?>
			       <?php $celdas = $celdas + 1 ;?>
			
				<?php } else {?>
				    
			    	<div class="row" style="text-align: center;"  >	    
					<div class="col-xs-6 col-md-1">
    	  			</div>
    	  
					<?php $celdas = 0;?>	
				<?php } ?>        
	        
	        <?php  } ?>
    	  	<?php  } ?>
    	  </div>		
		
	
		<div id= "div-laboratorios" class="row" style="margin-top:50px; text-align: center; display: none;""  >
    	  	
    	   <?php $celdas = 0;?>
    		<?php if ($resultLabBus !="") { ?>
    	    <?php foreach($resultLabBus as $res) {?>
	      		  
	        	<?php if ($celdas < 6) { ?>
				   <div class="col-xs-6 col-md-2">
			  	      <p  class="formulario-subtitulo-busqueda" style="font-family: calibri;" ><?php echo $res->nombre_laboratorios; ?> </p> 
			  	      <div class="img-rounded">
			  	      
			  	      	<div   class="buscador_favorito" >
			  	      	<a   id="a_imagen_favorito" href="" class="thumbnail" >
			  	      		<img  id="imagen_favorito" name="imagen_favorito" src="view/images/icono_heart.png" alt="Agregar a Favoritos" >
			  	        </a>
			  	        </div>
			  	        
			  	      	<a href="<?php echo $helper->url("FichasProductos","ReporteFicha"); ?>&id_fichas=<?php echo $res->id_laboratorios; ?>&nombre_fichas=<?php echo $res->nombre_laboratorios; ?>"  class="thumbnail"  target="_blank" >
			  	      		<img name="image" src="view/DevuelveImagen.php?id_valor=<?php echo $res->id_laboratorios; ?>&id_nombre=id_laboratorios&tabla=laboratorios&campo=logo_laboratorios"  alt="<?php echo $res->nombre_laboratorios; ?>" width="200" height="100" >
			  	        </a>
			  	        
			  	      </div>
			  	         
			       
			       </div>
			       <?php if($celdas == 5) {?>
			
			      	 </div> 			
			       <?php }?>
			       <?php $celdas = $celdas + 1 ;?>
			
				<?php } else {?>
				    
			    	<div class="row" style="text-align: center;"  >	    
					<div class="col-xs-6 col-md-1">
    	  			</div>
    	  
					<?php $celdas = 0;?>	
				<?php } ?>        
	        
	        <?php  } ?>
    	  	<?php  } ?>
    	  </div>		
	
	
		<div id= "div-distribuidores" class="row" style="margin-top:50px; text-align: center; display: none;""  >
    	  	
    	   <?php $celdas = 0;?>
    		<?php if ($resultDisBus !="") { ?>
    	    <?php foreach($resultDisBus as $res) {?>
	      		  
	        	<?php if ($celdas < 6) { ?>
				   <div class="col-xs-6 col-md-2">
			  	      <p  class="formulario-subtitulo-busqueda" style="font-family: calibri;" ><?php echo $res->nombre_distribuidores; ?> </p> 
			  	      <div class="img-rounded">
			  	      
			  	      	
			  	        
			  	      	<a href="<?php echo $helper->url("FichasProductos","ReporteFicha"); ?>&id_fichas=<?php echo $res->id_distribuidores; ?>&nombre_fichas=<?php echo $res->nombre_distribuidores; ?>"  class="thumbnail"  target="_blank" >
			  	      		<img name="image" src="view/DevuelveImagen.php?id_valor=<?php echo $res->id_distribuidores; ?>&id_nombre=id_distribuidores&tabla=distribuidores&campo=logo_distribuidores"  alt="<?php echo $res->nombre_distribuidores; ?>" width="200" height="100" >
			  	        </a>
			  	        
			  	      </div>
			  	         
			       
			       </div>
			       <?php if($celdas == 5) {?>
			
			      	 </div> 			
			       <?php }?>
			       <?php $celdas = $celdas + 1 ;?>
			
				<?php } else {?>
				    
			    	<div class="row" style="text-align: center;"  >	    
					<div class="col-xs-6 col-md-1">
    	  			</div>
    	  
					<?php $celdas = 0;?>	
				<?php } ?>        
	        
	        <?php  } ?>
    	  	<?php  } ?>
    	  </div>		
		
	
	 </form>
	 	
	 	    	 
    </body>
</html>