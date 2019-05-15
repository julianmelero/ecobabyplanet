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
                    <h4>Modalidades de suscripción</h4>
                    <p>Elige el tipo de suscripción que más se adapte a tus necesidades</p>
                </div>
            </div>
            <div class="article">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="float-left"></h4>
                        </div>
                    </div>
                    <div class="row">
                        
                        <?php 
                        while ($datos = $resultado[0]->fetch()) { 
                        ?>
                        
                        <div class="col-md-6">
                            <!--Imagen producto-->
                            <img src="<?php echo $datos["imagen"]; ?>" alt="producto" class="img-full" />
                        </div>
                        <div id="col2" class="col-md-6">
                            <!--Descripción producto, precio divisa-->
                            <p><?php echo $datos["nombre"]; ?></p>
                            <p><?php echo $datos["descripcion"]; ?></p>
                            <p><?php echo $datos["precio"]; ?></p>
                            <p><?php echo $datos["divisa"]; ?></p>
                            <a class="float-right" href="" id="btn">Añadir a Carrito</a>
                        </div>

                        <?php
                        }
                        ?>

                    </div><br>
                </div>
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