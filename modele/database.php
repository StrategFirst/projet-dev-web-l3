<?php
class ModeleBDD // class utilisée pour se co a la BDD
{
    private $bdd;

    // contructeur instantie le pdo
    function __construct() {
      $config = parse_ini_file('config.ini');
      $dsn = "{$config["bddtype"]}:dbname={$config["bddname"]};host={$config["bddhost"]}";
      $user = $config["bdduname"];
      $password = $config["bddupass"];
      $this->bdd = new PDO($dsn,$user,$password);
      if( ! $this->test = $this->bdd->query('SELECT * FROM admin') ) {
        $this->init_bdd();
      }
    }

    private function init_bdd() {
      $this->bdd->query($file_get_contents('BDD/convsport.sql'));
    }

<<<<<<< HEAD
    public function getAdmin() {
      $Query = "SELECT * FROM admin";
      return $this->bdd->query($Query)->fetchAll(PDO::FETCH_ASSOC);
    }
    
    //fonction par requete : QueryAdmin => retourne le tableau des admins (mdp id ect)
    private function getBdd()
=======

    public function getAdmin() //retourne la table des id + mdp 
>>>>>>> 82debfe67274d89844d6567366fc7bef345e99d1
    {
        $qry='SELECT * from admin';
        
        return $this->bdd->query($qry);
    }


}; 

?>
