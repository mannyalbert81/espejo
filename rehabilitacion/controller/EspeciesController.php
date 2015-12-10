<?php
class EspeciesController extends ControladorBase{
    
    public function __construct() {
        parent::__construct();
    }
    
public function index(){
	
				//Creamos el objeto usuario
	session_start();
		
		$especies = new EspeciesModel();
		$resultSet = $especies->getAll("id_especies");
		
		
					
					//Conseguimos todos los usuarios
		//$resultSet=$usuarios->getCondiciones($columnas ,$tablas ,$where, $id);
		$resultEdit = "";
			
		if (isset ($_GET["id_especies"])   )
			{
				$_id_especies = $_GET["id_especies"];
				$where    = "id_especies = '$_id_especies' "; 
				$resultEdit = $especies->getBy($where);
				
			}
			
			
		
		$this->view("Especies",array(
				"resultSet"=>$resultSet, "resultEdit" =>$resultEdit
			));
		
		
	}
	
	public function Inserta(){
			
		session_start();
		$especies = new EspeciesModel();
		$directorio = $_SERVER['DOCUMENT_ROOT'].'/uploads/';
		
		if (isset($_POST["nombre_especies"]) )
		{
			
			$_nombre_especies = strtoupper ( $_POST["nombre_especies"] );
			
			
			$nombre = $_FILES['logo_especies']['name'];
 		    $tipo = $_FILES['logo_especies']['type'];
            $tamano = $_FILES['logo_especies']['size'];
 			
            // temporal al directorio definitivo
            
            move_uploaded_file($_FILES['logo_especies']['tmp_name'],$directorio.$nombre);
            
            $data = file_get_contents($directorio.$nombre);
			
            $logo_especies = pg_escape_bytea($data);
            
			
			$funcion = "ins_especies";
				
			$parametros = " '$_nombre_especies' ,'{$logo_especies}' ";
			$especies->setFuncion($funcion);
			
			$especies->setParametros($parametros);
			
			
			$resultado=$especies->Insert();
			
			$this->redirect("Especies", "index");
			
		}
		
			
	}
	
	public function borrarId()
	{
		session_start();
		if(isset($_GET["id_especies"]))
		{
			$id_especies=(int)$_GET["id_especies"];
	
			$especies=new EspeciesModel();
				
			$especies->deleteBy(" id_especies",$id_especies);
				
				
		}
	
		$this->redirect("Especies", "index");
	}
	
    
    
   	
}
?>
