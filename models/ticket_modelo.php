<?php

require 'conexion.php';

class Ticketmodelo extends Bd
{
    private $conexion;

    // public function __construct()
    // {
    //     $this->conexion= $this->conection();
    // }

    public function ticket($tabla, $columns)
    {
        $this->conexion = $this->conection();
        $sql = "SELECT $columns FROM $tabla";
        $question = mysqli_query($this->conexion, $sql);
        $row = [];

        while ($list = mysqli_fetch_assoc($question)) {
            $row[] = $list;
        }

        return $row;
    }
}
