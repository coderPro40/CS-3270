<?php
// start the main game after all configurations
require_once 'page.php';
session_start();        // continue game session
// unset($_SESSION['config2']);

$act = 0;
$result = 0;
$bCount = 2;                                    // track brd saved

// set player turn if not set
$_SESSION['playerT'] = (isset($_SESSION['playerT']))?
        $_SESSION['playerT']: 0;
// get board object if isset
if(isset($_SESSION['config2']) and $_SESSION['config2'] >= 1){
    $hold = $_SESSION['brdObject2'];
    $game = unserialize($hold);
    $act = filter_input(INPUT_GET, 'act');
}
else{
    $hold = file_get_contents('brd0');          // get file from config
    $game = unserialize($hold);
    $hold = serialize($game);                   // convert board object to string rep
    file_put_contents('brd'.$bCount, $hold);    // save to file
}
$choices = array(3, 4, 5, 6);                // choices
foreach($choices as $set){
    if($set == 6){
        $newAry = array(array(), array());                                   // hold arrays to be transferred
        $blndAry = array(array(), array());
        for($k = 0; $k < 2; $k++){                                           // storing array for integration for now
          for($l = 0; $l < count($game->boardNo[$k]); $l++){
              if($game->boardNo[$k][$l] == 'x' ||
                $game->boardNo[$k][$l] == '_'){
                  $newAry[$k][$l] = $game->boardNo[$k][$l];
                  $blndAry[$k][$l] = $game->boardNo[$k][$l];
                  continue;
              }
              $blndAry[$k][$l] = '';                                       // just bland values/ for shrimp board
              if(count($game->boardNo[$k][$l]) < 1){
                  $newAry[$k][$l] = '';
                  continue;
              }
              for($m = 0; $m < count($game->boardNo[$k][$l]); $m++){
                  $newAry[$k][$l] = $game->boardNo[$k][$l][$m]->myColor;
              }
          }
        }
        $_SESSION['first'] = $newAry[0];
        $_SESSION['second'] = $newAry[1];
        $_SESSION['bFirst'] = $blndAry[0];
        $_SESSION['bSecond'] = $blndAry[1];
        $_SESSION['divOne'] = $game->displayAry[3];
        $_SESSION['divTwo'] = $game->displayAry[22];
        $_SESSION['startG'] = 1;                                             // for starting new game, unset old session variables
    }
}
try{
    if($act == 'reset'){
        $hold = file_get_contents('brd'.$bCount);   // get initial brd object
        $game = unserialize($hold);                 // reset game turn
        $act = 0;                                   // display board
    }
    if($game->gRound != $_SESSION['playerT']){
        $game->startAction();                       // create actions
        $hold = serialize($game);                   // convert board object to string rep
        file_put_contents('brd'.$bCount, $hold);    // save to file
        $_SESSION['playerT'] = $game->gRound;       // set to value
    }
    $game->performActions($act);
    $game->start();
    $game->preMenu();
    $game->menu($choices);
    $game->postMenuBeg();
    $game->prePlayer();
    $game->showPMenu();                     // display player options
    $game->showBehindYourScreen();          // display behind player's screen
    $game->postPlayer();
    $game->showAction($act);                // display actions
    $game->gameBrdNDTilesBeg();
    $game->showDominance();                 // display dominance tiles
    $game->showOpensea();                   // display openSeaBoard
    $game->displayGameBrds($result);
    $game->gameBrdNDTilesEnd();
    $game->postGameBoardsNTiles();
    $game->postGameBoards();
    $game->stop();
    $hold = serialize($game);               // convert board object to string rep
    $_SESSION["brdObject2"] = $hold;
    $_SESSION['config2'] = 1;               // set config to 1 to prevent recreating player objects
} catch (Exception $e ) {
}
?>