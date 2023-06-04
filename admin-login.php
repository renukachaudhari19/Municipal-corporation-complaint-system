<?php
session_start();
?><!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Municiple Corporation | User Login</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<meta name="keywords" content="District Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"
	/>
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--// Meta tag Keywords -->

	<!-- Custom-Files -->
	<link rel="stylesheet" href="1/css/bootstrap.css">
	<!-- Bootstrap-Core-CSS -->
	<link rel="stylesheet" href="1/css/style.css" type="text/css" media="all" />
	<!-- Style-CSS -->
	<link rel="stylesheet" href="1/css/fontawesome-all.css">
	<!-- Font-Awesome-Icons-CSS -->
	<!-- //Custom-Files -->

	<!-- Web-Fonts -->
	<link href="//fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
	    rel="stylesheet">
	<!-- //Web-Fonts -->
</head>

<body>
	<!-- banner -->
	<div class="bannerbg-w3l bannerbg-w3l-inner">
		<!-- header -->
		<?php include "1/include/header.php"; ?>
		<!-- //header -->
		<!-- banner-text -->
		<div class="banner-w3ltext about-w3bnr">
			<div class="container">
				<h1 class="text-white text-center">
					<a href="index.html">Home</a> / Admin Login</h1>
			</div>
		</div>
		<!-- //banner-text -->
	</div>
	<!-- login -->
	
	<!-- //login -->
	<!-- register -->
	<?php
include 'admin/Application/DB_Functions.php';

$obj= new Connections(); // Now we create the object of AdminConnection class and through that object we are going to call connection
if(isset($_POST['username']) && isset($_POST['password']))
            {
        $name=strip_tags($_POST['username']);
        $password=strip_tags($_POST['password']); 

        if ($obj->CheckLogin($name, $password)==TRUE) // Here we call the CheckLogin function for admin login through the object        
        {
            $_SESSION['name']=$name;
            echo "<script>window.location='admin/dashboard.php';</script>";

        }
        else
        {
        echo "<script>alert('Incorrect Username and Password');</script>";
        }

}


?>

	<!--//register-->
	<!-- //banner -->

	<!-- contact -->
	<section class="wthree-row w3-contact py-5">
		<div class="container py-xl-5 py-lg-3">
			
			<div class="row contact-form py-3">
				<!-- contact map -->
				<div class="col-lg-6 map text-center">
					
					<img src="1/images/admin.jpg" alt="" class="img-fluid" />
				</div>
				<!-- //contact map -->
				<!-- contact form -->
				<div class="col-lg-6 wthree-form-left mt-lg-0 mt-5">
					<div class="contact-top1">
						
                <form name="loginform" id="loginform" action="" method="post">
                    <p>
                        <label for="user_login" style="width:100%;">Username<br />
                            <input type="text" name="username" id="user_login" class="form-control"   size="20" required /></label>
                    </p>
                    <p>
                        <label for="user_pass" style="width:100%;">Password<br />
                            <input type="password" name="password" id="user_pass" class="form-control"   size="20" required /></label>
                    </p>
                    <p class="forgetmenot">
                      <a href="register.php" style="color:black;">Register</a>
                    </p>



                    <p class="submit">
                        <input type="submit" name="wp-submit" id="wp-submit" class="btn btn-orange btn-block" value="Sign In" />
                    </p>
               
                </form>
					</div>
				</div>
				<!-- //contact form -->
			</div>
		</div>
	</section>
	<!-- //contact -->
<?php include "1/include/footer.php"; ?>


	<!-- Js files -->
	<!-- JavaScript -->
	<script src="1/js/jquery-2.2.3.min.js"></script>
	<!-- Default-JavaScript-File -->
	<script src="1/js/bootstrap.js"></script>
	<!-- Necessary-JavaScript-File-For-Bootstrap -->

	<!-- password-script -->
	<script>
		window.onload = function () {
			document.getElementById("password1").onchange = validatePassword;
			document.getElementById("password2").onchange = validatePassword;
		}

		function validatePassword() {
			var pass2 = document.getElementById("password2").value;
			var pass1 = document.getElementById("password1").value;
			if (pass1 != pass2)
				document.getElementById("password2").setCustomValidity("Passwords Don't Match");
			else
				document.getElementById("password2").setCustomValidity('');
			//empty string means no validation error
		}
	</script>
	<!-- //password-script -->

	<!-- smooth scrolling -->
	<script src="1/js/SmoothScroll.min.js"></script>
	<!-- //smooth scrolling -->

	<!-- move-top -->
	<script src="1/js/move-top.js"></script>
	<!-- easing -->
	<script src="1/js/easing.js"></script>
	<!--  necessary snippets for few javascript files -->
	<script src="1/js/district.js"></script>

	<script src="1/js/bootstrap.js"></script>
	<!-- Necessary-JavaScript-File-For-Bootstrap -->
	<!-- //Js files -->

</body>

</html>