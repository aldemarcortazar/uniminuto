<?php

    require_once("../../../../api/classes/connection.php");

    if(isset($_POST['documento'])) {
        $conexion = new Connection();

        $documento = $_POST['documento'];

        $sql = "SELECT * FROM user, area, type_user, type_doc, entry_exit WHERE user.id_area = area.id_area AND user.id_type_user = type_user.id_type_user AND user.id_type_doc = type_doc.id_type_doc AND user.document = entry_exit.document  AND user.document = $documento";
        $query = mysqli_query($conexion->connection, $sql);

        while($row = mysqli_fetch_array($query)) {
            $json[] = array(
                'document' => $row['document'],
                'id_type_doc' => $row['id_type_doc'],
                'name' => $row['name'],
                'last_name' => $row['last_name'],
                'surname' => $row['surname'],
                'last_surname' => $row['last_surname'],
                'date_birth' => $row['date_birth'],
                'mobile' => $row['mobile'],
                'email' => $row['email'],
                'name_area' => $row['name_area'],
                'name_type_user' => $row['name_type_user'],
                'name_type_doc' => $row['name_type_doc'],
                'date_entry' => $row['date_entry'],
                'date_exit' => $row['date_exit']
            );
        }
    
        $jsonstring = json_encode($json);
        echo $jsonstring;

    }
?>