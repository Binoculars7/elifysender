<?php require_once "../controllerUserData.php"; ?>
<?php 
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if($email != false && $password != false){
    $sql = "SELECT * FROM usertable WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $name = $fetch_info['name'];
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        if($status == "verified"){
            if($code != 0){
                header('Location: ../reset-code.php');
            }
        }else{
            header('Location: ../user-otp.php');
        }
    }
}else{
    header('Location: ../login-user.php');
}
?>


<?php


if($email != false && $password != false){


$sqlk = "SELECT * FROM successpayment WHERE EMAIL = '$email'";
$run_Sqlk = mysqli_query($con, $sqlk);
if($run_Sqlk){
    $fetch_infok = mysqli_fetch_assoc($run_Sqlk);
    $statuss = isset($fetch_infok['STATUS']);
    $emaill = isset($fetch_infok['EMAIL']);

    if ($statuss == 'paid') {
        echo "<script>window.location='../start';</script>";
    }else{
        //echo "<script>window.location='pricing.php';</script>";
    }

}else{
 // echo "<script>window.location='pricing.php';</script>";
}


}
?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="copyright" content="MACode ID, https://macodeid.com">

  <title>ElifySender</title>

  <link rel="stylesheet" href="../assets/vendor/animate/animate.css">

  <link rel="stylesheet" href="../assets/css/bootstrap.css">

  <link rel="stylesheet" href="../assets/css/maicons.css">

  <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.css">

  <link rel="stylesheet" href="../assets/css/theme.css">
 <!-- <link rel="icon"  type="image/png" href="moonpie_icon.PNG"> -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
  <script src="https://js.paystack.co/v1/inline.js"></script>

</head>
<style>
  #page_section{
    margin-top: -8em;
  }
  @media(max-width:700px){
    #page_section{
    margin-top: -3em;
  }
  }
</style>
<body>

  <!-- Back to top button -->

  <!-- how to back to top easily -->



  <div class="back-to-top"></div>

  <header>
    <nav class="navbar navbar-expand-lg navbar-light navbar-float">
      <div class="container">
        <a href="index.php" class="navbar-brand">Elify<span class="text-primary">Sender</span></a>

        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse collapse" id="navbarContent">
     

          <div class="ml-auto">
            <a href="../logout-user.php" class="btn btn-outline rounded-pill" style="background-color: #6C55F9; color:white;">Logout</a>
          </div>
        </div>
      </div>
    </nav>

    
    <br><br>
  
    <div class="page-section border-top" style="margin-top: 0;">
      <div class="container" id="pricing">
        <div class="text-center wow fadeInUp">
        <h2 class="title-section" style="margin-bottom:0.7em;"><?php 
        
        $name_split = explode(' ', $name);
        $new_name = $name_split[0];
        
        echo "Welcome ".$new_name; ?> <i class="fa-regular fa-face-smile"></i></h2>
          <h5 class="title-section">Choose a plan</h5>
          <div class="divider mx-auto"></div>
        </div>
  
        <form>
        <script src="https://js.paystack.co/v1/inline.js"></script>

        <div class="row justify-content-center">
          <div class="col-12 col-lg-auto py-3 wow fadeInLeft">
            <div class="card-pricing">
              <div class="header">
                <div class="price-icon"><span class="mai-people"></span></div>
                <div class="price-title">BASIC</div>
              </div>
              <div class="body py-3">
                <div class="price-tag">
                  <span class="currency">₦</span>
                  <h2 class="display-4">1000</h2>
                  <span class="period"></span>
                </div>
                <div class="price-info">
                  <p>Choose the plan that's right for you</p>
                </div>
              </div>
              <div class="footer">
                <button id="firstpay" type="button" class="btn btn-outline rounded-pill" onclick="payWithPaystack1()"> Choose Plan </button>
      
              </div>
            </div>
          </div>
  
          <div class="col-12 col-lg-auto py-3 wow fadeInUp">
            <div class="card-pricing active">
              <div class="header">
                <div class="price-labled">Best</div>
                <div class="price-icon"><span class="mai-business"></span></div>
                <div class="price-title">STANDARD</div>
              </div>
              <div class="body py-3">
                <div class="price-tag">
                  <span class="currency">₦</span>
                  <h2 class="display-4">5000</h2>
                  <span class="period"></span>
                </div>
                <div class="price-info">
                  <p>Choose the plan that's right for you</p>
                </div>
              </div>
              <div class="footer">
              <button id="secondpay" type="button" class="btn btn-outline rounded-pill" onclick="payWithPaystack2()"> Choose Plan </button>
              </div>
            </div>
          </div>
  
          <div class="col-12 col-lg-auto py-3 wow fadeInRight">
            <div class="card-pricing">
              <div class="header">
                <div class="price-icon"><span class="mai-rocket-outline"></span></div>
                <div class="price-title">PREMIUM</div>
              </div>
              <div class="body py-3">
                <div class="price-tag">
                  <span class="currency">₦</span>
                  <h2 class="display-4">10000</h2>
                  <span class="period"></span>
                </div>
                <div class="price-info">
                  <p>Choose the plan that's right for you</p>
                </div>
              </div>
              <div class="footer">
              <button id="thirdpay" type="button" class="btn btn-outline rounded-pill" onclick="payWithPaystack3()"> Choose Plan </button>
              </div>
            </div>
          </div>
          
        </div>
</form>
      </div> <!-- .container -->
    </div> <!-- .page-section -->
  



<!-- place below the html form -->
<script>

  function payWithPaystack1(){ 
    var handler = PaystackPop.setup({
      key: 'pk_test_d362b9d721c1c4cc6850d8d322cb27372c6051be',
      email: '<?php echo $email; ?>',
      amount: '100000',
      ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
      metadata: {
         custom_fields: [
            {
                display_name: "Mobile Number",
                variable_name: "mobile_number",
                value: "+2348012345678"
            }
         ]
      },
      callback: function(response){
          //alert('success. transaction ref is ' + response.reference);
          alert('Your payment was successful!');
          window.location='creditor.php?paystatus=onepay';
      },
      onClose: function(){
          //alert('window closed');
          //window.location='pricing.php';
          
      }
    });
    handler.openIframe();
  }



  function payWithPaystack2(){ 
    var handler = PaystackPop.setup({
      key: 'pk_test_d362b9d721c1c4cc6850d8d322cb27372c6051be',
      email: '<?php echo $email; ?>',
      amount: '500000',
      ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
      metadata: {
         custom_fields: [
            {
                display_name: "Mobile Number",
                variable_name: "mobile_number",
                value: "+2348012345678"
            }
         ]
      },
      callback: function(response){
          //alert('success. transaction ref is ' + response.reference);
          alert('Your payment was successful!');
          window.location='creditor.php?paystatus=twopay';
      },
      onClose: function(){
          //alert('window closed');
      }
    });
    handler.openIframe();
  }




  function payWithPaystack3(){ 
    var handler = PaystackPop.setup({
      key: 'pk_test_d362b9d721c1c4cc6850d8d322cb27372c6051be',
      email: '<?php echo $email; ?>',
      amount: '1000000',
      ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
      metadata: {
         custom_fields: [
            {
                display_name: "Mobile Number",
                variable_name: "mobile_number",
                value: "+2348012345678"
            }
         ]
      },
      callback: function(response){
          //alert('success. transaction ref is ' + response.reference);
          alert('Your payment was successful!');
          window.location='creditor.php?paystatus=threepay';

      },
      onClose: function(){
          //alert('window closed');
      }
    });
    handler.openIframe();
  }



</script>


















  <footer class="page-footer">
    <div class="container">


      <div class="row" style="text-align:center;">
        <div class="col-sm-6 py-2">
          <p id="copyright">&copy; 2024 <a href="#">ElifySender</a>. All rights reserved</p>
        </div>
        <div class="col-sm-6 py-2 text-right"> </div>
      </div> <!-- .container -->
    </div>
  </footer> <!-- .page-footer -->


  <script src="../assets/js/jquery-3.5.1.min.js"></script>

  <script src="../assets/js/bootstrap.bundle.min.js"></script>

  <script src="../assets/vendor/wow/wow.min.js"></script>

  <script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

  <script src="../assets/vendor/waypoints/jquery.waypoints.min.js"></script>

  <script src="../assets/vendor/animateNumber/jquery.animateNumber.min.js"></script>

  <script src="../assets/js/google-maps.js"></script>

  <script src="../assets/js/theme.js"></script>


</body>
</html>