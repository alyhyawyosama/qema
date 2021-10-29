<?php

$error = $_SERVER["REDIRECT_STATUS"]??null;

$errorMsg = '';
$comeBack ='' ;

if ($error == 404) {
    $errorMsg = "الصفحة غير موجودة 404";
    $comeBack ="اضغط هنا للعودة";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body style="background-color:#E9ECEC ;">
<div class="container-fluid" style="margin-top:15%">
    <div class="jumbotron text-center bg-light">
        <span style="font-size: 40px; color:red"><?php echo $errorMsg; ?></span>
        <br>
        <a href="index" > <?php echo $comeBack; ?> </a>
    </div>
</div>

</body>
</html>