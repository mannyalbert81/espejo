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
 		
 		
 		<script> 
			$(function(){
		      
		        $("#btn_guardar").click(function(){

		        	var logo_especies = $("#logo_especies").val();
			    	var nombre_especies = $("#nombre_especies").val();
			        
			    	if (nombre_especies == "")
			    	{
						
				    	$("#mensaje_nombre").text("Introduzca un Nombre");
			    		$("#mensaje_nombre").fadeIn("slow"); //Muestra mensaje de error
			            return false;
				    }
			    	else 
			    	{
						
				    	$("#mensaje_nombre").fadeOut("slow"); //Muestra mensaje de error
			            
				    }

			    	if (logo_especies == "")
			    	{
						
				    	$("#mensaje_logo_especies").text("Selecciones un Logo");
			    		$("#mensaje_logo_especies").fadeIn("slow"); //Muestra mensaje de error
			            return false;
				    }
			    	else 
			    	{
						
				    	$("#mensaje_logo_especies").fadeOut("slow"); //Muestra mensaje de error
				    	
				    }	

				     
	    	    });

		        $( "#nombre_especies" ).focus(function() {
					$("#mensaje_nombre").fadeOut("slow");

		        });
				$( "#logo_especies" ).focus(function() {
					$("#mensaje_logo_especies").fadeOut("slow");

				});	
			});
 		</script>


 		<script> 
			$(function(){
		      
		        $("#btn_limpiar").click(function(){

		        	$("#logo_especies").val('');
			    	$("#nombre_especies").val('');
			        

				     
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
       
  		 <form action="<?php echo $helper->url("Especies","Inserta"); ?>" method="post" enctype="multipart/form-data"  class="col-lg-5">
        	    <h4>Insertar Especies</h4>
            	<hr/>
            	
		   		
            
             <?php if ($resultEdit !="" ) { foreach($resultEdit as $resEdit) {?>
	        
	        	<div class="row">
	        		<div class="col-xs-12 col-md-12"  >
	        			<p>
	        			Nombre Especie: 
	        			</p>
	        			<input type="text" name="nombre_especies" id="nombre_especies" value="<?php echo $resEdit->nombre_especies; ?>" class="form-control"/>
	        			<div id="mensaje_nombre" class="errores"></div>
	        		</div>
	        		
	        	</div>
	        		<div class="row">
	        		<div class="col-xs-12 col-md-12"  >
	        			<p>
	        				Logo  Especie:  
	        			</p>
	        				<input type="file" name="logo_especies" id="logo_especies" value="" class="form-control"/>
	        				<div id="mensaje_logo_especies" class="errores"></div>
	        		</div>
	        		
	        	</div>
	        
	            	
		        	    
		            
		            
            
		     <?php } } else {?>
		    		<div class="row">
	        		<div class="col-xs-12 col-md-12"  >
	        			<p>
	        			Nombre Especie: 
	        			</p>
	        			<input type="text" name="nombre_especies" id="nombre_especies" value="" class="form-control"/>
	        			<div id="mensaje_nombre" class="errores"></div>
	        		</div>
	        		
	        	</div>
	        		<div class="row">
	        		<div class="col-xs-12 col-md-12"  >
	        			<p>
	        				Logo  Especie:  
	        			</p>
	        				<input type="file" name="logo_especies" id="logo_especies" value="" class="form-control"/>
	        				
	        				<div id="mensaje_logo_especies" class="errores"></div>
	        		</div>
	        		
	        	</div>
	        
		    
		    
		            
		     <?php } ?>
		        
           <input type="submit" id="btn_guardar" name="btn_guardar" value="Guardar" class="btn btn-success"/>
           <input type="button" value="Limpiar" id="btn_limpiar" name="btn_limpiar"  class="btn btn-success" />
          </form>
       
       
        <div class="col-lg-7">
            <h4>Especies</h4>
            <hr/>
        </div>
       <form action="" method="get" >
        <section class="col-lg-7 usuario" style="height:400px;overflow-y:scroll;">
        <table class="table table-hover">
	         <tr>
	    		<th>Id</th>
	    		<th>Nombre Especie</th>
	    		<th>Logo Especie</th>
	    		<th></th>
	    		<th></th>
	  		</tr>
                <?php $registros = 1;?>
                 <?php foreach($resultSet as $res) {?>
	        		<tr>
	        		   
	                   <td> <?php echo $registros; ?>  </td>
		               <td> <?php echo $res->nombre_especies; ?>     </td> 
		               
		               <td> <input type="image" name="image" src="view/DevuelveImagen.php?id_valor=<?php echo $res->id_especies; ?>&id_nombre=id_especies&tabla=especies&campo=logo_especies"  alt="<?php echo $res->nombre_especies; ?>" width="80" height="60" >      </td>
		               <td>
			           		<div class="right">
			                    <a href="<?php echo $helper->url("Especies","index"); ?>&id_especies=<?php echo $res->id_especies; ?>" class="btn btn-warning">Editar</a>
			                </div>
			            
			             </td>
			             <td>   
			                	<div class="right">
			                    <a href="<?php echo $helper->url("Especies","borrarId"); ?>&id_especies=<?php echo $res->id_especies; ?>" class="btn btn-danger">Borrar</a>
			                </div>
			                <hr/>
		               </td>
		    		</tr>
		    		<?php $registros ++?>
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