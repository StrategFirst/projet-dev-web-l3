<?php
require_once "vue/Vue.php";
require_once "modele/database.php";
class Controlleur_convocation {
    public function affichage()
    {
        session_start();
        $vue_consult=new Vue("convocation");
        $vue_consult->load(array()); //variables a passer a la vue exemple type de role
    }

    public function update()
    {
      $BDD = new ModeleBDD();
    }

    public function ajout()
    {
        session_start();
        $BDD = new ModeleBDD();
        $config = parse_ini_file((realpath(dirname(__FILE__))).'/../config.ini');
        $first = true;
        foreach(json_decode(file_get_contents('php://input')) as $match) {
          $match =get_object_vars($match);
          if($first){echo $BDD->deleteConvocationSameDayAs($match['match_id']);$first=false;}
          $MatchID = intval($match['match_id']);
          $PlayerIDlist = array_map('intval',$match['player_list_id']);
          if($config['minteamsize']<=sizeof($PlayerIDlist) && sizeof($PlayerIDlist)<=$config['maxteamsize']) {
            array_walk($PlayerIDlist,array($this, 'ajout_une'),["MatchID"=>$MatchID,"BDD"=>$BDD]);
          } else {
            http_response_code(405);
            die();
          }
        }
    }
    private function ajout_une($player,$key,$data)
    {
      $ModeleBDD = $data['BDD'];
      $MatchID = $data['MatchID'];
      $PlayerID = $player;

      $ModeleBDD->addConvocations($MatchID,$PlayerID);
    }
}

?>
