<?php

class Bd{

    private $conexion;

    public function conection()
    {
        
        define('HOST','localhost');
        define('USER','root');
        define('PASS','');
        define('BD','fac');

        try {
            $this->conexion =new mysqli(HOST,USER,PASS,BD);
            $this->conexion->set_charset("utf8");

            if(!$this->conexion){
                throw new Exception("error de conexion");
                die();
            }else{
                echo "ok";
            }
            return $this->conexion;
        } catch (\Exception $e) {
            echo "Error: ". $e->getMessage();
        }
        
        

    }

    // public static function desconectar(){
    //     self::$conexion->clouse();
    // }
}
// $bd=new Bd;
// $bd->conection();
