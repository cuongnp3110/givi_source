<?php
  if(isset($_SESSION['admin']) && $_SESSION['admin']==1)
  {
?>
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
            <h2 class="h3 mb-3 text-black">Accounts</h2>
          </div>
          <form class="col-md-12" method="post">
            <div class="site-blocks-table">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th class="product-no" style="padding: 0 5px 0 5px">No.</th>
                    <th class="product-name">ID</th>
                    <th class="product-price">Name</th>
                    <th class="product-total">Email</th>
                    <th class="product-total">Total Payment</th>
                  </tr>
                </thead>
                <tbody>

                <?php 
                  $no=1;
                  $result = mysqli_query($conn, "select * from account where state = 0");
                  while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    $result2 = mysqli_query($conn, "select SUM(pay) as pay from orders where account_ID = '".$row['account_ID']."'");
                    $row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)
                ?>
                
                <tr>
                  <td><?php echo $no?></td>
                  <td><?php echo $row["account_ID"]?></td>
                  <td><?php echo $row["fname"].$row["lname"]?></td>
                  <td><?php echo $row["email"]?></td>
                  <td><?php echo empty($row2["pay"])? 0 : $row2["pay"]?></td>

                </tr>

                <?php $no++; } ?>


                </tbody>
              </table>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>

  <?php
  }
  else
  {
    echo "<script type='text/javascript'>alert('You are not admin');</script>";
    echo '<meta http-equiv="refresh" content="0;URL =index.php"';
  }
  
?>