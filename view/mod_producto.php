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
                    <h4>Modificar Producto</h4>
                </div>
            </div>
            <form action="index.php?metodo=productos&accion=modificar" method="POST">
            <div class="form-group">
            <?php while ($datos = $resultado[0]->fetch()) { // Listamos el producto  ?>
            <input type="hidden" name="id_producto" id="id_producto" value="<?php echo $datos["id_producto"]; ?>">
            <label for="nombre">Nombre<input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" size="45" required value="<?php echo $datos["nombre"]; ?>"</label>
            <label for="Descripcion">Descripcion<input type="text" class="form-control" name="descripcion" id="descripción" placeholder="Descripción" size="45" required value="<?php echo $datos["descripcion"]; ?>"></label>
            <br>
            <?php } ?>
            <input class="btn btn-success" type="submit" value="Guardar" >
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