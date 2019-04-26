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
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <img id="logotipo1" src="imagenes/Logotipo.png">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a id="inicio" class="nav-link" href="#inicio">Inicio <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contacto">Contacto</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="suscripciones.php">Suscripciones</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Carrito de compra</a>
                        </li>
                    </ul>
                    <div class="right">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item"><a id="btn" class="nav-link" href="login.php">Iniciar Sesión</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        <div id="logo">
            <img src="imagenes/Logotipo.png">
            <h1 id="descripcion">Productos ecológicos y biodegradables<br>para toda la familia y de gran calidad</h1><br>
        </div>
        <div id="info" class="container">
            <h4>Quiénes somos</h4>
            <div class="row">
                <div class="col-md-6">
                    <p id="text">Somos una empresa dedicada a la venta en línea de productos para bebés, mujeres embarazadas y madres de tipo "eco" o "bio" mediante el modelo de
                    suscripción. Queremos que nuestros clientes apuesten por una crianza ecológica para toda la familia.<br><br>
                    Podrás identificar que nuestros productos son ecológicos a través de su certificación ecológica.
                    Apostamos por productos de excelente calidad, 100% natural y de producción nacional.<br> </p>
                </div>
                <div class="col-md-6">
                    <img src="imagenes/eco.png">
                </div>
            </div><hr>
            <h4>Nuestras suscripciones</h4>
            <div class="row">
                <div class="col-md-6">
                    <p id="text">En la sección de suscripciones encontrarás 4 modalidades a escoger. Podrás elegir entre suscripción mensual, trimestral, semestral
                    y anual.<br><br>Adicionalmente podrás cancelar tu suscripción en cualquier momento. Para poder suscribirte debes de iniciar sesión con tu usuario y contraseña, y
                    en caso de no estar registrado, debes darte de alta en nuestra web.</p>
                </div>
                <div class="col-md-6">
                    <img src="imagenes/suscribete.png">
                </div>
            </div><br>
            <div class="row">
                <div class="mx-auto"><a href="suscripciones.php" id="btn-sus">Suscríbete</a></div>
            </div><br><hr>
            <h4>Contacta con nosotros</h4>
            <div>
                <p>¡Estaremos encantados de responder a todas tus dudas!</p>
                <p>Rellena el siguiente formulario con los siguientes datos y te contestaremos a la mayor brevedad posible</p>
            </div>
            <div class="form-group">
                <form id="contacto" action="" enctype="multipart/form-data">
                    <label for="nombre"><input class="form-control" name="nombre" id="nombre" type="text" placeholder="Nombre" size="40"></label>
                    <label for="email"><input class="form-control" name="email" id="email" type="email" placeholder="Email" size="40"></label><br>
                    <label for="textarea"><textarea class="form-control" rows="4" cols="92" name="mensaje" id="mensaje" placeholder="Mensaje" ></textarea></label><br>
                    <button id="btn" type="submit">Enviar mensaje</button><br>
                </form>
            </div>
        </div>
        <div>
            <footer>
                <div class="row">
                    <div class="col-md-6"><img id="logotipo" src="imagenes/Logotipo.png"></div>
                    <div class="mx-auto"><br>
                        <ul class="list-unstyled">
                            <li><a href="#inicio">Inicio</a></li>|
                            <li><a href="#info">Sobre nosotros</a></li>|
                            <li><a href="#contacto">Contactar</a></li>
                        </ul>
                        <p>Proyecto P8 - "Idea Empresa / Entidad", 2019.</p>
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>