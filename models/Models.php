<?php 

include('conexion.php');

 Class Model {

    protected $table;
    protected $sql;

    public function __construct($table){
        if (is_null(Conexion::$con)) {
            Conexion::conectar();
        }
        $this->table=$table;
    }

    public function buscar($columns,$conditions=NULL){
        if (is_null($conditions)) {
           $this->sql="SELECT $columns FROM $this->table";
        }else {
            trim($conditions);
            $this->sql="SELECT $columns FROM $this->table WHERE $conditions";
        }
        try {
            $qr=mysqli_query(Conexion::$con,$this->sql);
            if (!$qr) {
                throw new Exception("Ha ocurrido un error al realizar la consulta");            
            }else {
                $rows=mysqli_num_rows($qr);
                if ($rows>=1) {
                    while ($row=mysqli_fetch_assoc($qr)) {
                        $result[]=$row;
                       }
                    return $result;
                }else{
                    throw new Exception("No encontrado");    
                }
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function consulta_vista($table,$columns,$conditions=NULL){
        if (is_null($conditions)) {
        echo  $this->sql="SELECT $columns FROM $table";
        }else{
            trim($conditions);
             $this->sql="SELECT $columns FROM $table WHERE $conditions";
        }
       
        try {
           $qr=mysqli_query(Conexion::$con,$this->sql);
            if(!$qr){
                throw new Exception("Error"); 
            }else{
                if (mysqli_num_rows($qr)>0) {
                    while ($row=mysqli_fetch_array($qr)) {
                        $resultado[]=$row;
                       }
                return $resultado;
            }     
                }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function agregar($columns,$values){


        $this->sql="INSERT INTO $this->table ($columns) VALUES ($values)";

        try {
            $qr=mysqli_query(Conexion::$con,$this->sql);
            if (!$qr) {
                throw new Exception("Error al Hacer la Inserción de Datos");
                die;
            }else{
                return $qr;
            }
        } catch (\Exception $e) {
            echo "Error:".$e->getMessage();
        }

    }

    //Modificar
    public function modificar($columns,$condicion){
        echo $this->sql="UPDATE $this->table SET $columns WHERE $condicion";
        try{
            $qr=mysqli_query(Conexion::$con,$this->sql);
            if (!$qr) {
                throw new Exception("Error al Hacer la Modificación de Datos");
                die;
            }else{
                return true;
            }
        }catch (\Exception $e) {
            echo "Error:".$e->getMessage();
        }
    }
}


?>