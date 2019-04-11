<?php
/*Eliminar datos*/
    /*Eliminar variables meteorologicas*/
    $idvariable = trim(htmlspecialchars($_REQUEST["idvariable"], ENT_QUOTES, "UTF-8"));

    $conexionv = mysqli_connect("localhost", "root", "", "cursophp")
        or die("Problemas en la conexion");
        
    $registrosv = mysqli_query($conexionv, "SELECT * FROM variables WHERE Id='$idvariable'")
        or die("Problemas en la consulta ".mysqli_error($conexionv));
    
    if ($regv = mysqli_fetch_array($registrosv)) {
        mysqli_query($conexionv, "DELETE FROM variables WHERE Id='$idvariable'")
            or die("Problemas en la consulta ".mysqli_error($conexionv));
            print "<h3>Variable meteorologica borrada.</h3>";
    } else {
        header("Location: inicio.php?error='Id no encontrado'");
    }
    
    /*Eliminar sensores*/
    $idsensor = trim(htmlspecialchars($_REQUEST["idsensor"], ENT_QUOTES, "UTF-8"));
    
    $conexions = mysqli_connect("localhost", "root", "", "cursophp")
        or die("Problemas en la conexion");
            
    $registross = mysqli_query($conexions, "SELECT * FROM sensores WHERE Id='$idsensor'")
        or die("Problemas en la consulta ".mysqli_error($conexions));
        
    if ($regs = mysqli_fetch_array($registross)) {
        mysqli_query($conexions, "DELETE FROM sensores WHERE Id='$idsensor'")
            or die("Problemas en la consulta ".mysqli_error($conexions));
            print "<h3>Variable meteorologica borrada.</h3>";
    } else {
        header("Location: inicio.php?error='Id no encontrado'");
    }
    /*Eliminar estaciones*/
    $idestacion = trim(htmlspecialchars($_REQUEST["idestacion"], ENT_QUOTES, "UTF-8"));
    
    $conexione = mysqli_connect("localhost", "root", "", "cursophp")
        or die("Problemas en la conexion");
            
    $registrose = mysqli_query($conexione, "SELECT * FROM variables WHERE Id='$idestacion'")
        or die("Problemas en la consulta ".mysqli_error($conexione));
        
    if ($rege = mysqli_fetch_array($registrose)) {
        mysqli_query($conexione, "DELETE FROM estaciones WHERE Id='$idestacion'")
            or die("Problemas en la consulta ".mysqli_error($conexione));
            print "<h3>Variable meteorologica borrada.</h3>";
    } else {
        header("Location: inicio.php?error='Id no encontrado'");
    }
?>