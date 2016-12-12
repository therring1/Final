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
                echo '<script>window.location="viewcart.php"</script>';  
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
                     echo '<script>window.location="viewcart.php"</script>';  
                }  
           }  
      }  
 }  
 ?>
                <div style="clear:both"></div>  
                <br />  
                <h3>Order Details</h3>  
                <div class="table-responsive">  
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="40%">Item Name</th>  
                               <th width="10%">Quantity</th>  
                               <th width="20%">Price</th>  
                               <th width="15%">Total</th>  
                               <th width="5%">Action</th>  
                          </tr>  
                          <?php   
                          if(!empty($_SESSION["royalty"]))  
                          {  
                               $total = 0;  
                               foreach($_SESSION["royalty"] as $keys => $values)  
                               {  
                          ?>  
                          <tr>  
                               <td><?php echo $values["item_name"]; ?></td>  
                               <td><?php echo $values["item_quantity"]; ?></td>  
                               <td>$ <?php echo $values["item_price"]; ?></td>  
                               <td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>  
                               <td><a href="viewcart.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>  
                          </tr>  
                          <?php  
                                    $total = $total + ($values["item_quantity"] * $values["item_price"]);  
                               }  
                          ?>  
                          <tr>  
                               <td colspan="3" align="right">Total</td>  
                               <td align="right">$ <?php echo number_format($total, 2); ?></td>  
                               <td></td>  
                          </tr>  
                          <?php  
                          }  
                          ?>  
                     </table> 
						  <style>
						  .cartLink {
  background:#38B87C;
  padding:15px; 
  display:block; 
  width:240px;
  color:#fff;
  -webkit-border-radius: 4px;
  -moz-border-radius: 4px;
  border-radius: 4px;
  text-decoration:none;
  float:left;
}

.cartLink:hover {
  background:#1b985e;
}
.cartLink2 {
  background:#38B87C;
  padding:15px; 
  display:block; 
  width:240px;
  color:#fff;
  -webkit-border-radius: 4px;
  -moz-border-radius: 4px;
  border-radius: 4px;
  text-decoration:none;
  float:right;
}

.cartLink:hover2 {
  background:#1b985e;
}
</style>
						  <button class="cartLink"><a href="tia.php">Contnue Shopping </a></button>
						  <button class="cartLink2"><a href="creditcard.php">Continue to Checkout</a></button>
						  					 
                </div>  
           </div>  
           <br />  
      </body>  
 </html>  