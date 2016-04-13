<!DOCTYPE HTML>
<html>
<head>
	<title>BMI</title>
	<style>
		h1 {text-align: center;}
		p {text-align: center;}
		#input {text-align: center;}
	</style>
</head>
<body>
	<?php
	
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		$data = test_data_validation($data);
		return $data;
	}

	function test_data_validation($data) {
		if ($data < 0 || (is_numeric($data) == false)) {
			echo "Please input the valid data!";
			echo "<br/>";
			$data = 0;
			return $data;
		}
	}

	function calculate_bmi($height, $weight) {
		$bmi = 0;
		if ($height != 0)
			$bmi = $weight/($height*$height);
		return $bmi;
	}

	function display_rule($bmi) {
		if ($bmi <= 18.5)
			echo "You're Underweight!";
		else if (18.5< $bmi && $bmi<=24.9)
			echo "Normal weight";
		else if (24.9<$bmi && $bmi<=29.9)
			echo "Overweight";
		else if (29.9<$bmi && $bmi<=39.9)
			echo "You're Obesity!!";
		else if ($bmi>39.9)
			echo "Be attention! You're Morbidly Obesity!";
		else if ($bmi < 0){
			echo "Please input the valid data";
			$flag = false;
		}
	}

	?>
	<h1>Body Mass Index Calculator</h1>
	<p>Please type your information in the following area</p>
	<div id="input">
		<form method="post">
			Height(m):
			<input name="height" type="text">

			Weight(Kg):
			<input name="weight" type="text"><br/><br/>
			BMI:
			<input name="bmiresult" value="<?php if (flag) echo $bmi?>" disabled><br/><br/>
			<input type="submit" value="Submit"> 
		</form>
	</div>
	<hr>
	
	<?php
		echo "<h2>Your Result:</h2>";
		$height = $weight = 0;
		$flag = true;

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$height = test_input($_POST["height"]);
			$weight = test_input($_POST["weight"]);
			$bmi = calculate_bmi($height, $weight);
		}

		if (isset($bmi)&&$bmi!=0)
			display_rule($bmi);
	?>

</body>
</html>