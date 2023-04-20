
<?php
    
    if(isset($_POST['btnAdd']))
    {
      $category_ID = $_POST['category_ID'];
      $category_name = $_POST['category_name'];
      $category_des = $_POST['category_des'];
      $err="";
      if(trim($category_ID)=="")
      {
        $err .= "<script>alert('Incorrect Category ID');</script>";
      }
      elseif(trim($category_name)=="")
      {
        $err .= "<script>alert('Incorrect Category Name');</script>";
      }
      elseif(($category_des==""))
      {
        $err .= "<script>alert('Incorrect Category Description');</script>";
      }
      if($err!="")
      {
        echo $err;
      }
      else
      {
        $sql="select * from category where category_ID='$category_ID' and category_name='$category_name'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)==0)
        {
          $sqlString = "insert into category(category_ID, category_name, category_des)
          values('$category_ID','$category_name','$category_des')";
          mysqli_query($conn,$sqlString);
          echo '<meta http-equiv="refresh" content="0;URL =?page=cat_manage"';
        }
        else
        {
          echo "<script>alert('Duplicated category ID or name');</script>";
        }
          
      }
  
    }
?>
  <div class="site-wrap" style="min-height: calc(100vh - 392.16px)">
    
    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <p><h2 class="h3 mb-3 text-black">Add category</h2></p>
          </div>
          <div class="col-md-12">

            <form action="#" method="post" enctype="multipart/form-data" role="form">
              
              <div class="p-3 p-lg-5 border">

                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="" class="text-black">Category ID</label>
                    <input type="text" class="form-control text-black" id="" name="category_ID" placeholder="Enter Category ID" value="<?php if(isset($category_ID)) echo $category_ID?>">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="" class="text-black">Category Name</label>
                    <input type="text" class="form-control text-black" id="" name="category_name" placeholder="Enter Category Name" value="<?php if(isset($category_name)) echo $category_name?>">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="" class="text-black">Category Description</label>
                    <textarea type="text" class="form-control text-black" style="height: 200px" row="10"  id="" name="category_des" placeholder="Enter Category Description" value=""><?php if(isset($category_des)) echo $category_des?></textarea>
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
                    <input type="submit" class="btn btn-primary btn-lg btn-block" value="Add Category" name="btnAdd">
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