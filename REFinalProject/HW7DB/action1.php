<?php
	
	function pickShrimp()
	{
		$sb0 = $_SESSION['sb0'];
		$sb3 = $_SESSION['sb3'];
		for ($i=0;$i<42;$i++)
		{
			$el = $sb0[$i];
			$el1 = $sb3[$i];
			if ($el =='p')
			{
				$el = "<a href='hw7db.php?act=pickShrimp&b0=0&pick=".$i."'><IMG SRC='game/reef/images/sP.gif'></a>";
				$sb0[$i] =$el;
			}
				
			elseif ($el1 =='p')
			{
				$el1 = "<a href='hw7db.php?act=pickShrimp&b0=0&pick1=".$i."'><IMG SRC='game/reef/images/sP.gif'></a>";
				$sb3[$i] =$el1;
			}
		}
		$_SESSION['sb0'] = $sb0;
		$_SESSION['sb3'] = $sb3;
	}
	
	function showEatShrimp()
	{
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
    
    function showEatShrimp1()
	{
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
						echo "<span style='left:" . left($count) . "; top:" . top($count2). "; width:0px; height: 0px; position:absolute; z-index:502;'>". $el ."</span>" . kEOL;
					$count++;
			}
			$_SESSION["sb3"] = $sb3;    // store array of updated shrimps in session variable
    }
	
	//This function takes away all coral tiles and shrimp that are "connected"
	function eatShrimpAndCoral($pick)
	{
		$rf0 = $_SESSION['rf0'];
		$sb0 = $_SESSION['sb0'];
		$coral = findCoral($pick);
		for($i=0;$i<count($coral);$i++){
			$rf0[$coral[$i]] ='';
			$sb0[$coral[$i]] ='';
		}
		$_SESSION['rf0'] = $rf0;
		$_SESSION['sb0'] = $sb0;
	}
	function eatShrimpAndCoral1($pick)
	{
		$rf3 = $_SESSION['rf3'];
		$sb3 = $_SESSION['sb3'];
		$coral = findCoral1($pick);
		for($i=0;$i<count($coral);$i++){
			$rf3[$coral[$i]] ='';
			$sb3[$coral[$i]] ='';
		}
		$_SESSION['rf3'] = $rf3;
		$_SESSION['sb3'] = $sb3;
	}
	
	// This function finds the size of the coral
	function findCoral($pick)
	{
		$rf0 = $_SESSION['rf0'];
		$eat = array();
		$type = $rf0[$pick];
		array_push($eat,$pick);
		for ($i=0;$i<count($eat);$i++){
			$pick = $eat[$i];
			if ($pick >= 0 and $pick <= 6){
				if ($pick == 0){
					if ($rf0[$pick] == $type){
						if (!(in_array($pick,$eat)))
							array_push($eat,$pick);
					}
					if ($rf0[$pick+1] == $type){
						if (!(in_array($pick+1,$eat)))
							array_push($eat,$pick+1);
					}
					if ($rf0[$pick+7] == $type){
						if (!(in_array($pick+7,$eat)))
							array_push($eat,$pick+7);
					}
				}
				else{
					if ($rf0[$pick] == $type){
						if (!(in_array($pick,$eat)))
							array_push($eat,$pick);
					}
					if ($rf0[$pick+1] == $type){
						if (!(in_array($pick+1,$eat)))
							array_push($eat,$pick+1);
					}
					if ($rf0[$pick-1] == $type){
						if (!(in_array($pick-1,$eat)))
							array_push($eat,$pick-1);
					}
					if ($rf0[$pick+7] == $type){
						if (!(in_array($pick+7,$eat)))
							array_push($eat,$pick+7);
					}
				}
			}
			elseif ($pick >= 35 and $pick <=41){
				if ($pick == 41){
					if ($rf0[$pick] == $type){
						if (!(in_array($pick,$eat)))
							array_push($eat,$pick);
					}
					if ($rf0[$pick-1] == $type){
						if (!(in_array($pick-1,$eat)))
							array_push($eat,$pick-1);
					}
					if ($rf0[$pick-7] == $type){
						if (!(in_array($pick-7,$eat)))
							array_push($eat,$pick-7);
					}
				}
				else{
					if ($rf0[$pick] == $type){
						if (!(in_array($pick,$eat)))
							array_push($eat,$pick);
					}
					if ($rf0[$pick+1] == $type){
						if (!(in_array($pick+1,$eat)))
							array_push($eat,$pick+1);
					}
					if ($rf0[$pick-1] == $type){
						if (!(in_array($pick-1,$eat)))
							array_push($eat,$pick-1);
					}
					if ($rf0[$pick-7] == $type){
						if (!(in_array($pick-7,$eat)))
							array_push($eat,$pick-7);
					}
				}
			}
			elseif ($pick%7==0){
				if ($rf0[$pick] == $type){
					if (!(in_array($pick,$eat)))
						array_push($eat,$pick);
				}
				if ($rf0[$pick+1] == $type){
					if (!(in_array($pick+1,$eat)))
						array_push($eat,$pick+1);
				}
				if ($rf0[$pick+7] == $type){
					if (!(in_array($pick+7,$eat)))
						array_push($eat,$pick+7);
				}
				if ($rf0[$pick-7] == $type){
					if (!(in_array($pick-7,$eat)))
						array_push($eat,$pick-7);
				}
			}
			elseif ($pick%7==6){
				if ($rf0[$pick] == $type){
					if (!(in_array($pick,$eat)))
						array_push($eat,$pick);
				}
				if ($rf0[$pick-1] == $type){
					if (!(in_array($pick-1,$eat)))
						array_push($eat,$pick-1);
				}
				if ($rf0[$pick+7] == $type){
					if (!(in_array($pick+7,$eat)))
						array_push($eat,$pick+7);
				}
				if ($rf0[$pick-7] == $type){
					if (!(in_array($pick-7,$eat)))
						array_push($eat,$pick-7);
				}
			}
				
			else{
				if ($rf0[$pick] == $type){
					if (!(in_array($pick,$eat)))
						array_push($eat,$pick);
				}
				if ($rf0[$pick+1] == $type){
					if (!(in_array($pick+1,$eat)))
						array_push($eat,$pick+1);
				}
				if ($rf0[$pick-1] == $type){
					if (!(in_array($pick-1,$eat)))
						array_push($eat,$pick-1);
				}
				if ($rf0[$pick+7] == $type){
					if (!(in_array($pick+7,$eat)))
						array_push($eat,$pick+7);
				}
				if ($rf0[$pick-7] == $type){
					if (!(in_array($pick-7,$eat)))
					array_push($eat,$pick-7);
				}
			}
		}
	$_SESSION['rf0'] = $rf0;
	$_SESSION['CTiletype'] = $type;
	$_SESSION['eat'] = $eat;
	return $eat;
}
	function findCoral1($pick)
	{
		$rf0 = $_SESSION['rf3'];
		$eat = array();
		$type = $rf0[$pick];
		array_push($eat,$pick);
		for ($i=0;$i<count($eat);$i++){
			$pick = $eat[$i];
			if ($pick >= 0 and $pick <= 6){
				if ($pick == 0){
					if ($rf0[$pick] == $type){
						if (!(in_array($pick,$eat)))
							array_push($eat,$pick);
					}
					if ($rf0[$pick+1] == $type){
						if (!(in_array($pick+1,$eat)))
							array_push($eat,$pick+1);
					}
					if ($rf0[$pick+7] == $type){
						if (!(in_array($pick+7,$eat)))
							array_push($eat,$pick+7);
					}
				}
				else{
					if ($rf0[$pick] == $type){
						if (!(in_array($pick,$eat)))
							array_push($eat,$pick);
					}
					if ($rf0[$pick+1] == $type){
						if (!(in_array($pick+1,$eat)))
							array_push($eat,$pick+1);
					}
					if ($rf0[$pick-1] == $type){
						if (!(in_array($pick-1,$eat)))
							array_push($eat,$pick-1);
					}
					if ($rf0[$pick+7] == $type){
						if (!(in_array($pick+7,$eat)))
							array_push($eat,$pick+7);
					}
				}
			}
			elseif ($pick >= 35 and $pick <=41){
				if ($pick == 41){
					if ($rf0[$pick] == $type){
						if (!(in_array($pick,$eat)))
							array_push($eat,$pick);
					}
					if ($rf0[$pick-1] == $type){
						if (!(in_array($pick-1,$eat)))
							array_push($eat,$pick-1);
					}
					if ($rf0[$pick-7] == $type){
						if (!(in_array($pick-7,$eat)))
							array_push($eat,$pick-7);
					}
				}
				else{
					if ($rf0[$pick] == $type){
						if (!(in_array($pick,$eat)))
							array_push($eat,$pick);
					}
					if ($rf0[$pick+1] == $type){
						if (!(in_array($pick+1,$eat)))
							array_push($eat,$pick+1);
					}
					if ($rf0[$pick-1] == $type){
						if (!(in_array($pick-1,$eat)))
							array_push($eat,$pick-1);
					}
					if ($rf0[$pick-7] == $type){
						if (!(in_array($pick-7,$eat)))
							array_push($eat,$pick-7);
					}
				}
			}
			elseif ($pick%7==0){
				if ($rf0[$pick] == $type){
					if (!(in_array($pick,$eat)))
						array_push($eat,$pick);
				}
				if ($rf0[$pick+1] == $type){
					if (!(in_array($pick+1,$eat)))
						array_push($eat,$pick+1);
				}
				if ($rf0[$pick+7] == $type){
					if (!(in_array($pick+7,$eat)))
						array_push($eat,$pick+7);
				}
				if ($rf0[$pick-7] == $type){
					if (!(in_array($pick-7,$eat)))
						array_push($eat,$pick-7);
				}
			}
			elseif ($pick%7==6){
				if ($rf0[$pick] == $type){
					if (!(in_array($pick,$eat)))
						array_push($eat,$pick);
				}
				if ($rf0[$pick-1] == $type){
					if (!(in_array($pick-1,$eat)))
						array_push($eat,$pick-1);
				}
				if ($rf0[$pick+7] == $type){
					if (!(in_array($pick+7,$eat)))
						array_push($eat,$pick+7);
				}
				if ($rf0[$pick-7] == $type){
					if (!(in_array($pick-7,$eat)))
						array_push($eat,$pick-7);
				}
			}
				
			else{
				if ($rf0[$pick] == $type){
					if (!(in_array($pick,$eat)))
						array_push($eat,$pick);
				}
				if ($rf0[$pick+1] == $type){
					if (!(in_array($pick+1,$eat)))
						array_push($eat,$pick+1);
				}
				if ($rf0[$pick-1] == $type){
					if (!(in_array($pick-1,$eat)))
						array_push($eat,$pick-1);
				}
				if ($rf0[$pick+7] == $type){
					if (!(in_array($pick+7,$eat)))
						array_push($eat,$pick+7);
				}
				if ($rf0[$pick-7] == $type){
					if (!(in_array($pick-7,$eat)))
					array_push($eat,$pick-7);
				}
			}
		}
	$_SESSION['rf3'] = $rf0;
	$_SESSION['CTiletype'] = $type;
	$_SESSION['eat'] = $eat;
	return $eat;
}
?>
