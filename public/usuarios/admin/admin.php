<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reportes</title>
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
        <h1>Reporte de Entradas y Salidas</h1>

            <table id="tabla">
                <thead>
                    <tr>
                        <th>Documento</th>
                        <th>Tipo de Documento</th>
                        <th>Nombre Completo</th>
                        <th>Fecha de nacimiento</th>
                        <th>Celular</th>
                        <th>Email</th>
                        <th>Área</th>
                        <th>Tipo de Usuario</th>
                        <th>Fecha y hora de entrada</th>
                        <th>Fecha y hora de salida</th>
                    </tr>
                </thead>

                <tbody class="containesr" id="user_info">
                    
                </tbody>
            </table>
            
        <div id="excel" class="btn btn-outline-success btnExcel" onclick="exportTableToExcel('tabla', 'REPORTE_DE_ENTREDAS_Y_SALIDAS_<?php echo date('d_m_Y');?>')" >
                Exportar Excel <i class="fas fa-file-excel"></i>
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