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
  document.getElementById("slotjournee").innerHTML=data.filter(e=>e.journee==journee).map(MatchToHTML).join`<br/>`;
    setPlayer("25","25","2021");
}
';
echo 'document.querySelector("#journee").addEventListener("change",
  e => setFromData(e.target.value)
);
document.querySelector("#journee").addEventListener("click",
  e => setFromData(e.target.value)
)
const MatchToHTML = d =>
`<div id="m${d.id}" class="box">
	<div class="joueurDrop" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
	<div>
		<p> Pour le match de ${d.equipe_locale} contre ${d.equipe_adverse} de type ${d.competition} le ${new Date(d.date).toLocaleString()} à ${d.lieu} sur le terrain ${d.terrain} </p>
	</div>
</div>`
function allowDrop(ev) {
  ev.preventDefault();
}

function drag(ev) {
  ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev) {
  ev.preventDefault();
  let data = ev.dataTransfer.getData("text");
  ev.target.appendChild(document.getElementById(data));
}
async function setPlayer(day,month,year) {
  document.getElementById("slotexempt").innerHTML =
  await fetch(\'/api/joueur_dispo_jour.php?month=02&day=25&year=2021\')
	.then(response=>response.json())
	.then(data=>data
			.map(info=>`<span class="joueur" draggable="true" ondragstart="drag(event)" id="j${info.id}">${info.nom.toUpperCase()} ${info.prenom}</span>`)
			.join` `)
}
';
echo '</script>';
echo '<main>';
echo '<div id="slotjournee">';
echo '</div>';
echo '<div id="slotexempt" ondrop="drop(event)" ondragover="allowDrop(event)" class="box">';
echo '<h4> Joueur exempt </h4>';
echo '</div>';
echo '</main>';

?>
