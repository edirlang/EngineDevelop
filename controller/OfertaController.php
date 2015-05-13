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
				$_SESSION['error'] =  $_SESSION['error']." ".$oferta->ActualizarOferta();
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
	}
 ?>