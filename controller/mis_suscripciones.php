<?php
require_once getcwd()."/model/mis_suscripciones.php";

class mis_suscripciones {

    function ver_suscripcion() {
        $suscripcionnes = new model_mis_suscripciones("ecobabyplanet");
        //Llamamos a la página mis_suscripciones
        require_once getcwd()."/view/mis_suscripciones.php";

    }

}

?>