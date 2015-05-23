	<?php 
	require_once "config/EntidadBase.php";
	class Factura extends EntidadBase{
		
		private $id;
		private $cliente;
        private $asesor;
        private $total;
        private $fecha;
        private $hora;
        private $estado;

        public function __construct() {
         $table="factura";
         parent::__construct($table);
     }

    

    /**
     * Gets the value of id.
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the value of id.
     *
     * @param mixed $id the id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets the value of cliente.
     *
     * @return mixed
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * Sets the value of cliente.
     *
     * @param mixed $cliente the cliente
     *
     * @return self
     */
    public function setCliente($cliente)
    {
        $this->cliente = $cliente;

        return $this;
    }

    /**
     * Gets the value of asesor.
     *
     * @return mixed
     */
    public function getAsesor()
    {
        return $this->asesor;
    }

    /**
     * Sets the value of asesor.
     *
     * @param mixed $asesor the asesor
     *
     * @return self
     */
    public function setAsesor($asesor)
    {
        $this->asesor = $asesor;

        return $this;
    }

    /**
     * Gets the value of total.
     *
     * @return mixed
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Sets the value of total.
     *
     * @param mixed $total the total
     *
     * @return self
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
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

    /**
     * Gets the value of hora.
     *
     * @return mixed
     */
    public function getHora()
    {
        return $this->hora;
    }

    /**
     * Sets the value of hora.
     *
     * @param mixed $hora the hora
     *
     * @return self
     */
    public function setHora($hora)
    {
        $this->hora = $hora;

        return $this;
    }

    public function GuardarFactura()
    {
        
            $query="INSERT INTO factura VALUES(
                        '',
                       '".$this->getFecha()."',
                       '".$this->getHora()."',
                       '".$this->getCliente()."',
                       '".$this->getAsesor()."',
                       '".$this->getTotal()."',
                       '".$this->getEstado()."'
                       )";
        $save=$this->getCrear($query);
        //$this->db()->error;
        return $save;
    }

    public function GuardarFactura2()
    {
        
            $query="INSERT INTO factura VALUES(
                        '',
                       '".$this->getFecha()."',
                       '".$this->getHora()."',
                       '".$this->getCliente()."',
                       null,
                       '".$this->getTotal()."',
                       '".$this->getEstado()."'
                       )";
        $save=$this->getCrear($query);
        //$this->db()->error;
        return $save;
    }

    public function FacturasAsesor($asesor)
    {
        $resultSet = array();
        $query = $this->db->query("SELECT * from factura where asesor = '$asesor'");
        while ($fila = mysqli_fetch_assoc($query)) {
            array_push($resultSet, $fila);
        }
        return $resultSet;
    }

    public function FacturasCliente($cliente)
    {
        $resultSet = array();
        $query = $this->db->query("SELECT * from factura where cliente = '$cliente'");
        while ($fila = mysqli_fetch_assoc($query)) {
            array_push($resultSet, $fila);
        }
        return $resultSet;
    }
    public function UltimaFactura()
    {
        $resultSet = array();
        $query = $this->db->query("SELECT * from factura order by id  desc limit 1");
        while ($fila = mysqli_fetch_assoc($query)) {
            
            $resultSet = $fila;
        }
        return $resultSet;
    }

    /**
     * Gets the value of estado.
     *
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Sets the value of estado.
     *
     * @param mixed $estado the estado
     *
     * @return self
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }
}
?>