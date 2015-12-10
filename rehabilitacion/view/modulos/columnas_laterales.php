<!DOCTYPE html>

	<div class="col-xs-3 col-md-3"  style=" margin-top: 20px; " >
	   <h4>Fichas Mas Visitadas</h4>		
		<div  style="background-color: #f5f5f5;"   >
			<?php foreach($resultVis as $res) {?>
	      		<div class="media">
				  <div class="media-left">
				    <a href="<?php echo $helper->url("FichasProductos","ReporteFicha"); ?>&id_fichas=<?php echo $res->id_fichas; ?>&nombre_fichas=<?php echo $res->nombre_fichas; ?>">
				      <img class="media-object" src="view/DevuelveImagen.php?id_valor=<?php echo $res->id_fichas; ?>&id_nombre=id_fichas&tabla=fichas_fotos&campo=foto_fichas_fotos" <?php echo $res->nombre_fichas; ?>" width="40" height="30">
				    </a>
				  </div>
				  <div class="media-body">
				    <h5 class="media-heading" style="color: #c80097; " > <strong> <?php echo $res->nombre_fichas; ?> </strong> </h5>
				    <p>Consultas:  <?php echo $res->consultas_fichas; ?> </p>
				  </div>
				</div>
	      	
			<?php }?>
			
		</div>
	</div>
	

</html>
