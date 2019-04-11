<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Administración</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
 <!-- Bootstrap CSS -->
 <link rel="stylesheet"
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
            crossorigin="anonymous">
            <link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body style="background-color: #232327; color: white">

<div class="container" >

    <div style="position: relative; float: left; width: 200px"><h2>Administración</h2></div>

    <?php
    $usuario = trim(htmlspecialchars($_REQUEST["usuario"], ENT_QUOTES, "UTF-8"));
    $contraseña = trim(htmlspecialchars($_REQUEST["contraseña"], ENT_QUOTES, "UTF-8"));

    if (($usuario != 'Admin') && ($contraseña != 'Admin2018/19')) {
        header('location: inicio.php?error=Usuario o Contraseña Incorrecta');
    } else { 
    ?>

        <div style='position: relative; float: right; padding-top: 15px; width: 150px'>
        <a href='inicio.php' class='btn btn-primary btn-lg' style="width: 150px">Inicio</a>
        </div>
    <?php
    }
    ?>
    <div style="width: 300px ;margin: 0 auto">
        <div style='position: relative; float: left; clear: both; padding-top: 90px; width: 300px'><a href='variables.php' class='btn btn-primary btn-lg' style="width: 300px">Variables meteorológicas</a></div>
        <div style='position: relative; float: left; clear: both; padding-top: 50px; width: 300px'><a href='sensores.php' class='btn btn-primary btn-lg' style="width: 300px">Sensores</a></div>
        <div style='position: relative; float: left; clear: both; padding-top: 50px; width: 300px'><a href='estaciones.php' class='btn btn-primary btn-lg' style="width: 300px">Estaciones meteorológicas</a></div>
    </div>

</div>

    <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS a-->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
        <script
            src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
</body>
</html>