<?php
session_start();
if (empty($_SESSION['nombreUsuario']) && empty($_SESSION['estado'])) {
    header('location: inicio.php?error=Sesion finalizada');
} else {
?>
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
            <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
    body {
		font-family: 'Varela Round', sans-serif;
	}
	.modal-confirm {		
		color: #636363;
		width: 400px;
	}
	.modal-confirm .modal-content {
		padding: 20px;
		border-radius: 5px;
		border: none;
        text-align: center;
		font-size: 14px;
	}
	.modal-confirm .modal-header {
		border-bottom: none;   
        position: relative;
	}
	.modal-confirm h4 {
		text-align: center;
		font-size: 26px;
		margin: 30px 0 -10px;
	}
	.modal-confirm .close {
        position: absolute;
		top: -5px;
		right: -2px;
	}
	.modal-confirm .modal-body {
		color: #999;
	}
	.modal-confirm .modal-footer {
		border: none;
		text-align: center;		
		border-radius: 5px;
		font-size: 13px;
		padding: 10px 15px 25px;
	}
	.modal-confirm .modal-footer a {
		color: #999;
	}		
	.modal-confirm .icon-box {
		width: 80px;
		height: 80px;
		margin: 0 auto;
		border-radius: 50%;
		z-index: 9;
		text-align: center;
		border: 3px solid #f15e5e;
	}
	.modal-confirm .icon-box i {
		color: #f15e5e;
		font-size: 46px;
		display: inline-block;
		margin-top: 13px;
	}
    .modal-confirm .btn {
        color: #fff;
        border-radius: 4px;
		background: #60c7c1;
		text-decoration: none;
		transition: all 0.4s;
        line-height: normal;
		min-width: 120px;
        border: none;
		min-height: 40px;
		border-radius: 3px;
		margin: 0 5px;
		outline: none !important;
    }
	.modal-confirm .btn-info {
        background: #c1c1c1;
    }
    .modal-confirm .btn-info:hover, .modal-confirm .btn-info:focus {
        background: #a8a8a8;
    }
    .modal-confirm .btn-danger {
        background: #f15e5e;
    }
    .modal-confirm .btn-danger:hover, .modal-confirm .btn-danger:focus {
        background: #ee3535;
    }
	.trigger-btn {
		display: inline-block;
		margin: 100px auto;
	}
</style>
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
        echo "<td><a href='#myModal' class='btn btn-danger btn-sm' data-toggle='modal'>Borrar </a>
        <a class='btn btn-success btn-sm' href='vactualizar.php?id=$reg[Id]' > Actualizar </a>  </td>";

    echo "</tr>";

echo "</table>";
?>
<!-- Modal HTML -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header">
				<div class="icon-box">
					<i class="material-icons">&#xE5CD;</i>
				</div>				
				<h4 class="modal-title">¿Estás seguro?</h4>	
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<p>¿Realmente quieres borrar este registro?<br/> Este proceso no se puede deshacer.</p>
			</div>
			<div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button>
                <?php
                echo "<a href='borrarvariables.php?id=$reg[Id]&nombretabla=variables'><button type='button' class='btn btn-danger'>Borrar</button></a>";
}
                ?>
			</div>
		</div>
	</div>
</div> 
<?php
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
<?php
}
?>