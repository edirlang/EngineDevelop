<?php

class EntidadBase{

    private $table;
    protected $db;
    protected $conectar;

    public function __construct($table) {
        $this->table = (string) $table;
        require_once 'BaseDatos.php';
        $this->conectar = new BaseDatos();
        $this->db = $this->conectar->conexion();
    }

    public function getConetar(){
        return $this->conectar;
    }

    public function getAll(){
        $resultSet = array();
        $query = $this->db->query("SELECT * FROM $this->table");
        while ($fila = mysqli_fetch_assoc($query)) {
            
            array_push($resultSet, $fila);
        }
        return $resultSet;
    }

 public function getCrear($query){
    $this->db->query($query);
    return mysqli_error($this->db);
}

public function getById($id){
    $resultSet = array();
    $query = $this->db->query("SELECT * FROM $this->table WHERE id=$id");
    if($row = $query->fetch_object()) {
     $resultSet=$row;
 }
 return $resultSet;
}

public function getBy($column,$value){
    $resultSet = array();
    $query =  $this->db->query("SELECT * FROM $this->table WHERE $column='$value'");
    while($row = $query->fetch_assoc()) {
     $resultSet=$row;
 }
 return $resultSet;
}

public function deleteById($id){
    $query=$this->db->query("DELETE FROM $this->table WHERE id=$id");
    return $query;
}

public function deleteBy($column,$value){
    $query=$this->db->query("DELETE FROM $this->table WHERE $column='$value'");
    return $query;
}

}
?>