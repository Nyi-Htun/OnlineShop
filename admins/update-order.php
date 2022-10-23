<?php include("widgets/header.php"); ?>

<!-- Get the user id -->
<?php

    $id = $_GET['id'];
    $status = $_GET['status'];

?>

        <!-- Dashboard -->
        <div class="container">
            <form action="" method="post">

            <div class="row pt-4 pb-4 text-color gt-3">


                <h2 class="mt-4 mb-3">Update Order's Status</h2>

                <!-- Order Table -->
                
                <div class="mb-3 col-12">
                    <label class="form-label">Status</label>
                    <div class="bg-body p-1 rounded ps-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" <?php if($status == "Ordered") echo "checked"?> 
                                id="inlineRadio1" value="Ordered" name="status">
                            <label class="form-check-label" for="inlineRadio1">Ordered!</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" <?php if($status == "OnDeliever") echo "checked"?> 
                                id="inlineRadio2" value="OnDeliever" name="status">
                            <label class="form-check-label" for="inlineRadio2">On Deliever!</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" <?php if($status == "Delievered") echo "checked"?> 
                                id="inlineRadio2" value="Delievered" name="status">
                            <label class="form-check-label" for="inlineRadio2">Delievered!</label>
                        </div>
                    </div>
                </div>
                    
                <div class="col-12">
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
            </form>
        </div>
        <!-- Dashborad -->

<?php include("./widgets/footer.php"); ?>

<!-- Handling the Form -->
<?php
    // echo SITURL;
    if($_SERVER['REQUEST_METHOD'] == "POST"){

        $id = $_POST['id'];
        $status = $_POST['status'];

        // query
        $sql = "UPDATE orders SET
                status = '$status'
                WHERE id = $id
                ";

        $res = mysqli_query($conn,$sql);

        if($res){

            $_SESSION['noti'] = '<div class="alert alert-success" role="alert">
                                    Order Status Updated Successfully!
                                    </div>';
            header('location:'.SITEURL.'manage-order.php');
        }else{
            $_SESSION['noti'] = '<div class="alert alert-error" role="alert">
                                    Failed To Update Order Status.
                                    </div>';
            header('location:'.SITEURL.'manage-order.php');
        }
    }else{
        //echo "not clicked";
    }
?>