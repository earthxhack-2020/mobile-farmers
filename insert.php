<html>
  <body>
	<?php
		$con = mysql_connect("us-cdbr-iron-east-01.cleardb.net","bce8ddb0b14438","c656e6d2");
		if (!$con) {
			die('Could not connect: ' . mysql_error());
		}
		mysql_select_db("cis_id", $con);
		$sql="INSERT INTO farmer(name, phone_number, common_produce, password, email, availability) 
		       VALUES ('$_POST[name]','$_POST[phone_number]','$_POST[common_produce]','$_POST[password]','$_POST[email]','$_POST[availability]')";
		if (!mysql_query($sql,$con)) {
			die('Error: ' . mysql_error());
		}
		echo "1 record added";
		mysql_close($con)
	?>
  </body>
</html>
