<html>
	<head>
		<title>Search page</title>
		<style type="text/css">
		</style>
	</head>
	<body>
		<h1>Search for Movies or Actors</h1>
		<form action="./search.php" action="GET">
			Search:
			<input type="text" name="searchquery"></input>
			<input type="submit" value="Search"></input><hr>
		</form>
		<?php
			if ($_GET["searchquery"]) {
				$Q = $_GET["searchquery"];
				$db_connection = mysql_connect("localhost","cs143","");
				if (!$db_connection) {
					$errmsg = mysql_error($db_connection);
					eval("Connection failed: $errmsg;");
					exit(1);
				}
				mysql_select_db("CS143", $db_connection);
				echo "<h4>You are searching [".$Q."] results...</h4>";
				echo "<h4>Searching match records in Actor Databases...</h4>";

				$query_actor = "select id, last, first, dob from Actor where concat_ws(' ', last, first) like \"%".$_GET["searchquery"]."%\" or concat_ws(' ',first,last) like \"%".$_GET["searchquery"]."%\" order by first;";
				$rs_actor = mysql_query($query_actor,$db_connection);
				while ($row_actor = mysql_fetch_row($rs_actor)) {
					echo "Actor : <a href=\"./show_Actor_Information.php?aid=".$row_actor[0]."\">".$row_actor[2]." ".$row_actor[1]."</a> (".$row_actor[3].")<br/>";
				}

				echo "<h4>Search matching in Movies Databases...</h4>";

				$query_movie = "select id, title, year from Movie where title like "."\"%".$_GET["searchquery"]."%\" order by title;";
				$rs_movie = mysql_query($query_movie,$db_connection);
				while ($row_movie = mysql_fetch_row($rs_movie)) {
				 	echo "Movie : <a href=\"./show_Movie_Information.php?mid=".$row_movie[0]."\">".$row_movie[1]."</a> (".$row_movie[2].")<br/>";
				 } 

				mysql_close($db_connection);
			}
		?>
	</body>
</html>

















