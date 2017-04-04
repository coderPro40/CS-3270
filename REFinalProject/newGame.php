<?php
session_start();    // start game session

// start page for RE game
require_once 'page.php';    // import game class

$game = new page();         // closing braces to activate constructor
$choices = array(4);  // choices
$game->start();
$game->preMenu();
$game->menu($choices);
gamePlan();
$game->postGameBoards();
$game->stop();

function gamePlan(){
    echo '<TABLE CELLSPACING="5em" CELLPADDING="5em" WIDTH="100%">';
        echo '<h3>
        Hello again, just one more item to verify (feel free to return to start page whenever with button on top right of screen). <br>
        Choose the number of players for this game: 
        </h3>';
        echo '<form method="post">';
          echo '<input type="radio" name="players" value="2" style="align: center;" checked> Two<br>';
          echo '<input type="radio" name="players" value="3" style="align: center;"> Three<br>';
          echo '<input type="radio" name="players" value="4" style="align: center;"> Four<br><br>';
          echo '<input type="submit" name="sub" value="Choice" formaction="main.php">';
        echo '</form>';
    echo '</TABLE>';
}