<?php
$id = trim(htmlspecialchars($_REQUEST["id"], ENT_QUOTES, "UTF-8"));

$conexionv = mysqli_connect("localhost", "root", "", "estacion")
    or die("Problemas en la conexion");
    
$registrosv = mysqli_query($conexionv, "SELECT * FROM variables WHERE Id=$id")
    or die("Problemas en la consulta ".mysqli_error($conexionv));

if ($regv = mysqli_fetch_array($registrosv)) {
    mysqli_query($conexionv, "DELETE FROM variables WHERE Id=$id")
        or die("Problemas en la consulta ".mysqli_error($conexionv));
        print "<h3>Variable meteorologica borrada.</h3>";
} else {
    header("Location: inicio.php?error='Id no encontrado'");
}
header("Location: variables.php?");

?>