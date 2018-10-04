<?php
	include ('head.php');
?>
	
            <!_____after menu__>
			<div id="bla"><br/><br/><br/></div>
		
              <table cellspacing="5" width="100%">
              <tr>
			  <td width="30%">
        <?php $a = 20;
                
                echo "<a href='rev.php?game_id=$a'><img  src='civil.jpg' width='100%'/></a>";
                 ?>
					
				</td>

        <?php 
            $result_plot = $db->query("SELECT plot 
                                        FROM game_main
                                        WHERE id = $a");
            $row_plot = $result_plot->fetch_assoc();
        ?>

              <td width="50%">
                        <h1 id="h">Think Before You ACT</h1>
                        <?php echo "<p id='un'>$row_plot[plot] </p>"; ?>
			</td>

          
            <td rowspan="2" width="20%">
                <div id="up_list">    <!__ete query hobe__>
                <h2>TOP RATED GAMES</h2>
                <br/>

                <dl id="up_games">
                <!__pc top rated query____>
                <dl id="up_games">
                <?php
                  $pc_top_rated = $db->query("SELECT DISTINCT(title), id , main_rate
                                          FROM game_main
                                          WHERE id IN(
                                            SELECT id FROM game_console
                                            WHERE console = 'pc'
                                            )
                                          ORDER BY main_rate DESC
                                          LIMIT 5 ");
                  $row = $pc_top_rated->fetch_assoc();
                  while($row!=NULL){
                    echo"
                      <li><a href='rev.php?game_id=$row[id]'>$row[title]</a><br>
                       
                      </li><br>
                    ";
                    $row = $pc_top_rated->fetch_assoc();
                  }
                ?>
                <!__pc top rated query shesh____>
                </dl>
            </div>
                </td>
                </tr>
				<tr>
				<td width="30%">
        <?php $b = 22;
                
                echo "<a href='rev.php?game_id=$b'><img  src='war1.jpg' width='100%'/></a>";
                 ?>
					
				</td>
        <?php 
            $result_plot = $db->query("SELECT plot 
                                        FROM game_main
                                        WHERE id = $b");
            $row_plot = $result_plot->fetch_assoc();
        ?>
				<td width="50%">
                        <h1 id="h">More Intense Then EVER</h1>
                        <?php echo "<p id='un'>$row_plot[plot] </p>"; ?>
            </td>
				</tr>
				<!________________>
				<tr>
				<td width="30%">
        <?php $c = 18;
                
                echo "<a href='rev.php?game_id=$b'><img  src='total1.jpg' width='100%'/></a>";
                 ?>
					
				</td>
        <?php 
            $result_plot = $db->query("SELECT plot 
                                        FROM game_main
                                        WHERE id = $c");
            $row_plot = $result_plot->fetch_assoc();
        ?>
          
				<td width="50%">
                        <h1 id="h">Total Waste</h1>
                        <?php echo "<p id='un'>$row_plot[plot] </p>"; ?>
            </td>
			<td>
				 <div id="reviews_list">  <!__ete query hobe__>
            <h2>&nbsp;&nbsp;EXPLORE GAMES BY </h2>
                <table width="95%" cellspacing="10">
                   <tr>
						<td>
						<h2>Coming Soon</h2>
						<br/>
							<ul id="coming">
                <!_______pc coming soon query________>
              <?php
              $pc_coming_soon = $db->query("SELECT title, id
                                          FROM game_main
                                          WHERE year > YEAR(CURDATE()) AND id IN (
                                                SELECT id FROM game_console
                                                WHERE console = 'pc'
                                              )
                                          ORDER BY year DESC
                                          LIMIT 5 ");
                        $row = $pc_coming_soon->fetch_assoc();
            
              while($row != NULL){
                echo "
                <li><a href='rev.php?game_id=$row[id]'>$row[title]</a></li>
              ";
              $row = $pc_coming_soon->fetch_assoc();
              }
              ?>
              <!_______pc coming soon query shesh________>
							</ul>
						</td>
				
						<td>
						<h2>Latest Releases</h2>
						<br/>
							<ul id="co_li">
								<!_____________pc latest query_____________>
              <?php
              $pc_latest = $db->query("SELECT title, id
                                        FROM game_main
                                        WHERE year <= CURDATE() AND id IN (
                                          SELECT id FROM game_console
                                          WHERE console = 'pc'
                                        )
                                          ORDER BY year DESC
                                          LIMIT 5 ");
                        $row = $pc_latest->fetch_assoc();
            
              while($row != NULL){
                echo "
                <li><a href='rev.php?game_id=$row[id]'>$row[title]</a></li>
              ";
              $row = $pc_latest->fetch_assoc();
              }
              ?>
              <!_____________pc latest query shesh_____________>
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
        <?php $d = 23;
                
                echo "<a href='rev.php?game_id=$b'><img  src='lol1.jpg' width='100%'/></a>";
                 ?>
					
				</td>

         <?php 
            $result_plot = $db->query("SELECT plot 
                                        FROM game_main
                                        WHERE id = $d");
            $row_plot = $result_plot->fetch_assoc();
        ?>
				<td width="50%">
                        <h1 id="h">New Heroes Coming</h1>
                        <?php echo "<p id='un'>$row_plot[plot] </p>"; ?>
            </td>
			<td>
				 <div id="reviews_list">  <!__ete query hobe__>
            <h2>&nbsp;&nbsp;EXPLORE GAMES BY </h2>
                <table width="95%" cellspacing="10">
                   <tr>
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
                   </tr>   </table>
 
            </div>   
			</td>
				</tr>
              </table>
            <!_____________________>
<?php
	include ('foot.php');
?>

