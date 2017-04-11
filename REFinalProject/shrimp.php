<?php
class shrimp{
    protected $colors = array();
    private $myColor = 0;           // color attribute
    private $myBoard = 0;           // board attribute
    private $myLocation = 0;        // location attribute
    public $myPlayer = 0;
    public $shrimpID = -1;
    public $myName = 'shrimp';
    public function __construct(){
        $choices = array('R', 'Y', 'P', 'G');
        for($i = 0; $i < count($choices); $i++){
            $this->colors[$choices[$i]] = '<IMG SRC="game/reef/images/s'.$choices[$i].'.gif">';
        }
        echo '';
    }
    public function setBoard(&$board){  // pointer to board's exact location, pass by reference
        $this->myBoard = $board;
    }
    public function setColor($color){
        $this->myColor = $color;
    }
    public function setShrimpID($ID){
        $this->shrimpID = $ID;
    }
    public function isOnRock(){
        // checks the position of shrimp, and return true or false if on rock
    }
    public function getCoralColor(){
        // return the color of coral currently inhabiting
    }
    public function isValidLoc($location){
        
    }
}
?>