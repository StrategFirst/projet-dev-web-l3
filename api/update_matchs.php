<?php 
require_once './../modele/database.php';

$BDD=new ModeleBDD(); 

if(isset($_POST))
{
    $id=$_POST['id'];
    
    $competition=trim($_POST['competition']);
    
    $equipe_locale=trim($_POST['equipe_locale']);
    $equipe_adverse=trim($_POST['equipe_adverse']);
    
    
    $date=$_POST['jour']." ".$_POST['heure'].":00";
    $terrain=trim($_POST['terrain']);
    $lieu=trim($_POST['lieu']);

    

     $BDD->updateMatch($competition,$equipe_locale,$equipe_adverse,$date,$terrain,$lieu,$id); 
  

}
else
//cas d'erreurs
?>