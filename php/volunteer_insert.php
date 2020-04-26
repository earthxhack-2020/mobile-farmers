<html>
<body>
	<?php
	    //set PHP variables like this so we can use them anywhere in code below
	    $u_name = filter_var($_POST["name"], FILTER_SANITIZE_STRING); 
	    $u_phone_number = filter_var($_POST["phone_number"], FILTER_SANITIZE_STRING); 
	    $u_email = filter_var($_POST["email"], FILTER_SANITIZE_STRING); 
	    $u_password = filter_var($_POST["password"], FILTER_SANITIZE_STRING); 
	    $u_availability = filter_var($_POST["availability"], FILTER_SANITIZE_STRING); 

		$mysqli = new mysqli("us-cdbr-iron-east-01.cleardb.net","bce8ddb0b14438","c656e6d2","heroku_48340ca8bd6e8bd");

		if ($mysqli->connect_error) {
		  die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
	    }
		//prepare sql insert query
		$statement = $mysqli->prepare("INSERT INTO volunteer(id, name, phone_number, password, email, availability) VALUES(NULL,?,?,?,?,?)"); 
		//bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
		//bind values and execute insert query
		$statement->bind_param('sssss', $u_name, $u_phone_number, $u_password, $u_email, $u_availability); 
		if (!$statement->execute()) {
			die('Error: ' . mysql_error());
			echo "<p><b>Error:  . mysql_error()</b></p>";
		} else {
		  echo "<p>Volunteer Added</p>";
		  echo "<a href=\"https://mobile-farmers-market.herokuapp.com\">Home</a>";
		}
	?>
  </body>
</html>
