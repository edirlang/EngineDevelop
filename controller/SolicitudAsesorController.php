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

		public function Guardar()
		{
			$respuesta = new SolicitudAsesor();
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				$respuesta->setSolicitud($_POST['solicitud']);
				$respuesta->setRespuesta($_POST['descripcion']);
				$respuesta->setFecha($_POST['fecha']);
				$respuesta->setHora($_POST['hora']);
				$respuesta->setAsesor($_SESSION['usuario']);
				$estado = $respuesta->GuardarSolicitudAsesor();

				if($this->ComprovarEstadoRespuesta($estado)){
					$_SESSION['error'] = "NO SE LOGRO RESPONDER LA SOLICITUD DEBIDO A ERROR ".$estado;
				}else{
					if($this->CambiarEstadoSolicitud($_POST['solicitud'],"1")){
						
						$destinatario = $this->ObtenerEmailUsuario($_POST['solicitud']);
						$remitente = $this->ObtenerEmailAsesor($_POST['solicitud']);
						$mensaje = $this->ConstruirMensaje($destinatario,$respuesta);

						$this->EnviarRespuestaCorrero($remitente, $destinatario['email'],$mensaje);
						header("Location: /EngineDevelop/index.php/SolicitudAsesor/index");
					}else{
						$_SESSION['error'] = "NO SE LOGRO RESPONDER LA SOLICITUD DEBIDO A ERROR ";
					}
					
				}
			}
		}

		private function ObtenerEmailUsuario($idSolicitud)
		{
			require_once "model/Solicitud.php";
			require_once "model/Usuarios.php";
			$Solicitud = new Solicitud();
			$solicitud = $Solicitud->getBy('id',$idSolicitud);
			$Usuarios = new Usuarios();
			return  $Usuarios->getBy("cedula",$solicitud['cliente']);
			
		}

		private function ObtenerEmailAsesor($idSolicitud)
		{
			require_once "model/AsesorSolicitud.php";
			require_once "model/Usuarios.php";
			$Solicitud = new SolicitudAsesor();
			$solicitud = $Solicitud->getBy('solicitud',$idSolicitud);
			$Usuarios = new Usuarios();
			return  $Usuarios->getBy("cedula",$solicitud['asesor']);
			
		}

		private function CambiarEstadoSolicitud($idSolicitud, $estado)
		{
			require_once "model/Solicitud.php";
			$Solicitud = new Solicitud();
			$Solicitud->setEstado($estado);
			$Solicitud->setId($idSolicitud);
			$estado = $estado.$Solicitud->CambiarEstado();
			return $this->ComprovarEstadoRespuesta($estado);
		}
		
		private function ComprovarEstadoRespuesta($estado)
		{
			if($estado != ''){
				return true;
			}else{
				return false;
			}
		}

		private function ConstruirMensaje($destinatario, $respuesta)
		{

			return "Señor(a) ".$destinatario['nombre']." ".$destinatario['apellido']."\r\n
			Le quiero comertar que a su solicitud ".$respuesta->getRespuesta()." a sido respondida para que este disponible para el dia
			".$respuesta->getFecha()." a las ".$respuesta->getHora()." para darle solucion a su problema, mas informacion consulta la
			 platafomra";
		}

		private function EnviarRespuestaCorrero($remitente, $destinatario, $mensaje)
		{
			$headers = 'From: '.$destinatario."\r\n".
			'Reply-To:'.$destinatario."\r\n".
			'X-Mailer: PHP/'.phpversion();
			
			$estado = mail($destinatario, "Respuesta a solicitud de Engine&Develop", $mensaje, $headers);
			if($estado){
			    $_SESSION['error']  = "Mensaje enviado";
			}else{
			    $_SESSION['error']  =  "Mensaje no enviado";
			}
		}
	}
 ?>