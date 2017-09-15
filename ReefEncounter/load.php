<?php
require_once 'page.php';

// create connection to mysql database
$conn = mysqli_connect("127.0.0.1", "coderproto", "");
mysqli_select_db($conn, "tofurum");
$res = mysqli_query($conn, "select * from SavedGame");

$column = mysqli_fetch_field($res);                 // fetch columns in asset DB
$_SESSION['brdObject2'] = $column[0];
$choice = $column[1];
$_SESSION['config2'] = ($choice == 'yes')? 1: 0;

mysqli_close($conn);                                // close connection to db
header('Location:game.php');                        // return to game
exit;
?>