<?php
include "controlleur/MainControlleur.php";

session_start();

if(isset($_SESSION["BDD_CHECK"]))
{    
    $Main=new Main();
    $Main->chargeLeSite();
}    
else {
    require "admin/form_connexionBDD.php"; 
}
?>
