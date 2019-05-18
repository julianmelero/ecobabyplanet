<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Eco Baby Planet</title>
    </head>
    <body>
		<?php require_once "header.php";  ?>			
		<div class="container">
            <div class="row">
                <div class="col-md-12">
                    <img src="imagenes/caja.png">
                    <h4>Administrar Suscripciones</h4>
                </div>
            </div>
            
            <div class="form-group">
            <div class="row">
                <div class="col-xs-12">
                    <a type="button" class="btn btn-primary" href="index.php?metodo=productos&accion=nuevo">Añadir</a>
                </div>
            </div>
            <br>            
            <?php 
            while ($datos_suscripciones = $resultado_suscripciones[0]->fetch()) { // Listamos las suscripciones tiene producto                                
                $resultado_suscripciones_suscripcion = $suscripciones->get_suscripciones($datos_suscripciones["id_suscripcion"]);                
                while ($datos_producto_suscripcion = $resultado_suscripciones_suscripcion[0]->fetch()) { // Listamos de las suscripciones                                                               
                    ?>
                    <form action="index.php?metodo=suscripcion_producto&accion=eliminar_producto" method="POST">
                    <input type="hidden" name="id_suscripcion" id="id_suscripcion" value="<?php echo $datos_producto_suscripcion["id_suscripcion"]; ?>"> 
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12">
                              <h2>Suscripción: <?php echo $datos_producto_suscripcion["nombre"];  ?> </h2>  
                        </div>
                    </div>
                    <input type="hidden" name="nombre_suscripcion" id="nombre_suscripcion" value="<?php echo $datos_producto_suscripcion["nombre"]; ?>"><input type="button" value="Añadir Producto"> 
                    </form>
                    <?php
                    $resultado_productos = $productos->get_producto($datos_suscripciones);
                    while ($datos_producto = $resultado_productos[0]->fetch()) { // Listamos productos  ?>
            
                <form action="index.php?metodo=suscripcion_producto&accion=eliminar_producto" method="POST">
                <div class="form-group">
                    <div class="row">
                        <div class="col-xs-12">
                        <h3>Productos</h3>
                    </div>
                </div>                
                <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12">
                            <input type="hidden" name="id_suscripcion" id="id_suscripcion" value="<?php echo $datos_producto_suscripcion["id_suscripcion"]; ?>"> 
                            <input type="hidden" name="id_producto" id="id_producto" value="<?php echo $datos_producto["id_producto"]; ?>">
                            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" readonly size="45" value="<?php echo $datos_producto['nombre'];  ?>" required>                
                        </div>                    
                        <div class="row">    
                            <input type="submit" class="btn btn-warning" type="submit" value="Eliminar">
                        </div>
                </div>
                </form>
            
            <?php }
            }
         } ?>                    

            </div>
        </div>
		<div>
            <footer>
                <div class="row">
                    <div class="col-md-6">
                        <img id="logotipo" src="imagenes/Logotipo.png">
                    </div>
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