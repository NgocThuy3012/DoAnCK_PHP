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

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<?php
								
                                include('conndb.php');
								if(isset( $_GET['abc'])){
									echo '<a  href="abc.html">kết quả</a>';
									
								}elseif(isset( $_GET['id'])){
									$id =$_GET['id'];
								}
							?>
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
							
							<?php 
                                								
								$sql1="select book_name, price, img,book_id from book where cat_id= '$id'";
								$result1=mysqli_query($conn,$sql1);
								$arr1= array();
								$t=0;
								while($row=mysqli_fetch_assoc($result1) ){
									$arr1[$t]= array($row['book_name'], $row['price'], $row['img'], $row['book_id']);
									$t++;
								}
								for($j=0;$j<count($arr1);$j+=3){
										
								?>
                            <div class="products-tabs " style=" padding-bottom: 50px;">
								<!-- tab -->
								<div id="tab2" class="tab-pane fade in active">
									<div class="products-slick" data-nav="#slick-nav-2">
										<!-- product -->
										<div class="product padding">
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
                                        <!-- product -->
										<div class="product padding">
											<div class="product-img">
                                                <a href="./product.php?id=<?php echo $arr1[$j+1][3]; ?>"><img src="./img/<?php echo $arr1[$j+1][2]; ?>" alt=""style="width: 200px; height:200px;"></a>
												
												<!-- <div class="product-label">
													<span class="sale">-30%</span>
													<span class="new">NEW</span>
												</div> -->
											</div>
											<div class="product-body">
												<!-- <p class="product-category">Category</p> -->
												<h3 class="product-name"><a href="./product.php?id=<?php echo $arr1[$j+1][3]; ?>"><?php echo $arr1[$j+1][0]; ?></a></h3>
												<h4 class="product-price"><?php echo $arr1[$j+1][1]; ?></h4>
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
												<input type="hidden" name="tensp" value="<?php echo $arr1[$j+1][0]; ?>">
												<input type="hidden" name="gia" value="<?php echo $arr1[$j+1][1]; ?>">
												<input type="hidden" name="hinh" value="<?php echo  $arr1[$j+1][2]; ?>">
												<input type="hidden" name="id" value="<?php echo  $arr1[$j+1][3]; ?>">
											</form>
										</div>
                                        <!-- /product -->
                                        <!-- product -->
										<div class="product padding">
											<div class="product-img">
                                                <a href="./product.php?id=<?php echo $arr1[$j+2][3]; ?>"><img src="./img/<?php echo $arr1[$j+2][2]; ?>" alt=""style="width: 200px; height:200px;"></a>
												
												<!-- <div class="product-label">
													<span class="sale">-30%</span>
													<span class="new">NEW</span>
												</div> -->
											</div>
											<div class="product-body">
												<!-- <p class="product-category">Category</p> -->
												<h3 class="product-name"><a href="./product.php?id=<?php echo $arr1[$j+2][3]; ?>"><?php echo $arr1[$j+2][0]; ?></a></h3>
												<h4 class="product-price"><?php echo $arr1[$j+2][1]; ?></h4>
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
												<input type="hidden" name="tensp" value="<?php echo $arr1[$j+2][0]; ?>">
												<input type="hidden" name="gia" value="<?php echo $arr1[$j+2][1]; ?>">
												<input type="hidden" name="hinh" value="<?php echo  $arr1[$j+2][2]; ?>">
												<input type="hidden" name="id" value="<?php echo  $arr1[$j+2][3]; ?>">
											</form>
										</div>
                                        <!-- /product -->
                                    </div>
									<!-- <div id="slick-nav-2" class="products-slick-nav"></div> -->
								</div>
								<!-- /tab -->
							</div>										
							<?php
                                }
                                mysqli_close($conn);
                            ?>									
									
						</div>
					</div>
					<!-- /Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		

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
