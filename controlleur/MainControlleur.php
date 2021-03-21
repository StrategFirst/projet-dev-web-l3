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
        $this->connexion_control= new Controlleur_connexion();
        $this->consult_control= new Controlleur_consult();
        $this->admin_control= new Controlleur_admin();
    }

    public function chargeLeSite()
    {
        if(isset($_GET['action']))
        {
            if($_GET['action']=='connexion')
             {
                console_log("action : connexion");
                 $this->connexion_control->affichage();
             }
             if($_GET['action']=='consult')
             {
                console_log("action : consult");
                $this->consult_control->affichage();
             }
             if($_GET['action']=='admin')
             {
                console_log("action : admin");
                $this->admin_control->affichage();
             }
             if($_GET['action']=='effectif')
             {
               $this->page = new Controlleur_effectif();
               $this->page->affichage();

             }
        }
        else
        {
            console_log("action : acceueil");
            $accueil=new Vue("accueil");
            $accueil->load(array());
        }

    }

}

?>
