<?php
class UsuariosController extends ControladorBase{
    
    public function __construct() {
        parent::__construct();
    }
    
public function index(){
		
	session_start();
			//Creamos el objeto usuario
			
			$usuarios = new UsuariosModel();

			$columnas = "usuarios.id_usuario, usuarios.nombres_usuario, usuarios.apellidos_usuario, paises.nombre_pais, 
  						   provincias.nombre_provincia, usuarios.fecha_nacimiento_usuario, usuarios.usuario_usuario, 
  						   usuarios.telefono_usuario, usuarios.celular_usuario, usuarios.correo_usuario,  
  						   rol.nombre_rol, estado.nombre_estado, ocupaciones.nombre_ocupaciones, usuarios.extra_ocupacion_usuario , usuarios.creado, usuarios.modificado ";
			$tablas   = "public.usuarios, public.estado, public.paises, public.provincias, public.rol, public.ocupaciones";
			$where    = "estado.id_estado = usuarios.id_estado AND paises.id_pais = usuarios.id_pais AND
  						 provincias.id_provincia = usuarios.id_provincia AND rol.id_rol = usuarios.id_rol AND ocupaciones.id_ocupaciones = usuarios.id_ocupaciones ";
			$id       = "usuarios.nombres_usuario"; 
			
			$resultSet=$usuarios->getCondiciones($columnas ,$tablas ,$where, $id);
							
			
			$resultEdit = "";
			
			if (isset ($_GET["id_usuario"])   )
				{
					$_id_usuario = $_GET["id_usuario"];
					$where    = "rol.id_rol = usuarios.id_rol AND estado.id_estado = usuarios.id_estado AND usuarios.id_usuario = '$_id_usuario' "; 
					$resultEdit = $usuarios->getCondiciones($columnas ,$tablas ,$where, $id); 
				}
			
					
			$this->view("Usuarios",array(
					"resultSet"=>$resultSet
			));
		
		
		
	}
	
	
	public function index_dos(){
	
		session_start();
		$_id_usuario = 0  ;
		$resultEdit = "";
		$_usuario_usuario = "";
		$_nuevo_usuario = FALSE;
		
		$usuario = new UsuariosModel();
		$resultSet = $usuario->getAll("id_usuario");
	
		$provincias=new ProvinciasModel();
		$resultProv = $provincias->getAll("nombre_provincia");
			
		$paises=new PaisesModel();
		$resultPais = $paises->getAll("nombre_pais");
		
		$roles = new RolesModel();
		$resultRol = $roles->getAll("nombre_rol");
		
		$estados = new EstadosModel();
		$resultEst =  $estados->getAll("nombre_estado");
		
			
		if (isset ($_GET["id_usuario"])   )
		{
			$_id_usuario = $_GET["id_usuario"];
			$where    	= "rol.id_rol = usuarios.id_rol AND estado.id_estado = usuarios.id_estado AND usuarios.id_usuario = '$_id_usuario' ";
			$resultEdit = $usuario->getCondiciones($columnas ,$tablas ,$where, $id);
		}
		
		
		if (isset($_POST["usuario_usuario"]))
		{
			$_usuario_usuario = $_POST["usuario_usuario"];
		}
	
	
		//AGREGO EL NOMBRE Y DEVUELVO EL ID
		if (isset($_POST["btn_agregar_usuario"]) )
		{
			$_nuevo_usuario = TRUE;
			$_usuario_usuario   =  $_POST["usuario_usuario"];
			$funcion = "ins_usuarios";
			$parametros = " '$_usuario_usuario'  ";
			$usuario->setFuncion($funcion);
			$usuario->setParametros($parametros);
			try {
			
				$resultado=$usuario->Insert();
				
			} catch (Exception $e) {
		
				$this->view("Resultado",array(
						"resultado"=>"No se puedo insertar el Usuario"
						
				));
				
				exit();
				
			}
			
		}
	
		$res_usuario=$usuario->getBy("usuario_usuario = '$_usuario_usuario' ");
			
			
		foreach($res_usuario as $res) {
	
			$_id_usuario = $res->id_usuario;
		}
	
	
		//editando
		if (isset ($_GET["id_usuario_edit"])   )
		{
			$_id_usuario = $_GET["id_usuario_edit"];
			$where    = "id_usuario = '$_id_usuario' ";
			$resultEdit = $usuario->getBy($where);
		}
	
		//guardamos el distribuidores
		if (isset($_POST["btn_guardar"]) )
		{
			$_nombres_usuario 	= strtoupper ( $_POST["nombres_usuario"] );
			$_apellidos_usuario  = strtoupper ( $_POST["apellidos_usuario"] );
			$_usuario_usuario   = $_POST["correo_usuario"];
			$_clave_usuario     =  $_POST["clave_usuario"];
			$_id_pais           = $_POST["paises"];
			$_id_provincia      = $_POST["provincias"];
			$_telefono_usuario  = $_POST["telefono_usuario"];
			$_celular_usuario   = $_POST["celular_usuario"];
			$_correo_usuario    = $_POST["correo_usuario"];
			$_id_rol            = 3;   // afiliados
			$_id_estado         = 2; //sin activar
			$_clave_activacion_usuario = $usuario->encrypt($_POST["correo_usuario"]);
			$_fecha_nacimiento = $_POST["fecha_nacimiento_usuario"];
			
			$funcion = "ins_usuarios";
			$parametros = " '$_nombres_usuario','$_apellidos_usuario', '$_usuario_usuario', '$_clave_usuario'
			,'$_id_pais', '$_id_provincia', '$_telefono_usuario', '$_celular_usuario'
			,'$_correo_usuario', '$_id_rol','$_id_estado', '$_clave_activacion_usuario'
			, '$_fecha_nacimiento' ";
			$usuario->setFuncion($funcion);
			$usuario->setParametros($parametros);
			$resultado=$usuario->Insert();
				
			
			
			$baseUrl = URLVADEMANO;
			$controladorAccion = "controller=Afiliaciones&action=ValidarAfiliado&clave_activacion=" . $_clave_activacion_usuario;
			$email_to  = $_POST['correo_usuario'];
			$email_from  = "info@masoft.net";
			$email_subject = "Bienvenido a Vademano";
				
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			
			
			$email_message = '<html><body>';
			$email_message .= '<h1 style="color:#f40;">Hi Jane!</h1>';
			$email_message .= '<p style="color:#080;font-size:18px;">Will you marry me?</p>';
			
			$email_message = "Bienvenid@ !!! \n\n";
			$email_message .= "". $_POST['nombres_usuario'] ." ". $_POST['apellidos_usuario'] . " ya te encuentras registrado en vademano.com " ."\n";
			$email_message .= "Tus datos pra acceder al sistema son: " . "\n";
			$email_message .= "Usuario: ". $_POST['correo_usuario']. "\n";
			$email_message .= "Clave: " . $_POST['clave_usuario'] ."\n";
			$email_message .= "Ingresa a la siguiente url para que valides tu cuenta ". $baseUrl.$controladorAccion . "\n";
			
			$email_message .= '</body></html>';
			// Ahora se envía el e-mail usando la función mail() de PHP
			
			$headers = 'From: '.$email_from."\r\n".
					'Reply-To: '.$email_from."\r\n" .
					'X-Mailer: PHP/' . phpversion();
				
				
			if (mail($email_to, $email_subject, $email_message, $headers))
			{
			
			}
			
			$this->redirect("Usuarios", "index");
			
		}
		$this->view("UsuariosAdd",array(
				"resultSet"=>"", 
				"resultPais"=>$resultPais, 
				"resultProv" =>$resultProv, 
				"resultEdit" =>"",
				"id_usuario"=>$_id_usuario, 
				"usuario_usuario"=>$_usuario_usuario , 
				"nuevo_usuario"=>$_nuevo_usuario,
				"resultRol"=>$resultRol,
				"resultEst"=>$resultEst
		));
		
		
	}
	
	
	public function Loguear()
	{
		
		$fichas = new FichasModel();
		
		$where = "nombre_fichas LIKE '%%' ORDER by consultas_fichas DESC LIMIT 4";
		$resultVis = $fichas->getBy($where);
		
		
		
		$resultado = "";
		$usuarios = new UsuariosModel(); 	
		
		if (isset ($_POST["usuario_usuario"]) && isset ($_POST["clave_usuario"]) )
		{
			$_usuario_usuario = $_POST["usuario_usuario"];
			$_clave_usuario  = $_POST["clave_usuario"];
			
			$encryp_pass = $usuarios->encrypt($_clave_usuario);
			$where = "usuario_usuario = '$_usuario_usuario' AND clave_usuario = '$encryp_pass' ";
			
			$resultado =  $usuarios->getBy($where);
			
			
			$usuario_usuario = "";
			$id_rol  = "";
			$nombre_usuario = "";
			$correo_usuario = "";
			$ip_usuario = "";
			
			if ( !empty($resultado) )
			{
				foreach($resultado as $res)
				{
					$id_usuario  = $res->id_usuario;
					$usuario_usuario  = $res->usuario_usuario;
					$id_rol           = $res->id_rol;
					$nombres_usuario   = $res->nombres_usuario;
					$correo_usuario   = $res->correo_usuario;
			
				}
				//obtengo ip
				$ip_usuario = $usuarios->getRealIP();
				 
				 
				///registro sesion
				$usuarios->registrarSesion($id_usuario, $usuario_usuario, $id_rol, $nombres_usuario, $correo_usuario, $ip_usuario);
				 
				//inserto en la tabla
				$_id_usuario = $_SESSION['id_usuario'];
				$_ip_usuario = $_SESSION['ip_usuario'];
				 
				$sesiones = new SesionesModel();
			
				$funcion = "ins_sesiones";
				 
				$parametros = " '$_id_usuario' ,'$_ip_usuario' ";
				$sesiones->setFuncion($funcion);
				 
				$sesiones->setParametros($parametros);
				 
				 
				$resultSes=$sesiones->Insert();
				
				if ($id_rol == 3) //user
				{
					$this->view("Bienvenida",array(
							"allusers"=>$_usuario_usuario,"resultVis"=>$resultVis
					));
					
				}
				else 
				{
					$this->view("BienvenidaAdmin",array(
							"allusers"=>$_usuario_usuario,"resultVis"=>$resultVis
					));
				}
				
			}
			else
			{
				 
				$this->view("Login",array(
						"allusers"=>"Usuario o Contraseña Incorrectos. Por Favor Verifique e Intente de Nuevo"
				));
			}
				
			
			
					
		}	
		
		else 
		{
			$this->view("Login",array(
					"resultado"=>$resultado
			
			));
			
		}		
	
		
		
		
		
	}

	public function Home()
	{
		session_start();
		$resultado = "";
	
		$fichas = new FichasModel();
		
		$where = "nombre_fichas LIKE '%%' ORDER by consultas_fichas DESC LIMIT 4";
		$resultVis = $fichas->getBy($where);
		
		$this->view("Index",array(
				"resultado"=>$resultado, "resultVis"=>$resultVis
	
		));
	
	
	}
	
	public function QuienesSomos()
	{
		session_start();
		$resultado = "";
	
		$paises=new PaisesModel();
		$resultPais = $paises->getAll("nombre_pais");
		
		$provincias=new ProvinciasModel();
		$resultProv = $provincias->getAll("nombre_provincia");
		
		$fichas = new FichasModel();
	
		$where = "nombre_fichas LIKE '%%' ORDER by consultas_fichas DESC LIMIT 4";
		$resultVis = $fichas->getBy($where);
	
		$this->view("QuienesSomos",array(
				"resultado"=>$resultado, "resultVis"=>$resultVis
	
		));
	
	
	}
	public function PreguntasFrecuentes()
	{
		session_start();
		$resultado = "";
	
		$fichas = new FichasModel();
	
		$where = "nombre_fichas LIKE '%%' ORDER by consultas_fichas DESC LIMIT 4";
		$resultVis = $fichas->getBy($where);
	
		$this->view("PreguntasFrecuentes",array(
				"resultado"=>$resultado, "resultVis"=>$resultVis
				
		
	
		));
	
	
	}
	
	
	
	public function InsertaUsuarios(){
			
		session_start();
		$resultado = null;
		$usuarios=new UsuariosModel();
	
	
		
		//_nombre_categorias character varying, _path_categorias character varying
		if (isset ($_POST["usuario_usuario"]) && isset ($_POST["nombre_usuario"]) && isset ($_POST["clave_usuario"]) && isset($_POST["id_rol"])  )
		{

			
			$_nombre_usuario     = $_POST["nombre_usuario"];
			
			$_clave_usuario      = $_POST["clave_usuario"];
			
			$_telefono_usuario   = $_POST["telefono_usuario"];
			$_celular_usuario    = $_POST["celular_usuario"];
			$_correo_usuario     = $_POST["correo_usuario"];
		    $_id_rol             = $_POST["id_rol"];
		    $_id_estado          = $_POST["id_estado"];
		    $_usuario_usuario     = $_POST["usuario_usuario"];
	
	
			$funcion = "ins_usuarios";
			
			$parametros = " '$_nombre_usuario' ,'$_clave_usuario' , '$_telefono_usuario', '$_celular_usuario', '$_correo_usuario' , '$_id_rol', '$_id_estado' , '$_usuario_usuario'";
			$usuarios->setFuncion($funcion);
	
			$usuarios->setParametros($parametros);
	
	
			$resultado=$usuarios->Insert();
	
			/*
			 $this->view("Categorias",array(
			 "resultado"=>$resultado
			 ));
	
			*/
	
		}
		$this->redirect("Usuarios", "index");
			
	}
	
	public function borrarId()
	{
		session_start();
		if(isset($_GET["id_usuario"]))
		{
			$id_usuario=(int)$_GET["id_usuario"];
	
			$usuarios=new UsuariosModel();
				
			$usuarios->deleteBy(" id_usuario",$id_usuario);
				
				
		}
	
		$this->redirect("Usuarios", "index");
	}
	
    
    
   public function Bienvenida(){
    
   	session_start();
    	//Creamos el objeto usuario
    	$usuarios=new UsuariosModel();
    	
    	//Conseguimos todos los usuarios
    	$allusers=$usuarios->getLogin();
    	
    	//Cargamos la vista index y l e pasamos valores
    	$this->view("Bienvenida",array(
    			"allusers"=>$allusers
    	));
    }
    
    
    
       
	public function  cerrar_sesion ()
	{
		session_start();
		session_destroy();
		$resultado = "";
		$fichas = new FichasModel();
		
		$where = "nombre_fichas LIKE '%%' ORDER by consultas_fichas DESC LIMIT 4";
		$resultVis = $fichas->getBy($where);
		
		$this->view("Index",array(
				"resultado"=>$resultado, "resultVis"=>$resultVis
		
		));
		
	}
	
	
	public function Actualiza ()
	{
		session_start();
		if (isset(  $_SESSION['usuario_usuario']) )
		{
			//Creamos el objeto usuario
			$usuarios = new UsuariosModel();
		
						
					
				$resultEdit = "";
					
				$_id_usuario = $_SESSION['id_usuario'];
				$where    = " usuarios.id_usuario = '$_id_usuario' ";
				$resultEdit = $usuarios->getBy($where);
				

				if ( isset($_POST["guardar"]) )
				{

					$_nombre_usuario     = $_POST["nombre_usuario"];
					$_clave_usuario      = $_POST["clave_usuario"];
					$_telefono_usuario   = $_POST["telefono_usuario"];
					$_celular_usuario    = $_POST["celular_usuario"];
					$_correo_usuario     = $_POST["correo_usuario"];
					$_usuario_usuario     = $_POST["usuario_usuario"];
					
					$colval   = " nombre_usuario = '$_nombre_usuario' , clave_usuario = '$_clave_usuario'   , telefono_usuario = '$_telefono_usuario' ,  celular_usuario = '$_celular_usuario' , correo_usuario = '$_correo_usuario' , usuario_usuario = '$_usuario_usuario'    ";
					$tabla    = "usuarios";
					$where    = " id_usuario = '$_id_usuario' ";
					
					$resultado=$usuarios->UpdateBy($colval, $tabla, $where);
					
					
					$this->view("Login",array(
							"allusers"=>""
					));
					
					
				}
				else
				{
					$this->view("ActualizarUsuario",array(
							"resultEdit" =>$resultEdit
								
					));
					
				}
				
				
					
		
			
		
		}
		else
		{
			$this->view("ErrorSesion",array(
			"resultSet"=>""
			));
					
		}
		
	}
	
	public function Reset()
	{
		session_start();
		$_usuario_usuario = "";
		$_clave_usuario = "";
		$usuarios = new UsuariosModel();
		$error = FALSE;
		
		
		$mensaje = "";
		
		if (isset($_POST['reestablecer_usuario']))
		{
			$_usuario_usuario = $_POST['reestablecer_usuario'];
		
			$where = "usuario_usuario = '$_usuario_usuario'   ";
			$resultUsu = $usuarios->getBy($where);	
			foreach($resultUsu as $res) 
			{	     
	        	$_clave_usuario =  mt_rand(1000, 9999);
	        	
			}		               
			$_encryp_pass = $usuarios->encrypt($_clave_usuario);
			
			$usuarios->UpdateBy("clave_usuario = '$_encryp_pass' ", "usuarios", "usuario_usuario = '$_usuario_usuario'  ");
			
			if ($_clave_usuario == "")
			{
				$mensaje = "Este Usuario no existe en nuestro sistema";
				
				$error = TRUE;
				
				
			}
			else
			{


				$email_to  = $_usuario_usuario;
				$email_from  = "info@masoft.net";
				$email_subject = "Tus Datos de Acceso a Vademano !!!";
				
				$headers  = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
					
				$email_message = '<html><body>';
					
				//$email_message .= '<p ">Will you marry me?</p>';
					
				$email_message = '<p style="color:#080;font-size:18px;" > Estos son los datos de acceso a Vademano .</p>
    				             ' . '\n';
					
				$email_message .= "Tus datos pra acceder al sistema son: " . "\n";
				$email_message .= "Usuario: ". $_usuario_usuario. "\n";
				$email_message .= "Clave Temporal: " . $_clave_usuario ."\n";
					
					
				$email_message .= '</body></html>';
				// Ahora se envía el e-mail usando la función mail() de PHP
				
				$headers = 'From: '.$email_from."\r\n".
						'Reply-To: '.$email_from."\r\n" .
						'X-Mailer: PHP/' . phpversion();
				
				
				if (mail($email_to, $email_subject, $email_message, $headers))
				{
					$mensaje = "Hemos enviado un correo electronico con sus datos de acceso";
					
					$this->view("Login",array(
							"allusers"=>""
					));
					exit();

					
				}
				else
				{
					$mensaje = "No se pudo enviar el correocon la informacion. Intentelo nuevamente";
					$error = TRUE;
					
						
						
				}
					
				
				
				
			}
						
			
			
			
		}
		
				
		
			$this->view("ResetUsuarios",array(
					"resultSet"=>$mensaje , "error"=>$error
			));
				
		
			
			
		
	
		
		
		
	}
	
}
?>
