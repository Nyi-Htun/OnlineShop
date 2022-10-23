<?php include("widgets/header.php"); ?>

<!-- Get the user id -->
<?php

    $id = $_GET['id'];

    $sql = "SELECT * FROM categories WHERE id = $id";

    $res = mysqli_query($conn, $sql);

    if($res){
        
        $count = mysqli_num_rows($res);
        if($count == 1){
            $row = mysqli_fetch_assoc($res);
            $title = $row['title'];
            $featured = $row['featured'];
            $active = $row['active'];
            $image_name = $row['image_name'];
        }else{
            // navigate and show error
            $_SESSION['noti'] = '<div class="alert alert-danger" role="alert">
                                    Failed To Update Item! Item Not Found!
                                </div>';
            header('location'.SITEURL.'manage-category.php');
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

            <h2 class="mt-4 mb-3">Add New Category</h2>

            <!-- Order Table -->
            <div class="col-12">
                <div class="border p-3 rounded-3">

                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="mb-3 col-6">
                                <label for="exampleInputTitle" class="form-label">Title</label>
                                <input type="text" class="form-control" id="exampleInputTitle"
                                   name="title" aria-describedby="textHelp" value="<?= $title?>">
                            </div>

                            <div class="mb-3 col-6">
                                <label for="current_image" class="form-label">Current Image</label>
                                <img src="../images/categories/<?php echo $image_name?>" alt="" id="current_image" width="80" class="rounded">
                            </div>

                            <div class="mb-3 col-6">
                                <label class="form-label">Featured</label>
                                <div class="bg-body p-1 rounded ps-3">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" <?php if($featured == "Yes") echo "checked"?> 
                                            name="featured"id="inlineRadio1" value="Yes">
                                        <label class="form-check-label" for="inlineRadio1">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" <?php if($featured == "No") echo "checked"?> 
                                            id="inlineRadio2" value="No" name="featured">
                                        <label class="form-check-label" for="inlineRadio2">No</label>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3 col-6">
                                <label class="form-label">Active</label>
                                <div class="bg-body p-1 rounded ps-3">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" <?php if($active == "Yes") echo "checked"?> 
                                         name="active" id="inlineRadio1" value="Yes">
                                        <label class="form-check-label" for="inlineRadio1">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" <?php if($active == "No") echo "checked"?> 
                                         name="active" id="inlineRadio2" value="No">
                                        <label class="form-check-label" for="inlineRadio2">No</label>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3 col-12">
                                <label for="formFile" class="form-label">Choose Image</label>
                                <input class="form-control" type="file" id="formFile" name="image">
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

            $image_name = "Category_".rand(000,999).'.'.$ext;

            $source_path = $_FILES['image']['tmp_name'];

            $destination_path = "../images/categories/".$image_name;

            // upload the image
            $upload = move_uploaded_file($source_path,$destination_path);

            // check whether the image is uploaded or not
            if(!$upload){
                $_SESSION['noti'] = '<div class="alert alert-success" role="alert">
                                        Failed To Upload Image
                                    </div>';
                header('location:'.SITEURL.'update-category.php');
            }else{
                if($current_image != null){
                    $path = "../images/categories/".$current_image;
                    $remove = unlink($path);

                    if(!$remove){
                        $_SESSION['noti'] = '<div class="alert alert-danger" role="alert">
                                                Failed To Remove Current Image!
                                            </div>';
                        header('location:'.SITEURL.'manage-category.php');
                        die();
                    }
                }

            }
        }else{
            $image_name = $current_image;
        }

        // query
        $sql = "UPDATE categories SET
                title = '$title',
                featured = '$featured',
                active = '$active',
                image_name = '$image_name'
                WHERE id = $id
                ";

        $res = mysqli_query($conn,$sql);

        if($res){

            $_SESSION['noti'] = '<div class="alert alert-success" role="alert">
                                    Category Updated Successfully!
                                    </div>';
            header('location:'.SITEURL.'manage-category.php');
        }else{
            $_SESSION['noti'] = '<div class="alert alert-error" role="alert">
                                    Failed To Update Category.
                                    </div>';
            header('location:'.SITEURL.'manage-category.php');
        }
    }
?>