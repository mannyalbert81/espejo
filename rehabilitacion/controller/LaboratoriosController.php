<?php
class LaboratoriosController extends ControladorBase{
    
    public function __construct() {
        parent::__construct();
    }
    
public function index(){
	session_start();
	
	    $laboratorios = new LaboratoriosModel();
		$resultSet = $laboratorios->getAll("id_laboratorios");
		
		$resultEdit = "";
			
		if (isset ($_GET["id_laboratorios"])   )
			{
				$_id_laboratorios = $_GET["id_laboratorios"];
				$where    = "id_laboratorios = '$_id_laboratorios' "; 
				$resultEdit = $laboratorios->getBy($where);
				
			}
		
		$this->view("Laboratorios",array(
				"resultSet"=>$resultSet, "resultEdit" =>$resultEdit
			));
		
		
	}
	
	public function index_dos(){
	
		session_start();
		$laboratorios = new LaboratoriosModel();
		$resultSet = $laboratorios->getAll("id_laboratorios");
	
		
		$provincias=new ProvinciasModel();
		$resultProv = $provincias->getAll("nombre_provincia");
		
		$canton=new CantonModel();
		$resultCan = $canton->getAll("nombre_canton");
		
		$direcciones=new DireccionesModel();
		
		$resultEdit = "";
		$_nombre_laboratorios = "";
		
		$_id_laboratorios = 0  ;
		
		
		
		
		$_nuevo_laboratorios = FALSE;
		
		
		if (isset($_POST["nombre_laboratorios"]))
		{
			$_nombre_laboratorios = $_POST["nombre_laboratorios"];
		}
		
		
		//AGREGO EL NOMBRE Y DEVUELVO EL ID
		if (isset($_POST["btn_agregar_distribuidor"]) )
		{
			$_nuevo_laboratorios = TRUE;
			$_nombre_laboratorios   = strtoupper ( $_POST["nombre_laboratorios"] );
			$funcion = "ins_laboratorios";
			$parametros = " '$_nombre_laboratorios'  ";
			$laboratorios->setFuncion($funcion);
			$laboratorios->setParametros($parametros);
			$resultado=$laboratorios->Insert();
			
			
						
			
		}
		
		$res_laboratorios=$laboratorios->getBy("nombre_laboratorios = '$_nombre_laboratorios' ");
			
			
		foreach($res_laboratorios as $res) {
		
			$_id_laboratorios = $res->id_laboratorios;
		}
	
		
		if (isset($_POST["btn_agregar_direcciones"]) )
		{
		
			
			$_tipo_direcciones        =  $_POST["tipo_direcciones"]   ;
			if ($_tipo_direcciones == 1) //es distribuidor
			{
				$_id_laboratorios       =  $_POST["id_laboratorios"]   ;
				$_id_laboratorios       =  0   ;
			}
			else
			{
				$_id_laboratorios       =  $_POST["id_laboratorios"]   ;
				$_id_laboratorios       = 0   ;
			}	
			
			$_id_provincia                 =  $_POST["id_provincia"]   ;
			$_id_canton                    =  $_POST["id_canton"] ;
			$_direccion_direcciones     =  $_POST["direccion_direcciones"] ;
			$_telefono_direcciones           = $_POST["telefono_direcciones"] ;
			$_celular_direcciones       =   $_POST["celular_direcciones"] ;
			
			
			$funcion = "ins_direcciones";
			
			$parametros = " '$_id_laboratorios', '$_id_laboratorios', '$_tipo_direcciones', '$_id_provincia', '$_id_canton', '$_direccion_direcciones', '$_telefono_direcciones', '$_celular_direcciones'  ";
			
				
			
			$direcciones->setFuncion($funcion);
			
			$direcciones->setParametros($parametros);
			
			
			$resultado=$direcciones->Insert();
			
		
		}	
		
		//editando
		if (isset ($_GET["id_laboratorios_edit"])   )
		{
			$_id_laboratorios = $_GET["id_laboratorios_edit"];
			$where    = "id_laboratorios = '$_id_laboratorios' ";
			$resultEdit = $laboratorios->getBy($where);
		
			
		}
		
		if(isset($_GET["id_direcciones"]))
		{
			$id_direcciones=(int)$_GET["id_direcciones"];
			$_id_laboratorios=(int)$_GET["id_laboratorios"];
			$_nombre_laboratorios=$_GET["nombre_laboratorios"];
			$direcciones=new DireccionesModel();
		
			$direcciones->deleteBy(" id_direcciones",$id_direcciones);
		    
			
		
		}
		
		
		
		$columnasDir = " direcciones.id_direcciones, provincias.nombre_provincia, canton.nombre_canton, direcciones.direccion_direcciones, direcciones.telefono_direcciones, direcciones.celular_direcciones"; 
		$tablasDir = " public.provincias, public.canton, public.direcciones";
 		$whereDir  = " direcciones.id_provicnias = provincias.id_provincia AND direcciones.id_canton = canton.id_canton AND direcciones.id_laboratorios = '$_id_laboratorios' ";
		$idDir  = "direcciones.id_direcciones";
		$resultDir = $direcciones->getCondiciones($columnasDir, $tablasDir, $whereDir, $idDir);
		
		//guardamos el laboratorios
		if (isset($_POST["btn_guardar"]) )
		{
			$directorio = $_SERVER['DOCUMENT_ROOT'].'/uploads/';
				

			$_nombre_laboratorios             = strtoupper ( $_POST["nombre_laboratorios"]   );
			$_persona_contacto_laboratorios   = strtoupper ( $_POST["persona_contacto_laboratorios"] );
			$_telefono_persona_contacto_laboratorios   = strtoupper ( $_POST["telefono_persona_contacto_laboratorios"] );
			$_email_laboratorios              =  $_POST["email_laboratorios"] ;
			$_web_laboratorios                =  $_POST["web_laboratorios"] ;
			
			$nombre = $_FILES['logo_laboratorios']['name'];
			$tipo = $_FILES['logo_laboratorios']['type'];
			$tamano = $_FILES['logo_laboratorios']['size'];
			
			// temporal al directorio definitivo
			
			move_uploaded_file($_FILES['logo_laboratorios']['tmp_name'],$directorio.$nombre);
			
			$data = file_get_contents($directorio.$nombre);
				
			$_logo_laboratorios = pg_escape_bytea($data);
			
			$funcion = "ins_laboratorios";
			
			$parametros = " '$_nombre_laboratorios' , '$_persona_contacto_laboratorios' , '$_telefono_persona_contacto_laboratorios' , '$_email_laboratorios' , '$_web_laboratorios' ,'{$_logo_laboratorios}'  ";
			$laboratorios->setFuncion($funcion);
				
			$laboratorios->setParametros($parametros);
				
			$resultado=$laboratorios->Insert();
				
			$this->redirect("Laboratorios", "index");
			
		}
		else 
		{
			$this->view("LaboratoriosAdd",array(
					"resultSet"=>$resultSet, "resultEdit" =>$resultEdit, "resultProv"=>$resultProv, "resultCan"=>$resultCan, "resultDir"=>$resultDir, "id_laboratorios"=>$_id_laboratorios, "nombre_laboratorios"=>$_nombre_laboratorios , "nuevo_laboratorios"=>$_nuevo_laboratorios
			));
			
		}
		
		
		
		
		
	
	
	}
	
	public function Inserta(){
			
		session_start();
		$laboratorios = new LaboratoriosModel();
		$directorio = $_SERVER['DOCUMENT_ROOT'].'/uploads/';
		
		if (isset($_POST["nombre_laboratorios"]) )
		{
			
			
			$_nombre_laboratorios             = strtoupper ( $_POST["nombre_laboratorios"]   );
			$_persona_contacto_laboratorios   = strtoupper ( $_POST["persona_contacto_laboratorios"] );
			$_direccion_laboratorios          = strtoupper ( $_POST["direccion_laboratorios"] );
			$_telefono_laboratorios           = strtoupper ( $_POST["telefono_laboratorios"] );
			$_celular_laboratorios          =   strtoupper ( $_POST["celular_laboratorios"] );
			$_email_laboratorios              = strtoupper ( $_POST["email_laboratorios"] ); 
			$_web_laboratorios                = strtoupper ( $_POST["web_laboratorios"] );
			$_provincia_laboratorios          = strtoupper ( $_POST["provincia_laboratorios"] );
			$_ciudad_laboratorios             = strtoupper ( $_POST["ciudad_laboratorios"] );
			$_zipcode_laboratorios            = $_POST["zipcode_laboratorios"] ;
			$nombre = $_FILES['logo_laboratorios']['name'];
 		    $tipo = $_FILES['logo_laboratorios']['type'];
            $tamano = $_FILES['logo_laboratorios']['size'];
 			
            // temporal al directorio definitivo
            
            move_uploaded_file($_FILES['logo_laboratorios']['tmp_name'],$directorio.$nombre);
            
            $data = file_get_contents($directorio.$nombre);
			
            $logo_laboratorios = pg_escape_bytea($data);
            
			$funcion = "ins_laboratorios";
				
			$parametros = " '$_nombre_laboratorios' , '$_persona_contacto_laboratorios' , '$_direccion_laboratorios' , '$_telefono_laboratorios' , '$_celular_laboratorios' , '$_email_laboratorios' , '$_web_laboratorios' ,'{$logo_laboratorios}' , '$_provincia_laboratorios' , '$_ciudad_laboratorios' , '$_zipcode_laboratorios' ";
			$laboratorios->setFuncion($funcion);
			
			$laboratorios->setParametros($parametros);
			
			$resultado=$laboratorios->Insert();
			
			$this->redirect("Laboratorios", "index");
			
		}
		
			
	}
	
	public function borrarId()
	{
		session_start();
		if(isset($_GET["id_laboratorios"]))
		{
			$id_laboratorios=(int)$_GET["id_laboratorios"];
	
			$laboratorios=new LaboratoriosModel();
				
			$laboratorios->deleteBy(" id_laboratorios",$id_laboratorios);
				
				
		}
	
		
			
		
		$this->redirect("Laboratorios", "index");
	}
	
	public function borrarIdDir()
	{
	
		
		
		
		$this->redirect("Laboratorios", "index_dos");
	}
	
    
   	
}
?>
