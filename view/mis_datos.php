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
                    <img src="imagenes/user.png">
                    <h4>Mis datos</h4>
                </div>
            </div>
            <div class="form-group">

            <?php /** @var usuario $resultado */
            $fecha = $resultado->getFechaNacimiento();
            $fecha_nac = date("Y-m-d", strtotime($fecha));  ?>
            <form action="index.php?metodo=usuarios&accion=modificar" method="POST">
                <label for="nombre">Nombre<input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" size="19" value="<?php echo $resultado->getNombre();  ?>" required></label>
                <label for="apellidos">Apellidos<input type="text" class="form-control" name="apellidos" id="apellidos" placeholder="Apellidos" size="19" value="<?php echo $resultado->getApellidos();  ?>" required></label><br>
                <label for="movil">Móvil<input type="text" class="form-control" name="movil" id="movil" placeholder="Movil" size="19" value="<?php echo $resultado->getMovil();  ?>" required></label>
                <label for="fecha_nacimiento">F. Nacimiento<input type="date" class="form-control" name="fecha_nacimiento" id="fecha" value="<?php echo $fecha_nac;  ?>" required></label><br>
                <label for="email">Email<input readonly type="email" class="form-control" name="email" id="email" placeholder="Email" size="47" value="<?php echo $resultado->getEmail();  ?>" required></label><br>
                <label for="direccion">Dirección<input type="text" class="form-control" name="direccion" id="direccion" size="50" placeholder="Dirección" value="<?php echo $resultado->getDireccion();  ?>" required></label><br>
                <label for="dni">DNI<input readonly type="text" class="form-control" name="dni" id="dni" placeholder="DNI" size="10" value="<?php echo $resultado->getDni();  ?>" required></label><br>
                <input type="hidden" name="id" value="<?php echo $resultado->getId();  ?>">
                <input type="submit" id="btn" value="Guardar">
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