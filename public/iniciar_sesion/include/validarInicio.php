<?php

    require_once("../../../api/classes/connection.php");

    $_POST = json_decode(file_get_contents("php://input"), true);

    $conexion = new Connection();

    $sql = "SELECT * FROM user WHERE document = $_POST";
    $query = mysqli_query($conexion->connection, $sql);
    $assoc = mysqli_fetch_assoc($query);
    $numero_filas = mysqli_num_rows($query);

    if($numero_filas > 0) {
        echo json_encode($assoc);
    } else {
        echo json_encode(0);
    }
?>