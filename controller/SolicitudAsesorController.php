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

		public function RespuestaUsuario(){
			require_once "model/Solicitud.php";
			$SolicitudAsesor = new SolicitudAsesor();
			$respuestas = $SolicitudAsesor->RespuestaCliente($_SESSION['usuario']);
			
			require "view/Respuestas.php";
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
					$_SESSION['error'] = "NO SE LOGRO RESPONDER LA SOLICITUD DEBIDO A ERROR Guardar Respuesta".$estado;
				}else{
					if($this->CambiarEstadoSolicitud($_POST['solicitud'],"1")){
						
						$destinatario = $this->ObtenerEmailUsuario($_POST['solicitud']);
						$remitente = $this->ObtenerEmailAsesor($_POST['solicitud']);
						$mensaje = $this->ConstruirMensaje($destinatario, $remitente,$respuesta);

						$this->EnviarRespuestaCorrero($remitente, $destinatario,$mensaje);
						
					}else{
						$_SESSION['error'] = "NO SE LOGRO RESPONDER LA SOLICITUD DEBIDO A ERROR ";
						
					}
					
				}
				header("Location: /EngineDevelop/index.php/SolicitudAsesor/index");
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

		private function ConstruirMensaje($destinatario, $remitente, $respuesta)
		{

			return "<h3>Se&ntildeor(a) ".$destinatario['nombre']." ".$destinatario['apellido']."</h3>
			<p>Su solicitud a sido respondida. para mas informacion ingrese a la plataforma Engien$Develop </p>
			<p> Visita para solucion</p>
			<p> Dia: ".$respuesta->getFecha()." a las ".$respuesta->getHora()." </p>
			 <h3>Atentamente</h3>
			 <h4>".$remitente['nombre']." ".$remitente['apellido']."</h4>
			 <h4>Asesor de Servicios Engine&Develop</h4>
			 ";
		}

		private function EnviarRespuestaCorrero($remitente, $destinatario, $mensaje)
		{
			global $correo;
			include("config/class.phpmailer.php");
			include("config/class.smtp.php");
			$mail = new PHPMailer();
			$mail->IsSMTP();
			$mail->SMTPAuth = true;
			$mail->SMTPSecure = "ssl";
			$mail->Host = "smtp.gmail.com";
			$mail->Port = 465;
			$mail->Username = "engine.develop1@gmail.com";
			$mail->Password = "enginedebelop123";
			
			  
			$mail->From = "engine.develop1@gmail.com";//"probando@jaja.com";
			$mail->FromName = "ENGINE";
			$mail->Subject = "TIENES RESPUESTA A UNA SOLICITUD !";
			
			$mail->MsgHTML("<div>".$mensaje."</div>");
			//$mail->AddAttachment("files/files.zip");
			//$mail->AddAttachment("files/img03.jpg");
			$mail->AddAddress($destinatario['email'], $destinatario['nombre'].' '.$destinatario['apellido']);
			$mail->IsHTML(true);
			
			if(!$mail->Send()) {
			  $_SESSION = $mail->ErrorInfo;
		
			}
		}

		
	}
 ?>