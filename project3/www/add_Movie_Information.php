<html>
	<head>
		<title>Add Movie Information</title>
	</head>
	<body>
		<h3>Add New Movie:</h3>
		<form action="./add_Movie_Information.php" method="GET">
			Titile:<input type="text" maxlength="30" name="title"/><br/>
			Company:<input type="text" maxlength="30" name="company"/><br/>
			Year(Format: YYYY):<input type="text" maxlength="30" name="year"/><br/>
			MPAA Rating:<select name="rating">
							<option value="G">G</option>
							<option value="NC-17">NC-17</option>
							<option value="PG">PG</option>
							<option value="PG-13">PG-13</option>
							<option value="R">R</option>
							<option value="surrender">surrender</option>
						</select><br/>
			Genre:
			<input type="checkbox" name="g_action" value="Action">Action</input>
			<input type="checkbox" name="g_adult" value="Adult">Adult</input>
			<input type="checkbox" name="g_adventure" value="Adventure">Adventure</input>
			<input type="checkbox" name="g_animation" value="Animation">Animation</input>
			<input type="checkbox" name="g_comedy" value="Comedy">Comedy</input>
			<input type="checkbox" name="g_crime" value="Crime">Crime</input>
			<input type="checkbox" name="g_documentary" value="Documentary">Documentary</input>
			<input type="checkbox" name="g_drama" value="Drama">Drama</input>
			<input type="checkbox" name="g_family" value="Family">Family</input>
			<input type="checkbox" name="g_fantasy" value="Fantasy">Fantasy</input>
			<input type="checkbox" name="g_horror" value="Horror">Horror</input>
			<input type="checkbox" name="g_musical" value="Musical">Musical</input>
			<input type="checkbox" name="g_mystery" value="Mystery">Mystery</input>
			<input type="checkbox" name="g_romance" value="Romance">Romance</input>
			<input type="checkbox" name="g_sci-fi" value="Sci-Fi">Sci-Fi</input>
			<input type="checkbox" name="g_short" value="Short">Short</input>
			<input type="checkbox" name="g_thriller" value="Thriller">Thriller</input>
			<input type="checkbox" name="g_war" value="War">War</input>
			<input type="checkbox" name="g_western" value="Western">Western</input>
			<br/>
			<input type="submit" name="submit" value="Add it!!">
		</form>
		<hr>
		<?php
		
        if (isset($_GET["submit"])) {
        	if (empty($_GET["title"])||empty($_GET["company"])||empty($_GET["year"])) {
        		echo "You must specify the field in Title, Company and Year!";
        	} else {
        		$db_connection = mysql_connect("localhost", "cs143", "");
		        mysql_select_db("CS143", $db_connection);
		        $rs = mysql_query("select id from MaxMovieID", $db_connection);
		        $row = mysql_fetch_row($rs);
		        $MaxID = $row[0];
		        $MaxMovieID = $MaxID + 1;
		        $insert = "insert into Movie values(".$MaxMovieID.",\"".$_GET["title"]."\",".$_GET["year"].",\"".$_GET["rating"]."\",\"".$_GET["company"]."\")";
        		mysql_query($insert,$db_connection);
        		$updateID = "update MaxMovieID set id = ".$MaxMovieID." where id = ".$MaxID."";
				mysql_query($updateID, $db_connection);

				$query = mysql_query("select * from Movie where id =".$MaxMovieID.";",$db_connection);
				$row = mysql_fetch_row($query);
				echo "Add Success!";
				echo "<br/>";
				echo "ID: $row[0] and Title: $row[1] has been added!";

				if($_GET["g_action"])
	            {
	                $insertGenre = "insert into MovieGenre values(".$MaxMovieID.",\"".$_GET["g_action"]."\")";//update the genre
	                mysql_query($insertGenre, $db_connection);
	            }
	            if($_GET["g_adult"])
	            {
	                $insertGenre = "insert into MovieGenre values(".$MaxMovieID.",\"".$_GET["g_adult"]."\")";//update the genre
	                mysql_query($insertGenre, $db_connection);
	            }
	            if($_GET["g_adventure"])
	            {
	                $insertGenre = "insert into MovieGenre values(".$MaxMovieID.",\"".$_GET["g_adventure"]."\")";//update the genre
	                mysql_query($insertGenre, $db_connection);
	            }
	            if($_GET["g_animation"])
	            {
	                $insertGenre = "insert into MovieGenre values(".$MaxMovieID.",\"".$_GET["g_animation"]."\")";//update the genre
	                mysql_query($insertGenre, $db_connection);
	            }
	            if($_GET["g_comedy"])
	            {
	                $insertGenre = "insert into MovieGenre values(".$MaxMovieID.",\"".$_GET["g_comedy"]."\")";//update the genre
	                mysql_query($insertGenre, $db_connection);
	            }
	            if($_GET["g_crime"])
	            {
	                $insertGenre = "insert into MovieGenre values(".$MaxMovieID.",\"".$_GET["g_crime"]."\")";//update the genre
	                mysql_query($insertGenre, $db_connection);
	            }
	            if($_GET["g_documentary"])
	            {
	                $insertGenre = "insert into MovieGenre values(".$MaxMovieID.",\"".$_GET["g_documentary"]."\")";//update the genre
	                mysql_query($insertGenre, $db_connection);
	            }
	            if($_GET["g_drama"])
	            {
	                $insertGenre = "insert into MovieGenre values(".$MaxMovieID.",\"".$_GET["g_drama"]."\")";//update the genre
	                mysql_query($insertGenre, $db_connection);
	            }
	            if($_GET["g_family"])
	            {
	                $insertGenre = "insert into MovieGenre values(".$MaxMovieID.",\"".$_GET["g_family"]."\")";//update the genre
	                mysql_query($insertGenre, $db_connection);
	            }
	            if($_GET["g_fantasy"])
	            {
	                $insertGenre = "insert into MovieGenre values(".$MaxMovieID.",\"".$_GET["g_fantasy"]."\")";//update the genre
	                mysql_query($insertGenre, $db_connection);
	            }
	            if($_GET["g_horror"])
	            {
	                $insertGenre = "insert into MovieGenre values(".$MaxMovieID.",\"".$_GET["g_horror"]."\")";//update the genre
	                mysql_query($insertGenre, $db_connection);
	            }
	            if($_GET["g_musical"])
	            {
	                $insertGenre = "insert into MovieGenre values(".$MaxMovieID.",\"".$_GET["g_musical"]."\")";//update the genre
	                mysql_query($insertGenre, $db_connection);
	            }
	            if($_GET["g_mystery"])
	            {
	                $insertGenre = "insert into MovieGenre values(".$MaxMovieID.",\"".$_GET["g_mystery"]."\")";//update the genre
	                mysql_query($insertGenre, $db_connection);
	            }
	            if($_GET["g_romance"])
	            {
	                $insertGenre = "insert into MovieGenre values(".$MaxMovieID.",\"".$_GET["g_romance"]."\")";//update the genre
	                mysql_query($insertGenre, $db_connection);
	            }
	            if($_GET["g_sci-fi"])
	            {
	                $insertGenre = "insert into MovieGenre values(".$MaxMovieID.",\"".$_GET["g_sci-fi"]."\")";//update the genre
	                mysql_query($insertGenre, $db_connection);	            }
	            if($_GET["g_short"])
	            {
	                $insertGenre = "insert into MovieGenre values(".$MaxMovieID.",\"".$_GET["g_short"]."\")";//update the genre
	                mysql_query($insertGenre, $db_connection);
	            }
	            if($_GET["g_thriller"])
	            {
	                $insertGenre = "insert into MovieGenre values(".$MaxMovieID.",\"".$_GET["g_thriller"]."\")";//update the genre
	                mysql_query($insertGenre, $db_connection);
	            }
	            if($_GET["g_war"])
	            {
	                $insertGenre = "insert into MovieGenre values(".$MaxMovieID.",\"".$_GET["g_war"]."\")";//update the genre
	                mysql_query($insertGenre, $db_connection);
	            }
	            if($_GET["g_western"])
	            {
	                $insertGenre = "insert into MovieGenre values(".$MaxMovieID.",\"".$_GET["g_western"]."\")";//update the genre
	                mysql_query($insertGenre, $db_connection);
	            }
	            mysql_close($db_connection);
	        }
        }
		?>
	</form>
	</body>
</html>







