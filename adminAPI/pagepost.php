<?php include('head.php');

            if( $_POST ){
                 $ads_post = $_POST['ads_post'];
                 $page_post = $_POST['page_post'];
                 $page1_post = $_POST['page1_post'];
                 $page2_post = $_POST['page2_post'];

               try {
                   $stmt =  $connect->prepare("UPDATE pagepost SET `page2_post`='$page2_post',`page_post`='$page_post',`ads_post`='$ads_post',`page1_post`='$page1_post'");
                    $stmt->execute(array(
                    ':ads_post' => $ads_post,
                    ':page_post' => $page_post,
                    ':page1_post' => $page1_post,
                    ':page2_post' => $page2_post,

                    ));

                header('Location: pagepost.php?action=almossaid');
                exit;
                  }
            catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
    
        if(isset($_GET['action']) && $_GET['action'] == 'almossaid') {
        $errMsg = ' <div class="alert alert-primary" role="alert">  لقد تم تعديل معلومات موقع بنجاح   </div> ';
    }

       $page = $connect->query("SELECT * FROM `pagepost`")->fetch();
    ?>

<div class="container">
	 <form method="POST" enctype="multipart/form-data">
	<div class="row my-2">
        <div class="row">
            <div class="col-md-12 my-2">
                <h3 class="text-center">   اعدد صفحات الموضيع    </h3>
            </div>
        </div>
     	   <div class="col-md-4 text-end">
     		 <div class="card">
     	         <div class="card-body">
			        <table>  اضافة اعلان  </table>
              <div class="input-group">
              <textarea class="form-control" name="ads_post"><?php echo $page['ads_post'] ?></textarea>
              </div>
               	</div>
             </div>
		   </div>

         <div class="col-md-8 text-end">
             <div class="card">
                 <div class="card-body">
                    <table> حدد الاقسم  </table>
                       <?php 
                            $categori = $connect->query("SELECT * FROM category ");
                            $categori->execute();
                            ?>
                       <select class="form-select" aria-label="Default select example" name="page2_post">
                        <?php while( $categoris = $categori->fetch()) :?>
                       <option value="<?=$categoris['id']?>" <?=( $page['page2_post'] == $categoris['id'] ? 'selected' : null )?> ><?=$categoris['name_category']?> </option>
                        <?php endwhile; ?>
                       </select>
                </div>
             </div>
           </div>

	</div>

    <div class="row my-2">
         <div class="col-md-4 text-end">
             <div class="card">
                 <div class="card-body">
                    <table> حدد الاقسم  </table>
                       <?php 
                            $categori = $connect->query("SELECT * FROM category ");
                            $categori->execute();
                            ?>
                       <select class="form-select" aria-label="Default select example" name="page_post">
                        <?php while( $categoris = $categori->fetch()) :?>
                       <option value="<?=$categoris['id']?>" <?=( $page['page_post'] == $categoris['id'] ? 'selected' : null )?> ><?=$categoris['name_category']?> </option>
                        <?php endwhile; ?>
                       </select>
                </div>
             </div>
           </div>

    </div>
    
    <div class="row my-2">
         <div class="col-md-4 text-end">
             <div class="card">
                 <div class="card-body">
                    <table> حدد الاقسم  </table>
                       <?php 
                            $categori = $connect->query("SELECT * FROM category ");
                            $categori->execute();
                            ?>
                       <select class="form-select" aria-label="Default select example" name="page1_post">
                        <?php while( $categoris = $categori->fetch()) :?>
                       <option value="<?=$categoris['id']?>" <?=( $page['page1_post'] == $categoris['id'] ? 'selected' : null )?> ><?=$categoris['name_category']?> </option>
                        <?php endwhile; ?>
                       </select>
                </div>
             </div>
           </div>

    </div>

   <div class="d-grid gap-2 my-3">
  <button class="btn btn-primary" type="submit" >تعديل </button>
  </div>
</div>
</form>
</div>

<?php include('footer.php'); ?>