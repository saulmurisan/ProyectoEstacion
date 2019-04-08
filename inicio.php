<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Visualizacion</title>
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
<style type="text/css">
    body {
		font-family: 'Varela Round', sans-serif;
	}
	.modal-login {
		width: 350px;
	}
	.modal-login .modal-content {
		padding: 20px;
		border-radius: 1px;
		border: none;
	}
	.modal-login .modal-header {
		border-bottom: none;
        position: relative;
		justify-content: center;
	}
	.modal-login h4 {
		text-align: center;
		font-size: 26px;
	}
	.modal-login .form-control, .modal-login .btn {
		min-height: 40px;
		border-radius: 1px; 
	}
	.modal-login .hint-text {
		text-align: center;
		padding-top: 10px;
	}
	.modal-login .close {
        position: absolute;
		top: -5px;
		right: -5px;
	}
	.modal-login .btn {
		background: #3498db;
		border: none;
		line-height: normal;
	}
	.modal-login .btn:hover, .modal-login .btn:focus {
		background: #248bd0;
	}
	.modal-login .hint-text a {
		color: #999;
	}
	.trigger-btn {
		display: inline-block;
		margin: 100px auto;
	}
</style>
</head>
<body style="background-color: #232327; color: white">
<!-- Modal HTML -->

<div id="myModal" class="modal fade" style="color: black">
	<div class="modal-dialog modal-login">
		<div class="modal-content">
			<div class="modal-header">				
				<h4 class="modal-title">Administrador</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<form action="administracion.php" method="post">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Usuario" id="usuario" name="usuario" required="required">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" placeholder="Contraseña" id="contraseña" name="contraseña" required="required">
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-primary btn-block btn-lg" value="Login" >
					</div>
				</form>				

			</div>
		</div>
	</div>
</div> 


<div class="container" >
            <div style="position: relative; float: left; width: 350px"><h2>Estación Meteorológica</h2></div>
			<div style="position: relative; float: right; padding-top: 15px; width: 150px"><a href="#myModal" class="btn btn-primary btn-lg" data-toggle="modal">Administrador</a>           
			 	<?php
                if (isset($_REQUEST["error"])) {
                    print "<p style='color: red'> $_REQUEST[error] </p>";
                }
				?>
			</div>
			
			<div style="position: relative; clear: both">

            <form action="visualizacion.php" method="post">
                <div class="form-group">
                    <label for="fechades" >Fecha desde: </label>
                    <input type="date" class="form-control" name="fecdes" id="fecdes" required>
                </div>
                <div class="form-group">
                    <label for="fechahas">Fecha hasta: </label>
                    <input type="date" class="form-control" name="fechahas" id="fechahas" required>
                </div>
                <div class="form-group">
                    <label for="medida">Tipo Medida: </label>
                    <select name="medida" class="form-control" >
			</div>
		<?php
		$conexion = mysqli_connect("localhost", "root", "", "estacion") 
or die("Problemas de conexion");

$registros = mysqli_query($conexion, "SELECT Id, Nombre FROM variables")
or die("Problemas en el select".mysqli_error($conexion));

while ($reg = mysqli_fetch_array($registros)) {
echo "<option value='$reg[id]'>$reg[nombre]</option>";
}
	?>
      </select>
                </div>
                <div class="form-group">
                    <label for="valormed">Valor Medida: </label>
                    <input type="number" class="form-control" name="valormed" id="valormed">
                </div>
                <p>
                    <input type="submit" class="btn btn-primary btn-block" value="Buscar">
                </p>
            </form>

<?php
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
?>

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