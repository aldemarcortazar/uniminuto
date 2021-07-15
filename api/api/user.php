<?php 

require_once './../classes/users.php';
header('Content-Type: application/json');
switch($_SERVER['REQUEST_METHOD']){
    case 'GET':
        break;
    case 'POST':
        $user = new User();
        $addUser = $user->addUser($_POST['doc'], $_POST['idTipDoc'], $_POST['name'], $_POST['lastName'], $_POST['surname'], $_POST['lastSurname'], $_POST['dateBirth'], $_POST['idArea'], $_POST['idTypeUser']);
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