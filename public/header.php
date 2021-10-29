<?php

  include_once ("connect.php"); 
  include_once("processes.php");
  confirm_logged_in();

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
    <link rel="stylesheet" href="css/fontawesome.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="DataTables/DataTables-1.10.21/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap-rtl.css">
    <link rel="stylesheet" href="css/validation.css">
    <link rel="stylesheet" href="css/notiflix-2.7.0.min.css">

  </head>
<body >
      

      
    <div class="wrapper d-flex align-items-stretch" style="font-family: cairo;font-weight: 500;">
      <nav id="sidebar" class="" style="font-family: cairo;font-weight: 500;">
        <h1>
          <a href="index.php" class="logo">Y</a>
        </h1>
        <ul class="list-unstyled components mb-5">
          <li class="active">
            <a href="index"><span class="fa fa-home"></span> الرئيسية</a>
          </li>
          <li class="nav-item dropdown ">
            <a href="workers"><span class="fa fa-user"></span> العمال</a>
          </li>
          <li>
            <a href="builds"><span class="fas fa-city"></span> المباني</a>
          </li>
          <li>
            <a href="merchants"> <span><i class="fas fa-poll   "></i></span> التاجر</a>
          </li>
          <li>
            <a href="setting.php"><span class="fa fa-cogs"></span> الاعدادات</a>
          </li>
          <li>
            <a href="processes?action=destory"><span  class="fa fa-info"> </span> تسجيل خروج</a>
          </li>
          
        </ul>

        <div class="footer">
          <p>
            Copyright &copy;<script>document.write(new Date().getFullYear());</script>  <i class="fa fa-laptop" aria-hidden="true"></i> Alyhyawy Tech
          </p>
        </div>
      </nav>  

    <!-- Page Content  -->
<div id="content" class="p-4 p-md-5">

    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="font-family: cairo;">
      <div class="container-fluid">

        <button type="button" id="sidebarCollapse" class="btn btn-primary">
          <i class="fa fa-bars"></i>
          <span class="sr-only">Toggle Menu</span>
        </button>
        <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="nav navbar-nav ml-auto text-center">
            <li class="nav-item active">
                <a class="nav-link" href="index">الرئيسية</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="workers">العمال</a>
            </li> 
            <li class="nav-item">
                <a class="nav-link" href="builds">المباني</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="merchants">التاجر </a>
            </li>
            
          </ul>
        </div>
      </div>
    </nav>
