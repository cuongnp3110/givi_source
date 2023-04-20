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
            <h2 class="h3 mb-3 text-black">Orders</h2>
          </div>
          <form class="col-md-12" method="post">
            <div class="site-blocks-table">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th class="product-no" style="padding: 0 5px 0 5px">No.</th>
                    <th class="product-thumbnail">Time</th>
                    <th class="product-name">Product Name</th>
                    <th class="product-price">Price</th>
                    <th class="product-quantity">Quantity</th>
                    <th class="product-total">Total</th>
                    <th class="product-total">Order Value</th>
                  </tr>
                </thead>
                <tbody>
                  
                  <?php 
                    $total = 0;
                    $no=1;
                    $us = $_SESSION['us'];
                    $result = mysqli_query($conn, "select * from orders where account_id = '$us'");
                    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                      $order_value = explode("||", $row["order_detail"]);
                      $innerCounter = 0;
                      $innerTotal = 0;
                  ?>
                  <tr>
                    <td rowspan="<?php echo count($order_value) -1?>"><?php echo $no ?></td>
                    <td rowspan="<?php echo count($order_value) -1?>"><?php echo $row["order_day"] ?></td>
                    <td><?php echo explode("|", explode("||", $row["order_detail"])[$innerCounter])[0]?></td>
                    <td><?php echo explode("|", explode("||", $row["order_detail"])[$innerCounter])[1]?></td>
                    <td><?php echo explode("|", explode("||", $row["order_detail"])[$innerCounter])[2]?></td>
                    <td><?php 
                    $price = explode("|", explode("||", $row["order_detail"])[$innerCounter])[1];
                    $quan = explode("|", explode("||", $row["order_detail"])[$innerCounter])[2];
                    echo $price*$quan; 
                    $innerCounter++;
                    $total += $price*$quan; 
                    $innerTotal += $price*$quan; ?></td>
                    <td rowspan="<?php echo count($order_value) -1?>"><?php echo $row['pay'] ?></td>
                    
                  </tr>
                    
                  <?php
                    for($i=0;$i<count($order_value) -2;$i++){
                      ?>
                      <tr>
                        <td><?php echo explode("|", explode("||", $row["order_detail"])[$innerCounter])[0]?></td>
                        <td><?php echo explode("|", explode("||", $row["order_detail"])[$innerCounter])[1]?></td>
                        <td><?php echo explode("|", explode("||", $row["order_detail"])[$innerCounter])[2]?></td>
                        <td><?php 
                          $price = explode("|", explode("||", $row["order_detail"])[$innerCounter])[1];
                          $quan = explode("|", explode("||", $row["order_detail"])[$innerCounter])[2];
                          echo $price*$quan; 
                          $innerCounter++;
                          $total += $price*$quan; 
                          $innerTotal += $price*$quan; ?></td>
                        
                      </tr>
                      <?php
                    }
                  ?>
                  

                    <?php 
                    $no++; } 
                    ?>

                 <!-- <tr>
                    <td rowspan=2>1</td>
                    <td rowspan=2>2</td>
                    <td>3</td>
                  </tr>
                  <tr>
                    <td>3</td>
                  </tr> -->
                </tbody>
              </table>
            </div>
          </form>
        </div>

        <div class="row">
          <div class="col-md-6">
          </div>
          <div class="col-md-6 pl-5">
            <div class="row justify-content-end">
              <div class="col-md-7">
                <div class="row">
                  <div class="col-md-12 text-right border-bottom mb-5">
                    <h3 class="text-black h4 text-uppercase">Totals Purchased</h3>
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
                <div class="col-md-6 text-right">
                    <strong class="text-black">$<?php echo number_format($total, 2); ?></strong>
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
      
    }

  ?>