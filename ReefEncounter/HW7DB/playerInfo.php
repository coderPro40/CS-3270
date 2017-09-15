<?php
	// This function displays player 1's initial larvaCubes.
	
	function player1(){
		if (isset($_SESSION["player1"]))
			$player1 = $_SESSION["player1"];
		else
		{
			$aryw = array(0 =>'w',1);
			$aryg = array(0 =>'g',0);
			$aryy = array(0 =>'y',0);
			$aryo = array(0 =>'o',1);
			$aryp = array(0 =>'p',0);
			$player1 = array(0 => $aryw,$aryg,$aryy,$aryo,$aryp);
		}
		foreach ($player1 as $el)
		{
			if ($el[1] != 0)
				{
				if ($el[0] == 'w')
					$el[0] = "<IMG border=1 SRC='game/reef/images/l0.gif' ALT=[w] WIDTH=16 HEIGHT=16>";
				elseif ($el[0] == 'g')
					$el[0] = "<IMG border=1 SRC='game/reef/images/l4.gif' ALT=[g] WIDTH=16 HEIGHT=16>";
				elseif ($el[0] == 'y')
					$el[0] = "<IMG border=1 SRC='game/reef/images/l1.gif' ALT=[y] WIDTH=16 HEIGHT=16>";
				elseif ($el[0] == 'o')
					$el[0] = "<IMG border=1 SRC='game/reef/images/l2.gif' ALT=[o] WIDTH=16 HEIGHT=16>";
				elseif ($el[0] == 'p')
					$el[0] = "<IMG border=1 SRC='game/reef/images/l3.gif' ALT=[p] WIDTH=16 HEIGHT=16>";
				echo "<TD>".$el[1]."X".$el[0]."</TD>";
				}
		}
		$_SESSION["player1"] = $player1;
	}
	// displays player 1's eaten shrimp
	function player1SE()
	{
		if (isset($_SESSION['eat']))
			$eat = $_SESSION['eat'];
		else
			$eat = array ();
		
		if (isset($_SESSION['SE']))
			$SE = $_SESSION['SE'];
		else
		{
			$sARAY = array (0=>'','');
			$SE = array (0=>$sARAY);
		}
		$pick = filter_input(INPUT_GET, 'pick');
		$pick1 = filter_input(INPUT_GET, 'pick1');
		if ($pick !='')
			$sAry = $_SESSION['sb0'];
		elseif ($pick1 !='')
			$sAry = $_SESSION['sb3'];
		else
			$sAry = array (0=>'','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','');
		
		if ($pick!='' or $pick1!='')
			$SE[0][1] = $SE[0][1] + 1;
		echo $SE[0][1];
	$_SESSION['SE'] = $SE;
	}
	function player2SE()
	{
		
	}
	function player2Consumed($type,$consumed)
	{
		
	}
	
	// This function displays player 2's initial larvaCubes.
	
	function player2(){
		if (isset($_SESSION["player2"]))
			$player2 = $_SESSION["player2"];
		else
		{
			$aryw = array(0 =>'w',2);
			$aryg = array(0 =>'g',0);
			$aryy = array(0 =>'y',0);
			$aryo = array(0 =>'o',0);
			$aryp = array(0 =>'p',0);
			$player2 = array(0 => $aryw,$aryg,$aryy,$aryo,$aryp);
		}
		foreach ($player2 as $el)
		{
			if ($el[1] != 0)
				{
				if ($el[0] == 'w')
					$el[0] = "<IMG border=1 SRC='game/reef/images/l0.gif' ALT=[w] WIDTH=16 HEIGHT=16>";
				elseif ($el[0] == 'g')
					$el[0] = "<IMG border=1 SRC='game/reef/images/l4.gif' ALT=[g] WIDTH=16 HEIGHT=16>";
				elseif ($el[0] == 'y')
					$el[0] = "<IMG border=1 SRC='game/reef/images/l1.gif' ALT=[y] WIDTH=16 HEIGHT=16>";
				elseif ($el[0] == 'o')
					$el[0] = "<IMG border=1 SRC='game/reef/images/l2.gif' ALT=[o] WIDTH=16 HEIGHT=16>";
				elseif ($el[0] == 'p')
					$el[0] = "<IMG border=1 SRC='game/reef/images/l3.gif' ALT=[p] WIDTH=16 HEIGHT=16>";
				echo "<TD>".$el[1]."X".$el[0]."</TD>";
				}
		}
	}
?>
