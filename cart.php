<script language="javascript">
  function goBack() {
    window.location="index.php?page=product";
  }
</script>
<?php
if(isset($_GET["action"]))
{
  if($_GET["action"] == "delete")
  {
    foreach($_SESSION["shopping_cart"] as $keys => $values)
    {
      if($values["pro_id"] == $_GET["id"])
      {
        unset($_SESSION["shopping_cart"][$keys]);
      }
    }
  }
}
?>
  <div class="site-wrap" style="min-height: calc(100vh - 392.16px)">
    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
        <div class="col-md-12">
            <h2 class="h3 mb-3 text-black">Cart</h2>
          </div>
          <form class="col-md-12" method="post">
            <div class="site-blocks-table">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th class="product-thumbnail">Image</th>
                    <th class="product-name">Product</th>
                    <th class="product-price">Price</th>
                    <th class="product-quantity">Quantity</th>
                    <th class="product-total">Total</th>
                    <th class="product-total">Action</th>
                  </tr>
                </thead>
                <tbody>

                <?php
                  if(!empty($_SESSION["shopping_cart"]))
                  {
                    $total = 0;

                    foreach($_SESSION["shopping_cart"] as $keys => $values)
                    {
                ?>

                  <tr>
                    <td class="product-thumbnail">
                      <img src="images2/<?php echo $values['pro_img'] ?>" alt="Image" class="img-fluid">
                    </td>
                    
                    <td class="product-name">
                      <h2 class="h5 text-black"><?php echo $values['pro_name'] ?></h2>
                    </td>
                    <td>$<?php echo $values['price'] ?></td>
                    <td><?php echo $values['quantity'] ?></td>
                    
                    <td>$<?php 
                      $prototal = $values['quantity'] * $values['price'];
                      echo $prototal;
                    ?></td>
                    <td><a href="?page=cart&&action=delete&id=<?php echo $values["pro_id"]; ?>"><span class="text-danger">Remove</span></a></td>
                  </tr>

                <?php
                    }
                  }
                ?>

                </tbody>
              </table>
            </div>
          </form>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="row mb-5">
              <div class="col-md-5">
                <input type="button" class="btn btn-primary btn-lg btn-block" onclick="window.location='?page=shop'" value="Continue shopping" name="btnCheckout">
              </div>
            </div>
          </div>
          <div class="col-md-6 pl-5">
            <div class="row justify-content-end">
              <div class="col-md-7">
                <div class="row">
                  <div class="col-md-12 text-right border-bottom mb-5">
                    <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                  </div>
                </div>
                <!-- <div class="row mb-3">
                  <div class="col-md-6">
                    <span class="text-black">Subtotal</span>
                  </div>
                  <div class="col-md-6 text-right">
                    <strong class="text-black">$230.00</strong>
                  </div>
                </div> -->
               
                <div class="row mb-5">
                  <div class="col-md-6">
                    <span class="text-black">Total</span>
                  </div>
                  
                <?php
                $total = 0;
                  if(!empty($_SESSION["shopping_cart"]))
                  {
                    $total = 0;
                    foreach($_SESSION["shopping_cart"] as $keys => $values)
                    { 
                      $total = $total + ($values["quantity"] * $values["price"]);
                    }
                  }
                ?>
                <div class="col-md-6 text-right">
                    <strong class="text-black">$<?php echo number_format($total, 2); ?></strong>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <form action="" method="post">
                      <?php
                        if(isset($_SESSION["shopping_cart"])){
                      ?>
                      <input type="submit" class="btn btn-primary btn-lg btn-block" value="Pay" name="btnCheckout">
                      <?php } ?>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php
    if(isset($_POST['btnCheckout']))
    {
      if(isset($_SESSION["shopping_cart"])){
        $us = $_SESSION['us'];
        $count = count($_SESSION["shopping_cart"]);
        $order_detail = "";
        for($i = 0; $i < $count; $i++){
          $order_detail .= $_SESSION["shopping_cart"][$i]["pro_name"]."|"
          .$_SESSION["shopping_cart"][$i]["price"]."|"
          .$_SESSION["shopping_cart"][$i]["quantity"]."||";
        }
  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        mysqli_query($conn, "insert into orders (account_ID, order_detail, pay) 
        VALUES ('$us','$order_detail','$total')") or die (mysqli_error($conn));
        
        echo "<script type='text/javascript'>alert('Order Successfully Created'); history.back();</script>";
        unset($_SESSION['shopping_cart']);
      }
    }
  ?>