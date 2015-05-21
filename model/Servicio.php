	<?php 
	require_once "config/EntidadBase.php";
	class Servicio extends EntidadBase{
		
		private $id;
		private $nombre;
        private $precio;
        
        public function __construct() {
         $table="servicio";
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
     * Gets the value of nombre.
     *
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Sets the value of nombre.
     *
     * @param mixed $nombre the nombre
     *
     * @return self
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Gets the value of precio.
     *
     * @return mixed
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Sets the value of precio.
     *
     * @param mixed $precio the precio
     *
     * @return self
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    public function GuardarServicio()
    {
            $query="INSERT INTO servicio VALUES(
                       '".$this->getId()."',
                       '".$this->getNombre()."',
                       '".$this->getPrecio()."'
                       )";
        $save=$this->getCrear($query);
        //$this->db()->error;
        return $save;
    }
}
?>