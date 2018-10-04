<?php
	include ('head.php');
	

?>		
<div id="bla"><br/><br/><br/></div><br/>
		
		

	
	<?php
		if($_GET['content']=="publisher"){
			$publisher_title = $_GET['publisher'];
			$a = $publisher_title;
			
			$qresult = $db->query("SELECT id
								  FROM game_main
								  WHERE publisher = '$publisher_title'"
								  );
		}
		if($_GET['content']=="developer"){
			$developer_title = $_GET['developer'];
			$a = $developer_title;
			
			$qresult = $db->query("SELECT id 
								  FROM developer
								  WHERE title = '$developer_title'"
								  );
		}
		if($_GET['content']=="genre"){
			$genre = $_GET['genre'];
			
			$a = $genre;
			$qresult = $db->query("SELECT id 
								  FROM game_genre
								  WHERE genre = '$genre' "
								  );
		}
		if($_GET['content']=="theme"){
			$theme = $_GET['theme'];
			$a = $theme;
			
			$qresult = $db->query("SELECT id 
								  FROM game_theme
								  WHERE theme = '$theme'"
								  );

		}
		if($_GET['content']=="review"){
		$a = "review";
			$qresult = $db->query("SELECT DISTINCT(id) 
								  FROM game_review"
								  );

		}

		$row = $qresult->fetch_assoc();
		
		
		
	?>	
		<div style="width: 1200px; margin: 0 auto; background:#25383C; color:; border: ; padding:20px" >
		<h1 style='color: white;background: #C11B17;padding: 20px; >Showing By : <STRONG style='color:#FFE87C;><?php echo $a?></STRONG></h1>
		<br/>
		<!_________ ekhan theke___________>



		<?php
			while($row != NULL){
				$game = $db->query("SELECT *, DATE_FORMAT(year,'%d %b %y') AS year1
									FROM game_main
									WHERE id = $row[id]");
				$row_game = $game->fetch_assoc();
			echo "
				  <table cellspacing='5' width='100%''>
	              <tr>
				  <td width='10%'><a href='rev.php?game_id=$row[id]'><h1 style='color:white'>
						<img  src='$row_game[title_pic_link]' width='100%'></a>
					</td>
	              	<td width='40%' style='border-left: 1px solid black'>
	              	<div id='ll'>
	                        <ul id='lc'>

	                        	<li><a href='rev.php?game_id=$row[id]'><h1 style='color:white'>$row_game[title]
	                        	</h1></a></li>
	                        	<li><h2 style='color:white'>Release Date : $row_game[year1]</h2></li>";

							$game_console = $db->query("SELECT *
			                                   FROM game_console
			                                   WHERE id = $row[id]"
			                                   );
			        		$row_console = $game_console->fetch_assoc();
			        		echo "<li><h2 style=' color:white'>Platform :";
		        			while($row_console != NULL){
	                        	echo " $row_console[console] ";
	                        	$row_console = $game_console->fetch_assoc();
	                        }
	                         echo "</h2></li>";

	                        	if($_GET['content']!='developer'){
	                        		$game_dev = $db->query("SELECT *
                                                  FROM developer
                                                  WHERE id = $row[id]"
                                                );
                        		$row_dev = $game_dev->fetch_assoc();
                        		echo "<li><h2 style='color:white'>Developer :";
	                        		while($row_dev != NULL){
		                        		echo "   $row_dev[title]   ";
		                        		$row_dev = $game_dev->fetch_assoc();
	                        		}
	                        		echo "</h2></li>";
	                        	}
	                        	
	                        	if($_GET['content']!='publisher')
	                        		echo "<li><h2 style='color:white'>Publisher : $row_game[publisher]</h2></li>";
	                        	
	                        	if($_GET['content']!='genre'){
	                        	 $game_genre = $db->query("SELECT *
                                                  FROM game_genre
                                                  WHERE id = $row[id]"
                                                );
                        		$row_genre = $game_genre->fetch_assoc();
                        		echo "<li><h2 style='' color:white'>Genre :";
                        			while($row_genre != NULL){	
	                        		echo " $row_genre[genre] ";
	                        		$row_genre = $game_genre->fetch_assoc();
	                        		}
	                        		echo "</h2></li>";
	                        	}
	                        	
	                        	/*if(_GET['content']!='theme')
	                        		echo "<li><h2 style=" color:white">Theme : Action</h2></li>"*/
	                        
	                        		echo "
	                        </ul>
	                </div>
					</td>
					<td width='10%'>
						<h3 style='color:#FF2400'>gameGen Rate: $row_game[main_rate]</h1>";

						$avg = $db->query("SELECT ROUND(AVG(rating)) AS r
										   FROM game_review
										   WHERE id = $row[id]"
										   );
						$row_avg = $avg->fetch_assoc();
						if($row_avg <0){			/* user review rating na thakle */
							echo "<h3 style='color:#59E817'>User Avg Rate : $row_avg[r]</h1>";
						}
						echo "
					</td>
					</tr>
					</table>
					<br/>
					<hr/>
			";
			$row = $qresult->fetch_assoc();
			}
			?>

		
		<!_________ ei porjonto ekta___________>
		</div>
<?php
	include ('foot.php');
?>