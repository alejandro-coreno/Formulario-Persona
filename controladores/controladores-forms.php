<?php

include('../conexion.php');

session_start();

if (isset($_POST['enviar'])) {
    if (!empty($_POST['nombre']) && !empty($_POST['numero']) && !empty($_POST['correo'])) {
        $nombre = trim($_POST['nombre']);
        $numero = trim($_POST['numero']);
        $correo = trim($_POST['correo']);

        $_SESSION['enviados'] = 'Enviado';

        $consulta = "INSERT INTO persona (Nombre, Correo, Telefono) VALUES ('$nombre', '$correo', '$numero')";
        mysqli_query($conexion,$consulta);

        unset($_SESSION['valores']);
        header('Location: ../index.php');

    } else {
        $_SESSION['valores'] = $_POST;
        header('location: ../index.php');
    }
}
