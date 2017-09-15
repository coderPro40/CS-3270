<?php
	function moveShrimp()
	{
		$sb0 = $_SESSION['sb0'];
		$sb3 = $_SESSION['sb3'];
		for ($i=0;$i<42;$i++)
		{
			$el = $sb0[$i];
			$el1 = $sb3[$i];
			if ($el =='p')
			{
				$el = "<a href='hw7db.php?act=moveShrimp&b0=0&mv=".$i."'><IMG SRC='game/reef/images/sP.gif'></a>";
				$sb0[$i] =$el;
			}
				
			elseif ($el1 =='p')
			{
				$el1 = "<a href='hw7db.php?act=moveShrimp&b0=0&mv=".$i."'><IMG SRC='game/reef/images/sP.gif'></a>";
				$sb3[$i] =$el1;
			}
		}
		$_SESSION['sb0'] = $sb0;
		$_SESSION['sb3'] = $sb3;
	}
	
	function showMoveShrimp()
	{
		$m = filter_input(INPUT_GET, "m");
		$sb0 = $_SESSION['sb0'];
		$count = 0;
        $count2 = 0;
		foreach ($sb0 as $el) 
			{
					if ($count == 7)
					{
							$count = 0;
							$count2++;
					}
					if ($el !='x' and $el !='_')
						echo "<span style='left:" . left($count) . "; top:" . top($count2). "; width:0px; height: 0px; position:absolute; z-index:502;'>". $el ."</span>" . kEOL;
					$count++;
			}
			$_SESSION["sb0"] = $sb0;    // store array of updated shrimps in session variable
    }
    function showMoveShrimp2()
	{
		$m = filter_input(INPUT_GET, "m");
		$sb3 = $_SESSION['sb3'];
		$count = 0;
        $count2 = 0;
		foreach ($sb3 as $el) 
			{
					if ($count == 7)
					{
							$count = 0;
							$count2++;
					}
					if ($el !='x' and $el !='_')
						echo "<span style='left:" . left($count) . "; top:" . top($count2). "; width:0px; height: 0px; position:absolute; z-index:502;'>".$el."</span>" . kEOL;
					$count++;
			}
			$_SESSION["sb3"] = $sb3;    // store array of updated shrimps in session variable
    }
    function removeShrimp()
    {
		echo "<a href='hw7db.php?action=remove&to=supply&r=1&five=1'>Remove Shrimp</a>";
	}
    function placeTargetM0() 
    {
		$sb0 = $_SESSION['sb0'];
		$sb0[$m] = ' ';
		$_SESSION['sb0'] = $sb0;
        // commands for gamelog
        $name = "action 5";     // name of action to be written to file
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
		{   // where player chooses position of Tiles
			if($choice == 0){
				echo "<span style='left:" . left1($el) . "; top:" . top1($el) . "; width:0px; height: 0px; position:absolute; z-index:501;'> <a href='hw7db.php?act=placeshrimp&b0=0&m=". $el ."&r=1'>[+]</a></span>" . kEOL;
			}
			else {
				echo "<span style='left:" . left3($el) . "; top:" . top3($el) . "; width:0px; height: 0px; position:absolute; z-index:501;'> <a href='hw7db.php?act=placeshrimp&b0=0&m=". $el ."&r=1'>[+]</a></span>" . kEOL;
			}
		}
    }
    
    function placeTargetM1() 
    {
		$sb3 = $_SESSION['sb3'];
		$sb3[$m] = ' ';
		$_SESSION['sb3'] = $sb3;
        $bHolder = array(
			array(1=>3,4,5,8,9,10,11,12,14,15,17,18,19,20,21,22,23,24,25,27,28,29,30,32,33,34,35,36,37,38,39,40,41),
			array(0=>1,2,3,4,5,7,8,9,10,12,13,14,15,17,18,19,20,21,22,23,24,25,26,27,29,30,31,32,33,36,37,39,40)
			);
		
		$choice = ($_SESSION['bSecond'][2] == 'x')? 0: 1;		// check array to determine board to releases
		$b0 = $bHolder[$choice];
		foreach ($b0 as $el) 
		{   // where player chooses position of Tiles
			if($choice == 0){
				echo "<span style='left:" . left1($el) . "; top:" . top1($el) . "; width:0px; height: 0px; position:absolute; z-index:501;'> <a href='hw7db.php?act=placeshrimp&b0=0&m1=". $el ."&r=1'>[+]</a></span>" . kEOL;
			}
			else {
				echo "<span style='left:" . left3($el) . "; top:" . top3($el) . "; width:0px; height: 0px; position:absolute; z-index:501;'> <a href='hw7db.php?act=placeshrimp&b0=0&m1=". $el ."&r=1'>[+]</a></span>" . kEOL;
			}
		}
    }
?>
