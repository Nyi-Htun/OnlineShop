<?php include("widgets/header.php"); ?>

<!-- Get the user id -->
<?php

    $id = $_GET['id'];

    $sql = "SELECT * FROM admins WHERE id=$id";

    $res = mysqli_query($conn, $sql);

    if($res){
        
        $count = mysqli_num_rows($res);

        if($count == 1){

            $row = mysqli_fetch_assoc($res);

            $retrieved_password = $row['password'];


        }else{
            // navigate and show error
            $_SESSION['noti'] = '<div class="alert alert-danger" role="alert">
                                    Failed To Update Password! Admin Not Found! 
                                </div>';
            header('location'.SITEURL.'manage-admin.php');
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

                <h2 class="mt-4 mb-3">Update Password</h2>

                <!-- Order Table -->
                <div class="col-md-6">

                    <div class="border p-3 rounded-3">

                        <form action="" method="post">
                            <div class="mb-3 ">
                                <label for="exampleInputPassword1" class="form-label">Current Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" name="current-password">
                            </div>
                            <div class="mb-3 ">
                                <label for="exampleInputPassword2" class="form-label">New Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword2" name="new-password">
                            </div>
                            <div class="mb-3 ">
                                <label for="exampleInputPassword3" class="form-label">Comfirm Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword3" name="confirm-password">
                            </div>


                            <input type="hidden" value="<?php echo $id?>" name="id"/>
                            
                            <input type="submit" value="Update Password" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Dashborad -->

<?php include("./widgets/footer.php"); ?>

<!-- Handling the Form -->
<?php

    if($_SERVER['REQUEST_METHOD'] == "POST"){

        $id = $_POST['id'];
        $current_password = md5($_POST['current-password']);
        $new_password = md5($_POST['new-password']);
        $confirm_password = md5($_POST['confirm-password']);

        if($retrieved_password != $current_password){
            $_SESSION['noti'] = '<div class="alert alert-info" role="alert">
                                    Current Password Incorrect!
                                </div>';
            header('location:'.SITEURL.'update-password.php?id='.$id);
        }else if($new_password != $confirm_password){
            $_SESSION['noti'] = '<div class="alert alert-info" role="alert">
                                    New-Password & Confirm-Password Did NOt Match! Please Type Again Correctly!
                                </div>';
            header('location:'.SITEURL.'update-password.php?id='.$id);
        }else{

            $sql = "UPDATE admins SET
                    password = '$new_password'
                    WHERE id = $id
                    ";
    
            $res = mysqli_query($conn,$sql);
    
            if($res){
    
                $_SESSION['noti'] = '<div class="alert alert-success" role="alert">
                                        Password Updated Successfully!
                                        </div>';
                header('location:'.SITEURL.'manage-admin.php');
            }else{
                $_SESSION['noti'] = '<div class="alert alert-error" role="alert">
                                        Failed To Update Password.
                                        </div>';
                header('location:'.SITEURL.'manage-admin.php');
            }
        }
    }
?>