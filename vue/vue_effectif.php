<?php
if(! isset($_SESSION['role']) ) {
  header('Location: /?mustlogin=true');
  die();
}
?>
<h1> Effectifs </h1>

<?php
if( (!isset($_GET['mode'])) || ($_GET['mode'] != 'lecture') ) {
  if( $_SESSION['role'] == 'entraineur' ) {
    $err_msg = "Seul la secrétaire peut éditer cela";
    $err_code = 003;
    require "erreur_box.php";
  } else {
    $addField = <<<EOT
        <div class="box">
          <h3> Ajouter </h3>
          <input type="text" placeholder="nom" required/>
          <input type="text" placeholder="nom" required/>
          <input type="checkbox"/>
          <input type="submit" value="Ajouter"/>
        </div>
EOT;
  echo $addField;
  }
}
?>

<div class="box">
<h3> Courant </h3>
<?php
require_once "modele/database.php";
$BDD = new ModeleBDD();
foreach ($BDD->getJoueurs() as $value) {
  $licence = $value['license'] ? 'Licencié' : 'Non licencié';
  $joueur = <<<EOJ
    <div>
      <h4> {$value['nom']} {$value['prenom']} </h4>
      <span> {$licence} </span>
    </div>

EOJ;
  echo $joueur;
}
?>
</div>
