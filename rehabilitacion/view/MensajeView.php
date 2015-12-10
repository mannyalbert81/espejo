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
    
       <?php include("view/modulos/head.php"); ?>
       
  
    
       
      <form id="form" action="<?php echo $helper->url("Afiliaciones","InsertaAfiliados"); ?>" method="post" class="col-lg-6">
            <h4>Afiliacion</h4>
            <hr/>
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
			  <div class="col-xs-6 col-md-6">
			  	<p  class="formulario-subtitulo" >Nombres</p>
			  	<input type="text" name="nombres_usuario" value="<?php echo $resEdit->nombres_usuario; ?>" class="form-control"/> 
			  </div>
			  <div class="col-xs-6 col-md-6">
			  	<p   class="formulario-subtitulo" >Apellidos </p>
			  	<input type="text" name="apellidos_usuario" value="<?php echo $resEdit->apellidos_usuario; ?>" class="form-control"/>
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
					  <div class="col-xs-6 col-md-6">
					  	<p  class="formulario-subtitulo" >Nombres</p>
					  	<input type="text" name="nombres_usuario" value="" class="form-control"/>
					  	<div id="mensaje_nombres" class="errores"></div> 
					  </div>
					  <div class="col-xs-6 col-md-6">
					  	<p   class="formulario-subtitulo" >Apellidos </p>
					  	<input type="text" name="apellidos_usuario" value="" class="form-control"/>
					  	<div id="mensaje_apellidos" class="errores"></div>
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
						<option value=""  ><?php echo $resPais->nombre_pais; ?> </option>
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
        
		
		
		    
	               	
		     <?php } ?>
		   <hr>
		   <div class="row">
			  <div class="col-xs-12 col-md-12" style="text-align: center;" >
			  	<input type="submit" id="btn_guardar" name="btn_guardar" value="Guardar" class="btn btn-success"/>
			  	<input type="submit" id="btn_guardar2" name="btn_guardar2" value="Guardar2" class="btn btn-success"/>
			  </div>
			</div>     
           
          <hr>	
          </form>
       
      <form id="form" action="<?php echo $helper->url("Afiliaciones","InsertaAfiliados"); ?>" method="post" class="col-lg-6">
            <h4>Publicidad Aqui</h4>
            <hr/>
        
          </form>
         
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