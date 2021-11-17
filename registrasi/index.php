<?php 
session_start();
include_once("../koneksi.php");

if ( isset($_SESSION['login']) ) {
	header("Location: ../homepage.php" );
	exit;
}

require '../function.php';

    if ( isset($_POST["daftar"]) ) {
        if ( daftar($_POST) > 0 ) {
            echo "<script>
                    alert('Sukses mendaftarkan!');
                </script>";
            header("location:../berhasil.php");
        }
        else {
          // header("location:index.php");
          echo mysqli_error($conn);
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
    <link rel="stylesheet" type="text/css" href="../assets/css/regist.css">
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


    <title>Langgar ID - Registrasi</title>
</head>
<body>
    <!-- header section start -->
	<div class="header_section">
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
							<a class="nav-item nav-link" href="../login">Login</a>	
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
    <!-- regist form start -->
    <div class="login_form_section">
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-lg-6 align-self-center text-center">
                    <h1 class="promoted_text text-center pt-5">DAFTAR JADI <span style="border-bottom: 5px solid #fbf5f5;">GURU NGAJI</span></h1>
                    <form class="text-center" action="" method="post" enctype="multipart/form-data">
                        <div class="my-5 pb-5 fieldset">
                            <input type="text" class="email_text" placeholder="Email" name="email" required>
	                        <input type="password" class="email_text" placeholder="Password" name="pass" required>
                            <input type="password" class="email_text" placeholder="Confirm Password" name="cpass" required>
                        </div>
                        <div class="my-5 pb-5 pt-3 fieldset">
                            <div class="text-center">
                                <label for="formFile" class="form-label fs-5 text-dark fw-bold">Masukkan data diri Anda</label>
                            </div>
                            <input type="text" class="email_text" placeholder="Nama" name="nama" required>
                            <div class="row-cols-lg-auto g-3 align-items-center text-center pt-4">
                                <div class=" form-check form-check-inline fs-5">
                                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Laki-laki" required>
                                    <label class="form-check-label text-dark fw-bold" for="inlineRadio1">Laki-laki</label>
                                </div>
                                <div class=" form-check form-check-inline fs-5">
                                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="Perempuan" required>
                                    <label class="form-check-label text-dark fw-bold" for="inlineRadio2">Perempuan</label>
                                </div>
                            </div>    
                            <input type="text" class="email_text" placeholder="Nomor Telepon" name="telepon" required>
                            <input type="text" class="email_text" placeholder="Alamat" name="alamat" required>
                            <input type="text" class="email_text" placeholder="Profesi" name="profesi" required>
                        </div>
                        <div class="my-5 pt-3 pb-5 fieldset">
                            <div class="text-center">
                                <label for="formFile" class="form-label fs-5 text-dark fw-bold">Tambahkan akun sosmed Anda jika ada</label>
                            </div>
                            <input type="text" class="email_text" placeholder="Twitter" name="twitter">
                            <input type="text" class="email_text" placeholder="Facebook" name="facebook">
                            <input type="text" class="email_text" placeholder="Instagram" name="instagram">
                        </div>
                        <div class="my-5 pt-3 pb-5 fieldset">
                            <div class="text-center">
                                <label for="formFile" class="form-label fs-5 text-dark fw-bold">Masukkan foto Anda</label>
                            </div>
                            <input class="form-control mx-auto file_upload" type="file" name="gambar" id="formFile" required>
                        </div>
                        
                        <button class="submit_text fw-bold" name="daftar">Daftar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- regist form end -->
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
    <!-- partial -->
    <!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script> -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
    <script  src="../assets/js/regist.js"></script>

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
