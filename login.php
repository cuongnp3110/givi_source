
<?php
    
    if(isset($_POST['btnLogin']))
    {
        $us = $_POST['us'];
        $pass1 = $_POST['pass1'];

        if( $us=="" || $pass1=="")
        {
          echo "<script type='text/javascript'>alert('Incorrect ID or Password');</script>";
        }
        else
        {
          $pass = md5($pass1);
          $sql = "select * from account where account_ID ='$us' and pass ='$pass'";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
          if (mysqli_num_rows($result)==1)
          {
            $_SESSION['us']=$us;
            $_SESSION['admin']=$row['state'];
            $_SESSION['email']=$row['email'];
            
            echo '<meta http-equiv="refresh" content="0;URL =index.php"';
          }
          else
          {
            echo "<script type='text/javascript'>alert('Incorrect ID or password');</script>";
          }
        }
    }
?>
  <div class="site-wrap" style="min-height: calc(100vh - 392.16px)">

    <div class="">
      <br/>
    
      <div class="container">
      <div class="row mb-3">
          <div class="col-md-12">
            <div class="border p-4 rounded" role="alert">
              Not registered yet? <a href="?page=register">Click here</a> to register
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-12">
            <h2 class="h3 mb-3 text-black">Login</h2>
          </div>
          <div class="col-md-12">

            <form action="#" method="post">
              
              <div class="p-3 p-lg-5 border">
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="" class="text-black">Username</label>
                    <input type="text" class="form-control text-black" id="" name="us" placeholder="Enter username" value="">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="" class="text-black">Password</label>
                    <input type="password" class="form-control text-black" id="" name="pass1" placeholder="Enter password" value="">
                  </div>
                </div>
                <div class="form-group row">
                  <!-- <div class="col-md-12">
                    <label for="" class="text-black">Message </label>
                    <textarea name="text" id="c_message" cols="30" rows="7" class="form-control text-black"></textarea>
                  </div> -->
                </div>
                <div class="form-group row">
                  <div class="col-lg-12">
                    <input type="submit" class="btn btn-primary btn-lg btn-block" value="Login" name="btnLogin">
                  </div>
                </div>
              </div>
            </form>
          </div>
          </div>
        </div>
      </div>

      <br/>
      
    </div>
  </div>