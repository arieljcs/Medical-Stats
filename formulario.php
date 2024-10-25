<?php
session_start();
if (isset($_POST['boton'])) {
    $botonPresionado = $_POST['boton'];
    if ($botonPresionado != Null) {

        $conexion = mysqli_connect("localhost", "root", "", "medical_stats") or
            die("Problemas con la conexión");

        $id = substr($botonPresionado, 5);

        $registros = mysqli_query($conexion, "select * from pacientes where id = $id;") or
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
                        <li><a href="salir.php" ><img src='CerrarSesion.png' alt='CerrarSesion' width='40' height='40'></a></li>
                    </ul>
                </nav>

                <main>
                    <h1>Formulario de Registro</h1>
                    <div class="form-container">
                        <form action="insertar.php" method="post">

                            <input type="hidden" id="id" name="id" <?php echo "value='" . $reg['id'] . "'"; ?>>

                          <!-- <label for="fecha">Fecha:</label>
                <input type="date" id="text" name="fecha"   required>
-->
               
    
                            <label for="fecha">Fecha:</label>
                            <input type="time" id="fecha" name="fecha" <?php echo "value='" . $reg['fecha'] . "'"; ?> required>
                            <label for="quirofano">Número quirófano:</label>
                            <input type="text" id="quirofano" name="numero_quirofano" <?php echo "value='" . $reg['numero_quirofano'] . "'"; ?> required>

                            <label for="edad">Edad</label>
                            <input type="text" id="edad" name="edad" <?php echo "value='" . $reg['edad'] . "'"; ?> required>

                            <label for="dni">DNI</label>
                            <input type="text" id="dni" name="dni" <?php echo "value='" . $reg['dni'] . "'"; ?> required>

                            <label for="Localidad">Localidad:</label>
                            <input type="text" id="Localidad" name="Localidad" <?php echo "value='" . $reg['Localidad'] . "'"; ?> required>

                            <label for="apellido_nombre">Apellido y Nombre:</label>
                            <input type="text" id="apellido_nombre" name="nombre" <?php echo "value='" . $reg['nombre'] . "'"; ?> required>

                            <label for="cirugia">Procedimiento:</label>
                            <input type="text" id="cirugia" name="procedimiento" <?php echo "value='" . $reg['procedimiento'] . "'"; ?> required>

                            <label for="cirujano">Cirujano:</label>
                            <input type="text" id="cirujano" name="cirujano" <?php echo "value='" . $reg['cirujano'] . "'"; ?> required>

                            <label for="ayudante1">1° Ayudante:</label>
                            <input type="text" id="ayudante1" name="ayudante1" <?php echo "value='" . $reg['1_Ayudante'] . "'"; ?>required>

                            <label for="ayudante2">2° Ayudante:</label>
                            <input type="text" id="ayudante2" name="ayudante2" <?php echo "value='" . $reg['2_Ayudante'] . "'"; ?> required>

                            <label for="anestesista">Anestesista:</label>
                            <input type="text" id="anestesista" name="anestesista" <?php echo "value='" . $reg['anestesista'] . "'"; ?> required>

                            <label for="tipo_anestesia">Tipo anestesia:</label>
                            <input type="text" id="tipo_anestesia" name="tipo_anestesia" <?php echo "value='" . $reg['tipo_anestesia'] . "'"; ?> required>

                            <label for="instrumentador">Instrumentador:</label>
                            <input type="text" id="instrumentador" name="instrumentador" <?php echo "value='" . $reg['instrumentador'] . "'"; ?> required>

                            <p class="Urgencia">
                            <input type="checkbox" id="urgencia" name="instrumentador" <?php echo "value='" . $reg['urgencia'] . "'"; ?> >Urgencia
                            </p>

                            <input type="submit" value="Guardar">
                        </form>
                    </div>
                </main>
    <?php
        }
    }
}else{
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
                    <h1>Formulario de Registro</h1>
                    <div class="form-container">
                        <form action="insertar.php" method="post">

                            <input type="hidden" id="id" name="id"  required>

                             <label for="fecha">Fecha:</label>
                            <input type="date" id="fecha" name="fecha" required>

                            <label for="quirofano">Número quirófano:</label>
                            <input type="text" id="quirofano" name="numero_quirofano" required>

                            <label for="edad">Edad</label>
                            <input type="text" id="edad" name="edad" required>

                            <label for="dni">DNI</label>
                            <input type="text" id="dni" name="dni" required>

                            <label for="Localidad">Localidad:</label>
                            <input type="text" id="Localidad" name="Localidad" required>

                            <label for="apellido_nombre">Apellido y Nombre:</label>
                            <input type="text" id="apellido_nombre" name="nombre"  required>

                            <label for="cirugia">Procedimiento:</label>
                            <input type="text" id="cirugia" name="procedimiento"  required>

                            <label for="cirujano">Cirujano:</label>
                            <input type="text" id="cirujano" name="cirujano"  required>

                            <label for="ayudante1">1° Ayudante:</label>
                            <input type="text" id="ayudante1" name="ayudante1"required>

                            <label for="ayudante2">2° Ayudante:</label>
                            <input type="text" id="ayudante2" name="ayudante2"  required>

                            <label for="anestesista">Anestesista:</label>
                            <input type="text" id="anestesista" name="anestesista"  required>

                            <label for="tipo_anestesia">Tipo anestesia:</label>
                            <input type="text" id="tipo_anestesia" name="tipo_anestesia"  required>

                            <label for="instrumentador">Instrumentador:</label>
                            <input type="text" id="instrumentador" name="instrumentador"  required>

                            <p class="Urgencia">
                            <input type="checkbox" id="urgencia" name="instrumentador" >Urgencia
                            </p>
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