<!DOCTYPE html>
<html lang="en">

<?php include('./head.php'); ?> 

<body>
    <!-- HEADER -->
    <?php include('./header.php'); ?>
    <!-- /HEADER -->


    <!-- BREADCRUMB -->
    <div id="breadcrumb" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <h3 class="breadcrumb-header">Checkout</h3>
                    <!-- <ul class="breadcrumb-tree">
							<li><a href="#">Home</a></li>
							<li class="active">Checkout</li>
						</ul> -->
                </div>
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
                <form action="./addorder.php" method="post">
                <div class="col-md-7">
                    <!-- Billing Details -->
                    <div class="billing-details">
                        <div class="section-title">
                            <h3 class="title">Billing address</h3>
                        </div>
                        <?php
                            $user = (isset($_SESSION['user']))?$_SESSION['user']:[];
                            if(isset($user['name'])){ 
                        ?>
                        <div class="form-group">
                            <input class="input" type="text" name="name" placeholder="Name" value="<?php echo $user['name']; ?>">
                        </div>
                        <div class="form-group">
                            <input class="input" type="email" name="email" placeholder="Email" value="<?php echo $user['email']; ?>">
                        </div>
                        <?php }else{?>
                            <div class="form-group">
                            <input class="input" type="text" name="name" placeholder="Name" >
                            </div>
                            <div class="form-group">
                                <input class="input" type="email" name="email" placeholder="Email" >
                            </div>
                        <?php } ?>
                        <div class="form-group">
                            <input class="input" type="text" name="address" placeholder="Address">
                        </div>
                        <div class="form-group">
                            <input class="input" type="tel" name="tel" placeholder="Telephone">
                        </div>
                    </div>
                    <!-- /Billing Details -->
                </div>

                <!-- Order Details -->
                <div class="col-md-5 order-details">
                    <div class="section-title text-center">
                        <h3 class="title">Your Order</h3>
                    </div>
                    <div class="order-summary">
                        <div class="order-col">
                            <div><strong>PRODUCT</strong></div>
                            <div><strong>TOTAL</strong></div>
                        </div>
                        <?php
                             $tong = 0;
                             if(isset($_SESSION['giohang'])&&(is_array($_SESSION['giohang']))){
                                 
                                 for($i = 0; $i < sizeof($_SESSION['giohang']); $i++){
                                     $thanhtien = $_SESSION['giohang'][$i][2] * $_SESSION['giohang'][$i][3];
                                     $tong += $thanhtien;        
                             
                        ?>
                        <div class="order-products">
                            <div class="order-col">
                                <div><?php echo $_SESSION['giohang'][$i][3];?>x &nbsp; <span><?php echo $_SESSION['giohang'][$i][1];?></span> </div>
                                <div><?php echo $_SESSION['giohang'][$i][2];?></div>
                            </div>                            
                        </div>
                        <?php } ?>
                        <div class="order-col">
                            <div>Shiping</div>
                            <div><strong>FREE</strong></div>
                        </div>
                        <div class="order-col">
                            <div><strong>TOTAL</strong></div>
                            <div><strong class="order-total" ><?php echo $tong;?></strong></div>
                        </div>
                    </div>
                     <?php } ?>
                    
                    <input type="submit" value="Place order" class="primary-btn order-submit" name="order">
                </div>
                <!-- /Order Details -->
                </form>
                
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
   <?php include('./footer.php'); ?>
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