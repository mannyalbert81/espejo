<!DOCTYPE HTML>
<html lang="es">
      <head>
        <meta charset="utf-8"/>
        <title>Principios Activos - Vademano 2015</title>
   
   		  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		  			   
          <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	      <script src="//code.jquery.com/jquery-1.10.2.js"></script>
		  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		
		<link rel="stylesheet" href="http://jqueryvalidation.org/files/demo/site-demos.css">
        <script src="http://jqueryvalidation.org/files/dist/jquery.validate.min.js"></script>
        <script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>
 		
 		<script src="//cdn.jsdelivr.net/webshim/1.14.5/polyfiller.js"></script>
		
		<script>
		    webshims.setOptions('forms-ext', {types: 'date'});
			webshims.polyfill('forms forms-ext');
		</script>
 		
 		<script >
		$(document).ready(function(){

		    // cada vez que se cambia el valor del combo
		    $("#btn_guardar").click(function() 
			{
		    	var nombre_composiciones = $("#nombre_composiciones").val();


		    	if (nombre_composiciones == "")
		    	{
					
			    	$("#mensaje_nombre").text("Introduzca un Nombre");
		    		$("#mensaje_nombre").fadeIn("slow"); //Muestra mensaje de error
		            return false;
			    }
		    	else 
		    	{
					
			    	$("#mensaje_nombre").fadeOut("slow"); //Muestra mensaje de error
		            
			    }


			    
	    		    				    

			}); 
			$( "#nombre_composiciones" ).focus(function() {
					$("#mensaje_nombre").fadeOut("slow");
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
    </head>
    <body>
    
       <?php include("view/modulos/headadmin.php"); ?>
       
          <?php
  		   	$sel_id_composiciones = "";
		   	$sel_nombre_composiciones = "";
		   	
		   if ($nuevo_composiciones)
		   {
		   	
		   }
		   else 
		   {
			   	if($_SERVER['REQUEST_METHOD']=='POST' )
			   	{
			   	}
			   
			   	if($_SERVER['REQUEST_METHOD']=='GET' )
			   	{
			   		
			   	}
			
		   }
		   
		   
		   		
		   
		?>

       
       
  		 <form action="<?php echo $helper->url("PrincipiosActivos","index_dos"); ?>" method="post" enctype="multipart/form-data"  class="col-lg-12">
          
         <?php if ($id_composiciones > 0) { ?>
        	    <h4>Insertar Principios Activos</h4>
            	<hr/>
            	
		   		
            
          <?php if ($resultEdit !="" ) { foreach($resultEdit as $resEdit) {?>
	       
			 <div class="row">
				  <div class="col-xs-4 col-md-4">
				  	<p  class="formulario-subtitulo" >Nombre Principio Activo </p>
				  	<input type="text" name="nombre_composiciones" id="nombre_composiciones" value="<?php echo $resEdit->nombre_composiciones; ?>" class="form-control" readonly />
					<input type="hidden" name="id_composiciones" id="id_composiciones" value="<?php echo $resEdit->id_composiciones;     ?>" class="form-control"/>
					
					<div id="mensaje_nombre" class="errores"></div>
				  </div>
				  <div class="col-xs-4 col-md-4">
				  	<p  class="formulario-subtitulo" >Categoria Farmacologica </p>
				  	<input type="text" name="categoria_farmacologica_composicion" id="categoria_farmacologica_composicion" value="<?php echo $resEdit->categoria_farmacologica_composicion;      ?>" class="form-control"/>
						
				  </div>
				
				<div class="col-xs-4 col-md-4">
				  	<p  class="formulario-subtitulo" >Subcategoria Farmacologica </p>
				  	<input type="text" name="subcategoria_farmacologica_composiciones" id="subcategoria_farmacologica_composiciones" value="<?php echo $resEdit->subcategoria_farmacologica_composiciones;     ?>" class="form-control"/>
				  </div>
			</div>
			
			
			<div class="row">
				<div class="col-xs-6 col-md-6">
			  		<p  class="formulario-subtitulo" >Indicaciones de Uso</p>
			  		<input type="text" name="indicaciones_uso_composiciones" id="indicaciones_uso_composiciones" value="<?php echo $resEdit->indicaciones_uso_composiciones;     ?>" class="form-control"/>
			  	</div>
				<div class="col-xs-6 col-md-6">
			  		<p  class="formulario-subtitulo" >Forma de Administracion</p>
			  		<input type="text" name="forma_administracion_composiciones" id="forma_administracion_composiciones" value="<?php echo $resEdit->forma_administracion_composiciones;     ?>" class="form-control"/>
			  	</div>
			</div>

			<div class="row">
				<div class="col-xs-6 col-md-6">
			  		<p  class="formulario-subtitulo" >Efectos Secundarios</p>
			  		<input type="text" name="efectos_secundarios_composiciones" id="efectos_secundarios_composiciones" value="<?php echo $resEdit->efectos_secundarios_composiciones;     ?>" class="form-control"/>
			  	</div>
				<div class="col-xs-6 col-md-6">
			  		<p  class="formulario-subtitulo" >Mecanismo de Accion</p>
			  		<input type="text" name="mecanismo_accion_composiciones" id="mecanismo_accion_composiciones" value="<?php echo $resEdit->mecanismo_accion_composiciones;     ?>" class="form-control"/>
			  	</div>
			</div>
			<div class="row">
				<div class="col-xs-6 col-md-6">
			  		<p  class="formulario-subtitulo" >Precauciones</p>
			  		<input type="text" name="precausiones_composiociones" id="precausiones_composiociones" value="<?php echo $resEdit->precausiones_composiociones;     ?>" class="form-control"/>
			  	</div>
				<div class="col-xs-6 col-md-6">
			  		<p  class="formulario-subtitulo" >Interacciones</p>
			  		<input type="text" name="interacciones_composiciones" id="interacciones_composiciones" value="<?php echo $resEdit->interacciones_composiciones;     ?>" class="form-control"/>
			  	</div>
			</div>
			
			<div class="row">
				<div class="col-xs-6 col-md-6">
			  		<p  class="formulario-subtitulo" >Contraindicaciones</p>
			  		<input type="text" name="contraindicaciones_composiciones" id="contraindicaciones_composiciones" value="<?php echo $resEdit->contraindicaciones_composiciones;     ?>" class="form-control"/>
			  	</div>
				<div class="col-xs-6 col-md-6">
			  		<p  class="formulario-subtitulo" >Periodo de Retiro</p>
			  		<input type="text" name="periodo_retirio_composiciones" id="periodo_retirio_composiciones" value="<?php echo $resEdit->periodo_retirio_composiciones;     ?>" class="form-control"/>
			  	</div>
			</div>
			
		


            <hr>
		   <div class="row">
			  <div class="col-xs-12 col-md-12" style="text-align: center;" >
			  	<input type="submit" id="btn_guardar" name="btn_guardar" value="Guardar" class="btn btn-success"/>
			  </div>
			</div>     
               
		
		 <hr>
				       
	       
	       
	       
	         	   
       	     <?php } } else {?>

			 <div class="row">
				  <div class="col-xs-4 col-md-4">
				  	<p  class="formulario-subtitulo" >Nombre Principio Activo </p>
				  	<input type="text" name="nombre_composiciones" id="nombre_composiciones" value="<?php echo $nombre_composiciones; ?>" class="form-control" readonly />
					<input type="hidden" name="id_composiciones" id="id_composiciones" value="" class="form-control"/>
					
					<div id="mensaje_nombre" class="errores"></div>
				  </div>
				  <div class="col-xs-4 col-md-4">
				  	<p  class="formulario-subtitulo" >Categoria Farmacologica </p>
				  	<input type="text" name="categoria_farmacologica_composicion" id="categoria_farmacologica_composicion" value="" class="form-control"/>
						
				  </div>
				
				<div class="col-xs-4 col-md-4">
				  	<p  class="formulario-subtitulo" >Subcategoria Farmacologica </p>
				  	<input type="text" name="subcategoria_farmacologica_composiciones" id="subcategoria_farmacologica_composiciones" value="" class="form-control"/>
				  </div>
			</div>
			
			
			<div class="row">
				<div class="col-xs-6 col-md-6">
			  		<p  class="formulario-subtitulo" >Indicaciones de Uso</p>
			  		<input type="text" name="indicaciones_uso_composiciones" id="indicaciones_uso_composiciones" value="" class="form-control"/>
			  	</div>
				<div class="col-xs-6 col-md-6">
			  		<p  class="formulario-subtitulo" >Forma de Administracion</p>
			  		<input type="text" name="forma_administracion_composiciones" id="forma_administracion_composiciones" value="" class="form-control"/>
			  	</div>
			</div>

			<div class="row">
				<div class="col-xs-6 col-md-6">
			  		<p  class="formulario-subtitulo" >Efectos Secundarios</p>
			  		<input type="text" name="efectos_secundarios_composiciones" id="efectos_secundarios_composiciones" value="" class="form-control"/>
			  	</div>
				<div class="col-xs-6 col-md-6">
			  		<p  class="formulario-subtitulo" >Mecanismo de Accion</p>
			  		<input type="text" name="mecanismo_accion_composiciones" id="mecanismo_accion_composiciones" value="" class="form-control"/>
			  	</div>
			</div>
			<div class="row">
				<div class="col-xs-6 col-md-6">
			  		<p  class="formulario-subtitulo" >Precauciones</p>
			  		<input type="text" name="precausiones_composiociones" id="precausiones_composiociones" value="" class="form-control"/>
			  	</div>
				<div class="col-xs-6 col-md-6">
			  		<p  class="formulario-subtitulo" >Interacciones</p>
			  		<input type="text" name="interacciones_composiciones" id="interacciones_composiciones" value="" class="form-control"/>
			  	</div>
			</div>
			
			<div class="row">
				<div class="col-xs-6 col-md-6">
			  		<p  class="formulario-subtitulo" >Contraindicaciones</p>
			  		<input type="text" name="contraindicaciones_composiciones" id="contraindicaciones_composiciones" value="" class="form-control"/>
			  	</div>
				<div class="col-xs-6 col-md-6">
			  		<p  class="formulario-subtitulo" >Periodo de Retiro</p>
			  		<input type="text" name="periodo_retirio_composiciones" id="periodo_retirio_composiciones" value="" class="form-control"/>
			  	</div>
			</div>
			
		


            <hr>
		   <div class="row">
			  <div class="col-xs-12 col-md-12" style="text-align: center;" >
			  	<input type="submit" id="btn_guardar" name="btn_guardar" value="Guardar" class="btn btn-success"/>
			  </div>
			</div>     
               
		
		 <hr>
				       
	       
	       
	       
		       
			<?php }?>    
	     
	      
	     
	     
	     
	      <?php } else { ?>
	      
	        
	        <?php echo "hola: ".$nombre_composiciones;?>
	        <?php  }?>  
          </form>
       
             	<div class="col-lg-12">
  					
   		     <?php include("view/modulos/servicios.php"); ?>	
   			 <?php include("view/modulos/beforefooter.php"); ?>
    		
   		</div>     
  
       <footer class="col-lg-12">
     	 	<?php include("view/modulos/footer.php"); ?>
    	 </footer> 
   
     </body>  
    </html>   