<!DOCTYPE HTML>
<html>
	<head>
		<title>Add Actor or Director</title>
	</head>
	<body>
		<h3>Add new Actor/Director:</h3>
		<form action="./add_Actor_Director.php" method="GET">
			Identity:
			<input type="radio" name="identity" value="Actor" checked="true">Actor</input>
			<input type="radio" name="identity" value="Director">Director</input><br/>
			<hr>
			First Name:
			<input type="text" name="first" maxlength="20"/><br/>
			Last Name:
			<input type="text" name="last" maxlength="20"/><br/>
			Sex:
			<input type="radio" name="sex" value="Male" checked="true">Male</input>
			<input type="radio" name="sex" value="Female">Female</input><br/>
			Date of Birth(Format: YYYMMDD):
			<input type="text" name="dob" maxlength="20"/><br/>
			Date of Death(Format: YYYMMDD):
			<input type="text" name="dod" maxlength="20"/>(Not required)<br/>
			<input type="submit" name="submit" value="Add It!">
			<hr>
			<?php
				if (isset($_GET["submit"])) {
					//add Actor
					if (empty($_GET["first"]) || empty($_GET["last"]) || empty($_GET["dob"])) {
							echo "You must enter the required field!";
					} else {

						$db_connection = mysql_connect("localhost","cs143","");
						mysql_select_db("CS143", $db_connection);
						$rs = mysql_query("select id from MaxPersonID", $db_connection);
						$row = mysql_fetch_row($rs);
						$MaxID = $row[0];

						if ($_GET["identity"] == "Actor") {

							$ActorID = $MaxID + 1;
							if ($_GET["dod"]) {
								$insert = "insert into Actor values(".$ActorID.",\"".$_GET["last"]."\",\"".$_GET["first"]."\",\"".$_GET["sex"]."\",".$_GET["dob"].",".$_GET["dod"].")";
							} else {
								$insert = "insert into Actor values(".$ActorID.",\"".$_GET["last"]."\",\"".$_GET["first"]."\",\"".$_GET["sex"]."\", ".$_GET["dob"].", NULL)";
							}
							mysql_query($insert, $db_connection);
							$updateID = "update MaxPersonID set id = ".$ActorID." where id = ".$MaxID."";
							mysql_query($updateID, $db_connection);

							$query = mysql_query("select * from Actor where id =".$ActorID.";");
							$row = mysql_fetch_row($query);
							// $query2 = mysql_query("select * from MaxPersonID;");
							// $row2 = mysql_fetch_row($query2);
							echo "Add Success!";
							echo "<br/>";
							echo "ID: $row[0] and Name: $row[1], $row[2] has been added!";
						} else {
							$DirectorID = $MaxID + 1;
							if ($_GET["dod"]) {
								$insert = "insert into Director values(".$DirectorID.",\"".$_GET["last"]."\",\"".$_GET["first"]."\",".$_GET["dob"].",".$_GET["dod"].")";
							} else {
								$insert = "insert into Director values(".$DirectorID.",\"".$_GET["last"]."\",\"".$_GET["first"]."\", ".$_GET["dob"].", NULL)";
							}
							mysql_query($insert, $db_connection);
							$updateID = "update MaxPersonID set id = ".$DirectorID." where id = ".$MaxID."";
							mysql_query($updateID, $db_connection);

							$query = mysql_query("select * from Director where id =".$DirectorID.";");
							$row = mysql_fetch_row($query);
							echo "Add Success!";
							echo "<br/>";
							echo "ID: $row[0] and Name: $row[1], $row[2] has been added!";

						}
						mysql_close($db_connection);
					} 
				}
					
				
			?>

		</form>
	</body>
</html>













