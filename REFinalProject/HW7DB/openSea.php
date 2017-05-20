<?php
 function openSeaBoard()
 {
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
		$lrvT= filter_input(INPUT_GET, "larvaType");
		if ($lrvT == 'l0'){
			$openSea[0][1] = mt_rand(0,4);
			$openSea[0][2] = mt_rand(0,4);
			$openSea[0][3] = mt_rand(0,4);
			$openSea[0][4] = $openSea[0][4] -1;
		}
		elseif ($lrvT == 'l1'){
			$openSea[1][1] = mt_rand(0,4);
			$openSea[1][2] = mt_rand(0,4);
			$openSea[1][3] = mt_rand(0,4);
			$openSea[1][4] = $openSea[1][4] -1;
		}
		elseif ($lrvT == 'l2'){
			$openSea[2][1] = mt_rand(0,4);
			$openSea[2][2] = mt_rand(0,4);
			$openSea[2][3] = mt_rand(0,4);
			$openSea[2][4] = $openSea[2][4] -1;
		}
		elseif ($lrvT == 'l3'){
			$openSea[3][1] = mt_rand(0,4);
			$openSea[3][2] = mt_rand(0,4);
			$openSea[3][3] = mt_rand(0,4);
			$openSea[3][4] = $openSea[3][4] -1;
		}
		elseif ($lrvT == 'l4'){
			$openSea[4][1] = mt_rand(0,4);
			$openSea[4][2] = mt_rand(0,4);
			$openSea[4][3] = mt_rand(0,4);
			$openSea[4][4] = $openSea[4][4] -1;
		}
	 for ($i=0;$i<5;$i++)
	 {
		
		echo"<TD WIDTH=115 BGCOLOR=#6DC0B4 STYLE='border: solid 1px black';>";
		echo "<TABLE CELLSPACING=2 CELLPADDING=0>";
		echo "<TR ALIGN=CENTER>";
		echo "<TD></TD><td><IMG BORDER=1 SRC=game/reef/images/l".$openSea[$i][0].".gif ALT=[w] WIDTH=16 HEIGHT=16 ALIGN=ABSMIDDLE><BR>+".$openSea[$i][4]." in supply</TD>";
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
