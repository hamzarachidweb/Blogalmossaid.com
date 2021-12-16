<?php include('head.php'); ?>


<?php

    
    $cat_id = $_GET['editcat_id'];
    $getUser = $connect->query("SELECT * FROM category WHERE id = '".$cat_id."' ");
    $cat    = $getUser->fetch();
    
    if(isset($_POST['update'])) {
        $errMsg = '';

        // Getting data from FROM
        $name_category = $_POST['name_category'];
        $icon = $_POST['icon'];

        if($errMsg == '') {
            try {
             $sql = "UPDATE category SET icon = :icon, name_category = :name_category  WHERE id = :id";
              $stmt = $connect->prepare($sql);                                  
              $stmt->execute(array(
                ':icon' => $icon,
                ':name_category' => $name_category,
                ':id' => $cat['id']
              ));
                header('Location: Allcategories.php');
                exit;

            }
            catch(PDOException $e) {
                $errMsg = $e->getMessage();
            }
        }
    }

    if(isset($_GET['action']) && $_GET['action'] == 'updated')
        $errMsg = 'Successfully updated.';

 

?>


<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			
			<form method="post" >
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group mb-2 my-4">
                            <span class="input-group-text" id="basic-addon1">
                            <i class="far fa-plus-square"></i> </span>
                            <input type="text" name="name_category" value="<?=$cat['name_category']; ?>"  class="form-control" placeholder=" ضع عنوان الفئة   " aria-label="title" aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <div class="col-md-6 text-end">
                    <div id="carbon-block"  class="my-4"></div>
                    <input type="text" value="<?=$cat['icon']; ?>" placeholder="<?=$cat['icon']; ?>" class="form-control" name="icon"  data-fa-browser /> 
                </div>

                <div class="d-grid gap-2">
                  <button class="btn btn-success" type="submit" name="update" type="button">
                  <i class="far fa-file-alt"></i> اضافة</button>
                </div>

            </form>

		</div>
	</div>
</div>


<?php include('footer.php'); ?>