<?php

  include_once ("connect.php"); 

?>


<!doctype html>
<html lang="en">
  <head>
    <title>Sidebar 07</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--
      <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fontawesome.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap-rtl.css">
	<link rel="stylesheet" href="css/validation.css">
	<link rel="stylesheet" href="css/notiflix-2.7.0.min.css">



  </head>
<style>
    * {
  	box-sizing: border-box;
  	-webkit-font-smoothing: antialiased;
  	-moz-osx-font-smoothing: grayscale;
}

body {
  	background-color: #435165;
      font-family: 'janna lt';
}
.login {
  	width: 400px;
  	background-color: #ffffff;
  	box-shadow: 0 0 9px 0 rgba(0, 0, 0, 0.3);
  	margin: 100px auto;
}
.login h1 {
  	text-align: center;
  	color: #5b6574;
  	font-size: 24px;
  	padding: 20px 0 20px 0;
  	border-bottom: 1px solid #dee0e4;
}
.login form {
  	display: flex;
  	flex-wrap: wrap;
  	justify-content: center;
  	padding-top: 20px;
}
.login form label {
  	display: flex;
  	justify-content: center;
  	align-items: center;
  	width: 50px;
  	height: 50px;
  	background-color: #3274d6;
  	color: #ffffff;
}
.login form input[type="password"], .login form input[type="text"] {
	width: 320px;
  	height: 50px;
  	border: 1px solid #dee0e4;
  	margin-bottom: 20px;
  	padding: 0 15px;
}
.login form input[type="submit"] {
  	width: 100%;
  	padding: 15px;
 	margin-top: 20px;
  	background-color: #3274d6;
  	border: 0;
  	cursor: pointer;
  	font-weight: bold;
  	color: #ffffff;
  	transition: background-color 0.2s;
}
.login form input[type="submit"]:hover {
	background-color: #2868c7;
  	transition: background-color 0.2s;
}
</style>
<body>
    <div class="login">
        <h1 > تسجيل الدخول </h1>
        <form action="processes.php" id="login_form" method="post">
            <div  style="display: inline-flex;">
				<label for="username">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="username" class="form-control" required placeholder="اسم المستخدم او البريد" id="username"
				data-parsley-error-message="<br><span style='color:red;'>ادخل اسم المستخدم</span>"    

				>
			</div>
			<div style="display: inline-flex;">
				<label for="password">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" class="form-control" name="password" placeholder="كلمة المرور" required id="password" 
				data-parsley-error-message="<br><span style='color:red;'>ادخل كلـــمة المــــــــــــــــرور</span>"    

				>
			</div>
            <input type="submit" name="loginBtn" value="دخول">
        </form>
    </div>

<script src="js/jquery.min.js"></script>
<script src="js/parsley.js"></script>
<script src="js/notiflix-aio-2.7.0.min.js"></script>
<script>
	$(document).ready(function () {
		$('#login_form').parsley();

	});

	function getParameterByName(name, url = window.location.href) {
    name = name.replace(/[\[\]]/g, '\\$&');
    var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, ' '));
}
var err =getParameterByName('err');
if (err != null) {
	switch (err.trim()) {
		case 'failed':Notiflix.Notify.Failure('اعد التسجيل الدخول لقد حدث خطأ ما');			
			break;
		default:Notiflix.Notify.Failure('كلمة المرور او اسم المستخدم غير صحيح');			
			break;
	}
}
</script>
</body>
</html>