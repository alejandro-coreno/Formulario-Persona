<?php
session_start();

if (isset($_SESSION['valores'])) {
    $nombre = $_SESSION['valores']['nombre'];
    $numero = $_SESSION['valores']['numero'];
    $correo = $_SESSION['valores']['correo'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/index.css">
    <link rel="shortcut Icon" href="https://img.icons8.com/external-flaticons-lineal-color-flat-icons/64/external-form-contact-us-icons-flaticons-lineal-color-flat-icons.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300&display=swap" rel="stylesheet">
    <title>Formulario</title>
</head>

<body>
    <form action="./controladores/controladores-forms.php" id="formulario" method="post">

        <h1 class="title">Bienvenido</h1>

        <div class="caja">
            <input type="text" placeholder="Nombre" name="nombre" autofocus value="<?php if(isset($nombre)) echo $nombre;?>">
        </div>

        <div class="caja">
            <input type="number" placeholder="Número" name="numero" value="<?php if(isset($numero)) echo $numero;?>">
        </div>

        <div class="caja">
            <input type="email" placeholder="Correo" name="correo" value="<?php if(isset($correo))echo $correo; ?>">
        </div>

        <input type="submit" value="Enviar" class="btn" name="enviar">

        <?php

        if (isset($_SESSION['enviados'])) {
            echo "<p class='enviado' id='enviado'>Enviado</p>";
            unset($_SESSION['enviados']);
        }

        if (isset($_SESSION['valores'])) {
            echo "<p class='error' id= 'error-msg'>Campos vacios</p>";
            unset($_SESSION['valores']);

            echo "<script>
                        setTimeout(function() {
                            var errorMsg = document.getElementById('error-msg');
                            if (errorMsg) {
                                errorMsg.style.display = 'none';
                            }
                        }, 2000); 
                    </script>";
        }
        ?>
    </form>
</body>

</html>