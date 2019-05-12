<?php
require_once getcwd()."/model/suscripcion.php";
class suscripcion {
    function ver_suscripciones() {
        // Llamamos a la página principal
        require_once getcwd()."/view/suscripciones.php";
    }


}