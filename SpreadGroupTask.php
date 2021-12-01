<?php

class Players {

    public static function teamPlay ($knights, $score) {
        $player =array();
        $names = array(
            'Juan',
            'Luis',
            'Pedro',
            'hamza',
            'Remo',
            'Muller',
            'Jack',
            'Saif',
            'doe',
            'alex'
            // and so on  
        );
        for ($i=0; $i< $knights; $i++){
                $player['knights'][$i] =$names[rand ( 0 , count($names) -1)].'-'.$i;
                $player['life'][$i] =  $score;
        }
        return $player;
    }
   
}

class Game  {

    public function gamePlay() {
      
        // organizing the team play
        $player = Players::teamPlay(3,7);
        // $player = Players::teamPlay(10,100);

        //  this will check how many knights are alife in game play
        $alivePlayers = count($player['knights']);
        $effectedPlayerid = 0;
        echo "------players----  <br>";
        print_r(  $player['knights'] );
        echo " <br> ------players----  <br>";
        while($alivePlayers != 1) {
        
        // this will throw the random dice number for players
        $dice = rand(1,6);
        $effectedPlayerid =($effectedPlayerid + 1) % $alivePlayers;
        echo " -----dice-play----".$dice;
        $player['life'][$effectedPlayerid] = $player['life'][$effectedPlayerid] - $dice;
        echo " <br>-----player name----";
        print_r(  $player['knights'][$effectedPlayerid] );
        echo " <br>-----player life----";
        print_r(  $player['life'][$effectedPlayerid] );
        echo "---------<br>";

        # here we will see if the player life is low than 0
        if($player['life'][$effectedPlayerid] <= 0){
        
            array_splice($player['life'],$effectedPlayerid,1);
            
            array_splice($player['knights'],$effectedPlayerid,1);

            $alivePlayers -= 1;
        }
        
        }
        echo "<br> <br> <br> winner";
        print_r($player['knights']);
        echo "winner";
    }
}
$obj = new Game();
$obj->gamePlay();

?>