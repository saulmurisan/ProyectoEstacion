<?php
/*Conexion para Tipo Medida*/
$conexion = mysqli_connect("localhost", "root", "", "weather_station") 
or die("Problemas de conexion");

$registros = mysqli_query($conexion, "SELECT id, nombre FROM variables")
or die("Problemas en el select".mysqli_error($conexion));

while ($reg = mysqli_fetch_array($registros)) {
echo "<option value='$reg[id]'>$reg[nombre]</option>";
}

/*Consulta resultados*/ 
$conexion = mysqli_connect("localhost", "root", "", "weather_station") or die("Problemas con la conexión");
$registros = mysqli_query($conexion, "SELECT me.fecha_hora, va.nombre, me.valor, va.ud_med, se.modelo 
                                        FROM medidas as me INNER JOIN sensores as se on me.id_sensor = se.id
                                        INNER JOIN variables as va on me.id_variable = va.id")
    or die("Problemas en la consulta:".mysqli_error($conexion));
     
echo "<table class='table table-striped'>";
echo "<tr><th>Fecha</th><th>Tipo</th><th>Valor</th><th>Unidad</th><th>Sensor</th>";
while ($reg = mysqli_fetch_array($registros)) {
    echo "<tr>";
        echo "<td>" . $reg['me.fecha_hora'] . "</td>";
        echo "<td>" . $reg['va.nombre'] . "</td>";
        echo "<td>" . $reg['me.valor'] . "</td>";
        echo "<td>" . $reg['va.ud_med'] . "</td>";
        echo "<td>" . $reg['se.modelo'] . "</td>";
    echo "</tr>";
}
echo "</table>";
                
mysqli_close($conexion);

/*Insertar datos*/
$fecha = trim(htmlspecialchars($_REQUEST["fecha"], ENT_QUOTES, "UTF-8"));
$tipo = trim(htmlspecialchars($_REQUEST["tipo"], ENT_QUOTES, "UTF-8"));
$valor = trim(htmlspecialchars($_REQUEST["valor"], ENT_QUOTES, "UTF-8"));
$unidad = trim(htmlspecialchars($_REQUEST["unidad"], ENT_QUOTES, "UTF-8"));
$sensor = trim(htmlspecialchars($_REQUEST["sensor"], ENT_QUOTES, "UTF-8"));

$conexion = mysqli_connect("localhost", "root", "", "weather_station") 
    or die("Problemas de conexión");

mysqli_query($conexion, "INSERT INTO medidas (id_sensor, id_variable, fecha_hora, valor) 
                            VALUES ($sensor, $tipo, $fecha, $valor)") 
    or die("Problemas en el insert".mysqli_error($conexion));


/*Actualizar datos*/

/*Eliminar datos*/
?>