<?php
require_once "vue/Vue.php";
require_once "controlleur/Controlleur_connexion.php";
require_once "controlleur/Controlleur_consult.php";
require_once "controlleur/Controlleur_admin.php";
require_once "controlleur/Controlleur_effectif.php";

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
            if($_GET['action']=='connexion')
             {
                 $this->controlleur= new Controlleur_connexion();
                 $this->controlleur->affichage();
             }
             if($_GET['action']=='consult')
             {
                $this->controlleur= new Controlleur_consult();
                $this->controlleur->affichage();
             }
             if($_GET['action']=='admin')
             {
                $this->controlleur= new Controlleur_admin();
                $this->controlleur->affichage();
             }
             if($_GET['action']=='effectif')
             {
                $this->controlleur = new Controlleur_effectif();
                $this->controlleur->affichage();
             }
             if($_GET['action']=='rencontres')
             {
                if($_GET['mode']=='lecture')
                {
                      $this->controlleur = new Controlleur_consult();
                      $this->controlleur->affiche_rencontre();
                }
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
