<?php
session_start();
include 'koneksi.php';

require 'function.php';

if ( isset($_SESSION['login']) ) {
	header("Location: homepage.php" );
	exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<!-- basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- mobile metas -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="initial-scale=1, maximum-scale=1">
<!-- site metas -->
<title>Langar ID</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">	
<!-- bootstrap css -->
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<!-- style css -->
<link rel="stylesheet" type="text/css" href="assets/css/homepage.css">
<!-- Responsive-->
<link rel="stylesheet" href="assets/css/responsive.css">
<!-- fevicon -->
<link rel="icon" href="assets/images/fevicon.png" type="image/gif" />
<!-- Scrollbar Custom CSS -->
<link rel="stylesheet" href="assets/css/jquery.mCustomScrollbar.min.css">
<!-- Tweaks for older IEs-->
<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
<!-- owl stylesheets --> 
<link rel="stylesheet" href="assets/css/owl.carousel.min.css">
<link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">

</head>
<body id="home">
	<!-- header section start -->
	<div class="header_section fixed-top">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-lg-3">
					<div class="logo"><a href="#home"><img src="assets/images/Langgar ID logo.png"></a></div>
				</div>
				<div class="col-sm-6 my-auto">
					<nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                           	<a class="nav-item nav-link" href="#home">Home</a>
                           	<a class="nav-item nav-link" href="#browse">Browse</a>
                           	<a class="nav-item nav-link" href="#about">About</a>
                           	<a class="nav-item nav-link" href="#review">Review</a>
                           	<a class="nav-item nav-link" href="#contact">Contact</a>
							<a class="nav-item nav-link" href="login">Login</a>	
							<div class="nav-item col-md-3 my-auto pt-4">
								<a href="registrasi"><button class="btn btn-lg me-2" type="button">Daftar</button></a>
							</div>
						</div>
                    </div>
                    </nav>
				</div>
			</div>
		</div>
	</div>
	<!-- header section end -->
	<!-- banner section start -->
	<div class="layout_padding banner_section">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<h1 class="banner_taital mb-5">DAFTAR DAN JADI GURU NGAJI DI <span style="border-bottom: 5px solid #4bc714;">LANGGAR ID </span></h1>
					<p class="browse_text mb-5">Cari guru ngaji untuk anak dengan mudah di Langgar ID. Ayo coba sekarang</p>
					<!-- <div class="banner_bt">
						<button class="read_bt"><a href="about">Pelajari Lebih Lanjut</a></button>
					</div> -->
				</div>
			</div>
		</div>
	</div>
	<!-- banner section end -->
	<!-- search box start -->
	<div class="container">
		<div class="search_box">
			<form action="" method="post">
				<div class="row">
					<div class="col-sm">
						<div class="form-group">
            	            <input type="text" class="email_boton" placeholder="Search" id="keyword" name="search">
            	        </div>
					</div>
				</div>
			</form>
		</div>
	</div>
	<!-- search box end -->
	<!-- section PROMOTED start -->
	<div class=" layout_padding promoted_sectipon" id="browse">
		<h1 class="promoted_text">GURU <span style="border-bottom: 5px solid #4bc714;">NGAJI</span></h1>
		<div class="images_main" id="profile">
			<div class="card-deck justify-content-center">
				<div class="row">
					<?php 
					$dataperPage = 4;
					$dataTotal = count(query("SELECT * FROM guru_ngaji"));
					$pagesTotal = ceil($dataTotal / $dataperPage);
					$activePage = ( isset($_GET["p"]) ) ? $_GET["p"] : 1;
					$dataStart = ( $dataperPage * $activePage ) - $dataperPage;
					
					$profile=mysqli_query($conn,"SELECT * from guru_ngaji LIMIT $dataStart, $dataperPage");
					
					while($p=mysqli_fetch_array($profile)){
					?>
					<div class="col-md-3">
						<div class="card mb-4 card_style">
							<img src="assets/images/profilepic/<?php echo $p['gambar'] ?>" class="card-img-top card_picture">
							<div class="card-body">
								<h5 class="card-title cardprofile"><?php echo $p['nama'] ?></h5>
								<p class="card-text cardprofile"><?php echo $p['profesi'] ?></p>
								<!-- <div class="eye-icon"><img src="assets/images/eye-icon.png"><span class="like-icon"><img src="assets/images/like-icon.png"></span></div>
								<div class="numbar_text">30<span class="like-icon">01</span></div> -->
								<div class="text-center">
									<a href="user-profile/index.php?uid=<?php echo $p['uid'] ?> " class="btn">Lihat Profile</a>
								</div>
							</div>
						</div>
					</div>
					<?php
					}
					?>
				</div>
			</div>
			<div class="container text-center">
				<nav aria-label="Page navigation example">
  					<ul class="pagination pagination-lg justify-content-center">
    					<?php if( $activePage > 1 ){ ?>
					 	<li class="page-item">
    						<a class="page-link" href="?p=<?php echo $activePage - 1; ?>" tabindex="-1">Previous</a>
    					</li>
						<?php } else { ?>
						<li class="page-item disabled">
    						<a class="page-link" href="" tabindex="-1" aria-disabled="true">Previous</a>
    					</li>	
						<?php }?>

						<?php for ($i=1; $i <= $pagesTotal ; $i++) { ?>
							<?php if ( $i == $activePage ) { ?>
								<li class="page-item active"><a class="page-link" href="?p=<?php echo $i; ?>"><?php echo $i; ?></a></li>
							<?php } else { ?>
								<li class="page-item"><a class="page-link" href="?p=<?php echo $i; ?>"><?php echo $i; ?></a></li>
							<?php } ?>
    					<?php } ?>
						
						<?php if ( $activePage < $pagesTotal ) { ?>
						<li class="page-item">
    						<a class="page-link" href="?p=<?php echo  $activePage + 1 ; ?>">Next</a>
    					</li>
						<?php } else { ?>
						<li class="page-item disabled">
    						<a class="page-link" href="" aria-disabled="true">Next</a>
    					</li>	
						<?php } ?>
  					</ul>
				</nav>
			</div>
		</div>
	</div>
	<!-- section PROMOTED end -->
	
	<!-- about section start -->
	<div class="about_section" id="about">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<h1 class="about_taital">TENTANG LANGGAR ID</h1>
					<p class="lorem_text">
						Langgar ID adalah situs yang dapat membantu Anda dalam mencari
						guru ngaji secara privat. Anda juga dapat mendaftarkan diri Anda
						sebagai pengajar di Langgar ID. Langgar ID juga membantu mempromosikan 
						jasa anda sebagai guru ngaji privat. Segera daftarkan diri Anda
						dan bersama Langgar ID, membangun insan cerdas dan berakhlak.
					</p>
				</div>
			</div>
		</div>
   	</div>

	<!-- about section end -->
	<!-- review section start -->
	<?php 
	function make_query($conn)
	{
		$query = "SELECT * FROM review ORDER BY id_review ASC";
	 	$result = mysqli_query($conn, $query);
	 	return $result;
	}
	
	function make_slide_indicators($conn)
	{
	 	$output = ''; 
	 	$count = 0;
	 	$result = make_query($conn);
	 	while($row = mysqli_fetch_array($result))
	 	{
	  		if($count == 0){
	   			$output .= '
	   			<li data-target="#client_slide" data-slide-to="'.$count.'" class="active"></li>
	   			';
	  		}
	  		else{
	   			$output .= '
	   			<li data-target="#client_slide" data-slide-to="'.$count.'"></li>
	   			';
	  		}
	  		$count = $count + 1;
	 	}
	 	return $output;
	}
	
	function make_slides($conn)
	{
	 	$output = '';
		$count = 0;
	 	$result = make_query($conn);
	 	while($p = mysqli_fetch_assoc($result)){
	  		if($count == 0){
	   			$output .= '<div class="carousel-item active">';
	  		}
	  		else
	  		{
	   			$output .= '<div class="carousel-item">';
	  		}
	  		$output .= '
				  <div class="client_img"><img src="assets/images/profpic.png">	
				  	<h1 class="client_text">'.$p["nama"].'</h1>
				  	<p class="adiser_text">'.$p["profesi"].'</p>
				  	<p class="long_text">'.$p["pesan"].'</p>
			  	</div>
			  </div>
	  		';
			//   $output .= '
			//   	<img src="banner/'.$row["banner_image"].'" alt="'.$row["banner_title"].'" />
			//   	<div class="carousel-caption">
			//    	<h3>'.$row["banner_title"].'</h3>
			//   	</div>
			//  	</div>
			//  ';
	  	$count = $count + 1;
	 	}
	 	return $output;
	}
	?>
    <div class="layout_padding clients_section" id="review">
    	<div class="container">
		<h1 class="promoted_text">REVIEW <span style="border-bottom: 5px solid #4bc714;">PENGUNJUNG</span></h1>
    		<div id="client_slide" class="carousel slide" data-ride="carousel">
  				<ol class="carousel-indicators">
					<?php echo make_slide_indicators($conn); ?>
				</ol>
  				<div class="carousel-inner">
				  	<?php 
						echo make_slides($conn);
					?>
				</div>
    		</div>
    	</div>
    </div>
</div>
	<!-- review section end -->
	<!-- contact section start -->
    <div class="contact_section layout_padding" id="contact">
    	<div class="container">
		<div class="row">
		<h1 class="about_taital">BAGAIMANA PENGALAMAN ANDA?</h1>
				<div class="col-12">
					<div class=" mx-auto input_main">
                       <div class="container">
                          <form action="review.php" method="post">
                            <div class="form-group mt-3">
                              <input type="text" class="email-bt" placeholder="Nama Anda" name="nama">
                            </div>
                            <div class="form-group">
                              <input type="text" class="email-bt" placeholder="Profesi" name="profesi">
                            </div>
                            <!-- <div class="form-group">
                              <input type="text" class="email-bt" placeholder="Phone" name="Email">
                            </div> -->
                            <div class="form-group">
                              <textarea class="massage-bt" placeholder="Pesan" rows="5" id="comment" name="pesan"></textarea>
                            </div>
							<div class="text-center">
                        		<button type="submit" name="submit" class="read_bt">Submit</button>
							</div>
						</form>
                       </div> 
                    </div>
                </div>
    		</div>
    	</div>
    </div>
	<!-- contact section end -->
	<!-- copyright section start -->
    <div class="copyright">
    	<p class="copyright_text">2021 &copy; All Rights Reserved. Design By Lizzie</p>
    </div>
	<!-- copyright section end -->
      <!-- Javascript files-->
	  <script src="assets/js/jquery-3.6.0.min.js"></script> 
	  <script src="assets/js/jqueryscript.js"></script>
      <script src="assets/js/popper.min.js"></script>
      <script src="assets/js/bootstrap.bundle.min.js"></script>
      <script src="assets/js/plugin.js"></script>
      <!-- sidebar -->
      <script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="assets/js/custom.js"></script>
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