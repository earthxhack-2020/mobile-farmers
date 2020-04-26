<html>
<body>
<!--?php
  ini_set('display_errors', 1);
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
?-->
	<?php
		echo "attempting to add 1 record";
		echo "name: $_POST[name]";
		echo "name: $_POST[phone_number]";
		echo "name: $_POST[email]";
		echo "name: $_POST[availability]";
		$con = mysql_connect("us-cdbr-iron-east-01.cleardb.net","bce8ddb0b14438","c656e6d2");
		if (!$con) {
			die('Could not connect: ' . mysql_error());
		}
		mysql_select_db("heroku_48340ca8bd6e8bd", $con);
		$sql="INSERT INTO farmer(id, name, phone_number, common_produce, password, email, availability) 
		       VALUES (NULL,'$_POST[name]','$_POST[phone_number]','$_POST[common_produce]','$_POST[password]','$_POST[email]','$_POST[availability]')";
		if (!mysql_query($sql,$con)) {
			die('Error: ' . mysql_error());
		}
		echo "1 record added";
		mysql_close($con)
		if(mysql_affected_rows($connect) > 0){
	      echo "<p>Farmer Added</p>";
		  echo "<a href="home.html">Go Back</a>";
		} else {
	      echo "Farmer NOT Added<br />";
		  echo mysqli_error ($connect);
		}
	?>
  </body>
</html>
