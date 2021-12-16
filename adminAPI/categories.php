<?php include('head.php');

if(isset($_POST['addpost'])) {
        $errMsg = '';

        // Get data from FROM
        $name_category = $_POST['name_category'];
        $icon = $_POST['icon'];

        if($name_category == '')
            $errMsg = 'Enter your name_category';
        if($errMsg == ''){
            try {
                $stmt = $connect->prepare('INSERT INTO category (name_category, icon) VALUES (:name_category, :icon)');
                $stmt->execute(array(
                    ':name_category' => $name_category,
                    ':icon' => $icon,
                    ));
                header('Location: categories.php?action=almossaid');
                exit;
            }
            catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
    }

    if(isset($_GET['action']) && $_GET['action'] == 'almossaid') {
        $errMsg = ' <div class="alert alert-primary" role="alert">  Registration successfull.  </div> ';
    }
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
                            <input type="text" name="name_category"  class="form-control" placeholder=" ضع عنوان الفئة   " aria-label="title" aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <div class="col-md-6 text-end">
                    <div id="carbon-block"  class="my-4"></div>
                    <input type="text" class="form-control" placeholder="Select icon" name="icon" id="icontext" data-fa-browser />
                </div>

                <div class="d-grid gap-2">
                  <button class="btn btn-success" type="submit" name="addpost" type="button">
                  <i class="far fa-file-alt"></i> اضافة</button>
                </div>

            </form>

		</div>
	</div>
</div>


<?php include('footer.php'); ?>