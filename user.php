<?php
	include ('head.php');	
	$favourite = $db->query("SELECT *
							 FROM favourite NATURAL JOIN game_main
							 WHERE username = '$user' 
							 AND fav_game_id = id 
							");

	$row_favourite = $favourite->fetch_assoc();

	$favourite_publisher = $db->query("SELECT DISTINCT(publisher)
							 FROM favourite NATURAL JOIN game_main
							 WHERE username = '$user' 
							 AND fav_game_id = id 
							");

	$row_favourite_publisher = $favourite_publisher->fetch_assoc();

?>
	<!_____after menu__>
	<div id="bla"><br/><br/><br/></div>
	<div width="100%" style="background:black">
	<div style="width: 1200px; margin: 0 auto; background; color:; border: ; padding:" >

	<table width="100%">
	<div id="profile">
	<tr background="g.jpg"><!___timeline pic_>
		<td width="4%" style="background:black">
		<!____profile pic_____>
			<img style="" src="unc.jpg" width="168" height="168"/>
		</td>
		<td width="80%" style="vertical-align: bottom;">
			<ul id="pro_list" style="background: #C11B17;margin-left:;padding:10px;">
			<li><h2><?php echo $user ?></h2></li>
			<li style="margin-left: 60%"><h2><a href="update.php">Update Info</h2></a></li>
			<li style="margin-left: 5%"><h2><a href="logout.php">Logout</a></h2></li>
			</ul>
		</td>
	</tr>
	</div>
	</table>
	</div>
	</div>
	<div style="width: 1200px; margin: 0 auto; background; color:; border: ; padding:" >

              <table cellspacing="5" width="100%">
              <th colspan="3" style="background: #151B54">
              	<h1 style="padding: 20px;color: white">Recently Followed</h1>
              </th>
              <tr>
			  <?php 
	$fav = $db->query("SELECT *
							 FROM favourite NATURAL JOIN game_main
							 WHERE username = '$user' 
							 AND fav_game_id = id 
							");

	

 ?>


			  <td width="10%">
					<?php 
						$row_fav = $fav->fetch_assoc();
					echo "<img  src='$row_fav[title_pic_link]' width='100%'/>"; ?>
				</td>
              <td width="50%">
                         <?php echo "<h1 id='h'>$row_fav[title] </h1>
                        <p id='un'>$row_fav[plot]</p>
                        "; ?>	
			</td>
          
          
            <td rowspan="2" width="20%">
                <div id="up_list">    <!__ete query hobe__>
                <h2>Liked</h2>
                <br/>
				
                <dl id="up_games">

                <?php 
                while($row_favourite != NULL){
                echo "
                	<li><a href='rev.php?game_id=$row_favourite[id]'>$row_favourite[title]</a></li>
								
                ";
                $row_favourite = $favourite->fetch_assoc();	
            	}
                ?>
                </dl>



            </div>
                </td>
                </tr>
				<tr>
				<td width="10%">
					<?php 
						$row_fav = $fav->fetch_assoc();
					echo "<img  src='$row_fav[title_pic_link]' width='100%'/>"; ?>
				</td>
				<td width="50%">
                        <?php echo "<h1 id='h'>$row_fav[title] </h1>
                        <p id='un'>$row_fav[plot]</p>
                        "; ?>	
            </td>
				</tr>
				<!________________>
				<th colspan="3" style="background: #151B54">
              	<h1 style="padding: 20px;color: white">Recently Reviewd</h1>
              </th>
				<tr>
				<td width="10%">
					<?php 
						$row_fav = $fav->fetch_assoc();
					echo "<img  src='$row_fav[title_pic_link]' width='100%'/>"; ?>
				</td>
				<td width="50%">
                        <?php echo "<h1 id='h'>$row_fav[title] </h1>
                        <p id='un'>$row_fav[plot]</p>
                        "; ?>	
            </td>
			<td rowspan="2">
				 <div id="reviews_list">  <!__ete query hobe__>
                <table width="95%" cellspacing="10">
                   <tr>
						<td>
						<h2>Liked Publisher</h2>
						<br/>
							<ul id="right_list">
							<?php
							while($row_favourite_publisher != NULL){
							echo "
								<li><a href='list.php'>$row_favourite_publisher[publisher]</a></li>
							";
							$row_favourite_publisher = $favourite_publisher->fetch_assoc();
							}	
							?>
							<!__list page e ref baki__>	
							</ul>
						</td>
				
						
                   </tr>
                </table>
 
            </div>   
			</td>
				</tr>
				<tr>
				<td width="10%">
					<?php 
						$row_fav = $fav->fetch_assoc();
					echo "<img  src='$row_fav[title_pic_link]' width='100%'/>"; ?>
				</td>
				<td width="50%">
                         <?php echo "<h1 id='h'>$row_fav[title] </h1>
                        <p id='un'>$row_fav[plot]</p>
                        "; ?>	
            </td>
            </tr>
				<!________________>
				<th colspan="3" style="background: #151B54">
              
              </table>
            </div>
            <!_____________________>
<?php
	include ('foot.php');
?>