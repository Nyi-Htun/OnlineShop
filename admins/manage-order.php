<?php include("./widgets/header.php"); ?>

      <!-- Dashboard -->
      <div class="container">
        <div class="row pt-4 pb-4 text-color gt-3">

        <?php 
                if(isset($_SESSION['noti'])){
                    echo  $_SESSION['noti'];
                    $_SESSION['noti'] = "";
                }else{
                    echo "";
                }
            ?>

            <h2 class="mt-4 mb-5">Manage Order</h2>

            <!-- Order Table -->
            <div class="col-md-12 overflow-auto">
                <table class="table table-light table-striped rounded-3">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Total</th>
                            <th scope="col">Order Date</th>
                            <th scope="col">Status</th>
                            <th scope="col">Customer Name</th>
                            <th scope="col">Contact</th>
                            <th scope="col">Email</th>
                            <th scope="col">Address</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT * FROM orders";

                            $res = mysqli_query($conn, $sql);

                            $count = mysqli_num_rows($res);


                            if($count > 0 ){
                                $sn = 1;
                                
                                while($row = mysqli_fetch_assoc($res)){
                                    $id = $row['id'];
                                    $product = $row['product'];
                                    $price = $row['price'];
                                    $qty = $row['qty'];
                                    $total = $row['total'];
                                    $order_date = $row['order_date'];
                                    $status = $row['status'];
                                    $customer_name = $row['customer_name'];
                                    $customer_contact = $row['customer_contact'];
                                    $customer_email = $row['customer_email'];
                                    $customer_address = $row['customer_address'];
                        ?>
                        <tr>
                            <th scope="row"><?= $sn; ?></th>
                            <td><?= $product; ?></td>
                            <td><?= $qty; ?></td>
                            <td>$<?= $total; ?></td>
                            <td><?= $order_date; ?></td>
                            <td><?= $status; ?></td>
                            <td><?= $customer_name; ?></td>
                            <td>+95<?= $customer_contact; ?></td>
                            <td><?= $customer_email; ?></td>
                            <td><?= $customer_address; ?></td>
                            <td class="table-secondary">
                                <a href="update-order.php?id=<?= $id; ?>&status=<?= $status; ?>" class="bg-transparent p-2 rounded mx-1" title="edit">
                                    <img src="../images/icons8-edit-profile-48.png" width="25px" />
                                </a>
                            </td>
                        </tr>
                        <?php
                                    $sn++;
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>



        </div>
      </div>
      <!-- Dashborad -->
    
<?php include("./widgets/footer.php"); ?>