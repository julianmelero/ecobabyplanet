<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Eco Baby Planet</title>
</head>
<body>
<?php require_once "header.php"; ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h4>Resumen de compra</h4>

        </div>
    </div>

    <div class="form-group  suscripcion">
        <p>Disfruta de tu <b>suscripción <?php echo $suscripcion->getNombre();?></b> válida hasta el
            <?php
            $fecha_original = $compra->getFechaExpiracion();
            $fecha_formateada = date("d-m-Y", strtotime($fecha_original));
            echo $fecha_formateada;?>.</p>
    </div>

</div><br>
<footer>
    <div class="row">
        <div class="col-md-6"><img id="logotipo" src="imagenes/Logotipo.png"></div>
        <div class="mx-auto"><br>
            <ul class="list-unstyled">
                <li><a href="index.php">Inicio</a></li>|
                <li><a href="index.php">Sobre nosotros</a></li>|
                <li><a href="index.php">Contactar</a></li>
            </ul>
            <p>Proyecto P8 - "Idea Empresa / Entidad", 2019.</p>
        </div>
    </div>
</footer>
</body>
</html>