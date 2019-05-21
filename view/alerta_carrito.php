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
            <h4>Alerta de suscripción</h4>
        </div>
    </div>
    <div class="form-group suscripcion" align="center">
        Ops, no puedes comprar una nueva suscripción porque ya tienes una <b>Suscripción <?php echo $suscripcion->getNombre(); ?></b>.<br>
        Puedes gestionar tu suscripción desde <a href="index.php?metodo=mis_suscripciones&accion=ver_suscripcion">Mis Suscripciones</a></li>.
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