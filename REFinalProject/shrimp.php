<?php
class shrimp{
    protected $imgs = array();
    protected $colors = array();
    protected $posCol = 0;          // possible colors
    private $myColor = 0;           // color attribute
    private $myBoard = 0;           // board attribute
    private $myImg = 0;             // image to display
    public $myStatus = 0;           // current status of shrimp
    public $myLocation = 0;        // location attribute
    public $myImage = 0;
    public $myExt = 'gif';          // img extension
    public $myPlayer = 0;
    public $shrimpID = -1;
    public $myName = 'shrimp';
    public function __construct(){
        $choices = array('R', 'Y', 'P', 'G');
        $this->posCol = $choices;
        for($i = 0; $i < count($choices); $i++){
            $this->colors[$choices[$i]] = '<IMG SRC="game/reef/images/s'.$choices[$i].'.gif">';
        }
        for($i = 0; $i < count($choices); $i++){
            $this->imgs[$choices[$i]] = 's'.$choices[$i];     // img name
        }
    }
    public function setBoard(&$board){  // pointer to board's exact location, pass by reference
        $this->myBoard = $board;
    }
    public function setColor($color){
        $this->myColor = $color;
        $this->myImg = $this->colors[$color];   // set image to be displayed when needed
        $this->myImage = $this->imgs[$color];   // set part of image string for specific display
    }
    public function setID(){
        static $id = 0;
        $this->shrimpID = $id;
        $id += 1;                               // increment id
    }
    public function getID(){
        return $this->shrimpID;
    }
    public function isOnRock(){
        // checks the position of shrimp, and return true or false if on rock
    }
    public function getCoralColor(){
        // return the color of coral currently inhabiting
    }
    public function isValidLoc($location){
        // assuming setBoard has already occurred
        // column-> 8 mod 7 = 1, row-> 8 div 7 = 1, make sure no coral in current location except planning on devouring
        $row = floor($location/6);
        $column = $location % 7;
        $positions = array(             // for regions surrounding adjacently
                $row + 1, $row - 1,
                $column + 1, $column - 1
            );
        $numbers = array(7, -7, 1, -1); // all numbers for location addition
        $chosen = array();              // valid locations to verify
        $locationArray = array();       // valid locations chosen
        for($i = 0; $i < count($positions); $i++){
            $extra = floor($i/2);           // add that extra value when computing bounds of columns
            $extra2 = ($extra == 1)? 0: 1;  // exact opposite of extra, as this is used for locationArray
            $chosen[] = ($positions[$i] > -1 and $positions[$i] < (6 + $extra))? 1: 0;
            if ($chosen[$i] == 0){continue;};
            $locationArray[] = $location + ($numbers[$i]*$extra2) + ($numbers[$i]*$extra);
        }
        $validPos = true;                   // initially assumes all is valid
        $this->verifyPos($validPos, $locationArray, $location);
        return $validPos;
    }
    private function verifyPos(&$validPos, $locationArray, $location){
        try{
            $shrimpNo = 0;
            $shrimpID1 = -1;
            
            // code for if current location is not contained by something else
            if(count($this->myBoard[$location]) < 1){
                // implement code for checking whether to devour or not later
                $validPos = false;
                throw new exception('invalid space');
                // end($this->myBoard[$location]);
                // $obj = &$this->myBoard[$location][key($this->myBoard[$location])];    // retrieve last object in that position of the board array by reference
            }
            for($i = 0; $i < count($locationArray); $i++){
                $pos = $locationArray[$i];      // current location being searched
                if(count($this->myBoard[$pos]) == 0 ||
                $this->myBoard[$pos] == 'x' ||
                $this->myBoard[$pos] == '_'){
                    continue;
                }
            }
        }catch (Exception $e ) {
               // just used to move on
               $e->getMessage();
        }
    }
}
?>