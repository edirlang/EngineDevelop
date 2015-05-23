	<?php 
	require_once "config/EntidadBase.php";
	class FacturaOferta extends EntidadBase{
		
		private $id;
		private $oferta;

        public function __construct() {
         $table="facturaoferta";
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
     * Gets the value of oferta.
     *
     * @return mixed
     */
    public function getOferta()
    {
        return $this->oferta;
    }

    /**
     * Sets the value of oferta.
     *
     * @param mixed $oferta the oferta
     *
     * @return self
     */
    public function setOferta($oferta)
    {
        $this->oferta = $oferta;

        return $this;
    }

    public function GuardarFacturaOferta()
    {
        $this->salt = md5(time());
            $query="INSERT INTO facturaoferta VALUES(
                       '".$this->getId()."',
                       '".$this->getOferta()."'
                       )";
        $save=$this->getCrear($query);
        //$this->db()->error;
        return $save;
    }
}
?>