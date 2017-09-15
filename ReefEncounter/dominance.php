<?php
class dominance{
    private $myDominance = 0;           // color attribute
    private $myDominated = 0;           // board attribute
    public $dominanceAry = 0;
    public $myPlayer = 0;
    public $myAlga = 0;
    public $dominanceID = -1;
    public $myName = 'dominance';
    public function __construct(){
        
    }
    public function createDominance(){
        static $id = 0;
        $this->dominanceID = $id;                               // set Dominance tile's id
        $choices = array(
                        array('00', '01', 'g', 'b'), array('10', '11', 'r', 'p'), 
                        array('20', '21', 'b', 'r'), array('30', '31', 'p', 'b'),
                        array('40', '41', 'g', 'r'), array('50', '51', 'b', 'g'),
                        array('60', '61', 'p', 'g'), array('70', '71', 'g', 'p'),
                        );
        $dominance = array(        // generate dominance image choice and generate dominated image choice unique from that of dominance        
            $d1= array(0=>0 ,1), $d2= array(0=>0 ,2),
    		$d3= array(0=>1 ,2), $d4= array(0=>1 ,3),
    		$d5= array(0=>2 ,3), $d6= array(0=>2 ,4),
    		$d7= array(0=>3 ,0), $d8= array(0=>3 ,4),
    		$d9= array(0=>4 ,0), $d10= array(0=>4 ,1)
		);
		
        $this->dominanceAry = $choices[$id % count($choices)];  // generate dominated image choice unique from that of dominance
        $this->myDominance = '<IMG SRC="game/reef/images/p'.$dominance[$id][0].'.jpg" HEIGHT=32 WIDTH=32>';
        $this->myDominated = '<IMG SRC="game/reef/images/p'.$dominance[$id][1].'.jpg" HEIGHT=32 WIDTH=32>';
        $id += 1;                                               // increment ID
    }
    public function setAlga(&$board){  // pointer to board's exact location, pass by reference
        $this->myBoard = $board;
    }
    public function preDominance(){
        echo '<TABLE CELLPADDING=0 CELLSPACING=2>';
        	echo '<TR ALIGN=CENTER VALIGN=BOTTOM>';
    }
    public function postDominance(){
            echo '</TR>';
        echo '</TABLE>';
        
        echo '<P>';
    }
    public function displayDominance(){
        		echo '<TD>';
                    // <!-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------														
                    //                                                                                                     These are the numbered squares that show which coral has control over others
                    // ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
        		    echo '&nbsp;<BR>';
        		    echo '<TABLE CELLPADDING=0 CELLSPACING=0 STYLE="border: solid 1px black;">';
						echo '<TR>';
							echo '<TD>'.$this->myDominance.'</TD>';                                 // repeat dominant img twice
							echo '<TD>'.$this->myDominance.'</TD>';
						echo '</TR>';
						echo '<TR>';
						    // display alga cylinder
							echo '<TD><IMG SRC="game/reef/images/ct'.$this->dominanceAry[0].'.gif" WIDTH=32 HEIGHT=32></TD>';
							echo '<TD>'.$this->myDominated.'</TD>';                                 // repeat dominated img once
						echo '</TR>';
					echo '</TABLE>';
					echo '<B>'.($this->dominanceID + 1).'</B>';
        		echo '</TD>';
    }
    public function getCoralColor(){
        // return the color of coral currently inhabiting
    }
    public function isValidLoc($location){
        
    }
}
?>