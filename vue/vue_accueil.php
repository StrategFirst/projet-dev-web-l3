<?php
//pour s'assurer que la base de données est initialisé lors de la première visite sur le site
require_once (realpath( dirname( __FILE__ ))).'/../modele/database.php';
$BDD = new ModeleBDD();
?>

    <h1>Bienvenue sur le site de Charles et Mathieu ! </h1>
