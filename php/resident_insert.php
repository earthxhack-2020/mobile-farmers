<html>
<body>
	<?php
	    //set PHP variables like this so we can use them anywhere in code below
	    $u_name = filter_var($_POST["name"], FILTER_SANITIZE_STRING); 
	    $u_phone_number = filter_var($_POST["phone_number"], FILTER_SANITIZE_STRING); 
	    $u_address = filter_var($_POST["address"], FILTER_SANITIZE_STRING); 
	    $u_email = filter_var($_POST["email"], FILTER_SANITIZE_STRING); 
	    $u_password = filter_var($_POST["password"], FILTER_SANITIZE_STRING); 

		$mysqli = new mysqli("us-cdbr-iron-east-01.cleardb.net","bce8ddb0b14438","c656e6d2","heroku_48340ca8bd6e8bd");

		if ($mysqli->connect_error) {
		  die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
	    }
		//prepare sql insert query
		$statement = $mysqli->prepare("INSERT INTO resident(id, name, phone_number, address, password, email) VALUES(NULL,?,?,?,?,?)"); 
		//bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
		//bind values and execute insert query
		$statement->bind_param('ssssss', $u_name, $u_phone_number, $u_address, $u_password, $u_email); 
		if (!$statement->execute()) {
			die('Error: ' . mysql_error());
			echo "<p><b>Error:  . mysql_error()</b></p>";
		} else {
		  echo "<p>Resident Added</p>";
		  echo "<a href=\"home.html\">Go Back</a>";
		}
	?>
  </body>
</html>
