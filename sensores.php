<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sensores</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<?php
$conexion = mysqli_connect("localhost", "root", "", "estacion") or die("Problemas con la conexión");
$registros = mysqli_query($conexion, "SELECT Id, Id_estacion, Modelo, Nombre
                                        FROM sensores")
    or die("Problemas en la consulta:".mysqli_error($conexion));
     
echo "<table class='table table-striped'>";
echo "<tr><th>Id</th><th>Id_estacion</th><th>Modelo</th><th>Nombre</th><th>Acciones</th>";
while ($reg = mysqli_fetch_array($registros)) {
    echo "<tr>";
        echo "<td>" . $reg['Id'] . "</td>";
        echo "<td>" . $reg['Id_estacion'] . "</td>";
        echo "<td>" . $reg['Modelo'] . "</td>";
        echo "<td>" . $reg['Nombre'] . "</td>";
        echo "<td>".  ."</td>"
    echo "</tr>";
}
echo "</table>";
                
mysqli_close($conexion);
?>
</body>
</html>