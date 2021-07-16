<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <link rel="stylesheet" href="../../iniciar_sesion/css/index.css">
    <link rel="shortcut icon" href="../../../img/logoniminuto.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;500&display=swap" rel="stylesheet">

</head>
<body>
    <nav id="menu-navegacion">
        <div>
            <a  style="text-decoration:none;" href="../../../index.php"><i class="fas fa-sign-out-alt"></i><br>Salir</a>
            
        </div>
        <div class="logo">
                <img src="../../../img/logopagina.png" alt="">
        </div>
    </nav>

    <main class="container">
        <h2>Bienvenido, administrador</h2>

        <div id="reader"></div>

        <div id="container">
            <table>
                <thead>
                    <tr>
                        <th>Documento</th>
                        <th>Tipo de Documento</th>
                        <th>Primer Nombre</th>
                        <th>Segundo Nombre</th>
                        <th>Primer Apellido</th>
                        <th>Segundo Apellido</th>
                        <th>Fecha de nacimiento</th>
                        <th>Celular</th>
                        <th>Email</th>
                        <th>Área</th>
                        <th>Tipo de Usuario</th>
                        <th>Fecha y hora de entrada</th>
                        <th>Fecha y hora de salida</th>
                    </tr>
                </thead>
                <tbody id="user_info">
                    
                </tbody>
            </table>
        </div>

    </main>

    <script src="../../iniciar_sesion/scripts/html5-qrcode.min.js"></script>
    <script src="../../../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="library/jquery-3.6.0.min.js"></script>
    <script src="scripts/admin.js"></script>
    <script src="scripts/scanner.js"></script>
    <script src="https://kit.fontawesome.com/7b875e4198.js" crossorigin="anonymous"></script>

</body>
</html>