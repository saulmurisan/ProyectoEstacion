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
        <title>Insertar</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet"
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
            crossorigin="anonymous">
    </head>
    <body style="background-color: #232327; color: white">
        <div class="container">
            <h2>Insertar nueva estación</h2>
            <form action="insertarvariable.php" method="post">
            <input type="hidden" name="paginaAdmin" id="paginaAdmin" value="2">
                <div class="form-group">
                    <label for="MarcaE">Marca</label>
                    <input type="text" class="form-control" name="MarcaE" id="MarcaE" required>
                </div>
                <div class="form-group">
                    <label for="ModeloE">Modelo</label>
                    <input type="text" class="form-control" name="ModeloE" id="ModeloE" required>
                </div>
                <div class="form-group">
                    <label for="IpE">IP</label>
                    <input type="text" class="form-control" name="IpE" id="IpE" required>
                </div>
                <div class="form-group">
                    <label for="TipoE">Tipo de Conexión</label>
                    <input type="text" class="form-control" name="TipoE" id="TipoE" required>
                </div>
                <div class="form-group">
                    <label for="UbiE">Ubicación</label>
                    <input type="text" class="form-control" name="UbiE" id="UbiE" required>
                </div>
                <p>
                    <br/>
                    <input type="submit" class="btn btn-primary btn-block" value="Insertar estación">
                </p>
                <p>
                <?php
                if (isset($_REQUEST["error"])) {
                    print "<p style='color: red'> $_REQUEST[error] </p>";
                }
				?>
                </p>
            </form>
        </div>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
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