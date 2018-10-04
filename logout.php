<?php
		include("info.php");
		echo "hello";
		$_SESSION['username']="Log In";
		 session_start();
    session_unset();
    session_destroy();
    session_write_close();
    setcookie(session_name(),'',0,'/');
    session_regenerate_id(true);
		header('Location: index.php');
		exit;
?>