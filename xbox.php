<?php
    include ('head.php');
?>
    
            <!_____after menu__>
            <div id="bla"><br/><br/><br/></div>
           
              <table cellspacing="5" width="100%">
              <tr>
              <td width="30%">
                    <img  src="rise1.jpg" width="100%"/>
                </td>
              <td width="50%">
                        <h1 id="h">LARA is BACK</h1>
                        <p id="un">Uncharted 4: A Thief's End is an action-adventure video game developed by Naughty Dog and published by Sony Interactive Entertainment for the PlayStation 4 video game console.</p>
            </td>
       
            <td rowspan="2" width="20%">
                <div id="up_list">    <!__ete query hobe__>
                <h2>TOP RATED GAMES</h2>
                <br/>

                <dl id="up_games">
                <!__xbox top rated query____>
                <dl id="up_games">
                <?php
                  $xbox_top_rated = $db->query("SELECT DISTINCT(title), id , main_rate
                                          FROM game_main
                                          WHERE id IN(
                                            SELECT id FROM game_console
                                            WHERE console = 'xbox'
                                            )
                                          ORDER BY main_rate DESC
                                          LIMIT 5 ");
                  $row = $xbox_top_rated->fetch_assoc();
                  while($row!=NULL){
                    echo"
                      <li><a href='rev.php?game_id=$row[id]'>$row[title]</a><br>
                       
                      </li><br>
                    ";
                    $row = $xbox_top_rated->fetch_assoc();
                  }
                ?>
                <!__xbox top rated query shesh____>
                </dl>
            </div>
                </td>
                </tr>
                <tr>
                <td width="30%">
                    <img  src="hal5.jpg" width="100%"/>
                </td>
                <td width="50%">
                        <h1 id="h">Fails The Series</h1>
                        <p id="un">Uncharted 4: A Thief's End is an action-adventure video game developed by Naughty Dog and published by Sony Interactive Entertainment for the PlayStation 4 video game console.</p>
            </td>
                </tr>
                <!________________>
                <tr>
                <td width="30%">
                    <img  src="gears1.jpg" width="100%"/>
                </td>
                <td width="50%">
                        <h1 id="h">So Far Good</h1>
                        <p id="un">Uncharted 4: A Thief's End is an action-adventure video game developed by Naughty Dog and published by Sony Interactive Entertainment for the PlayStation 4 video game console.</p>
            </td>
            <td>
                 <div id="reviews_list">  <!__ete query hobe__>
            <h2>&nbsp;&nbsp;EXPLORE GAMES BY </h2>
                <table width="95%" cellspacing="10">
                   <tr>
                        <td>
                        <h2>Coming Soon</h2>
                        <br/>
                            <ul>
                                <!_______xbox coming soon query________>
                                  <?php
                                  $xbox_coming_soon = $db->query("SELECT title, id
                                                              FROM game_main
                                                              WHERE year > YEAR(CURDATE()) AND id IN (
                                                                    SELECT id FROM game_console
                                                                    WHERE console = 'xbox'
                                                                  )
                                                              ORDER BY year DESC
                                                              LIMIT 5 ");
                                            $row = $xbox_coming_soon->fetch_assoc();
                                
                                  while($row != NULL){
                                    echo "
                                    <li><a href='rev.php?game_id=$row[id]'>$row[title]</a></li>
                                  ";
                                  $row = $xbox_coming_soon->fetch_assoc();
                                  }
                                  ?>
                                  <!_______xboc coming soon query shesh________>
                            </ul>
                        </td>
                
                        <td>
                        <h2>Latest Releases</h2>
                        <br/>
                            <ul id="co_li">
                                <!_____________xbox latest query_____________>
                                      <?php
                                      $xbox_latest = $db->query("SELECT title, id
                                                FROM game_main
                                                WHERE year <= CURDATE() AND id IN (
                                                  SELECT id FROM game_console
                                                  WHERE console = 'xbox'
                                                )
                                                                  ORDER BY year DESC
                                                                  LIMIT 5 ");
                                                $row = $xbox_latest->fetch_assoc();
                                    
                                      while($row != NULL){
                                        echo "
                                        <li><a href='rev.php?game_id=$row[id]'>$row[title]</a></li>
                                      ";
                                      $row = $xbox_latest->fetch_assoc();
                                      }
                                      ?>
                                      <!_____________xbox latest query shesh_____________>
                            </ul>
                        </td>
                   </tr>
                </table>
 
            </div>   
            </td>
                </tr>
                <!________________>
                <tr>
                <td width="30%">
                    <img  src="quan1.jpg" width="100%"/>
                </td>
                <td width="50%">
                        <h1 id="h">What Were They Thinking</h1>
                        <p id="un">Uncharted 4: A Thief's End is an action-adventure video game developed by Naughty Dog and published by Sony Interactive Entertainment for the PlayStation 4 video game console.</p>
            </td>
            <td>
                 <div id="reviews_list">  <!__ete query hobe__>
            <h2>&nbsp;&nbsp;EXPLORE GAMES BY </h2>
                <table width="95%" cellspacing="10">
                  <td>
            <h2>Genre</h2>
            <br/>
              <ul id="genre">
              <?php 
                $genre_query = $db->query("SELECT DISTINCT(genre)
                                            FROM game_genre");
                $row_genre = $genre_query->fetch_assoc();
                while($row_genre!=NULL){
                $c_rev = 'genre';
                echo "<li><a href='list.php?content=$c_gen&genre=$row_genre[genre]'>$row_genre[genre]</a></li>";
                $row_genre = $genre_query->fetch_assoc();
                }
              ?>
              </ul>
            </td>
                   </tr>
           <tr>
            <td>
            <h2>Theme</h2>
            <br/>
              <ul id="genre">
              <?php 
                $theme_query = $db->query("SELECT DISTINCT(theme)
                                            FROM game_theme");
                $row_theme = $theme_query->fetch_assoc();
                while($row_theme != NULL){
                  $c_theme = 'theme';
                echo "<li><a href='list.php?content=$c_theme&theme=$row_theme[theme]'>$row_theme[theme]</a></li>";
                $row_theme = $theme_query->fetch_assoc();
                }
              ?>
              </ul>
            </td>
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

