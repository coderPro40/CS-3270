<?php
class polyp{
    protected $colors = array();
    private $myColor = 0;           // color attribute
    private $myBoard = 0;           // board attribute
    private $myLocation = 0;        // location attribute
    private $polypID = 16;
    public $myImg = 0;
    public $myName = 'polyp';       // name of the object
    public function __construct(){
        $choices = array('w','y','o','p','g');
        for($i = 0; $i < count($choices); $i++){
            $this->colors[$choices[$i]] = '<IMG SRC="game/reef/images/p'.$i.'.jpg" HEIGHT=32 WIDTH=32 ALT="'.$choices[$i].'">';
        }
    }
    public function setBoard(&$board){  // pointer to board's exact location, pass by reference
        $this->myBoard = &$board;        // update current board contents
    }
    public function setColor($color){
        $this->myColor = $color;                // set color of polyp
        $this->myImg = $this->colors[$color];   // set image to be displayed when needed
    }
    public function setID($pID){
        $this->polypID = $pID;
    }
    public function getID(){
        return $this->polypID;
    }
    public function getImage(){
        return $myImg;                          // get image from object
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
    public function location($pos){
        $this->myLocation = $pos;           // set location of polyp object
        $this->myBoard[$pos][] = $this->polypID;     // store object in that array location
    }
    private function verifyPos(&$validPos, $locationArray, $location){
        try{
            $shrimpNo = 0;
            $shrimpID1 = -1;
            
            // code for if current location is contained by something else
            if(count($this->myBoard[$location]) > 0){
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
                
                // end($this->myBoard[$pos]);
                // $obj = &$this->myBoard[$pos][key($this->myBoard[$pos])];    // retrieve last object in that position of the board array by reference
                // if($obj->myName != 'polyp'){                                // in the occassion that adjacent object is a shrimp currently on a polyp tile
                //     if($obj->isOnRock() == false &&                         // of same color
                //     $obj->getCoralColor() == $this->myColor &&
                //     $obj->shrimpID != $shrimpID1){
                //         $shrimpID1 = $obj->shrimpID;                        // mark ID #
                //         $shrimpNo += 1;                                     // same color coral
                //         $validPos = ($shrimpNo > 1)? false: true;           // the position is invalid
                //     }
                //     continue;                                               // move on
                // }
                // if($obj->myColor == $this->myColor &&
                // $obj->hasShrimp() != $shrimpID1){                       // check to see if same color and different shrimps from current
                //     $shrimpID1 = $obj->hasShrimp();                     // mark ID #
                //     $shrimpNo += 1;                                     // same color coral
                //     $validPos = ($shrimpNo > 1)? false: true;           // the position is invalid
                // }
                
            }
        }catch (Exception $e ) {
           // just used to move on
           $e->getMessage();
       }
        
    }
}
?>