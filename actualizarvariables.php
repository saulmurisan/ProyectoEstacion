<?php
$id = trim(htmlspecialchars($_REQUEST["idVariable"], ENT_QUOTES, "UTF-8"));
$tipo = trim(htmlspecialchars($_REQUEST["tipo"], ENT_QUOTES, "UTF-8"));
$unidad = trim(htmlspecialchars($_REQUEST["unidad"], ENT_QUOTES, "UTF-8"));
    
$conexionv = mysqli_connect("localhost", "root", "", "estacion")
    or die("Problemas de conexión");
    
$registrosv = mysqli_query($conexionv, "UPDATE variables SET nombre='$tipo', Ud_med='$unidad' WHERE Id='$id'") 
    or die("Problemas de actualización ".mysqli_error($conexionv));
    
    header("Location: variables.php?");

mysqli_close($conexionv);
?>