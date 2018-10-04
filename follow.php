<?php 
	include("head.php");
	$game_id = $_GET['game_id'];
	$result=$db->query("INSERT INTO favourite (username, fav_game_id) 
				VALUES ('$user', $game_id)");
    echo "<h1 style='margin-left:20%;margin-top:400px>Succesfully Followed The Game</h1>";
    
    
?>
