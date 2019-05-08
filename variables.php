<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Administración</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
 <!-- Bootstrap CSS -->
 <link rel="stylesheet"
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
            crossorigin="anonymous">
            <link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body style="background-color: #232327; color: white">

<div class="container" >


    <div style="position: relative; float: left; width: 200px"><h2>Variables</h2><br/></div>
    <div style='position: relative; float: right; padding-top: 15px; width: 150px'>
        <a href='administracion.php' class='btn btn-primary btn-lg' style="width: 150px">Volver</a>
        </div>

    <form action="formuvariable.php" method="post">
                <p>
                    <input type="submit" class="btn btn-primary btn-block" value="Insertar nueva variable">
                </p>
    </form>


    <?php
$conexion = mysqli_connect("localhost", "root", "", "estacion") or die("Problemas con la conexión");
$registros = mysqli_query($conexion, "SELECT Id, Nombre, Ud_Med
                                        FROM variables")
    or die("Problemas en la consulta:".mysqli_error($conexion));
     
echo "<table class='table table-dark' style='text-align:center'>";
echo "<tr ><th style='text-align:center'>Id</th><th style='text-align:center'>Nombre</th><th style='text-align:center'>Unidad medida</th><th style='text-align:center'>Acciones</th>";
while ($reg = mysqli_fetch_array($registros)) {
    echo "<tr>";
        echo "<td>" . $reg['Id'] . "</td>";
        echo "<td>" . $reg['Nombre'] . "</td>";
        echo "<td>" . $reg['Ud_Med'] . "</td>";
        echo "<td><a class='btn btn-danger btn-sm' href='borrarvariables.php?id=$reg[Id]&nombretabla=variables' > Borrar </a> 
        <a class='btn btn-success btn-sm' href='vactualizar.php?id=$reg[Id]' > Actualizar </a>  </td>";

    echo "</tr>";
}
echo "</table>";



mysqli_close($conexion);
?>


</div>

    <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS a-->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
        <script
            src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
</body>
</html>