<?php
class DistribuidoresController extends ControladorBase{
    
    public function __construct() {
        parent::__construct();
    }
    
public function index(){
	session_start();
	    $distribuidores = new DistribuidoresModel();
		$resultSet = $distribuidores->getAll("id_distribuidores");
		
		$resultEdit = "";
			
		if (isset ($_GET["id_distribuidores"])   )
			{
				$_id_distribuidores = $_GET["id_distribuidores"];
				$where    = "id_distribuidores = '$_id_distribuidores' "; 
				$resultEdit = $distribuidores->getBy($where);
				
			}
		
		$this->view("Distribuidores",array(
				"resultSet"=>$resultSet, "resultEdit" =>$resultEdit
			));
		
		
	}
	
	public function index_dos(){
		session_start();
		$distribuidores = new DistribuidoresModel();
		$resultSet = $distribuidores->getAll("id_distribuidores");
	
		
		$provincias=new ProvinciasModel();
		$resultProv = $provincias->getAll("nombre_provincia");
		
		$canton=new CantonModel();
		$resultCan = $canton->getAll("nombre_canton");
		
		$direcciones=new DireccionesModel();
		
		$resultEdit = "";
		$_nombre_distribuidores = "";
		
		$_id_distribuidores = 0  ;
		
		
		
		
		$_nuevo_distribuidores = FALSE;
		
		
		if (isset($_POST["nombre_distribuidores"]))
		{
			$_nombre_distribuidores = $_POST["nombre_distribuidores"];
		}
		
		
		//AGREGO EL NOMBRE Y DEVUELVO EL ID
		if (isset($_POST["btn_agregar_distribuidor"]) )
		{
			$_nuevo_distribuidores = TRUE;
			$_nombre_distribuidores   = strtoupper ( $_POST["nombre_distribuidores"] );
			$funcion = "ins_distribuidores";
			$parametros = " '$_nombre_distribuidores'  ";
			$distribuidores->setFuncion($funcion);
			$distribuidores->setParametros($parametros);
			$resultado=$distribuidores->Insert();
			
			
						
			
		}
		
		$res_distribuidores=$distribuidores->getBy("nombre_distribuidores = '$_nombre_distribuidores' ");
			
			
		foreach($res_distribuidores as $res) {
		
			$_id_distribuidores = $res->id_distribuidores;
		}
	
		
		if (isset($_POST["btn_agregar_direcciones"]) )
		{
		
			
			$_tipo_direcciones        =  $_POST["tipo_direcciones"]   ;
			if ($_tipo_direcciones == 1) //es distribuidor
			{
				$_id_distribuidores       =  $_POST["id_distribuidores"]   ;
				$_id_laboratorios       =  0   ;
			}
			else
			{
				$_id_laboratorios       =  $_POST["id_laboratorios"]   ;
				$_id_distribuidores       = 0   ;
			}	
			
			$_id_provincia                 =  $_POST["id_provincia"]   ;
			$_id_canton                    =  $_POST["id_canton"] ;
			$_direccion_direcciones     =  $_POST["direccion_direcciones"] ;
			$_telefono_direcciones           = $_POST["telefono_direcciones"] ;
			$_celular_direcciones       =   $_POST["celular_direcciones"] ;
			
			
			$funcion = "ins_direcciones";
			
			$parametros = " '$_id_distribuidores', '$_id_laboratorios', '$_tipo_direcciones', '$_id_provincia', '$_id_canton', '$_direccion_direcciones', '$_telefono_direcciones', '$_celular_direcciones'  ";
			
				
			
			$direcciones->setFuncion($funcion);
			
			$direcciones->setParametros($parametros);
			
			
			$resultado=$direcciones->Insert();
			
		
		}	
		
		//editando
		if (isset ($_GET["id_distribuidores_edit"])   )
		{
			$_id_distribuidores = $_GET["id_distribuidores_edit"];
			$where    = "id_distribuidores = '$_id_distribuidores' ";
			$resultEdit = $distribuidores->getBy($where);
		
			
		}
		
		if(isset($_GET["id_direcciones"]))
		{
			$id_direcciones=(int)$_GET["id_direcciones"];
			$_id_distribuidores=(int)$_GET["id_distribuidores"];
			$_nombre_distribuidores=$_GET["nombre_distribuidores"];
			$direcciones=new DireccionesModel();
		
			$direcciones->deleteBy(" id_direcciones",$id_direcciones);
		    
			
		
		}
		
		
		
		$columnasDir = " direcciones.id_direcciones, provincias.nombre_provincia, canton.nombre_canton, direcciones.direccion_direcciones, direcciones.telefono_direcciones, direcciones.celular_direcciones"; 
		$tablasDir = " public.provincias, public.canton, public.direcciones";
 		$whereDir  = " direcciones.id_provicnias = provincias.id_provincia AND direcciones.id_canton = canton.id_canton AND direcciones.id_distribuidores = '$_id_distribuidores' ";
		$idDir  = "direcciones.id_direcciones";
		$resultDir = $direcciones->getCondiciones($columnasDir, $tablasDir, $whereDir, $idDir);
		
		//guardamos el distribuidores
		if (isset($_POST["btn_guardar"]) )
		{
			$directorio = $_SERVER['DOCUMENT_ROOT'].'/uploads/';
				

			$_nombre_distribuidores             = strtoupper ( $_POST["nombre_distribuidores"]   );
			$_persona_contacto_distribuidores   = strtoupper ( $_POST["persona_contacto_distribuidores"] );
			$_telefono_persona_contacto_distribuidores   = strtoupper ( $_POST["telefono_persona_contacto_distribuidores"] );
			$_email_distribuidores              =  $_POST["email_distribuidores"] ;
			$_web_distribuidores                =  $_POST["web_distribuidores"] ;
			
			$nombre = $_FILES['logo_distribuidores']['name'];
			$tipo = $_FILES['logo_distribuidores']['type'];
			$tamano = $_FILES['logo_distribuidores']['size'];
			
			// temporal al directorio definitivo
			
			move_uploaded_file($_FILES['logo_distribuidores']['tmp_name'],$directorio.$nombre);
			
			$data = file_get_contents($directorio.$nombre);
				
			$_logo_distribuidores = pg_escape_bytea($data);
			
			$funcion = "ins_distribuidores";
			
			$parametros = " '$_nombre_distribuidores' , '$_persona_contacto_distribuidores' , '$_telefono_persona_contacto_distribuidores' , '$_email_distribuidores' , '$_web_distribuidores' ,'{$_logo_distribuidores}'  ";
			$distribuidores->setFuncion($funcion);
				
			$distribuidores->setParametros($parametros);
				
			$resultado=$distribuidores->Insert();
				
			$this->redirect("Distribuidores", "index");
			
		}
		else 
		{
			$this->view("DistribuidoresAdd",array(
					"resultSet"=>$resultSet, "resultEdit" =>$resultEdit, "resultProv"=>$resultProv, "resultCan"=>$resultCan, "resultDir"=>$resultDir, "id_distribuidores"=>$_id_distribuidores, "nombre_distribuidores"=>$_nombre_distribuidores , "nuevo_distribuidores"=>$_nuevo_distribuidores
			));
			
		}
		
		
		
		
		
	
	
	}
	
	public function Inserta(){
		session_start();
		$distribuidores = new DistribuidoresModel();
		$directorio = $_SERVER['DOCUMENT_ROOT'].'/uploads/';
		
		if (isset($_POST["nombre_distribuidores"]) )
		{
			
			
			$_nombre_distribuidores             = strtoupper ( $_POST["nombre_distribuidores"]   );
			$_persona_contacto_distribuidores   = strtoupper ( $_POST["persona_contacto_distribuidores"] );
			$_direccion_distribuidores          = strtoupper ( $_POST["direccion_distribuidores"] );
			$_telefono_distribuidores           = strtoupper ( $_POST["telefono_distribuidores"] );
			$_celular_distribuidores          =   strtoupper ( $_POST["celular_distribuidores"] );
			$_email_distribuidores              = strtoupper ( $_POST["email_distribuidores"] ); 
			$_web_distribuidores                = strtoupper ( $_POST["web_distribuidores"] );
			$_provincia_distribuidores          = strtoupper ( $_POST["provincia_distribuidores"] );
			$_ciudad_distribuidores             = strtoupper ( $_POST["ciudad_distribuidores"] );
			$_zipcode_distribuidores            = $_POST["zipcode_distribuidores"] ;
			$nombre = $_FILES['logo_distribuidores']['name'];
 		    $tipo = $_FILES['logo_distribuidores']['type'];
            $tamano = $_FILES['logo_distribuidores']['size'];
 			
            // temporal al directorio definitivo
            
            move_uploaded_file($_FILES['logo_distribuidores']['tmp_name'],$directorio.$nombre);
            
            $data = file_get_contents($directorio.$nombre);
			
            $logo_distribuidores = pg_escape_bytea($data);
            
			$funcion = "ins_distribuidores";
				
			$parametros = " '$_nombre_distribuidores' , '$_persona_contacto_distribuidores' , '$_direccion_distribuidores' , '$_telefono_distribuidores' , '$_celular_distribuidores' , '$_email_distribuidores' , '$_web_distribuidores' ,'{$logo_distribuidores}' , '$_provincia_distribuidores' , '$_ciudad_distribuidores' , '$_zipcode_distribuidores' ";
			$distribuidores->setFuncion($funcion);
			
			$distribuidores->setParametros($parametros);
			
			$resultado=$distribuidores->Insert();
			
			$this->redirect("Distribuidores", "index");
			
		}
		
			
	}
	
	public function borrarId()
	{
		session_start();
		if(isset($_GET["id_distribuidores"]))
		{
			$id_distribuidores=(int)$_GET["id_distribuidores"];
	
			$distribuidores=new DistribuidoresModel();
				
			$distribuidores->deleteBy(" id_distribuidores",$id_distribuidores);
				
				
		}
	
		
			
		
		$this->redirect("Distribuidores", "index");
	}
	
	public function borrarIdDir()
	{
	
		session_start();
		
		
		$this->redirect("Distribuidores", "index_dos");
	}
	
    
   	
}
?>
