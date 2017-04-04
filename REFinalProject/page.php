<?php
define("kEOL", chr(13).chr(10));
class page {
    // attributes of object
    private $boardNo = array();
    
    // behaivors of object
    public function __construct($noOfBrds=0) {
        // initially with the constructor, there're no boards created. Below are possible boards to be created
        $boards = array(
        array(0=>'x','x','x','','','','x','x','','','','','','x','','','x','','','','','','','','_','','x','','','','','x','','','','','','','','','',''),
        array(0=>'x','','','','','','x','','','','','x','','','','','x','','','','','','','','_','','','','x','','','','','','x','x','','','x','','','x')
        );
        
        for($i = 0; $i < $noOfBrds; $i++){      // loop for number of boards to create
            $num = $i % 2;                       // modulus of number to choose between boards
            $this->boardNo[] = $boards[$num];   // store boards in object's board array 
        }
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
        		document.write(unescape("%3Cscript src="" + gaJsHost + "google-analytics.com/ga.js" type="text/javascript"%3E%3C/script%3E"));
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
   
   public function showGameBrds(){
       // assumes # of players has been chosen by $boardNo count
       $imgAry = array(
           "game/reef/images/b0.jpg",
           "game/reef/images/b3.jpg"
           );
       $styleAry = array(       // list of spans for images r & c, and these bits are used to form complete spans
            '<SPAN STYLE="left:', '; top:', '; width:', 'px; height:',
            'px; position:absolute; z-index:200; font-weight: bold; font-size: 12px;',
            'text-align: center;', '">', '</SPAN>', '<TR VALIGN=TOP>', '</TD>'
            );
            
        $checkAry = array();     // checking
        
        $counter = 0;            // for alphabets in array
        $holder = 0;             // for controlling image to display
        $holder2 = 0;            // for controlling image to display
        
        echo '<TABLE CELLPADDING=0 CELLSPACING=5>';
                for($i = 0; $i < count($this->boardNo); $i++){
                    $num = $i % 2;          // modulus of number to choose between boards images
                    $holder = floor($i/2);  // display value posVal 0,0 for i = 0,1 and 1,1 for i = 2,3 
                    $holder2 = ($num + 2);  // display values posVal 2 for i = 0, 2 and 3 for i = 1,3
                    echo ($i == 2 or $i == 0)? '<TR VALIGN=TOP>': '';
                    echo '<TD>';
                    echo '<DIV STYLE="left:0px; top:0px; width:340; height:291; position:relative; border: solid 1px black;"><SPAN ID="map" STYLE="left:0; top:0; position:absolute; z-index:100;"><IMG SRC='.$imgAry[$num].' ></SPAN>'.kEOL;
                    $posVals = array(       // values for both top and bottom columns and rows
                        array(44, '4', '0', '0'),
                        array(44, '274', '0', '0'),
                        array('0', 39, '18',),
                        array('320', 39, '18')
                        );
                    $this->displayColumns($styleAry, $counter, $posVals[$holder], $checkAry); // first display columns
                    $this->displayRows($styleAry, $posVals[$holder2], $checkAry);             // then rows
                    
                    echo '</DIV>';
                    echo '</TD>';
                    echo ($i == (count($this->boardNo) - 1) or $i == 1)? '</TR>': '';
                }
		echo '</TABLE>';
   }
   
   private function displayColumns($styleAry, &$counter, &$posVals, &$checkAry){   // pass counter by reference to allow memory location modification instead of just a copy
       // list of alphabets to use
       $alphaNum = array(
           A,B,C,D,E,F,G,H,I,J,K,L,M,N,O,P,Q,R,S,T,U,V,W,X,Y,Z,AA,AB
           );
       $column = 7;             // # of columns in board
       $leftVal = $posVals[0];  // left val starter
       for($j = 0; $j < $column; $j++){            // iterate through each column #
            $result = $styleAry[0].$leftVal.$styleAry[1].$posVals[1].$styleAry[2].$posVals[2].$styleAry[3].$posVals[3].$styleAry[4]
            .$styleAry[6].$alphaNum[$counter].$styleAry[7];
            $checkAry[] = $result;
            echo $result;
            $counter += 1;                          // increment counter
            $leftVal += 40;                         // increment left value
        }
   }
   private function displayRows($styleAry, &$posVals, &$checkAry){
       $row = 6;                // # of rows in board
       $topVal = $posVals[1];   // top val starter
       for($k = 0; $k < $row; $k++){
            $rCount = $k + 1;
            $result = $styleAry[0].$posVals[0].$styleAry[1].$topVal.$styleAry[2].$posVals[2].$styleAry[4].$styleAry[5]
            .$styleAry[6].$rCount.$styleAry[7];
            $checkAry[] = $result;
            echo $result;
            $topVal += 40;                          // increment top value
        }
   }
}