<?php 
require_once './../modele/database.php';

$BDD=new modeleBDD();

$input = json_decode(file_get_contents('php://input'), true);
var_dump($input);

$BDD->DelMatch($input['id']);

?>