<section class="page-section bg-dark" id="home">
	<div class="container">
		<h2 class="text-center">All Apparel</h2>
	<div class="d-flex w-100 justify-content-center">
		<hr class="border-warning" style="border:3px solid" width="15%">
	</div>
	<div class="row">
		<div class="row">
		<div class="col-7"></div>
			<div class="col-5">
				<div class="row">
				<form action="" method="post">
					<div class="form-group">
						<input type="search" name="keyword" placeholder="Search here....." size="30" class="form-control" id="">
						<input type="submit" class="bg-dark btn" hidden value="Search" name="search">
					</div>
				</form>
				</div>
			</div>
			<?php
			if (isset($_POST['search'])) {

			$keyword = $_POST['keyword'];
			
			$sql = "SELECT * FROM packages WHERE title LIKE '%$keyword%' LIMIT 1";
			$result = $conn->query($sql);

			if($result->num_rows > 0){
				while ($row = $result->fetch_assoc()) {
					?>
<?php
		$packages = $conn->query("SELECT * FROM `packages` order by rand() ");
			while($row = $packages->fetch_assoc() ):
				$cover='';
				if(is_dir(base_app.'uploads/package_'.$row['id'])){
					$img = scandir(base_app.'uploads/package_'.$row['id']);
					$k = array_search('.',$img);
					if($k !== false)
						unset($img[$k]);
					$k = array_search('..',$img);
					if($k !== false)
						unset($img[$k]);
					$cover = isset($img[2]) ? 'uploads/package_'.$row['id'].'/'.$img[2] : "";
				}
				$row['description'] = strip_tags(stripslashes(html_entity_decode($row['description'])));
				$review = $conn->query("SELECT * FROM `rate_review` where package_id='{$row['id']}'");
				$review_count =$review->num_rows;
				$rate = 0;
				while($r= $review->fetch_assoc()){
					$rate += $r['rate'];
				}
				if($rate > 0 && $review_count > 0)
				$rate = number_format($rate,$review_count,0,"");
		?>
			<div class="col-md-4 p-4">
				<div class="card">
				<img class="card-img-top" src="<?php echo validate_image($cover) ?>" alt="<?php echo $row['title'] ?>" height="200rem" style="object-fit:cover">
				<div class="card-body">
				<h5 class="card-title col-12 truncate-1"><?php echo $row['title'] ?></h5>
				<h5 class="card-title ">
							<?php if($row['status'] == 0): ?>
                                <span class="badge badge-warning">Not-Availlable</span>
                            <?php elseif($row['status'] == 1): ?>
                                <span class="badge badge-primary">Availlable</span>
                            <?php endif; ?>
				</h5>
				<div class=" w-100 d-flex justify-content-start">
				<form action="">
					<div class="stars stars-small">
							<input disabled class="star star-5" id="star-5" type="radio" name="star" <?php echo $rate == 5 ? "checked" : '' ?>/> <label class="star star-5" for="star-5"></label> 
							<input disabled class="star star-4" id="star-4" type="radio" name="star" <?php echo $rate == 4 ? "checked" : '' ?>/> <label class="star star-4" for="star-4"></label> 
							<input disabled class="star star-3" id="star-3" type="radio" name="star" <?php echo $rate == 3 ? "checked" : '' ?>/> <label class="star star-3" for="star-3"></label> 
							<input disabled class="star star-2" id="star-2" type="radio" name="star" <?php echo $rate == 2 ? "checked" : '' ?>/> <label class="star star-2" for="star-2"></label> 
							<input disabled class="star star-1" id="star-1" type="radio" name="star" <?php echo $rate == 1 ? "checked" : '' ?>/> <label class="star star-1" for="star-1"></label> 
					</div>
				</form>
				</div>
				<p class="card-text truncate"><?php echo $row['description'] ?></p>
				<div class="w-100 d-flex justify-content-between">
					<span class="rounded-0 btn btn-flat btn-sm btn-primary"><i class="fa fa-tag"></i> <?php echo number_format($row['cost']) ?></span>
					<a href="./?page=view_package&id=<?php echo md5($row['id']) ?>" class="btn btn-sm btn-flat btn-warning">View Apparel <i class="fa fa-arrow-right"></i></a>
				</div>
				</div>
				</div>
			</div>
		<?php endwhile; ?>
					<?php
				}
			}else{
				echo "No Apparel Found";
			}
			
				# code...
			}
			?>
			
		</div>
		<hr>
		<?php
		$packages = $conn->query("SELECT * FROM `packages` order by rand() ");
			while($row = $packages->fetch_assoc() ):
				$cover='';
				if(is_dir(base_app.'uploads/package_'.$row['id'])){
					$img = scandir(base_app.'uploads/package_'.$row['id']);
					$k = array_search('.',$img);
					if($k !== false)
						unset($img[$k]);
					$k = array_search('..',$img);
					if($k !== false)
						unset($img[$k]);
					$cover = isset($img[2]) ? 'uploads/package_'.$row['id'].'/'.$img[2] : "";
				}
				$row['description'] = strip_tags(stripslashes(html_entity_decode($row['description'])));
				$review = $conn->query("SELECT * FROM `rate_review` where package_id='{$row['id']}'");
				$review_count =$review->num_rows;
				$rate = 0;
				while($r= $review->fetch_assoc()){
					$rate += $r['rate'];
				}
				if($rate > 0 && $review_count > 0)
				$rate = number_format($rate,$review_count,0,"");
		?>
			<div class="col-md-4 p-4">
				<div class="card">
				<img class="card-img-top" src="<?php echo validate_image($cover) ?>" alt="<?php echo $row['title'] ?>" height="200rem" style="object-fit:cover">
				<div class="card-body">
				<h5 class="card-title col-12 truncate-1"><?php echo $row['title'] ?></h5>
				<h5 class="card-title ">
							<?php if($row['status'] == 0): ?>
                                <span class="badge badge-warning">Not-Availlable</span>
                            <?php elseif($row['status'] == 1): ?>
                                <span class="badge badge-primary">Availlable</span>
                            <?php endif; ?>
				</h5>
				<div class=" w-100 d-flex justify-content-start">
				<form action="">
					<div class="stars stars-small">
							<input disabled class="star star-5" id="star-5" type="radio" name="star" <?php echo $rate == 5 ? "checked" : '' ?>/> <label class="star star-5" for="star-5"></label> 
							<input disabled class="star star-4" id="star-4" type="radio" name="star" <?php echo $rate == 4 ? "checked" : '' ?>/> <label class="star star-4" for="star-4"></label> 
							<input disabled class="star star-3" id="star-3" type="radio" name="star" <?php echo $rate == 3 ? "checked" : '' ?>/> <label class="star star-3" for="star-3"></label> 
							<input disabled class="star star-2" id="star-2" type="radio" name="star" <?php echo $rate == 2 ? "checked" : '' ?>/> <label class="star star-2" for="star-2"></label> 
							<input disabled class="star star-1" id="star-1" type="radio" name="star" <?php echo $rate == 1 ? "checked" : '' ?>/> <label class="star star-1" for="star-1"></label> 
					</div>
				</form>
				</div>
				<p class="card-text truncate"><?php echo $row['description'] ?></p>
				<div class="w-100 d-flex justify-content-between">
					<span class="rounded-0 btn btn-flat btn-sm btn-primary"><i class="fa fa-tag"></i> <?php echo number_format($row['cost']) ?></span>
					<a href="./?page=view_package&id=<?php echo md5($row['id']) ?>" class="btn btn-sm btn-flat btn-warning">View Apparel <i class="fa fa-arrow-right"></i></a>
				</div>
				</div>
				</div>
			</div>
		<?php endwhile; ?>
	</div>
	
	</div>
</section>
<style>
	 section, .bg-dark{
        color:white;
        background: #000000;
    background: -moz-linear-gradient(-45deg,  #000000 20%, #fbbf3b 80%);
    background: -webkit-linear-gradient(-45deg,  #000000 20%,#fbbf3b 80%);
    background: linear-gradient(155deg,  #000000 20%,#fbbf3b 80%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#000', endColorstr='#fbbf3b',GradientType=1 );
    
    }
</style>
