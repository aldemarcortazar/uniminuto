<?php
require_once './../../api/classes/connection.php';

class User extends Connection{

    public function __construct()
    {
        parent::__construct();
    }

    public function addUser($doc , $idTipDoc, $name, $lastName, $surname, $lastSurname, $dateBirth, $mobile,$email, $idArea, $idTypeUser):bool
    {
        $sql = "INSERT INTO user(document, id_type_doc, name, last_name, surname, last_surname, date_birth, mobile, email, id_area, id_type_user )values(?,?,?,?,?,?,?,?,?,?,?)";
        $query = mysqli_prepare($this->connection, $sql);
        $ok = mysqli_stmt_bind_param($query, 'iisssssssii', $doc, $idTipDoc, $name, $lastName, $surname, $lastSurname, $dateBirth,$mobile, $email, $idArea, $idTypeUser);
        $ok = mysqli_stmt_execute($query);
        return ( $ok ) 
                  ? true
                  : false;
    }
}
