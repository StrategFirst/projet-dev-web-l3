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
          <form action="./?action=effectif&mode=edition" method="POST">
            <input type="text" placeholder="nom" required name="nom"/>
            <input type="text" placeholder="prénom" required name="prenom"/>
            <input type="checkbox" name="license"/>
            <input type="submit" value="Ajouter"/>
          </form>
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
  if( $_SESSION['role'] == 'secretaire' ) {
  $joueur = <<<EOJ
    <div class="effectif">
      <h4> {$value['nom']} {$value['prenom']} </h4>
      <span> {$licence} </span>
      <br/>
      <form action="./?action=effectif&mode=edition" method="POST"><input type="hidden" name="id" value="{$value['id']}"/><input type="submit" value="Supprimer"/></form>
      <form action="./?action=effectif&mode=edition" method="POST"><input type="hidden" name="idl" value="{$value['id']}"/><input type="hidden" name="licence" value="{$value['license']}"/><input type="submit" value="Changer license"/></form>
    </div>
EOJ;
} else{
  $joueur = <<<EOJ
    <div>
      <h4> {$value['nom']} {$value['prenom']} </h4>
      <span> {$licence} </span>
    </div>
EOJ;
}
  echo $joueur;
}
?>
</div>
