	<?php 
	require_once "config/EntidadBase.php";
	class Solicitud extends EntidadBase{
		
		private $id;
		private $cliente;
        private $tipo;
        private $descripcion;
        private $fecha;
        private $hora;
        private $estado;

        public function __construct() {
         $table="solicitud";
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
         * Gets the value of tipo.
         *
         * @return mixed
         */
        public function getTipo()
        {
            return $this->tipo;
        }

        /**
         * Sets the value of tipo.
         *
         * @param mixed $tipo the tipo
         *
         * @return self
         */
        public function setTipo($tipo)
        {
            $this->tipo = $tipo;

            return $this;
        }

        /**
         * Gets the value of descripcion.
         *
         * @return mixed
         */
        public function getDescripcion()
        {
            return $this->descripcion;
        }

        /**
         * Sets the value of descripcion.
         *
         * @param mixed $descripcion the descripcion
         *
         * @return self
         */
        public function setDescripcion($descripcion)
        {
            $this->descripcion = $descripcion;

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

        public function getSolicitudSinResponder()
        {
            $solicitudes = $this->getAll();
            $solicitudessinresouesta = array();
            foreach ($solicitudes as $solicitud) {
                if($solicitud['estado'] == '0'){
                    array_push($solicitudessinresouesta, $solicitud);
                }
            }
            return $solicitudessinresouesta;
        }

        public function GuardarSolicitud(){
            $query="insert into solicitud(cliente,tipo,descRipcion,fecha,hora,estado) values (
                '".$this->getCliente()."', '".$this->getTipo()."', '".$this->getDescripcion()."', CURDATE(), CURTIME(),'0');";
            $save=$this->getCrear($query);
                    //$this->db()->error;
            return $save;
        }

        public function CambiarEstado()
        {
            $query="UPDATE solicitud set 
                        estado='".$this->getEstado()."' 
                        WHERE id='".$this->getId()."'";
            $save=$this->getCrear($query);
            //$this->db()->error;
            return $save;
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