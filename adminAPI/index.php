<?php include('head.php'); ?>


      <!-- ========== section start ========== -->
      <section class="section">
        <div class="container-fluid">
          <!-- ========== title-wrapper start ========== -->
          <div class="title-wrapper pt-30">
            <div class="row align-items-center">
              <div class="col-md-12">
                <div class="title mb-30">
                  <h2 class="text-center">لوحة القيادة </h2>
                </div>
              </div>
              <!-- end col -->
            </div>
            <!-- end row -->
          </div>
          <!-- ========== title-wrapper end ========== -->
          <div class="row">
            <div class="col-xl-3 col-lg-4 col-sm-6">
              <div class="icon-card mb-30">
                <div class="icon purple">
                  <i class="lni lni-notepad"></i>
                </div>
                <div class="content">
                  <h6 class="mb-10">عدد الموضيع</h6>
                  <h3 class="text-bold mb-10">
                  <?php 
                  $countuser = $connect->query(" SELECT count(*) as newspost FROM `news`  ");
                  $data = $countuser->fetch(PDO::FETCH_ASSOC);
                    echo $data['newspost']
                   ?>
                  </h3>
                  <p class="text-sm text-success">
                  </p>
                </div>
              </div>
              <!-- End Icon Cart -->
            </div>
            <!-- End Col -->
            <div class="col-xl-3 col-lg-4 col-sm-6">
              <div class="icon-card mb-30">
                <div class="icon success">
                  <i class="lni lni-write"></i>
                </div>
                <div class="content">
                  <h6 class="mb-10"> عدد الاقسام </h6>
                  <h3 class="text-bold mb-10">
                  <?php 
                  $countuser = $connect->query(" SELECT count(*) as category FROM `category`  ");
                  $data = $countuser->fetch(PDO::FETCH_ASSOC);
                    echo $data['category']
                   ?>
                  </h3>
                  <p class="text-sm text-success">
                  </p>
                </div>
              </div>
              <!-- End Icon Cart -->
            </div>
            <!-- End Col -->
            <div class="col-xl-3 col-lg-4 col-sm-6">
              <div class="icon-card mb-30">
                <div class="icon primary">
                  <i class="lni lni-users"></i>
                </div>
                <div class="content">
                  <h6 class="mb-10"> عدد الاعضاء </h6>
                  <h3 class="text-bold mb-10">
                  <?php 
                  $countuser = $connect->query(" SELECT count(*) as users FROM `users`  ");
                  $data = $countuser->fetch(PDO::FETCH_ASSOC);
                    echo $data['users']
                   ?>
                  </h3>
                  <p class="text-sm text-danger">
                  </p>
                </div>
              </div>
              <!-- End Icon Cart -->
            </div>
            <!-- End Col -->
            <div class="col-xl-3 col-lg-4 col-sm-6">
              <div class="icon-card mb-30">
                <div class="icon orange">
                  <i class="lni lni-eye"></i>
                </div>
                <div class="content">
                  <h6 class="mb-10">عدد زوار </h6>
                  <h3 class="text-bold mb-10">
                  <?php 
                  $countuser = $connect->query(" SELECT count(*) as countpost FROM `counter`  ");
                  $data = $countuser->fetch(PDO::FETCH_ASSOC);
                    echo $data['countpost']
                   ?>
                  </h3>
                  <p class="text-sm text-danger">
                  </p>
                </div>
              </div>
              <!-- End Icon Cart -->
            </div>
            <!-- End Col -->
          </div>

        </div>
        <!-- end container -->
      </section>
      <!-- ========== section end ========== -->
<?php include('footer.php'); ?>