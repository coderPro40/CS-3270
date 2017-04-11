<?php
session_start();    // start game session

require_once 'page.php';                            // import game class

$playerNo = filter_input(INPUT_POST, 'players');    // gets # of players chosen by player
$loc = filter_input(INPUT_GET, 'location');
$brd = filter_input(INPUT_GET, 'boardNo');
$obc = filter_input(INPUT_GET, 'objColor');
$obj = filter_input(INPUT_GET, 'object');

// get board object if isset
if($playerNo < 2){
    $hold = $_SESSION['brdObject'];
    $game = unserialize($hold);
}
else{
    $game = new page($playerNo);
    $game->designGameBrds();
}
$choices = array(1, 3, 4, 5);                       // choices
try{
    if(($game->noPlayers * 5) <= ($game->getPosCounter())){throw new exception('done');}
    $game->start();
    $game->preMenu();
    $game->menu($choices);
    $game->postMenuBeg();
    $game->gameBrdNDTilesBeg();
    $game->displayGameBrds($obc, $loc, $obj, $brd, 1);
    $game->gameBrdNDTilesEnd();
    $game->postGameBoardsNTiles();
    $game->postGameBoards();
    $game->stop();
    $hold = serialize($game);                       // convert board object to string rep
    $_SESSION["brdObject"] = $hold;                 // store board object's memory location in session variable
} catch (Exception $e ) {
   // create dominance tiles and move to next page
   
}

