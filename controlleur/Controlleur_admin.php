<?php 
require_once "vue/Vue.php";


class Controlleur_admin {
    public function admin()
    {
        $vue_admin=new Vue("administration");
        $vue_admin->load(array()); //variables a passer a la vue exemple type de role
    }
}