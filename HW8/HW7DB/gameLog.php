<?php
    // for adding action made by player
    function createLG($bgn = ""){
        // create connection to mysql database
        $conn = mysql_connect("localhost", "tofurum", "si1170zv");
        mysql_select_db("tofurum");
        
        // sql command to inset first comments to gamelog
        if($bgn != ""){
            // for when a player starts their turn over
            mysql_query("Insert into Files (GameLog) values ('You clicked on ".$bgn."')");
        }
        else {
            // for new game or when game first starts
            mysql_query("Insert into Files (GameLog) values ('The game has started!!!')");
        }
        mysql_close($conn);
    }
    
    // for writing the newly added shrimp's position on board
    function writeArrayPosRight($aryPos){
        if ($aryPos != "")
        {
            // create connection to mysql database
            $conn = mysql_connect("localhost", "tofurum", "si1170zv");
            mysql_select_db("tofurum");
            
            // division of right board segments
            $column = $aryPos % 7;
            $row = floor($aryPos / 7)+1;
            $column = chr($column + 72);
            
            // writing to sql database
            mysql_query("Insert into Files (GameLog) values ('You placed a shrimp at row ".$row." and column ".$column.".')");
            mysql_query("Insert into Files (GameLog) values ('')");   // extra space on db
            mysql_close($conn);               // close database
        }
    }
    
    // for writing the newly added shrimp's position on board
    function writeArrayPosLeft($aryPos){
        if ($aryPos != "")
        {
            // create connection to mysql database
            $conn = mysql_connect("localhost", "tofurum", "si1170zv");
            mysql_select_db("tofurum");
            
            // division of left board segments
            $column = $aryPos % 7;
            $row = floor($aryPos / 7)+1;
            $column = chr($column + 65);
            
            // writing to sql database
            mysql_query("Insert into Files (GameLog) values ('You placed a shrimp at row ".$row." and column ".$column.".')");
            mysql_query("Insert into Files (GameLog) values ('')");   // extra space on db
            mysql_close($conn);               // close database
        }
    }
    
    // for reading game log
    function readLog(){
        // create connection to mysql database
        $conn = mysql_connect("localhost", "tofurum", "si1170zv");
        mysql_select_db("tofurum");
        $res = mysql_query("select * from Files");
        
        // display values from Files table
        echo '<table border=1px>';
        
        $c = mysql_num_fields($res);        // table columns
        $r = mysql_num_rows($res);          // get rows from table 
        
	for ($i=0; $i<$r; $i++){
            print "<tr>";
            $row = mysql_fetch_row($res);
            for ($j=0; $j<$c; $j++){
                print "<td>".$row[$j]."</td>";
            }
            print "</tr>";
	}
        
        echo '</table>';
        mysql_close($conn);                 // close connection to db
        
        // return to regular game
        $g = filter_input(INPUT_GET, "g");
        echo "<br><a href=".$g."?return&r=1>Return To Game</a>";
    }
    
    // for reading function of file
    $g = filter_input(INPUT_GET, "g");      // for stored variable in address
    if ($g == 'hw7db.php') {
        // style and formatting
        echo '<TABLE CELLSPACING=0 CELLPADDING=0 WIDTH="100%">';
        echo '<TR VALIGN=BOTTOM><TD ALIGN=LEFT><h1><B>GameLog</B></h1></TD></TR>';
        echo '</TABLE>';
        echo '<hr>';
        readLog();                          // read content of gameLog
    }
?>

