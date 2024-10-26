<?php
session_start();

// Verifica si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit();
}
$conexion = mysqli_connect("localhost", "root", "", "medical_stats") or
    die("Problemas con la conexión");
if (isset($_REQUEST['id']) && !empty($_REQUEST['id'])) {
    mysqli_query($conexion, "update pacientes
                           set numero_quirofano='$_REQUEST[numero_quirofano]',
                           edad= '$_REQUEST[edad]',
                           dni='$_REQUEST[dni]',
                           Localidad='$_REQUEST[Localidad]',
                           nombre='$_REQUEST[nombre]', 
                           procedimiento='$_REQUEST[procedimiento]',
                           cirujano='$_REQUEST[cirujano]',
                           1_Ayudante='$_REQUEST[ayudante1]',
                           2_Ayudante='$_REQUEST[ayudante2]',
                           anestesista='$_REQUEST[anestesista]',
                           instrumentador='$_REQUEST[instrumentador]',
                           tipo_anestesia='$_REQUEST[tipo_anestesia]',
                           urgencia='$_REQUEST[urgencia]'
                           where id='$_REQUEST[id]'") 
or die("Problemas en el select" . mysqli_error($conexion));
} else {
    mysqli_query($conexion, "insert into pacientes(fecha,
        numero_quirofano,
        edad,
        dni,
        Localidad,
        nombre,
        procedimiento,
        cirujano,
        1_Ayudante,
        2_Ayudante,
        anestesista,
        instrumentador,
        tipo_anestesia,
        urgencia) 
values('$_REQUEST[fecha]',
       '$_REQUEST[numero_quirofano]',
       '$_REQUEST[edad]',
       '$_REQUEST[dni]',
       '$_REQUEST[Localidad]',
       '$_REQUEST[nombre]',
       '$_REQUEST[procedimiento]',
       '$_REQUEST[cirujano]',
       '$_REQUEST[ayudante1]',
       '$_REQUEST[ayudante2]',
       '$_REQUEST[anestesista]',
       '$_REQUEST[instrumentador]',
       '$_REQUEST[tipo_anestesia]',
       '$_REQUEST[urgencia]')") or die("Problemas en el select" . mysqli_error($conexion));
}

mysqli_close($conexion);
header("Location: pagina.php");
exit;
?>