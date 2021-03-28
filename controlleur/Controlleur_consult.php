<?php
require_once "vue/Vue.php";
require_once "modele/database.php";

class Controlleur_consult {
    

    public function affichage()
    {
        session_start();
        $vue_consult=new Vue("consultation");
        $vue_consult->load(array());
    }


}

?>
