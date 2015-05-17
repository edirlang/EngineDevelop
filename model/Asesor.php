	<?php 
	require_once "config/EntidadBase.php";
	class Asesor extends EntidadBase{
		
		private $cod_usuario;
		private $salario;
		private $fecha;

	public function __construct() {
			$table="asesor";
			parent::__construct($table);
		}

	

    /**
     * Gets the value of cod_usuario.
     *
     * @return mixed
     */
    public function getCod_usuario()
    {
        return $this->cod_usuario;
    }

    /**
     * Gets the value of salario.
     *
     * @return mixed
     */
    public function getSalario()
    {
        return $this->salario;
    }

    /**
     * Gets the value of fecha.
     *
     * @return mixed
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Sets the value of cod_usuario.
     *
     * @param mixed $cod_usuario the cod_usuario
     *
     * @return self
     */
    public function setCod_usuario($cod_usuario)
    {
        $this->cod_usuario = $cod_usuario;

        return $this;
    }

    /**
     * Sets the value of salario.
     *
     * @param mixed $salario the salario
     *
     * @return self
     */
    public function setSalario($salario)
    {
        $this->salario = $salario;

        return $this;
    }

    /**
     * Sets the value of fecha.
     *
     * @param mixed $fecha the fecha
     *
     * @return self
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function GuardarAsesor(){
			$query="INSERT INTO asesor VALUES(
						'".$this->getCod_usuario()."',
                       '".$this->getSalario()."',
                       '".$this->getFecha()."');";
        $save=$this->getCrear($query);
        //$this->db()->error;
        return $save;
		}

		public function ActualizarAsesor(){
			$query="UPDATE asesor set 
						salario='".$this->getSalario()."',
                       fecha = '".$this->getFecha()."'
                       WHERE cod_usuario='".$this->getCod_usuario()."'";
        $save=$this->getCrear($query);
        //$this->db()->error;
        return $save;
		}

	public function Asesores()
	{
		$resultSet = array();
        $query = $this->db->query("SELECT usuarios.cedula, usuarios.nombre, usuarios.apellido, usuarios.telefono, usuarios.email,asesor.salario, asesor.fecha 
        	FROM asesor, usuarios where usuarios.cedula = asesor.cod_usuario");
        while ($fila = mysqli_fetch_assoc($query)) {
            
            array_push($resultSet, $fila);
        }
        return $resultSet;
	}

	public function ConsultarAsesor($cedula)
	{
		$resultSet = array();
        $query = $this->db->query("SELECT usuarios.cedula, usuarios.nombre, usuarios.apellido, usuarios.telefono, usuarios.email,asesor.salario, asesor.fecha 
        	FROM asesor, usuarios where usuarios.cedula = asesor.cod_usuario and asesor.cod_usuario = '".$cedula."'");
        while ($fila = mysqli_fetch_assoc($query)) {
            
            $resultSet = $fila;
        }
        return $resultSet;
	}

}
	?>