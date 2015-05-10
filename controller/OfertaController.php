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
				$_SESSION['error'] = $oferta->GuardarOferta();
				
				header("location: ../Oferta/index");
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
				$oferta->setId($_POST['id']);
				$oferta->setNombre($_POST['nombre']);
				$oferta->setDescripcion($_POST['descipcion']);
				$oferta->setPrecio($_POST['precio']);
				$_SESSION['error'] =  $oferta->ActualizarOferta();
				header("location: ../Oferta/index");
			}
		}

		public function Eliminar()
		{
			if($_SERVER['REQUEST_METHOD']=='GET'){
				require_once "model/Oferta.php";
				$ofertas = new Oferta();
				$_SESSION['error'] = $ofertas->deleteBy('id',$_GET['id']);
				header("location: ../Oferta/index");
			}

		}
	}
 ?>