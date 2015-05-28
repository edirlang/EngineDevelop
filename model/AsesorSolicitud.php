	<?php 
	require_once "config/EntidadBase.php";
	class SolicitudAsesor extends EntidadBase{
    	private $solicitud;
        private $asesor;
        private $fecha;
        private $hora;
        private $respuesta;

    	public function __construct() {
    			$table="solicitud_asesor";
    			parent::__construct($table);
    	}


        /**
         * Gets the value of solicitud.
         *
         * @return mixed
         */
        public function getSolicitud()
        {
            return $this->solicitud;
        }

        /**
         * Sets the value of solicitud.
         *
         * @param mixed $solicitud the solicitud
         *
         * @return self
         */
        public function setSolicitud($solicitud)
        {
            $this->solicitud = $solicitud;

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

        /**
         * Gets the value of respuesta.
         *
         * @return mixed
         */
        public function getRespuesta()
        {
            return $this->respuesta;
        }

        /**
         * Sets the value of respuesta.
         *
         * @param mixed $respuesta the respuesta
         *
         * @return self
         */
        public function setRespuesta($respuesta)
        {
            $this->respuesta = $respuesta;

            return $this;
        }

        public function GuardarSolicitudAsesor()
        {
            $query="insert into solicitud_asesor values (
                    '".$this->getSolicitud()."',
                     '".$this->getAsesor()."', 
                     '".$this->getFecha()."',
                     '".$this->getHora()."',
                     '".$this->getRespuesta()."');";
            $save=$this->getCrear($query);
            //$this->db()->error;
            return $save;
        }

        public function RespuestaCliente($cliente)
        {
            $resultSet = array();
        $query = $this->db->query("SELECT solicitud.id as solicitud, solicitud.cliente, solicitud.tipo, solicitud.descripcion,solicitud.fecha,  solicitud.hora, solicitud_asesor.asesor, solicitud_asesor.respuesta, solicitud_asesor.fecha as fechaR, solicitud_asesor.hora as HoraR FROM solicitud, solicitud_asesor WHERE solicitud_asesor.solicitud = solicitud.id and solicitud.cliente='$cliente'");
        while ($fila = mysqli_fetch_assoc($query)) {
            array_push($resultSet, $fila);
        }
        return $resultSet;
        }

        
    }
?>