<?php
require_once 'page.php';

$conn = mysql_connect("localhost", "tofurum", "si1170zv");
mysql_select_db("tofurum");
mysql_query("delete from SavedGame"); 
$sql = mysql_query("Create table SavedGame (game varchar(2000,game2 varchar(5))");

$choice = (isset($_SESSION['brdObject2']))? 'yes': 'no';                // check if game obj set to session var
$hold = (isset($_SESSION['brdObject2']))? $_SESSION['brdObject2']: file_get_contents('brd0');

$sql = mysql_query("Insert into SavedGame (game,game2) values ('$hold','$choice')");    // store in DB
mysql_close($conn);
header('Location:game.php');                                            // return to game
exit;
?>