function saveConvocation() {
  submitConvocation(false);
}
function submitConvocation(publish) {
  if(publish==undefined){publish=true;}
  console.log(publish);
  let matchs = Array.from(document.querySelectorAll('#slotjournee > div'));
  let joueurs = matchs.map(
    match => ({
      "match_id": match.id.slice(1),
      "player_list_id":
        Array.from(match.querySelectorAll('span.joueur')).map(
          player => player.id.slice(1)
        )
    })
    //les .slice(1) servent à retiré l'indicateur j ou m de l'id qui signigifie s'il s'agit un joueur ou d'un match
  );
  fetch(
    `/?action=convocation&ajout=true&publish=${publish}`,
    {
      method: 'POST',
      body: JSON.stringify(joueurs),
      headers: {'Content-Type':'application/json'}
    }
  )
    .then( response => response.text() )
    .then( text => {console.log(text);window.location = window.location;})
    .catch(console.error);
}


////////////

function setFromData(journee) {
  document.getElementById("slotjournee").innerHTML=data.filter(e=>e.journee==journee).map(MatchToHTML).join`<br/>`;
    setPlayer("25","25","2021",journee);
}

////////

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
async function setPlayer(day,month,year,journee) {
  await fetch('/api/joueur_dispo_jour.php?month=02&day=25&year=2021')
	.then(response=>response.json())
	.then(information=>{
    document.getElementById("slotexempt").innerHTML = '';
    for(let player of information) {
      let find = false;
      let element = document.createElement('span');
      element.classList.add('joueur');
      element.draggable=true;
      element.ondragstart=drag;
      element.id=`j${player.id}`;
      element.innerText = `${player.nom.toUpperCase()} ${player.prenom}`;
      for(let match of data.filter(e=>e.journee==journee)) {
        for(let joueur of match.joueurs) {
          if(joueur.id == player.id) {
            document.querySelector(`#slotjournee > #m${match.id} > .joueurDrop`).appendChild(element);
            find = true;
            break;
          }
        }
        if(find)break;
      }
      if(!find) {
        document.getElementById("slotexempt").appendChild(element);
      }
    }
  });
}
window.addEventListener("load",()=>setFromData(document.querySelector("#journee").value));
