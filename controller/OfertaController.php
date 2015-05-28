<?php 
	/**
	* 
	*/
	class OfertaController
	{
		
		public function __construct()
		{
			
		}

		public function index()
		{
			require_once "model/Oferta.php";
			$Oferta = new Oferta();
			$ofertas = $Oferta->getAll();
			require "view/Ofertas.php";
		}

		public function Crear()
		{
			require "view/NuevaOferta.php";
		}

		public function Guardar()
		{
			require_once "model/Oferta.php";
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				
				$oferta = new oferta;
				$oferta->setNombre($_POST['nombre']);
				$oferta->setDescripcion( $_POST['descipcion']);
				$oferta->setPrecio( $_POST['precio']);
				$oferta->setArchivo(GuardarArchivo());
				$_SESSION['error'] = $oferta->GuardarOferta();
				
				header("location: ../Oferta/index");
			}
		}

		private function GuardarArchivo(){

			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				
				$nombreArchivo = $_FILES['foto']['name'];
		        $destino="imagenes/".$nombreArchivo;
		        $ubicacion_temp=$_FILES['foto']['tmp_name']; 
		        $_SESSION['error'] = move_uploaded_file($ubicacion_temp,$destino);

				return $destino;
			}
		}

		public function Editar()
		{
			if($_SERVER['REQUEST_METHOD']=='GET'){
				require_once "model/Oferta.php";
				$ofertas = new Oferta();
				
				$oferta = $ofertas->getBy('id',$_GET['id']);
				require "view/EditarOferta.php";
			}

			if($_SERVER['REQUEST_METHOD']=='POST'){
				require_once "model/Oferta.php";
				$oferta = new Oferta();

				$oferta_A = $oferta->getBy('id',$_POST['id']);
				
				$archivoNuevo = $this->GuardarArchivo();
				if($archivoNuevo == 'imagenes/' || $archivoNuevo == ''){

					$archivoNuevo = $oferta_A['archivo'];
				}else{
					echo $oferta_A['archivo'];
					unlink($oferta_A['archivo']);
				}

				$oferta->setId($_POST['id']);
				$oferta->setNombre($_POST['nombre']);
				$oferta->setDescripcion($_POST['descipcion']);
				$oferta->setPrecio($_POST['precio']);
				$oferta->setArchivo($archivoNuevo);
				$_SESSION['error'] =  $_SESSION['error'].$oferta->ActualizarOferta();
				header("location: ../Oferta/index");
			}
		}

		public function Eliminar()
		{
			if($_SERVER['REQUEST_METHOD']=='GET'){
				require_once "model/Oferta.php";
				$ofertas = new Oferta();
				$oferta = $ofertas->getBy('id',$_GET['id']);
				unlink($oferta['archivo']);
				$_SESSION['error'] = $ofertas->deleteBy('id',$_GET['id']);
				
				header("location: ../Oferta/index");
			}

		}

		public function Catalogo()
		{
			require_once "model/Oferta.php";
			$Oferta = new Oferta();
			$ofertas = $Oferta->getAll();
			require "view/Catalogo.php";		
		}

		public function Comprar()
		{
			if($_SERVER['REQUEST_METHOD']=='GET'){
				$Oferta = new Oferta();
				$id_oferta = $_GET['id'];

				$oferta = $Oferta->getBy('id',$id_oferta);
				
				$Factura = new FacturaController();

				$factura = $Factura->NuevaFactura($_SESSION['usuario'], $oferta['precio']);

				$FacturaOferta = new FacturaOferta();
				$FacturaOferta->setId($factura['id']);
				$FacturaOferta->setOferta($id_oferta);
				$_SESSION['error'] = $FacturaOferta->GuardarFacturaOferta();

				require "view/Comprar.php";
			}
		}

		
	public function RecivirPago($id_factura)
		{
				$FacturaNueva = new Factura();
				$FacturaNueva->setEstado("1");
				$FacturaNueva->setId($id_factura);
				$_SESSION['error'] = $FacturaNueva->ActualizarFactura();	
		}

	public function Pago()
		{
			
			if($_SERVER['REQUEST_METHOD']=='GET'){
				$id_factura = $_GET['id'];
				$tipo = $_GET['f'];
				$this->RecivirPago($id_factura);
				$Factura = new Factura();
				$factura = $Factura->getBy('id',$id_factura);

				$FacturaOferta = new FacturaOferta();
				$factura_oferta = $FacturaOferta->getBy('id',$id_factura);
				
				$Oferta = new Oferta();
				
				if($tipo=='0'){
					$oferta = $Oferta->getBy('id',$factura_oferta['oferta']);
					require "view/Pago.php";
				}else{
					$FacturaController = new FacturaController();
					$FacturaController->cliente();
				}
			}
		}
	}

 ?>