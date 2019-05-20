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
            
            <div class="form-group  suscripcion">
                <form action="index.php?metodo=carrito&accion=mostrar_carrito" method="POST">
                
                <?php while ($datos_suscripcion = $resultado_suscripciones[0]->fetch()) { // Listamos de las suscripciones ?>

                <!--Tipo de suscripción-->
                <h4 class="mod-sus"><?php echo $datos_suscripcion["nombre"]; ?></h4>
                        
                        <div class="row">
                            <div class="col-md-4">
                                <!--Imagen producto-->
                                <img src="<?php echo $datos_suscripcion["imagen"]; ?>" class="img-fluid pro--img float-left"/>
                            </div>
                            <div class="col-md-8">
                                <!--Descripción producto, precio divisa-->
                                <p class="desc"><?php echo $datos_suscripcion["descripcion"]; ?></p>
                                <p class="precio"><?php echo $datos_suscripcion["precio"]; ?> <?php echo $datos_suscripcion["divisa"]; ?> (IVA incluido)</p>
                                <!--Botón submit-->
                                <input type="submit" class="float-right suscribirse" value="Añadir a Carrito">
                                <input type="hidden" name="id_suscripcion" value="<?php echo $datos["id_suscripcion"] ?>"><br>
                            </div>
                        </div>
                        <br><br><br>

                        <h4 class="lista">Productos incluidos</h4>

                        <?php

                        $resultado_suscripciones_suscripcion = $suscripciones->get($datos_suscripcion["id_suscripcion"]);                
                        while ($datos_suscripciones_producto = $resultado_suscripciones_suscripcion[0]->fetch()) { // Listamos suscripciones tiene producto
                        
                        $resultado_productos = $productos->get_producto_suscripcion($datos_suscripciones_producto["id_producto"]);                        
                        while ($datos_producto = $resultado_productos[0]->fetch()) {  // Listamos productos  ?>

                                                                    
                            <div class="row">
                                <div class="col-md-12">
                                    <ul class="float-left">
                                        <li><?php echo $datos_producto['nombre'];  ?></li>
                                        <li><?php echo $datos_producto['descripcion'];  ?></li>
                                    </ul>
                                </div>
                            </div>
                                 

                    <?php } 
                    }
                }
                    ?>
                </form>
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