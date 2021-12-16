<?php
   require '../config/config.php';
   include('../languages/lang_config.php');

    if(isset($_POST['login'])) {
        $errMsg = '';

        // Get data from FORM
        $email = $_POST['email'];
        $password = md5($_POST['password']);

        if($email == '')
            $errMsg = 'Enter email';
        if($password == '')
            $errMsg = 'Enter password';

        if($errMsg == '') {
          $sql = "SELECT * FROM users WHERE email = '".$email."' and password = '".$password."' ";
          
                $stmt = $connect->query($sql);
                $data = $stmt->fetch(PDO::FETCH_ASSOC);

                if( !$data ){
                    $errMsg = "user".$email." not found.";
          
                }
                else {
                  $_SESSION['login'] = $data;
                  switch ($data['role']) {
                    case 'admin':
                  header('Location: index');
                  break;

                  case 'user':
                  header('Location: profile.php');
                  break;

                  }
                }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $lang['meta_title'] ?> Admin</title>

    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
  </head>
  <body>

   <?php  $settings = $connect->query("SELECT * FROM `settings`")->fetch(); ?>

<style>
    @font-face {
    font-family: 'Cairo';
    src: url('https://fonts.gstatic.com/s/cairo/v10/SLXLc1nY6Hkvalrub46O59ZMaA.woff2');
    font-style: normal;
    }

    body 
      { 
      font-family: 'Cairo',sans-serif !important;
       }
    .new {
    background: <?php echo $settings['color'] ?>;

    color: #FFF; }

</style>
    <!-- ======== main-wrapper start =========== -->

        <div class="container-fluid">

          <div class="row g-0 auth-row">
            <div class="col-lg-6">
              <div class="auth-cover-wrapper bg-primary-100 new">
                <div class="auth-cover">

                  <div class="cover-image text-center">
                    <img <?php $file ="logo/".$settings['file'];?> src="<?php echo $file ?>" width="40%" alt="" />
                  </div>

                </div>
              </div>
            </div>
            <!-- end col -->
            <div class="col-lg-6">
              <div class="signin-wrapper new">

                    <form action="" method="post">
                          <div class="text-center">
                             <img <?php $file ="logo/".$settings['file'];?> src="<?php echo $file ?>" width="20%">
                           </div>
                          <h3 class="text-center mb-3" style="color: #FFF;"> دخول لادارة الموقع </h3>

                              <div class="mb-3 text-end">
                                <label class="form-label">البريد الالكتروني</label>
                                <input type="text" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email'] ?>" class="form-control"  aria-describedby="email">
                              </div>

                              <div class="mb-3 text-end">
                                 <label class="form-label">الرقم السري</label>
                                 <input type="password" name="password" value="<?php if(isset($_POST['password'])) echo $_POST['password'] ?>" class="form-control" >
                              </div>

                              <div class="text-center">
                                 <button type="submit" name="login" value="login" class="btn btn-danger">دخول</button>
                              </div>
                       </form>

                </div>
              </div>

                  <div class="copyright text-center">
                <p class="text-sm">© 2017 - 2021. All rights reserved. <img src="https://almossaid.com/frontend/assets/images/shape/s1.svg" alt="Almossaid" height="30" /> <a href="https://almossaid.com/" rel="nofollow" target="_blank">S.A.M.W.SERVICES LLC </a>
                </p>
              </div>

            </div>
            <!-- end col -->            
          </div>
          <!-- end row -->
        </div>



    <!-- ========= All Javascript files linkup ======== -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
