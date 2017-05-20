<?php
require_once 'page.php';

$conn = mysqli_connect("127.0.0.1", "coderproto", "");
mysqli_select_db($conn, "tofurum");
mysqli_query($conn, "delete from SavedGame"); 
$sql = mysqli_query($conn, "Create table SavedGame (game varchar(2000,game2 varchar(5))");

$choice = (isset($_SESSION['brdObject2']))? 'yes': 'no';                // check if game obj set to session var
$hold = (isset($_SESSION['brdObject2']))? $_SESSION['brdObject2']: file_get_contents('brd0');

$sql = mysqli_query($conn, "Insert into SavedGame (game,game2) values ('$hold','$choice')");    // store in DB
mysqli_close($conn);
header('Location:game.php');                                            // return to game
exit;
?>