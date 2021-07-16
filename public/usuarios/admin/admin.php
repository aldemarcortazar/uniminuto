<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
    <header class="header"></header>
    <main class="container">
        <h2>Bienvenido, administrador</h2>

        <div id="reader"></div>

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
    </main>

    <script src="../../iniciar_sesion/scripts/html5-qrcode.min.js"></script>
    <script src="library/jquery-3.6.0.min.js"></script>
    <script src="scripts/admin.js"></script>
    <script src="scripts/scanner.js"></script>
</body>
</html>