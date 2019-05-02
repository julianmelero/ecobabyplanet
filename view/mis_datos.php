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
                    <h4>Nuevo Usuario</h4>
                </div>
            </div>
            <div class="form-group">
            
                <form action="index.php?metodo=usuarios&accion=modificar" method="POST" onsubmit="return comprobar_pass()">
                    <label for="nombre"><input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" size="19" required></label>
                    <label for="apellidos"><input type="text" class="form-control" name="apellidos" id="apellidos" placeholder="Apellidos" size="19" required></label><br>
                    <label for="movil"><input type="text" class="form-control" name="movil" id="movil" placeholder="Movil" size="19" required></label>
                    <label for="fecha_nacimiento"><input type="date" class="form-control" name="fecha_nacimiento" id="fecha" required></label><br>
                    <label for="email"><input type="email" class="form-control" name="email" id="email" placeholder="Email" size="47" required></label><br>
                    <label for="contrasena"><input type="password" class="form-control" name="contrasena" id="contrasena" placeholder="Contraseña" size="35" required></label><br>
                    <label for="contrasena2"><input type="password" class="form-control" name="contrasena2" id="contrasena2" placeholder="Repita Contraseña" size="35" required></label><br>
                    <label for="direccion"><input type="text" class="form-control" name="direccion" id="direccion" size="50" placeholder="Dirección" required></label><br>
                    <label for="dni"><input type="text" class="form-control" name="dni" id="dni" placeholder="DNI" size="10" required></label><br>

                    <input type="submit" id="btn" value="Darse de alta">
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
    <script>
    function comprobar_pass(){        
        if ($("#contrasena").val()!= $("#contrasena2").val() ) {
            alert("Las contraseñas no coinciden");
            return false;
        }
        else{
            return  true;
        }
    }
    </script>
    </body>
</html>