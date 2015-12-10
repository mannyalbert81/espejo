

<div class="row" style="margin-top: 40px; background-color: #272525;  " >
  

	<div class="col-sm-2 col-md-2">
  	</div>
  	
  	<div class="col-sm-10 col-md-10">
  	  	<div class="col-sm-3 col-md-3">
	  		<div class= "before-footer-titulo"   >
				<strong> Informacion </strong> 
	    	</div>
	    	<div style="margin-top: 20px;" >	
	      		
	      		<p class="before-footer-texto">   <span class="glyphicon glyphicon-road" aria-hidden="true"></span>  Edif. MAGAP Piso 9</p>
		  		<p class="before-footer-texto">   <span class="glyphicon glyphicon-globe" aria-hidden="true"></span> Quito – Ecuador</p>
		  		<p class="before-footer-texto">   <span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span> (+59)2 436 4566 - (+59)3 987 968 467</p>
		  		<p class="before-footer-texto">   <span class="glyphicon glyphicon-comment" aria-hidden="true"></span> Skype: vamemano</p>
		  		<p class="before-footer-texto">  <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> info@vademoano.com</p>
			</div>
	    	
	  	</div>
	  	
	  	
	  	<div class="col-sm-3 col-md-3">
	  		<div class= "before-footer-titulo"   >
				<strong> Sitios de Interes </strong> 
	    	</div>
	    	<div style="margin-top: 20px;" >	
	      		
	      		<p class="before-footer-texto">   <span class="glyphicon glyphicon-globe" aria-hidden="true"></span> Sitio Uno</p>
		  		<p class="before-footer-texto">   <span class="glyphicon glyphicon-globe" aria-hidden="true"></span> Sitio Dos</p>
		  		<p class="before-footer-texto">   <span class="glyphicon glyphicon-globe" aria-hidden="true"></span> Sitio Tres</p>
		  		<p class="before-footer-texto">   <span class="glyphicon glyphicon-globe" aria-hidden="true"></span> Sitio Cuatro</p>
		  		<p class="before-footer-texto">   <span class="glyphicon glyphicon-globe" aria-hidden="true"></span> Sitio Cinco</p>
			</div>
	    	
	  	</div>
	  	
	  	<div class="col-sm-3 col-md-3">
	  		<div class= "before-footer-titulo"   >
				<strong> Zona de Usuarios </strong> 
	    	</div>
	    	<div style="margin-top: 20px;" >	
	      		<a href="<?php echo $helper->url("Usuarios","PreguntasFrecuentes"); ?>" class="before-footer-texto" > <span class="glyphicon glyphicon-pencil" ><?php echo " Preguntas Frecuentes" ;?></span> </a>
	      	 <?php $status = session_status();  ?>
		        <?php if  (isset( $_SESSION['nombres_usuario'] )){  ?> 
			 	
	      		<a href="#" class="before-footer-texto" ><span class="glyphicon glyphicon-star-empty" ><?php echo " Productos Favoritos" ;?></span> </a>
				<a href="#" class="before-footer-texto" ><span class="glyphicon glyphicon-heart" ><?php echo " Productos Recientes" ;?></span> </a>
				
				<a href="#" class="before-footer-texto" ><span class="glyphicon glyphicon-tasks" ><?php echo " Actualizar Datos de Usuario" ;?></span> </a>
				
				<?php } ?>
			</div>
	    	
	  	</div>
	  	
	</div>
	
	<div class="col-sm-2 col-md-2" >
  	</div>
  	
</div>
    