<?php include('resize-class.php'); ?>
<?php include('head.php');

            if( $_POST ){

                if( filesize($_FILES['file']['tmp_name']) ){
                 $file = uniqid('almossaid-')."-".$_FILES['file']['name'];
                 $size =$_FILES['file']['size'];
                 $file_loc = $_FILES['file'];
                 $folder="logo/" . $file;
                 move_uploaded_file($_FILES['file']['tmp_name'], $folder);
                }else{
                  $file = null;
                }

                 $off = $_POST['off'];
                 $key = $_POST['key'];
                 $title = $_POST['title'];
                 $email = $_POST['email'];
                 $adresse = $_POST['adresse'];
                 $mobile = $_POST['mobile'];
                 $fax = $_POST['fax'];
                 $color = $_POST['color'];
                 $instagram = $_POST['instagram'];
                 $facebook = $_POST['facebook'];
                 $youtube = $_POST['youtube'];
                 $url  = $_POST['url'];
               try {
                   $stmt =  $connect->prepare("UPDATE settings SET
                    ". ( $file ? " `file`='$file', `size`='$size', " : null ) ."
                    `off`='$off',
                    `key`='$key',
                    `title`='$title',
                    `email`='$email',
                    `adresse`='$adresse',
                    `mobile`='$mobile',
                    `fax`='$fax',
                    `color`='$color',
                    `instagram`='$instagram',
                    `facebook`='$facebook',
                    `youtube`='$youtube',
                    `url`='$url'
                    ");
                    $stmt->execute();

                header('Location: settings.php?action=almossaid');
                exit;
                  }
            catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
    
        if(isset($_GET['action']) && $_GET['action'] == 'almossaid') {
        $errMsg = ' <div class="alert alert-primary" role="alert">  لقد تم تعديل معلومات موقع بنجاح   </div> ';
    }

            $settings = $connect->query("SELECT * FROM `settings`")->fetch();



             ?>

      <!-- ========== section start ========== -->
      <section class="section">
        <div class="container-fluid">
          <!-- ========== title-wrapper start ========== -->
          <div class="title-wrapper pt-30">
            <div class="row align-items-center">
              <div class="col-md-12 my-2">
                <div class="titlemb-30">
                  <h2 class="text-end">إعدادات </h2>
                </div>
              </div>
            </div>
            <!-- end row -->
          </div>
          <!-- ========== title-wrapper end ========== -->

          <div class="row">
            <div class="col-lg-12">
              <div class="card-style settings-card-1 mb-30">
                <div class="profile-info">
                  <div class="row">
                    <div class="col-md-12 text-center">
                      <h3>
                   <?php
                    if(isset($errMsg)){
                     echo '<div class="card-body">'.$errMsg.'</div>'; } ?> 

                     </h3>
                    </div>
                  </div>
                   <form method="POST" enctype="multipart/form-data">
                  <div class="d-flex align-items-center mb-30 ">
                    <div class="profile-image my-5">
                           <img<?php $file = "logo/".$settings['file'];?> src="<?php echo $file ?>" class="rounded" width="8%">
                      <div class="update-image">
                        <input  type="file" name="file" />
                      </div>
                    </div>
                    <div class="profile-meta">
                      <h5 class="text-bold text-dark mb-10">upload a Logo</h5>
                      <p class="text-sm text-gray">500/500 Pxl</p>
                    </div>
                  </div>
               <div class="input-style-1 text-end">
                    <label> رابط الموقع </label>
                    <input
                      type="text"
                      placeholder="url" name="url"
                      value="<?= $settings['url'] ?>"  />
                  </div>

                  <div class="input-style-1 text-end">
                    <label>اسم الموقع</label>
                    <input
                      type="text"
                      placeholder="title" name="title"
                      value="<?= $settings['title'] ?>"  />
                  </div>
                  <div class="input-style-1 text-end">
                    <label>بريد الموقع </label>
                    <input type="email"  name="email"
                    value="<?= $settings['email'] ?>" />
                  </div>
                  <div class="input-style-1 text-end">
                    <label>الهاتف </label>
                    <input type="text" placeholder="mobile" name="mobile"
                    value="<?= $settings['mobile'] ?>"/>
                  </div>

                  <div class="input-style-1 text-end">
                    <label>الفاكس</label>
                    <input type="text" name="fax" placeholder="fax"
                    value="<?= $settings['fax'] ?>"
                    />
                  </div>

                  <div class="input-style-1 text-end">
                    <label>لون واجهة الموقع </label>
                  <input type="color" name="color" class="form-control form-control-color" id="exampleColorInput" value="<?= $settings['color'] ?>" title="Choose your color">
                  </div>

                  <div class="input-style-1 text-end">
                    <label>العنوان </label>
                    <input type="text" name="adresse" value="<?= $settings['adresse'] ?>"/> 
                  </div>

                  <div class="input-style-1 text-end">
                  <div class="row">
                    <div class="col-md-4">
                      <label for="basic-url" class="form-label">Fcaebook</label>
                      <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3"><i class="fab fa-facebook-square"></i> </span>
                        <input type="text" value="<?= $settings['facebook'] ?>" name="facebook" class="form-control" aria-describedby="basic-addon3">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <label for="basic-url text-end" class="form-label">Instagram</label>
                      <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3"><i class="fab fa-instagram"></i> </span>
                        <input type="text" class="form-control" value="<?= $settings['instagram'] ?>" name="instagram" aria-describedby="basic-addon3">
                      </div>
                    </div> 

                    <div class="col-md-4">
                      <label for="basic-url text-end" class="form-label">Youtube</label>
                      <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3"><i class="fab fa-youtube"></i> </span>
                        <input type="text" class="form-control" value="<?= $settings['youtube'] ?>" name="youtube" aria-describedby="basic-addon3">
                      </div>
                    </div>                    
                  </div> 
                  </div>

                  <div class="input-style-1 text-end">
                    <label>وضعية الموقع</label>
                        <select name="off" class="form-select" aria-label="Default select example">
                            <option >اختر وضعية الموقع </option>
                            <option value="Close" <?=( $settings['off'] == "Close" ? "selected" : null )?> >مغلق </option>
                            <option value="Open" <?=( $settings['off'] == "Open" ? "selected" : null )?> >مفتوح </option>
                        </select>
                  </div>

                  <div class="input-style-1 text-end">
                      <label for="basic-url" class="form-label">مفتاح الخاص بالموقع </label>
                      <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3"><i class="fas fa-key"></i> </span>
                        <input type="text" class="form-control" value="<?= $settings['key'] ?>" name="key" aria-describedby="basic-addon3">
                      </div>
                  </div>


                  <div class="d-grid gap-2">
                      <button class="btn btn-primary" type="submit" >Save</button>
                 </div>
</form>
                </div>
              </div>
              <!-- end card -->
            </div>

          </div>
          <!-- end row -->
        </div>
        <!-- end container -->
      </section>
      
      <!-- ========== section end ========== -->
<?php include('footer.php'); ?>