<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Administración</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body style="background-color: #232327; color: white">
    <?php
    $usuario = trim(htmlspecialchars($_REQUEST["usuario"], ENT_QUOTES, "UTF-8"));
    $contraseña = trim(htmlspecialchars($_REQUEST["contraseña"], ENT_QUOTES, "UTF-8"));

    if (($usuario != 'Admin') && ($contraseña != 'Admin2018/19')) {
        header('location: inicio.php?error=Usuario o Contraseña Incorrecta');
    } else {
        echo "hola";
    }
    
    ?>
</body>
</html>