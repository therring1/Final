<?php
	
	
	
	$dbc = @mysqli_connect("localhost", "root", "", "royalty")
	OR die ('could not connect');
	
	
	
	$query = "SELECT orderid, product, quantity, id
	FROM orders WHERE userid='$_POST[order]'";
	$response = @mysqli_query($dbc, $query);
	
	if($response){
		
		echo '<table><tr>
		<td>order id</td>
		<td>product</td>
		<td>quantity</td>
		<td>product id</td></tr>';
		
		while($row = mysqli_fetch_array($response)){
		echo '<tr><td>'.
		$row['orderid']. '</td><td>'.
		$row['product']. '</td><td>'.
		$row['quantity']. '</td><td>'.
		$row['id']. '</td>';
		
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
</head>
<body>


</body>
</html>