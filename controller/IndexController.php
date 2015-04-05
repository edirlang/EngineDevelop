<?php 
class IndexController{

	var $vista;

	function __construct() {
		$this->vista = new View();
	}
	
	function index(){
		$data = array();
		$this->vista->show("index/index.php", $data);	
	}

	function Mision(){
		$data = array();
		$this->vista->show("index/index.php", $data);	
	}

	function Vision(){
		$data = array();
		$this->vista->show("index/index.php", $data);	
	}
}

 ?>