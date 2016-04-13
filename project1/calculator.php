<!DOCTYPE HTML>
<html>
<head>
	<title>Calculator</title>
	<style>
		h1,h3 {text-align: center;}
		p {text-align: center;}
		#input {text-align: center;}
		ul,ol { display:table; margin:0 auto;}
	</style>
</head>
<body>

	<h1>Simple Arithmetic Calculator</h1>
	<p>Please type your expression in the following area(e.g., 25.4*-3+2/3)</p>
	<div id="input">
		<form method="get">
			<input name="expression" type="text">
			<input type="submit" value="Calculate"><br/><br/>
		</form>
	</div>
	<div>
		<ul>
			<li>Only numbers and +,-,* and / operators are allowed in the expression.</li>
			<li>The evaluation follows the standard operator precedence.</li>
			<li>The calculator does not support parentheses.</li>
            <li>The calculator handles invalid input "gracefully". It does not output PHP error messages.</li>
		</ul>
		<h3>Here are some(but not limit to) reasonable test cases:</h3>
		<ol>
			<li>A basic arithmetic operation: 3+4*5=23</li>
			<li>An expression with floating point or negative sign : -3.2+2*4-1/3 = 4.46666666667, 3*-2.1*2 = -12.6</li>
			<li>Some typos inside operation (e.g. alphabetic letter): Invalid input expression 2d4+1</li>
		</ol>
	</div>
	<hr>
	
	<?php
		$expr = $_GET["expression"];
		$flag = 1;
		if ($_GET["expression"]) {
			$input = $_GET["expression"];
			$pattern = "/(( *\-?\d*\.?\d+ *[\+\-\*\/] *)+(\-?\d*\.?\d+))|( *\-?\d*\.?\d+ *)/";
			preg_match($pattern, $expr, $matched);

			echo "<h2>Your Result:</h2>";
			if ($matched[0] != $expr) {
				$flag = 0;
			}
			else if (strlen(strstr($expr,"/0"))>0) {
				$flag = 2;
			}  
			if (strlen(strstr($expr,"0/"))!=0) {
				$flag = 3;
			}
			
			echo $input;
			if ($flag==1) {
				echo " = ";
				$result = 0;
				eval('$result = '.$matched[0].';');
				echo $result;
			} else if ($flag == 0){
				echo " Invalid input!";
			} else if ($flag == 2) {
				echo "cannot devided by Zero!<br/>";
			} else if ($flag == 3) {
				echo "=0";
			}
		}
	?>
	

</body>
</html>