<?php
class ModeleBDD // class utilisée pour se co a la BDD
{
    private $bdd;

    // contructeur instantie le pdo
    function __construct() {
      $config = parse_ini_file('../config.ini');
      $dsn = "{$config["bddtype"]}:dbname={$config["bddname"]};host={$config["bddhost"]}";
      $user = $config["bdduname"];
      $password = $config["bddupass"];
      $this->bdd = new PDO($dsn,$user,$password);
      if( ! $this->test = $this->bdd->query('SELECT * FROM admin') ) {
        $this->init_bdd();
      }
    }

    private function init_bdd() {
      $this->bdd->query($file_get_contents('../BDD/convsport.sql'));
    }

    //fonction par requete : QueryAdmin => retourne le tableau des admins (mdp id ect)
    private function getBdd()
    {
        if($this->bdd==null)
        {
            //creation du pdo
            $this->bdd = new PDO('mysql:host=localhost;port=3308;dbname=convsport;',       
            'root', '',
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));     
             }
        return $this->bdd;
    } 

    public function getAdmin() //retourne la table des id + mdp 
    {
        $qry='SELECT * from admin';
        
        return $this->getBdd()->query($qry);
    }


}; 

?>
