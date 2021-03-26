<?php
class ModeleBDD // class utilisée pour se co a la BDD
{
    private $bdd;

    // contructeur instantie le pdo
    function __construct() {
      $config = parse_ini_file((realpath(dirname(__FILE__))).'/../config.ini');
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

    public function getMatchsCol($col)
    {
      $Query="SELECT $col FROM matchs";
     return $this->bdd->query($Query)->fetchAll(PDO::FETCH_ASSOC);
    }


    //ne marche pas mais la requete fonctionne avec MySqL

   /* public function getMatchsEnum($col)
    {
      $Query="SELECT column_type FROM information_schema.COLUMNS
      WHERE TABLE_NAME = 'matchs'
          AND COLUMN_NAME = '$col' ";
          return $this->bdd->query($Query)->fetch(PDO::FETCH_ASSOC);
    }
    */

    public function getMatchById($matchID) {
      if(is_numeric($matchID)) {
        $Query = "SELECT * FROM matchs WHERE id = {$matchID}";
        return $this->bdd->query($Query)->fetch(PDO::FETCH_ASSOC);
      } else {
        throw new ErrorException("SQL injection protection triggered");
      }

    }

    public function addMatch($competition,$equipe_locale,$equipe_adverse,$date,$terrain,$lieu) {
      $Insert=$this->bdd->prepare("INSERT INTO matchs (lieu,terrain,date,equipe_adverse,equipe_locale,competition)
      VALUES (:lieu,:terrain,:date,:equipe_adverse,:equipe_locale,:competition)");
      $Insert->bindParam(':lieu',$lieu);
      $Insert->bindParam(':terrain',$terrain);
      $Insert->bindParam(':date',$date);
      $Insert->bindParam(':equipe_adverse',$equipe_adverse);
      $Insert->bindParam(':equipe_locale',$equipe_locale);
      $Insert->bindParam(':competition',$competition);
      $Insert->execute();
    }

    public function updateMatch($competition,$equipe_locale,$equipe_adverse,$date,$terrain,$lieu,$id)
    {

      $Query=$this->bdd->prepare("UPDATE matchs SET
      competition=:competition,equipe_locale=:equipe_locale,
      equipe_adverse=:equipe_adverse,date=:date,
      terrain=:terrain,lieu=:lieu
      WHERE id=:id");

      $Query->bindParam(':competition',$competition);
      $Query->bindParam(':equipe_locale',$equipe_locale);
      $Query->bindParam(':equipe_adverse',$equipe_adverse);
      $Query->bindParam(':date',$date);
      $Query->bindParam(':terrain',$terrain);
      $Query->bindParam(':lieu',$lieu);
      $Query->bindParam(':id',$id);

      $Query->execute();
      $Query->debugDumpParams();



    }

    public function getMatchAvecConvocation() {
      $Query = "SELECT m.* FROM matchs AS m JOIN convocations AS c ON m.id = c.id_match GROUP BY c.id_match";
      return $this->bdd->query($Query)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function DelMatch($id)
    {
      $Query="DELETE from matchs WHERE id=$id";
      $this->bdd->query($Query);
    }

    //Table joueurs
    public function removeJoueur(int $id) {
      $Remove=$this->bdd->prepare("DELETE FROM joueurs WHERE id = :id");
      $Remove->bindParam(':id',$id);
      return $Remove->execute();
    }

    public function addJoueur(string $nom,string $prenom,$license) {
      $Insert=$this->bdd->prepare("INSERT INTO joueurs (nom,prenom,license) VALUES (:name,:firstname,:licence)");
      $Insert->bindParam(':name',$nom);
      $Insert->bindParam(':firstname',$prenom);
      $Insert->bindParam(':licence',$license);
      $Insert->execute();
    }

    public function getJoueurs()
    {
      $Query="SELECT * FROM joueurs";
      return $this->bdd->query($Query)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getJoueursByConvocation($matchID) {
      if(is_numeric($matchID)) {
        $Query = "SELECT j.* FROM joueurs AS j JOIN convocations AS c ON j.id = c.id_joueur WHERE c.id_match = {$matchID}";
        return $this->bdd->query($Query)->fetchAll(PDO::FETCH_ASSOC);
      } else {
        throw new ErrorException("SQL injection protection triggered");
      }
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
