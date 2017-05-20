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
        <?php
        // put your code here
        if(isset($_GET["r"]) and isset($_GET["c"])){
            echo "<p style='font-size: 3em;'>";
            echo "You Chose Row ". $_GET["r"] . " and Column "
                    . $_GET["c"];
            echo "</p>";
        }
        ?>
    </body>
</html>
