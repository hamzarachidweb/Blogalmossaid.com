    <?php include('head.php');

    
    if(isset($_POST['update'])) {
        
        if( filesize($_FILES['file']['tmp_name']) ){
            $file = uniqid('almossaid-')."-".$_FILES['file']['name'];
            $size =$_FILES['file']['size'];
            $file_loc = $_FILES['file'];
            $folder="uploads/" . $file;
            move_uploaded_file($_FILES['file']['tmp_name'], $folder);
        }else{
            $file = null;
        }

        // Getting data from FROM
        $name = $_POST['name'];
        $category_id = $_POST['category_id'];
        $description = $_POST['description'];
        $content = $_POST['content'];




        if($errMsg == '') {
            try {
              $update = $connect->prepare("
                UPDATE news SET 
                ".( $file ? "file = '$file'" : null  )."
                category_id = '".$category_id."',
                name = '".$name."',
                description = '".$description."',
                content = '".$content."'

                WHERE id = '".$_GET['news_id']."'

                ");
              $update->execute();

                header('Location: allnews.php');
                exit;

            }
            catch(PDOException $e) {
                $errMsg = $e->getMessage();
            }
        }
    }

    if(isset($_GET['action']) && $_GET['action'] == 'updated')
        $errMsg = 'Successfully updated.';

 $news = $connect->query("SELECT * FROM `news` WHERE id = '".$_GET['news_id']."' ")->fetch();
 

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
            <input type="text" name="name"  class="form-control text-end" value="<?=$news['name']; ?>"  aria-describedby="basic-addon1">
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
        <option value="<?=$categoris['id']?>" <?=( $categoris['id'] == $news['category_id'] ? 'selected' : null )?> ><?=$categoris['name_category']?></option>
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

        <div class="mb-3">
          <label for="exampleFormControlTextarea1" class="form-label">الوصف</label>
          <textarea class="form-control text-end" name="description"><?php echo $news['description'] ?></textarea>
        </div>
</div>
    <div class="col-md-12">
        <div class="text-center">
          <textarea type="text" class="ckeditor text-end" name="content"> <?php  echo $news['content'] ?></textarea>
        </div>
    </div>

<div class="d-grid gap-2">
  <button class="btn btn-success" type="submit" name="update" type="button">
  <i class="far fa-file-alt"></i> اضافة الخبر </button>
</div>

</form>

        </div>
    </div>
</div>



<?php include('footer.php'); ?>