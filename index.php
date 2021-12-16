<?php include('head.php');
  $settingsPage = $connect->query("SELECT * FROM `settingspage`")->fetch();
?>
    <title><?php echo $settings['title'] ?></title>

<div class="container">
  <div class="row">
    <div class="col-md-8">
          <div class="card">

 <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
 <div class="carousel-inner">
    <?php
    /*Extraction des données*/
    $reponse = $connect->query(" SELECT * FROM news WHERE category_id = ".$settingsPage['page']." order by date desc LIMIT 6 ");
    $counter = 1;
    while($row = $reponse->fetch()){
      ?>
      <div class="carousel-item <?= $counter == 1 ? 'active' : false; ?>">
        <a href="news.php?post_id=<?php echo $row['id'];?>">
          <img class="img-fluid"  alt="<?php echo $row['name'] ?>" src="adminAPI/uploads/<?php echo $row['file'] ?>" style="width:900px;height:383px;"/>
        </a>
        <div class="carousel-caption ">
          <h3><?php echo substr($row['name'], 0, 200); ?>..</h3>
          <p><?php echo substr($row['description'], 0, 308); ?>..</p>
        </div>
      </div>
      <?php
      $counter++;
    }
    ?>
  </div>

  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>

</div>

</div>
    </div>

    <div class="col-md-4">
     
      <?php            
     $president = $connect->query("SELECT * FROM `settingspage`")->fetch();
      ?>
     <div class="card">
       <div class="card-body">
           <div class="text-center note-content" ><?php echo $president['ads'] ?></div>
       </div>
     </div>
    </div>
  </div>
</div>



<div class="container">
  <div class="row new">
    <div class="col-md-12">
      <h5 class="new my-2" >
        <?php
        $categoryTop = $connect->query("SELECT * FROM category WHERE id = ".$settingsPage['page1']."  ")->fetch();
        ?>
        <img class="my-2" <?php $file ="adminAPI/logo/".$settings['file'];?> src="<?php echo $file ?>" width="32" height="36"> <?=$categoryTop['name_category'] ?> </h5>
    </div>
  </div>
  <div class="row">
     <div class="col-md-8">
      <div class="row">
           <?php
            $activitie = $connect-> prepare(" SELECT * FROM news WHERE category_id = ".$settingsPage['page1']." order by date desc LIMIT 6 ");
            $activitie->execute();
             ?>
           <?php while ($activities = $activitie->fetch()): ?> 
        <div class="col-md-6 col-lg-4 text-center">
           <div class="card">
             <img <?php $file ="adminAPI/uploads/".$activities['file'];?> src="<?php echo $file ?>" width="100%" height="190" class="card-img-top">
             <div class="card-body">
               <h6 class="card-title"><?php echo substr($activities['name'], 0, 88); ?></h6>
               <a href="news.php?post_id=<?php echo $activities['id'];?>" class="btn cards">المزيد</a>
             </div>
           </div>
        </div>

 <?php endwhile; ?>

  <div class="row new">
    <div class="col-md-12">
      <h5 class="new my-2" >
      <?php
        $categoryTop = $connect->query("SELECT * FROM category WHERE id = ".$settingsPage['page3']."  ")->fetch();
        ?>
        <img class="my-2" <?php $file ="adminAPI/logo/".$settings['file'];?> src="<?php echo $file ?>" width="32" height="36"> <?=$categoryTop['name_category'] ?> </h5>
    </div>

  </div> 

        <?php
          $allnew = $connect-> prepare("SELECT * FROM news WHERE category_id = ".$settingsPage['page3']." order by date desc LIMIT 8 ");
         $allnew->execute();
        ?>
         <?php while ($new = $allnew->fetch()): ?> 
        <div class="col-md-6 col-lg-3 text-center">
           <div class="card">
             <img <?php $file ="adminAPI/uploads/".$new['file'];?> src="<?php echo $file ?>"  width="100%" height="140" class="card-img-top">
             <div class="card-body">
               <h6 class="card-title"><?php echo substr($new['name'], 0, 66); ?></h6>
               <a href="news.php?post_id=<?php echo $new['id'];?>" class="btn cards">المزيد</a>
             </div>
           </div>
        </div>

 <?php endwhile; ?>

      </div>
     </div>

     <div class="col-md-4">
        <div class="card bg-light mb-3">
             <div class="card-header bg-danger">
       <?php
        $categoryTop = $connect->query("SELECT * FROM category WHERE id = ".$settingsPage['page2']." ")->fetch();
        ?>
               <h5 class="text-center" style="color: #FFF;" ><?=$categoryTop['name_category'] ?></h5>
             </div>
             <div class="card-body">
                 <div class="card mb-3">
                        <?php
                       $videos = $connect-> prepare("SELECT * FROM news WHERE category_id = ".$settingsPage['page2']." order by date desc LIMIT 3");
                       $videos->execute();
                     ?>
                      <?php while ($video = $videos->fetch()): ?> 
                   <div class="row g-0 text-center">
                      <div class="col-md-12 col-lg-6">
                        <a href="news.php?post_id=<?php echo $video['id'];?>">
                        <img <?php $file ="adminAPI/uploads/".$video['file'];?> src="<?php echo $file ?>" width="100%"></a>
                     </div>
                     <div class="col-md-12 col-lg-6">
                       <div class="card-body">
                         <h6 class="card-title"><?php echo substr($video['name'], 0, 88); ?></h6>
                       </div>
                     </div>
                   </div>
            <?php endwhile; ?>
                 </div>
             </div>
     </div>
     <style>
       .facebook {
        background: #3143d9;
        color: #FFF;
       }
     </style>
     <div class="card bg-light mb-3">
             <div class="card-header facebook">
               <h5 class="text-center" >فيس بوك</h5>
             </div>
             <div class="card-body">
                 <div class="card mb-3">
                   <div class="fb-page note-content" 
                     data-href="<?=$settings['facebook'];?>"
                     data-width="380" 
                     data-hide-cover="false"
                     data-show-facepile="false"></div>
                 </div>
             </div>
     </div>

        <div class="card bg-light mb-3">
             <div class="card-header bg-danger">
       <?php
        $categoryTop = $connect->query("SELECT * FROM category WHERE id = ".$settingsPage['page4']." ")->fetch();
        ?>
               <h5 class="text-center" style="color: #FFF;" ><?=$categoryTop['name_category'] ?></h5>
             </div>
             <div class="card-body">
                 <div class="card mb-3">
                        <?php
                       $videos = $connect-> prepare("SELECT * FROM news WHERE category_id = ".$settingsPage['page4']." order by date desc LIMIT 3");
                       $videos->execute();
                     ?>
                      <?php while ($video = $videos->fetch()): ?> 
                   <div class="row g-0">
                      <div class="col-md-6">
                        <a href="news.php?post_id=<?php echo $video['id'];?>">
                        <img <?php $file ="adminAPI/uploads/".$video['file'];?> src="<?php echo $file ?>" width="100%"></a>
                     </div>
                     <div class="col-md-6">
                       <div class="card-body">
                         <h6 class="card-title"><?php echo substr($video['name'], 0, 66); ?></h6>
                       </div>
                     </div>
                   </div>
            <?php endwhile; ?>
                 </div>
             </div>
     </div>


   </div>
  </div>
  </div>

</div>

<div class="container">
  <div class="row ads2">
    <div class="col-md-8">
      <h5 class="ads2 my-2" >
      <?php
        $categoryTop = $connect->query("SELECT * FROM category WHERE id = ".$settingsPage['page5']." ")->fetch();
        ?>
        <img class="my-2" <?php $file ="adminAPI/logo/".$settings['file'];?> src="<?php echo $file ?>" width="32" height="36"> <?=$categoryTop['name_category'] ?> </h5>
    </div>
  </div> 
      <div class="row">

           <?php
            $activitie = $connect-> prepare(" SELECT * FROM news WHERE category_id = ".$settingsPage['page5']." order by date desc LIMIT 6 ");
            $activitie->execute();
             ?>
           <?php while ($activities = $activitie->fetch()): ?> 
        <div class="col-md-2 text-center">
           <div class="card">
             <img <?php $file ="adminAPI/uploads/".$activities['file'];?> src="<?php echo $file ?>" alt="" width="100%" height="180" class="card-img-top">
             <div class="card-body">
               <h6 class="card-title"><?php echo substr($activities['name'], 0, 64); ?></h6>
               <a href="news.php?post_id=<?php echo $activities['id'];?>" class="btn cards">المزيد</a>
             </div>
           </div>
        </div>

 <?php endwhile; ?>
</div>
</div>


<div class="container">
  <div class="row">
    <div class="col-md-8">
      
         <h5 class="new my-2" >
      <?php
        $categoryTop = $connect->query("SELECT * FROM category WHERE id = ".$settingsPage['page7']." ")->fetch();
        ?>
        <img class="my-2" <?php $file ="adminAPI/logo/".$settings['file'];?> src="<?php echo $file ?>" width="32" height="36"> <?=$categoryTop['name_category'] ?> </h5>

      <div class="row">
           <?php
            $activitie = $connect-> prepare(" SELECT * FROM news WHERE category_id = ".$settingsPage['page7']." order by date desc LIMIT 6 ");
            $activitie->execute();
             ?>
           <?php while ($activities = $activitie->fetch()): ?> 
        <div class="col-md-4 text-center">
           <div class="card">
             <img <?php $file ="adminAPI/uploads/".$activities['file'];?> src="<?php echo $file ?>" alt="" width="100%" height="120" class="card-img-top">
             <div class="card-body">
               <h6 class="card-title"><?php echo substr($activities['name'], 0, 44); ?> ...</h6>
               <a href="news.php?post_id=<?php echo $activities['id'];?>" class="btn cards">المزيد</a>
             </div>
           </div>
        </div>

 <?php endwhile; ?>
</div>

    </div>
    <div class="col-md-4">
          <style>
       .ads2 {
        background: #1c9ba1;
        color: #FFF;
       }
     </style>
     <div class="card bg-light mb-3">
             <div class="card-header ads2">
               <h5 class="text-center" > مواقيت الصلاة  </h5>
             </div>
             <div class="card-body">
                 <div class="card mb-3">
                    <div class="text-center note-content" ><?php echo $president['page6'] ?></div>
                 </div>
             </div>
     </div>

    </div>
  </div>


</div>



<?php include('footer.php'); ?>