
<div class="container-fluid">
    <div class="row" style="background: #20282d; 
position: relative;min-height:50px;overflow: hidden;border-bottom:2px solid #ffc107">

        <div class="col-md-4 my-4" style=" color: #fff;">
          <h4 class="my-4 text-center ">اتصل بنا</h4>

          <div style="font-size: 0.9em;">
           <i class="icon fas fa-envelope-open-text"></i>
            البريد الالكتروني
           <span dir="ltr"> <?php echo $settings['email'] ?></span> 
           </div>

           <div style="font-size: 0.9em;">
           <i class="fas fa-phone-alt"></i>
             الهاتف 
           <span dir="ltr"> <?php echo $settings['mobile'] ?></span> 
           </div>

            <div style="font-size: 0.9em;">
           <i class="fas fa-fax"></i>
             الفاكس 
           <span dir="ltr"> <?php echo $settings['fax'] ?></span> 
           </div>

            <div style="font-size: 0.9em;">
           <i class="icon fas fa-map-marked-alt"></i>
             العنوان 
           <span dir="ltr"> <?php echo $settings['adresse'] ?></span> 
           </div>


        </div>

        <div class="col-md-4 text-center my-4" style=" color: #fff;">
            <img <?php $file ="adminAPI/logo/".$settings['file'];?> src="<?php echo $file ?>" width="30%"><br>
          <h6 style="font-size: 0.7rem;"><?php echo $settings['title'] ?> 2021 ©</h6>

              <div class="copyright text-center">
                <p class="text-sm">© 2017 - 2021. جميع الحقوق محفوظة.<img src="https://almossaid.com/frontend/assets/images/shape/s1.svg" alt="Almossaid" height="30" /> <a href="https://almossaid.com/" rel="nofollow" target="_blank">S.A.M.W.SERVICES LLC </a>
                </p>
              </div>


           </div>

    </div>
</div>

<script src="plugin/star/jquery.fontstar.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
<script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v12.0&appId=1782368955394451&autoLogAppEvents=1" nonce="04v2RHxU"></script>
  <script src="plugin/dark-mode-bootstrap/dark-mode-switch.min.js"></script>




  </body>
</html>