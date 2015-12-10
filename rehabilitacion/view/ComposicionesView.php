<!DOCTYPE HTML>
<html lang="es">
      <head>
        <meta charset="utf-8"/>
        <title>Composiciones - Vademano 2015</title>
   
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
		    	if (nombre_comosiciones == "")
		    	{	$("#mensaje_nombre").text("Introduzca un Nombre");
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
       
  		 <form action="<?php echo $helper->url("Composiciones","Inserta"); ?>" method="post" enctype="multipart/form-data"  class="col-lg-6">
        	    <h4>Insertar Principio Activo</h4>
            	<hr/>
          <?php if ($resultEdit !="" ) { foreach($resultEdit as $resEdit) {?>
	         <div class="row">
				  <div class="col-xs-6 col-md-6">
				  	<p  class="formulario-subtitulo" >Nombre Composicion </p>
				  	<input type="text" name="nombre_composiciones" id="nombre_composiciones" value="<?php echo $resEdit->nombre_composiciones; ?>" class="form-control"/>
					<div id="mensaje_nombre" class="errores"></div>
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
			  	<p  class="formulario-subtitulo" >Nombre Composicion </p>
			  	<input type="text" name="nombre_composiciones" id="nombre_composiciones" value="" class="form-control"/>
				<div id="mensaje_nombre" class="errores"></div>
			  </div>
			</div>
			  <hr>
		     
		
		 <hr>
		     <div class="row">
			  <div class="col-xs-12 col-md-12" style="text-align: center;" >
			  	<input type="submit" id="btn_guardar" name="btn_guardar" value="Guardar" class="btn btn-success"/>
			  </div>
			</div>     
                  
			<?php }?>    
	       
	     
          </form>
       
       
        <div class="col-lg-6">
            <h4>Principios Activos</h4>
            <hr/>
        </div>
       <form action="" method="get" >
        <section class="col-lg-6 usuario" style="height:400px;overflow-y:scroll;">
        <table class="table table-hover">
	         <tr>
	    		<th>Id</th>
	    		<th>Nombre Composicion</th>
	    		
	    		<th></th>
	    		<th></th>
	  		</tr>
                
	            <?php foreach($resultSet as $res) {?>
	        		<tr>
	                   <td> <?php echo $res->id_composiciones; ?>  </td>
		               <td> <?php echo $res->nombre_composiciones; ?>     </td> 
		               <td>	
		               		<div class="right">
			                    <a href="<?php echo $helper->url("Composiciones","index"); ?>&id_composiciones=<?php echo $res->id_composiciones; ?>" class="btn btn-warning">Editar</a>
			                </div>
			            
			            </td>
			             <td>   
			                	<div class="right">
			                    <a href="<?php echo $helper->url("Composiciones","borrarId"); ?>&id_composiciones=<?php echo $res->id_composiciones; ?>" class="btn btn-danger">Borrar</a>
			                </div>
			                <hr/>
		                 </td>
		    		</tr>
		        <?php } ?>
  
            
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