<?php 
require 'config/config.php';

$settings = $connect->query("SELECT * FROM `settings`")->fetch();

if( $settings['off'] == "Close" ){
  //echo "This website is close right now";
  header("Location: Home.php");
  exit();
}

        $ip = $_SERVER['REMOTE_ADDR'];
         $stmt = $connect->prepare("SELECT ip  FROM counter WHERE ip= '$ip'");
         $stmt->execute();
         $stmt1=$stmt->rowCount();
         if ($stmt1==0) {
          $stmt2 = $connect->prepare("INSERT INTO counter (id, ip) VALUES(NULL, '$ip')");
          $stmt2->execute();
         }
         
?>
<!doctype html>
<html lang="ar" dir="rtl">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
                @font-face {
    font-family: 'Cairo';
    src: url('https://fonts.gstatic.com/s/cairo/v10/SLXLc1nY6Hkvalrub46O59ZMaA.woff2');
    font-style: normal;
}

body {

    font-family: 'Cairo',sans-serif !important;
 

            }

            .navbar{background:<?php echo $settings['color'] ?>;}

              a:link, a:visited {
              text-decoration: none;
              }    
    </style>
  
    <!-- Bootstrap CSS -->
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link href="css/bootstrap.min.css" rel="stylesheet" >
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css'>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/blog.css">
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="plugin/dark-mode-bootstrap/dark-mode.css">
    <link rel="shortcut icon" <?php $file ="adminAPI/logo/".$settings['file'];?> src="<?php echo $file ?>" type="image/x-icon"/>
  </head>
  <body class="bg-white">



  <!-- Navigation -->
<div class="my-3">
    <div class="my-4">

            <nav class="navbar fixed-top navbar-expand-lg custom-navbar navbar-dark " role="navigation">
               <div class="container">
                   <a class="navbar-brand" href="index">
                 <img <?php $file ="adminAPI/logo/".$settings['file'];?> src="<?php echo $file ?>" width="70" height="60">
                  </a>

                 <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                   <span class="navbar-toggler-icon"></span>
                 </button>
                 <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                         <li class="nav-item active">
                               <a class="nav-link" href="index">
                                <i class="fas fa-home"></i>
                               الرئيسية
                              </a>
                         </li>

                             <?php
                             $category = $connect-> prepare("SELECT * FROM category  ");
                             $category->execute();
                               ?>
                             <?php while ($navbar = $category->fetch()): ?> 
                         <li class="nav-item">
                            <a class="nav-link" href="category.php?post_id=<?php echo $navbar['id'];?>">
                                <i class="<?php echo $navbar['icon'] ?>"></i>
                             <?php echo $navbar['name_category'] ?>
                             </a>
                         </li>
                              <?php endwhile; ?>
                    </ul>
                 </div>

                       <span class="navbar-text">
                               <a href="<?=$settings['facebook'];?>" rel="nofollow" target="_blank">
                                <i class="fab fa-facebook"></i>
                              </a>
                              <a href="<?=$settings['instagram'];?>" rel="nofollow" target="_blank">
                                <i class="fab fa-instagram"></i>
                              </a>
                              <a href="<?=$settings['youtube'];?>" rel="nofollow" target="_blank">
                                <i class="fab fa-youtube"></i>
                              </a>
                       </span>
                     <div class="navbar-text form-check form-switch mt-2 me-atuos text-white">
                      <label class="form-check-label ms-2" for="darkSwitch">
                           <svg  xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"  class="bi bi-brightness-high" viewBox="0 0 16 16">
                             <path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/>
                        </svg>
                      </label>
                      <input class="form-check-input" type="checkbox" id="darkSwitch" />
                    </div>

               </div>
             </nav>
</div>
</div>


<div class="container mt-3">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center breaking-news bg-white">
                <div class="d-flex flex-row flex-grow-1 flex-fill justify-content-center bg-danger py-2 text-white px-1 news">
                    <span class="d-flex align-items-center">
                اخر الاخبار
                    </span>
                </div>
                <marquee class="news-scroll" behavior="scroll" direction="right" onmouseover="this.stop();" onmouseout="this.start();"> 
            <?php
            $newssd = $connect-> prepare(" SELECT * FROM news order by date desc LIMIT 22 ");
            $newssd->execute();
             ?>
           <?php while ($sd = $newssd->fetch()): ?> 

                    <a href="news.php?post_id=<?php echo $sd['id'];?>" style="color: <?php echo $settings['color'] ?> ;">
                        <?php echo substr($sd['name'], 0, 200); ?>
                    </a> 
                    <img class="my-2" <?php $file ="adminAPI/logo/".$settings['file'];?> src="<?php echo $file ?>" alt="" width="28" height="36">
                     <?php endwhile; ?>
                </marquee>
            </div>
        </div>
    </div>
</div>


<style>

.news {
    width: 160px
}

.news-scroll a {
    text-decoration: none
}

.dot {
    height: 6px;
    width: 6px;
    margin-left: 3px;
    margin-right: 3px;
    margin-top: 2px !important;
    background-color: rgb(207, 23, 23);
    border-radius: 50%;
    display: inline-block
}

  .cards{
    background: <?php echo $settings['color'] ?>;
    color: #FFF;
    font-size: 0.7rem;
  }

  .video{
    background: <?php echo $settings['color'] ?>;
    color: #FFF;
  }

  .new {
    background: <?php echo $settings['color'] ?>;
    color: #FFF;
  border-radius: 8px;
  }



</style>
