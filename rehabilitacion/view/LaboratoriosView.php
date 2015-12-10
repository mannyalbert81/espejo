<!DOCTYPE HTML>
<html lang="es">
      <head>
        <meta charset="utf-8"/>
        <title>Laboratorios - Vademano 2015</title>
   
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
		    $("#btn_agregar_distribuidor").click(function() 
			{
		    	
		    	var nombre_laboratorios = $("#nombre_laboratorios").val();
		    
		    	if (nombre_laboratorios == "")
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
			$( "#nombre_laboratorios" ).focus(function() {
					$("#mensaje_nombre").fadeOut("slow");
    			});
		      
				    
		}); 

	</script>
	<script >
		$(document).ready(function(){

		    // cada vez que se cambia el valor del combo
		    $("#btn_buscar").click(function() 
			{
		    	
		    	var contenido_busqueda = $("#contenido_busqueda").val();
		    	var criterio_busqueda = $("#criterio_busqueda").val();
		    	if (contenido_busqueda == "")
		    	{
					
			    	$("#contenido_busqueda").text("Introduzca un Contenido a Buscar");
		    		$("#contenido_busqueda").fadeIn("slow"); //Muestra mensaje de error
		            return false;
			    }
		    	else 
		    	{
					
			    	$("#contenido_busqueda").fadeOut("slow"); //Muestra mensaje de error
		            
			    }

		    	if (criterio_busqueda == 0)
		    	{
					
			    	$("#criterio_busqueda").text("Introduzca un Criterio de Busqueda");
		    		$("#criterio_busqueda").fadeIn("slow"); //Muestra mensaje de error
		            return false;
			    }
		    	else 
		    	{
					
			    	$("#criterio_busqueda").fadeOut("slow"); //Muestra mensaje de error
		            
			    }

				
			    	    		    				    

			}); 
			$( "#contenido_busqueda" ).focus(function() {
					$("#mensaje_contenido_busqueda").fadeOut("slow");
    			});
			$( "#criterio_busqueda" ).focus(function() {
				$("#mensaje_criterio_busqueda").fadeOut("slow");
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
       
  	    <div class="col-lg-6">
             <form action="<?php echo $helper->url("Laboratorios","index_dos"); ?>" method="post"   class="col-lg-6">
            
              
			  <div class="col-xs-8 col-md-8"  >
				  <input type="text" id="nombre_laboratorios" name="nombre_laboratorios" value=""  placeholder="Nombre Laboratorio" class="form-control"/>
				  <div id="mensaje_nombre" class="errores"></div>
			 </div>	
              <div class="col-xs-2 col-md-2"  >
				  	
				  	<button type="submit" id="btn_agregar_distribuidor" name="btn_agregar_distribuidor"  class="btn btn-primary"><span class="glyphicon glyphicon-plus	" ><?php echo "" ;?> </span></button>
			 </div>
             </form>
            <hr/>
        </div>
       
        <div class="col-lg-6">
	          <div class="col-xs-4 col-md-4"  >
	          	<input type="search" class="form-control" name="contenido_busqueda" id="criterio_busqueda" placeholder="texto a buscar">
	          	<div id="mensaje_contenido_busqueda" class="errores"></div>
	          </div>
	          <div class="col-xs-4 col-md-4"  >	
	             <select name="criterios_busqueda" id="criterio_busqueda" name="criterio_busqueda" class="form-control">
					<option value="0"  > --TODOS--</option>
					<option value="1"  >Nombre Laboratorio</option>
					<option value="2"  >Nombre Persona Contacto</option>
					<option value="3"  >Provincia Laboratorio</option>
					<option value="4"  >Canton Laboratorio</option>
					
			     </select>
			  	 <div id="mensaje_criterio_busqueda" class="errores"></div>
			  </div>				   		
	          <div class="col-xs-4 col-md-4"  >	
	          	<button type="submit" id="btn_buscar" name="btn_buscar" class="btn btn-primary"><span class="glyphicon glyphicon-search	" ><?php echo "" ;?> </span></button>
	          </div>
            
            <hr/>
        </div>
       
       <form action=""  >
        <section class="col-lg-12 usuario" style="height:400px;overflow-y:scroll;">
        <table class="table table-hover">
	         <tr>
	    		<th>Id</th>
	    		<th>Nombre Laboratorio</th>
	    		<th>Persona Contacto</th>
	    		<th>Telefono Persona Contacto</th>
	    		<th>Email Laboratorio</th>
	    		<th>Web Laboratorio</th>
	    		<th>Logo</th>
	    		
	    		<th></th>
	    		<th></th>
	    		<th></th>
	  		</tr>
                <?php $registros = 1;?>
	            <?php foreach($resultSet as $res) {?>
	        		<tr>
	                   <td> <?php echo $registros; ?>  </td>
		               <td> <?php echo $res->nombre_laboratorios; ?>     </td> 
		               <td> <?php echo $res->persona_contacto_laboratorios; ?>     </td> 
		               <td> <?php echo $res->telefono_persona_contacto_laboratorios; ?>     </td>
		               <td> <?php echo $res->email_laboratorios; ?>     </td> 
		               <td> <?php echo $res->web_laboratorios; ?>     </td> 
		               
		               <td> <input type="image" name="image" src="view/DevuelveImagen.php?id_valor=<?php echo $res->id_laboratorios; ?>&id_nombre=id_laboratorios&tabla=laboratorios&campo=logo_laboratorios"  alt="<?php echo $res->nombre_laboratorios; ?>" width="80" height="60" >      </td>
		               <td>
			           		<div class="right">
			                    <a href="<?php echo $helper->url("Laboratorios","index_dos"); ?>&id_laboratorios_edit=<?php echo $res->id_laboratorios; ?>" class="btn btn-warning">Editar</a>
			                </div>
			            
			             </td>
			             <td>   
			                	<div class="right">
			                    <a href="<?php echo $helper->url("Laboratorios","borrarId"); ?>&id_laboratorios=<?php echo $res->id_laboratorios; ?>" class="btn btn-danger">Borrar</a>
			                </div>
			                <hr/>
		               </td>
		               <td>   
			                <div class="right">
			                    <a href="<?php echo $helper->url("Laboratorios",""); ?>&id_laboratorios=<?php echo $res->id_laboratorios; ?>" class="btn btn-info">Productos</a>
			                </div>
			                <hr/>
		               </td>
		    		</tr>
		    		<?php $registros ++; ?>
		        <?php } ?>
            
            <?php 
            
            //echo "<script type='text/javascript'> alert('Hola')  ;</script>";
            
            ?>
            
       	</table>     
      </section>
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