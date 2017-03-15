<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>save result</title>
    </head>
    <body>
    <?php
    	 if(isset($_POST["result"])){
             $result = $_POST["result"];
             $myfile = fopen("result.html", "w") or die("Unable to open file!");
             fwrite($myfile, $result);
             fclose($myfile);
         }
    ?>
	</body>
</html>