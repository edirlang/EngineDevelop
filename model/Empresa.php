<?php 
	require_once "config/EntidadBase.php";
	class Empresa extends EntidadBase{
		
		private $nombre;
		private $nit;
		private $telefono;
		private $dirrecion;
		private $representante;

		public function __construct() {
			$table="empresa";
			parent::__construct($table);
		}

		public function getNit(){
			return $this->nit;
		}

		public function setNit($nit){
			$this->nit= $nit;
		}

		public function getNombre(){
			return $this->nombre;
		}

		public function setNombre($nombre){
			$this->nombre= $nombre;
		}	
		
		public function getDireccion(){
			return $this->direccion;
		}

		public function setDireccion($direccion){
			$this->direccion= $direccion;
		}

		public function getTelefono(){
			return $this->telefono;
		}

		public function setTelefono($telefono){
			$this->telefono= $telefono;
		}	

		public function getRepresentante(){
			return $this->representante;
		}

		public function setRepresentante($representante){
			$this->representante = $representante;
		}

		public function save_empresa(){
			$this->salt = md5(time());
			$query="INSERT INTO empresa VALUES(
						'".$this->getNit()."',
                       '".$this->getNombre()."',
                       '".$this->getTelefono()."',
                       '".$this->getDireccion()."',
                       '".$this->getRepresentante()."')";
        $save=$this->getCrear($query);
        //$this->db()->error;
        return $save;
		}

		public function update_empresa(){
			$this->salt = md5(time());
			$query="UPDATE empresa set 
						nombre='".$this->getNombre()."',
                       telefono = '".$this->getTelefono()."',
                       direccion='".$this->getDireccion()."' 
                        WHERE nit='".$this->getNit()."'";
        $save=$this->getCrear($query);
        //$this->db()->error;
        return $save;
		}
	}
 ?>