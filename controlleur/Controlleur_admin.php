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
        session_start();
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
        $vue_admin->load(array());
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
