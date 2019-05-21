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

        <div id="info" class="container">
            <h4>Mis suscripciones</h4>

            <table class="table table-sm">
            <thead>
            <th>Suscripción</th>
            <th>Precio</th>
            <th>Cantidad</th>            
            <th>Opción</th>
            </thead>
            <tbody>
            <?php
             $cuantos=0;
             while ($datos = $resultado[0]->fetch()) { $cuantos++; // Listamos suscripcion  ?>
            <tr>
                <form action="" method="POST">
                <td><input type="text" class="form-control" readonly name="nombre_suscripcion" id="nombre_suscripcion" value="<?php echo $datos["nombre"]; ?>"></td> 
                <td><input type="text" class="form-control" name="precio" id="precio" readonly size="45" value="<?php echo $datos['precio'];  ?>" required></td>
                <td> <input type="number" class="form-control" name="cantidad" id="cantidad" readonly size="1" value="1" required></td>                              
                <td><input type="submit" class="btn btn-warning" type="submit" value="Cancelar"></td>
                </form>
            </tr>  
            <?php }
            if($cuantos==0){
                ?>
                <td>No tienes suscripciones</td> 
                <?php
            } ?>                    

            </tbody>
            </table>

        </div>

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