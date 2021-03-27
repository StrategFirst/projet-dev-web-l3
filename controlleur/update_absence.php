<?php 
require_once (realpath( dirname( __FILE__ ))).'/../modele/database.php';
require_once (realpath( dirname( __FILE__ ))).'/../debug.php';

$BDD = new ModeleBDD ();

var_dump($_POST);


//formattage de la date
$dt=preg_split("/\//",$_POST['date']);
$mois=(strlen($dt[1])==2) ?  $dt[1]: ("0".$dt[1]); 
$jour=(strlen($dt[0])==2) ? $dt[0]  : ("0".$dt[0]) ;
$date="2021-".$mois."-".$jour;

//si status =null on supprime de la table
if($BDD->getAbsence($_POST['id'],$date)!=null)
{
  if($_POST['etat']=="null")
  {
    $BDD->DeleteAbsence($_POST['id'],$date);
  }
  else {
    $BDD->setAbsence($_POST['id'],$date,$_POST['etat']);
  }
}
else 
{
    if($_POST['etat']!="null")
    {
       $BDD->AddAbsence($_POST['id'],$date,$_POST['etat']);
    }
    //sinon on ne fait rien
}

//$BDD->setAbsence($_POST['id'],$date,$_POST['etat']);


?>