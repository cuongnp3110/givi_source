<?php
  if(isset($_SESSION['admin']) && $_SESSION['admin']==1)
  {
?>
    <div class="site-wrap" style="min-height: calc(100vh - 392.16px)">
    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <form class="col-md-12" method="post">
            <div class="site-blocks-table"> 
              <table class="table table-bordered">
                <thead>
                <p><h2 class="text-black">Category Management</h2></p>

                <div class="row">

                  <div class="col-md-3"></div>
                  
                  <div class="col-md-9 pl-5">
                    <div class="row justify-content-end">
                      <div class="col-md-7">

                        <div class="row">
                          <div class="col-md-6 mb-2">
                            <input type="button" class="btn btn-primary btn-lg btn-block" onclick="window.location='?page=pro_manage'" value="Product Manage"> 
                          </div>
                          <div class="col-md-6 mb-2">
                            <input type="button" class="btn btn-primary btn-lg btn-block" onclick="window.location='?page=category_add'" value="Add category"> 
                          </div>
                        </div>
                        
                      </div>
                    </div>    
                  </div>
                </div>

                  <tr>
                    <th class="product-no">No.</th>
                    <th class="product-thumbnail">Category ID</th>
                    <th class="product-quantity">Category Name</th>
                    <th class="product-name">Category Description</th>
                    <th class="product-remove">Edit</th>
                  </tr>
                </thead>
                <tbody>

                  <?php
                    if(isset($_GET['function'])=="del")
                    {
                      if(isset($_GET['id']))
                      {
                        $id =$_GET['id'];
                        $result = mysqli_query($conn, "select category_ID, category_name, category_des from category");
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        mysqli_query($conn, "delete from category where category_ID = '$id'");
                      }
                    }
                      $No=1;
                      $result = mysqli_query($conn, "select category_ID, category_name, category_des from category");
                      while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                  ?>

                  <tr>
                    <td><?php echo $No ?></td>
                    <td><?php echo $row['category_ID']; ?></td>
                    <td><?php echo $row['category_name']; ?></td>
                    <td><?php echo $row['category_des']; ?></td>
                    
                    <td><a href="?page=cat_manage&&function=del&&id=<?php echo $row['category_ID']; ?>" 
                    onclick="return delConfirm()" class="btn btn-primary height-auto btn-sm">Delete</a></td>
                  </tr>

                  <?php
                      $No++;
                    }
                  ?>
                  
                </tbody>
              </table>
            </div>
          </form>
        </div>
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