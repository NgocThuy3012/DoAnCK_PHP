<!DOCTYPE html>
<html lang="en">
	<?php include('head.php'); ?>
	<body>
		<!-- HEADER -->
		<?php include(('header.php')); ?>
		<!-- /HEADER -->

		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<!-- <ul class="main-nav nav navbar-nav">
						<li class="active"><a href="#">Home</a></li>
						<li><a href="#">Hot Deals</a></li>
						<li><a href="#">Categories</a></li>
						<li><a href="#">Laptops</a></li>
						<li><a href="#">Smartphones</a></li>
						<li><a href="#">Cameras</a></li>
						<li><a href="#">Accessories</a></li>
					</ul> -->
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->

		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<!-- <div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">Regular Page</h3>
						<ul class="breadcrumb-tree">
							<li><a href="#">Home</a></li>
							<li class="active">Blank</li>
						</ul>
					</div>
				</div> -->
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->
<?php 
    include('conndb.php');
	
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
		<!-- SECTION -->
		<!-- <div class="section" style="width: 100%;"> -->
			<!-- container -->
			<!-- <div class="container" style="width: 100%;"> -->
				<!-- row -->
				<!-- <div class="row"> -->
				<div class=" register_form" id="login-register">		
					<main>						
							<div class="container">
							<div class="login-form" id="login">
							<!-- =================================== -->
							<?php  
									$user = (isset($_SESSION['user']))?$_SESSION['user']:[];
									if(isset($user['name'])){
								?>
								<form action="./logout.php" method="post" id="form1">
								<h1>Logout</h1>
								<!-- <div class="input-box">
									<i ></i>
									<input type="email" placeholder="Nhập email" id="ten" name="email_dn">
									<div class="err"><span><?php echo (isset($err['e']))?$err['e']:''; ?></span></div>
								</div>
								<div class="input-box">
									<i ></i>
									<input type="password" placeholder="Nhập mật khẩu" id="pass" name="pass_dn">
									<div class="err"><span><?php echo (isset($err['e']))?$err['e']:''; ?></span></div>
								</div>
								<div id="createAccount"><a href="./register.php">Create an account</a></div> -->
								
								<div class="btn-box">
									<button type="submit">
										Logout
									</button>
								</div>
							</form>				
								
								
								<?php 
									}else{ 
								?>
								<form action="./home.php" method="post" id="form1">
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
								<div id="createAccount"><a href="./register.php">Create an account</a></div>
								
								<div class="btn-box">
									<button type="submit">
										Login
									</button>
								</div>
							</form>			
								<?php
									} 
								?>
								<!-- =================================== -->	
								
						</div>								
							</div>
						</div>
					</main>
				</div>
				<!-- </div> -->
				<!-- /row -->
			<!-- </div> -->
			<!-- /container -->
		<!-- </div> -->
		<!-- /SECTION -->
		<style>
			
			.register_form{				
				display: block;
				/* position: fixed;
				z-index: 1;
				padding-top: 100px;
				left: 0;
				top: 0;
				width: 100%;
				height: 100%;
				overflow: auto;
				background-color: rgb(0, 0, 0);
				background-color: rgba(0, 0, 0, 0.4); */
				
			}
			
			 main{
				background-color: #dddddd;
				min-height: 300px;
				/* padding: 7.5px 15px; */
				width: 100%;
				margin: 0 auto;
				
			}

			.register_form .container{
				width: 100%;
				max-width: 1200px;
				margin-left: auto;
				margin-right: auto;
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
		</style>
		<script>
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
