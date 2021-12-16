<?php  

 require '../config/config.php'; 
 include('../languages/lang_config.php');
if(empty($_SESSION['login']))
header('Location: ../index.php');
        
 ?>

 <?php            
 $settings = $connect->query("SELECT * FROM `settings`")->fetch();
 
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" <?php $file ="logo/".$settings['file'];?> src="<?php echo $file ?>" type="image/x-icon"/>
    <title><?php echo $settings['title'] ?></title>

    <!-- ========== All CSS files linkup ========= -->
   <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>  
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css'>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/LineIcons.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="../plugin/fontawesome/fontawesome-browser.css" />

  </head>

      <style>
                @font-face {
    font-family: 'Cairo';
    src: url('https://fonts.gstatic.com/s/cairo/v10/SLXLc1nY6Hkvalrub46O59ZMaA.woff2');
    font-style: normal;
    }
    body {
       font-family: 'Cairo',sans-serif !important;
            }
    </style>

  <body>
    <!-- ======== sidebar-nav start =========== -->
    <aside class="sidebar-nav-wrapper">
      <div class="navbar-logo">
        <a href="index.php">
          <img <?php $file ="logo/".$settings['file'];?> src="<?php echo $file ?>" width="40%" alt="logo" />
        </a>
      </div>
      <nav class="sidebar-nav">
        <ul>
          <li class="nav-item nav-item-has-children">
            <a href="#0"  data-bs-toggle="collapse"  data-bs-target="#ddmenu_1"  aria-controls="ddmenu_1"  aria-expanded="false" aria-label="Toggle navigation" >
              <span class="icon">
                <svg width="22" height="22" viewBox="0 0 22 22">
                  <path
                    d="M17.4167 4.58333V6.41667H13.75V4.58333H17.4167ZM8.25 4.58333V10.0833H4.58333V4.58333H8.25ZM17.4167 11.9167V17.4167H13.75V11.9167H17.4167ZM8.25 15.5833V17.4167H4.58333V15.5833H8.25ZM19.25 2.75H11.9167V8.25H19.25V2.75ZM10.0833 2.75H2.75V11.9167H10.0833V2.75ZM19.25 10.0833H11.9167V19.25H19.25V10.0833ZM10.0833 13.75H2.75V19.25H10.0833V13.75Z" />
                </svg>
              </span>
              <span class="text">لوحة القيادة </span>
            </a>
            <ul id="ddmenu_1" class="collapse show dropdown-nav">
              <li>
                <a href="index.php" class="active"> لوحة القيادة  </a>
              </li>
            </ul>
          </li>
         
          <li class="nav-item nav-item-has-children">
            <a href="#0" class="collapsed" data-bs-toggle="collapse" data-bs-target="#ddmenu_2" aria-controls="ddmenu_2" aria-expanded="false"  aria-label="Toggle navigation" >
              <span class="icon">
                <svg width="22" height="22" viewBox="0 0 22 22"   fill="none" xmlns="http://www.w3.org/2000/svg" >
                  <path
                    d="M12.8334 1.83325H5.50008C5.01385 1.83325 4.54754 2.02641 4.20372 2.37022C3.8599 2.71404 3.66675 3.18036 3.66675 3.66659V18.3333C3.66675 18.8195 3.8599 19.2858 4.20372 19.6296C4.54754 19.9734 5.01385 20.1666 5.50008 20.1666H16.5001C16.9863 20.1666 17.4526 19.9734 17.7964 19.6296C18.1403 19.2858 18.3334 18.8195 18.3334 18.3333V7.33325L12.8334 1.83325ZM16.5001 18.3333H5.50008V3.66659H11.9167V8.24992H16.5001V18.3333Z"
                  />
                </svg>
              </span>
              <span class="text"> الموضوع </span>
            </a>
            <ul id="ddmenu_2" class="collapse dropdown-nav">

              <li>
                <a href="news.php"> اضافة موضوع   </a>
              </li>

              <li>
                <a href="allnews.php">   جميع الموضوع  </a>
              </li>

            </ul>
          </li>

          <li class="nav-item nav-item-has-children">
            <a href="#0" class="collapsed" data-bs-toggle="collapse" data-bs-target="#ddmenu_3" aria-controls="ddmenu_3" aria-expanded="false"  aria-label="Toggle navigation" >
              <span class="icon">
                <svg width="22" height="22" viewBox="0 0 22 22"   fill="none" xmlns="http://www.w3.org/2000/svg" >
                  <path
                    d="M12.8334 1.83325H5.50008C5.01385 1.83325 4.54754 2.02641 4.20372 2.37022C3.8599 2.71404 3.66675 3.18036 3.66675 3.66659V18.3333C3.66675 18.8195 3.8599 19.2858 4.20372 19.6296C4.54754 19.9734 5.01385 20.1666 5.50008 20.1666H16.5001C16.9863 20.1666 17.4526 19.9734 17.7964 19.6296C18.1403 19.2858 18.3334 18.8195 18.3334 18.3333V7.33325L12.8334 1.83325ZM16.5001 18.3333H5.50008V3.66659H11.9167V8.24992H16.5001V18.3333Z"
                  />
                </svg>
              </span>
              <span class="text">الفئات  </span>
            </a>
            <ul id="ddmenu_3" class="collapse dropdown-nav">
              <li>
                <a href="categories.php">  اضافة فئة جديدة   </a>
              </li>
              <li>
                <a href="Allcategories.php"> جميع الفئات  </a>
              </li>

            </ul>
          </li>

          <li class="nav-item nav-item-has-children">
            <a href="#0" class="collapsed" data-bs-toggle="collapse" data-bs-target="#ddmenu_6" aria-controls="ddmenu_6" aria-expanded="false"  aria-label="Toggle navigation" >
              <span class="icon">
                <svg width="22" height="22" viewBox="0 0 22 22"   fill="none" xmlns="http://www.w3.org/2000/svg" >
                  <path
                    d="M12.8334 1.83325H5.50008C5.01385 1.83325 4.54754 2.02641 4.20372 2.37022C3.8599 2.71404 3.66675 3.18036 3.66675 3.66659V18.3333C3.66675 18.8195 3.8599 19.2858 4.20372 19.6296C4.54754 19.9734 5.01385 20.1666 5.50008 20.1666H16.5001C16.9863 20.1666 17.4526 19.9734 17.7964 19.6296C18.1403 19.2858 18.3334 18.8195 18.3334 18.3333V7.33325L12.8334 1.83325ZM16.5001 18.3333H5.50008V3.66659H11.9167V8.24992H16.5001V18.3333Z"
                  />
                </svg>
              </span>
              <span class="text"> أعداد الصفحات </span>
            </a>
            <ul id="ddmenu_6" class="collapse dropdown-nav">            
              <li>
                <a href="settingspage.php">  الصفحة الرئيسية   </a>
              </li>

              <li>
                <a href="settingscategory.php">  صفحات الاقسام   </a>
              </li>

              <li>
                <a href="pagepost.php">   اعدد صفحات الموضيع   </a>
              </li>

            </ul>
          </li>

          <span class="divider"><hr /></span>

          <li class="nav-item">
             <a href="settings.php"> اعدادات الموقع   </a>
          </li>

          <li class="nav-item">
             <a href="<?= $settings['url'] ?>" rel="nofollow"  target="_blank"> زيارة الموقع </a>
          </li>

        </ul>
      </nav>
    </aside>


    <div class="overlay"></div>
    <!-- ======== sidebar-nav end =========== -->

    <!-- ======== main-wrapper start =========== -->
    <main class="main-wrapper">
      <!-- ========== header start ========== -->
      <header class="header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-5 col-md-5 col-6">
              <div class="header-left d-flex align-items-center">
                <div class="menu-toggle-btn mr-20">
                  <button
                    id="menu-toggle"
                    class="main-btn primary-btn btn-hover"
                  >
                    <i class="lni lni-chevron-left me-2"></i> قائمة
                  </button>
                </div>

              </div>
            </div>
            <div class="col-lg-7 col-md-7 col-6">
              <div class="header-right">
                <!-- profile start -->
                <div class="profile-box ml-15">
                  <button
                    class="dropdown-toggle bg-transparent border-0"
                    type="button"
                    id="profile"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                  >
                    <div class="profile-info">
                      <div class="info">
                        <h6><?php echo $_SESSION['login']['fullname']; ?></h6>
                        <div class="image">
                          <img  src="assets/images/profile/profile-image.png" alt=""/>
                          <span class="status"></span>
                        </div>
                      </div>
                    </div>
                    <i class="lni lni-chevron-down"></i>
                  </button>
                  <ul
                    class="dropdown-menu dropdown-menu-end"
                    aria-labelledby="profile"
                  >
                    <li>
                      <a href="profile.php">
                        <i class="lni lni-user"></i> الصفحة الشخصية
                      </a>
                    </li>
                    <li>
                      <a href="settingsprofile.php?edituser_id=<?php echo $_SESSION['login']['id'];?>"> <i class="lni lni-cog"></i> إعدادات </a>
                    </li>
                    <li>
                      <a href="logout.php"> <i class="lni lni-exit"></i> خروج </a>
                    </li>
                  </ul>
                </div>
                <!-- profile end -->
              </div>
            </div>
          </div>
        </div>
      </header>
      <!-- ========== header end ========== -->