<?php
session_start();
//require_once __DIR__.'template/header.php';
require 'template/header.php';
require "control/user.php";
$msg='';
if (isset($_POST['sub'])) {
	# code...
	 $user=new User();
	$email=strip_tags($_POST['email']);
	$pass=strip_tags($_POST['pass']);
	$msg=$user->login($email,$pass);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<link rel="stylesheet" type="text/css" href="template/style.css">
	<title></title>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 


  <link href="https://fonts.googleapis.com/css?family=Amiri&display=swap" rel="stylesheet">
  <style>
 .footer {
	position: fixed;
	left: 0;
	bottom: 0;
	top:88%;
	width: 100%;
	
	
	text-align: center;
  } 
  </style>
</head>
<body>
<section dir="rtl" class="section-forms">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<img src="image/logo.jpg" class="rounded mx-auto d-block">
			</div>
			<div class="col-12 text-center">
				<h4>ملتقى العمداء في الجامعات السعودية الرابع والعشرين</h4>
			</div>

			<div class="col-12 col-sm-12 ">
				<?php
				if ($msg=='user error') {
					echo '<div class="alert alert-danger text-center">البريد الالكتروني او كلمة الكرور غير صحيحة </div>';
				}


				?>
				<form class="forms" method="POST">
					<div class="form-group ">
						<div class="col-sm-6 col-md-4">
							<input type="email" name="email" class="form-control" placeholder="البريد الالكتروني ">
						</div>
					</div>

					<div class="form-group ">
						<div class="col-sm-6 col-md-4">
							<input type="password" name="pass" class="form-control" placeholder="كلمة المرور">
						</div>
					</div>

					<div class="form-group row">
						<div class="col-sm-6 col-md-4">
							<input type="submit" name="sub" class="btn btn-info btn-block" value="دخول ">
								<a href="register.php" class="btn btn-info btn-block">تسجيل جديد </a>
						</div>
						
					</div>

					
				</form>
			</div>
		</div>
	</div>
</section>


<footer class="footer">
<div class="container">
<div class="row">

<div class="col-4">

</div>
<div class="col-4 col-sm-12">
<div class="text-center">
<p>Developer by :Abdulrahman AlJarallah</p>
<p>@2020</p>
</div>
</div>

<div class="col-4">

</div>
</div>
</div>
</footer>
</body>
</html>



<?php
//require_once __DIR__.'template/footer.php';
require 'template/footer.php';
?>