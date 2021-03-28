<?php
require_once "vue/Vue.php";
require_once "modele/database.php";
class Controlleur_connexion {


    private $BDD;

    public function __construct()
    {
      $this->BDD=new ModeleBDD();
    }

    public function affichage()
    {

        if(isset($_POST['username']) && isset($_POST['password'])) {

          if($this->connexion($_POST['username'],$_POST['password'])) {
              $vue_connexion = new Vue("accueil");
              $vue_connexion->load(array()); 
          } else {
              $vue_connexion = new Vue("connexion");
              $vue_connexion->load(array("err_code"=>1,"err_msg"=>"Mot de passe ou identifiant incorrect"));
          }
        } else {
          $vue_connexion = new Vue("connexion");
          $vue_connexion->load(array());
        }
    }

    private function connexion($username, $password) {
      $BDD = new ModeleBDD();
      $queryResult = ($BDD->getAdmin());

      foreach ($queryResult as $key => $login) {
        if(
          $login["username"] === $username &&
          $login["password"] === $password
        ) {
          session_start();
          $_SESSION["role"] = $login["role"];
          return true;
        }
      }
    

      return false;
    }
}

?>
