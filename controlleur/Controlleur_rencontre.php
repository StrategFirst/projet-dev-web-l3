<?php
require_once "vue/Vue.php";
require_once "modele/database.php";

class Controlleur_rencontre
{
    private $BDD;

    public function __construct()
    {
      $this->BDD=new ModeleBDD();
    }

    public function gestionCSV() {
      $dataFromCSV = explode("\n",file_get_contents($_FILES['sourceCSV']['tmp_name']));
      foreach ($dataFromCSV as $key => $row) {
        $ligne = str_getcsv($row,';');
        if(sizeof($ligne) != 7) {
          $err_msg = "Erreur lors de la lecture du fichier CSV à la ligne $key";
          $err_code = 8;
          require 'vue/erreur_box.php';
          return;
        }
        // assignation par destructuration de la liste pour gagner en ligne et en clarté
        list($competition, $equipe_l, $equipe_a, $date, $heure, $terrain, $site) = $ligne;
        if
          (
            //on n'appause pas de restriction particulière sur la competition
            //on n'appause pas de restriction particulière sur l'équipe locale
            //on n'appause pas de restriction particulière sur l'équipe adverse
            preg_match('/[0-9]{4}-[0-9]{2}-[0-9]{2}/',$date) != 1 ||
            preg_match('/[0-9]{2}:[0-9]{2}/',$heure) != 1
            //on n'appause pas de restriction particulière sur le terrain utilisé
            //on n'appause pas de restriction particulière sur le lieu de la rencontre
          )
        {
          $err_msg = "Erreur lors de la lecture du fichier CSV à la ligne $key";
          $err_code = 8;
          require 'vue/erreur_box.php';
          return;
        }
        $this->BDD->addMatch($competition,$equipe_l,$equipe_a,"$date $heure:00",$terrain,$site);
      }
    }

    public function affichage($mode) {
      session_start();
      if( (!isset($_SESSION['role'])) ) { http_response_code(401); die(); }
      switch ($mode) {
        case 'edition':
          if( $_SESSION['role'] != 'secretaire') { http_response_code(403); die(); }
          $this->affiche_edition();
        break;

        case 'lecture':
        default:
          $this->affiche_lecture();
        break;
      }
    }
    //affiche la vue de lecture des rencontres pour l'entrainneur
    public function affiche_lecture()
    {
        $vue_rencontre=new Vue("rencontre_lecture");
        $matchs=$this->BDD->getMatchs();
        $vue_rencontre->load(array('matchs'=>$matchs)); // lui passer les matchs en parametre
    }

    public function affiche_edition()
    {
        $vue_rencontre=new Vue("rencontre_edition");
        $matchs=$this->BDD->getMatchs();
        $vue_rencontre->load(array('matchs'=>$matchs));
        /*,'competition'=>$competition,
        'equipe_locale'=>$equipe_locale,'equipe_adverse'=>$equipe_adverse,
        'terrain'=>$terrain,'lieu'=>$lieu,'enum_compet'=>$enum_compet,'enum_equipe'=>$enum_equipe)); */

    }
}
?>
