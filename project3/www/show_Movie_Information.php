<html>
	<head>
		<title>Show Movie Information</title>
	</head>
	<body>
		<h3>Show Movie Info</h3>
		<form action = "./show_Movie_Information.php" method="GET">
			<input type="hidden" name="mid"/>
		</form>
		<?php
			if ($_GET["mid"]) {
				$db_connection = mysql_connect("localhost", "cs143", "");
    			mysql_select_db("CS143", $db_connection);

    			$query = "select M.title, M.year, M.rating, M.company from Movie as M where M.id=".$_GET["mid"].";";
    			$rs = mysql_query($query,$db_connection);
    			$row = mysql_fetch_row($rs);
				
				$query1 = "select D.first, D.last, D.dob from Director as D, MovieDirector as MD where MD.mid = ".$_GET["mid"]." and MD.did = D.id"; 
				$rs1 = mysql_query($query1,$db_connection);
				$row1 = mysql_fetch_row($rs1);

				$query2 = "select * from MovieGenre as MG where MG.mid = ".$_GET["mid"].";";
				$rs2 = mysql_query("$query2",$db_connection);

				echo "Title: ".$row[0]."(".$row[1].")" ."<br/>";
				echo "Producer: ".$row[3]." <br/>";
				echo "MPAA Rating: ".$row[2]."<br/>";
				if ($row1)
					echo "Director: ".$row1[0]." ".$row1[1]." (".$row1[2].") <br/>";
				else
					echo "Director: NULL <br/>";
				echo "Genre: ";
				while ($row2 = mysql_fetch_row($rs2)) {
					echo $row2[1];
					echo " / ";
				}
				echo "<br/>";
				

				// show actor's information
				$query_actor = "select A.id, A.last, A.first, MA.role from MovieActor as MA, Actor as A where MA.mid = ".$_GET["mid"]." and MA.aid = A.id;";
				$rs_actor = mysql_query($query_actor, $db_connection);

				echo "<h4>-- Actors in this Movie --</h4>";

				while ($row_actor = mysql_fetch_row($rs_actor)) {
					echo "<a href=\"./show_Actor_Information.php?aid=".$row_actor[0]."\">".$row_actor[2]." ".$row_actor[1]."</a>";
					echo " act as <span style=\"color:#A52A2A;font-weight:bold\">".$row_actor[3]."</span>";
					echo "<br/>";
				}

				//show reviews
				echo "<h4>-- Reviews --</h4>";
				$query_review = "select name, time, mid, rating, comment, AVG(rating), COUNT(*) from Review where mid = ".$_GET["mid"]." group by mid;";
				$rs_review = mysql_query($query_review,$db_connection);

				if ($row_review = mysql_fetch_row($rs_review)) {
					echo "".$row_review[6]." people write the review. Write the review by yourself at <a href=\"./add_Review.php?mid=".$_GET["mid"]."\">here!</a><br/>";
					echo "Average rating of this movie: ".$row_review[5]."(5 at most)<br/>";

					echo "<p>-- Review Details --<p>";
					echo "By <span style=\"color:#FA8072;font-weight:bold\">".$row_review[0]."</span> on ".$row_review[1]." with ".$row_review[3]." points<br/>\"".$row_review[4]."\"";
					echo "<br/>";
					while ($row_review = mysql_fetch_row($rs_review)) {
						echo "By ".$row_review[0]." on ".$row_review[1]." with ".$row_review[3]." points <br/>\"".$row_review[4]."\"";
						echo "<br/>";
					}

				} else {
					echo "There is no review yet. Write the review by yourself at <a href=\"./add_Review.php?mid=".$_GET["mid"]."\">here!</a><br/>";
				}
				mysql_close($db_connection);

			}
		?>
		<hr>
		<h3>Search other Actors or Movies</h3>
		<form action="./search.php" method="GET">
			Search: <input type="text" name="searchquery"></input>
			<input type="submit" value="Submit"/> 

		</form>
	</body>
</html>
