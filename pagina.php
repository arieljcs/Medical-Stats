<?php
session_start();

// Verifica si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit();
}

$conexion = mysqli_connect("localhost", "root", "", "medical_stats") or die("Problemas con la conexión");

$registros = mysqli_query($conexion, "select * from pacientes order by id DESC LIMIT 5;") or die("Problemas en el select:" . mysqli_error($conexion));
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Stats</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <nav>
        <ul>
            <li><a href="pagina.php">Inicio</a></li>
            <li><a href="stock.php">Control de Stock</a></li>
            <li><a href="pagina.php"><img src="LogoB.png" alt="Logo" class="logo"></a></li>
            <li><a href="Estadistica.php">Estadística</a></li>
            <li><a href="salir.php"><img src='CerrarSesion.png' width='35' height='35' alt='CerrarSesion'></a></li>
        </ul>
    </nav>
    <main>
        <h1>Registro de Pacientes</h1>
        <div class="table-container">
        <table id="tablaDatos">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Fecha</th>
                    <th>Numero quirofano</th>
                    <th>Edad</th>
                    <th>DNI</th>
                    <th>Localidad</th>
                    <th>Apellido y Nombre</th>
                    <th>Cirugia</th>
                    <th>Cirujano</th>
                    <th>1° Ayudante</th>
                    <th>2° Ayudante</th>
                    <th>Anestesista</th>
                    <th>Instrumentador</th>
                    <th>Tipo anestesia</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <form action="formulario.php" method="POST">
                    <?php
                    while ($reg = mysqli_fetch_array($registros)) {
                        $botton_name = "name_" . $reg['id'];
                        echo "<tr>";
                        echo "<td>" . $reg['id'] . "</td>";
                        echo "<td>" . $reg['fecha'] . "</td>";
                        echo "<td>" . $reg['numero_quirofano'] . "</td>";
                        echo "<td>" . $reg['edad'] . "</td>";
                        echo "<td>" . $reg['dni'] . "</td>";
                        echo "<td>" . $reg['Localidad'] . "</td>";
                        echo "<td>" . $reg['nombre'] . "</td>";
                        echo "<td>" . $reg['procedimiento'] . "</td>";
                        echo "<td>" . $reg['cirujano'] . "</td>";
                        echo "<td>" . $reg['1_Ayudante'] . "</td>";
                        echo "<td>" . $reg['2_Ayudante'] . "</td>";
                        echo "<td>" . $reg['anestesista'] . "</td>";
                        echo "<td>" . $reg['instrumentador'] . "</td>";
                        echo "<td>" . $reg['tipo_anestesia'] . "</td>";
                        echo "<td><button class='btn-secondary' name='boton' value='$botton_name'><img src='edit.png' alt='Editar' width='40' height='35'></button></td>";
                        echo "</tr>";
                    }
                    ?>
                </form>
            </tbody>
        </table>
        </div>
        <script>
    function imprimirTabla() {
        var divToPrint = document.getElementById("tablaDatos");
        if (divToPrint) {
            var newWin = window.open("");
            newWin.document.write('<html><head><<title>Imprimir Tabla</title>');
            newWin.document.write('<style>');
            newWin.document.write('table { width: 100%; border-collapse: collapse; }');
            newWin.document.write('th, td { border: 1px solid black; padding: 8px; text-align: left; }');
            newWin.document.write('@media print { table tr td:last-child, table tr th:last-child { display: none; } }');
            newWin.document.write('</style></head><body>');
            newWin.document.write(divToPrint.outerHTML);
            newWin.document.write('</body></html>');
            newWin.document.close();
            newWin.print();
        } else {
            alert("No se encontró la tabla para imprimir.");
        }
    }
    </script>
        <div class="button-container">
        <button class="btn-primary" onclick="window.location.href='formulario.php'">Agregar</button>
        <button class="btn-primary" onclick="imprimirTabla()">Imprimir Tabla</button>
    </div>
    </main>
    <br>
    <br>
    <footer>
        <p>®️ 2024 Medical Stats. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
