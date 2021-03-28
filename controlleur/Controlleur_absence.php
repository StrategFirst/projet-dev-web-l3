<?php
require_once "vue/Vue.php";
require_once "modele/database.php";

class Controlleur_absence {

    private $BDD;

    public function __construct()
    {
      $this->BDD=new ModeleBDD();
    }

    public function affichage()
    {
        session_start();
        if( !isset($_SESSION['role'])) { http_response_code(401); die(); }
        $vue_absence= new Vue("absence");
        $joueurs =$this->BDD->getJoueurs();
        $absences=$this->BDD->getAbsences();
        $vue_absence->load(array('joueurs'=>$joueurs,'absences'=>$absences));
        
        
    }

}
?>
