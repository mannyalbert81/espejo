<!DOCTYPE HTML>
<html lang="es">
      <head>
        <meta charset="utf-8"/>
        <title>Afiliaciones - Vademano 2015</title>
   
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
		    $("#paises").change(function() {
				
               // 
                var $provincias = $("#provincias");

               // lo vaciamos
               
				///obtengo el id seleccionado
				

               var id_pais = $(this).val();


               $provincias.empty();

               
               if(id_pais > 0)
               {
            	   
            	   var datos = {
            			   id_pais : $(this).val()
                   };

                  $provincias.append("<option value= " +"0" +" > --SIN ESPECIFICAR--</option>");
            	           
                   
                  
            	   $.post("<?php echo $helper->url("Provincias","devuelveProvincias"); ?>", datos, function(resultProv) {

            		 		$.each(resultProv, function(index, value) {
            		 		$provincias.append("<option value= " +value.id_provincia +" >" + value.nombre_provincia  + "</option>");	
                       		 });

            		 		 	 		   
            		  }, 'json');


               }
               else
               {
            	  
               }
               
		    });


		   
		   
		    
		}); 

	</script>

	
 		<script >
		$(document).ready(function(){

		    // cada vez que se cambia el valor del combo
		    $("#ocupaciones").click(function() {
				
               

               var id_ocupaciones = $(this).val();

				
               
               if(id_ocupaciones > 5)
               {
            	   $("#div_extra_ocupaciones_usuario").fadeIn("slow");
               }
            	
               else
               {
            	   $("#div_extra_ocupaciones_usuario").fadeOut("slow");
               }
               
		    });

		    $("#ocupaciones").change(function() {
				
	               

	               var id_ocupaciones = $(this).val();

					
	               
	               if(id_ocupaciones > 5)
	               {
	            	   $("#div_extra_ocupaciones_usuario").fadeIn("slow");
	               }
	            	
	               else
	               {
	            	   $("#div_extra_ocupaciones_usuario").fadeOut("slow");
	               }
	               
			    });
				
		   
		   
		    
		}); 

	</script>
	
 
 		<script >
		$(document).ready(function(){

		    // cada vez que se cambia el valor del combo
		    $("#btn_guardar").click(function() 
			{
		    	var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
		    	var validaFecha = /([0-9]{4})\-([0-9]{2})\-([0-9]{2})/;
		    	 
		    	var correo_usuario = $("#correo_usuario").val();
		    	var ccorreo_usuario = $("#ccorreo_usuario").val();
		    	var clave_usuario = $("#clave_usuario").val();
		    	var cclave_usuario = $("#cclave_usuario").val();	
		    	var nombres_usuario = $("#nombres_usuario").val();
		    	var apellidos_usuario = $("#apellidos_usuario").val();
		    	var telefono_usuario = $("#telefono_usuario").val();
		    	var celular_usuario = $("#celular_usuario").val();
				
		    	
				var fecha_nacimiento_usuario = $("#fecha_nacimiento_usuario").val(); 	
					
		    	if (correo_usuario == "")
		    	{
			    	
		    		$("#mensaje_correo").text("Introduzca un correo");
		    		$("#mensaje_correo").fadeIn("slow"); //Muestra mensaje de error
		            return false;
			    }
		    	else if (regex.test($('#correo_usuario').val().trim()))
		    	{
		    		$("#mensaje_correo").fadeOut("slow"); //Muestra mensaje de error
		            
				}
		    	else 
		    	{
		    		$("#mensaje_correo").text("Introduzca un correo Valido");
		    		$("#mensaje_correo").fadeIn("slow"); //Muestra mensaje de error
		            return false;	
			    }

		    	if (ccorreo_usuario == "")
		    	{
					
			    	$("#mensaje_ccorreo").text("Introduzca un correo");
		    		$("#mensaje_ccorreo").fadeIn("slow"); //Muestra mensaje de error
		            return false;
			    }
		    	else if (regex.test($('#ccorreo_usuario').val().trim()))
		    	{
		    		$("#mensaje_ccorreo").fadeOut("slow"); //Muestra mensaje de error
		            
				}
		    	else 
		    	{
		    		$("#mensaje_ccorreo").text("Introduzca un correo Valido");
		    		$("#mensaje_ccorreo").fadeIn("slow"); //Muestra mensaje de error
		            return false;	
			    }
		    	if (correo_usuario != ccorreo_usuario)
		    	{
			    	
		    		$("#mensaje_ccorreo").text("Correos no Coinciden");
		    		$("#mensaje_ccorreo").fadeIn("slow"); //Muestra mensaje de error
		            return false;
			    }
				

				//nombre y apellidos
				
		    	if (nombres_usuario == "")
		    	{
			    	
		    		$("#mensaje_nombres").text("Introduzca un Nombre");
		    		$("#mensaje_nombres").fadeIn("slow"); //Muestra mensaje de error
		            return false;
			    }
		    	else 
		    	{
		    		$("#mensaje_nombres").fadeOut("slow"); //Muestra mensaje de error
		            
				}
		    	

		    	if (apellidos_usuario == "")
		    	{
			    	
		    		$("#mensaje_apellidos").text("Introduzca un Apellido");
		    		$("#mensaje_apellidos").fadeIn("slow"); //Muestra mensaje de error
		            return false;
			    }
		    	else 
		    	{
		    		$("#mensaje_apellidos").fadeOut("slow"); //Muestra mensaje de error
		            
				}
		    	
				
						    	
				//la clave

		    	if (clave_usuario == "")
		    	{
		    		
		    		$("#mensaje_clave").text("Introduzca una Clave");
		    		$("#mensaje_clave").fadeIn("slow"); //Muestra mensaje de error
		            return false;
			    }
		    	else 
		    	{
		    		$("#mensaje_clave").fadeOut("slow"); //Muestra mensaje de error
		            
				}
		    	

		    	if (cclave_usuario == "")
		    	{
		    		
		    		$("#mensaje_cclave").text("Introduzca una Clave");
		    		$("#mensaje_cclave").fadeIn("slow"); //Muestra mensaje de error
		            return false;
			    }
		    	else 
		    	{
		    		$("#mensaje_cclave").fadeOut("slow"); 
		            
				}
		    	
		    	if (clave_usuario != cclave_usuario)
		    	{
			    	
		    		$("#mensaje_cclave").text("Correos no Coinciden");
		    		$("#mensaje_cclave").fadeIn("slow"); //Muestra mensaje de error
		            return false;
			    }
		    	else
		    	{
		    		$("#mensaje_cclave").fadeOut("slow"); 
			        
		    	}	
				

				// la fecha

				if ((fecha_nacimiento_usuario.match(validaFecha)) && (fecha_nacimiento_usuario!='')) 
				{
			       $("#mensaje_fecha_nacimiento").fadeOut("slow");
			    } 
				else 
				{
		    		$("#mensaje_fecha_nacimiento").text("Fecha Incorrecta");
		    		$("#mensaje_fecha_nacimiento").fadeIn("slow"); //Muestra mensaje de error	
			       return false;
			    }


				//los telefonos
		    	if (telefono_usuario == "" || celular_usuario == "")
		    	{
			    	
		    		$("#mensaje_celular").text("Al menos indique un telefono de Contacto");
		    		$("#mensaje_celular").fadeIn("slow"); //Muestra mensaje de error
		            return false;
			    }
		    	else 
		    	{
		    		$("#mensaje_celular").fadeOut("slow"); //Muestra mensaje de error
		            
				}
		    			    				    

			}); 


				
				$( "#correo_usuario" ).focus(function() {
					$("#mensaje_correo").fadeOut("slow");
    			});
		
				$( "#ccorreo_usuario" ).focus(function() {
					$("#mensaje_ccorreo").fadeOut("slow");
    			});
				$( "#nombres_usuario" ).focus(function() {
					$("#mensaje_nombres").fadeOut("slow");
    			});
				$( "#apellidos_usuario" ).focus(function() {
					$("#mensaje_apellidos").fadeOut("slow");
    			});
				$( "#clave_usuario" ).focus(function() {
					$("#mensaje_clave").fadeOut("slow");
    			});
				$( "#cclave_usuario" ).focus(function() {
					$("#mensaje_cclave").fadeOut("slow");
    			});
				$( "#fecha_nacimiento_usuario" ).focus(function() {
					$("#mensaje_fecha_nacimiento").fadeOut("slow");
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
    <div style="background-color: #4bae4f; " >
    	 	<?php include("view/modulos/head.php"); ?>
    	 </div>
  
    
       
      <form id="form" action="<?php echo $helper->url("Afiliaciones","InsertaAfiliados"); ?>" method="post" class="col-lg-6">
            <h4>Afiliacion</h4>
            <hr/>
           <?php if (isset($resultado)) {?>
        	<?php if ($resultado == "true") {?>
        	
	        	<div class="alert alert-success" role="alert">
				  <div class="alert alert-success" role="alert">Tu afiliacion se realizo <strong> correctamente </strong>, Enviamos a tu emil la informacion necesaria para el acceso al sistema</div>
				</div>
			<?php }else {?>
				<div class="alert alert-success" role="alert">
				  <div class="alert alert-danger" role="alert">Ocurrio un error al realizar su afiliacion</div>
				</div>
			<?php } ?>
	        
           <?php } else { ?>
		     
            <?php if ($resultEdit !="" ) { foreach($resultEdit as $resEdit) {?>
           
           <div class="row">
			  <div class="col-xs-6 col-md-6">
			  	<p  class="formulario-subtitulo" >Email </p>
			  	<input type="email" name="correo_usuario" id="correo_usuario" value="<?php echo $resEdit->correo_usuario; ?>" class="form-control"/>
			  </div>
			  <div class="col-xs-6 col-md-6">
			  	<p  class="formulario-subtitulo" >Confirme Email </p>
			  	<input type="email" name="ccorreo_usuario" id="ccorreo_usuario" value="<?php echo $resEdit->correo_usuario; ?>" class="form-control"/>
			  </div>
			</div>
			
			<div class="row">
			  <div class="col-xs-6 col-md-4">
			  	<p  class="formulario-subtitulo" >Nombres</p>
			  	<input type="text" name="nombres_usuario" value="<?php echo $resEdit->nombres_usuario; ?>" class="form-control"/> 
			  </div>
			  <div class="col-xs-6 col-md-4">
			  	<p   class="formulario-subtitulo" >Apellidos </p>
			  	<input type="text" name="apellidos_usuario" value="<?php echo $resEdit->apellidos_usuario; ?>" class="form-control"/>
			  </div>
			   <div class="col-xs-12 col-md-4">
			  	<p  class="formulario-subtitulo" >Ocupacion</p>
			  	<select name="paises" id="paises"  class="form-control">
					<?php foreach($resultOcu as $resOcu) {?>
						<option value="<?php echo $resOcu->id_ocupaciones; ?>"  ><?php echo $resOcu->nombre_ocupaciones; ?> </option>
			        <?php } ?>
				</select> 
			  </div>
			</div>
			<div class="row">
			  <div class="col-xs-12 col-md-12" id="div_extra_ocupaciones_usuario" style="display: none;" >
			  	<p  class="formulario-subtitulo" >Especifique su Ocupacion</p>
			  	<input type="text" name="extra_ocupaciones_usuario" id="extra_ocupaciones_usuario"  value="<?php echo $resEdit->extra_ocupaciones_usuario; ?>" class="form-control"  /> 
			  </div>
			  
			</div>
			
			
			
			
           <div class="row">
			  <div class="col-xs-6 col-md-3">
			  	<p class="formulario-subtitulo" >Clave Usuario </p>
			  	<input type="password" name="clave_usuario" value="" class="form-control"/>
			 	</div>
			  <div class="col-xs-6 col-md-3">
			  	<p  class="formulario-subtitulo" >Confirme Clave </p>
			  	<input type="password" name="cclave_usuario" value="" class="form-control"/>
			  	
			  </div>
			  <div class="col-xs-6 col-md-3">
			  	<p  class="formulario-subtitulo" >Pais</p>
			  	<select name="paises" id="paises"  class="form-control" style="	width: 200px;">
					<?php foreach($resultPais as $resPais) {?>
						<option value="<?php echo $resPais->id_pais; ?>"  ><?php echo $resPais->nombre_pais; ?> </option>
			        <?php } ?>
				</select> 
			  </div>
			  <div class="col-xs-6 col-md-3">
			  	<p   class="formulario-subtitulo" >Provincia </p>
				<select name="provincias" id="provincias"  class="form-control" style="	width: 200px;">
					<option value="0"  > -- SIN ESPECIFICAR -- </option>
				</select>
		   	  </div>
			</div>
           
           <div class="row">
			  <div class="col-xs-4 col-md-4">
			  	<p class="formulario-subtitulo" >Fecha Nacimiento  </p>
			  	<input type="date" name="fecha_nacimiento_usuario" id="fecha_nacimiento_usuario" value="<?php $resEdit->fecha_nacimiento_usuario; ?>" class="form-control"/>
			  </div>
			  <div class="col-xs-4 col-md-4">
			  	<p  class="formulario-subtitulo" >Teléfono Usuario </p>
			  	<input type="text" name="telefono_usuario" value="<?php echo $resEdit->telefono_usuario; ?>" class="form-control"/>
			  </div>
			  <div class="col-xs-4 col-md-4">
			  	<p  class="formulario-subtitulo" >Celular  Usuario</p>
			  	<input type="text" name="celular_usuario" value="<?php echo $resEdit->celular_usuario; ?>" class="form-control"/> 
			  </div>
			</div>
           
            <hr>
		   <div class="row">
			  <div class="col-xs-12 col-md-12" style="text-align: center;" >
			  	<input type="submit" id="btn_guardar" name="btn_guardar" value="Guardar" class="btn btn-success"/>
			  </div>
			</div>     
           
             <?php } } else {?>
				   <div class="row">
					  <div class="col-xs-6 col-md-6">
					  	<p  class="formulario-subtitulo" >Email </p>
					  	<input type="email" name="correo_usuario" id="correo_usuario" value="" class="form-control"/>
					  	<div id="mensaje_correo" class="errores"></div>
					  </div>
					  <div class="col-xs-6 col-md-6">
					  	<p  class="formulario-subtitulo" >Confirme Email </p>
					  	<input type="email" name="ccorreo_usuario" id="ccorreo_usuario" value="" class="form-control"/>
					  	<div id="mensaje_ccorreo" class="errores"></div>
					  	
					  </div>
					</div>
			
				   <div class="row">
					  <div class="col-xs-6 col-md-4">
					  	<p  class="formulario-subtitulo" >Nombres</p>
					  	<input type="text" name="nombres_usuario" value="" class="form-control"/>
					  	<div id="mensaje_nombres" class="errores"></div> 
					  </div>
					  <div class="col-xs-6 col-md-4">
					  	<p   class="formulario-subtitulo" >Apellidos </p>
					  	<input type="text" name="apellidos_usuario" value="" class="form-control"/>
					  	<div id="mensaje_apellidos" class="errores"></div>
					  </div>
		    		  <div class="col-xs-12 col-md-4">
					  	<p  class="formulario-subtitulo" >Ocupacion</p>
					  	<select name="ocupaciones" id="ocupaciones"  class="form-control">
							<?php foreach($resultOcu as $resOcu) {?>
								<option value="<?php echo $resOcu->id_ocupaciones; ?>"  ><?php echo $resOcu->nombre_ocupaciones; ?> </option>
					        <?php } ?>
						</select> 
					  </div>
							  
				</div>
			
			<div class="row"  id="div_extra_ocupaciones_usuario" style="display: none;">
			  <div class="col-xs-12 col-md-12">
			  	<p  class="formulario-subtitulo" >Especifique su Ocupacion</p>
			  	<input type="text" name="extra_ocupaciones_usuario" id="extra_ocupaciones_usuario"  value="" class="form-control"  /> 
			  </div>
			  
			</div>
			
           <div class="row">
			  <div class="col-xs-6 col-md-3">
			  	<p class="formulario-subtitulo" >Clave Usuario </p>
			  	<input type="password" name="clave_usuario" id="clave_usuario" value="" class="form-control"/>
			  	<div id="mensaje_clave" class="errores"></div>
			  </div>
			  <div class="col-xs-6 col-md-3">
			  	<p  class="formulario-subtitulo" >Confirme Clave </p>
			  	<input type="password" name="cclave_usuario" id="cclave_usuario" value="" class="form-control"/>
			  	<div id="mensaje_cclave" class="errores"></div>
			  </div>
			  <div class="col-xs-6 col-md-3">
			  	<p  class="formulario-subtitulo" >Pais</p>
			  	<select name="paises" id="paises"  class="form-control" >
					<?php foreach($resultPais as $resPais) {?>
						<option value="<?php echo $resPais->id_pais; ?>"  ><?php echo $resPais->nombre_pais; ?> </option>
			        <?php } ?>
				</select> 
				<div id="mensaje_paises" class="errores"></div>
			  </div>
			  <div class="col-xs-6 col-md-3">
			  	<p   class="formulario-subtitulo" >Provincia </p>
				<select name="provincias" id="provincias"  class="form-control" >
					<option value="0"  > -- SIN ESPECIFICAR -- </option>
				</select>
				<div id="mensaje_provincias" class="errores"></div>
		   	  </div>
			</div>
            <div class="row">
			  <div class="col-xs-4 col-md-4">
			  	<p class="formulario-subtitulo" >Fecha Nacimiento  </p>
			  	<input type="date" name="fecha_nacimiento_usuario" id="fecha_nacimiento_usuario" value="" class="form-control"/>
			  	<div id="mensaje_fecha_nacimiento" class="errores"></div>
			  </div>
			  <div class="col-xs-4 col-md-4">
			  	<p  class="formulario-subtitulo" >Teléfono Usuario </p>
			  	<input type="text" name="telefono_usuario" value="" class="form-control"/>
			  	<div id="mensaje_telefono" class="errores"></div>
			  </div>
			  <div class="col-xs-4 col-md-4">
			  	<p  class="formulario-subtitulo" >Celular  Usuario</p>
			  	<input type="text" name="celular_usuario" value="" class="form-control"/>
			  	<div id="mensaje_celular" class="errores"></div> 
			  </div>
		 	</div>
        
		
		 <hr>
		   <div class="row">
			  <div class="col-xs-12 col-md-12" style="text-align: center;" >
			  	<input type="submit" id="btn_guardar" name="btn_guardar" value="Guardar" class="btn btn-success"/>
			  </div>
			</div>     
           
		<?php }?>    
	               	
		     <?php } ?>
		  
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