<?php
  if(isset($_SESSION['admin']) && $_SESSION['admin']==1)
  {
?>
<script language="javascript">
  function goBack() {
    window.location="index.php?page=product";
  }
</script>

  <div class="site-wrap" style="min-height: calc(100vh - 392.16px)">
    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
        <div class="col-md-12">
            <h2 class="h3 mb-3 text-black">Feedback List</h2>
          </div>
          <form class="col-md-12" method="post">
            <div class="site-blocks-table">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th class="product-no" style="padding: 0 5px 0 5px">No</th>
                    <th class="product-name">Account</th>
                    <th class="product-price">Email</th>
                    <th class="product-quantity">Feedback</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $no=1;
                    $result = mysqli_query($conn, "select * from feedback");
                    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                  ?>
                  <tr>
                    <td><?php echo $no?></td>
                    <td><?php echo $row["account_ID"]?></td>
                    <td><?php echo $row["email"]?></td>
                    <td><?php echo $row["feedback_info"]?></td>
                  </tr>

                  <?php $no++; }?>

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