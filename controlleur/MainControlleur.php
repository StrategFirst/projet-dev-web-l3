<?php
require_once "vue/Vue.php";
require_once "controlleur/Controlleur_connexion.php";
require_once "controlleur/Controlleur_consult.php";
require_once "controlleur/Controlleur_admin.php";

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
             if($_GET['action']=='rencontres')
                {
                    if($_GET['mode']=='lecture')
                    {
                        console_log("action : rencotre mode :lecture");
                        $this->consult_control->affiche_rencontre();
                    }
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
