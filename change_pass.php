<?php
  if(isset($_SESSION['us']) && $_SESSION['us'] != "") 
  {
    $account_ID = $_SESSION['us'];
    $sqlString = "select account_ID, fname, lname, email, phone, address from account where account_ID='$account_ID'";
    
		$result = mysqli_query($conn, $sqlString);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
?>

  <div class="site-wrap" style="min-height: calc(100vh - 392.16px)">

  <div class="custom-border-bottom py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="?page=home">Home</a> <span class="mx-2 mb-0">/</span> <a href="?page=user">User Profile</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Update Password</strong></div>
        </div>
      </div>
    </div>
    
    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <p><h2 class="h3 mb-3 text-black">Update <?php echo $account_ID ?> password</h2></p>
          </div>
          <div class="col-md-12">

            <form action="#" method="post" enctype="multipart/form-data" role="form">
              
              <div class="p-3 p-lg-5 border">

                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="" class="text-black">Password</label>
                    <input type="password" class="form-control text-black" id="" name="opass" 
                    placeholder="Enter password" value="">
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="" class="text-black">New Password</label>
                    <input type="password" class="form-control text-black" id="" name="pass1" 
                    placeholder="Enter new password" value="">
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="" class="text-black">Confirm New Password</label>
                    <input type="password" class="form-control text-black" id="" name="pass2" 
                    placeholder="Confirm new password" value="">
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
                        <input type="submit" class="btn btn-primary btn-lg btn-block" value="Update Profile" name="btnUpdate">
                      </div>
                      <div><a>&nbsp;</a></div>
                        <div class="col-md-4">
                          <input type="button" class="btn btn-primary btn-lg btn-block" onclick="window.location='?page=user'" value="Ignore" name="btnIgnore">
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

<?php
    if(isset($_POST['btnUpdate']))
    {
      $pass1 = $_POST['pass1'];
      $pass2 = $_POST['pass2'];
      $opass = $_POST['opass'];
      if(isset($opass))
      
      if($pass1!="" && (strlen($pass1) <= 6 || $pass1 != $pass2))
      {
        echo "<script type='text/javascript'>alert('Incorrect password!');</script>";
      }
      elseif ($pass1=="")
      {
        echo "<script type='text/javascript'>alert('Incorrect password!');</script>";
      }
      else
      {
        $opass1 = md5($opass);
        $pass = md5($pass1);
        $sql = "select * from account where account_ID='$account_ID' and pass ='$opass1'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if (mysqli_num_rows($result)==1)
        {
          $sqlString = "update account set pass='$pass' where account_ID ='$account_ID'";
          mysqli_query($conn,$sqlString);
          echo "<script type='text/javascript'>alert('Update successfully !!!');</script>";
          echo '<meta http-equiv="refresh" content="0;URL =?page=user"';
        }
        else
        {
          echo "<script type='text/javascript'>alert('Incorrect password !!!');</script>";
        }
      }
  
    }
?>


<?php
	}
?>