<?php
$tipo = trim(htmlspecialchars($_REQUEST["tipo"], ENT_QUOTES, "UTF-8"));
$unidad = trim(htmlspecialchars($_REQUEST["unidad"], ENT_QUOTES, "UTF-8"));

$conexionv = mysqli_connect("localhost", "root", "", "estacion") 
    or die("Problemas de conexion");
    
$registrosv = mysqli_query($conexion, "SELECT Id, Nombre, Ud_Med FROM variables")
    or die("Problemas en el select".mysqli_error($conexionv));
$regv = mysqli_fetch_array($registrosv);
$uni = $reg['Ud_Med'];
if ($unidad == $uni) {
    echo "La unidad $uni ya está insertada en la base de datos";
} else {
    mysqli_query($conexionv, "INSERT INTO variables (Nombre, Ud_Med) 
    VALUES ('$tipo', '$unidad')") 
        or die("Problemas en el insert".mysqli_error($conexionv));
}
mysqli_close($conexionv);
?>