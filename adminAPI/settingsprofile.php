<?php include('head.php');?>


<?php

    
    $user_id = $_GET['edituser_id'];
    $getUser = $connect->query("SELECT * FROM users WHERE id = '".$user_id."' ");
    $user    = $getUser->fetch();
    
    if(isset($_POST['update'])) {
        $errMsg = '';

        // Getting data from FROM
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $email = $_POST['email'];




        if($errMsg == '') {
            try {
             $sql = "UPDATE users SET username = :username, fullname = :fullname, password = :password, email = :email  WHERE id = :id";
              $stmt = $connect->prepare($sql);                                  
              $stmt->execute(array(
                ':fullname' => $fullname,
                ':username' => $username,
                ':password' => $password,
                ':email' => $email,
                ':id' => $user['id']
              ));
                header('Location: profile.php');
                exit;

            }
            catch(PDOException $e) {
                $errMsg = $e->getMessage();
            }
        }
    }

    if(isset($_GET['action']) && $_GET['action'] == 'updated')
        $errMsg = 'Successfully updated.';

 $user = $connect->query("SELECT * FROM `users`")->fetch();
 

?>



                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">لوحة القيادة </h1>
                    </div>

            <?php
                if(isset($errMsg)){
                    echo '<div style="color:#FF0000;text-align:center;font-size:17px;">'.$errMsg.'</div>';
                }
            ?>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-12 mb-4">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary text-end"> إعدادات الملف الشخصي </h6>
                                </div>
                                <div class="card-body">

                            <form action="" method="post">

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0 my-2">
                                     <input  class="form-control"  type="text" name="fullname" value="<?=$user['fullname']; ?>" autocomplete="off" class="box"/>
                                    </div>
                                    <div class="col-sm-6 my-2">
                                     <input class="form-control"  type="text" name="username" value="<?=$user['username']; ?>" autocomplete="off" class="box"/>
                                    </div>
                                </div>

                                 <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0 my-2">
                                    <input  class="form-control"  type="password" name="password" autocomplete="off" class="box"/>
                                 </div>
                             <div class="col-sm-6 mb-3 mb-sm-0 my-2">
                                    <input  class="form-control"  type="text" name="email" value="<?=$user['email']; ?>" autocomplete="off" class="box"/>
                                 </div>

                                </div>

                             <div class="my-2">
                                <div class="d-grid gap-2">
                               <input type="submit" name='update' value="تحديث" class="btn btn-primary btn-user btn-block"> </input>
                               </div>
                               </div>
       
</form>




                                </div>
                            </div>


                        </div>


                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->




<?php include('footer.php'); ?>