<?php
//Inicia sesión de usuario
session_start();
//Inicio la conexión
$conexion = mysqli_connect("localhost", "root", "", "medical_stats") or
    die("Problemas con la conexión");
//Verifico que haya ingresado el usuario y contraseña
if (isset($_POST['username']) && isset($_POST['password'])) {

    $user = $_POST['username'];
    $pass = $_POST['password'];
    //Si no lo ingresó
    if (empty($user) || empty($pass)) {
        //Devuelvo error
        $_SESSION['error'] = "Usuario o contraseña no pueden estar vacíos.";
        header("Location: login.php");
        exit();
    } else { //Si lo ingresó
        //Obtengo la información del usuario
        $registros = mysqli_query($conexion, "select * from usuarios where usuario = '$user'") or
            die("Error de conexion" . mysqli_error($conexion));
        //Obtengo el registro
        if ($reg = mysqli_fetch_array($registros)) {
            if ($pass == $reg['contrasena']) { //Si la contraseña ingresada es igual a la de la BD
                $_SESSION['usuario'] = $user;
            } else { //Si la contraseña es incorrecta
                $_SESSION['error'] = "Usuario o contraseña incorrecto"; //Devuelvo error
                header("Location: login.php"); //Redirijo la pagina al Login
                exit();
            }
        } else { //Si el usuario no existe
            $_SESSION['error'] = "Usuario no encontrado."; //Devuelvo error
            header("Location: login.php");
            exit();
        }
    }
}

$fecha_inicio = isset($_POST['fecha_inicio']) ? $_POST['fecha_inicio'] : '2000-01-01';
$fecha_fin = isset($_POST['fecha_fin']) ? $_POST['fecha_fin'] : date('Y-m-d');

// Realizar la consulta para obtener los procedimientos y su cantidad
$sql = "SELECT procedimiento, COUNT(*) as cantidad FROM pacientes WHERE fecha BETWEEN '$fecha_inicio' AND '$fecha_fin' GROUP BY procedimiento";
$result = mysqli_query($conexion, $sql) or die("Problemas en el select:" . mysqli_error($conexion));

$data = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} else {
    echo "0 resultados";
}
mysqli_close($conexion);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Estadística</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <nav>
        <ul>
            <li><a href="pagina.php">Inicio</a></li>
            <li><a href="stock.php">Control de Stock</a></li>
            <li> <a href="pagina.php"><img src="LogoB.png" alt="Logo" class="logo"></a></li>
            <li><a href="estadistica.php">Estadística</a></li>
            <li><a href="salir.php" ><img  src='CerrarSesion.png'  width='35' height='35' alt='CerrarSesion' ></a></li>
        </ul>
    </nav>
    <div class="estadistica">
    <form method="post" action="">
        <label for="fecha_inicio">Fecha Inicio:</label>
        <input type="date" id="fecha_inicio" name="fecha_inicio" value="<?php echo $fecha_inicio; ?>">
        <label for="fecha_fin">Fecha Fin:</label>
        <input type="date" id="fecha_fin" name="fecha_fin" value="<?php echo $fecha_fin; ?>">
        <button type="submit">Filtrar</button>
    </form>
    <canvas id="myChart"></canvas>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var chartData = <?php echo json_encode($data); ?>;
        var labels = chartData.map(function(e) {
           return e.procedimiento;
        });
        var values = chartData.map(function(e) {
           return e.cantidad;
        });

        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Cantidad de Procedimientos',
                    data: values,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    </div>
</body>
</html>