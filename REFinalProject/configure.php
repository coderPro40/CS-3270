<?php
    // configure all setting for the game such as player's cube to parrot fish and larva cubes also open seaboards
    require_once 'page.php';
    session_start();        // continue game session
    // unset($_SESSION['config']);
    
    // for when player has chosen polyp for parrot fish and initial larva cubes
    $polyp = (isset($_POST['pyrPolyp']))? $_POST['pyrPolyp']: mt_rand(0, 4);
    unset($_POST['pyrPolyp']);                      // unset post for next round
    $lar1 = -1; $lar2 = -1;
    $larva = array(&$lar2, &$lar1);                 // mem location of variables
    for($i = 0; $i < 5; $i++){
        if(isset($_POST['lar'.($i + 1)])){
            $larva[(count($larva) - 1)] = $_POST['lar'.($i + 1)];
            array_pop($larva);                      // remove from end of array
        }
        unset($_POST['lar'.($i + 1)]);              // unset post for next round
    }
    $steps = count($larva);
    for($i = 0; $i < $steps; $i++){
        $larva[(count($larva) - 1)] = mt_rand(0, 4);
        array_pop($larva);                          // remove from end
    }
    
    // get board object from main.php or from this page
    $hold = ($_SESSION['config'] == 0)? file_get_contents('brd0'): $_SESSION['brdObject1'];
    $game = unserialize($hold);
        
    // file_put_contents('brd', $hold);
    
    $choices = array(5);    // choices
    if($_SESSION['config'] == 0){
        $game->startPlayer();                   // create player objects
        $game->startDominance();                // create dominance tiles
        $game->startOpensea();                  // create openSeaBoard
        $game->startAction();                   // create actions
    }
    try{
        $game->start();
        $game->preMenu();
        $game->menu($choices);
        $game->postMenuBeg();
        $game->prePlayer();
        $game->showPMenu($polyp, $lar1, $lar2); // display player options
        $game->postPlayer();
        $game->gameBrdNDTilesBeg();
        $game->showDominance();                 // display dominance tiles
        $game->showOpensea();                   // display openSeaBoard
        $game->displayGameBrds(0);
        $game->gameBrdNDTilesEnd();
        $game->postGameBoardsNTiles();
        $game->postGameBoards();
        $game->stop();
        $hold = serialize($game);               // convert board object to string rep
        $_SESSION["brdObject1"] = $hold;
        $_SESSION['config'] = 1;                // set config to 1 to prevent recreating player objects
        if($game->noPlayers <= ($game->gTurn)){throw new exception('done');}
    } catch (Exception $e ) {
        // In the case that OSboards, tiles, larva and polyp have been configured to next page
        // session_unset();                             // unset all session variables
        $hold = serialize($game);                       // convert board object to string rep
        file_put_contents('brd0', $hold);               // store board object's memory location in file 
        $_SESSION['config2'] = 0;
        echo "<a href='game.php' 
        style='text-align: center;'>
        <h1>FINISHED WITH CONFIGURATION</h1>
        </a>";	                                        // move to game page. Now the game begins
    }