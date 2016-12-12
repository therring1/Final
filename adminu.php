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
		
		if($_POST['admin']=="0" || $_POST['admin']=="1"){
			
			
			$admin = trim($_POST['admin']);
		} else{
			
			$data_missing[] = "admin must equal 0 or 1";
			
		}
		
		if(empty($data_missing)){//if all values are entered
	
			$sq = "INSERT INTO users (userid, username, password,
			firstname, lastname, admin) VALUES (NULL, '$username', '$password', '$firstname', '$lastname', '$admin')";
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
			
			$sq = "DELETE FROM users WHERE userid='$delete'";
			
			if(mysqli_query($dbc, $sq)){
				echo "delete successful";
			} else{
				echo 'Error: '. mysqli_error($dbc);
			}
			
		} else{//print out missing values
			echo "You need to enter the following data <br>";
			
			foreach($data_missing as $missing){
				
				echo $missing. ' ';
				
			}
		}
	}
	
	if(isset($_POST['submitch'])){//change password code
		
		$data_missing = array();
		
		if(empty($_POST['chid'])){
			//add value to array if value is missing
			$data_missing[] = "id";
		} else{
			//remove space
			$chid = trim($_POST['chid']);
			
		}
		
		if(empty($_POST['chpass'])){
			//add value to array if value is missing
			$data_missing[] = "password";
		} else{
			//remove space
			$chpass = trim($_POST['chpass']);
			
		}
		
		if(empty($data_missing)){//if all values are entered
			
			$sq = "UPDATE users SET password='$chpass' Where userid='$chid'";
			
			if(mysqli_query($dbc, $sq)){
				echo "password change successful";
			} else{
				echo 'Error: '. mysqli_error($dbc);
			}
			
		} else{//print out missing values
			echo "You need to enter the following data <br>";
			
			foreach($data_missing as $missing){
				
				echo $missing. ' ';
				
			}
		}
	}
	
	$query = "SELECT userid, username, password, firstname, lastname, admin
	FROM users";
	$response = @mysqli_query($dbc, $query);
	
	if($response){
		echo '<form action="admino.php" method="post">';
		echo '<table><tr>
		<td>user id</td>
		<td>username</td>
		<td>password</td>
		<td>firstname</td>
		<td>lastname</td>
		<td>admin</td>
		<td>orders</td></tr>';
		
		while($row = mysqli_fetch_array($response)){
		echo '<tr><td>'.
		$row['userid']. '</td><td>'.
		$row['username']. '</td><td>'.
		$row['password']. '</td><td>'.
		$row['firstname']. '</td><td>'.
		$row['lastname']. '</td><td>'.
		$row['admin']. '</td><td>'.
		'<button name="order" value='.$row['userid']. '>view order</button></td>';
		
		echo '</tr>';
		}
		
		echo '</table>';
		echo '</form>';
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
	$("#chpass").hide();
    
	$("#add").click(function(){
		$("#addf").show();
		$("#deletef").hide();
		$("#chpass").hide();
	});
	$("#delete").click(function(){
		$("#deletef").show();
		$("#addf").hide();
		$("#chpass").hide();
	});
	$("#change").click(function(){
		$("#chpass").show();
		$("#addf").hide();
		$("#deletef").hide();
	});
});
</script>

</head>
<body>

	Options:
	<input id="add" type="radio" name="pay"> Add user
	<input id="delete" type="radio" name="pay"> Delete user
	<input id="change" type="radio" name="pay"> Change password
	<br><br>
<form action="adminu.php" method="post">
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
			<p>admin(0 or 1)
			<input type="text" name="admin" size="5"/>
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
	<div id="chpass">
	<p>Enter id of password you want to change
	<input type="text" name="chid" size="5"/>
	</p>
	<p>Enter new password
	<input type="text" name="chpass" size=""/>
	</p>
	<p>
	<input type="submit" name="submitch" value="change"/>
	</p>
	</div>
	<style>
	body{
background-color:#6699CC;
}
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: black;
    color: white;
}
	</style>
</form>
</body>
</html>