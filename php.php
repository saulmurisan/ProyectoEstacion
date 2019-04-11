<?php
/*Conexion para Tipo Medida*/
$conexion = mysqli_connect("localhost", "root", "", "estacion") 
or die("Problemas de conexion");

$registros = mysqli_query($conexion, "SELECT id, nombre FROM variables")
or die("Problemas en el select".mysqli_error($conexion));

while ($reg = mysqli_fetch_array($registros)) {
echo "<option value='$reg[id]'>$reg[nombre]</option>";
}

/*Consulta resultados*/ 
$conexion = mysqli_connect("localhost", "root", "", "estacion") or die("Problemas con la conexión");
$registros = mysqli_query($conexion, "SELECT me.Fecha_Hora, va.Nombre, me.Valor, va.Ud_Med, se.Modelo 
                                        FROM medidas as me INNER JOIN sensores as se on me.Sensores_Id = se.Id
                                        INNER JOIN variables as va on me.Variables_Id = va.Id")
    or die("Problemas en la consulta:".mysqli_error($conexion));
     
echo "<table class='table table-striped'>";
echo "<tr><th>Fecha</th><th>Tipo</th><th>Valor</th><th>Unidad</th><th>Sensor</th>";
while ($reg = mysqli_fetch_array($registros)) {
    echo "<tr>";
        echo "<td>" . $reg['me.Fecha_Hora'] . "</td>";
        echo "<td>" . $reg['va.Nombre'] . "</td>";
        echo "<td>" . $reg['me.Valor'] . "</td>";
        echo "<td>" . $reg['va.Ud_Med'] . "</td>";
        echo "<td>" . $reg['se.Modelo'] . "</td>";
    echo "</tr>";
}
echo "</table>";
                
mysqli_close($conexion);

/*Consulta datos*/
$fechades = trim(htmlspecialchars($_REQUEST["fechades"], ENT_QUOTES, "UTF-8"));
$fechahas = trim(htmlspecialchars($_REQUEST["fechahas"], ENT_QUOTES, "UTF-8"));
$tipomedida = trim(htmlspecialchars($_REQUEST["tipomedida"], ENT_QUOTES, "UTF-8"));
$valormedida = trim(htmlspecialchars($_REQUEST["valormedida"], ENT_QUOTES, "UTF-8"));

$conexion = mysqli_connect("localhost", "root", "", "estacion") 
    or die("Problemas de conexion");
    
$registros = mysqli_query($conexion, "SELECT Id, Nombre, ud_med FROM variables")
    or die("Problemas en el select".mysqli_error($conexion));



/*Conexion para insertar variables metereologicas*/
$tipo = trim(htmlspecialchars($_REQUEST["tipo"], ENT_QUOTES, "UTF-8"));
$unidad = trim(htmlspecialchars($_REQUEST["unidad"], ENT_QUOTES, "UTF-8"));

$conexion = mysqli_connect("localhost", "root", "", "estacion") 
    or die("Problemas de conexion");
    
$registros = mysqli_query($conexion, "SELECT Id, Nombre, ud_med FROM variables")
    or die("Problemas en el select".mysqli_error($conexion));
$reg = mysqli_fetch_array($registros);
$uni = $reg['ud_med'];
if ($unidad == $uni) {
    echo "La unidad $uni ya está insertada en la base de datos";
} else {
    mysqli_query($conexion, "INSERT INTO variables (nombre, ud_med) 
    VALUES ($tipo, $unidad)") 
        or die("Problemas en el insert".mysqli_error($conexion));
}

/*Conexion para insertar sensores*/
/*Campo id_estacion*/
$conexion = mysqli_connect("localhost", "root", "", "estacion") 
or die("Problemas de conexion");

$registros = mysqli_query($conexion, "SELECT id, modelo FROM estaciones")
or die("Problemas en el select".mysqli_error($conexion));

while ($reg = mysqli_fetch_array($registros)) {
echo "<option value='$reg[id]'>$reg[modelo]</option>";
}

/*Insertar datos*/
$modelosensor = trim(htmlspecialchars($_REQUEST["modelosensor"], ENT_QUOTES, "UTF-8"));
$desc = trim(htmlspecialchars($_REQUEST["desc"], ENT_QUOTES, "UTF-8"));
$idestacion = trim(htmlspecialchars($_REQUEST["idestacion"], ENT_QUOTES, "UTF-8"));

$conexion = mysqli_connect("localhost", "root", "", "estacion") 
or die("Problemas de conexion");

$registros = mysqli_query($conexion, "SELECT id, modelo, desc, id_estacion FROM sensores")
or die("Problemas en el select".mysqli_error($conexion));

mysqli_query($conexion, "INSERT INTO sensores (modelo, desc, id_estacion) 
VALUES ($modelo, $desc, $idestacion)") 
    or die("Problemas en el insert".mysqli_error($conexion));

/*Conexion para insertar estaciones*/
$marca = trim(htmlspecialchars($_REQUEST["marca"], ENT_QUOTES, "UTF-8"));
$modeloesta = trim(htmlspecialchars($_REQUEST["modeloesta"], ENT_QUOTES, "UTF-8"));
$ip = trim(htmlspecialchars($_REQUEST["ip"], ENT_QUOTES, "UTF-8"));
$tipo_conex = trim(htmlspecialchars($_REQUEST["tipo_conex"], ENT_QUOTES, "UTF-8"));
$ubi = trim(htmlspecialchars($_REQUEST["ubi"], ENT_QUOTES, "UTF-8"));

$conexion = mysqli_connect("localhost", "root", "", "estacion") 
    or die("Problemas de conexión");

mysqli_query($conexion, "INSERT INTO estaciones (id, marca, modelo, ip, tipo_conex, ubi) 
                            VALUES ($marca, $modeloesta, $ip, $tipo_conex, $ubi)") 
    or die("Problemas en el insert".mysqli_error($conexion));

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
    
    if ($rege = mysqli_fetch_array($registross)) {
        mysqli_query($conexione, "DELETE FROM estaciones WHERE Id='$idestacion'")
            or die("Problemas en la consulta ".mysqli_error($conexione));
            print "<h3>Variable meteorologica borrada.</h3>";
    } else {
        header("Location: inicio.php?error='Id no encontrado'");
    }
?>