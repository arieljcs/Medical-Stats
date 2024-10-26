<?php
session_start();
$conexion = mysqli_connect("localhost", "root", "", "medical_stats") or die("Problemas con la conexión");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username']) && isset($_POST['password'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    if (empty($user) || empty($pass)) {
        $_SESSION['error'] = "Usuario o contraseña no pueden estar vacíos.";
        header("Location: login.php");
        exit();
    } else {
        $registros = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario = '$user'") or die("Error de conexion" . mysqli_error($conexion));

        if ($reg = mysqli_fetch_array($registros)) {
            if ($pass == $reg['contrasena']) {
                $_SESSION['usuario'] = $user;
                header('Location: pagina.php'); // Redirige a la página principal después del login exitoso
                exit();
            } else {
                $_SESSION['error'] = "Usuario o contraseña incorrecto";
                header("Location: login.php");
                exit();
            }
        } else {
            $_SESSION['error'] = "Usuario no encontrado.";
            header("Location: login.php");
            exit();
        }
    }
}

// Mostrar mensajes de error si existen
if (isset($_SESSION['error'])) {
    echo "<script> alert('" . $_SESSION['error'] . "') </script>";
    unset($_SESSION['error']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Registro Usuario</title>
</head>
<body>
    <nav>
        <ul>
            <li> <img src="LogoB.png" alt="Logo" class="logo"></li>
        </ul>
    </nav>
    <br>
    <div class="login-container">
        <h1>Ingreso</h1>
        <form action="login.php" method="POST">
            <label for="username">Usuario</label>
            <input type="text" id="username" name="username" placeholder="Enter your username" required>
            <label for="password">Contraseña</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>
            <button type="submit" name="login">Login</button>
        </form>
    </div>
    <footer>
        <p>®️ 2024 Medical Stats. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
