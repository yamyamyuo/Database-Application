<html>
	<head>
		<title>Show Actor Information</title>
	</head>
	<body>
		<h3>Show Actor Info</h3>
		<form action="./show_Actor_Information.php" method="GET">
			<input type="hidden" name="aid"/>
		</form>
		<?php
		if ($_GET["aid"]) {
			$db_connection = mysql_connect("localhost", "cs143", "");
    		mysql_select_db("CS143", $db_connection);
    		
			$query = "select * from Actor where id = ".$_GET["aid"].";";
			$rs = mysql_query($query, $db_connection);
			$row = mysql_fetch_row($rs);
			echo "Name: ".$row[1]." ".$row[2]."<br/>";
			echo "Sex: ".$row[3]."<br/>";
			echo "Date of Birth: ".$row[4]."<br/>";
			if ($row[5] == NULL)
				echo "--Still Alive--<br/>";
			else
				echo "Date of Death: ".$row[5]."<br/>";
			
			echo "<br/>";
			echo "<h3>-- Act in --</h3>";

			$query1 = "select M.id, MA.role, M.title from Movie as M, MovieActor as MA where MA.aid = ".$_GET["aid"]." and M.id = MA.mid; ";
			$rs1 = mysql_query($query1,$db_connection);

			while ($row1 = mysql_fetch_row($rs1)) {
				echo "Act as ".$row1[1]." in <a href=\"./show_Movie_Information.php?mid=".$row1[0]."\"> ".$row1[1]."</a>";
				echo "<br/>";
			}
			mysql_close($db_connection);
		}

		echo "<hr/>";
		?>
		<h3>Search other Actors or Movies</h3>
		<form action="./search.php" method="GET">
			Search: <input type="text" name="searchquery"></input>
			<input type="submit" value="Submit"/> 
		</form>
	</body>
</html>






















