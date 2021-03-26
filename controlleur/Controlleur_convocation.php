<?php
require_once "vue/Vue.php";
require_once "modele/database.php";
class Controlleur_convocation {
    public function affichage()
    {
        session_start();
        $vue_consult=new Vue("convocation");
        $vue_consult->load(array()); //variables a passer a la vue exemple type de role
    }

    public function update()
    {
      $BDD = new ModeleBDD();
    }
}

?>
