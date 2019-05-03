

<?php
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
?>