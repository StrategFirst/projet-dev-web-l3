<?php
require_once "vue/Vue.php";
require_once "controlleur/Controlleur_connexion.php";
require_once "controlleur/Controlleur_consult.php";
require_once "controlleur/Controlleur_admin.php";
require_once "controlleur/Controlleur_effectif.php";
require_once "controlleur/Controlleur_rencontre.php";
require_once "controlleur/Controlleur_convocation.php";
require_once "controlleur/Controlleur_absence.php";
class Main {



    public function __construct()
    {
    }

    public function chargeLeSite()
    {
      if(! isset($_GET['action'])) { $_GET['action'] = NULL;}
      switch($_GET['action']) {
        case 'convocation':
          $this->controlleur= new Controlleur_convocation();
          $this->controlleur->affichage();
        break;

        case 'connexion':
          $this->controlleur= new Controlleur_connexion();
          $this->controlleur->affichage();
        break;

        case 'consult':
          $this->controlleur= new Controlleur_consult();
          $this->controlleur->affichage();
        break;

        case 'admin':
          $this->controlleur= new Controlleur_admin();
          $this->controlleur->affichage();
        break;

        case 'effectif':
          $this->controlleur = new Controlleur_effectif();
          $this->controlleur->update();
          $this->controlleur->affichage();
        break;

        case 'rencontres':
          $this->controlleur = new Controlleur_rencontre();
          $this->controlleur->affichage($_GET['mode']);
        break;

        case 'absence' :
          $this->controlleur= new Controlleur_absence();
          $this->controlleur->affichage();
        break;

        default:
          $accueil=new Vue("accueil");
          $accueil->load(array());
        break;
      }
    }

}

?>
