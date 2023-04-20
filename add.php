
<?php
    
    if(isset($_POST['btnAdd']))
    {
      $pro_ID = $_POST["pro_ID"];
      $pro_name = $_POST["pro_name"];
      $category_ID = $_POST["category_ID"];
      $pro_img = $_FILES["pro_img"];
      $price = $_POST["price"];
      $quantity= $_POST['quantity'];
      $pro_des = $_POST['pro_des'];
      $err="";
      if(trim($pro_ID)=="")
      {
        $err .= "Invalid Product ID - ";
      }
      if(trim($pro_name)=="")
      {
        $err .= "Invalid Product Name - ";
      }
      if(($category_ID==""))
      {
        $err .= "Invalid Category ID - ";
      }
      if(!is_numeric($price))
      {
        $err .= "Invalid price - ";
      }
      if(!is_numeric($quantity))
      {
        $err .= "Invalid quantity";
      }
      if($err!="")
      {
        echo "<script type='text/javascript'>alert('$err');</script>";
      }
      else
      {
        if($pro_img['type']=="image/jpg" || $pro_img['type']=="image/jpeg"|| $pro_img['type']=="image/png" || $pro_img['type']=="image/gif")
        {
          if($pro_img['size']<=614400)
          {
            $sql="select * from Product where pro_ID='$pro_ID' and pro_name='$pro_name'";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result)==0)
            {
              copy($pro_img['tmp_name'], "images2/".$pro_img['name']);
              $filepic = $pro_img['name'];
              $sqlString = "insert into product(pro_ID, pro_name, category_ID, pro_img, price, quantity, pro_des)
              values('$pro_ID','$pro_name','$category_ID','$filepic',$price, $quantity, '$pro_des')";
              mysqli_query($conn,$sqlString);
              echo '<meta http-equiv="refresh" content="0;URL =?page=pro_manage"';

            }
            else
            {
              echo "<script type='text/javascript'>alert('Duplicated ID or name !');</script>";
            }
          }
          else
          {
            echo "<script type='text/javascript'>alert('Image too large !');</script>";
          }
        }
        else
        {
          echo "<script type='text/javascript'>alert('Image not correct format !');</script>";
        }
      }
  
    }
?>
  <div class="site-wrap" style="min-height: calc(100vh - 392.16px)">

  <div class="custom-border-bottom py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="?page=home">Home</a> <span class="mx-2 mb-0">/</span> <a href="?page=pro_manage">Product Management</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Add Product</strong></div>
        </div>
      </div>
    </div>
    
    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <p><h2 class="h3 mb-3 text-black">Add product</h2></p>
          </div>
          <div class="col-md-12">

            <form action="#" method="post" enctype="multipart/form-data" role="form">
              
              <div class="p-3 p-lg-5 border">

                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="" class="text-black">Product ID</label>
                    <input type="text" class="form-control text-black" id="" name="pro_ID" placeholder="Enter product ID" value="<?php if(isset($pro_ID)) echo $pro_ID?>">
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="" class="text-black">Product Name</label>
                    <input type="text" class="form-control text-black" id="" name="pro_name" placeholder="Enter product name" value="<?php if(isset($pro_name)) echo $pro_name?>">
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="" class="text-black">Category Name</label>
                    <select name="category_ID" class="form-control text-black">
                      <option  value="0">Choose category</option>
                      <?php category_list2($conn) ?>
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="" class="text-black">Product Image</label>
                    <input type="file" class="form-control text-black" id="" name="pro_img" value="<?php if(isset($pro_img)) echo $pro_img?>">
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="" class="text-black">Price</label>
                    <input type="text" class="form-control text-black" id="" name="price" placeholder="Enter price" value="<?php if(isset($price)) echo $price?>">
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="" class="text-black">Quantity</label>
                    <input type="number" class="form-control text-black" id="" min="1" name="quantity" placeholder="Enter price" value="<?php if(isset($quantity)) echo $quantity?>">
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="" class="text-black">Product Description</label>
                    <textarea class="col-md-12 form-control text-black " name="pro_des" style="height: 200px" row="10" placeholder="Enter product description"><?php if(isset($pro_des)) echo $pro_des?></textarea>
                  </div>
                </div>
                

                <div class="form-group row">
                  <!-- <div class="col-md-12">
                    <label for="" class="text-black">Message </label>
                    <textarea name="text" id="c_message" cols="30" rows="7" class="form-control text-black"></textarea>
                  </div> -->
                </div>
                <div class="form-group row">
                  <div>
                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                  </div>
                  <div class="col-md-4">
                    <input type="submit" class="btn btn-primary btn-lg btn-block" value="Add Product" name="btnAdd">
                  </div>
                  <div><a>&nbsp;</a></div>
                  <div class="col-md-4">
                    <input type="button" class="btn btn-primary btn-lg btn-block" onclick="window.location='?page=pro_manage'" value="Ignore" name="btnIgnore">
                  </div>
                  <div>
                  </div>
                </div>
              </div>
            </form>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>