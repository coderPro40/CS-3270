<?php
require_once 'page.php';
session_start();    // start game session

// this page is for creating the board and setting all predeteremed polyps on the board and moving the board object
$playerNo = filter_input(INPUT_POST, 'players');    // gets # of players chosen by player
$loc = filter_input(INPUT_GET, 'location');
$brd = filter_input(INPUT_GET, 'boardNo');
$obc = filter_input(INPUT_GET, 'objColor');
$obj = filter_input(INPUT_GET, 'object');

// get board object if isset
if($playerNo < 2){
    $hold = $_SESSION['brdObject0'];
    $game = unserialize($hold);
}
else{
    $game = new page($playerNo);
    $game->designGameBrds();
}
$choices = array(1, 3, 4, 5);                       // choices
try{
    $game->start();
    $game->preMenu();
    $game->menu($choices);
    $game->postMenuBeg();
    $game->gameBrdNDTilesBeg();
    $game->displayGameBrds(1, $obc, $loc, $obj, $brd);
    $game->gameBrdNDTilesEnd();
    $game->postGameBoardsNTiles();
    $game->postGameBoards();
    $game->stop();
    $hold = serialize($game);                       // convert board object to string rep
    $_SESSION["brdObject0"] = $hold;                 // store board object's memory location in session variable
    if(($game->noPlayers * 5) <= ($game->getPosCounter())){throw new exception('done');}
} catch (Exception $e ) {
    // move to next page
    $hold = serialize($game);                                   // convert board object to string rep
    file_put_contents('brd0', $hold);                            // store board object's memory location in file 
    $_SESSION['config'] = 0;                                    // set config to 0 to create player objects
    echo "<a href='configure.php' style='text-align: center;'>
    <h1>FINISHED WITH TILES</h1>
    </a>";	                                                    // move to configure page. Now just trying to get configure to look presentable

//   $newAry = array(array(), array());                                   // hold arrays to be transferred
//   $blndAry = array(array(), array());
//   for($k = 0; $k < 2; $k++){                                           // storing array for integration for now
//       for($l = 0; $l < count($game->boardNo[$k]); $l++){
//           if($game->boardNo[$k][$l] == 'x' ||
//             $game->boardNo[$k][$l] == '_'){
//               $newAry[$k][$l] = $game->boardNo[$k][$l];
//               $blndAry[$k][$l] = $game->boardNo[$k][$l];
//               continue;
//           }
//           $blndAry[$k][$l] = '';                                       // just bland values/ for shrimp board
//           if(count($game->boardNo[$k][$l]) < 1){
//               $newAry[$k][$l] = '';
//               continue;
//           }
//           for($m = 0; $m < count($game->boardNo[$k][$l]); $m++){
//               $newAry[$k][$l] = $game->boardNo[$k][$l][$m]->myColor;
//           }
//       }
//   }
//   $_SESSION['first'] = $newAry[0];
//   $_SESSION['second'] = $newAry[1];
//   $_SESSION['bFirst'] = $blndAry[0];
//   $_SESSION['bSecond'] = $blndAry[1];
//   $_SESSION['divOne'] = $game->displayAry[3];
//   $_SESSION['divTwo'] = $game->displayAry[22];
//   $_SESSION['startG'] = 1;                                             // for starting new game, unset old session variables
//   header('Location:HW7DB/hw7db.php');	                                // move to hw7 page. Now just trying to configure hw7db to look like main
//     exit;
}