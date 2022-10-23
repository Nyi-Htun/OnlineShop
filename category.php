<?php include("widgets_f/header.php"); ?>

    <!-- Mobile View Search Bar -->
    <div class="container-fluid product-search d-md-none d-sm-block">
        <form class="d-flex w-60 p-3 mx-auto" role="search">
        <input class="form-control me-2 search" type="search" placeholder="Search Somethig..." aria-label="Search">
        <button class="btn btn-outline-light search-btn" type="submit">Search</button>
        </form>
    </div>

    <!-- Category Section -->
    <div class="container p-3 text-center"><br><br>
            
      <div class="row">
        <?php
          $sql = "SELECT * FROM categories WHERE active = 'Yes'";
          
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


<?php include("widgets_f/footer.php"); ?>