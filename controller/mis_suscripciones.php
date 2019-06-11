<?php
require_once getcwd()."/model/mis_suscripciones.php";

class mis_suscripciones {

    function ver_suscripcion() {
        session_start();
        $suscripcionnes = new model_mis_suscripciones("ecobabyplanet2");
        $resultado = $suscripcionnes->get_mis_suscripciones($_SESSION["id_usuario"]);
        //Llamamos a la página mis_suscripciones
        require_once getcwd()."/view/mis_suscripciones.php";

    }

    function cancelar_suscripcion($parametros){
        session_start();
        $suscripcionnes = new model_mis_suscripciones("ecobabyplanet2");
        $suscripcionnes->cancelar_suscripcion($_SESSION["id_usuario"]);
        //Llamamos a la página mis_suscripciones
        header("Location:  index.php?metodo=mis_suscripciones&accion=ver_suscripcion");
    }

}

?>