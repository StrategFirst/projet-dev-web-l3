<?php
require_once "vue/Vue.php";

class Controlleur_effectif {
    public function affichage()
    {
        session_start();
        $vue_consult=new Vue("effectif");
        $vue_consult->load(array()); //variables a passer a la vue exemple type de role
    }
}

?>
