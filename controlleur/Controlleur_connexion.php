<?php
require_once "vue/Vue.php";

class Controlleur_connexion {

    public function connexion()
    {
        $vue_connexion = new Vue("connexion");
        $vue_connexion->load(array()); //peut passer des données a la vue dans le tableau
    }
}

?>
