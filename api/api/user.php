<?php 

require_once './../classes/users.php';
header('Content-Type: application/json');
switch($_SERVER['REQUEST_METHOD']){
    case 'GET':
        break;
    case 'POST':
        // $_POST = json_decode(file_get_contents('php://input'), true);
        $user = new User();
        $addUser = $user->addUser($_POST['numDocu'], $_POST['tipDocu'], $_POST['nombre'], $_POST['lastName'], $_POST['surmane'], $_POST['lastSurmane'], $_POST['fechan'], $_POST['celular'], $_POST['email'], $_POST['idArea'], $_POST['tipUser']);
        $res ;
        if( $addUser ){
            $res = array(
                'err' => false,
                'status' => http_response_code(200),
                'statusText' => 'Usuario agregado con exito'
            );
        }else{
            $res = array(
                'err' => true,
                'status' => http_response_code(500),
                'statusText' => 'no se puede agregar el usuario intente nuevamente'
            );
        }
        
        echo json_encode($res);
        break;
}