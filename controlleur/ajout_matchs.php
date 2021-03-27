<?php 
require_once (realpath( dirname( __FILE__ ))).'/../modele/database.php';
require_once (realpath( dirname( __FILE__ ))).'/../debug.php';

header('Location: ./../?action=rencontres&mode=edition');// ajouter une option echec pour afficher un message d'erreur &statut=echec

if (isset($_POST['ajout']))
{
     

    $BDD=new ModeleBDD(); 
   

    $date=$_POST['date'].' '.$_POST['heure'].':00';
    // ne pas oublier de fusionner la date et  l'heure
    //$equipe_loc=preg_replace("/[*]/"," ",$_POST['equipe_locale']);
    console_log($equipe_loc);
    //$competition=preg_replace("/[*]/"," ",$_POST['competition']);
    console_log($competition);

    $BDD->addMatch($_POST['competition'],$_POST['equipe_locale'],trim($_POST['equipe_adverse']),
    $date,trim($_POST['terrain']),trim($_POST['lieu']));

   $str="An attente de l'ajout du matchs..";

    echo $str;

}
else {
    echo "erreur le match n'a pas pu être ajouté";
}

?>
<br><a href="../?action=rencontres&mode=edition">cliquer ici si cela prend trop de temps</a>
