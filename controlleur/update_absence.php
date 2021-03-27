<?php 
require_once (realpath( dirname( __FILE__ ))).'/../modele/database.php';
require_once (realpath( dirname( __FILE__ ))).'/../debug.php';

$BDD = new ModeleBDD ();

var_dump($_POST);

//if status=null on supprime ce n-uplet de la table

//formattage de la date
$dt=preg_split("/\//",$_POST['date']);
$mois=(strlen($dt[1])==2) ?  $dt[1]: ("0".$dt[1]); 
$jour=(strlen($dt[0])==2) ? $dt[0]  : ("0".$dt[0]) ;

$date="2021-".$mois."-".$jour;

//verifier si absnece existe on set sinon on ajoute
$BDD->setAbsence($_POST['id'],$date,$_POST['etat']);


?>