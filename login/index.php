<?php
	session_start();
	include_once("../koneksi.php");
	if ( isset($_SESSION["login"]) ) {
        header("Location: ../homepage.php");
    }

	if (isset($_POST['email'])) 
	{
		$email = mysqli_real_escape_string($conn,$_POST['email']);
		$password = mysqli_real_escape_string($conn,$_POST['password']);
		$sql = "SELECT * FROM guru_ngaji WHERE email= '$email'";

		$checkEmail = mysqli_query($conn,$sql);

		if (mysqli_num_rows($checkEmail) === 1 ) {
			$row = mysqli_fetch_assoc($checkEmail);
			if ( password_verify($password, $row["password"] ) ) {
                $_SESSION['email'] = $email;
                $_SESSION['user'] = $row['nama'];
                $_SESSION['id_user'] = $row['uid'];
                // set session
                $_SESSION['login'] = true;
				header("Location: ../homepage.php");
			} else {
				echo "<script>alert('Salah username atau password')</script>";
			}
		} 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">

    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="../assets/css/login.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="../assets/css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="../assets/images/fevicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="../assets/css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <!-- owl stylesheets --> 
    <link rel="stylesheet" href="../assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href=".../assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">


    <title>Langgar ID - Login</title>
</head>
<body>
    <!-- header section start -->
	<div class="header_section fixed-top">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-lg-3">
					<div class="logo"><a href="../index.php"><img src="../assets/images/Langgar ID logo.png"></a></div>
				</div>
				<div class="col-sm-6 my-auto">
					<nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                           	<a class="nav-item nav-link" href="../index.php">Home</a>
                           	<a class="nav-item nav-link" href="../index.php#browse">Browse</a>
                           	<a class="nav-item nav-link" href="../index.php#about">About</a>
                           	<a class="nav-item nav-link" href="../index.php#review">Review</a>
                           	<a class="nav-item nav-link" href="../index.php#contact">Contact</a>
							<a class="nav-item nav-link" href="login">Login</a>	
                            <div class="nav-item col-md-3 my-auto pt-4">
					            <a href="../registrasi"><button class="btn btn-lg me-2" type="button">Daftar</button></a>
				            </div>
                        </div>
                    </div>
                    </nav>
				</div>
			</div>
		</div>
	</div>
	<!-- header section end -->
    <!-- login form start -->
    <div class="login_form_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 text-center mx-auto">
                    <h1 class="promoted_text">LOGIN <span style="border-bottom: 5px solid #4bc714;">AKUN</span></h1>
                    <form action="" method="post">
                        <input type="text" class="email_text" placeholder="Email" name="email">
	                    <input type="password" class="email_text" placeholder="Password" name="password">

                        <button class="submit_text mx-auto">Login</button>
                    </form>
                </div>
            </div>
            <div>
                    <h3 class="col-lg-6 text-center mx-auto mt-5 regist_suggest">
                        <a href="../registrasi">Daftar jadi guru ngaji?</a>
                    </h3>
            </div>
        </div>
    </div>
    <!-- login form end -->
    <!-- copyright section start -->
    <div class="copyright">
    	<p class="copyright_text">2019 All Rights Reserved. Design By <a href="https://html.design"> Free Html Templates</p>
    </div>
	<!-- copyright section end -->
    <!-- Javascript files-->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/jquery-3.0.0.min.js"></script>
    <script src="../assets/js/plugin.js"></script>
    <!-- sidebar -->
    <script src="../assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="../assets/js/custom.js"></script>
    <!-- javascript --> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
    <script>
       $(document).ready(function(){
       $(".fancybox").fancybox({
       openEffect: "none",
       closeEffect: "none"
       });

       $(".zoom").hover(function(){
        
       $(this).addClass('transition');
       }, function(){
        
       $(this).removeClass('transition');
       });
       });

    </script>
</body>
</html>