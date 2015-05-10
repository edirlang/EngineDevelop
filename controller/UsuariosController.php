<?php 
	
	class UsuariosController{
		
		public function __construct() {
			
		}

		public function index(){
			require_once "model/Usuarios.php";
			$usuariosall = new Usuarios();
			$usuarios = $usuariosall->getAll();
			require "view/Usuarios.php";
		}

		public function login(){
			require "view/login.php";
		}
		public function Nuevo(){
			require "view/NuevoUsuario.php";	
		}

		public function Editar(){
			if($_SERVER['REQUEST_METHOD']=='GET'){
				require_once "model/Usuarios.php";
				$usuarios = new Usuarios();
				echo $_GET['id'];
				$usuario = $usuarios->getBy('cedula',$_GET['id']);
				require "view/EditarUsuario.php";
			}

			if($_SERVER['REQUEST_METHOD']=='POST'){
				require_once "model/Usuarios.php";
				$usuario = new Usuarios();
				$usuario->setCedula($_POST['Cedula']);
				$usuario->setNombre($_POST['Nombre']);
				$usuario->setApellido($_POST['Apellido']);
				$usuario->setTelefono($_POST['Telefono']);
				$usuario->setEmail($_POST['Email']);
				$_SESSION['error'] =  $usuario->update_usuario();
				$this->index();
			}

		}

		public function save(){
			require_once "model/Usuarios.php";
			require_once "model/Empresa.php";
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				$usuario = new Usuarios;
				$empresa = new Empresa;
				$usuario->setCedula($_POST['Cedula']);
				$usuario->setNombre( $_POST['Nombre']);
				$usuario->setApellido($_POST['Apellido']);
				$usuario->setEmail( $_POST['Email']);
				$usuario->setTelefono( $_POST['Telefono']);
				$usuario->setRol('empresario');
				$usuario->setPassword($_POST['Contrasena']);
				$usuario->setSalt('salt');
				echo $usuario->save_usuario();

				$empresa->setNit($_POST['nit']);
				$empresa->setNombre($_POST['nombre_empresa']);
				$empresa->setTelefono($_POST['telefono_empresa']);
				$empresa->setDireccion($_POST['direccion_empresa']);
				$empresa->setRepresentante($_POST['Cedula']);
				echo $empresa->save_empresa();

				header("location: ../Usuarios/login");
				
			}
		}

		public function Validar(){
			require_once "model/Usuarios.php";
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				$Usuarios = new Usuarios();
				
				$usuario = $Usuarios->getBy("cedula",$_POST['usuario']);
				
				if(isset($usuario['password'])){
					$contrasena = crypt($_POST['contrasena'],"sha542").$usuario['salt'];
					if( $usuario['password'] == $contrasena){
						
						$_SESSION['usario'] = $usuario['cedula'];
						$_SESSION['Nombre'] = $usuario['nombre']." ".$usuario['apellido'];
						$_SESSION['rol'] = $usuario['rol'];
						require "view/clientes.php";
					}else{
						$_SESSION['error'] ="Usuario o contraseña erronea";
						$this->login();
					}
				}else{
					$_SESSION['error'] ="Usuario o contraseña erronea";
					$this->login();
				}
			}
		}

		public function Salir(){
			$_SESSION['usario'] = null;
			$_SESSION['Nombre'] = null;
			$_SESSION['rol'] = null;
			session_destroy();
			require "view/index/index.php";
		}
	}
 ?>