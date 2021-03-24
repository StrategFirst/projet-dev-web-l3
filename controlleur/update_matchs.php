<?php 
require_once './../modele/database.php';

$BDD=new ModeleBDD(); 

if(isset($_POST))
{
    $id=$_POST['id'];
    
    $competition=preg_replace("/[*]/"," ",$_POST['competition']);
    
    $equipe_locale=preg_replace("/[*]/"," ",$_POST['equipe_locale']);
    $equipe_adverse=preg_replace("/[*]/"," ",$_POST['equipe_adverse']);
    
    
    $date=$_POST['jour']." ".$_POST['heure'].":00";
    $terrain=preg_replace("/[*]/"," ",$_POST['terrain']);
    $lieu=preg_replace("/[*]/"," ",$_POST['lieu']);

    

     $BDD->updateMatch($competition,$equipe_locale,$equipe_adverse,$date,$terrain,$lieu,$id); 
  

}
else
//cas d'erreurs
?>