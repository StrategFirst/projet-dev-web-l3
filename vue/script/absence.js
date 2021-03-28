
function udpate(event)
{
   let date=event.target.parentNode.querySelector("input[name=\"date\"]").value;
   let row =event.target.parentNode.parentNode;
   let id=row.firstElementChild.id; 
   let etat=event.target.value;

   let params=("date="+date+"&id="+id+"&etat="+etat);

    fetch("./api/update_absence.php", {
        method : 'post',
        header :{ 'Content-Type': 'application/x-www-form-urlencoded'},
        body : new URLSearchParams(params)
    }).
    then(function(response){
        console.log(response);
    })

}