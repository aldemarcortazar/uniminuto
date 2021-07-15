<?php
require_once './connection.php';

class User extends Connection{

    public function __construct()
    {
        
    }

    public function addUser($doc , $idTipDoc, $name, $lastName, $surname, $lastSurname, $dateBirth, $idArea, $idTypeUser):bool
    {
        $sql = "INSERT INTO user(document, id_type_doc, name, last_name, surname, last_surname, date_birth, id_area, id_type_user )values(?,?,?,?,?,?,?,?,?)";
        $query = mysqli_prepare($this->connection, $sql);
        $ok = mysqli_stmt_bind_param($query, 'iisssssii', $doc, $idTipDoc, $name, $lastName, $surname, $lastSurname, $dateBirth, $idArea, $idTypeUser);
        $ok = mysqli_stmt_execute($query);
        return ( $ok ) 
                  ? true
                  : false;
    }
}
