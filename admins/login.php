<?php include("../config.php"); ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Online Shop - Backend</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="styleb.css">
  </head>
  <body>

    <div class="container-fluid" id="login-div">
        <div class="row">
            <div class="col-md-6 pt-3 pb-3 mx-auto">
                
            <?php 
                if(isset($_SESSION['noti'])){
                    echo  $_SESSION['noti'];
                    $_SESSION['noti'] = "";
                }else{
                    echo "";
                }
            ?>


                <!-- Login Form -->
                <div class="h-25"></div><br><br>
                <div class="border p-3 rounded-3">
                    <img src="../images/logo.png" width="30%" class="mx-auto d-block mb-3">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="exampleInputUserName" class="form-label">User Name</label>
                            <input type="text" name="username" class="form-control" style="background: transparent; font-weight: 500;" id="exampleInputUserName" placeholder="User Name">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1" style="background: transparent; font-weight: 500;" placeholder="Password">
                        </div>

                        <button type="submit" class="btn btn-primary" style="color: rgba(54, 61, 70, 0.561); background: transparent;">Login</button>
                    </form>
                </div>
                <!-- Login Form -->
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>

<?php

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $sql = "SELECT * FROM admins WHERE username = '$username' AND password = '$password'";
        
        $res = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($res);

        if($count == 1){
            $_SESSION['user'] = $username;
            $_SESSION['noti'] = '<div class="alert alert-success" role="alert">
                                    Admin Logged In Successfully!
                                </div>';
            header('location:'.SITEURL.'manage-admin.php');
        }else{
            $_SESSION['noti'] = '<div class="alert alert-danger" role="alert">
                                    Invalid Username or Password!
                                </div>';
            header('location:'.SITEURL.'login.php');
        }
    }

?>