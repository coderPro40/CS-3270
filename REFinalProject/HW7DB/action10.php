<?php
	function action10(){
		if (isset($_SESSION['openSea'])){
			$openSea = $_SESSION['openSea'];
		}
		else{
			$rand = mt_rand(0,4);
			$rand2 = mt_rand(0,4);
			$rand3 = mt_rand(0,4);
			$rand4 = mt_rand(0,4);
			$rand5 = mt_rand(0,4);
			$rand6 = mt_rand(0,4);
			$rand7 = mt_rand(0,4);
			$rand8 = mt_rand(0,4);
			$rand9 = mt_rand(0,4);
			$rand10 = mt_rand(0,4);
			$rand11 = mt_rand(0,4);
			$rand12 = mt_rand(0,4);
			$rand13 = mt_rand(0,4);
			$rand14 = mt_rand(0,4);
			$rand15 = mt_rand(0,4);
			$first = array (0=>0,$rand,$rand6,$rand11,9);
			$sec = array (0=>1,$rand2,$rand7,$rand12,9);
			$th = array (0=>2,$rand3,$rand8,$rand13,9);
			$fou = array (0=>3,$rand4,$rand9,$rand14,9);
			$fi = array (0=>4,$rand5,$rand10,$rand15,9);
			$openSea = array(0=>$first,$sec,$th,$fou,$fi);
		}
	 for ($i=0;$i<5;$i++)
	 {
		
		echo"<TD WIDTH=115 BGCOLOR=#6DC0B4 STYLE='border: solid 1px black';>";
		echo "<TABLE CELLSPACING=2 CELLPADDING=0>";
		echo "<TR ALIGN=CENTER>";
		echo "<TD></TD><td><a href=hw7db.php?action10&larvaType=l".$openSea[$i][0]."&polypTileType=p".$openSea[$i][1]."&polypTileType2=p".$openSea[$i][2]."&polypTileType3=p".$openSea[$i][3]."><IMG BORDER=1 SRC=game/reef/images/l".$openSea[$i][0].".gif WIDTH=16 HEIGHT=16 ALIGN=ABSMIDDLE></a><BR>+".$openSea[$i][4]." in supply</TD>";
		echo "</TR><TR><TD></TD></TR>";
		echo "<TR ALIGN=CENTER>";
		echo "<td><IMG BORDER=1 SRC=game/reef/images/p".$openSea[$i][1].".jpg HEIGHT=32 WIDTH=32></td>";
		echo "<td><IMG BORDER=1 SRC=game/reef/images/p".$openSea[$i][2].".jpg HEIGHT=32 WIDTH=32></td>";
		echo "<td><IMG BORDER=1 SRC=game/reef/images/p".$openSea[$i][3].".jpg HEIGHT=32 WIDTH=32></td>";
		echo "</TR>";
		echo "</TABLE>";
		echo "</TD>";
	}
	$_SESSION['openSea'] = $openSea;
	}
?>
