<?php include("widgets/header.php"); ?>

      <!-- Dashboard -->
      <div class="container">
        <div class="row pt-4 pb-4 text-color g-3">

            <h2 class="mt-4 mb-3">Dashboard</h2>

            <div class="col-md-3">
                <?php
                    $sql = "SELECT * FROM categories";

                    $res = mysqli_query($conn, $sql);

                    $count = mysqli_num_rows($res);
                ?>
                <div class="border pt-5 pb-5 bg-body rounded-3 shadow-sm text-center">
                    <h4><?= $count; ?></h4>
                    <h4>Categories</h4>
                </div>
            </div>

            <div class="col-md-3">
                <?php
                    $sql = "SELECT * FROM products";

                    $res = mysqli_query($conn, $sql);

                    $count = mysqli_num_rows($res);
                ?>  
                <div class="border pt-5 pb-5 bg-body rounded-3 shadow-sm text-center">
                    <h4><?= $count; ?></h4>
                    <h4>Products</h4>
                </div>
            </div>
            <div class="col-md-3">
                <?php
                    $sql = "SELECT * FROM orders WHERE status = 'Ordered'";

                    $res = mysqli_query($conn, $sql);

                    $count = mysqli_num_rows($res);
                ?>
                <div class="border pt-5 pb-5 bg-body rounded-3 shadow-sm text-center">
                    <h4><?= $count; ?></h4>
                    <h4>Total Orders</h4>
                </div>
            </div>

            <div class="col-md-3">
                <?php
                    $sql = "SELECT * FROM orders WHERE status = 'Delievered'";

                    $res = mysqli_query($conn, $sql);

                    $total = 0;

                    while($row = mysqli_fetch_assoc($res)){
                        $total += $row['total'];
                    }
                ?>
                <div class="border pt-5 pb-5 bg-body rounded-3 shadow-sm text-center">
                    <h4>$<?= $total; ?></h4>
                    <h4>Revenue Generated</h4>
                </div>
            </div>
        </div>
      </div>
      <!-- Dashboard -->

<?php include("widgets/footer.php"); ?>

