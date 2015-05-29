<?php 
	require_once "model/Factura.php";
	class FacturaController{
		
		public function __construct() {
			
		}

		public function index(){
			
			$Factura = new Factura();
			$facturas = $Factura->getAll();

			require "view/facturas.php";
		}

		public function asesor(){
			
			$Factura = new Factura();
			$facturas = $Factura->FacturasAsesor($_SESSION['usuario']);
			require "view/facturas.php";
		}

		public function Cliente(){
			
			$Factura = new Factura();
			$facturas = $Factura->FacturasCliente($_SESSION['usuario']);
			require "view/FacturasClientes.php";
		}

		public function Nueva(){
			require_once "model/Servicio.php";
			$Usuarios = new Usuarios();
			$Factura = new Factura();
			$Solicitud = new Solicitud();
			
			if($_SERVER['REQUEST_METHOD']=='POST'){
				
				$numero = $_POST['num_fact'];
				$fecha = $_POST['fecha'];
				$hora = $_POST['hora'];
				$cliente = $_POST['cliente'];
				$total = $_POST['total'];
				$servicios = json_decode($_POST['jdatos']);

				$Factura->setId($numero);
				$Factura->setFecha($fecha);
				$Factura->setHora($hora);
				$Factura->setTotal($total);
				$Factura->setAsesor($_SESSION['usuario']);
				$Factura->setCliente($cliente);
				$Factura->setEstado('0');
				$Factura->GuardarFactura();
				$this->EnviarCorreo($Factura);

				foreach ($servicios as $servicio1) {
					$Servicio = new Servicio();
					$facturaNueva = $Factura->UltimaFactura();
					$Servicio->setId($facturaNueva['id']);
					$Servicio->setNombre($servicio1[0]);
					$Servicio->setPrecio($servicio1[1]);
					$_SESSION['error'] = $Servicio->GuardarServicio(); 
				}

				$Solicitud->setId($_POST['id']);
				$Solicitud->setEstado("2");
				$_SESSION['error'] = $_SESSION['error'].$Solicitud->CambiarEstado();
				
			}else{
				$solicitud = $Solicitud->getBy('id',$_GET['id']);
				$cliente =  $Usuarios->getBy('cedula',$solicitud['cliente']);
				$factura = $Factura->UltimaFactura();
				require "view/NuevaFactura.php";
			}
		}

		public function Eliminar()
		{
			if($_SERVER['REQUEST_METHOD']=='GET'){
				$Factura = new Factura();
				$_SESSION['error'] = $Factura->deleteById($_GET['id']);
				require "view/facturas.php";
			}
		}

		public function NuevaFactura($cliente, $total){
			$Factura = new Factura();
			
			$Factura->setFecha(date("Y-m-d"));
			$Factura->setHora(date("h:m"));
			$Factura->setTotal($total);
			
			$Factura->setCliente($cliente);
			$Factura->setEstado('0');
			$_SESSION['error'] = $Factura->GuardarFactura2();
				
			return $Factura->UltimaFactura();
		}

		public function EnviarCorreo($factura)
		{
			global $correo;
			require_once "config/class.phpmailer.php";
			require_once "config/class.smtp.php";
			require_once 'model/Usuarios.php';
			$Usuarios = new Usuarios();
			$usuario = $Usuarios->getBy('cedula', $factura->getCliente());
			$asesor = $Usuarios->getBy('cedula', $factura->getAsesor());
			
			$mensaje = "<h3>Se&ntildeor(a) ".$usuario['nombre']." ".$usuario['apellido']."</h3>
			<p>Se ha generado una factura para el pago del servicio solicitado, por favor ingrese a la plataforma Engien$Develop para realizar el pago</p>
			<p> Factura ".$factura->getId()."</p>
			<p> Total: ".$factura->getTotal()."</p>
			 <h3>Atentamente</h3>
			 <h4>".$asesor['nombre']." ".$asesor['apellido']."</h4>
			 <h4>Asesor de Servicios Engine&Develop</h4>
			 ";

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
			$mail->Subject = "Pago de servicios";
			
			$mail->MsgHTML("<div>".$mensaje."</div>");
			//$mail->AddAttachment("files/files.zip");
			//$mail->AddAttachment("files/img03.jpg");
			$mail->AddAddress($usuario['email'], $usuario['nombre'].' '.$usuario['apellido']);
			$mail->IsHTML(true);
			
			if(!$mail->Send()) {
			  $_SESSION['error'] = $mail->ErrorInfo;
	
			}
		}
	}
 ?>