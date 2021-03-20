<?php
require_once "vue/Vue.php";



class Controlleur_admin {

    private $role;
    public function __construct()
    {
        $this->role="visiteur";
    }
    public function affichage()
    {
       
        if(isset($_SESSION["role"]))
        {
            $this->role=$_SESSION["role"];
        }
        else 
        {
            $this->role="visiteur";
        }
        switch($this->role)
        {
            case "visiteur" :
                $vue_admin=new Vue("administration");
                break;
            case "entraineur":
                $vue_admin=new Vue("administration_entraineur");
                break;
            case "secretaire":
                $vue_admin=new Vue("administration_secretaire");
                break;

        }
        $vue_admin->load(array()); //variables a passer a la vue exemple type de role
        
    }

public function setRole(string $role)
{
    $this->role=$role;
}
public function getRole()
{
    return $this->role;
}
}

?>
