<?php
require_once "vue/Vue.php";

class Controlleur_connexion {

    public function affichage()
    {
        if(isset($_POST['username']) && isset($_POST['password'])) {
          if($this->connexion($_POST['username'],$_POST['password'])) {
              $vue_connexion = new Vue("accueil");
              $vue_connexion->load(array()); // à voir pour des paramètres éventuel
          } else {
              $vue_connexion = new Vue("connexion");
              $vue_connexion->load(array("err_code"=>1,"err_msg"=>"Mot de passe ou identifiant incorrect"));
          }
        } else {
          $vue_connexion = new Vue("connexion");
          $vue_connexion->load(array());
        }
    }

    //ça devrait allez dans un modèle en partie bientôt
    private function connexion($username, $password) {
      //TO do : requete sql de récupération des mdp et ide de la bdd (via modéle)
      $queryResult /*fake*/ = [
        ["username"=>"entraineur","password"=>"entraineur","id"=>1,"type"=>"entraineur"],
        ["username"=>"secretaire","password"=>"secretaire","id"=>2,"type"=>"secretaire"],
        ["username"=>"admin","password"=>"admin","id"=>4,"type"=>"admin"],
        ["username"=>"bis","password"=>"bis","id"=>12,"type"=>"entraineur"]
      ];
      foreach ($queryResult as $key => $login) {
        if(
          $login["username"] === $username &&
          $login["password"] === $password
        ) {
          session_start();
          $_SESSION["who"] = $login;
          return true;
        }
      }
      //si on est arrivé jusqu'ici c'est qu'aucun ne correspondait
      return false;
    }
}

?>
