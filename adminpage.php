<?php

	$dbc = @mysqli_connect("localhost", "root", "", "finalp")
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
	
			$sq = "INSERT INTO users (user_id, username, userpass,
			firstname, lastname) VALUES (NULL, '$username', '$password', '$firstname', '$lastname')";
			if(mysqli_query($dbc, $sq)){
				echo 'added';
			}else {
				echo 'error: '. $sq. '<br>' .mysqli_error($dbc);
			}
			
									
		} else{//print out missing values
			echo "You need to enter the following data <br>";
			
			foreach($data_missing as $missing){
				
				echo $missing;
				
			}
		}
	}
	
	if(isset($_POST['submitd'])){//delete code
	
		$data_missing = array();
		
		if(empty($_POST['delete'])){
			//add value to array if value is missing
			$data_missing[] = "id is missing";
		} else{
			//remove space
			$delete = trim($_POST['delete']);
			
		}
		
		if(empty($data_missing)){//if all values are entered
			
			$sq = "DELETE FROM users WHERE user_id='$delete'";
			
			if(mysqli_query($dbc, $sq)){
				echo "delete successful";
			} else{
				echo 'Error: '. mysqli_error($dbc);
			}
			
		} else{//print out missing values
			echo "You need to enter the following data <br>";
			
			foreach($data_missing as $missing){
				
				echo $missing;
				
			}
		}
	}
	
	$query = "SELECT user_id, username, userpass, firstname, lastname
	FROM users";
	$response = @mysqli_query($dbc, $query);
	
	if($response){
		echo '<table><tr>
		<td>user id</td>
		<td>username</td>
		<td>userpass</td>
		<td>firstname</td>
		<td>lastname</td></tr>';
		
		while($row = mysqli_fetch_array($response)){
		echo '<tr><td>'.
		$row['user_id']. '</td><td>'.
		$row['username']. '</td><td>'.
		$row['userpass']. '</td><td>'.
		$row['firstname']. '</td><td>'.
		$row['lastname']. '</td>';
		
		echo '</tr>';
		}
		
		echo '</table>';
	}else {
		echo "failed to issue datebase query";
		echo mysqli_error($dbc);
	}
	
	
	
?>

<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
}
th {
    text-align: left;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
	$(document).ready(function(){
	$("#addf").hide();
	$("#deletef").hide();
    
	$("#add").click(function(){
		$("#addf").show();
		$("#deletef").hide();
	});
	$("#delete").click(function(){
		$("#deletef").show();
		$("#addf").hide();
	});
});
</script>

</head>
<body>

	Options:
	<input id="add" type="radio" name="pay"> Add user
	<input id="delete" type="radio" name="pay"> Delete user
	<br><br>
<form action="adminpage.php" method="post">
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
			</p>
			<p>
			<input type="submit" name="submit" value="Add"/>
			</p>
			
	</div>
	<div id="deletef">
		
			<p>Enter id you want to delete
			<input type="text" name="delete" size="5"/>
			</p>
			<p>
			<input type="submit" name="submitd" value="delete"/>
			</p>
	</div>
</form>
</body>
</html>