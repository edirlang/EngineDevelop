<?php 
	require_once "config/EntidadBase.php";
	class Usuarios extends EntidadBase{
		
		var $cedula;
		private $nombre;
		private $apellido;
		private $email;
		private $telefono;
		private $rol;
		private $password;
		private $salt;

		public function __construct() {
			$table="usuarios";
			parent::__construct($table);
		}

		public function getCedula(){
			return $this->cedula;
		}

		public function setCedula($cedula){
			$this->cedula= $cedula;
		}

		public function getNombre(){
			return $this->nombre;
		}

		public function setNombre($nombre){
			$this->nombre= $nombre;
		}	
		
		public function getApellido(){
			return $this->apellido;
		}

		public function setApellido($apellido){
			$this->apellido= $apellido;
		}

		public function getEmail(){
			return $this->email;
		}

		public function setEmail($email){
			$this->email= $email;
		}

		public function getTelefono(){
			return $this->telefono;
		}

		public function setTelefono($telefono){
			$this->telefono= $telefono;
		}	

		public function getRol(){
			return $this->rol;
		}

		public function setRol($rol){
			$this->rol = $rol;
		}

		public function getPassword(){
			return $this->password;
		}

		public function setPassword($password){
			$this->password = crypt($password,"sha542");
		}

		public function getSalt(){
			return $this->salt;
		}

		public function setSalt($salt){
			$this->salt= $salt;
		}

		public function save_usuario(){
			$this->salt = md5(time());
			$query="INSERT INTO usuarios VALUES(
						'".$this->getCedula()."',
                       '".$this->getNombre()."',
                       '".$this->getApellido()."',
                       '".$this->getEmail()."',
                       '".$this->getTelefono()."',
                       '".$this->getRol()."',
                       '".$this->getPassword().$this->getSalt()."',
                       '".$this->getSalt()."');";
        $save=$this->getCrear($query);
        //$this->db()->error;
        return $save;
		}
	}
 ?>