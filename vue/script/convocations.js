function submitConvocation() {
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
    '/?action=convocation&ajout=true',
    {
      method: 'POST',
      body: JSON.stringify(joueurs),
      headers: {'Content-Type':'application/json'}
    }
  )
    .then( response => response.text() )
    .then( text => {window.location = window.location;})
    .catch(console.error);
}
