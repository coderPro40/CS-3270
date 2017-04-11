<?php
    /* 
     * To change this license header, choose License Headers in Project Properties.
     * To change this template file, choose Tools | Templates
     * and open the template in the editor.
     */
    define("kEOL", chr(13).chr(10));
    $rf0 = array(0=>'x','x','x','','','','x','x','','','y','','','x','','','x','','w','','','','g','','_','','x','','','','p','x','o','','','','','','','','','');
    $rf3 = array(0=>'x','','','','','','x','','','','o','x','','','','','x','','g','','','','w','','_','','','','x','','p','','y','','x','x','','','x','','','x');
    
    function showShrimp1($choice)               // to choose if using during action or hw6
    {
        $p = filter_input(INPUT_GET, "p");  // to see if action 4 is to be repeated
        $c = filter_input(INPUT_GET, "c");  // shrimp's location, if placed
        $count = 0;
        $count2 = 0;
        if ($p != 0 and $choice == false){
            if(isset($_SESSION["prev"])){           // if clicking button after placing shrimp
                $redo = "Start Your Turn Over";
                $sb0 = $_SESSION["prev"];           // $sbo refers to the array where shrimps will be stored
                include_once 'gameLog.php';         // include gamelog file
                createLG($redo);                    // write string to gamelog
            }
            else{
                $sb0 = array(0=>'x','x','x','','','','x','x','','','','','','x','','','x','','','','','','','','','','x','','','','','','','','','','','','','','','');
            }
        }
        elseif(isset($_SESSION["sb0"])){
            $sb0 = $_SESSION["sb0"];
        }
        else{
            $sb0 = array(0=>'x','x','x','','','','x','x','','','','','','x','','','x','','','','','','','','','','x','','','','','','','','','','','','','','','');
            include_once 'gameLog.php';         // include gamelog file
            createLG();                         // write string for start game to game log
        }
        if($choice != false){
            $_SESSION["prev"] = $sb0;      // save prev array with action tabs
        }
        else{
            // gamelog update goes here
            include_once 'gameLog.php';      // include gamelog file
            writeArrayPosLeft($c);      // for left board
        }
        if (is_numeric($c))
            $sb0[$c] = 'p'; // place shrimp if position, $c, is chosen

        foreach ($sb0 as $el) 
        {
                if ($count == 7)
                {
                        $count = 0;
                        $count2++;
                }
                echo "<span style='left:" . left($count) . "; top:" . top($count2). "; width:0px; height: 0px; position:absolute; z-index:502;'>". placeS($el) ."</span>" . kEOL;
                $count++;
        }
        $_SESSION["sb0"] = $sb0;    // store array of updated shrimps in session variable
    }
    function showBoard($rf0) 
    {
            $count = 0;
            $count2 = 0;
            // $rf0 = $rf0;

            foreach ($rf0 as $el) 
            {
                    if ($count == 7)
                    {
                            $count = 0;
                            $count2++;
                    }
                    echo "<span style='left:" . left($count) . "; top:" . top($count2) . "; width:0px; height: 0px; position:absolute; z-index:501;'>". place($el) ."</span>" . kEOL;
                    $count++;
            }
    }
    function left($count)
    {
            $thirty = 34;
            $left = ($count*40) + $thirty;
            return $left;
    }
    function top($count2)
    {
            $twenty = 29;
            $top = ($count2*40) + $twenty;
            return $top;
    }
    function place($el)
    {
            if ($el == 'w')
                    $el = '<IMG SRC="game/reef/images/p0.jpg" HEIGHT=32 WIDTH=32 ALT="w">';
            elseif ($el == 'y')
                    $el = '<IMG SRC="game/reef/images/p1.jpg" HEIGHT=32 WIDTH=32 ALT="y">';
            elseif ($el == 'o')
                    $el = '<IMG SRC="game/reef/images/p2.jpg" HEIGHT=32 WIDTH=32 ALT="o">';
            elseif ($el == 'p')
                    $el = '<IMG SRC="game/reef/images/p3.jpg" HEIGHT=32 WIDTH=32 ALT="p">';
            elseif ($el == 'g')
                    $el = '<IMG SRC="game/reef/images/p4.jpg" HEIGHT=32 WIDTH=32 ALT="g">';
            else
                    $el = '';
            return $el;
    }
    function placeS($el)
    {
            if ($el == 'r')
                    $el = '<IMG SRC="game/reef/images/sR.gif">';
            elseif ($el == 'y')
                    $el = '<IMG SRC="game/reef/images/sY.gif">';
            elseif ($el == 'p')
                    $el = '<IMG SRC="game/reef/images/sP.gif">';
            elseif ($el == 'g')
                    $el = '<IMG SRC="game/reef/images/sG.gif">';
            else
                    $el = '';
            return $el;
    }
?>