<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        Enter # of rows and columns and click "Submit" <br>
        <form action="L-Exe1.php" method="post">
            Column: <input type="text" name="column" ><br>
            Row: <input type="text" name="row" ><br>
            Submit: <input type="submit">
        </form>
        <?php
        // put your code here
        $rows = 11;
        $columns = 18;
        if(isset($_POST["row"]) and isset($_POST["column"])){
            $rows = $_POST["row"];
            $columns = $_POST["column"];
        }
        $asciiVal = 64;  // number to add to get ascii value 
        $maxRow = 11;    // max column # entry
        if ($rows > $maxRow) {
            $rows = $maxRow;
        }
        for ($r = 0; $r < $rows; $r++){
            // for first and last row
            if($r === 0 or $r === $rows - 1){
                // increase by two spaces
                for($s = 0; $s < $columns; $s++){
                    // protect by space in first and last index
                    if($s === 0 or $s === $columns - 1){
                        $ary[$r][$s] = "   ";
                    }
                    else {  // store values in first and last row
                        $ary[$r][$s] = $s."  ";
                    }
                }
            }
            else {
                // add new segment to array
                $ary[$r][0] = chr($r + $asciiVal);  // place key value in first of column
                for($s = 1; $s < $columns - 1; $s++){
                    // for each value within 1 to 17, run normal operation
                    $ary[$r][$s] = chr($r + $asciiVal)."-".$s;
                }
                
                // place symbol of last column
                $ary[$r][$columns - 1] = chr($r + $asciiVal);
            }
        }
        // start preformated text
        echo "<pre>";
        for ($r = 0; $r < $rows; $r++){
            for($s = 0; $s < $columns; $s++){
                print $ary[$r][($s)]." ";
            }
            echo "<br>";
        }
        echo "</pre>";
        ?>
    </body>
</html>
