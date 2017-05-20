<?php
    function saveFile($sb0, $sb3){          // receives current array from left and right boards
        $conn = mysql_connect("localhost", "tofurum", "si1170zv");
        mysql_select_db("tofurum");
        mysql_query("delete from LogFile"); 
        $sql = mysql_query("Create table LogFile (board1 varchar(2),board2 varchar(2))");
        
        for($i=0;$i<42;$i++){
            $sql = mysql_query("Insert into LogFile (board1,board2) values ('$sb0[$i]','$sb3[$i]')");
        }
        mysql_close($conn);
    }
    function readSFile(){
        $conn = mysql_connect("localhost", "tofurum", "si1170zv");
	mysql_select_db("tofurum");
	$res = mysql_query("select * from LogFile");
        
	echo '<table border=1px>';
	
        $r = mysql_num_rows($res);
	$c = mysql_num_fields($res);
	
	for ($i=0;$i<$c;$i++){
            print "<th>".mysql_field_name($res, $i) . "</th>";
	}
	
	for ($i=0;$i<$r;$i++){
            print "<tr>";
            $row = mysql_fetch_row($res);
            for ($j=0;$j<$c;$j++){
                print "<td>".$row[$j] . "</td>";
            }
            print "</tr>";
	}
        
	echo '</table>';
	mysql_close($conn);                 // close db
    }

    // for reading function of file
    $s = filter_input(INPUT_GET, "s");      // for stored variable in address
    if ($s == 2) {
        
        // style and formatting
        echo '<TABLE CELLSPACING=0 CELLPADDING=0 WIDTH="100%">';
        echo '<TR VALIGN=BOTTOM><TD ALIGN=LEFT><h1><B>Saved Game</B></h1></TD></TR>';
        echo '</TABLE>';
        echo '<hr>';
        readSFile();                        // read content of file
    }
?>

