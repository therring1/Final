<?php

	$dbc = @mysqli_connect("localhost", "root", "", "royalty")
	OR die ('could not connect');
	
	if(isset($_POST['submit'])){//add to database code
		
		$data_missing = array();
		
		
		if(empty($_POST['nam'])){
			//add to array if value is not entered
			$data_missing[] = "name";
			
		} else{
			//remove space
			$nam = trim($_POST['nam']);
			
		}
		
		if(empty($_POST['image'])){
			//add to array if value is not entered
			$data_missing[] = "image";
			
		} else{
			//remove space
			$image = trim($_POST['image']);
			
		}
		
		if(empty($_POST['price'])){
			//add to array if value is not entered
			$data_missing[] = "username";
			
		} else{
			//remove space
			$price = trim($_POST['price']);
			
		}
		
		
		if(empty($data_missing)){//if all values are entered
	
			$sq = "INSERT INTO tbl_product (id, name, image, price
			) VALUES (NULL, '$nam', '$image', '$price')";
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
			
			$sq = "DELETE FROM tbl_product WHERE id='$delete'";
			
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
	
	if(isset($_POST['submitch'])){//change price code
		
		$data_missing = array();
		
		if(empty($_POST['chid'])){
			//add value to array if value is missing
			$data_missing[] = "id";
		} else{
			//remove space
			$chid = trim($_POST['chid']);
			
		}
		
		if(empty($_POST['chprice'])){
			//add value to array if value is missing
			$data_missing[] = "password";
		} else{
			//remove space
			$chprice = trim($_POST['chprice']);
			
		}
		
		if(empty($data_missing)){//if all values are entered
			
			$sq = "UPDATE tbl_product SET price='$chprice' Where id='$chid'";
			
			if(mysqli_query($dbc, $sq)){
				echo "price change successful";
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
	
	$query = "SELECT id, name, image, price
	FROM tbl_product";
	$response = @mysqli_query($dbc, $query);
	
	if($response){
		
		echo '<table><tr>
		<td>id</td>
		<td>name</td>
		<td>image</td>
		<td>price</td></tr>';
		
		while($row = mysqli_fetch_array($response)){
		echo '<tr><td>'.
		$row['id']. '</td><td>'.
		$row['name']. '</td><td>'.
		$row['image']. '</td><td>'.
		$row['price']. '</td>';
		
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
	<input id="add" type="radio" name="pay"> Add to inventory
	<input id="delete" type="radio" name="pay"> Delete from inventory
	<input id="change" type="radio" name="pay"> Change price
	<br><br>
<form action="admini.php" method="post">
	<div id="addf">
				
			<p>Name
			<input type="text" name="nam" size="30"/>
			</p>
			<p>Image
			<input type="text" name="image" size="30"/>
			</p>
			<p>Price
			<input type="text" name="price" size="30"/>
			</p>			
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
	<p>Enter id of price you want to chnage
	<input type="text" name="chid" size="5"/>
	</p>
	<p>Enter new price
	<input type="text" name="chprice" size=""/>
	</p>
	<p>
	<input type="submit" name="submitch" value="change"/>
	</p>
	</div>
</form>
</body>
</html>