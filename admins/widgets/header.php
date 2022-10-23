<?php include ("../config.php");?>
<?php 
    // check whether the user is logged in or not
    if(!isset($_SESSION['user'])){
      $_SESSION['noti'] = '<div class="alert alert-danger" role="alert">You Have To Access To The Dashboard
                          </div>';
      header('location:'.SITEURL.'login.php');
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="./styleb.css">
  </head>
  <body>
    <!-- Navbar Section -->
    <nav class="navbar navbar-expand-lg bg-transparent shadow-sm">
        <div class="container-fluid">
          <a class="navbar-brand rounded-3" href="#">
            <img src="../images/logo.png" height="56px">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 ">
              <li class="nav-item mx-3 fw-normal fs-5">
                <a class="nav-link" aria-current="page" href="index.php">Home</a>
              </li>
              <li class="nav-item mx-3 fw-normal fs-5">
                <a class="nav-link" aria-current="page" href="manage-admin.php">Admin</a>
              </li>
              <li class="nav-item mx-3 fw-normal fs-5">
                <a class="nav-link" aria-current="page" href="manage-category.php">Category</a>
              </li>
              <li class="nav-item mx-3 fw-normal fs-5">
                <a class="nav-link" aria-current="page" href="manage-product.php">Product</a>
              </li>
              <li class="nav-item mx-3 fw-normal fs-5">
                <a class="nav-link" aria-current="page" href="manage-order.php">Order</a>
              </li>
              <li class="nav-item mx-3 fw-normal fs-5">
                <a class="nav-link" aria-current="page" href="logout.php">Logout</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- Navbar Section -->