<?php
	function displayLarva()
	{
		$polyp =$_SESSION['polypTiles'];	// polyp tiles array
		$larva = $_SESSION['larvaCubes'];	// larva cubes array
		if (!(isset($_POST['submit'])))
		{
		echo "Choose a larva Cube: ";
		echo "<form method='post'>";
		for($i = 0; $i < 5; $i++){
			if($larva[$i][1] != 0){
				if ($larva[$i][0] == 'w')
				{
					echo"<input type='checkbox' name='w' value='w' id='w' /><label for='w'>";
					echo "<IMG border=1 SRC='game/reef/images/l0.gif' ALT=[w] WIDTH=16 HEIGHT=16>";
					echo "</label>";
					
				}
				elseif ($larva[$i][0] == 'g')
				{
					echo"<input type='checkbox' name='g' value='g' id='g' /><label for='g'>";
					echo "<IMG border=1 SRC='game/reef/images/l4.gif' ALT=[g] WIDTH=16 HEIGHT=16>";
					echo "</label>";
				}
				elseif ($larva[$i][0] == 'y')
				{
					echo"<input type='checkbox' name='y' value='y' id='y' /><label for='y'>";
					echo "<IMG border=1 SRC='game/reef/images/l1.gif' ALT=[y] WIDTH=16 HEIGHT=16>";
					echo "</label>";
				}
				elseif ($larva[$i][0] == 'o')
				{
					echo"<input type='checkbox' name='o' value='o' id='o' /><label for='o'>";
					echo "<IMG border=1 SRC='game/reef/images/l2.gif' ALT=[o] WIDTH=16 HEIGHT=16>";
					echo "</label>";
				}
				else
				{
					echo"<input type='checkbox' name='p' value='p' id='p' /><label for='p'>";
					echo "<IMG border=1 SRC='game/reef/images/l3.gif' ALT=[p] WIDTH=16 HEIGHT=16>";
					echo "</label>";
				}
			}
		}
		}
		echo "&nbsp";
		if(isset($_POST['submit']))
		{
			$polyp = $_SESSION['polypTiles'];
			if (isset($_POST['w'])){
				$polyp[0][1] = $polyp[0][1] +1;
				$larva[0][1] = $larva[0][1] -1;
			}
			elseif (isset($_POST['g'])){
				$polyp[1][1] = $polyp[1][1] +1;
				$larva[1][1] = $larva[1][1] -1;
			}
			elseif (isset($_POST['y'])){
				$polyp[2][1] = $polyp[2][1] +1;
				$larva[2][1] = $larva[2][1] -1;
			}
			elseif (isset($_POST['o'])){
				$polyp[3][1] = $polyp[3][1] +1;
				$larva[3][1] = $larva[3][1] -1;
			}
			elseif (isset($_POST['p'])){
				$polyp[4][1] = $polyp[4][1] +1;
				$larva[4][1] = $larva[4][1] -1;
			}
			$_SESSION['polypTiles'] = $polyp;
			$_SESSION['larvaCubes'] = $larva;
			echo "Larva Chosen: <a href=hw7db.php>Done</a>";
		}
		else
			echo "<input name='submit' type='submit' value='Choose Larva' />";
	}

?>
