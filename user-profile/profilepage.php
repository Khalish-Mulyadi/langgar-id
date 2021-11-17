<?php
session_start();
include_once("../koneksi.php");

if ( !isset($_SESSION['login']) ) {
	header("Location: index.php" );
	exit;
}
$uid = $_GET["uid"];

$result = mysqli_query($conn, "SELECT * FROM guru_ngaji WHERE uid=$uid");
$out = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Langgar ID - Profile Page</title>

    <link href="../assets/css/profilepage.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="../assets/css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="../assets/images/fevicon.png" type="image/gif" />

    <!------ Include the above in your HEAD tag ---------->


</head>
<body>
    <!-- header section start -->
	<div class="header_section fixed-top">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-lg-3">
					<div class="logo"><a href="../homepage.php"><img src="../assets/images/Langgar ID logo.png"></a></div>
				</div>
				<div class="col-sm-9 my-auto">
					<nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                           <a class="nav-item nav-link" href="../homepage.php">Home</a>
                           <a class="nav-item nav-link" href="browse">Browse</a>
                           <a class="nav-item nav-link" href="about">About</a>
                           <a class="nav-item nav-link" href="clients">Clients</a>
                           <a class="nav-item nav-link" href="contact">Contact</a>
                           <div class="nav-item dropdown">
								<a class="nav-link dropdown-toogle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
									Halo, <?php echo $_SESSION['user'] ?>
								</a>	
								<ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarDarkDropdownMenuLink">
        						    <li><a class="dropdown-item" href="myprofile.php?uid=<?php echo $_SESSION['id_user'] ?>">Lihat Profile</a></li>
        						    <li><hr class="dropdown-divider"></li>
									<li><a class="dropdown-item" href="../logout.php">Log Out</a></li>
        						</ul>
							</div>
                        </div>
                    </div>
                    </nav>
				</div>
			</div>
		</div>
	</div>
    <div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="../assets/images/profilepic/<?php echo $out['gambar']; ?>" alt=""/>
                            <!-- <div class="file btn btn-lg btn-primary">
                                Change Photo
                                <input type="file" name="file"/>
                            </div> -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                        <?php echo $out['nama'];?>
                                    </h5>
                                    <h6>
                                        <?php echo $out['profesi'];?>
                                    </h6>
                                    <!-- <p class="proile-rating">RANKINGS : <span>8/10</span></p> -->
                                    
                                    
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item active">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>
                                <!-- <li class="nav-item text-dark">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Timeline</a>
                                </li> -->
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                        <p>SOCIAL MEDIA</p>
                            <img src="../assets/images/facebook.png" alt=""><a><?php echo $out["facebook"] ?></a><br/>
                            <img src="../assets/images/twitter.png" alt=""><a><?php echo $out["twitter"] ?></a><br/>
                            <img src="../assets/images/instaicon.png" alt=""><a><?php echo $out["instagram"] ?></a>
                            <!-- <p>SKILLS</p>
                            <ul>
                                <li>
                                    <a href="">Web Designer</a>
                                    
                                </li>
                                <li>
                                    <a href="">Web Developer</a>
                                    
                                </li>
                                <li>
                                    <a href="">WordPress</a>
                                       
                                </li>
                                <li>
                                    <a href="">WooCommerce</a>    
                                </li>
                                <li>
                                    <a href="">PHP, .Net</a>    
                                </li>
                        
                            </ul> -->
                            
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <!-- <div class="row">
                                            <div class="col-md-6">
                                                <label>User Id</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Kshiti123</p>
                                            </div>
                                        </div> -->
                                        <div class="row">
                                            <div class="col-md-6 my-auto">
                                                <label>Nama</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $out['nama'];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 my-auto">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $out['email'];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 my-auto">
                                                <label>Nomor Telepon</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $out['telepon'];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 my-auto">
                                                <label>Alamat</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $out['alamat'];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 my-auto">
                                                <label>Profesi</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $out['profesi'];?></p>
                                            </div>
                                        </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>           
        </div>
        <!-- copyright section start -->
    <div class="copyright">
    	<p class="copyright_text">2021 &copy; All Rights Reserved. Design By Lizzie</p>
    </div>
	<!-- copyright section end -->

        <!-- Javascript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>  
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/jquery-3.0.0.min.js"></script>
    <script src="../assets/js/plugin.js"></script>
      
    <script src="../assets/js/popper.min.js"></script>
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
         var myModal = document.getElementById('myModal')
         var myInput = document.getElementById('myInput')

         myModal.addEventListener('shown.bs.modal', function () {
         myInput.focus()
         })
         
      </script> 
    
</body>
</html>