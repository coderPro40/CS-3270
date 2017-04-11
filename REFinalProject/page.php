<?php
define("kEOL", chr(13).chr(10));
require_once 'polyp.php'; require_once 'shrimp.php';
class page {
    // attributes of object
    private $boardNo = array();         // boards selected for game
    private $posCounter = 0;            // position of images for predetermined placement
    public $noPlayers = 0;              // # of players for game
    public $displayAry = array();       // array containing divs for board
    public $disBrdAry = array();
    protected $masterObjAry = array();  // list of all objects in game based on ID
    protected $styleAry = array(        // list of spans for images r & c, and these bits are used to form complete spans
            '<SPAN STYLE="left:', '; top:', '; width:', 'px; height:',
            'px; position:absolute; z-index:', '; font-weight: bold; font-size: 12px;',
            'text-align: center;', '">', '</SPAN>', '<A href="', '</A>'
        );
    protected $links = array(           // list of possible pages to link to 
            'main.php?'
        );
    protected $choiceObj = array();     // possible objects to create
    
    // behaivors of object: use serialize for setting objects to this object and unserialize for getting objects from string state
    public function __construct($noOfBrds=0) {
        // initially with the constructor, there're no boards created.
        $this->noPlayers = $noOfBrds;                   // decide the # of players in the game
        $this->choiceObj[] = serialize(new polyp());    // for polyp objects 
        $this->choiceObj[] = serialize(new shrimp());   // for shirimp objects
   }
   
   public function getPosCounter(){
       return $this->posCounter;            // return current counter of predetermined board
   }
   
   public function start(){    // start game braces
        echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">';
        echo '<HTML LANG="en">';
        echo '<HEAD>';
            echo '<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">';
        echo '<TITLE>Reef Encounter </TITLE>';
        echo '<LINK REL="stylesheet" HREF="pbw.css" TYPE="text/css">';
        echo '</HEAD>';
        echo '<BODY>';
            echo '<script language="JavaScript" type="text/javascript">var ol_width = 60;</script>';
            echo '<DIV ID="overDiv" STYLE="position:absolute; visibility:hidden; z-index:1000;"></DIV>';
            echo '<SCRIPT LANGUAGE="JavaScript" type="text/javascript" SRC="overlib.js"><!-- overLIB (c) Erik Bosrup --></SCRIPT>';
   }
   
   public function preMenu(){           // section before the menu section
            echo '<DIV CLASS=normal_text>';
                echo '<TABLE CELLPADDING=3 CELLSPACING=0 WIDTH="100%">';
		
                // This is the heading which contains the heading all the way up to Rules  
        		echo '<TR>';
        			echo '<TD>';
        				echo '<BR>';
        				    echo '<TABLE CELLSPACING=0 CELLPADDING=0 WIDTH="100%">';
   }
   
   public function postMenuBeg(){
                               echo '<TR>';
                        			echo '<TD COLSPAN=3 BGCOLOR=0066CC HEIGHT=1></TD>';
                        		echo '</TR>';
                        		echo '<TR>';
                        			echo '<TD COLSPAN=3 HEIGHT=1></TD>';
                        		echo '</TR>';
                        		echo '<TR>';
                        			echo '<TD COLSPAN=3>';
                        				echo '<TABLE WIDTH=100% CELLPADDING=0 CELLSPACING=0>';
   }
   
   public function gameBrdNDTilesBeg(){
                                       		echo '<TR VALIGN=TOP>';
                                        		echo '<TD COLSPAN=5>';
                                        			echo '<TABLE CELLSPACING=0 CELLPADDING=0 WIDTH="100%">';
                                        				echo '<TR>';
                                        					echo '<TD CLASS=border>';
                                        						echo '<TABLE CELLSPACING=0 CELLPADDING=3 WIDTH="100%">';
                                        							echo '<TR ALIGN=CENTER>';
                                        								echo "<TD CLASS=border BGCOLOR='#0066CC'><SPAN CLASS=yellow_text_bold>Game Board</SPAN></TD>";
                                        							echo '</TR>';
                                        							echo '<TR>';
                                        								echo '<TD CLASS=border>';
                                        									echo '<TABLE CELLPADDING=0 CELLSPACING=0 WIDTH="100%">';
                                        										echo '<TR>';
                                        											echo '<TD ALIGN=CENTER>';
   }
   
   public function gameBrdNDTilesEnd(){
       // cross functional with gameBrdNDTilesBeg()
                                                                                    echo '</TD>';
                                                                                echo '</TR>';
                                    										echo '</TABLE>';
                                    									echo '</TD>';
                                    								echo '</TR>';
                                    							echo '</TABLE>';
                                    						echo '</TD>';
                                    					echo '</TR>';
                                    				echo '</TABLE>';
                                    			echo '</TD>';
                                    		echo '</TR>';
   }
   
   public function postGameBoardsNTiles(){
       // cross functional with postMenuBeg()
                                        echo '</TABLE>';
                        			echo '</TD>';
                        		echo '</TR>';
   }
   
   public function postGameBoards(){    // section after the entire game board
        // cross functional with preMenu()
                            echo '</TABLE>';
        				echo '<BR>';
        			echo '</TD>';
        		echo '</TR>';
        	echo '</TABLE>';
        	echo '</DIV>';
   }
   
   public function stop(){     // closing braces for start game
        // cross functional with start()
            echo '<script type="text/javascript">
        		var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
        		document.write(unescape("%3Cscript src='.'" + gaJsHost + "google-analytics.com/ga.js"'.' type='.'text/javascript'.'%3E%3C/script%3E"));
        	    </script>';
        	echo '<script type="text/javascript">
        		var pageTracker = _gat._getTracker("UA-3991266-1");
        		pageTracker._initData();
        		pageTracker._trackPageview();';
            echo '</script>';
        echo '</BODY>';
        echo '</HTML>';
   }
   
   public function menu($optAry = array()){        // display menu of options for player to choose from, can be none if necessary
        echo '<TR>';
			echo '<TD COLSPAN=3>';
				echo '<TABLE CELLSPACING=0 CELLPADDING=0 WIDTH="100%">';
					echo '<TR VALIGN=BOTTOM>';
						echo '<TD ALIGN=LEFT><h1><B>REEF ENCOUNTER</B></h1></TD>';
						
                       // create array of possible actions to echo, starting from 0 to whatever number of choices
                       $options = array(
                            '<TD ALIGN=right><A CLASS=menu HREF="newGame.php">New Game</A>',
                            '<TD ALIGN=right><A CLASS=menu HREF="gameLog.php">Display_Log file</A>',
                            '<TD ALIGN=right><A CLASS=menu HREF="loadGame.php">Load Game</A>',
                            '<TD ALIGN=right><A CLASS=menu HREF="saveGame.php">Save_Game State</A>',
                            '<TD ALIGN=right><A CLASS=menu HREF="start.php">start page</A>',
                            '<TD ALIGN=right><A CLASS=menu HREF="rules.html">Rules</A>');
                            
                      foreach($optAry as $choice){
                          echo $options[$choice];   // display menu chosen by users
                      }
                    echo '</TR>';
				echo '</TABLE>';
			echo '</TD>';
		echo '</TR>';
   }
   
   private function aryChoices(&$boards){
        // this result with arrays is created
        // $boards = array(
        //     array(0=>'x','x','x','','','','x','x','','','','','','x','','','x','','','','','','','','_','','x','','','','','x','','','','','','','','','',''),
        //     array(0=>'x','','','','','','x','','','','','x','','','','','x','','','','','','','','_','','','','x','','','','','','x','x','','','x','','','x')
        //     );
       $wrongAreas = array(
       array(0,1,2,6,7,13,16,24,26,31),
       array(0,6,11,16,24,28,34,35,38,41)
       );
       for($i = 0; $i < 2; $i++){
           $boards[] = array();
           for($j = 0; $j < 42; $j++){
               // check to see if j value is in wrong areas array, if true, place x, if false, place new array
               $boards[$i][] = (in_array($j, $wrongAreas[$i], true))? 'x': array();
           }
           $boards[$i][24] = '_';   // store extra growth tile position in board
       }
   }
   
   public function designGameBrds(){
        // assumes # of players has been chosen by $boardNo count
        $imgAry = array(
           "game/reef/images/b0.jpg",
           "game/reef/images/b3.jpg"
           );
        // Below are possible boards to be created
        $boards = array();
        $this->aryChoices($boards);
            
        $checkAry = array();     // checking
        
        $counter = 0;            // for alphabets in array
        $holder = 0;             // for controlling image to display
        $holder2 = 0;            // for controlling image to display
        
        $this->displayAry[] = '<TABLE CELLPADDING=0 CELLSPACING=5>';
            for($i = 0; $i < ($this->noPlayers); $i++){
                $rand = mt_rand(0, 1);  // generate random int val between 0 and 1
                $num = $i % 2;          // modulus of number to choose between boards images
                $holder = floor($i/2);  // display value posVal 0,0 for i = 0,1 and 1,1 for i = 2,3 
                $holder2 = ($num + 2);  // display values posVal 2 for i = 0, 2 and 3 for i = 1,3
                $this->displayAry[] = ($i == 2 or $i == 0)? '<TR VALIGN=TOP>': '';
                $this->displayAry[] = '<TD>';
                $this->displayAry[] = '<DIV STYLE="left:0px; top:0px; width:340; height:291; position:relative; border: solid 1px black;"><SPAN ID="map" STYLE="left:0; top:0; position:absolute; z-index:100;"><IMG SRC='.$imgAry[$rand].' ></SPAN>'.kEOL;
                $posVals = array(       // values for both top and bottom columns and rows
                    array(44, '4', '0', '0', '200'),
                    array(44, '274', '0', '0', '200'),
                    array('0', 39, '18', '200'),
                    array('320', 39, '18', '200')
                    );
                // $this->disBrdAry[] = array();                                                       // add extra array for each board
                $this->boardNo[] = $boards[$rand];                                                  // store boards in object's board array
                $this->designColumnEdges($counter, $posVals[$holder], $checkAry, $i);    // first display columns edges
                $this->designRowEdges($posVals[$holder2], $checkAry, $i);                // then rows edges
                
                $this->displayAry[] = '</DIV>';
                $this->displayAry[] = '</TD>';
                $this->displayAry[] = ($i == (($this->noPlayers) - 1) or $i == 1)? '</TR>': '';
            }
		$this->displayAry[] = '</TABLE>';
   }
   
   private function designColumnEdges(&$counter, &$posVals, &$checkAry, $brd){   // pass counter by reference to allow memory location modification instead of just a copy
       // list of alphabets to use
       $alphaNum = array(
           A,B,C,D,E,F,G,H,I,J,K,L,M,N,O,P,Q,R,S,T,U,V,W,X,Y,Z,AA,AB
           );
       $column = 7;             // # of columns in board
       $leftVal = $posVals[0];  // left val starter
       for($j = 0; $j < $column; $j++){            // iterate through each column #
            $result = $this->styleAry[0].$leftVal.$this->styleAry[1].$posVals[1].$this->styleAry[2].$posVals[2].$this->styleAry[3].$posVals[3].$this->styleAry[4].$posVals[4].$this->styleAry[5].$this->styleAry[7].
            $alphaNum[$counter].$this->styleAry[8];
            $this->displayAry[] = $result;          // store board edge values in array
            $checkAry[] = $result; 
            $counter += 1;                          // increment counter
            $leftVal += 40;                         // increment left value
        }
   }
   private function designRowEdges(&$posVals, &$checkAry, $brd){
       $row = 6;                // # of rows in board
       $topVal = $posVals[1];   // top val starter
       for($k = 0; $k < $row; $k++){
            $rCount = $k + 1;
            $result = $this->styleAry[0].$posVals[0].$this->styleAry[1].$topVal.$this->styleAry[2].$posVals[2].$this->styleAry[4].$posVals[3].$this->styleAry[5].$this->styleAry[6].$this->styleAry[7].
            $rCount.$this->styleAry[8];
            $this->displayAry[] = $result;          // store board edge values in array
            $checkAry[] = $result;
            $topVal += 40;                          // increment top value
        }
   }
   public function displayGameBrds($objColor = 0, $currPos = 0, $object = 0, $boardNo = 0, $choice = 0){
       // displays game boards with all the objects placed on them. If needed can instantiate object array in class
       // need, current div counter, current object color placed, current position placed
       $action2Display = array('default', 'predetermined', 'action4');      // and so on...
       $this->defaultBrd($action2Display[$choice]);                                                 // choice of actions for displaying stuff
       $this->predetermined($action2Display[$choice], $objColor, $currPos);
   }
   private function defaultBrd($action){
       try {
           if($action != 'default'){throw new Exception('wrong choice');}
           $startCount = 17;
           $boardHolder = 0;
           // if it's all default, first display divs and c and r #, then array contents, 19 indexes for each board
           for($i = 0; $i < count($this->displayAry); $i++){
               if($startCount == $i){                           // echo board contents where necessary
                    $this->boardContent($boardHolder);          // for just displaying board contents
                    $boardHolder += 1;                          // increment board holder
                    $startCount += 19;                          // increment to next post div position
               }
               echo $this->displayAry[$i];                      // display each board, row and column #
           }
       } catch (Exception $e ) {
           // just used to move on
           $e->getMessage();
       }
   }
   private function predetermined($action, $objColor = 0, $currPos = 0){
       try {
           if($action != 'predetermined'){throw new Exception('wrong choice');}
           $startCount = 17;
           $boardHolder = 0;
           $choose = 0;
           $divCounter = 0;
           $options = array('w','y','o','p','g');
           if(in_array($objColor, $options, true)){                                      // create polyp object
                $this->posCounter += 1;                             // increment pos counter
                $choose = $this->posCounter % 5;                    // set position of img to display
                $divCounter = floor($this->posCounter/5);           // set current board to display in
                $divC2 = floor(($this->posCounter - 1)/5);          // set current board to display in
                $coral = unserialize($this->choiceObj[0]);          // unserialize from string to object your choice
                $coral->setBoard($this->boardNo[$divC2]);           // set the object's current board on residence
                $coral->setColor($objColor);                        // set the object's color
                $coral->setID($this->posCounter + 16);              // set the object's ID
                $coral->location($currPos);                         // set object's location
                $coralID = $coral->getID();                         // get coral ID
                $this->masterObjAry[$coralID] = serialize($coral);  // store coral string in master array based on ID
           }
           
           // first display divs and c and r #, then array contents, 19 indexes for each board
           $objColor = $options[$choose];
           for($i = 0; $i < count($this->displayAry); $i++){
               if($startCount == $i){                                       // echo board contents where necessary
                    if($boardHolder == $divCounter){
                        $this->boardContent($divCounter, $objColor, 0, true);
                    }
                    else{
                        $this->boardContent($boardHolder);                  // for just displaying board contents
                    }
                    $boardHolder += 1;                                      // increment board holder
                    $startCount += 19;                                      // increment to next post div position
               }
               echo $this->displayAry[$i];                                  // display each board, row and column #
           }
       } catch (Exception $e ) {
           // just used to move on
           $e->getMessage();
       }
   }
//   private function setGameObject(&$game, &$object){
//       $serial = serialize($object);
//       $game = $serial;
//   }
//   private function getGameObject(&$game, &$object){
//       $unserial = unserialize($game);
//   }
    private function boardContent($divCounter, $objColor = 0, $object = 0, $pointer = false){       // display content of board based on div and decide whether pointer to another address in used
       for ($j = 0; $j < count($this->boardNo[$divCounter]); $j++) {
            $leftChose = 34 + (40 * ($j % 7));                  // so if $j = 1, 2 leftChose = 34, 74. $j = 7, 8 leftChose = 34, 74 etc
            $topChose = 29 + (40 * (floor($j/7)));              // so if $j = 1, 2 topChose = 29, 29. $j = 7, 8 topChose = 69, 69
            $leftChose2 = 42 + (40 * ($j % 7));                 // so if $j = 1, 2 leftChose = 42, 82. $j = 7, 8 leftChose = 42, 82 etc
            $topChose2 = 37 + (40 * (floor($j/7)));             // so if $j = 1, 2 topChose = 37, 37. $j = 7, 8 topChose = 77, 77
            $result = 0;                                        // hold span value of board contents
            if($this->boardNo[$divCounter][$j] == 'x' or $this->boardNo[$divCounter][$j] == '_'){
                continue;   // skip those positions with invalid areas 
            }
            // display content of board arrays
            for($k = 0; $k < count($this->boardNo[$divCounter][$j]); $k++){
                $result = $this->boardNo[$divCounter][$j][$k];       // id of object to retrieve
                $result = unserialize($this->masterObjAry[$result]);
                $val = $this->styleAry[0].$leftChose.$this->styleAry[1].$topChose.$this->styleAry[2].'0'.$this->styleAry[3].'0'.$this->styleAry[4].'502'.$this->styleAry[7]
                .$result->myImg.$this->styleAry[8].kEOL;
                echo $val;
            }
            if($pointer == true){                                   // if option to prompt select is activated
                // first to add with tile, we need: pos
                $objChoice = unserialize($this->choiceObj[$object]);    // unserialize object from string state
                $objChoice->setBoard($this->boardNo[$divCounter]);      // set the object's current board on residence
                $objChoice->setColor($objColor);                        // set the object's color
                if($objChoice->isValidLoc($j)){                         // if position is valid
                    echo $this->styleAry[0].$leftChose2.$this->styleAry[1].$topChose2.$this->styleAry[2].'0'.$this->styleAry[3].'0'.$this->styleAry[4].'501'.$this->styleAry[7]
                    .$this->styleAry[9].$this->links[0].'location='.$j.'&boardNo='.$divCounter.'&objColor='.$objColor.'&object='.$object.$this->styleAry[7].'[+]'.$this->styleAry[10]
                    .$this->styleAry[8].kEOL;
                }
            }
        }
   }
}