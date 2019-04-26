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
                            <a id="inicio" class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Contacto</a>
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
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <img src="imagenes/user.png">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p>Introduce tu usuario y contraseña</p><br>
                    </div>
                </div>
                <div class="form-group">
                    <form id="" action="" enctype="multipart/form-data">
                        <label for="usuario"><input type="text" class="form-control" name="usuario" placeholder="Usuario" id="usuario" size="40" required></label>
                        <label for="password"><input type="password" class="form-control" name="password" placeholder="Contraseña" id="password" size="40" required></label><br><br>
                        <input type="submit" id="btn" value="Iniciar sesión">
                    </form>
                </div><br>
                <div class="row">
                    <div class="col-md-12">
                        <p>¿Eres nuevo? Crea un <a href="registro.php">nuevo usuario</a></p>
                    </div>
                </div>
            </div><br>
            <div>
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
            </div>
        </body>
    </html>