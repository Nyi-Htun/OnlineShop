<?php include("widgets_f/header.php"); ?>
<?php

    $id = $_GET['id'];
    $title = $_GET['title'];

?>

    <!-- Mobile View Search Bar -->
    <div class="container-fluid product-search d-md-none d-sm-block p-4">
        <h2 class="text-white text-center p-3">Products on "<?php echo $title; ?>"</h2>
    </div>
    <!-- Mobile View Search Bar -->

    <!-- Product Section -->
    <div class="container p-3">
        <br>
        <h2 class="text-center text-white d-none d-lg-block">Products on "<?php echo $title; ?>"</h2>
        <br>

        <div class="row">
                    
        <?php

        $sql = "SELECT * FROM products WHERE active = 'Yes' AND category_id = $id";
                    
        $res = mysqli_query($conn,$sql);


        if($res){
            
        $count = mysqli_num_rows($res);

        if($count == 0){
            echo '<div class="alert alert-success" role="alert">There Is No Item IN This Category Yet! Sorry!</div>';
        }else{
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
                        <div class="p-3">
                            <h4><?php echo $title ?></h4>
                            <p> $<?php echo $price; ?> </p>
                            <p class="text-muted">
                                <?php echo $description; ?>
                            </p>
                            <a href="order.php?id=<?= $id ?>" class="btn btn-primary w-40 text-decoration-none">Order Now</a>
                        </div>
                    </div>
                </div>
            </div>

            <?php
                        }
                    }
                }
            ?>
    <!-- Product Section -->

<?php include("widgets_f/footer.php"); ?>
