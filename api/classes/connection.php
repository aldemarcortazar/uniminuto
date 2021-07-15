<?php

class Connection {

    public $connection;

    public function __construct()
    {
        return $this->connection = $this->connect("localhost", "root", "", "uniminuto");
    }

    private function connect($server, $user, $password, $bd )
    {
        try{
            $connection = new mysqli($server, $user, $password, $bd);
            if($connection ->connect_errno){
                die("fallo la conexion a la base de datos" . mysqli_connect_errno());
            }

            return $connection;
        } catch( Throwable $ex ){
            echo $ex;
        }
    }
}