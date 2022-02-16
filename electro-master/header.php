<?php
	session_start();
	include('conndb.php');
	//dang ky
	if(isset($_POST['tendk'])){
		$name=$_POST['tendk'];
		$email=$_POST['email'];
		$pass=$_POST['passdk'];
		$password = md5($pass);
		$sqldk = "INSERT INTO users(email, password, name)VALUES('$email', '$password', '$name')";
		$query = mysqli_query($conn,$sqldk);
	}
	$err = [];
	//dang nhap
	if(isset($_POST['email_dn'])){
		$email = $_POST['email_dn'];
		$passdn = $_POST['pass_dn'];
		$sqldn = "SELECT * FROM users WHERE email = '$email'";
		$quer = mysqli_query($conn,$sqldn);
		$data = mysqli_fetch_assoc($quer);
		$checkEmail = mysqli_num_rows($quer);
		if($checkEmail==1){
			$checkPass = md5($passdn);
			if($checkPass == $data['password']){
				$_SESSION['user'] = $data;
				header('location: home.php');
			}else{
				$err['mk']= "Sai mật khẩu";
				// echo "sai mat khau";
			}
		}else{
			$err['e']="Email không tồn tại";
			// echo "Email k ton tai";
		}
	}
?>
<html>
<body>
		<!-- HEADER -->
		<header>
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<li><a href="#"><i class="fa fa-phone"></i> +021-95-51-84</a></li>
						<li><a href="#"><i class="fa fa-envelope-o"></i> email@email.com</a></li>
						<li><a href="#"><i class="fa fa-map-marker"></i> 1734 Stonecoal Road</a></li>
					</ul>
					<!-- <ul class="header-links pull-right">
						<li><a href="#"><i class="fa fa-dollar"></i> USD</a></li>
						<li><a href="#"><i class="fa fa-user-o"></i> My Account</a></li>
					</ul> -->
				</div>
			</div>
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="#" class="logo">
									<img src="./img/logo.png" alt="">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">
								<form>
									<select class="input-select">
										<option value="0">All Categories</option>
										<option value="1">Category 01</option>
										<option value="1">Category 02</option>
									</select>
									<input class="input" placeholder="Search here">
									<button class="search-btn">Search</button>
								</form>
							</div>
						</div>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
								<!-- Wishlist -->
								<?php  
									$user = (isset($_SESSION['user']))?$_SESSION['user']:[];
									if(isset($user['name'])){
								?>
								
								<div id="myUser">
									<a href="./login.php"><i class="fa fa-user-o"></i> <?php echo $user['name']; ?></a>
									<!-- <a href=""><i class="fa fa-user-o"></i> <?php echo $user['name']; ?><b class="caret"></b></a>
									<ul class="logout" id="logout">
										<li><a href="logout.php">Log out</a></li>
									</ul> -->
								</div>
								<?php 
									}else{ 
								?>
								<div id="myAccount">
									<a href="./login.php"><i class="fa fa-user-o"></i> My Account</a>
								</div>
								<?php
									} 
								?>
								<!-- /Wishlist -->

								<!-- Cart -->
								<div class="dropdown">
									<a  href="./cart.php">
										<i class="fa fa-shopping-cart"></i>
										<span>Your Cart</span>
										<!-- <div class="qty">3</div> -->
									</a>
									<!-- <div class="cart-dropdown">
										<div class="cart-list">
											<div class="product-widget">
												<div class="product-img">
													<img src="./img/product01.png" alt="">
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="#">product name goes here</a></h3>
													<h4 class="product-price"><span class="qty">1x</span>$980.00</h4>
												</div>
												<button class="delete"><i class="fa fa-close"></i></button>
											</div>

											<div class="product-widget">
												<div class="product-img">
													<img src="./img/product02.png" alt="">
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="#">product name goes here</a></h3>
													<h4 class="product-price"><span class="qty">3x</span>$980.00</h4>
												</div>
												<button class="delete"><i class="fa fa-close"></i></button>
											</div>
										</div>
										<div class="cart-summary">
											<small>3 Item(s) selected</small>
											<h5>SUBTOTAL: $2940.00</h5>
										</div>
										<div class="cart-btns">
											<a href="#">View Cart</a>
											<a href="#">Checkout  <i class="fa fa-arrow-circle-right"></i></a>
										</div>
									</div> -->
								</div>
								<!-- /Cart -->

								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->
        
		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li ><a href="home.php">Home</a></li>
						<?php 
							include('conndb.php');											
							$sql='select * from category';
							$result=mysqli_query($conn,$sql);
							$arr= array();
							$i=0;
							while($row=mysqli_fetch_assoc($result) ){
								$arr[$i]= array($row['cat_name'], $row['cat_id']);
								$i++;
							}
							for($j=0;$j<count($arr);$j++){
										
						?>
						<li class="hower"><a href="product_cat.php?id=<?php echo  $arr[$j][1]; ?>"><?php echo  $arr[$j][0]; ?></a></li>
						<?php
							}
							mysqli_close($conn);
						?>
						<!-- <li><a href="#">Từ điển</a></li>
						<li><a href="#">Giáo khoa</a></li>						 -->
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->
		
		<!-- <div class="login_form" id="login-register">		
			<main>
				<div class="exit" id="exit"><a href="">X</a></div>
					<div class="container">
						<div class="login-form" id="login">
							<form action="" method="post" id="form1">
								<h1>Login</h1>
								<div class="input-box">
									<i ></i>
									<input type="email" placeholder="Nhập email" id="ten" name="email_dn">
									<div class="err"><span><?php echo (isset($err['e']))?$err['e']:''; ?></span></div>
								</div>
								<div class="input-box">
									<i ></i>
									<input type="password" placeholder="Nhập mật khẩu" id="pass" name="pass_dn">
									<div class="err"><span><?php echo (isset($err['e']))?$err['e']:''; ?></span></div>
								</div>
								<div id="createAccount"><a href="">Create an account</a></div>
								<div class="btn-box">
									<button type="submit">
										Login
									</button>
								</div>
							</form>				
						</div>
						<div class="register-form" id="register">
							<form action="home.php" method="post"id="form2">
								<h1>Register</h1>
								<div class="input-box">
									<i ></i>
									<input type="text" placeholder="Nhập username" name="tendk1">
								</div>
								<div class="input-box">
									<i ></i>
									<input type="email" placeholder="Nhập email" name="email1">
								</div>
								<div class="input-box">
									<i ></i>
									<input type="password" placeholder="Nhập mật khẩu" name="passdk1">
								</div>
								
								<div class="btn-box">
									<button type="submit">
										Register
									</button>
								</div>
							</form>				
						</div>
					</div>
				</div>
        	</main>
		</div> -->
		
		
		<style>
			.logout{
				display: none;
				color: #FFF;
				background-color: #ffffff;
				position: fixed;
				width: 90px;
				height: 25px;
				text-align:center;
			}
			.login_form{				
				display: none;
				position: fixed;
				z-index: 1;
				padding-top: 100px;
				left: 0;
				top: 0;
				width: 100%;
				height: 100%;
				overflow: auto;
				background-color: rgb(0, 0, 0);
				background-color: rgba(0, 0, 0, 0.4);
				
			}
			.exit{
				float:right;
			}

			 main{
				background-color: #dddddd;
				min-height: 300px;
				padding: 7.5px 15px;
				width: 500px;
				margin: 0 auto;
				
			}

			.container{
				width: 100%;
				max-width: 1200px;
				margin-left: auto;
				margin-right: auto;
			}
			.login-form{
				display: block;
				width: 100%;
				max-width: 400px;
				margin: 20px auto;
				background-color: #ffffff;
				padding: 15px;
				border: 2px dotted #cccccc;
				border-radius: 10px;
			}
			.register-form{
				display: none;
				width: 100%;
				max-width: 400px;
				margin: 20px auto;
				background-color: #ffffff;
				padding: 15px;
				border: 2px dotted #cccccc;
				border-radius: 10px;
			}
			
			.login-form a{
				color: #D10024;
				font-size: 10px;
			}
			h1{
				color: #D10024;
				font-size: 20px;
				margin-bottom: 30px;
			}
			.input-box{
				margin-bottom: 20px;
			}
			.input-box input{
				padding: 7.5px 15px;
				width: 100%;
				border: 1px solid #cccccc;
				outline: none;
			}
			.btn-box{
				text-align: right;
				margin-top: 30px;
			}
			.btn-box button{
				padding: 12px 30px;
				background-color: #D10024;
				border: none;
				border-radius: 40px;
				color: #FFF;
				text-transform: uppercase;
				font-weight: 700;
				text-align: center;
				-webkit-transition: 0.2s all;
				transition: 0.2s all;
			}
			.message {
				position: absolute;
				padding-left: 3px;
				color: red;
				font-size: 13px;
				margin-bottom:35px;
			}
			.err{
				position: absolute;
				padding-left: 3px;
				color: red;
				font-size: 13px;
				margin-bottom:35px;
			}
		</style>
		<script>
	
			document.getElementById("myAccount").onclick = function(){
				document.getElementById("login-register").style.display = "block";				
			};
		
			document.getElementById("myUser").onclick = function(){
				var item1 = document.getElementById("logout");
				if(item1.style.display==="none"){
					item1.style.display = "block";
				}else{
					item1.style.display = "none";					
				}
			};
			
			document.getElementById("exit").onclick = function(){
				getElementById("login-register").style.display = "none";									
			};
			
			document.getElementById("createAccount").onclick = function(){
				var item3 = document.getElementById("register");
				if(item3.style.display==="block"){
					item3.style.display = "none";
				}else{
					item3.style.display = "block";
					document.getElementById("login").style.display = "none";
				}
			};
			
		</script>
		<script>
        	const handleUI = (inputElement, errorSelector, errorMessage) => {
				const parentElement = inputElement.parentElement
				const formMessageElement = parentElement.querySelector(errorSelector)

					if (errorMessage) {
						formMessageElement.innerText = errorMessage
						parentElement.classList.add("invalid")
					} else {
						formMessageElement.innerText = ""
						parentElement.classList.remove("invalid")
					}
			}

			// const handleValidate

			const Validator = ({ form, errorSelector, rules }) => {
				let firstSubmit = false

				const selectorRules = {}

				const formElement = document.querySelector(form)

				if (formElement) {
					formElement.addEventListener("submit", (event) => {
						firstSubmit = true
						rules.forEach(({ selector }) => {
							const inputElement = formElement.querySelector(selector)
							let errorMessage
							const inputElementRules = selectorRules[selector]

							for (let i = 0; i < inputElementRules.length; i++) {
								errorMessage = inputElementRules[i](inputElement.value)

								if (errorMessage) {
									event.stopImmediatePropagation()
									event.preventDefault()
									handleUI(inputElement, errorSelector, errorMessage)
									break
								}
							}
						})
					})

					rules.forEach(({ selector, validate }) => {
						const inputElement = formElement.querySelector(selector)

						if (Array.isArray(selectorRules[selector])) {
							selectorRules[selector].push(validate)
						} else {
							selectorRules[selector] = [validate]
						}

						if (inputElement) {
							inputElement.onblur = () => {
								if (firstSubmit) {
									let errorMessage
									const inputElementRules = selectorRules[selector]
									for (let i = 0; i < inputElementRules.length; i++) {
										errorMessage = inputElementRules[i](
											inputElement.value
										)
										if (errorMessage) break
									}

									handleUI(inputElement, errorSelector, errorMessage)
								}
							}
							inputElement.oninput = () => {
								handleUI(inputElement, errorSelector)
							}
						}
					})
				}
			}

			// return undefined if pass rule
			Validator.isRequired = (selector, message) => {
				return {
					selector,
					validate(value) {
						return value.trim()
							? undefined
							: message || "Vui lòng nhập trường này"
					},
				}
			}
			Validator({
			form:'#form1',
			errorSelector:".message",
			rules:[
				Validator.isRequired('#ten'),

				Validator.isRequired('#pass'),
				
			]
			})
		</script>
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/slick.min.js"></script>
		<script src="js/nouislider.min.js"></script>
		<script src="js/jquery.zoom.min.js"></script>
		<script src="js/main.js"></script>
</body>
</html>