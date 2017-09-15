<?php
require_once 'player.php';
class action{
    protected $imgs = array();
    private $actionID = -1;         // action ID
    public $doneActs = array();     // list of actions already performed
    public $myPlayer = 0;           // select player
    public $myActAry = array();     // color attribute
    public $myExt = 'jpg';          // image extension
    public $myName = 'action';        // name of the object
    public function __construct(){
        // initialize done actions
        for($i = 1; $i < 11; $i++){                 
            $this->doneActs[$i] = 'no';   // set all on default to no
        }
    }
    public function setPlayer(&$player){
        $this->myPlayer = &$player;             // memory pointer to player object to make update decisions
    }
    
    public function validateAct($done = 0){
        // update performed actions
        if($done > 0){$this->doneActs[$done] = 'yes';}
        
        // set defaults to disabled
        for($i = 1; $i < 11; $i++){                 
            $this->myActAry[$i] = 'a'.($i).'d'; // img name
        }
        
        if($this->doneActs[9] == 'no' or $this->doneActs[10] == 'no'){
            $n = 1;                                  // counter
            $choices = array('w','y','o','p','g');
            // validate whether parrot fish can eat player's shrimp and no other action has been clicked
            $brdShrimps = $this->myPlayer->myBrdSrmp;
            for($i = 0; $i < count($brdShrimps); $i++){
                if ($brdShrimps[$i]->myStatus == 'Edible' &&
                (array_search('yes', $this->doneActs) == false) &&
                $done != 6){
                   $this->myActAry[$n] = 'a'.($n);    // enabled
                }
            }
            
            $n += 1;
            // validate whether larva cube can be played
            $playLarva = $this->myPlayer->myLarva;
            for($j = 0; $j < count($choices); $j++){
                $c = $choices[$j];                      // choices
                if (count($playLarva[$c]) > 0 && $this->doneActs[$n] == 'no'){
                   $this->myActAry[$n] = 'a'.($n);    // enabled
                }
            }
            
            $n += 1;
            for($j = 0; $j < count($choices); $j++){
                $c = $choices[$j];                      // choices
                if (count($playLarva[$c]) > 0 && $this->doneActs[$n - 1] == 'yes' &&
                $this->doneActs[$n] == 'no'){
                   $this->myActAry[$n] = 'a'.($n);    // enabled
                }
            }
            
            $n += 1;
            // validate playing shrimp
            $playShrimp = $this->myPlayer->myShrimp;
            if (count($playShrimp) > 0 && $this->doneActs[$n] == 'no' && $done != 6){
               $this->myActAry[$n] = 'a'.($n);    // enabled
            }
            
            $n += 1;
            // validate move shrimp
            $moveShrimp = $this->myPlayer->myBrdSrmp;
            if (count($moveShrimp) > 0 && $done != 6){
               $this->myActAry[$n] = 'a'.($n);    // enabled
            }
            
            $n += 1;
            // validate exchanging consumed polyp tile
            $playConP = $this->myPlayer->myConPolyp;
            for($j = 0; $j < count($choices); $j++){
                $c = $choices[$j];                      // choices
                if (count($playConP[$c]) > 0 && $done != 6){
                   $this->myActAry[$n] = 'a'.($n);    // enabled
                }
            }
            
            $n += 1;
            // validate exchanging consumed polyp tile with alga
            for($j = 0; $j < count($choices); $j++){
                $c = $choices[$j];                      // choices
                if (count($playConP[$c]) > 0 && $done != 6){
                   $this->myActAry[$n] = 'a'.($n);    // enabled
                }
            }
            
            $n += 1;
            // validate exchanging larva cube with polyp tile
            for($j = 0; $j < count($choices); $j++){
                $c = $choices[$j];                      // choices
                if (count($playLarva[$c]) > 0){
                   $this->myActAry[$n] = 'a'.($n);      // enabled
                }
            }
        }
        
        $n = 10;
        // validate ending turn
        if($done != 6){$this->myActAry[$n] = 'a'.($n);}    // enabled
    }
    
    public function setUsedAction($act){
    }
    public function preAlist(){
// <!-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------														
//                                 This contains the heading Choose an Action and the entire Action list all the way until [start your turn over]
// ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->								
        echo '<TR>';
    		echo '<TD COLSPAN=5>';
    			echo '<TABLE CELLSPACING=0 CELLPADDING=0 WIDTH="100%">';
    				echo '<TR>';
    					echo '<TD CLASS=borderred>';
    						echo '<TABLE CELLSPACING=0 CELLPADDING=3 WIDTH="100%">';

    }
    public function Alist(){
                                // title image
                                echo '<TR ALIGN=CENTER>';
                        			echo '<TD CLASS=borderred BGCOLOR="#FF3333"><SPAN CLASS=yellow_text_bold>Choose an Action</SPAN></TD>';
                        		echo '</TR>';
                        		
                        		// actions display
                        		$describe = array(
                        		    'Eat one coral and a shrimp with your parrotfish<BR>(once at start of turn only)', 
                        		    'Play a larva cube and polyp tiles<BR>(only once per turn)',
                        		    'Play a second larva cube and polyp tiles<BR>(only once per turn)',
                        		    'Introduce a shrimp<BR>(only once per turn)',
                        		    'Move or remove a shrimp',
                        		    'Exchange a consumed polyp tile for a larva cube of the same colour (larva cube must be played immediately)',
                        		    'Acquire and play an alga cylinder',
                        		    'Exchange a larva cube for a polyp tile of the same colour',
                        		    'Do none of the above',
                        		    'Collect a larva cube and polyp tiles from the open sea<BR>(must do once, at end of turn only)'
                        		    );
                        		
                        		$counter = 0;
                        		for($i = 0; $i < 3; $i++){
                            		echo '<TR>';
                            			echo '<TD CLASS=borderred BGCOLOR="#FFFFBB">';
                            			    echo '<TABLE WIDTH=100%>';
                            				if($i == 1){
                            				    $counter -= 1;              // balance
                            				    for($j = 0; $j < 4; $j++){
                                				    echo '<TR>';
                                				        $counter += 1;      // scope increment
                                				        $img = ($this->myActAry[$counter + 1] === 'a'.($counter + 1) ||
                                				        ($counter + 1) == 9)? 
                                				        '<A HREF="game.php?act='.($counter + 1).'">': '';
                                				        $imgC = ($this->myActAry[$counter + 1] === 'a'.($counter + 1) ||
                                				        ($counter + 1) == 9)? 
                                				        '</A>': '';
                                				        echo '<TD WIDTH=50%>'.$img.'<IMG SRC="game/reef/images/'.$this->myActAry[$counter + 1].'.jpg" WIDTH="50" HEIGHT="32" ALIGN=LEFT>
                                				        <B>Action '.($counter + 1).':</B>'.$imgC.'</B> '.$describe[$counter].'</TD>';
                                				        
                                				        $img = ($this->myActAry[$counter + 5] === 'a'.($counter + 5) ||
                                				        ($counter + 5) == 9)? 
                                				        '<A HREF="game.php?act='.($counter + 5).'">': '';
                                				        $imgC = ($this->myActAry[$counter + 5] === 'a'.($counter + 5) ||
                                				        ($counter + 5) == 9)? 
                                				        '</A>': '';
                        							    echo '<TD WIDTH=50%>'.$img.'<IMG SRC="game/reef/images/'.$this->myActAry[$counter + 5].'.jpg" WIDTH="50" HEIGHT="32" ALIGN=LEFT>
                        							    <B>Action '.($counter + 5).':</B>'.$imgC.'</B> '.$describe[$counter + 4].'</TD>';
                                    				echo '</TR>';
                            				    }
                            				    $counter += 4;
                            				}
                            				else{
                            				    echo '<TR>';
                            				        $img = ($this->myActAry[$counter + 1] === 'a'.($counter + 1) ||
                                				    ($counter + 1) == 9)? 
                            				        '<A HREF="game.php?act='.($counter + 1).'">': '';
                            				        $imgC = ($this->myActAry[$counter + 1] === 'a'.($counter + 1) ||
                                				    ($counter + 1) == 9)? 
                            				        '</A>': '';
                            				        echo '<TD>'.$img.'<IMG SRC="game/reef/images/'.$this->myActAry[$counter + 1].'.jpg" WIDTH="50" HEIGHT="32" ALIGN=LEFT>
                            				        <B>Action '.($counter + 1).':</B>'.$imgC.'</B> '.$describe[$counter].'</TD>';
                            				    echo '</TR>';
                            				}
                            				$counter += 1;                  // control
                            				echo '</TABLE>';
                            			echo '</TD>';
                            		echo '</TR>';
                        		}
                        		echo '<TR>';
                        			echo '<TD CLASS=borderred BGCOLOR="#FFFFBB">';
                        				echo '<P><A HREF="game.php?act=reset">[Start your turn over]</A></P>';
                        			echo '</TD>';
                        		echo '</TR>';
    }
    public function postAlist(){
                            echo '</TABLE>';
						echo '</TD>';
					echo '</TR>';
				echo '</TABLE>';
				echo '<BR>';
			echo '</TD>';
		echo '</TR>';

    }
}