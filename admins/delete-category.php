<?php
    // include the config file
    include("../config.php");

    if(isset($_GET['id'])AND isset($_GET['image_name'])){

        // get the id and image_name
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];
    
        if($image_name != null ){
            $path = "../images/categories/".$image_name;
            $remove = unlink($path);
    
            if(!$remove){
                $_SESSION['noti'] = '<div class="alert alert-danger" role="alert">
                                        Failed To Delete Item!
                                    </div>';
                header('location:'.SITEURL.'manage.category.php');
                die();
            }
        }
    
        $sql = "DELETE FROM categories WHERE id = $id";
    
        $res = mysqli_query($conn, $sql);
    
        if($res){
    
            $_SESSION['noti'] = '<div class="alert alert-success" role="alert">
                                    Category Deleted Successfully!
                                    </div>';
            header('location:'.SITEURL.'manage-category.php');
        }else{
            $_SESSION['noti'] = '<div class="alert alert-error" role="alert">
                                    Failed To Delete Category.
                                    </div>';
            header('location:'.SITEURL.'manage-category.php');
        }
    }else{
        $_SESSION['noti'] = '<div class="alert alert-danger" role="alert">
                                Failed To Delete Category!
                            </div>';
        header('location:'.SITEURL.'manage-category.php');
    }

?>