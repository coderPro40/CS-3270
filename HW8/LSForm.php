<?php

    /*
     * To change this license header, choose License Headers in Project Properties.
     * To change this template file, choose Tools | Templates
     * and open the template in the editor.
     */

    /**
     * Description of LSForm
     *
     * @author ThankGod4Life
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
    
    $counter = 0;                               // counter for keeping track of turns
    for ($i=0;$i<$r;$i++){                      // print out table content
        print "<tr>";
        $row = mysql_fetch_row($qry);
        for ($j=0;$j<$c;$j++){
            print "<td>".$row[$j] . "</td>";    // print out each row
            
            if(($counter % 2) == 0){
                // echo $row[$j]."<br>";
                $xAry[] = $row[$j];             // store values from x column in array
            }
            else{
                // echo $row[$j]."<br>";
                $yAry[] = $row[$j];             // store values from y column in array (like push)
            }
            $counter += 1;
        }
        print "</tr>";
    }

    echo '</table>';
    linReg(count($xAry), $xAry, $yAry);      // run line of best fit formula on x values
    mysql_close($conn);                         // end connection
    
    function linReg($series, $xAry, $yAry){
        $tot = 0;//sum of x values
        $tot2 = 0;//sum of x^2 values
        $tot3 = 0;//sum of y values
        $tot4 = 0;//sum of xy values
        for ($i = 0; $i < ($series); $i++){
            $tot += $xAry[$i];
            // echo $tot."<br>";
            $tot2 += ($xAry[$i] * $xAry[$i]);
            // echo $tot2."<br>";
            $tot3 += ($yAry[$i]);
            // echo $tot3."<br>";
            $tot4 += ($xAry[$i] * $yAry[$i]);
            // echo $tot4."<br>";
        }
        $m = (($series * $tot4) - ($tot * $tot3))/(($series * $tot2) - ($tot * $tot));  //slope
        $b = (($tot3 * $tot2) - ($tot * $tot4))/(($series * $tot2) - ($tot * $tot));    // intercept
        echo "line of best fit: y = ".round($m, 2)."x + ".$b."";
    }