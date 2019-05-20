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
                        <img src="imagenes/user.png">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p>Introduce tu Email y Contraseña</p><br>
                    </div>
                </div>
                <div class="form-group">
                <?php
                if (isset($_POST["incorrecto"]) and $_POST["incorrecto"]==1) {                                    
                ?>
                <div class="alert alert-danger" role="alert">
                    ATENCIÓN: Email o contraseña incorrecta.
                </div>
                <?php
                    }
                ?>
                    <form action="index.php?metodo=usuarios&accion=entrar" method="POST">
                        <label for="email"><input type="email" class="form-control" name="email" placeholder="email" id="usuario" size="40" required></label>
                        <label for="contrasena"><input type="password" class="form-control" name="contrasena" placeholder="Contraseña" id="contrasena" size="40" required></label><br><br>
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