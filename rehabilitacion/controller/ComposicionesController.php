<?php
class ComposicionesController extends ControladorBase{
    
    public function __construct() {
        parent::__construct();
    }
    
public function index(){
	
				//Creamos el objeto usuario
	session_start();
		
		$composiciones = new ComposicionesModel();
		$resultSet = $composiciones->getAll("id_composiciones");
		
		
					
					//Conseguimos todos los usuarios
		//$resultSet=$usuarios->getCondiciones($columnas ,$tablas ,$where, $id);
		$resultEdit = "";
			
		if (isset ($_GET["id_composiciones"])   )
			{
				$_id_composiciones = $_GET["id_composiciones"];
				$where    = "id_composiciones = '$_id_composiciones' "; 
				$resultEdit = $composiciones->getBy($where);
				
			}
			
			
		
		$this->view("Composiciones",array(
				"resultSet"=>$resultSet, "resultEdit" =>$resultEdit
			));
		
		
	}
	
	public function Inserta(){
		session_start();
		$composiciones = new ComposicionesModel();
		
		if (isset($_POST["nombre_composiciones"]) )
		{
			
			$_nombre_composiciones = strtoupper ($_POST["nombre_composiciones"]);
			
            
			$funcion = "ins_composiciones";
				
			$parametros = " '$_nombre_composiciones' ";
			$composiciones->setFuncion($funcion);
			
			$composiciones->setParametros($parametros);
			
			
			$resultado=$composiciones->Insert();
			
			$this->redirect("Composiciones", "index");
			
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
	
		$this->redirect("Composiciones", "index");
	}
	
    
    
   	
}
?>
