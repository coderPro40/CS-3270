<?php
session_start();    // start game session

// yet to be implemented main game page for RE
require_once 'page.php';    // import game class

$playerNo = filter_input(INPUT_POST, 'players');    // gets # of players chosen by player
$game = new page($playerNo);                        // closing braces to activate constructor
$choices = array(1, 3, 4, 5);                       // choices
$game->start();
$game->preMenu();
$game->menu($choices);
$game->postMenuBeg();
$game->gameBrdNDTilesBeg();
$game->showGameBrds();
$game->gameBrdNDTilesEnd();
$game->postGameBoardsNTiles();
$game->postGameBoards();
$game->stop();
