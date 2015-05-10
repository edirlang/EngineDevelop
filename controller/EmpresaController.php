<?php 
	
	class EmpresaController{
		
		public function __construct() {
			
		}

		public function index(){
			require_once "model/Empresa.php";
			$empresasall = new Empresa();
			$empresas = $empresasall->getAll();
			require "view/Empresas.php";
		}

		public function Editar(){
			if($_SERVER['REQUEST_METHOD']=='GET'){
				require_once "model/Empresa.php";
				$empresas = new Empresa();
				
				$empresa = $empresas->getBy('nit',$_GET['id']);
				require "view/EditarEmpresa.php";
			}

			if($_SERVER['REQUEST_METHOD']=='POST'){
				require_once "model/Empresa.php";
				$empresa = new Empresa();
				$empresa->setNit($_POST['nit']);
				$empresa->setNombre($_POST['nombre_empresa']);
				$empresa->setTelefono($_POST['telefono_empresa']);
				$empresa->setDireccion($_POST['direccion_empresa']);
				$_SESSION['error'] =  $empresa->update_empresa();
				$this->index();
			}

		}
		
	}
 ?>