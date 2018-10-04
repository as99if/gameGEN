<?php
	include ('head.php');
  $game_id = $_GET['game_id'];

     

                        $game_main =  $db->query("SELECT *
                                                  FROM game_main
                                                  WHERE id = $game_id"
                                                 );
                        $row_main = $game_main->fetch_assoc();
                        $game_console = $db->query("SELECT *
                                                    FROM game_console
                                                    WHERE id = $game_id"
                                                  );
                        $row_console = $game_console->fetch_assoc();
                        $game_genre = $db->query("SELECT *
                                                  FROM game_genre
                                                  WHERE id = $game_id"
                                                );
                        $row_genre = $game_genre->fetch_assoc();
                        $game_review = $db->query("SELECT *
                                                  FROM game_review
                                                  WHERE id = $game_id"
                                                );
                        $row_review = $game_review->fetch_assoc();
                        $game_avg_rate = $db->query("SELECT ROUND(AVG(rating)) AS rate
                                                  FROM game_review
                                                  WHERE id = $game_id
                                                  GROUP BY id"
                                                );
                        $row_avg_rate= $game_avg_rate->fetch_assoc();
                        $game_trailer = $db->query("SELECT *
                                                  FROM trailer
                                                  WHERE id = $game_id"
                                                );
                        $row_trailer = $game_trailer->fetch_assoc();
?>


	
            <!_____after menu__>
			<div id="bla"><br/><br/><br/></div>
      
      <?php 
      echo "
      <div id='rev' style='background-image:url($row_main[cover_pic_link]);background-size: 100%'>
      ";
      ?>
              <table  cellspacing="5" width="100%">
              <tr>
			            <td width="10%">
                  <?php
                  echo "
					           <img id='ki' src='$row_main[title_pic_link]' width='100%'/>
                  ";
                  ?>   
				          </td>
                  <td width="50%">
                    <ul id="name">
                      <!_header__>
                  
                      <?php 
                      echo "
                      <li><h1 style='color: #FFFFE0;text-shadow: -1px 1px 8px #ffc;'>$row_main[title]</h1></li>   <!_name_>
                      <li><h2 style='color: #FFFFE0;text-shadow: -1px 1px 8px #ffc;'>Released : $row_main[year]</h2></li>   <!_release date_>
                      <li><h2 style='color: #FFFFE0;text-shadow: -1px 1px 8px #ffc;'>Console :";
                      while($row_console != NULL){
                        echo " $row_console[console] ";
                        $row_console = $game_console->fetch_assoc();
                      }
                      echo "
                      </h2></li>   <!_console_>
                      <li><h2 style='color: #FFFFE0;text-shadow: -1px 1px 8px #ffc;'>Publisher: $row_main[publisher]</h2></li>   <!_publisher_>
                      <li><h2 style='color: #FFFFE0;text-shadow: -1px 1px 8px #ffc;'>Developer: Naughty Dog</h2>   </li><!_bad jabe_>
                      <li><h2 style='color: #FFFFE0;text-shadow: -1px 1px 8px #ffc;'>Genre: ";
                      while($row_genre !=NULL){
                        echo " $row_genre[genre] ";
                        $row_genre = $game_genre->fetch_assoc();
                      }
                      
                      ";
                      ?>
                    </ul>
                  <!_header done__>

			            </td>
                  <td id="sc" width="10%">
                  <div id="score" background="black">
                  <?php
                  echo "
                     <h4 style='color: #FFFFE0;text-shadow: -1px 1px 8px #ffc;'>GameGEN</h4>
                     <h1 style='color: #FFFFE0;text-shadow: -1px 1px 8px #ffc;'>&nbsp;&nbsp;$row_main[main_rate]</h1><!_main rate_> 
                  ";
                  ?>
                  </div>
                  </td>
                   <td width="10%">
                   <div id="score">
                     <h4 style="color: #FFFFE0;text-shadow: -1px 1px 8px #ffc;">User Avg</h4>
                    <?php
                     echo "<h1 style='color: #FFFFE0;text-shadow: -1px 1px 8px #ffc;'>&nbsp;&nbsp;$row_avg_rate[rate]</h1><!_review table e rating er avg_>";
                     ?>
                    </div>
                  </td>
              </tr>
              </table>
              </div>
              <div style="width: 1000px; margin: 0 auto; background; color:; border: ; padding:20px" >
              <br/>
              <div style="background: #C11B17;padding: 20px">

                <h1 style="color: white"> <?php echo "$row_main[title]"?> REVIEW</h1><!_name_>
              
                <h4 style="color: #659EC7"></h4>
                </div><!_??_>
                <br/><br/>
                <?php
                echo "
                <p><strong style='color: blue'>PLOT:</strong>$row_main[plot]<!__plot__></p><br/>
                
                <!_trailer_>  
                ";

                if($row_trailer != NULL){
                  echo "

                  <iframe width='720' height='400'
                  src='$row_trailer[trailer_link]'>
                  </iframe><!__trailer link__>

                  ";
                }
                ?>

                <!_trailer done_>

                <br/><br/><br/>
                <h1 style="padding: 20px;background:#C11B17;color: white">User Reviews</h1>
                
                
                <?php 
   
                while($row_review != NULL){
                  echo "
                  <br/>
                  <h2>Reviewed BY <em style='color: #151B54'>$row_review[username]</em></h2><!_user__>
                  <h2 style='color: #C11B17'>Rated: $row_review[rating]</h2><!_review table theke user er rate__>
                  <br/>
                  <p><Strong style='color: #C11B17'>Review:$row_review[review]</Strong>
                  <br/>
                  <br/>
                  <hr/>
                  ";
                  $row_review = $game_review->fetch_assoc();
                }
                               
                ?>
                <!____________ user reviews done_____________>
              </div>
                  
            <!_____________________>
<?php
	include ('foot.php');
?>