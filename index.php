<?php
require_once './api/classes/connection.php';

$conexion = new Connection();

//tipo de documento
$tipDocu= "SELECT * FROM type_doc";
$query = mysqli_query($conexion->connection,$tipDocu);

//tipo de usuario
$tipUser= "SELECT * FROM type_user";
$query2 = mysqli_query($conexion->connection,$tipUser);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <nav>

    </nav>
    <div class="formRegistro">
        <h1>Formulario de Registro</h1>
        <form action="" method="">
            <div>
                <label for="tipDocu">Tipo de Documento: </label>
                <select name="tipDocu" id="tipDocu" >
                    <option value="0"></option>
                    <?php foreach ($query as $tipDocu): ?>
                    <option value="<?php echo $tipDocu['id_type_doc'] ?> "><?php echo $tipDocu['name_type_doc'] ?></option>
                    <?php endforeach;?>
                </select>
            </div>

            <div>
                <label for="numDocu">Número de Documento: </label>
                <input type="number" name="numDocu" id="numDocu" required>
            </div>

            <div>
                <label for="tipUser">Tipo de Usuario: </label>
                <select name="tipUser" id="tipUser" >
                    <option value="0"></option>
                    <?php foreach ($query2 as $tipUser): ?>
                    <option value="<?php echo $tipUser['id_type_user'] ?> "><?php echo $tipUser['name_type_user'] ?></option>
                    <?php endforeach;?>
                </select>
            </div>

            <div>
                <label for="nombre">Primer Nombre: </label>
                <input type="text" name="nombre" id="nombre" required>
            </div>

            <div>
                <label for="lastName">Segundo Nombre: </label>
                <input type="text" name="lastName" id="lastName" required>
            </div>

            <div>
                <label for="surmane">Primer Apellido: </label>
                <input type="text" name="surmane" id="surmane" required>
            </div>

            <div>
                <label for="lastSurmane">Segundo Apellido: </label>
                <input type="text" name="lastSurmane" id="lastSurmane" required>
            </div>
            
            <div class="celular">
                <label for="celular">Celular: </label>
                <input type="number" name="celular" id="celular" required>
            </div>

            <div>
                <label for="email">Correo Electronico: </label>
                <input type="email" name="email" id="email" required>
            </div>

            <div>
                <input name="photo" id="photo" type="file" required>
            </div>

            <div>
                <input type="button" value="Enviar">
            </div>

        </form>
    </div>
   
</body>
</html>