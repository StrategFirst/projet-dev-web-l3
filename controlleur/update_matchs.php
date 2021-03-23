<?php 
require_once './../modele/database.php';

$BDD=new ModeleBDD(); 

if(isset($_POST))
{
    foreach($_POST as $key=>$val) //pas ultra clean mais marche 
    {
        if($key=="id")
        {
            $id=$val;
        }
        
        else{
        $value=preg_replace("/[*]/"," ",$val);
        echo $BDD->updateMatch($key,$value,$id);
        }

    }
}
else
//cas d'erreurs
?>