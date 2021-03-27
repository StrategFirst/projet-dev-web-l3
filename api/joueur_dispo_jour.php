<?php
require_once '../modele/database.php';
$BDD = new ModeleBDD();
header('Content-Type: application/json');
if(isset($_GET['date'])) {
  $date = $_GET['date'];
} else if (
   isset($_GET['day']) and
   isset($_GET['month']) and
   isset($_GET['year'])
 ) {
   $date = "{$_GET['year']}-{$_GET['month']}-{$_GET['day']}";
 } else {
   $date = (new DateTime())->format('Y-m-d');
 }
echo json_encode($BDD->getJoueurDispoLeJour($date));

?>
