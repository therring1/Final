<?php
 session_start();
 $dbc = @mysqli_connect("localhost", "root", "", "royalty")
	OR die ('could not connect');
 $_SESSION["royalty"];
 echo $_SESSION["useid"]. "<br>";
$count = count($_SESSION["royalty"]);  
for($x=0; $x<$count; $x++){
	$id = $_SESSION["royalty"][$x]['item_id'];
	$prod = $_SESSION["royalty"][$x]['item_name'];
	$quan = $_SESSION["royalty"][$x]['item_quantity'];
	$user = $_SESSION["useid"];
	if($user == null){
		echo "You are not logged in";
		break;
	}
	$sq = "INSERT INTO orders (orderid, product, quantity,
			userid, id) VALUES (NULL, '$prod', '$quan', '$user', '$id')";
	if(mysqli_query($dbc, $sq)){
	
	}else {
		echo 'error: '. $sq. '<br>' .mysqli_error($dbc);
		}
}

echo "Your order has been completed";

$_SESSION['royalty'] = array ();
 ?>