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
			        $(".error").hide();
			        var hasError = false;
			        var passwordVal = $("#clave_usuario");
			        var checkVal = $("#cclave_usuario");
			        if (passwordVal.Val() == "") {
			            $("#clave_usuario").after('<span class="error">Please enter a password.</span>');
			            hasError = true;
			            alert("Clave Vacia");
			        } 
			        if (checkVal.Val() == "") {
			            $("#cclave_usuario").after('<span class="error">Please re-enter your password.</span>');
			            hasError = true;
			            alert("Confirmacion Vacia");
			        } 
/*
				        if (passwordVal != checkVal ) {
			            $("#cclave_usuario").after('<span class="error">Passwords do not match.</span>');
			            alert("No coiciden");	
			            hasError = true;
			            
			        }
	
	*/
			             if(hasError == true)
			        {
							
					        {return false;}

			        }
			        else
			        {
			    		alert("False");
						
				     }
	    	    });
			});
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
       
       <hr>
       <div class="centrado">
       <div class="alert alert-info" role="alert">
			
			<h3>Bienvenido !!! <small>ESTAS EN EL PANEL ADMINISTRATIVO DEL SISTEMA</small></h3>
			
       </div>	
		  
		</div>
       <hr>
      	<div class="col-lg-12">
  					
   		     <?php include("view/modulos/servicios.php"); ?>	
   			 <?php include("view/modulos/beforefooter.php"); ?>
    		
   		</div>     
  
       <footer class="col-lg-12">
     	 	<?php include("view/modulos/footer.php"); ?>
    	 </footer> 
   
     </body>  
    </html>   