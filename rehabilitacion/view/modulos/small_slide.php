<div >
<div class="row"  >
</div>
<div class="row" style="text-align: center; margin-top:20px; background-color: #4bae4f; "  >

	 <div class="col-xs-2 col-md-2">
	 </div>

 	<div class="col-xs-8 col-md-8">
 
 		<div class="col-xs-4 col-md-4">
 			 
 			 <p class="calibri-bold-dos">Fichas Mas Visitadas</p>
 			 <hr>	
 				<div id="myCarousel2" class="carousel slide" data-ride="carousel">
					  <!-- Indicators -->
				  
					
					  <!-- Wrapper for slides -->
				   <div class="carousel-inner" style="background-color: #f6f6f6;" role="listbox">
					    <?php $registro = 1;?>
					    <?php foreach($resultVis as $res) {?>
				      		<?php if ($registro == 1) {?>
				      			<div class="item active" >
							      <div class="media" >
									  <div class="media-left">
									    <a href="<?php echo $helper->url("FichasProductos","ReporteFicha"); ?>&id_fichas=<?php echo $res->id_fichas; ?>&nombre_fichas=<?php echo $res->nombre_fichas; ?>">
									      <img class="media-object" src="view/DevuelveImagen.php?id_valor=<?php echo $res->id_fichas; ?>&id_nombre=id_fichas&tabla=fichas_fotos&campo=foto_fichas_fotos" <?php echo $res->nombre_fichas; ?>" width="80" height="70">
									    </a>
									  </div>
									  <div class="media-body">
									    <h5 class="media-heading" style="color: #c80097; " > <strong> <?php echo $res->nombre_fichas; ?> </strong> </h5>
									    <p>Consultas:  <?php echo $res->consultas_fichas; ?> </p>
									  </div>
								  </div>
						        </div>
							
				      		<?php } else {?>
				    		
				    			<div class="item">
								   	<div class="media">
									  <div class="media-left">
									    <a href="<?php echo $helper->url("FichasProductos","ReporteFicha"); ?>&id_fichas=<?php echo $res->id_fichas; ?>&nombre_fichas=<?php echo $res->nombre_fichas; ?>">
									      <img class="media-object" src="view/DevuelveImagen.php?id_valor=<?php echo $res->id_fichas; ?>&id_nombre=id_fichas&tabla=fichas_fotos&campo=foto_fichas_fotos" <?php echo $res->nombre_fichas; ?>" width="80" height="70">
									    </a>
									  </div>
									  <div class="media-body">
									    <h5 class="media-heading" style="color: #c80097; " > <strong> <?php echo $res->nombre_fichas; ?> </strong> </h5>
									    <p>Consultas:  <?php echo $res->consultas_fichas; ?> </p>
									  </div>
								  </div>
								</div>
									  		
				      		<?php }?>
				      		
				      		
				      	<?php $registro ++;?>
						<?php }?>
					    
					
					  <!-- Left and right controls -->
					  <a class="left carousel-control" href="#myCarousel2" role="button" data-slide="prev">
					    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					    <span class="sr-only">Previous</span>
					  </a>
					  <a class="right carousel-control" href="#myCarousel2" role="button" data-slide="next">
					    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					    <span class="sr-only">Next</span>
					  </a>	
				   </div>
					
				</div>
			<hr>	 	
 		</div>
 		
 		<div class="col-xs-4 col-md-4">
 		<hr>
 		<hr>
 		</div>
 		<div class="col-xs-4 col-md-4">
 		<hr>
 		<hr>
 		</div>	
 	
 	</div>
 	<div class="col-xs-2 col-md-2">
 	</div>
  
 </div>
 
 </div>