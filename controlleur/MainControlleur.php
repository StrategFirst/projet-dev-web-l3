<?php
require_once "vue/Vue.php";
require_once "controlleur/Controlleur_connexion.php";

class Main {

    private $connexion_control;

    public function __contruct()
    {
        $connexion_control= new Controlleur_connexion();
    }

    public function chargeLeSite()
    {
        if(isset($_GET['action']))
        {

        }
        else
        {
            $accueil=new Vue("accueil");
            $accueil->load(array());
        }
      
    }

}