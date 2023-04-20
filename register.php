


<?php
    
  if(isset($_POST['btnRegister']))
  {
    $us = $_POST['us'];
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];   
    $phone = $_POST['phone'];
    $addr = $_POST['addr'];
    if( $us=="" || $pass1=="" || $pass2=="" || $fname=="" || $lname=="" || $email=="" || $phone=="" || $addr=="")
    {
      echo "<script type='text/javascript'>alert('Invalid input');</script>";
    }
    elseif (strlen($pass1) <= 6 || $pass1 != $pass2 ||strlen($pass1) >= 15)
    {
      echo "<script type='text/javascript'>alert('Incorrect password');</script>";
    }
    else
    {
      include_once("connection.php");
      $pass = md5($pass2);
      $sql = "select * from account where account_ID ='$us' or email ='$email'";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result)==0)
      {
          mysqli_query($conn, "insert into account (account_ID, pass, fname, lname, email, phone, address) 
          VALUES ('$us','$pass','$fname','$lname','$email','$phone','$addr')") or die (mysqli_error($conn));
          echo "<script type='text/javascript'>alert('Register successfully');</script>";
          echo '<meta http-equiv="refresh" content="0;URL =?page=login"';
      }
      else
      {
        echo "<script type='text/javascript'>alert('Account already exist');</script>";
      }
    }
  }
?>
  <div class="site-wrap" style="min-height: calc(100vh - 392.16px)">
  <form method="post">
    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <br/>
            <h2 class="h3 mb-3 text-black">Register</h2>
          </div>
          <div class="col-md-12">
              <div class="p-3 p-lg-5 border">
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="" class="text-black">Username</label>
                    <input type="text" class="form-control text-black" id="" name="us" placeholder="Enter username" value="<?php if(isset($us)) echo $us?>">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="" class="text-black">Password</label>
                    <input type="password" class="form-control text-black" id="" name="pass1" placeholder="Enter password" value="">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="" class="text-black">Confirm password </label>
                    <input type="password" class="form-control text-black" id="" name="pass2" placeholder="Enter confirm password" value="">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-6">
                    <label for="" class="text-black">First Name </label>
                    <input type="text" class="form-control text-black" id="" name="fname" placeholder="Enter first name" value="<?php if(isset($fname)) echo $fname?>">
                  </div>
                  <div class="col-md-6">
                    <label for="" class="text-black">Last Name </label>
                    <input type="text" class="form-control text-black" id="" name="lname" placeholder="Enter last name" value="<?php if(isset($lname)) echo $lname?>">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="" class="text-black">Email </label>
                    <input type="email" class="form-control text-black" id="" name="email" placeholder="Enter email" value="<?php if(isset($email)) echo $email?>">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="" class="text-black">Phone </label>
                    <input type="text" class="form-control text-black" id="" name="phone" placeholder="Enter phone number" value="<?php if(isset($phone)) echo $phone?>">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="" class="text-black">Address</label>
                    <input type="text" class="form-control text-black" id="" name="addr" placeholder="Enter address" value="<?php if(isset($addr)) echo $addr?>">
                  </div>
                </div>

                <div class="form-group row">
                  <!-- <div class="col-md-12">
                    <label for="" class="text-black">Message </label>
                    <textarea name="text" id="c_message" cols="30" rows="7" class="form-control text-black"></textarea>
                  </div> -->
                </div>
                <form method="post">
                <div class="form-group row">
                  <div class="col-lg-12">
                    <input type="submit" class="btn btn-primary btn-lg btn-block" value="Register" name="btnRegister">
                  </div>
                </div>
                </form>
              </div>
            
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>