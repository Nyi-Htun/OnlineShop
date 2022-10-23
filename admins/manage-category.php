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

            <h2 class="mt-4 mb-3">Manage Category</h2>

            <!-- Order Table -->
            <div class="col-12">
                <a href="add-category.php" class="btn btn-primary w-10 mb-3">Add Category</a>


                <table class="table table-light table-striped rounded-3">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Image</th>
                            <th scope="col">Featured</th>
                            <th scope="col">Active</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM categories";
                        $res = mysqli_query($conn,$sql);
                        $count = mysqli_num_rows($res);

                        if($count > 0){
                            $sn = 1;
                            while($row = mysqli_fetch_assoc($res)){

                                $id = $row['id'];
                                $title = $row['title'];
                                $featured = $row['featured'];
                                $active = $row['active'];
                                $image_name = $row['image_name'];  
                        ?>      
                                
                            <tr>
                                <th scope="row"><?php echo $sn ?></th>
                                <td><?php echo $title ?></td>
                                <td>
                                    <?php if($image_name != null): ?>
                                    <img src="../images/categories/<?php echo $image_name ?>" alt=""
                                     class="rounded w-20" width="100">
                                    <?php else: ?>
                                    <?php echo "NO Image Yet!" ?>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo $featured ?></td>
                                <td><?php echo $active ?></td>
                                <td>
                                    <a href="<?php echo SITEURL; ?>update-category.php?id= <?php echo $id; ?>" class="bg-transparent p-2 rounded mx-1" title="edit">
                                        <img src="../images/icons8-edit-profile-48.png" width="25px" />
                                    </a>
                                    <a href="<?php echo SITEURL; ?>delete-category.php?id=<?php echo $id; ?>& image_name=<?= $image_name?>" class="bg-transparent p-2 rounded mx-1" title="delete">
                                        <img src="../images/icons8-delete-64.png" width="25px" />
                                    </a>
                                </td>
                            </tr>
                                
                                <?php   $sn++;
                            }
                        }
                        ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Dashborad -->
      
<?php include("./widgets/footer.php"); ?>