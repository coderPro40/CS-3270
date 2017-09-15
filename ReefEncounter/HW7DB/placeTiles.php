<?php
	function placeTileTargets($place)
	{
		// commands for gamelog
		$name = "action 2";     // name of action to be written to file
		include_once 'gameLog.php';
		createLG($name);     // write name of action to file
		
		$place = preg_split("//",$place);
		if (isset($_SESSION['num']))
		{
				$num = $_SESSION['num'];
				$num = $num - 1;
		}
		else{
			$_SESSION['num'] = $place[2];
			$num = $_SESSION['num'];
			$num = $num - 1;
		}
		
		if (isset($_SESSION['type']))
		{
			$type = $_SESSION['type'];
			
		}
		else{
			$_SESSION['type'] = $place[1];
			$type = $_SESSION['type'];
		}
		
		$bHolder = array(
			array(1=>3,4,5,8,9,10,11,12,14,15,17,18,19,20,21,22,23,24,25,27,28,29,30,32,33,34,35,36,37,38,39,40,41),
			array(0=>1,2,3,4,5,7,8,9,10,12,13,14,15,17,18,19,20,21,22,23,24,25,26,27,29,30,31,32,33,36,37,39,40)
			);
		
		$choice = ($_SESSION['bFirst'][2] == 'x')? 0: 1;		// check array to determine board to releases
		$b0 = $bHolder[$choice];
		foreach ($b0 as $el) 
		{   // where player chooses position of Tiles
			if($choice == 0){
				echo "<span style='left:" . leftT($el) . "; top:" . topT($el) . "; width:0px; height: 0px; position:absolute; z-index:500;'> <a href='hw7db.php?act=placeTile&b0=0&num=".$num."&type=".$type."&T=". $el ."&r=1'>[+]</a></span>" . kEOL;
			}
			else {
				echo "<span style='left:" . leftT1($el) . "; top:" . topT1($el) . "; width:0px; height: 0px; position:absolute; z-index:500;'> <a href='hw7db.php?act=placeTile&b0=0&num=".$num."&type=".$type."&T=". $el ."&r=1'>[+]</a></span>" . kEOL;
			}
		}
		
		$_SESSION['num'] = $num;
		$_SESSION['type'] = $type;
	}
	function leftT($el)
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
	function topT($el)
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
	
	function placeTileTargets2($place)
	{
		// commands for gamelog
		$name = "action 2";     // name of action to be written to file
		include_once 'gameLog.php';
		createLG($name);     // write name of action to file
		
		$place = preg_split("//",$place);
		if (isset($_SESSION['num1']))
		{
				$num = $_SESSION['num1'];
				$num = $num - 1;
		}
		else{
			$_SESSION['num1'] = $place[2];
			$num = $_SESSION['num1'];
			$num = $num - 1;
		}
		
		if (isset($_SESSION['type']))
		{
			$type = $_SESSION['type'];
			
		}
		else{
			$_SESSION['type'] = $place[1];
			$type = $_SESSION['type'];
		}
		
		$bHolder = array(
			array(1=>3,4,5,8,9,10,11,12,14,15,17,18,19,20,21,22,23,24,25,27,28,29,30,32,33,34,35,36,37,38,39,40,41),
			array(0=>1,2,3,4,5,7,8,9,10,12,13,14,15,17,18,19,20,21,22,23,24,25,26,27,29,30,31,32,33,36,37,39,40)
			);
		
		$choice = ($_SESSION['bSecond'][2] == 'x')? 0: 1;		// check array to determine board to releases
		$b0 = $bHolder[$choice];
		foreach ($b0 as $el) 
		{   // where player chooses position of Tiles
			if($choice == 0){
				echo "<span style='left:" . leftT($el) . "; top:" . topT($el) . "; width:0px; height: 0px; position:absolute; z-index:500;'> <a href='hw7db.php?act=placeTile&b0=0&num1=".$num."&type=".$type."&T1=". $el ."&r=1'>[+]</a></span>" . kEOL;
			}
			else {
				echo "<span style='left:" . leftT1($el) . "; top:" . topT1($el) . "; width:0px; height: 0px; position:absolute; z-index:500;'> <a href='hw7db.php?act=placeTile&b0=0&num1=".$num."&type=".$type."&T1=". $el ."&r=1'>[+]</a></span>" . kEOL;
			}
		}
		$_SESSION['num1'] = $num;
		$_SESSION['type'] = $type;
	}
	function leftT1($el)
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
    function topT1($el)
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
	
	function showTiles1()               // to choose if using during action or hw6
    {
		$p = filter_input(INPUT_GET, "p");
        $image = filter_input(INPUT_GET, "type");  // to see if action 4 is to be repeated
        $loc = filter_input(INPUT_GET, "T");  // shrimp's location, if placed
        $count = 0;
        $count2 = 0;
        if ($p == 1){
			if(isset($_SESSION["prev3"]))
			{
				$redo = "Start Your Turn Over";
                $rf0 = $_SESSION["prev3"];
                include_once 'gameLog.php';
                createLG($redo);
			}
            else
                $rf0= $_SESSION['first'];
        }
        
		elseif(isset($_SESSION["rf0"])){
            $rf0 = $_SESSION["rf0"];
            $_SESSION["prev3"] = $rf0;
            include_once 'gameLog.php';
            writeArrayPosLeftT($loc);
        }
        else{
            $rf0 = $_SESSION['first'];
            include_once 'gameLog.php';         // include gamelog file
            createLG();                         // write string for start game to game log
        }
        if (is_numeric($loc))
            $rf0[$loc] = $image; // place shrimp if position, $c, is chosen

        foreach ($rf0 as $el) 
        {
                if ($count == 7)
                {
                        $count = 0;
                        $count2++;
                }
                include_once 'shrimpBrdOne.php';
                echo "<span style='left:" . left($count) . "; top:" . top($count2). "; width:0px; height: 0px; position:absolute; z-index:501;'>". place($el) ."</span>" . kEOL;
                $count++;
        }
        $_SESSION["rf0"] = $rf0;    // store array of updated Tiles in session variable
    }
    
    function showTiles2()               // to choose if using during action or hw6
    {
		$p = filter_input(INPUT_GET, "p");
        $image = filter_input(INPUT_GET, "type");  // to see if action 4 is to be repeated
        $loc = filter_input(INPUT_GET, "T1");  // shrimp's location, if placed
        $count = 0;
        $count2 = 0;
        if ($p == 1){
			if(isset($_SESSION["prev4"])){
				$redo = "Start Your Turn Over";
                $rf3 = $_SESSION["prev4"];
                include_once 'gameLog.php';
                createLG($redo);
			}
            else
				$rf3 = $_SESSION['second'];
        }
        elseif(isset($_SESSION["rf3"])){
            $rf3 = $_SESSION["rf3"];
             $_SESSION["prev4"] = $rf3;
            include_once 'gameLog.php';
            writeArrayPosRightT($loc);
        }
        else{
            $rf3 = $_SESSION['second'];
            include_once 'gameLog.php';         // include gamelog file
            createLG();                         // write string for start game to game log
        }
        if (is_numeric($loc))
            $rf3[$loc] = $image; // place shrimp if position, $c, is chosen

        foreach ($rf3 as $el) 
        {
                if ($count == 7)
                {
                        $count = 0;
                        $count2++;
                }
                include_once 'shrimpBrdOne.php';
                echo "<span style='left:" . left($count) . "; top:" . top($count2). "; width:0px; height: 0px; position:absolute; z-index:501;'>". place($el) ."</span>" . kEOL;
                $count++;
        }
        $_SESSION["rf3"] = $rf3;    // store array of updated Tiles in session variable
    }
    
?>
