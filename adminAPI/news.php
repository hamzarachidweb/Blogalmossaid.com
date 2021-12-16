<?php include('head.php'); 


if(isset($_POST['addpost'])) {
        $errMsg = '';

        // Get data from FROM
        $name = $_POST['name'];
        $content = $_POST['content'];
        $description = $_POST['description'];
        $category_id = $_POST['category_id'];

         $file = uniqid('jama3a-')."-".$_FILES['file']['name'];
         $file_loc = $_FILES['file']['tmp_name'];
         $folder="uploads/" . $file;
         move_uploaded_file($_FILES['file']['tmp_name'], $folder);

        if($name == '')
            $errMsg = 'Enter your name';
        if($content == '')
            $errMsg = 'Enter content';
        if($description == '')
            $errMsg = 'Enter description';
        if($category_id == '')
            $errMsg = 'Enter category_id';

        if($errMsg == ''){
            try {
                $stmt = $connect->prepare('INSERT INTO news (name, file, content, description, category_id) VALUES (:name, :file, :content,:description, :category_id)');
                $stmt->execute(array(
                	':name' => $name,
                    ':file' => $file,
                    ':content' => $content,
                    ':description'=> $description,
                    ':category_id'=> $category_id,
                    

                    ));
                header('Location: news.php?action=almossaid');
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
			
<form method="post" enctype="multipart/form-data">
<div class="row">
    <div class="col-md-5">
        <div class="input-group mb-2 my-4">
            <span class="input-group-text" id="basic-addon1">
            <i class="far fa-file-alt"></i> عنوان الاخبر </span>
            <input type="text" name="name"  class="form-control" placeholder=" عنوان الاخبر " aria-label="title" aria-describedby="basic-addon1">
        </div>
    </div>
  <div class="col-md-3">
    <table>حدد الفئة </table>
         <?php 
             $categori = $connect->query("SELECT * FROM category ");
             $categori->execute();
             ?>
        <select class="form-select" aria-label="Default select example" name="category_id">
         <?php while( $categoris = $categori->fetch()) :?>
        <option value="<?=$categoris['id']?>"><?=$categoris['name_category']?></option>
         <?php endwhile; ?>
     </select>
  </div>

    <div class="col-md-4">
        <div class="input-group mb-3 my-4">
          <label class="input-group-text" for="inputGroupFile01">
          <i class="fas fa-file-upload"></i>Upload</label>
          <input type="file" name="file" class="form-control" id="inputGroupFile01">
        </div>
    </div>


    <div class="col-md-12">
                 <?php $_GET['action'] = ' <div class="alert alert-primary" role="alert">  
         Registration successfull.  
         </div> '; ?>

        <div class="mb-3">
          <label for="exampleFormControlTextarea1" class="form-label">الوصف</label>
          <textarea class="form-control" name="description" placeholder="ضع هنا الوصف " id="exampleFormControlTextarea1" rows="2"></textarea>
        </div>
    </div>
</div>
    <div class="col-md-12">
        <div class="text-center">
          <textarea type="text" id="content" class="form-control ckeditor" name="content" ></textarea>
        </div>
    </div>

<div class="d-grid gap-2">
  <button class="btn btn-success" type="submit" name="addpost" type="button">
  <i class="far fa-file-alt"></i> اضافة الخبر </button>
</div>

</form>

		</div>
	</div>
</div>

<script>
 CKEDITOR.replace( 'content', {
  height: 300,
  filebrowserUploadUrl: "upload.php"
 });
</script>

<?php include('footer.php'); ?>