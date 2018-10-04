<?php
	
  include ('head.php');
    

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
                <?php $b = 18;
                echo "
                <a href='rev.php?game_id=$b'><img  src='un1.jpg' width='100%'/></a>";
                ?>
                        <h1 id="h">Game of The Year 2016</h1>
                        <p id="un">Uncharted 4: A Thief's End is an action-adventure video game developed by Naughty Dog and published by Sony Interactive Entertainment for the PlayStation 4 video game console.</p>
            </td>
            <td width="40%">
              <?php $b = 16;
                
                echo "<a href='rev.php?game_id=$b'><img  src='g.jpg' width='100%'/></a>";
                 ?>
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
                  $upcoming = $db->query("SELECT id, title, DATE_FORMAT(year,'%d %b %Y') AS year
                                          FROM game_main
                                          WHERE year>= 2016
                                          LIMIT 6");
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
        
                <?php $b = 12;
                
                echo "<a href='rev.php?game_id=$b'><img  src='watch1.jpg' width='100%'/></a>";
                 ?>
                        <h1 id="h">Meet Marcus !</h1>
                        <p id="un">Watch Dogs 2 is an upcoming open world action-adventure third-person shooter video game developed by Ubisoft Montreal and published by Ubisoft for Microsoft Windows, PlayStation 4 and Xbox One. It is the sequel to 2014's Watch Dogs</p>
            </td>
			<td width="40%">
                <?php $b = 28;
                
                echo "<a href='rev.php?game_id=$b'><img  src='metal1.jpg' width='100%'/></a>";
                 ?>
                        <h1 id="h">Snake cheats Death </h1>
                        <p id="un">Metal Gear Solid V: The Phantom Pain is an open world action-adventure stealth video game developed by Kojima Productions and published by Konami for Microsoft Windows, PlayStation 3, PlayStation 4, Xbox 360 and Xbox One. </p>
            </td>
				</tr>
				<tr>
				<td width="20%">
                <?php $b = 17;
                
                echo "<a href='rev.php?game_id=$b'><img  src='rise1.jpg' width='100%'/></a>";
                 ?>
                        <h1 id="h">Rise LARA</h1>
                        <p id="un">Rise of the Tomb Raider is an action-adventure video game developed by Crystal Dynamics and published by Square Enix. It is the sequel to the 2013 video game Tomb Raider, a reboot of the Tomb Raider franchise</p>
            </td>
			<td width="40%">
                <?php $b = 23;
                
                echo "<a href='rev.php?game_id=$b'><img  src='lol1.jpg' width='100%'/></a>";
                 ?>
                        <h1 id="h">New Heores Coming</h1>
                        <p id="un">League of Legends is a multiplayer online battle arena video game developed and published by Riot Games for Microsoft Windows and OS X.</p>
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
			