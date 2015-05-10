	<?php 
	require_once "config/EntidadBase.php";
	class Oferta extends EntidadBase{
		
		private $id;
		private $nombre;
		private $descripcion;
		private $precio;

	public function __construct() {
			$table="oferta";
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

	public function GuardarOferta(){
			$this->salt = md5(time());
			$query="INSERT INTO oferta VALUES(
						'',
	                   '".$this->getNombre()."',
	                   '".$this->getDescripcion()."',
	                   '".$this->getPrecio()."');";
	    $save=$this->getCrear($query);
	    //$this->db()->error;
	    return $save;
		}

	public function ActualizarOferta(){
			$this->salt = md5(time());
			$query="UPDATE oferta set 
						nombre='".$this->getNombre()."',
	                   descripcion = '".$this->getDescripcion()."',
	                   precio='".$this->getPrecio()."' 
	                    WHERE id='".$this->getId()."'";
	    $save=$this->getCrear($query);
	    //$this->db()->error;
	    return $save;
		}
	}
	?>