<?php include("./widgets/header.php"); ?>

<!-- Get the user id -->
<?php

    $id = $_GET['id'];

    $sql = "SELECT * FROM products WHERE id = $id";

    $res = mysqli_query($conn, $sql);

    if($res){
        
        $count = mysqli_num_rows($res);
        if($count == 1){
            $row = mysqli_fetch_assoc($res);
            $title = $row['title'];
            $description = $row['description'];
            $price = $row['price'];
            $category_id = $row['category_id'];
            $featured = $row['featured'];
            $active = $row['active'];
            $image_name = $row['image_name'];
        }else{
            // navigate and show error
            $_SESSION['noti'] = '<div class="alert alert-danger" role="alert">
                                    Failed To Update Product! Product Not Found!
                                </div>';
            header('location'.SITEURL.'manage-product.php');
        }
    }
?>

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

            <h2 class="mt-4 mb-3">Update Product Here!</h2>

            <!-- Order Table -->
            <div class="col-12">
                <div class="border p-3 rounded-3">

                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="mb-3 col-6">
                                <label for="exampleInputTitle" class="form-label">Title</label>
                                <input value="<?= $title ?>" type="text" class="form-control" id="exampleInputTitle"
                                aria-describedby="textHelp" name="title">
                            </div>

                            <div class="mb-3 col-2">
                                <label for="exampleInputNumber" class="form-label">Price $</label>
                                <input type="number" class="form-control" id="exampleInputPrice"
                                    value="<?= $price ?>" aria-describedby="textHelp" name="price">
                            </div>

                            <div class="mb-3 col-4">
                                <label for="exampleInputCategory" class="form-label">Category</label>
                                <select vlaue="<?= $category_id ?>" name="category_id" id="select-category" class="form-select">
                                    <?php
                                        $sql = "SELECT * FROM categories WHERE active = 'Yes'";
                                        $res = mysqli_query($conn,$sql);
                                        $count = mysqli_num_rows($res);
                                        if($count > 0 ){
                                            while($row  = mysqli_fetch_assoc($res)){
                                                $id = $row['id'];
                                                $title = $row['title'];
                                                ?>
                                                    <option value="<?= $id ?>"><?= $title ?></option>
                                                <?php
                                            }
                                        }else{
                                                ?>
                                                    <option value="0">No Category</option>
                                                <?php
                                        }
                                    ?>
                                </select>
                            </div>

                            <div class="mb-3 col-6">
                                <label for="exampleInputDescription" class="form-label">Description</label>
                                <textarea  name="description" id="exampleInputDescription" class="form-control" rows="2"><?php echo $description ?></textarea>
                            </div>

                            <div class="mb-3 col-6">
                                <label for="formFile" class="form-label">Choose Image</label>
                                <input class="form-control" type="file" id="formFile" name="image">
                            </div>

                            <div class="mb-3 col-3">
                                <label class="form-label">Featured</label>
                                <div class="bg-body p-1 rounded ps-3">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="featured" <?php if($featured == "Yes") echo "checked"?>
                                            id="inlineRadio1" value="Yes">
                                        <label class="form-check-label" for="inlineRadio1" >Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="featured" <?php if($featured == "No") echo "checked"?>
                                            id="inlineRadio2" value="No">
                                        <label class="form-check-label" for="inlineRadio2">No</label>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3 col-3">
                                <label class="form-label">Active</label>
                                <div class="bg-body p-1 rounded ps-3">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="active" <?php if($active == "Yes") echo "checked"?>
                                            id="inlineRadio1" value="Yes">
                                        <label class="form-check-label" for="inlineRadio1">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="active" <?php if($active == "No") echo "checked"?>
                                            id="inlineRadio2" value="No">
                                        <label class="form-check-label" for="inlineRadio2">No</label>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3 col-6">
                                <label for="current_image" class="form-label">Current Image</label>
                                <img src="../images/products/<?php echo $image_name?>" alt="" id="current_image" width="80" class="rounded">
                            </div>

                            <div class="col-12">
                                <input type="hidden" name="id" value="<?= $id ?>">
                                <input type="hidden" name="current_image" value="<?= $image_name ?>">                                
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Dashborad -->

<?php include("./widgets/footer.php"); ?>

<!-- Handling the Form -->
<?php
    // echo SITURL;
    if($_SERVER['REQUEST_METHOD'] == "POST"){

        $id = $_POST['id'];
        $current_image = $_POST['current_image'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $category_id = $_POST['category_id'];
        $featured = $_POST['featured'];
        $active = $_POST['active'];

        // check whether the image is selected or not
        // print_r($_FILES['image']);

        if($_FILES['image']['name'] != null){
            // upload the image
            $image_name = $_FILES['image']['name'];

            // rename the image
            $ext = end(explode('.',$image_name));
            // example 000.jpg

            $image_name = "Product_".rand(000,999).'.'.$ext;

            $source_path = $_FILES['image']['tmp_name'];

            $destination_path = "../images/products/".$image_name;

            // upload the image
            $upload = move_uploaded_file($source_path,$destination_path);

            // check whether the image is uploaded or not
            if(!$upload){
                $_SESSION['noti'] = '<div class="alert alert-success" role="alert">
                                        Failed To Upload Image
                                    </div>';
                header('location:'.SITEURL.'update-product.php');
            }else{
                if($current_image != null){
                    $path = "../images/products/".$current_image;
                    $remove = unlink($path);

                    if(!$remove){
                        $_SESSION['noti'] = '<div class="alert alert-danger" role="alert">
                                                Failed To Remove Current Image!
                                            </div>';
                        header('location:'.SITEURL.'manage-product.php');
                        die();
                    }
                }

            }
        }else{
            $image_name = $current_image;
        }

        // query
        $sql = "UPDATE products SET
                title = '$title',
                description = '$description',
                price = '$price',
                category_id = '$category_id',
                featured = '$featured',
                active = '$active',
                image_name = '$image_name'
                WHERE id = $id
                ";

        $res = mysqli_query($conn,$sql);

        if($res){

            $_SESSION['noti'] = '<div class="alert alert-success" role="alert">
                                    Product Updated Successfully!
                                    </div>';
            header('location:'.SITEURL.'manage-product.php');
        }else{
            $_SESSION['noti'] = '<div class="alert alert-error" role="alert">
                                    Failed To Update Product.
                                    </div>';
            header('location:'.SITEURL.'manage-product.php');
        }
    }
?>