<?php
require_once 'page.php';

// create connection to mysql database
$conn = mysql_connect("localhost", "tofurum", "si1170zv");
mysql_select_db("tofurum");
$res = mysql_query("select * from SavedGame");

$column = mysql_fetch_field($res);                  // fetch columns in asset DB
$_SESSION['brdObject2'] = $column[0];
$choice = $column[1];
$_SESSION['config2'] = ($choice == 'yes')? 1: 0;

mysql_close($conn);                                 // close connection to db
header('Location:game.php');                        // return to game
exit;
?>