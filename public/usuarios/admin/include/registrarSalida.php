<?php

    require_once("../../../../api/classes/connection.php");

    $_POST = json_decode(file_get_contents("php://input"), true);

    $conexion = new Connection();

    $sql = "SELECT MAX(id_entry_exit) FROM entry_exit WHERE document = $_POST";
    $query = mysqli_query($conexion->connection, $sql);
    $assoc_id_entry_exit = mysqli_fetch_assoc($query);

    $id_entry_exit = $assoc_id_entry_exit['MAX(id_entry_exit)'];


    if($id_entry_exit > 0) {

        $sql = "UPDATE entry_exit SET date_exit = NOW() WHERE entry_exit.id_entry_exit = $id_entry_exit";
        $query = mysqli_query($conexion->connection, $sql);
            
        if($query) {
            echo json_encode("Se ha registrado correctamente la salida");
        } else {
            echo json_encode(0);
        }

    } else {
        echo json_encode(0);
    }
?>