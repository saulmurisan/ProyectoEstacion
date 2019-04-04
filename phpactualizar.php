<?php
/*Actualizar datos variables meteorologicas*/
    /*Campo nombre*/
$conexionv = mysqli_connect("localhost", "root", "", "estacion") 
    or die("Problemas de conexion");
    
$registrosv = mysqli_query($conexionv, "SELECT Id, Nombre FROM variables")
    or die("Problemas en el select".mysqli_error($conexionv));
    
while ($regv = mysqli_fetch_array($registrosv)) {
    echo "<option value='$regv[Id]'>$regv[Nombre]</option>";
}
    
    /*Actualizar datos*/
$idvariable = trim(htmlspecialchars($_REQUEST["idvariable"], ENT_QUOTES, "UTF-8"));
$tipo = trim(htmlspecialchars($_REQUEST["tipo"], ENT_QUOTES, "UTF-8"));
$unidad = trim(htmlspecialchars($_REQUEST["unidad"], ENT_QUOTES, "UTF-8"));
    
$conexionv = mysqli_connect("localhost", "root", "", "cursophp")
    or die("Problemas de conexión");
    
$registrosv = mysqli_query($conexionv, "UPDATE variables SET nombre='$tipo', Ud_med='$unidad' WHERE idvariable=$idvariable") 
    or die("Problemas de actualización ".mysqli_error($conexionv));

mysqli_close($conexionv);

/*Actualizar datos sensores*/
    /*Campo modelo*/
$conexions = mysqli_connect("localhost", "root", "", "estacion") 
    or die("Problemas de conexion");
    
$registross = mysqli_query($conexions, "SELECT Id, Modelo, desc, Id_Estacion FROM sensores")
    or die("Problemas en el select".mysqli_error($conexions));
    
while ($regs = mysqli_fetch_array($registrosv)) {
    echo "<option value='$regs[Id]'>$regs[Modelo]</option>";
}

    /*Actualizar datos*/
$conexions = mysqli_connect("localhost", "root", "", "estacion") 
    or die("Problemas de conexion");
    
$registross = mysqli_query($conexions, "SELECT Id, Modelo FROM estaciones")
    or die("Problemas en el select".mysqli_error($conexions));
    
while ($regs = mysqli_fetch_array($registross)) {
    echo "<option value='$regs[Id]'>$regs[Modelo]</option>";
}

$idsensor = trim(htmlspecialchars($_REQUEST["idsensor"], ENT_QUOTES, "UTF-8"));
$modelosensor = trim(htmlspecialchars($_REQUEST["modelosensor"], ENT_QUOTES, "UTF-8"));
$nombresensor = trim(htmlspecialchars($_REQUEST["desc"], ENT_QUOTES, "UTF-8"));
$idestacion = trim(htmlspecialchars($_REQUEST["idestacion"], ENT_QUOTES, "UTF-8"));
        
$conexionv = mysqli_connect("localhost", "root", "", "cursophp")
    or die("Problemas de conexión");
        
$registrosv = mysqli_query($conexionv, "UPDATE sensores SET Id_Estacion='$idestacion' modelo='$modelosensor', Nombre='$nombresensor' WHERE id=$idvariable") 
    or die("Problemas de actualización ".mysqli_error($conexionv));

mysqli_close($conexions);

/*Actualizar datos estaciones*/
$marca = trim(htmlspecialchars($_REQUEST["marca"], ENT_QUOTES, "UTF-8"));
$modeloesta = trim(htmlspecialchars($_REQUEST["modeloesta"], ENT_QUOTES, "UTF-8"));
$ip = trim(htmlspecialchars($_REQUEST["ip"], ENT_QUOTES, "UTF-8"));
$tipo_conex = trim(htmlspecialchars($_REQUEST["tipo_conex"], ENT_QUOTES, "UTF-8"));
$ubi = trim(htmlspecialchars($_REQUEST["ubi"], ENT_QUOTES, "UTF-8"));

$conexione = mysqli_connect("localhost", "root", "", "estacion") 
    or die("Problemas de conexión");

$registrose = mysqli_query($conexione, "UPDATE estaciones SET marca='$marca', modelo='$modeloesta', ip='$ip', tipo_conex='$tipo_conex', ubi='$ubi' WHERE id=$idvariable")
    or die("Problemas en el insert".mysqli_error($conexione));

mysqli_close($conexione);
?>