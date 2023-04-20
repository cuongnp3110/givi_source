<?php
  if(isset($_SESSION['admin']) && $_SESSION['admin']==1)
  {
?>
<?php
  if(isset($_SESSION['us']) && $_SESSION['us'] != "")
  {
    if(isset($_POST['btnLogin']))
    {
      $us = $_POST['us'];
      $email = $_POST['email'];
      $fback = $_POST['content'];
      
      if($fback=="")
      {
        echo "<script type='text/javascript'>alert('Feedback cant be empty');</script>";
      }
      else{
      {

        $sql = "select * from account where account_ID ='$us' or email ='$email'";
        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result)==1)
        {
          $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
          mysqli_query($conn, "insert into feedback (account_ID, email, feedback_info) 
          VALUES ('$us','$email','$fback')") or die (mysqli_error($conn));
          echo "<script type='text/javascript'>alert('Feedback send successfully');</script>";
        }
      }
    }
  }
?>
  <div class="site-wrap" style="min-height: calc(100vh - 392.16px)">

  <div class="custom-border-bottom py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="?page=home">Home</a> <span class="mx-2 mb-0">/</span><strong class="text-black">Feedback</strong></div>
        </div>
      </div>
    </div>

    <div class="">
      <br/>
      <div class="container">
        
        <div class="row">
          <div class="col-md-12">
            <h2 class="h3 mb-3 text-black">Feedback</h2>
          </div>
          <div class="col-md-12">

            <form action="" method="post">
              
              <div class="p-3 p-lg-5 border">
                <div class="form-group row">
                  <div class="col-md-6">
                    <label for="" class="text-black">Username</label>
                    <input type="text" class="form-control text-black" readonly id="" name="us" placeholder="Enter username" value="<?php echo $_SESSION['us'] ?>">
                  </div>
                  <div class="col-md-6">
                    <label for="" class="text-black">Email</label>
                    <input type="text" class="form-control text-black" readonly id="" name="email" placeholder="Enter email" value="<?php echo $_SESSION['email'] ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="" class="text-black">Feedback content</label>
                    <textarea class="col-md-12 form-control text-black " name="content" style="height: 200px" row="10" placeholder="Enter feedback content"></textarea>
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
                    <input type="submit" class="btn btn-primary btn-lg btn-block" value="Send Feedback" name="btnLogin">
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
  <?php
  }
  ?>

<?php
  }
  else
  {
    echo "<script type='text/javascript'>alert('You are not admin');</script>";
    echo '<meta http-equiv="refresh" content="0;URL =index.php"';
  }
  
?>