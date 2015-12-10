<!DOCTYPE HTML>
<html lang="es">
     <head>
        <meta charset="utf-8"/>
        <title>Formulario de Contacto</title>
      	        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		   
          <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	      <script src="//code.jquery.com/jquery-1.10.2.js"></script>
		  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		  <link rel="stylesheet" href="/resources/demos/style.css">
		
		<link rel="stylesheet" href="http://jqueryvalidation.org/files/demo/site-demos.css">
        <script src="http://jqueryvalidation.org/files/dist/jquery.validate.min.js"></script>
        <script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>
 
      	
      
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
			  background-repeat: repeat-x;
			}
		</style>
   	
   	
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

            	  if (id_pais = 66)
                   {
            		    $provincias.append("<option value= " +"0" +" > --SIN ESPECIFICAR--</option>");
            	           
                   }
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
   	
   	
    </head>
      <body class="img-responsive" >
   
    	 <?php include("view/modulos/head.php"); ?>
   	
   		
   
    
      <form action="<?php echo $helper->url("Mensajes","Inserta"); ?>" method="post" class="col-lg-6">
            <h4 class="formulario-titulo" >Enviar Mensaje</h4>
            <hr/>
            	
		<table class="table">     	
            	
            <tr>
	    		<th class="formulario-subtitulo">Nombres</th>
	    		<th class="formulario-subtitulo">Apellidos</th>
	    		
	  		</tr>
	  		<tr>
	   			<td>	       		
        			<input type="text" name="nombres_mensajes"  class="form-control"   />
           		</td>
           		<td>	       		
        			<input type="text" name="apellidos_mensajes"  class="form-control"   />
           		</td>
			</tr>	
			
				
            <tr>
	    		<th class="formulario-subtitulo">País</th>
	    		<th class="formulario-subtitulo">Provincia</th>
	    		
	  		</tr>
	  		<tr>
	   			<td>	       		
        	  		<select name="paises" id="paises"  class="form-control" style="	width: 200px;">
						<?php foreach($resultPais as $resPais) {?>
							<option value="<?php echo $resPais->id_pais; ?>"  ><?php echo $resPais->nombre_pais; ?> </option>
			            <?php } ?>
					</select>
			
           		</td>
           		<td>	       		
        	  		<select name="provincias" id="provincias"  class="form-control" style="	width: 200px;">
						
							<option value="0"  > -- SIN ESPECIFICAR -- </option>
			            
					</select>
		   		</td>
			</tr>	
			
	  		<tr>
	    		<th class="formulario-subtitulo">Teléfono</th>
	    		<th class="formulario-subtitulo">Celular</th>
	    		
	  		</tr>
	  		<tr>
	   			<td>	       		
        			<input type="text" name="telefono_mensajes"  class="form-control"   />
           		</td>
           		<td>	       		
        			<input type="text" name="celular_mensajes"  class="form-control"   />
           		</td>
			</tr>	
			
	  		<tr>
	    		<th class="formulario-subtitulo">Email</th>
	    	</tr>
	    	<tr>
	   			<td>	       		
        			<input type="email" name="email_mensajes"  class="form-control"   />
           		</td>
           		
			</tr>	
		</table>
    	<table class="table">	
	  		<tr>
	    		<th class="formulario-subtitulo">Mensaje</th>
	    	</tr>
            <tr>
	   			<td>	       		
        			
           			<textarea rows="4" name="mensaje_mensajes" class="form-control" ></textarea>
           		</td>
           		
			</tr>	
		</table>
		<div style="text-align: center;">
			<input type="submit" value="Enviar" class="btn btn-success"/>
		</div>	
            
       <hr>
       <hr>   
          </form>
       
       
        <div class="col-lg-6">
            <h4 class="formulario-titulo">Datos de Contacto</h4>
            <hr/>
            
    	  <div class="list-group" >
		  		<p > <strong>Dirección: </strong>  Edif. MAGAP Piso 9</a>
		  		<p > <strong>Ciudad: </strong> Quito</a>
		  		<p > <strong>País: </strong> Ecuador</a>
		  		<p > <strong>Teléfonos: </strong> (+59) 2 436 4566 - (+59) 3 987 968 467</a>
		  		<p > <strong>Skype: </strong>  vamemano</a>
		  		<p > <strong>Email: </strong> info@vademoano.com</a>
			</div>
    
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