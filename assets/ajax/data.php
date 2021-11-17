<?php 
require '../../function.php';

$keyword = $_GET["keyword"];
$query = "SELECT * FROM guru_ngaji
            WHERE 
            nama LIKE '%$keyword%'
            OR
            alamat LIKE '%$keyword%'
            OR
            gender LIKE '%$keyword%'
            OR
            profesi LIKE '%$keyword%'";

$data = mysqli_query($conn, $query);

?>

<div class="card-deck justify-content-center">
	<div class="row">
        <?php
		$dataperPage = 4;
		$dataTotal = count(query("SELECT * FROM guru_ngaji"));
		$pagesTotal = ceil($dataTotal / $dataperPage);
		$activePage = ( isset($_GET["p"]) ) ? $_GET["p"] : 1;
		$dataStart = ( $dataperPage * $activePage ) - $dataperPage;

        while($p=mysqli_fetch_array($data)){
		?>
		<div class="col-md-3 mx-3">
			<div class="card mb-4 card_style">
				<img src="assets/images/profilepic/<?php echo $p['gambar'] ?>" class="card-img-top card_picture">
				<div class="card-body">
					<h5 class="card-title cardprofile"><?php echo $p['nama'] ?></h5>
					<p class="card-text cardprofile"><?php echo $p['profesi'] ?></p>
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
			<?php } ?>
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
