<?php 
	require_once "model/Solicitud.php";
	class SolicitudController{
		
		public function __construct() {
			
		}

		public function index(){
			$Solicitud = new Solicitud();
			$solicitudes = $Solicitud->getAll();
			require "view/Solicitudes.php";
		}

		public function Nueva(){
			require "view/CrearSolicitud.php";
		}

		public function Guardar(){
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				$solicitud = new Solicitud();
				$solicitud->setDescripcion($_POST['descripcion']);
				$solicitud->setCliente($_SESSION['usuario']);
				$solicitud->setTipo($_POST['tipo']);
				$solicitud->GuardarSolicitud();
				$_SESSION['error'] = "Solicitud Envida";
				header("location: ../Oferta/index");
			}
		}

		
	}
 ?>