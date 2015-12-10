<?php

class ProvinciasController extends ControladorBase{

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

	public function devuelveProvincias()
	{
		session_start();
		$resultSub = array();
	
		if(isset($_POST["id_pais"]))
		{
	
			$id_pais=(int)$_POST["id_pais"];
	
			$provincias=new ProvinciasModel();
	
			$resultProv = $provincias->getBy(" id_pais = '$id_pais'  ");
	
	
		}
	
		echo json_encode($resultProv);
	
	}
	
	public function devuelveCanton()
	{
		session_start();
		$resultCan = array();
	
		
		if(isset($_POST["id_provincia"]))
		{
	
			$id_provincia=(int)$_POST["id_provincia"];
	
			$canton=new CantonModel();
	
			$resultCan = $canton->getBy(" id_provincias = '$id_provincia'  ");
	
	
		}
	
			
		echo json_encode($resultCan);
	
	}
	
	
}
?>