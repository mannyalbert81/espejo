<?php

class SubCategoriasController extends ControladorBase{

	public function __construct() {
		parent::__construct();
	}



	public function index(){
	
		session_start();
		
		$this->view("ErrorSesion",array(
				"resultSet"=>""
	
		));
	}
	
		
	
}
?>