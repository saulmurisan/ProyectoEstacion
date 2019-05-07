<?php

$pagina = trim(htmlspecialchars($_REQUEST["paginaAdmin"], ENT_QUOTES, "UTF-8"));

if ($pagina = 0) {
    $id = trim(htmlspecialchars($_REQUEST["idVariable"], ENT_QUOTES, "UTF-8"));
    $tipo = trim(htmlspecialchars($_REQUEST["tipo"], ENT_QUOTES, "UTF-8"));
    $unidad = trim(htmlspecialchars($_REQUEST["unidad"], ENT_QUOTES, "UTF-8"));
    
    $conexionv = mysqli_connect("localhost", "root", "", "estacion")
        or die("Problemas de conexión");
    
    $registrosv = mysqli_query($conexionv, "UPDATE variables SET nombre='$tipo', Ud_med='$unidad' WHERE Id='$id'") 
        or die("Problemas de actualización ".mysqli_error($conexionv));
    
        header("Location: variables.php?");

    mysqli_close($conexionv);
}
elseif ($pagina = 1) {
    $id = trim(htmlspecialchars($_REQUEST["idVariable"], ENT_QUOTES, "UTF-8"));
    $estacion = trim(htmlspecialchars($_REQUEST["EstacionS"], ENT_QUOTES, "UTF-8"));
    $nombre = trim(htmlspecialchars($_REQUEST["NombreS"], ENT_QUOTES, "UTF-8"));
    $modelo = trim(htmlspecialchars($_REQUEST["ModeloS"], ENT_QUOTES, "UTF-8"));
    
    $conexionv = mysqli_connect("localhost", "root", "", "estacion")
        or die("Problemas de conexión");
    
    $registrosv = mysqli_query($conexionv, "UPDATE sensores SET Id_Estacion='$estacion', Nombre='$nombre', Modelo='$modelo' WHERE Id='$id'") 
        or die("Problemas de actualización ".mysqli_error($conexionv));
    
        header("Location: variables.php?");

    mysqli_close($conexionv);
}
elseif ($pagina = 2) {
    $id = trim(htmlspecialchars($_REQUEST["idVariable"], ENT_QUOTES, "UTF-8"));
    $tipo = trim(htmlspecialchars($_REQUEST["tipo"], ENT_QUOTES, "UTF-8"));
    $unidad = trim(htmlspecialchars($_REQUEST["unidad"], ENT_QUOTES, "UTF-8"));
    
    $conexionv = mysqli_connect("localhost", "root", "", "estacion")
        or die("Problemas de conexión");
    
    $registrosv = mysqli_query($conexionv, "UPDATE variables SET nombre='$tipo', Ud_med='$unidad' WHERE Id='$id'") 
        or die("Problemas de actualización ".mysqli_error($conexionv));
    
        header("Location: variables.php?");

    mysqli_close($conexionv);
}
else {
    echo "Error en la actualización de archivos."
}

?>