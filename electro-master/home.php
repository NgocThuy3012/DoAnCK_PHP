<!DOCTYPE html>
<html lang="en">
	<?php
	include('head.php');
	?>
	<body>
		<?php
		include('header.php');
		?>

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/sach01.jpg" alt="" style="height: 230px;">
							</div>
							<div class="shop-body">
								<h3>Giáo khoa<br></h3>
								<a href="#" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->

					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/sach02.jpg" alt="">
							</div>
							<div class="shop-body">
								<h3>Tin học<br></h3>
								<a href="#" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->

					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/sach03.jpg" alt="">
							</div>
							<div class="shop-body">
								<h3>Từ điển<br></h3>
								<a href="#" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">New Products</h3>
							<div class="section-nav">
								<!-- <ul class="section-tab-nav tab-nav">
									<li class="active"><a data-toggle="tab" href="#tab1">Laptops</a></li>
									<li><a data-toggle="tab" href="#tab1">Smartphones</a></li>
									<li><a data-toggle="tab" href="#tab1">Cameras</a></li>
									<li><a data-toggle="tab" href="#tab1">Accessories</a></li>
								</ul> -->
							</div>
						</div>
					</div>
					<!-- /section title -->
					

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
										
										<?php
											
											include('conndb.php');											
											$sql='select book_name, price, img, book_id from book limit 5';
											$result=mysqli_query($conn,$sql);
											$arr= array();
											$i=0;
											while($row=mysqli_fetch_assoc($result) ){
												$arr[$i]= array($row['book_name'], $row['price'], $row['img'], $row['book_id']);
												$i++;
											}
											for($j=0;$j<count($arr);$j++){
												if($j>count($arr))
													break;							
										?>
										<!-- product -->
										<div class="product">
											<div class="product-img">
												<a  href="./product.php?id=<?php echo $arr[$j][3]; ?>"><img src="./img/<?php echo  $arr[$j][2]; ?>" alt="" style="width: 200px; height:200px;"></a>
												
												<div class="product-label">
													<!-- <span class="sale">-30%</span> -->
													<span class="new">NEW</span>
												</div>
											</div>
											<div class="product-body">
												<!-- <p class="product-category">Category</p> -->
												<h3 class="product-name"><a href="./product.php?id=<?php echo $arr[$j][3]; ?>"><?php echo $arr[$j][0]; ?></a></h3>
												<h4 class="product-price"><?php echo $arr[$j][1]; ?></h4>	
												<!-- <div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>											 -->
											</div>
											<form action="cart.php" method="post">
												<div class="add-to-cart">
													<input type="submit" value="add to cart"  class="add-to-cart-btn" name="addcart">
												</div>
												<input type="hidden" name="soluong" value="1">
												<input type="hidden" name="tensp" value="<?php echo $arr[$j][0]; ?>">
												<input type="hidden" name="gia" value="<?php echo $arr[$j][1]; ?>">
												<input type="hidden" name="hinh" value="<?php echo  $arr[$j][2]; ?>">
												<input type="hidden" name="id" value="<?php echo  $arr[$j][3]; ?>">
											</form>
											
										</div>
										<!-- /product -->	
									<?php }?>									
									</div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- HOT DEAL SECTION -->
		<div id="hot-deal" class="section" style=" background-image: url(../img/banner.jpg);">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="hot-deal">
							<ul class="hot-deal-countdown">
								<li>
									<div>
										<h3>02</h3>
										<span>Days</span>
									</div>
								</li>
								<li>
									<div>
										<h3>10</h3>
										<span>Hours</span>
									</div>
								</li>
								<li>
									<div>
										<h3>34</h3>
										<span>Mins</span>
									</div>
								</li>
								<li>
									<div>
										<h3>60</h3>
										<span>Secs</span>
									</div>
								</li>
							</ul>
							<h2 class="text-uppercase">hot deal this week</h2>
							<p>New Collection Up to 50% OFF</p>
							<a class="primary-btn cta-btn" href="#">Shop now</a>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /HOT DEAL SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Top selling</h3>
							<div class="section-nav">
								<!-- <ul class="section-tab-nav tab-nav">
									<li class="active"><a data-toggle="tab" href="#tab2">Laptops</a></li>
									<li><a data-toggle="tab" href="#tab2">Smartphones</a></li>
									<li><a data-toggle="tab" href="#tab2">Cameras</a></li>
									<li><a data-toggle="tab" href="#tab2">Accessories</a></li>
								</ul> -->
							</div>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab2" class="tab-pane fade in active">
									<div class="products-slick" data-nav="#slick-nav-2">
										<?php 
											$sql1='select book_name, price, img,book_id from book limit 5';
											$result1=mysqli_query($conn,$sql1);
											$arr1= array();
											$t=0;
											while($row=mysqli_fetch_assoc($result1) ){
												$arr1[$t]= array($row['book_name'], $row['price'], $row['img'], $row['book_id']);
												$t++;
											}
											for($j=0;$j<count($arr1);$j++){
												if($j>count($arr1))
													break;		
										?>
										<!-- product -->
										<div class="product">
											<div class="product-img">
												<a href="./product.php?id=<?php echo $arr1[$j][3]; ?>"><img src="./img/<?php echo $arr1[$j][2]; ?>" alt=""style="width: 200px; height:200px;"></a>
												
												<!-- <div class="product-label">
													<span class="sale">-30%</span>
													<span class="new">NEW</span>
												</div> -->
											</div>
											<div class="product-body">
												<!-- <p class="product-category">Category</p> -->
												<h3 class="product-name"><a href="./product.php?id=<?php echo $arr1[$j][3]; ?>"><?php echo $arr1[$j][0]; ?></a></h3>
												<h4 class="product-price"><?php echo $arr1[$j][1]; ?></h4>
												<!-- <div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>	 -->
											</div>
											<form action="cart.php" method="post">
												<div class="add-to-cart">
													<input type="submit" value="add to cart"  class="add-to-cart-btn" name="addcart">
												</div>
												<input type="hidden" name="soluong" value="1">
												<input type="hidden" name="tensp" value="<?php echo $arr1[$j][0]; ?>">
												<input type="hidden" name="gia" value="<?php echo $arr1[$j][1]; ?>">
												<input type="hidden" name="hinh" value="<?php echo  $arr1[$j][2]; ?>">
												<input type="hidden" name="id" value="<?php echo  $arr1[$j][3]; ?>">
												
											</form>
										</div>
										<!-- /product -->	
										<?php 
											}
											mysqli_close($conn);
										?>									
									</div>
									<!-- <div id="slick-nav-2" class="products-slick-nav"></div> -->
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- /Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- NEWSLETTER -->
		<div id="newsletter" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="newsletter">
							<p>Sign Up for the <strong>NEWSLETTER</strong></p>
							<form>
								<input class="input" type="email" placeholder="Enter Your Email">
								<button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
							</form>
							<ul class="newsletter-follow">
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-instagram"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-pinterest"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /NEWSLETTER -->

		<!-- FOOTER -->
		<?php
		include('footer.php');
		?>
		<!-- /FOOTER -->

		<!-- jQuery Plugins -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/slick.min.js"></script>
		<script src="js/nouislider.min.js"></script>
		<script src="js/jquery.zoom.min.js"></script>
		<script src="js/main.js"></script>

	</body>
</html>
