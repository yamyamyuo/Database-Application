<!DOCTYPE html>
<html>
	<head>
		<title>CS143 Query Interface</title>
		<style>
			h1,h3 {text-align: center;}
			p {text-align: center;}
			#input {text-align: center;}
			ul,ol { display:table; margin:0 auto;}
			table, th, td {
				border: 1px solid blue;
	        }
	        #tableContainer-1 {
			    height: 100%;
			    width: 100%;
			    display: table;
		  	}
		   	#tableContainer-2 {
			    vertical-align: middle;
			    display: table-cell;
			    height: 100%;
		  	}
		 	#myTable {
		    	margin: 0 auto;
		  	}
		</style>
	</head>
	<body id = "input">
		<h1>CS143 Project1 partB Qurey</h1>
		<p>By Manna Lin</p>
		<h3>Please do not run a complex query here. You may kill the server.</h3>
		<p>Type an SQL query in the following box:</p>
		<p>Example: SELECT * FROM Movie WHERE id=272;<br/>
			SELECT * FROM Actor WHERE id < 20;</p><br/>
		<form action="query.php" method="GET">
			<textarea name="query" rows="10" cols="80"></textarea>
			<input type="submit" value="Run">
		</form>
		<div id="tableContainer-1">
  			<div id="tableContainer-2">
				<?php
					if ($_GET["query"]) {
						$db_connection = mysql_connect("localhost","cs143","");
						if (!$db_connection) {
							$errmsg = mysql_error($db_connection);
							eval("Connection failed: $errmsg;");
							exit(1);
						}
						mysql_select_db("CS143", $db_connection);
						
						$query = $_GET["query"];
						$sanitized_name = mysql_real_escape_string($name, $db_connection);
						$query_to_issue = sprintf($query, $sanitized_name);
						$rs = mysql_query($query_to_issue, $db_connection);
						
						echo '<table id="myTable">';
						for ($i = 0; $i < mysql_num_fields($rs); $i++) {
							print '<th>'.mysql_field_name($rs, $i).'</th>';
						}

						while ($row = mysql_fetch_row($rs)) {
							echo "<tr>";
							for ($i=0; $i<sizeof($row); $i++) {
								echo "<td>";
								$d = $row[$i];
								echo $d;
								echo "</td>";
							}
							echo "</tr>";
						}
						echo "</table>";
						echo '</p>';
						mysql_close($db_connection);
					}
				?>
			</div>
		</div>
	</body>
</html>