<?php

    require_once("../../../api/classes/connection.php");

    $_POST = json_decode(file_get_contents("php://input"), true);

    $conexion = new Connection();

    $sql = "SELECT * FROM user WHERE document = $_POST";
    $query = mysqli_query($conexion->connection, $sql);
    $assoc = mysqli_fetch_assoc($query);
    $numero_filas = mysqli_num_rows($query);

    if($numero_filas > 0) {

        if($assoc['id_estado'] == 1) {
            $sql3 = "SELECT MAX(`id_entry_exit`) as id_entry_exit FROM entry_exit WHERE document = $_POST";
            $query3 = mysqli_query($conexion->connection, $sql3);
            $assoc_id_exit = mysqli_fetch_assoc($query3);

            $id_entry_exit = $assoc_id_exit['id_entry_exit'];

            $sql = "UPDATE entry_exit SET date_exit = NOW() WHERE entry_exit.id_entry_exit = $id_entry_exit";
            $query = mysqli_query($conexion->connection, $sql);

            $sql2 = "UPDATE user SET id_estado = '2' WHERE user.document = $_POST";
            $query2 = mysqli_query($conexion->connection, $sql2);

            if($query2) {
                echo json_encode("Ok2");
            } else {
                echo json_encode("Error");
            }

        } elseif($assoc['id_estado'] == 2){
            $sql = "INSERT INTO `entry_exit` (`id_entry_exit`, `document`, `date_entry`, `date_exit`) VALUES (NULL, '$_POST', NOW(), NULL)";
            $query = mysqli_query($conexion->connection, $sql);

            $sql2 = "UPDATE `user` SET `id_estado` = '1' WHERE `user`.`document` = $_POST";
            $query2 = mysqli_query($conexion->connection, $sql2);

            if($query2) {
                echo json_encode("Ok");
            } else {
                echo json_encode("Error");
            }
            

        }           

    } else {
        echo json_encode(0);
    }
?>