<?php

session_start();

$user = $_GET["user"];
$pass = $_GET["password"];

if(!strpos($user, "@"))
	$user = $user . "@etown.edu";

$validUser = false;

$_SESSION["user"] = $user;
$_SESSION["pass"] = $pass;
$_SESSION["login"] = $validUser;

?>

<!DOCTYPE html>

<html>

<body>

<?php

	print "<h2>Welcome $user</h2>";

	$inFile = fopen("account.txt" , "r");
	$entry = fgets($inFile);

	while (!feof($inFile))
	{
		$array = explode(" ", $entry);

		if($array[0] == $user)
		{
			$name = $array[0];
			$code = $array[1];
			      //print "code prior to substr: $code <br/>";
			$code = substr($code, 0, strlen($code) - 1);
		}

		$entry = fgets($inFile);
	}

	fclose($inFile);

	//print "name: $name <br/>";
	//print "real pass: $pass <br/>";
	//print "code after substr: $code <br/>";

	if($name == $user && $code == $pass)
		$validUser = true;

	$_SESSION["login"] = $validUser;

	print "That's All! <br/>";

	if($validUser)
		print "Welcome valid user<br/>";
	else
	{
		print "You are not a valid user. Go become on first!";
		print '<script type = "text/javascript">';
		print '	       //document.location = "register.html";';
		print '</script>';
	}
	
?>

</body>
</html>