<?php 
require_once "vue/Vue.php";

class Controlleur_consult {
    public function consult()
    {
        $vue_consult=new Vue("consultation");
        $vue_consult->load(array()); //variables a passer a la vue exemple type de role
    }
}