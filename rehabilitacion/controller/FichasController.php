<?php
class FichasController extends ControladorBase{
    
    public function __construct() {
        parent::__construct();
    }
    
public function index(){
	
        	
	
	
	
	    $fichas = new FichasModel();
	    
	    $columnas =  "fichas.id_fichas, fichas.nombre_fichas,  
					  fichas.encabezado_tabla_fichas, 
					  fichas.farmacocinetica_fichas, 
					  fichas.accion_terapeutica_fichas, 
					  fichas.clasificacion_farmacologica_fichas, 
					  fichas.forma_terapeutica_fichas, 
					  fichas.indicaciones_uso_fichas, 
					  fichas.forma_administracion_fichas, 
					  fichas.interacciones_fichas, 
					  fichas.contraindicaciones_fichas, 
					  fichas.periodo_retiro_fichas, 
					  fichas.advertencias_fichas, 
					  fichas.presentacion_fichas, 
					  fichas.registro_sanitario_fichas, 
					  distribuidores.nombre_distribuidores, 
					  laboratorios.nombre_laboratorios, 
					  fichas.creado, 
					  fichas.modificado";  
	    $tablas = " public.fichas, 
  					public.distribuidores, 
  					public.laboratorios"; 
	    $where  = " fichas.id_distribuidores = distribuidores.id_distribuidores AND
  					fichas.id_laboratorios = laboratorios.id_laboratorios"; 
	    $id     = "fichas.nombre_fichas";
		$resultSet = $fichas->getCondiciones($columnas, $tablas, $where, $id);
		
		
		$unidades_medida = new UnidadesMedidaModel();
		$resultUme = $unidades_medida->getAll("nombre_unidades_medida");
		
		
		$composiciones = new ComposicionesModel();
		$resultCom = $composiciones->getAll("nombre_composiciones");
		
		
		
		
		
		
		$_id_fichas = 0;
		
		$resultID = $fichas->getCondiciones("id_fichas", "fichas", "nombre_fichas = ''  ", "id_fichas");
		
		foreach($resultID as $res)
		{
			$_id_fichas =    $res->id_fichas;
		}
		
		
		$fichas_composiciones = new FichasComposicionesModel();
		
		if (isset($_POST["btn_agregar_composicion"]) )
		{
			$_id_fichas        = $_POST["id_fichas"];;
			$_id_composiciones = $_POST["id_composiciones"];
			$_cantidad_fichas_composiciones   = $_POST["cantidad_fichas_composiciones"];
			//$_cantidad_fichas_composiciones   = $_POST["nombre_fichas"];
		
			$funcion = "ins_fichas_composiciones";
		
			$parametros = " '$_id_fichas' , '$_id_composiciones' , '$_cantidad_fichas_composiciones'  ";
			$fichas_composiciones->setFuncion($funcion);
		
			$fichas_composiciones->setParametros($parametros);
		
		
			$resultado=$fichas_composiciones->Insert();
		
		
		}
		
		$columnas_fc =  "  fichas_composiciones.id_fichas_composiciones, 
  						composiciones.nombre_composiciones, 
  						fichas_composiciones.cantidad_fichas_composiciones
					 ";
		$tablas_fc = " public.composiciones, public.fichas_composiciones";
		$where_fc  = " fichas_composiciones.id_composiciones = composiciones.id_composiciones 
					   AND  fichas_composiciones.id_fichas = '$_id_fichas' ";
		$id_fc     = " composiciones.nombre_composiciones";
		
		$resFicCom = $fichas_composiciones->getCondiciones($columnas_fc, $tablas_fc, $where_fc, $id_fc);
		
		
		//inserto composiciones

		
	
		
		$fichas_dosificacion = new FichasDosificacionModel();
		
		if (isset($_POST["btn_agregar_dosificacion"]) )
		{
			$_id_fichas        = $_POST["id_fichas"];;
			$_id_especies = $_POST["id_especies"];
			$_dosis_fichas_dosificacion   = $_POST["dosis_fichas_dosificacion"];
		
		
			$funcion = "ins_fichas_dosificacion";
		
			$parametros = " '$_id_especies' , '$_dosis_fichas_dosificacion' , '$_id_fichas'  ";
			$fichas_dosificacion->setFuncion($funcion);
		
			$fichas_dosificacion->setParametros($parametros);
		
		
			$resultado=$fichas_dosificacion->Insert();
		
		
		
		}
		$columnas_ds =  " fichas_dosificacion.id_fichas_dosificacion,
  							especies.nombre_especies,
 							 fichas_dosificacion.dosis_fichas_dosificacion
					 	";
		$tablas_ds = " public.fichas_dosificacion, public.especies";
		$where_ds  = " fichas_dosificacion.id_especies = especies.id_especies
		AND  fichas_dosificacion.id_fichas = '$_id_fichas' ";
		$id_ds     = " especies.nombre_especies";
		
		$resFicDos = $fichas_dosificacion->getCondiciones($columnas_ds, $tablas_ds, $where_ds, $id_ds);
		
		
		$ficha_guardada = false;
		
		if (isset($_POST["btn_guardar_ficha"]) )
		{

				 	
			 $fichas_fotos = new FichasFotosModel();
			 $directorio = $_SERVER['DOCUMENT_ROOT'].'/uploads/';
			 
			 $nombre = $_FILES['foto_fichas_fotos']['name'];
			 $tipo = $_FILES['foto_fichas_fotos']['type'];
			 $tamano = $_FILES['foto_fichas_fotos']['size'];
			 
			 // temporal al directorio definitivo
			 
			 move_uploaded_file($_FILES['foto_fichas_fotos']['tmp_name'],$directorio.$nombre);
			 
			 $data = file_get_contents($directorio.$nombre);
			 
			 $foto_fichas_fotos = pg_escape_bytea($data);
			 	
			 if ($foto_fichas_fotos != "" )
			 {
				 $_id_fichas   =  $_POST["id_fichas"];
				 $_foto_fichas_fotos = $foto_fichas_fotos;
					 	
				 $funcion = "ins_fichas_fotos";
				 	
				 $parametros = " '$_id_fichas' ,'{$_foto_fichas_fotos}' ";
				 $fichas_fotos->setFuncion($funcion);
				 	
				 $fichas_fotos->setParametros($parametros);
				 	
				 	
				 $resultado=$fichas_fotos->Insert();
				 	
			 
			}
				
			 //busco la id_foto_fichas-foto
			 $_id_fichas_fotos = 0;
			 	
			 $resultID = $fichas_fotos->getCondiciones("id_fichas_fotos", "fichas_fotos", "id_fichas = '$_id_fichas'  ", "id_fichas");
			 foreach($resultID as $res)
			 {
			 $_id_fichas_fotos =    $res->id_fichas_fotos;
			 }
			 	
			 $id_fichas     = $_id_fichas;	
			 $nombre_fichas = strtoupper ( $_POST['nombre_fichas'] );
			 $encabezado_tabla_fichas = strtoupper ( $_POST['encabezado_tabla_fichas'] );
			 $farmacocinetica_fichas = strtoupper ( $_POST['farmacocinetica_fichas']);
			 $accion_terapeutica_fichas = strtoupper ( $_POST['accion_terapeutica_fichas'] );
			 $clasificacion_farmacologica_fichas = strtoupper ( $_POST['clasificacion_farmacologica_fichas'] ) ;
			 $forma_terapeutica_fichas = strtoupper ( $_POST['forma_terapeutica_fichas'] );
			 $indicaciones_uso_fichas = strtoupper ( $_POST['indicaciones_uso_fichas'] );
			 $forma_administracion_fichas = strtoupper ( $_POST['forma_administracion_fichas'] );
			 $interacciones_fichas = strtoupper ( $_POST['interacciones_fichas'] );
			 $contraindicaciones_fichas = strtoupper ( $_POST['contraindicaciones_fichas']) ;
			 $periodo_retiro_fichas = strtoupper ( $_POST['periodo_retiro_fichas']) ;
			 $advertencias_fichas = strtoupper ( $_POST['advertencias_fichas'] ) ;
			 $presentacion_fichas = strtoupper ( $_POST['presentacion_fichas'] );
			 $registro_sanitario_fichas = strtoupper ( $_POST['registro_sanitario_fichas']);
			 $id_distribuidores = $_POST['id_distribuidores'];
			 $id_laboratorios = $_POST['id_laboratorios'];
			 $id_fichas_fotos = $_id_fichas_fotos;
			 	
			 if (isset($_POST["btn_guardar_ficha"]) )
			 {
			 	
			 $funcion = "ins_fichas";
			 	
			 $parametros = " '$id_fichas', '$nombre_fichas', '$encabezado_tabla_fichas',
			 '$farmacocinetica_fichas', '$accion_terapeutica_fichas',
			 '$clasificacion_farmacologica_fichas', '$forma_terapeutica_fichas',
			 '$indicaciones_uso_fichas', '$forma_administracion_fichas',
			 '$interacciones_fichas', '$contraindicaciones_fichas',
			 '$periodo_retiro_fichas', '$advertencias_fichas',
			 '$presentacion_fichas', '$registro_sanitario_fichas',
			 '$id_distribuidores', '$id_laboratorios',
			 '$id_fichas_fotos' ";
			 $fichas->setFuncion($funcion);
			 	
			 $fichas->setParametros($parametros);
			
			 	
			 try {
			 	
			 	$resultado=$fichas->Insert();
			 	
			 	$ficha_guardada = true;
			 	
			 	
			 } catch (Exception $e) {
			 	
			 	echo $e;
			 	
			 }
			 	
			 }
			 	
		
			
			
			
		}
		
		
		
		
		///inserto dosis
		$especies = new EspeciesModel();
		$resultEsp = $especies->getAll("nombre_especies");
		
		$distribuidores = new DistribuidoresModel();
		$resultDis = $distribuidores->getAll("nombre_distribuidores");
		
		$laboratorios = new LaboratoriosModel();
		$resultLab = $laboratorios->getAll("nombre_laboratorios");
			
		$resultEdit = "";
			
		if (isset ($_GET["id_laboratorios"])   )
		{
				$_id_laboratorios = $_GET["id_laboratorios"];
				$where    = "id_laboratorios = '$_id_laboratorios' "; 
				$resultEdit = $laboratorios->getBy($where);
				
		}
		/// si es priera vez insertamos y obtenemos el id
		$_id_fichas = 0;
		
		$resultID = $fichas->getCondiciones("id_fichas", "fichas", "nombre_fichas = ''  ", "id_fichas");
		
		foreach($resultID as $res) 
		{
			 $_id_fichas =    $res->id_fichas;
		}
		
		if ($_id_fichas == 0 )
		{
			$_nombre_fichas      = "";
				
			$funcion = "ins_fichas";
			
			$parametros = " '$_nombre_fichas'   ";
			$fichas->setFuncion($funcion);
			
			$fichas->setParametros($parametros);
			
			$resultado=$fichas->Insert();
			
			
			$resultID = $fichas->getCondiciones("id_fichas", "fichas", "nombre_fichas = ''  ", "id_fichas");
			foreach($resultID as $res)
			{
				$_id_fichas =    $res->id_fichas;
			}
			
		}
		
		
		
		
		$this->view("Fichas",array(
				"resultSet"=>$resultSet, "resultEdit" =>$resultEdit, "resultCom" =>$resultCom, "resultEsp" =>$resultEsp
				, "resultDis" =>$resultDis, "resultLab" =>$resultLab,
				"resFicCom"=>$resFicCom, "resFicDos"=>$resFicDos , "id_fichas"=>$_id_fichas, "ficha_guardada"=>$ficha_guardada, "resultUme"=>$resultUme
				
		));
		
		
	}
	
	
	public function borrarId()
	{
		if(isset($_GET["id_fichas"]))
		{
			$id_fichas=(int)$_GET["id_fichas"];
	
			$fichas=new FichasModel();
			$ficha_composiciones  = new FichasComposicionesModel();
			$ficha_dosificacion = new FichasDosificacionModel();
			$ficha_fotos  = new FichasFotosModel();
			
			
			$ficha_composiciones->deleteBy(" id_fichas",$id_fichas);
			$ficha_dosificacion->deleteBy(" id_fichas",$id_fichas);
			$ficha_fotos->deleteBy(" id_fichas",$id_fichas);
			$resultado =   $fichas->deleteBy(" id_fichas",$id_fichas);
			
			$this->view("Resultado",array(
					"resultado"=>$resultado
			));
			
			
			
			//$this->redirect("Fichas", "index");
		}
	
		
	}
	
	public function ReporteFicha(){
	
		if(isset($_GET["id_fichas"]))
		{
		
		$_id_fichas = $_GET["id_fichas"];
		$_nombre_fichas = $_GET["nombre_fichas"];
		//Creamos el objeto usuario
		$fichas=new FichasModel();
		//Conseguimos todos los usuarios
	
		$fichas_fotos = new FichasFotosModel();
	
	
		$columnas = " fichas.id_fichas, 
					  fichas.nombre_fichas, 
					  fichas.encabezado_tabla_fichas, 
					  fichas.farmacocinetica_fichas, 
					  fichas.accion_terapeutica_fichas, 
					  fichas.clasificacion_farmacologica_fichas, 
					  fichas.forma_terapeutica_fichas, 
					  fichas.indicaciones_uso_fichas, 
					  fichas.forma_administracion_fichas, 
					  fichas.interacciones_fichas, 
					  fichas.contraindicaciones_fichas, 
					  fichas.periodo_retiro_fichas, 
					  fichas.advertencias_fichas, 
					  fichas.presentacion_fichas, 
					  fichas.registro_sanitario_fichas, 
					  fichas.id_distribuidores, 
					  distribuidores.nombre_distribuidores, 
					  fichas.id_laboratorios, 
					  laboratorios.nombre_laboratorios";
		$tablas   = "  public.fichas, 
  						public.distribuidores, 
  						public.laboratorios";
		$where    = " distribuidores.id_distribuidores = fichas.id_distribuidores AND laboratorios.id_laboratorios = fichas.id_laboratorios
				      AND fichas.id_fichas = '$_id_fichas' ";
		$id       = "fichas.id_fichas";
	
	
		//$columnas2 = " 'TOTALES' AS totales,  SUM(paginas_documentos_legal) AS total_paginas, COUNT(id_documentos_legal) AS total_documentos";
		//$where2 = "id_documentos_legal > 0";
	
	
	
			$resultRep = $fichas->getCondicionesPDF($columnas, $tablas, $where, $id);
	
			$resultRep2 = "";
				
	
				
				
			$this->report("FichasProductos",array(	"resultRep"=>$resultRep, "id_fichas"=>$_id_fichas, "nombre_fichas"=>$_nombre_fichas));
	
		}
	}
	
    
   	
}
?>
