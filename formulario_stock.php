<?php
session_start();

if (isset($_POST['boton'])) {
    $botonPresionado = $_POST['boton'];
    if ($botonPresionado != Null) {

        $conexion = mysqli_connect("localhost", "root", "", "medical_stats") or
            die("Problemas con la conexión");

        $id = substr($botonPresionado, 5);


        $registros = mysqli_query($conexion, "select * from stock where id = $id;") or
            die("Problemas en el select:" . mysqli_error($conexion));

        while ($reg = mysqli_fetch_array($registros)) {
?>

            <!DOCTYPE html>
            <html lang="es">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Formulario de Registro</title>
                <link rel="stylesheet" href="styles.css">
            </head>

            <body>
                <nav>
                    <ul>
                        <li><a href="pagina.php">Inicio</a></li>
                        <li><a href="stock.php">Control de Stock</a></li>
                        <li> <a href="pagina.php"><img src="LogoB.png" alt="Logo" class="logo"></a></li>
                        <li><a href="estadistica.php">Estadística</a></li>
                        <li><a href="salir.php"><img src='CerrarSesion.png' alt='CerrarSesion' width='40' height='40'></a></li>
                    </ul>
                </nav>

                <main>
                    <h1>Formulario de Registro</h1>
                   
                    <div class="form-container">
                        <form action="insertar_stock.php" method="post">

                            <input type="hidden" id="id" name="id" <?php echo "value='" . $reg['id'] . "'"; ?>>

                            <label for="nombre">Nombre</label>
                            <input type="text" id="nombre" name="nombre"  <?php echo "value='" . $reg['nombre'] . "'"; ?> required>

                            <label for="cantidad">cantidad:</label>
                            <input type="text" id="cantidad" name="cantidad" <?php echo "value='" . $reg['cantidad'] . "'"; ?> required>

                            <label for="vencimiento">Vencimiento:</label>
                            <input type="date" id="vencimiento" name="vencimiento" <?php echo "value='" . $reg['vencimiento'] . "'"; ?> required>

                            <input type="submit" value="Guardar">
                        </form>
                    </div>
                </main>
        <?php
        }
    }
} else {
        ?>

        <!DOCTYPE html>
        <html lang="es">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Formulario de Registro</title>
            <link rel="stylesheet" href="styles.css">
        </head>

        <body>

            <nav>
                <ul>
                    <li><a href="pagina.php">Inicio</a></li>
                    <li><a href="stock.php">Control de Stock</a></li>
                    <li> <a href="pagina.php"><img src="LogoB.png" alt="Logo" class="logo"></a></li>
                    <li><a href="estadistica.php">Estadística</a></li>
                    <li><a href="salir.php">Cerrar Sesión</a></li>
                </ul>
            </nav>

            <main>
                <h1>Formulario de Control de Stock</h1>
           
                <div class="form-container">
                    <form action="insertar_stock.php" method="POST">

                        <input type="hidden" id="id" name="id">

                        <label for="nombre">Nombre</label>
                        <input type="text" id="nombre" name="nombre" required>

                        <label for="cantidad">cantidad:</label>
                        <input type="text" id="cantidad" name="cantidad" required>

                        <label for="vencimiento">Vencimiento:</label>
                        <input type="date" id="vencimiento" name="vencimiento" required>


                        <input type="submit" value="Guardar">
                    </form>
                </div>
            </main>
        <?php
    }
        ?>
        <footer>
            <p>®️2024 Medical Stats. Todos los derechos reservados.</p>
        </footer>
        </body>

        </html>