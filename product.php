<?php include("widgets_f/header.php"); ?>

    <!-- Mobile View Search Bar -->
    <div class="container-fluid product-search d-md-none d-sm-block">
        <form class="d-flex w-60 p-3 mx-auto" role="search">
          <input class="form-control me-2 search" type="search" placeholder="Search Somethig..." aria-label="Search">
          <button class="btn btn-outline-light search-btn" type="submit">Search</button>
        </form>
      </div>
        <!-- Mobile View Search Bar -->

        <!-- Product Section -->
        
        <div class="container p-3"><br><br>
            <h2 class="text-white text-center d-none d-lg-block">Our Products</h2><br><br>
                    
            <div class="row">
            <?php
            $sql = "SELECT * FROM products WHERE active = 'Yes'";
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
                        <a href="order.php?id=<?= $id; ?>" class="btn btn-primary w-40 text-decoration-none">Order Now!</a>
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