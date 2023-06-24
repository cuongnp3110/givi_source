<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Givi</title>
    <link rel="shortcut icon" href="images/Logo/Givi_Logo.jpg">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,700" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/style.css">
    
  </head>
  
  <?php
    session_start();
    include_once("connection.php");

    if(isset($_SESSION['us']))
    {
    $account_ID = $_SESSION['us'];
    $sqlString = "select account_ID, fname, lname, user_img, email, phone, address from account where account_ID='$account_ID'";
    
		$result = mysqli_query($conn, $sqlString);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    }

    function category_list ($conn)
    {
      $sql = "select category_ID, category_name from category";
      $result = mysqli_query($conn, $sql);
      echo '<a class="dropdown-item" href="?page=pro_manage" name="Categories">All Products</a>';
      while ($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
      {
        echo '<a class="dropdown-item" href="?page=pro_manage&&id='.$row['category_ID'].'" name="'.$row["category_name"].'">'.$row["category_name"].'</a>';
      }
    }
    function category_list2 ($conn)
    {
      $sql = "select category_name, category_ID from category";
      $result = mysqli_query($conn, $sql);
      while ($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
      {
        echo '<option value="'.$row["category_ID"].'"><a>'.$row["category_name"].'</a></option>';
      }
    }
    function category_list3 ($conn, $selectedValue)
    {
      $sql = "select category_name, category_ID from category";
      $result = mysqli_query($conn, $sql);
      while ($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
      {
        if ($row['category_ID']==$selectedValue)
        {
          echo '<option value="'.$row["category_ID"].'" selected>'.$row["category_name"].'</option>';
        }
        else
        {
        echo '<option value="'.$row["category_ID"].'">'.$row["category_name"].'</option>';
        }
      }
    }
    function category_list4 ($conn)
    {
      $sql = "select category_ID, category_name from category";
      $result = mysqli_query($conn, $sql);
      echo '<a class="dropdown-item" href="?page=shop" name="Categories">All Products</a>';
      while ($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
      {
        echo '<a class="dropdown-item" href="?page=shop&&id='.$row['category_ID'].'" name="'.$row["category_name"].'">'.$row["category_name"].'</a>';
      }
    }
    function category_list5 ($conn)
    {
      $sql = "select category_ID, category_name from category";
      $result = mysqli_query($conn, $sql);
      while ($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
      {
        $cat_id = $row['category_ID'];
        $s = "select pro_ID from product where category_ID = '$cat_id'";
        $res = mysqli_query($conn, $s);
        $r = mysqli_num_rows($res);
        echo '<li class="mb-1"><a href="#" class="d-flex"><span>'.$row['category_name'].'</span><span class="text-black ml-auto">('.$r.')</span></a></li>';
      }
    }
  ?>
  <body>
  
  <div class="site-wrap" style="min-height: calc(100vh - 392.16px)">

    <div class="site-navbar bg-white">
      <div class="search-wrap">
        <div class="container">
          <a href="?page=home" class="search-close js-search-close"><span class="icon-close2"></span></a>
          <form action="" method="post">
            <input type="text" class="form-control" placeholder="Enter search...">
          </form>  
        </div>
      </div>
      <div class="container">
        
        <div class="d-flex align-items-center justify-content-between">
          <div class="logo">
            <div class="site-logo">
              <a href="?page=home" class="js-logo-clone"><img src="images/Logo/Givi_h.png" class="" width="75" height="75"></a>
            </div>
          </div>

          <?php
            if(isset($_SESSION['us']) && $_SESSION['us'] != "") {
          ?>

          <div class="main-nav d-none d-lg-block">
            <nav class="site-navigation text-right text-md-center" role="navigation">
              <ul class="site-menu js-clone-nav d-none d-lg-block">
                <li><a href="?page=home">Home</a></li>
                <li><a href="?page=user"><span class="fa fa-user-circle-o"></span> Hi, <?php echo $_SESSION['us']; ?>!</a></li>
                <li class="has-children">
                  <a href="?page=shop">Category</a>
                  <ul class="dropdown">
                    <?php category_list4($conn) ?>
                  </ul>
                </li>

                <?php
                  if (isset($_SESSION['admin']) && $_SESSION['admin']==1){
                ?>
                
                <li class="has-children">
                  <a href="">Manager page</a>
                  <ul class="dropdown">
                    <a class="dropdown-item" href="?page=pro_manage" name="Categories">Storage</a>
                    <a class="dropdown-item" href="?page=orders" name="Categories">Orders</a>
                    <a class="dropdown-item" href="?page=feedback_list" name="Categories">Feedbacks</a>
                    <a class="dropdown-item" href="?page=accounts" name="Categories">Accounts</a>
                  </ul>
                </li>

                
                </ul>
            </nav>
          </div>

          <div class="icons">
          
            <a href="#" class="icons-btn d-inline-block js-search-open"><span class="fa fa-search"></span></a>
            <a href="?page=logout" class="icons-btn d-inline-block" name="logout"><span class="fa fa-sign-out"></span></a>
            <a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span class="icon-menu"></span></a>
          </div>

                <?php
                  }
                else
                  {
                ?>
                <li><a href="?page=user_order">My Orders</a></li>
                
                <li><a href="?page=feedback">Feedback</a></li>
                </ul>
            </nav>
          </div>

          <div class="icons">
            <a href="#" class="icons-btn d-inline-block js-search-open"><span class="fa fa-search"></span></a>
            <a href="?page=cart" class="icons-btn d-inline-block" name="logout"><span class="fa fa-shopping-bag"></span></a>
            <a href="?page=logout" class="icons-btn d-inline-block" name="logout"><span class="fa fa-sign-out"></span></a>
            <a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span class="icon-menu"></span></a>
          </div>

                <?php
                  }
                ?>

          <?php
            }
            else
            {
          ?>

          <div class="main-nav d-none d-lg-block">
            <nav class="site-navigation text-right text-md-center" role="navigation">
              <ul class="site-menu js-clone-nav d-none d-lg-block">
                <li><a href="?page=home">Home</a></li>
                <li class="has-children">
                  <a href="?page=shop">Category</a>
                  <ul class="dropdown">
                  <?php category_list4($conn) ?>
                  </ul>
                </li>
                
                <li><a href="?page=contact">Contact</a></li>
                <li><a href="?page=about">About Us</a></li>
              </ul>
            </nav>
          </div>

          <div class="icons">
            <a href="#" class="icons-btn d-inline-block js-search-open"><span class="fa fa-search"></span></a>
            
            <a href="?page=login" class="icons-btn d-inline-block"><span class="fa fa-user-circle-o"></span></a>
            <a href="?page=register" class="icons-btn d-inline-block"><span class="fa fa-user-plus"></span></a>
            <a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span class="icon-menu"></span></a>
          </div>

          <?php
            }
          ?>

        </div>
      </div>
    </div>

    <?php
        if(isset($_GET['page']))
        {
            $page = $_GET['page'];
            if($page=="cart")
            {
              include_once("cart.php");
            }
            elseif ($page=="contact")
            {
              include_once("contact.php");
            }
            elseif ($page=="login")
            {
              include_once("login.php");
            }
            elseif ($page=="shop")
            {
              include_once("shop.php");
            }
            elseif ($page=="about")
            {
              include_once("about.php");
            }
            elseif ($page=="home")
            {
              include_once("home.php");
            }
            elseif ($page=="checkout")
            {
              include_once("checkout.php");
            }
            elseif ($page=="register")
            {
              include_once("register.php");
            }
            elseif ($page=="product")
            {
              include_once("product.php");
            }
            elseif ($page=="logout")
            {
              include_once("logout.php");
            }
            elseif($page=="pro_manage")
            {
              include_once("product_management.php");
            }
            elseif($page=="add")
            {
              include_once("add.php");
            }
            elseif($page=="update")
            {
              include_once("update.php");
            }
            elseif($page=="product")
            {
              include_once("product.php");
            }
            elseif($page=="feedback")
            {
              include_once("feedback.php");
            }
            elseif($page=="cat_manage")
            {
              include_once("category_management.php");
            }
            elseif($page=="category_add")
            {
              include_once("category_add.php");
            }
            elseif($page=="user")
            {
              include_once("user_profile.php");
            }
            elseif($page=="user_update")
            {
              include_once("user_update.php");
            }
            elseif($page=="change_pass")
            {
              include_once('change_pass.php');
            }
            elseif($page=="feedback_list")
            {
              include_once('feedback_list.php');
            }
            elseif($page=="accounts")
            {
              include_once('accounts.php');
            }
            elseif($page=="orders")
            {
              include_once('orders.php');
            }
            elseif($page=="user_order")
            {
              include_once('user_order.php');
            }
        } 
        else
        include("home.php");
    ?>
    <footer class="site-footer custom-border-top" style="">
      <div class="container">
        <div class="row">

          <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
            <div class="block-7">
              <h3 class="footer-heading mb-4">About Us</h3>
              <p style="color: white;">Givi’s history began in 1978, thanks to the initiative of his founder, Mr. Giuseppe Visenzi.</p>
            </div>
          </div>
          
          <div class="col-lg-4 ml-auto mb-1 mb-lg-0">
            <div class="row">
              <div class="col-md-12">
                <h3 class="footer-heading mb-4">Quick Links</h3>
              </div>

              <?php
                if(isset($_SESSION['us']) && $_SESSION['us'] != "") {
              ?>

              <div class="col-md-6 col-lg-6">
                <ul class="list-unstyled">
                  <li><a href="?page=home">Home</a></li>
                  <li><a href="#">News</a></li>
                  <li><a href="?page=shop">Categories</a></li>
                </ul>
              </div>
              
              <div class="col-md-6 col-lg-6">
                <ul class="list-unstyled">
                  <li><a href="?page=cart">Cart</a></li>
                  <li><a href="?page=about">About us</a></li>
                  <li><a href="?page=contact">Contact</a></li>
                  <li><a href="?page=about">About us</a></li>

                  <?php
                    if (!isset($_SESSION['admin']) || $_SESSION['admin']!=1){
                  ?>
                    <li><a href="?page=feedback">Feedback</a></li>
                  <?php
                    }
                  ?>
                  
                </ul>
              </div>

              <?php
                }
                else
                {
              ?>

              <div class="col-md-6 col-lg-6">
                <ul class="list-unstyled">
                  <li><a href="?page=home">Home</a></li>
                  <li><a href="#">News</a></li>
                  <li><a href="?page=shop">Categories</a></li>
                </ul>
              </div>
              
              <div class="col-md-6 col-lg-6">
                <ul class="list-unstyled">
                  <li><a href="?page=contact">Contact</a></li>
                  <li><a href="?page=about">About us</a></li>
                  <li><a href="?page=login">Login</a></li>
                  <li><a href="?page=register">Register</a></li>
                </ul>
              </div>

              <?php
                }
              ?>
              
            </div>
          </div>
          
          <div class="col-md-6 col-lg-4">
            <div class="block-5 mb-5">
              <h3 class="footer-heading mb-4">Contact Info</h3>
              <ul class="list-unstyled">
                <li class="address" style="color: white;">169A Ngo Gia Tu, ward 2, district 10  - HCMC</li>
                <li class="phone"><a href="tel://0916511599">+84 916 511 599</a></li>
                <li class="email"style="color: white;" ><a href="">cuongnp3110@gmail.com</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="row pt-1 mt-1 text-center">
          <div class="col-md-12">
            <hr>
            <p style="color: white;">
            This web is made with &nbsp;<i class="icon-heart" aria-hidden="true" style="color: red;"></i>&nbsp; by PC</a>
            </p>
          </div>
        </div>
      </div>
    </footer>
  </div>
  <script language="javascript">
    function delConfirm()
    {
      if(confirm("Are you sure to delete!?!?!"))
      {
        return true;
      }
      else
      {
        return false;
      }
    }
    function goBack() {
      history.back();
    }
  </script>
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>