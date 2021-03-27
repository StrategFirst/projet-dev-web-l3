<h1>Consultations des rencontres </h1>

<?php
require_once "modele/database.php";
$BDD = new ModeleBDD();

if(isset($_GET['matchid'])) {
  if(is_numeric($_GET['matchid'])) {
    function printJoueur($carry, $item) {
      return $carry . "<li>" . strtoupper($item["nom"]) . ' ' . $item['prenom'] . '</li>';
    }
    $MatchInfo = $BDD->getMatchById($_GET['matchid']);
    $JoueurDuMatch =  array_reduce($BDD->getJoueursByConvocation($_GET['matchid']),"printJoueur","");
    $string = <<<EOT
    <pre>
      Convocation pour le match du {$MatchInfo['date']} à {$MatchInfo['lieu']}

      Information du match :
        Terrain : {$MatchInfo['terrain']}
        Équipe local : {$MatchInfo['equipe_locale']}
        Équipe adverse : {$MatchInfo['equipe_adverse']}
        Type de match : {$MatchInfo['competition']}

      Joueur convoqué :
        <ul> {$JoueurDuMatch} </ul>
    </pre>

EOT;
  echo $string;
  } else {
    $err_msg = "Invalid parameters";
    $err_code = 002;
    require "erreur_box.php";
  }
  echo '<a href="./?action=consult" id="retour"> Liste complète </a>';
} else {
  $ListeConvo = $BDD->getMatchAvecConvocationPublie();
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
