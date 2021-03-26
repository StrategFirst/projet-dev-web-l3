<?php
if( (!isset($_SESSION['role'])) ||  ($_SESSION['role']!='entraineur') ) {
  header('Location: /?mustlogin=true');
  die();
}

require_once "modele/database.php";
$BDD = new ModeleBDD();
?>

<h1> Création convocations </h1>

<?php
function getday($element) {
    return $element['date']->format('z');
}
function mapday($element) {
  $element['date'] = (new DateTime($element['date']));
  return $element;
}
$query = array_map('mapday',$BDD->getMatchSansConvocation());
$listJour = array_unique(array_map('getday',$query));
echo '<select id="journee">';
foreach($listJour as $value) {
  echo "<option value=\"${value}\">Journée ${value}</option>";
}
echo '</select>';
function special($match) {
  return '{
    "id":'.$match['id'].',
    "lieu":"'.$match['lieu'].'",
    "date":'.date_timestamp_get($match['date']).',
    "terrain":"'.$match['terrain'].'",
    "equipe_adverse":"'.$match['equipe_adverse'].'",
    "equipe_locale":"'.$match['equipe_locale'].'",
    "competition":"'.$match['competition'].'",
    "journee":'.$match['date']->format('z').'

  }
  ';
}
echo '<script>';
echo 'const data = ['. join(',',array_map('special',$query)) .']';
echo '
function setFromData(journee) {
  document.getElementById("slotjournee").innerText=data.filter(e=>e.journee==journee).map(k=>k.toString()).join`<br/>`;
    console.log(document.getElementById("slotjournee").innerText);
}
';
echo 'document.querySelector("#journee").addEventListener("change",
  e => setFromData(e.target.value)
);
document.querySelector("#journee").addEventListener("click",
  e => setFromData(e.target.value)
)';
echo '</script>';
echo '<div id="slotjournee">';

echo '</div>';
?>
