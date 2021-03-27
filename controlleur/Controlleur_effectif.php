<?php
require_once "vue/Vue.php";
require_once "modele/database.php";
class Controlleur_effectif {
    public function affichage()
    {
        session_start();
        if( (!isset($_SESSION['role'])) ) { http_response_code(401); die(); }
        $vue_consult=new Vue("effectif");
        $vue_consult->load(array()); //variables a passer a la vue exemple type de role
    }

    public function update()
    {
      $BDD = new ModeleBDD();
      if(isset($_POST['nom']) && isset($_POST['prenom'])) { //ajout
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $license = isset($_POST['license']);
        $BDD->addJoueur($nom,$prenom,($license?'1':'0'));
      } else if(isset($_POST['id'])) { //suppression
        if(!$BDD->removeJoueur($_POST['id'])) {
          $err_msg = "Impossible de retiré le joueur (il doit avoirs une convocation)";
          $err_code = 003;
          require 'vue/erreur_box.php';
        }
      } else if(isset($_POST['idl'])) {
        $BDD->modifLicenceJoueur($_POST['idl'],$_POST['licence']);
      }
    }
}

?>
