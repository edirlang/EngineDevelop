<?php 
	require_once "model/AsesorSolicitud.php";
	class SolicitudAsesorController{
		
		public function __construct() {
			
		}

		public function index(){
			require_once "model/Solicitud.php";
			$SolicitudAsesor = new SolicitudAsesor();
			$solicitudesasesor = $SolicitudAsesor->getAll();
			$solicitudes = array();
			$Solicitud = new Solicitud();
			foreach ($solicitudesasesor as $solicitudAsesor) {
				array_push($solicitudes, $Solicitud->getBy('id',$solicitudAsesor['solicitud']));
			}
			require "view/SolicitudesAsesor.php";
		}

		public function SolicitudSinResponder()
		{
			require_once "model/Solicitud.php";
			$Solicitud = new Solicitud();
			$solicitudes = $Solicitud->getSolicitudSinResponder();
			require "view/SolicitudesSinRespinder.php";
		}
		
		public function Responder()
		{
			require "view/RespuestaSolicitud.php";
		}
	}
 ?>