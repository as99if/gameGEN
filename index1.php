<?php
	session_start();
  include ('head.php');
  if($_SESSION['username']){
      $user=$_SESSION['username'];
      $userhref="user.php";
    }
    $_SESSION['previouspage']=$_GET['location'];
?>
            <!_____after menu__>
			<div id="bla"><br/><br/><br/></div>
            <div class="container">
                 <video controls loop muted width=33% height=10% autoplay>
                     <source src="uu.mp4" type="video/mp4">
                     <source src="uu.ogg" type="video/ogg">
                  </video> 
                  <video controls loop muted width=33% height=10% autoplay>
                     <source src="in.mp4" type="video/mp4">
                     <source src="in.ogg" type="video/ogg">
                  </video> 
                  <video controls loop muted width=33% height=10% autoplay>
                     <source src="f.mp4" type="video/mp4">
                     <source src="f.ogg" type="video/ogg">
                  </video> 
              </div>
              <table cellspacing="5" width="100%">
              <tr>
              <td width="40%">
                <img  src="un1.jpg" width="100%"/>
                        <h1 id="h">Game of The Year 2016</h1>
                        <p id="un">Uncharted 4: A Thief's End is an action-adventure video game developed by Naughty Dog and published by Sony Interactive Entertainment for the PlayStation 4 video game console.</p>
            </td>
            <td width="40%">
                <img  src="g.jpg" width="100%"/>
                        <h1 id="h">GOD of WAR COMING !</h1>   
                        <p id="un">Uncharted 4: A Thief's End is an action-adventure video game developed by Naughty Dog and published by Sony Interactive Entertainment for the PlayStation 4 video game console.</p>
            </td>

          
            <td rowspan="2" width="20%">
                <div id="up_list">    <!__ete query hobe__>
                <h2>TOP UPCOMING GAMES</h2>
                <br/>

                <dl id="up_games">
                <!______________top upcoming query_______________>
                <?php
                  $upcoming = $db->query("SELECT id, title, year FROM game_main
                                  WHERE year >= 2016 ");
                  $row = $upcoming->fetch_assoc();
                  while($row!=NULL){
                    echo"
                      <li><a href='rev.php?game_id=$row[id]'>$row[title]</a><br>
                          Coming $row[year] 
                      </li><br>
                    ";
                    $row = $upcoming->fetch_assoc();
                  }
                ?>
                <!______________top upcoming query shesh_______________>
                </dl>
            </div>
                </td>
                </tr>
				<tr>
				<td width="20%">
                <img  src="un1.jpg" width="100%"/>
                        <h1 id="h">Game of The Year 2016</h1>
                        <p id="un">Uncharted 4: A Thief's End is an action-adventure video game developed by Naughty Dog and published by Sony Interactive Entertainment for the PlayStation 4 video game console.</p>
            </td>
			<td width="40%">
                <img  src="un1.jpg" width="100%"/>
                        <h1 id="h">Game of The Year 2016</h1>
                        <p id="un">Uncharted 4: A Thief's End is an action-adventure video game developed by Naughty Dog and published by Sony Interactive Entertainment for the PlayStation 4 video game console.</p>
            </td>
				</tr>
				<tr>
				<td width="20%">
                <img  src="un1.jpg" width="100%"/>
                        <h1 id="h">Game of The Year 2016</h1>
                        <p id="un">Uncharted 4: A Thief's End is an action-adventure video game developed by Naughty Dog and published by Sony Interactive Entertainment for the PlayStation 4 video game console.</p>
            </td>
			<td width="40%">
                <img  src="un1.jpg" width="100%"/>
                        <h1 id="h">Game of The Year 2016</h1>
                        <p id="un">Uncharted 4: A Thief's End is an action-adventure video game developed by Naughty Dog and published by Sony Interactive Entertainment for the PlayStation 4 video game console.</p>
            </td>
			<td>
				 <div id="reviews_list">  <!__ete query hobe__>
            <h2>LATEST REVIEWS</h2>
                <table width="95%" cellspacing="10">
                   <tr>
                       <td><h3 style="color: white;">Game<h3></td>
                       <td><h3 style="color: white;">&nbsp;&nbsp;&nbsp;&nbsp;Score<h3></td>
                   </tr>
				            <tr>      
                     <!______________latest review query____>
                   <?php
                      $latest_review = $db->query("SELECT id, game_review.username, game_review.rating, game_main.title
                                            FROM game_review NATURAL JOIN game_main
                                            GROUP BY game_review.id
                                            ORDER BY game_review.review_timestamp DESC
                                            LIMIT 5");
                      
                      $row = $latest_review->fetch_assoc();
                      while($row != NULL){
                          echo "
                            <tr> 
                           <td><a href='rev.php?game_id=$row[id]'>$row[title]</a></td>
                           <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$row[rating]</td>
                          </tr>
                        ";
                        $row = $latest_review->fetch_assoc();
                      }
                      ?>
                    <!______________latest review query____>
                   </tr>
                </table>
 
            </div>   
			</td>
				</tr>
              </table>
            <!_____________________>
			<?php
				include ('foot.php');
			?>
			