<?php

	$dbc = @mysqli_connect("localhost", "root", "", "royalty")
	OR die ('could not connect');
	
	if(isset($_POST['submitl'])){

		$query = "SELECT * FROM users where username='$_POST[username]' AND password ='$_POST[password]'"
		or die(mysql_error());
		$response = @mysqli_query($dbc, $query);
		
		if($response){
			$row = mysqli_fetch_array($response);
			if(!empty($row['username']) && !empty($row['password'])){
				session_start();
				$_SESSION['useid'] = $row['userid'];
				echo "you have been logged in";
			}else{
				echo "username and password incorrect or you don't have permissions";
			}
		
	}else {
		echo "failed to issue datebase query";
		echo mysqli_error($dbc);
	}
	}
?>

<html>
<head>
</head>

<body>
<form action="login.php" method="post">
	<p>Username
	<input type="text" name="username" size="30"/>
	</p>
	<p>Password
	<input type="text" name="password" size="30"/>
	</p>			
	<input type="submit" name="submitl" value="log"/>
	</p>
</form>
</body>

</html>