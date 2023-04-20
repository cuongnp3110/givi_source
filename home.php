
  <div class="site-wrap" style="min-height: calc(100vh - 392.16px)">
    <div class="site-blocks-cover" data-aos="fade">
      <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 text-center">
                <div class="featured-hero-product w-100">
                <h1 class="mb-2">CBP02</h1>
                <h2>Softbags</h2>
                <div class="price mt-3 mb-5"><strong>$120</strong> <del>$135</del></div>
                <p><a href="?page=product&&id=pd1s" class="btn btn-primary rounded-0">Shop Now</a></p>
                </div>  
            </div>
            <div class="col-lg-7 align-self-end text-center text-lg-right">
            <img src="images/Softbags/CBP02.png" alt="Image" width="1000" class="img-fluid img-1">
            </div>
          </div>
        </div>
      </div>
    
    <div class="products-wrap border-top-0">
      <div class="container-fluid">
        <div class="row no-gutters products">

          <?php
            $no=0;
            $result = mysqli_query($conn, "select product.pro_ID, product.pro_name, product.pro_img, product.price, category.category_name 
            from product, category 
            where product.category_ID = category.category_ID order by product.pro_name desc");
            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
              if($no<6)
              {
          ?>

          <div class="col-6 col-md-6 col-lg-4">
            <a href="?page=product&&id=<?php echo $row['pro_ID'] ?>" class="item">
              <img src="images2/<?php echo $row['pro_img'];?>" alt="Image" class="img-fluid" width="450" height="450">
              <div class="item-info">
                <h3><?php echo $row['pro_name'];?></h3>
                <span class="collection d-block"><?php echo $row['category_name'];?></span>
                <strong class="price">$<?php echo $row['price'];?></strong>
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
    
    <div class="site-section custom-border-bottom" data-aos="fade">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div class="block-16">
              <figure>
                <img src="images/new/hero_3.jpg" alt="Image placeholder" class="img-fluid rounded">
                <a href="images/giviTrekkerAlaska.mp4" class="play-button popup-vimeo"><span class="icon-play"></span></a>
              </figure>
            </div>
          </div>
          <div class="col-md-4">
            <div class="site-section-heading pt-3 mb-4">
              <h1 class="text-black">New Arrival</h1>
            </div>
            <div class="text1">
            <h2 class="text-black">TREKKER ALASKA</h2>
            <h3 class="text-black">Case</h3>
            <p>The new aluminium panniers TREKKER ALASKA with Monokey System - Compatibles with all PL/PLR and PLO/PLOR frames by GIVI</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="title-section text-center col-12">
            <h2 class="text-uppercase">Best seller</h2>
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

    <br/>

    <div class="site-section site-blocks-1 border-0" data-aos="fade">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="">
            <div class="icon mr-4 align-self-start">
              <span class="icon-truck"></span>
            </div>
            <div class="text">
              <h2>Free Shipping</h2>
              <p>With the logistics system stretching from north to south, givi has the ability to deliver extremely fast and completely free cost.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="100">
            <div class="icon mr-4 align-self-start">
              <span class="icon-refresh2"></span>
            </div>
            <div class="text">
              <h2>Free Returns</h2>
              <p>Special return policy. When customers have dissatisfaction with the product, givi will support refund.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="200">
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

  <br/><br/>
