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

				foreach ($servicios as $servicio1) {
					$Servicio = new Servicio();
					$facturaNueva = $Factura->UltimaFactura();
					$Servicio->setId($facturaNueva['id']);
					$Servicio->setNombre($servicio1[0]);
					$Servicio->setPrecio($servicio1[1]);
					$Servicio->GuardarServicio(); 
				}

				$Solicitud->setId($_POST['id']);
				$Solicitud->setEstado("2");
				echo  $Solicitud->CambiarEstado();
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

		public function Pago()
		{
			if($_SERVER['REQUEST_METHOD']=='GET'){
				
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

	}
 ?>