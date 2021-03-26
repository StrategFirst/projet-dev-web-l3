<?php
require_once "vue/Vue.php";
require_once "controlleur/Controlleur_connexion.php";
require_once "controlleur/Controlleur_consult.php";
require_once "controlleur/Controlleur_admin.php";
require_once "controlleur/Controlleur_effectif.php";
require_once "controlleur/Controlleur_rencontre.php";
require_once "controlleur/Controlleur_convocation.php";

class Main {

    private $connexion_control;
    private $consult_control;
    private $admin_control;


    public function __construct()
    {
    }

    public function chargeLeSite()
    {
        if(isset($_GET['action']))
        {
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

            case 'reoncontres':
               if($_GET['mode']=='lecture')
               {
                     console_log("action : rencotre mode :lecture");
                     $this->page=new Controlleur_rencontre();
                     $this->page->affiche_lecture();
               }
               else if($_GET['mode']=='edition')
               {
                   console_log("action : rencotre mode :edition");
                   $this->page=new Controlleur_rencontre();
                   $this->page->affiche_edition();
                 }
            break;
          }
        }
        else
        {
            $accueil=new Vue("accueil");
            $accueil->load(array());
        }

    }

}

?>
