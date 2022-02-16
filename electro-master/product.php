<!DOCTYPE html>
<html lang="en">
	<?php include('head.php');?>
	<body>
		<!-- HEADER -->
		<?php 
			include('header.php');
			 
		?> 
		<!-- /HEADER -->

		
		<!-- /NAVIGATION -->

		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">					
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
				<?php
					$id= $_GET['id'];
					include('conndb.php');					
					$sql="SELECT * FROM `book` sp 
					WHERE sp.book_id ='$id'";
					$result=mysqli_query($conn,$sql);
					$row = mysqli_fetch_array($result);
					// var_dump($row);
										
				?>
					<!-- Product main img -->
					<div class="col-md-5 col-md-push-2">
						<div id="product-main-img">
							<div class="product-preview">
								<img src="./img/<?php echo $row[4];?>" alt="">
							</div>						
						</div>
					</div>
					<!-- /Product main img -->

					<!-- Product thumb imgs -->
					<div class="col-md-2  col-md-pull-5">
						<div id="product-imgs">
							<div class="product-preview">
								<img src="./img/<?php echo $row[4];?>" alt="">
							</div>
						</div>
					</div>
					<!-- /Product thumb imgs -->

					<!-- Product details -->
					<div class="col-md-5">
						<div class="product-details">
							<h2 class="product-name"> <?php echo $row[1];?></h2>
							<!-- <div>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o"></i>
								</div>
								<a class="review-link" href="#">10 Review(s) | Add your review</a>
							</div> -->
							<div>
								<h3 class="product-price"><?php echo $row[3];?> 
							</div>
							<p> <?php echo $row[2];?></p>
							<div class="add-to-cart" >
								<div class="qty-label" style="width: 200px;">
									 <label for=".form-control">Qty</label>
									<!-- <div class="input-number">
										<input type="number">
										<span class="qty-up">+</span>
										<span class="qty-down">-</span>
									</div> -->
									
								</div>
								<form action="cart.php" method="post">
								<div data-th="Quantity" style="width: 50px;padding-bottom:20px;"><input class="form-control text-center" value="1" type="number" name="soluong"></div>
									<div class="add-to-cart">
										<input type="submit" value="add to cart"  class="add-to-cart-btn" name="addcart">
									</div>
									
									<input type="hidden" name="tensp" value="<?php echo $row[1];?>">
									<input type="hidden" name="gia" value="<?php echo $row[3];?>">
									<input type="hidden" name="hinh" value="<?php echo $row[4];?>">
									<input type="hidden" name="id" value="<?php echo $row[0];?>">
								</form>
							</div>

							<!-- <ul class="product-btns">
								<li><a href="#"><i class="fa fa-heart-o"></i> add to wishlist</a></li>
								<li><a href="#"><i class="fa fa-exchange"></i> add to compare</a></li>
							</ul> -->

							<ul class="product-links">
								<li>Category:</li>
								<?php 
									$sql1="SELECT cat_name FROM `category` 	WHERE cat_id ='$row[6]'";
									$result1=mysqli_query($conn,$sql1);
									$row1 = mysqli_fetch_array($result1);
								?>
								<li><a href="#"><?php echo $row1['cat_name'];?></a></li>
								<!-- <li><a href="#">Accessories</a></li> -->
							</ul>

							<!-- <ul class="product-links">
								<li>Share:</li>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#"><i class="fa fa-envelope"></i></a></li>
							</ul> -->

						</div>
					</div>
					<!-- /Product details -->

					<!-- Product tab -->
					<div class="col-md-12">
						<div id="product-tab">
							<!-- product tab nav -->
							<ul class="tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
								<!-- <li><a data-toggle="tab" href="#tab2">Details</a></li> -->
								<li><a data-toggle="tab" href="#tab3">Reviews </a></li>
							</ul>
							<!-- /product tab nav -->

							<!-- product tab content -->
							<div class="tab-content">
								<!-- tab1  -->
								<div id="tab1" class="tab-pane fade in active">
									<div class="row">
										<div class="col-md-12">
											<p> <?php echo $row[2];?></p>
										</div>
									</div>
								</div>
								<!-- /tab1  -->

								<!-- tab2  -->
								<div id="tab2" class="tab-pane fade in">
									<div class="row">
										<div class="col-md-12">
											<!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> -->
										</div>
									</div>
								</div>
								<!-- /tab2  -->

								<!-- tab3  -->
								<div id="tab3" class="tab-pane fade in">
									<div class="row">
										<!-- Rating -->
										<div class="col-md-3">
											<div id="rating">
												<div class="rating-avg">
													<?php 														
														$sum=0;
														//5
														$sql_5="SELECT count(`book_id`) as so FROM `rating` WHERE `star`=5 AND `book_id`= '$id'";
														$result_5=mysqli_query($conn,$sql_5);
														$n5=0;
														while($row=mysqli_fetch_assoc($result_5)){
															$n5=$row['so'];
														};
														//4
														$sql_4="SELECT count(`book_id`) as so FROM `rating` WHERE `star`=4 AND `book_id`= '$id'";
														$result_4=mysqli_query($conn,$sql_4);
														$n4=0;
														while($row=mysqli_fetch_assoc($result_4)){
															$n4=$row['so'];
														};
														//3
														$sql_3="SELECT count(`book_id`) as so FROM `rating` WHERE `star`=3 AND `book_id`= '$id'";
														$result_3=mysqli_query($conn,$sql_3);
														$n3=0;
														while($row=mysqli_fetch_assoc($result_3)){
															$n3=$row['so'];
														};
														//2
														$sql_2="SELECT count(`book_id`) as so FROM `rating` WHERE `star`=2 AND `book_id`= '$id'";
														$result_2=mysqli_query($conn,$sql_2);
														$n2=0;
														while($row=mysqli_fetch_assoc($result_2)){
															$n2=$row['so'];
														};
														//1
														$sql_1="SELECT count(`book_id`) as so FROM `rating` WHERE `star`=1 AND `book_id`= '$id'";
														$result_1=mysqli_query($conn,$sql_1);
														$n1=0;
														while($row=mysqli_fetch_assoc($result_1)){
															$n1=$row['so'];
														};
														$sum = ($n1*1 + $n2*2 + $n3*3 + $n4*4 + $n5*5)/($n1 + $n2 + $n3 + $n4 + $n5);
														$sql_sum ="SELECT COUNT(star)as so FROM `rating` WHERE `book_id`= '$id'";
														$result_sum =mysqli_query($conn,$sql_sum);
														$tong=0;
														while($row=mysqli_fetch_assoc($result_sum)){
															$tong = $row['so'];
														};
													?>
													<span><?php echo $sum ?></span>
													<div class="rating-stars">
													<?php 
														for($i=0;$i<$sum;$i++){
															echo '<i class="fa fa-star"></i>';
														}
														for($i=0;$i< (5 - $sum);$i++){
															echo '<i class="fa fa-star-o"></i>';
														}
													?>
														
													</div>
												</div>
												<ul class="rating">
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
														</div>
														<div class="rating-progress">
															<div style="width: <?php echo ($n5/$tong)*100; ?>%;"></div>
														</div>														
														<span class="sum"><?php echo $n5; ?></span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div style="width: <?php echo ($n4/$tong)*100; ?>%;"></div>
														</div>														
														<span class="sum"><?php echo $n4; ?></span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div>
																<div style="width: <?php echo ($n3/$tong)*100; ?>%;"></div>
															</div>
														</div>
														<span class="sum"><?php echo $n3; ?></span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div>
																<div style="width: <?php echo ($n2/$tong)*100; ?>%;"></div>
															</div>
														</div>
														<span class="sum"><?php echo $n2; ?></span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div>
																<div style="width: <?php echo ($n1/$tong)*100; ?>%;"></div>
															</div>
														</div>
														<span class="sum"><?php echo $n1; ?></span>
													</li>
												</ul>
											</div>
										</div>
										<!-- /Rating -->

										<!-- Reviews -->
										<div class="col-md-6">
											<div id="reviews">
												<ul class="reviews">
												<?php 
													$review=mysqli_query($conn,"SELECT users.name, rating.review,`rating`.`star` FROM `rating` JOIN users ON rating.email=users.email WHERE book_id = '$id'");
													$arr_re= array();
													$t=0;
													while($row=mysqli_fetch_assoc($review) ){
														$arr_re[$t]= array($row['name'], $row['review'], $row['star']);
														$t++;
													}
													for($j=0;$j<count($arr_re);$j++){
														if($j>count($arr_re))
															break;	
													
												?>															
													<li>														
														<div class="review-heading">
															<h5 class="name"><?php echo $arr_re[$j][0]; ?></h5>
															<!-- <p class="date">27 DEC 2018, 8:0 PM</p> -->
															<div class="review-rating">
																<?php 
																	for($i=0;$i<$arr_re[$j][2];$i++){
																		echo '<i class="fa fa-star"></i>';
																	}
																	for($i=0;$i< (5 - $arr_re[$j][2]);$i++){
																		echo '<i class="fa fa-star-o empty"></i>';
																	}
																?>
																
																<!-- <i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																 -->
															</div>
														</div>
														<div class="review-body">
															<p><?php echo $arr_re[$j][1]; ?></p>
														</div>
													</li>
													
												<?php } ?>
												</ul>
												<!-- <ul class="reviews-pagination">
													<li class="active">1</li>
													<li><a href="#">2</a></li>
													<li><a href="#">3</a></li>
													<li><a href="#">4</a></li>
													<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
												</ul> -->
											</div>
										</div>
										<!-- /Reviews -->

										<!-- Review Form -->
										<div class="col-md-3">
											<div id="review-form">
												<form class="review-form" method="post" action="./rating.php">
													<input class="input" type="hidden" name="id" value="<?php echo $id;?>">
													<?php  
														$user = (isset($_SESSION['user']))?$_SESSION['user']:[];
														if(isset($user['name'])){
													?>
													<input class="input" type="hidden" name="email" value="<?php echo $user['email'];?>">
													<?php 
														}else{
															
															// header('location: login.php');
														} 
													?>
													<textarea class="input" placeholder="Your Review" name="review" value="NULL"></textarea>
													<div class="input-rating">
														<span>Your Rating: </span>
														<div class="stars">
															<input id="star5" name="rating" value="5" type="radio"><label for="star5"></label>
															<input id="star4" name="rating" value="4" type="radio"><label for="star4"></label>
															<input id="star3" name="rating" value="3" type="radio"><label for="star3"></label>
															<input id="star2" name="rating" value="2" type="radio"><label for="star2"></label>
															<input id="star1" name="rating" value="1" type="radio"><label for="star1"></label>
														</div>
													</div>
													<button class="primary-btn">Submit</button>
												</form>
											</div>
										</div>
										<!-- /Review Form -->
									</div>
								</div>
								<!-- /tab3  -->
							</div>
							<!-- /product tab content  -->
						</div>
					</div>
					<!-- /product tab -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
		<?php  mysqli_close($conn); ?>
		<!-- Section -->
		
		<!-- /Section -->

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
		<?php include('footer.php'); ?>
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
