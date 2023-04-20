
  <div class="site-wrap" style="min-height: calc(100vh - 392.16px)">
  <?php
  if(isset($_GET['id']))
  {
    $id= $_GET['id'];
    $res=mysqli_query($conn,"SELECT category_ID, category_name from category where category_ID='$id'");
    $row= mysqli_fetch_array($res,MYSQLI_ASSOC);
  ?>
    <div class="custom-border-bottom py-3">
      <div class="container">
        <div class="row">
        <div class="col-md-12 mb-0"><a href="?page=home">Home</a> <span class="mx-2 mb-0">/</span> <a href="?page=shop">Shop</a> <span class="mx-2 mb-0">/</span> <strong class="text-black"><?php echo $row['category_name'] ?></strong></div>
        </div>
      </div>
    </div>
  <?php
  }
  else
  {
  ?>
    <div class="custom-border-bottom py-3">
      <div class="container">
        <div class="row">
        <div class="col-md-12 mb-0"><a href="?page=home">Home</a> <span class="mx-2 mb-0">/</span>  <strong class="text-black">Shop</strong></div>
        </div>
      </div>
    </div>
    <?php
  }
  ?>

    <div class="site-section">
      <div class="container">

        <div class="row mb-5">
          <div class="col-lg-9 order-2 order-lg-1">

            <div class="row align">
              <div class="col-md-12 mb-4">
                <div class="float-md-left"></div>
                <div class="d-flex">

                  <div class="dropdown ">
                    <button type="button" class="btn btn-white btn-sm dropdown-toggle px-4" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php 
                    if(isset($_GET['id']))
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
                      <?php category_list4($conn); ?>
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>
            <div class="row mb-5">
              <div class="products-wrap border-top-0">
                <div class="container-fluid">
                  <div class="row no-gutters products">

                    <?php
                    if(isset($_GET['id']))
                    {
                      $id = $_GET['id'];
                      $result = mysqli_query($conn, "select product.pro_ID, product.pro_name, product.pro_img, product.price, category.category_name 
                      from product, category 
                      where product.category_ID = category.category_ID and '$id' = category.category_ID");
                    } else {
                      $result = mysqli_query($conn, "select product.pro_ID, product.pro_name, product.pro_img, product.price, category.category_name 
                      from product, category 
                      where product.category_ID = category.category_ID ");
                    }
                      while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    ?>
                    
                    <div class="col-6 col-md-6 col-lg-6 border-top">
                      <a href="?page=product&&id=<?php echo $row['pro_ID'] ?>" class="item">
                        <img src="images2/<?php echo $row['pro_img'];?>" alt="Image" class="img-fluid" width="411" height="411">
                        <div class="item-info">
                          <h3><?php echo $row['pro_name'];?></h3>
                          <span class="collection d-block"><?php echo $row['category_name'];?></span>
                          <strong class="price">$<?php echo $row['price'];?></strong>
                        </div>
                      </a>
                    </div>

                    <?php
                      }
                    ?>

                  </div>
                </div>
              </div>

            </div>
            <!-- <div class="row">
              <div class="col-md-12 text-center">
                <div class="site-block-27">
                  <ul>
                    <li><a href="#">&lt;</a></li>
                    <li class="active"><span>1</span></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">&gt;</a></li>
                  </ul>
                </div>
              </div>
            </div> -->
          </div>

          <div class="col-lg-3 order-1 order-lg-2 mb-5 mb-lg-0">
            <div class="border p-1 mb-4">
              
              <img src="images/ads.jpg" alt="Image placeholder" class="img-fluid rounded">

            </div>

            <div class="border p-1 mb-4">
            <img src="images/ads2.jpg" alt="Image placeholder" class="img-fluid rounded">
            </div>
          </div>
        </div>

      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="title-section text-center col-12">
            <h2 class="text-uppercase">The Collections</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 block-3 products-wrap">
            <div class="nonloop-block-3 owl-carousel">

            <?php
            $no=0;
            $result = mysqli_query($conn, "select product.pro_ID, product.pro_name, product.pro_img, product.price, category.category_name 
            from product, category 
            where product.category_ID = category.category_ID order by product.pro_name desc");
            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
              if($no<12)
              {
            ?>

            <div class="product">
              <a href="?page=product&&id=<?php echo $row['pro_ID'] ?>" class="item">
                <img src="images2/<?php echo $row['pro_img'] ?>" alt="Image" class="img-fluid">
                <div class="item-info">
                  <h3><?php echo $row['pro_name'] ?></h3>
                  <span class="collection d-block"><?php echo $row['category_name'] ?></span>
                  <strong class="price">$<?php echo $row['price'] ?></strong>
                </div>
              </a>
            </div>

            <?php
              }
              $no++;
              }
            ?>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>