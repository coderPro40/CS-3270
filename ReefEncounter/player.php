<?php
require_once 'polyp.php'; require_once 'shrimp.php'; require_once 'alga.php'; require_once 'larva.php';
class player{
    protected $colors = 0;			// player colors
    protected $imgs = array();		// player images
    protected $larva = 0;			// player larvas
    protected $polyp = 0;			// player polyps
    protected $choiceObj = array();	// option of objects to unserialize
    private $myImg = 0;				// image attribute
    public $myColor = 0;           // color attribute
    public $myPolyp = array(
    	'w'=>array(), 'y'=>array(),
    	'o'=>array(), 'p'=>array(),
    	'g'=>array());  			// polyps available to player
    public $myLarva = array(
    	'w'=>array(), 'y'=>array(),
    	'o'=>array(), 'p'=>array(),
    	'g'=>array());  			// larvas available to player
    public $myAlga = array(
    	'b'=>array(), 'g'=>array(),
    	'p'=>array(), 'r'=>array()
    	);      					// alga cylinders available to player
    public $myShrimp = array();		// array of current playable shrimps
    public $myBrdSrmp = array();
    public $myConPolyp = array(
    	'w'=>array(), 'y'=>array(),
    	'o'=>array(), 'p'=>array(),
    	'g'=>array());				// array of consumed polyp tiles from attacking corals
    public $myConShrimp = array();	// array of consumed shrimps by parrot fish
    public $myParFish = array(
    	'w'=>array(), 'y'=>array(),
    	'o'=>array(), 'p'=>array(),
    	'g'=>array());				// contents in parrot fish
    public $playerID = -1;
    public $myName = 'player';
    
    public function __construct(){
        $this->colors = array('R', 'Y', 'P', 'G');			// init color array
        $this->larva = array('l0', 'l1', 'l2', 'l3', 'l4');	// init larva array
        $this->polyp = array('p0', 'p1', 'p2', 'p3', 'p4');	// init larva array
        for($i = 0; $i < count($this->colors); $i++){		// init imgs array
            $this->imgs[$i] = '<IMG SRC="images/'.$this->colors[$i].'.gif" WIDTH=16 HEIGHT=16 ALT="'.$this->colors[$i].'" ALIGN=ABSMIDDLE>';
        }
        
        // initially with the constructor
        $this->choiceObj[] = serialize(new polyp());        // for polyp objects 
        $this->choiceObj[] = serialize(new shrimp());       // for shirimp objects
        $this->choiceObj[] = serialize(new alga()); 		// for alga objects
        $this->choiceObj[] = serialize(new larva());    	// for larva objects
    }
    public function createPlayer($randVl, $noPlyr){
    	static $id = 0;
    	$this->playerID = $id;                          // set Player's id
        $sizes = array(6, 7, 8, 9);                 	// polyp sizes
        $this->myColor = $this->colors[$randVl];		// player's color
        $this->myImg = $this->imgs[$randVl];			// player's image
        
        // provide player with options on object to create
        $size = (($noPlyr - 1) <= $id)? $sizes[3]: $sizes[$id];
        $choices = array('w','y','o','p','g');
        $remain = $size % count($choices);				// for keeping track of all polyps to create
        $count = 0;
        
        // create polyps for player
        for($i = 0; $i < count($choices); $i++){
        	$this->gameChoices(0, $choices[$i]);		// add polyps to player object holder
        	if($count < $remain){
        		$this->gameChoices(0, $choices[$i]);	// for each remainder available
        		$count += 1;							// increment count
        	}
        }
        
        // create shrimps for player
        for($i = 0; $i < (count($choices) - 1); $i++){
        	$this->gameChoices(1, $this->myColor);		// add shrimps to player object holder
        }
        
		$id += 1;                                       // increment ID
    }
    public function gameChoices($choice, $color, $use = 0){		// list of choices of action to perform, use for whether to add or use
    	// set of functions available
    	$this->addObject($choice, $color, $use);
    	$this->useObject($choice, $color, $use);
    }
    private function addObject($choice, $color, $use){
    	try {
    		if($use > 0){throw new Exception('wrong choice');}
    		$possObj = array(
    			&$this->myPolyp, &$this->myShrimp,
    			&$this->myAlga, &$this->myLarva,
    			&$this->myConPolyp, &$this->myConShrimp,
    			&$this->myParFish
    			);
    		$pick = $choice % count($this->choiceObj);		// mod based on no of objects possible to create
    		$pick = ($choice == 6)? $pick - 2: $pick;		// for parrot fish
    		$object = unserialize($this->choiceObj[$pick]); // unserialize from string to object your choice
			$object->setColor($color);                		// set the object's color
			if($pick == 1){
				$object->myPlayer = $this->playerID;		// set player no for shrimp
				$possObj[$choice][] = $object;				// store in array for objects
				unset($possObj);
				throw new Exception('done');
			}
			$possObj[$choice][$color][] = $object;			// store in array for objects
			unset($possObj);
		} catch (Exception $e ) {
        	// just used to move on
		}
    }
    private function useObject($choice, $color, $use){
    	try {
    		if($use < 1){throw new Exception('wrong choice');}
		} catch (Exception $e ) {
        	// just used to move on
		}
    }
    
    public function preDecision(){
        
        echo '<TD WIDTH=50%>';
		echo '<TABLE CELLSPACING=0 CELLPADDING=0 WIDTH=100%>';
			echo '<TR>';
				echo '<TD CLASS=border>';
					echo '<TABLE CELLSPACING=0 CELLPADDING=3 WIDTH=100%>';
    }
    public function decision($decision = 1){
    				
                	$displays = array('Player', 'Consumed<BR>Polyp Tiles', 'Shrimp<BR>Eaten', 'Current larva cubes');
                    $choices = array('Player', 'Polyp in parrot fish', 'Initial larva cubes', 'Press when done');
//<!-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//                                                                                        This is the heading for the player score chart
//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
					if($decision == 0){
						// for game start
						echo '<TR ALIGN=CENTER>';
					    for($i = 0; $i < count($choices); $i++){
					        echo "<TD CLASS=thin BGCOLOR='#0066CC'><SPAN CLASS=yellow_text_bold>".$choices[$i]."</SPAN></TD>";
					    }
					    echo '</TR>';
						$this->decision2($decision, $choices);
					}
					else{
						// if games currently running, that is start phase is done
						if($this->playerID < 1){
							echo '<TR ALIGN=CENTER>';
						    for($i = 0; $i < count($displays); $i++){
						        echo "<TD CLASS=thin BGCOLOR='#0066CC'><SPAN CLASS=yellow_text_bold>".$displays[$i]."</SPAN></TD>";
						    }
						    echo '</TR>';
						}
						$this->decision2($decision, $displays);
					}
    }
    private function decision2($decision = 1, $choices){
// <!-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------														
//                                                                                         This shows player 1 and his scores all the way up to how many initial larva cubes
// ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->                                                                                                                
					$types = array("radio", "checkbox", "submit");
					$names = array(array("pyrPolyp", "pyrPolyp", "pyrPolyp", "pyrPolyp", "pyrPolyp"),
								array("lar1", "lar2", "lar3", "lar4", "lar5"));
					$ext = array('jpg', 'gif');
					$objects = array($this->polyp, $this->larva);
					echo '<TR ALIGN=CENTER VALIGN=TOP BGCOLOR=#FFFF70>';
						echo '<TD CLASS=thin ALIGN=LEFT>';
							echo '<TABLE CELLSPACING=0 CELLPADDING=0>';
								echo '<TR>';
									echo '<TD><IMG SRC="images/'.$this->myColor.'.gif" WIDTH=16 HEIGHT=16 ALT="P" ALIGN=ABSMIDDLE>&nbsp;</TD>';
									echo '<TD>Player'.($this->playerID + 1).'</TD>';
								echo '</TR>';
							echo '</TABLE>';
						echo '</TD>';
						if($decision == 0){
							echo '<form method="post", action="configure.php">';
							for($i = 0; $i < (count($choices) - 1); $i++){
								echo '<TD CLASS=thin>';
									echo '<TABLE CELLSPACING=0 CELLPADDING=0>';
										echo '<TR>';
											if ($i == (count($choices) - 2)){
												echo '<TD><input type='.$types[$i].' value='.$types[$i].' style="align: center;"></TD>';
												echo '<TD>&nbsp;</TD>';
											}
											else{
												for($j = 0; $j < count($this->larva); $j++){
													echo '<TD><input type='.$types[$i].' name='.$names[$i][$j].' value="'.$j.'" style="align: center;"></TD>';
													echo '<TD><IMG BORDER=1 SRC=game/reef/images/'.$objects[$i][$j].'.'.$ext[$i].' WIDTH=16 HEIGHT=16 ALIGN=ABSMIDDLE></TD>';
													echo '<TD>&nbsp;</TD>';
												}
											}
										echo '</TR>';
									echo '</TABLE>';
								echo '</TD>';
							}
							echo '</form>';
						}
						else{
							$this->displayStats($choices);
						}
					echo '</TR>';
    }
    
    private function displayStats($displays){
    	$objects = array($this->myConPolyp, $this->myConShrimp, $this->myLarva);
    	$oColor = array('w','y','o','p','g');					// option for colors
    	for($i = 0; $i < (count($displays) - 1); $i++){
    		echo '<TD CLASS=thin>';
				echo '<TABLE CELLSPACING=0 CELLPADDING=0>';
					echo '<TR>';
						for($j = 0; $j < (count($objects[$i])); $j++){
							if ($i == (count($displays) - 3)){	// for displaying consumed shrimps
								echo '<TD><IMG BORDER=1 SRC=game/reef/images/'.$objects[$i][$j]->myImage.'.'
								.$objects[$i][$j]->myExt.' WIDTH=16 HEIGHT=16 ALIGN=ABSMIDDLE></TD>';
								echo '<TD>&nbsp;</TD>';
							}
							else{
								// for each color array in select object
								for($k = 0; $k < count($objects[$i][$oColor[$j]]); $k++){
									$c = $oColor[$j];
									echo '<TD>'.count($objects[$i][$c]).'x</TD>';
									echo '<TD><IMG BORDER=1 SRC=game/reef/images/'.$objects[$i][$c][$k]->myImage.'.'
									.$objects[$i][$c][$k]->myExt.' ALT=['.$objects[$i][$c][$k]->myColor.'] 
									WIDTH=16 HEIGHT=16 ALIGN=ABSMIDDLE></TD>';
									echo '<TD>&nbsp;</TD>';
								}
							}
						
						}
					echo '</TR>';
				echo '</TABLE>';
			echo '</TD>';
    	}
    }
    
	public function postDecision(){
					echo '</TABLE>';
				echo '</TD>';
			echo '</TR>';
		echo '</TABLE>';
		echo '<BR>';
	echo '</TD>';
    }
    public function preScreen(){
    	echo '<TD WIDTH=10></TD>';
		echo '<TD>';
			echo '<TABLE CELLSPACING=0 CELLPADDING=0 WIDTH="100%">';
				echo '<TR>';
					echo '<TD CLASS=border>';
						echo '<TABLE CELLSPACING=0 CELLPADDING=3 WIDTH="100%">';
    }
    public function screen(){
    	echo '<TR ALIGN=CENTER>';
// <!-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------														
//                                                                 This is the heading that contains Behind your screen
// ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
			echo '<TD CLASS=border BGCOLOR="#0066CC"><SPAN CLASS=yellow_text_bold>Behind Your Screen</SPAN></TD>';
		echo '</TR>';
		
// <!-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------														
//                                                                 This is where the number of the players polyp tiles are shown but now all together
// ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
		$choices = array('Polyp Tiles:', 'Larva Cubes:', 'Shrimps:');
		$oColor = array('w','y','o','p','g');
		$objects = array($this->myPolyp, $this->myLarva, $this->myShrimp);
		echo '<TR>';
			echo '<TD CLASS=border>';
				echo '<TABLE>';
				for($i = 0; $i < count($choices); $i++){
					echo '<TR>';
						echo '<TD ALIGN=RIGHT>'.$choices[$i].'</TD>';
						echo '<TD></TD>';
						if($i == (count($choices) - 1)){echo '<TD COLSPAN=15>';}
						for ($j = 0; $j < count($oColor); $j++){
							if($i == (count($choices) - 1)){								// for displaying player's shrimp
								if (count($objects[$i]) < 1 or $j == (count($oColor) - 1)){continue;}
								echo '<IMG SRC="game/reef/images/'.$objects[$i][$j]->myImage.'.'.$objects[$i][0]->myExt.'">';
							}
							else{
								$c = $oColor[$j];
								if (count($objects[$i][$c]) < 1){
									echo '<TD></TD>';
									continue;
								}
								echo '<TD>';
									echo '<TABLE CELLSPACING=0 CELLPADDING=0>';
										echo '<TR>';
											echo '<TD>'.count($objects[$i][$c]).'x</TD>';	// each size
											echo '<TD><IMG BORDER=1 SRC=game/reef/images/'.$objects[$i][$c][0]->myImage.'.'
											.$objects[$i][$c][0]->myExt.' ALT=['.$objects[$i][$c][0]->myColor.'] 
											WIDTH=16 HEIGHT=16 ALIGN=ABSMIDDLE></TD>';
										echo '</TR>';
									echo '</TABLE>';
								echo '</TD>';
							}
						}
						if($i == (count($choices) - 1)){echo '</TD>';}
					echo '</TR>';
				}
				echo '</TABLE>';
			echo '</TD>';
		echo '</TR>';
    }
    public function screen2(){
    	
    }
    public function postScreen(){
    					echo '</TABLE>';
					echo '</TD>';
				echo '</TR>';
			echo '</TABLE>';
		echo '<BR>';
		echo '</TD>';
    }
    public function prePFish(){
    	echo '<TD>';
            echo '<TABLE CELLSPACING=0 CELLPADDING=0 WIDTH="100%">';
                echo '<TR>';
                    echo '<TD CLASS=border>';
                        echo '<TABLE CELLSPACING=0 CELLPADDING=3 WIDTH="100%">';
    }
    public function parrotFish(){
					    	// display parrot fish segment
					    	echo '<TR ALIGN=CENTER>';
					            echo '<TD CLASS=border BGCOLOR="#0066CC"><SPAN CLASS=yellow_text_bold>In Your Parrotfish</SPAN></TD>';
					        echo '</TR>';
					        
					        // parrot fish info
					        $oColor = array('w','y','o','p','g');
					        echo '<TR>';
					            echo '<TD CLASS=border>';
					                echo '<TABLE WIDTH=100%>';
					                    echo '<TR ALIGN=CENTER>';
										    
										    for ($j = 0; $j < count($oColor); $j++){
												$c = $oColor[$j];
												if (count($this->myParFish[$c]) < 1){
													continue;
												}
												echo '<TD>';
													echo '<TABLE CELLSPACING=0 CELLPADDING=0>';
														echo '<TR>';
															echo '<TD>'.count($this->myParFish[$c]).'x</TD>';	// each size
															echo '<TD><IMG BORDER=1 SRC=game/reef/images/'.$this->myParFish[$c][0]->myImage.'.'
															.$this->myParFish[$c][0]->myExt.' ALT=['.$this->myParFish[$c][0]->myColor.'] 
															WIDTH=16 HEIGHT=16 ALIGN=ABSMIDDLE></TD>';
															echo '<TD>&nbsp;</TD>';
														echo '</TR>';
													echo '</TABLE>';
												echo '</TD>';
											}
											
									    echo '</TR>';
									echo '</TABLE>';
					            echo '</TD>';
					        echo '</TR>';
    }
	public function postPFish(){
                            echo '</TABLE>';
                        echo '</TD>';
                echo '</TR>';
	        echo '</TABLE>';
	        echo '<BR>';
	    echo '</TD>';
    }
}