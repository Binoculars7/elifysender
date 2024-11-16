<?php require_once "../controllerUserData.php"; ?>
<?php 
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if($email != false && $password != false){
    $sql = "SELECT * FROM usertable WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        if($status == "verified"){
            if($code != 0){
                header('Location: reset-code.php');
            }
        }else{
            header('Location: ../user-otp.php');
        }
    }
}else{
    header('Location: ../login-user.php');
}
?>



<!DOCTYPE html>
<!--=== Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="style.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <title>Moonpie | Dashboard</title> 
</head>
<body>
    <nav>
        <div class="logo-name">
            
                
    

            <span class="logo_name"><i class='fa fa-pie-chart' style='color:#6665ee;'></i> <small>Moonpie</small></span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="#">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Dashboard</span>
                </a></li>
                <li><a href="spin">
                    <i class="uil uil-chart"></i>
                    <span class="link-name">Spin</span>
                </a></li>
                <li><a href="#">
                    <i class="uil uil-share"></i>
                    <span class="link-name">Refer a friend</span>
                </a></li>
                <li><a href="#">
                    <i class="uil uil-coins"></i>
                    <span class="link-name">Withdraw</span>
                </a></li>
            </ul>
            
            <ul class="logout-mode">

                <li><a href="#">
                <i class="uil uil-user"></i>
                    <span class="link-name" style='font-size:13px;'>
                   <?php echo $fetch_info['name'] ?>
                    </span>
                </a></li>
            
                <li><a href="../logout-user.php">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Logout</span>
                </a></li>

                <li class="mode">
                    <a href="#">
                        <i class="uil uil-moon"></i>
                    <span class="link-name">Dark Mode</span>
                </a>

                <div class="mode-toggle">
                  <span class="switch"></span>
                </div>
            </li>
            </ul>
        </div>
    </nav>

    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>

           
            <img src="images/profile.jpg" alt="">
        </div>

        <div class="dash-content" style="margin-top: -3em;">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Investment Return</span>
                </div>

                <div class="boxes" style="margin-top:-1.1em;">
                    <div class="box box1" style="background:#667f9a; background:url('Images/black.jpg'); background-position:center; background-size:120%; opacity:0.8;">
                        <i class="uil uil-chart" style="color:skyblue;"></i>
                        <span class="text" style="font-size:12px;">BASIC</span>
                        <span class="number" style="margin-top:-0.3em;">2000<small><small><small>mp</small></small></small></span>

                        <span class="text" style="font-size:12px;">RETURN</span>
                        <span class="number" style="margin-top:-0.3em;">10000<small><small><small>mp</small></small></small></span>


                    </div>
                    <div class="box box2" style="background:#667f9a;">
                        <i class="uil uil-chart" style="color:white;"></i>
                        <span class="text" style="font-size:12px;">STANDARD</span>
                        <span class="number" style="margin-top:-0.3em;">5000<small><small><small>mp</small></small></small></span>

                        <span class="text" style="font-size:12px;">RETURN</span>
                        <span class="number" style="margin-top:-0.3em;">30000<small><small><small>mp</small></small></small></span>
                    </div>
                    <div class="box box3" style="background:#667f9a;">
                        <i class="uil uil-chart" style="color:pink;"></i>
                        <span class="text" style="font-size:12px;">PREMIUM</span>
                        <span class="number" style="margin-top:-0.3em;">10000<small><small><small>mp</small></small></small></span>

                        <span class="text" style="font-size:12px;">RETURN</span>
                        <span class="number" style="margin-top:-0.3em;">50000<small><small><small>mp</small></small></small></span>
                    </div>
                </div>
            </div>


            <div class="overview" style="margin-top: -2em;">
                <div class="title" style="margin-bottom:0.8em;">
                    <i class="uil uil-star"></i>
                    <span class="text">Sectors</span>
                </div>

                <div class="boxes">
                    <div class="box box1" style="background:url('Images/web33.png'); background-position:center; background-size:120%; opacity:0.8; box-shadow:0 0 2px grey;">
                        <span class="number" style="color:white; text-shadow:2px 5px black; padding:1.2em 0;"><small>Technology</small></span>
                    </div>
                    <div class="box box2" style="background:url('Images/cocoa.jpg'); background-position:center; background-size:120%; opacity:0.8; box-shadow:0 0 2px grey;">
                        <span class="number" style="color:#ffe6ac; text-shadow:2px 4px black; padding:1.2em 0;"><small>Agriculture</small></span>
                    </div>
                    
                    <div class="box box3" style="background:url('Images/business.jpg'); background-position:center; background-size:120%; opacity:0.8; box-shadow:0 0 2px grey;">
                        <span class="number" style="color:#e7d1fc; text-shadow:2px 4px black; padding:1.2em 0;"><small>Business</small></span>
                    </div>
                </div>
            </div>
            

            <div class="activity" style="margin-top: -1.5em;">
                <div class="title">
                    <i class="uil uil-clock-three"></i>
                    <span class="text">Investment History</span>
                </div>

                <div class="activity-data">
                    <div class="data email">
                        <span class="data-title">Section</span>
                        <span class="data-list">Agriculture</span>
                        <span class="data-list">Agriculture</span>
                        <span class="data-list">Technology</span>
                        <span class="data-list">Agriculture</span>
                        <span class="data-list">Business</span>
                        <span class="data-list">Technology</span>
                        <span class="data-list">Business</span>
                    </div>
                    <div class="data joined">
                        <span class="data-title">Inventors</span>
                        <span class="data-list">4870+ </span>
                        <span class="data-list">4240+</span>
                        <span class="data-list">3710+</span>
                        <span class="data-list">3560+</span>
                        <span class="data-list">3090+</span>
                        <span class="data-list">2340+</span>
                        <span class="data-list">2180+</span>
                    </div>
                    <div class="data type">
                        <span class="data-title">Status</span>
                        <span class="data-list"><i class="uil uil-thumbs-up"></i></span>
                        <span class="data-list"><i class="uil uil-thumbs-up"></i></span>
                        <span class="data-list"><i class="uil uil-thumbs-up"></i></span>
                        <span class="data-list"><i class="uil uil-thumbs-up"></i></span>
                        <span class="data-list"><i class="uil uil-thumbs-down"></i></span>
                        <span class="data-list"><i class="uil uil-thumbs-up"></i></span>
                        <span class="data-list"><i class="uil uil-thumbs-up"></i></span>
                    </div>
                    <div class="data status">
                        <span class="data-title">Date</span>
                        <span class="data-list">2024-10</span>
                        <span class="data-list">2024-09</span>
                        <span class="data-list">2024-08</span>
                        <span class="data-list">2024-07</span>
                        <span class="data-list">2024-06</span>
                        <span class="data-list">2024-05</span>
                        <span class="data-list">2024-04</span>
                    </div>
                </div><br><br><br><br>
            </div>
        </div>
    </section>

    <script src="script.js"></script>
</body>
</html>