function destroy_session()
{
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open('GET','./modele/session_destroy.php');
    xmlhttp.responseType='document';
    xmlhttp.onload= function () {
        if (xmlhttp.readyState == 4) {
            if (xmlhttp.status == 200) {
                window.location.href= "/";
            }
        }
    };
    xmlhttp.send();
}
