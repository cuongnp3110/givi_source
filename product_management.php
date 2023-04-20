<?php
  if(isset($_SESSION['admin']) && $_SESSION['admin']==1)
  {
?>
    <div class="site-wrap" style="min-height: calc(100vh - 392.16px)">

    <div class="custom-border-bottom py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="?page=home">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Product Management</strong></div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <form class="col-md-12" method="post">
            <div class="site-blocks-table"> 
              <table class="table table-bordered">
                <thead>
                <p><h2 class="text-black">Product Management</h2></p>

                <div class="row">

                  <div class="col-md-3">
                    <div class="row mb-2">
                      <div class="col-md-6">
                        
                        <div class="">
                          <div class="dropdown mr-1 ml-md-auto">
                            <button type="button" class="btn btn-white btn-sm dropdown-toggle px-4" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <?php if(isset($_GET['id']))
                              {
                                $id= $_GET['id'];
                                $res=mysqli_query($conn,"SELECT category_ID, category_name from category where category_ID='$id'");
                                $row= mysqli_fetch_array($res,MYSQLI_ASSOC);
                                echo $row['category_name'];
                              }else
                              {
                                echo 'Categories';
                              }
                              ?>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                              <?php category_list($conn); ?>
                            </div>
                          </div>
                        </div>

                      </div>
                    </div>
                  </div>
                  <div class="col-md-9 pl-5">
                    <div class="row justify-content-end">
                      <div class="col-md-7">

                        <div class="row">
                          <div class="col-md-6">
                            <input type="button" class="btn btn-primary btn-lg btn-block" onclick="window.location='?page=cat_manage'" value="Category Manage"> 
                          </div>
                          <div class="col-md-6">
                            <input type="button" class="btn btn-primary btn-lg btn-block" onclick="window.location='?page=add'" value="Add product"> 
                          </div>
                        </div>
                        
                      </div>
                    </div>    
                  </div>
                </div>

                  <tr>
                    <th class="product-no" style="padding: 0 3px 0 3px">No</th>
                    <th class="product-thumbnail">Image</th>
                    <th class="product-quantity">ID</th>
                    <th class="product-name">Product</th>
                    <th class="product-quantity">Category</th>
                    <th class="product-quantity">Description</th>
                    <th class="product-price">Price</th>
                    <th colspan="2" class="product-remove">Edit</th>
                  </tr>
                </thead>
                <tbody>

                  <?php
                    if(isset($_GET['function'])=="del")
                    {
                      if(isset($_GET['id']))
                      {
                        $id =$_GET['id'];
                        $sql = "select pro_img from product where pro_ID = '$id'";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        $filepic = $row['pro_img'];
                        unlink("images2/".$filepic);
                        mysqli_query($conn, "delete from product where pro_ID = '$id'");
                        ?>
                        <script>
                          document.getElementById("manage_product").click();
                        </script>
                        <?php
                      }
                    }
                    if(isset($_GET['id']))
                    {
                      $result = mysqli_query($conn, "select product.pro_name, product.pro_img, product.pro_ID, product.pro_des, product.price, category.category_name 
                      from product, category 
                      where product.category_ID = category.category_ID and category.category_ID='$id'");
                    }else{
                      $result = mysqli_query($conn, "select product.pro_name, product.pro_img, product.pro_ID, product.pro_des, product.price, category.category_name 
                      from product, category 
                      where product.category_ID = category.category_ID");
                    }
                      $No=1;
                      while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                  ?>

                  <tr>
                    <td style=""><?php echo $No ?></td>
                    <td class="product-thumbnail">
                      <img src="images2/<?php echo $row['pro_img']; ?>" alt="Image" width="120" height="120">
                    </td>
                    <td class="product-name">
                      <h2 class="h5 text-black"><?php echo $row['pro_ID']; ?></h2>
                    </td>
                    <td><?php echo $row['pro_name']; ?></td>
                    <td><?php echo $row['category_name']; ?></td>
                    <td><?php echo $row['pro_des']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td><a href="?page=update&&id=<?php echo $row['pro_ID']?>" class="btn btn-primary height-auto btn-sm">Update</a></td>
                    <td><a href="?page=pro_manage&&function=del&&id=<?php echo $row['pro_ID']; ?>" 
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

        <div class="row">
          <div class="col-md-6">
            <div class="row mb-5">
              <div class="col-md-6">
              </div>
            </div>
          </div>
          <div class="col-md-6 pl-5">
            <div class="row justify-content-end">
              <div class="col-md-7">

                <div class="row">
                  <div class="col-md-12">
                    <button class="btn btn-primary btn-lg btn-block" onclick="window.location='?page=home'">Back to homepage</button>
                  </div>
                </div>
                <br/>

              </div>
            </div>
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