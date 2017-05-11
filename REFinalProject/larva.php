<?php
class larva{
    protected $posCol = 0;
    protected $imgs = array();
    private $larvaID = -1;          // larva ID
    public $myImage = 0;
    public $myPlayer = 0;           // select player
    public $myColor = 0;            // color attribute
    public $myExt = 'gif';          // image extension
    public $myName = 'larva';       // name of the object
    public function __construct(){
        $choices = array('w','y','o','p','g');
        $this->posCol = $choices;
        for($i = 0; $i < count($choices); $i++){
            $this->imgs[$choices[$i]] = 'l'.$i; // img name
        }
    }
    public function setColor($color){
        // set attributes
        $this->myColor = $color;
        $this->myImage = $this->imgs[$color];
    }
    public function setID(){
        static $id = 0;
        $this->larvaID = $id;
        $id += 1;                               // increment ID
    }
    public function getID(){
        return $this->polypID;
    }
}