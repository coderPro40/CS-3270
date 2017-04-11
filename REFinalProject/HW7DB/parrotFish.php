<?php
	// This function shows you what is inside your parrotfish
	
	function parrotFish()
	{
		if (isset($_SESSION["fish"]))
			$fish = $_SESSION["fish"];
		else
		{
			$aryw = array(0 =>'w',0);
			$aryg = array(0 =>'g',0);
			$aryy = array(0 =>'y',0);
			$aryo = array(0 =>'o',1);
			$aryp = array(0 =>'p',0);
			$fish = array(0 => $aryw,$aryg,$aryy,$aryo,$aryp);
		}
		foreach ($fish as $el)
		{
			if ($el[1] != 0)
			{
				if ($el[0] == 'w')
					$el[0] = "<IMG border=1 SRC='game/reef/images/p0.jpg' ALT=[w] WIDTH=16 HEIGHT=16>";
				elseif ($el[0] == 'g')
					$el[0] = "<IMG border=1 SRC='game/reef/images/p4.jpg' ALT=[g] WIDTH=16 HEIGHT=16>";
				elseif ($el[0] == 'y')
					$el[0] = "<IMG border=1 SRC='game/reef/images/p1.jpg' ALT=[y] WIDTH=16 HEIGHT=16>";
				elseif ($el[0] == 'o')
					$el[0] = "<IMG border=1 SRC='game/reef/images/p2.jpg' ALT=[o] WIDTH=16 HEIGHT=16>";
				elseif ($el[0] == 'p')
					$el[0] = "<IMG border=1 SRC='game/reef/images/p3.jpg' ALT=[p] WIDTH=16 HEIGHT=16>";
				echo "<TD>".$el[1]."X".$el[0]."</TD>";
			}
		}
		$_SESSION["fish"] = $fish;
	}
?>
