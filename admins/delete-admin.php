<?php
    // include the config file
    include("../config.php");

    // get the id
    $id = $_GET['id'];

    $sql = "DELETE FROM admins WHERE id = $id";

    $res = mysqli_query($conn, $sql);

    if($res){

        $_SESSION['noti'] = '<div class="alert alert-success" role="alert">
                                Admin Deleted Successfully!
                                </div>';
        header('location:'.SITEURL.'manage-admin.php');
    }else{
        $_SESSION['noti'] = '<div class="alert alert-error" role="alert">
                                Failed To Delete Admin.
                                </div>';
        header('location:'.SITEURL.'add-admin.php');
    }
?>