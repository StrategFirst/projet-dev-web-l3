<?php 
require_once (realpath( dirname( __FILE__ ))).'/../modele/database.php';

if (isset($_POST['ajout']))
{

    $BDD=new ModeleBDD(); 
   

    $date=$_POST['date'].' '.$_POST['heure'].':00';
    // ne pas oublier de fusionner la date et  l'heure
    $BDD->addMatch($_POST['competition'],$_POST['equipe_locale'],$_POST['equipe_adverse'],
    $date,$_POST['terrain'],$_POST['lieu']);

   $str="Vous avez bien ajouter le match suivant : ".
   $_POST['competition'].", ".$_POST['equipe_locale'].", ".$_POST['equipe_adverse'].", "
   .$date.", ".$_POST['terrain'].", "
   .$_POST['lieu'];

    echo $str;

}
else {
    echo "erreur le match n'a pas être ajouté";
}
// recupère les données avec $_POST et ajoute / update la table
?>
<a href="../?action=rencontres&mode=edition">retour a l'edition</a>
