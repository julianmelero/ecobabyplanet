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
                    <h4>Añadir Producto a la Suscripción</h4>
                </div>
            </div>
            
            <div class="form-group">            
                
                    
                    <form action="index.php?metodo=suscripcion_producto&accion=insertar_producto" method="POST">
                    <input type="hidden" name="id_suscripcion" id="id_suscripcion" value="<?php echo $_POST["id_suscripcion"]; ?>"> 
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12">
                              <h2>Suscripción: <?php echo $_POST["nombre_suscripcion"];  ?> </h2>  
                        </div>
                    </div>
                    <div class="row">
                            <div class="col-xs-12">
                                <?php 
                                $resultado_productos= $productos->get_productos();
                                ?>
                                <select>
                                <?php
                                while ($datos_productos = $resultado_productos[0]->fetch()){
                                    
                                    ?>
                                    <option value="<?php echo $datos_productos["id_producto"]; ?>"><?php echo $datos_productos["nombre"]; ?></option>
                                    <?php

                                }
                              ?>
                              </select>
                        </div>
                    </div>
                    </form>
            
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