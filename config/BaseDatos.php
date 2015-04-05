<?php 
	class BaseDatos{
		private $servidor;
		private $puerto;
		private $usuario;
		private $password;
		private $BD;

		public function _construct(){
			$this->$servidor="localhost";
			$this->$puerto="";
			$this->$usuario="root";
			$this->$password="12345";
			$this->$BD = "enginedevelop";
		}

		public function conexion(){
			$conexion = mysqli_connect('localhost','root','12345','EngineDevelop');
		    if(!$conexion){
		        echo 'No se pudo conectar con la jodida DB'.mysqli_error($conexion);
		    }
			return $conexion;
		}

		public function cerrar_conexion_db($conexion){
			mysqli_close($conexion);
		}
	}
 ?>