<?php include('head.php');

            if( $_POST ){
                 $ads = $_POST['ads'];
                 $page = $_POST['page'];
                 $page1 = $_POST['page1'];
                 $page2 = $_POST['page2'];
                 $page3 = $_POST['page3'];
                 $page4 = $_POST['page4'];
                 $page5 = $_POST['page5'];
                 $page6 = $_POST['page6'];
                 $page7 = $_POST['page7'];
               try {
                   $stmt =  $connect->prepare("UPDATE settingspage SET `page`='$page',`ads`='$ads',`page1`='$page1',`page2`='$page2',`page3`='$page3',`page4`='$page4',`page5`='$page5',`page6`='$page6',`page7`='$page7'");
                    $stmt->execute(array(
                    ':ads' => $ads,
                    ':page' => $page,
                    ':page1' => $page1,
                    ':page2' => $page2,
                    ':page3' => $page3,
                    ':page4' => $page4,
                    ':page5' => $page5,
                    ':page6' => $page6,
                    ':page7' => $page7,

                    ));

                header('Location: settingspage.php?action=almossaid');
                exit;
                  }
            catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
    
        if(isset($_GET['action']) && $_GET['action'] == 'almossaid') {
        $errMsg = ' <div class="alert alert-primary" role="alert">  لقد تم تعديل معلومات موقع بنجاح   </div> ';
    }

       $page = $connect->query("SELECT * FROM `settingspage`")->fetch();
    ?>

<div class="container">
	 <form method="POST" enctype="multipart/form-data">
	<div class="row my-2">
        <div class="row">
            <div class="col-md-12 my-2">
                <h3 class="text-center"> اعدادات الصفحة الرئيسية </h3>
            </div>
        </div>
     	   <div class="col-md-4 text-end">
     		 <div class="card">
     	         <div class="card-body">
			        <table>  اضافة اعلان  </table>
              <div class="input-group">
              <textarea class="form-control" name="ads"><?php echo $page['ads'] ?></textarea>
              </div>
               	</div>
             </div>           
		   </div>

     	   <div class="col-md-8 text-end">
     		 <div class="card">
     	         <div class="card-body">
			        <table> سلايدر  </table>
                       <?php 
                            $categori = $connect->query("SELECT * FROM category ");
                            $categori->execute();
                            ?>
                       <select class="form-select" aria-label="Default select example" name="page">
                        <?php while( $categoris = $categori->fetch()) :?>
                       <option value="<?=$categoris['id']?>" <?=( $page['page'] == $categoris['id'] ? 'selected' : null )?> ><?=$categoris['name_category']?> </option>
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
                       <select class="form-select" aria-label="Default select example" name="page2">
                        <?php while( $categoris = $categori->fetch()) :?>
                       <option value="<?=$categoris['id']?>" <?=( $page['page2'] == $categoris['id'] ? 'selected' : null )?> ><?=$categoris['name_category']?> </option>
                        <?php endwhile; ?>
                       </select>
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
                       <select class="form-select" aria-label="Default select example" name="page1">
                        <?php while( $categoris = $categori->fetch()) :?>
                       <option value="<?=$categoris['id']?>" <?=( $page['page1'] == $categoris['id'] ? 'selected' : null )?> ><?=$categoris['name_category']?> </option>
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
                       <select class="form-select" aria-label="Default select example" name="page4">
                        <?php while( $categoris = $categori->fetch()) :?>
                       <option value="<?=$categoris['id']?>" <?=( $page['page4'] == $categoris['id'] ? 'selected' : null )?> ><?=$categoris['name_category']?> </option>
                        <?php endwhile; ?>
                       </select>
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
                       <select class="form-select" aria-label="Default select example" name="page3">
                        <?php while( $categoris = $categori->fetch()) :?>
                       <option value="<?=$categoris['id']?>" <?=( $page['page3'] == $categoris['id'] ? 'selected' : null )?> ><?=$categoris['name_category']?> </option>
                        <?php endwhile; ?>
                       </select>
                </div>
             </div>
           </div>
    </div>

    <div class="row my-2">
        <div class="col-md-12 text-end">
             <div class="card">
                 <div class="card-body">
                    <table> حدد الاقسم  </table>
                       <?php 
                            $categori = $connect->query("SELECT * FROM category ");
                            $categori->execute();
                            ?>
                       <select class="form-select" aria-label="Default select example" name="page5">
                        <?php while( $categoris = $categori->fetch()) :?>
                       <option value="<?=$categoris['id']?>" <?=( $page['page5'] == $categoris['id'] ? 'selected' : null )?> ><?=$categoris['name_category']?> </option>
                        <?php endwhile; ?>
                       </select>
                </div>
             </div>
           </div>
    </div>


<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
              <table>    اضافة اعلان  2   </table>
              <div class="input-group">
              <textarea class="form-control" name="page6"><?php echo $page['page6'] ?></textarea>
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
                       <select class="form-select" aria-label="Default select example" name="page7">
                        <?php while( $categoris = $categori->fetch()) :?>
                       <option value="<?=$categoris['id']?>" <?=( $page['page7'] == $categoris['id'] ? 'selected' : null )?> ><?=$categoris['name_category']?> </option>
                        <?php endwhile; ?>
                       </select>
                </div>
             </div>

</div>

</div>



   <div class="d-grid gap-2 my-3">
  <button class="btn btn-primary" type="submit" >Save</button>
  </div>
</div>
</form>
</div>

<?php include('footer.php'); ?>