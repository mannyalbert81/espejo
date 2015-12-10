<?php
class PrincipiosActivosController extends ControladorBase{
    
    public function __construct() {
        parent::__construct();
    }
    
public function index(){
	session_start();
	    $composiciones = new ComposicionesModel();
		$resultSet = $composiciones->getAll("nombre_composiciones");
		
		$resultEdit = "";
			
		if (isset ($_GET["id_composiciones"])   )
			{
				$_id_composiciones = $_GET["id_composiciones"];
				$where    = "id_composiciones = '$_id_composiciones' "; 
				$resultEdit = $composiciones->getBy($where);
				
			}
		
		$this->view("PrincipiosActivos",array(
				"resultSet"=>$resultSet, "resultEdit" =>$resultEdit
			));
		
		
	}
	
	public function index_dos(){
		session_start();
		$composiciones = new ComposicionesModel();
		$resultSet = $composiciones->getAll("nombre_composiciones");
	
		$resultEdit = "";
		$_nombre_composiciones = "";
		
		$_id_composiciones = 0  ;
		
		$_nuevo_composiciones = FALSE;
		
		
		if (isset($_POST["nombre_composiciones"]))
		{
			$_nombre_composiciones = $_POST["nombre_composiciones"];
		}
		
		
		//AGREGO EL NOMBRE Y DEVUELVO EL ID
		if (isset($_POST["btn_agregar_composiciones"]) )
		{
			$_nuevo_composiciones = TRUE;
			$_nombre_composiciones   = strtoupper ( $_POST["nombre_composiciones"] );
			$funcion = "ins_composiciones";
			$parametros = " '$_nombre_composiciones'  ";
			$composiciones->setFuncion($funcion);
			$composiciones->setParametros($parametros);
			$resultado=$composiciones->Insert();
			
			
						
			
		}
		//btn_buscar
		
		if (isset($_POST["btn_buscar"]) )
		{
			
			$_contenido_busqieda   = strtoupper ( $_POST["contenido_busqueda"] );
		
			$where = "buscador = '$_contenido_busqieda' ";
			$resultSet = $composiciones->getBy($where);	
				
		
				
		}
		$res_composiciones=$composiciones->getBy("nombre_composiciones = '$_nombre_composiciones' ");
			
			
		foreach($res_composiciones as $res) {
		
			$_id_composiciones = $res->id_composiciones;
		}
	
		
		
		//editando
		if (isset ($_GET["id_composiciones_edit"])   )
		{
			$_id_composiciones = $_GET["id_composiciones_edit"];
			$where    = "id_composiciones = '$_id_composiciones' ";
			$resultEdit = $composiciones->getBy($where);
		
			
		}
		
		
		//guardamos el distribuidores
		if (isset($_POST["btn_guardar"]) )
		{
			
			$_nombre_composiciones    = strtoupper ( $_POST["nombre_composiciones"]   );
			
			$_categoria_farmacologica_composicion = strtoupper ( $_POST["categoria_farmacologica_composicion"]   ); 
			$_subcategoria_farmacologica_composiciones = strtoupper ( $_POST["subcategoria_farmacologica_composiciones"]   );
			$_indicaciones_uso_composiciones = strtoupper ( $_POST["indicaciones_uso_composiciones"]   );
			$_forma_administracion_composiciones = strtoupper ( $_POST["forma_administracion_composiciones"]   );
			$_efectos_secundarios_composiciones = strtoupper ( $_POST["efectos_secundarios_composiciones"]   );
			$_mecanismo_accion_composiciones = strtoupper ( $_POST["mecanismo_accion_composiciones"]   );
			$_precausiones_composiociones = strtoupper ( $_POST["precausiones_composiociones"]   );
			$_interacciones_composiciones = strtoupper ( $_POST["interacciones_composiciones"]   );
			$_contraindicaciones_composiciones = strtoupper ( $_POST["contraindicaciones_composiciones"]   );
			$_periodo_retirio_composiciones = strtoupper ( $_POST["periodo_retirio_composiciones"]   );
			
			
			$funcion = "ins_composiciones";
			
			$parametros = "'$_nombre_composiciones' , '$_categoria_farmacologica_composicion',	'$_subcategoria_farmacologica_composiciones' , 
						   '$_indicaciones_uso_composiciones' , '$_forma_administracion_composiciones' , '$_efectos_secundarios_composiciones' ,
						   '$_mecanismo_accion_composiciones' , '$_precausiones_composiociones' , '$_interacciones_composiciones' , 
						   '$_contraindicaciones_composiciones' , '$_periodo_retirio_composiciones' ";
			
			$composiciones->setFuncion($funcion);
				
			$composiciones->setParametros($parametros);
				
			$resultado=$composiciones->Insert();
				
			$this->redirect("PrincipiosActivos", "index");
			
		}
		else 
		{
			$this->view("PrincipiosActivosAdd",array(
					"resultSet"=>$resultSet, "resultEdit" =>$resultEdit, "id_composiciones"=>$_id_composiciones, "nombre_composiciones"=>$_nombre_composiciones , "nuevo_composiciones"=>$_nuevo_composiciones
			));
			
		}
	
	
	}

	public function borrarId()
	{
		session_start();
		if(isset($_GET["id_composiciones"]))
		{
			$id_composiciones=(int)$_GET["id_composiciones"];
	
			$composiciones=new ComposicionesModel();
	
			$composiciones->deleteBy(" id_composiciones",$id_composiciones);
		}
	
		$this->redirect("PrincipiosActivos", "index");
	}
	    
   	
}
?>
