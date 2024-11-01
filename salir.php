<?php
session_start(); //Obtener la sesión
session_unset(); //Desarmar la sesión
session_destroy(); //Destruir la sesión
header("Location: login.php"); //Redirige al login
exit; //Salir
?>
