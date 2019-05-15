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
                <form action="#" method="POST">
                    <?php while ($datos = $resultado[0]->fetch()) { ?>
                    
                        <!--Tipo de suscripción-->
                        <h4 class="mod-sus"><?php echo $datos["nombre"]; ?></h4>
                        
                        <div class="row">
                            <div class="col-md-4">
                                <!--Imagen producto-->
                                <img src="imagenes/caja.png" class="img-fluid pro--img float-left"/>
                            </div>
                            <div class="col-md-8">
                                <!--Descripción producto, precio divisa-->
                                <p class="desc"><?php echo $datos["descripcion"]; ?></p>
                                <p class="precio"><?php echo $datos["precio"]; ?> <?php echo $datos["divisa"]; ?> (IVA incluido)</p>
                                <!--Botón submit-->
                                <input type="submit" class="float-right suscribirse" value="Añadir a Carrito"><br>
                            </div>
                        </div>

                    <?php } ?>
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