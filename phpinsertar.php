<?php
/*Conexion para insertar variables metereologicas*/
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
    VALUES ($tipo, $unidad)") 
        or die("Problemas en el insert".mysqli_error($conexionv));
}
mysqli_close($conexionv);

/*Conexion para insertar sensores*/
/*Campo id_estacion*/
$conexions = mysqli_connect("localhost", "root", "", "estacion") 
or die("Problemas de conexion");

$registross = mysqli_query($conexions, "SELECT Id, Modelo FROM estaciones")
or die("Problemas en el select".mysqli_error($conexions));

while ($regs = mysqli_fetch_array($registross)) {
echo "<option value='$regs[Id]'>$regs[Modelo]</option>";
}

/*Insertar datos*/
$modelosensor = trim(htmlspecialchars($_REQUEST["modelosensor"], ENT_QUOTES, "UTF-8"));
$nombresensor = trim(htmlspecialchars($_REQUEST["nombresensor"], ENT_QUOTES, "UTF-8"));
$idestacion = trim(htmlspecialchars($_REQUEST["idestacion"], ENT_QUOTES, "UTF-8"));

$conexions = mysqli_connect("localhost", "root", "", "estacion") 
or die("Problemas de conexion");

$registross = mysqli_query($conexions, "SELECT Id, Id_Estacion, Modelo, Nombre FROM sensores")
or die("Problemas en el select".mysqli_error($conexions));

mysqli_query($conexions, "INSERT INTO sensores (Id_Estacion, Modelo, Nombre) 
VALUES ($idestacion, $modelosensor, $nombresensor)") 
    or die("Problemas en el insert".mysqli_error($conexions));

mysqli_close($conexions);

/*Conexion para insertar estaciones*/
$marca = trim(htmlspecialchars($_REQUEST["marca"], ENT_QUOTES, "UTF-8"));
$modeloesta = trim(htmlspecialchars($_REQUEST["modeloesta"], ENT_QUOTES, "UTF-8"));
$ip = trim(htmlspecialchars($_REQUEST["ip"], ENT_QUOTES, "UTF-8"));
$tipo_conex = trim(htmlspecialchars($_REQUEST["tipo_conex"], ENT_QUOTES, "UTF-8"));
$ubi = trim(htmlspecialchars($_REQUEST["ubi"], ENT_QUOTES, "UTF-8"));

$conexione = mysqli_connect("localhost", "root", "", "estacion") 
    or die("Problemas de conexión");

mysqli_query($conexione, "INSERT INTO estaciones (Id, Marca, Modelo, IP, Tipo_Conex, Ubi) 
                            VALUES ($marca, $modeloesta, $ip, $tipo_conex, $ubi)") 
    or die("Problemas en el insert".mysqli_error($conexione));

mysqli_close($conexione);
?>