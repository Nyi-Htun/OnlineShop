<?php include("widgets/header.php"); ?>

<!-- Get the user id -->
<?php

    $id = $_GET['id'];

    $sql = "SELECT * FROM admins WHERE id = $id";

    $res = mysqli_query($conn, $sql);

    if($res){
        
        $count = mysqli_num_rows($res);
        if($count == 1){
            $row = mysqli_fetch_assoc($res);
            $fullname = $row['fullname'];
            $username = $row['username'];
        }else{
            // navigate and show error
            $_SESSION['noti'] = '<div class="alert alert-danger" role="alert">
                                    Failed To Update Admin! Admin Not Found!
                                </div>';
            header('location'.SITEURL.'manage-admin.php');
        }
    }
?>

        <!-- Dashboard -->
        <div class="container">
            <div class="row pt-4 pb-4 text-color gt-3">


                <h2 class="mt-4 mb-3">Update Admin's Data</h2>

                <!-- Order Table -->
                <div class="col-md-6">

                    <div class="border p-3 rounded-3">

                        <form action="" method="post">
                            <div class="mb-3 ">
                                <label for="exampleInputFullName" class="form-label">Full Name</label>
                                <input type="text" value="<?php echo $fullname ?>" class="form-control" id="exampleInputFullName" name="fullname"
                                    aria-describedby="textHelp" required>
                            </div>
                            <div class="mb-3 ">
                                <label for="exampleInputUserName" class="form-label">User Name</label>
                                <input type="text" value="<?php echo $username ?>" class="form-control" id="exampleInputUserName" name="username"
                                    aria-describedby="textHelp" required>
                            </div>

                            <input type="hidden" value="<?php echo $id?>" name="id"/>
                            
                            <button type="submit" class="btn btn-primary">Update</button>
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
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];

        // query
        $sql = "UPDATE admins SET
                fullname = '$fullname',
                username = '$username'
                WHERE id = $id
                ";

        $res = mysqli_query($conn,$sql);

        if($res){

            $_SESSION['noti'] = '<div class="alert alert-success" role="alert">
                                    Admin Updated Successfully!
                                    </div>';
            header('location:'.SITEURL.'manage-admin.php');
        }else{
            $_SESSION['noti'] = '<div class="alert alert-error" role="alert">
                                    Failed To Update Admin.
                                    </div>';
            header('location:'.SITEURL.'manage-admin.php');
        }
    }else{
        //echo "not clicked";
    }
?>