<?php
class ModeleBDD // class utilisée pour se co a la BDD
{
    private $bdd;

    // contructeur instantie le pdo
    function __construct() {
      $config = parse_ini_file('config.ini');
      $dsn = "{$config["bddtype"]}:dbname={$config["bddname"]};host={$config["bddhost"]};port={$config["bddport"]}";
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


    //Table admin
    public function getAdmin() {
      $Query = "SELECT * FROM admin";
      return $this->bdd->query($Query)->fetchAll(PDO::FETCH_ASSOC);
    }

    //Table matchs
    public function getMatchs()
    {
      $Query="SELECT * FROM matchs";
      return $this->bdd->query($Query)->fetchAll(PDO::FETCH_ASSOC);
    }

    //Table joueurs  
    public function getJoueurs()
    {
      $Query="SELECT * FROM joueurs";
      return $this->bdd->query($Query)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addJoueur(string $nom,string $prenom,$license) //license 0 ou 1 si libre ou pas
    {
      $Query = 'insert into joueurs values(:nom,:prenom,:license);';
      $prep=$this->bdd->prepare($Query,array(PDO::ATTR_CURSOR=>PDO::CURSOR_FWDONLY));
      $prep->bindparam(':nom',$nom);
      $prep->bindparam(':prenom',$prenom);
      $prep->bindparam(':license',$license);
      $prep->execute();
    }

    //Table absences
    public function getAbsences()
    {
      $Query="SELECT * FROM absence";
      return $this->bdd->query($Query)->fetchAll(PDO::FETCH_ASSOC);
    }

    function setAbsence($idjoueur,$date,$status) //status= A,B,N,S
    {
      $Query = 'UPDATE absences set status =:statu where id= :idjoueur and date= :date';
      $prep=$this->bdd->prepare($Query,array(PDO::ATTR_CURSOR=>PDO::CURSOR_FWDONLY));
      $prep->bindparam(':statu',$status);
      $prep->bindparam(':date',$date);
      $prep->bindparam(':idjoueur',$idjoueur);
      $prep->execute();
    }
};

?>
