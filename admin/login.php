<?php
require_once("xuly_database/initialize.php");

 ?>
  <?php
  if(isset($_SESSION['U_id'])){
    redirect(web_root."admin/index.php");
  }
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login | NoiseCha </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="source/images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="source/source/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="source/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="source/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="source/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="source/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="source/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="source/css/util.css">
	<link rel="stylesheet" type="text/css" href="source/css/main.css">

</head>
<body>
	<div class="limiter" >
		<div class="container-login100" style="background-image: url('images/img-01.jpg');">

			<div class="wrap-login100">
				<form method="post" action=""  class="login100-form validate-form" >
					<div class="login100-form-avatar">
						<img src="source/images/LOGO.jpg" alt="AVATAR">
					</div>

					<span class="login100-form-title p-t-20 p-b-45">
						Quản Lý NoiseCha
					</span>

				 	<?php echo check_message(); ?>
					<div class="wrap-input100 validate-input m-b-10" data-validate = "Chưa nhập tài khoản">
						<input class="input100" type="text"  name="user_email"  placeholder="Tài Khoản">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "Chưa nhập mật khẩu">
						<input class="input100" type="password" name="user_pass" placeholder="Mật Khẩu">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
					</div>

					<div class="container-login100-form-btn p-t-10">
						<button  type="submit" name="btnLogin"  class="login100-form-btn">
							Đăng Nhập
						</button>
					</div>
 
				</form>
			</div>
		</div>
	</div>

	<script src="source/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="source/vendor/bootstrap/js/popper.js"></script>
	<script src="source/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="source/vendor/select2/select2.min.js"></script>
	<script src="source/js/main.js"></script>
</body>
</html>

<?php 

if(isset($_POST['btnLogin'])){
  $email = trim($_POST['user_email']);
  $upass  = trim($_POST['user_pass']);
  $h_upass = sha1($upass);
  
   if ($email == '' OR $upass == '') {
      message("Invalid Username and Password!", "error");
      redirect("login.php");
         
    } else {  
    $user = new User();
    $res = $user::userAuthentication($email, $h_upass);
    if ($res==true) { 
       message("You logon as ".$_SESSION['role'].".","success");
      if ($_SESSION['role']=='Administrator'){
         redirect(web_root."admin/index.php");
      }else{
           redirect(web_root."admin/login.php");
      }
    }else{
      message("Account does not exist! Please contact Administrator.", "error");
       redirect(web_root."admin/login.php"); 
    }
 }
 } 
 ?> 