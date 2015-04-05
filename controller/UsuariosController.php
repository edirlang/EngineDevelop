<?php 
	
	class UsuariosController{
		
		private $vista;
		
		public function __construct() {
			$this->vista = new View();
		}

		public function index(){
			$data = array();
			$this->vista->show("login.php", $data);
		}

		public function Nuevo(){
			$data = array();
			$this->vista->show("NuevoUsuario.php", $data);	
		}

		public function save(){
			require_once "model/Usuarios.php";
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				$usuario = new Usuarios;
				$usuario->setCedula($_POST['Cedula']);
				$usuario->setNombre( $_POST['Nombre']);
				$usuario->setApellido($_POST['Apellido']);
				$usuario->setEmail( $_POST['Email']);
				$usuario->setTelefono( $_POST['Telefono']);
				$usuario->setRol($_POST['rol']);
				$usuario->setPassword($_POST['Contrasena']);
				$usuario->setSalt('salt');
				echo $usuario->save_usuario();
				header("location: ../Usuarios/index");
				
			}
		}

		public function Validar(){
			require_once "model/Usuarios.php";
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				$Usuarios = new Usuarios();
				
				$usuario = $Usuarios->getBy("cedula",$_POST['usuario']);
				
				if(isset($usuario)){
					$contrasena = crypt($_POST['contrasena'],"sha542").$usuario['salt'];
					if( $usuario['password'] == $contrasena){
						session_start();
						$_SESSION['usario'] = $usuario['cedula'];
						$_SESSION['Nombre'] = $usuario['nombre']." ".$usuario['apellido'];
						$this->vista->show("clientes.php",null);
					}else{
						$this->index();
					}
				}else
					$this->index();
			}
		}

		public function Salir(){
			session_start();
			$_SESSION['usario'] = null;
			$_SESSION['Nombre'] = null;
			session_destroy();
			$this->vista->show("index/index.php",null);
		}
	}
 ?>