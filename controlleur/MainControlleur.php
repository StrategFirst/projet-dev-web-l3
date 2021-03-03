<?php
require_once "vue/Vue.php";
require_once "controlleur/Controlleur_connexion.php";

class Main {

    private $connexion_control;

    public function __construct()
    {
        $this->connexion_control= new Controlleur_connexion();
    }

    public function chargeLeSite()
    {
        if(isset($_GET['action']))
        {
            if($_GET['action']=='connexion')
             {
                console_log("action : connexion");
                 $this->connexion_control->connexion();
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