<?php
  if(isset($_GET['id']))
  {
    $id = $_GET['id'];
    //$_SESSION['back_id'] = $_GET['id'];
    $sql = "select product.pro_name, product.pro_img, product.pro_des, product.price, category.category_name 
    from product, category 
    where product.category_ID = category.category_ID and '$id' = product.pro_ID";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    if(isset($_POST['btnAddToCart']))
    {
      
      $pro_name = $row['pro_name'];
      $price = $row['price'];
      $pro_img = $row['pro_img'];
      $quantity = $_POST['quantity'];

      if(isset($_SESSION["shopping_cart"]))
      {
        $item_array_id = array_column($_SESSION["shopping_cart"], "pro_id");
        if(!in_array($_GET["id"], $item_array_id))
        {
          $count = count($_SESSION["shopping_cart"]);
          $item_array = array(
            'pro_id'		=>	$_GET["id"],
            'pro_name'	=>	$pro_name,
            'price'		  =>  $price,
            'pro_img'	  =>  $pro_img,
            'quantity'  =>  $quantity
          );
          $_SESSION["shopping_cart"][$count] = $item_array;
          echo "<script type='text/javascript'>alert('$pro_name has added to card');</script>";
        }
        else
        {
          echo '<script>alert("Item Already Added");</script>';
        }
      }
      else
      {
        $item_array = array(
          'pro_id'		=>	$_GET["id"],
          'pro_name'	=>	$pro_name,
          'price'		  =>  $price,
          'pro_img'	  =>  $pro_img,
          'quantity'  =>  $quantity
        );
        $_SESSION["shopping_cart"][0] = $item_array;
        echo "<script type='text/javascript'>alert('$pro_name added to card');</script>";
      }
    }

    
?>
    <div class="custom-border-bottom py-3" >
      <div class="container">
        <div class="row">
        <div class="col-md-12 mb-0"><a href="?page=home">Home</a> <span class="mx-2 mb-0">/</span> <a href="?page=shop">Shop</a> <span class="mx-2 mb-0">/</span> <strong class="text-black"><?php echo $row['pro_name'] ?></strong></div>
        </div>
      </div>
    </div>
  
  <div class="site-wrap" data-aos="fade" style="min-height: calc(100vh - 392.16px)">
      
    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="border">
              <img src="images2/<?php echo $row['pro_img'] ?>" alt="Image" class="img-fluid">
            </div>
          </div>
          <div class="col-md-6">
            <h2 class="text-black" name="pro_name"><?php echo $row['pro_name']?></h2>
            <p ><h2 class="text-black" name="category_name"><?php echo $row['category_name'] ?></h2></p>
            <p class="text-black"><?php echo $row['pro_des'] ?></p>
            <p><strong class="text-primary h4" name="price">$<?php echo $row['price'] ?></strong></p>
            <?php
              if((isset($_SESSION['us']) && $_SESSION['us'] != "")&& $_SESSION['admin']==0 ) {
                
            ?>
            <!-- <div class="mb-1 d-flex">
              <label for="option-sm" class="d-flex mr-3 mb-3">
                <span class="d-inline-block mr-2" style="top:-2px; position: relative;"><input type="radio" id="option-sm" name="shop-sizes"></span> <span class="d-inline-block text-black">Small</span>
              </label>
              <label for="option-md" class="d-flex mr-3 mb-3">
                <span class="d-inline-block mr-2" style="top:-2px; position: relative;"><input type="radio" id="option-md" name="shop-sizes"></span> <span class="d-inline-block text-black">Medium</span>
              </label>
              <label for="option-lg" class="d-flex mr-3 mb-3">
                <span class="d-inline-block mr-2" style="top:-2px; position: relative;"><input type="radio" id="option-lg" name="shop-sizes"></span> <span class="d-inline-block text-black">Large</span>
              </label>
              <label for="option-xl" class="d-flex mr-3 mb-3">
                <span class="d-inline-block mr-2" style="top:-2px; position: relative;"><input type="radio" id="option-xl" name="shop-sizes"></span> <span class="d-inline-block text-black"> Extra Large</span>
              </label>
            </div> -->
            <form action="" method="post">
            <div class="mb-5">
              <div class="input-group mb-3" style="max-width: 120px;">
                <div class="input-group-prepend">
                  <input class="btn btn-outline-primary js-btn-minus" type="button" value="&minus;" name="addon1">
                </div>
              <input type="text" class="form-control text-center" name="quantity" value="1" placeholder="" aria-label="1" aria-describedby="button-addon1">
                <div class="input-group-append">
                  <input class="btn btn-outline-primary js-btn-plus" type="button" value="&plus;" name="addon-1">
                </div>
              </div>
            </div>
            
            
              <input type="submit" class="btn btn-sm height-auto px-4 py-3 btn-primary" value="Add To Cart" name="btnAddToCart">
            </form>

            <?php
              }
            ?>

          </div>
        </div>
      </div>
    </div>


    <div class="site-section" data-aos="" >
      <div class="container">
        <div class="row">
          <div class="title-section text-center col-12">
            <h2 class="text-uppercase">More Products</h2>
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
    
    <div class="site-section site-blocks-1 border-0" data-aos="fade">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-3 pl-4" data-aos="fade-up" data-aos-delay="">
            <div class="icon mr-4 align-self-start">
              <span class="icon-truck"></span>
            </div>
            <div class="text">
              <h2>Free Shipping</h2>
              <p>With the logistics system stretching from north to south, givi has the ability to deliver extremely fast and completely free cost.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-3 pl-4" data-aos="fade-up" data-aos-delay="100">
            <div class="icon mr-4 align-self-start">
              <span class="icon-refresh2"></span>
            </div>
            <div class="text">
              <h2>Free Returns</h2>
              <p>Special return policy. When customers have dissatisfaction with the product, givi will support refund.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-3 pl-4" data-aos="fade-up" data-aos-delay="200">
            <div class="icon mr-4 align-self-start">
              <span class="icon-help"></span>
            </div>
            <div class="text">
              <h2>Customer Support</h2>
              <p>Customer care system with fast response speed, branch expansion nationwide.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    
  </div>

  <?php

  ?>

  <?php
  }
  ?>