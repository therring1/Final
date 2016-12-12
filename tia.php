<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="test1.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<body>
<style>
.parallax2 {
    /* The image used */
    background-image: url("images/bi.jpg");

    /* Set a specific height */
    min-height: 500px; 

    /* Create the parallax scrolling effect */
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}
</style>
<ul>
  <li><a class="active" href="tia.php">Royalty</a></li>
  <li><a href="contact.html">Contact</a></li>
  <li><a href="Login.php">Login</a></li>
  <li><a href="register.php">Register</a></li>
  <li><a href="viewcart.php">Shopping Cart</a></li>
</ul>
<div class="slideshow-container">

<div class="mySlides fade">
		<div class="numbertext">1 / 3</div>
			<img src="images/fall.jpg" width="1000px" height="500px">
</div>

<div class="mySlides fade">
		<div class="numbertext">2 / 3</div>
			<img src="images/bi2.png" width="1000px" height="500px">
</div>

<div class="mySlides fade">
		<div class="numbertext">3 / 3</div>
			<img src="images/mn.jpeg" style="width:100%">
	</div>
</div>

<div class="parallax2"></div>
<div style="height:1000px">
<script>
		var myIndex = 0;
		carousel();

		function carousel() {
			var i;
			var x = document.getElementsByClassName("mySlides");
			for (i = 0; i < x.length; i++) {
			  x[i].style.display = "none";  
			}
			myIndex++;
			if (myIndex > x.length) {myIndex = 1}    
			x[myIndex-1].style.display = "block";  
			setTimeout(carousel, 2500);    
		}
	</script>
	<ul id="navigation">
		<li><button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Admin</button></li>
	</ul>
<div id="id01" class="modal">
  
  <form class="modal-content animate" action="adminu.php" method="POST">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="images/admin.jpeg" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="username" required>

      <label><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" required>
        
      <input type="submit" name="adminu.php" value="submit"/>
      <input type="checkbox" checked="checked"> Remember me
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
    </div>
  </form>
</div>
</body>
</html>
<?php   
 session_start();  
 $connect = mysqli_connect("localhost", "root", "", "royalty");  
 if(isset($_POST["add_to_cart"]))  
 {  
      if(isset($_SESSION["royalty"]))  
      {  
           $item_array_id = array_column($_SESSION["royalty"], "item_id");  
           if(!in_array($_GET["id"], $item_array_id))  
           {  
                $count = count($_SESSION["royalty"]);  
                $item_array = array(  
                     'item_id'               =>     $_GET["id"],  
                     'item_name'               =>     $_POST["hidden_name"],  
                     'item_price'          =>     $_POST["hidden_price"],  
                     'item_quantity'          =>     $_POST["quantity"]  
                );  
                $_SESSION["royalty"][$count] = $item_array;  
           }  
           else  
           {  
                echo '<script>alert("Item Already Added")</script>';  
                echo '<script>window.location="tia.php"</script>';  
           }  
      }  
      else  
      {  
           $item_array = array(  
                'item_id'               =>     $_GET["id"],  
                'item_name'               =>     $_POST["hidden_name"],  
                'item_price'          =>     $_POST["hidden_price"],  
                'item_quantity'          =>     $_POST["quantity"]  
           );  
           $_SESSION["royalty"][0] = $item_array;  
      }  
 }  
 if(isset($_GET["action"]))  
 {  
      if($_GET["action"] == "delete")  
      {  
           foreach($_SESSION["royalty"] as $keys => $values)  
           {  
                if($values["item_id"] == $_GET["id"])  
                {  
                     unset($_SESSION["royalty"][$keys]);  
                     echo '<script>alert("Item Removed")</script>';  
                     echo '<script>window.location="tia.php"</script>';  
                }  
           }  
      }  
 }  
 ?> 
 <!DOCTYPE html>  
 <html>  
      <head>  
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
 <body>  
           <br />  
           <div class="container" style="width:700px;">  
                <?php  
                $query = "SELECT * FROM tbl_product ORDER BY id ASC";  
                $result = mysqli_query($connect, $query);  
                if(mysqli_num_rows($result) > 0)  
                {  
                     while($row = mysqli_fetch_array($result))  
                     {  
                ?>  
                <div class="col-md-4">  
                     <form method="post" action="tia.php?action=add&id=<?php echo $row["id"]; ?>">  
                          <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">  
							   <img src="<?php echo $row["image"]; ?>" class="img-responsive" /><br />
                               <h4 class="text-info"><?php echo $row["name"]; ?></h4>  
                               <h4 class="text-danger">$ <?php echo $row["price"]; ?></h4>  
                               <input type="text" name="quantity" class="form-control" value="1" />  
                               <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />  
                               <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />  
                               <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />  
<br><br>						
						</div>  
                     </form>  
                </div>  
                <?php  
                     }  
                }  
                ?>  
                </html>