<?php include("widgets_f/header.php"); ?>

        <?php
            $id = $_GET['id'];

            $sql = "SELECT * FROM products WHERE id = $id";

            $res = mysqli_query($conn, $sql);

            $row = mysqli_fetch_assoc($res);
                $title = $row['title'];
                $description = $row['description'];
                $price = $row['price'];
                $category_id = $row['category_id'];
                $featured = $row['featured'];
                $active = $row['active'];
                $image_name = $row['image_name'];   
        ?> 
    <!-- Order Form Section -->
    <div class="container">
        <div class="row p-3">

            <div class="col-md-8 mx-auto p-3">
                <br>
                <h2 class="text-center text-white">
                    Fill this form for to confirm your order
                </h2>
                <br>
                <form action="" method="post" class="row g-3">
                    <fieldset class="border p-3 rounded-3 border-2">
                        <legend class="float-none w-auto p-2 text-white">Selected Product</legend>

                        <div class="d-flex">
                            <img src="images/products/<?php echo $image_name; ?>" alt="<?= $title; ?>" class="w-25 h-25 rounded-3">
                            <div class="px-3">
                                <h3><?php echo $title; ?></h3>
                                <p>$ <?php echo $price; ?></p>

                                <label for="inputNumber" class="form-label">Items</label>
                                <input type="number" class="form-control w-50" min="1" value="1" id="inputNumber" name="qty">
                            </div>
                        </div>

                    </fieldset>

                    <fieldset class="border p-3 rounded-3 border-2">

                        <legend class="float-none w-auto p-2 text-white">
                            Delivery Details
                        </legend>

                        <div class="col-md-12 ">
                            <label for="inputName" class="form-label text-white">Name</label>
                            <input type="text" class="form-control" id="inputName" placeholder="James" name="customer_name">
                        </div>

                        <div class="col-md-12 ">
                            <label for="inputPhone" class="form-label text-white">Phone</label>
                            <input type="tel" class="form-control" id="inputPhone" placeholder="09xxxxxxxxx" name="customer_contact">
                        </div>

                        <div class="col-md-12 ">
                            <label for="inputEmail" class="form-label text-white">Email</label>
                            <input type="email" class="form-control" id="inputEmail" placeholder="someone@gmail.com" name="customer_email">
                        </div>

                        <div class="col-md-12 ">
                            <label for="textarea" class="form-label text-white">Your Address </label>
                            <textarea class="form-control mt-3" placeholder="Your Address Details" id="textarea"
                                style="height: 150px;" name="customer_address"></textarea>
                        </div><br>

                        <div class="col-12">
                            <input type="hidden" name="title" value="<?php echo $title; ?>">
                            <input type="hidden" name="price" value="<?php echo $price; ?>">
                            <button class="btn btn-primary w-40" type="submit">Click Here To Order</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
    <!-- Order Form Section -->

<?php include("widgets_f/footer.php"); ?>

<!-- Handling the Form -->
<?php
    // echo SITURL;
    if($_SERVER['REQUEST_METHOD'] == "POST"){

        $product = $_POST['title'];
        $price = $_POST['price'];
        $qty = $_POST['qty'];
        function x($num1, $num2){
            return $num1 * $num2;
        }
        $total = x($price, $qty);
        $order_date = date('Y-m-d h:i:s');
        $status = "Ordered";
        $customer_name = $_POST['customer_name'];
        $customer_contact = $_POST['customer_contact'];
        $customer_email = $_POST['customer_email'];
        $customer_address = $_POST['customer_address'];

        // echo $fullname . " " . $username . " " .$password;

        // query
        $sql = "INSERT INTO orders SET
                product = '$product',
                price = $price,
                qty = $qty,
                total = $total,
                order_date = '$order_date',
                status = '$status',
                customer_name = '$customer_name',
                customer_contact = '$customer_contact',
                customer_email = '$customer_email',
                customer_address = '$customer_address'
                ";

        $res = mysqli_query($conn,$sql);

        if($res){

            $_SESSION['noti'] = '<div class="alert alert-success text-center" role="alert">
                                    Order Successfully!
                                    </div>';
            header('location:'.HOMEPAGE);
        }else{
            $_SESSION['noti'] = '<div class="alert alert-error text-center" role="alert">
                                    Failed To Order.
                                    </div>';
            header('location:'.HOMEPAGE);
        }
    }else{
        //echo "not clicked";
    }

    ?>
