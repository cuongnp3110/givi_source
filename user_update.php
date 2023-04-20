<?php
  if(isset($_SESSION['us']) && $_SESSION['us'] != "") 
  {
    $account_ID = $_SESSION['us'];
    $sqlString = "select account_ID, fname, lname,user_img, email, phone, address from account where account_ID='$account_ID'";
    
		$result = mysqli_query($conn, $sqlString);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
?>

  <div class="site-wrap" style="min-height: calc(100vh - 392.16px)">

  <div class="custom-border-bottom py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="?page=home">Home</a> <span class="mx-2 mb-0">/</span> <a href="?page=user">User Profile</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Update Profile</strong></div>
        </div>
      </div>
    </div>
    
    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <p><h2 class="h3 mb-3 text-black"><?php echo $account_ID ?>'s Profile</h2></p>
          </div>
          <div class="col-md-12">

            <form action="" method="post" enctype="multipart/form-data" role="form">
            
              <div class="p-3 p-lg-4 border">
                <div class="container form-group row">
                <div class="col-md-2"></div>
                  <div class="col-md-8">
                    <div class="form-group row">
                      <div class="col-md-12">
                        <label for="" class="text-black">Username</label>
                        <input type="text" class="form-control text-black" id="" readonly name="pro_ID" 
                        placeholder="Enter product ID" value="<?php echo $account_ID?>">
                      </div>
                    </div>

                    <div class="form-group row">
                      <div class="col-md-6">
                        <label for="" class="text-black">First Name</label>
                        <input type="text" class="form-control text-black" id="" name="fname" 
                        placeholder="Enter price" value="<?php echo $row['fname']?>">
                      </div>
                      <div class="col-md-6">
                        <label for="" class="text-black">Last Name</label>
                        <input type="text" class="form-control text-black" id="" name="lname" 
                        placeholder="Enter price" value="<?php echo $row['lname']?>">
                      </div>
                    </div>

                    <div class="form-group row">
                      <div class="col-md-12">
                        <label for="" class="text-black">Email</label>
                        <input type="text" class="form-control text-black" id="" name="email" 
                        placeholder="Enter product ID" value="<?php echo $row['email']?>">
                      </div>
                    </div>

                    <div class="form-group row">
                      <div class="col-md-12">
                        <label for="" class="text-black">Phone</label>
                        <input type="text" class="form-control text-black" id="" name="phone" 
                        placeholder="Enter product ID" value="<?php echo $row['phone']?>">
                      </div>
                    </div>

                    <div class="form-group row">
                      <div class="col-md-12">
                        <label for="" class="text-black">Address</label>
                        <input type="text" class="form-control text-black" id="" name="address" 
                        placeholder="Enter product ID" value="<?php echo $row['address']?>">
                      </div>
                    </div>
                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                  </div>
                  <div class="col-md-2"></div>
                    <!-- <div class="col-md-12">
                      <label for="" class="text-black">Message </label>
                      <textarea name="text" id="c_message" cols="30" rows="7" class="form-control text-black"></textarea>
                    </div> -->
                  <div class="col-md-12">
                    <div class="form-group row">
                    <div class="col-md-6 col-lg-2"></div>
                      <div class="col-md-6 col-lg-4">
                        <input type="submit" class="btn btn-primary btn-lg btn-block" value="Update" name="btnUpdate">
                      </div>

                      <div class="col-md-6 col-lg-4">
                        <input type="button" class="btn btn-primary btn-lg btn-block" value="Ignore" onclick="window.location='?page=user'" name="btnUpdate">
                      </div>
                      <div class="col-md-6 col-lg-2"></div>
                    </div>
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
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $addr = $_POST['address'];
    if($fname=="" || $lname=="" || $email=="" || $phone=="" || $addr=="")
    {
      echo "<script type='text/javascript'>alert('Incorrect input');</script>";
    }
    else
    {
      $sql = "select * from account where account_ID='$account_ID'";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
      $sqlString = "update account set fname ='$fname', lname = '$lname', email ='$email', phone='$phone', address='$addr' where account_ID ='$account_ID'";
      mysqli_query($conn,$sqlString);
      echo "<script type='text/javascript'>alert('Update successfully !!!');</script>";
      echo '<meta http-equiv="refresh" content="0;URL =?page=user"';
    }
  }
?>


<?php
	}
?>