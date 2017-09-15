<?php
    function placeTarget0() 
    {
        // commands for gamelog
        $name = "action 4";     // name of action to be written to file
        include_once 'gameLog.php';
        createLG($name);     // write name of action to file

		 // action 4 begins
        $bHolder = array(
		array(1=>3,4,5,8,9,10,11,12,14,15,17,18,19,20,21,22,23,24,25,27,28,29,30,32,33,34,35,36,37,38,39,40,41),
		array(0=>1,2,3,4,5,7,8,9,10,12,13,14,15,17,18,19,20,21,22,23,24,25,26,27,29,30,31,32,33,36,37,39,40)
		);
	
		$choice = ($_SESSION['bFirst'][2] == 'x')? 0: 1;		// check array to determine board to releases
		$b0 = $bHolder[$choice];
        foreach ($b0 as $el) 
        {   // where player chooses position of shrimp
            if($choice == 0){
                        echo "<span style='left:" . left1($el) . "; top:" . top1($el) . "; width:0px; height: 0px; position:absolute; z-index:501;'> <a href='hw7db.php?act=placeshrimp&b0=0&c=". $el ."&r=1&four=1'>[+]</a></span>" . kEOL;
        	}
        	else {
                        echo "<span style='left:" . left3($el) . "; top:" . top3($el) . "; width:0px; height: 0px; position:absolute; z-index:501;'> <a href='hw7db.php?act=placeshrimp&b0=0&c=". $el ."&r=1&four=1'>[+]</a></span>" . kEOL;
        	}
        }
    }
    function left1($el)
    {
        if($el == 14 or $el == 21 or $el == 28 or $el == 35 )
                return 42;
        elseif($el == 8 or $el == 15 or $el == 22 or $el == 29 or $el == 36)
                return 82;
        elseif($el == 9 or $el == 23 or $el == 30 or $el == 37 )
                return 122;
        elseif($el == 3 or $el == 10 or $el == 17 or $el == 24 or $el == 38 )
                return 162;
        elseif($el == 4 or $el == 11 or $el == 18 or $el == 25 or $el == 32 or $el == 39 )
                return 202;
        elseif($el == 5 or $el == 12 or $el == 19 or $el == 33 or $el == 40)
                return 242;
        elseif($el == 20 or $el == 27 or $el == 34 or $el == 41)
                return 282;
    }
    function top1($el)
    {
        if($el == 3 or $el == 4 or $el == 5)
                return 37;
        elseif($el == 8 or $el == 9 or $el == 10 or $el == 11 or $el == 12 )
                return 77;
        elseif($el == 14 or $el == 15 or $el == 17 or $el == 18 or $el == 19 or $el == 20 )
                return 117;
        elseif($el == 21 or $el == 22 or $el == 23 or $el == 24 or $el == 25 or $el == 27 )
                return 157;
        elseif($el == 28 or $el == 29 or $el == 30 or $el == 32 or $el == 33 or $el == 34 )
                return 197;
        elseif($el == 35 or $el == 36 or $el == 37 or $el == 38 or $el == 39 or $el == 40 or $el == 41 )
                return 237;
    }
    
    function placeTarget1() 
    {
        $bHolder = array(
		array(1=>3,4,5,8,9,10,11,12,14,15,17,18,19,20,21,22,23,24,25,27,28,29,30,32,33,34,35,36,37,38,39,40,41),
		array(0=>1,2,3,4,5,7,8,9,10,12,13,14,15,17,18,19,20,21,22,23,24,25,26,27,29,30,31,32,33,36,37,39,40)
		);
	
	$choice = ($_SESSION['bSecond'][2] == 'x')? 0: 1;		// check array to determine board to releases
	$b0 = $bHolder[$choice];
	foreach ($b0 as $el) 
	{   // where player chooses position of Tiles
		if($choice == 0){
                        echo "<span style='left:" . left1($el) . "; top:" . top1($el) . "; width:0px; height: 0px; position:absolute; z-index:501;'> <a href='hw7db.php?act=placeshrimp&b0=0&c1=". $el ."&r=1&four=1'>[+]</a></span>" . kEOL;
        	}
        	else {
                        echo "<span style='left:" . left3($el) . "; top:" . top3($el) . "; width:0px; height: 0px; position:absolute; z-index:501;'> <a href='hw7db.php?act=placeshrimp&b0=0&c1=". $el ."&r=1&four=1'>[+]</a></span>" . kEOL;
        	}
	}
    }
    function left3($el)
    {
        if($el == 7 or $el == 14 or $el == 21)
                return 42;
        elseif($el == 1 or $el == 8 or $el == 15 or $el == 22 or $el == 29 or $el == 36)
                return 82;
        elseif($el == 2 or $el == 9 or $el == 23 or $el == 30 or $el == 37)
                return 122;
        elseif($el == 3 or $el == 10 or $el == 17 or $el == 24 or $el == 31)
                return 162;
        elseif($el == 4 or $el == 18 or $el == 25 or $el == 32 or $el == 39)
                return 202;
        elseif($el == 5 or $el == 12 or $el == 19 or $el == 26 or $el == 33 or $el == 40 )
                return 242;
        elseif($el == 13 or $el == 20 or $el == 27)
                return 282;
    }
    function top3($el)
    {
        if($el == 1 or $el == 2 or $el == 3 or $el == 4 or $el == 5 )
                return 37;
        elseif($el == 7 or $el == 8 or $el == 9 or $el == 10 or $el == 12 or $el == 13 )
                return 77;
        elseif($el == 14 or $el == 15 or $el == 17 or $el == 18 or $el == 19 or $el == 20 )
                return 117;
        elseif($el == 21 or $el == 22 or $el == 23 or $el == 24 or $el == 25 or $el == 26 or $el == 27 )
                return 157;
        elseif($el == 29 or $el == 30 or $el == 31 or $el == 32 or $el == 33)
                return 197;
        elseif($el == 36 or $el == 37 or $el == 39 or $el == 40)
                return 237;
    }
?>
