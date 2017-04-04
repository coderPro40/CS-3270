<?php
// start page for RE game
require_once 'page.php';    // import game class

$game = new page();         // closing braces to activate constructor
$choices = array(0, 2, 5);  // choices
$game->start();
$game->preMenu();
$game->menu($choices);
greetings();
$game->postGameBoards();
$game->stop();

function greetings(){       // start screen greetings
    echo '<TABLE CELLSPACING="5em" CELLPADDING="5em" WIDTH="100%">';
        // entrance speech
        echo '<TR>';
			echo '<TD ALIGN=CENTER WIDTH="70%"><h3>
			Hello Player, welcome to the game of Reef Encounter. To start a new game simply click on the new game button
			on the top right of the screen. To continue with your previous game, simply click on the load game button at the same
			location. To review the rules click on the rules button. GAME ON!!!
			</h3></TD>';
		echo '</TR>';
		
		// RE image
        echo '<TR>';
        	echo '<TD align="center" height="auto">
        	<IMG SRC="images/RI.gif" STYLE="border: solid 1px black; width: 48%; height: 270%; float: left; margin: 10px 0px 0px 0px;">
        	<IMG SRC="images/RImg.jpg" STYLE="border: solid 1px black; width: 48%; height: 179%; float: right; margin: 10px 0px 0px 0px;">
        	</TD>';
        echo '</TR>';
    echo '</TABLE>';
}