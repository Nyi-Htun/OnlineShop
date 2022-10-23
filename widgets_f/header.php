<?php include("./config.php"); ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LLP Online Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <!-- Nav Bar Section -->
    <nav class="navbar navbar-expand-lg bg-transparent shadow-sm">
        <div class="container-fluid">
          <a class="navbar-brand" href="#" >
            <img src="images/logo.png" style="height: 56px;">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item mx-3 fw-normal fs-5">
                <a class="nav-link" aria-current="page" href="index.php">Home</a>
              </li>
              <li class="nav-item mx-3 fw-normal fs-5">
                <a class="nav-link" aria-current="page" href="category.php">Catagory</a>
              </li>
              <li class="nav-item mx-3 fw-normal fs-5">
                <a class="nav-link" aria-current="page" href="product.php">Product</a>
              </li>
              <li class="nav-item mx-3 fw-normal fs-5">
                <a class="nav-link" aria-current="page" href="contact.php">Contact</a>
              </li>
              
            </ul>
            <div class="d-none d-lg-block mx-3">
                <form class="d-flex" role="search" action="search_products.php" method="GET">
                  <input class="form-control me-2 search" type="search" placeholder="Search Something..." aria-label="Search" name="query">
                  <button class="btn btn-outline-primary" type="submit">Search</button>
                </form>
            </div>
          </div>
        </div>
    </nav>
    <!-- Nav Bar Section -->
    

