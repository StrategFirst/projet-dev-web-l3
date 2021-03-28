<script src="vue/script/convocations.js"></script>
<?php
if( (!isset($_SESSION['role'])) ||  ($_SESSION['role']!='entraineur') ) {
  header('Location: /?mustlogin=true');
  die();
}

require_once "modele/database.php";
$BDD = new ModeleBDD();
?>

<h1> Création convocations </h1>
<link href="vue/style/convocations.css" type="text/css" rel="stylesheet"/>
<?php
function getday($element) {
    return $element['date']->format('Y/m/d');
}
function mapday($element) {
  $element['date'] = (new DateTime($element['date']));
  return $element;
}
$query = array_map('mapday',$BDD->getMatchSansConvocationPublie());
$listJour = array_unique(array_map('getday',$query));
echo '<select id="journee">';
foreach($listJour as $value) {
  echo "<option value=\"".str_replace('/','',$value)."\">${value}</option>";
}
echo '</select>';
echo '<button onclick="saveConvocation()"> Enregistrer </button>';
echo '<button onclick="submitConvocation()"> Publier </button>';

for($i=0;$i<sizeof($query);$i++) {
  $query[$i]['joueurs'] = json_encode($BDD->getJoueursByConvocation($query[$i]['id']));
}
function special($match) {

  return '{
    "id":'.$match['id'].',
    "lieu":"'.$match['lieu'].'",
    "date":'.date_timestamp_get($match['date']).',
    "terrain":"'.$match['terrain'].'",
    "equipe_adverse":"'.$match['equipe_adverse'].'",
    "equipe_locale":"'.$match['equipe_locale'].'",
    "competition":"'.$match['competition'].'",
    "journee":'.$match['date']->format('Ymd').',
    "joueurs":'.$match['joueurs'].'
  }
  ';
}
echo '<script>';
echo 'const data = ['. join(',',array_map('special',$query)) .'];';
echo 'document.querySelector("#journee").addEventListener("change",
  e => setFromData(e.target.value)
);';
echo '</script>';
echo '<main>';
echo '<div id="slotjournee">';
echo '</div>';
echo '<div id="slotexempt" ondrop="drop(event)" ondragover="allowDrop(event)" class="box">';
echo '</div>';
echo '</main>';

?>
