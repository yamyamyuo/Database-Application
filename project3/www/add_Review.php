<html>
	<head>
		<title>Add New Review</title>
	</head>
	<body>
		<h3>Add Your New Review!</h3>
		<form action="./add_Review.php" method="GET">
			Movie: <input type="hidden" name="mid">
			<?php
			$mid;
			if ($_GET["mid"]) {
				$mid = $_GET["mid"];
				$db_connection = mysql_connect("localhost", "cs143", "");
		    	mysql_select_db("CS143", $db_connection);

		    	$query_title = "select title from Movie where id = ".$_GET["mid"].";";
		    	$rs_title = mysql_query($query_title, $db_connection);
		    	if ($row_title = mysql_fetch_row($rs_title)) {
		    		echo $row_title[0];
		    	}
		    	mysql_close($db_connection);
			}
			?>
			<br/>
			Movie ID : <input type="text" name="mid2" value =<?php if ($_GET["mid"]) {
				$db_connection = mysql_connect("localhost", "cs143", "");
		    	mysql_select_db("CS143", $db_connection);
		    	$query_mid = "select id from Movie where id = ".$_GET["mid"].";";
		    	$rs_mid = mysql_query($query_mid, $db_connection);
		    	if ($row_mid = mysql_fetch_row($rs_mid)) {
		    		echo "\"";
		    		echo $row_mid[0];
		    		echo "\"";
		    	}
		    	mysql_close($db_connection); }
		    	echo "disabled";
		    	?> ></input>
			<br/>
			Your Name: <input type="text" maxlength="30" name="name"></input><br/>
			Rating: <select name="rating">
					<option value="5">5 - Best</option>
					<option value="4">4 - Good</option>
					<option value="3">3 - Fair</option>
					<option value="2">2 - Not Recommend</option>
					<option value="1">1 - Sucks!</option>
				</select>
				<br/>
			<textarea name="review" cols="100" rows="15" placeholder="Write your review here..."></textarea><br/>
			<input type="submit" name="submit" value="Submit"></input>

		</form>
		<?php
			//if ($_GET["mid"]) {
				//echo $mid;
				echo "<br/>";

				if (isset($_GET["submit"])) {
					$db_connection = mysql_connect("localhost", "cs143", "");
			    	mysql_select_db("CS143", $db_connection);

			    	$date = date_create();
			    	echo date_format($date, 'Y-m-d H:i:s');
			    	//echo "Get mid".$mid;

			    	$query_review = "insert into Review values(\"".$_GET["name"]."\",\"".date_format($date, 'Y-m-d H:i:s')."\", ".$_GET["mid2"].", ".$_GET["rating"].", \"".$_GET["review"]."\");";
			    	//echo $query_review;
			    	$rs_review = mysql_query($query_review, $db_connection);

			    	echo "<br/>Successfully save your review!";
			    	mysql_close($db_connection);
				}
			//}
			?>
	</body>
</html>