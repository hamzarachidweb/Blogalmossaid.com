<?php include('head.php');

    $new_id = $_GET['post_id'];
    $allnew = $connect->query("SELECT * FROM category  WHERE id = '".$new_id."' ");
    $new    = $allnew->fetch();

    $settingsPage = $connect->query("SELECT * FROM `pagecategory`")->fetch();
     ?>
 <title><?=$new['name_category'];?></title>
<div class="container">
	<div class="row">
		<div class="col-md-8 text-center">
          <div class="row">
            <div class="card-body">
              <div class="card">
                <h3><?php echo $new['name_category']; ?> <i class="<?php echo $new['icon'] ?>"></i></h3>
              </div>
            </div>
 	           <?php
                $allnew = $connect-> prepare(" ( SELECT * FROM news WHERE category_id = '".$new_id."' ) order by date desc LIMIT 12 ");
                $allnew->execute();
                ?>
                 <?php while ($new = $allnew->fetch()): ?> 
                   <div class="col-lg-4 col-md-6 text-center">
                      <div class="card">
                        <img <?php $file ="adminAPI/uploads/".$new['file'];?> src="<?php echo $file ?>" alt="" width="100%" height="150" class="card-img-top">
                        <div class="card-body">
                          <h6 class="card-title"><?php echo substr($new['name'], 0, 88); ?></h6>
                          <a href="news.php?post_id=<?php echo $new['id'];?>" class="btn cards">المزيد</a>
                        </div>
                      </div>
                   </div>
                  <?php endwhile; ?>
          </div>
		</div>

		<div class="col-md-4">

    <div class="card bg-light mb-3">
       <div class="card-body">
     <div class="card">
       <div class="card-body">
           <div class="text-center img-fluid" ><?php echo $settingsPage['ads_category'] ?></div>
       </div>
     </div>

       </div>
     </div>


    <div class="card bg-light mb-3">
       <div class="card-header bg-danger">
       <?php
        $categoryTop = $connect->query("SELECT * FROM category WHERE id = ".$settingsPage['page_category']." ")->fetch();
        ?>
      <h5 class="text-center" style="color: #FFF;" ><?=$categoryTop['name_category'] ?></h5>
       </div>
       <div class="card-body">
                 <div class="card mb-3">
                        <?php
                       $videos = $connect-> prepare("SELECT * FROM news WHERE category_id = ".$settingsPage['page_category']." order by date desc LIMIT 4");
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

         <div class="card bg-light mb-3">
       <div class="card-header video">
       <?php
        $categoryTop = $connect->query("SELECT * FROM category WHERE id = ".$settingsPage['page1_category']." ")->fetch();
        ?>
      <h5 class="text-center" style="color: #FFF;" ><?=$categoryTop['name_category'] ?></h5>
       </div>
       <div class="card-body">
                 <div class="card mb-3">
                        <?php
                       $videos = $connect-> prepare("SELECT * FROM news WHERE category_id = ".$settingsPage['page1_category']." order by date desc LIMIT 4");
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

<?php include('footer.php'); ?>