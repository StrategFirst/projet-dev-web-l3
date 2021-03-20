function destroy_session()
{
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open('GET','./modele/session_destroy.php');
    xmlhttp.responseType='document';
    xmlhttp.onload= function () {
        if (xmlhttp.readyState == 4) {
            if (xmlhttp.status == 200) {
                alert("session detruite");
               // console.log(xmlhttp.response);
               // console.log(xmlhttp.responseText); --> ne marche pas je ne sais pas pourquoi ,
               // je voulais afficher le echo du .php avec l'alerte mais ca marche pas
            }
        }
    };
    xmlhttp.send();
}