<?php 
	require_once "model/Asesor.php";
	class AsesorController{
		
		public function __construct() {
			
		}

		public function index(){
			
			$asesor = new Asesor();
			$asesores = $asesor->Asesores();
			require "view/Asesores.php";
		}

		public function Nuevo(){
			require "view/NuevoAsesor.php";	
		}

		public function Guardar(){
			require_once "model/Usuarios.php";
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				$usuario = new Usuarios;
				$asesor = new Asesor();

				$usuario->setCedula($_POST['Cedula']);
				$usuario->setNombre( $_POST['Nombre']);
				$usuario->setApellido($_POST['Apellido']);
				$usuario->setEmail( $_POST['Email']);
				$usuario->setTelefono( $_POST['Telefono']);
				$usuario->setRol('asesor');
				$usuario->setPassword($_POST['Contrasena']);
				$usuario->setSalt('salt');
				$estado_usuario =  $usuario->save_usuario();

				$asesor->setCod_usuario($_POST['Cedula']);
				$asesor->setSalario($_POST['salario']);
				$asesor->setFecha($_POST['Fecha']);
				$estado_asesor = $asesor->GuardarAsesor();

				$this->Comprovar($estado_usuario, $estado_asesor);
				
				
			}
		}

		public function Editar(){
			
			if($_SERVER['REQUEST_METHOD']=='GET'){
				$Asesor = new Asesor();
				$asesor = $Asesor->ConsultarAsesor($_GET['id']);
				require "view/EditarAsesor.php";
			}

			if($_SERVER['REQUEST_METHOD']=='POST'){
				require_once "model/Usuarios.php";
				$usuario = new Usuarios();
				$usuario->setCedula($_POST['Cedula']);
				$usuario->setNombre($_POST['Nombre']);
				$usuario->setApellido($_POST['Apellido']);
				$usuario->setTelefono($_POST['Telefono']);
				$usuario->setEmail($_POST['Email']);
				$estado_usuario =  $usuario->update_usuario();

				$asesor = new Asesor();
				$asesor->setCod_usuario($_POST['Cedula']);
				$asesor->setSalario($_POST['salario']);
				$asesor->setFecha($_POST['Fecha']);
				$estado_asesor = $asesor->ActualizarAsesor();

				$this->Comprovar($estado_usuario, $estado_asesor);
			}

		}

		private function Comprovar($estado_usuario, $estado_asesor){
			if($estado_usuario == '' && $estado_asesor == ''){
					header("location: ../Asesor/index");
				}else {
					$usuario->deleteBy("cedula",$_POST['Cedula']);
					$_SESSION['error'] = "NO SE LOGRO CREAR O EDITAR EL ASESOR";
 				}
		}

		public function Eliminar(){
			
			if($_SERVER['REQUEST_METHOD']=='GET'){
				$Asesor = new Asesor();
				$estado_asesor = $Asesor->deleteBy('cod_usuario',$_GET['id']);
				$Usuarios = new Usuarios();
				$estado_usuario = $Usuarios->deleteBy('cedula',$_GET['id']);
				if($estado_usuario == '1' && $estado_asesor == '1'){
					header("location: ../Asesor/index");
				}else {
					
					$_SESSION['error'] = "NO SE LOGRO ELIMINAR EL ASESOR";
 				}
			}
		}

	}
 ?>