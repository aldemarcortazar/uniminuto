<?php

    require_once("../../../api/classes/connection.php");

    $_POST = json_decode(file_get_contents("php://input"), true);

    $conexion = new Connection();

    $sql = "SELECT * FROM user WHERE document = $_POST";
    $query = mysqli_query($conexion->connection, $sql);
    $numero_filas = mysqli_num_rows($query);

    if($numero_filas > 0) {

        $sql = "INSERT INTO `entry_exit` (`id_entry_exit`, `document`, `date_entry`, `date_exit`) VALUES (NULL, '$_POST', NOW(), NULL)";
        $query = mysqli_query($conexion->connection, $sql);

        $sql = "SELECT * FROM user WHERE user.document = $_POST";
        $query = mysqli_query($conexion->connection, $sql);
        
        $assoc = mysqli_fetch_assoc($query);
            
        echo json_encode($assoc);

    } else {
        echo json_encode(0);
    }
?>