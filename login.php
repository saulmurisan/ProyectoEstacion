<?php
    session_unset();
    session_destroy();
    $usuario = trim(htmlspecialchars($_REQUEST["usuario"], ENT_QUOTES, "UTF-8"));
    $contrasena = trim(htmlspecialchars($_REQUEST["contraseña"], ENT_QUOTES, "UTF-8"));

    $conexion = mysqli_connect("localhost", "root", "", "estacion")
    or die("Problemas en la conexion");
    
    $consulta = "SELECT * FROM administradores WHERE Usuario='$usuario' AND Contrasena='$contrasena'";
    
    $registros = mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));
    $count = mysqli_num_rows($registros);
    if ($count != 1) {
        header('location: inicio.php?error=Usuario o Contraseña Incorrecta');
    } else {
        session_start();
        $_SESSION['nombreUsuario'] = $usuario; 
        $_SESSION['estado'] = 'Autenticado';
        header('location: administracion.php');
    }
    ?>