<?php
require_once "vue/Vue.php";
require_once "modele/database.php";
class Controlleur_effectif {
    public function affichage()
    {
        session_start();
        $vue_consult=new Vue("effectif");
        $vue_consult->load(array()); //variables a passer a la vue exemple type de role
    }

    public function update()
    {
      if(isset($_POST['nom']) && isset($_POST['prenom'])) {
        $BDD = new ModeleBDD();
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        if(isset($_POST['id'])) { //suppression
          $BDD->removeJoueur($id);

        } else { // ajout
          $license = isset($_POST['license']);
          $BDD->addJoueur($nom,$prenom,($license?'1':'0'));
        }
      }
    }
}

?>
