<?php
	// This displays the larva cubes that are avaliable to choose from in action 2
	
    function displayCubes(){
		$polyp =$_SESSION['polypTiles'];	// polyp tiles array
		$larva = $_SESSION['larvaCubes'];	// larva cubes array
		echo "Choose a larva Cube: ";
		echo "<form method='post'>";
		for($i = 0; $i < 5; $i++){
			if(($polyp[$i][1] >= $larva[$i][1]) && ($larva[$i][1] != 0)){
				if ($polyp[$i][0] == 'w')
				{
					echo"<input type='checkbox' name='w' value='w' id='w' /><label for='w'>";
					echo "<IMG border=1 SRC='game/reef/images/l0.gif' ALT=[w] WIDTH=16 HEIGHT=16>";
					echo "</label>";
					
				}
				elseif ($polyp[$i][0] == 'g')
				{
					echo"<input type='checkbox' name='g' value='g' id='g' /><label for='g'>";
					echo "<IMG border=1 SRC='game/reef/images/l4.gif' ALT=[g] WIDTH=16 HEIGHT=16>";
					echo "</label>";
				}
				elseif ($polyp[$i][0] == 'y')
				{
					echo"<input type='checkbox' name='y' value='y' id='y' /><label for='y'>";
					echo "<IMG border=1 SRC='game/reef/images/l1.gif' ALT=[y] WIDTH=16 HEIGHT=16>";
					echo "</label>";
				}
				elseif ($polyp[$i][0] == 'o')
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
		echo "&nbsp";
		if(isset($_POST['submit']))
			echo "Larva Chosen";
		elseif (isset($_POST['polypTiles']))
			echo "Larva Chosen";
		else
			echo "<input name='submit' type='submit' value='Choose Larva' />";
		
		echo "<td>";
		echo "PolypTiles to place: ";
		if (isset($_POST['w']))
		{
		echo "<select name='ws' value='ws' id='ws'>";
			$i = $polyp[0][1];
			for ( $j=1; $j < $i+1; $j++)
			{
				echo "<option value=w".$j.">".$j."</option>";
			}
		echo "</select>";
		echo "<input name='polypTiles' type='submit' value='Amount of PolypTiles'/>";
		echo "</td>";
		}
		
		elseif (isset($_POST['g']))
		{
		echo "<select name='gs' value='gs' id='gs'>";
			$i = $polyp[1][1];
			for ( $j=1; $j < $i+1; $j++)
			{
				echo "<option value=g".$j.">".$j."</option>";
			}
		echo "</select>";
		echo "<input name='polypTiles' type='submit' value='Amount of PolypTiles' />";
		echo "</td>";
		}
		
		elseif (isset($_POST['y']))
		{
		echo "<select name='ys' value='ys' id='ys'>";
			$i = $polyp[2][1];
			for ( $j=1; $j < $i+1; $j++)
			{
				echo "<option value=y".$j.">".$j."</option>";
			}
		echo "</select>";
		echo "<input name='polypTiles' type='submit' value='Amount of PolypTiles' />";
		echo "</td>";
		}
		
		elseif (isset($_POST['o']))
		{
		echo "<select name='os' value='os' id='os'>";
			$i = $polyp[3][1];
			for ( $j=1; $j < $i+1; $j++)
			{
				echo "<option value=o".$j.">".$j."</option>";
			}
		echo "</select>";
		echo "<input name='polypTiles' type='submit' value='Amount of PolypTiles' />";
		echo "</td>";
		}
		
		elseif (isset($_POST['p']))
		{
		echo "<select name='ps' value='ps' id='ps'>";
			$i = $polyp[4][1];
			for ( $j=1; $j < $i+1; $j++)
			{
				echo "<option value=p".$j.">".$j."</option>";
			}
		echo "</select>";
		echo "<input name='polypTiles' type='submit' value='Amount of PolypTiles' />";
		echo "</td>";
		}
		echo "</form>";
		
		if(isset($_POST['polypTiles']))
		{
			$w = filter_input(INPUT_POST,'ws');
			$g = filter_input(INPUT_POST,'gs');
			$y = filter_input(INPUT_POST,'ys');
			$o = filter_input(INPUT_POST,'os');
			$p = filter_input(INPUT_POST,'ps');
			$ary = array(0=>$w,$g,$y,$o,$p);
			foreach ($ary as $el)
			{
				if ($el != '')
					echo "<A HREF='hw7db.php?act=chooselarva&w=0&place=".$el."'>Place Tile</A>";
			}
			$ary = array(0=>' ',' ',' ',' ',' ');
		}
	}
?>
