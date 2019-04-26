<link href="<?php echo "./bootstrap/css/bootstrap.min.css"; ?>" rel="stylesheet">
<link href="<?php echo "./style.css"; ?>" rel="stylesheet">
<script src="http://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="<?php  echo "./bootstrap/js/bootstrap.min.js"; ?>"></script>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
                <img id="logotipo1" src="imagenes/Logotipo.png">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a id="inicio" class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php#contacto">Contacto</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">Suscripciones</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Carrito de compra</a>
                        </li>
                    </ul>
                    <div class="right">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item"><a id="btn" class="nav-link" href="index.php?metodo=usuarios&accion=registro">Registro</a></li>
                            <li class="nav-item"><a id="btn" class="nav-link" href="index.php?metodo=usuarios&accion=login">iniciar sesión</a></li>
                        </ul>
                    </div>
                </div>
            </nav>