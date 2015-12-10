<!DOCTYPE HTML>
<html lang="es">
      <head>
        <meta charset="utf-8"/>
        <title>Distribuidores - Vademano 2015</title>
   
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
		    	var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
		    	 
		    	var nombre_distribuidores = $("#nombre_distribuidores").val();
		    	var email_distribuidores = $("#email_distribuidores").val();
		    	var logo_distribuidores = $('#logo_distribuidores[type=file]').val()
		    	
					

		    	if (nombre_distribuidores == "")
		    	{
					
			    	$("#mensaje_nombre").text("Introduzca un Nombre");
		    		$("#mensaje_nombre").fadeIn("slow"); //Muestra mensaje de error
		            return false;
			    }
		    	else 
		    	{
					
			    	$("#mensaje_nombre").fadeOut("slow"); //Muestra mensaje de error
		            
			    }


			    
		    	if (regex.test($('#email_distribuidores').val().trim()))
		    	{
		    		$("#mensaje_email").fadeOut("slow"); //Muestra mensaje de error
		            
				}
		    	else 
		    	{
		    		$("#mensaje_email").text("Introduzca un correo Valido");
		    		$("#mensaje_email").fadeIn("slow"); //Muestra mensaje de error
		            return false;	
			    }
			    
				if (logo_distribuidores == "")
				{
					$("#mensaje_logo").text("Debe ingresar un Logo");
		    		$("#mensaje_logo").fadeIn("slow"); //Muestra mensaje de error
		            return false;
			    }
		    	else 
		    	{
		    		$("#mensaje_logo").fadeOut("slow"); //Muestra mensaje de error    
				}

	    		    				    

			}); 
			$( "#nombre_distribuidores" ).focus(function() {
					$("#mensaje_nombre").fadeOut("slow");
    			});
		
				$( "#email_distribuidores" ).focus(function() {
					$("#mensaje_email").fadeOut("slow");
    			});
				$( "#logo_distribuidores" ).focus(function() {
					$("#mensaje_logo").fadeOut("slow");
    			});
		      
				    
		}); 

	</script>

	<script >
		$(document).ready(function(){

		    // cada vez que se cambia el valor del combo
		    $("#btn_agregar_direcciones").click(function() 
			{
		    	return false;
			}); 

	</script>
	
	<script >
		$(document).ready(function(){

		    // cada vez que se cambia el valor del combo
		    $("#id_provincia").change(function() {
				
               // 
               var $canton = $("#id_canton");
               $canton.empty();	
               var id_provincia = $(this).val();
               if(id_provincia > 0)
               {
            	   var datos = {
            			   id_provincia : $(this).val()
                   };

            	  
            	   $.post("<?php echo $helper->url("Provincias","devuelveCanton"); ?>", datos, function(resultCan) {

            		 		$.each(resultCan, function(index, value) {
            		 		$canton.append("<option value= " +value.id_canton +" >" + value.nombre_canton  + "</option>");	
                       		 });

            		 		 	 		   
            		  }, 'json');


               }
               else
               {
            	  
               }
               
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
  		   $sel_id_distribuidores = "";
		   $sel_nombre_distribuidores = "";
		   $sel_persona_contacto_distribuidores = "";
		   
		   $sel_telefono_persona_contacto_distribuidores = "";
		   
		   $sel_email_distribuidores = "";
		   $sel_web_distribuidores = "";
		   
		   if ($nuevo_distribuidores)
		   {
		   	
		   }
		   else 
		   {
			   	if($_SERVER['REQUEST_METHOD']=='POST' )
			   	{
			   		//$sel_foto_fichas_fotos = $_FILES['foto_fichas_fotos'];
			   		$sel_id_distribuidores = $_POST['id_distribuidores'];
			   		$sel_nombre_distribuidores = $_POST['nombre_distribuidores'];
			   		$sel_persona_contacto_distribuidores = $_POST['persona_contacto_distribuidores'];
			   		$sel_telefono_persona_contacto_distribuidores = $_POST['telefono_persona_contacto_distribuidores'];
			   		$sel_email_distribuidores = $_POST['email_distribuidores'];
			   		$sel_web_distribuidores = $_POST['web_distribuidores'];
			   	}
			   
			   	if($_SERVER['REQUEST_METHOD']=='GET' )
			   	{
			   		//$sel_foto_fichas_fotos = $_FILES['foto_fichas_fotos'];
			   		if ($resultEdit !="" ) {
			   			
			   		}
			   		else 
			   		{
				   		$sel_id_distribuidores = $_GET['id_distribuidores'];
				   		$sel_nombre_distribuidores = $_GET['nombre_distribuidores'];
				   		$sel_persona_contacto_distribuidores = $_GET['persona_contacto_distribuidores'];
				   		$sel_telefono_persona_contacto_distribuidores = $_GET['telefono_persona_contacto_distribuidores'];
				   		$sel_email_distribuidores = $_GET['email_distribuidores'];
				   		$sel_web_distribuidores = $_GET['web_distribuidores'];
			   		}
			   		
			   	}
			
		   }
		   
		   
		   		
		   
		?>

       
       
  		 <form action="<?php echo $helper->url("Distribuidores","index_dos"); ?>" method="post" enctype="multipart/form-data"  class="col-lg-12">
          
         <?php if ($id_distribuidores > 0) { ?>
        	    <h4>Insertar Distribuidores</h4>
            	<hr/>
            	
		   		
            
          <?php if ($resultEdit !="" ) { foreach($resultEdit as $resEdit) {?>
	       
			 <div class="row">
			  <div class="col-xs-4 col-md-4">
			  	<p  class="formulario-subtitulo" >Nombre Distribuidor </p>
			  	<input type="text" name="nombre_distribuidores" id="nombre_distribuidores" value="<?php echo $resEdit->nombre_distribuidores; ?>" class="form-control" readonly />
				<input type="hidden" name="id_distribuidores" id="id_distribuidores" value="<?php echo $resEdit->id_distribuidores;     ?>" class="form-control"/>
				<input type="hidden" name="tipo_direcciones" id="tipo_direcciones" value="1" class="form-control"/>
				<div id="mensaje_nombre" class="errores"></div>
			  </div>
			  <div class="col-xs-4 col-md-4">
			  	<p  class="formulario-subtitulo" >Nombre Persona Contacto </p>
			  	<input type="text" name="persona_contacto_distribuidores" id="persona_contacto_distribuidores" value="<?php echo $resEdit->persona_contacto_distribuidores;      ?>" class="form-control"/>
					
			  </div>
			
			<div class="col-xs-4 col-md-4">
			  	<p  class="formulario-subtitulo" >Telefono Persona Contacto </p>
			  	<input type="text" name="telefono_persona_contacto_distribuidores" id="telefono_persona_contacto_distribuidores" value="<?php echo $resEdit->telefono_persona_contacto_distribuidores;     ?>" class="form-control"/>
			  </div>
			</div>
			
			
			<div class="row">
			  	
			  <div class="col-xs-2 col-md-2">
			  	<p  class="formulario-subtitulo" >Provincia Distribuidor </p>
			  		<select name="id_provincia" id="id_provincia"  class="form-control" >
					<?php foreach($resultProv as $resProv) {?>
						<option value="<?php echo $resProv->id_provincia; ?>"  ><?php echo $resProv->nombre_provincia; ?> </option>
			        <?php } ?>
				</select> 
				<div id="mensaje_provincia" class="errores"></div>
			  </div>
			  <div class="col-xs-2 col-md-2">
			  	<p  class="formulario-subtitulo" >Canton Distribuidor </p>
			  	<select name="id_canton" id="id_canton"  class="form-control" >
					<option value="0"  > -- SIN ESPECIFICAR -- </option>			
		    	</select>
				<div id="mensaje_canton" class="errores"></div>	
			  </div>
			
			<div class="col-xs-2 col-md-2">
			  	<p  class="formulario-subtitulo" >Telefono Distribuidor </p>
			  	<input type="text" name="telefono_direcciones" id="telefono_direcciones" value="" class="form-control"/>
			  <div id="mensaje_telefono_direcciones" class="errores"></div>
			  </div>
			
			<div class="col-xs-2 col-md-2">
			  	<p  class="formulario-subtitulo" >Celular Distribuidor </p>
			  	<input type="text" name="celular_direcciones" id="celular_direcciones" value="" class="form-control"/>
			  <div id="mensaje_celular_direcciones" class="errores"></div>
			  </div>
			  <div class="col-xs-3 col-md-3">
			  	<p  class="formulario-subtitulo" >Direccion Distribuidor</p>
			  	<input type="text" name="direccion_direcciones" id="direccion_direcciones" value="" class="form-control"/> 
			  <div id="mensaje_direccion_direcciones" class="errores"></div>
			  </div>
			  
			  <div class="col-xs-1 col-md-1" style="vertical-align: middle;" >
			    <p  class="formulario-subtitulo" >-</p>
			  	<input type="submit" id="btn_agregar_direcciones" name="btn_agregar_direcciones" value="Agregar" class="btn btn-success"/> 
			  </div>				
			</div>

			<?php $cantidad = 0;?>
			<?php $registro = 1;?>
			<?php $id_direcciones = 0;?>
			<?php foreach($resultDir as $res) {?>
			<?php $cantidad = $cantidad + 1 ;?>
			<?php }?>
			<?php if ($cantidad > 0) {?>
  		      <section class="col-lg-12 usuario" style="overflow-y:scroll;">
  	    	  <table class="table table-hover">
			         <tr>
			    		<th>Id</th>
			    		<th>Provincia</th>
			    		<th>Ciudad</th>
			    		<th>Direccion</th>
			    		<th>Telefono</th>
			    		<th>Celular</th>
			    		<th></th>
			    		<th></th>
			    		
			  		</tr>
		                
			            <?php foreach($resultDir as $res) {?>
			        		<tr>
			                   <td> <?php echo $registro; ?>  </td>
				               <td> <?php echo $res->nombre_provincia; ?>     </td> 
				               <td> <?php echo $res->nombre_canton; ?>     </td> 
				               <td> <?php echo $res->direccion_direcciones; ?>     </td>
				               <td> <?php echo $res->telefono_direcciones; ?>     </td>
				               <td> <?php echo $res->celular_direcciones; ?>     </td>
				               <?php $registro = $registro + 1; ?>
				               <td>
					           		<div class="right">
					                   
					                </div>
					            
					             </td>
					             <td>   
					                	<div class="right">
					                  
						                   <a name="editar_dir" id="editar_dir" href="<?php echo $helper->url("Distribuidores","index_dos"); ?>&id_direcciones=<?php echo $res->id_direcciones; ?>&nombre_distribuidores=<?php echo $nombre_distribuidores; ?>&id_distribuidores=<?php echo $id_distribuidores; ?>&persona_contacto_distribuidores=<?php echo $sel_persona_contacto_distribuidores; ?>&telefono_persona_contacto_distribuidores=<?php echo $sel_telefono_persona_contacto_distribuidores; ?>&web_distribuidores=<?php echo $sel_web_distribuidores; ?>&email_distribuidores=<?php echo $sel_email_distribuidores; ?>" class="btn btn-danger">Borrar</a>
						              																																																						   		
						                </div>
					                <hr/>
				               </td>
				               
				    		</tr>
				        <?php } ?>
		            
		          	</table>     
		      </section>
		   	   <?php }?>	
	      <div class="row">
			  <div class="col-xs-4 col-md-4">
			  	<p class="formulario-subtitulo" >Email Distribuidor </p>
			  	<input type="text" name="email_distribuidores" id="email_distribuidores" value="<?php echo $resEdit->email_distribuidores; ?>" class="form-control"/>
			  	<div id="mensaje_email" class="errores"></div>
			  </div>
			  <div class="col-xs-4 col-md-4">
			  	<p  class="formulario-subtitulo" >Web Distribuidor</p>
			 	<input type="text" name="web_distribuidores" id="web_distribuidores" value="<?php echo $resEdit->web_distribuidores;      ?>" class="form-control"/>
			  </div>
			  <div class="col-xs-4 col-md-4">
			  	<p class="formulario-subtitulo" >Logo Distribuidor  </p>
			  	<input type="file" name="logo_distribuidores" id="logo_distribuidores" value="" class="form-control"/>
			  	<div id="mensaje_logo" class="errores"></div>
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
			  	<p  class="formulario-subtitulo" >Nombre Distribuidor </p>
			  	<input type="text" name="nombre_distribuidores" id="nombre_distribuidores" value="<?php if ($sel_nombre_distribuidores !="") {echo $sel_nombre_distribuidores; } else {echo $nombre_distribuidores;}     ?>" class="form-control" readonly />
				<input type="hidden" name="id_distribuidores" id="id_distribuidores" value="<?php if ($sel_id_distribuidores !="") {echo $sel_id_distribuidores; } else {echo $id_distribuidores;}     ?>" class="form-control"/>
				<input type="hidden" name="tipo_direcciones" id="tipo_direcciones" value="1" class="form-control"/>
				<div id="mensaje_nombre" class="errores"></div>
			  </div>
			  <div class="col-xs-4 col-md-4">
			  	<p  class="formulario-subtitulo" >Nombre Persona Contacto </p>
			  	<input type="text" name="persona_contacto_distribuidores" id="persona_contacto_distribuidores" value="<?php if ($sel_persona_contacto_distribuidores !="") {echo $sel_persona_contacto_distribuidores; }      ?>" class="form-control"/>
					
			  </div>
			
			<div class="col-xs-4 col-md-4">
			  	<p  class="formulario-subtitulo" >Telefono Persona Contacto </p>
			  	<input type="text" name="telefono_persona_contacto_distribuidores" id="telefono_persona_contacto_distribuidores" value="<?php if ($sel_telefono_persona_contacto_distribuidores !="") {echo $sel_telefono_persona_contacto_distribuidores; }      ?>" class="form-control"/>
			  </div>
			</div>
			
			
			<div class="row">
			  	
			  <div class="col-xs-2 col-md-2">
			  	<p  class="formulario-subtitulo" >Provincia Distribuidor </p>
			  		<select name="id_provincia" id="id_provincia"  class="form-control" >
					<?php foreach($resultProv as $resProv) {?>
						<option value="<?php echo $resProv->id_provincia; ?>"  ><?php echo $resProv->nombre_provincia; ?> </option>
			        <?php } ?>
				</select> 
				<div id="mensaje_provincia" class="errores"></div>
			  </div>
			  <div class="col-xs-2 col-md-2">
			  	<p  class="formulario-subtitulo" >Canton Distribuidor </p>
			  	<select name="id_canton" id="id_canton"  class="form-control" >
					<option value="0"  > -- SIN ESPECIFICAR -- </option>			
		    	</select>
				<div id="mensaje_canton" class="errores"></div>	
			  </div>
			
			<div class="col-xs-2 col-md-2">
			  	<p  class="formulario-subtitulo" >Telefono Distribuidor </p>
			  	<input type="text" name="telefono_direcciones" id="telefono_direcciones" value="" class="form-control"/>
			  <div id="mensaje_telefono_direcciones" class="errores"></div>
			  </div>
			
			<div class="col-xs-2 col-md-2">
			  	<p  class="formulario-subtitulo" >Celular Distribuidor </p>
			  	<input type="text" name="celular_direcciones" id="celular_direcciones" value="" class="form-control"/>
			  <div id="mensaje_celular_direcciones" class="errores"></div>
			  </div>
			  <div class="col-xs-3 col-md-3">
			  	<p  class="formulario-subtitulo" >Direccion Distribuidor</p>
			  	<input type="text" name="direccion_direcciones" id="direccion_direcciones" value="" class="form-control"/> 
			  <div id="mensaje_direccion_direcciones" class="errores"></div>
			  </div>
			  
			  <div class="col-xs-1 col-md-1" style="vertical-align: middle;" >
			    <p  class="formulario-subtitulo" >-</p>
			  	<input type="submit" id="btn_agregar_direcciones" name="btn_agregar_direcciones" value="Agregar" class="btn btn-success"/> 
			  </div>				
			</div>


			<?php $cantidad = 0;?>
			<?php $registro = 1;?>
			<?php $id_direcciones = 0;?>
			<?php foreach($resultDir as $res) {?>
			<?php $cantidad = $cantidad + 1 ;?>
			<?php }?>
			<?php if ($cantidad > 0) {?>
  		      <section class="col-lg-12 usuario" style="overflow-y:scroll;">
  	    	  <table class="table table-hover">
			         <tr>
			    		<th>Id</th>
			    		<th>Provincia</th>
			    		<th>Ciudad</th>
			    		<th>Direccion</th>
			    		<th>Telefono</th>
			    		<th>Celular</th>
			    		<th></th>
			    		<th></th>
			    		
			  		</tr>
		                
			            <?php foreach($resultDir as $res) {?>
			        		<tr>
			                   <td> <?php echo $registro; ?>  </td>
				               <td> <?php echo $res->nombre_provincia; ?>     </td> 
				               <td> <?php echo $res->nombre_canton; ?>     </td> 
				               <td> <?php echo $res->direccion_direcciones; ?>     </td>
				               <td> <?php echo $res->telefono_direcciones; ?>     </td>
				               <td> <?php echo $res->celular_direcciones; ?>     </td>
				               <?php $registro = $registro + 1; ?>
				               <td>
					           		<div class="right">
					                   
					                </div>
					            
					             </td>
					             <td>   
					                	<div class="right">
					                  
						                   <a name="editar_dir" id="editar_dir" href="<?php echo $helper->url("Distribuidores","index_dos"); ?>&id_direcciones=<?php echo $res->id_direcciones; ?>&nombre_distribuidores=<?php echo $nombre_distribuidores; ?>&id_distribuidores=<?php echo $id_distribuidores; ?>&persona_contacto_distribuidores=<?php echo $sel_persona_contacto_distribuidores; ?>&telefono_persona_contacto_distribuidores=<?php echo $sel_telefono_persona_contacto_distribuidores; ?>&web_distribuidores=<?php echo $sel_web_distribuidores; ?>&email_distribuidores=<?php echo $sel_email_distribuidores; ?>" class="btn btn-danger">Borrar</a>
						              																																																						   		
						                </div>
					                <hr/>
				               </td>
				               
				    		</tr>
				        <?php } ?>
		            
		          	</table>     
		      </section>
		   	   <?php }?>	
	      <div class="row">
			  <div class="col-xs-4 col-md-4">
			  	<p class="formulario-subtitulo" >Email Distribuidor </p>
			  	<input type="text" name="email_distribuidores" id="email_distribuidores" value="<?php if ($sel_email_distribuidores !="") {echo $sel_email_distribuidores; }      ?>" class="form-control"/>
			  	<div id="mensaje_email" class="errores"></div>
			  </div>
			  <div class="col-xs-4 col-md-4">
			  	<p  class="formulario-subtitulo" >Web Distribuidor</p>
			 	<input type="text" name="web_distribuidores" id="web_distribuidores" value="<?php if ($sel_web_distribuidores !="") {echo $sel_web_distribuidores; }      ?>" class="form-control"/>
			  </div>
			  <div class="col-xs-4 col-md-4">
			  	<p class="formulario-subtitulo" >Logo Distribuidor  </p>
			  	<input type="file" name="logo_distribuidores" id="logo_distribuidores" value="" class="form-control"/>
			  	<div id="mensaje_logo" class="errores"></div>
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
	      
	        
	        <?php echo "hola: ".$nombre_distribuidores;?>
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