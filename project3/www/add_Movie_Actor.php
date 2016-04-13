<html>
	<head>
		<title>Add Movie Actor</title>
		<style type="text/css">
		#mw{width:200px;}
		#aw{width: 100px;}
		</style>
	</head>
	<body>
		<h3>Add new Actor in a Movie:</h3>
		<form action="./add_Movie_Actor.php" method="GET">

		<?php
		$db_connection = mysql_connect("localhost", "cs143", "");
        mysql_select_db("CS143", $db_connection);

        $rs = mysql_query("select id, title, year from Movie order by title;",$db_connection);
        echo "Movie: <select name=\"movie\">";
        echo "<option SELECTED id=\"mw\"></option>";
        while ($row = mysql_fetch_row($rs)) {
        	$movieID = $row[0];
        	$movieTitle = $row[1];
        	$movieYear = $row[2];
        	$movieCompany = $row[4];
        	echo "<option value =".$movieID.">".$movieTitle."(".$movieYear." ".$movieCompany.")</option>";
        }
        echo "</select>";
        echo "<br/>";

        echo "Actor:   <select name=\"actor\">";
        echo "<option SELECTED id=\"aw\"></option>";
        $rs_a = mysql_query("select id, last, first, sex, dob from Actor order by first;",$db_connection);
        while ($row = mysql_fetch_row($rs_a)) {
        	$actorID = $row[0];
        	$actorLast = $row[1];
        	$actorFirst = $row[2];
        	$actorSex = $row[3];
        	$actorDob = $row[4];
        	echo "<option value=".$actorID.">".$actorLast.", ".$actorFirst."(".$actorSex.", ".$actorDob.")";
        }
        echo "</select>";
        echo "<br/>";

        echo "Role:  <input type=\"text\", name=\"role\" maxlength = \"30\">";
        echo "<br/>";
        echo "<br/>";
        echo "<input type=\"submit\" name=\"submit\" value=\"Submit!\"/>";
        echo "</form>";
        echo "<hr>";
        

        if (isset($_GET["submit"])) {
        	if (empty($_GET["movie"])||empty($_GET["actor"])||empty($_GET["role"])) {
        		echo "The specify area are required!";
        	} else {
        		$insert = "insert into MovieActor values(".$_GET["movie"].",".$_GET["actor"].",\"".$_GET["role"]."\")";
        		mysql_query($insert, $db_connection);
        		echo "Add Movie Actor to The Databases Successful!<br/>";
        	}
        }

        mysql_close($db_connection);
		?>
	</body>
</html>
