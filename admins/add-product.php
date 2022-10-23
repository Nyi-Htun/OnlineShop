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

            <h2 class="mt-4 mb-3">Add New Product</h2>

            <!-- Order Table -->
            <div class="col-12">
                <div class="border p-3 rounded-3">

                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="mb-3 col-6">
                                <label for="exampleInputTitle" class="form-label">Title</label>
                                <input type="text" class="form-control" id="exampleInputTitle"
                                    aria-describedby="textHelp" name="title">
                            </div>
                            <div class="mb-3 col-2">
                                <label for="exampleInputNumber" class="form-label">Price $</label>
                                <input type="number" class="form-control" id="exampleInputPrice"
                                    aria-describedby="textHelp" name="price">
                            </div>
                            <div class="mb-3 col-4">
                                <label for="exampleInputCategory" class="form-label">Category</label>
                                <select name="category_id" id="select-category" class="form-select">
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
                            <div class="mb-3 col-12">
                                <label for="exampleInputDescription" class="form-label">Description</label>
                                <textarea name="description" id="exampleInputDescription" class="form-control" rows="2"></textarea>
                            </div>
                            <div class="mb-3 col-6">
                                <label for="formFile" class="form-label">Choose Image</label>
                                <input class="form-control" type="file" id="formFile" name="image">
                            </div>

                            <div class="mb-3 col-3">
                                <label class="form-label">Featured</label>
                                <div class="bg-body p-1 rounded ps-3">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="featured"
                                            id="inlineRadio1" value="Yes">
                                        <label class="form-check-label" for="inlineRadio1" >Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="featured"
                                            id="inlineRadio2" value="No">
                                        <label class="form-check-label" for="inlineRadio2">No</label>
                                    </div>
                                </div>

                            </div>
                            <div class="mb-3 col-3">
                                <label class="form-label">Active</label>
                                <div class="bg-body p-1 rounded ps-3">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="active"
                                            id="inlineRadio1" value="Yes">
                                        <label class="form-check-label" for="inlineRadio1">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="active"
                                            id="inlineRadio2" value="No">
                                        <label class="form-check-label" for="inlineRadio2">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Dashborad -->

<?php include("./widgets/footer.php"); ?>

<?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $title = $_POST['title'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $category_id = $_POST['category_id'];

        if(isset($_POST['featured'])){
            $featured = $_POST['featured'];
        }else{
            $featured = 'No';
        }

        if(isset($_POST['active'])){
            $active = $_POST['active'];
        }else{
            $active = 'No';
        }

        // check whether the image is select or not
        // print_r($FILE['image']);

        if(isset($_FILES['image']['name'])){
            // upload the image
            $image_name = $_FILES['image']['name'];
            $ext = end(explode('.',$image_name));
            $image_name = "Product_".rand(000,999).'.'.$ext;
            $source_path = $_FILES['image']['tmp_name'];
            $destination_path = "../images/products/".$image_name;

            $upload = move_uploaded_file($source_path, $destination_path);

            // check wether the image is uploaded or not
            if(!$upload){
                $_SESSION['noti'] = '<div class="alert alert-success" role="alert">
                                        Failed To Upload Image.
                                    </div>';
                header('location:'.SITEURL.'add-product.php');
                die();

            }
        }else{
            $image_name = "";
        }

        $sql = "INSERT INTO products SET
            title = '$title',
            description = '$description',
            price = '$price',
            image_name = '$image_name',
            category_id = '$category_id',
            featured ='$featured',
            active = '$active'
        ";

        $res = mysqli_query($conn,$sql);

        if($res){

            $_SESSION['noti'] = '<div class="alert alert-success" role="alert">
                                    Product Added Successfully!
                                </div>';
            header('location:'.SITEURL.'manage-product.php');
                  
        }else{
            $_SESSION['noti'] = '<div class="alert alert-danger" role="alert">
                                    Failed To Add Product
                                </div>';
            header('location:'.SITEURL.'add-product.php');

        }
    }
?>