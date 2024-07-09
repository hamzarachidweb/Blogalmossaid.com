<?php include('head.php');

    $news_id = $_GET['post_id'];
    $newspost = $connect->query("SELECT * FROM news  WHERE id = '".$news_id."' ");
    $news    = $newspost->fetch();

    $settingsPage = $connect->query("SELECT * FROM `pagepost`")->fetch();

     ?>

<title><?=$news['name'];?></title>
<style>
  .note-content
  img,iframe {
  width: 60%    !important;
  height:    !important;
  }


</style>
<div class="container">
  <div class="row">
    <div class="col-md-8 text-center">

      <div class="card">
        <div class="card-body">
          <div class="row">

              <div class="col-md-3 text-end">
                  <h6><?=$news['date'];?></h6>
              </div>           
         </div>
           <h3><?=$news['name'];?></h3>
           <br>
           <span class="text-end note-content" ><?=$news['content'];?></span>
        </div>
      </div>
    </div>

    <div class="col-md-4">

    <div class="card bg-light mb-3">
       <div class="card-body">
     <div class="card">
       <div class="card-body">
           <div class="text-center img-fluid" ><?php echo $settingsPage['ads_post'] ?></div>
       </div>
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
                   <div class="fb-page" 
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
        $categoryTop = $connect->query("SELECT * FROM category WHERE id = ".$settingsPage['page_post']." ")->fetch();
        ?>
      <h5 class="text-center" style="color: #FFF;" ><?=$categoryTop['name_category'] ?></h5>
       </div>
       <div class="card-body">
                 <div class="card mb-3">
                        <?php
                       $videos = $connect-> prepare("SELECT * FROM news WHERE category_id = ".$settingsPage['page_post']." order by date desc LIMIT 5");
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

         <div class="card bg-light mb-3">
       <div class="card-header video">
       <?php
        $categoryTop = $connect->query("SELECT * FROM category WHERE id = ".$settingsPage['page1_post']." ")->fetch();
        ?>
      <h5 class="text-center" style="color: #FFF;" ><?=$categoryTop['name_category'] ?></h5>
       </div>
       <div class="card-body">
                 <div class="card mb-3">
                        <?php
                       $videos = $connect-> prepare("SELECT * FROM news WHERE category_id = ".$settingsPage['page1_post']." order by date desc LIMIT 5");
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


<div class="container">
  <div class="row new">
    <div class="col-md-12">
      <h5 class="new my-2" >
      <?php
        $categoryTop = $connect->query("SELECT * FROM category WHERE id = ".$settingsPage['page2_post']." ")->fetch();
        ?>
        <img class="my-2" <?php $file ="adminAPI/logo/".$settings['file'];?> src="<?php echo $file ?>" alt="" width="28" height="36"> <?=$categoryTop['name_category'] ?> </h5>
    </div>
  </div> 

      <div class="row">
           <?php
            $activitie = $connect-> prepare(" SELECT * FROM news WHERE category_id = ".$settingsPage['page2_post']." order by date desc LIMIT 4 ");
            $activitie->execute();
             ?>
           <?php while ($activities = $activitie->fetch()): ?> 
        <div class="col-md-3 text-center">
           <div class="card">
             <img <?php $file ="adminAPI/uploads/".$activities['file'];?> src="<?php echo $file ?>" alt="" width="100%" height="220" class="card-img-top">
             <div class="card-body">
               <h6 class="card-title"><?php echo substr($activities['name'], 0, 88); ?></h6>
               <a href="news.php?post_id=<?php echo $activities['id'];?>" class="btn cards">المزيد</a>
             </div>
           </div>
        </div>

 <?php endwhile; ?>

</div>

    <script>

      $('.star').fontstar({},function(value,self){

        console.log("hello "+value);
      });
    </script>

<?php include('footer.php'); ?>

