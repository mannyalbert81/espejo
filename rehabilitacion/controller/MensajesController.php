<?php

class MensajesController extends ControladorBase{

	public function __construct() {
		parent::__construct();
	}



	public function index(){
	
		session_start();
		$paises=new PaisesModel();
		$resultPais = $paises->getAll("nombre_pais");
		
		$provincias=new ProvinciasModel();
		$resultProv = $provincias->getAll("nombre_provincia");
		
		
		$this->view("Contacto",array(
				"resultSet"=>"", "resultPais"=>$resultPais, "resultProv"=>$resultProv
		));
	}
	
	public function Inserta(){
		session_start();
		//ins_mensajes(_id_tipo_documentos integer, _nombres_mensajes character varying,
		//_apellidos_mensajes character varying, _telefono_mensajes character varying, _celular_mensajes character varying, _email_mensajes character varying, _mensaje_mensajes character varying)
		//ins_mensajes(_id_tipo_documentos integer, _nombres_mensajes character varying, _apellidos_mensajes character varying, _id_pais integer, _id_provincia integer, _telefono_mensajes character varying, _celular_mensajes character varying, _email_mensajes character varying, _mensaje_mensajes character varying)
		$mensajes = new MensajesModel();
		
		if (isset ($_POST["nombres_mensajes"]) && isset ($_POST["apellidos_mensajes"]) && isset ($_POST["telefono_mensajes"])  && isset ($_POST["celular_mensajes"]) && isset ($_POST["email_mensajes"]) && isset ($_POST["mensaje_mensajes"]) )
		{
			$_id_tipo_documentos  = 1;
 			$_nombres_mensajes = $_POST["nombres_mensajes"];
			$_apellidos_mensajes = $_POST["apellidos_mensajes"];
			$_id_pais            = $_POST["paises"];
			$_id_provincia       = $_POST["provincias"];
			$_telefono_mensajes = $_POST["telefono_mensajes"];
			$_celular_mensajes = $_POST["celular_mensajes"];
			$_email_mensajes = $_POST["email_mensajes"];
			$_mensaje_mensajes = $_POST["mensaje_mensajes"];
			
			
		
			$funcion = "ins_mensajes";
				
			$parametros = " '$_id_tipo_documentos', '$_nombres_mensajes', '$_apellidos_mensajes' , '$_id_pais' , '$_id_provincia', '$_telefono_mensajes' , '$_celular_mensajes' , '$_email_mensajes' , '$_mensaje_mensajes' ";
		
			try {
		
				$mensajes->setFuncion($funcion);
				$mensajes->setParametros($parametros);
				$resultado=$mensajes->Insert();
		
				
				//envio el correo
				$para = 'manuel@masoft.net';
				$titulo = 'Correo';
				$mensaje = 'Hola, bienvenido a mi sitio web \r\n Saludos'; //Mensaje de 2 lineas
				$cabeceras = 'From: desarrollo@masoft.net' . "\r\n" . //La direccion de correo desde donde supuestamente se envió
						'Reply-To: info@masoft.net' . "\r\n" . //La direccion de correo a donde se responderá (cuando el recepto haga click en RESPONDER)
						'X-Mailer: PHP/' . phpversion();  //información sobre el sistema de envio de correos, en este caso la version de PHP
				
				mail($para, $titulo, $mensaje, $cabeceras);
		
				$this->redirect("Mensajes", "index");
					
			}
			catch (Exeption $Ex)
			{
				$this->view("Error",array(
						"resultado"=>$Ex
				));
		
		
			}
				
		
		}
		
			
	}
	
	public function borrarId()
	{

		session_start();
		
		$nombre_controladores = "Roles";
		$id_rol= $_SESSION['id_rol'];
		$resultPer = $permisos_rol->getPermisosEditar("   controladores.nombre_controladores = '$nombre_controladores' AND permisos_rol.id_rol = '$id_rol' " );
			
		if (!empty($resultPer))
		{
			if(isset($_GET["id_rol"]))
			{
				$id_rol=(int)$_GET["id_rol"];
		
				$roles=new RolesModel();
				
				$roles->deleteBy(" id_rol",$id_rol);
				
				
			}
			
			$this->redirect("Roles", "index");
			
			
		}
		else
		{
			$this->view("Error",array(
				"resultado"=>"No tiene Permisos de Borrar Roles"
			
			));
		}
				
	}
	
	
	public function Reporte(){
	
		//Creamos el objeto usuario
		$roles=new RolesModel();
		//Conseguimos todos los usuarios
		
	
	
		session_start();
	
	
		if (isset(  $_SESSION['usuario']) )
		{
			$resultRep = $roles->getByPDF("id_rol, nombre_rol", " nombre_rol != '' ");
			$this->report("Roles",array(	"resultRep"=>$resultRep));
	
		}
					
	
	}
	
	
	
}
?>