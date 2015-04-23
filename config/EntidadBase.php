<?php

class EntidadBase{

    private $table;
    private $db;
    private $conectar;

    public function __construct($table) {
        $this->table = (string) $table;
        require_once 'BaseDatos.php';
        $this->conectar = new BaseDatos();
        $this->db = $this->conectar->conexion();
    }

    public function getConetar(){
        return $this->conectar;
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