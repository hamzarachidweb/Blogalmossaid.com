<?php include('head.php');

            if( $_POST ){
                 $ads_category = $_POST['ads_category'];
                 $page_category = $_POST['page_category'];
                 $page1_category = $_POST['page1_category'];

               try {
                   $stmt =  $connect->prepare("UPDATE pagecategory SET `page_category`='$page_category',`ads_category`='$ads_category',`page1_category`='$page1_category'");
                    $stmt->execute(array(
                    ':ads_category' => $ads_category,
                    ':page_category' => $page_category,
                    ':page1_category' => $page1_category,


                    ));

                header('Location: settingscategory.php?action=almossaid');
                exit;
                  }
            catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
    
        if(isset($_GET['action']) && $_GET['action'] == 'almossaid') {
        $errMsg = ' <div class="alert alert-primary" role="alert">  لقد تم تعديل معلومات موقع بنجاح   </div> ';
    }

       $page = $connect->query("SELECT * FROM `pagecategory`")->fetch();
    ?>

<div class="container">
	 <form method="POST" enctype="multipart/form-data">
	<div class="row my-2">
        <div class="row">
            <div class="col-md-12 my-2">
                <h3 class="text-center">   اعدد صفحات الاقسام  </h3>
            </div>
        </div>
     	   <div class="col-md-4 text-end">
     		 <div class="card">
     	         <div class="card-body">
			        <table>  اضافة اعلان  </table>
              <div class="input-group">
              <textarea class="form-control" name="ads_category"><?php echo $page['ads_category'] ?></textarea>
              </div>
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
                       <select class="form-select" aria-label="Default select example" name="page_category">
                        <?php while( $categoris = $categori->fetch()) :?>
                       <option value="<?=$categoris['id']?>" <?=( $page['page_category'] == $categoris['id'] ? 'selected' : null )?> ><?=$categoris['name_category']?> </option>
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
                       <select class="form-select" aria-label="Default select example" name="page1_category">
                        <?php while( $categoris = $categori->fetch()) :?>
                       <option value="<?=$categoris['id']?>" <?=( $page['page1_category'] == $categoris['id'] ? 'selected' : null )?> ><?=$categoris['name_category']?> </option>
                        <?php endwhile; ?>
                       </select>
                </div>
             </div>
           </div>

    </div>



   <div class="d-grid gap-2 my-3">
  <button class="btn btn-primary" type="submit" >تعديل</button>
  </div>
</div>
</form>
</div>

<?php include('footer.php'); ?>