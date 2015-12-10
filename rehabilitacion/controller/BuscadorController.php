<?php
class BuscadorController extends ControladorBase{
    
    public function __construct() {
        parent::__construct();
    }
    
	public function index(){
		session_start();
		$resultSet = "";
		$resultEdit = "";
	
		$composiciones = new ComposicionesModel();
		$resultCom = $composiciones->getAll("nombre_composiciones");
		
		$especies = new EspeciesModel();
		$resultEsp = $especies->getAll("nombre_especies");
		
		$distribuidores = new DistribuidoresModel();
		$resultDis = $distribuidores->getAll("nombre_distribuidores");
		
		$laboratorios = new LaboratoriosModel();
		$resultLab = $laboratorios->getAll("nombre_laboratorios");
		 
		$CantProductos = 0;
		$CantPrincipios = 0;
		$CantLaboratorios = 0;
		$CantDistribuidores = 0;
		
		$resultPrinBus = "";
		$resultLabBus = "";
		$resultDisBus = "";
	
		
		$buscador = new FichasModel();
		$principios_activos = new ComposicionesModel();
		
		if (isset($_POST["btn_buscar"]))
		{
			$_contenido_busqueda =  strtoupper ( $_POST['contenido_busqueda'] );
			
			$where = "buscador LIKE '%$_contenido_busqueda%' ";
			 
			
			$resultSet = $buscador->getBy($where);
			$resultPrinBus = $principios_activos->getBy($where);
			$resultLabBus = $laboratorios->getBy($where);
			$resultDisBus = $distribuidores->getBy($where);
			
			$CantProductos = count($resultSet);
			$CantPrincipios  =  count($resultPrinBus);
			$CantLaboratorios  =  count($resultLabBus);
			$CantDistribuidores  =  count($resultDisBus);
				
		}
		
		
		
		
		
		if (isset($_POST["btn_filtrar"]))
		{
			$where1 = "";
			$where2 = "";
			$where3 = "";
			$where4 = "";
			$where5 = "";
			$where6 = "";
			$columnas = "fichas.nombre_fichas, fichas.id_fichas";
			
			$tablas = "public.fichas, public.laboratorios, public.distribuidores, 
  						public.fichas_composiciones, public.fichas_dosificacion";
			
			$where = "laboratorios.id_laboratorios = fichas.id_laboratorios AND
  						distribuidores.id_distribuidores = fichas.id_distribuidores AND
  						fichas_composiciones.id_fichas = fichas.id_fichas AND
  						fichas_dosificacion.id_fichas = fichas.id_fichas";
			$id = "fichas.nombre_fichas";
			
			if (isset($_POST["id_especies"]))
			{
				$_id_especies = $_POST["id_especies"];
				if ($_id_especies > 0)
				{
					$where1 = " AND fichas_dosificacion.id_especies = '$_id_especies' ";
				}
			}
			
			if (isset($_POST["id_composiciones"]))
			{
				$_id_composiciones = $_POST["id_composiciones"];
				if ($_id_composiciones > 0)
				{
					$where2 = " AND fichas_composiciones.id_composiciones = '$_id_composiciones' ";
				}
			}
			if (isset($_POST["forma_administracion"]))
			{
				$_forma_administracion = $_POST["forma_administracion"];
				if ($_forma_administracion != "0")
				{
					$where3 = " AND fichas.forma_administracion_fichas = '$_forma_administracion' ";
				}
			}
			if (isset($_POST["id_laboratorios"]))
			{
				$_id_laboratorios = $_POST["id_laboratorios"];
				if ($_id_laboratorios > 0)
				{
					$where4 = " AND fichas.id_laboratorios = '$_id_laboratorios' ";
				}
			}
				
			$where_tot = $where . $where1 . $where2 . $where3 . $where4 . $where5 . $where6; 
			
			$resultSet = $buscador->getCondiciones($columnas, $tablas, $where_tot, $id);
		
		
		
		}
		
		
		
		$this->view("Buscador",array(
				"resultSet"=>$resultSet, "resultEdit" =>$resultEdit, "resultCom"=>$resultCom, "resultEsp"=>$resultEsp, "resultLab"=>$resultLab,
				"CantProductos"=>$CantProductos, "CantPrincipios"=>$CantPrincipios,
				"CantLaboratorios"=>$CantLaboratorios, "CantDistribuidores"=>$CantDistribuidores,
				"resultPrinBus"=>$resultPrinBus, "resultLabBus"=>$resultLabBus, "resultDisBus"=>$resultDisBus
			));
		
		
	}
	
	public function buscador(){
		session_start();
		$resultSet = "";
		$buscador = new FichasModel();
		if (isset($_POST["btn_buscar"]))
		{
			$_contenido_busqueda =  strtoupper ( $_POST['contenido_busqueda'] );
			$where = "nombre_fichas LIKE '$_contenido_busqueda' ";
			
			$resultSet = $buscador->getBy($where);
			
			
			
		}
		
		$this->view("Buscador",array(
				"resultSet"=>$resultSet
		));
	
	
	}
	
   	
}
?>
