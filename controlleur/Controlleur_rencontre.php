<?php 

class Controlleur_rencontre
{
    private $BDD;

    public function __construct()
    {
      $this->BDD=new ModeleBDD();
    }
    //affiche la vue de lecture des rencontres pour l'entrainneur
    public function affiche_lecture()
    {
        session_start();
        $vue_rencontre=new Vue("rencontre_lecture");
        $matchs=$this->BDD->getMatchs();
        $vue_rencontre->load(array('matchs'=>$matchs)); // lui passer les matchs en parametre
    }

    public function affiche_edition()
    {
        session_start();
        $vue_rencontre=new Vue("rencontre_edition");
        $matchs=$this->BDD->getMatchs();
        $competition=$this->BDD->getMatchsCol('competition');
        $equipe_locale=$this->BDD->getMatchsCol('equipe_locale');
        $equipe_adverse=$this->BDD->getMatchsCol('equipe_adverse');
        $terrain=$this->BDD->getMatchsCol('terrain');
        $lieu=$this->BDD->getMatchsCol('lieu');

        $vue_rencontre->load(array('matchs'=>$matchs,'competition'=>$competition,
        'equipe_locale'=>$equipe_locale,'equipe_adverse'=>$equipe_adverse,
        'terrain'=>$terrain,'lieu'=>$lieu));

    }
}
?>