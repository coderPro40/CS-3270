<?php
	// This function displays the shrimp the player currently has and can place
	
	function shrimpArray(){
		if (isset($_SESSION["shrimp"]))
			$shrimp = $_SESSION["shrimp"];
		else
			$shrimp = array(0=>'p','p','p','p');
		$c = filter_input(INPUT_GET, "c");
		if (is_numeric($c))
			array_pop($shrimp);
		$c1 = filter_input(INPUT_GET, "c1");
		if (is_numeric($c1))
			array_pop($shrimp);
		$return = filter_input(INPUT_GET, "to");
		if ($return == 'supply')
			array_push($shrimp,'p');
		foreach ($shrimp as $el)
		{
			if ($el == 'p')
			{
				$el = "<IMG SRC='game/reef/images/sP.gif'>";
			}
		echo "<TD>".$el."</TD>";
		}
		$_SESSION["shrimp"] = $shrimp;
	}
	
	// This displays the polypTiles the player currently owns and can place
	
	function polypTilesArray(){
		if (isset($_SESSION["polypTiles"]))
		{
			$polypTiles = $_SESSION["polypTiles"];
			$place = filter_input(INPUT_GET, 'place');
			if ($place != '')
			{
				$place = preg_split("//",$place);
				for ($i=0;$i<5;$i++)
				{
					if ($polypTiles[$i][0] == $place[1])
						$polypTiles[$i][1] = $polypTiles[$i][1] - $place[2] ;
				}
				$_SESSION["polypTiles"] = $polypTiles;
			}
		$polypTiles = $_SESSION["polypTiles"];
		}
		else
		{
			$aryw = array(0 =>'w',4);
			$aryg = array(0 =>'g',4);
			$aryy = array(0 =>'y',4);
			$aryo = array(0 =>'o',4);
			$aryp = array(0 =>'p',4);
			$polypTiles = array(0 => $aryw,$aryg,$aryy,$aryo,$aryp);
		}
		$PT = filter_input(INPUT_GET, 'polypTileType');
		if ($PT == 'p0')
			$polypTiles[0][1] = $polypTiles[0][1] +1;
		elseif($PT == 'p1')
			$polypTiles[2][1] = $polypTiles[2][1] +1;
		elseif($PT == 'p2')
			$polypTiles[3][1] = $polypTiles[3][1] +1;
		elseif($PT == 'p3')
			$polypTiles[4][1] = $polypTiles[4][1] +1;
		elseif($PT == 'p4')
			$polypTiles[1][1] = $polypTiles[1][1] +1;
		$PT2 = filter_input(INPUT_GET, 'polypTileType2');
		if ($PT2 == 'p0')
			$polypTiles[0][1] = $polypTiles[0][1] +1;
		elseif($PT2 == 'p1')
			$polypTiles[2][1] = $polypTiles[2][1] +1;
		elseif($PT2 == 'p2')
			$polypTiles[3][1] = $polypTiles[3][1] +1;
		elseif($PT2 == 'p3')
			$polypTiles[4][1] = $polypTiles[4][1] +1;
		elseif($PT2 == 'p4')
			$polypTiles[1][1] = $polypTiles[1][1] +1;
		$PT3 = filter_input(INPUT_GET, 'polypTileType3');
		if ($PT3 == 'p0')
			$polypTiles[0][1] = $polypTiles[0][1] +1;
		elseif($PT3 == 'p1')
			$polypTiles[2][1] = $polypTiles[2][1] +1;
		elseif($PT3 == 'p2')
			$polypTiles[3][1] = $polypTiles[3][1] +1;
		elseif($PT3 == 'p3')
			$polypTiles[4][1] = $polypTiles[4][1] +1;
		elseif($PT3 == 'p4')
			$polypTiles[1][1] = $polypTiles[1][1] +1;
		foreach ($polypTiles as $el)
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
			else
				echo "<td>".' '."</td>";
		}
		$_SESSION["polypTiles"] = $polypTiles;
	}
	
	// This displays the larvaCubes the player currently owns and can use
	
	function larvaCubesArray(){
		if (isset($_SESSION["larvaCubes"]))
		{
			$larvaCubes = $_SESSION["larvaCubes"];
			$place = filter_input(INPUT_GET, 'place');
			if ($place != '')
			{
				$place = preg_split("//",$place);
				for ($i=0;$i<5;$i++)
				{
					if ($larvaCubes[$i][0] == $place[1])
						$larvaCubes[$i][1] = $larvaCubes[$i][1] - 1;
				}
				$_SESSION["larvaCubes"] = $larvaCubes;
			}
		$larvaCubes = $_SESSION["larvaCubes"];
		}
		else
		{
			$aryw = array(0 =>'w',1);
			$aryg = array(0 =>'g',0);
			$aryy = array(0 =>'y',0);
			$aryo = array(0 =>'o',1);
			$aryp = array(0 =>'p',0);
			$larvaCubes = array(0 => $aryw,$aryg,$aryy,$aryo,$aryp);
		}
		$larvaType = filter_input(INPUT_GET, 'larvaType');
		if ($larvaType == 'l0')
			$larvaCubes[0][1] = $larvaCubes[0][1] +1;
		elseif($larvaType == 'l1')
			$larvaCubes[2][1] = $larvaCubes[2][1] +1;
		elseif($larvaType == 'l2')
			$larvaCubes[3][1] = $larvaCubes[3][1] +1;
		elseif($larvaType == 'l3')
			$larvaCubes[4][1] = $larvaCubes[4][1] +1;
		elseif($larvaType == 'l4')
			$larvaCubes[1][1] = $larvaCubes[1][1] +1;
		foreach ($larvaCubes as $el)
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
			else
				echo "<td>".' '."</td>";
		}
		$_SESSION["larvaCubes"] = $larvaCubes;
	}
