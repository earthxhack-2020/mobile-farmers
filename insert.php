<html>
  <body>
	<?php
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
	?>
  </body>
</html>
