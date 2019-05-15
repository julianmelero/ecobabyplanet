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
                    <h4>Administrar Productos</h4>
                </div>
            </div>
            
            <div class="form-group">
            <div class="row">
                <div class="col-xs-12">
                    <a type="button" class="btn btn-primary" href="index.php?metodo=productos&accion=nuevo">Añadir</a>
                </div>
            </div>
            <br>
            <table class="table table-sm">
            <thead>
            <th>Nombre</th>
            <th>Descripción</th>
            <th></th>
            </thead>
            <tbody>            
            <?php while ($datos = $resultado[0]->fetch()) { // Listamos productos  ?>
            <tr>
                <form action="index.php?metodo=productos&accion=irproducto" method="POST">
                <td> <input type="hidden" name="id_producto" id="id_producto" value="<?php echo $datos["id_producto"]; ?>"> 
                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" readonly size="45" value="<?php echo $datos['nombre'];  ?>" required>
                </td>              
                <td> <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Descripcion" readonly size="45" value="<?php echo $datos['descripcion'];  ?>" required></td>              
                <td><input type="submit" class="btn btn-warning" type="submit" value="Modificar"></td>
                </form>
            </tr>  
            <?php } ?>                    

            </tbody>
            </table>
            
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