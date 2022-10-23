<?php include("./widgets/header.php"); ?>

    <!-- Dashboard -->
    <div class="container">
        <div class="row pt-4 pb-4 text-color gt-3">


            <h2 class="mt-4 mb-3">Add New Admin</h2>


            <!-- Order Table -->
            <div class="col-md-6">

                <div class="border p-3 rounded-3">

                    <form action="" method="post">
                        <div class="mb-3 ">
                            <label for="exampleInputFullName" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="exampleInputFullName" name="fullname"
                                aria-describedby="textHelp" required>
                        </div>
                        <div class="mb-3 ">
                            <label for="exampleInputUserName" class="form-label">User Name</label>
                            <input type="text" class="form-control" id="exampleInputUserName" name="username"
                                aria-describedby="textHelp" required>
                        </div>
                        <div class="mb-3 ">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Register</button>
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

        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        // echo $fullname . " " . $username . " " .$password;

        // query
        $sql = "INSERT INTO admins SET
                fullname = '$fullname',
                username = '$username',
                password = '$password'
                ";

        $res = mysqli_query($conn,$sql);

        if($res){

            $_SESSION['noti'] = '<div class="alert alert-success" role="alert">
                                    Admin Added Successfully!
                                    </div>';
            header('location:'.SITEURL.'manage-admin.php');
        }else{
            $_SESSION['noti'] = '<div class="alert alert-error" role="alert">
                                    Failed To Add Admin.
                                    </div>';
            header('location:'.SITEURL.'add-admin.php');
        }
    }else{
        //echo "not clicked";
    }

    ?>