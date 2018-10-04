<!doctype html>
<html>

<?php  
    session_start();
    if(isset($_SESSION['username']))
    {
       $user=$_SESSION['username'];
       $userhref="user.php";
       $if_logged = 1;
    }
    else{
        $user="Login";
        $userhref="login.php";
        $if_logged = 0;
    }
  $server_address = "localhost";
  $username = "root";
  $password = "";
  $db_name = "gamegen";
  
  $db = new mysqli($server_address, $username, $password, $db_name);
  function user($page){
    $_SESSION['username']=$user;
    header('Location: user.php');
  }
?>

    <head>
        <meta charset="utf-8" />
        <title>GameGEN</title>
        <link rel="stylesheet" href="main.css"/>
    </head>
    <body>
        <div id="big_wrap">
        <header id="top_header">
                <nav id="top_menu">
                <ul>
                    <li>&nbsp;&nbsp;</li>
                    <li><h1 style="color: white">GameGEN</h1></li>
                    <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </li>
                    <li><a href="index.php">Home<a/></li>
                    <li><a href="pc.php">PC</a></li>
                    <li><a href="ps4.php">PS4</a></li>
                    <li><a href="xbox.php">Xbox One</a></li>
                    



                    <!__dropdown___>
                    <?php
                        $drop_publisher = $db->query("SELECT DISTINCT(publisher)
                                                  FROM game_main");
                        $row_publisher = $drop_publisher->fetch_assoc();

                        $drop_developer = $db->query("SELECT DISTINCT(title)
                                                    FROM developer");
                        $row_developer = $drop_developer->fetch_assoc();
                        
                        $drop_genre = $db->query("SELECT DISTINCT(genre)
                                                  FROM game_genre");
                        $row_genre = $drop_genre->fetch_assoc();
                        $drop_theme = $db->query("SELECT DISTINCT(theme)
                                                  FROM game_theme");
                        $row_theme = $drop_theme->fetch_assoc();
                        $c_dev = "developer";
                        $c_pub = "publisher";
                        $c_gen = "genre";
                        $c_theme = "theme";
                        $c_rev = "review";

                    ?>

                    <li class="dropdown">
                    
                        <a href="#" class="dropbtn">Publisher</a>
                        <div class="dropdown-content">
                    <?php
                        while($row_publisher != NULL){
                        echo "
                        <a href='list.php?content=$c_pub&publisher=$row_publisher[publisher]'>
                        $row_publisher[publisher]</a>
                        ";
                        $row_publisher = $drop_publisher->fetch_assoc();
                    }
                    ?>
                    </div>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropbtn">Developer</a>
                        <div class="dropdown-content">
                    <?php
                    while($row_developer !=NULL){
                    echo "
                        <a href='list.php?content=$c_dev&developer=$row_developer[title]'>
                        $row_developer[title]</a>
                     ";
                    $row_developer = $drop_developer->fetch_assoc();
                     }
                     ?>
                    </div>
                    <?php 
                    echo "
                    <li><a href='list.php?content=$c_rev'>Reviews</a></li>";
                    ?>
                    <li class="dropdown">
                        <a href="#" class="dropbtn">Genre</a>
                        <div class="dropdown-content">
                    <?php 
                    while($row_genre != NULL){
                        echo "
                        <a href='list.php?content=$c_gen&genre=$row_genre[genre]'>$row_genre[genre]</a>
                        ";
                        $row_genre = $drop_genre->fetch_assoc();
                    }
                    ?>
                    </div>
                    <li class="dropdown">
                        <a href="#" class="dropbtn">Theme</a>
                        <div class="dropdown-content">
                    <?php
                    while($row_theme != NULL){
                    echo "
                        <a href='list.php?content=$c_theme&theme=$row_theme[theme]'>$row_theme[theme]</a>
                    ";
                     $row_theme = $drop_theme->fetch_assoc();
                    }
                    
                    ?>
                    </div>
                    <li><a href="<?php echo $userhref?>"><?php echo $user?></a></li>
                </ul>
            </nav>
            
            </header>