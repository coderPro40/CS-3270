<?php

    /* 
     * To change this license header, choose License Headers in Project Properties.
     * To change this template file, choose Tools | Templates
     * and open the template in the editor.
     */

    // all constants
    define("lh", "localhost");
    define("name", "tofurum");
    define("testdb", "test");
    define("pwd", "si1170zv");
    
    $conn = mysql_connect(lh, name, pwd);     // define as const conn to DB
    $res = mysql_select_db(testdb);             // also define selected db as const
    $qry = mysql_query("select * from points");
    
    echo '<table border=1px>';
	
    $r = mysql_num_rows($qry);
    $c = mysql_num_fields($qry);
    
    print "<tr>";
    
    for ($i=0;$i<$c;$i++){                      // print out header for table based on points values
        print "<th>".mysql_field_name($qry, $i) . "</th>";
    }
    
    print "</tr>";
    
    for ($i=0;$i<$r;$i++){                      // print out table content
        print "<tr>";
        $row = mysql_fetch_row($qry);
        for ($j=0;$j<$c;$j++){
            print "<td>".$row[$j] . "</td>";    // print out each row
        }
        print "</tr>";
    }
    
    echo '</table>';
    mysql_close($conn);                         // end connection
    