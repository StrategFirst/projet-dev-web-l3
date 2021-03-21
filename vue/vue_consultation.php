<h1>Consultations des rencontres </h1>

<?php
require_once "modele/database.php";
$BDD = new ModeleBDD();

if(isset($_GET['matchid'])) {
  echo "Affichage de la convocation pour le match d'id : {$_GET['matchid']}";
} else {
  $ListeConvo = $BDD->getMatchAvecConvocation();
  if(sizeof($ListeConvo) === 0) {
    echo "Aucune convocation publié à ce jour";
  } else {
    echo "<ul>\n";
    foreach ($ListeConvo as $Convocation) {
      echo '<li> <a href="./?action=consult&matchid='.$Convocation["id"].'">' . (
        'Le ' . $Convocation["date"] .
        " match de " . $Convocation["equipe_locale"] .
        " contre " . $Convocation["equipe_adverse"] .
        " de type " . $Convocation["competition"] ) .
        "</li></a>\n";
    }
    echo "</ul>\n";
  }
}
?>
