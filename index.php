<?php include("widgets_f/header.php"); ?>

    <!-- Mobile View Search Bar -->
    <div class="container-fluid product-search d-md-none d-sm-block">
      <form class="d-flex w-60 p-3 mx-auto" role="search">
        <input class="form-control me-2 search" type="search" placeholder="Search Somethig..." aria-label="Search">
        <button class="btn btn-outline-light search-btn" type="submit">Search</button>
      </form>
    </div>
    
            <?php 
                if(isset($_SESSION['noti'])){
                    echo  $_SESSION['noti'];
                    $_SESSION['noti'] = "";
                }else{
                    echo "";
                }
            ?>

    <!-- Promotion Section -->

      <div class="container p-3"><br><br>
        <h2 class="text-white text-center">Promotions</h2><br><br>
          
        <div class="row">
          <div class="col-md-10 mx-auto p-3">
            <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
              <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
              </div>
              <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="10000">
                  <img src="images/promo1.png" class="d-block w-100 rounded-3" alt="...">
                  <div class="carousel-caption d-none d-md-block">
                    <h5 class="text-white">Promo 1</h5>
                    <a href="categories/order.html" class="btn btn-outline-primary w-40 text-decoration-none">Order Now!</a>
                  </div>
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                  <img src="images/promo2.png" class="d-block w-100 rounded-3" alt="...">
                  <div class="carousel-caption d-none d-md-block">
                    <h5 class="text-white">Promo 2</h5>
                    <a href="categories/order.html" class="btn btn-outline-primary w-40 text-decoration-none">Order Now!</a>
                  </div>
                </div>
                <div class="carousel-item">
                  <img src="images/promo3.png" class="d-block w-100 rounded-3" alt="...">
                  <div class="carousel-caption d-none d-md-block">
                    <h5 class="text-white">Promo 3</h5>
                    <a href="categories/order.html" class="btn btn-outline-primary w-40 text-decoration-none">Order Now!</a>
                  </div>
                </div>
              </div>
              <button class="carousel-control-prev text-white" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next text-white" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>
        </div>
      </div>

    <!-- Promotion Section -->

    <!-- Category Section -->
    <div class="container p-3 text-center"><br><br>
      <h2 class="text-white">Explore Product</h2><br><br>
      
      <div class="row">
        <?php
          $sql = "SELECT * FROM categories WHERE active = 'Yes' AND featured = 'Yes' LIMIT 3";
          
          $res = mysqli_query($conn,$sql);

            if($res){
              while($row = mysqli_fetch_assoc($res)){
                $id = $row['id'];
                $title = $row['title'];
                $featured = $row['featured'];
                $active = $row['active'];
                $image_name = $row['image_name']; 

        ?>

        <div class="col-md-4 p-2">
            <a href="category-product.php?id=<?= $id ?>&title=<?= $title ?>" class="text-decoration-none text-dark">
              <div class="pb-3 border-0 rounded-4 bg-body shadow p-3">
                <img src="images/categories/<?php echo $image_name; ?>" class="rounded-3 w-100" alt="...">
                <div class="card-body py-3">
                  <h5 class="card-title">
                      <?php echo $title; ?>
                  </h5>
                </div>
              </div>  
            </a>
        </div>

        <?php
              }
            }
        ?>
   
    <!-- Category Section -->

    <!-- Top Product Section -->
    <div class="container p-3"><br><br>
      <h2 class="text-center text-white">Top Product</h2><br><br>

      <div class="row">
        <?php
          $sql = "SELECT * FROM products WHERE active = 'Yes' AND featured = 'Yes' LIMIT 2";
          $res = mysqli_query($conn,$sql);

          if($res){
            while($row = mysqli_fetch_assoc($res)){
              $id = $row['id'];
              $title = $row['title'];
              $description = $row['description'];
              $price = $row['price'];
              $category_id = $row['category_id'];
              $featured = $row['featured'];
              $active = $row['active'];
              $image_name = $row['image_name'];  
        ?> 

        <div class="col-md-6 p-2">
          <div class="p-3 border-0 rounded-4 bg-body shadow w-100">
            <div class="d-flex">
              <img src="images/products/<?php echo $image_name; ?>" class="rounded-4 mt-3" width="20%" height="50%">
              <div class="p-3 mx-3">
                <h4><?php echo $title; ?></h4>
                <p class="text-muted">
                  <?php echo $description; ?>
                </p>
                <p>$<?php echo $price; ?></p>
                <a href="order.php?id=<?= $id ?>" class="btn btn-primary w-40 text-decoration-none">Order Now!</a>
              </div>
            </div>
          </div>
        </div>

        <?php
            }
          }
        ?>

    <!-- Top Product Section -->

<?php include("widgets_f/footer.php"); ?>