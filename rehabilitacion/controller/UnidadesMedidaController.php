<?php
class UnidadesMedidaController extends ControladorBase{
    
    public function __construct() {
        parent::__construct();
    }
    
public function index(){
	
	session_start();
				//Creamos el objeto usuario
			
			
		$unidades_medida = new UnidadesMedidaModel();
		
		$columnas = "id_unidades_medida, nombre_unidades_medida";
		$tablas = "unidades_medida"; 
		$where = "nombre_unidades_medida LIKE '%%' ";
		$id = "nombre_unidades_medida";
					//Conseguimos todos los usuarios
		$resultSet=$unidades_medida->getCondiciones($columnas ,$tablas ,$where, $id);
		$resultEdit = "";
			
		if (isset ($_GET["id_unidades_medida"])   )
			{
				$_id_unidades_medida = $_GET["id_unidades_medida"];
				$where    = " id_unidades_medida = '$_id_unidades_medida' "; 
				$resultEdit = $unidades_medida->getCondiciones($columnas ,$tablas ,$where, $id); 
			}
		$this->view("UnidadesMedida",array(
				"resultSet"=>$resultSet, "resultEdit" =>$resultEdit
			));
		
		
	}
	
	public function Inserta(){
			
		session_start();
		$unidades_medida = new UnidadesMedidaModel();
		
		if (isset($_POST["nombre_unidades_medida"]) )
		{
			
			$_nombre_unidades_medida = strtoupper ($_POST["nombre_unidades_medida"]);
			
            
			$funcion = "ins_unidades_medida";
				
			$parametros = " '$_nombre_unidades_medida' ";
			$unidades_medida->setFuncion($funcion);
			
			$unidades_medida->setParametros($parametros);
			
			
			$resultado=$unidades_medida->Insert();
			
			$this->redirect("UnidadesMedida", "index");
			
		}
		
			
	}
	
	public function borrarId()
	{
		session_start();
		if(isset($_GET["id_unidades_medida"]))
		{
			$id_unidades_medida=(int)$_GET["id_unidades_medida"];
	
			$unidades_medida=new UnidadesMedidaModel();
				
			$unidades_medida->deleteBy(" id_unidades_medida",$id_unidades_medida);
				
				
		}
	
		$this->redirect("UnidadesMedida", "index");
	}
	
    
	
}
?>
