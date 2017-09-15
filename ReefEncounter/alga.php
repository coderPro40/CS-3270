<?php
class alga{
    protected $posCol = 0;
    protected $imgs = array();
    private $algaID = -1;           // alga ID
    private $myImg = 0;
    public $myPlayer = 0;           // select player
    public $myColor = 0;            // color attribute
    public $myExt = 'gif';          // image extension
    public $myName = 'alga';        // name of the object
    public function __construct(){
        $choices = array('b','g','p','r');
        $this->posCol = $choices;
        for($i = 0; $i < count($choices); $i++){
            $this->imgs[$choices[$i]] = 'cy'.($choices[$i]);    // img name
        }
    }
    public function setColor($color){
        $this->algaID = $id;
        $this->myColor = $color;
        $this->myImg = $this->imgs[$color];
    }
    
    public function setID(){
        static $id = 0;
        $this->larvaID = $id;
        $id += 1;                               // increment ID
    }
    public function getID(){
        return $this->algaID;
    }
}