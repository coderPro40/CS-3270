<?php
	function dominanceTiles()
	{
		if (isset($_SESSION['dominance']))
			$dominance = $_SESSION['dominance'];
		else{
			$d1= array(0=>0,'00',1);
			$d2= array(0=>0,'10',2);
			$d3= array(0=>1,'20',2);
			$d4= array(0=>1,'30',3);
			$d5= array(0=>2,'40',3);
			$d6= array(0=>2,'50',4);
			$d7= array(0=>3,'60',0);
			$d8= array(0=>3,'70',4);
			$d9= array(0=>4,'80',0);
			$d10= array(0=>4,'90',1);
			$dominance = array(1=>$d1,$d2,$d3,$d4,$d5,$d6,$d7,$d8,$d9,$d10);
		}
		$dTile= filter_input(INPUT_GET, "dTile");
		if ($dTile != '')
		{
			for ($i=1;$i<11;$i++)
				if ($dTile == $i){
					$save = $dominance[$i][0];
					$dominance[$i][0] = $dominance[$i][2];
					$dominance[$i][2] = $save;
					$list = preg_split('//',$dominance[$i][1]);
					if ($list[2] == '1')
						$list[2] = '0';
					else
						$list[2] = '1';
					$dominance[$i][1] = $list[1].$list[2];
				}
		}
		for($i=1;$i<11;$i++)
		{
			echo "<td align=center>";
			echo "<TABLE CELLPADDING=0 CELLSPACING=0 STYLE='border: solid 1px black';>";
			echo "<TR><TD><IMG SRC=game/reef/images/p".$dominance[$i][0].".jpg WIDTH=32 HEIGHT=32></TD>";
			echo "<TD><IMG SRC=game/reef/images/p".$dominance[$i][0].".jpg WIDTH=32 HEIGHT=32></TD></TR>";
			echo "<TR><TD><a href= hw7db.php?action=SwitchDominance&dTile=".$i."><IMG SRC=game/reef/images/ct".$dominance[$i][1].".gif WIDTH=32 HEIGHT=32></a></TD>";
			echo "<TD><IMG SRC=game/reef/images/p".$dominance[$i][2].".jpg WIDTH=32 HEIGHT=32></TD></TR>";
			echo "</TABLE>";
			echo "<B>".$i."</B>";
			echo "</td>";
		}
		$_SESSION['dominance']= $dominance;
	}
?>
