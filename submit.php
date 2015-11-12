<?php
	session_start();
	$email = $_GET["emailAdd"];
	$name = $_GET["fullName"];
	$pass = session_id();
	$pass = substr($pass, 0, 8);
	
	print"$email $name";

	$file = fopen("account.txt", "w");

	fwrite($file, $email);
	fwrite($file, $pass);
	fwrite($file, $name);

	fclose($file);

	$sub = "Account Password";
	$hdrs = "From: Ryan@pong.etown.edu" . \r\n";
	$msg = "Thank you for creating an account. Your password is: $pass";

	mail($email, $sub, $msg, $hdrs);

	$array = explode(" ", $name);

?>

<!DOCTYPE html>

<html>

<body>
	<?php
	
		print "<h1>Thank you for creating an account, $array[0]!</h1>";
		print "<h2>Please check your email.</h2>";
		print "<h3>< href = "homework.html">Once you have your password, go here to log in.</a></h3>";
		
	?>
</body>

</html>