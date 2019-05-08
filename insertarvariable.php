<?php

$pagina = trim(htmlspecialchars($_REQUEST["paginaAdmin"], ENT_QUOTES, "UTF-8"));
echo "$pagina";
if ($pagina == 0) {
    $tipo = trim(htmlspecialchars($_REQUEST["tipo"], ENT_QUOTES, "UTF-8"));
    $unidad = trim(htmlspecialchars($_REQUEST["unidad"], ENT_QUOTES, "UTF-8"));
    
    $conexionv = mysqli_connect("localhost", "root", "", "estacion") 
        or die("Problemas de conexion");
        
    $registrosv = mysqli_query($conexionv, "SELECT * FROM variables WHERE Nombre = '$tipo' AND Ud_Med = '$unidad'")
        or die("Problemas en el select".mysqli_error($conexionv));
    
    if ($reg = mysqli_fetch_array($registrosv) ) {
        header('location: formuvariable.php?error=La unidad de medida ya está en la base de datos');
    } else {
        mysqli_query($conexionv, "INSERT INTO variables (Nombre, Ud_Med) 
        VALUES ('$tipo', '$unidad')") 
            or die("Problemas en el insert".mysqli_error($conexionv));
        header('location: variables.php');
    }
    mysqli_close($conexionv);
}
elseif ($pagina == 1) {
    $estacion = trim(htmlspecialchars($_REQUEST["EstacionS"], ENT_QUOTES, "UTF-8"));
    $nombre = trim(htmlspecialchars($_REQUEST["NombreS"], ENT_QUOTES, "UTF-8"));
    $modelo = trim(htmlspecialchars($_REQUEST["ModeloS"], ENT_QUOTES, "UTF-8"));
    
    $conexionv = mysqli_connect("localhost", "root", "", "estacion")
        or die("Problemas de conexión");
    
    $registrosv = mysqli_query($conexionv, "SELECT * FROM sensores WHERE Id_Estacion='$estacion' AND Nombre='$nombre' AND Modelo='$modelo'") 
        or die("Problemas en el select".mysqli_error($conexionv));
    
        if ($reg = mysqli_fetch_array($registrosv) ) {
            header('location: formusensor.php?error=La unidad de medida ya está en la base de datos');
        } else {
            mysqli_query($conexionv, "INSERT INTO sensores (Id_Estacion, Nombre, Modelo) 
            VALUES ('$estacion', '$nombre', '$modelo')") 
                or die("Problemas en el insert".mysqli_error($conexionv));
            header('location: sensores.php');
        }
    mysqli_close($conexionv);
}
elseif ($pagina == 2) {
    $marca = trim(htmlspecialchars($_REQUEST["MarcaE"], ENT_QUOTES, "UTF-8"));
    $modelo = trim(htmlspecialchars($_REQUEST["ModeloE"], ENT_QUOTES, "UTF-8"));
    $ip = trim(htmlspecialchars($_REQUEST["IpE"], ENT_QUOTES, "UTF-8"));
    $tconexion = trim(htmlspecialchars($_REQUEST["TipoE"], ENT_QUOTES, "UTF-8"));
    $ubicacion = trim(htmlspecialchars($_REQUEST["UbiE"], ENT_QUOTES, "UTF-8"));


    $conexionv = mysqli_connect("localhost", "root", "", "estacion")
        or die("Problemas de conexión");
    
    $registrosv = mysqli_query($conexionv, "SELECT * FROM estaciones WHERE Marca='$marca' AND Modelo='$modelo' AND IP='$ip' AND Tipo_Conex='$tconexion' AND Ubi='$ubicacion'") 
        or die("Problemas en el select".mysqli_error($conexionv));
    
        if ($reg = mysqli_fetch_array($registrosv) ) {
            header('location: formuestacion.php?error=La unidad de medida ya está en la base de datos');
        } else {
            mysqli_query($conexionv, "INSERT INTO estaciones (Marca, Modelo, IP, Tipo_Conex, Ubi) 
            VALUES ('$marca', '$modelo', '$ip', '$tconexion', '$ubicacion')") 
                or die("Problemas en el insert".mysqli_error($conexionv));
            header('location: estaciones.php');
        }
    mysqli_close($conexionv);
}
else {
    echo "Error en la sintaxis del código.";
}
?>