//partie delete

Array.from(document.querySelector("#contenu table").
querySelectorAll(".deleteButton")).
forEach(elt => elt.addEventListener('click',supprime));

function supprime(event){

    let row=event.target.parentNode.parentNode;
    let ident=row.id.substring(1,row.id.length);
    let id ={id:ident};
   

   
    fetch("./api/supprime_matchs.php",{
        method: 'post',
        header :{ 'Content-Type': 'application/json'},
        body: JSON.stringify(id)

    }).
    then(function(response){
        console.log(response);
        
        
        alert("La suppression s'est bien effectuée !");
        document.location.reload();
    })
    

}


//partie update

Array.from(document.querySelector("#contenu table").
querySelectorAll(".updateButton")).
forEach(elt => elt.addEventListener('click',update));

function update(event){

    let row=event.target.parentNode.parentNode;
    let ident=row.id.substring(1,row.id.length);
    

    let urlparams="id="+ident;
    Array.from(row.querySelectorAll("select")).forEach(function(select){ 
        urlparams +="&"+String(select.name)+"="+String(select.value)

    });
    Array.from(row.querySelectorAll("input")).forEach(input=>
        urlparams+="&"+String(input.name)+"="+String(input.value));
   

   console.log(urlparams);
    fetch("./api/update_matchs.php",{
        method: 'post',
        header :{ 'Content-Type': 'application/x-www-form-urlencoded'},
        body: new URLSearchParams(urlparams)

    }).
    then(function(response){
        console.log(response);
       
        
        alert("La modification s'est bien effectuée !");
        document.location.reload(); 
    }) 
    

}