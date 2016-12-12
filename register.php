<?php

	$dbc = @mysqli_connect("localhost", "root", "", "royalty")
	OR die ('could not connect');
	
	if(isset($_POST['submit'])){//add to database code
		
		$data_missing = array();
		
		if(empty($_POST['user'])){
			//add to array if value is not entered
			$data_missing[] = "username";
			
		} else{
			//remove space
			$username = trim($_POST['user']);
			
		}
		
		if(empty($_POST['password'])){
			
			$data_missing[] = "password";
			
		} else{
			
			$password = trim($_POST['password']);
			
		}
		
		if(empty($_POST['firstname'])){
			
			$data_missing[] = "firstname";
			
		} else{
			
			$firstname = trim($_POST['firstname']);
			
		}
		
		if(empty($_POST['lastname'])){
			
			$data_missing[] = "lastname";
			
		} else{
			
			$lastname = trim($_POST['lastname']);
			
		}
		
		if(empty($data_missing)){//if all values are entered
	
			$sq = "INSERT INTO users (userid, username, password,
			firstname, lastname, admin) VALUES (NULL, '$username', '$password', '$firstname', '$lastname', 0)";
			if(mysqli_query($dbc, $sq)){
				echo 'added';
			}else {
				echo 'error: '. $sq. '<br>' .mysqli_error($dbc);
			}
			
									
		} else{//print out missing values
			echo "You need to enter the following data <br>";
			
			foreach($data_missing as $missing){
				
				echo $missing. ' ';
				
			}
		}
	}
		
?>


<html>
<head>
</head>

<body>
	<form action="register.php" method="post">
	<div id="addf">
		
			<p>Username
			<input type="text" name="user" size="30"/>
			</p>
			<p>Password
			<input type="text" name="password" size="30"/>
			</p>
			<p>First name
			<input type="text" name="firstname" size="30"/>
			</p>
			<p>Last name
			<input type="text" name="lastname" size="30"/>			
			<p>
			<input type="submit" name="submit" value="Add"/>
			</p>
		</div>
	</form>
			
</body>


</html>