<?php
class openSea{
    private $clr = 0;               // polyp color array
    private $myLarva = 0;           // larva image
    private $myLarvaColor = 0;      // larva attribute
    public $myLarvaSupply = 9;      // larva count
    public $polypAry = array();     // array of polyps for OS board
    public $polypKeys = array();    // array of keys of polyps for OS board
    public $osID = -1;
    public $myName = 'openSea';
    public function __construct(){
        $this->clr = array('w','y','o','p','g');
    }
    public function createOpensea($randVl){
        static $id = 0;
        $this->osID = $id;                              // set OpenSeaTile's id
        $sizes = array(3, 3, 3, 2, 1);                  // open sea board sizes
        
		// larva cube image
        $this->myLarva = '<IMG BORDER=1 SRC="game/reef/images/l'.$id.'.gif" ALT="'.$this->clr[$id].'" WIDTH=16 HEIGHT=16 ALIGN=ABSMIDDLE>';
		$this->myLarvaColor = $this->clr[$id];          // larva cube color
		for($i = 0; $i < $sizes[$randVl]; $i++){        // iterate base on choice of game engine
		    $randImg = mt_rand(0, 4);                   // rand int between 0 and 4 inclusive
		    $this->polypAry[] = '<IMG STYLE="border: solid 1px #4F4F4F;" SRC="game/reef/images/p'.$randImg.'.jpg" HEIGHT=32 WIDTH=32 ALT="'.$this->clr[$randImg].'">';
		    $this->polypKeys[] = $this->clr[$randImg];  // keys of images
		}
        $id += 1;                                       // increment ID
    }
    public function setPolyp(&$board){  // pointer to board's exact location, pass by reference
        $this->myBoard = $board;
    }
    public function preOpensea(){
        echo '<TABLE CELLPADDING=2 CELLSPACING=2 BORDER=0>';
        	echo '<TR ALIGN=CENTER VALIGN=TOP>';								
    }
    public function postOpensea(){
            echo '</TR>';
        echo '</TABLE>';
        
        echo '<P>';
    }
    public function displayOpensea(){
        		echo '<TD WIDTH=115 BGCOLOR=#6DC0B4 STYLE="border: solid 1px black;">';
					echo '<TABLE CELLSPACING=2 CELLPADDING=0>';
						echo '<TR ALIGN=CENTER>';
							echo '<TD>'.$this->myLarva.'<BR>+'.$this->myLarvaSupply.' in supply</TD>';  // echo larva cube
						echo '</TR>';
						echo '<TR>';
							echo '<TD></TD>';
						echo '</TR>';
						echo '<TR ALIGN=CENTER>';
							echo '<TD>';
							    for($i = 0; $i < count($this->polypAry); $i++){
							        echo $this->polypAry[$i];                                           // echo each img in array
							    }
							echo '</TD>';
						echo '</TR>';
					echo '</TABLE>';
				echo '</TD>';
    }
    public function getCoralColor(){
        // return the color of coral currently inhabiting
    }
    public function isValidLoc($location){
        
    }
}
?>