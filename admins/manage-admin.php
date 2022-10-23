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

            <h2 class="mt-4 mb-3">Manage Admin</h2>

            <!-- Admin Table -->
            <div class="col-12">
                <a href="add-admin.php" class="btn btn-primary w-10 mb-3">Add Admin</a>
            
                <table class="table table-light table-striped rounded-3">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Actons</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Query To Show Admin -->
                        <?php 
                            $sql = "SELECT * FROM admins";
                            $res = mysqli_query($conn,$sql);

                            if($res){
                                $count = mysqli_num_rows($res);

                                if($count > 0){
                                    $c = 0;

                                    while($row = mysqli_fetch_assoc($res)){
                                        $c++;
                                        $id = $row['id'];
                                        $fullname = $row['fullname'];
                                        $username = $row['username'];
                                        $password = $row['password'];
                                        // echo $fullname . " " . $username . " " ;

                                        ?>
                                        
                                        <tr>
                                            <th scope="row"><?php echo $c ?></th>
                                            <td><?php echo $fullname ?></td>
                                            <td><?php echo $username ?></td>
                                            <td>
                                                <a href="<?php echo SITEURL; ?>update-password.php?id=<?php echo $id; ?>" class="bg-transparent p-2 rounded mx-1" title="edit password">
                                                    <img src="../images/icons8-password-reset-48.png" width="25px" />
                                                </a>
                                                <a href="<?php echo SITEURL; ?>update-admin.php?id=<?php echo $id; ?>" class="bg-transparent p-2 rounded mx-1" title="edit(fullname & username)">
                                                    <img src="../images/icons8-edit-profile-48.png" width="25px" />
                                                </a>
                                                <a href="<?php echo SITEURL; ?>delete-admin.php?id=<?php echo $id; ?>" class="bg-transparent p-2 rounded mx-1" title="delete">
                                                    <img src="../images/icons8-delete-64.png" width="25px" />
                                                </a>
                                            </td>
                                        </tr>
                                        
                                        <?php
                                        
                                    }
                                }else{ echo ""; }
                            }
                        ?>
                        
                    </tbody>
                </table>
            </div>
            <!-- Admin Table -->
        </div>
      </div>
      <!-- Dashboard -->

<?php include("./widgets/footer.php"); ?>
