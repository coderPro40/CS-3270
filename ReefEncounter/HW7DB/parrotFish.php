<?php
	// This function shows you what is inside your parrotfish
	
	function parrotFish()
	{
		if (isset($_SESSION['eat']))
			$eat = $_SESSION['eat'];
		else
			$eat = array ();
		if (isset($_SESSION['CTiletype']))
			$type = $_SESSION['CTiletype'];
		else
			$type = '';
		if (isset ($_SESSION['consumed']))
			$consumed = $_SESSION['consumed'];
		else{
			$aryw = array(0 =>'w',0);
			$aryg = array(0 =>'g',0);
			$aryy = array(0 =>'y',0);
			$aryo = array(0 =>'o',1);
			$aryp = array(0 =>'p',0);
			$consumed = array(0 => $aryw,$aryg,$aryy,$aryo,$aryp);
			}
		for($i=0;$i<count($consumed);$i++)
		{
			if($consumed[$i][0] == $type)
				$consumed[$i][1] = $consumed[$i][1] + count($eat) - 4;
			if ($consumed[$i][1] !=0){
				echo $consumed[$i][1]."X";
				if ($consumed[$i][0] == 'w')
					echo "<IMG border=1 SRC='game/reef/images/p0.jpg' ALT=[w] WIDTH=16 HEIGHT=16>";
				elseif ($consumed[$i][0] == 'g')
					echo  "<IMG border=1 SRC='game/reef/images/p4.jpg' ALT=[g] WIDTH=16 HEIGHT=16>";
				elseif ($consumed[$i][0] == 'y')
					echo "<IMG border=1 SRC='game/reef/images/p1.jpg' ALT=[y] WIDTH=16 HEIGHT=16>";
				elseif ($consumed[$i][0] == 'o')
					echo "<IMG border=1 SRC='game/reef/images/p2.jpg' ALT=[o] WIDTH=16 HEIGHT=16>";
				elseif ($consumed[$i][0] == 'p')
					echo "<IMG border=1 SRC='game/reef/images/p3.jpg' ALT=[p] WIDTH=16 HEIGHT=16>";
			}
		}
		$_SESSION['consumed'] = $consumed;
		$_SESSION['CTiletype'] = $type;
		$_SESSION['eat'] = $eat;
	}
?>
