<?php
require_once "vue/Vue.php";
require_once "modele/database.php";

class Controlleur_consult {
    private $BDD;

    public function __construct()
    {
      $this->BDD=new ModeleBDD();
    }

    public function affichage()
    {
        session_start();
        $vue_consult=new Vue("consultation");
        $vue_consult->load(array()); //variables a passer a la vue exemple type de role
    }

    //affiche la vue de lecture des rencontres pour l'entrainneur
    public function affiche_rencontre()
    {
        session_start();
        $vue_rencontre=new Vue("lecture_rencontre");
        $matchs=$this->BDD->getMatchs();
        $vue_rencontre->load(array('matchs'=>$matchs)); // lui passer les matchs en parametre
    }
}

?>
