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

/*Actualizar datos variables meteorologicas*/
    /*Campo nombre*/
$conexion = mysqli_connect("localhost", "root", "", "estacion") 
or die("Problemas de conexion");

$registros = mysqli_query($conexion, "SELECT id, nombre FROM variables")
or die("Problemas en el select".mysqli_error($conexion));

while ($reg = mysqli_fetch_array($registros)) {
echo "<option value='$reg[id]'>$reg[nombre]</option>";
}

    /*Actualizar datos*/
$identificador = trim(htmlspecialchars($_REQUEST["identificador"], ENT_QUOTES, "UTF-8"));
$nombre = trim(htmlspecialchars($_REQUEST["nombre"], ENT_QUOTES, "UTF-8"));
$curso = trim(htmlspecialchars($_REQUEST["curso"], ENT_QUOTES, "UTF-8"));

$conexion = mysqli_connect("localhost", "root", "", "cursophp")
    or die("Problemas de conexión");

$registros = mysqli_query($conexion, "UPDATE alumnos SET nombre='$nombre', codigocurso=$curso WHERE idAlumno=$identificador") 
    or die("Problemas de actualización ".mysqli_error($conexion));
/*Eliminar datos*/
?>